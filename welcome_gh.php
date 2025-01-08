<?php 
session_start();  
$conn = new mysqli("localhost", "root", "", "gamehub");                  
if (!isset($_SESSION['username'])) {
    header("Location: login_gh.php");
    exit();
}
$username=$_SESSION["username"]; 
$email=$_SESSION["email"];
$first_name=$_SESSION["firstname"];
$last_name=$_SESSION["lastname"];
$sql="SELECT `image` FROM profile_pics WHERE username='$username'";
$result=$conn->query($sql);
if($row=$result->fetch_assoc()){
    $_SESSION["pic"]=$row['image'];
}
$pic=$_SESSION["pic"];
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="gamehub.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>GameHub</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="gamehub.js"></script>
    <script>
        function kill(){
            window.location.href = "logout.php";
        }
        document.addEventListener('DOMContentLoaded', function() {
            const button=document.getElementById("logoutbut");
            const myoptions=document.getElementById("useroptions");
            const pic=document.getElementById("user_pic");
            const piclink=document.getElementById("piclink");
            button.addEventListener("click",function(){
                console.log("zzzzzzzzz")
            if(myoptions.style.display==="none"||myoptions.style.display===""){
                myoptions.style.display="block";
            }else if(myoptions.style.display==="block"){
                myoptions.style.display="none";
            }
            })
            pic.addEventListener("click",function(){
                piclink.click();
            })
            piclink.addEventListener("change",function(){
                document.getElementById("pictodb").submit();
            })
        })
    </script>
    <style>
        body{
            font-family: "Open Sans", sans-serif;
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
            left: 50%;
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
    </style>
</head>

<body style="background-color: #212529;">
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
                            <button id="logoutbut" class="useroptnav" type="button" onclick="kill()">Log out</button>
                        </div>
                    </div>  
            </div>
    </div>
    </header>
    <div class="lmain" >
            <div class="menu">
                    <div class="menu-item"> <button type="button" class="botonat"><i class="fa-solid fa-house"></i>&nbsp;Home</button> </div>
                    <div class="menu-item"> <button type="button" class="botonat"><i class="fa-regular fa-newspaper"></i>&nbsp;Game News</button></div>
                    <div class="menu-item"> <button type="button" class="botonat" onclick="window.location.href='Q&A.php'"><i class="fa-regular fa-comments"></i>&nbsp;Need Help</button> </div>
                    <div class="menu-item"> <button type="button" class="botonat"><i class="fa-solid fa-hand-holding-dollar"></i>&nbsp;Support Us</button> </div>
            </div>
    <input id="search" type="text" placeholder="Search For Games">
    <p></p>
    <div class="games">
                <div ><a href="eldenring.html"><img src="picsgamehub/posters/elden ring.jpg"><p class ="smya" style="display: none;">ELDEN RING</p></a></div> 
                <div ><a href="thewitcher3.html"><img src="picsgamehub/thewitcher3/the witcherp.jpg"  ><p class ="smya" style="display: none;">THE WITCHER 3</p></a></div>
                <div ><a href="cyberpunk.html"><img src="picsgamehub/posters/cyberpunk.jpg"  ><p class ="smya" style="display: none;">CYBERPUNK 2077</p></a></div>
                <div ><a href="doom.html"><img src="picsgamehub/doom/doomp.jpg"  ><p class ="smya" style="display: none;">DOOM ETERNAL</p></a></div>
                <div ><a href="arkhamcity.html"><img src="picsgamehub/posters/btmn.jpg"><p class ="smya" style="display: none;">BATMAN ARKHAM CITY</p></a></div>
                <div ><a href="reddead2.html"><img src="picsgamehub/posters/Reddeadcover.webp"  ><p class ="smya" style="display: none;">RED DEAD REDEMPTION II</p></a></div>
                <div ><a href="bannerlord.html"><img src="picsgamehub/posters/m&b.jpg"  ><p class ="smya" style="display: none;">MOUNT&BLADE BANNERLORD</p></a></div>
                <div ><a href="outlast.html"><img src="picsgamehub/outlast/outlastp.jpg"  ><p class ="smya" style="display: none;">OUTLAST</p></a></div>
                <div ><a href="theforest.html"><img src="picsgamehub/the forest/theforestp.jpg"><p class ="smya" style="display: none;">THE FOREST</p></a></div>
                <div ><a href="daysgone.html"><img src="picsgamehub/days gone/daysgonep.jpg"  ><p class ="smya" style="display: none;">DAYS GONE</p></a></div>
                <div ><a href="dyinglight.html"><img src="picsgamehub/posters/dying light.jpg"  ><p class ="smya" style="display: none;">DYING LIGHT</p></a></div>
                <div ><a href="mafia.html"><img src="picsgamehub/posters/mafia.jpg"  ><p class ="smya" style="display: none;">MAFIA 1</p></a></div>
    </div>
    <br><br>
</div>
</body>
</html> 