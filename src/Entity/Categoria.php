<?php

namespace App\Entity;

use App\Repository\CategoriaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriaRepository::class)]
class Categoria
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\OneToMany(targetEntity: subcategoria::class, mappedBy: 'idsubcat')]
    private Collection $idSubcategoria;

    public function __construct()
    {
        $this->idSubcategoria = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection<int, subcategoria>
     */
    public function getIdSubcategoria(): Collection
    {
        return $this->idSubcategoria;
    }

    public function addIdSubcategorium(subcategoria $idSubcategorium): static
    {
        if (!$this->idSubcategoria->contains($idSubcategorium)) {
            $this->idSubcategoria->add($idSubcategorium);
            $idSubcategorium->setIdsubcat($this);
        }

        return $this;
    }

    public function removeIdSubcategorium(subcategoria $idSubcategorium): static
    {
        if ($this->idSubcategoria->removeElement($idSubcategorium)) {
            // set the owning side to null (unless already changed)
            if ($idSubcategorium->getIdsubcat() === $this) {
                $idSubcategorium->setIdsubcat(null);
            }
        }

        return $this;
    }
}
