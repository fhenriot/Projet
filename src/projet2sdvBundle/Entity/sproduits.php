<?php

namespace projet2sdvBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
	 * @ORM\OneToMany(targetEntity="projet2sdvBundle\Entity\Panier", mappedBy="produit")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $panier;

    /**
     * @ORM\ManyToOne(targetEntity="projet2sdvBundle\Entity\stypeProduits", inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
	 */
    private $typeProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
	 * @Assert\Length(min=2, minMessage="Le nom doit faire au moins {{ limit }} caractères")
     */
    private $nom;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
	 * @Assert\Regex("/^([0-9]*[,.])?[0-9]+$/", message="Le prix doit être numérique")
     */
    private $prix;

    /**
     * @ORM\OneToOne(targetEntity="projet2sdvBundle\Entity\Image", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    private $image;


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
     * Add panier
     *
     * @param \projet2sdvBundle\Entity\Panier $panier
     *
     * @return sproduits
     */
    public function addPanier(\projet2sdvBundle\Entity\Panier $panier)
    {
        $this->panier[] = $panier;

        return $this;
    }

    /**
     * Remove panier
     *
     * @param \projet2sdvBundle\Entity\Panier $panier
     */
    public function removePanier(\projet2sdvBundle\Entity\Panier $panier)
    {
        $this->panier->removeElement($panier);
    }

    /**
     * Get panier
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPanier()
    {
        return $this->panier;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->panier = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set image
     *
     * @param \projet2sdvBundle\Entity\Image $image
     *
     * @return sproduits
     */
    public function setImage(\projet2sdvBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \projet2sdvBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }
}
