<?php

    class Journalist{

        private $idJournalist;
        private $lastName;
        private $name;

        public function __construct($idJournalist, $lastName, $name){
            $this->idJournalist = $idJournalist;
            $this->lastName = $lastName;
            $this->name = $name;
        }

        public function setIdJournalist($idJournalist){
            $this->idJournalist = $idJournalist;
        }
        public function setLastName($lastName){
            $this->lastName = $lastName;
        }
        public function setName($name){
            $this->name = $name;
        }

        public function getIdJournalist(){
            $this->idJournalist;
        }
        public function getLastName(){
            $this->lastName;
        }
        public function getName(){
            $this->name;
        }

    }
?>