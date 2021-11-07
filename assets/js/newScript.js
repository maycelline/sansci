$(document).ready(function(){
    $("#register").hide();
});

$("#create").click(function(){
    $("#login").hide();
    $("#register").slideToggle(1000);
});

$("#create2").click(function(){
    $("#register").hide();
    $("#login").slideToggle(1000);
})