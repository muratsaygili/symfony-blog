<?php

namespace BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\CategoryRepository")
 */
class Category
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
     * @ORM\Column(name="cat_ad", type="string", length=255)
     */
    private $catAd;

    /**
     * @var int
     *
     * @ORM\Column(name="cat_ust", type="integer")
     */
    private $catUst;


    /**
     * @ORM\OneToMany(targetEntity="BlogBundle\Entity\Post",mappedBy="kategori")
     */
    private $postlar;

    public function __construct()
    {
        $this->postlar=new ArrayCollection();
    }

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
     * Set catAd
     *
     * @param string $catAd
     *
     * @return Category
     */
    public function setCatAd($catAd)
    {
        $this->catAd = $catAd;

        return $this;
    }

    /**
     * Get catAd
     *
     * @return string
     */
    public function getCatAd()
    {
        return $this->catAd;
    }

    /**
     * Set catUst
     *
     * @param integer $catUst
     *
     * @return Category
     */
    public function setCatUst($catUst)
    {
        $this->catUst = $catUst;

        return $this;
    }

    /**
     * Get catUst
     *
     * @return integer
     */
    public function getCatUst()
    {
        return $this->catUst;
    }

    /**
     * Add postlar
     *
     * @param \BlogBundle\Entity\Post $postlar
     *
     * @return Category
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
}
