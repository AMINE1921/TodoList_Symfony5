/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
const $ = require('jquery');

$(function () {
    var $list, $li, $newItemForm, $div;
    $list = $('ul.items');
    $newItemForm = $('#newItemForm');
    $li = $('ul#items li');

    function cacher() {
        $('.close').click(function () {
            $(this).parent().remove();
        })
    };

    $(".msg").click(function () {
        location.reload(true);
    });

    cacher();

    $newItemForm.on('submit', function (e) {
        e.preventDefault();
        var text = $('input:text').val();
        var spann = $('<span class="close">\u00D7</span>');
        if (text !== '') {
            $list.append('<li>' + text + ' <span class="close">\u00D7</span> </li>');
            $('input:text').val('');
            alert("Faites attention, vous n'êtes pas connecté ! ceci n'est qu'un test qui sera effacé lorsque la page sera fermée");
            cacher();
        }
    });

    $list.on('click', 'li', function () {
        $(this).toggleClass("checked");
    });

})
