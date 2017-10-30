<?php

$dbname = 'mercado_virtual';
$host = 'localhost';
$port = '5432';
$user = 'postgres';
$password = 'postgres';

// Conexão

$con = null;
try{
    $con = pg_connect("dbname=$dbname host=$host port=$port user=$user password=$password");
} catch (Exception $e) {
    print('$e');
}

// Execução das queries
function executar($con, $query) {
    try {
        return pg_query($con, $query);
    } catch (Exception $e) {
        return null;
        print($e);
    }
}
