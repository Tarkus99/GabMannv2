<header class="row mx-0 d-md-flex
                flex-lg-column align-items-lg-center justify-content-lg-between 
                d-flex flex-column justify-content-center align-items-center
                mb-0 pt-1 pb-md-0 pb-1 gap-4">
    <div class="custom-select d-none d-md-block position-absolute">
        <div class=" d-flex gap-2 align-items-center">
            <span class="material-symbols-outlined">
                translate
            </span>
            <button class="header__language-picker">
                <span>ESP</span>
                <span class="material-symbols-outlined">
                    expand_more
                </span>
            </button>
        </div>
        <ul class="header__languages oculto end-50 right">
            <li><img src="https://cdn-icons-png.flaticon.com/512/323/323329.png" alt=""><span>ENGLISH</span></li>
            <li><img src="https://cdn-icons-png.flaticon.com/512/323/323365.png" alt=""><span>ESPAÑOL</span></li>
            <li><img src="https://cdn-icons-png.flaticon.com/512/197/197560.png" alt="" srcset=""><span>FRANCAIS</span></li>
        </ul>
    </div>
    <div class="header__img-parent col text-center position-relative">
        <a href="index.php"><img src="../vistas/img/Component 5.png"></a>
    </div>
    <div class="nav-parent col-12 p-0 d-none d-md-flex flex-row justify-content-between align-items-center">
        <ul class="m-0 navegacion rounded-start d-flex flex-row align-items-stretch justify-content-center px-1 gap-0">
            <li class="col-6 col-md">
                <a href="productos.php">Products</a>
                <div class="test"></div>
            </li>
            <li class="col-6 col-md"><a href="">News</a>
                <div class="test"></div>
            </li>
            <?php
            if (isset($_COOKIE['nombre'])) {
                echo "<li class='col-6 col-md'>" . $_COOKIE['nombre'] . " <div class='test'></div>
                                </li>";
            } else {
            ?>
                <li class="col-6 col-md"><a class="login" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Log in</a>
                    <div class="test"></div>
                </li>
            <?php } ?>
            <li class="col-6 col-md cart_icon d-flex align-items-center"><a class="d-flex flex-column justify-content-center" href="verCarrito.php">
                    <span class="cart material-symbols-outlined position-relative">
                        shopping_cart
                        <span id="contador-carrito" class="position-absolute rounded-5 bg-success">0</span>
                    </span></a>
                <div class="test">
        </ul>
        <form class="pe-5 row w-100 m-0 header__buscar d-flex flex-row gap-2 align-items-center justify-content-end gap-1">
            <div class="d-flex header__barra-busqueda flex-row gap-2 w-auto align-items-center justify-content-center">
                <span class="material-symbols-outlined">
                    search
                </span>
                <div class="form__group mb-0 pt-0 d-flex align-items-center w-auto">
                    <input type="text" id="searchInput" class="form__field" placeholder="Enter a product">
                    <label for="searchInput" class="form__label">Enter products name</label>
                </div>
            </div>
            <button id="btnBusqueda" class="btnDefault h-50 p-1">Search
                <div class="before">
                </div>
            </button>
        </form>

    </div>
    <button class="btn_open_menu btn btn-primary d-md-none position-absolute end-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
        <span class="material-symbols-outlined">
            menu
        </span>
    </button>
</header>