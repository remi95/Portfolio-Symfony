<?php

namespace Rm\MainBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Rm\MainBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Rm\BlogBundle\Entity\Commentaire", mappedBy="auteur")
     */
    private $commentaires;

    /**
     * @ORM\OneToOne(targetEntity="Rm\MainBundle\Entity\Image", cascade={"persist", "remove"})
     */
    protected $avatar;

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
     * Add commentaire
     *
     * @param \Rm\BlogBundle\Entity\Commentaire $commentaire
     *
     * @return User
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
     * Set avatar
     *
     * @param \Rm\MainBundle\Entity\Image $avatar
     *
     * @return User
     */
    public function setAvatar(\Rm\MainBundle\Entity\Image $avatar = null)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return \Rm\MainBundle\Entity\Image
     */
    public function getAvatar()
    {
        return $this->avatar;
    }
}
