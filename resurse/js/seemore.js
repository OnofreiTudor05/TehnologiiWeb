let backbutton = document.getElementById("backbutton");

backbutton.addEventListener("click", onClick);

var url = new URL(document.URL);
var queryid = url.searchParams.get("eventid");
let errorMsg = document.getElementById("errorMsg");
if (queryid == null) errorMsg.textContent = "No id provided"

let eventid = document.getElementById("eventid");
let iyear = document.getElementById("iyear");
let imonth = document.getElementById("imonth");
let iday = document.getElementById("iday");
let country = document.getElementById("country");
let country_txt = document.getElementById("country_txt");
let region = document.getElementById("region");
let region_txt = document.getElementById("region_txt");
let provstate = document.getElementById("provstate");
let city = document.getElementById("city");
let latitude = document.getElementById("latitude");
let longitude = document.getElementById("longitude");
let locatie = document.getElementById("location");
let summary = document.getElementById("summary");
let success = document.getElementById("success");
let suicide = document.getElementById("suicide");
let attacktype1 = document.getElementById("attacktype1");
let attacktype1_txt = document.getElementById("attacktype1_txt");
let targtype1 = document.getElementById("targtype1");
let targtype1_txt = document.getElementById("targtype1_txt");
let targsubtype1 = document.getElementById("targsubtype1");
let targsubtype1_txt = document.getElementById("targsubtype1_txt");
let corp1 = document.getElementById("corp1");
let target1 = document.getElementById("target1");
let natlty1 = document.getElementById("natlty1");
let natlty1_txt = document.getElementById("natlty1_txt");
let gname = document.getElementById("gname");
let weaptype1 = document.getElementById("weaptype1");
let weaptype1_txt = document.getElementById("weaptype1_txt");
let weapsubtype1 = document.getElementById("weapsubtype1");
let weapsubtype1_txt = document.getElementById("weapsubtype1_txt");
let weapdetail = document.getElementById("weapdetail");
let nkill = document.getElementById("nkill");
let nhostkid = document.getElementById("nhostkid");
let propextent = document.getElementById("propextent");
let propextent_txt = document.getElementById("propextent_txt");
let ransom = document.getElementById("ransom");
let ransomamt = document.getElementById("ransomamt");
let addnotes = document.getElementById("addnotes");
let scite1 = document.getElementById("scite1");
let scite2 = document.getElementById("scite2");
let scite3 = document.getElementById("scite3");

// functie in care se face fetch la datele din baza de date folosind eventid-ul atacului

fetch("../app/api/attack/" + queryid)
    .then(function (resp) {
       return resp.json();
    })
    .then(function (jsonResp) {
        if (jsonResp.hasOwnProperty('response')) {
            if (jsonResp.response.includes("no result")) { errorMsg.textContent = "Invalid id"; }
        }
        else setData(jsonResp);
    }).catch(function (err) {
        console.log(err);
    });

function setData(data) {
    eventid.textContent = data.eventid;
    iyear.textContent = data.iyear;
    imonth.textContent = data.imonth;
    iday.textContent = data.iday;
    country.textContent = data.country;
    country_txt.textContent = data.country_txt;
    region.textContent = data.region;
    region_txt.textContent = data.region_txt;
    provstate.textContent = data.provstate;
    city.textContent = data.city;
    latitude.textContent = data.latitude;
    longitude.textContent = data.longitude;
    locatie.textContent = data.location;
    summary.textContent = data.summary;
    success.textContent = data.success;
    suicide.textContent = data.suicide;
    attacktype1.textContent = data.attacktype1;
    attacktype1_txt.textContent = data.attacktype1_txt;
    targtype1.textContent = data.targtype1;
    targtype1_txt.textContent = data.targtype1_txt;
    targsubtype1.textContent = data.targsubtype1;
    targsubtype1_txt.textContent = data.targsubtype1_txt;
    corp1.textContent = data.corp1;
    target1.textContent = data.target1;
    natlty1.textContent = data.natlty1;
    natlty1_txt.textContent = data.natlty1_txt;
    gname.textContent = data.gname;
    weaptype1.textContent = data.weaptype1;
    weaptype1_txt.textContent = data.weaptype1_txt;
    weapsubtype1.textContent = data.weapsubtype1;
    weapsubtype1_txt.textContent = data.weapsubtype1_txt;
    weapdetail.textContent = data.weapdetail;
    nkill.textContent = data.nkill;
    nhostkid.textContent = data.nhostkid;
    propextent.textContent = data.propextent;
    propextent_txt.textContent = data.propextent_txt;
    ransom.textContent = data.ransom;
    ransomamt.textContent = data.ransomamt;
    addnotes.textContent = data.addnotes;
    scite1.textContent = data.scite1;
    scite2.textContent = data.scite2;
    scite3.textContent = data.scite3;
}

function onClick() {
    window.history.back();
}