<?php

require_once '../model/produtoDao.php';
require_once 'funcoes.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'buscaInput':
        $produto = $_POST['query'];

        $produtos = ($produto != '') ? json_encode($objProdutoDao->listaProdutos(NULL, $produto)) : '';

        print_r($produtos);

        break;

    case 'cadastrar':
        $slug = slug($_POST['nomeProduto']);
        $imagens = reArrayFiles($_FILES['imagem']);

        //detalhes
        $objProduto->setIdVendedor($_POST['vendedor']);
        $objProduto->setNome($_POST['nomeProduto']);
        $objProduto->setSlug($slug);
        $objProduto->setResumo($_POST['resumoProduto']);
        $objProduto->setVideo($_POST['videoUrl']);
        $objProduto->setDescricao($_POST['descricaoProduto']);
        $objProduto->setPrecoNormal(str_replace(',', '.', $_POST['precoNormal']));
        $objProduto->setPrecoPromocional(str_replace(',', '.', $_POST['precoPromocional']));
        $objProduto->setMaximaParcelas($_POST['maximoParcelas']);
        $objProduto->setCustoProduto(str_replace(',', '.', $_POST['custoProduto']));

        //categorias
        $categorias = ($_POST['categorias'] != '') ? $_POST['categorias'] : NULL;

        //estoque e variações
        $opcoesProdutos = json_decode($_POST['opcoesProdutos']);
        var_dump($opcoesProdutos);
        
        $objProduto->setReferencia($_POST['referenciaProduto']);
        $objProduto->setGerenciarEstoque($_POST['gerenciarEstoque']);
        $objProduto->setQuantidadeFixa($_POST['quantidadeFixa']);
        $objProduto->setQuantidade($_POST['quantidade']);

        //envio
        $objProduto->setTipoProduto($_POST['tipoProduto']);
        $objProduto->setPeso(str_replace(',', '.', $_POST['pesoProduto']));
        $objProduto->setComprimento($_POST['comprimentoProduto']);
        $objProduto->setLargura($_POST['larguraProduto']);
        $objProduto->setAltura($_POST['alturaProduto']);
        $objProduto->setDiasProcessamento($_POST['diasProcessamento']);

        //seo
        $objProduto->setUrlSeo($_POST['urlSeo']);
        $objProduto->setTituloSeo($_POST['tituloSeo']);
        $objProduto->setDescricaoSeo($_POST['descricaoSeo']);
        $objProduto->setPalavraChaveSeo($_POST['palavrasChaveSeo']);

        //demais
        $objProduto->setDataCadastro(date('Y-m-d H:i:s'));
        $objProduto->setStatus(1);


        $idProduto = $objProdutoDao->cadastrarProduto($objProduto);

        foreach ($imagens as $imagem) {
            uploadImagem($imagem, 'produto/'.$idProduto);
        }
        
        if($categorias != NULL){
            $explodeCategorias = explode(',',$categorias);
            
            foreach($explodeCategorias as $idCategoria){
                $query .= '('.$idProduto.','.$idCategoria.'),';
            }
            
            $query = rtrim($query,',');
            
            $objProdutoDao->cadRelCategoria($query);
        }
        break;
}