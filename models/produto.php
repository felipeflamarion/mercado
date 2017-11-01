<?php

class ProdutoModel {

    public $id = null;
    public $descricao = null;
    public $preco = null;
    public $tipo_produto = null;

    public function criar($con) {
        $query = "INSERT INTO produto (descricao, preco, tipo_produto) VALUES ('$this->descricao', $this->preco, $this->tipo_produto)";
        return executar($con, $query);
    }

    public function atualizar($con) {
        $query = "UPDATE produto SET descricao = '$this->descricao', preco = $this->preco, tipo_produto = $this->tipo_produto WHERE id = $this->id";
        return executar($con, $query);
    }

    public function buscar($con) {
        $query = "SELECT p.*, t.descricao as descricao_tipo, t.percentual_imposto FROM produto p INNER JOIN tipo_produto t ON (p.tipo_produto = t.id) WHERE p.id = $this->id";
        $resultado = executar($con, $query);
        return pg_fetch_assoc($resultado);
    }

    public function listar($con, $order='id') {
        $query = "SELECT p.*, t.descricao as descricao_tipo, t.percentual_imposto FROM produto p INNER JOIN tipo_produto t ON (p.tipo_produto = t.id) ORDER BY $order ASC";
        $resultado = executar($con, $query);
        return pg_fetch_all($resultado);
    }

}

?>
