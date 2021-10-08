<?php

class Nourriture {
    private $nom;
    private $sante;
    private $humeur;

    /**
     * @param $nom
     * @param $sante
     * @param $humeur
     */
    public function __construct($nom, $sante, $humeur)
    {
        $this->nom = $nom;
        $this->sante = $sante;
        $this->humeur = $humeur;
    }


    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getSante()
    {
        return $this->sante;
    }

    /**
     * @return mixed
     */
    public function getHumeur()
    {
        return $this->humeur;
    }


}