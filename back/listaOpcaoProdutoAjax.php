<?php
require_once './model/opcaoDao.php';

$opcoes = $objOpcaoDao->listaOpcoes();
$i = 0;
if (count($opcoes) > 0) :
    ?>
    <div id="listaOpcoes">
        <div class="row">
            <div class="col-md-12">
                <table class="table ui-sortable-handle">
                    <tr>
                        <td>
                            <div>
                                <?php
                                foreach ($opcoes as $opcao) :
                                    ?>
                                    <div class = "row" id="opcao-<?php echo $opcao['idOpcao'] ?>">
                                        <div class = "col-md-1">
                                            <a href = "#" class = "btn color-setting-btn pull-left colorpicker-element">
                                                <i class = "glyphicon glyphicon-resize-vertical"></i>
                                            </a>
                                        </div>
                                        <div class = "col-md-6">
                                            <input type = "text" placeholder = "Ex. cor, tamanho, ..." value = "<?php echo $opcao['titulo']; ?>" onblur="alteraOpcao(<?php echo $opcao['idOpcao'] ?>)" class = "form-control translate">
                                        </div>
                                        <div class = "col-md-4">
                                            <a class = "option_title btn btn-default form-control" href = "javascript:abreVariacoes(<?php echo $opcao['idOpcao']; ?>)">Variações<span class = "caret"></span></a>
                                        </div>
                                        <div class = "col-md-1">
                                            <a class = "btn btn-danger pull-right" href = "javascript:apagaOpcao(<?php echo $opcao['idOpcao']; ?>)"><i class = "glyphicon glyphicon-trash"></i></a>
                                        </div>
                                    </div>
                                    <br>
                                    <div></div>

                                    <div class = "option-form escondeVariacao" id="variacoes-<?php echo $opcao['idOpcao']; ?>">
                                        <div class = "buffer-top-sm">
                                            <div class = "option-items ui-sortable" id = "option-items-1">
                                                <div class = "option-values-form" id='option-form-<?php echo $opcao['idOpcao']; ?>'>
                                                    <?php
                                                    if (count($opcao['variacoes']) > 0):
                                                        foreach ($opcao['variacoes'] as $variacoes):
                                                            ?>
                                                            <div class = "row" id="variacao-<?php echo $variacoes['idVariacao']; ?>">
                                                                <div class = "col-md-1">
                                                                    <a href = "#" class = "btn color-setting-btn pull-left colorpicker-element">
                                                                        <i class = "glyphicon glyphicon-resize-vertical"></i>
                                                                    </a>
                                                                </div>
                                                                <div class = "col-md-1">
                                                                    <?php
                                                                    if (strpos($variacoes['atributo'], '#') !== false) {
                                                                        $style = $variacoes['atributo'];
                                                                    } else {
                                                                        $style = 'url(images/' . $variacoes['atributo'] . ')';
                                                                    }
                                                                    ?>

                                                                    <div class = "estampa" style = "background: <?php echo $style; ?>"></div>
                                                                </div>
                                                                <div class = "col-md-9">
                                                                    <input type="text" id="input-variacao-titulo-<?php echo $variacoes['idVariacao']; ?>" value="<?php echo $variacoes['titulo']; ?>"  class="form-control translate" onblur="alteraVariacao(<?php echo $variacoes['idVariacao']; ?>)" data-table = "option_values">
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <a class="btn btn-danger pull-right" href="javascript:apagaVariacao(<?php echo $variacoes['idVariacao']; ?>)"><i class = "glyphicon glyphicon-trash"></i></a>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        endforeach;
                                                    endif;
                                                    ?>
                                                </div>

                                                <div class = "option-values-form" id='option-form-novasVariacoes-<?php echo $opcao['idOpcao']; ?>'>
                                                </div>
                                            </div>
                                        </div>
                                        <a href = "javascript:criarVariacao(<?php echo $opcao['idOpcao']; ?>)" class = "btn btn-default"><i class = "glyphicon glyphicon-plus-sign"></i> Adicionar valor</a>
                                        <br><br>
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
    </div>
    <?php
else :
    echo 'Não há opções cadastradas ainda.';
endif;
?>