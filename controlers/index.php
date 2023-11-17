<?php
include '../vistas/v_inicio.html';
/* $idUnico = isset($_COOKIE['idUnico']) ? $_COOKIE['idUnico'] : 'false'; */
$idUnico;

if(isset($_COOKIE['idUnico']))
    $idUnico = "'".$_COOKIE['idUnico']."'";
else
    $idUnico = 'false';

include '../vistas/v_index.php';
