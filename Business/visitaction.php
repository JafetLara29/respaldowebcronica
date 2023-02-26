<?php

include_once "visitbusiness.php";

if (isset($_POST['action'])) {

    if (strcmp($_POST['action'], 'visit') == 0) {
        if (isset($_POST['news_id']) && !is_null($_POST['news_id'])) {

            $result = VisitBusiness::createVisitCounter($_POST['news_id']);
            echo ($result == true) ? 'Success!' : 'Backend error!';
        }
    }
}
