<?php
    require('../db/conexion.php');
    
    $response = array();

    $accion = $_POST['accion'];
    
    if($accion == 'select') {
        $fecha = $_POST['fecha'];
        $resultado = $mysqli->query('SELECT * FROM obra ORDER BY fecha_obra');
    
        echo '<div class="row align-items-center">';
    
        foreach ($resultado as $res) {
            $segundos = strtotime($res['fecha_obra']) - strtotime($fecha);
    
            echo '
                <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                        <img src="images/drama.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">'.$res['nombre'].'</h5>
                            <p class="card-text"><strong>Fecha: </strong>'.$res['fecha_obra'].'</p>
                            <p class="card-text"><strong>Aforo: </strong>'.$res['aforo'].'</p>';
    
            if($res['disponibles'] > 0) {
                echo '<p class="card-text"><strong>Disponibles: </strong>'.$res['disponibles'].'</p>';
            } else {
                echo '<p class="card-text"><strong>Disponibles: </strong>'.$res['disponibles'].' <span class="badge bg-danger">Agotado!</span></p>';
            }
                    echo    '<p class="card-text"><strong>Sala: </strong>'.$res['sala'].'</p>';
            if($segundos > 0 && $res['disponibles'] > 0) {
                echo '<button class="btn btn-primary comprar-articulo" data-id="'.$res['cod_obra'].'" data-nombre="'.$res['nombre'].'" data-sala="'.$res['sala'].'" data-fecha="'.$res['fecha_obra'].'" data-bs-toggle="modal" data-bs-target="#modalComprar">Comprar</button> <span class="badge bg-success">Disponible!</span></p>';
            } else {
                echo '<button class="btn btn-primary comprar-articulo" disabled>Comprar</button> <span class="badge bg-danger">No Disponible!</span></p>';
            }
    
            echo        '</div>
                    </div>
                </div>';
        }

        echo '</div>';
    } elseif($accion == 'editar') {
        $codObra = $_POST['codObra'];

        $query = "UPDATE obra SET disponibles=disponibles - 1 WHERE cod_obra='$codObra'";
    
        if($mysqli->query($query))
        {
            $response["respuesta"] = "Done";
        }
        else {
            $response["mensaje"] = "No se pudo Editar: ".$mysqli->error;
        }
    }

    $mysqli->close();

    if(!empty($response)) {
        echo json_encode($response);
    }
?>