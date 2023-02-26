<?php
    include_once 'yomequejobusiness.php';
    include_once '../Domain/Queja.php';

    if(isset($_POST['action'])){
        $business = new YoMeQuejoBusiness();
        if(strcmp($_POST['action'], "save") == 0){
            $date = date("y-m-d");
            $autor = $_POST['autor'];
            if(strcmp($_POST['autor'], "") == 0){
                $autor = "Anónimo";
            }
            $result = $business->save(new Queja($autor, $_POST['title'], $_POST['queja'], $date));
            if($result){
                echo json_encode(
                    Array(
                        'message'=> 'success'
                    )
                );
            }else{
                echo json_encode(
                    Array(
                        'message'=> 'error'
                    )
                );
            }
        }else if(strcmp($_POST['action'], "getAllWaiting") == 0){
            $quejas = $business->getAllWaiting();
            echo json_encode($quejas);
        }else if(strcmp($_POST['action'], "getAllAccepted") == 0){
            $quejas = $business->getAllAccepted();
            echo json_encode($quejas);
        }else if(strcmp($_POST['action'], "accept") == 0){
            $result = $business->accept($_POST['id']);
            if($result){
                echo json_encode(
                    Array(
                        'message'=> 'success'
                    )
                );
            }else{
                echo json_encode(
                    Array(
                        'message'=> 'error'
                    )
                );
            }
        }else if(strcmp($_POST['action'], "reject") == 0){
            $result = $business->reject($_POST['id']);
            if($result){
                echo json_encode(
                    Array(
                        'message'=> 'success'
                    )
                );
            }else{
                echo json_encode(
                    Array(
                        'message'=> 'error'
                    )
                );
            }
        }
    }
?>