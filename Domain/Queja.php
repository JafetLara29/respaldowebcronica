<?php
    class Queja{
        private $autor;
        private $title;
        private $description;
        private $date;

        public function __construct($autor, $title, $description, $date){
            $this->autor = $autor;
            $this->title = $title;
            $this->description = $description;
            $this->date = $date;
        }

        public function getTitle(){
            return $this->title;
        }
        public function getDescription(){
            return $this->description;
        }
        public function getAutor(){
            return $this->autor;
        }
        public function getDate(){
            return $this->date;
        }
    }
?>