document.querySelector('main').scrollIntoView(true);
const openFilter = document.querySelector('#openFilter');
const filter = document.querySelector('#filter');
const container = document.querySelector('.products__cards-container');
const selectSort = document.querySelector('#select-sort-by');
const infoBusqueda = document.querySelector('.info-busqueda');
let showing = [];
const sorts = {
    'alphabeticUp': "1",
    'alphabeticDown': "2",
    'priceUp': "3",
    'priceDown': "4",
    'newest': "5"
}

openFilter.addEventListener('click', (e) => {
    openFilter.classList.toggle('open-icon');
    if (openFilter.hasAttribute('open')) {
        openFilter.querySelector('span').innerText = 'filter_alt_off';
        openFilter.removeAttribute('open');
        filter.style.translate = "-100%";
    } else {
        openFilter.querySelector('span').innerText = 'tune';
        openFilter.setAttribute('open', "");
        filter.style.translate = "0%";
    }
    filter.classList.toggle('open-filter');
})

selectSort.addEventListener('change', (e) => {
    let filtered = [];
    container.innerHTML = '';
    switch (selectSort.value) {
        case sorts.alphabeticUp:
            filtered = structuredClone(showing);
            filtered.sort((a, b) => a.nombre.localeCompare(b.nombre));
            /* filtered = showing.toSorted((a, b) => a.nombre.localeCompare(b.nombre)); */
            insertItems(filtered);
            break;
        case sorts.alphabeticDown:
            filtered = structuredClone(showing);
            filtered.sort((a, b) => b.nombre.localeCompare(a.nombre));
            /* filtered = showing.toSorted((a, b) => b.nombre.localeCompare(a.nombre)); */
            insertItems(filtered);
            break;
        case sorts.priceUp:
            filtered = structuredClone(showing);
            filtered.sort((a, b) => a.precio - b.precio);
            /* filtered = showing.toSorted((a, b) => a.precio - b.precio); */
            insertItems(filtered);
            break;
        case sorts.priceDown:
            filtered = structuredClone(showing);
            filtered.sort((a, b) => b.precio - a.precio);
            /* filtered = showing.toSorted((a, b) => b.precio - a.precio); */
            insertItems(filtered);
            break;
        case sorts.newest:

            break;
        default:
            break;
    }
})

filter.addEventListener('click', (e) => {
    let filtered = [];
    let aux = [];
    if (e.target.tagName === 'INPUT') {
        infoBusqueda.innerHTML = '';
        container.innerHTML = '';
        isName();

        if (document.querySelector('#btncheck1').checked) {
            filtered = showing.filter(a => a.tipo == 'humbucker');
            aux = aux.concat(filtered);
            addBusquedaInfo('Type', `Humbucker`, 1);
            addSessionInfo(1);
        } else {
            quitSessionInfo(1);
        }


        if (document.querySelector('#btncheck2').checked) {
            filtered = showing.filter(a => a.tipo == 'single coil');
            aux = aux.concat(filtered);
            addBusquedaInfo('Type', `Single Coil`, 2);
            addSessionInfo(2);
        } else {
            quitSessionInfo(2);
        }


        if (document.querySelector('#btncheck3').checked) {
            filtered = showing.filter(a => a.tipo == 'p90');
            aux = aux.concat(filtered);
            addBusquedaInfo('Type', `P-90`, 3);
            addSessionInfo(3);
        } else {
            quitSessionInfo(3);
        }

        if (aux.length !== 0)
            showing = structuredClone(aux);
            
    }
    insertItems(showing);
})

function addSessionInfo(value) {
    if (sessionStorage.getItem('category') !== null) {
        let aux = JSON.parse(sessionStorage.getItem('category'));
        if (!aux.includes(value)) {
            aux.push(value);
            sessionStorage.setItem('category', JSON.stringify(aux));
        }
    } else {
        sessionStorage.setItem('category', JSON.stringify([value]));
    }
}

function quitSessionInfo(value) {
    if (sessionStorage.getItem('category') !== null) {
        let aux = JSON.parse(sessionStorage.getItem('category'));
        aux = aux.filter(a => a != value);
        sessionStorage.setItem('category', JSON.stringify(aux));
    }
}

function insertItems(filtered) {
    for (const i of filtered) {
        container.innerHTML +=
            `
                <div class='col'>
                <div class='card align-items-center product-card'>
                    <img src='${i.foto}' class='card-img-top product-img'>
                <div class='card-body w-100'>
                    <h5 class='card-title'>${i.nombre}<sup class='text-success'>${i.precio}€</sup></h5>
                <p class='card-text mb-2 truncate'>Type: <span class='text-uppercase'>${i.tipo}</span>.</p>
                <button class='btnDefault'>
                    <a href='detalle.php?id=${i.idProducto}'>View/Buy</a>
                        <div class='before'></div>
                </button>
                </div>
            </div>
            </div>
                `;
    }
}

function comprobarBusqueda() {
    console.log("hola");
    if (sessionStorage.getItem('category') !== null && JSON.parse(sessionStorage.getItem('category')).length > 0) {
        
        let cat = JSON.parse(sessionStorage.getItem('category'));
        for (const c of cat)
            switchear(c);
    } else {
        isName();
        insertItems(showing);
    }
}

function switchear(value) {
    let c = parseInt(value);
    switch (c) {
        case 1:
            filter.querySelector('.hum-label').click();
            break;
        case 2:
            filter.querySelector('.single-label').click();
            break;
        case 3:
            filter.querySelector('.p90-label').click();
            break;
    }
}

function isName() {
    container.innerHTML = '';
    if (sessionStorage.getItem('name') !== null) {
        let name = sessionStorage.getItem('name');
        showing = allProducts.filter(a => a.nombre.toLowerCase().includes(name.toLowerCase()));
        addBusquedaInfo('Name', `"${name}"`, 'name');
    } else {
        showing = [];
        showing = allProducts.filter(a => true);
    }
}


function addBusquedaInfo(param, value, type) {
    const divElement = document.createElement('div');
    divElement.className = 'arrow-pointer d-flex justify-content-center align-items-center gap-2';
    divElement.setAttribute('name', param.toLowerCase());

    const pElement = document.createElement('p');
    pElement.className = 'm-0';
    pElement.textContent = `${param}: ${value}`;

    const spanElement = document.createElement('span');
    spanElement.className = `material-symbols-outlined`;
    spanElement.setAttribute('type', type);
    spanElement.textContent = 'close';
    spanElement.addEventListener('click', quitFiltro);

    divElement.appendChild(pElement);
    divElement.appendChild(spanElement);

    infoBusqueda.insertAdjacentElement('afterbegin', divElement);
}

function quitFiltro(e) {
    if (e.target.getAttribute('type') === 'name') {
        sessionStorage.removeItem('name');
        isName();
        location.reload();
    } else 
        switchear(e.target.getAttribute('type'));
    e.target.parentElement.remove();
}

comprobarBusqueda();





