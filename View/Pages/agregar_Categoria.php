<?php
ob_start();
if (isset($_SESSION['Usuario'])) {

    //$_SESSION['Usuario']= $usuarioLogeado->getId_Usuario();
    $idUsuarioLogeado = $_SESSION['Usuario'];
    $usuarioLogeado = Usuarios_DAO::GetUserById($idUsuarioLogeado);
} else {
}
?>

<header>
    <title>Agregar Categoria</title>
    <link rel="stylesheet" href="../View/CSS/categorias.css">
</header>


<body>
    <section class="d-flex   align-items-center" style="background-color: #f2f1eb; ">
        <div class="container-fluid" id="main">

            <div class="card     shadow-2-strong card-registration" style="border-radius: 15px;">

                <div class="card-header   col-auto text-center mt-1" style="background-color: white; border-bottom: white;">
                    <div class="col-auto text-center">
                        <img src="../View/img/categorias.png" width="25%" class="rounded mx-auto d-block mb-3" alt="">
                    </div>
                    <h1>Crear Categoría</h1>
                </div>

                <div class="card-body    ">

                    <form method="POST" class="container-fluid" id="categoria_form" >

                        <div class="container-fluid">
                            

                            <div class="form-group mb-3">
                                <label class="label" for="nombreCategoria_input_id">Nombre Categoría</label>
                                <input type="text" class="form-control" id="nombreCategoria_input_id" name="nombreCategoria_input_name" placeholder="Nombre" required="">
                            </div>

                            <div class="form-group mb-3">
                                <label class="label" for="descripCategoria_textarea_id">Descripción</label>
                                <textarea class="form-control" id="descripCategoria_textarea_id" name="descripCategoria_textarea_name" aria-label="With textarea" placeholder="Descripcion de categoría" required></textarea>

                            </div>

                            <input type="hidden" name="UsuarioCreador_input_name" value="<?php echo $usuarioLogeado->getId_Usuario() ?>">

                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-outline-primary" id="crearCategoria_button_id" name="crearCategoria_button_name">
                                    Crear
                                </button>
                            </div>


                    </form>
                </div>
            </div>
        </div>

    </section>

    <!-- SCRIPTS-->
    <!-- <script type="text/javascript" src="../View/Plugins/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../View/Plugins/js/jquery-3.6.1.min.js"></script> -->
    <!-- <script type="text/javascript" src="../View/Plugins/js/additional-methods.js"></script> -->
    <!-- <script type="text/javascript" src="../View/JS/validation.js"></script> -->
    <!-- <script type="text/javascript" src="../View/Plugins/js/jqueryvalidate.min.js"></script> -->
    <script type="text/javascript" src="../View/Plugins/js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="../View/JS/categorias.js"></script>
    <!-- <script type="text/javascript" src="../View/Plugins/js/owl.carousel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script> -->

</body>