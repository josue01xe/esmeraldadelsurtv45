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
                <!--<h4 class="page-title">Planes</h4>-->
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Lista de Planes</h4>
                        <button type="button" id="registropl" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modal-registrar-plan">
                            <i class="fa fa-plus"></i>
                            Registro de Planes
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="plTabla" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombreplan</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Duracionspot</th>
                            <th scope="col">Duracionplan</th>
                            <th scope="col">CantidadSpot</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Eliminar</th>
                            <th scope="col">Editar</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-planes">
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
<div class="modal fade" id="modal-registrar-plan" tabindex="-1" role="dialog" aria-labelledby="modal-registrar-plan-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-registrar-plan-label">Registrar Empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de registro de clientes -->
                <form id="formulario-registrar-plan">
                <!--<input id="idpersona" type="text" class="d-none" value="">-->
                    <div class="form-group">
                        <label for="nombreplan">Nombreplan:</label>
                        <input type="text" class="form-control" id="nombreplan" name="nombreplan" maxlength="40" placeholder="nombreplan:" required>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="number" class="form-control" id="precio" name="precio" placeholder="precio:" required>
                    </div>
                    <div class="form-group">
                        <label for="duracionspot">Duracionspot:</label>
                        <input type="text" class="form-control" id="duracionspot" name="duracionspot" maxlength="40" placeholder="duracionspot:" required>
                    </div>
                    <div class="form-group">
                        <label for="duracionplan">Duracionplan:</label>
                        <input type="text" class="form-control" id="duracionplan" name="duracionplan" maxlength="40" placeholder="duracionplan:" required>
                    </div>
                    <div class="form-group">
                        <label for="cantanunciosdia">CantidadSpot:</label>
                        <input type="number" class="form-control" id="cantanunciosdia" name="cantanunciosdia" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" maxlength="100" placeholder="descripcion:" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn-registrar-plan-modal">Registrar</button>
            </div>
        </div>
    </div>
</div>

<!-- ... tu código de modal existente ... -->

