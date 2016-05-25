<?php

require_once 'model/clienteDao.php';

$ordem = (isset($_GET['ordem'])) ? $_GET['ordem'] : 'dataCadastro DESC';
$busca = (isset($_GET['busca'])) ? $_GET['busca'] : '';
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

$count = 20;

$min = (($pagina - 1) * $count);
$paginacao = $min . ',' . $count;

$clientes = $objClienteDao->listaClientes($ordem, $paginacao, $busca);
$quantidade = $objClienteDao->numClientes($busca);

$numPaginas = ceil($quantidade / $count);

$paginas = '';
for ($j = 1; $j <= $numPaginas; $j++) {
    if ($j == $pagina) {
        $classe = 'active';
    } else {
        $classe = '';
    }
    $paginas .= '<li class="'.$classe.'"><a href="javascript:paginacao('.$j.')">'.$j.'</a></li>';
}

foreach ($clientes as $cliente) {
    echo '
        <tr> 
            <th scope=row><a href="#">'.$cliente["nome"].'</a></th>
            <td>R$ 0,00</td> 
            <td>0</td>
            <td>'.$cliente["dataCadastro"].'</td> 
            <td>'.$cliente["cidade"].'/'.$cliente["estado"].'</td> 
            <td>'.$cliente["email"].'</td> 
        </tr>      
    ';
}

if($numPaginas > 1){
echo '<nav class="text-center">
        <ul class="pagination">
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            '.$paginas.'
            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>';
}
?> 
