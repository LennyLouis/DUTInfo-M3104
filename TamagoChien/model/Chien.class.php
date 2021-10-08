<?php

class Chien {
    private $nom;
    private $humeur;
    private $sante;
    private $energie;
    private $hygiene;

    /**
     * @param $nom
     */
    public function __construct($nom)
    {
        $this->nom = $nom;
        $this->humeur = 50;
        $this->sante = 50;
        $this->energie = 50;
        $this->hygiene = 50;
    }


    public function aboi(){
        return "Wouaf ! Wouaf !";
    }

    public function dormir(){
        $this->sante += 20;
        $this->humeur += 20;
    }

    public function mord($mordu){

    }

    public function manger(Nourriture $aliment){
        $this->sante += $aliment->getSante();
        $this->humeur += $aliment->getHumeur();
        return $this->nom." à mangé ".$aliment->getNom()." et cela lui a apporté ".$aliment->getHumeur()." points d'humeur et ".$aliment->getSante()." points de santé.";
    }

    public function sePromener(){
        $this->sante += 60;
        $this->energie += -40;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }
}