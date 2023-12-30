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
                <!--<h4 class="page-title">Contratos</h4>-->
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Lista de Contratos</h4>
                        <button type="button" id="registro" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modal-registrar-contrato">
                            <i class="fa fa-plus"></i>
                            Registro de Contratos
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTablita" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Persona</th>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Servicio</th>
                                    <th scope="col">Plan</th>
                                    <th scope="col">Precio</th>
                                    <!--<th scope="col">Duracionspot</th>-->
                                    <th scope="col">Fechainicio</th>
                                    <th scope="col">Fechafin</th>
                                    <th scope="col">Observaciones</th>
                                    <th scope="col">Espacio Publicitario</th>
                                    <th scope="col">Eliminar</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">horario</th>
                                    <th scope="col">pagoscontrato</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-contratos">
                                <!-- Aquí se mostrarán las filas de la tabla -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para el registro de contratos -->
<div class="modal fade" id="modal-registrar-contrato" tabindex="-1" role="dialog" aria-labelledby="modal-registrar-contrato-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-registrar-contrato-label">Registrar Contrato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de registro de contratos -->
                <form id="formulario-registrar-contrato">
                <!--<input id="idcontrato" type="text" class="d-none" value="">-->
                    <div class="form-group">
                        <input type="text" class="d-none" id="idusuario" name="idusuario" value="<?php echo $_SESSION['id_usuario'] ?>">
                    </div>
                    <!-- Sección de selección de persona -->
                    <div class="form-group">
                        <label for="iddetalle">Persona:</label>
                        <select class="form-control ejemplo-select2" id="iddetalle" name="iddetalle">
                            <option value="AP">Alabama</option>
                            <option value="WT">Wyoming</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="iddetalle-empresa">Empresa:</label>
                        <select class="form-control ejemplo-select2" id="iddetalle-empresa" name="iddetalle-empresa">
                            <option value="AT"></option>
                            <option value="WS"></option>
                        </select>
                    </div>  

                    <div class="form-group">
                        <label for="idservicio">Servicio:</label>
                        <select id="idservicio" class="form-control form-select-sm">
                  <option value="">Seleccione</option>
				  <option value="1">Publicidad</option>
    <option value="2">Reportaje</option>
                </select>
                    </div>
                    <div class="form-group">
                        <label for="idplan">Plan:</label>
                        <select class="form-control ejemplo-select2" id="idplan" name="idplan">
                            <option value="AN">Alabama</option>
                            <option value="WZ">Wyoming</option>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label for="fechainicio">Fecha de inicio:</label>
                        <input type="date" class="form-control" id="fechainicio" name="fechainicio" required>
                    </div>
                    <div class="form-group">
                        <label for="fechafin">Fecha fin:</label>
                        <input type="date" class="form-control" id="fechafin" name="fechafin" required>
                    </div>
                    <div class="form-group">
                        <label for="observaciones">Observaciones:</label>
                        <input type="text" class="form-control" id="observaciones" name="observaciones" maxlength="80" required>
                    </div>
                    <div class="form-group">
    <label for="restriccionpublicidad">restricciones:</label>
    <div class="form-check">
        <input type="radio" class="form-check-input" id="restriccionpublicidad" name="restricciones" value="Solo para adultos">
        <label class="form-check-label" for="soloAdultos">Solo para adultos</label>
    </div>
    <div class="form-check">
        <input type="radio" class="form-check-input" id="restriccionpublicidad" name="restricciones" value="Todo público" checked>
        <label class="form-check-label" for="paraTodoPublico">Todo público</label>
    </div>
