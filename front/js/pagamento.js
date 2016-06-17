$(document).ready(function () {
    var objProdutos = JSON.parse(localStorage.produtos);
    var idCarrinho = objProdutos[0].idCarrinho;
    var referencia = '';

    for (var i = 0; i < objProdutos.length; i++) {
        referencia += '"' + objProdutos[i].referencia + '",';
    }

    var endereco = {
        idEndereco: 1
    };
    var objEndereco = (localStorage.endereco == '' || typeof localStorage.endereco == 'undefined') ? endereco : JSON.parse(localStorage.endereco);

    $("#resumoPedido_produtos").load('listaProdutosResumo.php?idCarrinho=' + idCarrinho);
    $("#pagamento_listaProdutosDetalhes").load('listaProdutosDetalhe.php?idCarrinho=' + idCarrinho + '&referencia=' + referencia);

    $("#listaEnderecoSelecionadoAjax").load('listaEnderecoSelecionadoAjax.php?idEndereco=' + objEndereco.idEndereco); 
    
    $("#listaFreteAjax").load('listaFreteAjax.php?endereco='+localStorage.endereco+'&idCarrinho=' + idCarrinho + '&referencia=' + referencia);

//var endereco = ;

console.log();

    $('#abreModalEnderecos').click(function (event) {
        event.preventDefault();
        listaEnderecos();
    });
});