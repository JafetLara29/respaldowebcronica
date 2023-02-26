<?php
    include_once "data.php";
    if (file_exists("../Domain/News.php")) {
        include_once "../Domain/News.php";
    }else{
        include_once "./Domain/News.php";
    }
    class NewsData{
        
        public static function getAll(){
            $connection = Data::createInstance();
            $sql = $connection->query("SELECT * FROM tbnew");
            $news = $sql->fetchAll();
            return $news;
        }

        public static function getNewsByCategoryId($id){
            $connection = Data::createInstance();
            $sql = $connection->query("SELECT * FROM tbnew WHERE id_category = '".$id."'");
            $news = $sql->fetchAll();
            return $news;
        }
        
        public static function getFiveNewsByCategoryId($id){
            $connection = Data::createInstance();
            $sql = $connection->query("SELECT * FROM tbnew WHERE id_category = '".$id."' ORDER BY id DESC, date DESC LIMIT 5");
            $news = $sql->fetchAll();
            return $news;
        }

        public static function getLastTen(){
            $connection = Data::createInstance();
            $sql = $connection->prepare("CALL prc_getLastTen");
            $sql->execute();
            $news = [];
            foreach($sql->fetchAll() as $new){
                $news[] = $new;
            }
            // print_r($news);
            return $news;
        }
        public static function getMostViewNews(){
            $connection = Data::createInstance();
            $sql = $connection->prepare("CALL prc_getMostViewNews");
            $sql->execute();
            $news = [];
            foreach($sql->fetchAll() as $new){
                $news[] = $new;
            }
            // print_r($news);
            return $news;
        }
        public static function getLastFiveSportsNews(){
            $connection = Data::createInstance();
            $sql = $connection->prepare("CALL prc_getLastFiveSportsNews");
            $sql->execute();
            $news = [];
            foreach($sql->fetchAll() as $new){
                $news[] = $new;
            }
            // print_r($news);
            return $news;
        }
        public static function getLastFourNationalNews(){
            $connection = Data::createInstance();
            $sql = $connection->prepare("CALL prc_getLastFourNationalNews");
            $sql->execute();
            $news = [];
            foreach($sql->fetchAll() as $new){
                $news[] = $new;
            }
            // print_r($news);
            return $news;
        }
        public static function getLastFourRegionalNews(){
            $connection = Data::createInstance();
            $sql = $connection->prepare("CALL prc_getLastFourRegionalNews");
            $sql->execute();
            $news = [];
            foreach($sql->fetchAll() as $new){
                $news[] = $new;
            }
            // print_r($news);
            return $news;
        }
        public static function getLastFourSucesosNews(){
            $connection = Data::createInstance();
            $sql = $connection->prepare("CALL prc_getLastFourSucesosNews");
            $sql->execute();
            $news = [];
            foreach($sql->fetchAll() as $new){
                $news[] = $new;
            }
            // print_r($news);
            return $news;
        }
        public static function getLastFourEspectaculosNews(){
            $connection = Data::createInstance();
            $sql = $connection->prepare("CALL prc_getLastFourEspectaculosNews");
            $sql->execute();
            $news = [];
            foreach($sql->fetchAll() as $new){
                $news[] = $new;
            }
            // print_r($news);
            return $news;
        }
        public static function getLastFourTecnologiaNews(){
            $connection = Data::createInstance();
            $sql = $connection->prepare("CALL prc_getLastFourTecnologiaNews");
            $sql->execute();
            $news = [];
            foreach($sql->fetchAll() as $new){
                $news[] = $new;
            }
            // print_r($news);
            return $news;
        }
        public static function getSpecificNews($id){
            $connection = Data::createInstance();
            $sql = $connection->query("SELECT * FROM tbnew WHERE id='".$id."'");
            $news = $sql->fetch();
            return $news;
        }
        public static function getImageById($id){
            $connection = Data::createInstance();
            $sql = $connection->query("SELECT image FROM tbnew WHERE id='".$id."'");
            $news = $sql->fetch();
            return $news;
        }
        public static function save($news){
            $connection = Data::createInstance();
            $sql = $connection->prepare("INSERT INTO tbnew(id_category, id_journalist, title, bajadilla, image, description, date, time, state, img_type) VALUES(?,?,?,?,?,?,?,?,?,?)");
            $result = $sql->execute(array($news->getIdCategory(), $news->getIdJournalist(), $news->getTitle(), $news->getBajadilla(), $news->getImage(), nl2br($news->getDescription()), $news->getDate(), $news->getTime(), $news->getState(), $news->getImgType()));
            if($result){
                $sql = $connection->query("SELECT MAX(id) AS id FROM tbnew");
                $new_id = $sql->fetch();
                $suma = $new_id['id'];
                $sql = $connection->query("UPDATE tbfile SET new_id= '".$suma."' WHERE new_id='0'");
            }
            return $result;
        }

        public static function updateFileNewsId(){
            $connection = Data::createInstance();
            $sql = $connection->query("SELECT MAX(id) AS id FROM tbnew");
            $new_id = $sql->fetch();
            $suma = $new_id['id']+1;
        }

        public static function delete($id){
            $connection = Data::createInstance();
            
            $result = $connection->query("DELETE FROM tbnew WHERE id='".$id."'");
            $connection->query("DELETE FROM tbvisit WHERE newsid='".$id."'");
            return $result;
        }
        
        public static function edit($news, $option){
            $connection = Data::createInstance();
            if($option == 0){//! No viene imagen
                $result = $sql = $connection->query("UPDATE tbnew SET id_category = '".$news->getIdCategory()."', title='".$news->getTitle()."', bajadilla='".$news->getBajadilla()."', description='".$news->getDescription()."'  WHERE id='".$news->getIdNews()."'");
            }else{
                $result = $sql = $connection->query("UPDATE tbnew SET id_category = '".$news->getIdCategory()."', title='".$news->getTitle()."', bajadilla='".$news->getBajadilla()."', image='".$news->getImage()."', description='".$news->getDescription()."', img_type= '".$news->getImgType()."'  WHERE id='".$news->getIdNews()."'");
            }
            
            return $result;
        }
        
        public static function getLastInsertedID(){
            $connection = Data::createInstance();
            $sql = $connection->prepare("SELECT MAX(id) AS id FROM tbnew");
            $sql->execute();
            $news_id = $sql->fetch(PDO::FETCH_ASSOC);
            $max_id = $news_id['id'];
            return $max_id;
        }
        
    }
?>