<?php
require_once '../models/Empresa.php';

if (isset($_POST['operacion'])) {
    $empresa = new empresa();

    if ($_POST['operacion'] == 'listar') {
        $data = $empresa->listarEmpresa();
        echo json_encode($data);
    }

    if ($_POST['operacion'] == 'eliminar') {
        $idempresa = $_POST['idempresa'];
        $empresa->eliminarEmpresa($idempresa);
    }

    if ($_POST['operacion'] == 'registrar') {
        $datosGuardar = [
            "razonsocial"     => $_POST['razonsocial'],
            "ruc"     => $_POST['ruc'],
            "direccion"     => $_POST['direccion']
        ];
        $empresa->registrarEmpresa($datosGuardar);
    }

    if ($_POST['operacion'] == 'obtener') {
        $registro = $empresa->GetEmpresa($_POST['idempresa']);
        echo json_encode($registro);
    }

    if ($_POST['operacion'] == 'actualizar') {
        $datosGuardar = [
            "idempresa"     => $_POST['idempresa'],
            "razonsocial"        => $_POST['razonsocial'],
            "ruc"          => $_POST['ruc'],
            "direccion"    => $_POST['direccion']
        ];

        $empresa->actualizarEmpresa($datosGuardar);
    }
}
