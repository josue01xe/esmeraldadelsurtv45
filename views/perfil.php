<?php
require_once '../includes/header.php';
?>
 <main class="app-content">

        <!-- Agrega la clase mt-5 para un margen superior -->
    

          <!-- Editar Perfil -->
          <div class="tab-pane fade active show" id="nav-perfil" role="tabpanel" aria-labelledby="nav-perfil-tab">
            <div class="container mt-5 d-flex">
              <div class="card p-4 text-center">
                <form id="formulario" action="" method="POST" enctype="multipart/form-data">
                  <div class="d-flex flex-row justify-content-center mb-3">
                    <hr>
                    <div id="preview"></div>
                  </div>
                  <h4>Editar Perfil</h4><br>
                  <input type="hidden" id="clavePrevia" value="<?php echo $_SESSION['clave_acceso']; ?>" />
                  <div class="row">
                    <input id="idusuario" type="hidden" name="idusuario" value="<?php echo $_SESSION['id_usuario']; ?>">
                    <div class="col-md-6">
                      <div class="inputs">
                        <label for="nombreusuario">Nombre de Usuario</label>
                        <input class="form-control form-control-border" type="text" placeholder="Nombre de Usuario" id="nombreusuario" name="nombreusuario" value="<?php echo $_SESSION['nombre_usuario']; ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="inputs">
                        <label for="nivelacceso">Nivel de Acceso</label>
                        <input class="form-control form-control-border" type="text" placeholder="Nivel de Acceso" id="nivelacceso" name="nivelacceso" value="<?php echo $_SESSION['nivel_acceso']; ?>" disabled>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="inputs">
                        <label for="claveacceso">Contraseña Actual</label>
                        <input class="form-control form-control-border" type="password" id="claveacceso" name="claveacceso" placeholder="Contraseña Actual">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="inputs">
                        <label for="nuevaClave">Nueva Contraseña</label>
                        <input class="form-control form-control-border" type="password" id="nuevaClave" name="nuevaClave" placeholder="Nueva Contraseña">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="inputs">
                        <label for="confirmarClave">Confirmar Contraseña</label>
                        <input class="form-control form-control-border" type="password" id="confirmarClave" name="confirmarClave" placeholder="Confirmar Contraseña">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="inputs">
                        <label for="imagenPerfil">Imagen de Perfil</label>
                        <input class="form-control form-control-border" type="file" id="imagenPerfil" name="imagenPerfil" accept="image/*">
                        <div class="mt-2"><img id="imagenPerfilMostrar" src="" alt=""></div>
                      </div>
                    </div>
                  </div>
                  <div class="mt-4 gap-2 d-flex justify-content-end">
                    <button class="px-3 btn btn-sm btn-primary" type="submit" id="btnGuardarCambioProveedor">Guardar Cambios</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Agrega el enlace al archivo CSS de DataTables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

        <!-- Script para realizar llamadas AJAX y gestionar la tabla -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Agrega el archivo JS de DataTables -->
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

        <script>
    $(document).ready(function () {
        if (localStorage.imagenperfil) {
            console.log(localStorage.imagenperfil);
            $('#imagenPerfilMostrar').attr('src', localStorage.imagenperfil);
        } else {
            console.log("localstorage vacío");
        }

        $("#btnGuardarCambioProveedor").click(function (event) {
            console.log("Botón clickeado");
            event.preventDefault();
            GuardarCambios();
        });

        // Manejar el cambio de la imagen solo si es necesario
        $("#imagenPerfil").change(function () {
            var data = new FormData();
            $.each($('#imagenPerfil')[0].files, function (i, file) {
                data.append('imagenPerfil', file);
            });

            $.ajax({
                url: 'uploadimage.php',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success: function (data) {
                    console.log(data);
                    localStorage.setItem("imagenperfil", data);
                    $('#imagenPerfilMostrar').attr('src', data);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                }
            });
        });

        function GuardarCambios() {
            var idUsuario = $("#idusuario").val();
            var nombreusuario = $("#nombreusuario").val();
            var claveacceso = $("#claveacceso").val();
            var nuevaClave = $("#nuevaClave").val();
            var confirmarClave = $("#confirmarClave").val();
            var claveprevia = $("#clavePrevia").val();

            if (nuevaClave !== confirmarClave) {
                // SweetAlert para contraseñas que no coinciden
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Las contraseñas no coinciden. Inténtalo de nuevo.'
                });
                return;
            }

            $.ajax({
                url: '../controllers/CUsuario.php',
                type: 'POST',
                data: {
                    operacion: 'cambiarClave',
                    idusuario: idUsuario,
                    nombreusuario: nombreusuario,
                    claveacceso: claveacceso,
                    nuevaClave: nuevaClave,
                    claveprevia: claveprevia,
                },
                dataType: 'JSON',
                success: function (respuesta) {
                    if (respuesta.status) {
                        // SweetAlert para actualización exitosa
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: respuesta.mensaje
                        }).then((value) => {
                            window.location.reload();
                        });
                    } else {
                        // SweetAlert para clave incorrecta
                        if (respuesta.mensaje === "Clave Incorrecta") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: respuesta.mensaje
                            });
                        }
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                }
            });
        }
    });
</script>
      </div>
    </div>
  </div>
</main>

<?php
require_once '../includes/footer.php';
?>