<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

//use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */

class User {
     /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="fullname is required.")
     * @ORM\Column(type="string", length=255)
     */

    protected $name;

    /**
     * @Assert\NotBlank(message="Email is required.")
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
      * @ORM\Column(type="string", length=255)
     */

    protected $email;
    /**
     * @Assert\NotBlank(message="Password is required.")
     * @ORM\Column(type="string", length=255,)
     * 
     */

    protected $password; 

    protected $dob;


    /**
     * @return mixed
     */


    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */

    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */

     public function getName(){
         return $this->name;
     }

     /**
      * @param mixed $name
      */

      public function setName($name): void{
        $this->name = $name;
      }

    /**
     * @return mixed
     */

     public function getEmail(){
         return $this->email;
     }

     /**
      * @param mixed $email
      */

      public function setEmail($email): void{
        $this->email = $email;
      }
    /**
     * @return mixed
     */

     public function getPassword(){
         return $this->password;
     }

     /**
      * @param mixed $password
      */

      public function setPassword($password): void{
        $this->password = $password;
      }

      /**
     * @return mixed
     */

      public function getDOB()
      {
          return $this->dob;
      }
  
      /**
       * @param mixed $dob
       */
  
      public function setDOB($dob): void
      {
          $this->dob = $dob;
      }

      public function getSalt()
    {
        // The bcrypt and argon2i algorithms don't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return "THISISSALT";
    }

}