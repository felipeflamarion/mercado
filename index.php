<?php
$page_title = 'Página Inicial';
require_once('bd/conectar.php');
?>
<!DOCTYPE html>
<html>
    <?php
    require_once('blocks/head.block.php')
    ?>
    <body>
        <?php require_once('blocks/topo.block.php'); ?>
        <?php require_once('blocks/menu.block.php'); ?>
        <!-- Content start !-->
        <h1>Bem-vindo ao Sistema Mercado Virtual!</h1>
        <h3>
            <a href="iniciar_venda.php">Inicie uma venda aqui</a>
        </h3>
        <!-- Content end -->
    </body>
</html>
