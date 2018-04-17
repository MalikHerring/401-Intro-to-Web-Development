$(document).ready(function() {
    $("#Login").hide();
    $("#CreateAccount").hide();
    $("#Cancel").hide();
    $("#logout").hide();

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

    $("div#Cancel.button").click(function(){
        $("#Login").hide();
        $("#CreateAccount").hide();
        $("div.button").show();
        $("#Cancel").hide();
    });
});




