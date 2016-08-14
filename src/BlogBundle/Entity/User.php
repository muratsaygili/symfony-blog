<?php
/**
 * Created by PhpStorm.
 * User: murat
 * Date: 04.08.2016
 * Time: 11:09
 */

// src/BlogBundle/Entity/User.php

namespace BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * User constructor.
     * @ORM\OneToMany(targetEntity="BlogBundle\Entity\Post",mappedBy="user")
     */
    private $postlar;

    /**
     * User constructor.
     * @ORM\OneToMany(targetEntity="BlogBundle\Entity\Comment",mappedBy="user")
     */
    private $comments;


    public function __construct()
    {
        $this->postlar=new ArrayCollection();
        $this->comments=new ArrayCollection();

        parent::__construct();
        // your own logic
    }



    /**
     * Add postlar
     *
     * @param \BlogBundle\Entity\Post $postlar
     *
     * @return User
     */
    public function addPostlar(\BlogBundle\Entity\Post $postlar)
    {
        $this->postlar[] = $postlar;

        return $this;
    }

    /**
     * Remove postlar
     *
     * @param \BlogBundle\Entity\Post $postlar
     */
    public function removePostlar(\BlogBundle\Entity\Post $postlar)
    {
        $this->postlar->removeElement($postlar);
    }

    /**
     * Get postlar
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPostlar()
    {
        return $this->postlar;
    }

    /**
     * Add comment
     *
     * @param \BlogBundle\Entity\Comment $comment
     *
     * @return User
     */
    public function addComment(\BlogBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \BlogBundle\Entity\Comment $comment
     */
    public function removeComment(\BlogBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }
}
