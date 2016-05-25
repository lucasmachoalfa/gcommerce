i = 0;
iReferencia = 1;
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
        alert('Voce deve selecionar uma cor OU uma imagem!');
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
                $("#option-form-" + idOpcao).load('listaVariacoesAjax.php?idOpcao=' + idOpcao);


                $("#input-titulo-" + idVariacao).attr('readonly', true);
                $("#input-picker-" + idVariacao).attr('readonly', true);
                $("#input-imagem-" + idVariacao).attr('disabled', true);


                $("#apaga-variacao-" + idVariacao).attr('disabled', true);
                $("#apaga-variacao-" + idVariacao).removeAttr('onclick');
            }
        });
    }
}

function alteraVariacao(idVariacao) {

    var titulo = $("#input-variacao-titulo-" + idVariacao).val();
    //        var cor = $("#input-variacao-picker-" + idVariacao).val();
    //        var imagem = foto["input-variacao-imagem-" + idVariacao];
    var validTitulo = false;
    //        var validAtributo = false;

    if (titulo == '') {
        validateBootstrap("input-titulo-" + idVariacao, 'Voce deve preencher o título!', 1);

        alert('Voce deve preencher o título!');
    } else {
        validateBootstrap("input-titulo-" + idVariacao, '', 0);
        validTitulo = true;
    }

    //        if (cor != '' && (imagem != '' && typeof (imagem) != 'undefined')) {
    //            validateBootstrap("input-imagem-" + idVariacao, 'Voce deve selecionar uma cor OU uma imagem', 1);
    //            validateBootstrap("input-picker-" + idVariacao, '', 1);
    //            alert('nÃƒÂ£o pode!');
    //        } else {
    //            validateBootstrap("input-imagem-" + idVariacao, '', 0);
    //            validateBootstrap("input-picker-" + idVariacao, '', 0);
    //            validAtributo = true;
    //        }

    //        if (validAtributo && validTitulo) {
    if (validTitulo) {
        var data = new FormData();
        data.append('opcao', 'alteraVariacao');
        data.append('titulo', titulo);
        data.append('idVariacao', idVariacao);
        //            data.append('cor', cor);
        //            data.append('foto', imagem);

        $.ajax({
            url: 'control/opcaoControle.php',
            method: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            success: function (r) {
                console.log(r);
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
    btnTrash.setAttribute('id', 'apaga-variacao-' + j);
    var iTrash = document.createElement('i');
    iTrash.setAttribute('class', 'glyphicon glyphicon-trash');

    btnTrash.appendChild(iTrash);
    md1Trash.appendChild(btnTrash);
    row.appendChild(md1Trash);

    $("#option-form-novasVariacoes-" + idOpcao).append(row);
    j++;
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
    $("#input-picker-" + id).colorpicker({
        format: 'hex'
    });
}

function criaVariacoesProdutos() {
    var idOpcoes = '';

    $("input[name='product_options']").each(function () {
        if ($(this).is(':checked')) {
            idOpcoes += $(this).val() + ',';
        }
    });
    idOpcoes = idOpcoes.replace(/,+$/, '');

    if (idOpcoes != "") {
        $("#esconde").load('listaVariacoesProdutosAjax.php?idOpcoes=' + idOpcoes, function () {

            $("#variacoesProdutos").append($("#esconde").html());

            var lastChildId = $("#variacoesProdutos .row:last-child").attr('id');
            var proximaReferencia = $("#referenciaProduto").val() + "-" + iReferencia;

            $("#referencia" + lastChildId).val(proximaReferencia);

            iReferencia++;
        });

    } else {
        alert('Por favor, selecione pelo menos uma opção!');
    }
}
$(document).ready(function () {
    $("#modalOpcoes").on('hide.bs.modal', function () {
        carrega();
        $("#listaOpcoesCheckbox").load('listaOpcoesCheckboxAjax.php');
    });
});