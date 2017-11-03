<nav>
    <a href="index.php">Início</a>
    <a href="iniciar_venda.php">Iniciar Venda</a>
    <a href="listar_vendas.php">Vendas</a>
    <a href="listar_produtos.php">Produtos</a>
    <a href="cadastrar_produto.php">Adicionar Produto</a>
    <a href="listar_tipos_produto.php">Tipos Produto</a>
    <a href="cadastrar_tipo_produto.php">Adicionar Tipo Produto</a>
    <?php
    if(isset($_SESSION['venda']))
        echo('<a href="visualizar_venda.php?id='.$_SESSION['venda'].'">(Venda atual)</a>');
    ?>
</nav>
