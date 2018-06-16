<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\RepuestoRepository")
 */
class Repuesto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codigo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="integer")
     */
    private $estado;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Guia", inversedBy="repuestos")
     */
    private $guias;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Comprobante", mappedBy="repuestos")
     */
    private $comprobantes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Informe", mappedBy="respuestos")
     */
    private $informes;

    public function __construct()
    {
        $this->guias = new ArrayCollection();
        $this->comprobantes = new ArrayCollection();
        $this->informes = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return Collection|Guia[]
     */
    public function getGuias(): Collection
    {
        return $this->guias;
    }

    public function addGuium(Guia $guium): self
    {
        if (!$this->guias->contains($guium)) {
            $this->guias[] = $guium;
        }

        return $this;
    }

    public function removeGuium(Guia $guium): self
    {
        if ($this->guia->contains($guium)) {
            $this->guia->removeElement($guium);
        }

        return $this;
    }

    /**
     * @return Collection|Comprobante[]
     */
    public function getComprobantes(): Collection
    {
        return $this->comprobantes;
    }

    public function addComprobante(Comprobante $comprobante): self
    {
        if (!$this->comprobantes->contains($comprobante)) {
            $this->comprobantes[] = $comprobante;
            $comprobante->addRepuesto($this);
        }

        return $this;
    }

    public function removeComprobante(Comprobante $comprobante): self
    {
        if ($this->comprobantes->contains($comprobante)) {
            $this->comprobantes->removeElement($comprobante);
            $comprobante->removeRepuesto($this);
        }

        return $this;
    }

    /**
     * @return Collection|Informe[]
     */
    public function getInformes(): Collection
    {
        return $this->informes;
    }

    public function addInforme(Informe $informe): self
    {
        if (!$this->informes->contains($informe)) {
            $this->informes[] = $informe;
            $informe->addRespuesto($this);
        }

        return $this;
    }

    public function removeInforme(Informe $informe): self
    {
        if ($this->informes->contains($informe)) {
            $this->informes->removeElement($informe);
            $informe->removeRespuesto($this);
        }

        return $this;
    }
}
