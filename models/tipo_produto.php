<?php

class TipoProdutoModel {

    public $id = null;
    public $descricao = null;
    public $percentual_imposto = null;

    public function criar($con) {
        $query = "INSERT INTO tipo_produto (descricao, percentual_imposto) VALUES ('$this->descricao', $this->percentual_imposto)";
        return executar($con, $query);
    }

    public function atualizar($con) {
        $query = "UPDATE tipo_produto SET descricao = '$this->descricao', percentual_imposto = $this->percentual_imposto WHERE id = $this->id";
        return executar($con, $query);
    }

    public function buscar($con) {
        $query = "SELECT * FROM tipo_produto WHERE id = $this->id";
        $resultado = executar($con, $query);
        return pg_fetch_assoc($resultado);
    }

    public function listar($con, $order='id') {
        $query = "SELECT * FROM tipo_produto ORDER BY $order ASC";
        $resultado = executar($con, $query);
        return pg_fetch_all($resultado);
    }

}

?>
