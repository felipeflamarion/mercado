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
        <h3>Lista de Produtos</h3>
        <?php
        $produto_model = new ProdutoModel();
        $produtos = $produto_model->listar($con);

        if($produtos) {
            echo '<ul>';
            foreach ($produtos as $produto)
                echo '<li>'.$produto['id'].' - '.
                    '<a href="visualiza_produto.php?id='.$produto['id'].'">'.$produto['descricao'].'</a>'.
                '</li>';
            echo '</ul>';
        }
        ?>
        <!-- Content end -->
    </body>
</html>
