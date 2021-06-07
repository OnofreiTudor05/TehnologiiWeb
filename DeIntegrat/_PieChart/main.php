<?php $data = require_once('getData.php'); ?>

<!-- Styles -->
<style>
  #chartdiv {
    width: 100%;
    height: auto;
  }
  #legendDiv {
    width: 100%;
    height: auto;
  }
</style>

<!-- Resources -->
<script src="libraries/core.js"></script>
<script src="libraries/charts.js"></script>
<script src="libraries/dataviz.js"></script>

<!-- Chart code -->
<script>
  am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_dataviz);
    // Themes end

    var chart = am4core.create("chartdiv", am4charts.PieChart);
    chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

    chart.legend = new am4charts.Legend();
    var legendContainer = am4core.create("legendDiv", am4core.Container);
    chart.legend.parent = legendContainer;

    legendContainer.width = am4core.percent(100);


    chart.data = <?= $data ?>;

    chart.innerRadius = 100;

    var series = chart.series.push(new am4charts.PieSeries());
    series.dataFields.value = "numarAtacuri";
    series.dataFields.category = "numeTara";

    series.labels.template.maxWidth = 130;
    series.labels.template.wrap = true;

    chart.exporting.menu = new am4core.ExportMenu();
        chart.exporting.menu.items[0].icon = "SaveIcon.png";
        chart.exporting.menu.align = "left";
        chart.exporting.menu.verticalAlign = "top";
        /*chart.exporting.formatOptions.getKey("jpg").disabled = true;
        chart.exporting.formatOptions.getKey("pdf").disabled = true;
        chart.exporting.formatOptions.getKey("json").disabled = true;
        chart.exporting.formatOptions.getKey("html").disabled = true;
        chart.exporting.formatOptions.getKey("xlsx").disabled = true;
        chart.exporting.formatOptions.getKey("print").disabled = true;*/
    //series.alignLabels = false;

  }); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>
<div id="legendDiv"></div>
