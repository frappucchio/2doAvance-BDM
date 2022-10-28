<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Registrate</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="../View/Plugins/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="../View/CSS/register.css">

</head>

<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="../View/img/logos/logo.png" width="25%" alt="">
    </a>
    <button type="button" class="navbar-toggle d-flex align-items-center hidden-arrow  btn btn-outline-light">
      <a href="<?php echo Template::Route(Session_Controller::ROUTE, Session_Controller::INICIAR_SESION); ?>" style="text-decoration-line: none; color:#f2f1eb">Inicia Sesión</a>
    </button>
  </nav>
  <hr id="hr2-navbar" style="color:#f2cf8d;">
  <!-- NAVBAR -->


  <section class="d-flex flex-column vh-100 justify-content-center align-items-center" style="background-color: #f2f1eb; ">

    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">

      <div class="card-header col-auto text-center">

        <h1>Registrate<i class="fa-solid fa-circle-exclamation"></i></h1>

        <p id="Descrip_register">¿Qué tipo de usuario eres?</p>


      </div>

      <div class="card-body container-fluid">

        <form method="post" class="container-fluid" id="registro_form" enctype="multipart/form-data">

            <?php if (isset($args["result"]) && $args["result"] == false) : ?>
              <div class="alert alert-danger" role="alert">
                <strong>Username en existencia. Ingrese otro username.</strong>
              </div>
            <?php endif ?>

          <div class="btn-toolbar " role="toolbar" aria-label="Toolbar with button groups">

            <div class="btn-group mr-2" role="group" aria-label="Basic radio toggle button group">
              <input type="radio" class="btn-check" value="1" name="btnradio" id="option-1" autocomplete="off" checked>
              <label class="btn btn-outline-primary " for="option-1">Cliente</label>
            </div>

            <div class="btn-group mr-2" role="group" aria-label="Basic radio toggle button group">
              <input type="radio" class="btn-check" value="2" name="btnradio" id="option-2" autocomplete="off">
              <label class="btn btn-outline-primary " for="option-2">Vendedor</label>
            </div>

            <div class="btn-group mr-2" role="group" aria-label="Basic radio toggle button group">
              <input type="radio" class="btn-check" value="3" name="btnradio" id="option-3" autocomplete="off">
              <label class="btn btn-outline-primary " for="option-3">Ambos</label>
            </div>

          </div>

          <div class="container-fluid">

            <div class="form-group mb-3">
              <label class="label" for="username_input_id">Username</label>
              <input type="text" class="form-control" id="username_input_id" name="username_input_name" placeholder="Username" required="">
            </div>

            <div class="form-group mb-3">
              <label class="label" for="nombre_input_id">Nombre</label>
              <input type="text" class="form-control" id="nombre_input_id" name="nombre_input_name" placeholder="Nombre" required="">
            </div>

            <div class="row">
              <div class="col-md-6">

                <div class="form-group mb-3">
                  <label class="label" for="apellidoP_input_id">Apellido Paterno</label>
                  <input type="text" class="form-control" id="apellidoP_input_id" name="apellidoP_input_name" placeholder="Apellido Paterno" required="">
                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group mb-3">
                  <label class="label" for="apellidoM_input_id">Apellido Materno</label>
                  <input type="text" class="form-control" id="apellidoM_input_id" name="apellidoM_input_name" placeholder="Apellido Materno" required="">
                </div>

              </div>
            </div>

            <div class="form-group mb-3">
              <label class="label" for="password_input_id">Contraseña</label>
              <input type="password" class="form-control" id="password_input_id" name="password_input_name" placeholder="Contraseña" required="">

            </div>

            <div class="form-group mb-3">
              <label class="label" for="nacimiento_input_id">Fecha de nacimiento</label>
              <input type="date" class="form-control" id="nacimiento_input_id" name="nacimiento_input_name">

            </div>

            <div class="form-group mb-3">
              <label class="label" for="correo_input_id">Correo electrónico</label>
              <input type="text" class="form-control" id="correo_input_id" name="correo_input_name" placeholder="Correo electrónico" required="">

            </div>

            <div class="form-group mb-3">
              <label class="label" for="genero_select_id">Género</label>

              <select class="form-select form-select" aria-label="form-select-sm example" id="genero_select_id" name="genero_select_name">
                <option value="0" selected>Selecciona tu género</option>
                <option value="1">Hombre</option>
                <option value="2">Mujer</option>
              </select>
            </div>



            <div class=" form-group mb-3">
              <label class="label" for="imagen_input_id">Foto de perfil</label>
              <input class="form-control" type="file" id="imagen_input_id" name="imagen_input_name" accept="image/*">
            </div>

          </div>




          <div class="d-grid gap-2 col-6 mx-auto">
            <button onclick="" type="submit" class="btn btn-outline-primary" id="registrarse_button_id" name="registrarse_button_id">
              Registrarse
            </button>
          </div>


        </form>


        <div class="text-center">
          <h6>¿Ya te encuentras registrado?
            <a href="<?php echo Template::Route(Session_Controller::ROUTE, Session_Controller::INICIAR_SESION); ?>" style="text-decoration-line: none; color:#ff9393">Inicia sesión aquí</a>
          </h6>
        </div>


      </div>

    </div>
    </div>

  </section>

  <!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script> -->

  <script src="../View/Plugins/js/jquery-3.6.1.min.js"></script>
  <script src="../View/Plugins/js/jqueryvalidate.min.js"></script>
  <script src="../View/Plugins/js/additional-methods.js"></script>

  <script src="../View/JS/validation.js"></script>



</body>

</html>