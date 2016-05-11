$(document).ready(function () {
    $("#btnCadProduto").click(function () {
        var data = new FormData();
        //<detalhes>
        
        //</detalhes>
        

        //<estoque e variações>
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
                        idDiv: idDiv,
                        idOpcao: idOpcao,
                        valorOpcao: '',
                        referencia: '',
                        quantidade: '',
                        preco: '',
                        peso: '',
                        valid: false
                    };

                    if (valorOpcao === '') {
                        validateBootstrap(idOpcao, 'Você deve selecionar uma variação!', 1);
                        row.valid = false;
                    } else {
                        validateBootstrap(idOpcao, '', 0);
                        row.valid = true;
                        row.valorOpcao = valorOpcao;
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
        //</estoque e variações>
    });
});