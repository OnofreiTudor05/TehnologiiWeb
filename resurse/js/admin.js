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
    pageno: pageno.value
  };

  var url = new URL("http://localhost/TehnologiiWeb/app/api/articol");
  url.search = new URLSearchParams(content).toString();

  fetch(url)
    .then(function (resp) {
      return resp.json();
    })
    .then(function (jsonResp) {
      if (jsonResp.hasOwnProperty('response')) {
        if (jsonResp.response.includes("no result"));//set emptyMsg
      }
      else {
        jsonResp.forEach(function (data) {
          drawArticle(data);
        });
      }
      submitBtn.removeAttribute("disabled");
      submitBtn.textContent = 'Search';
    }).catch(function (err) {
      console.log(err);
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

  var edit = document.createElement("a");
  edit.setAttribute("href", "edit?eventid=" + data['eventid']);
  edit.setAttribute("class", "butonSee");
  var editText = document.createTextNode("Edit");
  edit.appendChild(editText);

  var seeMore = document.createElement("a");
  seeMore.setAttribute("href", "seemore?eventid=" + data['eventid']);
  seeMore.setAttribute("class", "butonSee");
  var seeMoreText = document.createTextNode("See More");
  seeMore.appendChild(seeMoreText);

  var deleteBtn = document.createElement("a");
  deleteBtn.setAttribute("href", "delete?eventid=" + data['eventid']);
  deleteBtn.setAttribute("class", "butonSee");
  var deleteText = document.createTextNode("Delete");
  deleteBtn.appendChild(deleteText);

  seeMoreCont.appendChild(edit);
  seeMoreCont.appendChild(seeMore);
  seeMoreCont.appendChild(deleteBtn);


  articol.appendChild(dateCont);
  articol.appendChild(descCont);
  articol.appendChild(seeMoreCont);

  container.appendChild(articol);
}


/*<article class="articol">
<h3>
  Date: 01/01/1998
</h3>
<h3>
  Hutu Rebels attacked a Burundi military target at Bujumbura Airport. The attack resulted in 104 fatalities,
  including 100 perpetrators, and six injuries.
</h3>
<h3>
  <button class="butonSee"> Edit </button>
  <a href="#" class="butonSee">See More</a>
  <button class="butonSee"> Delete </button>
</h3>
</article>*/