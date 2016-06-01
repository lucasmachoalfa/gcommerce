<?php
require_once 'banco.php';
require_once 'bean/endereco.php';

class EnderecoDao extends Banco{
    public function listaEstados() {
        $conexao = $this->abreConexao();

        $sql = "SELECT * FROM " . TBL_ESTADOS;

        $banco = $conexao->query($sql);

        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;
        $this->fechaConexao();
    }

    public function listaCidades($estado) {
        $conexao = $this->abreConexao();

        $sql = "SELECT
                idCidade,
                nomeCidade
                    FROM " . TBL_CIDADES . "
                        WHERE siglaUF = '" . $estado . "'";

        $banco = $conexao->query($sql);

        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;
        $this->fechaConexao();
    }

    public function verCidade1($cidade) {
        $conexao = $this->abreConexao();

        $sql = "SELECT
                idCidade
                    FROM " . TBL_CIDADES . "
                        WHERE nomeCidade = '" . $cidade . "'";

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();

        return $linha['idCidade'];
        $this->fechaConexao();
    }
    
    public function cadEndereco(Endereco $objEndereco){
        $conexao = $this->abreConexao();
        
        echo $sql = "INSERT INTO ".TBL_ENDERECOS." SET
                idCliente = ".$objEndereco->getIdCliente().",
                nome = '".$objEndereco->getNome()."',
                cep = '".$objEndereco->getCep()."',
                logradouro = '".$objEndereco->getLogradouro()."',
                numero = '".$objEndereco->getNumero()."',
                complemento = '".$objEndereco->getComplemento()."',
                bairro = '".$objEndereco->getBairro()."',
                estado = '".$objEndereco->getEstado()."',
                cidade = ".$objEndereco->getCidade()."
               ";
        
        $conexao->query($sql) or die($conexao->error);
        
        $this->fechaConexao();
    }

}

$objEnderecoDao = new EnderecoDao();