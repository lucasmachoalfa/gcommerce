<?php

require_once 'model/categoriaDao.php';
echo '
<table class="table table-striped carrinhosConfig"> 
        <thead> 
            <tr> 
                <th>Título</th> 
                <th>Quantidade de Produtos</th> 
                <th>Editar</th> 
                <th>Excluir</th> 
            </tr>
        </thead>
        <tbody>';

$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

$count = 10;

$min = (($pagina - 1) * $count);
$paginacao = $min . ',' . $count;

$categorias = $objCategoriaDao->listaCategorias(NULL, $paginacao);

$quantidade = count($categorias);

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

foreach ($categorias as $categoria) {
    echo '<tr>
            <td>' . utf8_encode($categoria["titulo"]) . '</td>
            <td>' . $categoria["quantidade"]. '</td> 
            <th>
                <button type="button" onclick="listaCategoria(' . $categoria["idCategoria"] . ')" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm">
                    <i class="glyphicon glyphicon-pencil"></i>
                </button>
            </th> 
            <th>
                <a href="#" data-href="javascript:delCategoria(' . $categoria["idCategoria"] . ')" data-toggle="modal" data-extra="' . $categoria["titulo"]. '" data-target="#confirm-delete" class="btn btn-danger btn-sm">
                    <i class="glyphicon glyphicon-trash"></i>
                </a>
            </th> 
    </tr>';
}

echo '</tbody></table>';

if ($numPaginas > 1) {
    $anterior = ($pagina >= 2) ? $pagina - 1 : 1;
    $proxima = ($pagina + 1 >= $numPaginas) ? $numPaginas : $pagina + 1;
    echo '<nav class="text-center">
        <ul class="pagination">
            <li>
                <a href="javascript:paginacao(' . $anterior . ')" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            ' . $paginas . '
            <li>
                <a href="javascript:paginacao(' . $proxima . ')" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>';
}