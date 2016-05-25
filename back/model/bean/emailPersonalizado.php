<?php
class Email{
    private $idEmail;
    private $titulo;
    private $nome;
    private $assunto;
    private $mensagem;
    private $mensagemSMS;
    private $status;
    
    public function getIdEmail() {
        return $this->idEmail;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getAssunto() {
        return $this->assunto;
    }

    public function getMensagem() {
        return $this->mensagem;
    }

    public function getMensagemSMS() {
        return $this->mensagemSMS;
    }

    public function getStatus() {
        return $this->status;
    }
    
    public function setIdEmail($idEmail) {
        $this->idEmail = seg($idEmail);
    }

    public function setTitulo($titulo) {
        $this->titulo = seg($titulo);
    }

    public function setNome($nome) {
        $this->nome = seg($nome);
    }

    public function setAssunto($assunto) {
        $this->assunto = seg($assunto);
    }

    public function setMensagem($mensagem) {
        $this->mensagem = seg($mensagem);
    }

    public function setMensagemSMS($mensagemSMS) {
        $this->mensagemSMS = seg($mensagemSMS);
    }

    public function setStatus($status) {
        $this->status = seg($status);
    }


}

$objEmail = new Email();