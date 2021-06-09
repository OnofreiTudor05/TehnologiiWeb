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
let selecteazagr = document.getElementById("selecteazagr");
let tipdategrafic = document.getElementById("tipdategrafic");
let pageno = document.getElementById("pageno");
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
        ransomamtsf: ransomamtsf.value,
        selecteazagr: selecteazagr.value,
        tipdategrafic: tipdategrafic.value,
        pageno: pageno.value
    };

    var url = new URL("http://localhost/TehnologiiWeb/app/api/articol");
    url.search = new URLSearchParams(content).toString();

    fetch(url)
        .then(function(resp) {
            return resp.json();
        })
        .then(function(jsonResp) {
            if (jsonResp.hasOwnProperty('response')) {
                if (jsonResp.response.includes("no result")) { container.textContent = "No results."; }
            } else {
                var rest = 5 - jsonResp.length;
                jsonResp.forEach(function(data) {
                    drawArticle(data);
                });
                for (var i = 0; i < rest; i++)
                    drawPadding();
            }

            var url = new URL("http://localhost/TehnologiiWeb/app/api/chart");
            url.search = new URLSearchParams(content).toString();
            return fetch(url)
                .then(function(resp) {
                    return resp.json();
                })
                .then(function(jsonResp) {
                    if (jsonResp.hasOwnProperty('response')) {
                        if (jsonResp.response.includes("Invalid")) {
                            var date = document.createTextNode(jsonResp.response);
                            container.appendChild = date;
                        }
                    } else {
                        switch (jsonResp.selecteazagr) {
                            case 'Pie':
                                drawPie(jsonResp);
                                break;
                            case 'Line':
                                drawLine(jsonResp);
                                break;
                            case 'Bar':
                                drawBar(jsonResp);
                                break;
                        }
                    }
                    submitBtn.removeAttribute("disabled");
                    submitBtn.textContent = 'Search';
                }).catch(function(err) {
                    submitBtn.removeAttribute("disabled");
                    submitBtn.textContent = 'Search';
                    console.log(err);
                    return;
                });

        }).catch(function(err) {
            console.log(err);
            submitBtn.removeAttribute("disabled");
            submitBtn.textContent = 'Search';
            return;
        });



}


function drawArticle(data) {
    var detalii = data['summary'].split(":");
    if (detalii[0] == "") detalii[0] = "Unknown";
    if (detalii[1] == null) detalii[1] = "Unknown";

    var articol = document.createElement("article");
    articol.setAttribute("class", "articol");

    var dateCont = document.createElement("h4");
    var descCont = document.createElement("h4");
    var seeMoreCont = document.createElement("h4");

    var date = document.createTextNode("Date: " + detalii[0]);
    dateCont.appendChild(date);

    var desc = document.createTextNode("Summary: " + detalii[1]);
    descCont.appendChild(desc);

    var seeMore = document.createElement("a");
    seeMore.setAttribute("href", "seemore?eventid=" + data['eventid']);
    seeMore.setAttribute("class", "butonSee");

    var seeMoreText = document.createTextNode("See More");
    seeMore.appendChild(seeMoreText);
    seeMoreCont.appendChild(seeMore);


    articol.appendChild(dateCont);
    articol.appendChild(descCont);
    articol.appendChild(seeMoreCont);

    container.appendChild(articol);
}

function drawPadding() {
    var emptyDiv = document.createElement("div");
    emptyDiv.setAttribute("class","articolGol");
    container.appendChild(emptyDiv);
}

function drawLine(data) {
    var wrapper = document.createElement("div");
    wrapper.setAttribute("id", "chartdiv");
    container.appendChild(wrapper);

    am4core.ready(function() {

        am4core.useTheme(am4themes_dataviz);
        am4core.useTheme(am4themes_animated);

        var chart = am4core.create("chartdiv", am4charts.XYChart);

        var data = [];
        var value = 50;
        chart.data = data.dateGrafic;

        var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
        dateAxis.renderer.minGridDistance = 60;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

        var series = chart.series.push(new am4charts.LineSeries());
        series.dataFields.valueY = "numarAtacuri";
        series.dataFields.dateX = data.tipdategrafic;
        series.tooltipText = "{numarAtacuri}"

        series.tooltip.pointerOrientation = "vertical";

        chart.cursor = new am4charts.XYCursor();
        chart.cursor.snapToSeries = series;
        chart.cursor.xAxis = dateAxis;

        //chart.scrollbarY = new am4core.Scrollbar();
        chart.scrollbarX = new am4core.Scrollbar();

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
        chart.exporting.menu.items[0].icon = "../resurse/Poze/SaveIcon.png";
    });
}

function drawBar(data) {
    var wrapper = document.createElement("div");
    wrapper.setAttribute("id", "chartdiv");
    container.appendChild(wrapper);

    am4core.ready(function() {

        am4core.useTheme(am4themes_dataviz);
        am4core.useTheme(am4themes_animated);

        var chart = am4core.create("chartdiv", am4charts.XYChart);

        chart.data = data.dateGrafic;

        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = data.tipdategrafic;
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
        series.dataFields.categoryX = data.tipdategrafic;
        series.name = "Attacks";
        series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
        series.columns.template.fillOpacity = .8;

        var columnTemplate = series.columns.template;
        columnTemplate.strokeWidth = 2;
        columnTemplate.strokeOpacity = 1;


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
        chart.exporting.menu.items[0].icon = "../resurse/Poze/SaveIcon.png";
    });
}

function drawPie(data) {
    var wrapper = document.createElement("div");
    wrapper.setAttribute("id", "chartdiv");
    container.appendChild(wrapper);
    var lwrapper = document.createElement("div");
    lwrapper.setAttribute("id", "legendDiv");
    container.appendChild(lwrapper);

    am4core.ready(function() {

        am4core.useTheme(am4themes_dataviz);

        var chart = am4core.create("chartdiv", am4charts.PieChart);


        chart.hiddenState.properties.opacity = 0;

        chart.legend = new am4charts.Legend();
        var legendContainer = am4core.create("legendDiv", am4core.Container);
        chart.legend.parent = legendContainer;

        legendContainer.width = am4core.percent(100);


        chart.data = data.dateGrafic;

        chart.innerRadius = 100;

        var series = chart.series.push(new am4charts.PieSeries());
        series.dataFields.value = "numarAtacuri";
        series.dataFields.category = data.tipdategrafic;

        series.labels.template.maxWidth = 130;
        series.labels.template.wrap = true;

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
        chart.exporting.menu.items[0].icon = "../resurse/Poze/SaveIcon.png";
        //series.alignLabels = false;
    });

}



/*
- si protectii xss/sqli(escape javascript sau php)


final:
+documentatii, Scoatem console_log(verificam tot codul + comentarii + stilizari)

*/