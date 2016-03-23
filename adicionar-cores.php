<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php'; ?>     
        <style>
            .option-form{
                border: 1px solid #dfdfdf;
                margin-bottom: 10px;
                padding: 5px;
                background: #fff;
            }
            .estampa{
                width: 40px;
                height: 40px;
                background-size: 40px 40px;                
                background-repeat: no-repeat;
            }
        </style>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>
        <div class="container">
            <h3 class="text-center">Adicionar produtos</h3>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <table class="table ui-sortable-handle">
                        <tr>
                            <td>
                                <div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a href="#" class="btn color-setting-btn pull-left colorpicker-element">
                                                <i class="glyphicon glyphicon-resize-vertical"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" placeholder="Ex. cor, tamanho, ..." class="form-control translate">    
                                        </div>
                                        <div class="col-md-4">
                                            <a class="option_title btn btn-default form-control" href="#option-form-0">Opções <span class="caret"></span></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="#" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="option-form" style="display: block;">
                                        <div class="buffer-top-sm">
                                            <div class="option-items ui-sortable" id="option-items-1">
                                                <div class="option-values-form">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <a href="#" class="btn color-setting-btn pull-left colorpicker-element">
                                                                <i class="glyphicon glyphicon-resize-vertical"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <!-- SE TIVER ESTAMPA, COLOCAR background-image: url(LINK DA ESTAMPA); dentro do style na tag abaixo -->
                                                            <!-- SE TIVER COR, COLOCAR background-color: HEXADEXIMAL DA COR; dentro do style na tag abaixo -->
                                                            <div class="estampa" style=""></div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" name="option[1][values][5][name]" value="P" placeholder="Ex.: Azul, Branco, ..." class="form-control translate" data-table="option_values" data-fid="18296" data-name="name">            
                                                        </div>
                                                        <div class="col-md-1">                 
                                                            <a class="btn btn-danger pull-right"><i class="glyphicon glyphicon-trash"></i></a>
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>                        
                    </table>
                </div>
            </div>
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
