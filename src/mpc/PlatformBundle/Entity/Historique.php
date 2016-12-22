<?php

namespace mpc\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Historique
 *
 * @ORM\Table(name="historique", indexes={@ORM\Index(name="ouvrage_id", columns={"ouvrage_id"})})
 * @ORM\Entity(repositoryClass="mpc\PlatformBundle\Repository\HistoriqueRepository")
 */
class Historique
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \mpc\PlatformBundle\Entity\Ouvrage
     *
     * @ORM\ManyToOne(targetEntity="mpc\PlatformBundle\Entity\Ouvrage", cascade={"all"}, fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ouvrage_id", referencedColumnName="id")
     * })
     */
    private $ouvrageId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_retour", type="datetime")
     */
    private $dateRetour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_emprunt", type="datetime")
     */
    private $dateEmprunt;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="mpc\PlatformBundle\Entity\Utilisateurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")
     * })
     */
    private $utilisateurId;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ouvrageId
     *
     * @param \mpc\PlatformBundle\Entity\Ouvrage $ouvrage
     *
     * @return Historique
     */
    public function setOuvrageId(\mpc\PlatformBundle\Entity\Ouvrage $ouvrage = null)
    {
        $this->ouvrageId = $ouvrage;

        return $this;
    }

    /**
     * Get ouvrageId
     *
     * @return \mpc\PlatformBundle\Entity\Ouvrage
     */
    public function getOuvrageId()
    {
        return $this->ouvrageId;
    }

    /**
     * Set dateRetour
     *
     * @param \DateTime $dateRetour
     *
     * @return Historique
     */
    public function setDateRetour($dateRetour)
    {
        $this->dateRetour = $dateRetour;

        return $this;
    }

    /**
     * Get dateRetour
     *
     * @return \DateTime
     */
    public function getDateRetour()
    {
        return $this->dateRetour;
    }

    /**
     * Set dateEmprunt
     *
     * @param \DateTime $dateEmprunt
     *
     * @return Historique
     */
    public function setDateEmprunt($dateEmprunt)
    {
        $this->dateEmprunt = $dateEmprunt;

        return $this;
    }

    /**
     * Get dateEmprunt
     *
     * @return \DateTime
     */
    public function getDateEmprunt()
    {
        return $this->dateEmprunt;
    }

    /**
     * Set utilisateurId
     *
     * @param integer $utilisateurId
     *
     * @return Historique
     */
    public function setUtilisateurId($utilisateurId)
    {
        $this->utilisateurId = $utilisateurId;

        return $this;
    }

    /**
     * Get utilisateurId
     *
     * @return int
     */
    public function getUtilisateurId()
    {
        return $this->utilisateurId;
    }
}
