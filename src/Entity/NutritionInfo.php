<?php

namespace App\Entity;

use App\Repository\NutritionInfoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NutritionInfoRepository::class)]
class NutritionInfo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $calories = null;

    #[ORM\Column]
    private ?float $carbs = null;

    #[ORM\Column]
    private ?float $proteins = null;

    #[ORM\Column(length: 255)]
    private ?float $fats = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCalories(): ?float
    {
        return $this->calories;
    }

    public function setCalories(float $calories): static
    {
        $this->calories = $calories;

        return $this;
    }

    public function getCarbs(): ?float
    {
        return $this->carbs;
    }

    public function setCarbs(float $carbs): static
    {
        $this->carbs = $carbs;

        return $this;
    }

    public function getProteins(): ?float
    {
        return $this->proteins;
    }

    public function setProteins(float $proteins): static
    {
        $this->proteins = $proteins;

        return $this;
    }

    public function getFats(): ?string
    {
        return $this->fats;
    }

    public function setFats(string $fats): static
    {
        $this->fats = $fats;

        return $this;
    }
}
