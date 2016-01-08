<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php'; ?>
        <!-- SWITCH -->
        <link href="css/bootstrap-switch.css" rel="stylesheet">
        <script src="js/bootstrap-switch.js"></script>
        <script>
            $(document).ready(function () {
                $(function () {
                    $("[name='my-checkbox']").bootstrapSwitch();
                });
            });
        </script>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>

        <div class="container">
            <div class="row text-center">
                <h3 class="text-center">Status da loja</h3>
                <hr>
                <p>
                    Se você deseja deixar sua loja <strong>offline</strong>, mude o status abaixo para <u>OFF</u>.
                </p>
                <input type="checkbox" name="my-checkbox" checked>                
            </div>            
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
