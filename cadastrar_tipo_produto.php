<?php
$page_title = 'Cadastro de Tipo de Produto';
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
        <?php

        if (isset($_GET['id'])) {
            $tipo_produto_model = new TipoProdutoModel();
            $tipo_produto_model->id = $_GET['id'];
            $tipo_produto = $tipo_produto_model->buscar($con);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $novo_tipo_produto = new TipoProdutoModel();
            if(isset($tipo_produto))
                $novo_tipo_produto->id = $tipo_produto['id'];
            $novo_tipo_produto->descricao = $_POST['descricao'];
            $novo_tipo_produto->percentual_imposto = str_replace(',', '.', $_POST['percentual_imposto']);

            if(!isset($tipo_produto)) {
                if($novo_tipo_produto->criar($con))
                    echo("Tipo de produto $novo_tipo_produto->descricao cadastrado!");
                else
                    echo("Não foi possível cadastrar o tipo de produto!");
            }
            else {
                if($novo_tipo_produto->atualizar($con)) {
                    echo("Tipo de produto $novo_tipo_produto->descricao editado!");
                    $tipo_produto = $novo_tipo_produto->buscar($con);
                }
                else
                    echo("Não foi possível editar o tipo de produto!");
            }
        }

        require_once('forms/tipo_produto.php');
        ?>
        <!-- Content end -->
    </body>
</html>
