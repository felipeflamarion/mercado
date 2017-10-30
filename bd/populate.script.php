<?php
require_once('../models/tipo_produto.php');
require_once('conectar.script.php');

// Tipo produto
function cad_tipo_produto($con, $descricao, $percentual_imposto){
    $tipo_produto = new TipoProdutoModel();
    $tipo_produto->descricao = $descricao;
    $tipo_produto->percentual_imposto = $percentual_imposto;
    $tipo_produto->criar($con);
}

function populate ($con) {
    cad_tipo_produto($con, 'Cereal', 20.0);
    cad_tipo_produto($con, 'Carne', 25.0);
    cad_tipo_produto($con, 'Bebida', 45.0);
    cad_tipo_produto($con, 'Higiene', 15.0);
    cad_tipo_produto($con, 'Limpeza', 25.0);
}

populate($con);

?>
