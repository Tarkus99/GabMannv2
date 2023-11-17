
const buttonComprar = document.querySelector('#product-info__button-buy');
const showPrecio = document.querySelector('#cantidad_x_precio');
const cantidadInput = document.querySelector('.product-info__cantidad');
const precio = parseFloat(document.querySelector('#hidden-precio').value);
const myForm = document.querySelector('#myForm');

const restar = document.querySelectorAll('.restar');
const sumar = document.querySelectorAll('.sumar');

for (const r of restar) {
    r.addEventListener('click', () => {
        let cantidad = r.parentElement.querySelector('.product-info__cantidad');
        if (cantidad.value > 0) {
            cantidad.value = parseInt(cantidad.value) - 1;
        }
    })
}

for (const s of sumar) {
    s.addEventListener('click', () => {
        let cantidad = s.parentElement.querySelector('.product-info__cantidad');
        cantidad.value = parseInt(cantidad.value) + 1;
    })
}

cantidadInput.addEventListener('change', (e) => {
    showPrecio.innerText = parseInt(c.value) * precio;
})


buttonComprar.addEventListener('click', (e) => {
    myForm.submit();
})

document.querySelector('#hidden-destino').value = location.toString();


