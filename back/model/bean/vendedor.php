<?php
class Vendedor {
    private $idVendedor;
    private $nome;
    private $logo;
    private $status;
    private $dataCadastro;
    
    public function getIdVendedor() {
        return $this->idVendedor;
    }
    public function setIdVendedor($idVendedor) {
        $this->idVendedor = seg($idVendedor);
    }

        
    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = seg($nome);
    }
    

    public function getLogo() {
        return $this->logo;
    }
    public function setLogo($logo) {
        $this->logo = seg($logo);
    }
    

    public function getStatus() {
        return $this->status;
    }
    public function setStatus($status) {
        $this->status = seg($status);
    }
    

    public function getDataCadastro() {
        return $this->dataCadastro;
    }
    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = seg($dataCadastro);
    }
}
$objVendedor = new Vendedor();