//function calcularFrete(idProduto, cep, comprimento, altura, largura) {
//    $.post("control/produtoControle.php",
//            {
//                opcao: 'calculaCep',
//                cep: cep,
//                comprimento: comprimento,
//                altura: altura,
//                largura: largura,
//                idProduto: idProduto
//            },
//            function (r) {
//                console.log(r);
////                $("#valorFrete").html('');
//            })
//}
//

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
                divMd2.textContent = 'R$ '+fretes[i].valor+'('+fretes[i].prazoEntrega+' dia(s) úteis)';


                divRow.appendChild(divMd1);
                divRow.appendChild(divMd9);
                divRow.appendChild(divMd2);
                $("#valorFrete").append(divRow);
            }
        } else {
            alert('Você deve preencher o cep!');
        }
    });
});