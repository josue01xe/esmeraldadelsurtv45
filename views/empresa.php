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
                <!--<h4 class="page-title">Empresas</h4>-->
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Lista de Empresas</h4>
                        <button type="button" id="registroem" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modal-registrar-empresa">
                            <i class="fa fa-plus"></i>
                            Registro de Empresas
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="emTabla" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                             <th scope="col">#</th>
                            <th scope="col">Razonsocial</th>
                            <th scope="col">Ruc</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Eliminar</th>
                            <th scope="col">Editar</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-empresas">
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
<div class="modal fade" id="modal-registrar-empresa" tabindex="-1" role="dialog" aria-labelledby="modal-registrar-empresa-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-registrar-empresa-label">Registrar Empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de registro de clientes -->
                <form id="formulario-registrar-empresa">
                <!--<input id="idpersona" type="text" class="d-none" value="">-->
                    <div class="form-group">
                        <label for="razonsocial">Razonsocial:</label>
                        <input type="text" class="form-control" id="razonsocial" name="razonsocial" maxlength="50" placeholder="Nombre de la Empresa:" required>
                    </div>
                    <div class="form-group">
                        <label for="ruc">Ruc:</label>
                        <input type="text" class="form-control" id="ruc" name="ruc" maxlength="11" value="20" oninput="validarsoloNúmeros(this)" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" maxlength="65" placeholder="Ingrese su Dirección:" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn-registrar-empresa-modal">Registrar</button>
            </div>
        </div>
    </div>
</div>

<!-- ... tu código de modal existente ... -->

<!-- Modal para actualizar clientes -->
<div class="modal fade" id="modal-actualizar-empresa" tabindex="-1" role="dialog" aria-labelledby="modal-actualizar-empresa-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-actualizar-empresa-label">Actualizar Empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para la actualización de clientes -->
                <form id="formulario-actualizar-empresa">
                    <input id="idempresa" type="text" class="d-none" value="">
                    <div class="form-group">
                        <label for="razonsocial-actualizar">Razonsocial:</label>
                        <input type="text" class="form-control" id="razonsocial-actualizar" name="razonsocial-actualizar" maxlength="50" placeholder="Nombre de la Empresa:" required>
                    </div>
                    <div class="form-group">
                        <label for="ruc-actualizar">Ruc:</label>
                        <input type="text" class="form-control" id="ruc-actualizar" name="ruc-actualizar" maxlength="11" value="20" oninput="validarsoloNúmeros(this)" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion-actualizar">Direccion:</label>
                        <input type="text" class="form-control" id="direccion-actualizar" name="direccion-actualizar" maxlength="65" placeholder="Ingrese su Dirección:" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn-actualizar-empresa-modal">Actualizar</button>
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

