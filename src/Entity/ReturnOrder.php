<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`ReturnOrder`')]
class ReturnOrder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "delivery_id")]
    private int $deliveryId;

    #[ORM\Column(name: "DeliveryOrderId")]
    private string $DeliveryOrderId;

    #[ORM\Column]
    private string $logistics;

    #[ORM\Column]
    private string $warehouse;

    #[ORM\Column(nullable: true)]
    private ?string $annotations;

    #[ORM\Column]
    private string $reasonsForReturn;

    public function __construct(int $deliveryId, string $orderId, string $logistics, string $warehouse, ?string $annotations = null, string $reasonsForReturn)
    {
        $this->deliveryId = $deliveryId;
        $this->orderId = $orderId;
        $this->logistics = $logistics;
        $this->warehouse = $warehouse;
        $this->annotations = $annotations;
        $this->reasonsForReturn = $reasonsForReturn;
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

    public function getAnnotations(): ?string
    {
        return $this->annotations;
    }

    public function getReasonsForReturn(): string
    {
        return $this->reasonsForReturn;
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

    public function setAnnotations(?string $annotations): static
    {
        $this->annotations = $annotations;

        return $this;
    }

    public function setReasonsForReturn(string $reasonsForReturn): static
    {
        $this->reasonsForReturn = $reasonsForReturn;

        return $this;
    }
}
