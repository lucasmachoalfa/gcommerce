<?php

require_once '../model/emailDao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'listaConfiguracaoEmail':
        $titulo = $_POST['email'];

        $objEmail->setTitulo($titulo);

        $configuracao = $objEmailDao->listaEmail($objEmail);

        echo json_encode(utf8Converter($configuracao));
        break;
    
    case 'alterar':
        $idEmail = $_POST['idEmail'];
        $nome = $_POST['nome'];
        $assunto = $_POST['assunto'];
        $mensagem = $_POST['mensagem'];
        $mensagemSMS = $_POST['mensagemSMS'];
        
        $objEmail->setIdEmail($idEmail);
        $objEmail->setNome($nome);
        $objEmail->setAssunto($assunto);
        $objEmail->setMensagem($mensagem);
        $objEmail->setMensagemSMS($mensagemSMS);
        
        $objEmailDao->altEmail($objEmail);
        break;
}

function utf8Converter($array) {
    array_walk_recursive($array, function(&$item, $key) {
        if (!mb_detect_encoding($item, 'utf-8', true)) {
            $item = utf8_encode($item);
        }
    });

    return $array;
}
