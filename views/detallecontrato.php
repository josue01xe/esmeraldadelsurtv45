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
                <!--<h4 class="page-title"></h4>-->
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Lista de Horarios</h4>
                        <button type="button" id="registrodc" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modal-registrar-detallecontrato">
                            <i class="fa fa-plus"></i>
                            Registro de Horarios
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dcTabla" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                            <th scope="col">Persona</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Dia</th>
                            <th scope="col">Duracionspot</th>
                            <th scope="col">Horaaproximada</th>
                            <th scope="col">Fecha</th>
                           
                            <th scope="col">Observaciones</th>
                            <th scope="col">Eliminar</th>
                            <th scope="col">Editar</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-detallecontratos">
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
<div class="modal fade" id="modal-registrar-detallecontrato" tabindex="-1" role="dialog" aria-labelledby="modal-registrar-detallecontrato-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-registrar-detallecontrato-label">Registrar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de registro de clientes -->
                <form id="formulario-registrar-detallecontrato">
                <!--<input id="idpersona" type="text" class="d-none" value="">-->
                    <div class="form-group">
                        <input type="text" id="idcontrato" class="d-none">
                    </div>
                    <div class="form-group">
                        <label for="dia">Día</label>
						<select id="dia" class="form-control form-select-sm">
                            <option value="">Seleccione</option>
                            <option value="Lunes">Lunes</option>
                            <option value="Martes">Martes</option>
                            <option value="Miércoles">Miércoles</option>
                            <option value="Jueves">Jueves</option>
                            <option value="Viernes">Viernes</option>
                            <option value="Sábado">Sábado</option>
                            <option value="Domingo">Domingo</option>
                        </select>
                    </div>
                  <!--  <div class="form-group">
                        <label for="duracion">Duracion:</label>
                        <input type="time" class="form-control" id="duracion" name="duracion" required>
                    </div> -->
                    <div class="form-group">
                        <label for="horainicio">Horaaproximada:</label>
                        <input type="time" class="form-control" id="horainicio" name="horainicio" required>
                    </div>
                     <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                        </div>
                    <div class="form-group">
                        <label for="observaciones">Observaciones:</label>
                        <input type="text" class="form-control" id="observaciones" name="observaciones" maxlength="80" required>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn-registrar-detallecontrato-modal">Registrar</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal para actualizar contratos -->
<div class="modal fade" id="modal-actualizar-detallecontrato" tabindex="-1" role="dialog" aria-labelledby="modal-actualizar-detallecontrato-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-actualizar-detallecontrato-label">Actualizar Detalle Contrato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de actualización de contratos -->
                <form id="formulario-actualizar-detallecontrato">
                <input id="iddetallecontrato" type="text" class="d-none" value="" name="iddetallecontrato">
                 
                <div class="form-group">
                        <input type="text" id="idcontrato-actualizar" class="d-none">
                    </div>
                    <div class="form-group">
                    <label for="dia-actualizar">Dia</label>
								<select id="dia-actualizar" class="form-control form-select-sm">
                            <option value="">Seleccione</option>
                            <option value="Lunes">Lunes</option>
                            <option value="Martes">Martes</option>
                            <option value="Miércoles">Miércoles</option>
                            <option value="Jueves">Jueves</option>
                            <option value="Viernes">Viernes</option>
                            <option value="Sábado">Sábado</option>
                            <option value="Domingo">Domingo</option>
    
    
                </select>
                    </div>
                    <div class="form-group">
                        <label for="duracion-actualizar">Duracion:</label>
                        <input type="text" class="form-control" id="duracion-actualizar" name="duracion-actualizar" required>
                    </div>
                    <div class="form-group">
                        <label for="horainicio-actualizar">Horaaproximada:</label>
                        <input type="time" class="form-control" id="horainicio-actualizar" name="horainicio-actualizar" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha-actualizar">Fecha:</label>
                        <input type="date" class="form-control" id="fecha-actualizar" name="fecha-actualizar" required>
                    </div>
                    <div class="form-group">
                        <label for="observaciones-actualizar">Observaciones:</label>
                        <input type="text" class="form-control" id="observaciones-actualizar" name="observaciones-actualizar" maxlength="80" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn-actualizar-detallecontrato-modal">Actualizar</button>
            </div>
        </div>
    </div>
</div>


