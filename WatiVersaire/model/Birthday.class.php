<?php
date_default_timezone_set('Europe/Paris');

class Birthday {
    private $birthDate;
    private $path;
    private $slogan;

    /**
     * @param $birthDate
     * @param $path
     * @param $slogan
     */
    public function __construct($birthDate, $path, $slogan)
    {
        $this->birthDate = $birthDate;
        $this->path = $path;
        $this->slogan = $slogan;
    }

    public function getFutureAge(){

    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getSlogan()
    {
        return $this->slogan;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        $bDate = strtotime($this->getBirthDate());

        return "ki spasra le ". date("j F", $bDate). " prochain";
    }


}