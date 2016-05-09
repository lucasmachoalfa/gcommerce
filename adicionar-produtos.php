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

            .inl-bl {
                display: inline-block;
            }

            .colorpicker-component{
                width:149px;
            }

            .escondeVariacao{display: none!important; }
        </style>
        <script src="plugin/bootstrap-colorpicker-master/dist/js/bootstrap-colorpicker.min.js"></script>
        <script src="js/produto.js"></script>

        <link href="plugin/bootstrap-colorpicker-master/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="plugin/bootstrap-colorpicker-master/docs/assets/main.css" rel="stylesheet">
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
                                        <div class="form-group">
                                            <label>Vendedor</label>
                                            <select name="vendedor" id="vendedor" class="form-control">
                                                <option value="">Selecione...</option>
                                                <?php
                                                require_once './model/vendedorDao.php';

                                                $vendedores = $objVendedorDao->listaVendedores();

                                                foreach ($vendedores as $vendedor) {
                                                    echo '<option value="' . $vendedor["idVendedor"] . '">' . utf8_encode($vendedor["nome"]) . '</option>';
                                                }
                                                ?>
                                            </select>
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

            <div style="display:none" id="esconde"></div>
        </div>

        <?php include_once 'includes/footer.php'; ?>

        <script>
            i = 0;
            j = 0;
            foto = new Array();
            function apagaOpcao(id, novaOpcao) {
                if (typeof (novaOpcao) === 'undefined') {
                    $.post('control/opcaoControle.php', {idOpcao: id, opcao: 'excluirOpcao'},
                            function (r) {
                                console.log(r);
                                $("#opcao-" + id).fadeOut(400, function () {
                                    tr.remove();
                                });
                            });
                } else {
                    var tr = $(id).closest('tr');

                    tr.fadeOut(400, function () {
                        tr.remove();
                    });
                }
            }

            function alteraOpcao(id) {
                var titulo = $("#opcao-" + id + " input").val();

                $.post('control/opcaoControle.php', {idOpcao: id, titulo: titulo, opcao: 'alteraOpcao'},
                        function (r) {
                            console.log(r);
                        });
            }

            function cadastraOpcao(id) {
                var titulo = $("#" + id).val();

                if (titulo == '') {
                    validateBootstrap(id, 'VocÃƒÂª deve preencher o tÃƒÂ­tulo', 1);
                    //                    $("#" + id).focus();
                } else {
                    validateBootstrap(id, '', 0);
                    $.post('control/opcaoControle.php', {opcao: 'cadastrarOpcao', titulo: titulo},
                            function (r) {
                                console.log(r);
                                $("#" + id).attr('readonly', true);
                                $("#apaga-" + id).attr('disabled', true);
                                $("#apaga-" + id).removeAttr('onclick');
                                carrega();
                            });
                }

            }

            function criarOpcoes() {
                var tr = document.createElement('tr');
                tr.setAttribute("id", 'novaOpcao-' + i);
                var td = document.createElement('td');
                tr.appendChild(td);

                var div = document.createElement('div');
                var row = document.createElement('div');
                row.setAttribute("class", "row");

                var md1 = document.createElement('div');
                md1.setAttribute("class", "col-md-1");
                var colorPicker = document.createElement('a');
                colorPicker.setAttribute("class", "btn color-setting-btn pull-left colorpicker-element");
                md1.appendChild(colorPicker);
                row.appendChild(md1);

                var idInput = "titulo-" + i;
                var md6 = document.createElement('div');
                md6.setAttribute('class', "col-md-6");
                var formGroup = document.createElement('div');
                formGroup.setAttribute('class', 'form-group');
                formGroup.setAttribute('id', 'form-group-' + idInput);
                var input = document.createElement('input');
                input.setAttribute('class', "form-control translate");
                input.setAttribute('type', "text");
                input.setAttribute('placeholder', "Ex. cor, tamanho, ...");
                input.setAttribute('id', idInput);
                input.setAttribute('onblur', 'cadastraOpcao("' + idInput + '")');
                var spanErro = document.createElement('span');
                spanErro.setAttribute('class', "glyphicon form-control-feedback");
                spanErro.setAttribute('id', "icon-" + idInput);
                spanErro.setAttribute('aria-hidden', "true");
                var labelErro = document.createElement('label');
                labelErro.setAttribute('class', "control-label");
                labelErro.setAttribute('id', "label-" + idInput);
                formGroup.appendChild(input);
                formGroup.appendChild(spanErro);
                formGroup.appendChild(labelErro);

                md6.appendChild(formGroup);
                row.appendChild(md6);

                var md4 = document.createElement('div');
                md4.setAttribute('class', "col-md-4");
                row.appendChild(md4);

                var md1Btn = document.createElement('div');
                md1Btn.setAttribute('class', "col-md-1");
                var btnApagar = document.createElement('a');
                btnApagar.setAttribute('class', "btn btn-danger pull-right");
                btnApagar.setAttribute('href', "#");
                btnApagar.setAttribute('onclick', "apagaOpcao(this,1)");
                btnApagar.setAttribute('id', "apaga-" + idInput);
                var trash = document.createElement('i');
                trash.setAttribute('class', "glyphicon glyphicon-trash");
                btnApagar.appendChild(trash);
                md1Btn.appendChild(btnApagar);
                row.appendChild(md1Btn);

                div.appendChild(row);
                td.appendChild(div);
                $("#novasOpcoes").append(tr);

                i++;
            }

            function prepareUpload(event) {
                //        foto = event.target.files;
                var id = event.path[0].id;
                foto[id] = event.target.files[0];

                console.log(foto);
            }


            function cadastraVariacao(idOpcao, idVariacao) {
                var titulo = $("#input-titulo-" + idVariacao).val();
                var cor = $("#input-picker-" + idVariacao).val();
                var imagem = foto["input-imagem-" + idVariacao];
                var validTitulo = false;
                var validAtributo = false;

                if (titulo == '') {
                    validateBootstrap("input-titulo-" + idVariacao, 'Voce deve preencher o tÃ­tulo!', 1);

                    alert('Voce deve preencher o tÃ­tulo!');
                } else {
                    validateBootstrap("input-titulo-" + idVariacao, '', 0);
                    validTitulo = true;
                }

                if (cor != '' && (imagem != '' && typeof (imagem) != 'undefined')) {
                    validateBootstrap("input-imagem-" + idVariacao, 'Voce deve selecionar uma cor OU uma imagem', 1);
                    validateBootstrap("input-picker-" + idVariacao, '', 1);
                    alert('Voce deve selecionar uma cor OU uma imagem!');
                } else {
                    validateBootstrap("input-imagem-" + idVariacao, '', 0);
                    validateBootstrap("input-picker-" + idVariacao, '', 0);
                    validAtributo = true;
                }


                if (validAtributo && validTitulo) {
                    var data = new FormData();
                    data.append('opcao', 'cadastraVariacao');
                    data.append('titulo', titulo);
                    data.append('idOpcao', idOpcao);
                    data.append('cor', cor);
                    data.append('foto', imagem);

                    $.ajax({
                        url: 'control/opcaoControle.php',
                        method: 'POST',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: data,
                        success: function (r) {
                            console.log(r);
                            $("#option-form-" + idOpcao).load('listaVariacoesAjax.php?idOpcao=' + idOpcao);


                            $("#input-titulo-" + idVariacao).attr('readonly', true);
                            $("#input-picker-" + idVariacao).attr('readonly', true);
                            $("#input-imagem-" + idVariacao).attr('disabled', true);


                            $("#apaga-variacao-" + idVariacao).attr('disabled', true);
                            $("#apaga-variacao-" + idVariacao).removeAttr('onclick');
                        }
                    });
                }
            }

            function alteraVariacao(idVariacao) {

                var titulo = $("#input-variacao-titulo-" + idVariacao).val();
                //        var cor = $("#input-variacao-picker-" + idVariacao).val();
                //        var imagem = foto["input-variacao-imagem-" + idVariacao];
                var validTitulo = false;
                //        var validAtributo = false;

                if (titulo == '') {
                    validateBootstrap("input-titulo-" + idVariacao, 'Voce deve preencher o tÃ­tulo!', 1);

                    alert('Voce deve preencher o tÃ­tulo!');
                } else {
                    validateBootstrap("input-titulo-" + idVariacao, '', 0);
                    validTitulo = true;
                }

                //        if (cor != '' && (imagem != '' && typeof (imagem) != 'undefined')) {
                //            validateBootstrap("input-imagem-" + idVariacao, 'Voce deve selecionar uma cor OU uma imagem', 1);
                //            validateBootstrap("input-picker-" + idVariacao, '', 1);
                //            alert('nÃƒÂ£o pode!');
                //        } else {
                //            validateBootstrap("input-imagem-" + idVariacao, '', 0);
                //            validateBootstrap("input-picker-" + idVariacao, '', 0);
                //            validAtributo = true;
                //        }

                //        if (validAtributo && validTitulo) {
                if (validTitulo) {
                    var data = new FormData();
                    data.append('opcao', 'alteraVariacao');
                    data.append('titulo', titulo);
                    data.append('idVariacao', idVariacao);
                    //            data.append('cor', cor);
                    //            data.append('foto', imagem);

                    $.ajax({
                        url: 'control/opcaoControle.php',
                        method: 'POST',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: data,
                        success: function (r) {
                            console.log(r);
                        }
                    });
                }
            }

            function criarVariacao(idOpcao) {
                var row = document.createElement('div');
                row.setAttribute('class', 'row');
                row.setAttribute('id', 'row-variacao-' + j);
                var md1Atributo = document.createElement('div');
                md1Atributo.setAttribute('class', "col-md-3");

                var idCor = j;
                var cor = document.createElement('div');
                var inputPicker = document.createElement('input');
                inputPicker.setAttribute('class', 'form-control');
                inputPicker.setAttribute('type', 'text');
                inputPicker.setAttribute('id', 'input-picker-' + idCor);
                inputPicker.setAttribute('placeholder', 'cor');
                inputPicker.setAttribute('onfocus', 'adicionaColorPicker("' + idCor + '")');
                var arquivo = document.createElement('div');
                var btnArquivo = document.createElement('input');
                btnArquivo.setAttribute('type', 'file');
                btnArquivo.setAttribute('id', 'input-imagem-' + j);
                btnArquivo.setAttribute('name', 'input-imagem');
                btnArquivo.addEventListener("change", prepareUpload);

                cor.appendChild(inputPicker);
                arquivo.appendChild(btnArquivo)
                md1Atributo.appendChild(cor);
                md1Atributo.appendChild(arquivo);
                row.appendChild(md1Atributo);

                var idInput = 'input-titulo-' + j;
                var md9 = document.createElement('div');
                md9.setAttribute('class', "col-md-8");
                var inputTitulo = document.createElement('input');
                inputTitulo.setAttribute('class', "form-control translate");
                inputTitulo.setAttribute('type', "text");
                inputTitulo.setAttribute('id', idInput);
                inputTitulo.setAttribute('placeholder', 'Ex.: Azul, Branco, ...');
                inputTitulo.setAttribute('data-table', 'option_values');
                inputTitulo.setAttribute('onblur', 'cadastraVariacao(' + idOpcao + ',' + j + ')');
                md9.appendChild(inputTitulo);
                row.appendChild(md9);

                var md1Trash = document.createElement('div');
                md1Trash.setAttribute('class', 'col-md-1');
                var btnTrash = document.createElement('a');
                btnTrash.setAttribute('class', 'btn btn-danger pull-right');
                btnTrash.setAttribute('href', 'javascript:apagaVariacao("row-variacao-' + j + '",1)');
                btnTrash.setAttribute('id', 'apaga-variacao-' + j);
                var iTrash = document.createElement('i');
                iTrash.setAttribute('class', 'glyphicon glyphicon-trash');

                btnTrash.appendChild(iTrash);
                md1Trash.appendChild(btnTrash);
                row.appendChild(md1Trash);

                $("#option-form-novasVariacoes-" + idOpcao).append(row);
                j++;
            }

            function apagaVariacao(id, novaVariacao) {
                if (typeof (novaVariacao) === 'undefined') {
                    $.post('control/opcaoControle.php', {idVariacao: id, opcao: 'excluirVariacao'},
                            function (r) {
                                console.log(r);
                                var tr = $("#variacao-" + id).closest('div.row');
                                tr.fadeOut(400, function () {
                                    tr.remove();
                                });
                            });
                } else {
                    var tr = $("#" + id).closest('div.row');
                    tr.fadeOut(400, function () {
                        tr.remove();
                    });
                }
            }

            function abreVariacoes(id) {
                $("#variacoes-" + id).toggleClass('escondeVariacao');
            }



            function carrega() {
                $("#carregando").show();
                $("#listaOpcoes").html('');

                $("#listaOpcoes").load("listaOpcaoProdutoAjax.php", function () {
                    $("#carregando").hide();
                });
            }

            function adicionaColorPicker(id) {
                $("#input-picker-" + id).colorpicker({
                    format: 'hex'
                });
            }

            function criaVariacoesProdutos() {
                var idOpcoes = '';

                $("input[name='product_options']").each(function () {
                    if ($(this).is(':checked')) {
                        idOpcoes += $(this).val() + ',';
                    }
                });
                idOpcoes = idOpcoes.replace(/,+$/, '');

                if (idOpcoes != "") {
                    $("#esconde").load('listaVariacoesProdutosAjax.php?idOpcoes=' + idOpcoes, function () {

                        $("#variacoesProdutos").append($("#esconde").html());
                    });
                } else {
                    alert('Por favor, selecione pelo menos uma opção!');
                }
            }
            $(document).ready(function () {
                $("#modalOpcoes").on('hide.bs.modal', function () {
                    carrega();
                    $("#listaOpcoesCheckbox").load('listaOpcoesCheckboxAjax.php');
                });
            });
        </script>
    </body>
</html>
