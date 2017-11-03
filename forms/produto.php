<form method="POST" action="cadastrar_produto.php<?php if(isset($produto)){ echo '?id='.$produto['id']; } ?>">
    <p>
        <strong>Descrição</strong><br />
        <input type="text" name="descricao" placeholder="Maracujá Joinville" required="required" <?php if(isset($produto)){ echo('value="'.$produto['descricao'].'"'); } ?> />
    </p>
    <p>
        <strong>Tipo</strong><br />
        <select name="tipo_produto" required="required">
            <option value="">Selecione...</option>
            <?php
                $tipos_produto_model = new TipoProdutoModel();
                $tipos_produto = $tipos_produto_model->listar($con, 'descricao');
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
        <input type="text" name="preco" placeholder="15,00" required="required" <?php if(isset($produto)){ echo('value="'.floatval($produto['preco']).'"'); } ?> />
    </p>

    <input type="submit" value="Cadastrar" />
</form>
