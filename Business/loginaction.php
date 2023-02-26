<?php
    include_once "loginbusiness.php";
    if(isset($_POST['action'])){
        $business = new LoginBusiness();
        //Para validar acceso al sistema
        if(strcmp($_POST['action'], "validate") == 0){
            $type = $business->validate($_POST['username'], $_POST['password']);
            if(strcmp($type, "invalid") == 0){//Si el tipo es invalido (Significa que no se encontró el usuario o contraseña)
                header("Location: ../View/login.php?access=denegated");
            }else{//Si los datos son correctos
                if(strcmp($type, "master") == 0){
                    header("Location: ../View/masterview.php");
                }else if(strcmp($type, "reportero") == 0){
                    header("Location: ../View/journalistview.php");
                }
            }
        }
    }
?>