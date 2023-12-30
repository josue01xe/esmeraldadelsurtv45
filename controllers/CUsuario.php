<?php
session_start();
require_once '../models/Usuario.php';

if (isset($_POST['operacion'])) {

    $usuario = new Usuario();

    // Identificando la operación...
    if ($_POST['operacion'] == 'login') {
        $registro = $usuario->iniciarSesion($_POST['nomusuario']);
        $_SESSION["login"] = false;

        // Objeto para contener el resultado
        $resultado = [
            "status"  => false,
            "mensaje" => ""
        ];

        // Después de verificar la contraseña
        if ($registro) {
            // El usuario sí existe
            $claveEncriptada = $registro["claveacceso"];

            // Validar la contraseña
            if (password_verify($_POST['claveIngresada'], $claveEncriptada)) {
                $resultado["status"] = true;
                $resultado["mensaje"] = "Bienvenido al sistema";
                // Guardar el nombre de usuario, id y nivel de acceso en la sesión
                $_SESSION['id_usuario'] = $registro['idusuario'];
                $_SESSION['nombre_usuario'] = $registro['nombreusuario'];
                $_SESSION['nivel_acceso'] = $registro['nivelacceso'];
                $_SESSION['clave_acceso'] = $registro['claveacceso'];
                $_SESSION["login"] = true;
            } else {
                $resultado["mensaje"] = "Error en la contraseña";
            }
        } else {
            // El usuario no existe
            $resultado["mensaje"] = "No encontramos al usuario";
        }

        // Enviamos el objeto resultado a la vista
        echo json_encode($resultado);
        return;
    }

    if ($_POST['operacion'] == 'cambiarClave') {
        $idUsuario = $_POST['idusuario'];
        $nombreusuario = $_POST['nombreusuario'];
        $claveacceso = $_POST['claveacceso'];
        $nuevaClave = $_POST['nuevaClave'];
        $claveprevia = $_POST['claveprevia'];
    
        $resultado = [
            "status"  => false,
            "mensaje" => ""
        ];

        if ($claveacceso === '') {
            // Obtener la nueva clave encriptada
            $nuevaClaveEncriptada = ($nuevaClave !== '') ? password_hash($nuevaClave, PASSWORD_DEFAULT, ["cost" => 10]) : null;
        
            // Actualizar solo el nombre de usuario sin verificar la contraseña
            $resultadoActualizacion = $usuario->actualizarClave($idUsuario, $nombreusuario, $nuevaClaveEncriptada);
            $resultado = [
                "status"  => true,
                "mensaje" => "Nombre de usuario actualizado correctamente"
            ];
        
            // Actualizar el nombre de usuario en la sesión
            $_SESSION['nombre_usuario'] = $nombreusuario;
        }
         else{
        if (password_verify($claveacceso, $claveprevia)) {
            $nuevaClaveEncriptada = ($nuevaClave !== '') ? password_hash($nuevaClave, PASSWORD_DEFAULT, ["cost" => 10]) : null;
    
            $resultadoActualizacion = $usuario->actualizarClave($idUsuario, $nombreusuario, $nuevaClaveEncriptada);
    
            $resultado = [
                "status"  => true,
                "mensaje" => "Actualizado correctamente"
            ];
    
                        
            $_SESSION['nombre_usuario'] = $nombreusuario;
            $_SESSION['clave_acceso'] = $nuevaClaveEncriptada;
        } else {
            $resultado = [
                "status"  => false,
                "mensaje" => "Clave Incorrecta"
            ];
        }
    }
    
        echo json_encode($resultado);
        return;
    }


    if ($_POST['operacion'] == 'crearUsuario') {
        $nombreusuario = $_POST['nombreusuario'];
        $claveacceso = $_POST['claveacceso'];
        $nivelacceso = $_POST['nivelacceso'];
        $imagenperfil = $_FILES['imagenperfil'];
    
        $resultado = [
            "status"  => false,
            "mensaje" => ""
        ];
    
        if ($nombreusuario !== '' && $claveacceso !== '' && $nivelacceso !== '') {
            $nuevaClaveEncriptada = password_hash($claveacceso, PASSWORD_DEFAULT, ["cost" => 10]);
    
            $resultadoCreacion = $usuario->crearUsuario($nombreusuario, $nuevaClaveEncriptada, $nivelacceso);
    
            if ($resultadoCreacion["status"]) {
                $resultado["status"] = true;
                $resultado["mensaje"] = "Usuario creado exitosamente";
            } else {
                $resultado["mensaje"] = "El nombre de usuario ya está en uso. Por favor, elija otro.";
            }
        } else {
            $resultado["mensaje"] = "Por favor, complete todos los campos.";
        }
    
        // Enviamos el objeto resultado a la vista
        echo json_encode($resultado);
        return;
    }
}

if (isset($_GET['operacion'])) {
    if ($_GET['operacion'] == 'finalizar') {
        session_destroy();
        session_unset();
        header('Location:../views/login.php');
        return;
    }
}
?>





