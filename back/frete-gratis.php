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
            <h3 class="text-center">Frete grátis</h3>
            <hr>
            <div class="row">
                <div class="col-xs-12 text-center">
                    <!--<a href="adiconarCarrinhoConfig.php" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal">Adicionar configuração</a>-->
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Adicionar regra</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Adicionar regra - Frete grátis</h4>
                            </div>
                            <div class="modal-body">
                                <form id="defaultForm" method="post" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nome da Regra</label>
                                        <div class="col-sm-10">
                                            <input type="email" id="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Dar o frete no valor de</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <div class="input-group-addon">R$</div>
                                                <!-- VALIDAR PARA DIGITAR APENAS NÚMERO E PERMITIR COLOCAR VÍRGULA -->
                                                <input type="text" class="form-control" id="exampleInputAmount" placeholder="Ex: 0,00">
                                            </div>
                                        </div>
                                        <label class="col-sm-2 control-label">Para compras acima de</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <div class="input-group-addon">R$</div>
                                                <!-- VALIDAR PARA DIGITAR APENAS NÚMERO E PERMITIR COLOCAR VÍRGULA -->
                                                <input type="text" class="form-control" id="exampleInputAmount" placeholder="Ex: 0,00">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped"> 
                                            <thead> 
                                                <tr> 
                                                    <th>País</th> 
                                                    <th>Estado</th> 
                                                    <th>Cidade</th> 
                                                    <th>Excluir locação</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr> 
                                                    <td>
                                                        <select class="form-control">
                                                            <option>País</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select class="form-control">
                                                            <option>Cidade</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select class="form-control">
                                                            <option>Estado</option>
                                                        </select>
                                                    </td> 
                                                    <th><a href="#" class="btn btn-danger  btn-sm"><i class="glyphicon glyphicon-trash"></i></a></th> 
                                                </tr>
                                            </tbody> 
                                            <tfoot>
                                                <tr> 
                                                    <td colspan="4"><button type="button" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-plus-sign"></i> Adicionar locação</button></td>
                                                </tr>
                                            </tfoot> 
                                        </table>                
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
                            <th>Nome da Regra</th> 
                            <th>Dar o frete no valor de</th> 
                            <th>Para compras acima de</th> 
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            <td>Regra #1</td> 
                            <td>R$10,00</td>
                            <td>R$200,00</td>
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
