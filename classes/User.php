<?php

class User{
   private $firstName;
   private $lastName;
   private $dateOfBirth;
   private $email;

   public function __construct($firstName, $lastName) {
      $this->firstName = $firstName;
      $this->lastName = $lastName;
   }

  
   
   // public function __construct($firstName, $lastName, $email) {
   //  $this->firstName = $firstName;
   //  $this->lastName = $lastName;
   //  $this->email = $email;
   // }


      //getter & setter firstName
   public function setName($firstName) {
    $this->firstName = $firstName;
   }

   public function getName() {
    return $this->firstName;
   }

  //getter & setter lastName
   public function setLastName($lastName) {
    $this->lastName = $lastName;
   }

   public function getLastName() {
    return $this->lastName;
   }
   //getter & setter dateOfbirth
   public function setDateOfBirth($dateOfBirth) {
      $this->dateOfBirth = $dateOfBirth;
   }

   public function getDateOFBirth(){
      return $this->dateOfBirth;
   }

   //getter & setter email
   public function setEmail($email) {
      $this->email = $email;
   }

   public function getEmail() {
      return $this->email;
   }



   public function message() {
    echo "salut now";
   }

}