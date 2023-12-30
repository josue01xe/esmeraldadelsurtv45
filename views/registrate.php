<?php
require_once '../includes/header.php';
?>
    <main class="app-content">
   
      <div class="row">
        <div class="col-md-12">
          <div class="tile">     
<!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<!--<!DOCTYPE html>
<html lang="es">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<body>-->
    <div class="container mt-5">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-9">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="../fpdf/EDS PNG 02.png" alt="" class="img-fluid" style="height: 100%;">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">¡Crear cuenta!</h1>
                            </div>
                            <form id="crearCuentaForm" class="user">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-border" id="nombreusuario" placeholder="Nombre de usuario">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-border" id="claveacceso" placeholder="Contraseña">
                                    </div>
                                    <div class="col-sm-6">
                                    <select class="form-control form-select-sm" id="nivelacceso">
                                    <option value="" hidden selected>Nivel de acceso:</option>
    <option value="Gerente">Gerente</option>
    <option value="Administrador">Administrador</option>
</select>         
<!--<input type="text" class="form-control form-control-border" maxlength="20" id="nivelacceso" placeholder="Nivel de acceso">-->
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="mostrar-contra">
                                        <label class="form-check-label small" for="mostrar-contra">Mostrar contraseña</label>
                                    </div>
                                </div>
                                <hr>
                                <div id="mensaje-exito" class="alert alert-success" style="display: none;">
                                ¡Cuenta creada correctamente!
                                 </div>
                                <button type="submit" id="btnCrearUsuario" class="btn btn-primary btn-user btn-block">
                                    Registrar cuenta
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>        
            // Obtener referencias a los elementos DOM
    var claveAccesoInput = document.getElementById('claveacceso');
    var mostrarContraCheckbox = document.getElementById('mostrar-contra');

    // Función para cambiar el tipo del input de contraseña
    function toggleMostrarContra() {
        claveAccesoInput.type = mostrarContraCheckbox.checked ? 'text' : 'password';
    }

    // Agregar un evento de cambio al cuadro de verificación
    mostrarContraCheckbox.addEventListener('change', function () {
        // Llamar a la función para cambiar el tipo de contraseña
        toggleMostrarContra();
    });

    $(document).ready(function () {
        $("#btnCrearUsuario").click(function () {
    // Obtener valores del formulario
    var nombreusuario = $("#nombreusuario").val();
    var claveacceso = $("#claveacceso").val();
    var nivelacceso = $("#nivelacceso").val();

    // Validar que los campos no estén vacíos
    if (nombreusuario !== '' && claveacceso !== '' && nivelacceso !== '') {
        
            // Utilizar SweetAlert para mostrar el mensaje de éxito
            Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Cuenta creada correctamente.'
                    });

        // Enviar datos al controlador mediante AJAX
        $.ajax({
            type: "POST",
            url: "../controllers/CUsuario.php",
            data: {
                operacion: 'crearUsuario',
                nombreusuario: nombreusuario,
                claveacceso: claveacceso,
                nivelacceso: nivelacceso
            },
            success: function (response) {
                // Manejar la respuesta del controlador
                var resultado = JSON.parse(response);
                if (resultado.status) {
                    // Ocultar formulario
                    $("#crearCuentaForm").hide();
                    // Reiniciar el formulario
                    $("#crearCuentaForm")[0].reset();

                }
            }
        });
    } else {
        // Mostrar mensaje si algún campo está vacío
        Swal.fire({
                icon: 'warning',
                title: 'Advertencia',
                text: 'Por favor, complete todos los campos.'
            });
    }
  });
});
    </script>
 
              </div>
        </div>
      </div>
    </main>

<?php
require_once '../includes/footer.php';
?>

