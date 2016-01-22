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
        $dataInicio = implode('-', array_reverse(explode('/',$_POST['dataInicio'])));
        $dataFim = implode('-',array_reverse(explode('/',$_POST['dataFim'])));
        $valorMinimo = $_POST['valorMinimo'];
        $cliente = ($_POST['cliente'] == '') ? '0' : rtrim($_POST['cliente'],',');
        $tipoAplicacao = $_POST['tipoAplicacao'];
        $produto = ($_POST['produto'] == '') ? '0' : rtrim($_POST['produto'],',');
        $categoria = ($_POST['categoria'] == '') ? '0' : rtrim($_POST['categoria'],',');
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
        $objCupomDesconto->setCliente($cliente);
        $objCupomDesconto->setTipoAplicacao($tipoAplicacao);
        $objCupomDesconto->setProduto($produto);
        $objCupomDesconto->setCategoria($categoria);
        $objCupomDesconto->setStatus($status);
        
        $objMarketingDao->cadCupomDesconto($objCupomDesconto);
    break;
}