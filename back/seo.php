<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php'; ?>
        <!-- SWITCH -->
        <link href="css/bootstrap-switch.css" rel="stylesheet">
        <script src="js/bootstrap-switch.js"></script>
        <script>
            $(document).ready(function () {
                $(function () {
                    $("[name='my-checkbox']").bootstrapSwitch();
                });
            });
        </script>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <h3 class="text-center">SEO</h3>
                    <hr>
                    <h4>METATAGS&nbsp;&nbsp; <small><a href="#" data-toggle="modal" data-target="#myModal">(Veja algumas dicas)</a></small></h4>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">DICAS PARAS AS METATAGS</h4>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Nunca exceda o tamanho de caracteres dos seguintes itens:
                                    </p>
                                    <p>
                                        • <span style="text-decoration: underline;">Título</span> - 90 (mas o Google irá cortar o seu título no caracter 63).<br><br>
                                        • <span style="text-decoration: underline;">Meta Description</span> - 250 (mas o snippet do Google irá cortar a sua descrição no caracter 160).<br><br>
                                        • <span style="text-decoration: underline;">Meta Keywords</span> - 200<br>
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <form id="defaultForm" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2">Título</label>
                            <div class="col-sm-10">
                                <input type="email" id="email" name="email" class="form-control" maxlength="90">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Meta Description (Descrição)</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="4" maxlength="250"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Meta Keywords (Palavras-chaves)</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="4" maxlength="200"></textarea>
                            </div>
                        </div>
                    </form>
                    <hr>
                </div>
                <div class="col-sm-12">
                    <h4>REDIRECIONAMENTOS 301</h4>
                    <form id="defaultForm" method="post" class="form-horizontal">
                        <div class="form-group row">
                            <div class="col-md-5">
                                <input placeholder="trotamare.xtechcommerce.com/oldlink" class="form-control key" name="redirections[0][from_url]">
                            </div>
                            <div class="col-md-1 text-center">
                                <div class="buffer-top-xs buffer-bottom-xs">
                                    <i class="glyphicon glyphicon-arrow-right"></i>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <input placeholder="trotamare.xtechcommerce.com/newlink" class="form-control value" name="redirections[0][to_url]">
                            </div>
                            <div class="col-md-1">
                                <a href="#" class="btn btn-danger btn-remove"><i class="glyphicon glyphicon-trash"></i></a>
                            </div>
                        </div>
                        <a href="#" class="add-redirections"><i class="glyphicon glyphicon-plus-sign"></i> Adicionar redirecionamento</a>
                    </form>
                </div>
            </div>            
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>