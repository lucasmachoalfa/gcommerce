<?php

require_once 'banco.php';
require_once 'bean/endereco.php';

class EnderecoDao extends Banco {

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

    public function cadEndereco(Endereco $objEndereco) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_ENDERECOS . " SET
                idCliente = " . $objEndereco->getIdCliente() . ",
                nome = '" . utf8_encode($objEndereco->getNome()) . "',
                cep = '" . $objEndereco->getCep() . "',
                logradouro = '" . utf8_encode($objEndereco->getLogradouro()) . "',
                numero = '" . $objEndereco->getNumero() . "',
                complemento = '" . utf8_encode($objEndereco->getComplemento()) . "',
                bairro = '" . utf8_encode($objEndereco->getBairro()) . "',
                estado = '" . $objEndereco->getEstado() . "',
                cidade = " . $objEndereco->getCidade() . "
               ";

        $conexao->query($sql);
        
        $idEndereco = $conexao->insert_id;
        
        return $idEndereco;

        $this->fechaConexao();
    }
    
    public function listaEndereco1(Endereco $objEndereco){
        $conexao = $this->abreConexao();
        
        $sql = "SELECT *
                FROM ".TBL_ENDERECOS."
                    WHERE idEndereco = ".$objEndereco->getIdEndereco();
        
        $banco = $conexao->query($sql);
        
        $linha = $banco->fetch_assoc();
        
        return $linha;
        $this->fechaConexao();
    }

    public function listaEnderecosCliente($idCliente) {
        $conexao = $this->abreConexao();

        $sql = "SELECT e.cidade as idCidade, e.idEndereco, e.nome, e.logradouro, e.numero, e.complemento, e.bairro, e.cep, e.estado, c.nomeCidade as cidade
                FROM " . TBL_ENDERECOS . " e
                JOIN " . TBL_CIDADES . " c ON c.idCidade = e.cidade
                WHERE idCliente = " . $idCliente . "
                AND status = 1";

        $banco = $conexao->query($sql);

        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;

        $this->fechaConexao();
    }

    public function delEndereco(Endereco $objEndereco) {
        $conexao = $this->abreConexao();

        echo $sql = "UPDATE " . TBL_ENDERECOS . " SET status = 0 WHERE idEndereco = " . $objEndereco->getIdEndereco();
        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function listaEndereco1($idEndereco) {
        $conexao = $this->abreConexao();

        $sql = "SELECT e.idEndereco, e.cidade as idCidade,  e.nome, e.logradouro, e.numero, e.complemento, e.bairro, e.cep, e.estado, c.nomeCidade as cidade
                FROM " . TBL_ENDERECOS . " e
                JOIN " . TBL_CIDADES . " c ON c.idCidade = e.cidade
                WHERE idEndereco = " . $idEndereco . "
                AND status = 1";

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();

        return $linha;

        $this->fechaConexao();
    }

    public function altEndereco(Endereco $objEndereco) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_ENDERECOS . " SET
                nome = '" . utf8_encode($objEndereco->getNome()) . "',
                cep = '" . $objEndereco->getCep() . "',
                logradouro = '" . utf8_encode($objEndereco->getLogradouro()) . "',
                numero = '" . $objEndereco->getNumero() . "',
                complemento = '" . utf8_encode($objEndereco->getComplemento()) . "',
                bairro = '" . utf8_encode($objEndereco->getBairro()) . "',
                estado = '" . $objEndereco->getEstado() . "',
                cidade = " . $objEndereco->getCidade() . "
                    WHERE idEndereco = " . $objEndereco->getIdEndereco() . "
               ";

        $conexao->query($sql) or die($conexao->error);

        $this->fechaConexao();
    }

    public function setPadrao(Endereco $objEndereco) {
        $conexao = $this->abreConexao();

        echo $sql1 = "UPDATE " . TBL_ENDERECOS . " SET
                padrao = 0
                    WHERE idCliente = " . $objEndereco->getIdCliente() . "
               ";
        $conexao->query($sql1) or die($conexao->error);

        echo $sql2 = "UPDATE " . TBL_ENDERECOS . " SET
                padrao = 1
                    WHERE idEndereco = " . $objEndereco->getIdEndereco() . "
               ";

        $conexao->query($sql2) or die($conexao->error);
        $this->fechaConexao();
    }

}

$objEnderecoDao = new EnderecoDao();