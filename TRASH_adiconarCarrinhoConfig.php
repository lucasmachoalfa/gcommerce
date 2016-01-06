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
            <h3 class="text-center">Adicionar configuração - Carrinho abandonado</h3>
            <hr>
            <form id="defaultForm" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Título</label>
                    <div class="col-sm-10">
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tempo</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" min="1" max="60">
                    </div>
                    <div class="col-sm-2">
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
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href="carrinho-abandonado.php" class="btn btn-default">&laquo; Voltar</a>
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>