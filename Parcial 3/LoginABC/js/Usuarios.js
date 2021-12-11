var tipoOperacion=0;

$('document').ready(function () {


    // $("#buscar").autocomplete({
    //     source: "./php/UsuarioBuscarObj.php",
    //     minLength: 1,
    //     focus: function (event, ui) {
    //         event.preventDefault();
    //     },
    //     select: function ( event, ui ) {
    //         event.preventDefault();
    //         //console.log(ui);
    //         $("#nombre").val(ui.item.label);
    //         $("#idUsuario").val(ui.item.value.idUsuario);
    //         $("#apPaterno").val(ui.item.value.apPaterno);
    //         $("#apMaterno").val(ui.item.value.apMaterno);
    //         $("#login").val(ui.item.value.login);
    //         $("#password").val(ui.item.value.password);
    //         $("#buscar").val(ui.item.value.idUsuario);
    //         $('#b_nuevo').prop("disabled", false);     //Enabled
    //         $('#b_grabar').prop("disabled", true);     //Disabled
    //         $('#b_eliminar').prop("disabled", false);  //Enabled
    //     }
    // });


    $("#b_consultar").click(function () {
        $('input').val('');
        var vidu = prompt("ID de Usuario:");


        $.post('./php/UsuarioConsultar.php',
                {idUsuario: vidu},
                function (ret) {
                if (ret['resultado'] != 0) {

                console.log("Error");

                $('#modalMensaje .modal-header').addClass('modal-header-danger');
                $('#modalMensaje .modal-header h2').text(ret['mensaje']);
                $('#modalMensaje .modal-body h3').text(ret['detalle']);
                $('#modalMensaje').modal();

                $("#modalMensaje").on('shown.bs.modal', function () {
                    $('#botonCerrar').focus();
                });
                $("#modalMensaje").on('hidden.bs.modal', function () {
                    $('#modalMensaje .modal-header').removeClass('modal-header-danger');
                });
                }
                else {

                console.log(ret);
                console.log(ret.detalle);
                console.log(ret.detalle.nomCantante);
                console.log(ret.detalle.apellidoCantante);


                $('#idUsuario').val(ret.detalle.idUsuario);
                $('#nomCantante').val(ret.detalle.nomCantante);
                $('#apellidoCantante').val(ret.detalle.apellidoCantante);
                $('#nomDiscografia').val(ret.detalle.nomDiscografia);
                $('#dirDiscografia').val(ret.detalle.dirDiscografia);
                $('#telDiscografia').val(ret.detalle.telDiscografia);
                $('#nomAlbum').val(ret.detalle.nomAlbum);
                $('#numCanciones').val(ret.detalle.numCanciones);
                $('#durAlbum').val(ret.detalle.durAlbum);
                $('#catMusica').val(ret.detalle.catMusica);


                $('#modalMensaje .modal-header').addClass('modal-header-success');
                $('#modalMensaje .modal-header h2').text(ret['mensaje']);
                $('#modalMensaje .modal-body h3').text("Nombre: "+ret.detalle.nomCantante+' '+ret.detalle.apellidoCantante);
                $('#modalMensaje').modal();

                $("#modalMensaje").on('shown.bs.modal', function () {
                    $('#botonCerrar').focus();
                });
                $("#modalMensaje").on('hidden.bs.modal', function () {
                    $('#myModal .modal-header').removeClass('modal-header-success');
                });

                $('#b_nuevo').prop("disabled", false);    //Enabled
                $('#b_grabar').prop("disabled", true);    //Disabled
                $('#b_eliminar').prop("disabled", false); //Enabled
                $('#b_modificar').prop("disabled", false); //Enabled
            }
        },'json');

    });


    $("#b_limpiar").click(function () {
        $('input').val('');
        $('.form-control').prop("disabled", true);
        $('#b_nuevo').prop("disabled", false);
        $('#b_grabar').prop("disabled", true);
        $('#b_eliminar').prop("disabled", true);
        $('#b_consultar').prop("disabled", false);
        $('#b_modificar').prop("disabled", true);
    });



    $("#b_nuevo").click(function () {
        tipoOperacion = 1;
        $('input').val('');
        $('#b_nuevo').prop("disabled", true);
        $('#b_grabar').prop("disabled", false);
        $('#b_eliminar').prop("disabled", true);
        $('#b_consultar').prop("disabled", true);

        $('.form-control').prop("disabled", false);
        $('#idUsuario').prop("disabled", true);
        $("#nombre").focus();
    });

    $("#b_modificar").click(function () {
        tipoOperacion = 2;
        // $('input').val('');
        $('#b_nuevo').prop("disabled", true);
        $('#b_grabar').prop("disabled", false);
        $('#b_eliminar').prop("disabled", true);
        $('#b_modificar').prop("disabled", true);
        $('#b_consultar').prop("disabled", true);

        $('.form-control').prop("disabled", false);
        $('#idUsuario').prop("disabled", true);
        $("#nombre").focus();
    });


    $("#b_grabar").click(function () {
        var vidu = $('#idUsuario').val();
        var vnom = $('#nomCantante').val();
        var vapp = $('#apellidoCantante').val();
        var vapm = $('#nomDiscografia').val();
        var vlog = $('#dirDiscografia').val();
        var vpas = $('#telDiscografia').val();
        var vpas = $('#nomAlbum').val();
        var vpas = $('#numCanciones').val();
        var vpas = $('#durAlbum').val();
        var vpas = $('#catMusica').val();

        if (vnom=="" || vapp=="" || vlog=="" || vpas=="") {
            console.log("Falto capturar informacion");
            $('#modalMensaje .modal-header').addClass('modal-header-danger');
            $('#modalMensaje .modal-header h2').text("Formulario Incompleto");
            $('#modalMensaje .modal-body h3').text("Debe capturar todos los campos");
            $('#modalMensaje').modal();
            $("#modalMensaje").on('shown.bs.modal', function () {
                $('#botonCerrar').focus();
            });
            $("#modalMensaje").on('hidden.bs.modal', function () {
                $('#modalMensaje .modal-header').removeClass('modal-header-danger');
                $("#nombre").focus();
            });


        } else {
        $.post('./php/UsuarioGrabar.php',
                {idu: vidu, nom: vnom, app: vapp, ddd: vddd, tdd: vtdd, nda: vnda, ndc: vndc, dda: vdda, cdm: vcdm , tip:tipoOperacion},
                function (ret) {

                if (ret.resultado!= 0) {

                console.log('Error Insercion');

                $('#modalMensaje .modal-header').addClass('modal-header-danger');
                $('#modalMensaje .modal-header h2').text(ret['mensaje']);
                $('#modalMensaje .modal-body h3').text(ret['detalle']);
                $('#modalMensaje').modal();

                $("#modalMensaje").on('shown.bs.modal', function () {
                    $('#botonCerrar').focus();
                });
                $("#modalMensaje").on('hidden.bs.modal', function () {
                    $('#modalMensaje .modal-header').removeClass('modal-header-danger');
                });
                }
                else {
                $('#idUsuario').val(ret.detalle);

                $('#modalMensaje .modal-header').addClass('modal-header-success');
                $('#modalMensaje .modal-header h2').text(ret['mensaje']);
                $('#modalMensaje .modal-body h3').text("Usuario : "+ret['detalle']);
                $('#modalMensaje').modal();

                $("#modalMensaje").on('shown.bs.modal', function () {
                    $('#botonCerrar').focus();
                });
                $("#modalMensaje").on('hidden.bs.modal', function () {
                    $('#myModal .modal-header').removeClass('modal-header-success');
                });

                $('#b_nuevo').prop("disabled", false);     //Enabled
                $('#b_grabar').prop("disabled", true);     //Disabled
                $('#b_eliminar').prop("disabled", false);  //Enabled
                $('#b_modificar').prop("disabled", false); //Enabled
                $('#b_consultar').prop("disabled", false); //Enabled
            }
        },'json');

        $('.form-control').prop("disabled", true);
        $('#b_nuevo').prop("disabled",true);
        $('#b_grabar').prop("disabled",false);
        $('#b_eliminar').prop("disabled",true);
        $('#b_modificar').prop("disabled",true);
        $("#nombre").focus();
        }
    });



    $('#b_eliminar').click( function() {
        var vidu = $('#idUsuario').val();

        if (confirm('Borrar')) {
            $.post('./php/UsuarioBorrar.php',
            {idUsuario: vidu},
            function (ret) {
                alert("Borrado");
            },'json');

            $('input').val('');
            $('.form-control').prop("disabled", true);
            $('#b_nuevo').prop("disabled", false);
            $('#b_grabar').prop("disabled", true);
            $('#b_eliminar').prop("disabled", true);
        } else {
            alert("No se borra");
        }
    });

});