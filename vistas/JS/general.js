let arr = document.cookie.split(';');
arr = arr.map(a => a = a.trim());
let cookies = {};
for (const i of arr) {
    let aux = i.split('=');
    cookies[aux[0]] = aux[1];
}
const idUnico = cookies.idUnico || false;
const dniCliente = cookies.dni || false;

const btnBusqueda = document.querySelector('#btnBusqueda');
const searchInput = document.querySelector('#searchInput');
const changeToRegister = document.querySelector('#changeToRegister');

const modalFormLogin = document.querySelector('#modal__login-form');
const modalInputLogin = document.querySelector('#modal__input-login');

let contador;
if (contador = localStorage.getItem('contador-carrito')) {
    const item = document.querySelector('#contador-carrito');
    if (item !== null)
        item.innerText = contador;
}

if (btnBusqueda != null) {
    btnBusqueda.addEventListener('click', (e) => {
        e.preventDefault();
        if (searchInput.value !== '') {
            sessionStorage.setItem('name', searchInput.value);
            location.assign(`http://localhost/proyecto_servidor_final/controlers/productos.php`);
        }
        else
            alert("No puedes dejar el campo vacío.");
    })
}

changeToRegister.addEventListener('click', (e) => {
    let str = window.location.toString();
    let aux = str.split('/');
    location.assign(`registro.php?destino=${aux[aux.length - 1]}`);
})

modalInputLogin.addEventListener('click', iniciarSesion);

const botonLengua = document.querySelector('#language-picker');
const listaLenguas = document.querySelector('.languages');

if(botonLengua && listaLenguas){
botonLengua.addEventListener('click', (e) => {
    listaLenguas.classList.toggle('oculto');
})

const lis = listaLenguas.querySelectorAll('li');
for (const l of lis) {
    l.addEventListener('click', (e)=>{
        botonLengua.querySelector('span').textContent = l.querySelector('span').textContent.substring(0,3);
        listaLenguas.classList.toggle('oculto');
    })
}
}

/********************************************* */
const errorAnimation = [
    { translate: "2% 0" },
    { translate: "-4% 0" },
    { translate: "0% 0" },
];

const errorTiming = {
    duration: 150,
    iterations: 4,
};