<?php

namespace App\Entity;

use App\Repository\NewsRepository;
use Doctrine\DBAL\Types\Types;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NewsRepository::class)]
class News
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $news_title = null;

    #@Gedmo\Slug(fields={"news_title"}, nullable= true)
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $news_slug = null;


    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $detail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(nullable: true)]
    private ?bool $five_section = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $post_date = null;

    #[ORM\Column(nullable: true)]
    private ?bool $statut = null;

    #[ORM\Column(nullable: true)]
    #@Gedmo\Timestampable(on="create")
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    #@Gedmo\Timestampable(on="update")
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\ManyToOne(inversedBy: 'news')]
    private ?Category $category = null;

    #[ORM\ManyToOne(inversedBy: 'news')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNewsTitle(): ?string
    {
        return $this->news_title;
    }

    public function setNewsTitle(?string $news_title): self
    {
        $this->news_title = $news_title;

        return $this;
    }

    public function getNewsSlug(): ?string
    {
        return $this->news_slug;
    }

    public function setNewsSlug(?string $news_slug): self
    {
        $this->news_slug = $news_slug;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(?string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function isFiveSection(): ?bool
    {
        return $this->five_section;
    }

    public function setFiveSection(?bool $five_section): self
    {
        $this->five_section = $five_section;

        return $this;
    }

    public function getPostDate(): \DateTimeInterface
    {
        return $this->post_date;
    }

    public function setPostDate(?\DateTimeInterface $post_date): self
    {
        $this->post_date = $post_date;

        return $this;
    }

    public function isStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(?bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }


    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
