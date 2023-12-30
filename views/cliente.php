<?php
require_once '../includes/header.php';
?>

<main class="app-content">
   
   <div class="row">
     <div class="col-md-12">
       <div class="tile">

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <!--<h4 class="page-title">Clientes</h4>-->
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Lista de Clientes</h4>
                        <button type="button" id="registrocl" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modal-registrar-cliente">
                            <i class="fa fa-plus"></i>
                            Registro de Clientes
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTabla" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Tipodocumento</th>
                            <th scope="col">Nrodocumento</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Teléfono</th>
                           <!-- <th scope="col">inactive</th> -->
                            <th scope="col">Eliminar</th>
                            <th scope="col">Editar</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-clientes">
                                <!-- Aquí se mostrarán las filas de la tabla -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para el registro de clientes -->
<div class="modal fade" id="modal-registrar-cliente" tabindex="-1" role="dialog" aria-labelledby="modal-registrar-cliente-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-registrar-cliente-label">Registrar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de registro de clientes -->
                <form id="formulario-registrar-cliente">
                <!--<input id="idpersona" type="text" class="d-none" value="">-->
                    <div class="form-group">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" maxlength="50" placeholder="Ingrese su Apellido:" required>
                    </div>
                    <div class="form-group">
                        <label for="nombres">Nombres:</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" maxlength="50" placeholder="Ingrese su Nombre:" required>
                    </div>
                    <div class="form-group">
                    <label for="tipodocumento">Tipodocumento</label>
					<select id="tipodocumento" class="form-control form-select-sm">
                        <option value="">Seleccione</option>
                        <option value="D">DNI</option>
                        <option value="C">Carnet de Extranjería</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="nrodocumento">Nrodocumento:</label>
                        <input type="text" class="form-control" id="nrodocumento" name="nrodocumento" maxlength="8" placeholder="Número de documento de 8 dígitos:" oninput="validarsoloNúmeros(this)" required>
                   </div>
                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" maxlength="65" placeholder="Ingrese su Dirección:" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" maxlength="9" placeholder="Ingrese su Número:" oninput="validarsoloNúmeros(this)" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btn-registrar-cliente-close" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn-registrar-cliente-modal">Registrar</button>
            </div>
        </div>
    </div>
</div>

<!-- ... tu código de modal existente ... -->

<!-- Modal para actualizar clientes -->
<div class="modal fade" id="modal-actualizar-cliente" tabindex="-1" role="dialog" aria-labelledby="modal-actualizar-cliente-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-actualizar-cliente-label">Actualizar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para la actualización de clientes -->
                <form id="formulario-actualizar-cliente">
                    <input id="idpersona" type="text" class="d-none" value="">
                    <div class="form-group">
                        <label for="apellidos-actualizar">Apellidos:</label>
                        <input type="text" class="form-control" id="apellidos-actualizar" name="apellidos-actualizar" maxlength="50" placeholder="Ingrese su Apellido:" required>
                    </div>
                    <div class="form-group">
                        <label for="nombres-actualizar">Nombres:</label>
                        <input type="text" class="form-control" id="nombres-actualizar" name="nombres-actualizar" maxlength="50" placeholder="Ingrese su Nombre:" required>
                    </div>
                    <div class="form-group">
                        <label for="tipodocumento-actualizar">Tipodocumento</label>
                        <select id="tipodocumento-actualizar" class="form-control form-select-sm">
                            <option value="">Seleccione</option>
                            <option value="D">DNI</option>
                            <option value="C">Carnet de Extranjería</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nrodocumento-actualizar">Nrodocumento:</label>
                        <input type="text" class="form-control" id="nrodocumento-actualizar" name="nrodocumento-actualizar" maxlength="8" placeholder="Número de documento de 8 dígitos:" oninput="validarsoloNúmeros(this)" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion-actualizar">Dirección:</label>
                        <input type="text" class="form-control" id="direccion-actualizar" name="direccion-actualizar" maxlength="65" placeholder="Ingrese su Dirección:" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono-actualizar">Teléfono:</label>
                        <input type="text" class="form-control" id="telefono-actualizar" name="telefono-actualizar" maxlength="9" placeholder="Ingrese su Número:" oninput="validarsoloNúmeros(this)" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn-actualizar-cliente-modal">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<!-- Script para realizar llamadas AJAX y gestionar la tabla -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Agrega el enlace al archivo CSS de DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

