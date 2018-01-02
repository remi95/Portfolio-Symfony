<?php

namespace Rm\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity(repositoryClass="Rm\MainBundle\Repository\ImageRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Image
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
     * @ORM\Column(name="extension", type="string", length=15)
     */
    private $extension;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt;

    // Variables qui ne sont pas en BDD, permettent de faire l'upload correctement
    private $file;
    private $tempFilename;

    public function getFile(){
        return $this->file;
    }

    public function setFile(UploadedFile $file){
        $this->file = $file;

        if($this->extension !== null){
            $this->tempFilename = $this->extension;
        }

        $this->extension = null;
        $this->alt = null;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload(){
        // Si pas de fichier ajouté dans le form
        if($this->file === null){
            return;
        }

        // Récupère l'extension du fichier
        $this->extension = $this->file->guessExtension();
        // Récupère le nom du fichier client
        $this->alt = $this->file->getClientOriginalName();
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload(){
        // Si pas de fichier ajouté dans le form
        if($this->file === null){
            return;
        }

        // On supprime l'ancien fichier
        if($this->tempFilename !== null){
            $oldFile = $this->getUploadRootDir().'/'.$this->id.'/'.$this->tempFilename;
            if(file_exists($oldFile)){
                unlink($oldFile);
            }
        }

        //On upload le nouveau
        $this->file->move(
            $this->getUploadRootDir(),              // Dossier destination
            $this->id.'.'.$this->extension      // Nom du fichier 'id.ext'
        );
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
        // On sauvegarde l'id car il n'y sera plus une fois l'entité supprimée de la BDD
        $this->tempFilename = $this->getUploadDir().'/'.$this->id.'.'.$this->tempFilename;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if(file_exists($this->tempFilename)){
            unlink($this->tempFilename);
        }
    }

    public function getUploadDir()
    {
        return 'uploads/img';
    }

    public function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    public function getWebPath(){
        return $this->getUploadDir().'/'.$this->getId().'.'.$this->getExtension();
    }


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
     * Set alt
     *
     * @param string $alt
     *
     * @return Image
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Set extension
     *
     * @param string $extension
     *
     * @return Image
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }
}
