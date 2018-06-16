<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\GuiaRepository")
 */
class Guia
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
    private $numero;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fecha;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hora;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario", inversedBy="guias")
     */
    private $receptor;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario", inversedBy="guiasAutorizadas")
     */
    private $autorizador;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Repuesto", mappedBy="guias")
     */
    private $repuestos;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Informe", mappedBy="guias")
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

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
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
     * @return Collection|Usuario[]
     */
    public function getReceptor(): Collection
    {
        return $this->receptor;
    }

    public function addReceptor(Usuario $receptor): self
    {
        if (!$this->receptor->contains($receptor)) {
            $this->receptor[] = $receptor;
            $receptor->setGuias($this);
        }

        return $this;
    }

    public function removeReceptor(Usuario $receptor): self
    {
        if ($this->receptor->contains($receptor)) {
            $this->receptor->removeElement($receptor);
            // set the owning side to null (unless already changed)
            if ($receptor->getGuias() === $this) {
                $receptor->setGuias(null);
            }
        }

        return $this;
    }

    public function getAutorizador(): ?Usuario
    {
        return $this->autorizador;
    }

    public function setAutorizador(?Usuario $Autorizador): self
    {
        $this->autorizador = $Autorizador;

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
            $repuesto->addGuium($this);
        }

        return $this;
    }

    public function removeRepuesto(Repuesto $repuesto): self
    {
        if ($this->repuestos->contains($repuesto)) {
            $this->repuestos->removeElement($repuesto);
            $repuesto->removeGuium($this);
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
            $informe->addGuia($this);
        }

        return $this;
    }

    public function removeInforme(Informe $informe): self
    {
        if ($this->informes->contains($informe)) {
            $this->informes->removeElement($informe);
            $informe->removeGuia($this);
        }

        return $this;
    }
}
