<?php
require_once '../models/Contrato.php';

if (isset($_POST['operacion'])) {
    $contrato = new Contrato();

    if ($_POST['operacion'] == 'registrar') {
        $datosGuardar = [
            "idusuario"     => $_POST['idusuario'],
            "iddetalle"     => $_POST['iddetalle'],
            "idservicio"    => $_POST['idservicio'],
            "idplan"     => $_POST['idplan'],
            "fechainicio"    => $_POST['fechainicio'],
            "fechafin"    => $_POST['fechafin'],
            "observaciones" => $_POST['observaciones'],
            "restriccionpublicidad" => $_POST['restriccionpublicidad']
        ];
        $contrato->registrarContrato($datosGuardar);
    }

    if ($_POST['operacion'] == 'listar') {
        $data = $contrato->listarContratos();
        echo json_encode($data);
    }
    

    if ($_POST['operacion'] == 'eliminar') {
        $data = $_POST['idcontrato'];
        $contrato->eliminarContrato($data);
    }

    if ($_POST['operacion'] == 'obtener') {
        $registro = $contrato->GetContratos($_POST['idcontrato']);
        echo json_encode($registro);
    }

    if ($_POST['operacion'] == 'actualizar') {
        $datosGuardar = [
            "idcontrato"     => $_POST['idcontrato'],
            "idusuario"        => $_POST['idusuario'],
            "idservicio"     => $_POST['idservicio'],
            "idplan"     => $_POST['idplan'],
            "fechainicio"        => $_POST['fechainicio'],
            "fechafin"  => $_POST['fechafin'],
            "observaciones"  => $_POST['observaciones'],
            "restriccionpublicidad"  => $_POST['restriccionpublicidad']
        ];

        $contrato->actualizarContrato($datosGuardar);
    }

    if ($_POST['operacion'] == 'obtenerPersonas') {
        $data = $contrato->obtenerPersonas(); 
        echo json_encode($data);
    }

    if ($_POST['operacion'] == 'obtenerPlanes') {
        $data = $contrato->obtenerPlanes(); 
        echo json_encode($data);
    }


    if ($_POST['operacion'] == 'obtenerEmpresasPorPersona') {
        $data = $contrato->obtenerEmpresasPorPersona($_POST['idpersona']); 
        echo json_encode($data);
    }    

    if ($_POST['operacion'] == 'obtenerEmpresas') {
        $data = $contrato->obtenerEmpresas(); 
        echo json_encode($data);
    }
}
?>
