const goToHumcuckers = document.querySelector('#go-to-humbuckers');
const goToSingle = document.querySelector('#go-to-single');
const goToP90 = document.querySelector('#go-to-p90');

goToHumcuckers.addEventListener('click', ()=>{
    sessionStorage.setItem('category', '[1]');
    goToProducts();
})


goToSingle.addEventListener('click', ()=>{
    sessionStorage.setItem('category', '[2]');
    goToProducts();
})


goToP90.addEventListener('click', ()=>{
    sessionStorage.setItem('category', '[3]');
    goToProducts();
})

function goToProducts() {
    location.assign('http://localhost/proyecto_servidor_final/controlers/productos.php');
}

