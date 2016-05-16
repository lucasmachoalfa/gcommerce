i = 0;
fotos = new Array();
fotos['pictures'] = new Array();

function deletaImagem(id) {
    $("#image_plug_" + id).fadeOut(400, function () {
        this.remove();
    });

    fotos['pictures'].splice(id, 1);
}

$(document).ready(function () {
    $("#foto").on("change", function (event) {
        var images = event.target.files;

        for (j = 0; j < images.length; j++) {
            var image = images[j];

            if (!image.type.match('image'))
                continue;

            var tmppath = window.URL.createObjectURL(event.target.files[j]);

            if (tmppath !== null) {
                var id = i + j;
                var div = document.createElement('div');
                div.setAttribute('class', 'image_plug');
                div.setAttribute('id', 'image_plug_' + id);

                var img = document.createElement('img');
                img.setAttribute('src', tmppath);
                img.setAttribute('id', 'image_' + id);

                var botao = document.createElement('button');
                botao.setAttribute('onclick', 'deletaImagem(' + id + ')');
                botao.setAttribute('class', 'btn btn-danger btn-sm');

                var icone = document.createElement('i');
                icone.setAttribute('class', 'glyphicon glyphicon-trash');
                
                var labelPrincipal = document.createElement('label');
                labelPrincipal.setAttribute('for','fotoPrincipal_'+id);
                labelPrincipal.textContent = ' Foto Pricipal ';
                
                var inputPrincipal = document.createElement('input');
                inputPrincipal.setAttribute('type','radio');
                inputPrincipal.setAttribute('name','fotoPrincipal');
                inputPrincipal.setAttribute('id','fotoPrincipal_'+id);
                if(id === 0){
                    inputPrincipal.setAttribute('checked','true');
                }
                
                botao.appendChild(icone);
                div.appendChild(img);
                div.appendChild(botao);
                div.appendChild(labelPrincipal);
                div.appendChild(inputPrincipal);

                $("#imagePreview").append(div);
                fotos['pictures'].push(event.target.files[j]);

            }
        }
        i += images.length;
    });

    $("#btnCadProduto").click(function () {
        var data = new FormData();
        var validForm = true;

        //<detalhes>
        var vendedor = $("#idVendedor").val();
        var nomeProduto = $("#nomeProduto").val();
        var resumoProduto = $("#resumoProduto").val();
        var videoUrl = $("#videoUrl").val();
        var descricaoProduto = $("#descricaoProduto").val();
        var produtosRelacionados = $("#produtosRelacionados").val();
        var precoNormal = $("#precoNormal").val();
        var precoPromocional = $("#precoPromocional").val();
        var maximoParcelas = $("#maximoParcelas").val();
        var custoProduto = $("#custoProduto").val();
        var validVendedor = false;
        var validNome = false;
        var validPrecoNormal = false;
        var validPrecoPromocional = false;
        var validMaximoParcelas = false;
        var validCustoProduto = false;
        var validImagem = false;

        if (vendedor === '') {
            validateBootstrap('idVendedor', 'Você deve selecionar um vendedor!', 1);
            validForm = false;
        } else {
            validateBootstrap('idVendedor', '', 0);
            validVendedor = true;
        }

        if (nomeProduto === '') {
            validateBootstrap('nomeProduto', 'Você deve informar o nome do produto!', 1);
            validForm = false;
        } else {
            validateBootstrap('nomeProduto', '', 0);
            validNome = true;
        }

        if (precoNormal === '' || precoNormal === '0.00') {
            validateBootstrap('precoNormal', 'Você deve informar um Preço normal!', 1);
            validForm = false;
        } else {
            validateBootstrap('precoNormal', '', 0);
            validPrecoNormal = true;
        }

        if (precoPromocional === '' || precoPromocional === '0.00') {
            validateBootstrap('precoPromocional', 'Você deve informar um Preço promocional!', 1);
            validForm = false;
        } else {
            validateBootstrap('precoPromocional', '', 0);
            validPrecoPromocional = true;
        }

        if (maximoParcelas === '' || maximoParcelas === '0') {
            validateBootstrap('maximoParcelas', 'Você deve informar um número máximo de parcelas!', 1);
            validForm = false;
        } else {
            validateBootstrap('maximoParcelas', '', 0);
            validMaximoParcelas = true;
        }

        if (custoProduto === '' || custoProduto === '0.00') {
            validateBootstrap('custoProduto', 'Você deve informar o custo do produto!', 1);
            validForm = false;
        } else {
            validateBootstrap('custoProduto', '', 0);
            validCustoProduto = true;
        }

        if (fotos['pictures'].length === 0) {
            validateBootstrap('foto', 'Você deve selecionar, pelo menos, uma foto!', 1);
            validForm = false;
        } else {
            validImagem = true;
        }

        if (validVendedor && validNome && validPrecoNormal && validPrecoPromocional && validMaximoParcelas && validCustoProduto && validImagem) {
            data.append('vendedor', vendedor);
            data.append('nomeProduto', nomeProduto);
            data.append('resumoProduto', resumoProduto);
            data.append('videoUrl', videoUrl);
            data.append('descricaoProduto', descricaoProduto);
            data.append('produtosRelacionados', produtosRelacionados);
            data.append('precoNormal', precoNormal);
            data.append('precoPromocional', precoPromocional);
            data.append('maximoParcelas', maximoParcelas);
            data.append('custoProduto', custoProduto);

            for (var i = 0; i < fotos['pictures'].length; i++) {
                
                if($("#fotoPrincipal_"+i).is(':checked')){
                    fotos['principal'] = i;
//                    var arr = new Array()//                    fotos['pictures'][i].push('principal');
                    console.log(fotos);
                data.append('imagem[]', fotos['principal']);
                }
                data.append('imagem[]', fotos['pictures'][i]);
            }
        }
        //</detalhes>

        //<categorias>
        var categorias = '';
        $("input[name='categoria']").each(function () {
            if ($(this).is(':checked')) {
                categorias += $(this).val() + ',';
            }
        });

        categorias = categorias.replace(/,+$/, '');


        data.append('categorias', categorias);
        //</categorias>


        //<estoque e variações>
        var referenciaProduto = $("#referenciaProduto").val();
        var gerenciarEstoque = $("#gerenciarEstoque").val();
        var quantidadeFixa = $("#quantidadeFixa").val();
        var quantidade = $("#quantidade").val();

        opcoesProdutos = new Array();
        if ($("#variacoesProdutos .row").length) {
            $("#variacoesProdutos .row").each(function () {
                var idDiv = $(this).attr('id');
                var referencia = $("#referencia" + idDiv).val();
                var quantidade = $("#quantidade" + idDiv).val();
                var preco = $("#preco" + idDiv).val();
                var peso = $("#peso" + idDiv).val();

                $("#" + idDiv + " select").each(function () {
                    var valorOpcao = $(this).val();
                    var idOpcao = $(this).attr('id');

                    var row = {
                        idOpcao: '',
                        idVariacao: '',
                        referencia: '',
                        quantidade: '',
                        preco: '',
                        peso: '',
                        valid: false
                    };

                    if (valorOpcao === '') {
                        validateBootstrap(idOpcao, 'Você deve selecionar uma variação!', 1);
                        row.valid = false;
                        validForm = false;
                    } else {
                        validateBootstrap(idOpcao, '', 0);
                        var explodeOpcao = valorOpcao.split('-')
                        var idOpcao = explodeOpcao[0];
                        var idVariacao = explodeOpcao[1];
                        
                        row.valid = true;
                        row.idOpcao = idOpcao;
                        row.idVariacao = idVariacao;
                        row.referencia = referencia;
                        row.quantidade = quantidade;
                        row.preco = preco;
                        row.peso = peso;

                    }
                    opcoesProdutos.push(row);
                });
            });
        }

        var jsonOpcoesProduto = new Array();
        for (var key in opcoesProdutos) {
            if (opcoesProdutos[key].valid === true) {
                jsonOpcoesProduto.push(opcoesProdutos[key]);
            }
        }
        data.append('opcoesProdutos', JSON.stringify(jsonOpcoesProduto));
        data.append('referenciaProduto', referenciaProduto);
        data.append('gerenciarEstoque', gerenciarEstoque);
        data.append('quantidadeFixa', quantidadeFixa);
        data.append('quantidade', quantidade);
        //</estoque e variações>


        //<envio>
        var tipoProduto = $("#tipoProduto").val();
        var pesoProduto = $("#pesoProduto").val();
        var comprimentoProduto = $("#comprimentoProduto").val();
        var larguraProduto = $("#larguraProduto").val();
        var alturaProduto = $("#alturaProduto").val();
        var diasProcessamento = $("#diasProcessamento").val();

        data.append('tipoProduto', tipoProduto);
        data.append('pesoProduto', pesoProduto);
        data.append('comprimentoProduto', comprimentoProduto);
        data.append('larguraProduto', larguraProduto);
        data.append('alturaProduto', alturaProduto);
        data.append('diasProcessamento', diasProcessamento);
        //</envio>

        //<seo>
        var urlSeo = $("#urlSeo").val();
        var tituloSeo = $("#tituloSeo").val();
        var descricaoSeo = $("#descricaoSeo").val();
        var palavrasChaveSeo = $("#palavrasChaveSeo").val();

        data.append('urlSeo', urlSeo);
        data.append('tituloSeo', tituloSeo);
        data.append('descricaoSeo', descricaoSeo);
        data.append('palavrasChaveSeo', palavrasChaveSeo);
        //</seo>


        if (validForm) {
            data.append('opcao', 'cadastrar');
            $.ajax({
                url: 'control/produtoControle.php',
                type: 'POST',
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                success: function (r) {
                    console.log(r);
                }
            })
        } else {
            alert('Alguns erros foram encontrados, por favor verifique o formulário!');
        }
    });

    $("#pesoProduto").keyup(function () {

        var v = this.value,
                integer = v.split(',')[0];


        v = v.replace(/\D/, "");
        v = v.replace(/^[0]+/, "");

        if (v.length <= 4 || !integer)
        {
            if (v.length === 1)
                v = '0,000' + v;
            if (v.length === 2)
                v = '0,00' + v;
            if (v.length === 3)
                v = '0,0' + v;
            if (v.length === 4)
                v = '0,' + v;
        } else {
            v = v.replace(/^(\d{1,})(\d{4})$/, "$1,$2");
        }

        this.value = v;
    });

    $("#descricaoSeo").keyup(function () {
        if ($(this).val().length >= 250) {
            return false;
        }
    });

    $("#palavrasChaveSeo").keyup(function () {
        if ($(this).val().length >= 255) {
            return false;
        }
    });

    $("#comprimentoProduto").keydown(function () {
        var tecla = (window.event) ? event.keyCode : e.which;
        if (!isNumero()) {
            return false;
        } else if ($(this).val().length >= 3 && (!(tecla === 9 || tecla === 8 || tecla === 16 || tecla === 17 || tecla === 0))) {
            return false;
        }
    });

    $("#larguraProduto").keydown(function () {
        var tecla = (window.event) ? event.keyCode : e.which;
        if (!isNumero()) {
            return false;
        } else if ($(this).val().length >= 3 && (!(tecla === 9 || tecla === 8 || tecla === 16 || tecla === 17 || tecla === 0))) {
            return false;
        }
    });

    $("#alturaProduto").keydown(function () {
        var tecla = (window.event) ? event.keyCode : e.which;
        if (!isNumero()) {
            return false;
        } else if ($(this).val().length >= 3 && (!(tecla === 9 || tecla === 8 || tecla === 16 || tecla === 17 || tecla === 0))) {
            return false;
        }
    });
    $("#quantidade").keyup(function () {
        if (!isNumero()) {
            return false;
        }
    });

    $("#maximoParcelas").keydown(function () {
        var tecla = (window.event) ? event.keyCode : e.which;
        if (!isNumero() || $(this).val().length >= 2 && (!(tecla === 9 || tecla === 8 || tecla === 16 || tecla === 17 || tecla === 0))) {
            return false;
        }
    });

    $("#precoNormal").keyup(function () {
        var num = '';
        if (isNumero()) {
            num = ($("#precoNormal").val() === '') ? '' : parseInt($("#precoNormal").val().replace(/[\D]+/g, ''));
            num = formatReal(num);
            $("#precoNormal").val(num);
        } else {
            return false;
        }
    });

    $("#precoPromocional").keyup(function () {
        var num = '';
        if (isNumero()) {
            num = ($("#precoPromocional").val() === '') ? '' : parseInt($("#precoPromocional").val().replace(/[\D]+/g, ''));
            num = formatReal(num);
            $("#precoPromocional").val(num);
        } else {
            return false;
        }
    });

    $("#custoProduto").keyup(function () {
        var num = '';
        if (isNumero()) {
            num = ($("#custoProduto").val() === '') ? '' : parseInt($("#custoProduto").val().replace(/[\D]+/g, ''));
            num = formatReal(num);
            $("#custoProduto").val(num);
        } else {
            return false;
        }
    });

    $("#buscaProdutoInput")
            .bind("keydown", function (event) {
                // don't navigate away from the field on tab when selecting an item
                if (event.keyCode === $.ui.keyCode.TAB && $(this).autocomplete("instance").menu.active) {
                    event.preventDefault();
                }
            })
            .autocomplete({
                minLength: 0,
                source: function (request, response) {
                    var campos = {id: 'idProduto', label: 'nome', desc: 'descricao', image: ''};
                    var query = extractLast(request.term);
                    var produtos = busca(query, 'control/produtoControle.php', campos);
                    produtos = ($.ui.autocomplete.filter(produtos, query));
                    response(produtos);
                },
                select: function (event, ui) {
                    var terms = split(this.value);
                    terms.pop();
                    terms.push(ui.item.label);
                    terms.push("");
                    var id = new Array();
                    id.push(ui.item.value);
                    id.push('');
                    this.value = terms.join(", ");
                    $("#produtoInput").val(id.join(","));
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function (ul, item) {
        console.log(item);
        return $("<li>")
                .append("<a>" + item.label + "<br>" + item.desc + "</a>")
                .appendTo(ul);
    };
});