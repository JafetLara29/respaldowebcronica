<?php
    include_once "data.php";
    if (file_exists("../Domain/Category.php")) {
        include_once "../Domain/Category.php";
    }else{
        include_once "./Domain/Category.php";
    }
    class CategoryData{
        
        public static function getAll(){
            $connection = Data::createInstance();
            $sql = $connection->query("SELECT * FROM tbcategory");
            $categories = $sql->fetchAll();
            return $categories;
        }
        public static function getNameById($id){
            $connection = Data::createInstance();
            $sql = $connection->query("SELECT name FROM tbcategory WHERE id='".$id."'");
            $name = $sql->fetch();
            return $name['name'];
        }
        public static function save($category){
            $connection = Data::createInstance();
            $sql = $connection->prepare("INSERT INTO tbcategory(name) VALUES(?)");
            $result = $sql->execute(array($category->getName()));
            return $result;
        }

        public static function delete($id){
            $connection = Data::createInstance();
            $result = $connection->query("DELETE FROM tbcategory WHERE id='".$id."'");
            return $result;
        }
        
        public static function edit($category){
            $connection = Data::createInstance();
            $result = $sql = $connection->query("UPDATE tbcategory SET name = '".$category->getName()."' WHERE id='".$category->getId()."'");            
            return $result;
        }
        
    }
?>