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
                        <img src="img/produtos/foto1.jpg" alt=""/>
                    </figure>
                    <div class="thumb_pequena">
                        <figure>
                            <img src="img/produtos/foto1.jpg" alt=""/>
                        </figure>
                        <figure>
                            <img src="img/produtos/foto1.jpg" alt=""/>
                        </figure>
                        <figure>
                            <img src="img/produtos/foto1.jpg" alt=""/>
                        </figure>
                        <figure>
                            <img src="img/produtos/foto1.jpg" alt=""/>
                        </figure>
                    </div>
                </div>
                <div class="dados-produto">
                    <h2>Casaco Gato Loco</h2>
                    <div class="preco-produto">
                        <span style="font-size: 14px;">De: <span style="text-decoration: line-through;">R$ 200,00</span></span>
                        <span style="font-size: 20px; font-weight: bold; color: red;">Por: R$ 100,00</span>
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
                            <input type="text" />
                            <input type="button" value="CALCULAR FRETE"/>
                        </form>
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
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <p>
                            Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.
                        </p>
                    </div>
                    
                    <div class="btn-comprar">
                        <a href="#">COMPRAR</a>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
