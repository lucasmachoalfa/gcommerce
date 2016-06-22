<?php

class Carrinho {

    private $idCarrinho;
    private $idCliente;
    private $idProduto;
    private $dataCadastro;
    private $status;
    private $quantidade;
    
    public function getIdCarrinho() {
        return $this->idCarrinho;
    }
    public function setIdCarrinho($idCarrinho) {
        $this->idCarrinho = seg($idCarrinho);
    }

    public function getIdCliente() {
        return $this->idCliente;
    }
    public function setIdCliente($idCliente) {
        $this->idCliente = seg($idCliente);
    }
    
    public function getIdProduto() {
        return $this->idProduto;
    }
    public function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }
    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = seg($dataCadastro);
    }

    public function getStatus() {
        return $this->status;
    }
    public function setStatus($status) {
        $this->status = seg($status);
    }

    public function getQuantidade() {
        return $this->quantidade;
    }
    public function setQuantidade($quantidade) {
        $this->quantidade = seg($quantidade);
    }

}

$objCarrinho = new Carrinho();