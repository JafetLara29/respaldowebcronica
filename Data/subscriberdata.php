<?php
include_once "data.php";
include_once "../Domain/Subscriber.php";

class SubscriberData
{

    public static function addSubscriber($subscriber)
    {
        $response = "";
        try {

            if (SubscriberData::checkEmail($subscriber->getEmail()) > 0) {
                $response = "exists";
                return $response;
            } else {
                $connection = Data::createInstance();
                $sql = $connection->prepare("INSERT INTO tbsubscriber(name,email,state) VALUES(?,?,?)");
                $result = $sql->execute(array($subscriber->getName(), $subscriber->getEmail(), $subscriber->getState()));
                if ($result) {
                    $response = "success";
                } else {
                    $response = "error";
                }
                return $response;
            }
        } catch (\Throwable $th) {
            echo "Error en " . $th->getMessage();
            $response = "error";
            return $response;
        }
    }

    public static function checkEmail($email)
    {
        $connection = Data::createInstance();
        $sql = $connection->prepare("SELECT COUNT(*) FROM tbsubscriber WHERE email= ?");
        $sql->execute(array($email));
        $emailexists = $sql->fetchColumn();
        return $emailexists;
    }
    
    public static function getAllSubscribers(){

        $connection = Data::createInstance();
        $sql = $connection->query("SELECT * FROM tbsubscriber");
        $subscribers = [];

        foreach ($sql->fetchAll() as $subscriber) {
            if (strcmp($subscriber['state'], '1') == 0) {
                $subscribers[] = new Subscriber($subscriber['id'], $subscriber['name'], $subscriber['email'], $subscriber['state']);
            }
        }
        return $subscribers;
    }
    
    
    
}
