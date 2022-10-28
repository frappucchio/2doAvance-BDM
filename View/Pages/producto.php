<?php



?>

<head>

  <title>Producto</title>

  <link rel="stylesheet" href="/proyecto_bdm/View/CSS/producto.css">

</head>

<body>

  <!--Contenido-->
  <main>
    <div class="container" id="contenido-detalles">
      <div class="row" style="background-color: white; margin-top: 5%; margin-bottom: 5%; border-radius: 10px;">
        <div class="col" style="margin-left: 10%;">
          <!--Carousel-->
          <div id="carousel-producto" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

              <?php $imagenesProducto = array_reverse(Productos_DAO::GetAllImagenesDeProducto($producto->getId_Producto())); ?>
              <?php foreach ($imagenesProducto as $key => $imagen) : ?>
                <div class="carousel-item active">
                  <img src="data:image/png;base64, <?php echo base64_encode($imagen["Imagen_Producto"]) ?>" class="d-block w-100" style="height: 640px;" alt="...">
                </div>
              <?php endforeach ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-producto" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel-producto" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <!--Fin Carousel-->
        </div>
        <div class="col" style="width: 35%; margin-left: 15%; margin-top: 1%; margin-bottom: 1%;">
          <div class="card container-fluid" style=" height: 100%; width: 100%;">
            <div class="card-header" style="background-color: #ffffff;">
              <h2 class="mt-2"><?php echo $producto->getNombre_Producto() ?></h2>
            </div>
            <div class="card-body">

              <p class="lead">
                <h5 style="font-size: 13px; color:grey;">CATEGORIAS</h5>
                <?php $categoriasProducto = array_reverse(Productos_DAO::GetAllCategoriasDeProducto($producto->getId_Producto())); ?>
                <?php foreach ($categoriasProducto as $key => $categoria) : ?>
                  <?php echo $categoria["Nombre_Categoria"] ?>
                <?php endforeach ?>
              </p>
              <?php if ($producto->getModoVenta_Producto() == 1) : ?>
                <h2>$<?php echo $producto->getPrecio_Producto() ?></h2>
                <p>Producto en VENTA</p>
              <?php elseif ($producto->getModoVenta_Producto() == 2) : ?>
                <p>Producto en COTIZACIÓN</p>
              <?php endif ?>


              <a href="/Pages/su_perfil_vendedor_publico.html" style=" color:black; text-decoration: none;">
                <img src="data:image/png;base64, <?php echo base64_encode(Usuarios_DAO::GetImagenUsuarioById($producto->getUsuario_Vendedor())) ?>" alt="mdo" width="32" height="32" class="rounded-circle">
                <?php echo Usuarios_DAO::GetAliasUsuarioById($producto->getUsuario_Vendedor()) ?>
              </a>

              <p class="lead">
                <h5 style="font-size: 13px; color:grey;">DESCRIPCIÓN</h5>
                <?php echo $producto->getDescrip_Producto() ?>
              </p>

              <p class="lead">
                <h5>Cantidad disponible:</h5>
                <?php echo $producto->getExistencias_Producto() ?>
                unidades
              </p>

              <p class="lead">
              <h5>Valoración</h5>
              <div class="rating d-flex mt-1">
                <span class="fa fa-star" style="cursor:pointer;"></span>
                <span class="fa fa-star" style="cursor:pointer;"></span>
                <span class="fa fa-star" style="cursor:pointer;"></span>
                <span class="fa fa-star" style="cursor:pointer;"></span>
                <span class="fa fa-star" style="cursor:pointer;"></span>
                &nbsp;&nbsp;
                <p>4.0</p>
              </div>
              </p>

              <button onclick="location.href='/Pages/carrito.html'" class="btn btn-primary" type="button" id="add_carrito" style="width: 100%; height: 45px;">
                Agregar al carrito
              </button>



            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!--Videos-->
  <div class="mx-5 border-top">
    <h2>Videos</h2><br>
  </div>
  <div id="carousel-videos" class="carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="card">
          <div class="img-wrapper">
            <video class="card-img-top" controls>
              <source src="/img/productos/lapiz.mp4" type="video/mp4">
            </video>
          </div>
          <div class="card-body"></div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card">
          <div class="img-wrapper">
            <video class="card-img-top" controls>
              <source src="/img/productos/lapiz2.mp4" type="video/mp4">
            </video>
          </div>
          <div class="card-body"></div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card">
          <div class="img-wrapper">
            <video class="card-img-top" controls>
              <source src="/img/productos/lapiz3.mp4" type="video/mp4">
            </video>
          </div>
          <div class="card-body"></div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card">
          <div class="img-wrapper">
            <video class="card-img-top" controls>
              <source src="/img/productos/lapiz.mp4" type="video/mp4">
            </video>
          </div>
          <div class="card-body"> </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-videos" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel-videos" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <br><br><br><br><br><br><br><br>
  <!--Productos relacionados por categoría-->
  <div class="mx-5 border-top">
    <h2>Productos relacionados por categoría</h2><br>
  </div>
  <div id="carousel-relac" class="carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="card" id="card-relac">
          <div class="img-wrapper">
            <img class="card-img-top" src="/img/productos/p20.jpg">
          </div>
          <div class="card-body">
            <h5>Lápices Ariel</h5>
            <p>$120.00</p>
            <h6>Lápices</h6>
            <button type="button" class="btn btn-primary" id="btn-view">
              <i class="fa fa-binoculars"></i> View
            </button>
            <button type="button" class="btn btn-primary" id="btn-addcart">
              <i class="fa fa-cart-plus"></i> Añadir al carrito
            </button>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card" id="card-relac">
          <div class="img-wrapper">
            <img class="card-img-top" src="/img/productos/p21.jpg">
          </div>
          <div class="card-body">
            <h5>Lápices Faber-Castell</h5>
            <p>$250.00</p>
            <h6>Lápices</h6>
            <button type="button" class="btn btn-primary" id="btn-view">
              <i class="fa fa-binoculars"></i> View
            </button>
            <button type="button" class="btn btn-primary" id="btn-addcart">
              <i class="fa fa-cart-plus"></i> Añadir al carrito
            </button>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card" id="card-relac">
          <div class="img-wrapper">
            <img class="card-img-top" src="/img/productos/p22.png">
          </div>
          <div class="card-body">
            <h5>Lápices Mila</h5>
            <p>$330.00</p>
            <h6>Lápices</h6>
            <button type="button" class="btn btn-primary" id="btn-view">
              <i class="fa fa-binoculars"></i> View
            </button>
            <button type="button" class="btn btn-primary" id="btn-addcart">
              <i class="fa fa-cart-plus"></i> Añadir al carrito
            </button>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card" id="card-relac">
          <div class="img-wrapper">
            <img class="card-img-top" src="/img/productos/p23.jpg">
          </div>
          <div class="card-body">
            <h5>Lápices General</h5>
            <p>$50.00</p>
            <h6>Lápices</h6>
            <button type="button" class="btn btn-primary" id="btn-view">
              <i class="fa fa-binoculars"></i> View
            </button>
            <button type="button" class="btn btn-primary" id="btn-addcart">
              <i class="fa fa-cart-plus"></i> Añadir al carrito
            </button>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-videos" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel-videos" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <br><br><br><br><br><br><br><br>

  <!--Productos relacionados por vendedor-->
  <div class="mx-5 border-top">
    <h2>Productos relacionados del vendedor</h2><br>
  </div>
  <div id="carousel-relav" class="carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="card" id="card-relav">
          <div class="img-wrapper">
            <img class="card-img-top" src="/img/productos/p20.jpg">
          </div>
          <div class="card-body">
            <h5>Lápices Ariel</h5>
            <p>$120.00</p>
            <h6>Lápices</h6>
            <button type="button" class="btn btn-primary" id="btn-viewv">
              <i class="fa fa-binoculars"></i> View
            </button>
            <button type="button" class="btn btn-primary" id="btn-addcartv">
              <i class="fa fa-cart-plus"></i> Añadir al carrito
            </button>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card" id="card-relav">
          <div class="img-wrapper">
            <img class="card-img-top" src="/img/productos/p11.jpg">
          </div>
          <div class="card-body">
            <h5>Acuarela Fantasy</h5>
            <p>$560.00</p>
            <h6>Acuarelas Pinturas</h6>
            <button type="button" class="btn btn-primary" id="btn-viewv">
              <i class="fa fa-binoculars"></i> View
            </button>
            <button type="button" class="btn btn-primary" id="btn-addcartv">
              <i class="fa fa-cart-plus"></i> Añadir al carrito
            </button>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card" id="card-relav">
          <div class="img-wrapper">
            <img class="card-img-top" src="/img/productos/p9.jpg">
          </div>
          <div class="card-body">
            <h5>Crayola</h5>
            <p>$210.50</p>
            <h6>Crayolas</h6>
            <button type="button" class="btn btn-primary" id="btn-viewv">
              <i class="fa fa-binoculars"></i> View
            </button>
            <button type="button" class="btn btn-primary" id="btn-addcartv">
              <i class="fa fa-cart-plus"></i> Añadir al carrito
            </button>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card" id="card-relav">
          <div class="img-wrapper">
            <img class="card-img-top" src="/img/productos/p4.jpg">
          </div>
          <div class="card-body">
            <h5>Pinturas Osi</h5>
            <p>$60.00</p>
            <h6>Pinturas</h6>
            <button type="button" class="btn btn-primary" id="btn-viewv">
              <i class="fa fa-binoculars"></i> View
            </button>
            <button type="button" class="btn btn-primary" id="btn-addcartv">
              <i class="fa fa-cart-plus"></i> Añadir al carrito
            </button>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-videos" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel-videos" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <br><br><br><br><br><br><br><br>
  <!--Comentarios-->
  <div class="py-5 d-grid mx-5 border-top" id="comentarios">
    <h2 style="margin-bottom: 2.5%;">Opiniones de los Clientes</h2>


    <span class="row" style="margin-left:1%;" id="rateMe">
      <h5 class="col">Valora este producto:

        <span class="fa fa-star" style="cursor:pointer;" onclick="calificar(this)" id="1estrella"></span>
        <span class="fa fa-star" style="cursor:pointer;" onclick="calificar(this)" id="2estrella"></span>
        <span class="fa fa-star" style="cursor:pointer;" onclick="calificar(this)" id="3estrella"></span>
        <span class="fa fa-star" style="cursor:pointer;" onclick="calificar(this)" id="4estrella"></span>
        <span class="fa fa-star" style="cursor:pointer;" onclick="calificar(this)" id="5estrella"></span>
      </h5>

    </span>


    <div class="card mb-4">
      <div class="card-header">
        <a class="col-md-4 d-inline" href="#">
          <img src="/img/superadmin2.jpg" class=" rounded-circle" style="width: 50px; height: 50px; border-radius: 100px!important;" alt="...">
        </a>
        <p class="lead d-inline align-self-center" style="margin-left: 1%;">Rosas Sanchez</p>
      </div>
      <div class="card-body">
        <h6 style="font-weight: normal;">
          It is a long established fact that a reader will be distracted by the readable content of a page when looking
          at its layout. The point of using Lorem Ipsum is that it has a more-or-less
          normal distribution of letters, as opposed to using 'Content here, content
          here', making it look like readable English.
        </h6>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <a class="col-md-4 d-inline" href="#">
          <img src="/img/admin1.jpg" class=" rounded-circle" style="width: 50px; height: 50px; border-radius: 100px!important;" alt="...">
        </a>
        <p class="lead d-inline align-self-center" style="margin-left: 1%;">Samantha Perez</p>
      </div>
      <div class="card-body">
        <h6 style="font-weight: normal;">
          It is a long established fact that a reader will be distracted by the readable content of a page when looking
          at its layout. The point of using Lorem Ipsum is that it has a more-or-less
          normal distribution of letters, as opposed to using 'Content here, content
          here', making it look like readable English.
        </h6>
      </div>
    </div>

    <button class="btn btn-primary mt-5" type="button" id="add_carrito" style="width: 100%; height: 45px;">
      Agregar comentario
    </button>



  </div>



  <!-- SCRIPTS-->
  <script type="text/javascript" src="/proyecto_bdm/View/Plugins/js/jquery-3.6.1.min.js"></script>
  <script type="text/javascript" src="/proyecto_bdm/View/Plugins/js/owl.carousel.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.2/js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript" src="/proyecto_bdm/View/JS/producto.js"></script>
  <script type="text/javascript" src="/proyecto_bdm/View/JS/relacionadoscategoria.js"></script>
  <script type="text/javascript" src="/proyecto_bdm/View/JS/relacionadosvendedor.js"></script>
  <script type="text/javascript" src="/proyecto_bdm/View/JS/estrellas.js"></script>

</body>