export function init($loader) {
    'use strict';

    let loader = $($loader);

    if (!loader.length) {
        return;
    }

    loader.addClass('show-animate');

    setTimeout(function() {
        loader.fadeOut();
    }, 1500);
}
