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
            <h3 class="text-center">Meios de pagamento</h3>
            <hr>    
            <div class="row">
                <div class="col-sm-12">
                    <div class="row modoPagamento">
                        <div class="col-lg-3">
                            <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading">
                                    <img src="https://d26lpennugtm8s.cloudfront.net/assets/admin/img/payments/pagseguro.png" alt=""/>
                                </div>
                                <div class="panel-body" >
                                    <div  style="float: left;">
                                        <button class="btn btn-success text-right"  data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-cog"></i></button>
                                    </div>
                                    <div style="float: right;">
                                        <input type="checkbox" name="my-checkbox" checked>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">PagSeguro - Modo de pagamento</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Conteúdo modal <strong>MODO DE PAGAMENTO</strong>.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-success">Ativar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading">
                                    <img src="https://d26lpennugtm8s.cloudfront.net/assets/admin/img/payments/bcash.png" alt=""/>
                                </div>
                                <div class="panel-body" >
                                    <div  style="float: left;">
                                        <button class="btn btn-success text-right"><i class="glyphicon glyphicon-cog"></i></button>
                                    </div>
                                    <div style="float: right;">
                                        <input type="checkbox" name="my-checkbox" checked>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading">
                                    <img src="https://d26lpennugtm8s.cloudfront.net/assets/admin/img/payments/paypal_multiple.png" alt=""/>
                                </div>
                                <div class="panel-body" >
                                    <div  style="float: left;">
                                        <button class="btn btn-success text-right"><i class="glyphicon glyphicon-cog"></i></button>
                                    </div>
                                    <div style="float: right;">
                                        <input type="checkbox" name="my-checkbox" checked>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading">
                                    <img src="https://d26lpennugtm8s.cloudfront.net/assets/admin/img/payments/boleto.png" alt=""/>
                                </div>
                                <div class="panel-body" >
                                    <div  style="float: left;">
                                        <button class="btn btn-success text-right"><i class="glyphicon glyphicon-cog"></i></button>
                                    </div>
                                    <div style="float: right;">
                                        <input type="checkbox" name="my-checkbox" checked>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
