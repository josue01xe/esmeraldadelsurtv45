<?php

require_once 'Conexion.php';

class Empresa extends Conexion
{
    private $accesoBD;

    public function __construct()
    {
        $this->accesoBD = parent::getConexion();
    }

    public function listarEmpresa()
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL ListarEmpresas()");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminarEmpresa($idempresa = 0)
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL spu_eliminar_empresas(?)");
            $consulta->execute([$idempresa]);
            return true;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrarEmpresa($datos = [])
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL spu_registrar_empresas(?,?,?)");
            $consulta->execute([
                $datos['razonsocial'],
                $datos['ruc'],
                $datos['direccion']
            ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function GetEmpresa($idempresa = 0)
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL GetEmpresa(?)");
            $consulta->execute([$idempresa]);
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarEmpresa($datos = [])
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL spu_actualizar_empresas(?,?,?,?)");
            $consulta->execute([
                $datos["idempresa"],
                $datos["razonsocial"],
                $datos["ruc"],
                $datos["direccion"]
            ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}   