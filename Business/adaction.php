<?php

include_once "adbusiness.php";

include_once "../Domain/Ad.php";



if (isset($_POST['action'])) {

    $business = new AdBusiness();

    if (strcmp($_POST['action'], "getAll") == 0) {

        $ads = $business->getAll();

        echo json_encode($ads);

    } else if (strcmp($_POST['action'], "save") == 0) {

        //Validar que viene la imagen y la preparamos

        $file = $_FILES['image'];

        $fileName = $file['name'];

        $provicionalRoute = $file['tmp_name'];

        $date = date("y_m_d");

        $time = time();



        //! Verificamos que la extension del archivo es correcta

        if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/png" ||  $_FILES['image']['type'] == "image/jpeg") {



            //* Movemos el archivo de la ruta temporal a la ruta deseada

            move_uploaded_file($provicionalRoute, "../Images/Ads/" . $fileName);



            //* Procedemos a cambiar el nombre del archivo a un formato que elimine el riesgo de nombres repetidos

            rename("../Images/Ads/" . $fileName, "../Images/Ads/" . $date . "_" . $time . "_" . $fileName);



            //* Realizado todo esto procedemos a guardar

            if (!empty($_POST['description'])) {

                $result = $business->save(new Ad(0, $_POST['description'], $date . "_" . $time . "_" . $fileName, $_POST['page'], $_POST['position'], $_POST['link']));

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

                        'message' => 'description-error'

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

    } else if (strcmp($_POST['action'], "edit") == 0) {

        //Verificamos si el usuario cambió la imágen o no

        $file = $_FILES['image'];

        $fileName = $file['name'];

        if (strcmp($fileName, '') == 0) { //! no viene imagen

            //* Procedemos a guardar sin la imagen

            if (!empty($_POST['description'])) {

                $result = $business->edit(new Ad($_POST['id'], $_POST['description'], '', $_POST['page'], $_POST['position'], $_POST['link']), 0); // El cero indica al metodo que no viene imagen

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

                        'message' => 'description-error'

                    )

                );

            }

        } else { //* Viene  imagen



            $provicionalRoute = $file['tmp_name'];

            $date = date("y_m_d");

            $time = time();



            //! Verificamos que la extension del archivo es correcta

            if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/png" ||  $_FILES['image']['type'] == "image/jpeg") {



                //* Movemos el archivo de la ruta temporal a la ruta deseada

                move_uploaded_file($provicionalRoute, "../Images/Ads/" . $fileName);



                //* Procedemos a cambiar el nombre del archivo a un formato que elimine el riesgo de nombres repetidos

                rename("../Images/Ads/" . $fileName, "../Images/Ads/" . $date . "_" . $time . "_" . $fileName);



                //* Realizado todo esto procedemos a guardar

                if (!empty($_POST['description'])) {



                    $image = $business->getImageById($_POST['id']);

                    $result = $business->edit(new Ad($_POST['id'], $_POST['description'], $date . "_" . $time . "_" . $fileName, $_POST['page'], $_POST['position'], $_POST['link']), 1); //* El uno indica qala metodo que viene imagen

                    

                    if ($result) {

                        unlink("../Images/Ads/".$image);

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

                            'message' => 'description-error'

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

        }

    }else if (strcmp($_POST['action'], "delete") == 0){

        $result = $business->delete($_POST['id']);

        if($result){

            unlink("../Images/Ads/".$_POST['image']);

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

