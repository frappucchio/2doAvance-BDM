<head>

  <title>Mi Perfil <?php echo $usuarioLogeado->getAlias_Usuario() ?></title>

  <link rel="stylesheet" href="../View/CSS/perfil_cliente.css" />

</head>

<body>
  <section class="align-items-center" style="background-color: #f2f1eb">
    <div class="container-fluid" id="main">

      <!--CARD 1-->
      <div class="card shadow-2-strong card-registration" id="profiletop">
        <div class="card-header col-auto text-center" id="profile_header">

          <img src="data:image/png;base64, <?php echo base64_encode($usuarioLogeado->getImagen_Usuario()) ?>" alt="tufotodeperfil" id="profilepic" />

          <h1 id="name"><?php echo $usuarioLogeado->getAlias_Usuario() ?></h1>

          <p><i class="far fa-calendar-alt mt-3" style="color: #FF9393;"></i> Se unió el <?php echo $usuarioLogeado->getFechaIngreso_Usuario() ?></p>

          <?php if ($usuarioLogeado->getRol_Usuario() == 1) : ?>
            <p><i class="fas fa-user" style="color: #FF9393;"></i> Cliente</p>
          <?php elseif ($usuarioLogeado->getRol_Usuario()  == 2) : ?>
            <p><i class="fas fa-store" style="color: #FF9393;"></i> Vendedor</p>
          <?php elseif ($usuarioLogeado->getRol_Usuario()  == 3) : ?>
            <p><i class="fas fa-user-tag " style="color: #FF9393;"></i> Cliente | Vendedor</p>
          <?php elseif ($usuarioLogeado->getRol_Usuario()  == 4) : ?>
            <p><i class="fas fa-user-cog" style="color: #FF9393;"></i> Administrador</p>
          <?php elseif ($usuarioLogeado->getRol_Usuario()  == 5) : ?>
            <p><i class="far fa-id-card" style="color: #FF9393;"></i> Súper Administrador</p>
          <?php endif ?>
        </div>

        <div class="card-body container-fluid">
          <div id="profilenav">

            <!-- Tabs navs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <?php if ($usuarioLogeado->getRol_Usuario() == 1) : ?>
                <li class="nav-item" role="presentation"><a class="nav-link active" id="editarPerfil-tab" data-mdb-toggle="tab" href="#editarPerfil " role="tab" aria-controls="editarPerfil" aria-selected="true">Editar Perfil</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="misListas-tab" data-mdb-toggle="tab" href="#misListas" role="tab" aria-controls="misListas" aria-selected="false">Mis Listas</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="misCompras-tab" data-mdb-toggle="tab" href="#misCompras" role="tab" aria-controls="misCompras" aria-selected="false">Mis Compras</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="misCompras-tab" data-mdb-toggle="tab" href="#misCompras" role="tab" aria-controls="misCompras" aria-selected="false">Mi Cotización</a></li>
              <?php elseif ($usuarioLogeado->getRol_Usuario()  == 2) : ?>
                <li class="nav-item" role="presentation"><a class="nav-link active" id="editarPerfil-tab" data-mdb-toggle="tab" href="#editarPerfil" role="tab" aria-controls="editarPerfil" aria-selected="true">Editar Perfil</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="misVentas-tab" data-mdb-toggle="tab" href="#misVentas" role="tab" aria-controls="misVentas" aria-selected="false">Mis Ventas</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="misProductos-tab" data-mdb-toggle="tab" href="#misProductos" role="tab" aria-controls="misProductos" aria-selected="false">Mis Productos</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="cotizacion-tab" data-mdb-toggle="tab" href="#cotizacion" role="tab" aria-controls="cotizacion" aria-selected="false">Cotización</a></li>
              <?php elseif ($usuarioLogeado->getRol_Usuario()  == 3) : ?>
                <li class="nav-item" role="presentation"><a class="nav-link active" id="editarPerfil-tab" data-mdb-toggle="tab" href="#editarPerfil" role="tab" aria-controls="editarPerfil" aria-selected="true">Editar Perfil</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="misListas-tab" data-mdb-toggle="tab" href="#misListas" role="tab" aria-controls="misListas" aria-selected="false">Mis Listas</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="misCompras-tab" data-mdb-toggle="tab" href="#misCompras" role="tab" aria-controls="misCompras" aria-selected="false">Mis Compras</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="misCompras-tab" data-mdb-toggle="tab" href="#misCompras" role="tab" aria-controls="misCompras" aria-selected="false">Mi Cotización</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="misVentas-tab" data-mdb-toggle="tab" href="#misVentas" role="tab" aria-controls="misVentas" aria-selected="false">Mis Ventas</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="misProductos-tab" data-mdb-toggle="tab" href="#misProductos" role="tab" aria-controls="misProductos" aria-selected="false">Mis Productos</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="cotizacion-tab" data-mdb-toggle="tab" href="#cotizacion" role="tab" aria-controls="cotizacion" aria-selected="false">Cotizaciones Clientes</a></li>
              <?php elseif ($usuarioLogeado->getRol_Usuario()  == 4) : ?>
                <li class="nav-item" role="presentation"><a class="nav-link active" id="editarPerfil-tab" data-mdb-toggle="tab" href="#editarPerfil" role="tab" aria-controls="editarPerfil" aria-selected="true">Editar Perfil</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link active" id="solicitudesProductos-tab" data-mdb-toggle="tab" href="#solicitudesProductos" role="tab" aria-controls="solicitudesProductos" aria-selected="false">Solicitudes Productos</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link active" id="productosAutorizados-tab" data-mdb-toggle="tab" href="#productosAutorizados" role="tab" aria-controls="productosAutorizados" aria-selected="false">Productos Autorizados</a></li>
              <?php elseif ($usuarioLogeado->getRol_Usuario()  == 5) : ?>
                <li class="nav-item" role="presentation"><a class="nav-link active" id="editarPerfil-tab" data-mdb-toggle="tab" href="#editarPerfil" role="tab" aria-controls="editarPerfil" aria-selected="true">Editar Perfil</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link active" id="administradores-tab" data-mdb-toggle="tab" href="#administradores" role="tab" aria-controls="administradores" aria-selected="false">Administradores</a></li>
              <?php endif ?>
            </ul>
            <!-- Tabs navs -->

          </div>
        </div>
      </div>


      <!--CARD 2, CONTENIDO-->

      <div class="tab-content">

        <!-- EDITAR PERFIL ------------------------------------------------------------------------------------------ -->
        <div class="card tab-pane active" id="editarPerfil" role="tabpanel" aria-labelledby="editarPerfil-tab">

          <div class="card-header" id="profileContent_header">
            <div class="Presentation2">
              <div>

                <h1 id="titulo_profileContent">Editar perfil</h1>

              </div>
            </div>
          </div>

          <div class="card-body container-fluid table-responsive" id="profileContent_body">


            <form method="post" class="container-fluid" id="registro_form" enctype="multipart/form-data">
              <div class="container-fluid">
                <!-- <div class="alert alert-success" role="alert">
                      <strong>El usuario ha sido añadido correctamente</strong>
                    </div> -->

                <div class="form-group mb-3">
                  <i class="fas fa-user" style="margin-right: 1%; color:#FF6060"></i>
                  <label class="label" for="username_input_id">Username</label>
                  <input value="<?php echo $usuarioLogeado->getAlias_Usuario() ?>" type="text" class="form-control" id="username_input_id" name="username_input_name" placeholder="Username" required="" />
                </div>

                <div class="form-group mb-3">
                  <i class="fas fa-pen" style="margin-right: 1%; color:#FF6060"></i>
                  <label class="label" for="nombre_input_id">Nombre</label>
                  <input value="<?php echo $usuarioLogeado->getNombre_Usuario() ?>" type="text" class="form-control" id="nombre_input_id" name="nombre_input_name" placeholder="Nombre" required="" />
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <i class="fas fa-pen" style="margin-right: 1%; color:#FF6060"></i>
                      <label class="label" for="apellidoP_input_id">Apellido Paterno</label>
                      <input value="<?php echo $usuarioLogeado->getApePaterno_Usuario() ?>" type="text" class="form-control" id="apellidoP_input_id" name="apellidoP_input_name" placeholder="Apellido Paterno" required="" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <i class="fas fa-pen" style="margin-right: 1%; color:#FF6060"></i>
                      <label class="label" for="apellidoM_input_id">Apellido Materno</label>
                      <input value="<?php echo $usuarioLogeado->getApeMaterno_Usuario() ?>" type="text" class="form-control" id="apellidoM_input_id" name="apellidoM_input_name" placeholder="Apellido Materno" required="" />
                    </div>
                  </div>
                </div>

                <div class="form-group mb-3">
                  <i class="fas fa-key" style="margin-right: 1%; color:#FF6060"></i>
                  <label class="label" for="password_input_id">Contraseña</label>
                  <input value="<?php echo $usuarioLogeado->getPassword_Usuario() ?>" type="password" class="form-control" id="password_input_id" name="password_input_name" placeholder="Contraseña" required="" />
                </div>

                <div class="form-group mb-3">
                  <i class="fas fa-birthday-cake" style="margin-right: 1%; color:#FF6060"></i>
                  <label class="label" for="nacimiento_input_id">Fecha de nacimiento</label>
                  <input value="<?php echo $usuarioLogeado->getFechaNacimiento_Usuario() ?>" type="date" class="form-control" id="nacimiento_input_id" name="nacimiento_input_name" />
                </div>

                <div class="form-group mb-3">
                  <i class="far fa-envelope" style="margin-right: 1%; color:#FF6060"></i>
                  <label class="label" for="correo_input_id">Correo electrónico</label>
                  <input value="<?php echo $usuarioLogeado->getCorreo_Usuario() ?>" type="text" class="form-control" id="correo_input_id" name="correo_input_name" placeholder="Correo electrónico" required="" />
                </div>

                <div class="form-group mb-3">
                  <i class="fas fa-venus-mars" style="margin-right: 1%; color:#FF6060"></i>
                  <label class="label" for="genero_select_id">Género</label>

                  <?php if ($usuarioLogeado->getGenero_Usuario() == 1) : ?>
                    <select value="" class="form-select form-select" aria-label="form-select-sm example" id="genero_select_id" name="genero_select_name">
                      <option value="1" selected>Hombre</option>
                      <option value="2">Mujer</option>
                    </select>
                  <?php elseif ($usuarioLogeado->getGenero_Usuario() == 2) : ?>
                    <select value="" class="form-select form-select" aria-label="form-select-sm example" id="genero_select_id" name="genero_select_name">
                      <option value="1">Hombre</option>
                      <option value="2" selected>Mujer</option>
                    </select>
                  <?php endif ?>
                </div>

                <div class="form-group mb-3">
                  <i class="fas fa-lock " style="margin-right: 1%; color:#FF6060"></i>
                  <label class="label" for="privacidad_select_id">Privacidad Perfil</label>

                  <?php if ($usuarioLogeado->getPrivacidad_Usuario() == 1) : ?>
                    <select value="" class="form-select form-select" aria-label="form-select-sm example" id="privacidad_select_id" name="privacidad_select_name">
                      <option value="1" selected>Público</option>
                      <option value="2">Privado</option>
                    </select>
                  <?php elseif ($usuarioLogeado->getPrivacidad_Usuario() == 2) : ?>
                    <select value="" class="form-select form-select" aria-label="form-select-sm example" id="privacidad_select_id" name="privacidad_select_name">
                      <option value="1">Público</option>
                      <option value="2" selected>Privado</option>
                    </select>
                  <?php endif ?>
                </div>

                <div class="form-group mb-3">
                  <img style="margin-right: 1%; margin-bottom: 1%;" src="data:image/png;base64, <?php echo base64_encode($usuarioLogeado->getImagen_Usuario()) ?>" alt="mdo" width="32" height="32" class="rounded-circle" />
                  <label class="label" for="imagenEditar_input_id">Foto de perfil</label>
                  <input value="" class="form-control" type="file" id="imagenEditar_input_id" name="imagenEditar_input_name" accept="image/png, image/jpeg" />
                </div>
              </div>

              <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-outline-primary" id="editarPerfil_button_id" name="editarPerfil_button_name">
                  Guardar
                </button>
              </div>


            </form>

            <form method="POST" >
              <input id="eliminarUsuario" id="eliminarUsuario_id" name="eliminarUsuario_name" type="hidden" value="eliminarUsuario">
              <div class="d-grid gap-2 col-3 mx-auto">
                <button onclick="confirmarEliminarMiCuenta(event)" type="sumbit" class="btn btn-outline-danger" id="eliminarUsuario_button_id" name="eliminarUsuario_button_name">
                  <i class="far fa-trash-alt" style="padding-right: 5%;"></i>Eliminar mi cuenta
                </button>
              </div>
            </form>


          </div>
        </div>

        <!-- MIS LISTAS ------------------------------------------------------------------------------------------ -->
        <div class="card tab-pane" id="misListas" role="tabpanel" aria-labelledby="misListas-tab">

          <div class="card-header    " id="profileContent_header">
            <div class="Presentation2">
              <div>
                <h1 id="titulo_profileContent">Mis listas</h1>
              </div>
            </div>
          </div>

          <div class="card-body    container-fluid table-responsive" id="profileContent_body">


            <table class="table container-fluid" id="tablaListas">
              <thead>
                <tr>
                  <th></th>
                  <th>Lista </th>
                  <th>Descripcion</th>
                  <th>Privacidad</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>
                    <a class="col-md-4" href="#">
                      <img src="/img/productos/p9.jpg" class=" rounded-start" style="max-height: 200px" alt="...">
                    </a>
                  </td>

                  <td>Todo tipo acuarelas</td>
                  <td>Distintas acuarelas</td>
                  <td><i class="fas fa-lock"></i></td>
                  <td><a href="#" id="btn_delete" class="btn "><i class="far fa-trash-alt"></i></a> </td>
                  <td><a href="#" id="btn_edit" class="btn" data-bs-toggle="modal" data-bs-target="#editModal"><i class="far fa-edit"></i></a></td>
                </tr>
              </tbody>

              <tbody>
                <tr>
                  <td>
                    <a class="col-md-4" href="#">
                      <img src="/img/productos/p12.jpg" class=" rounded-start" style="max-height: 200px" alt="...">
                    </a>
                  </td>
                  <td>Lista materiales</td>
                  <td>Materiales dibujo</td>
                  <td><i class="fas fa-lock-open"></i></td>
                  <td><a href="#" id="btn_delete" class="btn "><i class="far fa-trash-alt"></i></a> </td>
                  <td><a href="#" id="btn_edit" class="btn" data-bs-toggle="modal" data-bs-target="#editModal"><i class="far fa-edit"></i></a></td>
                </tr>
              </tbody>

            </table>

          </div>
        </div>

        <!-- MIS COMPRAS ------------------------------------------------------------------------------------------ -->
        <div class="card tab-pane" id="misCompras" role="tabpanel" aria-labelledby="misCompras-tab">
          <div class="card-header    " id="profileContent_header">

            <div class="row m-3">
              <div class="col">
                <h1 id="titulo_profileContent">Mis Compras
                </h1>
              </div>

              <div class="col-9">
                <i class="fas fa-sliders-h fa-lg" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></i>
              </div>
            </div>

            <div class="collapse" id="collapseExample">
              <div class="filtro_Compras">

                <div class="row" id="fechas_Compras">

                  <div class="form-group mb-3">
                    <label class="label" for="genero_select_id">Categorías</label>

                    <select class="form-select form-select" aria-label="form-select-sm example" id="genero_select_id" name="genero_select_name">
                      <option value="Todas las categorías">Todas las categorías</option>
                      <option value="Hombre">Acuarelas</option>
                      <option value="Mujer">Tradicional</option>
                      <option value="Otro">Digital</option>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label class="label" for="nacimiento_input_id">Fecha de compra</label>
                      <input type="date" class="form-control" id="nacimiento_input_id" name="nacimiento_input_name">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label class="label" for="nacimiento_input_id">Fecha de compra</label>
                      <input type="date" class="form-control" id="nacimiento_input_id" name="nacimiento_input_name">
                    </div>
                  </div>

                  <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-outline-primary" id="registrarse_button_id" name="registrarse_button_id" href="#">
                      Filtrar
                    </button>
                  </div>



                </div>
              </div>
            </div>

          </div>

          <div class="card-body    container-fluid table-responsive" id="profileContent_body">


            <table class="table container-fluid" id="tablaListas">
              <thead>
                <tr>
                  <th></th>
                  <th>Producto </th>
                  <th>Fecha de Compra</th>
                  <th>Hora de Compra</th>
                  <th>Categoría</th>
                  <th>Valoración</th>
                  <th>Precio</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>
                    <a class="col-md-4" href="#">
                      <img src="/img/productos/p9.jpg" class=" rounded-start" style="max-height: 200px" alt="...">
                    </a>
                  </td>

                  <td>Crayolas</td>
                  <td>YYYY-MM-DD</td>
                  <td>Thh:mm:ss</td>
                  <td>Escolar</td>
                  <td>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                  </td>
                  <td>$156.84</td>
                  <td></td>
                </tr>
              </tbody>

              <tbody>
                <tr>
                  <td>
                    <a class="col-md-4" href="#">
                      <img src="/img/productos/p12.jpg" class=" rounded-start" style="max-height: 200px" alt="...">
                    </a>
                  </td>

                  <td>Crayolas</td>
                  <td>YYYY-MM-DD</td>
                  <td>Thh:mm:ss</td>
                  <td>Escolar</td>
                  <td>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                  </td>
                  <td>$156.84</td>
                  <td></td>
                </tr>
              </tbody>

              <tbody>
                <tr>
                  <td>
                    <a class="col-md-4" href="#">
                      <img src="/img/productos/p9.jpg" class=" rounded-start" style="max-height: 200px" alt="...">
                    </a>
                  </td>

                  <td>Crayolas</td>
                  <td>YYYY-MM-DD</td>
                  <td>Thh:mm:ss</td>
                  <td>Escolar</td>
                  <td>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                  </td>
                  <td>$156.84</td>
                  <td></td>
                </tr>
              </tbody>

            </table>
          </div>

        </div>

        <!-- MIS VENTAS ------------------------------------------------------------------------------------------ -->
        <div class="card tab-pane" id="misVentas" role="tabpanel" aria-labelledby="misVentas-tab">
          <div class="card-header    " id="profileContent_header">

            <div class="row m-3">
              <div class="col">
                <h1 id="titulo_profileContent">Mis Ventas
              </div>

              <div class="col-9">
                <i class="fas fa-sliders-h fa-lg" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></i>
              </div>
            </div>

            <div class="collapse" id="collapseExample">
              <div class="filtro_Compras">

                <div class="row" id="fechas_Compras">

                  <div class="form-group mb-3">
                    <label class="label" for="genero_select_id">Categorías</label>

                    <select class="form-select form-select" aria-label="form-select-sm example" id="genero_select_id" name="genero_select_name">
                      <option value="Todas las categorías">Todas las categorías</option>
                      <option value="Hombre">Acuarelas</option>
                      <option value="Mujer">Tradicional</option>
                      <option value="Otro">Digital</option>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label class="label" for="nacimiento_input_id">Fecha de compra</label>
                      <input type="date" class="form-control" id="nacimiento_input_id" name="nacimiento_input_name">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label class="label" for="nacimiento_input_id">Fecha de compra</label>
                      <input type="date" class="form-control" id="nacimiento_input_id" name="nacimiento_input_name">
                    </div>
                  </div>

                  <form action="/Pages/mi_perfil_vendedor_misVentasCD.html">
                    <div class="d-grid gap-2 col-6 mx-auto">
                      <button type="submit" class="btn btn-outline-primary" id="consultaDetallada_button_id" name="consultaDetallada__button_name" href="#">
                        Consulta detallada
                      </button>
                    </div>
                  </form>

                  <form action="/Pages/mi_perfil_vendedor_misVentasCA.html">
                    <div class="d-grid gap-2 col-6 mx-auto">
                      <button type="submit" class="btn btn-outline-primary" id="consultaAgrupada_button_id" name="consultaAgrupada_button_name" href="#">
                        Consulta agrupada
                      </button>
                    </div>
                  </form>



                </div>
              </div>
            </div>

          </div>

          <div class="card-body    container-fluid table-responsive" id="profileContent_body">


            <table class="table container-fluid" id="tablaListas">
              <thead>
                <tr>
                  <th></th>
                  <th>Mes</th>
                  <th>Año</th>
                  <th>Categoría</th>
                  <th>Ventas</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td></td>
                  <td>Julio</td>
                  <td>2021</td>
                  <td>Escolar</td>
                  <td>298</td>
                  <td></td>
                </tr>
              </tbody>

              <tbody>
                <tr>
                  <td></td>
                  <td>Julio</td>
                  <td>2021</td>
                  <td>Digital</td>
                  <td>358</td>
                  <td></td>
                </tr>
              </tbody>


            </table>

          </div>

        </div>

        <!-- MIS PRODUCTOS ------------------------------------------------------------------------------------------ -->
        <div class="card tab-pane" id="misProductos" role="tabpanel" aria-labelledby="misProductos-tab">
          <div class="card-header    " id="profileContent_header">

            <div class="row m-3">
              <div class="col">
                <h1 id="titulo_profileContent">Mis Productos
                </h1>
              </div>

              <div class="col-9">
                <i class="fas fa-sliders-h fa-lg" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></i>
              </div>
            </div>

            <div class="collapse" id="collapseExample">
              <div class="filtro_Compras">

                <div class="row" id="fechas_Compras">

                  <div class="form-group mb-3">
                    <label class="label" for="genero_select_id">Categorías</label>

                    <select class="form-select form-select" aria-label="form-select-sm example" id="genero_select_id" name="genero_select_name">
                      <option value="Todas las categorías">Todas las categorías</option>
                      <option value="Hombre">Acuarelas</option>
                      <option value="Mujer">Tradicional</option>
                      <option value="Otro">Digital</option>
                    </select>
                  </div>


                  <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-outline-primary" id="registrarse_button_id" name="registrarse_button_id" href="#">
                      Filtrar
                    </button>
                  </div>


                </div>
              </div>
            </div>

          </div>

          <div class="card-body    container-fluid table-responsive" id="profileContent_body">
            <table class="table container-fluid" id="tablaListas">
              <thead>
                <tr>
                  <th></th>
                  <th>Producto </th>
                  <th>Categoría</th>
                  <th>Existencias</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>
                    <a class="col-md-4" href="#">
                      <img src="/img/productos/p9.jpg" class=" rounded-start" style="max-height: 200px" alt="...">
                    </a>
                  </td>

                  <td>Crayolas</td>
                  <td>Escolar</td>
                  <td>190</td>
                  <td><a href="#" id="btn_delete" class="btn "><i class="far fa-trash-alt"></i></a> </td>
                  <td><a href="#" id="btn_edit" class="btn" data-bs-toggle="modal" data-bs-target="#editModal"><i class="far fa-edit"></i></a></td>
                </tr>
              </tbody>

              <tbody>
                <tr>
                  <td>
                    <a class="col-md-4" href="#">
                      <img src="/img/productos/p12.jpg" class=" rounded-start" style="max-height: 200px" alt="...">
                    </a>
                  </td>

                  <td>Crayolas</td>
                  <td>Escolar</td>
                  <td>190</td>
                  <td><a href="#" id="btn_delete" class="btn "><i class="far fa-trash-alt"></i></a> </td>
                  <td><a href="#" id="btn_edit" class="btn" data-bs-toggle="modal" data-bs-target="#editModal"><i class="far fa-edit"></i></a></td>
                </tr>
              </tbody>

              <!-- <tfoot>
              <tr>
                  <td colspan="2"></td>
                  <td class="text-center"><strong>Total:680.0</strong></td>
                  <td><a href="#" id="btn_pago" class="btn btn-success btn-block">Pagos <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAJVJREFUSEvt1MENQEAQheF/O6ETOtEJnaASrShFJtmIOOzOm2QTBy4um/eZN0g0vlLjfH6g2vCnKpqBHTirj/044J3AwpccPiqIF+iAA7C7TeBGvIANHUIUIISogIxEgRUY8j760lulArYHd7jBCiCHK0AoXAGmXI19A8XO3/tQKjJkU34TygRq7n1emSCE/EC1tuYVXQkmHBmwQjpBAAAAAElFTkSuQmCC"/></a></td>
              </tr>
            </tfoot> -->

            </table>
          </div>

        </div>

        <!-- COTIZACION ------------------------------------------------------------------------------------------ -->
        <div class="card tab-pane" id="cotizacion" role="tabpanel" aria-labelledby="cotizacion-tab">
          <div class="card-header    " id="profileContent_header">
            <div class="Presentation2">
              <div>
                <h1 id="titulo_profileContent">Solicitudes Cotización</h1>
              </div>
            </div>
          </div>

          <div class="card-body    container-fluid table-responsive" id="profileContent_body">


            <table class="table container-fluid" id="tablaListas">
              <thead>
                <tr>
                  <th></th>
                  <th>Producto </th>
                  <th>Petición de</th>
                  <th>Precio Negociado</th>
                  <th></th>
                </tr>
              </thead>

              <form>
                <tbody>
                  <tr>
                    <td>
                      <a class="col-md-4" href="#">
                        <img src="../img/productos/p9.jpg" class=" rounded-start" style="max-height: 200px" alt="...">
                      </a>
                    </td>
                    <td>Crayolas</td>
                    <td>chio123</td>
                    <td>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Precio Negociado">
                      </div>
                    </td>
                    <td>
                      <button type="submit" class="btn btn-outline-primary" id="enviarPrecio_button_id" name="enviarPrecio_button_name" href="#">
                        Enviar precio
                      </button>
                    </td>
                    <td></td>
                  </tr>
                </tbody>
              </form>

              <form>
                <tbody>
                  <tr>
                    <td>
                      <a class="col-md-4" href="#">
                        <img src="/img/productos/p8.jpg" class=" rounded-start" style="max-height: 200px" alt="...">
                      </a>
                    </td>
                    <td>Crayolas</td>
                    <td>chio123</td>
                    <td>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Precio Negociado">
                      </div>
                    </td>
                    <td>
                      <button type="submit" class="btn btn-outline-primary" id="registrarse_button_id2" name="registrarse_button_id2" href="#">
                        Enviar precio
                      </button>
                    </td>
                    <td></td>
                  </tr>
                </tbody>
              </form>

            </table>
          </div>

        </div>

        <!-- SOLICITUDES PRODUCTOS ------------------------------------------------------------------------------------------ -->
        <div class="card tab-pane" id="solicitudesProductos" role="tabpanel" aria-labelledby="solicitudesProductos-tab">
          <div class="card-header    " id="profileContent_header">
            <div class="Presentation2">
              <div>
                <h1 id="titulo_profileContent">Solicitudes Productos</h1>
              </div>
            </div>
          </div>

          <div class="card-body    container-fluid table-responsive" id="profileContent_body">


            <table class="table container-fluid" id="tablaListas">
              <thead>
                <tr>
                  <th></th>
                  <th>Producto </th>
                  <th>Vendedor</th>
                  <th>Descripción</th>
                  <th>Categoría</th>
                  <th>Venta</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <form>
                <tbody>
                  <tr>
                    <td>
                      <a class="col-md-4" href="#">
                        <img src="/img/productos/p9.jpg" class=" rounded-start" style="max-height: 200px" alt="...">
                      </a>
                    </td>
                    <td>Crayolas</td>
                    <td>chio123</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                    <td>Escolar</td>
                    <td>Precio fijo</td>
                    <td><a href="#" id="btn_delete" class="btn "><i class="fas fa-check"></i></a> </td>
                    <td><a href="#" id="btn_delete" class="btn "><i class="far fa-trash-alt"></i></a> </td>
                    <td></td>
                  </tr>
                </tbody>
              </form>

              <form>
                <tbody>
                  <tr>
                    <td>
                      <a class="col-md-4" href="#">
                        <img src="/img/productos/p9.jpg" class=" rounded-start" style="max-height: 200px" alt="...">
                      </a>
                    </td>
                    <td>Crayolas</td>
                    <td>chio123</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                    <td>Escolar</td>
                    <td>Cotización</td>
                    <td><a href="#" id="btn_delete" class="btn "><i class="fas fa-check"></i></a> </td>
                    <td><a href="#" id="btn_delete" class="btn "><i class="far fa-trash-alt"></i></a> </td>
                    <td></td>
                  </tr>
                </tbody>
              </form>

            </table>
          </div>

        </div>

        <!-- PRODUCTOS AUTORIZADOS ------------------------------------------------------------------------------------------ -->
        <div class="card tab-pane" id="productosAutorizados" role="tabpanel" aria-labelledby="productosAutorizados-tab">

          <div class="card-header    " id="profileContent_header">
            <div class="Presentation2">
              <div>
                <h1 id="titulo_profileContent">Productos Autorizados</h1>
              </div>
            </div>
          </div>

          <div class="card-body    container-fluid table-responsive" id="profileContent_body">


            <table class="table container-fluid" id="tablaListas">
              <thead>
                <tr>
                  <th></th>
                  <th>Producto </th>
                  <th>Vendedor</th>
                  <th>Categoría</th>
                  <th>Venta</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>
                    <a class="col-md-4" href="#">
                      <img src="/img/productos/p9.jpg" class=" rounded-start" style="max-height: 200px" alt="...">
                    </a>
                  </td>

                  <td>Crayolas</td>
                  <td>chio123</td>
                  <td>Escolar</td>
                  <td>Cotizado</td>
                  <td></td>
                </tr>
              </tbody>


              <tbody>
                <tr>
                  <td>
                    <a class="col-md-4" href="#">
                      <img src="/img/productos/p2.jpg" class=" rounded-start" style="max-height: 200px" alt="...">
                    </a>
                  </td>

                  <td>Crayolas</td>
                  <td>chio123</td>
                  <td>Escolar</td>
                  <td>Cotizado</td>
                  <td></td>
                </tr>
              </tbody>

            </table>
          </div>

        </div>

        <!-- ADMINISTRADORES ------------------------------------------------------------------------------------------ -->
        <div class="card tab-pane" id="administradores" role="tabpanel" aria-labelledby="administradores-tab">
          <div class="card-header    " id="profileContent_header">

            <div class="Presentation2">
              <div>
                <h1 id="titulo_profileContent">Administradores creados
                </h1>

              </div>
            </div>



          </div>

          <div class="card-body    container-fluid table-responsive" id="profileContent_body">


            <table class="table container-fluid" id="tablaListas">
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                  <th>Fecha creación</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                <tr>

                  <td>
                    <a class="col-md-4" href="#">
                      <img src="/img/superadmin2.jpg" class=" rounded-circle" style="width: 100px; height: 100px; border-radius: 100px!important;" alt="...">
                    </a>
                  </td>

                  <td>chio123</td>
                  <td>09/09/2015</td>
                  <td></td>
                </tr>
              </tbody>

              <tbody>
                <tr>

                  <td>
                    <a class="col-md-4" href="#">
                      <img src="/img/superadmin4.jpg" class=" rounded-circle" style="width: 100px; height: 100px; border-radius: 100px!important;" alt="...">
                    </a>
                  </td>

                  <td>chio123</td>
                  <td>09/09/2015</td>
                  <td></td>
                </tr>
              </tbody>


            </table>
          </div>

        </div>

      </div>



    </div>
  </section>


  <!-- SCRIPTS-->

  
</body>