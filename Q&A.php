<?php
$conn = new mysqli("localhost", "root", "", "gamehub");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $msg=$_POST["message"];
    $sql="INSERT INTO `q&a` (msg) VALUES ('$msg')";
    $result=$conn->query($sql);
    if ($result) {
        echo "msg sent";
    } else {
        echo "Error: " ;
    }
}
$sql2 = "SELECT * FROM users";
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
        #ktb{
            border: solid red;
            width: 50vw;
            height: 30vh;
            padding: 50px;
        }
        #ktb input{
            width:50% ;
        }
        #qst{
            border: solid green;
            width: 97vw;
            height: 50vh;
        }
    </style>
</head>
<body>
    <div id="ktb">
        <strong>Proceed to leave a question</strong>
        <form action="Q&A.php" method="post">
            <input type="text" name="message">
            <button type="submit">SEND</button>
        </form>
    </div>
    <div id="qst">
        <table>
            <tr>
                <th>Id</th>
                <th>message</th>
            </tr>
            <?php foreach($msgs as $lmsg):?>
                <tr>
                    <th><?php echo($lmsg["id"]) ?></th>
                    <th><?php echo($lmsg["msg"]) ?></th>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>