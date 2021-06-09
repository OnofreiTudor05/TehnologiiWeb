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

    var chart = am4core.create("chartdiv", am4charts.PieChart);


    chart.hiddenState.properties.opacity = 0;

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
    //series.alignLabels = false;
  });
</script>

<html>

<body>
  <div id="chartdiv"></div>
  <div id="legendDiv"></div>
</body>

</html>