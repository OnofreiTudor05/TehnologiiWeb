let searchsummary = document.getElementById("searchsummary");
let iyearin = document.getElementById("iyearin");
let iyearsf = document.getElementById("iyearsf");
let country_txt = document.getElementById("country_txt");
let region_txt = document.getElementById("region_txt");
let provstate = document.getElementById("provstate");
let attacktype1_txt = document.getElementById("attacktype1_txt");
let targtype1_txt = document.getElementById("targtype1_txt");
let targsubtype1_txt = document.getElementById("targsubtype1_txt");
let natlty1_txt = document.getElementById("natlty1_txt");
let weaptype1_txt = document.getElementById("weaptype1_txt");
let weapsubtype1_txt = document.getElementById("weapsubtype1_txt");
let nkillin = document.getElementById("nkillin");
let nkillsf = document.getElementById("nkillsf");
let propextent_txt = document.getElementById("propextent_txt");
let ransom = document.getElementById("ransom");
let ransomamtin = document.getElementById("ransomamtin");
let ransomamtsf = document.getElementById("ransomamtsf");
let container = document.getElementById("container");
let submitBtn = document.getElementById("search");

submitBtn.addEventListener("click", onClick);

function onClick() {
  container.innerHTML = "";

  submitBtn.setAttribute("disabled", true);

  var content = {
    searchsummary: searchsummary.value,
    iyearin: iyearin.value,
    iyearsf: iyearsf.value,
    country_txt: country_txt.value,
    region_txt: region_txt.value,
    provstate: provstate.value,
    attacktype1_txt: attacktype1_txt.value,
    targtype1_txt: targtype1_txt.value,
    targsubtype1_txt: targsubtype1_txt.value,
    natlty1_txt: natlty1_txt.value,
    weaptype1_txt: weaptype1_txt.value,
    weapsubtype1_txt: weapsubtype1_txt.value,
    nkillin: nkillin.value,
    nkillsf: nkillsf.value,
    propextent_txt: propextent_txt.value,
    ransom: ransom.value,
    ransomamtin: ransomamtin.value,
    ransomamtsf: ransomamtsf.value
  };

  var url = new URL("http://localhost/TehnologiiWeb/app/api/map");
  url.search = new URLSearchParams(content).toString();

  fetch(url)
    .then(function (resp) {
      return resp.json();
    })
    .then(function (jsonResp) {
      if (jsonResp.hasOwnProperty('response')) {
        if (jsonResp.response.includes("Invalid")) { container.textContent = jsonResp.response; }
      }
      else {
        drawMap(jsonResp);
      }
      submitBtn.removeAttribute("disabled");
      submitBtn.textContent = 'Search';
    }).catch(function (err) {
      submitBtn.removeAttribute("disabled");
      submitBtn.textContent = 'Search';
      console.log(err);
    });
}

function drawMap(mapData) {
  am4core.ready(function () {

    am4core.useTheme(am4themes_animated);

    var chart = am4core.create("container", am4maps.MapChart);

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
    circle.radius = 1;
    circle.propertyFields.fill = "color";
    circle.nonScaling = true;

    imageSeries.data = mapData;

    chart.exporting.menu = new am4core.ExportMenu();
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
        callback: function () {
          window.scrollTo(0, 0);
          html2canvas(document.getElementById("container")).then(function (canvas) {
            var imageWeb = canvas.toDataURL("image/webp", 0.9);
            var a = document.createElement('a');
            a.href = imageWeb;
            a.download = 'image/webp';
            a.click();
          });
        }
      }
    });

    chart.exporting.menu.items[0].menu.push({
      label: "CSV",
      type: "custom",
      options: {
        callback: function () {
          var date = mapData;
          date.unshift({
            'title': 'title',
            'latitude': 'latitude',
            'longitude': 'longitude',
            'color': 'color'
          });
          var csvdata = convertToCSV(date);
          var blob = new Blob([csvdata], {
            type: 'text/csv;charset=utf-8;'
          });
          var url = URL.createObjectURL(blob);
          var link = document.createElement("a");
          link.setAttribute("href", url);
          link.setAttribute("download", 'map.csv');
          link.click();
        }
      }
    });
    chart.exporting.menu.items[0].icon = "../resurse/Poze/SaveIcon.png";
  });


}

function convertToCSV(objArray) {
  var array = typeof objArray != 'object' ? JSON.parse(objArray) : objArray;
  var str = '';

  for (var i = 0; i < array.length; i++) {
    var line = '';
    for (var index in array[i]) {
      if (line != '') line += ','

      line += array[i][index];
    }

    str += line + '\r\n';
  }

  return str;
}