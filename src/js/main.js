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


    $(".btnSupUser").click(function(e){
        e.preventDefault();
        console.log($(this));
        var idUser = $(this).parents('tr').find("td:eq(0)").text();
        var userlastname = $(this).parents('tr').find("td:eq(1)").text();
        var userfirstname = $(this).parents('tr').find("td:eq(2)").text();
        if (confirm("Voulez-vous supprimer l'utilisateur #" + idUser + ' - ' + userlastname + '' + userfirstname)) {
            document.location.href = "users/suppressionUser/" + idUser;
        }
    });

    $(".btnSupComment").click(function(e){
        e.preventDefault();
        console.log($(this));
        var idComment = $('.comment_id').text();
        if (confirm("Voulez-vous supprimer le commentaire #" + idComment + "?")) {
            document.location.href = "commentaires/suppressionCommentaire/" + idComment;
        }
    });

});
