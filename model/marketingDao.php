<?php
require_once 'banco.php';
require_once 'bean/cupomDesconto.php';

class marketingDao extends Banco {
    public function cadCupomDesconto(CupomDesconto $objCupomDesconto){
        $conexao = $this->abreConexao();
        
        $sql = "INSERT INTO ".TBL_CUPOM_DESCONTO."
                codigo = '".$objCupomDesconto->getCodigo()."',
                tipoCupom = '".$objCupomDesconto->getTipoCupom()."',
                valorDesconto = '".$objCupomDesconto->getValorDesconto()."',
                formatoDesconto = '".$objCupomDesconto->getFormatoDesconto()."',
                usoMaximo = '".$objCupomDesconto->getUsoMaximo()."',
                usoMaximoCliente = '".$objCupomDesconto->getUsoMaximoCliente()."',
                dataInicio = '".$objCupomDesconto->getDataInicio()."',
                dataFim = '".$objCupomDesconto->getDataFim()."',
                valorMinimo = '".$objCupomDesconto->getValorMinimo()."',
                cliente = '".$objCupomDesconto->getCliente()."',
                tipoAplicacao = '".$objCupomDesconto->getTipoAplicacao()."',
                produto = '".$objCupomDesconto->getProduto()."',
                categoria = '".$objCupomDesconto->getCategoria()."'
               ";
        
        $this->fechaConexao();
    }
}
