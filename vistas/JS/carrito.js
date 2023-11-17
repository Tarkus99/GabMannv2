const carritoBtnUpdate = document.querySelector('#carrito__button-update')
const checkOut = document.querySelector('#carrito__button-check-out')
const itemsParent = document.querySelector('#items-parent')
const buttonOpenLogin = document.querySelector('#button-open-login')
const dialog = document.querySelector('#loginDialog')
let total = 0

/*MAIN* */

if (esCompra) {
  let optionsPost = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      idUnico: idUnico,
      idProducto: idProducto,
      cantidad: cantidad,
      dniCliente: dniCliente,
      precio: precio
    })
  }

  let optionsPut = {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      idUnico: idUnico,
      idProducto: idProducto,
      cantidad: cantidad
    })
  }

  //verifico que si el idProducto ya existe en el carrito
  fetch(
    `http://localhost/proyecto_servidor_final/servicioCarritos/service.php?idUnico=${idUnico}&idProducto=${idProducto}`
  )
    .then(response => response.json())
    .catch(error => console.log(error))
    .then(data => {
      //si no existe, success = true y significa que puedo añadirlo con POST
      if (data.success) {
        fetch(
          `http://localhost/proyecto_servidor_final/servicioCarritos/service.php`,
          optionsPost
        )
          .then(response => {
            return response.json()
          })
          .catch(error => console.log(error))
          .then(data => {
            if (data.success) {
              //actualizo el número que hay en el icono del carrito
              sumarCarrito();
              location.assign('http://localhost/proyecto_servidor_final/controlers/verCarrito.php');
            } else
              alert(data.detalle)
          })
        //si existe, uso un PUT para actualizar la cantidad
      } else {
        fetch(
          `http://localhost/proyecto_servidor_final/servicioCarritos/service.php`,
          optionsPut
        )
          .then(response => {
            return response.json()
          })
          .catch(error => console.log(error))
          .then(data => {
            if (data.success)
              location.assign('http://localhost/proyecto_servidor_final/controlers/verCarrito.php');
            else if (!data.success)
              alert(data.detalle)
          })
          .catch(error => console.log(error))
      }
    })
} else
  obtenerTodos();



function obtenerTodos() {
  if (idUnico) {
    fetch(
      `http://localhost/proyecto_servidor_final/servicioCarritos/service.php?idUnico=${idUnico}`
    )
      .then(response => response.json())
      .catch(error => console.log(error))
      .then(data => {
        if (data.length > 0) {
          addCarritoItems(data)
        } else addEmptyCarrito()
      })
  } else {
    addEmptyCarrito();
  }
}

