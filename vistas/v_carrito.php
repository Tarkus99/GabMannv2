<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GabMann</title>
    <link rel="stylesheet" href="../vistas/CSS/generalCss.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../vistas/CSS/carrito.css">
</head>

<body class="flex flex-col items-center position-relative">
    <div class="w-11/12 lg:w-10/12 carrito__content mt-3">
        <div class="carrito__back-parent flex flex-row justify-between items-center w-auto">
            <a href="../controlers/productos.php" class=" flex flex-row gap-2 items-center p-1">
                <span class="material-symbols-outlined">
                    arrow_back
                </span>
                <h2 class="text-3xl">GabMann</h2>
            </a>
            <?php
            if (!isset($_COOKIE['dni'])) {
                echo
                "<button
                     class='btnDefaultAux' id='button-open-login'>
                        Log in
                        <div class='before'></div>
                </button>";
            } else {
                echo
                "<p>" . $_COOKIE['nombre'] . "</p>";
            }
            ?>
        </div>

        <div class="form-parent row w-auto m-0 flex flex-col justify-content-center align-items-center rounded bg-slate-100">
            <h2 class="text-center text-3xl my-2">Cart <span class="material-symbols-outlined text-2xl">
                    shopping_basket
                </span></h2>
            <form class="form-detail flex flex-col " id="registro__form" action="http://localhost/proyecto_servidorv2/controlers/validar.php" method="post">
                <fieldset id="items-parent" class="flex flex-col gap-3"></fieldset>
            </form>
            <div class="self-end w-fit mt-2 mr-5"><p class="w-fit font-bold">Total: <span id="span-total">0</span>€</p></div>
            <div class='form-row-last flex flex-row justify-between my-3 px-4 gap-2'>
                <button type='button' id='carrito__button-update' class='btnDefaultReverse' disabled>
                    Update
                    <div class='before'>
                    </div>
                </button>
                <button type='button' id='carrito__button-check-out' class='btnDefault'>
                    Check Out
                    <div class='before'>
                    </div>
                </button>
            </div>
        </div>
    </div>

    <dialog id="loginDialog" aria-hidden="true" class="mt-32 mx-auto w-11/12 sm:w-3/4 md:w-[500px]" aria-labelledby="exampleModalToggleLabel" tabindex="-1">

        <div class="modal-content close login-form px-4 py-3 flex flex-row gap-1">
            <button onclick="closeDialog()" 
            class="absolute top-1 right-1 bg-white rounded-md p-1 inline-flex 
             items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100
             focus:outline-none focus:ring-1 focus:ring-inset focus:ring-indigo-500">
                <span class="sr-only">Close menu</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <form class="form-detail" id="modal__login-form" action="validar.php" method="post">
                <h6 class="h6 text-sm" id="info-checkout">You must be identified before check out.</h6>
                <h2 class="text-2xl sm:text-3xl">Log in</h2>
                <small class="modal__error-message"></small>
                <input type="hidden" name="destino" value="verCarrito.php">
                <input type="hidden" name="name" id="name-hidden" value="">
                <input type="hidden" name="dniCliente" id="dni-hidden" value="">
                <div class="form__group">
                    <input type="email" id="modal__input-email" class="form__field text-sm md:text-base" name="email" placeholder="Your Email">
                    <label for="email" class="form__label">Your Email</label>
                </div>
                <div class="form__group">
                    <input type="password" id="modal__input-pass" class="form__field text-sm md:text-base" name="pass" placeholder="Your Password">
                    <label for="Password" class="form__label">Your Password</label>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="recuerdame">
                    <label class="form-check-label text-sm" for="exampleCheck1">Check me out</label>
                </div>
                <div class="form-row-last flex justify-between flex-col sm:flex-row gap-1">
                    <button type="button" id="changeToRegister" class="btnDefaultReverse text-xs md:text-base">
                        Don't have an account?
                        <div class="before">
                        </div>
                    </button>
                    <button type="button" id="modal__input-login" class="btnDefault text-xs md:text-base">
                        Sign in
                        <div class="before">
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </dialog>
    <script>
        const idProducto = '<?= $idProducto; ?>';
        const cantidad = '<?= $cantidad; ?>';
        const esCompra = <?= $esCompra; ?>;
        const precio = <?= $precio;?>
    </script>
    <script src="../vistas/JS/funciones.js"></script>
    <script src="../vistas/JS/general.js"></script>
    <script src="../vistas/JS/carrito.js"></script>
</body>

</html>