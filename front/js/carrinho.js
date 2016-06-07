function finalizarCompra(){
    if(frete == ''){
        alert('você deve selecionar um frete');
    }else{
        var freteFinal = {
            'codigo':freteCodigo,
            'servico':freteServico,
            'valor':frete,
            'prazo':fretePrazo
        };
        
        freteFinal = JSON.stringify(freteFinal)
        localStorage.frete = freteFinal;
        
        window.location = 'clientes.php'
    }
}

function delProduto(key) {
    if (confirm('Você tem certeza que deseja excluir esse produto?') === true) {
        var obj = JSON.parse(localStorage.produtos);
        obj.splice(key, 1)
        localStorage.produtos = JSON.stringify(obj);

        var tr = $("#produto_" + key);
        tr.fadeOut(400, function () {
            tr.remove();
        });

        if (obj.length === 0) {
            $("#produtoCarrinho").html('');
            $("#produtoCarrinho").html('Nenhum produto no carrinho!');
        }
    }
}


$(document).ready(function () {
    $("#calcularFrete").mask('99999-999');

    if (localStorage.produtos !== '' && typeof localStorage.produtos !== 'undefined' && localStorage.produtos !== '[]') {
        $("#produtoCarrinho").load('listaProdutoCarrinho.php?json=' + localStorage.produtos,
                function () {
                    frete = 0.00;
                    freteCodigo = '';
                    freteServico = '';
                    fretePrazo = '';
                    totalProdutos = parseFloat($("#subtotalProdutos").html().replace('.', '').replace(',', '.'));

                    function selecionarFrete() {
                        
                        var explode = $(this).attr('data').split('|');
                        var valor = explode[2];
                        frete = parseFloat(valor.replace(',', '.'));
                        freteCodigo = explode[0];
                        freteServico = explode[1];
                        fretePrazo = explode[3];


                        var valorFinal = frete + totalProdutos;

                        $("#totalCompra").html(valorFinal.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1."));
                    }



                    //calcula o preço do produto e da compra
                    $("input[type='number']").change(function () {
                        //<subtotal do produto>
                        var id = $(this).attr('id').split('_')[1];
                        var preco = $("#preco_" + id).val();
                        var quantidade = $(this).val();
                        var precoFinal = preco * quantidade;

                        var precoFinalString = precoFinal.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1.");

                        $("#subtotal_" + id).html('');
                        $("#subtotal_" + id).html(precoFinalString);
                        //</subtotal do produto>

                        //<subtotal e total da compra>
                        var subtotal = 0.00;

//                        console.log(frete);


                        $(".produto-linha").each(function () {
                            var id = $(this).attr('id').split('_')[1];

                            var subTotalLinha = parseFloat($("#subtotal_" + id).html().replace('.', '').replace(',', '.'));

                            subtotal += parseFloat(subTotalLinha);
//                            subtotal = parseFloat(subtotal);
                        });
                        var total = subtotal + frete;
                        totalProdutos = subtotal;
                        
                        $("#subtotalProdutos").html(subtotal.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1."));
                        $("#totalCompra").html(total.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1."));
                        //</subtotal e total da compra>
                    });

                    //calcula os preço e exibe uma lista com os possíveis fretes
                    $("#btnCalcularFrete").click(function () {
                        var cep = $("#calcularFrete").val();
                        var peso = 0.00;

                        var produtos = JSON.parse(localStorage.produtos);

                        for (var i = 0; i < produtos.length; i++) {
                            peso += parseFloat(produtos[i].peso);
                        }

                        var comprimento = "0";
                        var altura = "0";
                        var largura = "0";
                        peso = peso + "";

                        var fretes = calcularFrete(cep, comprimento, altura, largura, peso);

                        if (fretes.length > 0) {
                            $(".lista-opcoes-frete").html('');

                            for (var i = 0; i < fretes.length; i++) {
                                var codigo = fretes[i].codigo;
                                var valor = fretes[i].valor;
                                var servico = fretes[i].servico;
                                var prazoEntrega = fretes[i].prazoEntrega;

                                var li = document.createElement('li');

                                var label = document.createElement('label');
                                label.setAttribute('for', 'shipping-' + i);

                                var input = document.createElement('input');
                                input.setAttribute('id', 'shipping-' + i);
                                input.setAttribute('type', 'radio');
                                input.setAttribute('name', 'opcao-frete');
                                input.setAttribute('style', 'display:none');

                                var span = document.createElement('span');
                                span.setAttribute('class', 'shipping-option');
                                span.setAttribute('data', codigo + '|' +servico+ '|' + valor+'|'+prazoEntrega);
                                span.addEventListener("click", selecionarFrete);

                                var img = document.createElement('img');
                                img.setAttribute('src', 'img/correios/' + codigo + '.png');

                                var textoSpan = document.createTextNode('Correios - ' + servico + ' - ' + prazoEntrega + ' dias úteis - R$ ' + fretes[i].valor);
                                span.appendChild(img);
                                span.appendChild(textoSpan);

                                label.appendChild(input);
                                label.appendChild(span);
                                li.appendChild(label);

                                $(".lista-opcoes-frete").append(li);
                            }

                            $(".lista-opcoes-frete").show();
                        }
                    });
                });


    } else {
        $("#produtoCarrinho").html('Nenhum produto no carrinho!');
    }
});