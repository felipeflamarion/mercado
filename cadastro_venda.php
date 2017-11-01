<?php
$page_title = 'Cadastro de venda';
require_once('bd/conectar.php');
require_once('models/venda.php');
?>
<!DOCTYPE html>
<html>
    <?php
    require_once('blocks/head.block.php')
    ?>
    <body>
        <?php require_once('blocks/topo.block.php'); ?>
        <?php require_once('blocks/menu.block.php'); ?>
        <!-- Content start !-->
        <h2>Iniciando nova venda...</h2>
        <?php

        date_default_timezone_set("America/Sao_Paulo");
        $venda = new VendaModel();
        $venda->dt_abertura = date('Y-m-d H:m:s');
        if($venda->criar($con)) {
            echo('<p>Venda iniciada com sucesso!</p>');
            if($venda->id) {
                echo('<a href="cancelar_venda.php?id='.$venda->id.'">Cancelar</a> - ');
                echo('<a href="visualizar_venda.php?id='.$venda->id.'">Visualizar</a>');
            }
        }
        else
            echo('<h3>Não foi possível iniciar a venda!</h3>');
        ?>
        <!-- Content end -->
    </body>
</html>
