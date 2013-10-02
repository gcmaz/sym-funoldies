<?php

namespace FunOldies\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * FunOldies\MainBundle\Entity\Concert
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="FunOldies\MainBundle\Entity\Repository\ConcertRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Concert
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string $title
     * 
     * @ORM\Column(name="title", type="string")
     */
    private $title;
            
    protected $stations;
    
    /**
     * @var string $content
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content;

    /**
     * @var Media $picture
     *
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"all"})
     */
    private $picture;

    /**
     * @var Link $link
     *
     * @ORM\Column(name="link", type="string", nullable=true)
     */
    private $link;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $concertDate;
    
    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $showKNOT;
    
    /**
     * @var boolean $published
     *
     * @ORM\Column(name="published", type="boolean")
     */
    private $published;

    public function __toString()
    {
        return ($this->getTitle() === null) ? 'Upcoming Concert' : (string) $this->getTitle();
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
     * Set title
     *
     * @param string $title
     * @return Concert
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Concert
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Concert
     */
    public function setLink($link)
    {
        $this->link = $link;
    
        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set concertDate
     *
     * @param \DateTime $concertDate
     * @return Concert
     */
    public function setConcertDate($concertDate)
    {
        $this->concertDate = $concertDate;
    
        return $this;
    }

    /**
     * Get concertDate
     *
     * @return \DateTime 
     */
    public function getConcertDate()
    {
        return $this->concertDate;
    }

    /**
     * Set showKNOT
     *
     * @param boolean $showKNOT
     * @return Concert
     */
    public function setShowKNOT($showKNOT)
    {
        $this->showKNOT = $showKNOT;
    
        return $this;
    }

    /**
     * Get showKNOT
     *
     * @return boolean 
     */
    public function getShowKNOT()
    {
        return $this->showKNOT;
    }

    /**
     * Set published
     *
     * @param boolean $published
     * @return Concert
     */
    public function setPublished($published)
    {
        $this->published = $published;
    
        return $this;
    }

    /**
     * Get published
     *
     * @return boolean 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set picture
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $picture
     * @return Concert
     */
    public function setPicture(\Application\Sonata\MediaBundle\Entity\Media $picture = null)
    {
        $this->picture = $picture;
    
        return $this;
    }

    /**
     * Get picture
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getPicture()
    {
        return $this->picture;
    }
}