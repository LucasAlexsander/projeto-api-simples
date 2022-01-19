<?php
require_once '../config.php';

$method = strtolower($_SERVER['REQUEST_METHOD']);
if ($method === 'post') { //Verifica a requisição, se foi igual a GET

    $title = filter_input(INPUT_POST, 'title');
    $body = filter_input(INPUT_POST, 'body');

    if ($title && $body) {
        
        $sql = $pdo->prepare('INSERT INTO notes (title, body) VALUES (:title, :body)');
        $sql->bindValue(':title', $_POST['title']);
        $sql->bindValue(':body', $_POST['body']);
        $sql->execute();
        

        //Pegando o Id inserido
        $id = $pdo->lastInsertId();

        array['result'] = [
            'id' => $id,
            'title' => $title,
            'body' => $body
        ]

    } else {

        $array['error'] = 'Titulo e Body não enviados!';

    }

} else {

    $array['error'] = 'Método não permitido (Apenas POST).';
}

require_once '../return.php';