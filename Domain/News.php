<?php 

class News
{
    private $idNews;
    private $idCategory;
    private $idJournalist;
    private $title;
    private $bajadilla;
    private $image;
    private $description;
    private $file;
    private $date;
    private $time;
    private $state;
    private $imgType;
    

    public function __construct($idNews,$idCategory,$idJournalist,$title,$bajadilla,$image,$description,$date,$time,$state, $imgType)
    {
        $this->idNews = $idNews;
        $this->idCategory = $idCategory;
        $this->idJournalist = $idJournalist;
        $this->title = $title;
        $this->bajadilla = $bajadilla;
        $this->image = $image;
        $this->description = $description;
        $this->date = $date;
        $this->time = $time;
        $this->state = $state;
        $this->imgType = $imgType;      
             
    }

    
    public function setIdNews($idNews){
        $this->idNews = $idNews;
    }
    public function getIdNews(){
        return $this->idNews;
    }
    public function setIdCategory($idCategory){
        $this->idCategory = $idCategory;
    }
    public function getIdCategory(){
        return $this->idCategory;
    }
    public function setIdJournalist($idJournalist){
        $this->idJournalist = $idJournalist;
    }
    public function getIdJournalist(){
        return $this->idJournalist;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function getTitle(){
        return $this->title;
    }
    public function setBajadilla($bajadilla){
        $this->title = $bajadilla;
    }
    public function getBajadilla(){
        return $this->bajadilla;
    }
    public function setImage($image){
        $this->image = $image;
    }
    public function getImage(){
        return $this->image;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDate($date){
        $this->date = $date;
    }
    public function getDate(){
        return $this->date;
    }
    public function setTime($time){
        $this->time = $time;
    }
    public function getTime(){
        return $this->time;
    }
    public function setState($state){
        $this->state = $state;
    }
    public function getState(){
        return $this->state;
    }
    public function setImgType($imgType){
        $this->imgType = $imgType;
    }
    public function getImgType(){
        return $this->imgType;
    }
}
?>