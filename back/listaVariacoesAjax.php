<?php
require_once 'model/opcaoDao.php';
$idOpcao = '= '.$_GET['idOpcao'];

$objOpcao->setIdOpcao($idOpcao);

$opcao = $objOpcaoDao->listaOpcoes($objOpcao)[0];
//
//echo '<pre>';
//var_dump($opcao);
//echo '</pre>';

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
