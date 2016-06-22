<?php

require_once '../model/carrinhoDao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'cadCarrinho':
        $idProduto = $_POST['idProduto'];
        $idCliente = $_POST['idCliente'];
        $quantidade = $_POST['quantidade'];
        $status = 0;
        $dataCadastro = date('Y-m-d H:i:s');

        $objCarrinho->setIdProduto($idProduto);
        $objCarrinho->setIdCliente($idCliente);
        $objCarrinho->setQuantidade($quantidade);
        $objCarrinho->setStatus($status);
        $objCarrinho->setDataCadastro($dataCadastro);

        $idCarrinho = $objCarrinhoDao->cadCarrinho($objCarrinho);

        echo $idCarrinho;
        break;
}