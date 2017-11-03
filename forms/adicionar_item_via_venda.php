<form method="POST" action="">
    <h3>Adicionar Produto</h3>
    <p>
        <strong>Produto</strong>
        <select name="produto">
            <option value="">Selecione...</option>
            <?php
            foreach($produtos as $produto) {
                echo('<option value="'.$produto['id'].'">'.$produto['descricao'].'</option>');
            }
            ?>
        </select>

        <strong>Quantidade</strong>
        <input type="number" name="quantidade" value="1" min="1" required="required" />

        <input type="submit" value="Adicionar" />
    </p>
</form>
