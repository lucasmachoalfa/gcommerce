<?php

require_once 'banco.php';
require_once 'bean/cupomDesconto.php';

class marketingDao extends Banco {

    public function cadCupomDesconto(CupomDesconto $objCupomDesconto) {
        $conexao = $this->abreConexao();

        echo $sql = "INSERT INTO " . TBL_CUPOM_DESCONTO . " SET
                codigo = '" . $objCupomDesconto->getCodigo() . "',
                tipoCupom = '" . $objCupomDesconto->getTipoCupom() . "',
                valorDesconto = '" . $objCupomDesconto->getValorDesconto() . "',
                formatoDesconto = '" . $objCupomDesconto->getFormatoDesconto() . "',
                usoMaximo = '" . $objCupomDesconto->getUsoMaximo() . "',
                usoMaximoCliente = '" . $objCupomDesconto->getUsoMaximoCliente() . "',
                dataInicio = '" . $objCupomDesconto->getDataInicio() . "',
                dataFim = '" . $objCupomDesconto->getDataFim() . "',
                valorMinimo = '" . $objCupomDesconto->getValorMinimo() . "',
                idsCliente = '" . $objCupomDesconto->getCliente() . "',
                tipoAplicacao = '" . $objCupomDesconto->getTipoAplicacao() . "',
                idsProduto = '" . $objCupomDesconto->getProduto() . "',
                idsCategoria = '" . $objCupomDesconto->getCategoria() . "',
                dataCadastro = NOW(),
                status = ".$objCupomDesconto->getStatus()."
               ";
        
        $conexao->query($sql);

        $this->fechaConexao();
    }
    
    public function listaCupomDesconto(){
        $conexao = $this->abreConexao();

        echo $sql = "SELECT * FROM " . TBL_CUPOM_DESCONTO . " WHERE status = 1 ";
        
        $banco = $conexao->query($sql) or die($conexao->error);
        
        $linhas = array();
        while($linha = $banco->fetch_assoc()){
            $linhas[] = $linha;
        }

        return $linhas;
        
        $this->fechaConexao();
    }

}

$objMarketingDao = new marketingDao();