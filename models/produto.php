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
        // Implementar método
    }

    public function buscar($con) {
        // Implementar método
    }

    public function listar($con) {
        $query = "SELECT p.*, t.descricao as descricao_tipo, t.percentual_imposto FROM produto p INNER JOIN tipo_produto t ON (p.tipo_produto = t.id)";
        $resultado = executar($con, $query);
        return pg_fetch_all($resultado);
    }

}

?>
