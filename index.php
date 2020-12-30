<?php
require('db/conexion.php');
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>eTicket</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand">eTicket</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <a class="navbar-brand pull-right">Teatro Manuel Bonilla</a>
                </div>
            </div>
        </nav>
        
        <div id="data">
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalComprar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Comprar Boleto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="codObra">
                        <input type="hidden" class="form-control" id="nombreObra">
                        <input type="hidden" class="form-control" id="fechaObra">
                        <input type="hidden" class="form-control" id="sala">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="btnComprar">Comprar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            cargarData();
        });

        $(function() {
            $(document).on("click", ".comprar-articulo", function () {
                var idObra = $(this).data('id');
                var nombre = $(this).data('nombre');
                var fechaObra = $(this).data('fecha');
                var sala = $(this).data('sala');

                $(".modal-body #codObra").val(idObra);
                $(".modal-body #nombreObra").val(nombre);
                $(".modal-body #fechaObra").val(fechaObra);
                $(".modal-body #sala").val(sala);
            });

            $("#btnComprar").on("click", function(){
                var codObra = $("#codObra").val();
                var nombreObra = $("#nombreObra").val();
                var fechaObra = $("#fechaObra").val();
                var nombre = $("#nombre").val();
                var sala = $("#sala").val();
                var fecha = obtenerFechaHora();

                if(nombre == "") {
                    alert("Por favor escriba su nombre.");
                } else {
                    $.ajax({
                        type: "POST",
                        data: "accion=guardar&codObra="+codObra+"&nombre="+nombre+"&fecha="+fecha,
                        url: "controllers/CompraController.php",
                        success: function(response){
                            var respuestaJSON = $.parseJSON(response);

                            if(respuestaJSON.respuesta == "Done") {
                                $.ajax({
                                    type: "POST",
                                    data: "accion=editar&codObra="+codObra,
                                    url: "controllers/ObraController.php",
                                    success: function(response){
                                        var respuestaJSON = $.parseJSON(response);
                                        console.log(respuestaJSON);

                                        if(respuestaJSON.respuesta == "Done") {
                                            alert("Obra: "+nombreObra+"\nNombre: "+nombre+"\nFecha y Hora: "+fechaObra+"\nSala: "+sala);
                                            
                                            $("#codObra").val('');
                                            $("#nombre").val('');
                                            $('#modalComprar').modal('hide');
                                            
                                            cargarData();
                                        }
                                        else {
                                            console.log("ERROR: " + respuestaJSON.mensaje);  
                                            alert("ERROR: " + respuestaJSON.mensaje);
                                        }                 
                                    }
                                })
                            }
                            else {
                                console.log("ERROR: " + respuestaJSON.mensaje);  
                                alert("ERROR: " + respuestaJSON.mensaje);
                            }                 
                        }
                    })
                }
            });
        });

        function obtenerFechaHora() {
            var hoy = new Date();
            var fecha = hoy.getFullYear() + '-' + (hoy.getMonth() + 1) + '-' + hoy.getDate();
            var hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();
            var fechaHora = fecha + ' ' + hora;

            return fechaHora;
        }

        function cargarData() {
            $.ajax({
                type: "POST",
                data: 'accion=select&fecha='+obtenerFechaHora(),
                url: "controllers/ObraController.php",
                success: function(r)
                {
                    console.log(r);
                    $('#data').html(r);
                }
            });
        }
    </script>
</body>

</html>