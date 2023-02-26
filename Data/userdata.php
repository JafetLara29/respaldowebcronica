<?php
    include_once "data.php";
    include_once "../Domain/User.php";
    class UserData{
        
        public static function getUsers(){
            $connection = Data::createInstance();
            $sql = $connection->query("SELECT * FROM tbuser");
            $users = $sql->fetchAll();
            return $users;
        }

        public static function save($user){
            $connection = Data::createInstance();
            $sql = $connection->prepare("INSERT INTO tbuser(user_name, password, type_user) VALUES(?,?,?)");
            $result = $sql->execute(array($user->getUserName(), $user->getPassword(), $user->getUserType()));
            return $result;
        }

        public static function delete($id){
            $connection = Data::createInstance();
            $result = $connection->query("DELETE FROM tbuser WHERE id_user='".$id."'");
            return $result;
        }
        
        public static function edit($user){
            $connection = Data::createInstance();
            $result = $connection->query("UPDATE tbuser SET user_name='".$user->getUserName()."', password='".$user->getPassword()."', type_user='".$user->getUserType()."' WHERE id_user='".$user->getIdUser()."'");
            
            return $result;
        }
        
    }
?>