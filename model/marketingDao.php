<?php

require_once 'banco.php';
require_once 'bean/cupomDesconto.php';
require_once 'bean/redesSociais.php';

class marketingDao extends Banco {

    //funções relacionadas ao cadastro de Cupom de Desconto
    public function cadCupomDesconto(CupomDesconto $objCupomDesconto) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_CUPOM_DESCONTO . " SET
                codigo = '" . $objCupomDesconto->getCodigo() . "',
                tipoCupom = '" . $objCupomDesconto->getTipoCupom() . "',
                valorDesconto = '" . $objCupomDesconto->getValorDesconto() . "',
                formatoDesconto = '" . $objCupomDesconto->getFormatoDesconto() . "',
                usoMaximo = '" . $objCupomDesconto->getUsoMaximo() . "',
                usoMaximoCliente = '" . $objCupomDesconto->getUsoMaximoCliente() . "',
                dataInicio = '" . $objCupomDesconto->getDataInicio() . "',
                dataFim = '" . $objCupomDesconto->getDataFim() . "',
                valorMinimo = '" . $objCupomDesconto->getValorMinimo() . "',
                tipoAplicacao = '" . $objCupomDesconto->getTipoAplicacao() . "',
                dataCadastro = NOW(),
                status = " . $objCupomDesconto->getStatus() . "
               ";

        /*
        idsCliente = '" . $objCupomDesconto->getCliente() . "',
        idsProduto = '" . $objCupomDesconto->getProduto() . "',
        idsCategoria = '" . $objCupomDesconto->getCategoria() . "',
         */
        
        $conexao->query($sql);
        
        $idCupomDesconto = $conexao->insert_id;
        
        return $idCupomDesconto;

        $this->fechaConexao();
    }

    public function listaCupomDesconto(CupomDesconto $objCupomDesconto = NULL, $ordem=NULL) {
        $conexao = $this->abreConexao();

        $where = '';
        if ($objCupomDesconto != NULL && $objCupomDesconto != '') {
            $where = 'AND cu.idCupomDesconto = ' . $objCupomDesconto->getIdCupomDesconto();
        }
        
        if($ordem != '' && $ordem != NULL){
            $ordem = "LIMIT ".$ordem;
        }

        $sql = "SELECT cu.*,
                    GROUP_CONCAT(rcl.idCliente) as clientes
                    FROM " . TBL_CUPOM_DESCONTO . " cu
                    LEFT JOIN ".REL_CUPOM_CLIENTE." rcl ON cu.idCupomDesconto = rcl.idCupomDesconto
                    LEFT JOIN " . TBL_CLIENTES . " cl ON cl.idCliente = rcl.idCliente
                        WHERE cu.status = 1
                        " . $where . "
                        GROUP BY cu.idCupomDesconto
                        ".$ordem."
                ";

        $banco = $conexao->query($sql) or die($conexao->error);

        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;

        $this->fechaConexao();
    }
    
    
    public function numCupomDesconto(){
        $cupomDesconto = $this->listaCupomDesconto();
        
        $numCupomDesconto = count($cupomDesconto);
           
        return $numCupomDesconto;
    }

    public function delCupomDesconto(CupomDesconto $objCupomDesconto) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_CUPOM_DESCONTO . " SET
                    status = 0
                        WHERE idCupomDesconto = " . $objCupomDesconto->getIdCupomDesconto() . "
               ";

        $conexao->query($sql) or die($conexao->error);

        $this->fechaConexao();
    }
    
    
    public function cadRelProduto($query){
        $conexao = $this->abreConexao();
        
            $sql = "INSERT INTO ".REL_CUPOM_PRODUTO." (idCupomDesconto, idProduto) VALUES ".$query." ";
        
        $conexao->query($sql) or die($conexao->error);
        
        $this->fechaConexao();
    }
    
    
    public function cadRelCategoria($query){
        $conexao = $this->abreConexao();
        
        $sql = "INSERT INTO ".REL_CUPOM_CATEGORIA." (idCupomDesconto, idCategoria) VALUES ".$query." ";
        $conexao->query($sql) or die($conexao->error);
        
        $this->fechaConexao();
    }
    
    
    public function cadRelCliente($query){
        $conexao = $this->abreConexao();
        
       echo $sql = "INSERT INTO ".REL_CUPOM_CLIENTE." (idCupomDesconto, idCliente) VALUES ".$query." ";
        $conexao->query($sql) or die($conexao->error);
        
        $this->fechaConexao();
    }
    
    
    //Funções relacionadas ao cadastro de Redes Sociais
    public function cadRedesSociais(RedesSociais $objRedesSociais){
        $conexao = $this->abreConexao();
        
       echo $sql = "INSERT INTO ".TBL_REDES_SOCIAIS." SET
                facebook = '".$objRedesSociais->getFacebook()."',
                instagram = '".$objRedesSociais->getInstagram()."',
                twitter = '".$objRedesSociais->getTwitter()."',
                google = '".$objRedesSociais->getGoogle()."',
                vimeo = '".$objRedesSociais->getVimeo()."',
                youtube = '".$objRedesSociais->getYoutube()."',
                pinterest = '".$objRedesSociais->getPinterest()."',
                flickr = '".$objRedesSociais->getFlickr()."',
                linkedin = '".$objRedesSociais->getLinkedin()."'
                    
                ON DUPLICATE KEY UPDATE 
                facebook = '".$objRedesSociais->getFacebook()."',
                instagram = '".$objRedesSociais->getInstagram()."',
                twitter = '".$objRedesSociais->getTwitter()."',
                google = '".$objRedesSociais->getGoogle()."',
                vimeo = '".$objRedesSociais->getVimeo()."',
                youtube = '".$objRedesSociais->getYoutube()."',
                pinterest = '".$objRedesSociais->getPinterest()."',
                flickr = '".$objRedesSociais->getFlickr()."',
                linkedin = '".$objRedesSociais->getLinkedin()."'
               ";
        
        $conexao->query($sql) or die($conexao->error);
        
        $this->fechaConexao();
    }
    
    
    public function listaRedesSociais(){
        $conexao = $this->abreConexao();
        
        $sql = "SELECT * FROM ".TBL_REDES_SOCIAIS."";
        
        $banco = $conexao->query($sql);
        $linha = $banco->fetch_assoc();
        
        return $linha;
        
        $this->fechaConexao();
    }
}

$objMarketingDao = new marketingDao();
