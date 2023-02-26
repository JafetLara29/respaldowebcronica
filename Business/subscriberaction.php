<?php
include_once 'subscriberbusiness.php';
include_once '../Domain/Subscriber.php';

$regexp_name = "/^[a-zA-Z0-9 ]+$/";
$regexp_email = "/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i";

if (isset($_POST['action'])) {

    if (strcmp($_POST['action'], 'addsubscriber') == 0) {
        /* Validacion del nombre del subscriptor */
        if (validateName($regexp_name, $_POST['subscribername'])) {
            /* Validacion del correo del subscriptor */
            if (validateEmail($regexp_email, $_POST['subscriberemail'])) {

                $result = SubscriberBusiness::addSubscriber(new Subscriber(0, $_POST['subscribername'], $_POST['subscriberemail'], 1));
                switch ($result) {
                    case 'success':
                        echo $result;
                        break;
                    case 'exists':
                        echo $result;
                        break;
                    case 'error':
                        echo $result;
                        break;

                    default:
                        # code...
                        break;
                }
            } else {
                echo "error";
            }
        } else {
            echo "error";
        }
    }
}

function validateName($regexpre_name, $name)
{
    return (preg_match($regexpre_name, $name)) ? true : false;
}

function validateEmail($regexpre_email, $email)
{
    return (preg_match($regexpre_email, $email)) ? true : false;
}
