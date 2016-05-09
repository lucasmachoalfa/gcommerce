<?php

function uploadImagem($arquivo, $pasta) {

    $pasta .= '/';
    $tipoArquivo = pathinfo($arquivo['name']);
    $tipoArquivo = '.' . $tipoArquivo['extension'];

    $novaImagem = strtolower(md5(date('d/m/Y/H:i:s'))) . $tipoArquivo;
    $imagem = '../images/';

    if (!file_exists($imagem)) {
        @mkdir($imagem);
    }

    if (!file_exists($imagem . $pasta)) {
        @mkdir($imagem . $pasta);
    }

    $caminho = $imagem . $pasta;

    @move_uploaded_file($arquivo['tmp_name'], $caminho . $novaImagem);

    $retorno = $pasta . $novaImagem;

    return $retorno;
}

function utf8Converter($array) {
    array_walk_recursive($array, function(&$item, $key) {
        if (!mb_detect_encoding($item, 'utf-8', true)) {
            $item = utf8_encode($item);
        }
    });

    return $array;
}

function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i = 0; $i < $file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}