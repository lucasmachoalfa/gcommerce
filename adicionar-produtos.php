<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php'; ?>        
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>
        <div class="container">
            <h3 class="text-center">Adicionar produtos</h3>
            <hr>
            <div class="row">
                <div class="col-xs-12 text-center">
                    <!--<a href="adiconarCarrinhoConfig.php" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal">Adicionar configuração</a>-->
                    <!--<button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal">Adicionar configuração</button>-->
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Adicionar configuração - Carrinho abandonado</h4>
                            </div>
                            <div class="modal-body">
                                <p>...</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-lg-12">
                    <div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#detalhes" aria-controls="detalhes" role="tab" data-toggle="tab">Detalhes</a></li>
                            <li role="presentation"><a href="#categorias" aria-controls="categorias" role="tab" data-toggle="tab">Categorias</a></li>
                            <li role="presentation"><a href="#estoque" aria-controls="estoque" role="tab" data-toggle="tab">Estoque e Variações</a></li>
                            <li role="presentation"><a href="#envio" aria-controls="envio" role="tab" data-toggle="tab">Envio</a></li>
                            <li role="presentation"><a href="#seo" aria-controls="seo" role="tab" data-toggle="tab">SEO</a></li>
                            <li class="pull-right"><button type="button" class="btn btn-success">Salvar</button></li>
                        </ul>
                        <br>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="detalhes">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input type="text" name="name" value="" class="form-control">
                                            <span class="help-block small">Exemplo: Tênis Zoom Fly Low, Camiseta Authentic</span>
                                        </div>

                                        <div class="form-group">
                                            <label>Resumo</label>
                                            <textarea name="excerpt" cols="40" rows="3" class="form-control"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Vídeo URL</label>
                                            <input type="text" name="video" value="" class="form-control">
                                            <span class="help-block small">Exemplo: http://player.vimeo.com/video/50536560</span>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Preços</h3>
                                            </div>
                                            <div class="panel-body form-group-custom">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="price">Preço normal</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">R$</span>
                                                            <input type="text" name="price" value="" class="form-control price">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="price">Promocional</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">R$</span>
                                                            <input type="text" name="price" value="" class="form-control price">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="currency currency-BRL">
                                                    <label for="installments">Máximo de parcelas</label>
                                                    <div class="input-group group-with-calculation">
                                                        <span class="input-group-addon">№</span>
                                                        <input type="text" name="installments" value="6" class="form-control">
                                                        <span class="input-group-addon">= 6 x R$ 0,00</span>
                                                    </div>

                                                    <label for="factory_price">Custo do produto</label>
                                                    <div class="input-group group-with-calculation">
                                                        <span class="input-group-addon">R$</span>
                                                        <input type="text" name="factory_price" value="" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Descrição completa</label>
                                            <textarea name="excerpt" cols="40" rows="3" class="form-control"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Produtos relacionados</label>
                                            <input type="text" name="video" value="" placeholder="Termo de Busca" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Imagem</label>
                                            <div class="well">
                                                AQUI ENTRA O PLUGIN DE UPLOAD DE IMAGENS
                                            </div>
                                        </div>
                                    </div>                                    
                                </div> 
                            </div>
                            <div role="tabpanel" class="tab-pane" id="categorias">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h4>Categorias</h4>
                                            <hr>
                                            <label>Selecione as categorias</label>
                                            <div class="well">
                                                <ul class="list-unstyled buffer-bottom-no">
                                                    <li><label><input type="checkbox" name="categories[]" value="73652">&nbsp;&nbsp;Camisas</label></li>
                                                    <li><label><input type="checkbox" name="categories[]" value="73653">&nbsp;&nbsp;Beachwear</label></li>
                                                    <li><label><input type="checkbox" name="categories[]" value="73654">&nbsp;&nbsp;Bonés</label></li>
                                                </ul>
                                            </div>
                                            <h4>Características</h4>
                                            <hr>
                                            <label>Tabela de tamanhos</label>
                                            <div class="well">
                                                <ul class="list-unstyled">
                                                    <li><label><input type="checkbox" name="categories[]" value="73652">&nbsp;&nbsp;Teste</label></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="estoque">3</div>
                            <div role="tabpanel" class="tab-pane" id="envio">4</div>
                            <div role="tabpanel" class="tab-pane" id="seo">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h4>SEO</h4>
                                            <hr>
                                            <div class="form-group">
                                                <label>URL da página</label>
                                                <input type="text" name="name" value="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Título da página</label>
                                                <input type="text" name="name" value="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Descrição da página</label>
                                                <textarea class="form-control" rows="5"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Palavras-chave separadas por vírgula</label>
                                                <input type="text" name="name" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
