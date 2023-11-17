<link rel="stylesheet" href="../vistas/CSS/products.css">
</head>

<body>
    <div id="openFilter" class="filter-icon p-1 d-flex flex-row align-items-center">
        <span class="material-symbols-outlined">
            filter_alt_off
        </span>
    </div>

    <div id="filter" class="main pickup_type rounded-end-1 d-flex flex-column gap-2" role="group" aria-label="Basic checkbox toggle button group">
        <div class="h6">Tipo de pastilla</div>

        <div class="d-flex flex-row align-items-center gap-3">
            <input type="checkbox" class="filter__humbucker form-check-input m-0" id="btncheck1" autocomplete="off" value="humbucker">
            <label class="btn btn-outline-primary hum-label" for="btncheck1">Humbucker</label>
        </div>

        <div class="d-flex flex-row align-items-center gap-3">
            <input type="checkbox" class="filter__single form-check-input m-0" id="btncheck2" autocomplete="off" value="single coil">
            <label class="btn btn-outline-primary single-label" for="btncheck2">Single coil</label>
        </div>

        <div class="d-flex flex-row align-items-center gap-3">
            <input type="checkbox" class="filter__p90 form-check-input m-0" id="btncheck3" autocomplete="off" value="p90">
            <label class="btn btn-outline-primary p90-label" for="btncheck3">P-90</label>
        </div>
    </div>

    <div class="container-fluid px-0">
        <?php include '../vistas/vistasParciales/menuLateral.php'?>
        <?php include '../vistas/vistasParciales/header.php'?>

        <!--
███    ███  █████  ██ ███    ██ 
████  ████ ██   ██ ██ ████   ██ 
██ ████ ██ ███████ ██ ██ ██  ██ 
██  ██  ██ ██   ██ ██ ██  ██ ██ 
██      ██ ██   ██ ██ ██   ████-->
        <main class="row m-0 products-parent" name="main">
            <!-- <div class="col">
                <div class="row prueba"> -->
            <div class="col d-flex flex-column justify-content-center align-items-center gap-1 border-bottom py-2">
                <div class="products__title-parent rounded-1 row w-100 justify-content-center">
                    <div class="col-12 products__title-text py-1 py-md-3">
                        <h2 class="h1">PRODUCTS</h2>
                    </div>
                </div>
                <div class="row sort-by-row px-lg-5 px-3 flex-col flex-md-row w-100 gap-1 gap-md-0 gx-4 my-2 justify-content-end justify-content-md-between">
                    <div class="info-busqueda d-flex gap-4 p-0">

                    </div>
                    <div class="select-parent align-self-end p-0 position-relative">
                        <select id="select-sort-by" required>
                            <option value="" disabled selected>Sort By...</option>
                            <option value="1">A-Z</option>
                            <option value="2">Z-A</option>
                            <option value="3">Price Low to Hight</option>
                            <option value="4">Price Hight to Low</option>
                            <option value="5">Newest</option>
                        </select>
                    </div>
                </div>

                <div class="products__cards-container row w-100 gx-4 row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-center align-self-center px-lg-5">
                    <?= $html; ?>
                </div>
            </div>
        </main>
    </div>
    <?php include '../vistas/vistasParciales/login.php';?>
    <?php include '../vistas/vistasParciales/footer.html';?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script>
        const allProducts = <?= $rawProducts; ?>;
    </script>
    <script src="../vistas/JS/funciones.js"></script>
    <script src="../vistas/JS/general.js"></script>
    <script src="../vistas/JS/products.js"></script>
</body>
</html>