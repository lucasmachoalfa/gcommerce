
variacoesProdutos = {
    i: 0,
    referencia: '',
    variacoes: new Array(),
    setVariacao: function (idVariacao, idProduto, idOpcao) {
        this.variacoes[idOpcao] = '';
        this.variacoes[idOpcao] = {'idVariacao': idVariacao, 'idProduto': idProduto, 'idOpcao': idOpcao};

        this.testaReferencia(idProduto, idVariacao);
    },
    testaReferencia: function (idProduto, idVariacao) {

        var json = JSON.stringify(this.variacoes);
        var retorno = $.ajax({
            url: 'control/produtoControle.php',
            data: {opcao: 'buscaReferenciaAtributos', json: json},
            async: false,
            method: 'POST'
        }).responseText;
        var obj = JSON.parse(retorno);

        if (obj.length === 1) {
            this.referencia = obj[0].referencia;
        } else {
            this.referencia = '';
        }
    }
};

calcularFrete = function (idProduto, cep, comprimento, altura, largura, peso) {
    var resposta =
            $.ajax({
                method: 'POST',
                url: 'control/produtoControle.php',
                data: {
                    opcao: 'calculaCep',
                    cep: cep,
                    comprimento: comprimento,
                    altura: altura,
                    largura: largura,
                    peso: peso,
                    idProduto: idProduto
                },
                async: false


            });
    return JSON.parse(resposta.responseText);
};

function buscaAtributos(getIdOpcao, getIdVariacao, getIdProduto) {
    var atributos =
            $.ajax({
                url: 'control/produtoControle.php',
                data: {opcao: 'buscaAtributos', idOpcao: getIdOpcao, idVariacao: getIdVariacao, idProduto: getIdProduto},
                async: false,
                method: 'POST'
            }).responseText;
    atributos = JSON.parse(atributos);
    $("button[id*=btnBuscaAtributo_]").removeClass('disabled');

    var bool = new Array();
    var idVariacao = 0;
    $("#opcao" + atributos.idOpcao + " button").each(function () {
        var idDiv = $(this).attr('id');
        var explode = idDiv.split('btnBuscaAtributo_');
        idVariacao = explode[1];

        for (var i = 0; i < atributos.variacoes.length; i++) {
            if (atributos.variacoes[i].idVariacao === idVariacao) {
                bool.push(idVariacao);
            }
        }

        if (bool.indexOf(idVariacao) !== -1) {
            $(this).removeClass('disabled');
        } else {
            $(this).addClass('disabled');
        }

    });

    if (bool.length >= 1) {
        variacoesProdutos.setVariacao(getIdVariacao, getIdProduto, getIdOpcao);
    }
}

$(document).ready(function () {
    $("#btnCalcularFrete").click(function () {
        var idProduto = $("#idProduto").val();
        var cep = $("#cep").val();
        var comprimento = $("#comprimento").val();
        var altura = $("#altura").val();
        var largura = $("#largura").val();
        var peso = $("#peso").val();
        if (cep != "") {
            var fretes = calcularFrete(idProduto, cep, comprimento, altura, largura, peso);
            $("#valorFrete").html('');
            for (var i = 0; i < fretes.length; i++) {
                var divRow = document.createElement('div');
                divRow.setAttribute('class', 'row');
                var divMd1 = document.createElement('div');
                divMd1.setAttribute('class', 'col-md-1');
                var radiobox = document.createElement('input');
                radiobox.setAttribute('type', 'radio');
                radiobox.setAttribute('id', 'radio_' + fretes[i].codigo);
                radiobox.setAttribute('value', fretes[i].codigo);
                radiobox.setAttribute('name', 'radio_frete');
                divMd1.appendChild(radiobox);
                var divMd9 = document.createElement('div');
                divMd9.setAttribute('class', 'col-md-9');
                divMd9.textContent = fretes[i].servico;
                var divMd2 = document.createElement('div');
                divMd2.setAttribute('class', 'col-md-2');
                divMd2.textContent = 'R$ ' + fretes[i].valor + '(' + fretes[i].prazoEntrega + ' dia(s) úteis)';
                divRow.appendChild(divMd1);
                divRow.appendChild(divMd9);
                divRow.appendChild(divMd2);
                $("#valorFrete").append(divRow);
            }
        } else {
            alert('Você deve preencher o cep!');
        }
    });


    $("#btnComprar").click(function () {
        if (variacoesProdutos.referencia == '') {
            alert('você deve selecionar as variações');
        } else {
//            console.log(variacoesProdutos.variacoes);
            var referencia = variacoesProdutos.referencia;
            Object.keys(variacoesProdutos.variacoes).forEach(function (key) {
                console.log(key);
                variacoesProdutos.variacoes[key]['referencia'] = referencia;
            });
            var variacoes = JSON.stringify(variacoesProdutos.variacoes);
            
            localStorage.setItem("variacoes", variacoes);
        }
    });
});