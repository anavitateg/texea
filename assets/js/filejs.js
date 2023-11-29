$(document).ready(function () {
    $('#fileInput').change(function () {
        var fileName = $(this).val().split('\\').pop();
        $('#prueba').text('Nombre del archivo: ' + fileName);
    });
});