//CODIGO QUE SE INSERTA SI EL CARRITO ESTÁ LLENO
function addCarritoItems(data) {
  for (const item of data) {
    itemsParent.innerHTML +=
      `<div class="item flex flex-row items-center justify-start bg-slate-200 p-1">
            
              <img src="${item.foto}" alt="" class="self-start">
                <div class="flex flex-col md:flex-row md:justify-evenly md:gap-3 w-full px-1 md:px-4">
                  <div class="flex flex-row gap-1 justify-around items-center md:basis-2/3">
                    <a class='text-center basis-2/3 md:flex md:justify-center' href='detalle.php?id=${item.idProducto}'>
                      <h4 class="text-sm sm:text-base md:text-lg whitespace-pre-line md:whitespace-nowrap underline basis-auto">${item.nombre}</h4>
                    </a>
                    <div class="quantity-parent flex flex-col items-center">
                      <p class="mb-0 hidden md:block w-min">
                        Quantity:
                      </p>
                      <div class="flex items-center justify-center gap-1">
                          <span class="material-symbols-outlined restar rounded-md">
                              remove
                          </span>
                          <input type='hidden' id='hidden-idProducto' value='${item.idProducto}'>
                          <input type='hidden' id='hidden-precio' value='${item.precio}'>
                          <input type='hidden' id='hidden-cantidad' value='${item.cantidad}'>
                          <input type='number' min='1' name='arrayCantidades[]' value='${item.cantidad}' class="product-info__cantidad text-rigth">
                          <span class="material-symbols-outlined sumar rounded-md">
                              add
                          </span>
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-row items-center justify-around md:justify-around md:grow px-[3%]">          
                    <div class='flex flex-col order-2 md:order-1'>
                        <span class="hidden md:block">Total:</span>
                        <span class="text-l mr-5 md:mr-0 item-span-total font-bold">${item.precio * item.cantidad}€</span>
                    </div>
                    <span class="delete material-symbols-outlined md:text-2xl order-1 grow md:grow-0 md:order-2 rounded-md hover:bg-stone-200 hover:border-stone-100">
                      delete
                    </span>
                  </div>
                </div>
            </div>
        </div>`;
    total += item.precio * item.cantidad;
  }
  document.querySelector('#span-total').textContent = total;

  const spanBorrar = document.querySelectorAll('.delete')
  for (const s of spanBorrar) s.addEventListener('click', eliminar)

  const inputsc = document.querySelectorAll('.product-info__cantidad');
  for (const i of inputsc) {
    i.addEventListener('change', ()=>{
      if(i.value<=0)
        i.value = i.parentElement.parentElement.parentElement.querySelector('#hidden-cantidad').value;
      updateTotal();
    })
  }

  for (const i of itemsParent.children) {
    i.addEventListener('click', (e) => {
      if (e.target.classList.contains('restar')) {
        let cantidad = i.querySelector('.product-info__cantidad');
        if (cantidad.value > 1) {
          cantidad.value = parseInt(cantidad.value) - 1
          checkCantidad()
        }
        i.querySelector('.item-span-total').textContent = (i.querySelector('#hidden-precio').value*cantidad.value) + "€";
        updateTotal();
      } else if (e.target.classList.contains('sumar')) {
        let cantidad = i.querySelector('.product-info__cantidad');
        cantidad.value = parseInt(cantidad.value) + 1
        checkCantidad()
        i.querySelector('.item-span-total').textContent = (i.querySelector('#hidden-precio').value*cantidad.value) + "€";
        updateTotal();
      }
    })
  }
}

//CODIGO QUE SE INSERTA SI EL CARRITO ESTÁ VACÍO
function addEmptyCarrito() {
  document.querySelector('.form-row-last').style.display = 'none'
  itemsParent.innerHTML = `
    <fieldset id="items-parent" class="flex flex-col gap-3">
        <div class='flex flex-col items-center justify-center gap-2'>
            <h4 class='empty-cart'>There's nothing to see here, yet</h4>
            <img border="5" class='nothing-to-do' src='../vistas/img/nothing-to-do-here2.jpg'/>
                <button class='btnDefaultReverse'>Go to products
                    <div class='before'></div>
                </button>
        </div>
    </fieldset>`;
  itemsParent.querySelector('.btnDefaultReverse').addEventListener('click', (e) => {
    e.preventDefault();
    location.assign('productos.php');
  })
}

function updateTotal(){
  total = 0;
  for (const i of itemsParent.children)
      total+= parseInt(i.querySelector('#hidden-precio').value)*parseInt(i.querySelector('.product-info__cantidad').value);
  document.querySelector('#span-total').innerText = total;

}

//CADA VEZ QUE SE PULSA EL BOTÓN DE RESTAR O SUMAR, VERIFICO SI LAS CANTIDADES COINCIDEN CON LAS ORIGINALES, SI NO, ACTIVO EL BOTÓN DE ACTUALIZAR
function checkCantidad() {
  const inputs = document.querySelectorAll('.product-info__cantidad')
  const diferences = []
  for (let i = 0; i < inputs.length; i++)
    diferences.push(
      inputs[i].value !=
      inputs[i].parentElement.querySelector('#hidden-cantidad').value
    )

  if (diferences.includes(true)) carritoBtnUpdate.removeAttribute('disabled')
  else carritoBtnUpdate.setAttribute('disabled', 'true')
}

function sumarCarrito() {
  let contador = localStorage.getItem('contador-carrito')
  if (contador) {
    localStorage.setItem('contador-carrito', parseInt(contador) + 1)
  } else {
    localStorage.setItem('contador-carrito', 1)
  }
}

