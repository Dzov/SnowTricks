<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VideoRepository")
 */
class Video
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
    private $iframePath;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Trick", cascade={"persist"}, inversedBy="videos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $trick;

    public function getId()
    {
        return $this->id;
    }

    public function getIframePath(): string
    {
        return $this->iframePath;
    }

    public function setIframePath(string $iframePath)
    {
        $this->iframePath = $iframePath;

        return $this;
    }

    public function getTrick(): Trick
    {
        return $this->trick;
    }

    public function setTrick(Trick $trick): self
    {
        $this->trick = $trick;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url = null)
    {
        $this->url = $url;

        return $this;
    }
}
