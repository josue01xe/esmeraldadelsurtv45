<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: ../views/login.php');
    exit();
}
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Sistema Contratos">
    <title>Sistema Contratos</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->


    <header class="app-header">
    <!-- Navbar Left Menu (Logo + Sidebar toggle button) -->
    <a class="app-header__logo" href="">
        <img src="../fpdf/EDS PNG 02.png" alt="">
        Canal 45
        <!-- Sidebar toggle button -->
        <span class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></span>
    </a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <!-- User Menu-->
    </ul>
</header>

<style>
  .app-header__logo img {
    width: 40px; /* ajusta el ancho según tus necesidades */
    height: auto;
    margin-right: 10px; /* opcional: ajusta el margen derecho */
    margin-top: -15px;
}
</style>

<?php
require_once 'nav.php';
?>