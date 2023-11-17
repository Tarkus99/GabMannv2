<?php

function lista($products, $tabla, $nomid, $mostrar)
{
    /* $consulta = json_decode(file_get_contents($url), true); */
    $str = "";
    for ($i = 0; $i < count($products); $i++) {
        $str .=
            "<div class='card-parent col-10 col-sm-8 col-md-6 col-lg-4 mb-2'>
                <div class='card align-items-center product-card'>
                    <img src='" . $products[$i]['foto'] . "' class='card-img-top product-img'>
                <div class='card-body w-100'>
                    <h5 class='card-title'>" . $products[$i]['nombre'] . "<sup class='text-success'> " . $products[$i]['precio'] . "€</sup></h5>
                <p class='card-text mb-2 truncate'>Type: <span class='text-uppercase'>" . $products[$i]['tipo'] . "</span>.</p>
                <button class='btnDefault'>
                    <a href='detalle.php?id=" . $products[$i]['idProducto'] . "'>View/Buy</a>
                        <div class='before'></div>
                </button>
                </div>
            </div>
            </div>";
    }
    return $str;
}
