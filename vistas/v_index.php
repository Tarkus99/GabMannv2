<link rel="stylesheet" href="../vistas/CSS/index.css">
</head>

<body>
    <div class="container-fluid px-0">

        <?php include '../vistas/vistasParciales/menuLateral.php' ?>

        <div class="container-fluid sub-parent">
            <?php include '../vistas/vistasParciales/header.php' ?>

            <!--
███    ███  █████  ██ ███    ██ 
████  ████ ██   ██ ██ ████   ██ 
██ ████ ██ ███████ ██ ██ ██  ██ 
██  ██  ██ ██   ██ ██ ██  ██ ██ 
██      ██ ██   ██ ██ ██   ████-->

            <main class="row mx-0 rounded w-100">
                <div class="col col-12 col-lg-6 py-4 px-0">
                    <div class="row mx-0 pe-2">
                        <div class="col col-12
                             offset-md-1 offset-lg-2
                            col-md-10
                             d-flex flex-column align-items-end justify-content-center gap-3 px-0">
                            <div class="main__texto gap-2 d-flex flex-column justify-content-center align-items-start p-4 ">
                                <h1 id="main__texto__title">
                                    <span>AUTHENTIC</span><br> VINTAGE TONE.<br>
                                    <span>FINEST</span><br> IN THE WORLD.
                                </h1>
                                <p class="main__texto__parr col-12 col-xl-10 d-none d-sm-block">"Lorem ipsum dolor, sit
                                    amet consectetur
                                    adipisicing
                                    elit. Odio
                                    facere cupiditate cum
                                    labore
                                    distinctio ex accusamus, asperiores, praesentium unde ducimus qui laudantium
                                    molestias
                                    nam
                                    officiis reiciendis quas. Minima, voluptates veniam."</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>


        <!--
███████ ███████  ██████ ████████ ██  ██████  ███    ██ 
██      ██      ██         ██    ██ ██    ██ ████   ██ 
███████ █████   ██         ██    ██ ██    ██ ██ ██  ██ 
     ██ ██      ██         ██    ██ ██    ██ ██  ██ ██ 
███████ ███████  ██████    ██    ██  ██████  ██   ████  11111-->
        <section class="row mx-0 mt-4 categories-parent">
            <div class="col d-flex flex-column align-items-center justify-content-center gap-2 py-2">
                <div class="categories__title-parent row w-100 justify-content-center">
                    <div class="col-12 categories__title-text titulo_top_sellers py-3">
                        <h2 class="h1">CATEGORIES</h2>
                    </div>
                </div>

                <div class="categories__cards-container container rounded-1">
                    <div class="row m-0 px-0 px-sm-5 px-md-0 pb-3 gy-4 row-cols-md-3 row-cols-sm-2 row-cols-1">
                        <div class="col px-lg-4">
                            <a id="go-to-humbuckers">
                                <div class="card align-items-center flex-column gap-3">
                                    <img src="../vistas/img/1840688.png" class="card-img-top vector" alt="...">
                                    <div class="card-body p-0 justify-content-center">
                                        <h4 class="card-title h4">Humbucker</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col px-lg-4">
                            <a id="go-to-single">
                                <div class="card align-items-center flex-column gap-3">
                                    <img src="../vistas/img/1840680.png" class="card-img-top vector" alt="...">
                                    <div class="card-body p-0 justify-content-center">
                                        <h4 class="card-title h4">Single coil</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col px-lg-4 ">
                            <a id="go-to-p90">
                                <div class="card align-items-center flex-column gap-3">
                                    <img src="../vistas/img/1840680.png" class="card-img-top vector" alt="...">
                                    <div class="card-body p-0 justify-content-center">
                                        <h4 class="card-title h4">P-90</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--
███████ ███████  ██████ ████████ ██  ██████  ███    ██ 
██      ██      ██         ██    ██ ██    ██ ████   ██ 
███████ █████   ██         ██    ██ ██    ██ ██ ██  ██ 
     ██ ██      ██         ██    ██ ██    ██ ██  ██ ██ 
███████ ███████  ██████    ██    ██  ██████  ██   ████ 22222-->
        <section class="sellers-parent row w-100 mx-0 my-4 py-3 justify-content-center gap-2">
            <div class="sellers__title-parent row  justify-content-center">
                <div class="col-12 sellers___title-text py-3">
                    <h2 class="h1">TOP SELLERS</h2>
                </div>
            </div>
            <div id="carouselExampleAutoplaying" class="carousel" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active sellers__cards-container">
                        <div class="row m-0 px-0 px-sm-5 px-md-0 pb-3 gy-4">
                            <div class="col-12 col-md-6 offset-lg-2 col-lg-4 px-lg-4">
                                <div class="card h-100 align-items-center product-card">
                                    <img src="../images/hum1.png" class="card-img-top product-img" alt="...">
                                    <div class="card-body flex-grow-0">
                                        <h5 class="card-title">GabMann Original PAF</h5>
                                        <p class="card-text d-sm-block d-none">Some quick example text to build on the
                                            card
                                            title and make up
                                            the bulk
                                            of the card's
                                            content.</p>
                                        <button class="btnDefault"><a href="#">See details</a>
                                            <div class="before"></div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 px-lg-4 ">
                                <div class="card h-100 align-items-center product-card">
                                    <img src="https://www.seymourduncan.com/wp-content/uploads/2019/08/Classic-Passive-Humbucker-Pickup-11107-01-7Str.png" class="card-img-top product-img" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">GabMann '59</h5>
                                        <p class="card-text  d-sm-block d-none">Some quick example text to build on the
                                            card
                                            title and make up
                                            the
                                            bulk
                                            of the card's
                                            content.</p>
                                        <button class="btnDefault"><a href="#">See details</a>
                                            <div class="before"></div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item sellers__cards-container">
                        <div class="row m-0 px-0 px-sm-5 px-md-0 pb-3 gy-4">
                            <div class="col-12 col-md-6 col-lg-4 offset-lg-2 px-lg-4">
                                <div class="card h-100 align-items-center product-card">
                                    <img src="../images/hum1.png" class="card-img-top product-img" alt="...">
                                    <div class="card-body flex-grow-0">
                                        <h5 class="card-title">GabMann Original PLO</h5>
                                        <p class="card-text d-sm-block d-none">Some quick example text to build on the
                                            card
                                            title and make up
                                            the bulk
                                            of the card's
                                            content.</p>
                                        <button class="btnDefault"><a href="#">See details</a>
                                            <div class="before"></div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 px-lg-4 ">
                                <div class="card h-100 align-items-center product-card">
                                    <img src="https://www.seymourduncan.com/wp-content/uploads/2019/08/Classic-Passive-Humbucker-Pickup-11107-01-7Str.png" class="card-img-top product-img" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">GabMann '54</h5>
                                        <p class="card-text  d-sm-block d-none">Some quick example text to build on the
                                            card
                                            title and make up
                                            the
                                            bulk
                                            of the card's
                                            content.</p>
                                        <button class="btnDefault"><a href="#">See details</a>
                                            <div class="before"></div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
    </div>
    <?php include '../vistas/vistasParciales/login.php'; ?>
    <?php include '../vistas/vistasParciales/footer.html'; ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="../vistas/JS/funciones.js"></script>
    <script src="../vistas/JS/general.js"></script>
    <script src="../vistas/JS/index.js"></script>
</body>

</html>