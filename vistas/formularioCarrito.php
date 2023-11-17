<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" target="_blank">
        DIRECCIÓN DE ENTREGA <br>
        <input type="text" name="direccion" id="input-direccion" value="<?= $direccion; ?>"><br>
        CUENTA BANCARIA <br>
        <input type="text" name="cuenta" id="input-cuenta"><br>
        <input type="submit" value="CONFIRMAR" name="enviado" id="input-enviar">
    </form>
    <script>
        const myForm = document.querySelector('form');
        const submit = myForm.querySelector('#input-enviar');

        submit.addEventListener('click', (e) => {
            e.preventDefault();
            if (myForm.querySelector('#input-direccion').value === '' || myForm.querySelector('#input-cuenta').value === '') {
                alert('No puedes dejar un campo vacío.');
                return;
            }

            if (!/[a-zA-Z]{2}[0-9]{20}$/g.test(myForm.querySelector('#input-cuenta').value)) {
                alert('El formato de cuenta bancaria es incorrecto.');
                return;
            }
            alert("Se cerrará automáticamente la sesión y toda la información.");
            myForm.submit();
            setTimeout(() => {
                localStorage.clear();
                sessionStorage.clear();
                location.assign('../controlers/index.php');
            }, 1000);

        })
    </script>
</body>

</html>