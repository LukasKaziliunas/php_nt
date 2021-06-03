<link rel="stylesheet" type="text/css" href="styles/ads_style.css">
<div id="offer-list-container">
    
    <?php
    echo $errorMsg;
    foreach($data as $row)
    {
        
        $image = estate::getEstateImage($row['id']);

        if(empty($image))
        $image = "default-house.jpg";

        $sum = $row['price'];
        
        if(!empty($row['fee']))
        $sum = $row['price'] + $row['fee'];


        echo "
        <a href='index.php?sub=objects&func=getInfo&id={$row['id']}'>

        <div class='offer-box'>
            <div class='picture-box'>
            <img src='objects/pictures/$image' height='130' width='180'>
            </div>

            <div class='offer-info-box'>
                <div class='estate-address-box'>
                <h5 class='estate-address'>{$row['city']},{$row['street']}</h5>
                </div>

                <div class='estate-description-box'>
                <span class='estate-description'> plotas : {$row['area']} | tipas : {$row['type']} | būklė : {$row['condition_name']} </span>
                </div>
              
                <div class='estate-price-box'>
                <span class='estate-price'> {$row['price']} &euro; (bendra suma = $sum &euro; ) </span> 
                </div>
            </div>
        </div>
        </a>"
        ;
        
    }

    ?>
   
   
</div>