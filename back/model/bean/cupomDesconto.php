<?php

class CupomDesconto {

    private $idCupomDesconto;
    private $codigo;
    private $tipoCupom;
    private $valorDesconto;
    private $formatoDesconto;
    private $usoMaximo;
    private $usoMaximoCliente;
    private $dataInicio;
    private $dataFim;
    private $valorMinimo;
    private $cliente;
    private $tipoAplicacao;
    private $produto;
    private $categoria;
    private $status;

    function getIdCupomDesconto() {
        return $this->idCupomDesconto;
    }

    function setIdCupomDesconto($idCupomDesconto) {
        $this->idCupomDesconto = seg($idCupomDesconto);
    }

    function getCodigo() {
        return $this->codigo;
    }

    function setCodigo($codigo) {
        $this->codigo = seg($codigo);
    }

    function getTipoCupom() {
        return $this->tipoCupom;
    }

    function setTipoCupom($tipoCupom) {
        $this->tipoCupom = seg($tipoCupom);
    }

    function getValorDesconto() {
        return $this->valorDesconto;
    }

    function setValorDesconto($valorDesconto) {
        $this->valorDesconto = seg($valorDesconto);
    }

    function getFormatoDesconto() {
        return $this->formatoDesconto;
    }

    function setFormatoDesconto($formatoDesconto) {
        $this->formatoDesconto = seg($formatoDesconto);
    }

    function getUsoMaximo() {
        return $this->usoMaximo;
    }

    function setUsoMaximo($usoMaximo) {
        $this->usoMaximo = seg($usoMaximo);
    }

    function getUsoMaximoCliente() {
        return $this->usoMaximoCliente;
    }

    function setUsoMaximoCliente($usoMaximoCliente) {
        $this->usoMaximoCliente = seg($usoMaximoCliente);
    }

    function getDataInicio() {
        return $this->dataInicio;
    }

    function setDataInicio($dataInicio) {
        $this->dataInicio = seg($dataInicio);
    }

    function getDataFim() {
        return $this->dataFim;
    }

    function setDataFim($dataFim) {
        $this->dataFim = seg($dataFim);
    }

    function getValorMinimo() {
        return $this->valorMinimo;
    }

    function setValorMinimo($valorMinimo) {
        $this->valorMinimo = seg($valorMinimo);
    }

    function getCliente() {
        return $this->cliente;
    }

    function setCliente($cliente) {
        $this->cliente = seg($cliente);
    }

    function getTipoAplicacao() {
        return $this->tipoAplicacao;
    }

    function setTipoAplicacao($tipoAplicacao) {
        $this->tipoAplicacao = seg($tipoAplicacao);
    }

    function getProduto() {
        return $this->produto;
    }

    function setProduto($produto) {
        $this->produto = seg($produto);
    }

    function getCategoria() {
        return $this->categoria;
    }

    function setCategoria($categoria) {
        $this->categoria = seg($categoria);
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = seg($status);
    }

}

$objCupomDesconto = new CupomDesconto();
