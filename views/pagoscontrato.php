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
                <!--<h4 class="page-title">Pagoscontrato</h4>-->
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Lista de Pagos</h4>
                        <button type="button" id="registropc" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modal-registrar-pagoscontrato">
                            <i class="fa fa-plus"></i>
                            Registro de Pagos
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="pcTabla" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                            <th scope="col">#</th>
                            <th scope="col">Persona</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Tipopago</th>
                            <th scope="col">deuda</th>
                            <th scope="col">monto</th>
                            <th scope="col">amortizacion</th>
                            <th scope="col">saldo</th>
                            <th scope="col">fechapago</th>
                            <th scope="col">descripcion</th>
                           
                            <th scope="col">Estado</th>
                            <th scope="col">Eliminar</th>
                            <?php
// Verificar si el nivel de acceso es
if ($_SESSION['nivel_acceso'] === 'Gerente') {
    echo "<th scope='col'>Editar</th>";
}
?>
                                </tr>
                            </thead>
                            <tbody id="tbody-pagoscontrato">
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
<div class="modal fade" id="modal-registrar-pagoscontrato" tabindex="-1" role="dialog" aria-labelledby="modal-registrar-pagoscontrato-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-registrar-pagoscontrato-label">Registrar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de registro de clientes -->
                <form id="formulario-registrar-pagoscontrato">
                <!--<input id="idpersona" type="text" class="d-none" value="">-->
                    <div class="form-group">
                        <input type="text" id="idcontrato" class="d-none">
                    </div>
                    <div class="form-group">
                        <label for="tipopago">Tipopago:</label>
                        <select id="tipopago" class="form-control form-select-sm">
                            <option value="">Seleccione</option>
                            <option value="Efectivo">Efectivo</option>
                            <option value="Tarjeta o Transferencia Bancaria">Tarjeta o Transferencia Bancaria</option>
                            <option value="Yape">Yape</option>
                            <option value="Plin">Plin</option>
                            <option value="Google Pay">Google Pay</option>
                        </select>
                    </div>
                <!-- <div class="form-group">
                    <label for="deuda">Deuda:</label>
                    <input type="text" class="form-control" id="deuda" name="deuda" required>
                    </div>-->
                    <div class="form-group">
                       <label for="monto">Monto:</label>
                       <input type="number" class="form-control" id="monto" name="monto" required>
                    </div>
                   <!-- <div class="form-group">
                        <input type="text" class="d-none" id="amortizacion" name="amortizacion" required>
                    </div>-->
                  <!--  <div class="form-group">
                        <input type="text" class="d-none" id="saldo" name="saldo" required>
                    </div>-->
                  <!-- <div class="form-group">
                        <label for="fechapago">Fechapago:</label>
                        <input type="date" class="form-control" id="fechapago" name="fechapago" required>
                    </div>-->
                    <div class="form-group">
                        <label for="descripcion">Descripcion:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" maxlength="100" required>
                    </div>
                  
                    <!--<div class="form-group">
                        <input type="text" class="d-none" id="estado" name="estado" required>
                    </div>-->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn-registrar-pagoscontrato-modal">Registrar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal para actualizar contratos -->
<div class="modal fade" id="modal-actualizar-pagoscontrato" tabindex="-1" role="dialog" aria-labelledby="modal-actualizar-pagoscontrato-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-actualizar-pagoscontrato-label">Actualizar Pagos Contrato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de actualización de contratos -->
                <form id="formulario-actualizar-pagoscontrato">
                <input id="idpago" type="text" class="d-none" value="" name="idpago">
                 
                <div class="form-group">
                        <input type="text" id="idcontrato-actualizar" class="d-none">
                    </div>
                    <div class="form-group">
                        <label for="tipopago-actualizar">Tipopago:</label>
                        <select id="tipopago-actualizar" class="form-control form-select-sm">
                            <option value="">Seleccione</option>
                            <option value="Efectivo">Efectivo</option>
                            <option value="Tarjeta o Transferencia Bancaria">Tarjeta o Transferencia Bancaria</option>
                            <option value="Yape">Yape</option>
                            <option value="Plin">Plin</option>
                            <option value="Google Pay">Google Pay</option>
                        </select>
                    </div>
                <!-- <div class="form-group">
                    <label for="deuda">Deuda:</label>
                    <input type="text" class="form-control" id="deuda" name="deuda" required>
                    </div>-->
                    <div class="form-group">
                        <label for="monto-actualizar">Monto:</label>
                        <input type="number" class="form-control" id="monto-actualizar" name="monto-actualizar" required>
                    </div>
                   <!-- <div class="form-group">
                        <input type="text" class="d-none" id="amortizacion" name="amortizacion" required>
                    </div>-->
                  <!--  <div class="form-group">
                        <input type="text" class="d-none" id="saldo" name="saldo" required>
                    </div>-->
                  <!-- <div class="form-group">
                        <label for="fechapago">Fechapago:</label>
                        <input type="date" class="form-control" id="fechapago" name="fechapago" required>
                    </div>-->
                    <div class="form-group">
                        <label for="descripcion-actualizar">Descripcion:</label>
                        <input type="text" class="form-control" id="descripcion-actualizar" name="descripcion-actualizar" maxlength="100" required>
                    </div>
                  
                    <!--<div class="form-group">
                        <input type="text" class="d-none" id="estado" name="estado" required>
                    </div>-->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn-actualizar-pagoscontrato-modal">Actualizar</button>
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
// Recuperar id de la URL
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const urlidcontrato = urlParams.get('idcontrato')

