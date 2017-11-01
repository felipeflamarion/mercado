<?php
$page_title = 'Venda';
require_once('bd/conectar.php');
require_once('models/venda.php');
require_once('models/item.php');
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

        if(isset($_GET['v']))
            if($_GET['v'] == 'finalizada')
                echo('<h4>Venda finalizada com sucesso!</h4>');
        if(isset($_GET['id'])) {
            $venda_model = new VendaModel();
            $venda_model->id = $_GET['id'];
            $venda = $venda_model->buscar($con);
            if($venda) {
                $item_model = new ItemModel();
                $itens = $item_model->listar_por_venda($con, $venda['id']);
                ?>
                <h3>Visualizando Venda <?php echo('#'.$venda['id']); ?> </h3>
                <?php if($venda['dt_conclusao'] == '') { ?>
                <nav>
                    <a href="cancelar_venda.php<?php echo('?id='.$venda['id']); ?>">Cancelar</a>
                    <a href="finalizar_venda.php<?php echo('?id='.$venda['id']); ?>">Finalizar</a>
                </nav>
                <?php
                }
            }
        }
        ?>
        <!-- Content end -->
    </body>
</html>
