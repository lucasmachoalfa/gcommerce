<?php
require_once '../model/opcaoDao.php';
require_once 'funcoes.php';

$opcao = $_POST['opcao'];
switch ($opcao){
    case 'excluirOpcao':
        $idOpcao = $_POST['idOpcao'];
        
        $objOpcao->setIdOpcao($idOpcao);
        
        $objOpcaoDao->delOpcao($objOpcao);
        break;
    
    case 'cadastrarOpcao':
       echo $titulo = $_POST['titulo'];
        
        $objOpcao->setTitulo($titulo);
        
        $objOpcaoDao->cadOpcao($objOpcao);
        break;
    
    case 'alteraOpcao':
        $idOpcao = $_POST['idOpcao'];
        $titulo = $_POST['titulo'];
        
        $objOpcao->setIdOpcao($idOpcao);
        $objOpcao->setTitulo($titulo);
        
        $objOpcaoDao->altOpcao($objOpcao);
        
        break;
    
    case 'excluirVariacao':
        $idVariacao = $_POST['idVariacao'];
        
        $objVariacao->setIdVariacao($idVariacao);
        
        $objOpcaoDao->delVariacao($objVariacao);
        break;
 
    case 'cadastraVariacao':
        $titulo = $_POST['titulo'];
        $idOpcao = $_POST['idOpcao'];
        $atributo = ($_FILES['foto']['name'] != '') ? uploadImagem($_FILES['foto'], 'opcoes') : $_POST['cor'];
        
        $objVariacao->setTitulo($titulo);
        $objVariacao->setIdOpcao($idOpcao);
        $objVariacao->setAtributo($atributo);
        
        
        $objOpcaoDao->cadVariacao($objVariacao);
        break;
    
    case 'alteraVariacao':
        $titulo = $_POST['titulo'];
        $idVariacao = $_POST['idVariacao'];
        $atributo = ($_FILES['foto']['name'] != '') ? uploadImagem($_FILES['foto'], 'opcoes') : $_POST['cor'];
        
        $objVariacao->setTitulo($titulo);
        $objVariacao->setidVariacao($idVariacao);
//        $objVariacao->setAtributo($atributo);
        
        
        $objOpcaoDao->altVariacao($objVariacao);
        break;
}