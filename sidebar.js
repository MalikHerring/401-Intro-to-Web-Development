$(document).ready(function() {
    $("#Login").hide();
    $("#CreateAccount").hide();
    $("#Cancel").hide();

    $("div#loginButton.button").click(function(){
        $("#Login").show();
        $(".button").hide();
        $("#Cancel").show();
    });

    $("div#createButton.button").click(function(){
        $("#CreateAccount").show();
        $(".button").hide();
        $("#Cancel").show();
    });

});




