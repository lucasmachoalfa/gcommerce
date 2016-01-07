<?php
require_once 'model/enderecoDao.php';

$estados = $objEnderecoDao->listaEstados();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php'; ?>
        <script src="js/jquery.maskedinput.js"></script>
        <script src="js/funcoes.js"></script>
        <script src="js/clientes.js"></script>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>

        <div class="container">
            <h3 class="text-center">Cadastro de cliente</h3>
            <hr>
            <form id="defaultForm" class="form-horizontal">
                <div id="form-group-email" class="form-group">
                    <label class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" id="email" name="email" class="form-control">
                        <span class="glyphicon form-control-feedback" id="icon-email" aria-hidden="true"></span>
                    </div>
                    <label class="col-sm-2"></label>
                    <label class="col-sm-10 control-label" id="label-email"></label>
                </div>
                <div class="form-group" id="form-group-senha">
                    <label class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-4">
                        <input type="password" id="senha" name="senha" class="form-control">
                        <span class="glyphicon form-control-feedback" id="icon-senha" aria-hidden="true"></span>
                    </div>
                    <label class="col-sm-2 control-label">Confirmar senha</label>
                    <div class="col-sm-4">
                        <input type="password" id="senhaN" name="senhaN" class="form-control">
                        <span class="glyphicon form-control-feedback" id="icon-senhaN" aria-hidden="true"></span>
                    </div>
                    <label class="col-sm-2"></label>
                    <label class="col-sm-10 control-label" id="label-senha"></label>
                </div>
                <div class="form-group" id="form-group-nome">
                    <label class="col-sm-2 control-label">Nome completo</label>
                    <div class="col-sm-10">
                        <input type="text" id="nome" name="nome" class="form-control">
                        <span class="glyphicon form-control-feedback" id="icon-nome" aria-hidden="true"></span>
                    </div>
                    <label class="col-sm-2"></label>
                    <label class="col-sm-10 control-label" id="label-nome"></label>
                </div>
                <div class="form-group">
                    <div id="form-group-telefone">
                        <label class="col-sm-2 control-label">Telefone</label>
                        <div class="col-sm-5">
                            <input type="text" name="telefone" id="telefone" class="form-control">
                            <span class="glyphicon form-control-feedback" id="icon-telefone" aria-hidden="true"></span>
                            <label class="control-label" id="label-telefone"></label>
                        </div>
                    </div>
                    <div id="form-group-cpf">
                        <label class="col-sm-1 control-label">CPF</label>
                        <div class="col-sm-4">
                            <input type="text" id="cpf" name="cpf" class="form-control">
                            <span class="glyphicon form-control-feedback" id="icon-cpf" aria-hidden="true"></span>
                            <label class="control-label" id="label-cpf"></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div id="form-group-dataNascimento">
                        <label class="col-sm-2 control-label">Data de Nascimento</label>
                        <div class="col-sm-5">
                            <input type="text" name="dataNascimento" id="dataNascimento" class="form-control">
                            <span class="glyphicon form-control-feedback" id="icon-dataNascimento" aria-hidden="true"></span>
                            <label class="control-label" id="label-dataNascimento"></label>
                        </div>
                    </div>
                    <div id="form-group-sexo">
                        <label class="col-sm-1 control-label">Sexo</label>
                        <div class="col-sm-4">
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="M"> Masculino
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="F"> Feminino
                            </label>
                            <span class="glyphicon form-control-feedback" id="icon-sexo" aria-hidden="true"></span>
                            <label class="control-label" id="label-sexo"></label>
                        </div>
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
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">CEP</label>
                    <div class="col-sm-4">
                        <input type="text" name="cep" id="cep" class="form-control">
                    </div>
                    <label class="col-sm-2 control-label">Logradouro</label>
                    <div class="col-sm-4">
                        <input type="text" id="logradouro" name="logradouro" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Número</label>
                    <div class="col-sm-1">
                        <input type="text" class="form-control" name="numero" id="numero">
                    </div>
                    <label class="col-sm-2 control-label">Complemento</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="complemento" id="complemento">
                    </div>
                    <label class="col-sm-2 control-label">Bairro</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="bairro" name="bairro">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Estado</label>
                    <div class="col-sm-5">
                        <select id="estado" class="form-control">
                            <option value="">Selecione um estado</option>
                            <?php
                            foreach ($estados as $estado){
                                echo '<option value="'.$estado["siglaUF"].'">'.$estado["siglaUF"].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <label class="col-sm-1 control-label">Cidade</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="cidade" id="cidade">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" id="btnCadCliente" class="btn btn-default">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
