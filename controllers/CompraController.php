<?php
    require('../db/conexion.php');
    
    $response = array();

    $accion = $_POST['accion'];

    $codObra = $_POST['codObra'];
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];

    if($accion == "guardar") {
        $query = "INSERT ventas(cod_obra, comprador, fecha_compra) VALUES('$codObra', '$nombre', '$fecha')";
    
        if($mysqli->query($query))
        {
            $response["respuesta"] = "Done";
        }
        else {
            $response["mensaje"] = "No se pudo Guardar: ".$mysqli->error;
        }
    }


    $mysqli->close();
	echo json_encode($response);
?>