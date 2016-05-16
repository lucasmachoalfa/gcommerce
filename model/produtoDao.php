<?php

require_once 'bean/produto.php';
require_once 'banco.php';

class ProdutoDao extends Banco {

    public function listaProdutos(Produto $objProduto = NULL, $busca = NULL) {
        $conexao = $this->abreConexao();

        $where = '';
        if ($objProduto != NULL) {
            $where .= ' AND p.idProduto ' . $objProduto->getIdProduto();
        }

        if ($busca != NULL) {
            $where .= ' AND (p.nome like "%' . $busca . '%" OR p.descricao like "%' . $busca . '%")';
        }

        $sql = "SELECT *
                    FROM " . TBL_PRODUTOS . " p
                        WHERE p.status IN (1,2)
                        " . $where . " ";

        $banco = $conexao->query($sql);

        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;
        $this->fechaConexao();
    }

    public function cadastrarProduto(Produto $objProduto) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_PRODUTOS . " SET
                idVendedor = '" . $objProduto->getIdVendedor() . "',
                nome = '" . $objProduto->getNome() . "',
                slug = '" . $objProduto->getSlug() . "',
                resumo = '" . $objProduto->getResumo() . "',
                video = '" . $objProduto->getVideo() . "',
                descricao = '" . $objProduto->getDescricao() . "',
                precoNormal = '" . $objProduto->getPrecoNormal() . "',
                precoPromocional = '" . $objProduto->getPrecoPromocional() . "',
                maximoParcelas = '" . $objProduto->getMaximaParcelas() . "',
                custoProduto = '" . $objProduto->getCustoProduto() . "',
                referencia = '" . $objProduto->getReferencia() . "',
                gerenciarEstoque = '" . $objProduto->getGerenciarEstoque() . "',
                quantidadeFixa = '" . $objProduto->getQuantidadeFixa() . "',
                quantidade = '" . $objProduto->getQuantidade() . "',
                tipoProduto = '" . $objProduto->getTipoProduto() . "',
                peso = '" . $objProduto->getPeso() . "',
                comprimento = '" . $objProduto->getComprimento() . "',
                largura = '" . $objProduto->getLargura() . "',
                altura = '" . $objProduto->getAltura() . "',
                diasProcessamento = '" . $objProduto->getDiasProcessamento() . "',
                urlSeo = '" . $objProduto->getUrlSeo() . "',
                tituloSeo = '" . $objProduto->getTituloSeo() . "',
                descricaoSeo = '" . $objProduto->getDescricaoSeo() . "',
                palavraChaveSeo = '" . $objProduto->getPalavraChaveSeo() . "',
                dataCadastro = '" . $objProduto->getDataCadastro() . "',
                status = '" . $objProduto->getStatus() . "'
               ";

        $conexao->query($sql) or die($conexao->error);

        $idProduto = $conexao->insert_id;

        return $idProduto;

        $this->fechaConexao();
    }

    public function cadRelCategoria($query) {
        $conexao = $this->abreConexao();

        $sql = 'INSERT INTO ' . REL_CATEGORIA_PRODUTO . ' (idProduto,idCategoria) VALUES ' . $query;

        $conexao->query($sql);

        $this->fechaConexao();
    }
    
    public function cadRelOpcao($query){
        $conexao = $this->abreConexao();

        $sql = 'INSERT INTO ' . REL_VARIACAO_PRODUTO . ' (idProduto, idOpcao, idVariacao, referencia, quantidade, preco, peso) VALUES '.$query;

        $conexao->query($sql);

        $this->fechaConexao();
    }

}

$objProdutoDao = new ProdutoDao();
