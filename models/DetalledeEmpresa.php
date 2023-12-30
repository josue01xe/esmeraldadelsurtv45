<?php

require_once 'Conexion.php';

class DetalledeEmpresa extends Conexion
{
    private $accesoBD;

    public function __construct()
    {
        $this->accesoBD = parent::getConexion();
    }

 

    public function listarDetalledeEmpresa()
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL ListarDetalledeEmpresa()");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminarDetalledeEmpresa($iddetalle = 0)
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL EliminarDetalledeEmpresa(?)");
            $consulta->execute([$iddetalle]);
            return true;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrarDetalledeEmpresa($datos = [])
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL registrardetalledeempresa(?,?)");
            $consulta->execute([
                $datos['idpersona'],
                $datos['idempresa']
            ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}