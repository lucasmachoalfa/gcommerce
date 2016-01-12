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
            <h3 class="text-center">E-mails personalizados</h3>
            <hr>
            <div class="row">
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
                                        <label class="col-sm-2">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="email" id="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Assunto</label>
                                        <div class="col-sm-10">
                                            <input type="email" id="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Mensagem</label>
                                        <div class="col-sm-10">
                                            <!-- COLOCAR CKEDITOR NO TEXTAREA ABAIXO -->
                                            <textarea class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Mensagem SMS (celular)</label>
                                        <div class="col-sm-10">
                                            <input type="email" id="email" name="email" class="form-control">
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
                <table class="table table-hover table-striped emailsPersonalizados"> 
                    <tbody>
                        <tr> 
                            <td>Cadastro Newsletter</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Carrinho Abandonado</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Confirmação de pagamento</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Enviado</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Lembrete de pagamento do boleto</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Pagamento cancelado (automatic)</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Pagamento cancelado (custom)</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Pendência de pagamento</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Pendência de pagamento (Boleto recorrente)</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Preparando para Envio</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Produto fora do estoque</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Recebemos o seu pedido</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Recebemos o seu pedido - Boleto</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Recebemos seu cadastro</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Reenvio de Boleto</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Resumo do pedido</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Solicitação automática de depoimento</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                    </tbody> 
                </table>                
            </div>
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
