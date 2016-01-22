id = new Array();
$(document).ready(function () {
    if($("#listaCupomDesconto").length){
        $("#listaCupomDesconto").load('listaCupomDescontoAjax.php');
    }
    
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

        if (validCodigo == 1 && validProdutoInput == 1 && validCategoriaInput == 1) {
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
                console.log(r);
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