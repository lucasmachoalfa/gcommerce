function mudaTipoAplicacao(tipo) {
    if (tipo == 'produto') {
        $("#form-group-produtoInput").removeClass('oculta');
        $("#form-group-categoriaInput").addClass('oculta');
        $("#categoriaInput").val('');
        $("#form-group-categoriaInput").removeClass('has-error has-feedback has-success');
        $("#icon-categoriaInput").removeClass('glyphicon-warning-sign glyphicon-ok');
        $("#label-categoriaInput").html('');
    } else if (tipo == 'categoria') {
        $("#form-group-produtoInput").addClass('oculta');
        $("#form-group-categoriaInput").removeClass('oculta');
        $("#produtoInput").val('');
        $("#form-group-produtoInput").removeClass('has-error has-feedback has-success');
        $("#icon-produtoInput").removeClass('glyphicon-warning-sign glyphicon-ok');
        $("#label-produtoInput").html('');
    } else if (tipo == 'compraInteira') {
        $("#form-group-produtoInput").addClass('oculta');
        $("#form-group-categoriaInput").addClass('oculta');
        $("#produtoInput").val('');
        $("#categoriaInput").val('');
        $("#form-group-produtoInput").removeClass('has-error has-feedback has-success');
        $("#icon-produtoInput").removeClass('glyphicon-warning-sign glyphicon-ok');
        $("#label-produtoInput").html('');
        $("#form-group-categoriaInput").removeClass('has-error has-feedback has-success');
        $("#icon-categoriaInput").removeClass('glyphicon-warning-sign glyphicon-ok');
        $("#label-categoriaInput").html('');
    }
}

function delCupomDesconto(id) {
    $.post('control/marketingControle.php', {opcao: 'delCupomDesconto', idCupomDesconto: id},
    function (r) {
        console.log(r);
        $("#listaCupomDesconto").load('listaCupomDescontoAjax.php');
        $('#confirm-delete').modal('hide');

    });
}

function listaCupomDesconto(id) {
    $.post('control/marketingControle.php', {opcao: 'listaCupomDesconto', idCupomDesconto: id, formato: 'json'},
    function (r) {
        console.log(r);
        resposta = $.parseJSON(r);
        console.log(resposta);

        var dataInicio = (resposta[0].dataInicio != '' && resposta[0].dataInicio != '0000-00-00') ? resposta[0].dataInicio.split("-").reverse().join("/") : '';
        var dataFim = (resposta[0].dataFim != '' && resposta[0].dataFim != '0000-00-00') ? resposta[0].dataFim.split("-").reverse().join("/") : '';

        $("input[name='tipoCupom']").each(function () {
            if ($(this).val() == resposta[0].tipoCupom) {
                $(this).attr('checked', '');
            }
        });

        $("input[name='tipoAplicacao']").each(function () {
            if ($(this).val() == resposta[0].tipoAplicacao) {
                $(this).attr('checked', '');

                mudaTipoAplicacao(resposta[0].tipoAplicacao);
            }
        });

        $("#codigo").val(resposta[0].codigo);
        $("#valorDesconto").val(resposta[0].valorDesconto);
        $("#formatoDesconto").val(resposta[0].formatoDesconto);
        $("#usoMaximo").val(resposta[0].usoMaximo);
        $("#usoMaximoCliente").val(resposta[0].usoMaximoCliente);
        $("#dataInicio").val(dataInicio);
        $("#dataFim").val(dataFim);
        $("#valorMinimo").val(resposta[0].valorMinimo);
        $("#clienteInput").val(resposta[0].idsClientes);
        $("#buscaClienteInput").val(resposta[0].clientes);
        $("#produtoInput").val(resposta[0].idsProdutos);
        $("#buscaProdutoInput").val(resposta[0].produtos);
        $("#categoriaInput").val(resposta[0].idsCategorias);
        $("#buscaCategoriaInput").val(resposta[0].categorias);


        $("#myModal").modal('show');
    })
}


function paginacao(pagina){
    $("#carregando").show();
    $("#listaCupomDesconto").html('');
    
    $("#listaCupomDesconto").load("listaCupomDescontoAjax.php?pagina="+pagina, function () {
        $("#carregando").hide();
    });
}

