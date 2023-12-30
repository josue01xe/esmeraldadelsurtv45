<?php

require_once 'Conexion.php';

class Usuario extends Conexion {

    private $accesoBD;

    public function __construct(){
        $this->accesoBD = parent::getConexion();
    }

    public function iniciarSesion($nomUsuario = ""){
        try {
            $consulta = $this->accesoBD->prepare("CALL spu_usuarios_login(?)");
            $consulta->execute(array($nomUsuario));
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarClave($idUsuario, $nombreusuario, $nuevaClave){
        try {
            $consulta = $this->accesoBD->prepare("CALL spu_usuarios_actualizar_clave(?,?,?)");
            $consulta->execute(array($idUsuario, $nombreusuario, $nuevaClave));
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function crearUsuario($nombreusuario, $claveacceso, $nivelacceso){
        try {
            $consulta = $this->accesoBD->prepare("CALL CrearUsuario(?,?,?)");
            $consulta->execute(array($nombreusuario, $claveacceso, $nivelacceso));
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }
}
?>