$(document).ready(function() {
    $("#registropc").click(function(){
        let tipopago = $("#tipopago").val("");
            let monto = $("#monto").val("");
            let descripcion = $("#descripcion").val("");
        })

    let dataTableInitial = false; // Variable para verificar si la tabla ya se ha inicializado
    $("#idcontrato").val(urlidcontrato);
    console.log(urlidcontrato);

    ListarPagosContrato(urlidcontrato);

        // Función para validar que el valor sea un número mayor o igual a cero
        function esNumeroMayorOIgualACero(valor) {
        return !isNaN(parseFloat(valor)) && parseFloat(valor) >= 0;
    }

    // Agrega un evento de clic al botón de registrar contrato dentro del modal
    $("#btn-registrar-pagoscontrato-modal").click(function() {
        // Obtener el valor del campo de monto
        var monto = $("#monto").val();

        // Validar que el monto sea un número mayor o igual a cero
        if (!esNumeroMayorOIgualACero(monto)) {
        // Utiliza SweetAlert para mostrar el mensaje de error
                Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, ingrese un monto válido mayor o igual a cero.',
        });
        return;
    }
        // Llamar a la función para registrar el pago del contrato
        RegistrarPagosContrato();
    });

    // Agrega un evento de clic para los botones de editar
    $(document).on("click", ".btn-editar", function() {
        var idpago = $(this).data("idpago");
        obtenerPagosContrato(idpago);
    });

    // Agrega un evento de clic para el botón de actualizar cliente dentro del modal
    $("#btn-actualizar-pagoscontrato-modal").click(function() {
        // Obtener el valor del campo de monto actualizar
        var montoActualizar = $("#monto-actualizar").val();

        // Validar que el monto sea un número mayor o igual a cero
        if (!esNumeroMayorOIgualACero(montoActualizar)) {
        // Utiliza SweetAlert para mostrar el mensaje de error
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, ingrese un monto válido mayor o igual a cero.',
        });
        return;
    }

        // Llamar a la función para actualizar el pago del contrato
        actualizarPagosContrato();
    });


        function ListarPagosContrato(idcontrato) {
            $('#pcTabla').DataTable().destroy();
            
            $.ajax({
                url: '../controllers/CPagosContrato.php',
                type: 'POST',
                data: {
                    operacion: 'listar',
                    idcontrato: idcontrato
                },
                dataType: 'JSON',
                success: (result) => {
                    console.log(result);
                    let html = "";
                    let amortizacion = 0;
                    let saldo = 0;
                    
                    $.each(result, function(key, value) {
                        amortizacion += parseFloat(value.monto);
                        saldo = parseFloat(value.idplan) - amortizacion;

                        html += "<tr>";
                        html += "<td>" + (key + 1) + "</td>";
                        html += "<td>" + value.persona + "</td>";
                        html += "<td>" + value.empresa + "</td>";
                        html += "<td>" + value.tipopago + "</td>";
                        html += "<td>" + value.idplan + "</td>";
                        html += "<td>" + value.monto + "</td>";
                        html += "<td>" + amortizacion.toFixed(2) + "</td>";
                        html += "<td>" + saldo.toFixed(2) + "</td>";
                        html += "<td>" + value.fechapago + "</td>";
                        html += "<td>" + value.descripcion + "</td>";
                        if(saldo == 0)
                            html += "<td>completado</td>";
                        else
                            html += "<td>pendiente</td>";
                        html += "<td><button class='btn btn-danger btn-eliminar' data-idpago='" + value.idpago + "'><i class='fas fa-trash'></button></td>";
     // Verificar el nivel de acceso y agregar el botón de editar si es 'ADM'
     if ('<?php echo $_SESSION['nivel_acceso']; ?>' === 'Gerente') {
                    html += "<td><button class='btn btn-success btn-editar' data-idpago='" + value.idpago + "' data-toggle='modal' data-target='#modal-actualizar-pagoscontrato'><i class='fas fa-pencil-alt'></button></td>";
                }
                

                html += "</tr>";

                        //actualizarPagosContrato()
                    });

                    $("#tbody-pagoscontrato").html(html);
               
                    $('#pcTabla').DataTable();

                    // Agregar un evento de clic para los botones de eliminar (delegación de eventos)
                    $(document).on("click", ".btn-eliminar", function() {
                        var idpago = $(this).data("idpago");
                        // Llamar a la función para eliminar el contrato
                        eliminarPagosContrato(idpago);
                    });
                }
            });
        }

        function eliminarPagosContrato(idpago) {
    // Utiliza SweetAlert para mostrar un cuadro de confirmación
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción no se puede revertir. ¿Quieres eliminar este pago?',
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
                url: '../controllers/CPagosContrato.php',
                type: 'POST',
                data: {
                    operacion: 'eliminar',
                    idpago: idpago
                },
                success: function(response) {
                      // Utiliza SweetAlert para mostrar el mensaje de éxito
                      Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Pago eliminado correctamente.',
                    });
                    // Vuelve a listar los contratos después de eliminar uno
                    ListarPagosContrato(urlidcontrato);
                }
            });
        }
    });
}

        function RegistrarPagosContrato() {
            // Obtén los valores del formulario de registro
            let idcontrato = $("#idcontrato").val();
            let tipopago = $("#tipopago").val();
            //let deuda = $("#deuda").val();
            //let idplan = $("#idplan").val();
            let monto = $("#monto").val();
            //let amortizacion = $("#amortizacion").val();
            //let saldo = $("#saldo").val();
            //let fechapago = $("#fechapago").val();
            let descripcion = $("#descripcion").val();
            //let estado = $("#estado").val();

            if (tipopago.trim() === '' || monto.trim() === '') {
        // Utiliza SweetAlert para mostrar el mensaje de error
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, complete todos los campos del formulario.',
        });
        return;
    }
            $.ajax({
                url: '../controllers/CPagosContrato.php',
                type: 'POST',
                data: {
                    operacion: 'registrar',
                    idcontrato: idcontrato,
                    tipopago: tipopago,
                    //deuda: deuda,
                    //idplan: idplan,
                    monto: monto,
                    //amortizacion: amortizacion,
                    //saldo: saldo,
                    //fechapago: fechapago,
                    descripcion: descripcion,
                    //estado:   estado
                },
                success: function(response) {
            // Utiliza SweetAlert para mostrar el mensaje de éxito
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Pago registrado correctamente.',
            });
                    // Limpia los campos de entrada después del registro
                    //$("#formulario-registrar-pagoscontrato")[0].reset();
                    limpiarcampo();
                  // Cierra el modal
                  $("#modal-registrar-pagoscontrato").modal("hide");
                $("#btn-registrar-pagoscontrato-close").click();
                $(".modal-backdrop.show").css("display","none");
                   // $('#dcTabla').DataTable().destroy();
                    // Vuelve a listar los contratos para mostrar el nuevo contrato registrado
                    ListarPagosContrato(urlidcontrato);
                }
            });
        }


        function limpiarcampo(){
            let tipopago = $("#tipopago").val("");
            //let deuda = $("#deuda").val();
            //let idplan = $("#idplan").val();
            let monto = $("#monto").val("");
            //let amortizacion = $("#amortizacion").val();
            //let saldo = $("#saldo").val();
            //let fechapago = $("#fechapago").val();
            let descripcion = $("#descripcion").val("");
    } 

        function obtenerPagosContrato(idpago) {
        $.ajax({
            url: '../controllers/CPagosContrato.php',
            type: 'POST',
            data: {
                operacion: 'obtener',
                idpago: idpago
            },
            dataType: 'JSON',
            success: function(response) {
                $("#idpago").val(response.idpago);
              //  $("#idpersona-actualizar").val(response.idpersona);
               // $("#idempresa-actualizar").val(response.idempresa);
               $("#idcontrato-actualizar").val(response.idcontrato);
                $("#tipopago-actualizar").val(response.tipopago);
                $("#monto-actualizar").val(response.monto);
                $("#descripcion-actualizar").val(response.descripcion);
                //$("#fecha-actualizar").val(response.fecha);
                //$("#observaciones-actualizar").val(response.observaciones);
                $("#modal-actualizar-pagoscontrato").modal("show");
            }
        });
    }

    function actualizarPagosContrato() {
        let idpago = $("#idpago").val();
            let tipopago = $("#tipopago-actualizar").val();
            //let deuda = $("#deuda").val();
            //let idplan = $("#idplan").val();
            let monto = $("#monto-actualizar").val();
            //let amortizacion = $("#amortizacion").val();
            //let saldo = $("#saldo").val();
            //let fechapago = $("#fechapago").val();
            let descripcion = $("#descripcion-actualizar").val();
            //let estado = $("#estado").val();

    if (tipopago.trim() === '' || monto.trim() === '') {
        // Utiliza SweetAlert para mostrar el mensaje de error
       Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, complete todos los campos del formulario.',
        });
        return;
    }

        $.ajax({
            url: '../controllers/CPagosContrato.php',
            type: 'POST',
            data: {
                operacion: 'actualizar',
                idpago: idpago,
                //idpersona: idpersona,
                //idempresa: idempresa,
                tipopago: tipopago,
                monto: monto,
                descripcion: descripcion
            },
            success: function(response) {
            // Utiliza SweetAlert para mostrar el mensaje de éxito
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Pago actualizado correctamente.',
            });
                $("#formulario-actualizar-pagoscontrato")[0].reset();
                $("#modal-actualizar-pagoscontrato").modal("hide");
                $(".modal-backdrop.show").css("display","none");
                ListarPagosContrato(urlidcontrato);
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