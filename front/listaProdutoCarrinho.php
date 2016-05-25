<?php
require_once 'model/produtoDao.php';
$objetos = json_decode($_GET['json']);

$idProduto = '';
$referencia = '';

for ($i = 0; $i < count($objetos); $i++) {
    $idProduto .= $objetos[$i]->idProduto . ',';
    $referencia .= "'" . $objetos[$i]->referencia . "'" . ',';
}

$idProduto = rtrim($idProduto, ',');
$referencia = rtrim($referencia, ',');

$objProduto->setIdProduto($idProduto);
$objProduto->setReferencia($referencia);

$produtos = $objProdutoDao->listaProdutosCarrinho($objProduto);
?>
<ul class="indice-carrinho">
    <li class="produto">PRODUTO</li>
    <li class="quantidade">QUANTIDADE</li>
    <li class="preco">PREÇO</li>
    <li class="subtotal">SUBTOTAL</li>
</ul>

<section id="produtos">
    <?php
    $total = 0;
    $i = 0;
    foreach ($produtos as $produto):

        $caminhoFotos = '../back/images/produto/' . $produto['idProduto'];
        $fotos = array();
        if (is_dir($caminhoFotos) > 0) {

            $ponteiro = scandir($caminhoFotos);
            foreach ($ponteiro as $listar) {
                if ($listar != "." && $listar != "..") {
                    $fotos[] = $listar;
                }
            }
        }

        $max = ($produto['quantidadeVariacao'] !== '0.00') ? $produto['quantidadeVariacao'] : $produto['quantidade'];
        $preco = ($produto['precoVariacao'] !== '0.00') ? $produto['precoVariacao'] : $produto['precoPromocional'];
        $total += $preco;
        ?>
    <ul class="produto-linha" id="produto_<?php echo $i; ?>">
            <li class="produto">
                <figure class="foto-produto-linha">
                    <img src="<?php echo $caminhoFotos . '/' . $fotos[0]; ?>" alt=""/>
                </figure>
                <div class="nome-produto">
                    <h2><?php echo $produto['nome']; ?></h2>
                </div>
            </li>
            <li class="quantidade">
                <form>
                    <input type="number" id="quantidade_<?php echo $i; ?>" value="1" min="1" max="<?php echo $quantidadeMaxima; ?>"/>
                </form>
                <!--div class="botoes-quantidade">
                    <div class="mais">
                        <button>+</button>
                    </div>
                    <div class="menos">
                        <button>-</button>
                    </div>
                </div-->
            </li>
            <li class="preco">
                R$ <span ><?php echo number_format($preco, 2, ',', '.'); ?></span>
                <input type="hidden" value="<?php echo $preco; ?>" id="preco_<?php echo $i; ?>" />
            </li>
            <li class="subtotal">
                R$ <span id="subtotal_<?php echo $i; ?>"><?php echo number_format($preco, 2, ',', '.'); ?></span>
            </li>
            <li class="excluir">
                <a href="javascript:delProduto(<?php echo $i; ?>)">X</a>
            </li>
        </ul>
    <?php
        $i++;
    endforeach;
    ?>
</section>

<section id="frete">
    <div class="calcular-frete">
        <span>Digite aqui o seu CEP para calcular o frete:</span>
        <input type="text" name="calcularFrete" id="calcularFrete" class="shipping-zipcode" value="">
        <button class="button calculate-shipping-button">Calcular Frete</button>
        <span class="loading" style="display: none;"><i class="fa fa-refresh fa-spin"></i></span>
        <span class="invalid-zipcode" style="display: none;">O CEP está inválido.</span>
    </div>

    <ul class="lista-opcoes-frete" style="display: none">
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
</section>

<ul class="total-produto">
    <li class="subtotal">
        <!--h3 style="font-weight: lighter;">Subtotal: R$300,00</h3-->
        <h3 style="font-weight: lighter;">&nbsp;</h3>
    </li>
    <li class="total">
        <h3 style="font-weight: bold;">Total: R$<?php echo number_format($total, 2, ',', '.'); ?></h3>
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