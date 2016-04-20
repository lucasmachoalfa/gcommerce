<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php'; ?>
        <link rel="stylesheet" href="css/jquery-ui.theme-smoothness.css">
        <script src="js/jquery-ui.js"></script>
        <script src="js/vendedor.js"></script>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>
        <div class="container">
            <h3 class="text-center">Vendedor</h3>
            <hr>
            <div class="row">
                <div class="col-xs-12 text-center">
                    <!--<a href="adiconarCarrinhoConfig.php" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal">Adicionar configuração</a>-->
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Adicionar Vendedor</button>
                </div>

                <!-- Modal de confirmação de exclusão -->
                <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                            </div>

                            <div class="modal-body">
                                <p>Você está prestes a excluir um vendedor. Esta ação é irreversível</p>
                                <p>Você deseja continuar?</p>
                                <p class="vendedor"></p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancela</button>
                                <a class="btn btn-danger btn-ok">Excluir</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de cadastro e alteração de vendedor -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Adicionar</h4>
                            </div>
                            <div class="modal-body">
                                <form id="defaultForm" method="post" class="form-horizontal">
                                    <input type="hidden" value="cadastrar" id="opcao" />
                                    <input type="hidden" id="idVendedor" />
                                    <input type="hidden" id="logoAtual" />
                                    
                                    <div class="form-group" id="form-group-nome">
                                        <label class="col-sm-2 control-label">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="nome" name="nome" class="form-control">
                                            <span class="glyphicon form-control-feedback" id="icon-nome" aria-hidden="true"></span>
                                            <label class="control-label" id="label-nome"></label>
                                        </div>
                                    </div>
                                    <div class="form-group" id="form-group-logo">
                                        <label class="col-sm-2 control-label">Logo</label>
                                        <div class="col-sm-10">
                                            <input type="file" id="logo" name="logo" class="form-control" value="Upload...">
                                            <span class="glyphicon form-control-feedback" id="icon-logo" aria-hidden="true"></span>
                                            <label class="control-label" id="label-logo"></label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="button" id="btnCadVendedor" class="btn btn-success">Adicionar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="table-responsive" id="listaVendedor">
                <?php require_once './listaVendedorAjax.php'; ?>
            </div>
            <div id="carregando" style="display: none">Carregando...</div>

        </div>
        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>