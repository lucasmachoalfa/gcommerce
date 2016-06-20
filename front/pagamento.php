<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="css/pagamento.css">    
        <script src="js/jquery.js"></script>
        <script src="js/jquery.maskedinput.js"></script>
        <script src="js/funcoes.js"></script>
        <script src="js/pagamento.js"></script>
        <script src="js/endereco.js"></script>
        <script src="http://jquerymodal.com/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
        <link rel="stylesheet" href="http://jquerymodal.com/jquery.modal.css" type="text/css" media="screen" />
        <style>
            .modal{
                width: 54%;
                height: auto;
                position: absolute;
                top: 50%;
                left: 50%;
                margin-top: -200px;
                margin-left: -27%;
                display: none;
            }
            .modal h2{
                display: block;
                padding: 15px 0 15px 15px;
                background: #5a2d82;
                color: #fff;
                text-transform: uppercase;
                margin: 0;
            }
            .modal a{
                display: block;
                padding: 10px;
                text-align: center;
                color: #0e92c4;
            }
            .modal p{
                padding-left: 15px;
                margin: 0;
            }

            .endereco{
                width: 100%;
                height: auto; 
                float: left;
            }
            .i-endereco{
                width: 22%;
                height: auto;
                float: left; 
                margin-left: 15px;
                margin-top: 40px;
            }
            .i-endereco p{
                margin: 0;
                padding: 0;
            }
            .i-endereco span{
                font-style: italic;
                font-weight: bold;
            }
            .i-endereco a{
                display: inline-block;
                margin: 0;
                padding: 0;
            }
            .i-endereco .btn-end{
                text-transform: uppercase;
                border: none;
                padding: 5px 10px;
                border-radius: 3px;
                margin-top: 10px;
                color: #fff;
                background: #5a2d82;
            }
            /*            .fechar{
                            background: url("img/icon.png") no-repeat 0 0;
                        }
            .modal .fechar{
                            width: 10px;
                            height: 20px;
                            position: absolute;
                            right: 15px;
                            top: 15px;
                        }
            */
        </style>
    </head>
    <body>
        <div class="container">
            <header id="topo">
                <div id="logo">
                    LOGO
                </div>
            </header>
            <div class="modal" id="altEndereco"></div>
            <div class="modal" id="cadEndereco">
                <h2>Cadastrar Endereço</h2>

                <div class="endereco">
                    <form>
                        <fieldset>
                            <label>Nome</label>
                            <input type="text" name="nomeIdentificadorForm" id="nomeIdentificadorForm" />
                        </fieldset>
                        <fieldset>
                            <label>CEP</label>
                            <input type="text" name="cepForm" id="cepForm" />
                        </fieldset>
                        <fieldset>
                            <label>Estado</label>
                            <select name="estadoForm" id="estadoForm">
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
                            <select name="cidadeForm" id="cidadeForm"></select>
                        </fieldset>
                        <fieldset>
                            <label>Bairro</label>
                            <input type="text" name="bairroForm" id="bairroForm" />
                        </fieldset>
                        <fieldset>
                            <label>Logradouro</label>
                            <input type="text" name="logradouroForm" id="logradouroForm" />
                        </fieldset>
                        <fieldset>
                            <label>Número</label>
                            <input type="text" name="numeroForm" id="numeroForm" />
                        </fieldset>
                        <fieldset>
                            <label>Complemento</label>
                            <input type="text" name="complementoForm" id="complementoForm" />
                        </fieldset>
                        <input type="button" id="btnCadEnderecoCheckout" value="Cadastrar" /><br />
                        <span id="spanCadastro" class="error"></span>
                    </form>
                </div>
            </div>

            <div class="modal" id="listaEnderecos">
                <!--<a href="" class="fechar"></a>-->
                <h2>endereços cadastrados</h2>
                <a href="#cadEndereco" rel="modal:open">Cadastrar outro endereço</a>

                <div class="endereco" id="listaEnderecosCliente"></div>
            </div> 
            <div class="pagamento">
                <h2>pagamento</h2>
                <h3>qual tipo de entrega você deseja?</h3>

                <div class="carrinho">
                    <p>vendido e enviado por: <span>Trendy Club</span></p>   
                    <div class="produto" id="pagamento_listaProdutosDetalhes">

                    </div>

                    <div class="frete" id="listaFreteAjax"> 
                        
                    </div>
                </div>

                <h3>pague com cartão de crédito</h3>
                <form action="form_pagamento">

                </form>
            </div>

            <div class="resumo-pedido">
                <h2>resumo do pedido</h2>

                <div class="i-resumo-pedido">
                    <div class="col70">
                        <strong>Entrega</strong><br>
                        <br>
                        <div id="listaEnderecoSelecionadoAjax"></div>
                    </div>
                    <div class="col30">
                        <a <a href="#listaEnderecos" id="abreModalEnderecos" >Entregar em outro endereço</a>
                    </div>
                </div>

                <div id="resumoPedido_produtos"></div>
                
            </div>
        </div>    
    </body>
</html>