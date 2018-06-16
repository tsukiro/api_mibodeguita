<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ComprobanteRepository")
 */
class Comprobante
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario", inversedBy="comprobantes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tecnico;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Repuesto", inversedBy="comprobantes")
     */
    private $repuestos;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Informe", mappedBy="comprobantes")
     */
    private $informes;

    public function __construct()
    {
        $this->repuestos = new ArrayCollection();
        $this->informes = new ArrayCollection();
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

    public function getTecnico(): ?Usuario
    {
        return $this->tecnico;
    }

    public function setTecnico(?Usuario $tecnico): self
    {
        $this->tecnico = $tecnico;

        return $this;
    }

    /**
     * @return Collection|Repuesto[]
     */
    public function getRepuestos(): Collection
    {
        return $this->repuestos;
    }

    public function addRepuesto(Repuesto $repuesto): self
    {
        if (!$this->repuestos->contains($repuesto)) {
            $this->repuestos[] = $repuesto;
        }

        return $this;
    }

    public function removeRepuesto(Repuesto $repuesto): self
    {
        if ($this->repuestos->contains($repuesto)) {
            $this->repuestos->removeElement($repuesto);
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
            $informe->addComprobante($this);
        }

        return $this;
    }

    public function removeInforme(Informe $informe): self
    {
        if ($this->informes->contains($informe)) {
            $this->informes->removeElement($informe);
            $informe->removeComprobante($this);
        }

        return $this;
    }
}
