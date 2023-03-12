<?php

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProductsRepository;
use ApiPlatform\Metadata\GetCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => 'Products:item']),
        new Post(normalizationContext: ['groups' => 'Products:item']),
        new GetCollection(normalizationContext: ['groups' => 'Products:list'])
    ],
    order: ['year' => 'DESC', 'city' => 'ASC'],
    paginationEnabled: false,
)]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['Products:list', 'Products:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['Products:list', 'Products:item'])]
    private ?string $name = null;

    #[ORM\Column]
    #[Groups(['Products:list', 'Products:item'])]
    private ?int $quantity = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['Products:list', 'Products:item'])]
    private ?string $description = null;

    #[ORM\Column]
    #[Groups(['Products:list', 'Products:item'])]
    private ?float $price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }
}
