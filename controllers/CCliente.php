<?php
require_once '../models/Cliente.php';

if (isset($_POST['operacion'])) {
    $cliente = new cliente();

    if ($_POST['operacion'] == 'listar') {
        $data = $cliente->listarPersona();
        echo json_encode($data);
    }

    if ($_POST['operacion'] == 'registrar') {
        $datosGuardar = [
            "apellidos"     => $_POST['apellidos'],
            "nombres"     => $_POST['nombres'],
            "tipodocumento"     => $_POST['tipodocumento'],
            "nrodocumento"     => $_POST['nrodocumento'],
            "direccion"    => $_POST['direccion'],
            "telefono" => $_POST['telefono']
        ];
        $cliente->registrarCliente($datosGuardar);
    }

    if ($_POST['operacion'] == 'eliminar') {
        $idpersona = $_POST['idpersona'];
        $cliente->eliminarCliente($idpersona);
    }

    if ($_POST['operacion'] == 'obtener') {
        $registro = $cliente->GetCliente($_POST['idpersona']);
        echo json_encode($registro);
    }

    if ($_POST['operacion'] == 'actualizar') {
        $datosGuardar = [
            "idpersona"     => $_POST['idpersona'],
            "apellidos"        => $_POST['apellidos'],
            "nombres"          => $_POST['nombres'],
            "tipodocumento"    => $_POST['tipodocumento'],
            "nrodocumento"     => $_POST['nrodocumento'],
            "direccion"        => $_POST['direccion'],
            "telefono"  => $_POST['telefono']
        ];

        $cliente->actualizarPersona($datosGuardar);
    }
}
?>
