<?php
    include_once "filebusiness.php";

    if(isset($_POST['action'])){
        $business = new FileBusiness();
        if(strcmp($_POST['action'], "save") == 0){
            //Validar que viene el archivo y lo preparamos
            $file = $_FILES['file'];
            $fileName = $file['name'];
            $provicionalRoute = $file['tmp_name'];
            $binaryFile = "";
            //Variables para nombrrar los videos(Para evitar que se repitan los nombres y se generen errores) que se almacenan en las carpetas de proyecto debido a su alto peso:
            $date = date("y_m_d");
            $time = time();
            $time_ = date('h:i:s a');

            if(strpos($file['type'], "video") !== false){//Si el tipo de archivo es de video:
                //Guardamos en las carpetas locales de proyecto
                //* Movemos el video de la ruta temporal a la ruta deseada
                move_uploaded_file($provicionalRoute, "../Resources/News-resources/".$fileName);
                //* Procedemos a cambiar el nombre de la imagen a un formato que elimine el riesgo de nombres repetidos
                rename("../Resources/News-resources/".$fileName, "../Resources/News-resources/".$date."_".$time."_".$fileName);
                $binaryFile = $date."_".$time."_".$fileName;
            }else{//Si no es un video:
                $binaryFile = base64_encode(file_get_contents($provicionalRoute));//Convertimos la imagen o el audio en una cadena base64
            }
            if(isset($binaryFile)){
                $result = $business->save($fileName, $file['type'], $binaryFile);
                if($result){
                    echo json_encode(
                        Array(
                            'message'=>'success'
                        )
                    );
                }else{
                    echo json_encode(
                        Array(
                            'message'=>'error'
                        )
                    );
                }
            }
        }else if(strcmp($_POST['action'], "saveFromEdit") == 0){
             //Validar que viene el archivo y lo preparamos
             $file = $_FILES['file'];
             $fileName = $file['name'];
             $provicionalRoute = $file['tmp_name'];
             $binaryFile = "";
             //Variables para nombrrar los videos(Para evitar que se repitan los nombres y se generen errores) que se almacenan en las carpetas de proyecto debido a su alto peso:
             $date = date("y_m_d");
             $time = time();
             $time_ = date('h:i:s a');
 
             if(strpos($file['type'], "video") !== false){//Si el tipo de archivo es de video:
                 //Guardamos en las carpetas locales de proyecto
                 //* Movemos el video de la ruta temporal a la ruta deseada
                 move_uploaded_file($provicionalRoute, "../Resources/News-resources/".$fileName);
                 //* Procedemos a cambiar el nombre de la imagen a un formato que elimine el riesgo de nombres repetidos
                 rename("../Resources/News-resources/".$fileName, "../Resources/News-resources/".$date."_".$time."_".$fileName);
                 $binaryFile = $date."_".$time."_".$fileName;
             }else{//Si no es un video:
                 $binaryFile = base64_encode(file_get_contents($provicionalRoute));//Convertimos la imagen o el audio en una cadena base64
             }
             if(isset($binaryFile)){
                 $result = $business->saveFromEdit($fileName, $file['type'], $binaryFile, $_POST['newsId']);
                 if($result){
                     echo json_encode(
                         Array(
                             'message'=>'success'
                         )
                     );
                 }else{
                     echo json_encode(
                         Array(
                             'message'=>'error'
                         )
                     );
                 }
             }
        }else if(strcmp($_POST['action'], "getAll") == 0){
            $files = $business->getAll();
            // echo 'Entro2';
            echo json_encode($files);
        }else if(strcmp($_POST['action'], "getByNewsId") == 0){
            $files = $business->getByNewsId($_POST['id']);
            // echo 'Entro2';
            echo json_encode($files);
        }else if(strcmp($_POST['action'], "delete") == 0){
            //Obtenemos el registro con los datos del archivo de la base de datos
            $file = $business->getById($_POST['id']);
            //Si es video debemos borrar el video de las carpetas de proyecto
            if(strpos($file['type'], "video") !== false){//Si en el tipo es de video o contiene la palabra video 'video/mp4':
                //Buscamos el video en las carpetas de proyecto y lo borramos
                unlink("../Resources/News-resources/".$file['file']);
                //Eliminamos el registro del archivo de la base de datos:
                $result = $business->delete($_POST['id']);
            }else{//Si no es un archivo de video:
                $result = $business->delete($_POST['id']);
            }
            
            if($result){
                echo json_encode(
                    Array(
                        'message'=> 'success'
                    )
                );
            }else if($result){
                echo json_encode(
                    Array(
                        'message'=> 'error'
                    )
                );
            }
        }
    }
?>