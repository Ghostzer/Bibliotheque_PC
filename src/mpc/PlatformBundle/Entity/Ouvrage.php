<?php

namespace mpc\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ouvrage
 *
 * @ORM\Table(name="ouvrage", indexes={@ORM\Index(name="auteur_id", columns={"auteur_id"})})
 * @ORM\Entity
 */
class Ouvrage
{
    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=250, nullable=false)
     */
    private $titre;

    /**
     * @var integer
     *
     * @ORM\Column(name="annee", type="integer", nullable=false)
     */
    private $annee;

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
     * @var \mpc\PlatformBundle\Entity\Auteurs
     *
     * @ORM\ManyToOne(targetEntity="mpc\PlatformBundle\Entity\Auteurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="auteur_id", referencedColumnName="id")
     * })
     */
    private $auteur;



    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Ouvrage
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set annee
     *
     * @param integer $annee
     *
     * @return Ouvrage
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return integer
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Ouvrage
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
     * Set auteur
     *
     * @param \mpc\PlatformBundle\Entity\Auteurs $auteur
     *
     * @return Ouvrage
     */
    public function setAuteur(\mpc\PlatformBundle\Entity\Auteurs $auteur = null)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return \mpc\PlatformBundle\Entity\Auteurs
     */
    public function getAuteur()
    {
        return $this->auteur;
    }
}
