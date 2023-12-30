<?php
require_once '../models/Plan.php';

if (isset($_POST['operacion'])) {
    $plan = new plan();

    if ($_POST['operacion'] == 'listar') {
        $data = $plan->listarPlan();
        echo json_encode($data);
    }

    if ($_POST['operacion'] == 'eliminar') {
        $idplan = $_POST['idplan'];
        $plan->eliminarPlan($idplan);
    }

    if ($_POST['operacion'] == 'registrar') {
        $datosGuardar = [
            "nombreplan"     => $_POST['nombreplan'],
            "precio"     => $_POST['precio'],
            "duracionspot"     => $_POST['duracionspot'],
            "duracionplan"     => $_POST['duracionplan'],
            "cantanunciosdia"     => $_POST['cantanunciosdia'],
            "descripcion"     => $_POST['descripcion']
        ];
        $plan->registrarPlan($datosGuardar);
    }

    if ($_POST['operacion'] == 'obtener') {
        $registro = $plan->GetPlan($_POST['idplan']);
        echo json_encode($registro);
    }

    if ($_POST['operacion'] == 'actualizar') {
        $datosGuardar = [
            "idplan"     => $_POST['idplan'],
            "nombreplan"        => $_POST['nombreplan'],
            "precio"          => $_POST['precio'],
            "duracionspot"    => $_POST['duracionspot'],
            "duracionplan"    => $_POST['duracionplan'],
            "cantanunciosdia"    => $_POST['cantanunciosdia'],
            "descripcion"    => $_POST['descripcion']
        ];

        $plan->actualizarPlan($datosGuardar);
    }
}   
