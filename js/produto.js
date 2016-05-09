
$(document).ready(function () {
    $("#btnCadProduto").click(function () {
        var data = new FormData();

        //estoque e variações
        validOpcao = new Array();
        if ($("#variacoesProdutos .row").length) {
            $("#variacoesProdutos .row").each(function () {
                var idDiv = $(this).attr('id');
//                validOpcao['row'] = idDiv;
                $("#"+idDiv+" select").each(function () {
                    var valorOpcao = $(this).val();
                    var idOpcao = $(this).attr('id');

                    var row = {
                        idDiv: idDiv,
                        idOpcao: idOpcao,
                        valid: false
                    };

                    if (valorOpcao === '') {
                        validateBootstrap(idOpcao, 'Você deve selecionar uma variação!', 1);
                        row.valid = false;
                    } else {
                        validateBootstrap(idOpcao, '', 0);
                        row.valid = true;
                    }
                    validOpcao.push(row);
                });


            });
        }
    });
});