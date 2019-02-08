$(document).ready(function(){
    $(".chanson").click(function(e){
        e.preventDefault();
        let audio = $("#audio");
        let f = $(this).attr("data-file");
        console.log(f);

        audio[0].src= f ;
        audio[0].play();
    })
});