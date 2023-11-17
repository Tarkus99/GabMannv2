let arr = document.cookie.split(';');
arr = arr.map(a => a = a.trim());
let cookies = {};
for (const i of arr) {
    let aux = i.split('=');
    cookies[aux[0]] = aux[1];
}
const idUnico = cookies.idUnico || false;
const dniCliente = cookies.dni || false;

const form = document.querySelector('form');
const registroButtonFinish = document.querySelector('#registro__button-finish');
const nameRegex = /[A-Z]{1}[a-z]+\s[A-Z]{1}[a-z]+$/;
const dniRegex = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/;
const passRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/
let code;
let str;

let label = document.querySelector('.pass-group-1').querySelector('label');
let passInput = document.querySelector('.pass-group-1').querySelector('input');

if (window.screen.width < 421)
    str = 'Your Password'
else
    str = 'Password between 8 and 20 characters, 1 uppercase and 1 number';
label.innerText = str;

passInput.addEventListener('focus', (e) => {
    label.innerText = 'Your Password';
})

const changeLabelText = () => {
    if (window.screen.width < 421){
        console.log("hola");
        str = 'Your Password'
    }else
        str = "Password between 8 and 20 characters, 1 uppercase and 1 number";
    label.innerText = str;
}

passInput.addEventListener('blur', changeLabelText);
window.onresize = changeLabelText;

registroButtonFinish.addEventListener('click', (e) => {
    e.preventDefault();
    limpiarErrores();
    const data = Object.fromEntries(new FormData(form));

    if (!nameRegex.test(data.name)) {
        document.querySelector('.name-group').querySelector('.registro__error-message').classList.toggle('ocultar');
        return;
    }

    if (!data.dniCliente || !dniRegex.test(data.dniCliente)) {
        document.querySelector('.dni-group').querySelector('.registro__error-message').classList.toggle('ocultar');
        return;
    }
    if (!data.pass || !passRegex.test(data.pass)) {
        document.querySelector('.pass-group-1').querySelector('.registro__error-message').classList.toggle('ocultar');
        return;
    }
    if (document.querySelector('#registro__input-pass-repeat').value !== document.querySelector('#registro__input-pass').value) {
        document.querySelector('.pass-group-2').querySelector('.registro__error-message').classList.toggle('ocultar');
        return;
    }

    registrarse(data);
    /* const jsonData = JSON.stringify(data);

    let options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: jsonData
    };

    fetch(`http://localhost/proyecto_servidor_final/servicioClientes/service.php`, options)
        .then(response => {
            return response.json();
        }).then(data_ => {
            if (data_.succes) {
                alert("Welcome " + data_.detalle);
                if (idUnico) {
                    let options = {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ 'idUnico': idUnico, 'dniCliente': data.dniCliente})
                    };
                    fetch(`http://localhost/proyecto_servidor_final/servicioCarritos/service.php`, options)
                        .then(response => response.json())
                        .then(data_ => {
                            if (data_.success) {
                                alert('Se han actualizado todas las líneas del carrito con tu DNI');
                                form.submit();
                            }else{
                                alert(data_.detalle)
                            }
                        }).catch(error => {
                            console.log(error);
                        });
                }
                form.submit();
            } else {
                throw Error(data.detalle);
            }
        })
        .catch(error => alert(error)); */
})

function limpiarErrores() {
    let errores = document.querySelectorAll('.registro__error-message');
    for (const e of errores) {
        e.classList.remove('ocultar');
    }
}