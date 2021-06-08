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

let submitBtn = document.getElementById("search");
let articole = document.getElementById("articole");

submitBtn.addEventListener("click", onClick);

function onClick() {
  articole.innerHTML = "";
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
    tipdategrafic: tipdategrafic.value
  };

  var url = new URL("http://localhost/TehnologiiWeb/app/api/articol");
  url.search = new URLSearchParams(content).toString();

  //aici generez paginarea+event listenerele pt paginare
  fetch(url)
    .then(function (resp) {
      if (resp != "")
        return resp.json();
      else return "";
    })
    .then(function (jsonResp) {
      jsonResp.forEach(function(data) {
        drawArticle(data);
      });
      submitBtn.removeAttribute("disabled");
      submitBtn.textContent = 'Search';
    }).catch(function (err) {
      console.log(err);
    });

  //inca un fetch pt grafice
}


function drawArticle(data) {
  var detalii = data['summary'].split(":");
  if(detalii[0] == "") detalii[0] = "Unknown";
  if(detalii[1] == null) detalii[1] = "Unknown";
  
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
  seeMore.setAttribute("href", "seemore.html?eventid=" + data['eventid']);
  seeMore.setAttribute("class", "butonSee");

  var seeMoreText = document.createTextNode("See More");
  seeMore.appendChild(seeMoreText);
  seeMoreCont.appendChild(seeMore);


  articol.appendChild(dateCont);
  articol.appendChild(descCont);
  articol.appendChild(seeMoreCont);

  articole.appendChild(articol);

}

/*sa primesc cumva nr total de rezultate sa pot construi paginarea
sa pot primi cate 5(or less)(array.length)
(trimit nr paginii ca parametru si fac SELECT ... LIMIT (%pagenumber%-1)*5, 5;)


maxim cate 5
in functie de nr rezultat, generez si paginarea, gen butoanele, si afisez la fiecare event listener
ca sa stiu cand schimb pagina

Sa facem 2 sectiuni separate articole si grafice, in care sa se incadreze mereu
Sa facem ca initial sa scrie un text, niciun articol sau grafic. alea sa le generam abia dupa un search.


implementez see more, mesajul de no content la filtrare(sau nu)*/