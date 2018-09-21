<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Signup{
    /**
     * @Assert\NotBlank(message="fullname is required.")
     */

    protected $name;
    /**
     * @Assert\NotBlank(message="Email is required.")
     */

    protected $email;
    /**
     * @Assert\NotBlank(message="Password is required.")
     */

    protected $password;

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

}