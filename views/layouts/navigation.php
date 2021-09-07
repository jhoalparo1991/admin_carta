<?php if(!isset($_SESSION["id"])){ Redirect::to("home/index");}?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?=NAME_APP ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Productos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?=URL?>/menu/listados">Menu</a></li>
            <li><a class="dropdown-item" href="<?=URL?>/categorias/index">Categorias</a></li>
            <li><a class="dropdown-item" href="<?=URL?>/articulos/index">Articulos</a></li>
            <li><a class="dropdown-item" href="<?=URL?>/productos/index">Productos</a></li>
            <li><a class="dropdown-item" href="<?=URL?>/slide/index">Slider</a></li>
            <li><a class="dropdown-item" href="<?=URL?>/ofertas/index">Promociones</a></li>

          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkEmpresa" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Empresa
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkEmpresa">
            <li><a class="dropdown-item" href="<?=URL?>/usuarios/index">Usuarios</a></li>
            <li><a class="dropdown-item" href="<?=URL?>/sedes/index">Sucursales</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkConfig" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Configuraciones
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkConfig">
          <li><a class="dropdown-item" href="#"><?=ucwords(Sessions::getSession("nombres")) . ' ' . ucwords(Sessions::getSession("apellidos"))?></a></li>
            <li><a class="dropdown-item" href="#"><?=ucwords(Sessions::getSession("rol"))?></a></li>
            <li><a class="dropdown-item" href="<?=URL?>/usuarios/logout">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container py-4">

