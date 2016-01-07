<?php
require_once 'banco.php';

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

}

$objEnderecoDao = new EnderecoDao();