<?php
$page_title = 'Finalizar Venda';
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
        <?php

        if(isset($_GET['id'])) {
            $venda_model = new VendaModel();
            $venda_model->id = $_GET['id'];
            $venda = $venda_model->buscar($con);

            if($venda) {
                if($venda_model->finalizar($con)) {
                    if(isset($_SESSION['venda']));
                        unset($_SESSION['venda']);
                    header('location:visualizar_venda.php?id='.$venda['id'].'&v=finalizada');
                }
                else
                    echo('<p>Não foi possível finalizar a venda!</p>');
            }
            else
                echo('<p>Venda '.$_GET['id'].' inexistente</p>');
        }
        else
            echo('<p>Venda inexistente</p>');
        ?>
        <!-- Content end -->
    </body>
</html>