</div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn-registrar-contrato-modal">Registrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para actualizar contratos -->
<div class="modal fade" id="modal-actualizar-contrato" tabindex="-1" role="dialog" aria-labelledby="modal-actualizar-contrato-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-actualizar-contrato-label">Actualizar Contrato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de actualización de contratos -->
                <form id="formulario-actualizar-contrato">
                <input id="idcontrato" type="text" class="d-none" value="" name="idcontrato">
                    <div class="form-group">
                        <input type="text" class="d-none" id="idusuario-actualizar" name="idusuario-actualizar" value="<?php echo $_SESSION['id_usuario'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="idpersona-actualizar">Persona:</label>
                        <input type="text" class="form-control" id="idpersona-actualizar" name="idpersona-actualizar" readonly>
                    </div>
                    <div class="form-group">
                        <label for="idempresa-actualizar">Empresa:</label>
                        <input type="text" class="form-control" id="idempresa-actualizar" name="idempresa-actualizar" readonly>
                    </div>
                    <div class="form-group">
                        <label for="idservicio-actualizar">Servicio:</label>
                        <select id="idservicio-actualizar" class="form-control form-select-sm">
                  <option value="">Seleccione</option>
				  <option value="1">Publicidad</option>
    <option value="2">Reportaje</option>
                </select>
                    </div>
                    <div class="form-group">
                        <label for="idplan-actualizar">Plan:</label>
                        <select class="form-control ejemplo-select2" id="idplan-actualizar" name="idplan-actualizar">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fechainicio-actualizar">Fecha de inicio:</label>
                        <input type="date" class="form-control" id="fechainicio-actualizar" name="fechainicio-actualizar" required>
                    </div>
                    <div class="form-group">
                        <label for="fechafin-actualizar">Fecha fin:</label>
                        <input type="date" class="form-control" id="fechafin-actualizar" name="fechafin-actualizar" required>
                    </div>
                    <div class="form-group">
                        <label for="observaciones-actualizar">Observaciones:</label>
                        <input type="text" class="form-control" id="observaciones-actualizar" name="observaciones-actualizar" maxlength="80" required>
                    </div>
                    <div class="form-group">
    <label for="restriccionpublicidad-actualizar">restricciones:</label>
    <div class="form-check">
        <input type="radio" class="form-check-input" id="restriccionpublicidad-actualizar" name="restricciones-actualizar" value="Solo para adultos">
        <label class="form-check-label" for="soloAdultos-actualizar">Solo para adultos</label>
    </div>
    <div class="form-check">
        <input type="radio" class="form-check-input" id="restriccionpublicidad-actualizar" name="restricciones-actualizar" value="Todo público">
        <label class="form-check-label" for="paraTodoPublico-actualizar">Todo público</label>
    </div>
</div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn-actualizar-contrato-modal">Actualizar</button>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Agrega el enlace al archivo CSS de DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

<!-- Agrega jQuery y DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Select 2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

 <!-- Enlace a FontAwesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script>

    $(document).ready(function() {
      
        $("#registro").click(function(){
        $("#formulario-registrar-contrato")[0].reset();
        //let idusuario = $("#idusuario").val("");
        let iddetalle = $("#iddetalle-empresa").val("");  
        let idservicio = $("#idservicio").val("");
        let idplan = $("#idplan").val("");
        let fechainicio = $("#fechainicio").val("");
        let fechafin = $("#fechafin").val("");
        let observaciones = $("#observaciones").val("");
    })

        $('#modal-registrar-contrato').on('shown.bs.modal', function () {  
                $('#iddetalle').select2({
                    dropdownParent: $('#modal-registrar-contrato')
                });        
        });

        $('#modal-registrar-contrato').on('shown.bs.modal', function () {
                $('#iddetalle-empresa').select2({
                    dropdownParent: $('#modal-registrar-contrato')
                });   
        });
   

        $('#modal-registrar-contrato').on('shown.bs.modal', function () {
           // setTimeout(() => {
           // }, 1000);
        });


        $('#modal-actualizar-contrato').on('shown.bs.modal', function () {
        });
   
        //  $('.form-select form-select-sm').select2();
  
    
     //$("input[id='restriccionpublicidad'][value='Todo público']").prop('checked', true);
        let dataTableInitialized = false; // Variable para verificar si la tabla ya se ha inicializado
        
   
        obtenerEmpresasPorPersona();
        obtenerPlane();
        obtenerPlanes();
        obtenerPersonas();
        ListarContratos();
    });

    var currentDate = new Date();
// Set the time part of the date to midnight
currentDate.setHours(0, 0, 0, 0);

