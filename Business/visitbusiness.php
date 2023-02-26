<?php

include_once '../Data/visitdata.php';

class VisitBusiness
{

    public static function createVisitCounter($newsid)
    {
        return VisitData::createVisitCounter($newsid);
    }
}
