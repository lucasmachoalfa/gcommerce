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
define("TBL_REDES_SOCIAIS", DB_ADMIN . TBL_ADMIN . "marketing_redessociais");

define("REL_CUPOM_PRODUTO", DB_ADMIN . TBL_ADMIN . "rel_produtosXCupomDesconto");
define("REL_CUPOM_CLIENTE", DB_ADMIN . TBL_ADMIN . "rel_clientesXcupomDesconto");
define("REL_CUPOM_CATEGORIA", DB_ADMIN . TBL_ADMIN . "rel_categoriasXcupomDesconto");