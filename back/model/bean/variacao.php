<?php
class Variacao {
    private $idOpcao;
    private $idVariacao;
    private $titulo;
    private $status;
    private $atributo;
    private $ordem;
    
    public function getIdOpcao() {
        return $this->idOpcao;
    }
    public function setIdOpcao($idOpcao) {
        $this->idOpcao = seg($idOpcao);
    }
    

    public function getIdVariacao() {
        return $this->idVariacao;
    }
    public function setIdVariacao($idVariacao) {
        $this->idVariacao = seg($idVariacao);
    }
    

    public function getTitulo() {
        return $this->titulo;
    }
    public function setTitulo($titulo) {
        $this->titulo = seg($titulo);
    }
    

    public function getStatus() {
        return $this->status;
    }
    public function setStatus($status) {
        $this->status = seg($status);
    }
    

    public function getAtributo() {
        return $this->atributo;
    }
    public function setAtributo($atributo) {
        $this->atributo = seg($atributo);
    }
    

    public function getOrdem() {
        return $this->ordem;
    }
    public function setOrdem($ordem) {
        $this->ordem = seg($ordem);
    }
}

$objVariacao = new Variacao();