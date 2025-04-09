<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Anuncio
 *
 * @ORM\Table(name="anuncio")
 * @ORM\Entity
 */
class Anuncio
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups ("anuncios")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=false)
     * @Groups ("anuncios")
     */
    private $imagen;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=false)
     * @Groups ("anuncios")
     */
    private $link;

    /**
     * @var int|null
     *
     * @ORM\Column(name="vecesClickado", type="integer", nullable=true)
     * @Groups ("anuncios")
     */
    private $vecesclickado = '0';


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tipo")
     * @ORM\JoinColumn(name="tipo", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     * @Groups("anuncios")
     */
    private $tipo;
    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", nullable=true)
     * @Groups ("anuncios")
     */
    private $nombre;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getImagen(): string
    {
        return $this->imagen;
    }

    public function setImagen(string $imagen): void
    {
        $this->imagen = $imagen;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    public function getVecesclickado(): int|string|null
    {
        return $this->vecesclickado;
    }

    public function setVecesclickado(int|string|null $vecesclickado): void
    {
        $this->vecesclickado = $vecesclickado;
    }
    public function getTipo(): ?TIpo
    {
        return $this->tipo;
    }

    public function setTipo(?TIpo $tipo): void
    {
        $this->tipo = $tipo;
    }


    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): void
    {
        $this->nombre = $nombre;
    }


}
