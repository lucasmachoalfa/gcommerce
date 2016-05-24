<?php

require_once 'banco.php';
require_once 'bean/produto.php';

class ProdutoDao extends Banco {

    public function listaProdutos(Produto $objProduto = NULL) {
        $conexao = $this->abreConexao();

        $where = '';
        if ($objProduto != NULL) {
            $where = 'AND p.idProduto =' . $objProduto->getIdProduto();
        }

        $sql = "SELECT p.*            
                FROM " . TBL_PRODUTOS . " p
                    WHERE p.status = 1
                    
                    " . $where . "
                ";

        $banco = $conexao->query($sql) or die($conexao->error);

        $linhas = array();

        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;
        $this->fechaConexao();
    }

    public function listaVariacoesProduto(Produto $objProduto) {
        $conexao = $this->abreConexao();

        $sql = "SELECT
                v.idOpcao, o.titulo AS opcao, GROUP_CONCAT(DISTINCT v.idVariacao,'-',v.titulo,'-',v.`atributo`) AS variacao
                    FROM " . REL_VARIACAO_PRODUTO . " rv
                    JOIN " . TBL_VARIACAO . " v ON v.`idVariacao` = rv.`idVariacao`
                    JOIN " . TBL_OPCOES . " o ON v.`idOpcao` = o.`idOpcao`
                        WHERE rv.idProduto = " . $objProduto->getIdProduto() . "
                        GROUP BY rv.`idOpcao`
                        ORDER BY rv.`idOpcao`, o.`ordem`, v.ordem;";

        $banco = $conexao->query($sql) or die($conexao->error);

        $linhas = array();

        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;

        $this->fechaConexao();
    }

    public function buscaVariacoesProduto(Produto $objProduto) {
        $conexao = $this->abreConexao();

        $sqlReferencia = "SELECT GROUP_CONCAT('\"',referencia,'\"') as referencia
                            FROM " . REL_VARIACAO_PRODUTO . "
                                WHERE idProduto = " . $objProduto->getIdProduto() . "
                                AND idVariacao = " . $objProduto->getIdVariacao() . "
                            ";

        $banco = $conexao->query($sqlReferencia);

        $referencias = $banco->fetch_assoc()['referencia'];

        $sql = "SELECT *
                    FROM " . REL_VARIACAO_PRODUTO . "
                        WHERE referencia  IN( " . $referencias . ")
                        AND idOpcao != " . $objProduto->getIdOpcao();

        $banco = $conexao->query($sql) or die($conexao->error);

        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;
        $this->fechaConexao();
    }

    public function buscaAtributo($where) {
        $conexao = $this->abreConexao();

        $sql = "SELECT *
                    FROM " . REL_VARIACAO_PRODUTO . "
                        WHERE 1 = 1
                        " . $where . "
                    GROUP BY referencia
                ";

        $banco = $conexao->query($sql);

        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }


        return $linhas;
        $this->fechaConexao();
    }

}

$objProdutoDao = new ProdutoDao();
