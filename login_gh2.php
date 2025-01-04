<?php


$conn = new mysqli("localhost", "root", "", "gamehub");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user=$_POST["username"];
    $pass=$_POST["password"];
    $sql="SELECT `username` , `password` FROM users WHERE username='$user' AND password='$pass'";
    $result=$conn->query($sql);
    if($result->num_rows==1){
            echo("wlcm");
        }else{
            echo("wrong password");
        }
    }
$conn->close();
?>