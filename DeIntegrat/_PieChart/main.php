<?php $data = require_once('getData.php'); ?>

<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 100%;
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

var chart = am4core.create("chartdiv", am4charts.PieChart3D);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.legend = new am4charts.Legend();

chart.data = <?=$data?>;

chart.innerRadius = 100;

var series = chart.series.push(new am4charts.PieSeries3D());
series.dataFields.value = "numarAtacuri";
series.dataFields.category = "numeTara";

}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>
amCharts