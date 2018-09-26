<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 *@ORM\Entity(repositoryClass="App\Repository\BlogRepository")
 */

class Blog {
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     *@ORM\Column(type="integer")
     */
    private $user_id;
    /**
     * @Assert\NotBlank(message="Blog heading is required")
     * @ORM\Column(type="string", length=555)
     */
    private $heading;

    /**
     *@ORM\Column(type="string", length=555, unique=true)
     */
    private $slug;

    /**
     * @Assert\NotBlank(message="Blog description is required.")
     * @ORM\Column(type="text")
     */
    private $description;

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
     *@return mixed
     */
    public  function getUserId(){
        return $this->user_id;
    }
    /**
     *@param mixed $user_id
     */
    public function setUserId($user_id){
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getHeading(){
        return $this->heading;
    }
    /**
     * @param mixed $heading
     */
    public function setHeading($heading){
        $this->heading = $heading;
    }

    /**
     * @return mixed
     */
    public function getSlug(){
        return $this->slug;
    }
    /**
     * @param mixed $slug
     */
    public function setSlug($slug){
        return $this->slug = $slug;
    }

    /**
     *@return mixed
     */
    public function getDescription(){
        return $this->description;
    }
    /**
     * @param mixed $description
     */
    public function setDesciprtion($desciption){
        $this->description = $desciption;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}