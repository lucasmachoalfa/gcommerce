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

    public function listaProdutosCarrinho(Produto $objProduto) {
        $conexao = $this->abreConexao();

        $sql = "SELECT p.*, vp.preco AS precoVariacao, vp.peso AS pesoVariacao, vp.quantidade AS quantidadeVariacao
                    FROM " . TBL_PRODUTOS . " p
                    LEFT JOIN " . REL_VARIACAO_PRODUTO . " vp ON p.idProduto = vp.idProduto
                        WHERE p.idProduto IN(" . $objProduto->getIdProduto() . ")
                        AND vp.referencia IN(" . $objProduto->getReferencia() . ")
                        GROUP BY vp.referencia
               ";

        $banco = $conexao->query($sql);

        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;
        $this->fechaConexao();
    }

    public function listaProdutosResumoCarrinho($idCarrinho) {
        $conexao = $this->abreConexao();

        $sql = "SELECT (p.precoPromocional * cp.quantidade) as preco, p.nome, cp.quantidade
                    FROM " . REL_CARRINHO_PRODUTO . " cp
                    JOIN " . TBL_PRODUTOS . " p ON cp.idProduto = p.idProduto
                        WHERE cp.idCarrinho = " . $idCarrinho;

        $banco = $conexao->query($sql) or die($conexao->error);

        $linhas = array();

        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;

        $this->fechaConexao();
    }

    public function listaProdutosDetalheCarrinho($idCarrinho, $referencia = NULL) {
        $conexao = $this->abreConexao();

        $sql = "SELECT p.*, GROUP_CONCAT(o.titulo) AS opcoes, GROUP_CONCAT(v.titulo) AS variacoes
                    FROM " . REL_CARRINHO_PRODUTO . " cp
                        JOIN " . TBL_PRODUTOS . " p ON cp.idProduto = p.idProduto
                        JOIN " . REL_VARIACAO_PRODUTO . " rp ON p.idProduto = rp.idProduto AND rp.referencia IN(" . $referencia . ")
                        JOIN " . TBL_OPCOES . " o ON o.idOpcao = rp.idOpcao
                        JOIN " . TBL_VARIACAO . " v ON v.idVariacao = rp.idVariacao
                            WHERE cp.idCarrinho = " . $idCarrinho . "
                                GROUP BY rp.referencia
                ";

        $banco = $conexao->query($sql) or die($conexao->error);

        $linhas = array();

        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;
        $this->fechaConexao();
    }

    public function listaFreteProdutosCarrinho($idCarrinho, $referencia) {
        $conexao = $this->abreConexao();
        
        $sql = "
                SELECT p.*, cp.quantidade, rp.preco AS precoVariacao, rp.peso AS pesoVariacao, rp.quantidade AS quantidadeVariacao
                    FROM " . REL_CARRINHO_PRODUTO . " cp
                    JOIN " . TBL_PRODUTOS . " p ON cp.idProduto = p.idProduto
                    JOIN " . REL_VARIACAO_PRODUTO . " rp ON p.idProduto = rp.idProduto AND rp.referencia IN(" . $referencia . ")
                        WHERE cp.idCarrinho = " . $idCarrinho . " GROUP BY p.idProduto
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
