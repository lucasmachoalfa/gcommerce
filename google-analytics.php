<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php'; ?>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>

        <div class="container">
            <div class="row">
                <h3 class="text-center">Google Analytics</h3>
                <hr>
                <div class="col-sm-12">
                    <form id="defaultForm" method="post" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea class="form-control" rows="4" maxlength="250" placeholder="Insira seu código do Google Analytics aqui"></textarea>
                            </div>
                        </div>
                        <div class="form-group text-left">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Salvar Google Analytics</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
