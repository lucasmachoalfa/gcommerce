<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php'; ?>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>

        <div class="container">
            <h3 class="text-center">Ver cliente</h3>
            <hr>
            <div class="row">
                <div class="col-xs-12 text-center">
                    <a href="cadCliente.php">Adicionar um novo cliente</a> |
                    <a href="#">Exportar lista de clientes</a>
                </div>
                <br><br>
                <div class="col-lg-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Pesquisar cliente">
                        <span class="input-group-btn">
                            <button class="btn btn-info" type="button"><i class="glyphicon glyphicon-search"></i></button>
                        </span>
                    </div>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-striped"> 
                    <thead> 
                        <tr> 
                            <th>Nome</th> 
                            <th><a href="#">Total Consumido</a></th>
                            <th>Número de compras</th> 
                            <th>Última compra</th> 
                            <th>Cidade/Estado</th> 
                            <th>E-mail</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            <th scope=row><a href="#">Rodrigo Ricciotti</a></th>
                            <td>R$ 0,00</td> 
                            <td>0</td>
                            <td>-</td> 
                            <td>Rio de Janeiro/RJ</td> 
                            <td>rodrigo@agenciaguppy.com.br</td> 
                        </tr> 
                        <tr> 
                            <th scope=row><a href="#">Rodrigo Ricciotti</a></th>
                            <td>R$ 0,00</td> 
                            <td>0</td>
                            <td>-</td> 
                            <td>Rio de Janeiro/RJ</td> 
                            <td>rodrigo@agenciaguppy.com.br</td> 
                        </tr> 
                        <tr> 
                            <th scope=row><a href="#">Rodrigo Ricciotti</a></th>
                            <td>R$ 0,00</td> 
                            <td>0</td>
                            <td>-</td> 
                            <td>Rio de Janeiro/RJ</td> 
                            <td>rodrigo@agenciaguppy.com.br</td> 
                        </tr> 
                        <tr> 
                            <th scope=row><a href="#">Rodrigo Ricciotti</a></th>
                            <td>R$ 0,00</td> 
                            <td>0</td>
                            <td>-</td> 
                            <td>Rio de Janeiro/RJ</td> 
                            <td>rodrigo@agenciaguppy.com.br</td> 
                        </tr> 
                    </tbody> 
                </table>
            </div>
            <nav class="text-center">
                <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#">7</a></li>
                    <li><a href="#">8</a></li>
                    <li><a href="#">9</a></li>
                    <li><a href="#">10</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
