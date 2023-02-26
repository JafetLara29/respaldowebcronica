<?php

include_once "newsbusiness.php";

include_once "filebusiness.php";

include_once "subscriberbusiness.php";



use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

use PHPMailer\PHPMailer\SMTP;



require '../Mailer/Exception.php';

require '../Mailer/PHPMailer.php';

require '../Mailer/SMTP.php';



if (isset($_POST['action'])) {

    $business = new NewsBusiness();

    if (strcmp($_POST['action'], "getAll") == 0) {

        $news = $business->getAll();

        echo json_encode($news);

    } else if (strcmp($_POST['action'], "getSpecificNews") == 0) {

        $news = $business->getSpecificNews($_POST['id']);

        echo json_encode($news);

    }else if (strcmp($_POST['action'], "save") == 0) {

        

        //Validar que viene la imagen y la preparamos

        $image = $_FILES['image'];

        $imageName = $image['name'];

        $imageProvicionalRoute = $image['tmp_name'];

        

        $date = date("y_m_d");

        $time = time();

        $time_ = date('h:i:s a');

        //! Verificamos que la extension de la imagen es correcta

        if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/png" ||  $_FILES['image']['type'] == "image/jpeg") {

            // $binaryFile = base64_encode(file_get_contents($imageProvicionalRoute));//Convertimos la imagen en una cadena base64

            

            //* Movemos el archivo de la ruta temporal a la ruta deseada

            move_uploaded_file($imageProvicionalRoute, "../Resources/News-resources/" . $imageName);



            //* Procedemos a cambiar el nombre del archivo a un formato que elimine el riesgo de nombres repetidos

            rename("../Resources/News-resources/" . $imageName, "../Resources/News-resources/" . $date . "_" . $time . "_" . $imageName);



            //* Realizado todo esto procedemos a guardar

            if (isset($_POST['id_category']) && isset($_POST['id_journalist']) && isset($_POST['title']) && isset($_POST['bajadilla']) && isset($imageName)){

                //! id_category (Hacer crud de categorías) | id_journalist (Hay que pasar el id por variables de sesion)

                $result = $business->save(new News(0, $_POST['id_category'], $_POST['id_journalist'], $_POST['title'], $_POST['bajadilla'], $date . "_" . $time . "_" . $imageName, $_POST['description'], $date, $time_, '0', $_FILES['image']['type']));

                if ($result) {

                    

                //     //Enviamos el ID de la noticia...

                //     $lastInserted = NewsBusiness::getLastInsertedID();

                //     //Obtenemos el array de los subscriptores

                //     $subscribers = SubscriberBusiness::getAllSubscribers();

                //     //llamanos a la funcion de enviar correo

                //   // var_dump($subscribers);

                   

                //     sendEmail($lastInserted,$subscribers);

                    

                    /* -------------------------------*/

                    echo json_encode(

                        array(

                            'message' => 'success'

                        )

                    );

                } else {

                    echo json_encode(

                        array(

                            'message' => 'error'

                        )

                    );

                }

            } else {

                echo json_encode(

                    array(

                        'message' => $_POST['inputs-error']

                    )

                );

            }

        } else {

            echo json_encode(

                array(

                    'message' => 'img-error'

                )

            );

        }

    }else if(strcmp($_POST['action'], "edit") == 0){

         //Validar que viene la imagen y la preparamos

         $image = $_FILES['image'];

         $imageName = $image['name'];

         $imageProvicionalRoute = $image['tmp_name'];

         $date = date("y_m_d");

        $time = time();

        $time_ = date('h:i:s a');



         if(strcmp($imageName, "") != 0){//* Viene imagen

             //! Verificamos que la extension de la imagen es correcta

             if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/png" ||  $_FILES['image']['type'] == "image/jpeg") {

    

                // $binaryFile = base64_encode(file_get_contents($imageProvicionalRoute));//Convertimos la imagen o el audio en una cadena base64

                //* Movemos el archivo de la ruta temporal a la ruta deseada

                move_uploaded_file($imageProvicionalRoute, "../Resources/News-resources/" . $imageName);



                //* Procedemos a cambiar el nombre del archivo a un formato que elimine el riesgo de nombres repetidos

                rename("../Resources/News-resources/" . $imageName, "../Resources/News-resources/" . $date . "_" . $time . "_" . $imageName);

                 

                //* Realizado todo esto procedemos a guardar

                 if (!empty($_POST['id_category']) || !empty($_POST['title']) || !empty($_POST['bajadilla']) || !empty($_POST['description'])) {

                     //! id_category (Hacer crud de categorías) | id_journalist (Hay que pasar el id por variables de sesion)

                     $image = $business->getImageById($_POST['id']);

                     $result = $business->edit(new News($_POST['id'], $_POST['id_category'], 0, $_POST['title'], $_POST['bajadilla'], $date . "_" . $time . "_" . $imageName, $_POST['description'], '', '', '0', $_FILES['image']['type']), 1);

                     if ($result) {

                        unlink("../Resources/News-resources/".$image['image']);

                         echo json_encode(

                             array(

                                 'message' => 'success'

                             )

                         );

                     } else {

                         echo json_encode(

                             array(

                                 'message' => 'error'

                             )

                         );

                     }

                 } else {

                     echo json_encode(

                         array(

                             'message' => 'inputs-error'

                         )

                     );

                 }

             } else {

                 echo json_encode(

                     array(

                         'message' => 'img-error'

                     )

                 );

             }

         }else{//* No viene imagen



            //* Realizado todo esto procedemos a guardar

            if (!empty($_POST['id_category']) || !empty($_POST['title']) || !empty($_POST['bajadilla']) || !empty($_POST['image']) || !empty($_POST['description']) || !empty($_POST['file'])) {

                //! id_category (Hacer crud de categorías) | id_journalist (Hay que pasar el id por variables de sesion)

                $result = $business->edit(new News($_POST['id'], $_POST['id_category'], 0, $_POST['title'], $_POST['bajadilla'], $imageName, $_POST['description'], '', '', '0', ''), 0);

                if ($result) {

                    echo json_encode(

                        array(

                            'message' => 'success'

                        )

                    );

                } else {

                    echo json_encode(

                        array(

                            'message' => 'error'

                        )

                    );

                }

            } else {

                echo json_encode(

                    array(

                        'message' => 'inputs-error'

                    )

                );

            }

         }

    }else if(strcmp($_POST['action'], "delete") == 0){

        $fileBusiness = new FileBusiness();

        //Extraemos los registros de los archivos ligados a la noticia:

        $files = $fileBusiness->getByNewsId($_POST['id']);

        if(isset($files)){//Si hay archivos ligados

            //Eliminamos los archivos de video si es el caso que hay:

            foreach($files as $file){

                if(strpos($file['type'], "video") !== false){//Si en el tipo es de video o contiene la palabra video 'video/mp4':

                    //Buscamos el video en las carpetas de proyecto y lo borramos

                    unlink("../Resources/News-resources/".$file['file']);

                    //Eliminamos el registro del archivo de la base de datos:

                    $fileBusiness->delete($file['id']);

                }else{//Si no es un archivo de video:

                    $fileBusiness->delete($file['id']);

                }

            }

        }

        $image = $business->getImageById($_POST['id']);

        $result = $business->delete($_POST['id']);

        if($result){

            unlink("../Resources/News-resources/".$image['image']);

            echo json_encode(

                array(

                    'message' => 'success'

                )

            );

        }else{

            echo json_encode(

                array(

                    'message' => 'error'

                )

            );

        }

    }

    

}

    /*----------------------------------------*/

    function sendEmail($lastInserted,$subscribers)

