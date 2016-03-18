<?php

class Categoria {
    private $idCategoria;
    private $titulo;
    private $slug;
    private $status;
    
    public function getIdCategoria() {
        return $this->idCategoria;
    }
    public function setIdCategoria($idCategoria) {
        $this->idCategoria = seg($idCategoria);
    }
    

    public function getTitulo() {
        return $this->titulo;
    }
    public function setTitulo($titulo) {
        $this->titulo = seg($titulo);
    }

    
    public function getSlug() {
        return $this->slug;
    }
    public function setSlug($slug) {
        $this->slug = seg($slug);
    }
    
    
    public function getStatus() {
        return $this->status;
    }
    public function setStatus($status) {
        $this->status = seg($status);
    }


}

$objCategoria = new Categoria();