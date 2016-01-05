<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php'; ?>
        <script src="js/bootstrapValidator.min.js"></script>
        <link href="css/bootstrapValidator.min.css" rel="stylesheet" />
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>

        <div class="container">
            <h3 class="text-center">Cadastro de cliente</h3>
            <hr>
            <form id="defaultForm" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-4">
                        <input type="password" id="senha" name="senha" class="form-control">
                    </div>
                    <label class="col-sm-2 control-label">Confirmar senha</label>
                    <div class="col-sm-4">
                        <input type="password" id="senhaN" name="senhaN" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nome completo</label>
                    <div class="col-sm-10">
                        <input type="text" id="nome" name="nome" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Telefone</label>
                    <div class="col-sm-5">
                        <input type="text" name="telefone" id="telefone" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label">CPF</label>
                    <div class="col-sm-4">
                        <input type="text" id="cpf" name="cpf" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Data de Nascimento</label>
                    <div class="col-sm-5">
                        <input type="text" name="dataNascimento" id="dataNascimento" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label">Sexo</label>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="M"> Masculino
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="F"> Feminino
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

        <script type="text/javascript">
            $(document).ready(function () {
                $('#defaultForm').bootstrapValidator({
                    feedbackIcons: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'O campo EMAIL é obrigatório'
                                },
                                emailAddress: {
                                    message: 'o campo EMAIL deve ser um email válido'
                                }
                            }
                        },
                        senha: {
                            validators: {
                                notEmpty: {
                                    message: 'O campo SENHA é obrigatório'
                                }

                            }
                        },
                        senhaN: {
                            validators: {
                                identical: {
                                    field: 'senha',
                                    message: 'as senhas não coincidem'
                                }
                            }
                        },
                        nome: {
                            validators: {
                                notEmpty: {
                                    message: 'O campo NOME é obrigatório'
                                }
                            }
                        },
                        telefone:{
                            validators:{
                                notEmpty:{
                                    message: "O campo TELEFONE é obrigatório"
                                }
                            }
                        },
                        cpf:{
                            validators:{
                                notEmpty:{
                                    message: "O campo CPF é obrigatório"
                                }
                            }
                        },
                        dataNascimento:{
                            validators:{
                                notEmpty:{
                                    message: "O campo DATA DE NASCIMENTO é obrigatório"
                                }
                            }
                        }
                    }
                })
                        .on('error.field.bv', function (e, data) {
                            console.log('error.field.bv -->', data);
                        })
                        .on('status.field.bv', function (e, data) {
                            console.log('status.field.bv -->', data);

                            var $form = $(e.target);
                            // I don't want to add has-success class to valid field container
//                            data.element.parents('.form-group').removeClass('has-success');

                            // I want to enable the submit button all the time
//                            $form.data('defaultForm').disableSubmitButtons(false);
                        });
            });
        </script>
        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
