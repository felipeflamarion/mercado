<?php
$page_title = 'Cadastro de venda';
require_once('bd/conectar.php');
require_once('models/venda.php');
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
        <?php
        if(isset($_SESSION['venda'])) {
            echo('<h3>Não foi possível iniciar uma nova venda!</h3>');
            echo('<p>Venda '.$_SESSION['venda'].' não foi concluída!</p>');
            $id_venda = $_SESSION['venda'];
        }
        else {
            date_default_timezone_set("America/Sao_Paulo");
            $venda = new VendaModel();
            $venda->dt_abertura = date('Y-m-d H:m:s');
            if($venda->criar($con)) {
                $_SESSION['venda'] = $venda->id;
                echo('<h3>Venda iniciada com sucesso!</h3>');
                $id_venda = $venda->id;
            }
            else
                echo('<h3>Não foi possível iniciar a venda!</h3>');
        }
        echo('<a href="cancelar_venda.php?id='.$id_venda.'">Cancelar</a> - ');
        echo('<a href="visualizar_venda.php?id='.$id_venda.'">Visualizar</a>');
        ?>
        <!-- Content end -->
    </body>
</html>
