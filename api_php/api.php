<?php 
    
    header("Content-Type: application/json");

    $metodo = $_SERVER['REQUEST_METHOD'];

    $arquivo = 'usuarios.json'; // guarda o nome do arquivo(string)

    if (!file_exists($arquivo)) {
        file_put_contents($arquivo,json_encode([],JSON_PRETTY_PRINT | JSON_UNESCAPE_UNICODE)); // CRIAÇÃO E FORMATAÇÃO DO ARQUIVO JSON

    }

    $usuarios = json_decode(file_get_contents($arquivo), true);



    // echo "Método da requisição: ". $metodo;


    // vetor php
    // $usuarios = [
    //     ["id" => 1, "nome" => "Maria Souza", "email" => "maria@email.com" ],
    //     ["id" => 2, "nome" => "João Silva", "email" => "joao@email.com"]

    // ];

    switch ($metodo) {
        case 'GET':

            // echo "Aqui está as ações do GET";
              echo json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            break;

        case 'POST':

            // echo "Aqui está as ações do POST";
            $dados = json_decode(file_get_contents('php://input'), true);
            // print_r($dados);

            if (!isset($dados["id"]) || !isset($dados["nome"]) || !isset($dados["email"])){
                http_response_code(400);
                echo json_enconde(["erro" => " Dados incompletos. "], JSON_UNESCAPED_UNICODE);
                exit;
            }


            $novoUsuario = [
                "id" => $dados["id"],
                "nome" => $dados["nome"],
                "email" => $dados["email"]
            ];


            $usuarios[] = $novoUsuario;

            file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            echo json_encode(["mensagem" => "Usuário inserido com sucesso", "usuarios" => $usuarios], JSON_UNESCAPED_UNICODE);

            // array_push($usuarios,$novoUsuario); //pega um vetor e adiciona os novos dados no vetor original
            // echo json_encode('Usuário inserido com sucesso');
            // print_r($usuarios);

            break;
        
        default:

            // echo "Método não encontrado";  

            http_response_code(405); 
            echo json_encode(["erro" => "Método não permitido!"], JSON_UNESCAPED_UNICODE);
            break;
    }

  

    // echo json_encode($usuarios)


?>