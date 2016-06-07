<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Esqueleto Loja Virtual</title>
        <?php include_once './includes/head.php'; ?>
        <script src="js/funcoes.js"></script>
        <script src="js/jquery.maskedinput.js"></script>
        <script src="js/clientes.js"></script>

        <style>
            #login{
                margin-left: 10%;
                border: 1px black dashed;
                min-height: 300px;
                width: 50%;
                float: right;
            }
            
            #cadastro{
                float: left;
                width: 40%;
            }
        </style>
    </head>
    <body>
        <?php include_once './includes/header.php'; ?>

        <div class="container">
            <div class="carrinho-de-compras">
                <h1 style="text-align: center;">Carrinho de compras</h1>

                <section id="cadastro">
                    <form id="frmCadCliente">
                        <fieldset>
                            <label>Nome:</label>
                            <input type="text" name="nome" id="nome" />
                        </fieldset>
                        <fieldset>
                            <label>Email:</label>
                            <input type="text" name="email" id="email" />
                        </fieldset>
                        <fieldset>
                            <label>Telefone:</label>
                            <input type="text" name="telefone" id="telefone" />
                        </fieldset>
                        <fieldset>
                            <label>Senha:</label>
                            <input type="password" name="senha" id="senha" />
                        </fieldset>
                        <fieldset>
                            <label>Confirmar Senha:</label>
                            <input type="password" name="senhaN" id="senhaN" />
                        </fieldset>
                        <fieldset>
                            <label>Cpf:</label>
                            <input type="text" name="cpf" id="cpf" />
                        </fieldset>
                        <fieldset>
                            <label>Data de Nascimento:</label>
                            <input type="date" name="dataNascimento" id="dataNascimento" />
                        </fieldset>
                        <fieldset>
                            <label>Sexo:</label>
                            <input type="radio" name="sexo" value="M" id="sexo_m"/> <label for="sexo_m">M</label>
                            <input type="radio" name="sexo" value="F" id="sexo_f"/> <label for="sexo_f">F</label>
                        </fieldset>
                        <h3>Endereço</h3>
                        <fieldset>
                            <label>Nome</label>
                            <input type="text" name="nomeIdentificador" id="nomeIdentificador" />
                        </fieldset>
                        <fieldset>
                            <label>CEP</label>
                            <input type="text" name="cep" id="cep" />
                        </fieldset>
                        <fieldset>
                            <label>Estado</label>
                            <select name="estado" id="estado">
                                <?php
                                require_once 'model/enderecoDao.php';
                                $estados = $objEnderecoDao->listaEstados();

                                foreach ($estados as $estado) {
                                    echo '<option value="' . $estado["siglaUF"] . '">' . $estado["siglaUF"] . '</option>';
                                }
                                ?>
                            </select>
                        </fieldset>
                        <fieldset>
                            <label>Cidade</label>
                            <select name="cidade" id="cidade"></select>
                        </fieldset>
                        <fieldset>
                            <label>Bairro</label>
                            <input type="text" name="bairro" id="bairro" />
                        </fieldset>
                        <fieldset>
                            <label>Logradouro</label>
                            <input type="text" name="logradouro" id="logradouro" />
                        </fieldset>
                        <fieldset>
                            <label>Número</label>
                            <input type="text" name="numero" id="numero" />
                        </fieldset>
                        <fieldset>
                            <label>Complemento</label>
                            <input type="text" name="complemento" id="complemento" />
                        </fieldset>
                        <fieldset>
                            <input type="button" id="btnCadCliente" value="Cadastrar" /><br />
                            <span id="spanCadastro" class="error"></span>
                        </fieldset>
                    </form>
                </section>
                <section id="login">
                    <form id="frmLoginCliente">
                        <fieldset>
                            <label for="emailLogin">Email:</label>
                            <input type="text" id="emailLogin" />
                        </fieldset>
                        <fieldset>
                            <label for="senhaLogin">Senha:</label>
                            <input type="password" id="senhaLogin" />
                        </fieldset>
                        <input type="button" value="Login" id="btnLoginCliente" /><br />
                        <span id="spanLogin" class="error"></span>
                    </form>
                </section>


            </div>
        </div>

    </body>
</html>
