window.template = require('../../views/eventitems/item_template.hbs');

$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.button-collapse').sideNav({
            edge: 'left', // Choose the horizontal origin
            draggable: true // Choose whether you can drag to open on touch screens
        }
    );
})
