<?php
require_once './funcoes.php';
require_once '../model/produtoDao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'calculaCep':
        $linhas = calculaFrete($_POST['peso'],$_POST['comprimento'],$_POST['altura'],$_POST['largura'],$_POST['cep']);

        $retorno = json_encode($linhas);
        print_r($retorno);
        break;

    case 'buscaAtributos':
        $idOpcao = $_POST['idOpcao'];
        $idVariacao = $_POST['idVariacao'];
        $idProduto = $_POST['idProduto'];

        $objProduto->setIdProduto($idProduto);
        $objProduto->setIdVariacao($idVariacao);
        $objProduto->setIdOpcao($idOpcao);

        $atributos = $objProdutoDao->buscaVariacoesProduto($objProduto);

//        var_dump($atributos);

        $idOpcao = '';
        $variacoes = array();
        foreach ($atributos as $atributo) {
            $idOpcao = $atributo['idOpcao'];
//            $variacoes[] = $atributo['idVariacao'];
            $variacao = array('idVariacao' => $atributo['idVariacao'], 'referencia' => $atributo['referencia'], 'quantidade' => $atributo['quantidade'], 'preco' => $atributo['preco'], 'peso' => $atributo['peso']);
            $variacoes[] = $variacao;
        }
        $atributos = array('idOpcao' => $idOpcao, 'variacoes' => $variacoes);
        $atributos = json_encode($atributos);

        print_r($atributos);
        break;

    case 'buscaReferenciaAtributos':

        $atributos = array_filter(json_decode($_POST['json']));

//        var_dump($atributo);
//        die();
        $where = '';
        foreach ($atributos as $atribtuo) {

            $idVariacao = $atribtuo->idVariacao;
            $idProduto = $atribtuo->idProduto;
            
            $where .= 'AND referencia IN( (SELECT referencia FROM '.REL_VARIACAO_PRODUTO.' WHERE idVariacao = ' . $idVariacao . ' AND idProduto = ' . $idProduto . ') )';
        }

        $atributo = $objProdutoDao->buscaAtributo($where);

        print_r(json_encode($atributo));
        break;
}