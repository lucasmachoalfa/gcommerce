<?php

require_once '../model/enderecoDao.php';
require_once '../plugin/phpquery/phpQuery/phpQuery.php';
require_once 'funcoes.php';


$opcao = $_POST['opcao'];
switch ($opcao) {
    default :
        header('Location:../../');
        break;

    case 'buscaCep':
        $cep = addslashes($_POST['cep']);

        $html = simple_curl('http://m.correios.com.br/movel/buscaCepConfirma.do', array(
            'cepEntrada' => $cep,
            'tipoCep' => ",
            'cepTemp'=>",
            'metodo' => 'buscarCep'
        ));

        phpQuery::newDocumentHTML($html, $charset = 'utf-8');

        $dados = array(
            'logradouro' => trim(pq('.caixacampobranco .resposta:contains("Logradouro: ") + .respostadestaque:eq(0)')->html()),
            'bairro' => trim(pq('.caixacampobranco .resposta:contains("Bairro: ") + .respostadestaque:eq(0)')->html()),
            'cidade/uf' => trim(pq('.caixacampobranco .resposta:contains("Localidade / UF: ") + .respostadestaque:eq(0)')->html()),
            'cep' => trim(pq('.caixacampobranco .resposta:contains("CEP: ") + .respostadestaque:eq(0)')->html())
        );

        $dados['cidade/uf'] = explode('/', $dados['cidade/uf']);
//        var_dump($dados);
        $dados['cidade'] = trim($dados['cidade/uf'][0]);
        $dados['uf'] = trim($dados['cidade/uf'][1]);
        unset($dados['cidade/uf']);


        $cidade = $objEnderecoDao->verCidade1($dados['cidade']);
        $dados['cidade'] = $cidade;
        die(json_encode($dados));

        break;

    case 'buscaEndereco':
        $estado = addslashes($_POST['estado']);

        $cidades = $objEnderecoDao->listaEnderecos($estado);

        die(json_encode(utf8Converter($cidades)));
        break;

    case 'buscaCidade':
        $estado = addslashes($_POST['estado']);

        $cidades = $objEnderecoDao->listaCidades($estado);

        die(json_encode(utf8Converter($cidades)));
        break;
}

function simple_curl($url, $post = array(), $get = array()) {
    $url = explode('?', $url, 2);
    if (count($url) === 2) {
        $temp_get = array();
        parse_str($url[1], $temp_get);
        $get = array_merge($get, $temp_get);
    }

    $ch = curl_init($url[0] . "?" . http_build_query($get));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    return curl_exec($ch);
}