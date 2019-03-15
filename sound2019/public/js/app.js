
$(document).ready(function(){
    $(document).pjax('[data-pjax] a, a[data-pjax]','#pjax-container');
    $(".chanson").click(function(e){
        e.preventDefault();
        let audio = $("#audio");
        let f = $(this).attr("data-file");
        console.log(f);

        audio[0].src= f ;
        audio[0].play();
    });


    $("#search").submit(function(e) {
        e.preventDefault();
        if($.support.pjax) 
        $.pjax({url: "/recherche/"+e.target.elements[0].value, container: '#pjax-container'});
        else
        window.location.href="/recherche/"+e.target.elements[0].value;
    });

/*$('#search').submit(function(e){
    e.preventDefault();
    window.location.href ="/recherche/"+e.target.elements[0].value;
});*/


  

$('#testajax').click(function(e){
    e.preventDefault();
    $.ajax({
        type:"GET",
        url:"/testajax",
        success: function(data,textStatus, jqXHR){
            $("#aremplir").html(data);
        },
        error: function (jqXHR,textStatus,errorThrown){

        }
    });
});


});

