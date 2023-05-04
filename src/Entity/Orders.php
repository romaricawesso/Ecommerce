<?php

namespace App\Entity;


use App\Repository\OrdersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdersRepository::class)]
class Orders
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20,unique : true)]
    private ?string $reference = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    private ?Coupons $coupons = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    private ?Users $users = null;

    #[ORM\OneToMany(mappedBy: 'orders', targetEntity: OdersDetails::class)]
    private Collection $odersDetails;

    
    #[ORM\Column(Types::DATETIME_MUTABLE,options:['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $created_at = null;


    public function __construct()
    {
        $this->odersDetails = new ArrayCollection();
        $this->created_at = new \DateTimeImmutable();
    
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
   
    public function getCoupons(): ?Coupons
    {
        return $this->coupons;
    }

    public function setCoupons(?Coupons $coupons): self
    {
        $this->coupons = $coupons;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): self
    {
        $this->users = $users;

        return $this;
    }

    /**
     * @return Collection<int, OdersDetails>
     */
    public function getOdersDetails(): Collection
    {
        return $this->odersDetails;
    }

    public function addOdersDetail(OdersDetails $odersDetail): self
    {
        if (!$this->odersDetails->contains($odersDetail)) {
            $this->odersDetails->add($odersDetail);
            $odersDetail->setOrders($this);
        }

        return $this;
    }

    public function removeOdersDetail(OdersDetails $odersDetail): self
    {
        if ($this->odersDetails->removeElement($odersDetail)) {
            // set the owning side to null (unless already changed)
            if ($odersDetail->getOrders() === $this) {
                $odersDetail->setOrders(null);
            }
        }

        return $this;
    }
}
