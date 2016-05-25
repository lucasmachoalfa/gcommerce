<?php
class Cliente {
    private $idCliente;
    private $email;
    private $nome;
    private $senha;
    private $telefone;
    private $cpf;
    private $dataNascimento;
    private $sexo;

    public function getIdCliente() {
        return $this->idCliente;
    }
    public function setIdCliente($idCliente) {
        $this->idCliente = seg($idCliente);
    }
    
    

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = seg($email);
    }
    

    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = seg($nome);
    }
    

    public function getSenha() {
        return $this->senha;
    }
    public function setSenha($senha) {
        $this->senha = seg($senha);
    }
    

    public function getTelefone() {
        return $this->telefone;
    }
    public function setTelefone($telefone) {
        $this->telefone = seg($telefone);
    }
    

    public function getCpf() {
        return $this->cpf;
    }
    public function setCpf($cpf) {
        $this->cpf = seg($cpf);
    }
    

    public function getDataNascimento() {
        return $this->dataNascimento;
    }
    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = seg($dataNascimento);
    }

    
    public function getSexo() {
        return $this->sexo;
    }
    public function setSexo($sexo) {
        $this->sexo = seg($sexo);
    }
}

$objCliente = new Cliente();
