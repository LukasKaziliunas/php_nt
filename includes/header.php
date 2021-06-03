<style>

#menuContainer
{
    margin-bottom: 15px;
}

</style>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once 'config.php';   // gaunu root path
?>

    
        <?php
            if(!isset($_SESSION['uid']) || $_SESSION['uid'] == 0)  // jei niekas neprisijunges arba svecias rodyti registravima ir prisijungima
                { 
                    echo '<a href="' . ROOT . '/users/controllers/login.php">prisijungti</a><br>';
                    echo '<a href="' . ROOT . '/users/controllers/loginStaff.php">darbuotoju prisijungimas</a><br>';
                    echo '<a href="' . ROOT . '/users/controllers/registration.php">registruotis</a><br>';
                }

              echo  '<a href="index.php">home</a>-';
              echo  '<a href="' . ROOT . '/users/controllers/logout.php">atsijungti</a>';
                //var_dump($_SESSION);
                $debug_uid = "default_not_set";
                //DEBUG _TESTINIS
                if( $_SESSION['uid'] == 1)
                {
                $debug_uid = "CLIENT";
                }
                else if ($_SESSION['uid'] == 2)
                {
                $debug_uid = "BROKER";
                }
                else if($_SESSION['uid'] == 3)
                {
                $debug_uid = "NOTARY";
                }
                else if($_SESSION['uid'] == 10)
                {
                $debug_uid = "ADMIN";
                }
                else if($_SESSION['uid'] == 0)
                {
                $debug_uid = "GUEST";
                }
                else {
                $debug_uid = "ERROR";
                }
                echo  "<br>user-level: <b>" . $_SESSION['uid'] . " (" . $debug_uid . ")". "</b>";
                if(isset($_SESSION['name'] )  && isset($_SESSION['surname']) )
                {
                echo "<br><b>" . $_SESSION['name'] . " " . $_SESSION['surname'] . "</b>";
                }
        ?>
    <hr>

        <?php
            if(isset($_SESSION['uid']))
            {
                $uid = $_SESSION['uid'];
            }
            else
            {
                $uid = 0;
            }
            
            $menu = DIR . '/includes/menu_' . $uid . '.php'; // pridedamas tam tikro meniu adresas
            include $menu;     // tas meniu itraukiamas prie header

        ?>
