<?php

require_once 'Conexion.php';

class PagosContrato extends Conexion
{
    private $accesoBD;

    public function __construct()
    {
        $this->accesoBD = parent::getConexion();
    }


    public function registrarPagosContrato($datos = [])
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL RegistrarPagoContrato(?,?,?,?,?)");
            $consulta->execute([
                $datos['idcontrato'],
                $datos['tipopago'],
                $datos['monto'],
                $datos['descripcion'],
                $datos['estado']
            ]);            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function eliminarPagoContrato($idpago = 0)
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL EliminarPagoContrato(?)");
            $consulta->execute([$idpago]);
            return true;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function listarPagosContrato($idcontrato = 0)
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL ListarPagosContrato(?)");
            $consulta->execute([$idcontrato]);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function GetPagosContrato($idpago = 0)
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL GetPagosContrato(?)");
            $consulta->execute([$idpago]);
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarpagosContrato($datos = [])
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL ActualizarPagosContrato(?,?,?,?,?)");
            $consulta->execute([
                $datos["idpago"],
                $datos["tipopago"],
                $datos["monto"],
                $datos["descripcion"],
                $datos["estado"]

            ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}   