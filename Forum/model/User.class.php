<?php

include_once('Database.class.php');

class User {
    private $username;
    private $mail;

    /**
     * @param $username
     * @param $mail
     */
    public function __construct($username, $mail)
    {
        $this->username = $username;
        $this->mail = $mail;
    }

    // Methods

    public static function checkUserPassword($username, $password){
        try {
            $connection = new Database();
            $bdd = $connection->getBdd();
            $sql = "SELECT * FROM user WHERE username = ?";
            $arguments = array();
            array_push($arguments, $username);

            $reponse = $bdd->prepare($sql);

            if (is_object($reponse)) {
                $reponse->execute($arguments);
                $tmp = $reponse->fetch();
                if ($tmp[3] == $password) {
                    return new User($tmp[1],$tmp[2]);
                } else if($tmp==""){
                    return "username-error";
                } else {
                    return "password-error";
                }
            }

        } catch (PDOExeption $err) {
            echo "Erreur : " . $e->getMessage() . "<br />";
            return "bdd-connection-error";
        }
        return "error";
    }

    // Getters / Setters

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }




}