<?php
session_start();
$user_name=$_SESSION["username"];
$conn = new mysqli("localhost", "root", "", "gamehub");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$feedback="beforesub";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!empty($_POST["message"])){
        $msg=$_POST["message"];
        $sql="INSERT INTO `messages` (user_name , message) VALUES ('$user_name','$msg')";
        $result=$conn->query($sql);
        if ($result) {
            $feedback="sent";
        } else {
            $feedback="error";
        }
    }else{
        $feedback="emty";
    }
    
}
$sql2 = "SELECT * FROM `messages`";
$result2=$conn->query($sql2);
$msgs=[];
while($row=$result2->fetch_assoc()){
    $msgs[]=$row;
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: #212529;
        }
        #ktb{
            width: 50vw;
            height: 30vh;
            padding: 50px;
        }
        strong{
            color: rgb(206, 200, 189);
            font-family:Arial, Helvetica, sans-serif;
        }
        #ktb input{
            width:50% ;
            border-radius: 5px;
            border: none;
            margin: 10px;
            background-color: #0D0E0F;
            color: white; 
        }
        #ktb button{
            font-family:Arial, Helvetica, sans-serif;
            border-radius:10px ;
            border: none;
            background-color: grey;
            padding: 5px 10px;
        }
        #qst{
            border: 1px solid black;
            width: 97vw;
            height: 50vh;
        }
        #hd{
            font-family:Arial, Helvetica, sans-serif;
        }
        #msgs{
            font-family:Arial, Helvetica, sans-serif;
            color: rgb(206, 200, 189);
        }
        #nm{
            padding: 5px 20px;
            border-bottom:2px solid red;
        }
    </style>
</head>
<body>
    <div id="ktb">
        <strong>Proceed to leave a question</strong>
        <form action="Q&A.php" method="post">
            <input type="text" name="message">
            <button type="submit">Send</button>
            <?php if($feedback=="sent"): ?>
                <p class="feedback"> Your Question Is Sent</p>
            <?php elseif($feedback=="emty"): ?>
                <p class="feedback"> Write Something</p>   
            <?php elseif($feedback=="error"): ?>
                <p class="feedback"> Failed to Send</p>
            <?php endif; ?>

        </form>
    </div>
    <div id="qst">
        <table>
            <tr id="hd">
                <th>User</th>
                <th>Message</th>
            </tr>
            <?php foreach($msgs as $lmsg):?>
                <tr id="msgs">
                    <th id="nm"><?php echo($lmsg['user_name'].":") ?></th>
                    <th><?php echo($lmsg['message']) ?></th>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>