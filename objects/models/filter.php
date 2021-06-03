<?php

class filter {

public function makeWhereQuery($type, $areaFrom, $areaTo, $roomCount, $floorFrom, $floorTo, 
$buildYear, $priceFrom, $priceTo, $category, $condition, $heating ){

    $where = "WHERE ";

            if(!empty($type)){
                $where = $where . "fk_ESTATE_TYPE = $type AND ";
            }
            if(!empty($areaFrom)){
                $where = $where . "area >= $areaFrom AND ";
            }
            if(!empty($areaTo)){
                $where = $where . "area <= $areaTo AND ";    
            }
            if(!empty($roomCount)){
                $where = $where . "room_count = $roomCount AND ";   
            }
            if(!empty($floorFrom)){
                $where = $where . "floor >= $floorFrom AND "; 
            }
            if(!empty($floorTo)){
                $where = $where . "floor <= $floorTo AND "; 
            }
            if(!empty($buildYear)){
                $where = $where . "build_year >= $buildYear AND ";
            }
            if(!empty($priceFrom)){
                $where = $where . "price >= $priceFrom AND ";
            }
            if(!empty($priceTo)){
                $where = $where . "price <= $priceTo AND ";
            }
            if(!empty($category)){
                $where = $where . "fk_CATEGORY = $category AND ";
            }
            if(!empty($condition)){
                $where = $where . "fk_CONDITIONS = $condition AND ";
            }
            if(!empty($heating)){
                $where = $where . "fk_HEATING = $heating AND ";
            }
    
    $where = substr($where, 0, -4);

    return $where;

}


}
