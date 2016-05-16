<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Esqueleto Loja Virtual</title>
        <?php include_once './includes/head.php'; ?>

        <style>
            #banner-home .item img{
                display: block;
                width: 100%;
                height: auto;
            }
        </style>
    </head>
    <body>
        <?php include_once './includes/header.php'; ?>

        <div class="banner">
            <div id="banner-home" class="owl-carousel owl-theme">
                <div class="item"><img src="banner/fullimage1.jpg" alt="NOME DO BANNER"></div>
                <div class="item"><img src="banner/fullimage2.jpg" alt="NOME DO BANNER"></div>
                <div class="item"><img src="banner/fullimage3.jpg" alt="NOME DO BANNER"></div>
                <div class="item"><img src="banner/fullimage4.jpg" alt="NOME DO BANNER"></div>
                <div class="item"><img src="banner/fullimage5.jpg" alt="NOME DO BANNER"></div>
            </div>
            <script>
                $(document).ready(function () {
                    $("#banner-home").owlCarousel({
                        slideSpeed: 300,
                        paginationSpeed: 400,
                        autoPlay: 3000,
                        stopOnHover: true,
                        navigation: true,
                        goToFirstSpeed: 2000,
                        singleItem: true,
                        autoHeight: true,
                        pagination: false,
                        navigationText: ["", ""],
                    });
                });
            </script>
        </div>

        <div class="lista-produtos">


            <?php
            require_once 'model/produtoDao.php';

            $produtos = $objProdutoDao->listaProdutos();
            
//            var_dump($produtos);

            $i = 1;
            foreach ($produtos as $produto):
                $caminhoFotos = '../images/produto/'.$produto['idProduto'];
                $fotos = array();
                if (is_dir($caminhoFotos) > 0) {

                    $ponteiro = scandir($caminhoFotos);
                    foreach ($ponteiro as $listar) {
                        if ($listar != "." && $listar != "..") {
                            $fotos[] = $listar;
                        }
                    }
                }
                
                if ($i === 1):
                    echo '<div class="c3">';
                endif;
                ?>
                <div class="i-produtos">
                    <div class="foto-produto">
                        <figure class="foto1">
                            <a href="ver_produto.php?idProduto=<?php echo $produto['idProduto']; ?>">
                                <img
                                    src="<?php echo $caminhoFotos.'/'.$fotos[0]; ?>"
                                    alt="<?php echo $produto['nome']; ?>"
                                    title="<?php echo $produto['nome']; ?>"
                                    <?php echo (isset($fotos[1])) ? 'onMouseOver="this.src = \''.$caminhoFotos.'/'.$fotos[1].'\'" onMouseOut="this.src = \''.$caminhoFotos.'/'.$fotos[0].'\'"' : ''; ?> />
                            </a>
                        </figure>
                    </div>
                    <div class="nome-produto">
                        <a href="ver_produto.php?idProduto=<?php echo $produto['idProduto']; ?>"><?php echo $produto['nome']; ?></a>
                    </div>
                    <div class="descricao-produto">
                        <p>
                            <?php echo $produto['resumo']; ?>
                        </p>
                    </div>
                    <div class="preco-de">
                        De: <span>R$ <?php echo number_format($produto['precoNormal'],2,',','.'); ?></span>
                    </div>
                    <div class="preco-por">
                        <span>Por: R$ <?php echo number_format($produto['precoPromocional'],2,',','.'); ?></span>
                    </div>
                </div>
                <?php
                if ($i % 3 == 0):
                    echo '</div><div class="c3">';
                endif;
                $i++;
            endforeach;
            ?>
        </div>
    </body>
</html>