{



    $message = '

    <!DOCTYPE html>

    <html lang="en">

    

    <head>

      <meta charset="UTF-8">

      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>Enviar correo</title>

      <style>

        p {

          font-weight: bold;

        }

    

        a {

          background-color: #f44336;

          border: none;

          color: #fff !important;

          padding: 13px 25px;

          text-align: center;

          text-decoration: none;

          border-radius: 8px;

          display: inline-block;

          font-size: 16px;

        }

    

        a:hover {

          background-color: #4CAF50;

          /* Green */

          color: white;

        }

      </style>

    </head>

    

    <body>

    

      <p>Te dejamos el link para que puedas visualizarla.</p>

      <a href="http://localhost/ANC_CODE/View/newsview.php?id=' . $lastInserted . '">Ir a la publicación</a><br>

      <pre>Te enviamos un gran saludo de parte del equipo de noticias Crónica.</pre>

    

    </body>

    

    </html>

    ';

    /////////////////////////////////////////

    //Create an instance; passing `true` enables exceptions

    $mail = new PHPMailer(true);



    try {

        //Server settings

        $mail->SMTPDebug = 0;                      //Enable verbose debug output

        $mail->isSMTP();                                            //Send using SMTP

        $mail->Host       = 'smtp.xn--crnica-cxa.com';                     //Set the SMTP server to send through

        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

        $mail->Username   = '_mainaccount@xn--crnica-cxa.com';                     //SMTP username

        $mail->Password   = 'Roberto2022@+';                               //SMTP password

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //'tls';            //Enable implicit TLS encryption

        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = 



        //Recipients

        $mail->setFrom('_mainaccount@xn--crnica-cxa.com', 'Crónica');

        foreach ($subscribers as $subscriber) {

            $mail->addBCC($subscriber->getEmail(), $subscriber->getName());

        }

        //content

        $mail->isHTML(true);

        $mail->CharSet = 'UTF-8';                                 //Set email format to HTML

        $mail->Subject = 'Hola, somos Crónica. ¿Ya viste nuestra última noticia publicada?';

        $mail->Body    = $message;

        $mail->send();

    } catch (Exception $e) {

        echo "Error al enviar el mensaje!: {$mail->ErrorInfo}";

    }

}



