<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php'; ?>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>

        <div class="container">
            <h3 class="text-center">Cadastro de cliente</h3>
            <hr>
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control">
                    </div>
                    <label class="col-sm-2 control-label">Confirmar senha</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nome completo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Telefone</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label">CPF</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Data de Nascimento</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label">Sexo</label>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Masculino
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Feminino
                        </label>
                    </div>
                </div>
<!--                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Cadastrar</button>
                    </div>
                </div>-->
            <!--</form>-->
            <br>
            <h3 class="text-center">Endereço</h3>
            <hr>
            <!--<form class="form-horizontal">-->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nome Identificador</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">CEP</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control">
                    </div>
                    <label class="col-sm-2 control-label">Logradouro</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Número</label>
                    <div class="col-sm-1">
                        <input type="text" class="form-control">
                    </div>
                    <label class="col-sm-2 control-label">Complemento</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control">
                    </div>
                    <label class="col-sm-2 control-label">Bairro</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Cidade</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label">Estado</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
