// import external dependencies
import 'jquery';
import 'jquery.cookie';

// Import everything from autoload
import "./autoload/**/*"

const Masonry = require('masonry-layout');

import * as loader from './bundle/functions/loader';

loader.init('.js-loader-page');

$(function() {
    if ($(window).width() > 1000) {
        if ($('.js-mosaic-holder').length) {
            new Masonry( '.js-mosaic-holder', {
                itemSelector: '.grid-item',
                columnWidth: '.grid-sizer',
                percentPosition: true,
            });
        }
    }
});
