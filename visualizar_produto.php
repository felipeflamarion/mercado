<?php
$page_title = 'Produtos';
require_once('bd/conectar.php');
require_once('models/produto.php');
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
            $produto_model = new ProdutoModel();
            $produto_model->id = $_GET['id'];
            $produto = $produto_model->buscar($con);

            if($produto) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if(isset($_SESSION['venda'])) {
                        $item_model = new ItemModel();
                        if($_POST['quantidade'] <= 0)
                            $_POST['quantidade'] = 1;
                        $item_model->quantidade = $_POST['quantidade'];
                        $item_model->produto = $produto['id'];
                        $item_model->venda = $_SESSION['venda'];

                        if($item_model->buscar($con)) {
                            if($item_model->atualizar($con))
                                echo('<p>Item editado na venda atual!</p>');
                            else
                                echo('<p>Não foi possível editar o item!</p>');
                        }
                        else {
                            if($item_model->criar($con))
                                echo('<p>Produto adicionado à venda!</p>');
                            else
                                echo('<p>Não foi possível adicionar o produto à venda!</p>');
                        }
                    }
                    else
                        echo('<p>Não há venda ativa no sistema! <a href="cadastrar_venda.php">Iniciar venda</a></p>');
                }

                echo('<h1>'.$produto['descricao'].'</h1>');
                echo('<p><a href="cadastrar_produto.php?id='.$produto['id'].'">Editar</a></p>');
                echo('<p><strong>Tipo: </strong>'.$produto['descricao_tipo'].'</a>');
                $impostos = $produto['preco'] * ($produto['percentual_imposto'] / 100);
                echo('<h4>Valor líquido: R$ '.number_format(($produto['preco'] - $impostos), 2).'</h4>');
                echo('<h4>Imposto: R$ '.number_format($impostos, 2).' ('.$produto['percentual_imposto'].'%)</h4>');
                echo('<h1>Valor total: R$ '.number_format($produto['preco'], 2).'</h1>');

                if(isset($_SESSION['venda'])) {
                    $item_model = new ItemModel();
                    $item_model->venda = $_SESSION['venda'];
                    $item_model->produto = $produto['id'];
                    $item = $item_model->buscar($con);
                    require_once('forms/adicionar_item.php');
                }
            }
            else
                echo('<p>Produto '.$_GET['id'].' inexistente</p>');
        }
        else
            echo('<p>Produto não informado!</p>');
        ?>
        <!-- Content end -->
    </body>
</html>
