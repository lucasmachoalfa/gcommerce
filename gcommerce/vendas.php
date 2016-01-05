<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php'; ?>
        <script>
            $(document).ready(function () {
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip();
                });
            });
        </script>
        <!-- DATEPICKER -->
        <script src="js/moment-with-locales.js"></script>
        <link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
        <script src="js/bootstrap-datetimepicker.js"></script>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>
        <div class="container">
            <h3 class="text-center">Vendas</h3>
            <hr>
            <div class="row">
                <div class="col-xs-12 text-center">
                    <a href="#">Exportar lista de vendas</a> |
                    <a href="verClientes.php">Ver clientes</a> |
                    <a href="#">Carrinhos abandonados</a>
                </div>
                <br><br><br>
                <div class="col-lg-6">
                    <input type="text" class="form-control" placeholder="Pesquisar por número de pedido, nome, e-mail do cliente ou valor da compra">
                </div>
                <div class="col-lg-3">
                    <select class="form-control">
                        <option>Todos os status</option>
                        <option>Aguardando pagamento</option>
                        <option>Esperando que o pedido seja embalado</option>
                        <option>Pronto para envio</option>
                        <option>Pedido enviado</option>
                        <option>Pedido cancelado</option>
                        <option>Pedido concluído</option>
                    </select>
                </div>
                <div class="col-lg-3">
                    <div class="input-group">
                        <select class="form-control">
                            <option>Todas as datas</option>
                            <option>Ontem</option>
                            <option>Últimos 7 dias</option>
                            <option>Últimos 30 dias</option>
                            <option>Período personalizado</option>
                        </select>
                        <span class="input-group-btn">
                            <button class="btn btn-info" type="button"><i class="glyphicon glyphicon-search"></i></button>
                        </span>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-3 col-lg-offset-9">
                    <div class="form-group">
                        <strong>de</strong>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <strong>até</strong>
                        <div class='input-group date' id='datetimepicker2'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
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

            <br>
            <div class="row">
                <div class="col-lg-6">
                    <select class="form-control">
                        <option>Ações em massa</option>
                        <option>Marcar como embalado</option>
                        <option>Notificar o envio</option>
                        <option>Arquivar</option>
                        <option>Cancelar</option>
                        <option>Gerar etiquetas</option>
                    </select>
                </div>
            </div> 
            <br>
            <div class="table-responsive">
                <table class="table table-striped"> 
                    <thead> 
                        <tr> 
                            <th><input type="checkbox"></th> 
                            <th>Pedido</th>
                            <th>Data/Hora</th> 
                            <th>Total</th> 
                            <th>Comprador</th> 
                            <th>Status do pedido</th> 
                            <th>Ação recomendada</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            <td><input type="checkbox"></td> 
                            <td>#128</td> 
                            <td><small>05/10/2015<br>21:30</small></td>
                            <td>R$610,00</td> 
                            <td><span data-toggle="tooltip" data-placement="top" title="Lucas Oliveira Lopes de Freitas">Lucas Oliveira Lopes de Freitas</span></td>
                            <td><small class="sm-warning">Aguardando pagamento</small></td> 
                            <td><a href="#" class="btn btn-warning btn-sm">Marcar pagamento como recebido</a></td> 
                        </tr>
                        <tr> 
                            <td><input type="checkbox"></td> 
                            <td>#128</td> 
                            <td><small>05/10/2015<br>21:30</small></td>
                            <td>R$610,00</td> 
                            <td><span data-toggle="tooltip" data-placement="top" title="Lucas Oliveira Lopes de Freitas">Lucas Oliveira Lopes de Freitas</span></td>
                            <td><small class="sm-info">Esperando que o pedido seja embalado</small></td> 
                            <td><a href="#" class="btn btn-info btn-sm">Marcar como embalado</a></td> 
                        </tr>
                        <tr> 
                            <td><input type="checkbox"></td> 
                            <td>#128</td> 
                            <td><small>05/10/2015<br>21:30</small></td>
                            <td>R$610,00</td> 
                            <td><span data-toggle="tooltip" data-placement="top" title="Lucas Oliveira Lopes de Freitas">Lucas Oliveira Lopes de Freitas</span></td>
                            <td><small class="sm-success">Pronto para envio</small></td> 
                            <td><a href="#" class="btn btn-success btn-sm">Notificar o envio</a></td> 
                        </tr>
                        <tr> 
                            <td><input type="checkbox"></td> 
                            <td>#128</td> 
                            <td><small>05/10/2015<br>21:30</small></td>
                            <td>R$610,00</td> 
                            <td><span data-toggle="tooltip" data-placement="top" title="Lucas Oliveira Lopes de Freitas">Lucas Oliveira Lopes de Freitas</span></td>
                            <td><small class="sm-gray-light">Pedido enviado</small></td> 
                            <td><a href="#" class="btn btn-default btn-sm">Arquivar</a></td> 
                        </tr>
                        <tr> 
                            <td><input type="checkbox"></td> 
                            <td>#128</td> 
                            <td><small>05/10/2015<br>21:30</small></td>
                            <td>R$610,00</td> 
                            <td><span data-toggle="tooltip" data-placement="top" title="Lucas Oliveira Lopes de Freitas">Lucas Oliveira Lopes de Freitas</span></td>
                            <td><small class="sm-danger">Pedido cancelado</small></td> 
                            <td><a href="#" class="btn btn-danger btn-sm">Arquivar</a></td> 
                        </tr><tr> 
                            <td><input type="checkbox"></td> 
                            <td>#128</td> 
                            <td><small>05/10/2015<br>21:30</small></td>
                            <td>R$610,00</td> 
                            <td><span data-toggle="tooltip" data-placement="top" title="Lucas Oliveira Lopes de Freitas">Lucas Oliveira Lopes de Freitas</span></td>
                            <td><small class="sm-success">Pedido concluído</small></td> 
                            <td><a href="#" class="btn btn-success btn-sm">Notificar ao cliente</a></td> 
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
