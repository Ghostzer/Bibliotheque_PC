<?php

namespace mpc\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cd
 *
 * @ORM\Table(name="cd", indexes={@ORM\Index(name="ouvrage_id", columns={"ouvrage_id"})})
 * @ORM\Entity
 */
class Cd {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \mpc\PlatformBundle\Entity\Ouvrage
     *
     * @ORM\ManyToOne(targetEntity="mpc\PlatformBundle\Entity\Ouvrage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ouvrage_id", referencedColumnName="id")
     * })
     */
    private $ouvrage;

    /**
     * @var string
     *
     * @ORM\Column(name="artist", type="string", length=250, nullable=false)
     */
    private $artist;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=250, nullable=false)
     */
    private $genre;
    
        /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;
    
     /**
     * @var string
     *
     * @ORM\Column(name="cover", type="string", length=250, nullable=false)
     */
    private $cover;
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set ouvrage
     *
     * @param \mpc\PlatformBundle\Entity\Ouvrage $ouvrage
     *
     * @return Cd
     */
    public function setOuvrage(\mpc\PlatformBundle\Entity\Ouvrage $ouvrage = null) {
        $this->ouvrage = $ouvrage;

        return $this;
    }

    /**
     * Get ouvrage
     *
     * @return \mpc\PlatformBundle\Entity\Ouvrage
     */
    public function getOuvrage() {
        return $this->ouvrage;
    }

    /**
     * Set artist
     *
     * @param string $artist
     *
     * @return Cd
     */
    public function setArtist($artist) {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get artist
     *
     * @return string
     */
    public function getArtist() {
        return $this->artist;
    }


    /**
     * Set genre
     *
     * @param string $genre
     *
     * @return Cd
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Cd
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set cover
     *
     * @param string $cover
     *
     * @return Cd
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return string
     */
    public function getCover()
    {
        return $this->cover;
    }
}
