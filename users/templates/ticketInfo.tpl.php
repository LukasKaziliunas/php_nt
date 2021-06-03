<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        #question-cont{
            border: 1px solid grey;
            padding: 10px;
        }

        #date-span{
            font-size: 13px;
        }

        #messages-cont{

        }

        .message{
           /* border: 1px solid grey;*/
            margin: 10px 50px 10px 50px;
            height: 250px;

        }

        .message-info{
           /* border: 1px solid grey;*/
           border-right: 1px solid grey;
            margin: 3px 5px 3px 5px;
            height: 240px;
            width: 200px;
            padding: 10px 0 10px 20px;
            float: left;
        }

        .message-text{
           /* border: 1px solid grey;*/
            margin: 3px 5px 3px 5px;
            height: 240px;
            width: 670px;
            padding: 10px 0 10px 20px;
            float: right;
            background-color: #f2f2f2;
        }

        #button-div{
            margin-bottom: 150px;
        }
    
    </style>
</head>
<body>
<div id="question-cont">
<p>
    <h3><?php echo $ticketInfo['title'] ?></h3>
    <span><?php echo $ticketInfo['desciption'] ?></span>  
</p>
<p>
<span id="date-span" style="color: grey"><?php echo $ticketInfo['time'] ?></span>
</p>
</div>
<br>
<hr>

<div id="messages-cont">

<?php
    if(!empty($messages))
    foreach($messages as $message)
    {
        echo "
        <div class='message'>
        <div class='message-info'>
            <p>
                <b>{$message['senderName']}</b><br>
                <span>{$message['time']}</span>
            </p>
        </div>
        
        <div class='message-text'>
            <p>{$message['description']}</p>
        </div>
        </div> ";
        echo "<hr>";
    }

?>

<?php
if($ticketInfo['status'] == 1)
{
    echo "<div id='button-div' class='float-right' style='background-color:  #abdde5' >
    <a class='btn btn-primary' href='index.php?sub=users&func=reply&id={$ticketInfo['id']}' role='button'>Atsakyti</a>
    </div>";
}
?>
</div>


</body>
</html>