// Set the min attribute of the date input to the current date
$('#fechainicio').attr('min', currentDate.toISOString().split('T')[0]);
$('#fechainicio-actualizar').attr('min', currentDate.toISOString().split('T')[0]);
$('#fechafin').attr('min', currentDate.toISOString().split('T')[0]);
$('#fechafin-actualizar').attr('min', currentDate.toISOString().split('T')[0]);
    

    // Agrega un evento de clic al botón de registrar contrato dentro del modal
    $("#btn-registrar-contrato-modal").click(function() {
        RegistrarContrato();
    });

     // Agrega un evento de clic para los botones de editar
    $(document).on("click", ".btn-editar", function() {
        var idcontrato = $(this).data("idcontrato");
        obtenerContrato(idcontrato);
    });

    // Agrega un evento de clic para el botón de actualizar cliente dentro del modal
    $("#btn-actualizar-contrato-modal").click(function() {
        actualizarContrato();
    });
   

    function ListarContratos() {
        $('#myTablita').DataTable().destroy();

        $.ajax({
            url: '../controllers/CContrato.php',
            type: 'POST',
            data: {
                operacion: 'listar'
            },
            dataType: 'JSON',
            success: function(result) {
                let html = ""

                $.each(result, function(key, value) {
                    html += "<tr>"
                    html += "<td>" + (key + 1) + "</td>"
                    html += "<td>" + value.usuario + "</td>"
                    html += "<td>" + value.persona + "</td>"
                    html += "<td>" + value.empresa + "</td>"
                    html += "<td>" + value.servicio + "</td>"
                    html += "<td>" + value.plan + "</td>"
                    html += "<td>" + value.precio + "</td>"
                  //html += "<td>" + value.duracionspot + "</td>"
                    html += "<td>" + value.fechainicio + "</td>"
                    html += "<td>" + value.fechafin + "</td>"
                    html += "<td>" + value.observaciones + "</td>"
                    html += "<td>" + value.restriccionpublicidad + "</td>"
                    // Agregar botón de eliminar con un atributo data-* para almacenar el ID del contrato
                    html += "<td><button class='btn btn-danger btn-eliminar' data-idcontrato='" + value.idcontrato + "'> <i class='fas fa-trash'></button></td>"
                    html += "<td><button class='btn btn-success btn-editar' data-idcontrato='" + value.idcontrato + "' data-toggle='modal' data-target='#modal-actualizar-contrato'> <i class='fas fa-pencil-alt'></i></button></td>"
                    html += "<td><button class='btn btn-primary' onclick='irDetalleContrato("+ value.idcontrato +")'>Agregar Horario</button></td>"
                    html += "<td><button class='btn btn-dark' onclick='irPagosContrato("+ value.idcontrato +")'>Agregar Pagos</button></td>"
                    html += "</tr>"
                })
                
                $("#tbody-contratos").html(html);

                $('#myTablita').DataTable();
                
                // Agregar un evento de clic para los botones de eliminar (delegación de eventos)
                $(document).on("click", ".btn-eliminar", function() {
                    var idcontrato = $(this).data("idcontrato");
                    // Llamar a la función para eliminar el contrato
                    eliminarContrato(idcontrato);
                });
            }
        });
    }

    function irDetalleContrato(idcontrato){
        console.log(idcontrato);

        window.location.href = "detallecontrato.php?idcontrato=" + idcontrato;
    }    

    function irPagosContrato(idcontrato){
        console.log(idcontrato);

        window.location.href = "pagoscontrato.php?idcontrato=" + idcontrato;
    }  

    function eliminarContrato(idcontrato) {
    // Utiliza SweetAlert para mostrar un cuadro de confirmación
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción no se puede revertir. ¿Quieres eliminar este contrato?',
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
                url: '../controllers/CContrato.php',
                type: 'POST',
                data: {
                    operacion: 'eliminar',
                    idcontrato: idcontrato
                },
                success: function (response) {
                    // Verifica si la eliminación fue exitosa
                    if (response.trim() === '') {
                        // Utiliza SweetAlert para mostrar el mensaje de éxito
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'Contrato eliminado correctamente.',
                        });
                        // Vuelve a listar los contratos después de eliminar uno
                        ListarContratos();
                    } else {
                        // Si la eliminación no fue exitosa, muestra un mensaje de error
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'No se puede eliminar el contrato porque existen registros en Horarios o Pagos.',
                        });
                    }
                }
            });
        }
    });
}

    function RegistrarContrato() {
        // Obtén los valores del formulario de registro
        let idusuario = $("#idusuario").val();
        let iddetalle = $("#iddetalle-empresa").val();  
        let idservicio = $("#idservicio").val();
        let idplan = $("#idplan").val();
        let fechainicio = $("#fechainicio").val();
        let fechafin = $("#fechafin").val();
        let observaciones = $("#observaciones").val();
        let restriccionpublicidad = $("input[id='restriccionpublicidad']:checked").val();
        //debugger;
        if (iddetalle.trim() === '' || idservicio.trim() === '' || idplan.trim() === '' || fechainicio.trim() === '' || fechafin.trim() === '') {
             // Utiliza SweetAlert para mostrar el mensaje de error
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, complete todos los campos del formulario.',
        });
        return;
     }
        
        $.ajax({
            url: '../controllers/CContrato.php',
            type: 'POST',
            data: {
                operacion: 'registrar',
                idusuario: idusuario,
                iddetalle: iddetalle,
                idservicio: idservicio,
                idplan: idplan,
                fechainicio: fechainicio,
                fechafin: fechafin,
                observaciones: observaciones,
                restriccionpublicidad: restriccionpublicidad // Añade la restricción de publicidad seleccionada al envío de datos
            },
            success: function(response) {
                console.log(response);
            // Utiliza SweetAlert para mostrar el mensaje de éxito
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Contrato registrado correctamente.',
            });

                $("#formulario-registrar-contrato")[0].reset();
                $("#modal-registrar-contrato").modal("hide");
                $("#btn-registrar-contrato-close").click();
                $(".modal-backdrop.show").css("display","none");
                //    alert("Guardado correctamente");
                //$('#myTablita').DataTable().destroy();
                // Vuelve a listar los contratos para mostrar el nuevo contrato registrado
                ListarContratos();
            },error: function(XMLHttpRequest, textStatus, errorThrown) { 
                debugger;
                console.log("Status: " + textStatus); console.log("Error: " + errorThrown); 
            }  
        });
    }
    

    function obtenerContrato(idcontrato) {
    $.ajax({
        url: '../controllers/CContrato.php',
        type: 'POST',
        data: {
            operacion: 'obtener',
            idcontrato: idcontrato
        },
        dataType: 'JSON',
        success: function(response) {
            $("#idcontrato").val(response.idcontrato);
            $("#idusuario-actualizar").val(response.idusuario);
            $("#idpersona-actualizar").val(response.nombre_persona);
            $("#idempresa-actualizar").val(response.nombre_empresa);
            $("#idservicio-actualizar").val(response.idservicio);
            $("#idplan-actualizar").val(response.idplan);
            $("#fechainicio-actualizar").val(response.fechainicio);
            $("#fechafin-actualizar").val(response.fechafin);
            $("#observaciones-actualizar").val(response.observaciones);

              // Seleccionar la restricción de publicidad correcta
              $("input[name='restricciones-actualizar'][value='" + response.restriccionpublicidad + "']").prop('checked', true);

            $("#modal-actualizar-contrato").modal("show");
        }
    });
}


    function actualizarContrato() {
        let idcontrato = $("#idcontrato").val();
        let idusuario = $("#idusuario-actualizar").val();
     // let iddetalle = $("#idpersona-actualizar").val();
       // let iddetalle = $("#idempresa-actualizar").val();
        let idservicio = $("#idservicio-actualizar").val();
        let idplan = $("#idplan-actualizar").val();
        let fechainicio = $("#fechainicio-actualizar").val();
        let fechafin = $("#fechafin-actualizar").val();
        let observaciones = $("#observaciones-actualizar").val();
        let restriccionpublicidad = $("input[id='restriccionpublicidad-actualizar']:checked").val();

        if (idservicio.trim() === '' || idplan.trim() === '' || fechainicio.trim() === '' || fechafin.trim() === '') {
             // Utiliza SweetAlert para mostrar el mensaje de error
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, complete todos los campos del formulario.',
        });
        return;
     }

        $.ajax({
            url: '../controllers/CContrato.php',
            type: 'POST',
            data: {
                operacion: 'actualizar',
                idcontrato: idcontrato,
                idusuario: idusuario,
              //idpersona: idpersona,
               // iddetalle: iddetalle,
                idservicio: idservicio,
                idplan: idplan,
                fechainicio: fechainicio,
                fechafin: fechafin,
                observaciones: observaciones,
                restriccionpublicidad: restriccionpublicidad
            },
            success: function(response) {
            // Utiliza SweetAlert para mostrar el mensaje de éxito
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Contrato actualizado correctamente.',
            });

                $("#formulario-actualizar-contrato")[0].reset();
                $("#modal-actualizar-contrato").modal("hide");
                $(".modal-backdrop.show").css("display","none");
                ListarContratos();
            }
        });
    }


    function obtenerPlanes() {
        $.ajax({
            url: '../controllers/CContrato.php',
            type: 'POST',
            data: {
                operacion: 'obtenerPlanes'
            },
            dataType: 'JSON',
            success: function(planes) {
                let options = '<option value="">Seleccione</option>';
                planes.forEach(function(plan) {
                   // options += '<option value="' +  '"></option>';
                    options += '<option value="' + plan.idplan + '">' + plan.plane + '</option>';
                });
               
                $('#idplan').html(options);


                $('#idplan').on('change', function() {
                    if ($(this).val() === 'nueva') {
                        $('#modal-registrar-contrato').modal('hide'); // Oculta el modal actual
                        $('#modal-agregar-plan').modal('show'); // Muestra un nuevo modal para agregar una nueva persona
                    }
                });
            }   
        });
    }

    function obtenerPlane() {
        $.ajax({
            url: '../controllers/CContrato.php',
            type: 'POST',
            data: {
                operacion: 'obtenerPlanes'
            },
            dataType: 'JSON',
            success: function(planes) {
                let options = '';
                //let options = '<option value="">Seleccione</option>';
                planes.forEach(function(plan) {
                    options += '<option value="' + plan.idplan + '">' + plan.plane + '</option>';
                });
               
                $('#idplan-actualizar').html(options);


                $('#idplan').on('change', function() {
                    if ($(this).val() === 'nueva') {
                        $('#modal-actualizar-contrato').modal('hide'); // Oculta el modal actual
                        $('#modal-agregar-plan').modal('show'); // Muestra un nuevo modal para agregar una nueva persona
                    }
                });
            }   
        });
    }

    function obtenerPersonas() {
    $.ajax({
        url: '../controllers/CContrato.php',
        type: 'POST',
        data: {
            operacion: 'obtenerPersonas'
        },
        dataType: 'JSON',
        success: function(personas) {
            let options = '<option value="" disabled selected></option>';
            personas.forEach(function(persona) {
               //options += '<option value="' +  '"></option>';
                options += '<option value="' + persona.idpersona + '">' + persona.nombre + '</option>';
            });

            $('#iddetalle').html(options);

            $('#iddetalle').on('change', function() {
                if ($(this).val() !== 'nueva') {
                    let selectedPersona = $(this).val();
                    obtenerEmpresasPorPersona(selectedPersona); 
            
                }
            });
        }
    });
}

function obtenerEmpresasPorPersona(idpersona) {
    $.ajax({
        url: '../controllers/CContrato.php',
        type: 'POST',
        data: {
            operacion: 'obtenerEmpresasPorPersona',
            idpersona: idpersona
        },
        dataType: 'JSON',
        success: function(empresas) {
            let options = '';
            empresas.forEach(function(empresa) {
                options += '<option value="' + empresa.iddetalle + '">' + empresa.nombre_empresa + '</option>';
            });

            $('#iddetalle-empresa').html(options);

            $('#iddetalle-empresa').on('change', function() {
              
                let selectedEmpresa = $(this).val();
              
            });
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