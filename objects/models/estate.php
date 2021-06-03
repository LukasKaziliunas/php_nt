<?php
class estate{

    public function getEstateData($where){
        $query = "SELECT estate.id, estate.area, estate.build_year, estate.room_count, estate.fee , estate.fee_amount ,
        estate.floor, estate.price, estate.description, estate.ownership_document, estate.cadastral_document,
        estate.fk_SELLER as seller, estate.fk_BUYER as buyer, category.name as category, street.name as street,
        city.name as city, conditions.name as condition_name , estate_type.name as type, heating.name as heating
        FROM `estate` INNER JOIN `category` ON category.id = estate.fk_CATEGORY
        INNER JOIN `street` ON street.id = estate.fk_STREET 
        INNER JOIN `city` ON city.id = estate.fk_CITY 
        INNER JOIN `conditions` ON conditions.id = estate.fk_CONDITIONS 
        INNER JOIN `estate_type` ON estate_type.id = estate.fk_ESTATE_TYPE 
        INNER JOIN `heating` ON heating.id = estate.fk_HEATING " . $where ;
        
        $result = mysql::select($query);
        return $result;
    }

    public function getRawEstateDataById($id)
    {
        $query = "SELECT estate.id, estate.area, estate.build_year as buildYear, estate.room_count as roomCount, estate.fee , estate.fee_amount ,
        estate.floor, estate.price, estate.description, estate.ownership_document as ownershipDocs, estate.cadastral_document as cadastralDocs,
        estate.fk_SELLER as seller, estate.fk_BUYER as buyer, estate.fk_CATEGORY as category, estate.fk_STREET as street,
        estate.fk_CITY as city, estate.fk_CONDITIONS as condition_name , estate.fk_ESTATE_TYPE as type, estate.fk_HEATING as heating
        FROM estate
        WHERE id = $id"; 
        $result = mysql::select($query);
        return $result[0];
    }

    //ideda nt objekta ir grazina jo id.
    public function insert($data, $sellerId){

        $fee_amount = FEE_AMOUNT;

        $fee = $data['price'] * FEE_AMOUNT;

        $query = "INSERT INTO estate (area, build_year, room_count, floor, price, description,
        ownership_document, cadastral_document, fk_CATEGORY, fk_STREET, fk_CITY, fk_CONDITIONS,
        fk_ESTATE_TYPE, fk_HEATING, fk_SELLER, fee, fee_amount) 
        VALUES ('{$data['area']}', '{$data['buildYear']}', '{$data['roomCount']}',
        '{$data['floor']}', '{$data['price']}', '{$data['description']}', '{$data['ownershipDocs']}',
        '{$data['cadastralDocs']}', '{$data['category']}', '{$data['street']}', '{$data['city']}', '{$data['condition_name']}',
        '{$data['type']}', '{$data['heating']}', '$sellerId', '$fee' , $fee_amount)";
        mysql::query($query);
      
        $id = mysql::select("SELECT max(id) as id FROM estate");

        return $id[0]['id'];

    }

    public function getTable($name)
    {
        $query = "SELECT * FROM $name ";
        $result = mysql::select($query);
        return $result;
    }

    public function insertFeatures($features, $id)
    {
        foreach($features as $feature)
        {
            $query = "INSERT INTO conveniences_of_estates (fk_ESTATE, fk_CONVENIENCE) VALUES ('$id', '$feature')";
            mysql::query($query);
        } 
    }

    public function getSelectedEstates($clientId){
        $query = "SELECT fk_ESTATE as estateId FROM selected_estate WHERE fk_CLIENT = $clientId";
        $result = mysql::select($query);
        $estateIds = array();
        foreach($result as $res)
        {
            $estateIds[] = $res['estateId'];
        }
        return $estateIds;
    }

    public function insertEstateImage($estateId, $imgName){
        $query = "INSERT INTO picture (fk_ESTATE, name) VALUES ('$estateId', '$imgName')";
        mysql::query($query);
    }

    public function getEstateImage($estateId){
        $query = "SELECT name FROM picture WHERE fk_ESTATE = '$estateId' LIMIT 1";
        $result = mysql::select($query);
        if(sizeof($result) == 0){
            return null;
        }else{
           return $result[0]['name'];  
        }
       
    }

    public function deleteEstate($id){
        $query = "DELETE FROM estate WHERE id = $id";
        mysql::query($query);
    }

    public function update($data, $estateId){

        $query = 
       "UPDATE `estate` 
        SET `area` = '{$data['area']}',
        `build_year` = '{$data['buildYear']}',
        `room_count` = '{$data['roomCount']}',
        `floor` = '{$data['floor']}', 
        `price` = '{$data['price']}',
        `description` = '{$data['description']}',
        `ownership_document` = '{$data['ownershipDocs']}',
        `cadastral_document` = '{$data['cadastralDocs']}', 
        `fk_CATEGORY` = '{$data['category']}', 
        `fk_STREET` = '{$data['street']}', 
        `fk_CONDITIONS` = '{$data['condition_name']}',
        `fk_ESTATE_TYPE` = '{$data['type']}',
        `fk_HEATING` = '{$data['heating']}', 
        `fk_CITY` = '{$data['city']}' 
        WHERE `estate`.`id` = $estateId ";
        mysql::query($query);
    }

    public function updateFeatures($features, $estateId){
        $query = "DELETE FROM conveniences_of_estates 
        WHERE fk_ESTATE = $estateId ";

        mysql::query($query);

        estate::insertFeatures($features, $estateId);
    }

}


?>