<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="../View/Plugins/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="../View/CSS/register.css">

  <title>Inicia Sesión</title>



</head>

<body>

  <!-- <hr id="hr1-navbar" style="color:#f2cf8d"> -->
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="../View/img/logos/logo.png" width="25%" alt="">
    </a>
    <button type="button" class="navbar-toggle d-flex align-items-center hidden-arrow  btn btn-outline-light">
      <a href="<?php echo Template::Route(Usuarios_Controller::ROUTE, Usuarios_Controller::REGISTRAR_USUARIO); ?>" style="text-decoration-line: none; color:#f2f1eb">Registrate</a>
    </button>
  </nav>
  <hr id="hr2-navbar" style="color:#f2cf8d;">

  <section class="d-flex flex-column vh-100 justify-content-center align-items-center" style="background-color: #f2f1eb; ">

    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">

      <div class="card-header col-auto text-center">

        <div class="col-auto text-center">
          <img src="../View/img/logos/icono_logo.png" width="40%" class="rounded mx-auto d-block" alt="">
        </div>

        <h1>Inicia Sesión</h1>
        <p id="Descrip_register">Bienvenido de nuevo</p>


      </div>

      <div class="card-body container-fluid">

        <form method="post" class="container-fluid" id="login_form">



          <div class="container-fluid">

            <?php if (isset($args["usuarioLogeado"]) && $args["usuarioLogeado"]->getId_Usuario() == null) : ?>
              <div class="alert alert-danger" role="alert">
                <strong>Datos de usuario incorrectos. Verifique sus datos.</strong>
              </div>
            <?php endif ?>

            <div class="form-group mb-3">
              <label class="label" for="username_input_id">Username</label>
              <input type="text" class="form-control" id="username_input_id" name="username_input_name" placeholder="Username" required="">
            </div>

            <div class="form-group mb-3">
              <label class="label" for="password_input_id">Contraseña</label>
              <input type="password" class="form-control" id="password_input_id" name="password_input_name" placeholder="Contraseña" required="">

            </div>


            <div class="d-grid gap-2 col-6 mx-auto">
              <button type="submit" class="btn btn-outline-primary" id="login_button_id" name="login_button_id" href="/Pages/dashboard.html">
                Iniciar Sesión
              </button>
            </div>

            <div class="text-center" style="margin-bottom: 1%;">
              <input class="form-check-input" type="checkbox" value="Recordarme" id="recordarme_check_id">
              <label class="form-check-label" for="recordarme_check_id" style="text-decoration-line: none; color:#ff9393">
                <h6>Recordarme</h6>
              </label>
            </div>

        </form>


        <div class="text-center">
          <h6>¿No tiene una cuenta aún?
            <a href="<?php echo Template::Route(Usuarios_Controller::ROUTE, Usuarios_Controller::REGISTRAR_USUARIO); ?>" style="text-decoration-line: none; color:#ff9393">Registrate aquí</a>
          </h6>
        </div>


      </div>

    </div>
    </div>

  </section>

  <script src="../View/Plugins/js/jquery-3.6.1.min.js"></script>
  <script src="../View/Plugins/js/jqueryvalidate.min.js"></script>
  <script src="../View/Plugins/js/additional-methods.js"></script>
  <script src="../View/JS/validation.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



</body>

</html>