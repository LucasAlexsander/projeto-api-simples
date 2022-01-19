<?php
require_once '../config.php';

$method = strtolower($_SERVER['REQUEST_METHOD']);
if ($method === 'get') { //Verifica a requisição, se foi igual a GET

    $sql = $pdo->query('SELECT * FROM notes');
    if ($sql->rowCount() > 0) {
        $dados = $sql->fetchAll();

        foreach ($dados as $item) {

            $array['result'] = [];
            $array['result'][] = [
                'id' => $item[0],
                'title' => $item[1]
            ];
        } 
    }


} else {
    $array['error'] = 'Método não permitido (Apenas GET).';
}

require_once '../return.php'; 
