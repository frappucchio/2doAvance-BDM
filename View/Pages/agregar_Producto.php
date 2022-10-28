<header>
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="../View/CSS/categorias.css">
</header>


<body>
    <section class="d-flex   align-items-center" style="background-color: #f2f1eb; ">
        <div class="container-fluid" id="main" style="max-width: 45%;">
            <!--CARD 2-->
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;" id="profileContent">

                <div class="card-header   col-auto text-center mt-1" style="background-color: white; border-bottom: white;">
                    <div class="col-auto text-center">
                        <img src="../View/img/producto.png" width="25%" class="rounded mx-auto d-block mb-3" alt="">
                    </div>
                    <h1>Agregar Producto</h1>
                </div>

                <div class="card-body ">

                    <form method="POST" class="container-fluid"  id="producto_form" enctype="multipart/form-data">

                        <div class="container-fluid">

                            <div class="form-group mb-3">
                                <label class="label" for="nombreProducto_input_id">Nombre</label>
                                <input type="text" class="form-control" id="nombreProducto_input_id" name="nombreProducto_input_name" placeholder="Nombre de producto" required="">
                            </div>

                            <div class="form-group mb-3">
                                <label class="label" for="descripProducto_textarea_id">Descripción</label>
                                <textarea class="form-control" id="descripProductotextarea_id" name="descripProducto_textarea_name" aria-label="With textarea" placeholder="Descripcion de producto" required></textarea>

                            </div>

                            <div class=" form-group mb-3">
                                <label class="label" for="imagenesProducto_input_id">Imagenes del producto</label>
                                <input class="form-control" type="file" id="imagenesProducto_input_id" name="imagenesProducto_input_name[]" accept="image/*" required="" multiple>
                            </div>

                            <div class=" form-group mb-3">
                                <label class="label" for="videosProducto_input_id">Vídeos del producto</label>
                                <input class="form-control" type="file" id="videosProducto_input_id" name="videosProducto_input_name[]" accept="video/*" required="" multiple>
                            </div>

                            <div class="form-group mb-3">
                                <label class="label" for="categoriasProducto_select_id">Categorías</label>

                                <select class="form-select form-select" aria-label="form-select-sm example" id="categoriasProducto_select_id" name="categoriasProducto_select_name[]" multiple>
                                    <option value="0" selected>Seleccione sus categorías</option>
                                    <?php foreach($allCategorias as $key => $value):?>
                                        <option value="<?php echo $value["Id_Categoria"]?>"><?php echo $value["Nombre_Categoria"]?></option>
                                    <?php endforeach?>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="label" for="modoVenta_select_id">Modo de venta</label>

                                <select class="form-select form-select" aria-label="form-select-sm example" id="modoVenta_select_id" name="modoVenta_select_name" onchange="mostrar();">
                                    <option value="0" selected>Selecciona el modo de venta</option>
                                    <option value="1">Venta</option>
                                    <option value="2">Cotización</option>
                                </select>
                            </div>

                            <div class="form-group mb-3" id="precioProducto_nombre_id">
                                
                            </div>

                            <div class="form-group mb-3">
                                <label class="label" for="cantidadProducto_input_id" style="font-size: 13px!important;">Cantidad de producto</label>
                                <input class="form-control text-center w-25 d-inline" type="number" id="cantidadProducto_input_id" name="cantidadProducto_input_name" title="<i class='fas fa-exclamation-circle'></i> Introduzca un valor correcto" value="1" min="1" style="margin-left: 2%;">
                            </div>

                        </div>

                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn btn-outline-primary" id="crearProducto_button_id" name="crearProducto_button_name">
                                Agregar
                            </button>
                        </div>

                    </form>

                </div>
    </section>

    <!-- SCRIPTS-->
    
    <script type="text/javascript" src="../View/JS/agregarproducto.js"></script>

</body>