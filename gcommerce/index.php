<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php'; ?>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("visualization", "1", {packages: ["corechart"]});
            google.setOnLoadCallback(drawChart);
            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Effort', 'Amount given'],
                    ['My all', 100],
                ]);

                var options = {
                    pieHole: 0.5,
                    pieSliceTextStyle: {
                        color: 'black',
                    },
                    legend: 'none'
                };

                var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>

        <div class="container">
            <div class="col-lg-2 text-center">BOX 1</div>
            <div class="col-lg-10 text-center">
                <div id="donut_single" style="width: 900px; height: 500px;"></div>
            </div>
        </div>

        <?php include_once 'includes/footer.php'; ?>
    </body>
</html>
