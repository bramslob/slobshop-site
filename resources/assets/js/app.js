window.$ = window.jQuery = require('jquery');

$(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

import app from './modules/general';

window.app = app;