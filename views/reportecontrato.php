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
                <!--<h4 class="page-title">Reportes</h4>-->
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Lista de Contratos</h4>
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
                                    <th scope="col">Reportes</th>
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



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Agrega el enlace al archivo CSS de DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

<!-- Agrega jQuery y DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


 <!-- Enlace a FontAwesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script>

    $(document).ready(function() {   
        //  $('.form-select form-select-sm').select2();
  
    
     //$("input[id='restriccionpublicidad'][value='Todo público']").prop('checked', true);
        let dataTableInitialized = false; // Variable para verificar si la tabla ya se ha inicializado
        
        ListarContratos();
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
                    //html += "<td><button class='btn btn-danger btn-eliminar' data-idcontrato='" + value.idcontrato + "'> <i class='fas fa-trash'></button></td>"
                    html += "<td><div class='text-right mb-2'><a href='../fpdf/ReporteContrato.php?idcontrato=" + value.idcontrato + "' target='_blank' class='btn btn-success'><i class='fas fa-file-pdf'></i> Generar reportes</a></div></td>";
                    //html += "<td><div class='text-right mb-2'><a href='../fpdf/ReporteContrato.php?idcontrato=" + value.idcontrato + "&idpago=" + value.idpago + "' target='_blank' class='btn btn-success'><i class='fas fa-file-pdf'></i> Generar reportes</a></div></td>";
                    html += "</tr>"
                })
                
 

                $("#tbody-contratos").html(html);

                $('#myTablita').DataTable();
                
                // Agregar un evento de clic para los botones de eliminar
                $(".btn-eliminar").click(function() {
                    var idcontrato = $(this).data("idcontrato");
                    // Llamar a la función para eliminar el contrato
                    eliminarContrato(idcontrato);
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