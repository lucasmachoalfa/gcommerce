<?php
require_once 'model/marketingDao.php';

echo '
    <table class="table table-striped carrinhosConfig"> 
        <thead> 
            <tr> 
                <th>Código</th> 
                <th>Tipo do cupom</th> 
                <th>Valor do desconto</th> 
                <th>Uso máximo</th> 
                <th>Uso máximo por cliente</th> 
                <th>Data início</th>
                <th>Data final</th> 
                <th>Valor mínimo</th> 
                <th>Tipo de aplicação</th> 
                <th>Editar</th> 
                <th>Excluir</th> 
            </tr>
        </thead>
        <tbody>
        
    
';

$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

$count = 10;

$min = (($pagina - 1) * $count);
$paginacao = $min . ',' . $count;

$cuponsDescontos = $objMarketingDao->listaCupomDesconto(NULL, $paginacao);

$quantidade = $objMarketingDao->numCupomDesconto();

$numPaginas = ceil($quantidade / $count);

$paginas = '';
for ($j = 1; $j <= $numPaginas; $j++) {
    if ($j == $pagina) {
        $classe = 'active';
    } else {
        $classe = '';
    }
    $paginas .= '<li class="' . $classe . '"><a href="javascript:paginacao(' . $j . ')">' . $j . '</a></li>';
}

foreach ($cuponsDescontos as $cupomDesconto) {
    $tipoCupom = '';
    $valorDesconto = ($cupomDesconto['formatoDesconto'] == '%') ? $cupomDesconto['valorDesconto'] . $cupomDesconto['formatoDesconto'] : $cupomDesconto['formatoDesconto'] . $cupomDesconto['valorDesconto'];
    $dataInicio = ($cupomDesconto["dataInicio"] != '' && $cupomDesconto["dataInicio"] != '0000-00-00') ? implode('/', array_reverse(explode('-', $cupomDesconto["dataInicio"]))) : ' - ';
    $dataFim = ($cupomDesconto["dataFim"] != '' && $cupomDesconto["dataFim"] != '0000-00-00') ? implode('/', array_reverse(explode('-', $cupomDesconto["dataFim"]))) : ' - ';
    $tipoAplicacao = '';
    $valorMinimo = ($cupomDesconto["valorMinimo"] != '') ? 'R$ ' . $cupomDesconto["valorMinimo"] : ' - ';

    if ($cupomDesconto["tipoAplicacao"] == 'compraInteira') {
        $tipoAplicacao = 'Compra Inteira';
    } else if ($cupomDesconto["tipoAplicacao"] == 'produto') {
        $tipoAplicacao = 'Produto';
    } else if ($cupomDesconto["tipoAplicacao"] == 'categoria') {
        $tipoAplicacao = 'Categoria';
    }

    if ($cupomDesconto["tipoCupom"] == 'desconto') {
        $tipoCupom = 'Desconto';
    } else if ($cupomDesconto["tipoCupom"] == 'frete') {
        $tipoCupom = 'Frete Grátis';
    } else if ($cupomDesconto["tipoCupom"] == 'primeiraCompra') {
        $tipoCupom = 'Primeira Compra';
    }


    echo '
        <tr> 
            <td>' . $cupomDesconto["codigo"] . '</td> 
            <td>' . $tipoCupom . '</td> 
            <td>' . $valorDesconto . '</td> 
            <td>' . $cupomDesconto["usoMaximo"] . '</td> 
            <td>' . $cupomDesconto["usoMaximoCliente"] . '</td>
            <td>' . $dataInicio . '</td>
            <td>' . $dataFim . '</td>
            <td>' . $valorMinimo . '</td> 
            <td>' . $tipoAplicacao . '</td> 
            <th>
                <button type="button" onclick="listaCupomDesconto(' . $cupomDesconto["idCupomDesconto"] . ')" class="btn btn-warning btn-sm">
                    <i class="glyphicon glyphicon-pencil"></i>
                </button>
            </th> 
            <th>
                <a href="#" data-href="javascript:delCupomDesconto(' . $cupomDesconto["idCupomDesconto"] . ')" data-toggle="modal" data-extra="' . $cupomDesconto["codigo"] . '" data-target="#confirm-delete" class="btn btn-danger btn-sm">
                    <i class="glyphicon glyphicon-trash"></i>
                </a>
            </th> 
        </tr>
        ';
}

echo '</tbody></table>';

if ($numPaginas > 1) {
    $anterior = ($pagina >=2) ? $pagina-1 : 1;
    $proxima = ($pagina+1 >= $numPaginas) ? $numPaginas : $pagina+1;
    echo '<nav class="text-center">
        <ul class="pagination">
            <li>
                <a href="javascript:paginacao('.$anterior.')" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            ' . $paginas . '
            <li>
                <a href="javascript:paginacao('.$proxima.')" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>';
}

?>