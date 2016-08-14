<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\PostRepository")
 */
class Post
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
     * @ORM\Column(name="baslik", type="string", length=255)
     */
    private $baslik;

    /**
     * @var string
     *
     * @ORM\Column(name="icerik", type="text")
     */
    private $icerik;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tarih", type="datetime")
     */
    private $tarih;

    /**
     * @ORM\ManyToOne(targetEntity="BlogBundle\Entity\User",inversedBy="postlar")
     * @ORM\JoinColumn(referencedColumnName="id",name="user_id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="BlogBundle\Entity\Category",inversedBy="postlar")
     * @ORM\JoinColumn(referencedColumnName="id",name="kat_id")
     */
    private $kategori;

    /**
     * User constructor.
     * @ORM\OneToMany(targetEntity="BlogBundle\Entity\Comment",mappedBy="post")
     */
    private $comments;


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
     * Set baslik
     *
     * @param string $baslik
     *
     * @return Post
     */
    public function setBaslik($baslik)
    {
        $this->baslik = $baslik;

        return $this;
    }

    /**
     * Get baslik
     *
     * @return string
     */
    public function getBaslik()
    {
        return $this->baslik;
    }

    /**
     * Set icerik
     *
     * @param string $icerik
     *
     * @return Post
     */
    public function setIcerik($icerik)
    {
        $this->icerik = $icerik;

        return $this;
    }

    /**
     * Get icerik
     *
     * @return string
     */
    public function getIcerik()
    {
        return $this->icerik;
    }

    /**
     * Set tarih
     *
     * @param \DateTime $tarih
     *
     * @return Post
     */
    public function setTarih($tarih)
    {
        $this->tarih = $tarih;

        return $this;
    }

    /**
     * Get tarih
     *
     * @return \DateTime
     */
    public function getTarih()
    {
        return $this->tarih;
    }

    /**
     * Set user
     *
     * @param \BlogBundle\Entity\User $user
     *
     * @return Post
     */
    public function setUser(\BlogBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \BlogBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set kategori
     *
     * @param \BlogBundle\Entity\Category $kategori
     *
     * @return Post
     */
    public function setKategori(\BlogBundle\Entity\Category $kategori = null)
    {
        $this->kategori = $kategori;

        return $this;
    }

    /**
     * Get kategori
     *
     * @return \BlogBundle\Entity\Category
     */
    public function getKategori()
    {
        return $this->kategori;
    }

    /**
     * Add comment
     *
     * @param \BlogBundle\Entity\Comment $comment
     *
     * @return Post
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
