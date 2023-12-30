<?php
// session_start();

// if (isset($_SESSION['login']) && $_SESSION['login']){
//     header('Location:views/index.php');
// }

?>


<!doctype html>
<html lang="es">
<head>
    <title>Iniciar sesión</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Login Form CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-login-form@1.0.10/dist/bootstrap-login-form.min.css" rel="stylesheet" integrity="sha384-+PJn+sZQD1J9XvZQ2+ASd/zRb4D4Y4InJtT+TNEoLZpS/PfS9X1c3qDAGdOswp8z" crossorigin="anonymous">
    <style>
        body {
            background-image: url('../fpdf/EDS PNG 02.png'); /* Reemplaza 'ruta-de-tu-imagen.jpg' con la ruta correcta de tu imagen */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background: rgba(255, 255, 255, 0.8); /* Ajusta la opacidad del fondo blanco de la tarjeta según sea necesario */
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Iniciar sesión</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-floating mb-3">
                                <input type="text" id="usuario" class="form-control form-control-sm" autofocus>
                                <label for="usuario" class="form-label">Nombre de usuario:</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" id="clave" class="form-control form-control-sm">
                                <label for="clave" class="form-label">Contraseña:</label>
                            </div>
                           
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="mostrar-contrasena">
        <label class="form-check-label small" for="mostrar-contrasena">Mostrar contraseña</label>
    </div>
    <button type="button" id="iniciar-sesion" class="btn btn-sm btn-success">Iniciar sesión</button>
</div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href=""></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <body>

        <!-- jQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <!-- Incluye SweetAlert en tu HTML -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
    $(document).ready(function() {
        // Obtener referencias a los elementos DOM
        var passwordInput = document.getElementById('clave');
        var mostrarContrasenaCheckbox = document.getElementById('mostrar-contrasena');

        // Función para cambiar el tipo del input de contraseña
        function toggleMostrarContrasena() {
            passwordInput.type = mostrarContrasenaCheckbox.checked ? 'text' : 'password';
        }

        // Agregar un evento de cambio al cuadro de verificación
        mostrarContrasenaCheckbox.addEventListener('change', function () {
            // Llamar a la función para cambiar el tipo de contraseña
            toggleMostrarContrasena(); 
        });

        function iniciarSesion() {
            const usuario = $("#usuario").val();
            const clave = $("#clave").val();

            if (usuario != "" && clave != "") {
                $.ajax({
                    url: '../controllers/CUsuario.php',
                    type: 'POST',
                    data: {
                        operacion: 'login',
                        nomusuario: usuario,
                        claveIngresada: clave
                    },
                    dataType: 'JSON',
                    success: function(resultado) {
                        console.log(resultado);
                        if (resultado["status"]) {
                            // SweetAlert para inicio de sesión exitoso
                            Swal.fire({
                                icon: 'success',
                                title: 'Bienvenido',
                                text: resultado["mensaje"]
                            }).then((value) => {
                                window.location.href = "perfil.php";
                            });
                        } else {
                            // SweetAlert para usuario no encontrado o error en la contraseña
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: resultado["mensaje"]
                            });
                        }
                    }
                });
            }
        }

        $("#iniciar-sesion").click(iniciarSesion);
    });
</script>
    </body>

    </html>