<?php

require_once 'Conexion.php';

class Cliente extends Conexion
{
    private $accesoBD;

    public function __construct()
    {
        $this->accesoBD = parent::getConexion();
    }

    public function listarPersona()
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL ListarPersonas()");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function registrarCliente($datos = [])
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL spu_registrar_personas(?,?,?,?,?,?)");
            $consulta->execute([
                $datos['apellidos'],
                $datos['nombres'],
                $datos['tipodocumento'],
                $datos['nrodocumento'],
                $datos['direccion'],
                $datos['telefono']
            ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function eliminarCliente($idpersona = 0)
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL spu_eliminar_personas(?)");
            $consulta->execute([$idpersona]);
            return true;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function GetCliente($idpersona = 0)
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL GetPersona(?)");
            $consulta->execute([$idpersona]);
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarPersona($datos = [])
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL spu_actualizar_personas(?,?,?,?,?,?,?)");
            $consulta->execute([
                $datos["idpersona"],
                $datos["apellidos"],
                $datos["nombres"],
                $datos["tipodocumento"],
                $datos["nrodocumento"],
                $datos["direccion"],
                $datos["telefono"]
            ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
