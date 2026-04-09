<?php 
    
    header("Content-Type: application/json");

    $metodo = $_SERVER['REQUEST_METHOD'];

    // echo "Método da requisição: ". $metodo;

    switch ($metodo) {
        case 'GET':
            echo "Aqui está as ações do GET";
            break;

        case 'POST':
            echo "Aqui está as ações do POST";
            break;
        
        default:
            echo "Método não encontrado";            
            break;
    }

    // $usuarios = [
    //     ["id" => 1, "nome" => "Fulano", "email" => "fulano@email.com" ],
    //     ["id" => 2, "nome" => "Ciclano", "email" => "ciclano@email.com"]

    // ];

    // echo json_encode($usuarios)


?>