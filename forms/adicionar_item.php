<form method=POST action="visualizar_produto.php<?php echo('?id='.$produto['id']); ?>" />
    <?php
    $valor_inicial = 1;
    if($item) {
        echo('<h3>Editar item na Venda atual</h3>');
        $valor_inicial = $item['quantidade'];
    }
    else
        echo('<h3>Adicionar à Venda atual</h3>');
    ?>
    <p>
        <strong>Quantidade</strong><br />
        <input type='number' name='quantidade' value='<?php echo($valor_inicial); ?>' min='' required=required />
    </p>
    <a href="remover_item.php?id=<?php echo($item['produto']); ?>">Remover</a> |
    <input type="submit" value="<?php if($item){echo('Editar');}else{echo('Adicionar');} ?>" />
</form>
