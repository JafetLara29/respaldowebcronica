<?php
    class Ad{
        private $idAd;
        private $image;
        private $description;
        private $page;
        private $position;
        private $link;

        public function __construct($idAd, $description, $image, $page, $position, $link){
            $this->idAd = $idAd;
            $this->description = $description;
            $this->image = $image;
            $this->page = $page;      
            $this->position = $position; 
            $this->link = $link; 
        }
        public function setLink($link){
            $this->link = $link;
        }
        public function getLink(){
            return $this->link;
        }
        public function setPage($page){
            $this->page = $page;
        }
        public function getPage(){
            return $this->page;
        }
        public function setPosition($position){
            $this->position = $position;
        }
        public function getPosition(){
            return $this->position;
        }
        public function setIdAd($idAd){
            $this->idAd = $idAd;
        }
        public function setImage($image){
            $this->image = $image;
        }

        public function getIdAd(){
            return $this->idAd;
        }
        public function getDescription(){
            return $this->description;
        }
        public function getImage(){
            return $this->image;
        }
    }
?>