<!-- Modal para actualizar clientes -->
<div class="modal fade" id="modal-actualizar-plan" tabindex="-1" role="dialog" aria-labelledby="modal-actualizar-plan-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-actualizar-plan-label">Actualizar Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para la actualización de clientes -->
                <form id="formulario-actualizar-plan">
                    <input id="idplan" type="text" class="d-none" value="">
                    <div class="form-group">
                        <label for="nombreplan-actualizar">Nombreplan:</label>
                        <input type="text" class="form-control" id="nombreplan-actualizar" name="nombreplan-actualizar" maxlength="40" placeholder="nombreplan:" required>
                    </div>
                    <div class="form-group">
                        <label for="precio-actualizar">Precio:</label>
                        <input type="number" class="form-control" id="precio-actualizar" name="precio-actualizar" required>
                    </div>
                    <div class="form-group">
                        <label for="duracionspot-actualizar">Duracionspot</label>
                        <input type="text" class="form-control" id="duracionspot-actualizar" name="duracionspot-actualizar" maxlength="40" placeholder="duracionspot:" required>
                    </div>
                    <div class="form-group">
                        <label for="duracionplan-actualizar">Duracionplan:</label>
                        <input type="text" class="form-control" id="duracionplan-actualizar" name="duracionplan-actualizar" maxlength="40" placeholder="duracionplan:" required>
                    </div>
                    <div class="form-group">
                        <label for="cantanunciosdia-actualizar">CantidadSpot:</label>
                        <input type="number" class="form-control" id="cantanunciosdia-actualizar" name="cantanunciosdia-actualizar" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion-actualizar">Descripcion:</label>
                        <input type="text" class="form-control" id="descripcion-actualizar" name="descripcion-actualizar" maxlength="100" placeholder="descripcion:" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn-actualizar-plan-modal">Actualizar</button>
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

 <!-- Enlace a FontAwesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script>
    $(document).ready(function() {

        $("#registropl").click(function(){
        let nombreplan = $("#nombreplan").val("");
        let precio = $("#precio").val("");
        let duracionspot = $("#duracionspot").val("");
        let duracionplan = $("#duracionplan").val("");
        let cantanunciosdia = $("#cantanunciosdia").val("");
        let descripcion = $("#descripcion").val("");
        })

        ListarPlanes();

            // Función para validar que el valor sea un número mayor o igual a cero
    function esNumeroMayorOIgualACero(valor) {
        return !isNaN(parseFloat(valor)) && parseFloat(valor) >= 0;
    }
        // Agrega un evento de clic al botón de registrar cliente dentro del modal
        $("#btn-registrar-plan-modal").click(function() {
                    // Obtener el valor del campo de precio
        var precio = $("#precio").val();
        var cantanunciosdia = $("#cantanunciosdia").val();


   // Validar que ambos valores sean números mayores o iguales a cero
   if (!esNumeroMayorOIgualACero(precio) || !esNumeroMayorOIgualACero(cantanunciosdia)) {
        // Utiliza SweetAlert para mostrar el mensaje de error
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, ingrese un monto válido mayor o igual a cero.',
        });
        return;
    }
            RegistrarPlan();
        });

        // Agrega un evento de clic para los botones de editar
        $(document).on("click", ".btn-editar", function() {
            var idplan = $(this).data("idplan");
            obtenerPlan(idplan);
        });

        // Agrega un evento de clic para el botón de actualizar cliente dentro del modal
        $("#btn-actualizar-plan-modal").click(function() {
                                // Obtener el valor del campo de precio
        var precioActualizar = $("#precio-actualizar").val();
        var cantanunciosdiaActualizar = $("#cantanunciosdia-actualizar").val();

// Validar que ambos valores sean números mayores o iguales a cero
if (!esNumeroMayorOIgualACero(precioActualizar) || !esNumeroMayorOIgualACero(cantanunciosdiaActualizar)) {
        // Utiliza SweetAlert para mostrar el mensaje de error
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, ingrese un monto válido mayor o igual a cero.',
        });
        return;
    }
            actualizarPlan();
        });
    });

    function ListarPlanes() {

        $('#plTabla').DataTable().destroy();

        $.ajax({
            url: '../controllers/CPlan.php',
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
                    html += "<td>" + value.nombreplan + "</td>"
                    html += "<td>" + value.precio + "</td>"
                    html += "<td>" + value.duracionspot + "</td>"
                    html += "<td>" + value.duracionplan + "</td>"
                    html += "<td>" + value.cantanunciosdia + "</td>"
                    html += "<td>" + value.descripcion + "</td>"
                    html += "<td><button class='btn btn-danger btn-eliminar' data-idplan='" + value.idplan + "'><i class='fas fa-trash'></i></button></td>"
                    html += "<td><button class='btn btn-success btn-editar' data-idplan='" + value.idplan + "'><i class='fas fa-pencil-alt'></i></button></td>"
                    html += "</tr>"
                })

                $("#tbody-planes").html(html)
                $('#plTabla').DataTable();

                // Agregar un evento de clic para los botones de eliminar
                $(document).on("click", ".btn-eliminar", function() {
                    var idplan = $(this).data("idplan");
                    eliminarPlan(idplan);
                });
            }
        });
    }

    function eliminarPlan(idplan) {
    // Utiliza SweetAlert para mostrar un cuadro de confirmación
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción no se puede revertir. ¿Quieres eliminar este plan?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {

        $.ajax({
            url: '../controllers/CPlan.php',
            type: 'POST',
            data: {
                operacion: 'eliminar',
                idplan: idplan
            },
            success: function(response) {
                    // Utiliza SweetAlert para mostrar el mensaje de éxito
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Plan eliminado correctamente.',
                    });

                ListarPlanes();
            }
        });
    }
 });
}

    function RegistrarPlan() {
        let nombreplan = $("#nombreplan").val();
        let precio = $("#precio").val();
        let duracionspot = $("#duracionspot").val();
        let duracionplan = $("#duracionplan").val();
        let cantanunciosdia = $("#cantanunciosdia").val();
        let descripcion = $("#descripcion").val();

        if (nombreplan.trim() === '' || precio.trim() === '' || duracionspot.trim() === '' || duracionplan.trim() === '' || cantanunciosdia.trim() === '') {
        // Utiliza SweetAlert para mostrar el mensaje de error
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, complete todos los campos del formulario.',
        });
        return;
    }

        $.ajax({
            url: '../controllers/CPlan.php',
            type: 'POST',
            data: {
                operacion: 'registrar',
                nombreplan: nombreplan,
                precio: precio,
                duracionspot: duracionspot,
                duracionplan: duracionplan,
                cantanunciosdia: cantanunciosdia,
                descripcion: descripcion
            },
            success: function(response) {
            // Utiliza SweetAlert para mostrar el mensaje de éxito
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Plan registrado correctamente.',
            });

                $("#formulario-registrar-plan")[0].reset();
                $("#modal-registrar-plan").modal("hide");
                $("#btn-registrar-plan-close").click();
                $(".modal-backdrop.show").css("display", "none");
                ListarPlanes();
            }
        });
    }

    function obtenerPlan(idplan) {
        $.ajax({
            url: '../controllers/CPlan.php',
            type: 'POST',
            data: {
                operacion: 'obtener',
                idplan: idplan
            },
            dataType: 'JSON',
            success: function(response) {
                $("#idplan").val(response.idplan);
                $("#nombreplan-actualizar").val(response.nombreplan);
                $("#precio-actualizar").val(response.precio);
                $("#duracionspot-actualizar").val(response.duracionspot);
                $("#duracionplan-actualizar").val(response.duracionplan);
                $("#cantanunciosdia-actualizar").val(response.cantanunciosdia);
                $("#descripcion-actualizar").val(response.descripcion);
                $("#modal-actualizar-plan").modal("show");
            }
        });
    }

    function actualizarPlan() {
        let idplan = $("#idplan").val();
        let nombreplan = $("#nombreplan-actualizar").val();
        let precio = $("#precio-actualizar").val();
        let duracionspot = $("#duracionspot-actualizar").val();
        let duracionplan = $("#duracionplan-actualizar").val();
        let cantanunciosdia = $("#cantanunciosdia-actualizar").val();
        let descripcion = $("#descripcion-actualizar").val();

        if (nombreplan.trim() === '' || precio.trim() === '' || duracionspot.trim() === '' || duracionplan.trim() === '' || cantanunciosdia.trim() === '') {
        // Utiliza SweetAlert para mostrar el mensaje de error
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, complete todos los campos del formulario.',
        });
        return;
    }

        $.ajax({
            url: '../controllers/CPlan.php',
            type: 'POST',
            data: {
                operacion: 'actualizar',
                idplan: idplan,
                nombreplan: nombreplan,
                precio: precio,
                duracionspot: duracionspot,
                duracionplan: duracionplan,
                cantanunciosdia: cantanunciosdia,
                descripcion: descripcion
            },
            success: function(response) {
            // Utiliza SweetAlert para mostrar el mensaje de éxito
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Plan actualizado correctamente.',
            });

                $("#formulario-actualizar-plan")[0].reset();
                $("#modal-actualizar-plan").modal("hide");
                ListarPlanes();
            }
        });
    }
</script>
     </div>
    </div>
  </div>
</main>

<?php
require_once '../includes/footer.php';
?>