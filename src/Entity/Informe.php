<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\InformeRepository")
 */
class Informe
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
    private $fecha;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hora;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Comprobante", inversedBy="informes")
     */
    private $comprobantes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Guia", inversedBy="informes")
     */
    private $guias;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Repuesto", inversedBy="informes")
     */
    private $respuestos;

    public function __construct()
    {
        $this->comprobantes = new ArrayCollection();
        $this->guias = new ArrayCollection();
        $this->respuestos = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFecha(): ?string
    {
        return $this->fecha;
    }

    public function setFecha(string $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getHora(): ?string
    {
        return $this->hora;
    }

    public function setHora(string $hora): self
    {
        $this->hora = $hora;

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
        }

        return $this;
    }

    public function removeComprobante(Comprobante $comprobante): self
    {
        if ($this->comprobantes->contains($comprobante)) {
            $this->comprobantes->removeElement($comprobante);
        }

        return $this;
    }

    /**
     * @return Collection|Guia[]
     */
    public function getGuias(): Collection
    {
        return $this->guias;
    }

    public function addGuia(Guia $guia): self
    {
        if (!$this->guias->contains($guia)) {
            $this->guias[] = $guia;
        }

        return $this;
    }

    public function removeGuia(Guia $guia): self
    {
        if ($this->guias->contains($guia)) {
            $this->guias->removeElement($guia);
        }

        return $this;
    }

    /**
     * @return Collection|Repuesto[]
     */
    public function getRespuestos(): Collection
    {
        return $this->respuestos;
    }

    public function addRespuesto(Repuesto $respuesto): self
    {
        if (!$this->respuestos->contains($respuesto)) {
            $this->respuestos[] = $respuesto;
        }

        return $this;
    }

    public function removeRespuesto(Repuesto $respuesto): self
    {
        if ($this->respuestos->contains($respuesto)) {
            $this->respuestos->removeElement($respuesto);
        }

        return $this;
    }
}
