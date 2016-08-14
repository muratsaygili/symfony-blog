<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\CommentRepository")
 */
class Comment
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
     * @ORM\Column(name="yorum_icerik", type="text")
     */
    private $yorumIcerik;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="yorum_tarihi", type="datetime")
     */
    private $yorumTarihi;

    /**
     * @ORM\ManyToOne(targetEntity="BlogBundle\Entity\User",inversedBy="comments")
     * @ORM\JoinColumn(referencedColumnName="id",name="user_id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="BlogBundle\Entity\Post",inversedBy="comments")
     * @ORM\JoinColumn(referencedColumnName="id",name="post_id")
     */
    private $post;



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
     * Set yorumIcerik
     *
     * @param string $yorumIcerik
     *
     * @return Comment
     */
    public function setYorumIcerik($yorumIcerik)
    {
        $this->yorumIcerik = $yorumIcerik;

        return $this;
    }

    /**
     * Get yorumIcerik
     *
     * @return string
     */
    public function getYorumIcerik()
    {
        return $this->yorumIcerik;
    }

    /**
     * Set yorumTarihi
     *
     * @param \DateTime $yorumTarihi
     *
     * @return Comment
     */
    public function setYorumTarihi($yorumTarihi)
    {
        $this->yorumTarihi = $yorumTarihi;

        return $this;
    }

    /**
     * Get yorumTarihi
     *
     * @return \DateTime
     */
    public function getYorumTarihi()
    {
        return $this->yorumTarihi;
    }

    /**
     * Set user
     *
     * @param \BlogBundle\Entity\User $user
     *
     * @return Comment
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
     * Set post
     *
     * @param \BlogBundle\Entity\Post $post
     *
     * @return Comment
     */
    public function setPost(\BlogBundle\Entity\Post $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return \BlogBundle\Entity\Post
     */
    public function getPost()
    {
        return $this->post;
    }
}
