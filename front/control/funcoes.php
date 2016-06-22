<?php

function calculaFrete($peso, $comprimento, $altura, $largura, $cep) {
//    echo $cep, ' ', $peso, ' ', $comprimento, ' ', $altura, ' ', $largura;
    
//
//    echo '<br />';


    $servico = array(
        40010 => 'Expresso', //SEDEX sem contrato.
        40045 => 'SEDEX a Cobrar, sem contrato.',
        40126 => 'SEDEX a Cobrar, com contrato.',
        40215 => 'SEDEX 10, sem contrato.',
        40290 => 'SEDEX Hoje, sem contrato.',
        40096 => 'SEDEX com contrato.',
        40436 => 'SEDEX com contrato.',
        40444 => 'SEDEX com contrato',
        40568 => 'SEDEX com contrato.',
        40606 => 'SEDEX com contrato.',
        41106 => 'Normal', //PAC sem contrato
        41068 => 'PAC com contrato.',
        81019 => 'e-SEDEX, com contrato.',
        81027 => 'e-SEDEX Prioritário, com conrato.',
        81035 => 'e-SEDEX Express, com contrato.',
        81868 => '(Grupo 1) e-SEDEX, com contrato.',
        81833 => '(Grupo 2) e-SEDEX, com contrato.',
        81850 => '(Grupo 3) e-SEDEX, com contrato.',
    );

    $peso = ($peso != "0" || $peso != "0.00" || $peso != "0.0") ? $peso : 1;
    $comprimento = ($comprimento != "0" || $comprimento != "0.00" || $comprimento != "0.0") ? $comprimento : 16;
    $altura = ($altura != "0" || $altura != "0.00" || $altura != "0.0") ? $altura : 2;
    $largura = ($largura != "0" || $largura != "0.00" || $largura != "0.0") ? $largura : 11;
    

    $data['nCdEmpresa'] = '';
    $data['sDsSenha'] = '';
    $data['sCepOrigem'] = $cep;
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

    return $linhas;
}

function uploadImagem($arquivo, $pasta, $principal) {

    $tipoArquivo = pathinfo($arquivo['name']);
    $tipoArquivo = '.' . $tipoArquivo['extension'];

    $novaImagem = strtolower(md5($arquivo['name'] . date('d/m/Y/H:i:s'))) . $tipoArquivo;
    if ($principal !== 0) {
        $novaImagem = '000_' . $novaImagem;
    }

    $imagem = '../images';

    if (!file_exists($imagem)) {
        mkdir($imagem);
    }

    $explode = explode('/', $pasta);

    $subPasta = '/';
    foreach ($explode as $pastai) {
        $subPasta .= $pastai . '/';

        $pastaAbsoluta = $imagem . $subPasta;

        if (!file_exists($pastaAbsoluta)) {
            mkdir($pastaAbsoluta);
        }
    }

    $caminhoArquivo = $imagem . $subPasta . $novaImagem;

    @move_uploaded_file($arquivo['tmp_name'], $caminhoArquivo);

    return $caminhoArquivo;
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

function remove_accent($str) {
    $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
    $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
    return str_replace($a, $b, $str);
}

function slug($str) {
    return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), remove_accent($str)));
}
