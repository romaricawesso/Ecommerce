<?php

namespace App\Entity;

use App\Repository\OdersDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OdersDetailsRepository::class)]
class OdersDetails
{
    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column]
    private ?int $price = null;
    #[ORM\Id]

    #[ORM\ManyToOne(inversedBy: 'odersDetails')]
    private ?Orders $orders = null;
    
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'odersDetails')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Products $products = null;

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getOrders(): ?Orders
    {
        return $this->orders;
    }

    public function setOrders(?Orders $orders): self
    {
        $this->orders = $orders;

        return $this;
    }

    public function getProducts(): ?Products
    {
        return $this->products;
    }

    public function setProducts(?Products $products): self
    {
        $this->products = $products;

        return $this;
    }
}
