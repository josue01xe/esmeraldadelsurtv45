<?php
require_once 'Conexion.php';

class Contrato extends Conexion
{
    private $accesoBD;

    public function __construct()
    {
        $this->accesoBD = parent::getConexion();
    }

    public function registrarContrato($datos = [])
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL RegistrarContrato(?,?,?,?,?,?,?,?)");
            $consulta->execute([
                $datos['idusuario'],
                $datos['iddetalle'],
                $datos['idservicio'],
                $datos['idplan'],
                $datos['fechainicio'],
                $datos['fechafin'],
                $datos['observaciones'],
                $datos['restriccionpublicidad']
            ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarContratos()
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL ListarContratos()");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarContratosR($idcontrato = 0)
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL ListarContratosR(?)");
            $consulta->execute([$idcontrato]);  // Aquí es donde debes pasar el valor del parámetro
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    

    public function eliminarContrato($idcontrato = 0)
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL EliminarContrato(?)");
            $consulta->execute([$idcontrato]);
            return true;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function GetContratos($idcontrato = 0)
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL GetContrato(?)");
            $consulta->execute([$idcontrato]);
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarContrato($datos = [])
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL ActualizarContrato(?,?,?,?,?,?,?,?)");
            $consulta->execute([
                $datos["idcontrato"],
                $datos["idusuario"],
                $datos["idservicio"],
                $datos["idplan"],
                $datos["fechainicio"],
                $datos["fechafin"],
                $datos["observaciones"],
                $datos['restriccionpublicidad']
            ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

   public function obtenerPersonas()
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL ObtenerPersonas()");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerPlanes()
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL ObtenerPlanes()");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerEmpresasPorPersona($idpersona)
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL ObtenerEmpresasPorPersona(?)");
            $consulta->execute([$idpersona]);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function obtenerEmpresas()
    {
        try {
            $consulta = $this->accesoBD->prepare("CALL ObtenerEmpresas()");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }    
}
?>
