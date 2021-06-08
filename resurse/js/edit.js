let backbutton = document.getElementById("backbutton");

backbutton.addEventListener("click", onClick);

var url = new URL(document.URL);
var queryid = url.searchParams.get("eventid");
let errorMsg = document.getElementById("errorMsg");
if (queryid == null) errorMsg.textContent = "No id provided"


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

let iyearactual = document.getElementById("iyearactual");
let imonthactual = document.getElementById("imonthactual");
let idayactual = document.getElementById("idayactual");
let countryactual = document.getElementById("countryactual");
let country_txtactual = document.getElementById("country_txtactual");
let regionactual = document.getElementById("regionactual");
let region_txtactual = document.getElementById("region_txtactual");
let provstateactual = document.getElementById("provstateactual");
let cityactual = document.getElementById("cityactual");
let latitudeactual = document.getElementById("latitudeactual");
let longitudeactual = document.getElementById("longitudeactual");
let locatieactual = document.getElementById("locationactual");
let summaryactual = document.getElementById("summaryactual");
let successactual = document.getElementById("successactual");
let suicideactual = document.getElementById("suicideactual");
let attacktype1actual = document.getElementById("attacktype1actual");
let attacktype1_txtactual = document.getElementById("attacktype1_txtactual");
let targtype1actual = document.getElementById("targtype1actual");
let targtype1_txtactual = document.getElementById("targtype1_txtactual");
let targsubtype1actual = document.getElementById("targsubtype1actual");
let targsubtype1_txtactual = document.getElementById("targsubtype1_txtactual");
let corp1actual = document.getElementById("corp1actual");
let target1actual = document.getElementById("target1actual");
let natlty1actual = document.getElementById("natlty1actual");
let natlty1_txtactual = document.getElementById("natlty1_txtactual");
let gnameactual = document.getElementById("gnameactual");
let weaptype1actual = document.getElementById("weaptype1actual");
let weaptype1_txtactual = document.getElementById("weaptype1_txtactual");
let weapsubtype1actual = document.getElementById("weapsubtype1actual");
let weapsubtype1_txtactual = document.getElementById("weapsubtype1_txtactual");
let weapdetailactual = document.getElementById("weapdetailactual");
let nkillactual = document.getElementById("nkillactual");
let nhostkidactual = document.getElementById("nhostkidactual");
let propextentactual = document.getElementById("propextentactual");
let propextent_txtactual = document.getElementById("propextent_txtactual");
let ransomactual = document.getElementById("ransomactual");
let ransomamtactual = document.getElementById("ransomamtactual");
let addnotesactual = document.getElementById("addnotesactual");
let scite1actual = document.getElementById("scite1actual");
let scite2actual = document.getElementById("scite2actual");
let scite3actual = document.getElementById("scite3actual");

let submitBtn = document.getElementById("submit");
submitBtn.addEventListener("click", onSubmit);

