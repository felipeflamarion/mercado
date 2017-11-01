<?php
$page_title = 'Cadastro de produto';
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
        ?>
        <form method="POST" action="cadastro_produto.php<?php if(isset($produto)){ echo '?id='.$produto['id']; } ?>">
            <p>
                <strong>Descrição</strong><br />
                <input type="text" name="descricao" placeholder="Maracujá Joinville" <?php if(isset($produto)){ echo('value="'.$produto['descricao'].'"'); } ?> />
            </p>
            <p>
                <strong>Tipo</strong><br />
                <select name="tipo_produto">
                    <option value="">Selecione...</option>
                    <?php
                        $tipos_produto_model = new TipoProdutoModel();
                        $tipos_produto = $tipos_produto_model->listar($con);
                        foreach ($tipos_produto as $tipo) {
                            if(isset($produto) && ($tipo['id'] === $produto['tipo_produto']))
                                echo('<option value="'.$tipo['id'].'" selected="selected">');
                            else
                                echo('<option value="'.$tipo['id'].'">');
                            echo($tipo['descricao']);
                            echo('</option>');
                        }
                    ?>
                </select>
            </p>
            <p>
                <strong>Preço (em R$)</strong><br />
                <input type="text" name="preco" placeholder="15,00" <?php if(isset($produto)){ echo('value="'.floatval($produto['preco']).'"'); } ?> />
            </p>

            <input type="submit" value="Cadastrar" />
        </form>
        <!-- Content end -->
    </body>
</html>
