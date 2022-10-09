<?php

namespace App\Entity;

use App\Repository\MatiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatiereRepository::class)
 */
class Matiere
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $code_mat = 1;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle_mat;

    /**
     * @ORM\Column(type="float")
     */
    private $coefficient;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $this->id;

        return $this;
    }

    public function getcode_mat(): ?int
    {
        return $this->code_mat;
    }

    public function setcode_mat(int $id): self
    {
        $this->code_mat = $this->getId();

        return $this;
    }

    public function getLibelleMat(): ?string
    {
        return $this->libelle_mat;
    }

    public function setLibelleMat(string $libelle_mat): self
    {
        $this->libelle_mat = $libelle_mat;

        return $this;
    }

    public function getCoefficient(): ?float
    {
        return $this->coefficient;
    }

    public function setCoefficient(float $coefficient): self
    {
        $this->coefficient = $coefficient;

        return $this;
    }

    public function __toString()
    {
        return $this->libelle_mat;
    }
}
