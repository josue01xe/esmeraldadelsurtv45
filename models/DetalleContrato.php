<?php

require_once 'Conexion.php';

class DetalleContrato extends Conexion
{
    private $accesoBD;

    public function __construct()
    {
        $this->accesoBD = parent::getConexion();
    }


    public function registrarDetalleContrato($datos = [])
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL RegistrarDetalleContrato(?,?,?,?,?)");
            $consulta->execute([
                $datos['idcontrato'],
                $datos['dia'],
                //$datos['idplan'],
                $datos['horainicio'],
                $datos['fecha'],
                $datos['observaciones']
            ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function listarDetalleContratos($idcontrato = 0)
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL ListarDetalleContratos(?)");
            $consulta->execute([$idcontrato]);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminarDetalleContrato($iddetallecontrato = 0)
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL EliminarDetalleContrato(?)");
            $consulta->execute([$iddetallecontrato]);
            return true;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function GetDetalleContratos($iddetallecontrato = 0)
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL GetDetalleContrato(?)");
            $consulta->execute([$iddetallecontrato]);
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarDetalleContrato($datos = [])
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL ActualizarDetalleContrato(?,?,?,?,?,?,?)");
            $consulta->execute([
                $datos["iddetallecontrato"],
                $datos["idcontrato"],
                $datos["dia"],
                $datos["idplan"],
                $datos["horainicio"],
                $datos["fecha"],
                $datos["observaciones"]

            ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
