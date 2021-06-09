<html>

<?php $data = require_once('getData.php'); ?>
<style>
  #chartdiv {
    background-color: rgba(255, 0, 0, 1);
    width: 100%;
    height: auto;
    overflow: hidden;
  }
</style>

<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/maps.js"></script>
<script src="https://cdn.amcharts.com/lib/4/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"> </script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"> </script>

<script>
  am4core.ready(function() {

    am4core.useTheme(am4themes_animated);

    var chart = am4core.create("chartdiv", am4maps.MapChart);

    chart.geodata = am4geodata_worldLow;

    chart.projection = new am4maps.projections.Miller();

    var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());

    polygonSeries.exclude = ["AQ"];

    polygonSeries.useGeodata = true;

    var polygonTemplate = polygonSeries.mapPolygons.template;
    polygonTemplate.tooltipText = "{name}";
    polygonTemplate.polygon.fillOpacity = 0.6;


    var hs = polygonTemplate.states.create("hover");
    hs.properties.fill = chart.colors.getIndex(0);

    var imageSeries = chart.series.push(new am4maps.MapImageSeries());
    imageSeries.mapImages.template.propertyFields.longitude = "longitude";
    imageSeries.mapImages.template.propertyFields.latitude = "latitude";
    imageSeries.mapImages.template.tooltipText = "{title}";
    imageSeries.mapImages.template.propertyFields.url = "url";

    var circle = imageSeries.mapImages.template.createChild(am4core.Circle);
    circle.radius = 3;
    circle.propertyFields.fill = "color";
    circle.nonScaling = true;

    var colorSet = new am4core.ColorSet();

    imageSeries.data = <?= $data; ?>;

    var json = json3.items
    var fields = Object.keys(json[0])
    var replacer = function(key, value) {
      return value === null ? '' : value
    }
    var csv = json.map(function(row) {
      return fields.map(function(fieldName) {
        return JSON.stringify(row[fieldName], replacer)
      }).join(',')
    })
    csv.unshift(fields.join(',')) // add header column
    csv = csv.join('\r\n');
    console.log(csv);

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

<body>
  <div id="chartdiv"></div>
</body>

</html>