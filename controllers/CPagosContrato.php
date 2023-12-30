<?php
require_once '../models/PagosContrato.php';

if (isset($_POST['operacion'])) {
    $pagoscontrato = new PagosContrato();

    if ($_POST['operacion'] == 'registrar') {
        $datosGuardar = [
            "idcontrato"     => $_POST['idcontrato'],
            "tipopago"       => $_POST['tipopago'],
            "monto"          => $_POST['monto'],
            "descripcion"    => $_POST['descripcion'],
            "estado"         => $_POST['estado']
        ];
        $pagoscontrato->registrarPagosContrato($datosGuardar);
    }

    if ($_POST['operacion'] == 'eliminar') {
        $data = $_POST['idpago'];
        $pagoscontrato->eliminarPagoContrato($data);
    }

    if ($_POST['operacion'] == 'listar') {
        $idcontrato = $_POST['idcontrato'];
        $data = $pagoscontrato->listarPagosContrato($idcontrato);
        echo json_encode($data);
    }

    if ($_POST['operacion'] == 'obtener') {
        $registro = $pagoscontrato->GetPagosContrato($_POST['idpago']);
        echo json_encode($registro);
    }

    if ($_POST['operacion'] == 'actualizar') {
        $datosGuardar = [
            "idpago"     => $_POST['idpago'],
            "tipopago"    => $_POST['tipopago'],
            "monto"     => $_POST['monto'],
            "descripcion"        => $_POST['descripcion'],
            "estado"  => $_POST['estado']
        ];

        $pagoscontrato->actualizarPagosContrato($datosGuardar);
    }
}

