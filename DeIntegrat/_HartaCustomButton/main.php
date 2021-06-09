<html>

<!-- Styles -->
<?php $data = require_once('getData.php'); ?>
<style>
  #chartdiv {
    background-color: rgba(255, 0, 0, 1);
    width: 100%;
    height: auto;
    overflow: hidden;
  }
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/maps.js"></script>
<script src="https://cdn.amcharts.com/lib/4/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
  am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create map instance
    var chart = am4core.create("chartdiv", am4maps.MapChart);

    // Set map definition
    chart.geodata = am4geodata_worldLow;

    // Set projection
    chart.projection = new am4maps.projections.Miller();

    // Create map polygon series
    var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());

    // Exclude Antartica
    polygonSeries.exclude = ["AQ"];

    // Make map load polygon (like country names) data from GeoJSON
    polygonSeries.useGeodata = true;

    // Configure series
    var polygonTemplate = polygonSeries.mapPolygons.template;
    polygonTemplate.tooltipText = "{name}";
    polygonTemplate.polygon.fillOpacity = 0.6;


    // Create hover state and set alternative fill color
    var hs = polygonTemplate.states.create("hover");
    hs.properties.fill = chart.colors.getIndex(0);

    // Add image series
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
  }); // end am4core.ready()
</script>

<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"> </script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"> </script>

  <script>
    function doCapture() {
      window.scrollTo(0, 0);
      html2canvas(document.getElementById("chartdiv")).then(function(canvas) {
        var imageWeb = canvas.toDataURL("image/webp", 1);
        //console.log(imageWeb);

        var a = document.createElement('a');
        a.href = imageWeb;
        a.download = 'image/webp';
        a.click();
        //document.body.appendChild(imageWeb);
      });
    }
  </script>
<!-- HTML -->
<body>
  <button id="saveIt" onclick="doCapture()"> Save </button>
  <div id="chartdiv"></div>
</body>
</html>