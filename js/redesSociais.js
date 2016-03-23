$(document).ready(function () {
    $("#btnCadRedesSocias").click(function () {
//        var rede = new Array();
        var idRede = new Array();
        var link = new Array();


        $("input[type='text']").each(function () {
//            rede.push($(this).attr('name'));
            idRede.push($(this).attr('id'));
            link.push($(this).val());
        });



        $.post('control/marketingControle.php', {opcao: 'redessociais', idRede: idRede, link: link},
        function (r) {
            console.log(r);
        })
    })

    $(".form-horizontal").sortable({
        opacity: 0.6,
        cursor: 'move',
        placeholder: "portlet-placeholder ui-corner-all",
        update: function () {
            var order = $(this).sortable("serialize") + '&opcao=ordenaRedes';

            $.post("control/marketingControle.php", order, function (theResponse) {
                console.log(theResponse);
            });
        }
    });
//    $(".handle").addClass( "ui-widget-header ui-corner-all" );

});