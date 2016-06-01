<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script src="js/jquery.js"></script>

<!-- MENU -->
<script src="js/menu.js"></script>

<!-- OWL-CAROUSEL -->
<link href="owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="owl-carousel/owl.theme.css" rel="stylesheet">

<script src="owl-carousel/owl.carousel.js"></script>

<!-- webshim com plugin de data -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<!-- polyfiller file to detect and load polyfills -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
    webshims.setOptions('waitReady', false);
    webshim.setOptions('forms-ext', {
        replaceUI: 'auto',
        types: 'date time',
        widgets: {
            startView: 2
        }
    });
    webshim.polyfill('forms forms-ext');
//]]>  
    webshims.polyfill('forms forms-ext');
</script>

<style type='text/css'>
    .wrapper {
        margin: 10px auto;
        padding: 5px 10px;
        max-width: 600px;
        min-width: 300px;
        width: 90%;
    }
    .form-row {
        padding: 10px;
    }
    .ws-po-box label {
        display: block;
        margin: 3px 0;
    }
    .form-row input {
        width: 220px;
        padding: 3px 1px;
    }
    .date-time input[type="date"] {
        width: 130px;
    }
    .date-time input[type="time"] {
        width: 85px;
    }

</style>