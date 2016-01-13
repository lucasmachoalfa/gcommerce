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
        
        <link rel="stylesheet" href="css/jquery-ui.theme-smoothness.css">
        <script src="js/jquery-ui.js"></script>
        <style>
            /* highlight results */
            .ui-autocomplete span.hl_results {
                background-color: #ffff66;
            }

            /* scroll results */
            .ui-autocomplete {
                max-height: 250px;
                overflow-y: auto;
                /* prevent horizontal scrollbar */
                overflow-x: hidden;
                /* add padding for vertical scrollbar */
                padding-right: 5px;
            }

            .ui-autocomplete li {
                font-size: 16px;
            }

            /* IE 6 doesn't support max-height
            * we use height instead, but this forces the menu to always be this tall
            */
            * html .ui-autocomplete {
                height: 100px;
            }

            ul.ui-autocomplete.ui-menu {
                z-index: 999999;
            }
        </style>
        <script src="js/cupomDesconto.js"></script>
        
        <!--<script src="js/jquery.fcbkcomplete.js"></script>>
        <link rel="stylesheet" href="js/FCBKcomplete/style.css" /-->
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>
        <div class="container">
            <h3 class="text-center">Cupom de desconto</h3>
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
                                    <div class="form-group" id="form-group-codigo">
                                        <label class="col-sm-2 control-label">Código</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="codigo" name="codigo" class="form-control">
                                            <span class="glyphicon form-control-feedback" id="icon-codigo" aria-hidden="true"></span>
                                            <label class="control-label" id="label-codigo"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tipo do cupom</label>
                                        <div class="col-sm-10">
                                            <label class="radio-inline">
                                                <input type="radio" name="tipoCupom" checked value="desconto"> Desconto
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="tipoCupom" value="frete"> Frete grátis
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="tipoCupom" value="primeiraCompra"> Primeira compra
                                            </label>
                                        </div>
                                    </div>
                                    <!-- VALOR DE DESCONTO / SOME SE 'FRETE GRÁTIS' ESTIVER MARCADO -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Valor do desconto</label>
                                        <div class="col-sm-4">
                                            <input type="text" id="valorDesconto" name="valorDesconto" class="form-control">
                                        </div>
                                        <div class="col-sm-2">
                                            <select id="formatoDesconto" name="formatoDesconto" class="form-control">
                                                <option>R$</option>
                                                <option>%</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- FIM VALOR DE DESCONTO -->

                                    <!-- SE 'PRIMEIRA COMPRA' ESTIVER SELECIONADO, MUDAR VALOR DE USO MÁXIMO E USO MÁXIMO POR CLIENTE PARA 1 E DESABILITAR PARA EDIÇÃO -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Uso máximo</label>
                                        <div class="col-sm-2">
                                            <input type="number" id="usoMaximo" name="usoMaximo" class="form-control" min="0">
                                        </div>
                                        <label class="col-sm-4 control-label">Uso máximo por cliente</label>
                                        <div class="col-sm-2">
                                            <input type="number" id="usoMaximoCliente" name="usoMaximoCliente" class="form-control" min="0">
                                        </div>
                                    </div>
                                    <!-- FIM USO MÁXIMO -->


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Data início</label>
                                        <div class="col-sm-4">
                                            <div class='input-group date' id='datetimepicker1'>
                                                <input type='text' class="form-control" id="dataInicio" name="dataInicio" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <label class="col-sm-2 control-label">Data fim</label>
                                        <div class="col-sm-4">
                                            <div class='input-group date' id='datetimepicker2'>
                                                <input type='text' class="form-control" id="dataFim" name="dataFim" />
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
                                        <label class="col-sm-2 control-label">Valor mínimo</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <div class="input-group-addon">R$</div>
                                                <!-- VALIDAR PARA DIGITAR APENAS NÚMERO E PERMITIR COLOCAR VÍRGULA -->
                                                <input type="text" id="valorMinimo" name="valorMinimo" ite class="form-control" id="exampleInputAmount" placeholder="Ex: 145,14">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ui-widget">
                                        <label class="col-sm-2 control-label">Cliente</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="buscaClienteInput">
                                            <input type="hidden" id="clienteInput">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tipo de aplicação</label>
                                        <div class="col-sm-10">
                                            <label class="radio-inline">
                                                <input type="radio" name="tipoAplicacao" checked value="compraInteira"> Compra inteira
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="tipoAplicacao" value="produto"> Produto
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="tipoAplicacao" value="categoria"> Categoria
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10 col-sm-offset-2">
                                            <div id="form-group-produtoInput" class="oculta">
                                                <!-- EXIBIR INPUT ABAIXO QUANDO 'PRODUTO' ESTIVER MARCADO -->
                                                <input type="text" id="produtoInput" name="produtoInput" class="form-control">
                                                <span class="glyphicon form-control-feedback" id="icon-produtoInput" aria-hidden="true"></span>
                                                <label class="control-label" id="label-produtoInput"></label>
                                            </div>
                                            
                                            <div id="form-group-categoriaInput" class="oculta">
                                                <input type="text" id="categoriaInput" name="categoriaInput" class="form-control">
                                                <span class="glyphicon form-control-feedback" id="icon-categoriaInput" aria-hidden="true"></span>
                                                <label class="control-label" id="label-categoriaInput"></label>
                                            </div>

                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="button" id="btnCadCupomdesconto" class="btn btn-success">Adicionar</button>
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
                            <th>Código</th> 
                            <th>Tipo do cupom</th> 
                            <th>Valor do desconto</th> 
                            <th>Uso máximo</th> 
                            <th>Uso máximo por cliente</th> 
                            <th>Data início</th>
                            <th>Data final</th> 
                            <th>Valor mínimo</th> 
                            <th>Tipo de aplicação</th> 
                            <th>Editar</th> 
                            <th>Excluir</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            <td>123456789123456</td> 
                            <td>Primeira compra</td> 
                            <td>R$100,00</td> 
                            <td>-</td> 
                            <td>1000</td>
                            <td>29/09/2015</td>
                            <td>29/09/2015</td>
                            <td>R$100,00</td> 
                            <td>Compra inteira</td> 
                            <th><button id="editar1" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></th> 
                            <th><a href="#" class="btn btn-danger  btn-sm"><i class="glyphicon glyphicon-trash"></i></a></th> 
                        </tr>
                        <tr> 
                            <td>123456789123456</td> 
                            <td>Primeira compra</td> 
                            <td>R$100,00</td> 
                            <td>-</td> 
                            <td>1000</td>
                            <td>29/09/2015</td>
                            <td>29/09/2015</td>
                            <td>R$100,00</td> 
                            <td>Compra inteira</td> 
                            <th><button id="editar1" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></th> 
                            <th><a href="#" class="btn btn-danger  btn-sm"><i class="glyphicon glyphicon-trash"></i></a></th> 
                        </tr>
                        <tr> 
                            <td>123456789123456</td> 
                            <td>Primeira compra</td> 
                            <td>R$100,00</td> 
                            <td>-</td> 
                            <td>1000</td>
                            <td>29/09/2015</td>
                            <td>29/09/2015</td>
                            <td>R$100,00</td> 
                            <td>Compra inteira</td> 
                            <th><button id="editar1" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></th> 
                            <th><a href="#" class="btn btn-danger  btn-sm"><i class="glyphicon glyphicon-trash"></i></a></th> 
                        </tr>
                        <tr> 
                            <td>123456789123456</td> 
                            <td>Primeira compra</td> 
                            <td>R$100,00</td> 
                            <td>-</td> 
                            <td>1000</td>
                            <td>29/09/2015</td>
                            <td>29/09/2015</td>
                            <td>R$100,00</td> 
                            <td>Compra inteira</td> 
                            <th><button id="editar1" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></th> 
                            <th><a href="#" class="btn btn-danger  btn-sm"><i class="glyphicon glyphicon-trash"></i></a></th> 
                        </tr>
                    </tbody> 
                </table>                
            </div>
            <nav class="text-center">
                <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>