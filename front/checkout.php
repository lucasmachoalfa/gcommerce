<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Esqueleto Loja Virtual</title>
        <?php include_once './includes/head.php'; ?>
    </head>
    <body>
        <?php include_once './includes/header.php'; ?>

        <div class="container">
            <div class="carrinho-de-compras">
                <h1 style="text-align: center;">Carrinho de compras</h1>

                <ul class="indice-carrinho">
                    <li class="produto">PRODUTO</li>
                    <li class="quantidade">QUANTIDADE</li>
                    <li class="preco">PREÇO</li>
                    <li class="subtotal">SUBTOTAL</li>
                </ul>

                <ul class="produto-linha">
                    <li class="produto">
                        <figure class="foto-produto-linha">
                            <img src="img/produtos/foto1.jpg" alt=""/>
                        </figure>
                        <div class="nome-produto">
                            <h2>Casaco Gato Loco</h2>
                        </div>
                    </li>
                    <li class="quantidade">
                        <form>
                            <input type="text"/>
                        </form>
                        <div class="botoes-quantidade">
                            <div class="mais">
                                <button>+</button>
                            </div>
                            <div class="menos">
                                <button>-</button>
                            </div>
                        </div>
                    </li>
                    <li class="preco">
                        R$19,90
                    </li>
                    <li class="subtotal">
                        R$89,90
                    </li>
                    <li class="excluir">
                        <a href="#">X</a>
                    </li>
                </ul>

                <ul class="total-produto">
                    <li class="subtotal">
                        <h3 style="font-weight: lighter;">Subtotal: R$300,00</h3>
                    </li>
                    <li class="total">
                        <h3 style="font-weight: bold;">Total: R$300,00</h3>
                    </li>
                </ul>

                <div class="calcular-frete">
                    <span>Digite aqui o seu CEP para calcular o frete:</span>
                    <input type="text" name="zipcode" class="shipping-zipcode" value="22270050">
                    <button class="button calculate-shipping-button">Calcular Frete</button>
                    <span class="loading" style="display: none;"><i class="fa fa-refresh fa-spin"></i></span>
                    <span class="invalid-zipcode" style="display: none;">O CEP está inválido.</span>
                </div>

                <ul class="lista-opcoes-frete">
                    <li>
                        <label for="shipping-1">
                            <input id="shipping-1" type="radio" name="opcao-frete" style="display:none">
                            <span class="shipping-option">
                                <img src="http://d26lpennugtm8s.cloudfront.net/assets/common/img/logos/shipping/br/correios/pac@2x.png">
                                Correios - PAC - 5 dias úteis - <strong>$53,76</strong>
                            </span>
                        </label>
                    </li>

                    <li>
                        <label for="shipping-2">
                            <input id="shipping-2" type="radio" name="opcao-frete" style="display:none">
                            <span class="shipping-option">
                                <img src="http://d26lpennugtm8s.cloudfront.net/assets/common/img/logos/shipping/br/correios/pac@2x.png">
                                Correios - PAC - 5 dias úteis - <strong>$53,76</strong>
                            </span>
                        </label>
                    </li>

                    <li>
                        <label for="shipping-3">
                            <input id="shipping-3" type="radio" name="opcao-frete" style="display:none">
                            <span class="shipping-option">
                                <img src="http://d26lpennugtm8s.cloudfront.net/assets/common/img/logos/shipping/br/correios/pac@2x.png">
                                Correios - PAC - 5 dias úteis - <strong>$53,76</strong>
                            </span>
                        </label>
                    </li>
                </ul>

                <div class="botoes-finais">
                    <div class="continuar">
                        <a href="#">
                            CONTINUAR COMPRANDO
                        </a>
                    </div>
                    <div class="finalizar">
                        <a href="#">
                            FINALIZAR COMPRA
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
