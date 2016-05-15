<?php
require_once 'model/produtoDao.php';

$objProduto->setIdProduto($_GET['idProduto']);

$produto = $objProdutoDao->listaProdutos($objProduto)[0];

$caminhoFotos = '../admin/images/produtos/' . $produto['idProduto'];
$fotos = array();
if (is_dir($caminhoFotos) > 0) {

    $ponteiro = scandir($caminhoFotos);
    foreach ($ponteiro as $listar) {
        if ($listar != "." && $listar != "..") {
            $fotos[] = $listar;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Esqueleto Loja Virtual</title>
        <?php include_once './includes/head.php'; ?>
        <script src="js/produto.js"></script>
    </head>
    <body>
        <?php include_once './includes/header.php'; ?>

        <div class="container">
            <nav class="guia-paginas">
                <ul>
                    <li><a href="#">Página 1</a> &raquo;</li>
                    <li><a href="#">Página 2</a> &raquo;</li>
                    <li><a href="#">Página 3</a> &raquo;</li>
                    <li><a href="#">Página 4</a></li>
                </ul>
            </nav>
            <div class="info-produto">
                <div class="foto-produto-interna">
                    <figure class="thumb_grande">
                        <?php echo '<img src="' . $caminhoFotos . '/' . $fotos[0] . '" alt="" />'; ?>
                    </figure>
                    <div class="thumb_pequena">
                        <?php
                        for ($i = 0; $i < count($fotos); $i++) {
                            echo '
                                    <figure>
                                        <img src="' . $caminhoFotos . '/' . $fotos[$i] . '" alt="" />
                                    </figure>
                                 ';
                        }
                        ?>
                    </div>
                </div>
                <div class="dados-produto">
                    <h2><?php echo $produto['nome']; ?></h2>
                    <div class="preco-produto">
                        <span style="font-size: 14px;">
                            De: <span style="text-decoration: line-through;">R$ <?php echo number_format($produto['precoNormal'], 2, ',', '.'); ?></span>
                        </span>
                        <span style="font-size: 20px; font-weight: bold; color: red;">Por: R$ <?php echo number_format($produto['precoPromocional'], 2, ',', '.'); ?></span>
                    </div>

                    <div class="variacoes-tamanho">
                        <ul>
                            <li>Tamanho:</li>
                            <li><a href="#">PP</a></li>
                            <li><a href="#">P</a></li>
                            <li><a href="#">M</a></li>
                            <li><a href="#">G</a></li>
                            <li><a href="#">GG</a></li>
                            <li><a href="#">XG</a></li>
                            <li><a href="#">XGG</a></li>
                            <li><a href="#">XGGG</a></li>
                        </ul>
                    </div>

                    <div class="variacoes-cor">
                        <span style="margin-right: 10px;">Cor:</span>
                        <select>
                            <option>Preto</option>
                            <option>Branco</option>
                            <option>Vermelho</option>
                            <option>Laranja</option>
                            <option>Azul</option>
                            <option>Verde</option>
                        </select>
                    </div>

                    <div class="calcular-frete">
                        <span style="margin-bottom: 8px; display: block; font-size: 14px;">Digite seu CEP:</span>
                        <form>
                            <input type="text" id="cep" />
                            <input type="button" value="CALCULAR FRETE" id="btnCalcularFrete"/>
                        </form>
                        <?php
                        echo '<input type="hidden" value="'.$produto["peso"].'" id="peso">';
                        echo '<input type="hidden" value="'.$produto["comprimento"].'" id="comprimento">';
                        echo '<input type="hidden" value="'.$produto["largura"].'" id="largura">';
                        echo '<input type="hidden" value="'.$produto["altura"].'" id="altura">';
                        ?>
                        <div id="valorFrete"></div>
                    </div>

                    <div class="compartilhar-social">
                        <!-- BEGIN: SOCIAL SHARE -->
                        <section id="social-share" class="barra_sociais">
                            <span class="addthis_sharing_toolbox"></span>
                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55ad0bf20994491a" async="async"></script>
                        </section>
                        <!-- END: SOCIAL SHARE -->
                    </div>

                    <div class="descricao-produto">
                        <h3>Descrição completa</h3>
                        <?php echo $produto['descricao']; ?>
                    </div>

                    <div class="btn-comprar">
                        <a href="#">COMPRAR</a>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
