$(document).ready(function() {
    $("#Login").hide();
    $("#CreateAccount").hide();
    $("#Cancel").hide();

    $("div#loginButton.button").click(function(){
        $("#CreateAccount").hide();    
        $("#Login").show();
        $(this).css("background-color", "#50A2A7");
        $("div#createButton.button").css("background-color", "#004BA8");
    });
    
    $("ul#horizontal-menu li.login").click(function(){
        $("#CreateAccount").hide();    
        $("#Login").show();
        $("div#loginButton.button").css("background-color", "#50A2A7");
        $("div#createButton.button").css("background-color", "#004BA8");
    });

    $("div#createButton.button").click(function(){
        $("#Login").hide();
        $("#CreateAccount").show();
        $(this).css("background-color", "#50A2A7");
        $("div#loginButton.button").css("background-color", "#004BA8");
    });
    
    $("ul#horizontal-menu li.signup").click(function(){
        $("#Login").hide();
        $("#CreateAccount").show();
        $("div#createButton.button").css("background-color", "#50A2A7");
        $("div#loginButton.button").css("background-color", "#004BA8");
    });
    
    $("div.message").click(function(){
        $(this).fadeOut();
    });

});




