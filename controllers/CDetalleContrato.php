<?php
require_once '../models/DetalleContrato.php';

if (isset($_POST['operacion'])) {
    $detallecontrato = new DetalleContrato();

    if ($_POST['operacion'] == 'registrar') {
        $datosGuardar = [
            "idcontrato"     => $_POST['idcontrato'],
            "dia"    => $_POST['dia'],
            //"idplan"    => $_POST['idplan'],
            "horainicio"    => $_POST['horainicio'],
            "fecha" => $_POST['fecha'],
            "observaciones" => $_POST['observaciones']
        ];
        $detallecontrato->registrarDetalleContrato($datosGuardar);
    }

    if ($_POST['operacion'] == 'listar') {
        $idcontrato = $_POST['idcontrato'];
        $data = $detallecontrato->listarDetalleContratos($idcontrato);
        echo json_encode($data);
    }

    if ($_POST['operacion'] == 'eliminar') {
        $data = $_POST['iddetallecontrato'];
        $detallecontrato->eliminarDetalleContrato($data);
    }

    if ($_POST['operacion'] == 'obtener') {
        $registro = $detallecontrato->GetDetalleContratos($_POST['iddetallecontrato']);
        echo json_encode($registro);
    }

    if ($_POST['operacion'] == 'actualizar') {
        $datosGuardar = [
            "iddetallecontrato"     => $_POST['iddetallecontrato'],
            "idcontrato"    => $_POST['idcontrato'],
            "dia"     => $_POST['dia'],
            "idplan"        => $_POST['idplan'],
            "horainicio"  => $_POST['horainicio'],
            "fecha"  => $_POST['fecha'],
            "observaciones"  => $_POST['observaciones']
        ];

        $detallecontrato->actualizarDetalleContrato($datosGuardar);
    }
}
?>
