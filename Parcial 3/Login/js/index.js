$('document').ready(function () {

    $('#botonSalir').click(function () {
        $('#modalSalida').modal();
    });

     $("#botonMenu").click(function (e) {
        e.preventDefault();
        $("#contenedorPrin").toggleClass("toggled");
    });

});