<!-- Agrega el enlace a Bootstrap JS si es necesario -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {

        $("#registroem").click(function(){
            let razonsocial = $("#razonsocial").val("");
        let ruc = $("#ruc").val("20");
        let direccion = $("#direccion").val("");
        })

        ListarEmpresas();

        // Agrega un evento de clic al botón de registrar cliente dentro del modal
        $("#btn-registrar-empresa-modal").click(function() {
            RegistrarEmpresa();
        });

        // Agrega un evento de clic para los botones de editar
        $(document).on("click", ".btn-editar", function() {
            var idempresa = $(this).data("idempresa");
            obtenerEmpresa(idempresa);
        });

        // Agrega un evento de clic para el botón de actualizar cliente dentro del modal
        $("#btn-actualizar-empresa-modal").click(function() {
            actualizarEmpresa();
        });
    });

    function ListarEmpresas() {

        $('#emTabla').DataTable().destroy();

        $.ajax({
            url: '../controllers/CEmpresa.php',
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
                    html += "<td>" + value.razonsocial + "</td>"
                    html += "<td>" + value.ruc + "</td>"
                    html += "<td>" + value.direccion + "</td>"
                    html += "<td><button class='btn btn-danger btn-eliminar' data-idempresa='" + value.idempresa + "'><i class='fas fa-trash'></button></td>"
                    html += "<td><button class='btn btn-success btn-editar' data-idempresa='" + value.idempresa + "'><i class='fas fa-pencil-alt'></button></td>"
                    html += "</tr>"
                })

                $("#tbody-empresas").html(html)
                $('#emTabla').DataTable();
                // Agregar un evento de clic para los botones de eliminar
                $(document).on("click", ".btn-eliminar", function() {
                    var idempresa = $(this).data("idempresa");
                    eliminarEmpresa(idempresa);
                });
            }
        });
    }

    function eliminarEmpresa(idempresa) {
            // Utiliza SweetAlert para mostrar un cuadro de confirmación
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción no se puede revertir. ¿Quieres eliminar esta empresa?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
        $.ajax({
            url: '../controllers/CEmpresa.php',
            type: 'POST',
            data: {
                operacion: 'eliminar',
                idempresa: idempresa
            },
            success: function(response) {
                   // Utiliza SweetAlert para mostrar el mensaje de éxito
                   Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Empresa eliminada correctamente.',
                    });
                ListarEmpresas();
            }
        });
    }
 });
}

    function RegistrarEmpresa() {
        let razonsocial = $("#razonsocial").val();
        let ruc = $("#ruc").val();
        let direccion = $("#direccion").val();

        if (razonsocial.trim() === '' || ruc.trim() === '') {
        // Utiliza SweetAlert para mostrar el mensaje de error
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, complete todos los campos del formulario.',
        });
        return;
    }
        $.ajax({
            url: '../controllers/CEmpresa.php',
            type: 'POST',
            data: {
                operacion: 'registrar',
                razonsocial: razonsocial,
                ruc: ruc,
                direccion: direccion
            },
            success: function(response) {
            // Utiliza SweetAlert para mostrar el mensaje de éxito
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Cliente registrado correctamente.',
            });
                $("#formulario-registrar-empresa")[0].reset();
                $("#modal-registrar-empresa").modal("hide");
                $("#btn-registrar-empresa-close").click();
                $(".modal-backdrop.show").css("display","none");
                ListarEmpresas();
            }
        });
    }

    function obtenerEmpresa(idempresa) {
        $.ajax({
            url: '../controllers/CEmpresa.php',
            type: 'POST',
            data: {
                operacion: 'obtener',
                idempresa: idempresa
            },
            dataType: 'JSON',
            success: function(response) {
                $("#idempresa").val(response.idempresa);
                $("#razonsocial-actualizar").val(response.razonsocial);
                $("#ruc-actualizar").val(response.ruc);
                $("#direccion-actualizar").val(response.direccion);
                $("#modal-actualizar-empresa").modal("show");
            }
        });
    }

    function actualizarEmpresa() {
        let idempresa = $("#idempresa").val();
        let razonsocial = $("#razonsocial-actualizar").val();
        let ruc = $("#ruc-actualizar").val();
        let direccion = $("#direccion-actualizar").val();

        if (razonsocial.trim() === '' || ruc.trim() === '') {
        // Utiliza SweetAlert para mostrar el mensaje de error
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, complete todos los campos del formulario.',
        });
        return;
    }
        
        $.ajax({
            url: '../controllers/CEmpresa.php',
            type: 'POST',
            data: {
                operacion: 'actualizar',
                idempresa: idempresa,
                razonsocial: razonsocial,
                ruc: ruc,
                direccion: direccion
            },
            success: function(response) {
            // Utiliza SweetAlert para mostrar el mensaje de éxito
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Empresa actualizada correctamente.',
            });
                // Restablece el formulario y oculta el modal
                $("#formulario-actualizar-empresa")[0].reset();
                $("#modal-actualizar-empresa").modal("hide");
                ListarEmpresas();
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