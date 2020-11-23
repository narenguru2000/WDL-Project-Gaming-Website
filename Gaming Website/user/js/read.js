$(document).ready(function(){
    $.getJSON("http://localhost/WDL-Project-Gaming-Website/Gaming%20Website/php/user_data.json", function(data){
       // document.write(data.name + "<br>"); 
        //document.write(data.username); 
        document.getElementById("username").innerHTML = "Let's Play " + data.name + "!";
        alert("Logged in as "+ data.name + "!");
    }).fail(function(){
        document.write("An error has occurred.");
    });
});