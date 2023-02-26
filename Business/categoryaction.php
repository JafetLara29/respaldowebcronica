<?php
    include_once "categorybusiness.php";
    include_once "../Domain/Category.php";
    if(isset($_POST['action'])){
        $business = new CategoryBusiness();
        if(strcmp($_POST['action'], "getAll") == 0){//Parte administrativa, control de usuarios|Usuario master
            $users = $business->getAll();
            echo json_encode($users);
        }else if(strcmp($_POST['action'], "save") == 0){
            if($_POST['name'] == ''){
                echo json_encode(
                    Array(
                        'message'=>'name-error'
                    )
                ); 
            }else{
                $result = $business->save(new Category(0, $_POST['name']));
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
            if(isset($_POST['name'])){
                $result = $business->edit(new Category($_POST['id'], $_POST['name']));
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
            }else{
                echo json_encode(
                    Array(
                        'message'=> 'name-error'
                    )
                );
            }
        }
    }
?>