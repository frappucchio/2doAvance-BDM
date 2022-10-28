<?php

//AQUI MANDARE A LLAMAR LAS CONSULTAS CUANDO LAS TENGAMOS (mas vendidos, populares,etc)
  $productos = Productos_DAO::GetAllProductos();

?>

<head>
 
  <title>Pagina Inicial</title>

  <link rel="stylesheet" href="/proyecto_bdm/View/Plugins/css/bootstrap.min.css">
  <link rel="stylesheet" href="/proyecto_bdm/View/Plugins/css/owl.carousel.css">
  <link rel="stylesheet" href="/proyecto_bdm/View/Plugins/css/owl.theme.default.css">
  <link rel="stylesheet" href="/proyecto_bdm/View/CSS/dashboard.css">

</head>

<body>
  

  <section style="margin-bottom: 20%;">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" id="slide1">
          <img src="/proyecto_bdm/View/img/portada2.png" class="d-block w-100">
        </div>
        <div class="carousel-item" id="slide2">
          <img src="/proyecto_bdm/View/img/slide1.jpg" class="d-block w-100">
        </div>
        <div class="carousel-item" id="slide3">
          <img src="/proyecto_bdm/View/img/slide2.png" class="d-block w-100">
        </div>
        <div class="carousel-item" id="slide4">
          <img src="/proyecto_bdm/View/img/slide3.jpg" class="d-block w-100">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="container">
      <div class="row my-5">
        <h1 class="text-center">Productos más vendidos</h1>
      </div>

      <div class="row g-4 my-5 mx-auto owl-carousel owl-theme border-bottom rounded">
      <?php if($productos != null):?>
          <?php foreach($productos as $key => $value):?>
            <div class="col product-item mx-auto">
              <div class="product-img">
                <img src="data:image/png;base64, <?php echo base64_encode(Productos_DAO::GetPrimeraImagenProducto($value["Id_Producto"])) ?>" alt="" class="img-fluid d-block mx-auto w-auto" >
                <button type="submit" class="heart-icon">
                  <i class="far fa-heart"></i>
                </button>
                <button type="submit" class="cart-icon">
                  <i class='bx bx-cart-add'></i>
                </button>
                <div class="row btns w-100 mx-auto text-center">
                  <button type="button" class="col-12 py-2">
                  <a href="<?php echo "/proyecto_bdm/".Productos_Controller::ROUTE."/".Productos_Controller::VER_PRODUCTO."/".$value["Id_Producto"] ?>" class="d-block text-dark text-decoration-none py-2 product-name">
                    <i class="fa fa-binoculars"></i> 
                    View
                  </a>
                  </button>
                </div>
              </div>

              <div class="product-info p-3">
                <span class="product-type"><?php echo Productos_DAO::GetPrimeraCategoriaProducto($value["Id_Producto"]);?></span>
                <a href="<?php echo "/proyecto_bdm/".Productos_Controller::ROUTE."/".Productos_Controller::VER_PRODUCTO."/".$value["Id_Producto"] ?>" class="d-block text-dark text-decoration-none py-2 product-name"><?php echo $value["Nombre_Producto"]?></a>
                
                <?php if($value["ModoVenta_Producto"] == 1):?>
                  <span class="product-price">$<?php echo $value["Precio_Producto"]?></span>
                <?php elseif($value["ModoVenta_Producto"] == 2):?>
                  <span class="product-price">Cotización</span>
                <?php endif?>

                <div class="rating d-flex mt-1">
                  <span>
                    <i class="fa fa-star"></i>
                  </span>
                  <span>
                    <i class="fa fa-star"></i>
                  </span>
                  <span>
                    <i class="fa fa-star"></i>
                  </span>
                  <span>
                    <i class="fa fa-star"></i>
                  </span>
                  <span>
                    <i class="fa fa-star"></i>
                  </span>
                  <span>(25 reviews)</span>
                </div>
              </div>
            </div>
          <?php endforeach?>
        <?php else:?>
          <h3 class="text-center">No hay productos registrados</h3>
        <?php endif?> 
      </div>
      
    </div>

    &nbsp;

    <div class="container">
      <div class="row my-5">
        <h1 class="text-center">Productos recomendados</h1>
      </div>

      <div class="row g-4 my-5 mx-auto owl-carousel owl-theme border-bottom">
        <?php if($productos != null):?>
          <?php foreach($productos as $key => $value):?>
            <div class="col product-item mx-auto">
              <div class="product-img">
                <img src="data:image/png;base64, <?php echo base64_encode(Productos_DAO::GetPrimeraImagenProducto($value["Id_Producto"])) ?>" alt="" class="img-fluid d-block mx-auto w-auto" >
                <button type="submit" class="heart-icon">
                  <i class="far fa-heart"></i>
                </button>
                <button type="submit" class="cart-icon">
                  <i class='bx bx-cart-add'></i>
                </button>
                <div class="row btns w-100 mx-auto text-center">
                  <button type="button" class="col-12 py-2">
                    <i class="fa fa-binoculars"></i> View
                  </button>
                </div>
              </div>

              <div class="product-info p-3">
                <span class="product-type"><?php echo Productos_DAO::GetPrimeraCategoriaProducto($value["Id_Producto"]);?></span>
                <a href="#" class="d-block text-dark text-decoration-none py-2 product-name"><?php echo $value["Nombre_Producto"]?></a>
                
                <?php if($value["ModoVenta_Producto"] == 1):?>
                  <span class="product-price">$<?php echo $value["Precio_Producto"]?></span>
                <?php elseif($value["ModoVenta_Producto"] == 2):?>
                  <span class="product-price">Cotización</span>
                <?php endif?>

                <div class="rating d-flex mt-1">
                  <span>
                    <i class="fa fa-star"></i>
                  </span>
                  <span>
                    <i class="fa fa-star"></i>
                  </span>
                  <span>
                    <i class="fa fa-star"></i>
                  </span>
                  <span>
                    <i class="fa fa-star"></i>
                  </span>
                  <span>
                    <i class="fa fa-star"></i>
                  </span>
                  <span>(25 reviews)</span>
                </div>
              </div>
            </div>
          <?php endforeach?>
        <?php else:?>
          <h3 class="text-center">No hay productos registrados</h3>
        <?php endif?> 
      </div>
    </div>

    &nbsp;
    <div class="container">
      <div class="row my-5">
        <h1 class="text-center">Productos populares</h1>
      </div>

      <div class="row g-4 my-5 mx-auto owl-carousel owl-theme border-bottom">
      <?php if($productos != null):?>
          <?php foreach($productos as $key => $value):?>
            <div class="col product-item mx-auto">
              <div class="product-img">
                <img src="data:image/png;base64, <?php echo base64_encode(Productos_DAO::GetPrimeraImagenProducto($value["Id_Producto"])) ?>" alt="" class="img-fluid d-block mx-auto w-auto" >
                <button type="submit" class="heart-icon">
                  <i class="far fa-heart"></i>
                </button>
                <button type="submit" class="cart-icon">
                  <i class='bx bx-cart-add'></i>
                </button>
                <div class="row btns w-100 mx-auto text-center">
                  <button type="button" class="col-12 py-2">
                    <i class="fa fa-binoculars"></i> View
                  </button>
                </div>
              </div>

              <div class="product-info p-3">
                <span class="product-type"><?php echo Productos_DAO::GetPrimeraCategoriaProducto($value["Id_Producto"]);?></span>
                <a href="#" class="d-block text-dark text-decoration-none py-2 product-name"><?php echo $value["Nombre_Producto"]?></a>
                
                <?php if($value["ModoVenta_Producto"] == 1):?>
                  <span class="product-price">$<?php echo $value["Precio_Producto"]?></span>
                <?php elseif($value["ModoVenta_Producto"] == 2):?>
                  <span class="product-price">Cotización</span>
                <?php endif?>

                <div class="rating d-flex mt-1">
                  <span>
                    <i class="fa fa-star"></i>
                  </span>
                  <span>
                    <i class="fa fa-star"></i>
                  </span>
                  <span>
                    <i class="fa fa-star"></i>
                  </span>
                  <span>
                    <i class="fa fa-star"></i>
                  </span>
                  <span>
                    <i class="fa fa-star"></i>
                  </span>
                  <span>(25 reviews)</span>
                </div>
              </div>
            </div>
          <?php endforeach?>
        <?php else:?>
          <h3 class="text-center">No hay productos registrados</h3>
        <?php endif?> 
      </div>
    </div>

  </section>

  



  <!-- SCRIPTS-->

  <script type="text/javascript" src="/proyecto_bdm/View/Plugins/js/jquery-3.6.1.min.js"></script>
  <script type="text/javascript" src="/proyecto_bdm/View/Plugins/js/owl.carousel.js"></script>
  <script type="text/javascript" src="/proyecto_bdm/View/JS/dashboard.js"></script>


</body>
