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
                    <form id="defaultForm" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2"><i class="glyphicon glyphicon-resize-vertical"></i> Facebook</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon">http://www.facebook.com/</div>
                                    <input type="text" name="facebook" id="facebook" value="<?php echo $redes['facebook'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2"><i class="glyphicon glyphicon-resize-vertical"></i> Instagram</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon">http://www.instagram.com/</div>
                                    <input type="text" name="instagram" id="instagram" value="<?php echo $redes['instagram'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2"><i class="glyphicon glyphicon-resize-vertical"></i> Twitter</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon">http://www.twitter.com/</div>
                                    <input type="text" name="twitter" id="twitter" value="<?php echo $redes['twitter'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2"><i class="glyphicon glyphicon-resize-vertical"></i> Google+</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon">http://www.plus.google.com/</div>
                                    <input type="text" name="google" id="google" value="<?php echo $redes['google'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2"><i class="glyphicon glyphicon-resize-vertical"></i> Vimeo</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon">http://www.vimeo.com/</div>
                                    <input type="text" name="vimeo" id="vimeo" value="<?php echo $redes['vimeo'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2"><i class="glyphicon glyphicon-resize-vertical"></i> YouTube</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon">http://www.youtube.com/user/</div>
                                    <input type="text" name="youtube" id="youtube" value="<?php echo $redes['youtube'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2"><i class="glyphicon glyphicon-resize-vertical"></i> Pinterest</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon">http://www.pinterest.com/</div>
                                    <input type="text" name="pinterest" id="pinterest" value="<?php echo $redes['pinterest'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2"><i class="glyphicon glyphicon-resize-vertical"></i> Flickr</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon">http://www.flickr.com/</div>
                                    <input type="text" name="flickr" id="flickr" value="<?php echo $redes['flickr'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2"><i class="glyphicon glyphicon-resize-vertical"></i> Linkedin</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon">http://www.linkedin.com/</div>
                                    <input type="text" name="linkedin" id="linkedin" value="<?php echo $redes['linkedin'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">                               
                                <button type="button" id="btnCadRedesSocias" class="btn btn-success">Salvar</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>            
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
