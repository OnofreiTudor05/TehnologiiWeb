let backbutton = document.getElementById("backbutton");

backbutton.addEventListener("click", onClick);

var url = new URL(document.URL);
var queryid = url.searchParams.get("eventid");
let errorMsg = document.getElementById("errorMsg");
if (queryid == null) errorMsg.textContent = "No id provided"

// functie care face fetch cu eventid-ul si sterge articolul din baza de date

fetch("../app/api/attack/" + queryid, {method: "DELETE"})
    .then(function (resp) {
       return resp.json();
    })
    .then(function (jsonResp) {
        if (jsonResp.hasOwnProperty('response')) {
            if (jsonResp.response.includes("no result")) { errorMsg.textContent = "Invalid id"; }
            else errorMsg.textContent = jsonResp.response;
        }
    }).catch(function (err) {
        console.log(err);
    });

function onClick() {
    window.history.back();
}