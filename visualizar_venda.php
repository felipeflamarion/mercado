<?php
$page_title = 'Visualizar Venda';
require_once('bd/conectar.php');
require_once('models/venda.php');
require_once('models/item.php');
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

        if(isset($_GET['v']))
            if($_GET['v'] == 'finalizada')
                echo('<h4>Venda finalizada com sucesso!</h4>');
        if(isset($_GET['id'])) {
            $venda_model = new VendaModel();
            $venda_model->id = $_GET['id'];
            $venda = $venda_model->buscar($con);
            if($venda) {

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $item_model = new ItemModel();
                    if($_POST['quantidade'] <= 0)
                        $_POST['quantidade'] = 1;
                    $item_model->quantidade = $_POST['quantidade'];
                    $item_model->produto = $_POST['produto'];
                    $item_model->venda = $venda['id'];
                    if(!$item_model->buscar($con)) {
                        if($item_model->criar($con))
                            echo('<p>Produto adicionado à venda!</p>');
                        else
                            echo('<p>Não foi possível adicionar o produto à venda!</p>');
                    }
                    else
                        echo('<p>Não é possível adicionar o mesmo produto duas vezes!</p>');
                }

                echo('<h3>Visualizando Venda #'.$venda['id'].'</h3>');
                echo('<p><strong>Aberta em: </strong> '.$venda['dt_abertura'].' - ');
                if(!$venda['dt_conclusao'])
                    echo('<strong>Não finalizada</strong>');
                else
                    echo('<strong>Concluída em: </strong> '.$venda['dt_conclusao']);
                echo('</p>');

                $item_model = new ItemModel();
                $itens = $item_model->listar_por_venda($con, $venda['id']);

                if($itens) {
                    ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Preço<br />Unitário</th>
                                <th>Preço</th>
                                <th>Impostos</th>
                                <th>Ações</th>
                            <tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($itens as $item) {
                            echo('<tr>');
                            echo('<td>'.$item['descricao'].'</td>');
                            echo('<td>'.$item['quantidade'].'</td>');
                            echo('<td>R$ '.number_format($item['preco'], 2).'</td>');
                            echo('<td>R$ '.number_format($item['quantidade'] * $item['preco'], 2).'</td>');
                            echo('<td>R$ '.number_format(($item['preco'] * ($item['percentual_imposto']/100)) * $item['quantidade'], 2).'</td>');
                            if(isset($_SESSION['venda'])) {
                                echo('<td>
                                    <a href="visualizar_produto.php?id='.$item['produto'].'">Editar</a> |
                                    <a href="remover_item.php?id='.$item['produto'].'">Remover</a>
                                </td>');
                            }
                            echo('</tr>');
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                    $valor_total = $item_model->valor_total($itens);
                    $valor_imposto = $item_model->valor_imposto($itens);
                    $valor_liquido = number_format($valor_total - $valor_imposto, 2);

                    echo('<h4>Valor Líquido: R$ '.$valor_liquido.'</h4>');
                    echo('<h4>Valor Impostos: R$ '.$valor_imposto.'</h4>');
                    echo('<h1>Valor Total: R$ '.$valor_total.'</h1>');
                }
                else {
                    echo('<p>Esta venda não possui itens!</p>');
                    if($venda['dt_conclusao'] == '')
                        echo('<p><a href="listar_produtos.php">Procurar Produtos</a></p>');
                }

                if(!$venda['dt_conclusao'] && isset($_SESSION['venda'])) {
                    $produto_model = new ProdutoModel();
                    $produtos = $produto_model->listar_nao_adicionados_a_venda($con, $_SESSION['venda'], 'descricao');
                    require_once('forms/adicionar_item_via_venda.php');
                    ?>
                    <nav>
                        <a href="cancelar_venda.php<?php echo('?id='.$venda['id']); ?>">Cancelar</a>
                        <a href="finalizar_venda.php<?php echo('?id='.$venda['id']); ?>">Finalizar</a>
                    </nav>
                    <?php
                }
            }
        }
        ?>
        <!-- Content end -->
    </body>
</html>
