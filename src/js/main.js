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

    var btnSup = document.querySelector("#btnSup");

    btnSup.addEventListener("click", function (event) {
        event.preventDefault();
        alert('works');
        var idArticle = document.querySelector("#article").value;
        var TitleArticle = document.querySelector("#articleTitle").value;
        if (confirm("Voulez-vous supprimer l'article " + idArticle + " - " + TitleArticle + " ?")) {
            document.location.href = "genererArticlesAdminSup&sup=" + idArticle;
        }
    });

});
