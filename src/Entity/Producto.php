<?php

namespace App\Entity;

use App\Repository\ProductoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductoRepository::class)]
class Producto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column]
    private ?float $precio_compra = null;

    #[ORM\Column]
    private ?float $precio_venta = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fecha_creado = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fecha_actualizado = null;

    #[ORM\Column(nullable: true)]
    private ?int $cantidad = null;

    #[ORM\OneToMany(targetEntity: subcategoria::class, mappedBy: 'idsubcategoria')]
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

    public function getPrecioCompra(): ?float
    {
        return $this->precio_compra;
    }

    public function setPrecioCompra(float $precio_compra): static
    {
        $this->precio_compra = $precio_compra;

        return $this;
    }

    public function getPrecioVenta(): ?float
    {
        return $this->precio_venta;
    }

    public function setPrecioVenta(float $precio_venta): static
    {
        $this->precio_venta = $precio_venta;

        return $this;
    }

    public function getFechaCreado(): ?\DateTimeInterface
    {
        return $this->fecha_creado;
    }

    public function setFechaCreado(?\DateTimeInterface $fecha_creado): static
    {
        $this->fecha_creado = $fecha_creado;

        return $this;
    }

    public function getFechaActualizado(): ?\DateTimeInterface
    {
        return $this->fecha_actualizado;
    }

    public function setFechaActualizado(?\DateTimeInterface $fecha_actualizado): static
    {
        $this->fecha_actualizado = $fecha_actualizado;

        return $this;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(?int $cantidad): static
    {
        $this->cantidad = $cantidad;

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
            $idSubcategorium->setIdsubcategoria($this);
        }

        return $this;
    }

    public function removeIdSubcategorium(subcategoria $idSubcategorium): static
    {
        if ($this->idSubcategoria->removeElement($idSubcategorium)) {
            // set the owning side to null (unless already changed)
            if ($idSubcategorium->getIdsubcategoria() === $this) {
                $idSubcategorium->setIdsubcategoria(null);
            }
        }

        return $this;
    }
}