function restarCarrito() {
  let contador = localStorage.getItem('contador-carrito')
  if (contador) {
    localStorage.setItem('contador-carrito', parseInt(contador) - 1)
  } else {
    localStorage.setItem('contador-carrito', 0)
  }
}

/*
███████ ██      ██ ███    ███ ██ ███    ██  █████  ██████  
██      ██      ██ ████  ████ ██ ████   ██ ██   ██ ██   ██ 
█████   ██      ██ ██ ████ ██ ██ ██ ██  ██ ███████ ██████  
██      ██      ██ ██  ██  ██ ██ ██  ██ ██ ██   ██ ██   ██ 
███████ ███████ ██ ██      ██ ██ ██   ████ ██   ██ ██   ██
* */
function eliminar(e) {
  const item = e.target.parentElement.parentElement.parentElement;
  if (confirm('Are you sure deleting this item from the cart?')) {
    const idProducto =
      e.target.parentElement.parentElement.querySelector('#hidden-idProducto').value
    let options = {
      method: 'DELETE',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ idUnico: idUnico, idProducto: idProducto })
    }
    fetch(
      `http://localhost/proyecto_servidor_final/servicioCarritos/service.php`,
      options
    )
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          item.remove()
          updateTotal();
          restarCarrito();
          if (itemsParent.children.length === 0)
            addEmptyCarrito()
            
        } else alert(data.detalle)
      })
  }
}

/*
 █████   ██████ ████████ ██    ██  █████  ██      ██ ███████  █████  ██████  
██   ██ ██         ██    ██    ██ ██   ██ ██      ██    ███  ██   ██ ██   ██ 
███████ ██         ██    ██    ██ ███████ ██      ██   ███   ███████ ██████  
██   ██ ██         ██    ██    ██ ██   ██ ██      ██  ███    ██   ██ ██   ██ 
██   ██  ██████    ██     ██████  ██   ██ ███████ ██ ███████ ██   ██ ██   ██ 
                                                                            
* */
carritoBtnUpdate.addEventListener('click', e => {
  const inputs = Array.from(
    document.querySelectorAll("input[name='arrayCantidades[]']")
  )
  const values = []
  for (const i of inputs) values.push(i.value)

  let options = {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ idUnico: idUnico, arrayCantidades: values })
  }

  fetch(
    `http://localhost/proyecto_servidor_final/servicioCarritos/service.php`,
    options
  )
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        alert('Carrito actualizado con éxito')
        carritoBtnUpdate.setAttribute('disabled', 'true')
        total = 0;
        for (const i of itemsParent.children) {
          let a = parseInt(i.querySelector('#hidden-precio').value);
          let b = parseInt(i.querySelector('.product-info__cantidad').value);
          i.querySelector('.item-span-total').textContent = (a * b) + "€";
          total += a * b;
        }
        document.querySelector('#span-total').textContent = total;
      } else {
        alert(data.detalle);
        for (const i in inputs)
          inputs[i].value = inputs[i].parentElement.querySelector('#hidden-cantidad').value;
      }
    })
})

/*
██████  ██  █████  ██       ██████   ██████  
██   ██ ██ ██   ██ ██      ██    ██ ██       
██   ██ ██ ███████ ██      ██    ██ ██   ███ 
██   ██ ██ ██   ██ ██      ██    ██ ██    ██ 
██████  ██ ██   ██ ███████  ██████   ██████ 
* */
if (buttonOpenLogin) {
  buttonOpenLogin.addEventListener('click', openDialog);
}

function openDialog() {
  dialog.showModal()
  dialog.querySelector('.modal-content').classList.toggle('close')
  dialog.querySelector('.modal-content').classList.toggle('open')
}

window.addEventListener('click', e => {
  if (e.target.tagName === 'DIALOG') {
    closeDialog()
  }
})

function closeDialog() {
  dialog.querySelector('.modal-content').classList.toggle('close')
  dialog.querySelector('.modal-content').classList.toggle('open')
  setTimeout(() => {
    dialog.close()
  }, 400)
}

checkOut.addEventListener('click', (e) => {
  if (dniCliente) {
    location.assign('confirmar.php');
  } else {
    openDialog();
    document.querySelector('#info-checkout').style.display = 'inline-block';
  }
})
