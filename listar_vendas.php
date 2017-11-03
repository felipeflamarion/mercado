<?php
$page_title = 'Vendas';
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
        <h3>Lista de Vendas</h3>
        <?php

        $venda_model = new VendaModel();
        $vendas = $venda_model->listar($con, 'id', 'DESC');

        if($vendas) {
            echo('<ul>');
            foreach ($vendas as $venda) {
                echo('<li>');
                echo('<a href="visualizar_venda.php?id='.$venda['id'].'"><strong> Venda #'.$venda['id'].'</strong></a><br />');
                echo('Início em: '.$venda['dt_abertura']);
                echo(' e Finalizado em: '.$venda['dt_conclusao']);
                if(!$venda['dt_conclusao'])
                    echo('</br><a href="cancelar_venda.php?id='.$venda['id'].'">Cancelar Venda</a>');
                echo('</li>');
            }
            echo('</ul>');
        }
        else {
            echo('<p>Não existem vendas cadastradas!</p>');
            echo('<a href="cadastrar_venda.php">Cadastre aqui</a>');
        }

        ?>
        <!-- Content end -->
    </body>
</html>
