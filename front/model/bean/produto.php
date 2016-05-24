<?php
class Produto {

    private $idProduto;
    private $idVendedor;
    private $idOpcao;
    private $idVariacao;

    function getIdProduto() {
        return $this->idProduto;
    }
    function setIdProduto($idProduto) {
        $this->idProduto = seg($idProduto);
    }

    function getIdVendedor() {
        return $this->idVendedor;
    }
    function setIdVendedor($idVendedor) {
        $this->idVendedor = seg($idVendedor);
    }

    function getIdOpcao() {
        return $this->idOpcao;
    }
    function setIdOpcao($idOpcao) {
        $this->idOpcao = seg($idOpcao);
    }

    function getIdVariacao() {
        return $this->idVariacao;
    }
    function setIdVariacao($idVariacao) {
        $this->idVariacao = seg($idVariacao);
    }

}

$objProduto = new Produto();
