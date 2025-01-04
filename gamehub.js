$(document).ready(function(){

$('.games img').hover(function(){
    $(this).parent().find('p').show();
},
function(){
    $(this).parent().find('p').hide()
});


$('#search').on("input",function(){
    console.log("Script is running!");
    const lktba=$(this).val().toLowerCase();
    console.log("Search term:", lktba);
    $(".games div").each(function(){
        const smitlgame=$(this).find('p').text().toLowerCase();
        
        console.log("Game name:", smitlgame);
        
       if (smitlgame.indexOf(lktba)===-1){
         $(this).hide();
       }  else {
        $(this).show(); 
    }
    });   
});
// $('.finalsignup').click(function(){
//     let nom = $('#name').val();
//     let email = $('#email').val();
//     let pass = $('#password').val().trim();
//     if(nom && email && pass){
//         if(email.indexOf("@gmail.com")!==-1){
//         $('.feedback').addClass('done').text('Account succefully created');
//         }else{
//         $('.feedback').addClass('error').text("Use a valid email");
//     }}else{
//         $('.feedback').addClass('error').text('Something went wrong');
//     }
// })
    
    
});
document.addEventListener('DOMContentLoaded', function() {
        const signubutton=document.getElementById("signupp");
        const loginbutton=document.getElementById("loginn")
        const signupop=document.getElementById("signuppop");
        const loginpop=document.getElementById("loginpop");
        const submit=document.getElementById("signbutton");
        const closebuttons = document.querySelectorAll('.close button');

        signubutton.addEventListener("click", function(){
            signupop.show();
            loginpop.close();
        })
        loginbutton.addEventListener("click", function(){
            loginpop.show();
            signupop.close();
        })
        document.getElementById("tologin").addEventListener("click",function(){
            signupop.close();
            loginpop.show();
        })
        document.getElementById("tosignup").addEventListener("click",function(){
            loginpop.close();
            signupop.show();
        })
        closebuttons.forEach(function(closebutton){
            closebutton.addEventListener("click",function(){
                this.parentElement.parentElement.close();
            })
        })
        submit.addEventListener("click", function(event){
            const firstname=document.getElementById("fname").value;
            const lastname=document.getElementById("lname").value;
            const email=document.getElementById("email").value;
            const pass=document.getElementById("password").value;
            const cfpass=document.getElementById("cfpassword").value;
            if(!firstname||!lastname||!email||!pass||!cfpass){
                event.preventDefault();
                document.getElementById("signupfeedback").innerHTML="please fill all the fields"
            }
            if(pass!==cfpass){
                event.preventDefault();
                document.getElementById("signupfeedback").innerHTML="please confirm the password"
            }
            })
        });