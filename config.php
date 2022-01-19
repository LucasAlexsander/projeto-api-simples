<?php
    $dbType = 'mysql';
    $dbName = 'notes';
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPass = '';

    $pdo = new PDO($dbType.':dbname='.$dbName.';host='.$dbHost, $dbUser, $dbPass);

    $array = [
        'error' => '',
        'result' => []
    ];
?>