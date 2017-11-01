<?php

class ItemModel {

    public $id = null;
    public $dt_abertura = null;
    public $dt_conclusao = null;

    public function criar($con) {
        $query = "";
        // return executar($con, $query);
    }

    public function atualizar($con) {
        $query = "";
        // return executar($con, $query);
    }

    public function buscar($con) {
        $query = "";
        // $resultado = executar($con, $query);
        // return pg_fetch_assoc($resultado);
    }

    public function deletar_por_venda($con, $venda, $campo='p.descricao', $ordem='ASC') {
        $query = "DELETE FROM item WHERE venda = $venda";
        return executar($con, $query);
    }

    public function quantidade_por_venda($con, $venda, $campo='p.descricao', $ordem='ASC') {
        $query = "SELECT COUNT(*) FROM item WHERE i.venda = $venda";
        $resultado = executar($con, $query);
        return pg_fetch_assoc($resultado);
    }

    public function listar_por_venda($con, $venda, $campo='p.descricao', $ordem='ASC') {
        $query = "SELECT i.*, v.id, p.descricao, p.preco, t.percentual_imposto, t.descricao as descricao_tipo_produto FROM item i INNER JOIN venda v ON (i.venda = v.id) INNER JOIN produto p ON (i.produto = p.id) INNER JOIN tipo_produto t ON (p.tipo_produto = t.id) WHERE i.venda = $venda ORDER BY $campo $ordem";
        $resultado = executar($con, $query);
        return pg_fetch_all($resultado);
    }

}

?>
