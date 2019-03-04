$(document).ready(function(){
    $(".chanson").click(function(e){
        e.preventDefault();
        let audio = $("#audio");
        let f = $(this).attr("data-file");
        console.log(f);

        audio[0].src= f ;
        audio[0].play();
    });

$('#search').submit(function(e){
    e.preventDefault();
    window.location.href ="/recherche/"+e.target.elements[0].value;
})



});