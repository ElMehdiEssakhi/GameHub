<?php
session_start();

$conn = new mysqli("localhost", "root", "", "gamehub");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$fb="before";
if($_SERVER["REQUEST_METHOD"]=="POST"){
            $piclink=$_FILES["piclink"];
            $filename = $piclink['name'];
            $filetmpname = $piclink['tmp_name'];
            $filesize = $piclink['size'];
            $fileerror = $piclink['error'];
            $filetype = $piclink['type'];
            $folder='profile_pics/'.$filename;
            $username=$_SESSION["username"];
            $sql="SELECT `image` FROM profile_pics WHERE username='$username'";
            $result=$conn->query($sql);
            if($row=$result->fetch_assoc()){
                $sql="UPDATE `profile_pics` SET `image`=? WHERE username=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $folder,$username);
            }else{
                $sql = "INSERT INTO `profile_pics` (`username`,`image`) VALUES (?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $username, $folder);
            }
            if ($stmt->execute()) {
                header("location:welcome_gh.php");
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        }
$conn->close();
?>
