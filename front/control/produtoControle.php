<?php

require_once '../model/produtoDao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'calculaCep':
        $servico = array(
            40010 => 'SEDEX', // sem contrato.
            40045 => 'SEDEX a Cobrar, sem contrato.',
            40126 => 'SEDEX a Cobrar, com contrato.',
            40215 => 'SEDEX 10, sem contrato.',
            40290 => 'SEDEX Hoje, sem contrato.',
            40096 => 'SEDEX com contrato.',
            40436 => 'SEDEX com contrato.',
            40444 => 'SEDEX com contrato',
            40568 => 'SEDEX com contrato.',
            40606 => 'SEDEX com contrato.',
            41106 => 'PAC', //sem contrato
            41068 => 'PAC com contrato.',
            81019 => 'e-SEDEX, com contrato.',
            81027 => 'e-SEDEX Prioritário, com conrato.',
            81035 => 'e-SEDEX Express, com contrato.',
            81868 => '(Grupo 1) e-SEDEX, com contrato.',
            81833 => '(Grupo 2) e-SEDEX, com contrato.',
            81850 => '(Grupo 3) e-SEDEX, com contrato.',
        );

        $peso = ($_POST['peso'] != "0" || $_POST['peso'] != "0.00" || $_POST['peso'] != "0.0") ? $_POST['peso'] : 1;
        $comprimento = ($_POST['comprimento'] != "0" || $_POST['comprimento'] != "0.00" || $_POST['comprimento'] != "0.0") ? $_POST['comprimento'] : 16;
        $altura = ($_POST['altura'] != "0" || $_POST['altura'] != "0.00" || $_POST['altura'] != "0.0") ? $_POST['altura'] : 2;
        $largura = ($_POST['largura'] != "0" || $_POST['largura'] != "0.00" || $_POST['largura'] != "0.0") ? $_POST['largura'] : 11;

        
        $data['nCdEmpresa'] = '';
        $data['sDsSenha'] = '';
        $data['sCepOrigem'] = $_POST['cep'];
        $data['sCepDestino'] = '26015-005';
        $data['nVlPeso'] = $peso;
        $data['nCdFormato'] = '1';
        $data['nVlComprimento'] = $comprimento;
        $data['nVlAltura'] = $altura;
        $data['nVlLargura'] = $largura;
        $data['nVlDiametro'] = '0';
        $data['sCdMaoPropria'] = 'n';
        $data['nVlValorDeclarado'] = '0';
        $data['sCdAvisoRecebimento'] = 'n';
        $data['StrRetorno'] = 'xml';
        $data['nCdServico'] = '40010,41106';
        $data = http_build_query($data);

        $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';

        $curl = curl_init($url . '?' . $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($curl);
        $result = simplexml_load_string($result);
        $linhas = array();

        $i = 0;
        foreach ($result->cServico as $row) {

            if ($row->Erro !== '0') {
                $descricaoServico = $servico[(int) $row->Codigo];

                $linha = array('codigo' => (string) $row->Codigo, 'servico' => $descricaoServico, 'valor' => (string) $row->Valor, 'prazoEntrega' => (string) $row->PrazoEntrega);

                $linhas[] = json_decode(json_encode((array) $linha), TRUE);
            }
        }


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