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
                                <h4>Google Analytics</h4>
                                <p class="small">Recomendamos que você utilize o Google Analytics para medir efetivamente suas campanhas e o tráfego da sua loja. Ainda não possui uma conta? Basta aprender a criar uma conta do Google Analytics e digitar o seu tracking code aqui.</p>
                                <div class="well well-sm">
                                    <label>Código de Google Analytics</label>
                                    <textarea class="form-control" rows="4" maxlength="250" placeholder="Insira seu código do Google Analytics aqui"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <h4>Código de Conversão</h4>
                                <p class="small">Aqui, você pode inserir os códigos de conversão que deseja que apareçam na página de confirmação e agradecimento pela compra.</p>
                                <div class="well well-sm">
                                    <label>Códigos de conversão para a página de finalização de compra</label>
                                    <textarea class="form-control" rows="4" maxlength="250"></textarea>
                                    <br>
                                    <label>Códigos de conversão para a página de confirmação de compra</label>
                                    <textarea class="form-control" rows="4" maxlength="250"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <h4>Verificação de propriedade da sua loja no Google</h4>
                                <div class="well well-sm">
                                    <label>Meta Tag do Google</label>
                                    <input type="text" class="form-control">
                                    <br>
                                    <p class="help-inline">
                                        Exemplo: &lt;meta name="google-site-verification" content="conteúdo" /&gt;
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <h4>Verificação de propriedade da sua loja no Bing </h4>
                                <div class="well well-sm">
                                    <label>Meta Tag do Bing</label>
                                    <input type="text" class="form-control">
                                    <br>
                                    <p class="help-inline">
                                        Exemplo: &lt;meta name="msvalidate.01" content="conteúdo" /&gt;
                                    </p>
                                </div>
                            </div>
                        </div>                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                <h4>Códigos de rastreamento</h4>
                                <p class="small">Caso você esteja utilizando algum software que peça para você inserir um código no seu site, este é o espaço adequado para adicioná-lo.</p>
                                <div class="well well-sm">
                                    <textarea class="form-control" rows="4" maxlength="250"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <h4>EBIT</h4>
                                <p class="small">
                                   O código do seu site fica no final do código para o banner. Caso tenha dúvidas, confira o nosso tutorial.
                                </p>
                                <div class="well well-sm">
                                    <label>Conta EBIT</label>
                                    <input type="text" class="form-control">
                                    <p class="help-inline">
                                        Exemplo: "https://survey.ebit.com.br/survey/first?storeId=<strong>1157000</strong>" 
                                    </p>
                                    <br>
                                    <label>URL EBIT</label>
                                    <input type="text" class="form-control">
                                    <p class="help-inline">
                                        Exemplo: "http://www.ebit.com.br/#<strong>nome-empresa</strong>" Sua URL será <strong>nome-empresa</strong>.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-left">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Salvar alterações</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
