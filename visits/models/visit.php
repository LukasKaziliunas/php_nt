<?php
class visit
{

    public function insertNewVisit($data, $estate, $seller_id)
    {
        $query = "INSERT INTO visit (datetime, level, fk_ESTATE, fk_BUYER, fk_SELLER) VALUES
        ('{$data["datetime"]}','1','{$estate}','{$_SESSION['id']}','{$seller_id}')";
       
        mysql::query($query);
    }

    public function getSellerIDFromEstate($id)
    {
        $query = "SELECT fk_SELLER from estate
        where id = $id";

        $result = mysql::select($query);
        return $result;
    }

    public function getSeller($seller_id)
    {
        $query = "SELECT * from client
        where id = $seller_id";

        $result = mysql::select($query);
        return $result;
    }

    public function getBuyer()
    {
        $query = "SELECT * from client
        where id = " . $_SESSION['id'];

        $result = mysql::select($query);
        return $result;
    }

    public function getLevel($level_id)
    {
        $query = "SELECT name from levels_of_visits
        where id = " . $level_id;

        $result = mysql::select($query);
        return $result;
    }

    public function getBuyerAfterSelect($id)
    {
        $query = "SELECT * from client
        where id = $id";

        $result = mysql::select($query);
        return $result;
    }

    public function getEstate($id)
    {
        $query = "select estate.id, city.name as 'city', street.name as 'street', category.name as 'category' from estate
        inner join street on estate.fk_STREET = street.id
        inner join city on estate.fk_CITY = city.id
        inner join category on estate.fk_CATEGORY = category.id
        where estate.id = " . $id;

        $result = mysql::select($query);
        return $result;
    }

    //------------------------------------------

    public function getRelatedVisitsBuyer()
    {
        $query = "SELECT * from visit WHERE fk_BUYER = '{$_SESSION['id']}' && level != '5' ";
        $result = mysql::select($query);
        return $result;
    }

    public function getRelatedVisitsSeller()
    {
        $query = "SELECT * from visit WHERE fk_SELLER = '{$_SESSION['id']}' && level != '5'";
        $result = mysql::select($query);
        return $result;
    }

    public function getAllVisitsAdmin()
    {
        $query = "SELECT * from visit";
        $result = mysql::select($query);
        return $result;
    }

    //-------------------------------------------

    public function getVisit($visit_id){
        $query = "SELECT * from visit";
        $result = mysql::select($query);
        return $result;
    }

    public function updateToChanged($new_time, $visit_id)
    {
        $query = "UPDATE visit SET datetime = '$new_time', level = '2' WHERE visit.id = '$visit_id'";
        mysql::query($query);
    }

    public function updateToAccepted($visit_id)
    {
        $query = "UPDATE visit SET  level = '3' WHERE visit.id = '$visit_id'";
        mysql::query($query);
    }
//------------------
    public function checkConclusionCount($visit_id)
    {
        $query = "select count(conclusions_of_visits.fk_CONCLUSION) as 'count' from conclusions_of_visits
        where conclusions_of_visits.fk_VISIT = '$visit_id'";
        $result = mysql::select($query);
        return $result;
    }

    public function updateToConcluded($visit_id)
    {
        $query = "UPDATE visit SET  level = '4' WHERE visit.id = '$visit_id'";
        mysql::query($query);
    }
//--------------------------
    public function updateToDeleted($visit_id)
    {
        $query = "UPDATE visit SET  level = '5' WHERE visit.id = '$visit_id'";
        mysql::query($query);
    }

    //----------------------------------------

    public function getAllStatus()
    {
        $query = "SELECT * from levels_of_visits";
        $result = mysql::select($query);
        return $result;
    }

    public function getRelatedFilteredVisitsBuyer($time_start, $time_end, $status_id)
    {
        $time_s = NULL;
        $time_e = NULL;
        $stat = NULL;

        if (!is_null($time_start)) {
            $time_s  = " && '$time_start' >= datetime";
        }

        if (!is_null($time_end)) {
            $time_e  = "&& '$time_end' <= datetime";
        }

        if (!is_null($status_id)) {
            $stat  = "&& level = '$status_id'";
        }

        $query = "SELECT * from visit WHERE fk_BUYER = '{$_SESSION['id']}' && level != '5'" .
            " " . $time_s . " " . $time_e . " " . $stat;
        $result = mysql::select($query);
        return $result;
    }

    public function getRelatedFilteredVisitsSeller($time_start, $time_end, $status_id)
    {
        $time_s = NULL;
        $time_e = NULL;
        $stat = NULL;

        if (!is_null($time_start)) {
            $time_s  = " && $time_start >= datetime";
        }

        if (!is_null($time_end)) {
            $time_e  = "&& $time_end <= datetime";
        }

        if (!is_null($status_id)) {
            $stat  = "&& level = '$status_id'";
        }

        $query = "SELECT * from visit WHERE fk_SELLER = '{$_SESSION['id']}' && level != '5'" .
            " " . $time_s . " " . $time_e . " " . $stat;
        $result = mysql::select($query);
        return $result;
    }

