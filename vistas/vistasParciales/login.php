<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered justify-content-center">

            <div class="modal-content login-form px-4 py-3 d-flex flex-row gap-1">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>


                <form class="form-detail" id="modal__login-form" action="validar.php" method="post">
                    <h2>Log in</h2>
                    <small class="modal__error-message"></small>
                    <!-- <div class="form-row">
                        <input type="text" name="dni" id="full-name" class="input-text" placeholder="Your DNI" required>
                    </div> -->
                    <input type="hidden" name="destino" value="index.php">
                    <input type="hidden" name="name" id="name-hidden" value="">
                    <input type="hidden" name="dniCliente" id="dni-hidden" value="">
                    <div class="form__group">
                        <input type="email" id="modal__input-email" class="form__field" name="email" placeholder="Your Email">
                        <label for="email" class="form__label">Your Email</label>
                    </div>
                    <div class="form__group">
                        <input type="password" id="modal__input-pass" class="form__field" name="pass" placeholder="Your Password">
                        <label for="Password" class="form__label">Your Password</label>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="recuerdame">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <div class="form-row-last d-flex justify-content-between">
                        <button type="button" id="changeToRegister" class="btnDefaultReverse">
                            Don't have an account?
                            <div class="before">
                            </div>
                        </button>
                        <button type="submit" id="modal__input-login" class="btnDefault">
                            Sign in
                            <div class="before">
                            </div>
                        </button>
                        <!-- <input id="" type="submit" name="register" class="register btnDefault" value="Sign in"> -->
                    </div>
                </form>
            </div>
        </div>
    </div>