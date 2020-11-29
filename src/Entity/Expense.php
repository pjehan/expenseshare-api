<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ExpenseRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(normalizationContext={"groups"={"expense"}})
 * @ORM\Entity(repositoryClass=ExpenseRepository::class)
 */
class Expense
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"expense"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"expense"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"expense"})
     */
    private $user;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     * @Groups({"expense"})
     */
    private $amount;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"expense"})
     */
    private $paid;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"expense"})
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="expenses")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"expense"})
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity=Event::class, inversedBy="expenses")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"expense"})
     */
    private $event;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getPaid(): ?bool
    {
        return $this->paid;
    }

    public function setPaid(bool $paid): self
    {
        $this->paid = $paid;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
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

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;

        return $this;
    }
}
