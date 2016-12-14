<?php

namespace mpc\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bd
 *
 * @ORM\Table(name="bd", indexes={@ORM\Index(name="ouvrage_id", columns={"ouvrage_id"})})
 * @ORM\Entity
 */
class Bd {

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
     * @return Bd
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

}