id = new Array();
$(document).ready(function () {
    if ($("#listaCupomDesconto").length) {
        paginacao(1);
//        $("#listaCupomDesconto").load('listaCupomDescontoAjax.php?pagina=1');
    }

    $('#confirm-delete').on('show.bs.modal', function (e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

        $('.codigo-cupom').html('Código do Cupom: <strong>' + $(e.relatedTarget).data('extra') + '</strong>');
    });


    $("#btnGeraCodigo").click(function () {
        var codigo = generateString(8);
        $("#codigo").val(codigo);
    })

    $("#btnCadCupomdesconto").click(function () {
        var codigo = $("#codigo").val();
        var tipoCupom;
        var valorDesconto = $("#valorDesconto").val();
        var formatoDesconto = $("#formatoDesconto").val();
        var usoMaximo = $("#usoMaximo").val();
        var usoMaximoCliente = $("#usoMaximoCliente").val();
        var dataInicio = $("#dataInicio").val();
        var dataFim = $("#dataFim").val();
        var valorMinimo = $("#valorMinimo").val();
        var cliente = $("#clienteInput").val();
        var tipoAplicacao;
        var produtoInput = $("#produtoInput").val();
        var categoriaInput = $("#categoriaInput").val();
        var validCodigo = 0;
        var validValorDesconto = 0;
        var validDataInicio = 0;
        var validProdutoInput = 1;
        var validCategoriaInput = 1;
        $("input[name='tipoCupom']").each(function () {
            if ($(this).is(':checked')) {
                tipoCupom = $(this).val();
            }
        });
        $("input[name='tipoAplicacao']").each(function () {
            if ($(this).is(':checked')) {
                tipoAplicacao = $(this).val();
            }
        });
        if (codigo == '') {
            validateBootstrap('codigo', 'Você deve informar um código!', 1);
        } else {
            validateBootstrap('codigo', '', 0);
            validCodigo = 1;
        }

        if (valorDesconto == '') {
            validateBootstrap('valorDesconto', 'Você deve informar o valor do desconto!', 1);
        } else {
            validateBootstrap('valorDesconto', '', 0);
            validValorDesconto = 1;
        }


        if (dataInicio == '') {
            validateBootstrap('dataInicio', 'Você deve informar a data de início!', 1);
        } else {
            validateBootstrap('dataInicio', '', 0);
            validDataInicio = 1;
        }

        if (tipoAplicacao == 'produto' && produtoInput == '') {
            validateBootstrap('produtoInput', 'Você deve selecionar, pelo menos, um produto!', 1);
        } else if (tipoAplicacao == 'produto' && produtoInput != '') {
            validateBootstrap('produtoInput', '', 0);
            validProdutoInput = 1;
        } else if (tipoAplicacao == 'categoria' && categoriaInput == '') {
            validateBootstrap('categoriaInput', 'Você deve selecionar, pelo menos, uma categoria!', 1);
        } else if (tipoAplicacao == 'categoria' && categoriaInput != '') {
            validateBootstrap('categoriaInput', '', 0);
            validCategoriaInput = 1;
        }

        if (validCodigo == 1 && validProdutoInput == 1 && validCategoriaInput == 1 && validValorDesconto == 1 && validDataInicio == 1) {
            $.post('control/marketingControle.php',
                    {
                        opcao: 'cadCupomDesconto',
                        codigo: codigo,
                        tipoCupom: tipoCupom,
                        valorDesconto: valorDesconto,
                        formatoDesconto: formatoDesconto,
                        usoMaximo: usoMaximo,
                        usoMaximoCliente: usoMaximoCliente,
                        dataInicio: dataInicio,
                        dataFim: dataFim,
                        valorMinimo: valorMinimo,
                        cliente: cliente,
                        tipoAplicacao: tipoAplicacao,
                        produtoInput: produtoInput,
                        categoriaInput: categoriaInput
                    },
            function (r) {
                
                $("#defaultForm")[0].reset();
                $("#form-group-codigo").removeClass('has-success has-feedback');
                $("#icon-codigo").removeClass('glyphicon-ok');
                
                $("#form-group-valorDesconto").removeClass('has-success has-feedback');
                $("#icon-valorDesconto").removeClass('glyphicon-ok');
                
                $("#form-group-dataInicio").removeClass('has-success has-feedback');
                $("#icon-dataInicio").removeClass('glyphicon-ok');
                
                $("#form-group-produtoInput").removeClass('has-success has-feedback');
                $("#icon-produtoInput").removeClass('glyphicon-ok');
                
                $("#form-group-categoriaInput").removeClass('has-success has-feedback');
                $("#icon-categoriaInput").removeClass('glyphicon-ok');
                
                paginacao(1);
                $("#myModal").modal('hide');
            }
            );
        }
    });
    $("#valorDesconto").keydown(function () {
        var num = '';
        if (isNumero()) {
            num = ($("#valorDesconto").val() === '') ? '' : parseInt($("#valorDesconto").val().replace(/[\D]+/g, ''));
            num = formatReal(num);
            $("#valorDesconto").val(num);
        } else {
            return false;
        }
    });
    $("#valorMinimo").keydown(function () {
        var num = '';
        if (isNumero()) {
            num = ($("#valorMinimo").val() === '') ? '' : parseInt($("#valorMinimo").val().replace(/[\D]+/g, ''));
            num = formatReal(num);
            $("#valorMinimo").val(num);
        } else {
            return false;
        }
    });
    $("input[name='tipoAplicacao']").change(function () {
        var tipo = $(this).val();

        mudaTipoAplicacao(tipo);
    });
    $("#buscaClienteInput")
            .bind("keydown", function (event) {
                // don't navigate away from the field on tab when selecting an item
                if (event.keyCode === $.ui.keyCode.TAB && $(this).autocomplete("instance").menu.active) {
                    event.preventDefault();
                }
            })
            .autocomplete({
                minLength: 0,
                source: function (request, response) {
                    var campos = {id: 'idCliente', label: 'email', desc: 'nome'};
                    var query = extractLast(request.term);
                    var clientes = busca(query, 'control/clienteControle.php', campos);
                    clientes = ($.ui.autocomplete.filter(clientes, query));
                    response(clientes);
                },
                select: function (event, ui) {
                    var terms = split(this.value);
                    terms.pop();
                    terms.push(ui.item.label);
                    terms.push("");
                    id.pop();
                    id.push(ui.item.value);
                    id.push('');
                    this.value = terms.join(", ");
                    $("#clienteInput").val(id.join(","));
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function (ul, item) {
        return $("<li>")
                .append("<a>" + item.label + "<br>" + item.desc + "</a>")
                .appendTo(ul);
    };
});