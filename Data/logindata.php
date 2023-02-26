<?php
    include_once "data.php";

    class LoginData{
        //Verificacion de usuario y contraseña
        public static function validate($username, $password){
            $connection = Data::createInstance();
            $type = "invalid";
            
            //Verificamos si el usuario existe
            $sql = $connection->query("SELECT password, type_user FROM tbuser where user_name = '".$username."'");
            $result = $sql->fetch();
            //Si se reciben coincidencias
            if($result){
                //Verificamos si la contraseña coincide
                if(strcmp($password, $result['password']) == 0){
                    //Si la contra coincide procedemos a extraer el tipo de usuario
                    $type = $result['type_user'];
                }else{
                    //Si la contra no coincide procedemos a enviar un valor inválido para su procesamiento en la action 
                    $type = "invalid";
                }
            }
            return $type;
        }

        // public static function getAgreements(){
        //     $connection = Data::createInstance();
        //     $sql = $connection->query("SELECT * FROM tbregister where type='convenio'");
        //     $agreements = [];
        //     foreach ($sql->fetchAll() as $legal) {
        //         $agreements[] = new Agreement($legal['id'], $legal['title'], $legal['description'], $legal['image_path'], $legal['date'], "");
        //     }
        //     return $agreements;
        // }

        // public static function save($register){
        //     $connection = Data::createInstance();
        //     $sql = $connection->prepare("INSERT INTO tbregister(id, title, description, image_path, date, type) VALUES(?,?,?,?,?,?)");
        //     $sql->execute(array(0, $register->getTitle(), $register->getDescription(), $register->getFilePath(), $register->getDate(), $register->getType()));
        //     return true;
        // }

        // public static function delete($id){
        //     $connection = Data::createInstance();
        //     $sql = $connection->query("DELETE FROM tbregister WHERE id=" . $id);
        //     return 1;
        // }
        
        // public static function edit($plain, $option){
        //     $connection = Data::createInstance();
        //     if ($option == 0) {
        //         $result = $sql = $connection->query("UPDATE tbregister SET title='" . $plain->getTitle() . "', description='" . $plain->getDescription() . "' WHERE id='" . $plain->getID() . "'");
        //     } else {
        //         $result = $sql = $connection->query("UPDATE tbregister SET title='" . $plain->getTitle() . "', description='" . $plain->getDescription() . "', image_path='" . $plain->getFilePath() . "' WHERE id='" . $plain->getID() . "'");
        //     }
        //     return $result;
        // }
        
    }
?>