<!-- Agrega el archivo JS de DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Agrega el enlace a Bootstrap JS si es necesario -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {


        $("#registrocl").click(function(){
            let apellidos = $("#apellidos").val("");
        let nombres = $("#nombres").val("");
        let tipodocumento = $("#tipodocumento").val("");
        let nrodocumento = $("#nrodocumento").val("");
        let direccion = $("#direccion").val("");
        let telefono = $("#telefono").val("");
        })

        ListarClientes();

 
        // Agrega un evento de clic al botón de registrar cliente dentro del modal
        $("#btn-registrar-cliente-modal").click(function() {
            RegistrarCliente();
        });

        // Agrega un evento de clic para los botones de editar
        $(document).on("click", ".btn-editar", function() {
            var idpersona = $(this).data("idpersona");
            obtenerCliente(idpersona);
        });

        // Agrega un evento de clic para el botón de actualizar cliente dentro del modal
        $("#btn-actualizar-cliente-modal").click(function() {
            actualizarCliente();
        });
    });

    function ListarClientes() {

        $('#myTabla').DataTable().destroy();

        $.ajax({
            url: '../controllers/CCliente.php',
            type: 'POST',
            data: {
                operacion: 'listar'
            },
            dataType: 'JSON',
            success: (result) => {
                let html = ""

                $.each(result, function(key, value) {
                    html += "<tr>"
                    html += "<td>" + (key + 1) + "</td>"
                    html += "<td>" + value.apellidos + "</td>"
                    html += "<td>" + value.nombres + "</td>"
                    html += "<td>" + value.tipodocumento + "</td>"
                    html += "<td>" + value.nrodocumento + "</td>"
                    html += "<td>" + value.direccion + "</td>"
                    html += "<td>" + value.telefono + "</td>"
                 //   html += "<td>" + value.inactive_at + "</td>"
                    html += "<td><button class='btn btn-danger btn-eliminar' data-idpersona='" + value.idpersona + "'><i class='fas fa-trash'></button></td>"
                    html += "<td><button class='btn btn-success btn-editar' data-idpersona='" + value.idpersona + "'><i class='fas fa-pencil-alt'></button></td>"
                    html += "</tr>"
                })

                 // Limpiar y actualizar el contenido de la tabla
                 $("#tbody-clientes").html(html);
                 // Inicializar DataTable con los nuevos datos
                 $('#myTabla').DataTable();

                // Agregar un evento de clic para los botones de eliminar (delegación de eventos)
            $(document).on("click", ".btn-eliminar", function() {
                var idpersona = $(this).data("idpersona");
                eliminarCliente(idpersona);
                });
            }
        });
    }

    function eliminarCliente(idpersona) {
    // Utiliza SweetAlert para mostrar un cuadro de confirmación
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción no se puede revertir. ¿Quieres eliminar este cliente?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma, realiza la eliminación
            $.ajax({
                url: '../controllers/CCliente.php',
                type: 'POST',
                data: {
                    operacion: 'eliminar',
                    idpersona: idpersona
                },
                success: function(response) {
                    // Utiliza SweetAlert para mostrar el mensaje de éxito
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Cliente eliminado correctamente.',
                    });
                    // Actualiza la lista de clientes después de la eliminación
                    ListarClientes();
                }
            });
        }
    });
}

   function RegistrarCliente() {
    let apellidos = $("#apellidos").val();
    let nombres = $("#nombres").val();
    let tipodocumento = $("#tipodocumento").val();
    let nrodocumento = $("#nrodocumento").val();
    let direccion = $("#direccion").val();
    let telefono = $("#telefono").val();

    if (apellidos.trim() === '' || nombres.trim() === '' || tipodocumento.trim() === '' || nrodocumento.trim() === '') {
        // Utiliza SweetAlert para mostrar el mensaje de error
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, complete todos los campos del formulario.',
        });
        return;
    }

    $.ajax({
        url: '../controllers/CCliente.php',
        type: 'POST',
        data: {
            operacion: 'registrar',
            apellidos: apellidos,
            nombres: nombres,
            tipodocumento: tipodocumento,
            nrodocumento: nrodocumento,
            direccion: direccion,
            telefono: telefono
        },
        success: function(response) {
            // Utiliza SweetAlert para mostrar el mensaje de éxito
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Cliente registrado correctamente.',
            });

            $("#formulario-registrar-cliente")[0].reset();
            $("#modal-registrar-cliente").modal("hide");
            $("#btn-registrar-cliente-close").click();
            $(".modal-backdrop.show").css("display", "none");
            ListarClientes();
        }
    });
}

    function obtenerCliente(idpersona) {
        $.ajax({
            url: '../controllers/CCliente.php',
            type: 'POST',
            data: {
                operacion: 'obtener',
                idpersona: idpersona
            },
            dataType: 'JSON',
            success: function(response) {
                $("#idpersona").val(response.idpersona);
                $("#apellidos-actualizar").val(response.apellidos);
                $("#nombres-actualizar").val(response.nombres);
                $("#tipodocumento-actualizar").val(response.tipodocumento);
                $("#nrodocumento-actualizar").val(response.nrodocumento);
                $("#direccion-actualizar").val(response.direccion);
                $("#telefono-actualizar").val(response.telefono);
                $("#modal-actualizar-cliente").modal("show");
            }
        });
    }

    function actualizarCliente() {
    let idpersona = $("#idpersona").val();
    let apellidos = $("#apellidos-actualizar").val();
    let nombres = $("#nombres-actualizar").val();
    let tipodocumento = $("#tipodocumento-actualizar").val();
    let nrodocumento = $("#nrodocumento-actualizar").val();
    let direccion = $("#direccion-actualizar").val();
    let telefono = $("#telefono-actualizar").val();
    
    if (apellidos.trim() === '' || nombres.trim() === '' || tipodocumento.trim() === '' || nrodocumento.trim() === '') {
            // Utiliza SweetAlert para mostrar el mensaje de error
            Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, complete todos los campos del formulario.',
        });
        return;
    }
    // Realiza la actualización directamente sin preguntar al usuario
    $.ajax({
        url: '../controllers/CCliente.php',
        type: 'POST',
        data: {
            operacion: 'actualizar',
            idpersona: idpersona,
            apellidos: apellidos,
            nombres: nombres,
            tipodocumento: tipodocumento,
            nrodocumento: nrodocumento,
            direccion: direccion,
            telefono: telefono
        },
        success: function(response) {
            // Utiliza SweetAlert para mostrar el mensaje de éxito
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Cliente actualizado correctamente.',
            });
            // Restablece el formulario y oculta el modal
            $("#formulario-actualizar-cliente")[0].reset();
            $("#modal-actualizar-cliente").modal("hide");
            // Actualiza la lista de clientes después de la actualización
            ListarClientes();
        }
    });
}

    function validarsoloNúmeros(input) {
    // Reemplaza cualquier carácter que no sea un número con una cadena vacía
    input.value = input.value.replace(/[^0-9]/g, '');
}
</script>

</div>
    </div>
  </div>
</main>

<?php
require_once '../includes/footer.php';
?>

