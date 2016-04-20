<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php'; ?>        
        <style>
            /*.option-form{*/
            .buffer-top-sm{
                border: 1px solid #dfdfdf;
                margin-bottom: 10px;
                padding: 5px;
                background: #fff;
            }
            .estampa{
                width: 40px;
                height: 40px;
                background-size: 40px 40px;                
                background-repeat: no-repeat;
            }
        </style>
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
                <div class="modal fade" id="modalOpcoes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Adicionar configuração - Carrinho abandonado</h4>
                            </div>
                            <div class="modal-body">
                                <?php
                                require_once 'listaOpcaoProdutoAjax.php';
                                ?>
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
                            <li role="presentation" class="active">
                                <a href="#detalhes" aria-controls="detalhes" role="tab" data-toggle="tab">Detalhes</a>
                            </li>
                            <li role="presentation">
                                <a href="#categorias" aria-controls="categorias" role="tab" data-toggle="tab">Categorias</a>
                            </li>
                            <li role="presentation">
                                <a href="#estoque" aria-controls="estoque" role="tab" data-toggle="tab">Estoque e Variações</a>
                            </li>
                            <li role="presentation">
                                <a href="#envio" aria-controls="envio" role="tab" data-toggle="tab">Envio</a>
                            </li>
                            <li role="presentation">
                                <a href="#seo" aria-controls="seo" role="tab" data-toggle="tab">SEO</a>
                            </li>
                            <li class="pull-right"><button type="button" class="btn btn-success">Salvar</button></li>
                        </ul>
                        <br>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="detalhes">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>Vendedor</label>
                                            <select name="vendedor" id="vendedor" class="form-control">
                                                <?php
                                                require_once './model/vendedoresDao.php';
                                                
                                                $vendedores = $objVendedorDao->listaVendedor();
                                                
                                                foreach($vendedores as $vendedor){
                                                    echo '<option value="'.$vendedor["idVendedor"].'">'.utf8_encode($vendedor["nome"]).'</option>';
                                                }
                                                ?>
                                            </select>
                                            <span class="help-block small">Exemplo: Tênis Zoom Fly Low, Camiseta Authentic</span>
                                        </div>
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
                                                    <?php
                                                    require_once 'model/categoriaDao.php';

                                                    $categorias = $objCategoriaDao->listaCategorias();
                                                    if (count($categorias) > 0) {
                                                        foreach ($categorias as $categoria) {
                                                            echo '
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" name="categoria" id="categoria-' . $categoria["idCategoria"] . '" value="' . $categoria["idCategoria"] . '">
                                                                    <label for="categoria-' . $categoria["idCategoria"] . '">' . utf8_encode($categoria["titulo"]) . '</label>
                                                                </label>
                                                            </li>
                                                        ';
                                                        }
                                                    } else {
                                                        echo 'clique <a href="categorias.php" target="_blank">aqui</a> para cadastrar categorias';
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="estoque">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>SEO</h4>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="sku">REF</label>
                                                <input type="text" name="sku"  class="form-control">
                                                <span class="help-block small">Identificador único para a organização de estoques.</span>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="track_stock">Gerenciar estoque </label>
                                                <select name="track_stock" class="form-control">
                                                    <option value="1">Sim</option>
                                                    <option value="0">Não</option>
                                                </select>
                                                <span class="help-block small">Quer que o sistema controle o nível de estoque?</span>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="fixed_quantity">Quantidade fixa. </label>
                                                <select name="fixed_quantity" class="form-control">
                                                    <option value="1">Sim</option>
                                                    <option value="0" selected="selected">Não</option>
                                                </select>
                                                <span class="help-block small">Proibir o cliente de adicionar mais de uma unidade deste produto no carrinho?</span>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="quantity">Quantidade </label>
                                                <input type="text" name="quantity" value="" class="form-control">
                                                <span class="help-block" style="display:none;">Quantidade de todas as variações</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Variações</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Escolhe as opções</label>
                                                    <div class="well well-inverse buffer-bottom-sm form-inline">
                                                        <label class="checkbox buffer-right-md">
                                                            <input name="product_options[]" type="checkbox" value="4166" class="option-checkbox"> Cor
                                                        </label>
                                                        <label class="checkbox buffer-right-md">
                                                            <input name="product_options[]" type="checkbox" value="4167" class="option-checkbox"> Tamanho
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalOpcoes">Adicionar/editar opções</button>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Adicione as variações</label>
                                                    <div class="addVariacoes">
                                                        <div class="row thead">
                                                            <div class="col-sm-2 col-sm-offset-1">
                                                                Opções
                                                            </div>
                                                            <div class="col-sm-2">
                                                                REF
                                                            </div>
                                                            <div class="col-sm-2">
                                                                Quantidade
                                                            </div>
                                                            <div class="col-sm-2">
                                                                Preço
                                                            </div>
                                                            <div class="col-sm-2">
                                                                Peso
                                                            </div>
                                                        </div>
                                                        <!-- DUPLICAR DAQUI -->
                                                        <div class="row">
                                                            <div class="col-sm-1">
                                                                <i class="glyphicon glyphicon-resize-vertical" style="font-size: 16px;"></i>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <select class="form-control">
                                                                    <option>- Escolhe Cor -</option>
                                                                </select><br>
                                                                <select class="form-control">
                                                                    <option>- Escolhe Tamanho -</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <input type="text" class="form-control" />
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <input type="text" class="form-control" />
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <input type="text" class="form-control" />
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <input type="text" class="form-control" />
                                                            </div>
                                                            <div class="col-sm-1 text-right">
                                                                <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                                                            </div>
                                                        </div>
                                                        <!-- ATÉ AQUI -->
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary">Adicionar variação</button>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="envio">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="shippable">Tipo de Produto</label>
                                        <select name="shippable" class="form-control">
                                            <option value="1">Entregável</option>
                                            <option value="0">Não Entregável (Ex. Serviços)</option>
                                        </select>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="processing_days">Dias para processamento</label>
                                        <input type="text" name="processing_days" value="" class="form-control">
                                        <p class="help-block small">Este valor será somado ao prazo de entrega. Se o pedido tiver mais de um produto, o que tiver maior prazo extra que será somado ao total do pedido.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="weight">Peso</label>
                                        <div class="input-group">
                                            <input type="text" name="weight" value="" class="form-control">
                                            <span class="input-group-addon">KG</span>
                                        </div>
                                        <p class="help-block small">Este valor deve ser separado por vírgula e é muito importante para o cálculo preciso do frete.</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="width">Comprimento </label>
                                        <div class="input-group">
                                            <input type="text" name="width" value="" class="form-control">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-resize-horizontal"></i> CM</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="depth">Largura</label>
                                        <div class="input-group">
                                            <input type="text" name="depth" value="" class="form-control">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-resize-full"></i> CM</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="height">Altura</label>
                                        <div class="input-group">
                                            <input type="text" name="height" value="" class="form-control">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-resize-vertical"></i> CM</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
