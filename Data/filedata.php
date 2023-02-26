<?php
    include_once "data.php";
    class FileData{
        
        public static function getAll(){
            $connection = Data::createInstance();
            
            // $sql = $connection->query("SELECT MAX(id) AS id FROM tbnew");
            // $new_id = $sql->fetch();
            // $suma = $new_id['id']+1;
            $sql = $connection->query("SELECT * FROM tbfile WHERE new_id = '0'");
            $files = $sql->fetchAll();
            // print_r($files);
            return $files;
        }
        public static function getByNewsId($newId){
            $connection = Data::createInstance();
            $sql = $connection->query("SELECT * FROM tbfile WHERE new_id = '".$newId."'");
            $files = $sql->fetchAll();
            return $files;
        }
        public static function getById($id){
            $connection = Data::createInstance();
            $sql = $connection->query("SELECT * FROM tbfile WHERE id = '".$id."'");
            $files = $sql->fetch();
            return $files;
        }
        public static function save($name, $type, $file){
            $connection = Data::createInstance();
            $sql = $connection->prepare("INSERT INTO tbfile(new_id, name, type, file) VALUES(?,?,?,?)");
            $result = $sql->execute(array(0, $name, $type, $file));
            return $result;
        }
        public static function saveFromEdit($name, $type, $file, $newsId){
            $connection = Data::createInstance();
            $sql = $connection->prepare("INSERT INTO tbfile(new_id, name, type, file) VALUES(?,?,?,?)");
            $result = $sql->execute(array($newsId, $name, $type, $file));
            return $result;
        }
        public static function delete($id){
            $connection = Data::createInstance();
            $result = $connection->query("DELETE FROM tbfile WHERE id='".$id."'");
            return $result;
        }
        public static function edit($id, $name, $type, $file){
            $connection = Data::createInstance();
            $result = $connection->query("UPDATE tbfile SET name='".$name."', type='".$type."', file='".$file."' WHERE id='".$id."'");
            return $result;
        }
    }
?>