const Masonry = require('masonry-layout');

export function init($loader) {
    'use strict';

    let loader = $($loader);

    if (!loader.length) {
        return;
    }

    loader.addClass('show-animate');

    setTimeout(function() {
        loader.fadeOut();

        if ($(window).width() > 1000) {
            if ($('.js-mosaic-holder').length) {
                new Masonry( '.js-mosaic-holder', {
                    itemSelector: '.grid-item',
                    columnWidth: '.grid-sizer',
                    percentPosition: true,
                });
            }
        }
    }, 3500);
}
