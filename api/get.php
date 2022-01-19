<?php
require_once '../config.php';

$method = strtolower($_SERVER['REQUEST_METHOD']);
if ($method === 'get') { //Verifica a requisição, se foi igual a GET

    $id = filter_input(INPUT_GET, 'id');

    if ($id) {

        $sql = $pdo->prepare("select * from notes where id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {

            $dados = $sql->fetch(PDO::FETCH_ASSOC);

            $array['result'] = [
                'id' => $dados['id'],
                'title' => $dados['title'],
                'body' => $dados['body']
            ];

        } else {

            $array['error'] = 'ID inexistente!';
        }

    } else {

        $array['error'] = 'ID não enviado';
    }


} else {

    $array['error'] = 'Método não permitido (Apenas GET).';
}

require_once '../return.php'; 