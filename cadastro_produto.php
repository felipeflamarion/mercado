<?php
$page_title = 'Cadastro Produto';
require_once('bd/conectar.script.php');
require_once('models/tipo_produto.php');
// $tipos_produto = pg_fetch_all($resultados);
// var_dump($tipos_produto);

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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once('models/produto.php');
            $novo_produto = new ProdutoModel();
            $novo_produto->descricao = $_POST['descricao'];
            $novo_produto->preco = floatval($_POST['preco']);
            $novo_produto->tipo_produto = $_POST['tipo_produto'];
            if($novo_produto->criar($con))
                echo("Produto $novo_produto->descricao cadastrado!");
            else
                echo("Não foi possível cadastrar o produto!");

        }

        ?>
        <form method="POST" action="">
            <p>
                <strong>Descrição</strong><br />
                <input type="text" name="descricao" placeholder="Maracujá Joinville" />
            </p>
            <p>
                <strong>Tipo</strong><br />
                <select name="tipo_produto">
                    <option value="">Selecione...</option>
                    <?php
                        $tipos_produto_model = new TipoProdutoModel();
                        $tipos_produto = $tipos_produto_model->listar($con);
                        foreach ($tipos_produto as $tipo) {
                            echo('<option value="'.$tipo['id'].'">'.$tipo['descricao'].'</option>');
                        }
                    ?>
                </select>
            </p>
            <p>
                <strong>Preço (em R$)</strong><br />
                <input type="text" name="preco" placeholder="15,00" />
            </p>

            <input type="submit" value="Cadastrar" />
        </form>
        <!-- Content end -->
    </body>
</html>
