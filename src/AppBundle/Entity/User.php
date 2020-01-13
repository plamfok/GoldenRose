<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\OneToMany;
/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface
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
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="fullName", type="string", length=255)
     */
    private $fullName;
    
    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Booking",mappedBy="author")
     */
    private $booking;
    /**
     *
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Role")
     *
     * @ORM\JoinTable(name="users_roles",joinColumns={@ORM\JoinColumn(name="user_id",referencedColumnName="id")},inverseJoinColumns={@ORM\JoinColumn(name="role_id",referencedColumnName="id")})
     */
    private $roles;
    
    public function __construct() {
        $this->booking = new ArrayCollection();
        
        $this->roles= new ArrayCollection();
    }
    //@param Ambigous <\Doctrine\Common\Collections\Collection, multitype:\AppBundle\Entity\Role > $roles
    /**
     * @param Role $role
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
        return $this;
    }
    
    /**
     * @param Role $role
     * @return User
     *
     */
    public function addRole(Role $role)
    {
        $this->roles[] = $role;
        return $this;
    }
/**
 * 
 * @param Booking $booking
 * @return \AppBundle\Entity\User
 */
    public function addBooking(Booking $booking)
    {
        $this->booking[] = $booking;
        return $this;
    }
    /**
     * @return ArrayCollection
     */
    public function getABooking()
    {
        return $this->booking;
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
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set fullName
     *
     * @param string $fullName
     *
     * @return User
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }
    
    public function eraseCredentials()
    
    {
        
    }
    public function getSalt()
    
    {
        
    }
    
    public function getRoles()
    {
        $stringRoles = [];
        foreach ($this->roles as $role)
        {
            /** @var Role $role*/
            
            $stringRoles[]= $role->getRole();
            
        }
        
        return $stringRoles;
    }
    public function getUsername()
    {
        return $this->email;
    }
// /**
//  * String representation of this object
//  * @return string
//  */
// public function __toString()
// {
//     try {
//         return (string) $this->name;
//     } catch (Exception $exception) {
//         return '';
//     }
// }
}

