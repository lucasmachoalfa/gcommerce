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
                <h3 class="text-center">SEO</h3>
                <hr>
                <div class="col-sm-4">
                    <p>
                        <strong>DICAS</strong><br>
                        Nunca exceda o tamanho de caracteres dos seguintes itens:
                    </p>
                    <p>
                        • <span style="text-decoration: underline;">Título</span> - 90 (mas o Google irá cortar o seu título no caracter 63).<br><br>
                        • <span style="text-decoration: underline;">Meta Description</span> - 250 (mas o snippet do Google irá cortar a sua descrição no caracter 160).<br><br>
                        • <span style="text-decoration: underline;">Meta Keywords</span> - 200<br>
                    </p>
                </div>
                <div class="col-sm-8">
                    <form id="defaultForm" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Título</label>
                            <div class="col-sm-10">
                                <input type="email" id="email" name="email" class="form-control" maxlength="90">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Meta Description (Descrição)</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="4" maxlength="250"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Meta Keywords (Palavras-chaves)</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="4" maxlength="200"></textarea>
                            </div>
                        </div>
                        <div class="form-group text-left">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-success">Salvar SEO</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>