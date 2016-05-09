<?php
require_once 'model/opcaoDao.php';

$idOpcao = 'IN(' . $_GET["idOpcoes"] . ')';

$objOpcao->setIdOpcao($idOpcao);

$opcoes = $objOpcaoDao->listaOpcoes($objOpcao);

$id = uniqid();
?>
<div class="row" name="variacaoProduto-<?php echo $id; ?>" id="<?php echo $id; ?>" >
    <div class = "col-sm-1">
        <i class = "glyphicon glyphicon-resize-vertical" style = "font-size: 16px;"></i>
    </div>
    <div class = "col-sm-2">
        <?php
        foreach ($opcoes as $opcao) {
            $i = 0;
            echo '
            <div id="form-group-' . $id . '-' . $opcao["idOpcao"] . '">
                <select class = "form-control" name="opcao[]" id="' . $id . '-' . $opcao["idOpcao"] . '"> ';

            echo ($i == 0) ? '<option value="">- Escolhe ' . $opcao["titulo"] . ' -</option>' : '';
            foreach ($opcao['variacoes'] as $variacao) {
                echo '<option value="' . $opcao["idOpcao"] . '-' . $variacao["idVariacao"] . '">' . $variacao["titulo"] . '</option> ';
                $i++;
            }

            echo '</select><br>
                <span class="glyphicon form-control-feedback" id="icon-' . $id . '-' . $opcao["idOpcao"] . '" aria-hidden="true"></span>
                <label class="control-label" id="label-' . $id . '-' . $opcao["idOpcao"] . '"></label>
            </div>';
        }
        ?>
    </div>
    <div class="col-sm-2" id="form-group-referencia<?php echo $id; ?>">
        <input type="text" class="form-control" name="referencia[]" id="referencia<?php echo $id; ?>" />
        <span class="glyphicon form-control-feedback" id="icon-referencia<?php echo $id; ?>" aria-hidden="true"></span>
        <label class="control-label" id="label-referencia<?php echo $id; ?>"></label>
    </div>
    <div class="col-sm-2" id="form-group-quantidade<?php echo $id; ?>">
        <input type="text" class="form-control" name="quantidade[]" id="quantidade<?php echo $id; ?>" />
        <span class="glyphicon form-control-feedback" id="icon-quantidade<?php echo $id; ?>" aria-hidden="true"></span>
        <label class="control-label" id="label-quantidade<?php echo $id; ?>"></label>
    </div>
    <div class="col-sm-2" id="form-group-preco<?php echo $id; ?>">
        <input type="text" class="form-control" name="preco[]" id="preco<?php echo $id; ?>" />
        <span class="glyphicon form-control-feedback" id="icon-preco<?php echo $id; ?>" aria-hidden="true"></span>
        <label class="control-label" id="label-preco<?php echo $id; ?>"></label>
    </div>
    <div class="col-sm-2" id="form-group-peso<?php echo $id; ?>">
        <input type="text" class="form-control" name="peso[]" id="peso<?php echo $id; ?>" />
        <span class="glyphicon form-control-feedback" id="icon-peso<?php echo $id; ?>" aria-hidden="true"></span>
        <label class="control-label" id="label-peso<?php echo $id; ?>"></label>
    </div>
    <div class="col-sm-1 text-right" id="apagar-<?php echo $id; ?>">
        <button class="btn btn-danger" onclick="apagaVariacao('apagar-<?php echo $id; ?>', 1)">
            <i class="glyphicon glyphicon-trash"></i>
        </button>
    </div>
</div>
