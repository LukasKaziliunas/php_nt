<link rel="stylesheet" type="text/css" href="styles/ads_style.css">
<link href="styles/fontawesome/css/all.css" rel="stylesheet">
<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>


<div id="offer-info-container">

  <div id="offer-info-header">
    <div id='seller-info'>
      <span><b>Pardavėjas</b> - <?php echo $seller[0]['sellerName'] ?>
      </span> <span><b>Reitingas:</b>
        <?php
        echo " ";
        if(empty($rating))
        {
          echo "nėra";
        }
        else{
          echo $rating[0]['level'];

          if ($rating[0]['current_tendency'] == 1)
           echo "<i class='fas fa-arrow-up' style='color: green'></i>";
           else if ($rating[0]['current_tendency'] == 3)
           echo "<i class='fas fa-arrow-down' style='color: red'></i>";
            else
           echo "-";


        }
        
        ?>
      </span>
    </div>

    <div class="offer-info-buttons-box">
      <?php echo $buttons ?>
    </div>

  </div>


  <div class="offer-info-toppart">

    <div class="offer-info-picture-box">
      <img src="objects/pictures/<?php echo $image; ?>" height="330" width="330">
    </div>

    <div class="offer-info-details">
      <div class="offer-info-details-row">
        <div class="details-title">
          <p>adresas:</p>
        </div>
        <div class="details-data"><?php if (isset($data['city'])) {
                                    echo $data['city'];
                                  }
                                  echo " , ";
                                  if (isset($data['street'])) {
                                    echo $data['street'];
                                  } ?></div>
      </div>
      <div class="offer-info-details-row">
        <div class="details-title">
          <p>tipas:</p>
        </div>
        <div class="details-data"><?php if (isset($data['type'])) {
                                    echo $data['type'];
                                  } ?></div>
      </div>
      <div class="offer-info-details-row">
        <div class="details-title">
          <p>plotas:</p>
        </div>
        <div class="details-data"><?php if (isset($data['area'])) {
                                    echo $data['area'];
                                  } ?></div>
      </div>
      <div class="offer-info-details-row">
        <div class="details-title">
          <p>kambarių skaičius:</p>
        </div>
        <div class="details-data"><?php if (isset($data['room_count'])) {
                                    echo $data['room_count'];
                                  } ?></div>
      </div>
      <div class="offer-info-details-row">
        <div class="details-title">
          <p>aukštas:</p>
        </div>
        <div class="details-data"><?php if (isset($data['floor'])) {
                                    echo $data['floor'];
                                  } ?></div>
      </div>
      <div class="offer-info-details-row">
        <div class="details-title">
          <p>pastatymo metai:</p>
        </div>
        <div class="details-data"><?php if (isset($data['build_year'])) {
                                    echo $data['build_year'];
                                  } ?></div>
      </div>
      <div class="offer-info-details-row">
        <div class="details-title">
          <p>būklė:</p>
        </div>
        <div class="details-data"><?php if (isset($data['condition_name'])) {
                                    echo $data['condition_name'];
                                  } ?></div>
      </div>
      <div class="offer-info-details-row">
        <div class="details-title">
          <p>šildymas:</p>
        </div>
        <div class="details-data"><?php if (isset($data['heating'])) {
                                    echo $data['heating'];
                                  } ?></div>
      </div>
      <div class="offer-info-details-row">
        <div class="details-title">
          <p>nuosavybes dokumentai</p>
        </div>
        <div class="details-data"><?php if (isset($data['ownership_document'])) {
                                    echo $data['ownership_document'];
                                  } ?></div>
      </div>
      <div class="offer-info-details-row">
        <div class="details-title">
          <p>kadastriniai dokumentai</p>
        </div>
        <div class="details-data"><?php if (isset($data['cadastral_document'])) {
                                    echo $data['cadastral_document'];
                                  } ?></div>
      </div>
      <div class="offer-info-details-row">
        <div class="details-title">
          <p>kaina:</p>
        </div>
        <div class="details-data"><?php if (isset($data['price'])) {
                                    echo $data['price'] . " &euro;";
                                  }
                                  if (isset($data['price']) && isset($data['fee'])) {
                                    echo " ( ";
                                    echo $data['price'] + $data['fee'];
                                    echo "&euro; )";
                                  }

                                  ?> </div>
      </div>

    </div>

    <div class="offer-info-feature">
      <span style="font-weight: bold"> Ypatybės:</span> <br>
      <?php
      foreach ($features as $feature) {
        echo "<div class='offer-info-feature-row'>
                  <div class='feature-text'>{$feature['name']}</div>
                </div>";
      }

      ?>

    </div>
  </div>

  <div class="offer-info-description-box">
    <p>
      <?php if (isset($data['description'])) {
        echo $data['description'];
      }
      ?>
    </p>
  </div>

  <div class="offer-info-buttons-box">
    <?php
    /*if ($_SESSION['uid'] == CLIENT) {
      echo "<a href='index.php?sub=contracts&func=create&id=$id'>
      <div id='button-default' class='offer-info-buttons-box-button'>sudaryti sutartį</div>
    </a>
    <a href='index.php?sub=visits&func=buyers_add_visit&estate=$id&seller_id=$sellerId'>
      <div id='button-default' class='offer-info-buttons-box-button'>planuoti vizitą</div>
    </a> ";
    }
*/
    ?>
  </div>

</div>


<script type="text/javascript">
  function selectionToggle() {
    var isSelected = document.getElementById('button-selected').getAttribute('isSelected');
    var estateId = document.getElementById('button-selected').getAttribute('estateId');
    var clientId = document.getElementById('button-selected').getAttribute('clientId');
    var hmlhttp = new XMLHttpRequest();
    hmlhttp.open("GET", "objects/controllers/selectorAjax.php?isSelected=" + isSelected + "&estateId=" + estateId + "&clientId=" + clientId, false);
    hmlhttp.send(null);
    window.location.reload(true);
  }


  function confirmDelete(id) {
    var subsystem = "objects";
    if (confirm("test")) {
      window.location.replace("index.php?sub=" + subsystem + "&func=delete&id=" + id);
    }
  }
</script>