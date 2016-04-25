<?php
require_once './model/opcaoDao.php';

$opcoes = $objOpcaoDao->listaOpcoes();

$i = 0;
if (count($opcoes) > 0) :
    ?>
    <div class="row">
        <div class="col-md-12">
            <table class="table ui-sortable-handle">
                <tr>
                    <td>
                        <div>
                            <?php
                            foreach ($opcoes as $opcao) :
                                ?>
                                <div class = "row">
                                    <div class = "col-md-1">
                                        <a href = "#" class = "btn color-setting-btn pull-left colorpicker-element">
                                            <i class = "glyphicon glyphicon-resize-vertical"></i>
                                        </a>
                                    </div>
                                    <div class = "col-md-6">
                                        <input type = "text" placeholder = "Ex. cor, tamanho, ..." value = "<?php echo $opcao['titulo']; ?>" class = "form-control translate">
                                    </div>
                                    <div class = "col-md-4">
                                        <a class = "option_title btn btn-default form-control" href = "javascript:abreVariacoes(<?php echo $opcao['idOpcao']; ?>)">Variações<span class = "caret"></span></a>
                                    </div>
                                    <div class = "col-md-1">
                                        <a class = "btn btn-danger pull-right" href = "javascript:delOpcao"><i class = "glyphicon glyphicon-trash"></i></a>
                                    </div>
                                </div>
                                <br>
                                <div></div>

                                <!--DIV OPTION-FORM COMEÇA COM DISPLAY NONE -->
                                <div class = "option-form" style = "display: none;" id='option-form-<?php echo $opcao['idOpcao']; ?>'>
                                    <div class = "buffer-top-sm">
                                        <div class = "option-items ui-sortable" id = "option-items-1">
                                            <div class = "option-values-form">
                                                <div class = "row">
                                                    <div class = "col-md-1">
                                                        <a href = "#" class = "btn color-setting-btn pull-left colorpicker-element">
                                                            <i class = "glyphicon glyphicon-resize-vertical"></i>
                                                        </a>
                                                    </div>
                                                    <div class = "col-md-1">
                                                        <!--SE TIVER ESTAMPA, COLOCAR background-image: url(LINK DA ESTAMPA);
                                                        dentro do style na tag abaixo -->
                                                        <!--SE TIVER COR, COLOCAR background-color: HEXADEXIMAL DA COR;
                                                        dentro do style na tag abaixo -->
                                                        <div class = "estampa" style = ""></div>
                                                    </div>
                                                    <div class = "col-md-9">
                                                        <input type = "text" name = "option[1][values][5][name]" value = "P" placeholder = "Ex.: Azul, Branco, ..." class = "form-control translate" data-table = "option_values" data-fid = "18296" data-name = "name">
                                                    </div>
                                                    <div class = "col-md-1">
                                                        <a class = "btn btn-danger pull-right"><i class = "glyphicon glyphicon-trash"></i></a>
                                                    </div>
                                                </div>
                                                <div class = "row">
                                                    <div class = "col-md-1">
                                                        <a href = "#" class = "btn color-setting-btn pull-left colorpicker-element">
                                                            <i class = "glyphicon glyphicon-resize-vertical"></i>
                                                        </a>
                                                    </div>
                                                    <div class = "col-md-1">
                                                        <!--SE TIVER ESTAMPA, COLOCAR background-image: url(LINK DA ESTAMPA);
                                                        dentro do style na tag abaixo -->
                                                        <!--SE TIVER COR, COLOCAR background-color: HEXADEXIMAL DA COR;
                                                        dentro do style na tag abaixo -->
                                                        <div class = "estampa" style = ""></div>
                                                    </div>
                                                    <div class = "col-md-9">
                                                        <input type = "text" name = "option[1][values][5][name]" value = "M" placeholder = "Ex.: Azul, Branco, ..." class = "form-control translate" data-table = "option_values" data-fid = "18296" data-name = "name">
                                                    </div>
                                                    <div class = "col-md-1">
                                                        <a class = "btn btn-danger pull-right"><i class = "glyphicon glyphicon-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href = "#" class = "btn btn-default"><i class = "glyphicon glyphicon-plus-sign"></i> Adicionar valor</a>
                                </div>
                                <?php
                            endforeach;
                            ?>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <?php
else :
    echo 'Não há opções cadastradas ainda.';
endif;
?>
<div class="row">
    <div class="col-md-12">
        <table class="table ui-sortable-handle" style="display:none" id="novaOpcao">
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
                                <a class="option_title btn btn-default form-control" href="javascript:abreVariacoes(0)">Variações <span class="caret"></span></a>
                            </div>
                            <div class="col-md-1">
                                <a class="btn btn-danger pull-right"><i class="glyphicon glyphicon-trash"></i></a>
                            </div>
                        </div>
                        <br>
                        <div></div>

                        <!-- DIV OPTION-FORM COMEÇA COM DISPLAY NONE -->
                        <div class="option-form" style="display: none;" id="option-form-0">
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
        <a id="dLabel" class="btn btn-info" href="javascript:criarOpcoes()" role="button">
            Adicionar
        </a>
    </div>
</div>