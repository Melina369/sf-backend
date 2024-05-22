<?php

namespace App\Entity;

use App\Repository\SubcategoriaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubcategoriaRepository::class)]
class Subcategoria
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\ManyToOne(inversedBy: 'idSubcategoria')]
    private ?Producto $idsubcategoria = null;

    #[ORM\ManyToOne(inversedBy: 'idSubcategoria')]
    private ?Categoria $idsubcat = null;

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

    public function getIdsubcategoria(): ?Producto
    {
        return $this->idsubcategoria;
    }

    public function setIdsubcategoria(?Producto $idsubcategoria): static
    {
        $this->idsubcategoria = $idsubcategoria;

        return $this;
    }

    public function getIdsubcat(): ?Categoria
    {
        return $this->idsubcat;
    }

    public function setIdsubcat(?Categoria $idsubcat): static
    {
        $this->idsubcat = $idsubcat;

        return $this;
    }
}
