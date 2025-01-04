$(document).ready(function(){
    console.log($("#search").length); 
    
    $('.tsawer img').hover(function(){
        $(this).parent().find('.smya').show();
    },
    function(){
        $(this).parent().find('.smya').hide()
    });
    
    
    $('#search').on("input",function(){
        console.log("Script is running!");
        const lktba=$(this).val().toLowerCase();
        console.log("Search term:", lktba);
        $("#games .tsawer").each(function(){
            const smitlgame=$(this).find('.smya').text().toLowerCase();
            
            console.log("Game name:", smitlgame);
            
           if (smitlgame.indexOf(lktba)===-1){
             $(this).hide();
           }  else {
            $(this).show(); // Show if it matches
        }
        });   
    });
    
    });