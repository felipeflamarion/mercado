<?php
$page_title = 'Produtos';
require_once('bd/conectar.php');
require_once('models/produto.php');

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
        <?php

        if($_GET['id']) {
            $produto_model = new ProdutoModel();
            $produto_model->id = $_GET['id'];
            $produto = $produto_model->buscar($con);

            if($produto) {
                echo('<h2>Produto</h2>');
                foreach ($produto as $campo => $valor) {
                    echo('<p>'.$campo.': '.$valor.'</p>');
                }
            }
            else {
                echo('<p>Produto '.$_GET['id'].' inexistente</p>');
            }
        }
        else {
            echo('<p>Produto não informado!</p>');
        }
        ?>
        <!-- Content end -->
    </body>
</html>
