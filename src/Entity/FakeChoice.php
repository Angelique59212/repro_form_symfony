<?php

namespace App\Entity;

use App\Repository\FakeChoiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FakeChoiceRepository::class)]
class FakeChoice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $choiceString = null;

    #[ORM\Column]
    private ?int $ChoiceInt = null;

    #[ORM\Column]
    private ?bool $choiceBool = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChoiceString(): ?string
    {
        return $this->choiceString;
    }

    public function setChoiceString(string $choiceString): self
    {
        $this->choiceString = $choiceString;

        return $this;
    }

    public function getChoiceInt(): ?int
    {
        return $this->ChoiceInt;
    }

    public function setChoiceInt(int $ChoiceInt): self
    {
        $this->ChoiceInt = $ChoiceInt;

        return $this;
    }

    public function isChoiceBool(): ?bool
    {
        return $this->choiceBool;
    }

    public function setChoiceBool(bool $choiceBool): self
    {
        $this->choiceBool = $choiceBool;

        return $this;
    }
}
