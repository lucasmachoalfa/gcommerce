<?php

require_once 'banco.php';

//require_once 'bean/opcao.php';


class OpcaoDao extends Banco {

    public function listaOpcoes() {
        $conexao = $this->abreConexao();

        $sql = "SELECT o.idOpcao, o.titulo
                FROM " . TBL_OPCOES . " o
                LEFT JOIN " . TBL_VARIACAO . " v ON o.idOpcao = v.idOpcao
                WHERE o.status = 1";

        $banco = $conexao->query($sql);

        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }


        return $linhas;
        $this->fechaConexao();
    }

}

$objOpcaoDao = new OpcaoDao();
