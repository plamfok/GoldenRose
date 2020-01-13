<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\PropertyAccess\Tests\Fixtures\ReturnTyped;
use Doctrine\ORM\Mapping\ManyToOne;
/**
 * Booking
 *
 * @ORM\Table(name="bookings")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BookingRepository")
 */
class Booking
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
     *
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User",inversedBy="booking")
     * @ORM\JoinColumn(name="authorId",referencedColumnName="id")
     */
    private $author;
    /**
     * @var int
     *
     * @ORM\Column(name="authorId", type="integer")
     */
    private $authorId;
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="checkin", type="string", length=255)
     */
    private $checkin;

    /**
     * @var string
     *
     * @ORM\Column(name="checkout", type="string", length=255)
     */
    private $checkout;
    
     /**
      * @ORM\Column(name="email", type="string", length=255)
      * @var string
      */
    private $email;

     /**
      * @ORM\Column(name="gsm", type="string", length=255)
      * @var string
      */
    private $gsm;

    /**
     * @var int
     *
     * @ORM\Column(name="guests", type="integer")
     */
    private $guests;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAdded", type="datetime")
     */
    private $dateAdded;
    
    public function __construct()
    {
        $this->dateAdded=new \DateTime('now');
    }
    
    /**
     * @return number
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }
    
    
    /**
     * @param integer $authorId
     *
     * @return Booking
     */
    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
        return $this;
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
     * Set name
     *
     * @param string $name
     *
     * @return Booking
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set checkin
     *
     * @param string $checkin
     *
     * @return Booking
     */
    public function setCheckin($checkin)
    {
        $this->checkin = $checkin;

        return $this;
    }

    /**
     * Get checkin
     *
     * @return string
     */
    public function getCheckin()
    {
        return $this->checkin;
    }

    /**
     * Set checkout
     *
     * @param string $checkout
     *
     * @return Booking
     */
    public function setCheckout($checkout)
    {
        $this->checkout = $checkout;

        return $this;
    }

    /**
     * Get checkout
     *
     * @return string
     */
    public function getCheckout()
    {
        return $this->checkout;
    }

    /**
     * Set guests
     *
     * @param integer $guests
     *
     * @return Booking
     */
    public function setGuests($guests)
    {
        $this->guests = $guests;

        return $this;
    }

    /**
     * Get guests
     *
     * @return int
     */
    public function getGuests()
    {
        return $this->guests;
    }
    /**
     * @return \AppBundle\Entity\User
     */
    public function getAuthor()
    {
        return $this->author;
    }
    
    /**
     * @param \AppBundle\Entity\User $author
     *
     * @return Booking
     */
    public function setAuthor(User $author = null)
    {
        $this->author = $author;
        return $this;
    }
    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     *
     * @return Booking
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;
        
        return $this;
    }
    
    /**
     * Get dateAdded
     *
     * @return \DateTime
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Get gsm
     *
     * @return  string
     */ 
    public function getGsm()
    {
        return $this->gsm;
    }

    /**
     * Set gsm
     *
     * @param  string  $gsm
     *
     * @return  Booking
     */ 
    public function setGsm($gsm)
    {
        $this->gsm = $gsm;

        return $this;
    }

    /**
     * Get email
     *
     * @return  string
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set  email
     *
     * @param  string  $email
     *
     * @return  Booking
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    public function isAdmin(){
        return in_array("ROLE_ADMIN",$this->getRoles());
    }
}

