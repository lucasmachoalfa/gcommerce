<?php
require_once 'model/produtoDao.php';

$objProduto->setIdProduto($_GET['idProduto']);

$produto = $objProdutoDao->listaProdutos($objProduto)[0];

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
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Esqueleto Loja Virtual</title>
        <?php include_once './includes/head.php'; ?>
        <script src="js/produto.js"></script>
        <style>
            .disabled{
                color: #CCC;
            }
        </style>
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
                        <?php
                        $opcoesVariacoes = $objProdutoDao->listaVariacoesProduto($objProduto);

//                        var_dump($opcoesVariacoes);

                        foreach ($opcoesVariacoes as $opcoes) {
                            echo '<ul id="opcao' . $opcoes["idOpcao"] . '">
                                    <li>' . $opcoes["opcao"] . ':</li>';

                            $variacoes = explode(',', $opcoes["variacao"]);
                            foreach ($variacoes as $variacao) {
                                $campos = explode('-', $variacao);
                                $idVariacao = $campos[0];
                                $titulo = $campos[1];
                                $atributo = $campos[2];
                                
                                
                                if($atributo == ''){
                                    $span = $titulo;
                                }else if(strpos($atributo, '#') !== false){
                                    $span = '<span style="background:'.$atributo.'">'.$titulo.'</span>';
                                }else{
                                    $span = '<span style="background:url(images/'.$atributo.')">'.$titulo.'</span>';
                                }
                                
                                echo '<li>
                                        <button id="btnBuscaAtributo_'.$idVariacao.'" onclick="buscaAtributos('.$opcoes["idOpcao"].','.$idVariacao.','.$objProduto->getIdProduto().')">'.$span.'</button>
                                     </li>';
                            }

                            echo '</ul>';
                        }
                        ?>

                    <div class="calcular-frete">
                        <span style="margin-bottom: 8px; display: block; font-size: 14px;">Digite seu CEP:</span>
                        <form>
                            <input type="text" id="cep" />
                            <input type="button" value="CALCULAR FRETE" id="btnCalcularFrete"/>
                        </form>
                        <?php
                        echo '<input type="hidden" value="' . $produto["peso"] . '" id="peso">';
                        echo '<input type="hidden" value="' . $produto["comprimento"] . '" id="comprimento">';
                        echo '<input type="hidden" value="' . $produto["largura"] . '" id="largura">';
                        echo '<input type="hidden" value="' . $produto["altura"] . '" id="altura">';
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
                        <a href="#" id="btnComprar">COMPRAR</a>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
