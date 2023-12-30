<?php
//session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: login.php');
    exit();
}
?> 

<!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="d-flex flex-column flex-shrink-0 p-10 bg-body-tertiary" style="width: 280px;">
    <a href="../views/perfil.php" class="d-flex align-items-center mb-3 mb-md-2 me-md-auto link-body-emphasis text-decoration-none">
      <div class="app-sidebar__user"> <img src="assets/img/avatar_user.png" alt="" width="40" id="imagenPerfilMostrar" style="margin-right: 5px;">
        <div>
          <p class="app-sidebar__user-name">    <?php
        // Iniciar la sesión (si aún no se ha iniciado)
        echo $_SESSION['nombre_usuario'];
        ?></p>
        </div>
      </div>
      <ul class="app-menu">
      <li><a class="app-menu__item" href="../views/perfil.php"><i class="app-menu__icon fa fa-user-circle"></i><span class="app-menu__label">Usuario</span></a></li>
      <?php
      if ($_SESSION['nivel_acceso'] === 'Gerente') {
        echo '<li><a class="app-menu__item" href="../views/registrate.php"><i class="app-menu__icon fa fa-user-plus"></i><span class="app-menu__label">CrearUsuario</span></a></li>'; } ?>
      <li><a class="app-menu__item" href="../views/cliente.php"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Clientes</span></a></li>
      <li><a class="app-menu__item" href="../views/empresa.php"><i class="app-menu__icon fa fa-building"></i><span class="app-menu__label">Empresas</span></a></li>
      <li><a class="app-menu__item" href="../views/detalledeempresa.php"><i class="app-menu__icon fa fa-link"></i><span class="app-menu__label">Persona-Empresa</span></a></li>
      <li><a class="app-menu__item" href="../views/contrato.php"><i class="app-menu__icon fa fa-file-text-o"></i><span class="app-menu__label">Contratos</span></a></li>
      <!--<li><a class="app-menu__item" href="../views/detallecontrato.php"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Detallecontrato</span></a></li>
      <li><a class="app-menu__item" href="../views/pagoscontrato.php"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Pagoscontrato</span></a></li>-->
      <li><a class="app-menu__item" href="../views/plan.php"><i class="app-menu__icon fa fa-film"></i><span class="app-menu__label">Planes</span></a></li>
      <li><a class="app-menu__item" href="../views/reportecontrato.php"><i class="app-menu__icon fa fa-file-pdf-o"></i><span class="app-menu__label">Reportes</span></a></li>
      <li>
    <a id="cerrarsesion" class="app-menu__item" href="../controllers/CUsuario.php?operacion=finalizar">
        <i class="app-menu__icon fa fa-sign-out"></i>
        <span class="app-menu__label">Cerrar Sesión</span>
    </a>
</li>

      </ul>
    </aside>

    <!-- Script para realizar llamadas AJAX y gestionar la tabla -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        console.log("asd");
        if(localStorage.imagenperfil){
            console.log(localStorage.imagenperfil);
            $('#imagenPerfilMostrar').attr('src', localStorage.imagenperfil);
        }else{
            console.log("localstorage vacio");
            $('#imagenPerfilMostrar').attr('src', "../assets/img/avatar_user.png");
        }
    });

    function confirmarCerrarSesion() {
    // Utiliza SweetAlert para mostrar un cuadro de confirmación
    Swal.fire({
        title: '¿Estás seguro?',
        text: '¿Quieres cerrar sesión?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, cerrar sesión',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirige a la página de cierre de sesión
            window.location.href = '../controllers/CUsuario.php?operacion=finalizar';
        }
    });
}

$("#cerrarsesion").click(function (event) {
    // Previene el comportamiento predeterminado del enlace
    event.preventDefault();
    // Llama a la función de confirmación
    confirmarCerrarSesion();
    // Elimina la imagen del perfil del almacenamiento local
    localStorage.removeItem("imagenperfil");
});
</script>