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
            <h3 class="text-center">Informações da empresa</h3>
            <hr>    
            <div class="row">
                <div class="col-sm-8">
                    <form id="defaultForm" method="post" class="form-horizontal">
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Logo para loja</label>
                                <div class="col-md-10">
                                    <img src="img/logo.png" alt="" height="60"/><br><br>
                                    <input type="file"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Nome da empresa/loja</label>
                                <div class="col-md-10">
                                    <input type="text"  class="form-control">
                                </div>
                            </div>	
                            <div class="form-group">
                                <label class="col-md-2 control-label">CNPJ</label>
                                <div class="col-md-10">
                                    <input type="text"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Razão Social</label>
                                <div class="col-md-10">
                                    <input type="text"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">CEP</label>
                                <div class="col-md-10">
                                    <input type="text"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Endereço</label>
                                <div class="col-md-10">
                                    <input type="text"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Complemento</label>
                                <div class="col-md-10">
                                    <input type="text"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">País</label>
                                <div class="col-md-10">
                                    <input type="text"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Bairro</label>
                                <div class="col-md-10">
                                    <input type="text"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Cidade</label>
                                <div class="col-md-10">
                                    <input type="text"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Estado</label>
                                <div class="col-md-10">
                                    <input type="text"  class="form-control">
                                </div>
                            </div>
                        </fieldset>                     
                    </form>
                </div>
            </div>            
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
