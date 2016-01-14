<?php

require_once './model/marketingDao.php';
$cuponsDescontos = $objMarketingDao->listaCupomDesconto();

var_dump($cuponsDescontos);

foreach ($cuponsDescontos as $cupomDesconto) {
    $tipoCupom = '';
    $valorDesconto = ($cupomDesconto['formatoDesconto'] == '%') ? $cupomDesconto['valorDesconto'].$cupomDesconto['formatoDesconto'] : $cupomDesconto['formatoDesconto'].$cupomDesconto['valorDesconto'];
    $dataInicio = ($cupomDesconto["dataInicio"] != '' && $cupomDesconto["dataInicio"] != '0000-00-00') ? implode('/',array_reverese(explode('-',$cupomDesconto["dataInicio"]))) : ' - ';
    $dataFim = ($cupomDesconto["dataFim"] != '' && $cupomDesconto["dataFim"] != '0000-00-00') ? implode('/',array_reverese(explode('-',$cupomDesconto["dataFim"]))) : ' - ';
    $tipoAplicacao = '';
    $valorMinimo = ($cupomDesconto["valorMinimo"] != '') ? 'R$ '.$cupomDesconto["valorMinimo"]: ' - ';
    
    if($cupomDesconto["tipoAplicacao"] == 'compraInteira'){
        $tipoAplicacao = 'Compra Inteira';
    }else if($cupomDesconto["tipoAplicacao"] == 'produto'){
        $tipoAplicacao = 'Produto';
    }else if($cupomDesconto["tipoAplicacao"] == 'categoria'){
        $tipoAplicacao = 'Categoria';
    }
    
    if($cupomDesconto["tipoCupom"] == 'desconto'){
        $tipoCupom = 'Desconto';
    }else if($cupomDesconto["tipoCupom"] == 'frete'){
        $tipoCupom = 'Frete Grátis';
    }else if($cupomDesconto["tipoCupom"] == 'primeiraCompra'){
        $tipoCupom = 'Primeira Compra';
    }
    
    
    echo '
        <tr> 
            <td>'.$cupomDesconto["codigo"].'</td> 
            <td>'.$tipoCupom.'</td> 
            <td>'.$valorDesconto.'</td> 
            <td>'.$cupomDesconto["usoMaximo"].'</td> 
            <td>'.$cupomDesconto["usoMaximoCliente"].'</td>
            <td>'.$dataInicio.'</td>
            <td>'.$dataFim.'</td>
            <td>'.$valorMinimo.'</td> 
            <td>'.$tipoAplicacao.'</td> 
            <th><button id="editar1" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></th> 
            <th><a href="#" class="btn btn-danger  btn-sm"><i class="glyphicon glyphicon-trash"></i></a></th> 
        </tr>
        ';
}
?>