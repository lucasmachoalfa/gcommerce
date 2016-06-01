<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Esqueleto Loja Virtual</title>
        <?php include_once './includes/head.php'; ?>
        <script src="js/funcoes.js"></script>
        <script src="js/jquery.maskedinput.js"></script>
        <script src="js/clientes.js"></script>
    </head>
    <body>
        <?php include_once './includes/header.php'; ?>

        <div class="container">
            <div class="carrinho-de-compras">
                <h1 style="text-align: center;">Carrinho de compras</h1>

                <section id="login"></section>
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
                            <label>Cpf:</label>
                            <input type="text" name="cpf" id="cpf" />
                        </fieldset>
                        <fieldset>
                            <label>Sexo:</label>
                            <input type="date" name="dataNascimento" id="dataNascimento" />
                        </fieldset>
                        <fieldset>
                            <label>Sexo:</label>
                            <input type="radio" name="sexo" value="m" id="sexo_m"/> <label for="sexo_m">M</label>
                            <input type="radio" name="sexo" value="f" id="sexo_f"/> <label for="sexo_f">F</label>
                        </fieldset>
                    </form>
                </section>


            </div>
        </div>

    </body>
</html>
