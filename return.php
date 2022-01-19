<?php

header("Access-Control-Allow-Origin: *"); //Permitir os sites
header("Access-Control-Allow-Methods: GET, PUT, DELETE, POST, OPTIONS"); //Permitir os metodos de aquisições (put e delete)
header("Content-Type: application/json"); //Mostrar que o retorno sempre vai ser um JSON
echo json_encode($array);
exit;
