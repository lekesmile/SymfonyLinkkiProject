<?php

namespace App\Entity;

class Henkilo{
    private $etunimi;
    private $sukunimi;
    private $email;
    private $kirjauspvm;
    


    /*** Get the value of etunimi*/ 
    public function getEtunimi(){
        return $this->etunimi;
    }

    /*** Set the value of etunimi** @return  self*/ 
    public function setEtunimi($etunimi){
        $this->etunimi = $etunimi;

        return $this;
    }

    /*** Get the value of sukunimi*/ 
    public function getSukunimi(){
        return $this->sukunimi;
    }

    /*** Set the value of sukunimi** @return  self*/ 
    public function setSukunimi($sukunimi){
        $this->sukunimi = $sukunimi;

        return $this;
    }

    /*** Get the value of email*/ 
    public function getEmail(){
        return $this->email;
    }

    /*** Set the value of email** @return  self*/ 
    public function setEmail($email){
        $this->email = $email;

        return $this;
    }

    /*** Get the value of kirjauspvm*/ 
    public function getKirjauspvm(){
        return $this->kirjauspvm;
    }

    /*** Set the value of kirjauspvm** @return  self*/ 
    public function setKirjauspvm(\DateTimeInterface $kirjauspvm){
        $this->kirjauspvm = $kirjauspvm;

        return $this;
    }
}

?>