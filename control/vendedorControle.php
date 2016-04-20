<?php
require_once '../model/vendedorDao.php';
require_once 'funcoes.php';

$opcao = $_POST['opcao'];
switch($opcao){
    case 'cadastrar':
        $nome = $_POST['nome'];
        $logo = uploadImagem($_FILES['logo'],'vendedores');
       
        $objVendedor->setNome($nome);
        $objVendedor->setLogo($logo);
        
        $objVendedorDao->cadVendedor($objVendedor);
        break;
    
    case 'alterar':
        $idVendedor = $_POST['idVendedor'];
        $nome = $_POST['nome'];
        $logo = ($_FILES['logo']['name'] != '') ? uploadImagem($_FILES['logo'],'vendedores') : $_POST['logoAtual'];

        $objVendedor->setIdVendedor($idVendedor);
        $objVendedor->setNome($nome);
        $objVendedor->setLogo($logo);
        
        $objVendedorDao->altVendedor($objVendedor);
        break;
    
    case 'excluir':
        $idVendedor = $_POST['idVendedor'];
        
        $objVendedor->setIdVendedor($idVendedor);
        
        $objVendedorDao->delVendedor($objVendedor);
        break;
    
    case 'listaVendedor':
        $idVendedor = $_POST['idVendedor'];
        
        $objVendedor->setIdVendedor($idVendedor);
        
        $vendedor = $objVendedorDao->listaVendedores($objVendedor);
        
        if($_POST['formato'] == 'json'){
            echo json_encode(utf8Converter($vendedor[0]));
        }
        break;
        
}