function onSubmit() {
    submitBtn.setAttribute("disabled", true);

    var content = {
        iyear: parseInt(iyear.value),
        imonth: parseInt(imonth.value),
        iday: parseInt(iday.value),
        country: parseInt(country.value),
        country_txt: country_txt.value,
        region: parseInt(region.value),
        region_txt: region_txt.value,
        provstate: provstate.value,
        city: city.value,
        latitude: parseFloat(latitude.value),
        longitude: parseFloat(longitude.value),
        locatie: locatie.value,
        summary: summary.value,
        success: parseInt(success.value),
        suicide: parseInt(suicide.value),
        attacktype1: parseInt(attacktype1.value),
        attacktype1_txt: attacktype1_txt.value,
        targtype1: parseInt(targtype1.value),
        targtype1_txt: targtype1_txt.value,
        targsubtype1: parseInt(targsubtype1.value),
        targsubtype1_txt: targsubtype1_txt.value,
        corp1: corp1.value,
        target1: target1.value,
        natlty1: parseInt(natlty1.value),
        natlty1_txt: natlty1_txt.value,
        gname: gname.value,
        weaptype1: parseInt(weaptype1.value),
        weaptype1_txt: weaptype1_txt.value,
        weapsubtype1: parseInt(weapsubtype1.value),
        weapsubtype1_txt: weapsubtype1_txt.value,
        weapdetail: weapdetail.value,
        nkill: nkill.value,
        nhostkid: nhostkid.value,
        propextent: propextent.value,
        propextent_txt: propextent_txt.value,
        ransom: parseInt(ransom.value),
        ransomamt: ransomamt.value,
        addnotes: addnotes.value,
        scite1: scite1.value,
        scite2: scite2.value,
        scite3: scite3.value
    };

    fetch("../app/api/attack/" + queryid, { method: "PUT", body: JSON.stringify(content) })
        .then(function (resp) {
            return resp.json();
        })
        .then(function (jsonResp) {
            errorMsg.textContent = jsonResp.response;
            iyear.value = "";
            imonth.value = "";
            iday.value = "";
            country.value = "";
            country_txt.value = "";
            region.value = "";
            region_txt.value = "";
            provstate.value = "";
            city.value = "";
            latitude.value = "";
            longitude.value = "";
            locatie.value = "";
            summary.value = "";
            success.value = "";
            suicide.value = "";
            attacktype1.value = "";
            attacktype1_txt.value = "";
            targtype1.value = "";
            targtype1_txt.value = "";
            targsubtype1.value = "";
            targsubtype1_txt.value = "";
            corp1.value = "";
            target1.value = "";
            natlty1.value = "";
            natlty1_txt.value = "";
            gname.value = "";
            weaptype1.value = "";
            weaptype1_txt.value = "";
            weapsubtype1.value = "";
            weapsubtype1_txt.value = "";
            weapdetail.value = "";
            nkill.value = "";
            nhostkid.value = "";
            propextent.value = "";
            propextent_txt.value = "";
            ransom.value = "";
            ransomamt.value = "";
            addnotes.value = "";
            scite1.value = "";
            scite2.value = "";
            scite3.value = "";
            submitBtn.removeAttribute("disabled");
            submitBtn.textContent = 'Edit';
        }).catch(function (err) {
            console.log(err);
        })
}


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
    iyearactual.textContent = data.iyear;
    imonthactual.textContent = data.imonth;
    idayactual.textContent = data.iday;
    countryactual.textContent = data.country;
    country_txtactual.textContent = data.country_txt;
    regionactual.textContent = data.region;
    region_txtactual.textContent = data.region_txt;
    provstateactual.textContent = data.provstate;
    cityactual.textContent = data.city;
    latitudeactual.textContent = data.latitude;
    longitudeactual.textContent = data.longitude;
    locatieactual.textContent = data.location;
    summaryactual.textContent = data.summary;
    successactual.textContent = data.success;
    suicideactual.textContent = data.suicide;
    attacktype1actual.textContent = data.attacktype1;
    attacktype1_txtactual.textContent = data.attacktype1_txt;
    targtype1actual.textContent = data.targtype1;
    targtype1_txtactual.textContent = data.targtype1_txt;
    targsubtype1actual.textContent = data.targsubtype1;
    targsubtype1_txtactual.textContent = data.targsubtype1_txt;
    corp1actual.textContent = data.corp1;
    target1actual.textContent = data.target1;
    natlty1actual.textContent = data.natlty1;
    natlty1_txtactual.textContent = data.natlty1_txt;
    gnameactual.textContent = data.gname;
    weaptype1actual.textContent = data.weaptype1;
    weaptype1_txtactual.textContent = data.weaptype1_txt;
    weapsubtype1actual.textContent = data.weapsubtype1;
    weapsubtype1_txtactual.textContent = data.weapsubtype1_txt;
    weapdetailactual.textContent = data.weapdetail;
    nkillactual.textContent = data.nkill;
    nhostkidactual.textContent = data.nhostkid;
    propextentactual.textContent = data.propextent;
    propextent_txtactual.textContent = data.propextent_txt;
    ransomactual.textContent = data.ransom;
    ransomamtactual.textContent = data.ransomamt;
    addnotesactual.textContent = data.addnotes;
    scite1actual.textContent = data.scite1;
    scite2actual.textContent = data.scite2;
    scite3actual.textContent = data.scite3;
}

function onClick() {
    window.history.back();
}