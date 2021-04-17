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

    // let hamburger = document.getElementById('hamburgerbtn');
    //
    // let mobileMenu = document.getElementById('mobileMenu');
    //
    // hamburger.addEventListener('click', function(){
    //     mobileMenu.classList.toggle('active');
    // });
});