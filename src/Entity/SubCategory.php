<?php

namespace App\Entity;

use App\Repository\SubCategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubCategoryRepository::class)]
class SubCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $subcategory_name = null;

    #[ORM\Column(length: 255)]
    private ?string $subcategory_slug = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubcategoryName(): ?string
    {
        return $this->subcategory_name;
    }

    public function setSubcategoryName(string $subcategory_name): self
    {
        $this->subcategory_name = $subcategory_name;

        return $this;
    }

    public function getSubcategorySlug(): ?string
    {
        return $this->subcategory_slug;
    }

    public function setSubcategorySlug(string $subcategory_slug): self
    {
        $this->subcategory_slug = $subcategory_slug;

        return $this;
    }
}
