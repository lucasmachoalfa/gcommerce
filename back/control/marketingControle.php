<?php
require_once '../model/marketingDao.php';
require_once '../model/clienteDao.php';
$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'cadCupomDesconto':
        $codigo = $_POST['codigo'];
        $tipoCupom = $_POST['tipoCupom'];
        $valorDesconto = $_POST['valorDesconto'];
        $formatoDesconto = $_POST['formatoDesconto'];
        $usoMaximo = $_POST['usoMaximo'];
        $usoMaximoCliente = $_POST['usoMaximoCliente'];
        $dataInicio = implode('-', array_reverse(explode('/', $_POST['dataInicio'])));
        $dataFim = implode('-', array_reverse(explode('/', $_POST['dataFim'])));
        $valorMinimo = $_POST['valorMinimo'];
        $cliente = ($_POST['cliente'] == '') ? '0' : rtrim($_POST['cliente'], ',');
        $tipoAplicacao = $_POST['tipoAplicacao'];
        $produto = ($_POST['produto'] == '') ? '0' : rtrim($_POST['produto'], ',');
        $categoria = ($_POST['categoria'] == '') ? '0' : rtrim($_POST['categoria'], ',');
        $status = 1;
        $objCupomDesconto->setCodigo($codigo);
        $objCupomDesconto->setTipoCupom($tipoCupom);
        $objCupomDesconto->setValorDesconto($valorDesconto);
        $objCupomDesconto->setFormatoDesconto($formatoDesconto);
        $objCupomDesconto->setUsoMaximo($usoMaximo);
        $objCupomDesconto->setUsoMaximoCliente($usoMaximoCliente);
        $objCupomDesconto->setDataInicio($dataInicio);
        $objCupomDesconto->setDataFim($dataFim);
        $objCupomDesconto->setValorMinimo($valorMinimo);
//        $objCupomDesconto->setCliente($cliente);
        $objCupomDesconto->setTipoAplicacao($tipoAplicacao);
//        $objCupomDesconto->setProduto($produto);
//        $objCupomDesconto->setCategoria($categoria);
        $objCupomDesconto->setStatus($status);
        $idCupom = $objMarketingDao->cadCupomDesconto($objCupomDesconto);
        
        if($produto != '0'){
            $produtos = explode(',',$produto);
            $queryProdutos = '';
            
            foreach($produtos as $produto){
                $queryProdutos .= '('.$idCupom.','.$produto.'),';
            }
            
            $objMarketingDao->cadRelProduto($queryProdutos);
        }
        
        if($categoria != '0'){
            $categorias = explode(',',$categoria);
            $queryCategorias = '';
            
            foreach($categorias as $categoria){
                $queryCategorias .= '('.$idCupom.','.$categoria.'),';
            }
            $objMarketingDao->cadRelCategoria($queryCategorias);
        }
        
        if($cliente != '0'){
            $clientes = explode(',',$cliente);
            $queryClientes = '';
            
            foreach($clientes as $cliente){
                $queryClientes .= '('.$idCupom.','.$cliente.'),';
            }
            
            $queryClientes = rtrim($queryClientes,',');
            $objMarketingDao->cadRelCliente($queryClientes);
        }
        
        
        break;
        
    case 'delCupomDesconto':
        $idCupomDesconto = $_POST['idCupomDesconto'];
        $objCupomDesconto->setIdCupomDesconto($idCupomDesconto);
        $objMarketingDao->delCupomDesconto($objCupomDesconto);
        break;
    
    case 'listaCupomDesconto':
        $idCupomDesconto = $_POST['idCupomDesconto'];
        $formato = $_POST['formato'];
        $objCupomDesconto->setIdCupomDesconto($idCupomDesconto);
        $cupom = $objMarketingDao->listaCupomDesconto($objCupomDesconto);
        if ($formato == 'json') {
            $cupom = json_encode($cupom);
            print_r($cupom);
        } else {
            return $cupom;
        }
        break;
        
    case 'redessociais':
        $objRedesSociais->setIdRede($_POST['idRede']);
        $objRedesSociais->setLink($_POST['link']);

        $objMarketingDao->cadRedesSociais($objRedesSociais);
        break;
    
    case 'ordenaRedes':
        $ordem = 0;
        $sql = '';
        foreach ($_POST['idRede'] as $idRede){
            $sql .= 'UPDATE '.TBL_REDES_SOCIAIS.' SET ordem = '.$ordem.' WHERE idRedesSociais = '.$idRede.'; ' ;
            $ordem++;
        }
        
        $objMarketingDao->ordenaRedesSociais($sql);
        break;
}