<?php
class Opcao {
    private $idOpcao;
    private $titulo;
    private $status;
    
    public function getIdOpcao() {
        return $this->idOpcao;
    }
    public function setIdOpcao($idOpcao) {
        $this->idOpcao = seg($idOpcao);
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
}

$objOpcao = new Opcao();
