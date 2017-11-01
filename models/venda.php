<?php

class VendaModel {

    public $id = null;
    public $dt_abertura = null;
    public $dt_conclusao = null;

    public function criar($con) {
        $query = "INSERT INTO venda (dt_abertura) VALUES ('$this->dt_abertura') RETURNING id";
        $resultado = executar($con, $query);
        if($resultado)
            $this->id = pg_fetch_assoc($resultado)['id'];
        return $resultado;
    }

    public function finalizar($con) {
        date_default_timezone_set("America/Sao_Paulo");
        $this->dt_conclusao = date('Y-m-d H:m:s');
        $query = "UPDATE venda SET dt_conclusao = '$this->dt_conclusao' WHERE id = $this->id";
        return executar($con, $query);
    }

    public function deletar($con) {
        $query = "DELETE FROM venda WHERE id=$this->id";
        return executar($con, $query);
    }

    public function buscar($con) {
        $query = "SELECT * FROM venda WHERE id = $this->id";
        $resultado = executar($con, $query);
        return pg_fetch_assoc($resultado);
    }

    public function listar($con, $campo='id', $ordem='ASC') {
        $query = "SELECT * FROM venda ORDER BY $campo $ordem";
        $resultado = executar($con, $query);
        return pg_fetch_all($resultado);
    }

}

?>
