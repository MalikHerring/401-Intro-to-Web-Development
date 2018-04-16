$(document).ready(function() {
    $("#Login").hide();
    $("#CreateAccount").hide();
    $("#Cancel").hide();
});

$("#loginButton").click(function(){
   $("#Login").show();
   $(".button").hide();
   $("#Cancel").show();
});

$("#createButton").click(function(){
   $("#CreateAccount").show();
   $(".button").hide();
   $("#Cancel").show();
});