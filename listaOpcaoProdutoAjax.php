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
                                                                        $style = 'url(' . $variacoes['atributo'] . ')';
                                                                    }
                                                                    ?>
                                                                    <!--SE TIVER ESTAMPA, COLOCAR background-image: url(LINK DA ESTAMPA);
                                                                    dentro do style na tag abaixo -->
                                                                    <!--SE TIVER COR, COLOCAR background-color: HEXADEXIMAL DA COR;
                                                                    dentro do style na tag abaixo -->
                                                                    <div class = "estampa" style = "background: <?php echo $style; ?>"></div>
                                                                </div>
                                                                <div class = "col-md-9">
                                                                    <input type="text" value="<?php echo $variacoes['titulo']; ?>"  class="form-control translate" data-table = "option_values">
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

<script>
    i = 0;
    j = 0;
    foto = new Array();
    function apagaOpcao(id, novaOpcao) {
        if (typeof (novaOpcao) === 'undefined') {
            $.post('control/opcaoControle.php', {idOpcao: id, opcao: 'excluirOpcao'},
                    function (r) {
                        console.log(r);
                        $("#opcao-" + id).fadeOut(400, function () {
                            tr.remove();
                        });
                    });
        } else {
            var tr = $(id).closest('tr');

            tr.fadeOut(400, function () {
                tr.remove();
            });
        }
    }

    function alteraOpcao(id) {
        var titulo = $("#opcao-" + id + " input").val();

        $.post('control/opcaoControle.php', {idOpcao: id, titulo: titulo, opcao: 'alteraOpcao'},
                function (r) {
                    console.log(r);
                });
    }

    function cadastraOpcao(id) {
        var titulo = $("#" + id).val();

        if (titulo == '') {
            validateBootstrap(id, 'Você deve preencher o título', 1);
//                    $("#" + id).focus();
        } else {
            validateBootstrap(id, '', 0);
            $.post('control/opcaoControle.php', {opcao: 'cadastrarOpcao', titulo: titulo},
                    function (r) {
                        console.log(r);
                        $("#" + id).attr('readonly', true);
                        $("#apaga-" + id).attr('disabled', true);
                        $("#apaga-" + id).removeAttr('onclick');
                        carrega();
                    });
        }

    }

    function apagaVariacao(id, novaVariacao) {
        if (typeof (novaVariacao) === 'undefined') {
            $.post('control/opcaoControle.php', {idVariacao: id, opcao: 'excluirVariacao'},
                    function (r) {
                        console.log(r);
                        var tr = $("#variacao-" + id).closest('div.row');
                        tr.fadeOut(400, function () {
                            tr.remove();
                        });
                    });
        } else {
            var tr = $("#" + id).closest('div.row');
            tr.fadeOut(400, function () {
                tr.remove();
            });
        }
    }

    function criarOpcoes() {
        var tr = document.createElement('tr');
        tr.setAttribute("id", 'novaOpcao-' + i);
        var td = document.createElement('td');
        tr.appendChild(td);

        var div = document.createElement('div');
        var row = document.createElement('div');
        row.setAttribute("class", "row");

        var md1 = document.createElement('div');
        md1.setAttribute("class", "col-md-1");
        var colorPicker = document.createElement('a');
        colorPicker.setAttribute("class", "btn color-setting-btn pull-left colorpicker-element");
        md1.appendChild(colorPicker);
        row.appendChild(md1);

        var idInput = "titulo-" + i;
        var md6 = document.createElement('div');
        md6.setAttribute('class', "col-md-6");
        var formGroup = document.createElement('div');
        formGroup.setAttribute('class', 'form-group');
        formGroup.setAttribute('id', 'form-group-' + idInput);
        var input = document.createElement('input');
        input.setAttribute('class', "form-control translate");
        input.setAttribute('type', "text");
        input.setAttribute('placeholder', "Ex. cor, tamanho, ...");
        input.setAttribute('id', idInput);
        input.setAttribute('onblur', 'cadastraOpcao("' + idInput + '")');
        var spanErro = document.createElement('span');
        spanErro.setAttribute('class', "glyphicon form-control-feedback");
        spanErro.setAttribute('id', "icon-" + idInput);
        spanErro.setAttribute('aria-hidden', "true");
        var labelErro = document.createElement('label');
        labelErro.setAttribute('class', "control-label");
        labelErro.setAttribute('id', "label-" + idInput);
        formGroup.appendChild(input);
        formGroup.appendChild(spanErro);
        formGroup.appendChild(labelErro);

        md6.appendChild(formGroup);
        row.appendChild(md6);

        var md4 = document.createElement('div');
        md4.setAttribute('class', "col-md-4");
        row.appendChild(md4);

        var md1Btn = document.createElement('div');
        md1Btn.setAttribute('class', "col-md-1");
        var btnApagar = document.createElement('a');
        btnApagar.setAttribute('class', "btn btn-danger pull-right");
        btnApagar.setAttribute('href', "#");
        btnApagar.setAttribute('onclick', "apagaOpcao(this,1)");
        btnApagar.setAttribute('id', "apaga-" + idInput);
        var trash = document.createElement('i');
        trash.setAttribute('class', "glyphicon glyphicon-trash");
        btnApagar.appendChild(trash);
        md1Btn.appendChild(btnApagar);
        row.appendChild(md1Btn);

        div.appendChild(row);
        td.appendChild(div);
        $("#novasOpcoes").append(tr);

        i++;
    }

    function prepareUpload(event) {
//        foto = event.target.files;
        var id = event.path[0].id;
        foto[id] = event.target.files[0];

        console.log(foto);
    }


    function cadastraVariacao(idOpcao, idVariacao) {
        var titulo = $("#input-titulo-" + idVariacao).val();
        var cor = $("#input-picker-" + idVariacao).val();
        var imagem = foto["input-imagem-" + idVariacao];
        var validTitulo = false;
        var validAtributo = false;

        if (titulo == '') {
            validateBootstrap("input-titulo-" + idVariacao, 'Voce deve preencher o título!', 1);
            
            alert('Voce deve preencher o título!');
        } else {
            validateBootstrap("input-titulo-" + idVariacao, '', 0);
            validTitulo = true;
        }

        if (cor != '' && (imagem != '' && typeof (imagem) != 'undefined')) {
            validateBootstrap("input-imagem-" + idVariacao, 'Voce deve selecionar uma cor OU uma imagem', 1);
            validateBootstrap("input-picker-" + idVariacao, '', 1);
            alert('não pode!');
        } else {
            validateBootstrap("input-imagem-" + idVariacao, '', 0);
            validateBootstrap("input-picker-" + idVariacao, '', 0);
            validAtributo = true;
        }
        

        if (validAtributo && validTitulo) {
            var data = new FormData();
            data.append('opcao', 'cadastraVariacao');
            data.append('titulo', titulo);
            data.append('idOpcao', idOpcao);
            data.append('cor', cor);
            data.append('foto', imagem);

            $.ajax({
                url: 'control/opcaoControle.php',
                method: 'POST',
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                success: function (r) {
                    console.log(r);
alert('enviou');
                }
            });
        }
    }

    function criarVariacao(idOpcao) {
        var row = document.createElement('div');
        row.setAttribute('class', 'row');
        row.setAttribute('id', 'row-variacao-' + j);
        var md1Atributo = document.createElement('div');
        md1Atributo.setAttribute('class', "col-md-3");

        var idCor = j;
        var cor = document.createElement('div');
        var inputPicker = document.createElement('input');
        inputPicker.setAttribute('class', 'form-control');
        inputPicker.setAttribute('type', 'text');
        inputPicker.setAttribute('id', 'input-picker-' + idCor);
        inputPicker.setAttribute('placeholder', 'cor');
        inputPicker.setAttribute('onfocus', 'adicionaColorPicker("' + idCor + '")');
        var arquivo = document.createElement('div');
        var btnArquivo = document.createElement('input');
        btnArquivo.setAttribute('type', 'file');
        btnArquivo.setAttribute('id', 'input-imagem-' + j);
        btnArquivo.setAttribute('name', 'input-imagem');
        btnArquivo.addEventListener("change", prepareUpload);

        cor.appendChild(inputPicker);
        arquivo.appendChild(btnArquivo)
        md1Atributo.appendChild(cor);
        md1Atributo.appendChild(arquivo);
        row.appendChild(md1Atributo);

        var idInput = 'input-titulo-' + j;
        var md9 = document.createElement('div');
        md9.setAttribute('class', "col-md-8");
        var inputTitulo = document.createElement('input');
        inputTitulo.setAttribute('class', "form-control translate");
        inputTitulo.setAttribute('type', "text");
        inputTitulo.setAttribute('id', idInput);
        inputTitulo.setAttribute('placeholder', 'Ex.: Azul, Branco, ...');
        inputTitulo.setAttribute('data-table', 'option_values');
        inputTitulo.setAttribute('onblur', 'cadastraVariacao(' + idOpcao + ',' + j + ')');
        md9.appendChild(inputTitulo);
        row.appendChild(md9);

        var md1Trash = document.createElement('div');
        md1Trash.setAttribute('class', 'col-md-1');
        var btnTrash = document.createElement('a');
        btnTrash.setAttribute('class', 'btn btn-danger pull-right');
        btnTrash.setAttribute('href', 'javascript:apagaVariacao("row-variacao-' + j + '",1)');
        var iTrash = document.createElement('i');
        iTrash.setAttribute('class', 'glyphicon glyphicon-trash');

        btnTrash.appendChild(iTrash);
        md1Trash.appendChild(btnTrash);
        row.appendChild(md1Trash);

        $("#option-form-" + idOpcao).append(row);
        j++;
    }


    function abreVariacoes(id) {
        $("#variacoes-" + id).toggleClass('escondeVariacao');
    }



    function carrega() {
        $("#carregando").show();
        $("#listaOpcoes").html('');

        $("#listaOpcoes").load("listaOpcaoProdutoAjax.php", function () {
            $("#carregando").hide();
        });
    }

    function adicionaColorPicker(id) {
//        $("#cor-variacao-" + id).css('display','block');
//        $("#" + id).colorpicker({
//            color: '#ffaa00',
//            container: true,
//            inline: true
//        });
        $("#input-picker-" + id).colorpicker({
            format: 'hex'
        });
    }

    function fechaColorPicker(id) {
        alert('saiu');
        $("#" + id).css('display', 'none');
    }

    $(document).ready(function () {
        /*
         color: '#ffaa00',
         container: true,
         inline: true
         });
         
         
         $("#btnCor").on('click', function (e) {
         //            $("#cor1").colorpicker('show');
         
         alert('1kjfsdj');
         $('#cor').colorpicker({
         color: '#ffaa00',
         container: true,
         inline: true
         });
         })
         +*/
    });
</script>