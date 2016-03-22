<?php
require_once './model/opcaoDao.php';

$opcoes = $objOpcaoDao->listaOpcoes();

$i = 0;
if (count($opcoes) > 0) {
    $i++;
    echo '<table class="table table-striped ui-sortable" id="options_container" style="margin:0"><tbody>';
    foreach ($opcoes as $opcao) {
        echo '
            
        ';
    }
    echo '</tbody></table>';
} else {
    echo 'Não há opções cadastradas ainda.';
}