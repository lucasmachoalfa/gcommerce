<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php'; ?>
        <style>
            .carrinhosConfig th, .carrinhosConfig td{
                text-align: center;
            }
        </style>
        <script>
            $(document).ready(function () {
                $("#modalEmail").on('show.bs.modal', function (e) {
                    var titulo = $(e.relatedTarget).data('extra');
                    $.post('control/emailControle.php', {opcao: 'listaConfiguracaoEmail', email: titulo},
                    function (r) {
                        var resposta = JSON.parse(r);

                        $("#nome").val(resposta.nome);
                        $("#assunto").val(resposta.assunto);
                        $("#mensagem").val(resposta.mensagem);
                        $("#mensagemSMS").val(resposta.mensagemSMS);
                        $("#idEmail").val(resposta.idEmail);

                    });

                    $('#tituloConfiguracao').html(titulo);
                });

                $("#btnCadastrarConfiguracao").click(function () {
                    var nome = $("#nome").val();
                    var assunto = $("#assunto").val();
                    var mensagem = $("#mensagem").val();
                    var mensagemSMS = $("#mensagemSMS").val();
                    var idEmail = $("#idEmail").val();
                    
                    $.post('control/emailControle.php',{opcao:'alterar',nome:nome, assunto:assunto, mensagem:mensagem, mensagemSMS:mensagemSMS, idEmail:idEmail});
                });
            })
        </script>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>
        <div class="container">
            <h3 class="text-center">E-mails personalizados</h3>
            <hr>
            <div class="row">
                <!-- Modal -->
                <div class="modal fade" id="modalEmail" tabindex="-1" role="dialog" aria-labelledby="modalEmailLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="modalEmailLabel">Adicionar configuração - <span id="tituloConfiguracao"></span></h4>
                            </div>
                            <div class="modal-body">
                                <form id="defaultForm" method="post" class="form-horizontal">
                                    <input type="hidden" id="idEmail" name="idEmail" >
                                    <div class="form-group">
                                        <label class="col-sm-2">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="nome" name="nome" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Assunto</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="assunto" name="assunto" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Mensagem</label>
                                        <div class="col-sm-10">
                                            <!-- COLOCAR CKEDITOR NO TEXTAREA ABAIXO -->
                                            <textarea class="form-control" id="mensagem" name="mensagem" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Mensagem SMS (celular)</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="mensagemSMS" name="mensagemSMS" class="form-control">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-success" id="btnCadastrarConfiguracao">Cadastrar</button>
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
                            <td class="text-right">
                                <button type="button" data-toggle="modal" data-target="#modalEmail" data-extra="Cadastro Newsletter" class="btn btn-warning btn-sm">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </button>
                            </td> 
                        </tr>
                        <tr> 
                            <td>Carrinho Abandonado</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#modalEmail" data-extra="Carrinho Abandonado" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Confirmação de pagamento</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#modalEmail" data-extra="Confirmação de pagamento" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Enviado</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#modalEmail" data-extra="Enviado" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Lembrete de pagamento do boleto</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#modalEmail" data-extra="Lembrete de pagamento do boleto" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Pagamento cancelado (automatic)</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#modalEmail" data-extra="Pagamento cancelado (automatic)" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Pagamento cancelado (custom)</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#modalEmail" data-extra="Pagamento cancelado (custom)" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Pendência de pagamento</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#modalEmail" data-extra="Pendência de pagamento" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Pendência de pagamento (Boleto recorrente)</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#modalEmail" data-extra="Pendência de pagamento (Boleto recorrente)" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Preparando para Envio</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#modalEmail" data-extra="Preparando para Envio" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Produto fora do estoque</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#modalEmail" data-extra="Produto fora do estoque" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Recebemos o seu pedido</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#modalEmail" data-extra="Recebemos o seu pedido" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Recebemos o seu pedido - Boleto</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#modalEmail" data-extra="Recebemos o seu pedido - Boleto" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Recebemos seu cadastro</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#modalEmail" data-extra="Recebemos seu cadastro" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Reenvio de Boleto</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#modalEmail" data-extra="Reenvio de Boleto" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Resumo do pedido</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#modalEmail" data-extra="Resumo do pedido" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                        <tr> 
                            <td>Solicitação automática de depoimento</td> 
                            <td class="text-right"><button type="button" data-toggle="modal" data-target="#modalEmail" data-extra="Solicitação automática de depoimento" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td> 
                        </tr>
                    </tbody> 
                </table>                
            </div>
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
