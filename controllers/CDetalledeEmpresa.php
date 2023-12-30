<?php
require_once '../models/DetalledeEmpresa.php';

if (isset($_POST['operacion'])) {
    $detalledeempresa = new DetalledeEmpresa();



    if ($_POST['operacion'] == 'listar') {
        $data = $detalledeempresa->listarDetalledeEmpresa();
        echo json_encode($data);
    }

    if ($_POST['operacion'] == 'eliminar') {
        $iddetalle = $_POST['iddetalle'];
        $detalledeempresa->eliminarDetalledeEmpresa($iddetalle);
    }

    if ($_POST['operacion'] == 'registrar') {
        $datosGuardar = [
            "idpersona"     => $_POST['idpersona'],
            "idempresa"     => $_POST['idempresa']
        ];
        $detalledeempresa->registrarDetalledeEmpresa($datosGuardar);
    }
}