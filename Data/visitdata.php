<?php

include_once 'data.php';
class VisitData
{
    public static function createVisitCounter($newsid)
    {
        $connection = Data::createInstance();
        $sql = $connection->query("SELECT * FROM tbvisit");
        $flag = false;
        $result = false;
        foreach ($sql->fetchAll() as $row) {
            if (strcmp($row['newsid'], $newsid) == 0) {
                $flag = true;
            }
        }

        if ($flag) {
            //Ya existe el registro y se actualiza
            $result = VisitData::incrementVisit($newsid);
        } else {
            //No existe y solamente se crea el registro
            $result = VisitData::insertNewVisit($newsid, 1);
        }
        return $result;
    }

    private static function insertNewVisit($newsid, $visit_counter)
    {
        $connection = Data::createInstance();
        $sql = $connection->prepare("INSERT INTO tbvisit(newsid,visits) VALUES(?,?)");
        $result = $sql->execute(array($newsid, $visit_counter));
        return $result;
    }

    private static function incrementVisit($newsid)
    {
        $connection = Data::createInstance();
        $result = $connection->query("UPDATE tbvisit SET visits = visits+1  WHERE newsid='" . $newsid . "'");
        return $result;
    }
}
