$(document).ready(function() {
    'use strict';

    new Splide( '.splide', {
        pagination: false,
        autoplay: true,
        interval: 4000,
        type   : 'loop',
    } ).mount();

});