<?php

require_once 'Conexion.php';

class Plan extends Conexion
{
    private $accesoBD;

    public function __construct()
    {
        $this->accesoBD = parent::getConexion();
    }

    public function listarPlan()
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL ListarPlanes()");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminarPlan($idplan = 0)
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL EliminarPlan(?)");
            $consulta->execute([$idplan]);
            return true;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrarPlan($datos = [])
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL spu_registrar_planes(?,?,?,?,?,?)");
            $consulta->execute([
                $datos['nombreplan'],
                $datos['precio'],
                $datos['duracionspot'],
                $datos['duracionplan'],
                $datos['cantanunciosdia'],
                $datos['descripcion']

            ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function GetPlan($idplan = 0)
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL GetPlan(?)");
            $consulta->execute([$idplan]);
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarPlan($datos = [])
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL spu_actualizar_planes(?,?,?,?,?,?,?)");
            $consulta->execute([
                $datos["idplan"],
                $datos["nombreplan"],
                $datos["precio"],
                $datos["duracionspot"],
                $datos["duracionplan"],
                $datos["cantanunciosdia"],
                $datos["descripcion"]
            ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}    