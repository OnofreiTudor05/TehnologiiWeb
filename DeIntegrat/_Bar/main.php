<?php $data = require_once('getData.php'); ?>
<style>
  #chartdiv {
    width: 100%;
    height: auto;
  }
</style>

<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/maps.js"></script>
<script src="https://cdn.amcharts.com/lib/4/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"> </script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"> </script>
<script src="https://cdn.amcharts.com/lib/4/themes/dataviz.js"></script>

<script>
  am4core.ready(function() {

    am4core.useTheme(am4themes_dataviz);
    am4core.useTheme(am4themes_animated);

    var chart = am4core.create("chartdiv", am4charts.XYChart);

    chart.data = <?= $data ?>;

    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "numeTara";
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.renderer.minGridDistance = 30;

    categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
      if (target.dataItem && target.dataItem.index & 2 == 2) {
        return dy + 25;
      }
      return dy;
    });

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.valueY = "numarAtacuri";
    series.dataFields.categoryX = "numeTara";
    series.name = "Attacks";
    series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
    series.columns.template.fillOpacity = .8;

    var columnTemplate = series.columns.template;
    columnTemplate.strokeWidth = 2;
    columnTemplate.strokeOpacity = 1;


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