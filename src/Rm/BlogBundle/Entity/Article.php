<?php

namespace Rm\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="Rm\BlogBundle\Repository\ArticleRepository")
 */
class Article
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
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, unique=true)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publishDate", type="date")
     */
    private $publishDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="editDate", type="date", nullable=true)
     */
    private $editDate;

    /**
     * @ORM\ManyToOne(targetEntity="Rm\BlogBundle\Entity\Categorie", inversedBy="articles")
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity="Rm\BlogBundle\Entity\Commentaire", mappedBy="article")
     */
    private $commentaires;

    /**
     * @Assert\Valid()
     * @ORM\OneToOne(targetEntity="Rm\MainBundle\Entity\Image", cascade={"persist", "remove"})
     */
    private $image;

    /**
     * @Gedmo\Slug(fields={"titre"})
     * @ORM\Column(length=255)
     */
    private $slug;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return Article
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
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Article
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set publishDate
     *
     * @param \DateTime $publishDate
     *
     * @return Article
     */
    public function setPublishDate($publishDate)
    {
        $this->publishDate = $publishDate;

        return $this;
    }

    /**
     * Get publishDate
     *
     * @return \DateTime
     */
    public function getPublishDate()
    {
        return $this->publishDate;
    }

    /**
     * Set editDate
     *
     * @param \DateTime $editDate
     *
     * @return Article
     */
    public function setEditDate($editDate)
    {
        $this->editDate = $editDate;

        return $this;
    }

    /**
     * Get editDate
     *
     * @return \DateTime
     */
    public function getEditDate()
    {
        return $this->editDate;
    }

    /**
     * Set categorie
     *
     * @param \Rm\BlogBundle\Entity\Categorie $categorie
     *
     * @return Article
     */
    public function setCategorie(\Rm\BlogBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Rm\BlogBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->publishDate = new \DateTime();
        $this->commentaires = new \Doctrine\Common\Collections\ArrayCollection();
    }


    public function __toString()
    {
        return $this->titre;
    }

    /**
     * Add commentaire
     *
     * @param \Rm\BlogBundle\Entity\Commentaire $commentaire
     *
     * @return Article
     */
    public function addCommentaire(\Rm\BlogBundle\Entity\Commentaire $commentaire)
    {
        $this->commentaires[] = $commentaire;

        return $this;
    }

    /**
     * Remove commentaire
     *
     * @param \Rm\BlogBundle\Entity\Commentaire $commentaire
     */
    public function removeCommentaire(\Rm\BlogBundle\Entity\Commentaire $commentaire)
    {
        $this->commentaires->removeElement($commentaire);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Set image
     *
     * @param \Rm\MainBundle\Entity\Image $image
     *
     * @return Article
     */
    public function setImage(\Rm\MainBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Rm\MainBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Article
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
