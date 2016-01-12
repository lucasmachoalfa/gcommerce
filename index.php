<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php'; ?>
        <script src="js/Chart.js/Chart.js"></script>
        <script src="js/Chart.js/src/Chart.Doughnut.js"></script>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>
        
        <div class="container">
            <div class="row text-center">
                <h3>Painel</h3>
                <p>
                    Relatórios relevantes para avaliar o desempenho de sua loja. Dados atualizados a cada 12 horas.
                </p>
            </div>
            <br>
            <div class="row">
                <section class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="box-info">
                        <p class="value">R$0,00</p>
                        <p class="title">Vendas totais</p>
                    </div>
                </section>
                <section class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="box-info">
                        <p class="value">0</p>
                        <p class="title">Pedidos</p>
                    </div>
                </section>
                <section class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="box-info">
                        <p class="value">0</p>
                        <p class="title">Ticket médio de pedidos</p>
                    </div>
                </section>
            </div>
            <br><br>
            <div class="row">
                <h4 class="text-center">Conversões dos últimos 30 dias</h4>
                <hr>
                <div class="col-lg-6">
                    <p>
                        Funil de vendas
                    </p>
                    <div style="width: 100%">
                        <canvas id="canvas" height="450" width="600"></canvas>
                    </div>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <p>
                        Taxa de conversão do checkout:
                    </p>
                    <div id="canvas-holder">
                        <canvas id="chart-area" width="1" height="1"></canvas>
                        <span class="percent">100%</span>
                    </div>
                </div>
            </div>
            <script>
                var randomScalingFactor = function () {
                    return Math.round(Math.random() * 100)
                };

                var barChartData = {
                    labels: ["Carrinho criado", "Início compra", "Contato preenchido", "Endereço preenchido", "Forma de frete escolhida", "Meio de pagamento escolhido", "Pedido criado"],
                    datasets: [
                        {
                            fillColor: "rgba(220,220,220,0.5)",
                            strokeColor: "rgba(220,220,220,0.8)",
                            highlightFill: "rgba(220,220,220,0.75)",
                            highlightStroke: "rgba(220,220,220,1)",
                            data: [10, 8, 6, 5, 4, 3, 1],
                        }
                    ]
                }

                var doughnutData = [
                    {
                        value: 15,
                        color: "#00a6cf",
                        highlight: "#00a6cf",
                        label: false,
                        legendTemplate: "teste"
                    },
                    {
                        value: 85,
                        color: "#efefef",
                        highlight: "#efefef",
                        label: false,
                    }
                ];

                window.onload = function () {
                    var ctx = document.getElementById("canvas").getContext("2d");
                    window.myBar = new Chart(ctx).Bar(barChartData, {
                        responsive: true
                    });

                    var ctx2 = document.getElementById("chart-area").getContext("2d");
                    window.myDoughnut = new Chart(ctx2).Doughnut(doughnutData, {responsive: true});
                };
            </script>
            <br><br>
            <div class="row">
                <div class="col-lg-4">
                    <h4>Produtos mais acessados</h4>
                    <div class="table-responsive">
                        <table class="table table-hover"> 
                            <tbody>
                                <tr> 
                                    <td><img src="https://d26lpennugtm8s.cloudfront.net/stores/191/461/products/68-36-003-preto1-e1444847550886-87908150afa7e8e0dbce87a6df783f3e-50-0.jpg" alt=""/></td> 
                                    <td><a href="#" class="btn btn-link btn-sm">SCARPIN F PASS METAL COURO</a></td>
                                    <td>10</td> 
                                </tr>
                                <tr> 
                                    <td><img src="https://d26lpennugtm8s.cloudfront.net/stores/191/461/products/68-36-003-preto1-e1444847550886-87908150afa7e8e0dbce87a6df783f3e-50-0.jpg" alt=""/></td> 
                                    <td><a href="#" class="btn btn-link btn-sm">SCARPIN F PASS METAL COURO</a></td>
                                    <td>10</td> 
                                </tr>
                                <tr> 
                                    <td><img src="https://d26lpennugtm8s.cloudfront.net/stores/191/461/products/68-36-003-preto1-e1444847550886-87908150afa7e8e0dbce87a6df783f3e-50-0.jpg" alt=""/></td> 
                                    <td><a href="#" class="btn btn-link btn-sm">SCARPIN F PASS METAL COURO</a></td>
                                    <td>10</td> 
                                </tr>
                            </tbody> 
                        </table>                
                    </div>
                </div>
                <div class="col-lg-4">
                    <h4>Produtos mais vendidos</h4>
                    <p>
                        Não há informações sobre seus produtos.
                    </p>
                </div>
                <div class="col-lg-4">
                    <h4>Produtos com baixo estoque</h4>
                    <p>
                        Não há informações sobre seus produtos.
                    </p>
                </div>
            </div>
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
