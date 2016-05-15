<?php

require_once 'bean/produto.php';
require_once 'banco.php';

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
                    ".$where."
                ";

        $banco = $conexao->query($sql) or die($conexao->error);

        $linhas = array();

        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;
        $this->fechaConexao();
    }

}

$objProdutoDao = new ProdutoDao();
