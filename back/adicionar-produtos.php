<?php

function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false) {
    $lmin = 'abcdefghijklmnopqrstuvwxyz';
    $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $num = '1234567890';
    $simb = '!@#$%*-';
    $retorno = '';
    $caracteres = '';
    $caracteres .= $lmin;
    if ($maiusculas)
        $caracteres .= $lmai;
    if ($numeros)
        $caracteres .= $num;
    if ($simbolos)
        $caracteres .= $simb;
    $len = strlen($caracteres);
    for ($n = 1; $n <= $tamanho; $n++) {
        $rand = mt_rand(1, $len);
        $retorno .= $caracteres[$rand - 1];
    }
    return $retorno;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php'; ?>        
        <script src="plugin/bootstrap-colorpicker-master/dist/js/bootstrap-colorpicker.min.js"></script>
        <script src="js/produto.js"></script>
        <script src="js/opcoesVariacoes.js"></script>

        <link href="plugin/bootstrap-colorpicker-master/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="plugin/bootstrap-colorpicker-master/docs/assets/main.css" rel="stylesheet">

        <link href="plugin/fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
        <script src="plugin/fileinput/js/fileinput.min.js" type="text/javascript"></script>

        <link rel="stylesheet" href="css/jquery-ui.theme-smoothness.css">
        <script src="js/jquery-ui.js"></script>
        <style>
            /* highlight results */
            .ui-autocomplete span.hl_results {
                background-color: #ffff66;
            }
            /* scroll results */
            .ui-autocomplete {
                max-height: 250px;
                overflow-y: auto;
                /* prevent horizontal scrollbar */
                overflow-x: hidden;
                /* add padding for vertical scrollbar */
                padding-right: 5px;
            }
            .ui-autocomplete li {
                font-size: 16px;
            }
            /* IE 6 doesn't support max-height
            * we use height instead, but this forces the menu to always be this tall
            */
            * html .ui-autocomplete {
                height: 100px;
            }
            ul.ui-autocomplete.ui-menu {
                z-index: 999999;
            }

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

            .inl-bl {
                display: inline-block;
            }

            .colorpicker-component{
                width:149px;
            }

            .escondeVariacao{display: none!important; }

            #imagePreview .image_plug{
                height: auto;
                float: left;
                margin-bottom: 5px;
                margin-right: 5px;
                width: auto;
                padding: 5px;
                background: #fff;
            }
            #imagePreview .image_plug > img{
                display: block;
                height: 120px;
                width: auto;
                margin-bottom: 10px;
                opacity: 0.7;
            }
            #imagePreview .image_plug > img:hover{
                opacity: 1;
            }

            .file-input .file-preview, .input-group-btn button[type="button"],.input-group-btn button[type="submit"]{
                display: none!important;
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
                                <h4 class="modal-title" id="myModalLabel">Adicionar configuração - Opções e variações</h4>
                            </div>
                            <div class="modal-body">
                                <?php
                                require_once 'listaOpcaoProdutoAjax.php';
                                ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="carregando" style="display:none">Carregando...</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div>
                                            <table id="novasOpcoes" class="table ui-sortable-handle">

                                            </table>
                                        </div>
                                        <a id="dLabel" class="btn btn-info" href="javascript:criarOpcoes()" role="button">
                                            Adicionar
                                        </a>
                                    </div>
                                </div>
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
                            <li class="pull-right"><button type="button" id="btnCadProduto" class="btn btn-success">Salvar</button></li>
                        </ul>
                        <br>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="detalhes">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group" id="form-group-idVendedor">
                                            <label>Vendedor</label>
                                            <select name="idVendedor" id="idVendedor" class="form-control">
                                                <option value="">Selecione...</option>
                                                <?php
                                                require_once './model/vendedorDao.php';

                                                $vendedores = $objVendedorDao->listaVendedores();

                                                foreach ($vendedores as $vendedor) {
                                                    echo '<option value="' . $vendedor["idVendedor"] . '">' . utf8_encode($vendedor["nome"]) . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <span class="glyphicon form-control-feedback" id="icon-idVendedor" aria-hidden="true"></span>
                                            <label class="control-label" id="label-idVendedor"></label>
                                        </div>
                                        <div class="form-group" id="form-group-nomeProduto">
                                            <label>Nome</label>
                                            <input type="text" name="nomeProduto" id="nomeProduto" class="form-control">
                                            <span class="help-block small">Exemplo: Tênis Zoom Fly Low, Camiseta Authentic</span>
                                            <span class="glyphicon form-control-feedback" id="icon-nomeProduto" aria-hidden="true"></span>
                                            <label class="control-label" id="label-nomeProduto"></label>
                                        </div>

                                        <div class="form-group">
                                            <label>Resumo</label>
                                            <textarea name="resumoProduto" id="resumoProduto" cols="40" rows="3" class="form-control"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Vídeo URL</label>
                                            <input type="text" name="videoUrl" id="videoUrl" value="" class="form-control">
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
                                                    <div class="col-md-6" id="form-group-precoNormal">
                                                        <label for="precoNormal">Preço normal</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">R$</span>
                                                            <input type="text" name="precoNormal" id="precoNormal" value="" class="form-control price">
                                                        </div>
                                                        <span class="glyphicon form-control-feedback" id="icon-precoNormal" aria-hidden="true"></span>
                                                        <label class="control-label" id="label-precoNormal"></label>
                                                    </div>
                                                    <div class="col-md-6" id="form-group-precoPromocional">
                                                        <label for="price">Promocional</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">R$</span>
                                                            <input type="text" name="precoPromocional" id="precoPromocional" value="" class="form-control price">
                                                        </div>
                                                        <span class="glyphicon form-control-feedback" id="icon-precoPromocional" aria-hidden="true"></span>
                                                        <label class="control-label" id="label-precoPromocional"></label>
                                                    </div>
                                                </div>

                                                <div class="currency currency-BRL">
                                                    <label for="maximoParcelas">Máximo de parcelas</label>
                                                    <div id="form-group-maximoParcelas">

                                                        <div class="input-group group-with-calculation">
                                                            <span class="input-group-addon">№</span>
                                                            <input type="text" name="maximoParcelas" id="maximoParcelas" value="0" class="form-control">
                                                            <span class="input-group-addon">= 6 x R$ 0,00</span>
                                                            <span class="glyphicon form-control-feedback" id="icon-maximoParcelas" aria-hidden="true"></span>
                                                        </div>
                                                        <label class="control-label" id="label-maximoParcelas"></label>
                                                    </div>

                                                    <div id="form-group-custoProduto">
                                                        <label for="custoProduto">Custo do produto</label>
                                                        <div class="input-group group-with-calculation">
                                                            <span class="input-group-addon">R$</span>
                                                            <input type="text" name="custoProduto" id="custoProduto" value="" class="form-control">
                                                            <span class="glyphicon form-control-feedback" id="icon-custoProduto" aria-hidden="true"></span>
                                                        </div>
                                                        <label class="control-label" id="label-custoProduto"></label>
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
                                            <textarea name="descricaoProduto" id="descricaoProduto" cols="40" rows="3" class="form-control"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Produtos relacionados</label>
                                            <input type="text" class="form-control" placeholder="Termo de Busca" id="buscaProdutoInput">
                                            <input type="hidden" id="produtoInput">
                                        </div>

                                        <div class="form-group">
                                            <label>Imagem</label>
                                            <div class="well">
                                                <div class="row" style="margin-bottom: 30px;">
                                                    <div class="col-xs-12" id="imagePreview"></div>                                                    
                                                </div>

                                                <div class="row">
                                                    <div class="col-xs-12" id="form-group-foto">
                                                        <input id="foto" name="foto[]" type="file" multiple class="file">
                                                        <span class="glyphicon form-control-feedback" id="icon-foto" aria-hidden="true"></span>
                                                        <label class="control-label" id="label-foto"></label>
                                                    </div>
                                                </div>
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
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="referenciaProduto">REF</label>
                                                <input type="text" name="referenciaProduto" id="referenciaProduto" class="form-control" value="<?php echo geraSenha(6, false); ?>">
                                                <span class="help-block small">Identificador único para a organização de estoques.</span>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="gerenciarEstoque">Gerenciar estoque </label>
                                                <select name="gerenciarEstoque" id="gerenciarEstoque" class="form-control">
                                                    <option value="1">Sim</option>
                                                    <option value="0">Não</option>
                                                </select>
                                                <span class="help-block small">Quer que o sistema controle o nível de estoque?</span>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="quantidadeFixa">Quantidade fixa. </label>
                                                <select name="quantidadeFixa" id="quantidadeFixa" class="form-control">
                                                    <option value="1">Sim</option>
                                                    <option value="0" selected="selected">Não</option>
                                                </select>
                                                <span class="help-block small">Proibir o cliente de adicionar mais de uma unidade deste produto no carrinho?</span>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="quantidade">Quantidade </label>
                                                <input type="text" name="quantidade" id="quantidade" value="" class="form-control">
                                                <span class="help-block" style="display:none;">Quantidade de todas as variações</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Variações</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Escolha as opções</label>
                                                    <div class="well well-inverse buffer-bottom-sm form-inline" id="listaOpcoesCheckbox">
                                                        <?php require_once 'listaOpcoesCheckboxAjax.php'; ?>
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
                                                        <div id="variacoesProdutos">
                                                        </div>
                                                        <!-- ATÉ AQUI -->
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-primary" onclick="criaVariacoesProdutos()">Adicionar variação</button>
                                                    </div>
                                                </div>  
                                            </div>
                                        </div>                                    
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="envio">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="tipoProduto">Tipo de Produto</label>
                                        <select name="tipoProduto" id="tipoProduto" class="form-control">
                                            <option value="1">Entregável</option>
                                            <option value="0">Não Entregável (Ex. Serviços)</option>
                                        </select>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="diasProcessamento">Dias para processamento</label>
                                        <input type="text" name="diasProcessamento" id="diasProcessamento" value="" class="form-control">
                                        <p class="help-block small">Este valor será somado ao prazo de entrega. Se o pedido tiver mais de um produto, o que tiver maior prazo extra que será somado ao total do pedido.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="pesoProduto">Peso</label>
                                        <div class="input-group">
                                            <input type="text" name="pesoProduto" id="pesoProduto" value="" class="form-control">
                                            <span class="input-group-addon">KG</span>
                                        </div>
                                        <p class="help-block small">Este valor deve ser separado por vírgula e é muito importante para o cálculo preciso do frete.</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="comprimentoProduto">Comprimento </label>
                                        <div class="input-group">
                                            <input type="text" name="comprimentoProduto" id="comprimentoProduto" value="" class="form-control">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-resize-horizontal"></i> CM</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="larguraProduto">Largura</label>
                                        <div class="input-group">
                                            <input type="text" name="larguraProduto" id="larguraProduto" value="" class="form-control">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-resize-full"></i> CM</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="alturaProduto">Altura</label>
                                        <div class="input-group">
                                            <input type="text" name="alturaProduto" id="alturaProduto" value="" class="form-control">
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
                                                <input type="text" name="urlSeo" id="urlSeo" value="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Título da página</label>
                                                <input type="text" name="tituloSeo" id="tituloSeo" value="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Descrição da página</label>
                                                <textarea class="form-control" name="descricaoSeo" id="descricaoSeo" rows="5"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Palavras-chave separadas por vírgula</label>
                                                <input type="text" name="palavrasChaveSeo" id="palavrasChaveSeo" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="display:none" id="esconde"></div>
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
