let optionsPut = {
    method: "PUT",
    headers: {
        "Content-Type": "application/json",
    },
};

let optionsPost = {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
    },
};

function iniciarSesion(e) {
    e.preventDefault();
    const error = document.querySelector(".modal__error-message");
    const email = document.querySelector("#modal__input-email");
    const pass = document.querySelector("#modal__input-pass");

    if (pass.value && email.value) {
        fetch(
            `http://localhost/proyecto_servidor_final/servicioClientes/service.php?email=${email.value}&pass=${pass.value}`
        )
            .then((response) => response.json())
            .then((cliente) => {
                if (cliente.succes) {
                    alert("Welcome " + cliente.detalle.nombre);
                    document.querySelector("#name-hidden").value =
                        cliente.detalle.nombre;
                    document.querySelector("#dni-hidden").value =
                        cliente.detalle.dniCliente;
                    document.querySelector("#modal__input-pass").value = "";
                    if (idUnico)
                        updateDniCarrito(
                            modalFormLogin,
                            cliente.detalle.dniCliente
                        );
                    else {
                        modalFormLogin.submit();
                    }
                    return;
                } else {
                    error.innerText = "E-mail or password incorrect.";
                    error.style.display = "block";
                    modalFormLogin.parentElement.animate(
                        errorAnimation,
                        errorTiming
                    );
                }
            });
    } else {
        error.innerText = "Debes rellenar todos los campos.";
        error.style.display = "block";
        modalFormLogin.parentElement.animate(errorAnimation, errorTiming);
    }
}

function registrarse(data) {
    let options = { ...optionsPost };
    options.body = JSON.stringify(data);

    fetch(
        `http://localhost/proyecto_servidor_final/servicioClientes/service.php`,
        options
    )
        .then((response) => response.json())
        .then((cliente) => {
            if (cliente.succes) {
                alert("Welcome " + cliente.detalle);
                if (idUnico)
                  updateDniCarrito(form, data.dniCliente);
                else
                  form.submit();
            } else throw Error(data.detalle);
        })
        .catch((error) => alert(error));
}

function updateDniCarrito(form, dni) {
    let options = { ...optionsPut };
    options.body = JSON.stringify({ idUnico: idUnico, dniCliente: dni });

    fetch(
        `http://localhost/proyecto_servidor_final/servicioCarritos/service.php`,
        options
    )
        .then((response) => response.json())
        .then((data_) => {
            if (data_.success) {
                alert(
                    "Se han actualizado todas las líneas del carrito con tu DNI"
                );
                form.submit();
            } else alert(data_.detalle);
        })
        .catch((error) => console.log(error));
}
