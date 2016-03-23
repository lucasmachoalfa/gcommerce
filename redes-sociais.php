<?php
require_once 'model/marketingDao.php';

$redes = $objMarketingDao->listaRedesSociais();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php'; ?>
        <style>
            .carrinhosConfig th, .carrinhosConfig td{
                text-align: center;
            }

            .portlet-placeholder {
                border: 1px dotted black;
                margin: 0 10px 10px 0;
                height: 50px;
            }
            
            ul.form-horizontal{
                list-style: none;
                
            }
            
            ul.form-horizontal li{
                margin-bottom: 20px;
            }
        </style>
        <!-- DATEPICKER -->
        <script src="js/moment-with-locales.js"></script>
        <link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
        <script src="js/bootstrap-datetimepicker.js"></script>
        <script src="js/redesSociais.js"></script>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>
        <div class="container">
            <h3 class="text-center">Redes sociais</h3>
            <hr>    
            <div class="row">
                <div class="col-sm-8">
                    <ul class="form-horizontal">
                        <?php
                        require_once 'model/marketingDao.php';

                        $redes = $objMarketingDao->listaRedesSociais();

                        foreach ($redes as $rede) {
                            echo '
                                    <li id="idRede_' . $rede["idRedesSociais"] . '" class="row">
                                        <label class="col-sm-2">
                                            <i class="glyphicon glyphicon-resize-vertical"></i>' . $rede["rede"] . '
                                        </label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <div class="input-group-addon">' . $rede["fixo"] . '</div>
                                                <input type="text" name="' . $rede["rede"] . '" id="' . $rede["idRedesSocias"] . '" value="' . $rede['link'] . '" class="form-control">
                                            </div>
                                        </div>
                                    </li>
                            ';
                        }
                        ?>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">                               
                                <button type="button" id="btnCadRedesSocias" class="btn btn-success">Salvar</button>
                            </div>
                        </div>                        
                    </ul>
                </div>
            </div>            
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
