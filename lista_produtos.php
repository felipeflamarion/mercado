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
        $produtos = $produto_model->listar($con, 'descricao');

        if($produtos) {
            echo '<ul>';
            foreach ($produtos as $produto)
                echo '<li>'.
                    '<a href="visualiza_produto.php?id='.$produto['id'].'"><strong>'.$produto['descricao'].'</strong></a><br />'.
                    'R$ '.$produto['preco'].
                    ' - <a href="cadastro_produto.php?id='.$produto['id'].'">Editar</a>'.
                '</li>';
            echo '</ul>';
        }
        ?>
        <!-- Content end -->
    </body>
</html>