<!-- Script para realizar llamadas AJAX y gestionar la tabla -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Agrega el enlace al archivo CSS de DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="../assets/css/bootstrap-datepicker.min.css">

<!-- Agrega el archivo JS de DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<!-- Agrega el enlace a Bootstrap JS si es necesario -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="../assets/js/bootstrap-datepicker.min.js"></script>

<script>
    // Recuperar id de la URL
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const urlidcontrato = urlParams.get('idcontrato')

    $(document).ready(function() {
        $("#registrodc").click(function(){
            let dia = $("#dia").val("");
        //let duracion = $("#duracion").val("");
        let horainicio = $("#horainicio").val("");
        let fecha = $("#fecha").val("");
        let observaciones = $("#observaciones").val("");
        })

        let dataTableInitialized = false; 
        $("#idcontrato").val(urlidcontrato);
        console.log(urlidcontrato);

        ListarDetalleContratos(urlidcontrato);

        
var currentDate = new Date();
// Set the time part of the date to midnight
currentDate.setHours(0, 0, 0, 0);

// Set the min attribute of the date input to the current date
$('#fecha').attr('min', currentDate.toISOString().split('T')[0]);
$('#fecha-actualizar').attr('min', currentDate.toISOString().split('T')[0]);

        // Agrega un evento de clic al botón de registrar contrato dentro del modal
        $("#btn-registrar-detallecontrato-modal").click(function() {
            RegistrarDetalleContrato(); 
        });

         // Agrega un evento de clic para los botones de editar
     $(document).on("click", ".btn-editar", function() {
            var iddetallecontrato = $(this).data("iddetallecontrato");
            obtenerDetalleContrato(iddetallecontrato);
        });

        // Agrega un evento de clic para el botón de actualizar cliente dentro del modal
        $("#btn-actualizar-detallecontrato-modal").click(function() {
            actualizarDetalleContrato();
        });

        function ListarDetalleContratos(idcontrato) {
           
            $('#dcTabla').DataTable().destroy();

            $.ajax({
                url: '../controllers/CDetalleContrato.php',
                type: 'POST',
                data: {
                    operacion: 'listar',
                    idcontrato: idcontrato
                },
                dataType: 'JSON',
                success: (result) => {
                    console.log(result);
                    let html = "";

                    $.each(result, function(key, value) {
                        html += "<tr>";
                        html += "<td>" + (key + 1) + "</td>";
                        html += "<td>" + value.persona + "</td>";
                        html += "<td>" + value.empresa + "</td>";
                        html += "<td>" + value.dia + "</td>";
                        html += "<td>" + value.idplan + "</td>";
                        html += "<td>" + value.horainicio + "</td>";
                        html += "<td>" + value.fecha + "</td>";
                        html += "<td>" + value.observaciones + "</td>";
                        html += "<td><button class='btn btn-danger btn-eliminar' data-iddetallecontrato='" + value.iddetallecontrato + "'><i class='fas fa-trash'></button></td>";
                        html += "<td><button class='btn btn-success btn-editar' data-iddetallecontrato='" + value.iddetallecontrato + "' data-toggle='modal' data-target='#modal-actualizar-detallecontrato'><i class='fas fa-pencil-alt'></button></td>"
                        html += "</tr>";
                    });

                    $("#tbody-detallecontratos").html(html);
               
                    $('#dcTabla').DataTable();

                    // Agregar un evento de clic para los botones de eliminar (delegación de eventos)
                    $(document).on("click", ".btn-eliminar", function() {
                        var iddetallecontrato = $(this).data("iddetallecontrato");
                        // Llamar a la función para eliminar el contrato
                        eliminarDetalleContrato(iddetallecontrato);
                    });
                }
            });
        }

        function eliminarDetalleContrato(iddetallecontrato) {
// Utiliza SweetAlert para mostrar un cuadro de confirmación
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción no se puede revertir. ¿Quieres eliminar este horario?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '../controllers/CDetalleContrato.php',
                type: 'POST',
                data: {
                    operacion: 'eliminar',
                    iddetallecontrato: iddetallecontrato
                },
                success: function(response) {
                     // Utiliza SweetAlert para mostrar el mensaje de éxito
                     Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Horario eliminado correctamente.',
                    });
                    // Vuelve a listar los contratos después de eliminar uno
                    ListarDetalleContratos(urlidcontrato);
                }
            });
        }
    });
}

    function RegistrarDetalleContrato() {
    // Obtén los valores del formulario de registro
    let idcontrato = $("#idcontrato").val();
    let dia = $("#dia").val();
    //let duracion = $("#duracion").val();
    let horainicio = $("#horainicio").val();
    let fecha = $("#fecha").val();
    let observaciones = $("#observaciones").val();

    //debugger;
    
    if (dia.trim() === '' || horainicio.trim() === '' || fecha.trim() === '') {
  // Utiliza SweetAlert para mostrar el mensaje de error
  Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, complete todos los campos del formulario.',
        });
        return;
    }

    $.ajax({
        url: '../controllers/CDetalleContrato.php',
        type: 'POST',
        data: {
            operacion: 'registrar',
            idcontrato: idcontrato,
            dia: dia,
            //duracion: duracion,
            horainicio: horainicio,
            fecha: fecha,
            observaciones: observaciones
        },
        success: function(response) {
        // Utiliza SweetAlert para mostrar el mensaje de éxito
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Horario registrado correctamente.',
            });
            // Limpia los campos de entrada después del registro
            //$("#formulario-registrar-detallecontrato")[0].reset();
            limpiarcampos();
            // Cierra el modal
             $("#modal-registrar-detallecontrato").modal("hide");
             $("#btn-registrar-detallecontrato-close").click();
             $(".modal-backdrop.show").css("display","none");
         
            // Vuelve a listar los contratos para mostrar el nuevo contrato registrado
            ListarDetalleContratos(urlidcontrato);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
        console.log("Status: " + textStatus); console.log("Error: " + errorThrown); 
        } 
    });
}

    function limpiarcampos(){
        let dia = $("#dia").val("");
        //let duracion = $("#duracion").val("");
        let horainicio = $("#horainicio").val("");
        let fecha = $("#fecha").val("");
        let observaciones = $("#observaciones").val("");
        //let restriccionpublicidad = $("input[name='restricciones-actualizar']").val("");

    } 

    function obtenerDetalleContrato(iddetallecontrato) {
    $.ajax({
        url: '../controllers/CDetalleContrato.php',
        type: 'POST',
        data: {
            operacion: 'obtener',
            iddetallecontrato: iddetallecontrato
        },
        dataType: 'JSON',
        success: function(response) {
            $("#iddetallecontrato").val(response.iddetallecontrato);
            $("#idcontrato-actualizar").val(response.idcontrato);
            $("#dia-actualizar").val(response.dia);
            $("#duracion-actualizar").val(response.idplan);
            $("#horainicio-actualizar").val(response.horainicio);
            $("#fecha-actualizar").val(response.fecha);
            $("#observaciones-actualizar").val(response.observaciones);

            $("#modal-actualizar-detallecontrato").modal("show");
        }
    });
}


    function actualizarDetalleContrato() {
        let iddetallecontrato = $("#iddetallecontrato").val();
        let idcontrato = $("#idcontrato-actualizar").val();
        //let idpersona = $("#idpersona-actualizar").val();
        //let idempresa = $("#idempresa-actualizar").val();
        let dia = $("#dia-actualizar").val();
        let idplan = $("#duracion-actualizar").val();
        let horainicio = $("#horainicio-actualizar").val();
        let fecha = $("#fecha-actualizar").val();
        let observaciones = $("#observaciones-actualizar").val();
  // Ajustado para obtener el valor del radio seleccionado
  if (idcontrato.trim() === '' || dia.trim() === '' || idplan.trim() === '' || horainicio.trim() === '' || fecha.trim() === '') {
            // Utiliza SweetAlert para mostrar el mensaje de error
            Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, complete todos los campos del formulario.',
        });
        return;
    }

        $.ajax({
            url: '../controllers/CDetalleContrato.php',
            type: 'POST',
            data: {
                operacion: 'actualizar',
                iddetallecontrato: iddetallecontrato,
                idcontrato: idcontrato,
                dia: dia,
                idplan: idplan,
                horainicio: horainicio,
                fecha: fecha,
                observaciones: observaciones
            },
            success: function(response) {
                $("#formulario-actualizar-detallecontrato")[0].reset();
                $("#modal-actualizar-detallecontrato").modal("hide");
             $(".modal-backdrop.show").css("display","none");
         
                ListarDetalleContratos(urlidcontrato);
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

