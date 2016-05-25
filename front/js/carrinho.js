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

function calcularFrete(idProduto, cep, comprimento, altura, largura, peso) {
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
}
;


$(document).ready(function () {
    $("#calcularFrete").mask('99999-999');

    if (localStorage.produtos !== '' && typeof localStorage.produtos !== 'undefined' && localStorage.produtos !== '[]') {
        $("#produtoCarrinho").load('listaProdutoCarrinho.php?json=' + localStorage.produtos,
                function () {
                    $("input[type='number']").change(function () {
                        var id = $(this).attr('id').split('_')[1];
                        var preco = $("#preco_" + id).val();
                        var quantidade = $(this).val();
                        var preco = preco * quantidade;

                        preco = preco.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1.");

                        $("#subtotal_" + id).html('');
                        $("#subtotal_" + id).html(preco);
                    });

                });
    } else {
        $("#produtoCarrinho").html('Nenhum produto no carrinho!');
    }
    $("#calcularFrete").click(function () {
        var cep = $(this).val();
        var peso = 0;

        var produtos = JSON.parse(localStorage.produtos);
        
        for(var i = 0; i< produtos.length; i++){
            console.log(produtos[i]);
        }
        
        var fretes = calcularFrete(idProduto, cep, comprimento, altura, largura, peso);
    })
});