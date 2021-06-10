let backbutton = document.getElementById("backbutton");

backbutton.addEventListener("click", onClick);

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

let submitBtn = document.getElementById("submit");
submitBtn.addEventListener("click", onSubmit);

let errorMsg = document.getElementById("errorMsg");

// fetch pentru adugarea in baza de date a articolelor
function onSubmit() {
    submitBtn.setAttribute("disabled", true);

    var content = {
        eventid: parseInt(eventid.value),
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

    fetch("../app/api/attack", { method: "POST", body: JSON.stringify(content) })
        .then(function(resp) {
            return resp.json();
        })
        .then(function(jsonResp) {
            errorMsg.textContent = jsonResp.response;
            eventid.value = "";
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
            submitBtn.textContent = 'Add';
        }).catch(function(err) {
            submitBtn.removeAttribute("disabled");
            submitBtn.textContent = 'Add';
            console.log(err);
        })
}


function onClick() {
    window.history.back();
}