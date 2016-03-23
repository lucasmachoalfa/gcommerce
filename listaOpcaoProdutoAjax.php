<?php
require_once './model/opcaoDao.php';

$opcoes = $objOpcaoDao->listaOpcoes();

$i = 0;
if (count($opcoes) > 0) {
    $i++;
//    echo '<table class="table table-striped ui-sortable" id="options_container" style="margin:0"><tbody>';
    ?>
    <div class="row">
        <div class="col-md-12">
            <table class="table ui-sortable-handle">
                <tr>
                    <td>
                        <div>
                            <div class="row">
                                <div class="col-md-1">
                                    <a href="#" class="btn color-setting-btn pull-left colorpicker-element">
                                        <i class="glyphicon glyphicon-resize-vertical"></i>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Ex. cor, tamanho, ..." class="form-control translate">    
                                </div>
                                <div class="col-md-4">
                                    <a class="option_title btn btn-default form-control" href="#option-form-0">Opções <span class="caret"></span></a>
                                </div>
                                <div class="col-md-1">
                                    <a class="btn btn-danger pull-right"><i class="glyphicon glyphicon-trash"></i></a>
                                </div>
                            </div>
                            <br>
                            <div></div>

                            <!-- DIV OPTION-FORM COMEÇA COM DISPLAY NONE -->
                            <div class="option-form" style="display: none;">
                                <div class="buffer-top-sm">
                                    <div class="option-items ui-sortable" id="option-items-1">
                                        <div class="option-values-form">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <a href="#" class="btn color-setting-btn pull-left colorpicker-element">
                                                        <i class="glyphicon glyphicon-resize-vertical"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-1">
                                                    <!-- SE TIVER ESTAMPA, COLOCAR background-image: url(LINK DA ESTAMPA); dentro do style na tag abaixo -->
                                                    <!-- SE TIVER COR, COLOCAR background-color: HEXADEXIMAL DA COR; dentro do style na tag abaixo -->
                                                    <div class="estampa" style=""></div>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="option[1][values][5][name]" value="P" placeholder="Ex.: Azul, Branco, ..." class="form-control translate" data-table="option_values" data-fid="18296" data-name="name">            
                                                </div>
                                                <div class="col-md-1">                 
                                                    <a class="btn btn-danger pull-right"><i class="glyphicon glyphicon-trash"></i></a>
                                                </div>                                                        
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <a href="#" class="btn btn-default"><i class="glyphicon glyphicon-plus-sign"></i> Adicionar valor</a>
                            </div>
                        </div>
                    </td>
                </tr>                        
            </table>
            <div class="dropdown">
                <a id="dLabel" class="btn btn-info" data-target="#" href="http://example.com" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Adicionar
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" aria-labelledby="dLabel">
                    <li><a href="#">Lista de opções (ex. Tamanho)</a></li>
                    <li><a href="#">Área de texto para customização</a></li>
                    <li><a href="#">Linha de texto par customização</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    foreach ($opcoes as $opcao) {
        echo '
            
        ';
    }
//    echo '</tbody></table>';
} else {
    echo 'Não há opções cadastradas ainda.';
}