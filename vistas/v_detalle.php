<link rel="stylesheet" href="../vistas/CSS/detalle.css">
</head>

<body>
    <div class="container-fluid px-0">
        <?php include '../vistas/vistasParciales/menuLateral.php'?>
        <?php include '../vistas/vistasParciales/header.php'?>

        <!--
███    ███  █████  ██ ███    ██ 
████  ████ ██   ██ ██ ████   ██ 
██ ████ ██ ███████ ██ ██ ██  ██ 
██  ██  ██ ██   ██ ██ ██  ██ ██ 
██      ██ ██   ██ ██ ██   ████-->

        <main class="d-flex flex-column">
            <div class='row m-0 d-flex flex-column flex-md-row mb-0 mb-md-2 px-2 align-items-center py-1 path'>
                <div class='col'>
                    <p class='m-0 d-flex align-items-center'>
                        Products <span class='material-symbols-outlined'>chevron_right</span>
                        <span class='text-capitalize'><?= $product['tipo'] ?></span>
                        <span class='material-symbols-outlined'>chevron_right</span><?= $product['nombre'] ?>
                    </p>
                </div>
            </div>
            <div class='product-info row m-0 d-flex flex-column flex-md-row mt-0 mt-md-3 px-2 pt-2 pb-4 pt-md-4 px-2 align-self-center align-items-center justify-content-around'>
                <div class='col col-12 col-md-6 d-flex justify-content-center align-items-center product-info__img flex-fill'>
                    <img src='<?= $product['foto'] ?>'>
                </div>
                <div class='col col-12 col-md-6 detail-text d-flex flex-column gap-2 justify-content-center flex-fill'>
                    <small>COD: <?= $product['idProducto'] ?></small>
                    <h4 class='product-name h2 mb-0'><?= $product['nombre'] ?></h4>
                    <p class='texto'>
                        <?= $product['descripcion'] ?>
                    </p>
                    <div class="d-flex mb-1">
                        <span>&#9734</span>
                        <span>&#9734</span>
                        <span>&#9734</span>
                        <span>&#9734</span>
                        <span>&#9734</span>
                    </div>
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-md-center gap-2">
                        <div>
                            <h id='cantidad_x_precio' class="mb-0 h4"><?= $product['precio'] ?></h><br>
                            <sub>*Taxes and shipping included</sub>
                        </div>
                        <div class="radio-inputs flex-grow-1 justify-content-start">
                            <label>
                                <input class="radio-input" type="radio" name="position">
                                <span class="radio-tile">
                                    <span class="radio-icon">
                                        N
                                    </span>
                                    <span class="radio-label">Neck</span>
                                </span>
                            </label>
                            <label>
                                <input class="radio-input" type="radio" name="position">
                                <span class="radio-tile">
                                    <span class="radio-icon">
                                        B
                                    </span>
                                    <span class="radio-label">Bridge</span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <form action='verCarrito.php' method='post' id='myForm'>
                        <div class="d-flex align-items-center gap-1 mt-2">
                            <span class="material-symbols-outlined restar rounded-1">
                                remove
                            </span>
                            <input type='number' min='1' name='cantidad' class='product-info__cantidad' value='1'>
                            <span class="material-symbols-outlined sumar rounded-1">
                                add
                            </span>
                        </div>
                        <input type="hidden" name="nombre" id='hidden-nombre' value="<?= $product['nombre'] ?>">
                        <input type="hidden" name="precio" id='hidden-precio' value="<?= $product['precio'] ?>">
                        <input type="hidden" name="idProducto" id='hidden-idProducto' value="<?= $product['idProducto'] ?>">
                    </form>

                    <button class='btnDefault' id='product-info__button-buy'>
                        Buy Now
                        <div class='before'></div>
                    </button>
                </div>
            </div>
        </main>
        <section class="mb-3">
            <div class="row m-0 media-parent mt-2">
                <div class="col d-flex flex-column gap-3 justify-content-center align-items-center">
                    <div class="media__title-parent rounded-1 row w-100 justify-content-center">
                        <div class="media__title-text">
                            <h2 class="h1">MEDIA</h2>
                        </div>
                    </div>
                    <div class="media w-50">
                        <iframe src="https://www.youtube.com/embed/gLJ-W6ALH4g">
                        </iframe>
                    </div>
                </div>
            </div>
        </section>
    </div>
     <?php include '../vistas/vistasParciales/login.php';?>
     <?php include '../vistas/vistasParciales/footer.html';?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="../vistas/JS/funciones.js"></script>
    <script src="../vistas/JS/general.js"></script>
    <script src='../vistas/JS/detalle.js'></script>
</body>
</html>