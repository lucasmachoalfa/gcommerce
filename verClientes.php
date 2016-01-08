<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php'; ?>
        <script src="js/clientes.js"></script>
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
                    <div class="input-group" id="form-group-buscaCliente">
                        <input type="text" id="pesquisaCliente" class="form-control" placeholder="Pesquisar cliente">
                        <span class="input-group-btn">
                            <button class="btn btn-info" type="button" id="btnBuscaCliente"><i class="glyphicon glyphicon-search"></i></button>
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
                            <th>Data de cadastro</th> 
                            <th>Cidade/Estado</th> 
                            <th>E-mail</th> 
                        </tr>
                    </thead>
                    <tbody id="listaClientes">
                        <?php
//                        require_once 'listaClientesAjax.php';
                        ?>
                    </tbody> 
                </table>
                <div id="carregando" style="display: none">Carregando...</div>
            </div>
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
