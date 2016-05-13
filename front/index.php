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

            <!-- REPLICAR A 'c3' TODA VEZ QUE A 'i-produtos' (numero de produtos) CHEGAR EM UM MULTIPLO DE 3 -->
            <div class="c3">
                <!-- ESSA TIVE É A DO PRODUTO, REPLICAR A DIV, QUANDO CHEGAR NO MULTIPLO DE 3, FECHA A 'c3', ABRE NOVAMENTE, REPLICA A 'i-produtos' -->
                <div class="i-produtos">
                    <div class="foto-produto">
                        <figure class="foto1">
                            <a href="ver_produto.php">
                                <img src="img/produtos/foto1.jpg" alt="NOME DO PRODUTO" title="NOME DO PRODUTO" onMouseOver="this.src = 'img/produtos/foto2.jpg'" onMouseOut="this.src = 'img/produtos/foto1.jpg'" />
                            </a>
                        </figure>
                    </div>
                    <div class="nome-produto">
                        <a href="#">Casaco Gato Loco</a>
                    </div>
                    <div class="descricao-produto">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                    <div class="preco-de">
                        De: <span>R$ 200,00</span>
                    </div>
                    <div class="preco-por">
                        <span>Por: R$ 100,00</span>
                    </div>
                </div>
                <div class="i-produtos">
                    <div class="foto-produto">
                        <figure class="foto1">
                            <a href="ver_produto.php">
                                <img src="img/produtos/foto1.jpg" alt="NOME DO PRODUTO" title="NOME DO PRODUTO" onMouseOver="this.src = 'img/produtos/foto2.jpg'" onMouseOut="this.src = 'img/produtos/foto1.jpg'" />
                            </a>
                        </figure>
                    </div>
                    <div class="nome-produto">
                        <a href="#">Casaco Gato Loco</a>
                    </div>
                    <div class="descricao-produto">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                    <div class="preco-de">
                        De: <span>R$ 200,00</span>
                    </div>
                    <div class="preco-por">
                        <span>Por: R$ 100,00</span>
                    </div>
                </div>
                <div class="i-produtos">
                    <div class="foto-produto">
                        <figure class="foto1">
                            <a href="ver_produto.php">
                                <img src="img/produtos/foto1.jpg" alt="NOME DO PRODUTO" title="NOME DO PRODUTO" onMouseOver="this.src = 'img/produtos/foto2.jpg'" onMouseOut="this.src = 'img/produtos/foto1.jpg'" />
                            </a>
                        </figure>
                    </div>
                    <div class="nome-produto">
                        <a href="#">Casaco Gato Loco</a>
                    </div>
                    <div class="descricao-produto">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                    <div class="preco-de">
                        De: <span>R$ 200,00</span>
                    </div>
                    <div class="preco-por">
                        <span>Por: R$ 100,00</span>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
