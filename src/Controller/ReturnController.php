<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\ReturnOrder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface; // Add this line
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;

class ReturnController extends AbstractController
{
    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }
    #[Route('/getorder', name: 'app_return', methods: ['POST'])]
    public function index(Request $request, PersistenceManagerRegistry $doctrine): JsonResponse
    {
        $entityManager = $doctrine->getManager();

        // Assuming the frontend sends a JSON payload with the necessary information
        $data = json_decode($request->getContent(), true);


        // Check for required data in the payload
        if (isset($data['delivery_id']) || isset($data['delivery_order_id'])) {
            // Determine which key is present and use it to query the database
            $key = isset($data['delivery_id']) ? 'delivery_id' : 'delivery_order_id';
            $order = $entityManager->getRepository(Order::class)->findOneBy([$key => $data[$key]]);

            if (!$order) {
                return $this->json([
                    'message' => 'Order not found.',
                ]);
            }

            $amount = $order->getAmount();
            
            return $this->json([
                'message' => 'Comparison successful!',
                'amount' => $amount,
            ]);
        }

        return $this->json([
            'message' => 'Invalid or missing data in the request.',
        ]);
    }
    
    #[Route('/send-return-order', name: 'send_return_order', methods: ['POST'])]
    public function sendReturnOrder(Request $request, PersistenceManagerRegistry $doctrine): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        // return $this->json([
        //     'message' => 'Comparison successful!',
        //     'amount' => $data,
        // ]);


        // Assuming the structure matches the ReturnOrder entity
        $returnOrder = new ReturnOrder(
            $data['deliveryId'],
            $data['deliveryorderid'],
            $data['logistics'],
            $data['warehouse'],
            $data['annotations'] ?? null,
            $data['reasonsForReturn']
        );

        // Persist the ReturnOrder entity to the database or perform any necessary actions
        $entityManager =$doctrine->getManager();
        $entityManager->persist($returnOrder);
        $entityManager->flush();

        // Return a response to the frontend
        return $this->json([
            'message' => 'Return order successfully created!',
        ]);
    }
}
