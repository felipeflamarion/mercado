<form method=POST action="visualiza_produto.php<?php echo('?id='.$produto['id']); ?>" />
    <h3>Adicionar à Venda atual</h3>
    <p>
        <strong>Quantidade</strong><br />
        <input type='number' name='quantidade' value='1' required=required />
    </p>
    <input type="submit" value="Adicionar" />
</form>
