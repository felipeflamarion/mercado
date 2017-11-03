<?php
$page_title = 'Cadastro de Produto';
require_once('bd/conectar.php');
require_once('models/tipo_produto.php');
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

        if (isset($_GET['id'])) {
            $produto_model = new ProdutoModel();
            $produto_model->id = $_GET['id'];
            $produto = $produto_model->buscar($con);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $novo_produto = new ProdutoModel();
            if(isset($produto))
                $novo_produto->id = $produto['id'];
            $novo_produto->descricao = $_POST['descricao'];
            $novo_produto->preco = str_replace(',', '.', $_POST['preco']);
            $novo_produto->tipo_produto = $_POST['tipo_produto'];

            if(!isset($produto)) {
                if($novo_produto->criar($con))
                    echo("Produto $novo_produto->descricao cadastrado!");
                else
                    echo("Não foi possível cadastrar o produto!");
            }
            else {
                if($novo_produto->atualizar($con)) {
                    echo("Produto $novo_produto->descricao editado!");
                    $produto = $novo_produto->buscar($con);
                }
                else
                    echo("Não foi possível editar o produto!");
            }
        }

        require_once('forms/produto.php');
        ?>
        <!-- Content end -->
    </body>
</html>
