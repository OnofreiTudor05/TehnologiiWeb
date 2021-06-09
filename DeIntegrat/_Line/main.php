<?php $data = require_once('getData.php'); ?>
<style>
  #chartdiv {
    width: 100%;
    height: auto;
  }
</style>


<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/dataviz.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"> </script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"> </script>>


<script>
  am4core.ready(function() {

    am4core.useTheme(am4themes_dataviz);
    am4core.useTheme(am4themes_animated);

    var chart = am4core.create("chartdiv", am4charts.XYChart);

    var data = [];
    var value = 50;
    chart.data = <?= $data ?>;

    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.minGridDistance = 60;

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

    var series = chart.series.push(new am4charts.LineSeries());
    series.dataFields.valueY = "numarAtacuri";
    series.dataFields.dateX = "an";
    series.tooltipText = "{numarAtacuri}"

    series.tooltip.pointerOrientation = "vertical";

    chart.cursor = new am4charts.XYCursor();
    chart.cursor.snapToSeries = series;
    chart.cursor.xAxis = dateAxis;

    //chart.scrollbarY = new am4core.Scrollbar();
    chart.scrollbarX = new am4core.Scrollbar();

    chart.exporting.menu = new am4core.ExportMenu();
    //chart.exporting.menu.items[0].icon = "SaveIcon.png";
    chart.exporting.menu.align = "left";
    chart.exporting.menu.verticalAlign = "top";

    chart.exporting.menu.items = [{
      "label": "...",
      "menu": [{
          "type": "csv",
          "label": "CSV"
        },
        {
          "type": "svg",
          "label": "SVG"
        }
      ]
    }];

    chart.exporting.menu.items[0].menu.push({
      label: "WebP",
      type: "custom",
      options: {
        callback: function() {
          window.scrollTo(0, 0);
          html2canvas(document.getElementById("chartdiv")).then(function(canvas) {
            var imageWeb = canvas.toDataURL("image/webp", 0.9);
            var a = document.createElement('a');
            a.href = imageWeb;
            a.download = 'image/webp';
            a.click();
          });
        }
      }
    });

  });
</script>

<div id="chartdiv"></div>