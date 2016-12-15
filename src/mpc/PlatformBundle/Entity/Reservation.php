<?php

namespace mpc\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="ouvrage_id", columns={"ouvrage_id"})})
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

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
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="mpc\PlatformBundle\Entity\Utilisateurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")
     * })
     */
    private $utilisateur;



    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Reservation
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ouvrage
     *
     * @param \mpc\PlatformBundle\Entity\Ouvrage $ouvrage
     *
     * @return Reservation
     */
    public function setOuvrage(\mpc\PlatformBundle\Entity\Ouvrage $ouvrage = null)
    {
        $this->ouvrage = $ouvrage;

        return $this;
    }

    /**
     * Get ouvrage
     *
     * @return \mpc\PlatformBundle\Entity\Ouvrage
     */
    public function getOuvrage()
    {
        return $this->ouvrage;
    }

    /**
     * Set utilisateur
     *
     * @param \mpc\PlatformBundle\Entity\Utilisateurs $utilisateur
     *
     * @return Reservation
     */
    public function setUtilisateur(\mpc\PlatformBundle\Entity\Utilisateurs $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \mpc\PlatformBundle\Entity\Utilisateurs
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}
