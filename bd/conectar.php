<?php
require_once('config.php');
// Conexão
$con = null;
try{
    $con = pg_connect("dbname=$_DBNAME host=$_HOST port=$_PORT user=$_USER password=$_PASSWORD");
} catch (Exception $e) {
    print('$e');
}

// Execução das queries
function executar($con, $query) {
    try {
        return pg_query($con, $query);
    } catch (Exception $e) {
        echo($e);
        return null;
    }
}
