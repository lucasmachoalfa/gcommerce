<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php'; ?>
        <style>
            .carrinhosConfig th, .carrinhosConfig td{
                text-align: center;
            }
        </style>
        <!-- SWITCH -->
        <link href="css/bootstrap-switch.css" rel="stylesheet">
        <script src="js/bootstrap-switch.js"></script>
        <script src="js/moment-with-locales.js"></script>
        <link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
        <script src="js/bootstrap-datetimepicker.js"></script>

        <script>

            $(document).ready(function () {
                var foto = '';
                $("#imagem").on('change', function (event) {


                    foto = event.target.files[0];
                    var tmppath = URL.createObjectURL(event.target.files[0]);
                    if (tmppath !== null) {
                        var img = document.createElement('img');
                        img.setAttribute('src', tmppath);
//                        img.setAttribute('id', 'image_' + i);
                        $("#imagePreview").html('');
                        $("#imagePreview").append(img);
                    }
                });

                $("input[name='visivel']").bootstrapSwitch();
                $('#dataEntrada').datetimepicker({
                    locale: 'pt',
                    format: 'DD/MM/YYYY'
                });

                $('#dataSaida').datetimepicker({
                    useCurrent: false, //Important! See issue #1075
                    locale: 'pt',
                    format: 'DD/MM/YYYY'
                });

                $("#dataEntrada").on("dp.change", function (e) {
                    $('#dataSaida').data("DateTimePicker").minDate(e.date);
                });
                $("#dataSaida").on("dp.change", function (e) {
                    $('#dataEntrada').data("DateTimePicker").maxDate(e.date);
                });

                $("[name='visivel']").on('switchChange.bootstrapSwitch', function (event, state) {
                    var status = state;
                    var id = $(this).attr('id');
                    console.log('id: ' + id + ' visivel: ' + state);
                })

                $('[data-toggle="tooltip"]').tooltip();

                $('#modalCadBanner').on('hide.bs.modal', function (e) {
                    $("#opcao").val('cadastrar');
                    $("#idBanner").val('');
                    $("#titulo").val('');
                    $("#link").val('');
                    $("#imagem").val('');
                    $("#dataEntrada").val('');
                    $("#dataSaida").val('');
                    $(".btn-success").text('Adicionar');

                    $('#form-group-categoria').removeClass('has-error has-feedback');
                    $('#form-group-categoria').removeClass('has-success');
                    $("#icon-categoria").removeClass('glyphicon-warning-sign');
                    $("#icon-categoria").removeClass('glyphicon-ok');
                    $("#label-categoria").html('');
                });

                $("#btnCadBanner").click(function () {
                    var titulo = $("#titulo").val();
                    var link = $("#link").val();
                    var novaJanela = ($("#novaJanela").is(':checked')) ? 1 : 0;
                    var dataEntrada = $("#dataEntrada").data('datepicker');
                    var dataSaida = $("#dataSaida").val();
                    
                    console.log(dataEntrada);

                    var validImagem = false;
                    var validTitulo = false;
                    var validDataEntrada = false;

                    if (foto != '') {
                        validImagem = true;
                        validateBootstrap('imagem', '', 0);
                    } else {
                        validateBootstrap('imagem', 'Você deve selecionar uma foto', 1);
                        validImagem = false;
                    }

                    if (titulo != '') {
                        validTitulo = true;
                        validateBootstrap('titulo', '', 0);
                    } else {
                        validateBootstrap('titulo', 'Você deve informar um título', 1);
                        validTitulo = false;
                    }

                    if (dataEntrada != '') {
                        validDataEntrada = true;
                        validateBootstrap('dataEntrada', '', 0);
                    } else {
                        validateBootstrap('dataEntrada', 'Você deve informar uma data de entrada', 1);
                        validDataEntrada = false;
                    }

                    if (validImagem && validTitulo && validDataEntrada) {
                        var data = new FormData();
                        data.append('opcao', 'cadastrar');
                        data.append('foto', foto);
                        data.append('titulo', titulo);
                        data.append('link', link);
                        data.append('novaJanela', novaJanela);
                        data.append('dataEntrada', dataEntrada);
                        data.append('dataSaida', dataSaida);
                        $.ajax({
                            url: 'control/controleBanners.php',
                            method: 'POST',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: data,
                            success: function () {
//                                $("#listaBanners").load('listaBannersAjax.php');
//                                window.location = 'banners.php'
                                $("#modalCadBanner").modal('hide');
                            }
                        });
                    }
                });
            });
        </script>

        <style>
            .verBanners .thead{
                font-weight: bold;
                margin-bottom: 15px;
                padding-bottom: 5px;
                border-bottom: 1px solid #dfdfdf;
            }
            .verBanners .row{
                text-align: center;
                border-bottom: 1px solid #dfdfdf;
                padding: 10px 0;
            }
            .verBanners .row.cinza{
                background-color: #f9f9f9;
            }
            .verBanners .row:last-of-type{
                border-bottom: 0;
            }
        </style>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>
        <div class="container">
            <h3 class="text-center">Banners</h3>
            <hr>
            <div class="row">
                <div class="col-xs-12 text-center">
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalCadBanner">Adicionar banner</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="modalCadBanner" tabindex="-1" role="dialog" aria-labelledby="modalCadBannerLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="modalCadBannerLabel">Adicionar banner - Banners</h4>
                            </div>
                            <div class="modal-body">
                                <form id="defaultForm" method="post" class="form-horizontal">
                                    <div class="row">
                                        <div class="col-md-5" id="form-group-imagem">
                                            <label class="control-label" for="imagem">Imagem </label>
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="input-group">
                                                    <input type="file" name="imagem" id="imagem" class="form-control">
                                                    <span class="glyphicon form-control-feedback" id="icon-imagem" aria-hidden="true"></span>
                                                    <label class="control-label" id="label-imagem"></label>
                                                </div>
                                            </div><br />
                                            <div id="imagePreview">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="row">
                                                <div class="col-md-12" id="form-group-titulo">
                                                    <label for="title">Título </label>
                                                    <input type="text" name="titulo" id="titulo" class="form-control">
                                                    <span class="glyphicon form-control-feedback" id="icon-titulo" aria-hidden="true"></span>
                                                    <label class="control-label" id="label-titulo"></label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="link">Link </label>
                                                    <input type="text" name="link" id="link" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Opções</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" id="novaJanela" value="1"> Nova Janela				

                                                    </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6" id="form-group-dataEntrada">
                                                    <strong>Ativar na data</strong>
                                                    <div class='input-group date' id='dataEntrada'>
                                                        <input type='text' id="dataEntrada" class="form-control" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar" id="icon-dataEntrada"></span>
                                                            <!--<span class="glyphicon form-control-feedback" id="icon-dataEntrada" aria-hidden="true"></span>-->
                                                        </span>
                                                    </div>
                                                        <label class="control-label" id="label-dataEntrada"></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Desativar na data</strong>
                                                    <div class='input-group date' id='dataSaida'>
                                                        <input type='text' id="dataSaida" class="form-control" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="button" id="btnCadBanner" class="btn btn-success">Adicionar banner</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="listaBanners">
                <?php
                require_once 'listaBannersAjax.php';
                ?>
            </div>            

        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
