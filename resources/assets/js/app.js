
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});

$modalSolicitud = $('#modalSolicitud');
var request = null;
var url = window.location.href.split("/");
url = url[0] + "//" + url[2] + "/";

$('.modal').on('shown.bs.modal', function () {
    $(this).find('[autofocus]').focus();
    $('.modal-body').click(function (event) {
        $(this).find('[autofocus]').focus();
    });
});

$('body').on('click', 'button[data-target="#modalSolicitud"]', function(event) {
    event.preventDefault();
    $id = $(this).attr('data-id');
    $nombre_aprendiz = $('button[data-target="#modalSolicitud"]').attr('data-nombre');
    $modalSolicitud.find('a[id="aceptarSolicitud"]').attr('href', url + 'admin/' + $id + '/solicitudaceptado');
    $modalSolicitud.find('.modal-title').text('Nombre: ' + $nombre_aprendiz);
    $modalSolicitud.find('a[id="cancelarSolicitud"]').attr('href', url + 'admin/' + $id + '/solicitudrechazado');
    $modalSolicitud.find('button[data-id]').attr('data-id', $id);
    $.get('/obtener_solicitud/', { id: $id }, function(data, textStatus, xhr) {
        $('#mbody-solicitud').html(data);
    });
});
/**
 * [description]
 * @param  {[type]} event [description]
 * @return {[type]}       [description]
 */
$('body').on('click', '#entregarSuplemento', function(event) {
    $id = $('#formEntrega').find('input[name=apprentice_id]').val();
    $token = $('#formEntrega').find('input[name=_token]').val();
    $.post('/history_record/store/'+ $id, {_token: $token, id: $id}, function(data, textStatus, xhr) {
    });
});
/**
 * @author Cristian Vasquez
 * @description Evento que encarga de  buscar el aprendiz por el número de documento
 * @return Si se encuentra el aprendiz, la función retorna un htm donde esta el formulario con los datos del aprendiz
 *         Si no lo encuentra arroja mensaje de error
 */
$('body').on('keyup', '#numero_documento', function(event) {
    event.preventDefault();
    var $numero_documento = $(this).val();
    if ($numero_documento > 0) {
        if (request != null) request.abort();

        request = $.get('/apprenticeajax', { numero_documento: $numero_documento }, function (data, textStatus, xhr) {
            if(data) {
                $('#apprentice').html(data);
            } else {
                $('#apprentice').text('El aprendiz no existe o su solicitud no ha sido aceptada aun!');
            }

        });
    } else {
        setTimeout(function () {
            // $('#resultado_instructor').children().remove();
        }, 500);
    }
});

/**
 *
 */
var name = $('#name').text();
var $intials = $('#name').text().charAt(0);
console.log(name);
$('#userImage').text($intials);
