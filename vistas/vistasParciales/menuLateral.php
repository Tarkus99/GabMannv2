<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header bg-light">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body px-0">
        <div class="row w-100 m-0 offcanvas__buscar mb-3 px-3 d-flex flex-column gap-2 align-items-center justify-content-end gap-1">
            <div class="d-flex offcanvas__barra-busqueda p-0 flex-row gap-2 w-auto align-items-center justify-content-end">
                <span class="material-symbols-outlined">
                    search
                </span>
                <div class="form__group position-relative w-auto">
                    <input type="text" id="offcanvas__searchInput" class="form__field" placeholder="Enter a product">
                    <label for="offcanvas__searchInput" class="form__label">Enter products name</label>
                </div>
            </div>
            <button id="offcanvas__btnBusqueda" class="btnDefault h-50 p-1 align-self-start">Search
                <div class="before">
                </div>
            </button>
        </div>
        <ul class="row w-75 m-0 d-flex flex-column align-items-start justify-content-start px-1 gap-3">
            <li>
                <a href="productos.php">Products</a>
                <div class="test"></div>
            </li>
            <li><a href="">News</a>
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
            <li class="cart_icon d-flex align-items-center">
                <a class="d-flex flex-column justify-content-center" href="verCarrito.php">
                    <span class="cart material-symbols-outlined">
                        shopping_cart
                    </span></a>
                <div class="test"></div>
            </li>
        </ul>
        <div class="custom-select mt-3 ms-1">
            <div class=" d-flex gap-2 align-items-center">
                <button id="language-picker">
                    <span>ESP</span>
                    <span class="material-symbols-outlined">
                        expand_more
                    </span>
                </button>
            </div>
            <ul class="languages oculto">
                <li><img src="https://cdn-icons-png.flaticon.com/512/323/323329.png" alt=""><span>ENGLISH</span></li>
                <li><img src="https://cdn-icons-png.flaticon.com/512/323/323365.png" alt=""><span>ESPAÑOL</span></li>
                <li><img src="https://cdn-icons-png.flaticon.com/512/197/197560.png" alt="" srcset=""><span>FRANCAIS</span></li>
            </ul>
        </div>
    </div>
</div>