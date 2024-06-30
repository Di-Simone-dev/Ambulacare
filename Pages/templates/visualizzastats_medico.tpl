{extends file="layout_medico.tpl"}

{block name=content}

    <br>
    <div id="container" style="height: 500px;">
        <h2 style="margin-left:35px;">Statistiche nell'intervallo di tempo selezionato</h2>
    <br>
    <script>
        function getData() {
            return [
            {foreach $statistiche as $esame}
                ['{$esame.data}',{$esame.NumEsami}],
            {/foreach}
            ];
        }
        // create a data set on our data
        var dataSet = anychart.data.set(getData());
        // map data for the line chart,
        // take x from the zero column and value from the first column
        var seriesData = dataSet.mapAs({ x: 0, value: 1 });
        //var matrice = new Array();
        //matrice=[['21/05',1],['22/05',2]];

        //document.write(matrice[0]);
        //document.write(getData()[4]);
        // create a line chart
        var chart = anychart.line();

        // configure the chart title text settings
        chart.title('Guadagno dal {$data1} al {$data2}: {$guadagno}€');

        // set the y axis title
        chart.xAxis().title('intervallo di tempo');
        chart.yAxis().title('esami complessivi');

        // create a line series with the mapped data
        var lineChart = chart.line(seriesData);
        lineChart.name('esami giornalieri');
        //chart.legend().enabled(true);
        chart.crosshair().enabled(true).yStroke(null).yLabel(false);
        lineChart.hovered().markers().type("circle").size(4);
        lineChart.normal().stroke("#7b60a2", 2.5);

        // set the container id for the line chart
        chart.container('container');

            // draw the line chart
            chart.draw();
        </script>
    </div>
    <br><br><br><br>
    <div>
        <button class="btn btn-primary" style="margin-left:35px;">Cambia intervallo di tempo</button>
    </div>
<br>

{/block}