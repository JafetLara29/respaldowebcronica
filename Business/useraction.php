<?php
    include_once "userbusiness.php";
    include_once "../Domain/User.php";
    if(isset($_POST['action'])){
        $business = new UserBusiness();
        if(strcmp($_POST['action'], "getUsers") == 0){//Parte administrativa, control de usuarios|Usuario master
            $users = $business->getUsers();
            echo json_encode($users);
        }else if(strcmp($_POST['action'], "save") == 0){
            if($_POST['username'] == '' || $_POST['password'] == '' || $_POST['user_type'] == ''){
                echo json_encode(
                    Array(
                        'message'=>'error'
                    )
                ); 
            }else{
                $result = $business->save(new User(0, $_POST['username'], $_POST['password'], $_POST['user_type']));
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
        }else if(strcmp($_POST['action'], "delete") == 0){
            $result = $business->delete($_POST['id']);
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
        }else if(strcmp($_POST['action'], "edit") == 0){
            $result = $business->edit(new User($_POST['id'], $_POST['user_name'], $_POST['password'], $_POST['user_type']));
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