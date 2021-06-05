$(document).ready(function() {
    'use strict';
    if($(".splide").length){
        new Splide( '.splide', {
            pagination: false,
            // autoplay: true,
            interval: 4000,
            // type   : 'loop',
        } ).mount();
    }

    $(".btnSup").click(function(e){
        e.preventDefault();
        console.log($(this));
        var idArticle = $(this).parents('tr').find("td:eq(0)").text();
        var titleArticle = $(this).parents('tr').find("td:eq(1)").text();
        if (confirm("Voulez-vous supprimer l'article " + idArticle + ' - ' + titleArticle)) {
            document.location.href = "articles/suppressionArticle/" + idArticle;
        }
    });

});
