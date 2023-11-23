<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "delivery_id")]
    private int $deliveryId;

    #[ORM\Column(name: "order_order_id")]
    private string $DeliveryOrderId;

    #[ORM\Column]
    private string $logistics;

    #[ORM\Column]
    private string $warehouse;

    public function __construct(int $deliveryId, string $orderId, string $logistics, string $warehouse)
    {
        $this->deliveryId = $deliveryId;
        $this->orderId = $orderId;
        $this->logistics = $logistics;
        $this->warehouse = $warehouse;
    }

    public function getDeliveryId(): int
    {
        return $this->deliveryId;
    }

    public function getDeliveryOrderId(): string
    {
        return $this->DeliveryOrderId;
    }

    public function getLogistics(): string
    {
        return $this->logistics;
    }

    public function getWarehouse(): string
    {
        return $this->warehouse;
    }

    public function setDeliveryOrderId(string $DeliveryOrderId): static
    {
        $this->DeliveryOrderId = $DeliveryOrderId;

        return $this;
    }

    public function setLogistics(string $logistics): static
    {
        $this->logistics = $logistics;

        return $this;
    }

    public function setWarehouse(string $warehouse): static
    {
        $this->warehouse = $warehouse;

        return $this;
    }
}