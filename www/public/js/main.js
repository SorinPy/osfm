$(function(){
    'use strict';

    $('input.is-invalid').keydown( (event)=> {
        console.log("asd");
        $(event.target).removeClass('is-invalid');
        $(event.target).parent().find('div.invalid-feedback').hide();
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
});