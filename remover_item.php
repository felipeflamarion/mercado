<?php
$page_title = 'Remover Item';
require_once('bd/conectar.php');
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
            if(isset($_SESSION['venda'])) {
                $item_model = new ItemModel();
                $item_model->produto = $_GET['id'];
                $item_model->venda = $_SESSION['venda'];
                if ($item_model->remover($con))
                    echo('<p>Item removido</p>');
                else
                    echo('<p>Não foi possível remover o item</p>');

                echo('<p>
                    <a href="visualizar_produto.php?id='.$_GET['id'].'">Visualizar Produto</a> |
                    <a href="visualizar_venda.php?='.$_SESSION['venda'].'">Visualizar Venda</a>
                </p>');
            }
            else
                echo('<p>Operação inválida: não há venda ativa no sistema!</p>');
        }
        else
            echo('<p>Item não informado!</p>');

        ?>
        <!-- Content end -->
    </body>
</html>
