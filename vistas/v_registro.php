<link rel="stylesheet" href="../vistas/CSS/registro.css">
</head>

<body>
    <div class="container-xl registro__content mt-3">
        <div class="registro__back-parent w-auto">
            <a href="<?= $destino ?>" class=" d-flex flex-row gap-2 align-items-center p-1">
                <span class="material-symbols-outlined">
                    arrow_back
                </span>
                <h2 class="h2 ">GabMann</h2>
            </a>
        </div>

        <div class="form-parent row w-100 m-0 justify-content-center rounded-1">
            <form class="form-detail w-75 d-flex flex-column" id="registro__form" action="http://localhost/proyecto_servidor_final/controlers/validar.php" method="post">
                <h2 class="text-center">Sign Up</h2>

                <input type="hidden" name="destino" value="<?= $destino ?>">
                <fieldset>
                    <div class="form__group name-group">
                        <span class="material-symbols-outlined input-icon">
                            person
                        </span>
                        <div class="flex-grow-1 position-relative">
                            <input type="text" id="registro__input-name" class="form__field" name="name" placeholder="Your Name" required>
                            <label for="registro__input-name" class="form__label">Your Name and Surname</label>
                            <small class="registro__error-message">Name and surname must look like 'Juan García'</small>
                        </div>
                    </div>
                    <div class="form__group dni-group">
                        <span class="material-symbols-outlined input-icon">
                            badge
                        </span>
                        <div class="flex-grow-1 position-relative">
                            <input type="text" id="registro__input-dni" class="form__field" name="dniCliente" placeholder="Your DNI" required>
                            <label for="registro__input-dni" class="form__label">Your DNI</label>
                            <small class="registro__error-message">DNI must fulfill restrictions.</small>
                        </div>
                    </div>
                    <div class="form__group direction-group">
                        <span class="material-symbols-outlined input-icon">
                            badge
                        </span>
                        <div class="flex-grow-1 position-relative">
                            <input type="text" id="registro__input-direccion" class="form__field" name="direccion" placeholder="Your Adress">
                            <label for="registro__input-direccion" class="form__label">Your Adress</label>
                        </div>
                    </div>
                    <div class="form__group email-group">
                        <span class="material-symbols-outlined input-icon">
                            mail
                        </span>
                        <div class="flex-grow-1 position-relative"> 
                            <input type="email" id="registro__input-email" class="form__field" name="email" placeholder="Your Email" required>
                            <label for="registro__input-email" class="form__label">Your Email</label>
                            <small class="registro__error-message"></small>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form__group pass-group-1">
                        <span class="material-symbols-outlined help">
                            help
                        </span>
                        <span class="material-symbols-outlined input-icon">
                            lock
                        </span>
                        <div class="flex-grow-1 position-relative">
                            <input type="password" id="registro__input-pass" class="form__field" name="pass" placeholder="Your Password" required>
                            <label for="Password" class="form__label"></label>
                            <small class="registro__error-message">Password must fulfill restrictions.</small>
                        </div>
                    </div>
                    <div class="form__group pass-group-2">
                        <span class="material-symbols-outlined input-icon">
                            enhanced_encryption
                        </span>
                        <div class="flex-grow-1 position-relative">
                            <input type="password" id="registro__input-pass-repeat" class="form__field" name="" placeholder="Repeat Your Password" required>
                            <label for="Password" class="form__label">Repeat Your Password</label>
                            <small class="registro__error-message">Passwords doesn't match</small>
                        </div>
                    </div>
                </fieldset>
                <div class="form-row-last d-flex flex-column justify-content-between my-2">
                    <button type="button" id="registro__button-finish" class="btnDefault">
                        Finish
                        <div class="before">
                        </div>
                    </button>
                    <!-- <input id="" type="submit" name="register" class="register btnDefault" value="Sign in"> -->
                </div>
            </form>
        </div>
    </div>
    <script src="../vistas/JS/funciones.js"></script>
    <script src="../vistas/JS/registro.js"></script>
</body>

</html>