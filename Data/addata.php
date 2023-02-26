<?php
    include_once "data.php";
    include_once "../Domain/Ad.php";
    class AdData{
        
        public static function getAll(){
            $connection = Data::createInstance();
            $sql = $connection->query("SELECT * FROM tbad");
            $ads = $sql->fetchAll();
            return $ads;
        }
        public static function getImageById($id){
            $connection = Data::createInstance();
            $sql = $connection->query("SELECT image FROM tbad WHERE id= '".$id."'");
            $ads = $sql->fetch();
            return $ads['image'];
        }

        public static function save($ad){
            $connection = Data::createInstance();
            $sql = $connection->prepare("INSERT INTO tbad(description, image, page, position, link) VALUES(?,?,?,?,?)");
            $result = $sql->execute(array($ad->getDescription(), $ad->getImage(), $ad->getPage(), $ad->getPosition(), $ad->getLink()));
            return $result;
        }

        public static function delete($id){
            $connection = Data::createInstance();
            $result = $connection->query("DELETE FROM tbad WHERE id='".$id."'");
            return $result;
        }
        
        public static function edit($ad, $option){
            $connection = Data::createInstance();
            if($option == 0){//! No viene imagen
                $result = $connection->query("UPDATE tbad SET description='".$ad->getDescription()."', page='".$ad->getPage()."', position='".$ad->getPosition()."', link='".$ad->getLink()."' WHERE id='".$ad->getIdAd()."'");
            }else{//* Viene imagen
                $result = $connection->query("UPDATE tbad SET description='".$ad->getDescription()."', image='".$ad->getImage()."', page='".$ad->getPage()."', position='".$ad->getPosition()."'', link='".$ad->getLink()."' WHERE id='".$ad->getIdAd()."'");
            }
            
            return $result;
        }
        
    }
?>