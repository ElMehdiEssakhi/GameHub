<?php
session_start();
$conn = new mysqli("localhost", "root", "", "gamehub");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (!isset($_SESSION['username'])) {
    header("Location: login_gh.php");
    exit();
}
$username=$_SESSION["username"];
$email=$_SESSION["email"];
$first_name=$_SESSION["firstname"];
$last_name=$_SESSION["lastname"];
include("fetch_pfp.php");
$feedback="beforesub";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!empty($_POST["message"])){
        $msg=$_POST["message"];
        $sql="INSERT INTO `messages` (username , message) VALUES ('$username','$msg')";
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="gamehub.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        body{
            background-color: #212529;
            font-family: "Open Sans", sans-serif;
        }
        #ktb{
            width: 50vw;
            height: 30vh;
            padding: 50px;
        }
        strong{
            color: rgb(206, 200, 189);
        }
        #ktb input{
            width:50% ;
            height: 50px;
            border-radius: 5px;
            border: none;
            margin: 10px;
            background-color: #0D0E0F;
            color: white; 
        }
        #ktb button{
            border-radius:10px ;
            border: none;
            background-color: grey;
            padding: 5px 10px;
            cursor: pointer;
        }
        #qst{
            border: 1px solid black;
            width: 97vw;
            height: 50vh;
        }
        #msgs{
            color: rgb(206, 200, 189);
        }
        #nm{
            padding: 5px 20px;
            border-bottom:2px solid red;
        }
        #wlcmsg{
        color: white;
        }
        .useroptnav{
            font-size: 16px;
            border-radius: 100px;
            border: none;
            padding: 8px 15px 8px 15px ;
            background-color: #d00000;
            color: #ffffff;
            transition: all 0.5s;
            cursor: pointer;
        }
        .useroptnav:hover{
            background-color: #9d0208;
            box-shadow: 0 0 20px #dc2f02;
            transform: scale(1.1);
        }
        .useroptnav:active {
            background-color: #000000;
            transition: all 0.25s;
            box-shadow: none;
            transform: scale(0.98);
        }
        #userbar{
            position: relative;
            display: flex;
            align-items: center;
            justify-content:space-around;
            width: 20%;
        }
        #useroptions{
            position: absolute;
            transform: translate(-50%);
            padding: 8px;
            border-radius: 20px;
            top: 80%;
            left: 44%;
            background-color:rgb(52, 53, 56);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 1);
            display: none;
        }
        #userinfos{
            display:flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            padding: 0px 20px 20px;
        }
        #user_pic{
            border: solid red;
            text-align: center;
            background-color: #212529;
            color: #ffffff;
            border-radius:50px;
            width: 80px;
            height: 80px;
            overflow: hidden;
            cursor: pointer;
        }
        #user_pic img{
        
            width: 80px;
            height:80px;
        }
        #settings{
            display: flex;
            flex-direction: column;
            align-items:center ;
            gap: 16px;
            padding: 10px;
        }
        #pen{
            background-color: #ffffff;
            border-radius: 50%;
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 25px;
            height: 25px;
            top: 47%;
            left: 56%;
        }
        #msgs th:nth-child(n+2){
            border-bottom: 1px solid rgb(50, 55, 59);
            padding: 15px;
        }

    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const button=document.getElementById("logoutbut");
            const myoptions=document.getElementById("useroptions");
            const pic=document.getElementById("user_pic");
            const piclink=document.getElementById("piclink");
            button.addEventListener("click",function(event){
                event.stopPropagation(); 
                if(myoptions.style.display==="none"||myoptions.style.display===""){
                    myoptions.style.display="block";
                }else if(myoptions.style.display==="block"){
                    myoptions.style.display="none";
                }
            })
            document.body.addEventListener("click",function(){
                myoptions.style.display='none';
            })
            myoptions.addEventListener("click",function(event){
                event.stopPropagation();
            })
            pic.addEventListener("click",function(){
                piclink.click();
            })
            piclink.addEventListener("change",function(){
                document.getElementById("pictodb").submit();
            })
        })
    </script>
</head>
<body>
    <header style="background-color: rgb(0, 0, 0);">
        <div id="up">
                <div id="tswirawtitle">
                    <div><img class="logo" src="picsgamehub/posters/logo.png" alt="GameHub"></div>
                    <div id="onwan">GAMEHUB</div>
                </div>
                <div id="userbar">   
                    <div id="wlcmsg" ><?php echo("welcome, $username");?></div>
                        <div><button id="logoutbut" class="useroptnav" type="button"><?php echo("$first_name[0]"."$last_name[0]") ?>&nbsp;<i class="fa-regular fa-user"></i></button></div> <!-- onclick="kill()" -->
                        <div id="useroptions" >
                            <div id="userinfos">
                                <p><?php echo($email) ?></p>
                                <div id="user_pic">
                                    <img src="<?php echo $pic; ?>" alt="z">
                                    <form id="pictodb" action="profile_pic.php" method="post" enctype="multipart/form-data">
                                        <input id="piclink" type="file" name="piclink" style="display:none;">
                                    </form>
                                </div>
                                <div id="pen">
                                    <i class="fa-solid fa-pen"></i>
                                </div>
                            </div>
                            <div id="settings">
                                <button class="useroptnav">settings</button>
                                <button id="logoutbut" class="useroptnav" type="button" onclick="window.location.href = 'logout.php'">Log out</button>
                            </div>
                        </div>  
                </div>
        </div>
    </header>
    <div class="menu">
                    <div class="menu-item"> <button type="button" class="botonat" onclick="window.location.href='welcome_gh.php'"><i class="fa-solid fa-house"></i>&nbsp;Home</button> </div>
                    <div class="menu-item"> <button type="button" class="botonat"><i class="fa-regular fa-newspaper"></i>&nbsp;Game News</button></div>
                    <div class="menu-item"> <button type="button" class="botonat" onclick="window.location.href='Q&A.php'"><i class="fa-regular fa-comments"></i>&nbsp;Need Help</button> </div>
                    <div class="menu-item"> <button type="button" class="botonat"><i class="fa-solid fa-hand-holding-dollar"></i>&nbsp;Support Us</button> </div>
    </div>
    <div id="ktb">
        <strong>Proceed to leave a question</strong>
        <form action="Q&A.php" method="post">
            <input type="text" name="message" placeholder="....?">
            <button type="submit">Send</button>
            <?php if($feedback=="sent"): ?>
                <p class="feedback"> Your Question Was Sent</p>
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
                <th>Reply</th>
            </tr>
            <?php foreach($msgs as $lmsg):?>
                <tr id="msgs">
                    <th id="nm"><?php echo($lmsg['username'].":") ?></th>
                    <th><?php echo($lmsg['message']) ?></th>
                    <?php if($lmsg['reply']): ?>
                    <th><?php echo($lmsg['reply']) ?></th>
                    <?php else: ?>
                    <th></th>   
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php include("footer.html") ?>
</body>
</html>