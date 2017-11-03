<?php

class ItemModel {

    public $venda = null;
    public $produto = null;
    public $quantidade = null;

    public function criar($con) {
        $query = "INSERT INTO item (venda, produto, quantidade) VALUES ($this->venda, $this->produto, $this->quantidade)";
        return executar($con, $query);
    }

    public function atualizar($con) {
        $query = "UPDATE item SET quantidade = $this->quantidade WHERE venda = $this->venda AND produto = $this->produto";
        return executar($con, $query);
    }

    public function buscar($con) {
        $query = "SELECT * FROM item WHERE venda = $this->venda AND produto = $this->produto";
        $resultado = executar($con, $query);
        return pg_fetch_assoc($resultado);
    }

    public function remover($con) {
        $query = "DELETE FROM item WHERE venda = $this->venda AND produto = $this->produto";
        return executar($con, $query);
    }

    public function deletar_por_venda($con, $venda) {
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

    public function valor_total($itens) {
        $valor_total = 0;
        foreach($itens as $item)
            $valor_total += $item['preco'] * $item['quantidade'];
        return number_format($valor_total, 2);
    }

    public function valor_imposto($itens) {
        $valor_imposto = 0;
        foreach($itens as $item)
            $valor_imposto += ($item['preco'] * ($item['percentual_imposto']/100)) * $item['quantidade'];
        return number_format($valor_imposto, 2);
    }

}

?>
