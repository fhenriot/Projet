<?php

namespace projet2sdvBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * sproduits
 *
 * @ORM\Table(name="sproduits")
 * @ORM\Entity(repositoryClass="projet2sdvBundle\Repository\sproduitsRepository")
 */
class sproduits
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
	 * @ORM\OneToMany(targetEntity="projet2sdvBundle\Entity\PanierProduit", mappedBy="panier")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $panierProduit;

    /**
     * @ORM\ManyToOne(targetEntity="projet2sdvBundle\Entity\stypeProduits", inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
	 */
    private $typeProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return sproduits
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return sproduits
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return sproduits
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set typeProduit
     *
     * @param \projet2sdvBundle\Entity\stypeProduits $typeProduit
     *
     * @return sproduits
     */
    public function setTypeProduit(stypeProduits $typeProduit)
    {
        $this->typeProduit = $typeProduit;

        return $this;
    }

    /**
     * Get typeProduit
     *
     * @return \projet2sdvBundle\Entity\stypeProduits
     */
    public function getTypeProduit()
    {
        return $this->typeProduit;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->panierProduit = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add panierProduit
     *
     * @param \projet2sdvBundle\Entity\PanierProduit $panierProduit
     *
     * @return sproduits
     */
    public function addPanierProduit(\projet2sdvBundle\Entity\PanierProduit $panierProduit)
    {
        $this->panierProduit[] = $panierProduit;

        return $this;
    }

    /**
     * Remove panierProduit
     *
     * @param \projet2sdvBundle\Entity\PanierProduit $panierProduit
     */
    public function removePanierProduit(\projet2sdvBundle\Entity\PanierProduit $panierProduit)
    {
        $this->panierProduit->removeElement($panierProduit);
    }

    /**
     * Get panierProduit
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPanierProduit()
    {
        return $this->panierProduit;
    }
}
