<?php
include_once "../Data/subscriberdata.php";

class SubscriberBusiness
{

    public static function addSubscriber($subscriber)
    {
        return SubscriberData::addSubscriber($subscriber);
    }
    
    public static function getAllSubscribers()
    {
        return SubscriberData::getAllSubscribers();
    }
}
