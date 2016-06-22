<?php

require_once 'banco.php';
require_once 'bean/carrinho.php';

class CarrinhoDao extends Banco {

    public function cadCarrinho(Carrinho $objCarrinho) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_CARRINHO . " SET
                idCliente = " . $objCarrinho->getIdCliente() . ",
                status = " . $objCarrinho->getStatus() . ",
                dataCadastro = '" . $objCarrinho->getDataCadastro() . "'
               ";

        $conexao->query($sql);

        $idCarrinho = $conexao->insert_id;

        $objCarrinho->setIdCarrinho($idCarrinho);
        $this->fechaConexao();

        $this->cadCarrinhoProduto($objCarrinho);

        return $idCarrinho;
    }

    public function cadCarrinhoProduto(Carrinho $objCarrinho) {
        $conexao = $this->abreConexao();

        $sqlCarrinhoProduto = "
                                INSERT INTO " . REL_CARRINHO_PRODUTO . " SET
                                idCarrinho = " . $objCarrinho->getIdCarrinho() . ",
                                idProduto = " . $objCarrinho->getIdProduto() . ",
                                quantidade = " . $objCarrinho->getQuantidade() . "
                              ";

        $conexao->query($sqlCarrinhoProduto);
        $this->fechaConexao();
    }

}

$objCarrinhoDao = new CarrinhoDao();
