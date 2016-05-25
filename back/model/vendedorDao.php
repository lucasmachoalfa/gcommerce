<?php
require_once 'banco.php';
require_once 'bean/vendedor.php';

class vendedorDao extends Banco {

    public function listaVendedores(Vendedor $objVendedor = NULL, $paginacao = NULL) {
        $conexao = $this->abreConexao();

        $where = '';
        if ($objVendedor != NULL) {
            $where = ' AND idVendedor = ' . $objVendedor->getIdVendedor();
        }

        if ($paginacao != NULL) {
            $where .= "LIMIT " . $paginacao;
        }

        $sql = "SELECT *
                    FROM " . TBL_VENDEDOR . "
                        WHERE status IN(1,2)
                        " . $where . "
                ";

        $banco = $conexao->query($sql);

        $linhas = array();

        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;
        $this->fechaConexao();
    }
    
    
    public function cadVendedor(Vendedor $objVendedor){
        $conexao = $this->abreConexao();
        
        $sql = "INSERT INTO ".TBL_VENDEDOR." SET
                nome = '".$objVendedor->getNome()."',
                logo = '".$objVendedor->getLogo()."',
                status = 1,
                dataCadastro = NOW()
               ";
       
        $conexao->query($sql);
        $this->fechaConexao();
    }
    
    public function altVendedor(Vendedor $objVendedor){
        $conexao = $this->abreConexao();
        
        echo $sql = "UPDATE ".TBL_VENDEDOR." SET
                nome = '".$objVendedor->getNome()."',
                logo = '".$objVendedor->getLogo()."'
                    WHERE idVendedor = ".$objVendedor->getIdVendedor()."
               ";
       
        $conexao->query($sql);
        $this->fechaConexao();
    }

    public function delVendedor(Vendedor $objVendedor){
        $conexao = $this->abreConexao();
        
        $sql = "UPDATE ".TBL_VENDEDOR." SET
                status = 0
                    WHERE idVendedor = ".$objVendedor->getIdVendedor()."
               ";
       
        $conexao->query($sql);
        $this->fechaConexao();
    }
}

$objVendedorDao = new vendedorDao();