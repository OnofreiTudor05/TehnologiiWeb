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
        if (jsonResp.response.includes("no result")){container.textContent = "No results.";}
      }
      else {
        drawMap();
      }
      submitBtn.removeAttribute("disabled");
      submitBtn.textContent = 'Search';
    }).catch(function (err) {
      console.log(err);
    });
}

function drawMap() {
  var img = document.createElement("img");
  img.setAttribute("class", "map");
  img.setAttribute("src", "../resurse/Poze/map.jpg");
  img.setAttribute("alt", "Harta");
  container.appendChild(img);
}