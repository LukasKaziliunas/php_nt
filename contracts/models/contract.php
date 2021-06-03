<?php
class contract {

    public function getEditDescription($id, $uid, $contract_id){
        $query = "  SELECT 
                        c.id as id,
                        c.contract_details AS details
                    FROM
                        `contract` c";


        $query = $query . filter::WhereQuery($id, $uid);
        $query = $query . " AND id = $contract_id";
        //echo $query;
        $result = mysql::select($query);
        return $result;
    }

    public function getTable($name)
    {
        $query = "SELECT * FROM $name ";
        $result = mysql::select($query);
        return $result;
    }
    public function updateDetails($contract_id, $details){

        $query = "  UPDATE `contract` 
                    SET `contract_details` = '$details' 
                    WHERE  `id` = $contract_id";

    
            mysql::query($query);
    }
    public function updateStatus($contract_id){

        $query = "  UPDATE `contract` 
                    SET `status_active`='1', 
                    `status_approved`='1' 
                    WHERE  `id`=$contract_id;";

    
            mysql::query($query);
    }
    public function insertContract($id_buyer, $id_seller, $id_object, $tmp_p, $tmp_f, $tmp_a)
    {
        $date = date('Y-m-d');
        $endDate =  date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 365 day"));

        $estate = contract::SelectedEstate($id_object);

            $query = "INSERT INTO `contract` 
                    (	`register_date`, 
                        `end_date`, 
                        `contract_details`, 
                        `payment_amount`, 
                        `fee_percentage`, 
                        `fee_amount`, 
                        `fk_CONTRACT_TYPE`, 
                        `fk_ESTATE`,
                        `fk_CLIENT_BUY`, 
                        `fk_CLIENT_SELL`,
                        `status_active`, 
                        `status_approved`) 
                    VALUES (	'$date', 
                                '$endDate',
                                'Contract Details',
                                '$tmp_p', 
                                '$tmp_f', 
                                '$tmp_a', 
                                '1',
                                '$id_object', 
                                '$id_buyer',
                                '$id_seller', 
                                '', 
                                '')";
            mysql::query($query);
    }
    public function insertFeatures($features, $id)
    {
        foreach($features as $feature)
        {
            $query = "INSERT INTO conveniences_of_estates (fk_ESTATE, fk_CONVENIENCE) VALUES ('$id', '$feature')";
            mysql::query($query);
        } 
    }

    public function getSeller($id)
    {
            $query = "  SELECT 
                            CONCAT(client.name, ' ', client.surname) as client,
                            client.phone_no,
                            client.email
                        FROM
                            `client`
                        WHERE
                        id = $id";
           // mysql::query($query);
            $result = mysql::select($query);
            return $result;
    }


    public function getSelectedEstates($clientId){
        $query = "  SELECT *
                    FROM estate
                    WHERE fk_SELLER = $clientId";
        $result = mysql::select($query);
        return $result;
    }


    public function SelectedEstate($clientId){
        $query = "  SELECT 
                            e.id AS id,
                            e.description as description,
                            e.fee_amount AS fee_amount,
                            e.fee AS fee,
                            e.price AS price,
                            e.fk_SELLER as seller_id,
                            city.name as city,
                            street.name as estate_adress
                    FROM 
                        `estate` e
                    LEFT JOIN
                        `city` 			ON e.fk_CITY = city.id	
                    LEFT JOIN
                        `street` 	 	ON e.fk_STREET = street.id
                    WHERE e.id = $clientId";
        $result = mysql::select($query);
        return $result;
    }
    public function deleteContract($id){
        $query = "DELETE FROM `contract` WHERE `id`=$id;";
        mysql::query($query);
        return $id;
    }
    public function getContracts($id, $uid, $orderby){ // CHANGE TO BE SEEN BY USER ID

        
            $query = "  SELECT  
                        c.id,
                        CONCAT(city.name,', ',street.name) as estate,
                        c.status_active,
                        c.fk_CLIENT_BUY AS buyer,
                        c.fk_CLIENT_SELL AS seller,
                        c.status_approved,
                        c.date_signed,
                        c.register_date,
                        e.price AS price,
                        e.room_count AS room_count,
                        CONCAT(e.area,' kv.') as area_m2,
                        e.description AS description
                    FROM
                        `contract` c LEFT JOIN
                        `estate` e ON c.fk_ESTATE = e.id LEFT JOIN
                        `street` ON e.fk_STREET = street.id LEFT JOIN
                        `city` ON e.fk_CITY = city.id";

                        $query = $query . filter::WhereQuery($id, $uid);

                        $query = $query . $orderby;
        //echo $query;
        $result = mysql::select($query);
        return $result;
    }
    public function selectContract($contractID) {
        $query = "  SELECT 
                    c.id,
                    c.register_date,
                    c.date_signed,
                    c.end_date,
                    c.contract_details,
                    c.payment_amount as price,
                    c.fee_percentage,
                    c.fee_amount,
                    s.name AS seller,
                    s.phone AS s_phone,
                    s.email AS s_email,
                    b.name AS buyer,
                    b.phone AS b_phone,
                    b.email AS b_email,
                    estate.description as description,
                    city.name as city,
                    street.name as estate_adress,
                    CONCAT(staff.name, ' ', staff.surname) AS staff,
                    staff.phone_no as staff_phone,
                    staff.email as staff_email,
                    CONCAT(sol.name, ' ', sol.surname) AS solicitor,
                    sol.phone_no as sol_phone,
                    sol.email as sol_email,
                    c.status_active,
                    c.status_approved
                FROM
                    `contract` c
                LEFT JOIN
                    `estate` 	ON estate.id = c.fk_ESTATE
                LEFT JOIN
                    `staff` 	ON staff.id = c.fk_STAFF
                LEFT JOIN
                    `solicitor` sol ON sol.id = c.fk_SOLICITOR
                LEFT JOIN
                `street` 	    ON estate.fk_STREET = street.id
                LEFT JOIN
                `city` 		    ON estate.fk_CITY = city.id	
                LEFT JOIN
                    (
                        SELECT
                                a.id,
                                CONCAT(a.name, ' ', a.surname) AS NAME,
                                a.phone_no AS phone,
                                a.email
                        FROM
                                client a
                    ) AS b
                    ON c.fk_CLIENT_BUY = b.id
                LEFT JOIN
                    (
                        SELECT
                                r.id,
                                CONCAT(r.name, ' ', r.surname) AS NAME,
                                r.phone_no AS phone,
                                r.email
                        FROM
                                client r
                    ) AS s
                    ON c.fk_CLIENT_SELL = s.id
                WHERE
                c.id = $contractID";
        $result = mysql::select($query);
        return $result;
    }

}

$c = new contract;

?>