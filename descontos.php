<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php'; ?>
        <style>
            .carrinhosConfig th, .carrinhosConfig td{
                text-align: center;
            }
        </style>
        <!-- DATEPICKER -->
        <script src="js/moment-with-locales.js"></script>
        <link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
        <script src="js/bootstrap-datetimepicker.js"></script>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>
        <div class="container">
            <h3 class="text-center">Descontos</h3>
            <hr>
            <div class="row">
                <div class="col-xs-12 text-center">
                    <!--<a href="adiconarCarrinhoConfig.php" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal">Adicionar configuração</a>-->
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Adicionar regra de desconto</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Adicionar regra de desconto - Descontos</h4>
                            </div>
                            <div class="modal-body">
                                <form id="defaultForm" method="post" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Título</label>
                                        <div class="col-sm-10">
                                            <input type="email" id="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Data início</label>
                                        <div class="col-sm-4">
                                            <div class='input-group date' id='datetimepicker1'>
                                                <input type='text' class="form-control" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <label class="col-sm-2 control-label">Data início</label>
                                        <div class="col-sm-4">
                                            <div class='input-group date' id='datetimepicker2'>
                                                <input type='text' class="form-control" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                $(function () {
                                                    $('#datetimepicker1').datetimepicker({
                                                        locale: 'pt',
                                                        format: 'DD/MM/YYYY'
                                                    });
                                                    $('#datetimepicker2').datetimepicker({
                                                        useCurrent: false, //Important! See issue #1075
                                                        locale: 'pt',
                                                        format: 'DD/MM/YYYY'
                                                    });
                                                    $("#datetimepicker1").on("dp.change", function (e) {
                                                        $('#datetimepicker2').data("DateTimePicker").minDate(e.date);
                                                    });
                                                    $("#datetimepicker2").on("dp.change", function (e) {
                                                        $('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
                                                    });
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Valor do desconto</label>
                                        <div class="col-sm-4">
                                            <input type="email" id="email" name="email" class="form-control">
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-control">
                                                <option>R$</option>
                                                <option>%</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tipo de desconto</label>
                                        <div class="col-sm-10">
                                            <label class="radio-inline">
                                                <input type="radio" name="inlineRadioOptions" checked id="inlineRadio1" value="option1"> Produto
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Categoria
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Loja toda
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10 col-sm-offset-2">
                                            <!-- EXIBIR INPUT ABAIXO QUANDO 'PRODUTO' ESTIVER MARCADO -->
                                            <input type="email" id="email" name="email" class="form-control">

                                            <!-- EXIBIR SELECT ABAIXO QUANDO 'CATEGORIA' ESTIVER MARCADO -->
<!--                                            <select class="form-control">
                                                <option>R$</option>
                                                <option>%</option>
                                            </select>-->

                                            <!-- SUMIR COM INPUT E SELECT CASO 'LOJA TODA' ESTEJA MARCADO -->
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success">Adicionar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="table-responsive">
                <table class="table table-striped carrinhosConfig"> 
                    <thead> 
                        <tr> 
                            <th>Título</th> 
                            <th>Data início</th>
                            <th>Data final</th> 
                            <th>Tipo de desconto</th> 
                            <th>Valor do desconto</th> 
                            <th>Editar</th> 
                            <th>Excluir</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            <td>Regra de 1 minuto</td> 
                            <td>1 minuto</td>
                            <td>10.000</td>
                            <td>7.000</td> 
                            <td>7.000</td> 
                            <th><button id="editar1" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></th> 
                            <th><a href="#" class="btn btn-danger  btn-sm"><i class="glyphicon glyphicon-trash"></i></a></th> 
                        </tr>
                    </tbody> 
                </table>                
            </div>          
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
