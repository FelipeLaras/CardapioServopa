<?php

    $servername = "localhost";
    $username = "root";
    $password = "qtbvar03";
    $dbname = "cardapio";
    $port = "3307";

$link = mysqli_connect($servername, $username, $password, $dbname, $port);
      

if (!$link) {
    echo "Errorrrr: não foi possível conectar-se ao MySQL." . PHP_EOL . "<br />";
    echo "Depurando erro no: " . mysqli_connect_errno() . PHP_EOL . "<br />";
    echo "Depurando erro: " . mysqli_connect_error() . PHP_EOL;
    exit;
}else{
    /* echo "Sucesso: Foi feita uma conexão adequada ao MySQL!<br />" . PHP_EOL;
    echo "Informações do Host: " . mysqli_get_host_info($conn) . PHP_EOL; */
}

      
?>
