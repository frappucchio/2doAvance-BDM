<?php
session_start();
ob_start();
if (isset($_SESSION['Usuario'])) {

  //$_SESSION['Usuario']= $usuarioLogeado->getId_Usuario();
  $idUsuarioLogeado = $_SESSION['Usuario'];
  $usuarioLogeado = Usuarios_DAO::GetUserById($idUsuarioLogeado);
}else{
  
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="/proyecto_bdm/View/Plugins/css/bootstrap.min.css">
  <link rel="stylesheet" href="/proyecto_bdm/View/Plugins/css/owl.carousel.css">
  <link rel="stylesheet" href="/proyecto_bdm/View/Plugins/css/owl.theme.default.css">
  <!-- <link rel="stylesheet" href="View/CSS/landingPage.css"> -->
</head>

<body>

  <!--HEADER-->
  <header id="topbar" class="d-flex align-items-center p-2">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><span>caravaggioshop@gmail.com</span></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="facebook"><img src="/proyecto_bdm/View/img/facebook.png" /></a>
        <a href="#" class="twitter"><img src="/proyecto_bdm/View/img/twitter.png" /></a>
        <a href="#" class="instagram"><img src="/proyecto_bdm/View/img/instagram.png" /></a>
        <a href="#" class="linkedin"><img src="/proyecto_bdm/View/img/linkedin.png" /></a>
      </div>
      <div class="dropdown text-end">
        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <?php if (isset($_SESSION['Usuario'])) : ?>
            <img src="data:image/png;base64, <?php echo base64_encode($usuarioLogeado->getImagen_Usuario()) ?>" alt="mdo" width="32" height="32" class="rounded-circle" />
          <?php endif ?>
        </a>
        <ul class="dropdown-menu text-small">
          <li>
            <a class="dropdown-item" href="<?php echo Template::Route(Usuarios_Controller::ROUTE, Usuarios_Controller::MOSTRAR_PERFIL_USUARIO); ?>">Perfil</a>
          </li>
          <li>
            <a class="dropdown-item" href="<?php echo Template::Route(Session_Controller::ROUTE, Session_Controller::CERRAR_SESION); ?>">Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    </div>
  </header>

  <!--Navbar-->
  <nav class="navbar p-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="/proyecto_bdm/View/img/logos/logo.png" width="25%" /></a>
      <form class="d-flex col-4" id="form-search" role="search">
        <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search" />

        <button class="btn btn-outline-success" id="btn-search" type="submit">
          <a href="/Pages/busqueda_Productos.html" style="text-decoration-line: none; color: white">Search</a>
        </button>
      </form>
      <a href="/Pages/carrito.html">
        <button class="btn btn-outline-success" type="submit" id="cart">
          <img src="/proyecto_bdm/View/img/carritoIcon.png" />
        </button>
      </a>
    </div>
  </nav>

  <nav class="navbar navbar-expand-lg p-2" id="nav2">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" aria-current="page" href="<?php echo Template::Route(Home_Controller::ROUTE, Home_Controller::DASHBOARD); ?>" id="componente1">Inicio</a>

            <?php if (isset($_SESSION['Usuario'])) : ?>

              <?php if($usuarioLogeado->getRol_Usuario() == 1): ?>
                <a class="nav-link" href="/Pages/mi_perfil_cliente_misCompras.html" id="componente2">Mis Compras</a>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="componente6" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Listas de Deseos
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/Pages/agregar_Listas.html">Crear lista</a></li>
                    <li><a class="dropdown-item" href="/Pages/listas_publicas.html">Listas Públicas</a></li>
                  </ul>
                </li>

              <?php elseif ($usuarioLogeado->getRol_Usuario()  == 2) : ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="componente2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mis Ventas</a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item"  href="/Pages/mi_perfil_clienVen_misVentasCD.html">Consultar</a></li>
                    </ul>
                </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="componente3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Productos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo Template::Route(Productos_Controller::ROUTE, Productos_Controller::REGISTRAR_PRODUCTO); ?>">Agregar Producto</a></li>
                        <li><a class="dropdown-item" href="<?php echo Template::Route(Categorias_Controller::ROUTE, Categorias_Controller::REGISTRAR_CATEGORIA); ?>">Agregar Categoría</a></li>
                      <li><a class="dropdown-item" href="/Pages/mi_perfil_vendedor_misProductos.html">Mis Productos</a></li>
                    </ul>
                  </li>

              <?php elseif ($usuarioLogeado->getRol_Usuario()  == 3) : ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="componente2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Mis Ventas
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item"  href="/Pages/mi_perfil_clienVen_misVentasCD.html">Consultar</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="componente3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Productos
                  </a>
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="<?php echo Template::Route(Productos_Controller::ROUTE, Productos_Controller::REGISTRAR_PRODUCTO); ?>">Agregar Producto</a></li>
                      <li><a class="dropdown-item" href="<?php echo Template::Route(Categorias_Controller::ROUTE, Categorias_Controller::REGISTRAR_CATEGORIA); ?>">Agregar Categoría</a></li>
                    <li><a class="dropdown-item" href="/Pages/mi_perfil_clienVen_misProductos.html">Mis Productos</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="componente6" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Listas de Deseos
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item"  href="/Pages/agregar_listas_comven.html">Crear lista</a></li>
                    <li><a class="dropdown-item" href="/Pages/listas_publicas_com_ven.html">Listas Públicas</a></li>
                  </ul>
                </li>
                <a class="nav-link " href="/Pages/mi_perfil_clienVen_misCompras.html" id="componente2">Mis Compras</a>

              <?php elseif ($usuarioLogeado->getRol_Usuario()  == 4) : ?>
                <a class="nav-link " href="/Pages/aprobacion.html" id="componente2">Aprobar Productos</a>

              <?php elseif ($usuarioLogeado->getRol_Usuario()  == 5) : ?>
                <a class="nav-link " href="/Pages/registroadmin.html" id="componente2">Registrar Administradores</a>
                <a class="nav-link " aria-current="page" href="/Pages/agregar_metodos_pago.html" id="componente3">Métodos de Pago</a>
              <?php endif ?>

            <?php endif ?>
          <a class="nav-link" href="/Pages/acerca.html" id="componente5">Acerca de</a>

        </div>
      </div>
    </div>
  </nav>


  <!-- CONTENIDO -->
  <?php $this->DeterminePage(); ?>


  <!-- FOOTER-->
  <footer>
    <ul class="nav justify-content-center pb-3 mb-3">
      <li class="nav-item"><a href="/Pages/dashboard.html" class="nav-link px-2 text-muted">Inicio</a></li>
      <li class="nav-item"><a href="/Pages/mi_perfil_cliente_misListas.html" class="nav-link px-2 text-muted">Listas de Deseos</a></li>
      <li class="nav-item"><a href="/Pages/mi_perfil_cliente_editarPerfil.html" class="nav-link px-2 text-muted">Mi cuenta</a></li>
      <li class="nav-item"><a href="/Pages/acerca.html" class="nav-link px-2 text-muted">Acerca de</a></li>
    </ul>
    <p class="text-center text-muted">&copy; 2022 Company, Inc</p>
  </footer>

  <!-- SCRIPTS-->
  
  <script type="text/javascript" src="/proyecto_bdm/View/Plugins/js/jquery-3.6.1.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.2/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="/proyecto_bdm/View/Plugins/js/jqueryvalidate.min.js"></script>
  <script type="text/javascript" src="/proyecto_bdm/View/Plugins/js/additional-methods.js"></script>
  <script type="text/javascript" src="/proyecto_bdm/View/Plugins//js/mdb.min.js"></script>
  <script type="text/javascript" src="/proyecto_bdm/View/JS/main.js"></script>
  <script type="text/javascript" src="/proyecto_bdm/View/JS/validation.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  

  <?php $this->CallScripts(); ?>

</body>

</html>