<?php
    include_once "data.php";
    include_once "../Domain/Queja.php";
    class YoMeQuejoData{
        
        public static function getAllWaiting(){
            $connection = Data::createInstance();
            $sql = $connection->query("SELECT * FROM tbqueja WHERE state='0'");
            $ads = $sql->fetchAll();
            return $ads;
        }
        public static function getAllAccepted(){
            $connection = Data::createInstance();
            $sql = $connection->query("SELECT * FROM tbqueja WHERE state='1'");
            $ads = $sql->fetchAll();
            return $ads;
        }
        public static function save($queja){
            $connection = Data::createInstance();
            $sql = $connection->prepare("INSERT INTO tbqueja(title, description, autor, date) VALUES(?,?,?,?)");
            $result = $sql->execute(array($queja->getTitle(), $queja->getDescription(), $queja->getAutor(), $queja->getDate()));
            return $result;
        }

        public static function reject($id){
            $connection = Data::createInstance();
            $result = $connection->query("DELETE FROM tbqueja WHERE id='".$id."'");
            return $result;
        }
        
        public static function accept($id){
            $connection = Data::createInstance();
            $result = $connection->query("UPDATE tbqueja SET state='1' WHERE id='".$id."'");
            
            return $result;
        }
        
    }
?>