    public function getAllFilteredVisitsAdmin($time_start, $time_end, $status_id)
    {
        $time_s = NULL;
        $time_e = NULL;
        $stat = NULL;

        if (!is_null($time_start)) {
            $time_s  = " && $time_start >= datetime";
        }

        if (!is_null($time_end)) {
            $time_e  = "&& $time_end <= datetime";
        }

        if (!is_null($status_id)) {
            $stat  = "&& level = '$status_id'";
        }

        $query = "SELECT * from visit where id >= '1'" . " " . $time_s . " " . $time_e . " " . $stat;
        $result = mysql::select($query);
        return $result;
    }

    //--------------------------


    public function countSuccessfulVisits($visit_id)
    {
        $query = "select count(conclusion.id) as 'successful_conclusions' from visit
        inner join conclusions_of_visits on $visit_id = conclusions_of_visits.fk_VISIT
        inner join conclusion on conclusion.id = conclusions_of_visits.fk_CONCLUSION
        where conclusion.tipas = 1";
        $result = mysql::select($query);
        return $result;
    }

    public function countUnsuccessfulVisits($visit_id)
    {
        $query = "select count(conclusion.id) as 'unsuccessful_conclusions' from visit
        inner join conclusions_of_visits on $visit_id = conclusions_of_visits.fk_VISIT
        inner join conclusion on conclusion.id = conclusions_of_visits.fk_CONCLUSION
        where conclusion.tipas = 2 || visit.level = 5";
        $result = mysql::select($query);
        return $result;
    }

    //....

    public function insertMessage($message)
    {

        $commentQuery = "INSERT INTO comment (id, text) VALUES (NULL, '$message')";
        mysql::query($commentQuery);

        $messageQuery = "INSERT INTO message (id, datetime, fk_COMMENT, fk_SENDER, fk_RECEIVER)
        VALUES (NULL, CURRENT_TIMESTAMP, (select max(id) from comment), '{$_SESSION["id"]}', '{$_GET["seller_id"]}')";
        mysql::query($messageQuery);

        $finalQuery = "INSERT INTO messages_of_visits (id, fk_MESSAGE, fk_VISIT)
        VALUES (NULL, (select max(id) from message), '{$_GET["visit_id"]}')";
        mysql::query($finalQuery);
    }

    public function viewMessages($visit_id)
    {

        $query = "select datetime, comment.text, message.fk_SENDER, message.fk_RECEIVER from message
        inner join comment on comment.id = message.fk_COMMENT
        inner join messages_of_visits on messages_of_visits.fk_MESSAGE = message.id && messages_of_visits.fk_VISIT = $visit_id";

        $result = mysql::select($query);

        return $result;
    }

    //-----------------------

    public function insertConclusion($conclusion, $conclusion_type)
    {
        $commentQuery = "INSERT INTO comment (id, text) VALUES (NULL, '$conclusion')";
        mysql::query($commentQuery);

        $conclusionQuery = "INSERT INTO conclusion (id, tipas, fk_COMMENT, fk_RATING)
        VALUES (NULL, '$conclusion_type', (select max(id) from comment), (select id from rating where fk_CLIENT = '{$_GET["seller_id"]}')";
        mysql::query($conclusionQuery);

        if ($conclusion_type = "1") {
            $ratingQuery = "UPDATE rating SET level = level+1, current_tendency = '1'
            WHERE rating.id = (select id from rating where fk_CLIENT = '{$_GET["seller_id"]}')";
            mysql::query($ratingQuery);
        } else if ($conclusion_type = "2") {
            $ratingQuery = "UPDATE rating SET level = level-1, current_tendency = '3'
            WHERE rating.id = (select id from rating where fk_CLIENT = '{$_GET["seller_id"]}')";
            mysql::query($ratingQuery);
        }

        $finalQuery = "INSERT INTO conclusions_of_visits (id, fk_VISIT, fk_CONCLUSION)
        VALUES (NULL, '{$_GET["visit_id"]}', (select max(id) from conclusion))";
        mysql::query($finalQuery);
    }

    public function viewConclusions($visit_id)
    {
        $query = "select tipas, comment.text from conclusion
        inner join comment on conclusion.fk_COMMENT = comment.id
        inner join conclusions_of_visits on conclusions_of_visits.fk_CONCLUSION = conclusion.id && conclusions_of_visits.fk_VISIT = $visit_id";

        $result = mysql::select($query);

        return $result;
    }
}
