<?php
$page_title = 'Produtos';
require_once('bd/conectar.php');
require_once('models/tipo_produto.php');
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
        <h3>Lista de Tipos de Produto</h3>
        <?php
        $tipo_produto_model = new TipoProdutoModel();
        $tipos_produto = $tipo_produto_model->listar($con, 'descricao');

        if($tipos_produto) {
            echo('<ul>');
            foreach ($tipos_produto as $tipo_produto)
                echo('<li>'.
                    '<strong>'.$tipo_produto['descricao'].'</strong><br />'.
                    ' (Imposto: '.$tipo_produto['percentual_imposto'].'%) '.
                    ' - <a href="cadastro_tipo_produto.php?id='.$tipo_produto['id'].'">Editar</a>'.
                '</li>');
            echo ('</ul>');
        }
        else {
            echo('<p>Não existem tipos de produto cadastrados!</p>');
            echo('<a href="cadastro_tipo_produto.php">Cadastre aqui</a>');
        }
        ?>
        <!-- Content end -->
    </body>
</html>
