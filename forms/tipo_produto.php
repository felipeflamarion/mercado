<form method="POST" action="cadastrar_tipo_produto.php<?php if(isset($tipo_produto)){ echo '?id='.$tipo_produto['id']; } ?>">
    <p>
        <strong>Descrição</strong><br />
        <input type="text" name="descricao" placeholder="Cereal" required="required" <?php if(isset($tipo_produto)){ echo('value="'.$tipo_produto['descricao'].'"'); } ?> />
    </p>
    <p>
        <strong>Percentual de imposto (%)</strong><br />
        <input type="text" name="percentual_imposto" placeholder="25" required="required" <?php if(isset($tipo_produto)){ echo('value="'.$tipo_produto['percentual_imposto'].'"'); } ?> />
    </p>

    <input type="submit" value="Cadastrar" />
</form>
