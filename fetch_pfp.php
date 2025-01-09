<?php 
$conn = new mysqli("localhost", "root", "", "gamehub");
$sql="SELECT `image` FROM profile_pics WHERE username='$username'";
$result=$conn->query($sql);
if($row=$result->fetch_assoc()){
    $_SESSION["pic"]=$row['image'];
}else{
    $_SESSION["pic"]='picsgamehub/default_pfp.webp';
}
$pic=$_SESSION["pic"];
?>