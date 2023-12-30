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
                        <h4 class="card-title">Lista de Persona - Empresa</h4>
                        <button type="button" id="registro" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modal-registrar-detalledeempresa">
                            <i class="fa fa-plus"></i>
                            Registro de Persona-Empresa
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dtTabla" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>                     
                            <th scope="col">Persona</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-detalledeempresa">
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
<div class="modal fade" id="modal-registrar-detalledeempresa" tabindex="-1" role="dialog" aria-labelledby="modal-registrar-detalledeempresa-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-registrar-detalledeempresa-label">Registrar Persona-Empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de registro de clientes -->
                <form id="formulario-registrar-detalledeempresa">
                <!--<input id="idpersona" type="text" class="d-none" value="">-->
                    <div class="form-group">
                        <label for="idpersona">Persona:</label>
                        <select class="form-control ejemplo-select2" id="idpersona" name="state">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idempresa">Empresa:</label>
                        <select class="form-control ejemplo-select2" id="idempresa" name="state">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn-registrar-detalledeempresa-modal">Registrar</button>
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

<script>
    $(document).ready(function() {

        $('#modal-registrar-detalledeempresa').on('shown.bs.modal', function () {
         //   setTimeout(() => {
                $('#idpersona').select2({
                    dropdownParent: $('#modal-registrar-detalledeempresa')
                });   
           // }, 1000);
        });

        $('#modal-registrar-detalledeempresa').on('shown.bs.modal', function () {
          //  setTimeout(() => {
                $('#idempresa').select2({
                    dropdownParent: $('#modal-registrar-detalledeempresa')
                });   
            //}, 1000);
        });

        obtenerEmpresas();
        obtenerPersonas();
        ListarDetalledeEmpresa();

        
        // Agrega un evento de clic al botón de registrar cliente dentro del modal
        $("#btn-registrar-detalledeempresa-modal").click(function() {
            RegistrarDetalledeEmpresa();
        });
    });

    function ListarDetalledeEmpresa() {
        $.ajax({
            url: '../controllers/CDetalledeEmpresa.php',
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
                    html += "<td>" + value.nombre_persona + "</td>"
                    html += "<td>" + value.nombre_empresa + "</td>"
                 //   html += "<td>" + value.inactive_at + "</td>"
                    html += "<td><button class='btn btn-danger btn-eliminar' data-iddetalle='" + value.iddetalle + "'><i class='fas fa-trash'></button></td>"
                   // html += "<td><button class='btn btn-success btn-editar' data-iddetalle='" + value.iddetalle + "'>Editar</button></td>"
                    html += "</tr>"
                })

                $("#tbody-detalledeempresa").html(html)
                $('#dtTabla').DataTable();
                // Agregar un evento de clic para los botones de eliminar (delegación de eventos)
                $(document).on("click", ".btn-eliminar", function() {
                    var iddetalle = $(this).data("iddetalle");
                    eliminarDetalledeEmpresa(iddetalle);
                });
            }
        });
    }

    function eliminarDetalledeEmpresa(iddetalle) {
    // Utiliza SweetAlert para mostrar un cuadro de confirmación
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción no se puede revertir. ¿Quieres eliminar este registro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
        $.ajax({
            url: '../controllers/CDetalledeEmpresa.php',
            type: 'POST',
            data: {
                operacion: 'eliminar',
                iddetalle: iddetalle
            },
            success: function(response) {
                  // Utiliza SweetAlert para mostrar el mensaje de éxito
                  Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Registro eliminado correctamente.',
                    });
                ListarDetalledeEmpresa();
            }
        });
      }
  });
}

    function RegistrarDetalledeEmpresa() {
        let idpersona = $("#idpersona").val();
        let idempresa = $("#idempresa").val();

        if (idpersona.trim() === '' || idempresa.trim() === '') {
        // Utiliza SweetAlert para mostrar el mensaje de error
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, complete todos los campos del formulario.',
        });
      return;
    }
        $.ajax({
            url: '../controllers/CDetalledeEmpresa.php',
            type: 'POST',
            data: {
                operacion: 'registrar',
                idpersona: idpersona,
                idempresa: idempresa
            },
            success: function(response) {
               // Utiliza SweetAlert para mostrar el mensaje de éxito
               Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Registrado correctamente.',
                });

                $("#formulario-registrar-detalledeempresa")[0].reset();
                $("#modal-registrar-detalledeempresa").modal("hide");
                $("#btn-registrar-detalledeempresa-close").click();
                $(".modal-backdrop.show").css("display","none");
                ListarDetalledeEmpresa();
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
                options += '<option value="' + persona.idpersona + '">' + persona.nombre + '</option>';
                });
               
                $('#idpersona').html(options);


                $('#idpersona').on('change', function() {
                    if ($(this).val() === 'nueva') {
                        $('#modal-registrar-detalledeempresa').modal('hide'); // Oculta el modal actual
                        $('#modal-agregar-persona').modal('show'); // Muestra un nuevo modal para agregar una nueva persona
                    }
                });
            }   
        });
    }

    function obtenerEmpresas() {
        $.ajax({
            url: '../controllers/CContrato.php',
            type: 'POST',
            data: {
                operacion: 'obtenerEmpresas'
            },
            dataType: 'JSON',
            success: function(empresas) {
                let options = '<option value="" disabled selected></option>';
                empresas.forEach(function(empresa) {
                options += '<option value="' + empresa.idempresa + '">' + empresa.nombre_empresa + '</option>';
                });
               
                $('#idempresa').html(options);


                $('#idempresa').on('change', function() {
                    if ($(this).val() === 'nueva') {
                        $('#modal-registrar-detalledeempresa').modal('hide'); // Oculta el modal actual
                        $('#modal-agregar-empresa').modal('show'); // Muestra un nuevo modal para agregar una nueva persona
                    }
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