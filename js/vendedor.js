function delVendedor(id) {
    $.post('control/vendedorControle.php', {opcao: 'excluir', idVendedor: id},
            function (r) {
                paginacao(1);
                $('#confirm-delete').modal('hide');
            });
}

function listaVendedor(id) {
    $.post('control/vendedorControle.php', {opcao: 'listaVendedor', idVendedor: id, formato: 'json'},
            function (r) {
                var resposta = $.parseJSON(r);

                var idVendedor = resposta.idVendedor;
                var nome = resposta.nome;
                var logo = resposta.logo;

                $("#nome").val(nome);
                $("#logoAtual").val(logo);
                $("#idVendedor").val(idVendedor);
                $("#opcao").val('alterar');
                $(".btn-success").text('Alterar');


                $("#myModal").modal('show');
            });
}


function paginacao(pagina) {
    $("#carregando").show();
    $("#listaVendedor").html('');

    $("#listaVendedor").load("listaVendedorAjax.php?pagina=" + pagina, function () {
        $("#carregando").hide();
    });
}

id = new Array();
$(document).ready(function () {
    logo = ''

    if ($("#listaVendedor").length) {
        paginacao(1);
    }

    $('#confirm-delete').on('show.bs.modal', function (e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

        $('.vendedor').html('Vendedor: <strong>' + $(e.relatedTarget).data('extra') + '</strong>');
    });

    $('#myModal').on('hide.bs.modal', function (e) {
        $("#nome").val('');
        $("#logo").val('');
        $("#idVendedor").val('');
        $("#opcao").val('cadastrar');
        $(".btn-success").text('Adicionar');

        $('#form-group-nome').removeClass('has-error has-feedback');
        $('#form-group-nome').removeClass('has-success');
        $("#icon-nome").removeClass('glyphicon-warning-sign');
        $("#icon-nome").removeClass('glyphicon-ok');
        $("#label-nome").html('');
        $('#form-group-logo').removeClass('has-error has-feedback');
        $('#form-group-logo').removeClass('has-success');
        $("#icon-logo").removeClass('glyphicon-warning-sign');
        $("#icon-logo").removeClass('glyphicon-ok');
        $("#label-logo").html('');

        paginacao(1);
    });


    $("#btnCadVendedor").click(function () {
        var nome = $("#nome").val();
        var logoAtual = $("#logoAtual").val();
        var idVendedor = $("#idVendedor").val();
        var opcao = $("#opcao").val();
        var validNome, validLogo = false;

        if (nome == '') {
            validateBootstrap('nome', 'Você deve informar um nome!', 1);
        } else {
            validateBootstrap('nome', '', 0);
            validNome = true;
        }

        if (logo == '' && opcao == 'cadastrar') {
            validateBootstrap('logo', 'Você deve selecionar um logo!', 1);
        } else {
            validateBootstrap('logo', '', 0);
            validLogo = true;
        }


        if (validNome && validLogo) {
            var data = new FormData();
            data.append('opcao', opcao);
            data.append('nome', nome);
            data.append('idVendedor', idVendedor);
            data.append('logo', logo);
            if (logoAtual != "") {
                data.append('logoAtual', logoAtual);
            }

            $.ajax({
                url: 'control/vendedorControle.php',
                method: 'POST',
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                success: function (r) {
                    paginacao(1);
                    $("#myModal").modal('hide');

                    console.log(r);
                }
            });
        }
    });


    $("#logo").on("change", function (event) {
        logo = event.target.files[0];
    });
});