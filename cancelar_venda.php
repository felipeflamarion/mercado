<?php
$page_title = 'Cancelar Venda';
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
        if(isset($_GET['id'])) {
            $venda_model = new VendaModel();
            $venda_model->id = $_GET['id'];
            $venda = $venda_model->buscar($con);

            if($venda) {
                if($venda['dt_conclusao']) {
                    echo('<p>Após concluído uma venda não pode ser cancelada!</p>');
                }
                $item_model = new ItemModel();
                if($item_model->deletar_por_venda($con, $venda['id']) && $venda_model->deletar($con)) {
                    if(isset($_SESSION['venda']));
                        unset($_SESSION['venda']);
                    header('location:listar_vendas.php?v=cancelada');
                }
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
