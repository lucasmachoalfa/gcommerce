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

                $("[name='visivel']").bootstrapSwitch();

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

                $("#btnCadBanner").click(function () {
                    var titulo;
                    var link;
                    var novaJanela = ($("#novaJanela").is(':checked')) ? 1 : 0;
                    var dataEntrada;
                    var dataSaida;

                    var validImagem = false;
                    var validTitulo = false;
                    var validDataEntrada = false;
                    
                    if(foto != ''){
                        validImagem = true;
                    }
                    
                    if(titulo != ''){
                        validTitulo = true;
                    }
                    
                    if(dataEntrada != ''){
                        validDataEntrada = true;
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

                                        window.location = 'banners.php'
                                    }
                        });
                        * /
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
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Adicionar banner</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Adicionar banner - Banners</h4>
                            </div>
                            <div class="modal-body">
                                <form id="defaultForm" method="post" class="form-horizontal">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label for="image">Imagem </label>
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="input-group">
                                                    <input type="file" name="imagem" id="imagem">
                                                </div>
                                            </div><br />
                                            <div id="imagePreview">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="title">Título </label>
                                                    <input type="text" name="title" value="" class="form-control">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="link">Link </label>
                                                    <input type="text" name="link" value="" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Opções</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="new_window" value="1"> Nova Janela				
                                                    </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <strong>Ativar na data</strong>
                                                    <div class='input-group date' id='dataEntrada'>
                                                        <input type='text' class="form-control" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Desativar na data</strong>
                                                    <div class='input-group date' id='dataSaida'>
                                                        <input type='text' class="form-control" />
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
            <div class="verBanners">
                <div class="row thead">
                    <div class="col-md-1">Ordenar</div>
                    <div class="col-md-3">Imagem</div>
                    <div class="col-md-2">Data de entrada</div>
                    <div class="col-md-2">Data de saída</div>
                    <div class="col-md-1">Editar</div>
                    <div class="col-md-1">Excluir</div>
                    <div class="col-md-2">Visível</div>
                </div>
                <div class="row tbody">
                    <div class="col-md-1">
                        <i class="glyphicon glyphicon-resize-vertical"></i>
                    </div>
                    <div class="col-md-3">
                        <img src="http://www.agenciaguppy.com.br/img/banner/pousada-amparo.png" alt=""/>                        
                    </div>
                    <div class="col-md-2">
                        29/09/2016
                    </div>
                    <div class="col-md-2">
                        29/09/2016
                    </div>
                    <div class="col-md-1">
                        <button id="editar1" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button>
                    </div>
                    <div class="col-md-1">
                        <a href="#" class="btn btn-danger  btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" name="visivel" id="1" checked>
                    </div>
                </div>
                <div class="row tbody cinza">
                    <div class="col-md-1">
                        <i class="glyphicon glyphicon-resize-vertical"></i>
                    </div>
                    <div class="col-md-3">
                        <img src="http://www.agenciaguppy.com.br/img/banner/pousada-amparo.png" alt=""/>                        
                    </div>
                    <div class="col-md-2">
                        29/09/2016
                    </div>
                    <div class="col-md-2">
                        29/09/2016
                    </div>
                    <div class="col-md-1">
                        <button id="editar1" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button>
                    </div>
                    <div class="col-md-1">
                        <a href="#" class="btn btn-danger  btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" name="visivel" id="2" checked>
                    </div>
                </div>
                <div class="row tbody">
                    <div class="col-md-1">
                        <i class="glyphicon glyphicon-resize-vertical"></i>
                    </div>
                    <div class="col-md-3">
                        <img src="http://www.agenciaguppy.com.br/img/banner/pousada-amparo.png" alt=""/>                        
                    </div>
                    <div class="col-md-2">
                        29/09/2016
                    </div>
                    <div class="col-md-2">
                        29/09/2016
                    </div>
                    <div class="col-md-1">
                        <button id="editar1" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button>
                    </div>
                    <div class="col-md-1">
                        <a href="#" class="btn btn-danger  btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
                    </div>
                    <div class="col-md-2">
                        <input type="checkbox" name="visivel" id="3" checked>
                    </div>
                </div>

            </div>            

        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
