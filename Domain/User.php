<?php
    class User{

        private $idUser;
        private $userName;
        private $password;
        private $userType;

        public function __construct($idUser, $userName, $password, $userType){
            $this->idUser = $idUser;
            $this->userName = $userName;
            $this->password = $password;
            $this->userType = $userType;
        }
        
        //Metodos set y get
        public function setIdUser($idUser){
            $this->idUser = $idUser;
        }
        public function setUserName($userName){
            $this->userName = $userName;
        }
        public function setPassword($password){
            $this->password = $password;
        }
        public function setUserType($userType){
            $this->userType = $userType;
        }
        
        public function getIdUser(){
            return $this->idUser;
        }
        public function getUserName(){
            return $this->userName;
        }
        public function getPassword(){
            return $this->password;
        }
        public function getUserType(){
            return $this->userType;
        }

    }
?>