<?php

date_default_timezone_set('America/Sao_Paulo');
require_once 'banco.php';
require_once 'bean/categoria.php';

class CategoriaDao extends Banco {

    public function listaCategorias(Categoria $objCategoria = NULL, $paginacao = NULL) {
        $conexao = $this->abreConexao();

        $where = '';
        if ($objCategoria != NULL) {
            $where = ' AND c.idCategoria = ' . $objCategoria->getIdCategoria();
        }

        $limit = "";
        if ($paginacao != NULL) {
            $limit = "LIMIT " . $paginacao;
        }

        $sql = "SELECT c.*, count(p.idProduto) AS quantidade
                    FROM " . TBL_CATEGORIAS . " c
                    LEFT JOIN " . REL_CATEGORIA_PRODUTO . " cp ON cp.idCategoria = c.idCategoria
                    LEFT JOIN " . TBL_PRODUTOS . " p ON p.idProduto = cp.idProduto AND p.status = 1
                        WHERE c.status IN(1,2)
                        " . $where . "
                        GROUP BY c.idcategoria
                      " . $limit . "
                ";

        $banco = $conexao->query($sql);

        $linhas = array();

        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;
        $this->fechaConexao();
    }

    public function cadCategoria(Categoria $objCategoria) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_CATEGORIAS . " SET
                titulo = '" . $objCategoria->getTitulo() . "',
                slug = '" . $objCategoria->getSlug() . "',
                status = " . $objCategoria->getStatus() . ",
                dataCadastro = NOW()
               ";

        $conexao->query($sql) or die($conexao->error);

        $this->fechaConexao();
    }

    public function altCategoria(Categoria $objCategoria) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_CATEGORIAS . " SET
                titulo = '" . $objCategoria->getTitulo() . "',
                slug = '" . $objCategoria->getSlug() . "'
                    WHERE idCategoria = " . $objCategoria->getIdCategoria() . "
               ";

        $conexao->query($sql) or die($conexao->error);

        $this->fechaConexao();
    }

    public function delCategoria(Categoria $objCategoria) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_CATEGORIAS . " SET
                status = 0
                    WHERE idCategoria = " . $objCategoria->getIdCategoria() . "
               ";

        $conexao->query($sql) or die($conexao->error);

        $this->fechaConexao();
    }

}

$objCategoriaDao = new CategoriaDao();
