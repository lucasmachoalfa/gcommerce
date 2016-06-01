<?php
class Endereco {
    private $idEndereco;
    private $idCliente;
    private $nome;
    private $cep;
    private $logradouro;
    private $numero;
    private $complemento;
    private $bairro;
    private $estado;
    private $cidade;
    
    
    public function getIdEndereco() {
        return $this->idEndereco;
    }
    public function setIdEndereco($idEndereco) {
        $this->idEndereco = seg($idEndereco);
    }
    
    
    public function getIdCliente(){
        return $this->idCliente;
    }
    public function setIdCliente($idCliente){
        $this->idCliente = seg($idCliente);
    }
    

    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = seg($nome);
    }
    
    

    public function getCep() {
        return $this->cep;
    }
    public function setCep($cep) {
        $this->cep = seg($cep);
    }
    
    

    public function getLogradouro() {
        return $this->logradouro;
    }
    public function setLogradouro($logradouro) {
        $this->logradouro = seg($logradouro);
    }
    
    

    public function getNumero() {
        return $this->numero;
    }
    public function setNumero($numero) {
        $this->numero = seg($numero);
    }
    
    

    public function getComplemento() {
        return $this->complemento;
    }
    public function setComplemento($complemento) {
        $this->complemento = seg($complemento);
    }
    
    

    public function getBairro() {
        return $this->bairro;
    }
    public function setBairro($bairro) {
        $this->bairro = seg($bairro);
    }
    
    

    public function getEstado() {
        return $this->estado;
    }
    public function setEstado($estado) {
        $this->estado = seg($estado);
    }
    
    

    public function getCidade() {
        return $this->cidade;
    }
    public function setCidade($cidade) {
        $this->cidade = seg($cidade);
    }
}

$objEndereco = new Endereco();