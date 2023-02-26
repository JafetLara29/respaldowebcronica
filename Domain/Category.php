<?php 

class Category{

    private $idCategory;
    private $name;

    public function __construct($idCategory, $name)
    {
        $this->idCategory = $idCategory;
        $this->name = $name;        
    }

    public function setId($idCategory){
        $this->idCategory = $idCategory;
    }
    public function getId(){
        return $this->idCategory;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }

}
?>