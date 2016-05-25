function delCategoria(id) {
    $.post('control/categoriaControle.php', {opcao: 'delCategoria', idCategoria: id},
    function (r) {
        console.log(r);
        paginacao(1);
        $('#confirm-delete').modal('hide');
    });
}

function listaCategoria(id) {
    $.post('control/categoriaControle.php', {opcao: 'listaCategoria', idCategoria: id, formato: 'json'},
    function (r) {
        console.log(r);
        var resposta = $.parseJSON(r);
        console.log(resposta);

        var idCategoria = resposta.idCategoria;
        var nome = resposta.titulo;

        $("#categoria").val(nome);
        $("#idCategoria").val(idCategoria);
        $("#opcao").val('alterar');
        $(".btn-success").text('Alterar');


        $("#myModal").modal('show');
        paginacao(1);
    })
}


function paginacao(pagina) {
    $("#carregando").show();
    $("#listaCategoria").html('');

    $("#listaCategoria").load("listaCategoriaAjax.php?pagina=" + pagina, function () {
        $("#carregando").hide();
    });
}

id = new Array();
$(document).ready(function () {
    if ($("#listaCategoria").length) {
        paginacao(1);
//        $("#listaCategoria").load('listaCategoriaAjax.php?pagina=1');
    }

    $('#confirm-delete').on('show.bs.modal', function (e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

        $('.categoria').html('Categoria: <strong>' + $(e.relatedTarget).data('extra') + '</strong>');
    });

    $('#myModal').on('hide.bs.modal', function (e) {
        $("#categoria").val('');
        $("#idCategoria").val('');
        $("#opcao").val('cadastrar');
        $(".btn-success").text('Adicionar');

        $('#form-group-categoria').removeClass('has-error has-feedback');
        $('#form-group-categoria').removeClass('has-success');
        $("#icon-categoria").removeClass('glyphicon-warning-sign');
        $("#icon-categoria").removeClass('glyphicon-ok');
        $("#label-categoria").html('');
        
        paginacao(1);
    });


    $("#btnCadCategoria").click(function () {
        var titulo = $("#categoria").val();
        var idCategoria = $("#idCategoria").val();
        var opcao = $("#opcao").val();

        if (titulo == '') {
            validateBootstrap('categoria', 'Você deve informar uma categoria!', 1);
        } else {
            validateBootstrap('categoria', '', 0);
            $.post('control/categoriaControle.php', {opcao: opcao, titulo: titulo, idCategoria: idCategoria},
            function (r) {
                paginacao(1);
                $("#myModal").modal('hide');
            });
        }
    });

});