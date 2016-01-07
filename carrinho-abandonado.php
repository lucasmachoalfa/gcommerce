<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php'; ?>
        <style>
            .carrinhosConfig th, .carrinhosConfig td{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>
        <div class="container">
            <h3 class="text-center">Carrinhos abandonados</h3>
            <hr>
            <div class="row">
                <div class="col-xs-12 text-center">
                    <!--<a href="adiconarCarrinhoConfig.php" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal">Adicionar configuração</a>-->
                    <button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal">Adicionar configuração</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Adicionar configuração - Carrinho abandonado</h4>
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
                                        <label class="col-sm-2 control-label">Tempo</label>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control" min="1" max="60">
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="form-control">
                                                <option>Minutos</option>
                                                <option>Horas</option>
                                                <option>Dias</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Mensagem</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success">Cadastrar</button>
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
                            <th>Tempo</th>
                            <th>Enviados</th> 
                            <th>Convertidos</th> 
                            <th>Valor</th> 
                            <th>% conversões</th> 
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
                            <td>R$ 500.000,00</td> 
                            <td style="width: 200px;">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                        60%
                                    </div>
                                </div>
                            </td> 
                            <th><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></th> 
                            <th><a href="#" class="btn btn-danger  btn-sm"><i class="glyphicon glyphicon-trash"></i></a></th> 
                        </tr>
                    </tbody> 
                </table>                
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped"> 
                    <thead> 
                        <tr> 
                            <th>ID</th> 
                            <th>Data</th>
                            <th>Nome</th> 
                            <th>E-mail</th> 
                            <th>Notificação</th> 
                            <th>Carrinho</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            <td><input type="checkbox"></td> 
                            <td><small>05/10/2015<br>21:30</small></td>
                            <td><span data-toggle="tooltip" data-placement="top" title="Lucas Oliveira Lopes de Freitas">Lucas Oliveira Lopes de Freitas</span></td>
                            <td>lucas.freitas@agenciaguppy.com.br</td> 
                            <td>Enviada</td> 
                            <td>Não recuperado</td> 
                        </tr>
                        <tr> 
                            <td><input type="checkbox"></td> 
                            <td><small>05/10/2015<br>21:30</small></td>
                            <td><span data-toggle="tooltip" data-placement="top" title="Lucas Oliveira Lopes de Freitas">Lucas Oliveira Lopes de Freitas</span></td>
                            <td>lucas.freitas@agenciaguppy.com.br</td> 
                            <td>Enviada</td> 
                            <td>R$ 200,00</td> 
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
