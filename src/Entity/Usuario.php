<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Usuarios del sistema
 * 
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioRepository")
 */
class Usuario
{
    /**
     * Identificador unico de usuario<
     * 
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Identificador unico de usuario relacionado al RUT de Chile
     * 
     * @ORM\Column(type="string", length=20)
     */
    private $rut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $clave;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apellido;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cargo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Guia", mappedBy="receptor")
     * @ApiSubresource
     */
    private $guias;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Guia", mappedBy="autorizador")
     */
    private $guiasAutorizadas;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comprobante", mappedBy="tecnico")
     */
    private $comprobantes;

    public function __construct(){
        $this->guias = new ArrayCollection();
        $this->guiasAutorizadas = new ArrayCollection();
        $this->comprobantes = new ArrayCollection();
    }
    public function getId()
    {
        return $this->id;
    }

    public function getRut()
    {
        return $this->rut;
    }

    public function setRut($rut): self
    {
        $this->rut = $rut;

        return $this;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function setClave($clave): self
    {
        $this->clave = $clave;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getCargo(): ?string
    {
        return $this->cargo;
    }

    public function setCargo(string $cargo): self
    {
        $this->cargo = $cargo;

        return $this;
    }

    public function getGuias(): ?Guia
    {
        return $this->guias;
    }

    public function setGuias(?Guia $guias): self
    {
        $this->guias = $guias;

        return $this;
    }

    /**
     * @return Collection|Guia[]
     */
    public function getGuiasAutorizadas(): Collection
    {
        return $this->guiasAutorizadas;
    }

    public function addGuiasAutorizada(Guia $guiasAutorizada): self
    {
        if (!$this->guiasAutorizadas->contains($guiasAutorizada)) {
            $this->guiasAutorizadas[] = $guiasAutorizada;
            $guiasAutorizada->setAutorizador($this);
        }

        return $this;
    }

    public function removeGuiasAutorizada(Guia $guiasAutorizada): self
    {
        if ($this->guiasAutorizadas->contains($guiasAutorizada)) {
            $this->guiasAutorizadas->removeElement($guiasAutorizada);
            // set the owning side to null (unless already changed)
            if ($guiasAutorizada->getAutorizador() === $this) {
                $guiasAutorizada->setAutorizador(null);
            }
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
            $comprobante->setTecnico($this);
        }

        return $this;
    }

    public function removeComprobante(Comprobante $comprobante): self
    {
        if ($this->comprobantes->contains($comprobante)) {
            $this->comprobantes->removeElement($comprobante);
            // set the owning side to null (unless already changed)
            if ($comprobante->getTecnico() === $this) {
                $comprobante->setTecnico(null);
            }
        }

        return $this;
    }
}
