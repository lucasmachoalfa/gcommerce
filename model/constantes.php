<?php
require_once 'constantesBanco.php';

//função para remover expressões comuns de banco de dados
function seg($var) {
    $procura = array("insert into", "update", "delete from", "select % from");
    $retorno = str_ireplace($procura, '', $var);
//    $retorno = htmlentities($retorno);
    
    return $retorno;
}

//Constantes de Tabela
//Tabelas ADMIN
define("TBL_ESTADOS", DB_ADMIN . TBL_ADMIN . "uf");
define("TBL_CIDADES", DB_ADMIN . TBL_ADMIN . "cidades");
define("TBL_CLIENTES", DB_ADMIN . TBL_ADMIN . "clientes");
define("TBL_ENDERECOS", DB_ADMIN . TBL_ADMIN . "enderecos");
define("TBL_CUPOM_DESCONTO", DB_ADMIN . TBL_ADMIN . "marketing_cupomDesconto");