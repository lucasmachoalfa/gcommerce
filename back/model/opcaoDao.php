<?php

require_once 'banco.php';
require_once 'bean/opcao.php';
require_once 'bean/variacao.php';

class OpcaoDao extends Banco {

    public function listaOpcoes(Opcao $objOpcao = NULL) {
        $conexao = $this->abreConexao();

        $where = '';
        if ($objOpcao != NULL) {
            $where = 'AND o.idOpcao ' . $objOpcao->getIdOpcao();
        }
        $sql = "SELECT o.idOpcao, o.titulo, GROUP_CONCAT(v.idVariacao,'-',v.titulo,'-',v.atributo ORDER BY v.ordem) AS variacoes
                FROM " . TBL_OPCOES . " o
                LEFT JOIN " . TBL_VARIACAO . " v ON o.idOpcao = v.idOpcao AND v.status = 1
                WHERE o.status = 1
                " . $where . "
                GROUP BY o.idOpcao
                ORDER BY o.ordem
                ";

        $banco = $conexao->query($sql);

        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $variacoes = array();
            $i = 0;
            $explode = explode(',', $linha['variacoes']);

            foreach ($explode as $variacao) {
                $campos = explode('-', $variacao);
                if (count($campos) > 1) {
                    $camposArr = ['idVariacao' => $campos[0], 'titulo' => $campos[1], 'atributo' => $campos[2]];
                    $variacoes[$i] = $camposArr;
                    $i++;
                }
            }

            unset($linha['variacoes']);
            $linha['variacoes'] = $variacoes;
//            unset($variacoes);
            $linhas[] = $linha;
        }

        return $linhas;
        $this->fechaConexao();
    }

    public function delVariacao(Variacao $objVariacao) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_VARIACAO . " SET
                status = 0
                WHERE idVariacao = " . $objVariacao->getIdVariacao() . "
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function cadVariacao(Variacao $objVariacao) {
        $conexao = $this->abreConexao();

        echo $sql = "INSERT INTO " . TBL_VARIACAO . " SET
                idOpcao = " . $objVariacao->getIdOpcao() . ",
                titulo = '" . $objVariacao->getTitulo() . "',
                atributo = '" . $objVariacao->getAtributo() . "',
                status = 1,
                ordem = 0
               ";

        $conexao->query($sql) or die($conexao->error);

        $this->fechaConexao();
    }

    public function altVariacao(Variacao $objVariacao) {
        $conexao = $this->abreConexao();

//        echo $sql = "UPDATE " . TBL_VARIACAO . " SET
//                titulo = '" . $objVariacao->getTitulo() . "',
//                atributo = '" . $objVariacao->getAtributo() . "'
//                    WHERE idVariacao = ".$objVariacao->getIdVariacao()."
//               ";
        echo $sql = "UPDATE " . TBL_VARIACAO . " SET
                titulo = '" . $objVariacao->getTitulo() . "'
                    WHERE idVariacao = " . $objVariacao->getIdVariacao() . "
               ";

        $conexao->query($sql) or die($conexao->error);

        $this->fechaConexao();
    }

    public function delOpcao(Opcao $objOpcao) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_OPCOES . " SET
                status = 0
                WHERE idOpcao = " . $objOpcao->getIdOpcao() . "
               ";

        $conexao->query($sql) or die($sql . ' ' . $conexao->error);

        $this->fechaConexao();
    }

    public function cadOpcao(Opcao $objOpcao) {
        $conexao = $this->abreConexao();

        echo $sql = "INSERT INTO " . TBL_OPCOES . " SET
                titulo = '" . $objOpcao->getTitulo() . "',
                status = 1,
                ordem = 0
               ";

        $conexao->query($sql) or die($sql . ' ' . $conexao->error);

        $this->fechaConexao();
    }

    public function altOpcao(Opcao $objOpcao) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_OPCOES . " SET
                titulo = '" . $objOpcao->getTitulo() . "'
                WHERE idOpcao = " . $objOpcao->getIdOpcao() . "
               ";

        $conexao->query($sql) or die($sql . ' ' . $conexao->error);

        $this->fechaConexao();
    }

}

$objOpcaoDao = new OpcaoDao();
