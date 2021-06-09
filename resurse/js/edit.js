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
        location: locatie.value,
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
            submitBtn.removeAttribute("disabled");
            submitBtn.textContent = 'Edit';
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
    if (data.iyear != "") {
        iyearactual.textContent = data.iyear;
    }
    else {
        iyearactual.textContent = "null";
    }
    if (data.imonth != "") {
        imonthactual.textContent = data.imonth;
    }
    else {
        imonthactual.textContent = "null";
    }
    if (data.iday != "") {
        idayactual.textContent = data.iday;
    }
    else {
        idayactual.textContent = "null";
    }
    if (data.country != "") {
        countryactual.textContent = data.country;
    }
    else {
        countryactual.textContent = "null";
    }
    if (data.country_txt != "") {
        country_txtactual.textContent = data.country_txt;
    }
    else {
        country_txtactual.textContent = "null";
    }
    if (data.region != "") {
        regionactual.textContent = data.region;
    }
    else {
        regionactual.textContent = "null";
    }
    if (data.region_txt != "") {
        region_txtactual.textContent = data.region_txt;
    }
    else {
        region_txtactual.textContent = "null";
    }
    if (data.provstate != "") {
        provstateactual.textContent = data.provstate;
    }
    else {
        provstateactual.textContent = "null";
    }
    if (data.city != "") {
        cityactual.textContent = data.city;
    }
    else {
        cityactual.textContent = "null";
    }
    if (data.latitude != "") {
        latitudeactual.textContent = data.latitude;
    }
    else {
        latitudeactual.textContent = "null";
    }
    if (data.longitude != "") {
        longitudeactual.textContent = data.longitude;
    }
    else {
        longitudeactual.textContent = "null";
    }
    if (data.location != "") {
        locatieactual.textContent = data.location;
    }
    else {
        locatieactual.textContent = "null";
    }
    if (data.summary != "") {
        summaryactual.textContent = data.summary;
    }
    else {
        summaryactual.textContent = "null";
    }
    if (data.success != "") {
        successactual.textContent = data.success;
    }
    else {
        successactual.textContent = "null";
    }
    if (data.suicide != "") {
        suicideactual.textContent = data.suicide;
    }
    else {
        suicideactual.textContent = "null";
    }
    if (data.attacktype1 != "") {
        attacktype1actual.textContent = data.attacktype1;
    }
    else {
        attacktype1actual.textContent = "null";
    }
    if (data.attacktype1_txt != "") {
        attacktype1_txtactual.textContent = data.attacktype1_txt;
    }
    else {
        attacktype1_txtactual.textContent = "null";
    }
    if (data.targtype1 != "") {
        targtype1actual.textContent = data.targtype1;
    }
    else {
        targtype1actual.textContent = "null";
    }
    if (data.targtype1_txt != "") {
        targtype1_txtactual.textContent = data.targtype1_txt;
    }
    else {
        targtype1_txtactual.textContent = "null";
    }
    if (data.targsubtype1 != "") {
        targsubtype1actual.textContent = data.targsubtype1;
    }
    else {
        targsubtype1actual.textContent = "null";
    }
    if (data.targsubtype1_txt != "") {
        targsubtype1_txtactual.textContent = data.targsubtype1_txt;
    }
    else {
        targsubtype1_txtactual.textContent = "null";
    }
    if (data.corp1 != "") {
        corp1actual.textContent = data.corp1;
    }
    else {
        corp1actual.textContent = "null";
    }
    if (data.target1 != "") {
        target1actual.textContent = data.target1;
    }
    else {
        target1actual.textContent = "null";
    }
    if (data.natlty1 != "") {
        natlty1actual.textContent = data.natlty1;
    }
    else {
        natlty1actual.textContent = "null";
    }
    if (data.natlty1_txt != "") {
        natlty1_txtactual.textContent = data.natlty1_txt;
    }
    else {
        natlty1_txtactual.textContent = "null";
    }
    if (data.gname != "") {
        gnameactual.textContent = data.gname;
    }
    else {
        gnameactual.textContent = "null";
    }
    if (data.weaptype1 != "") {
        weaptype1actual.textContent = data.weaptype1;
    }
    else {
        weaptype1actual.textContent = "null";
    }
    if (data.weaptype1_txt != "") {
        weaptype1_txtactual.textContent = data.weaptype1_txt;
    }
    else {
        weaptype1_txtactual.textContent = "null";
    }
    if (data.weapsubtype1 != "") {
        weapsubtype1actual.textContent = data.weapsubtype1;
    }
    else {
        weapsubtype1actual.textContent = "null";
    }
    if (data.weapsubtype1_txt != "") {
        weapsubtype1_txtactual.textContent = data.weapsubtype1_txt;
    }
    else {
        weapsubtype1_txtactual.textContent = "null";
    }
    if (data.weapdetail != "") {
        weapdetailactual.textContent = data.weapdetail;
    }
    else {
        weapdetailactual.textContent = "null";
    }
    if (data.nkill != "") {
        nkillactual.textContent = data.nkill;
    }
    else {
        nkillactual.textContent = "null";
    }
    if (data.nhostkid != "") {
        nhostkidactual.textContent = data.nhostkid;
    }
    else {
        nhostkidactual.textContent = "null";
    }
    if (data.propextent != "") {
        propextentactual.textContent = data.propextent;
    }
    else {
        propextentactual.textContent = "null";
    }
    if (data.propextent_txt != "") {
        propextent_txtactual.textContent = data.propextent_txt;
    }
    else {
        propextent_txtactual.textContent = "null";
    }
    if (data.ransom != "") {
        ransomactual.textContent = data.ransom;
    }
    else {
        ransomactual.textContent = "null";
    }
    if (data.ransomamt != "") {
        ransomamtactual.textContent = data.ransomamt;
    }
    else {
        ransomamtactual.textContent = "null";
    }
    if (data.addnotes != "") {
        addnotesactual.textContent = data.addnotes;
    }
    else {
        addnotesactual.textContent = "null";
    }
    if (data.scite1 != "") {
        scite1actual.textContent = data.scite1;
    }
    else {
        scite1actual.textContent = "null";
    }
    if (data.scite2 != "") {
        scite2actual.textContent = data.scite2;
    }
    else {
        scite2actual.textContent = "null";
    }
    if (data.scite3 != "") {
        scite3actual.textContent = data.scite3;
    }
    else {
        scite3actual.textContent = "null";
    }
}

function onClick() {
    window.history.back();
}