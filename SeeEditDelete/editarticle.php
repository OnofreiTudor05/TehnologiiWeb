<?php

$conn = mysqli_connect("localhost","root","","bazadatetw");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

  $eventid = $_POST['eventid'];
  $iyear = $_POST['iyear'];
  $imonth = $_POST['imonth'];
  $iday = $_POST['iday'];
  $country = $_POST['country'];
  $country_txt = $_POST['country_txt'];
  $region = $_POST['region'];
  $region_txt = $_POST['region_txt'];
  $provstate = $_POST['provstate'];
  $city = $_POST['city'];
  $latitude = $_POST['latitude'];
  $longitude = $_POST['longitude'];
  $location = $_POST['location'];
  $summary = $_POST['summary'];
  $success = $_POST['success'];
  $suicide = $_POST['suicide'];
  $attacktype1 = $_POST['attacktype1'];
  $attacktype1_txt = $_POST['attacktype1_txt'];
  $targtype1 = $_POST['targtype1'];
  $targtype1_txt = $_POST['targtype1_txt'];
  $targsubtype1 = $_POST['targsubtype1'];
  $targsubtype1_txt = $_POST['targsubtype1_txt'];
  $corp1 = $_POST['corp1'];
  $target1 = $_POST['target1'];
  $natlty1 = $_POST['natlty1'];
  $natlty1_txt = $_POST['natlty1_txt'];
  $gname = $_POST['gname'];
  $weaptype1 = $_POST['weaptype1'];
  $weaptype1_txt = $_POST['weaptype1_txt'];
  $weapsubtype1 = $_POST['weapsubtype1'];
  $weapsubtype1_txt = $_POST['weapsubtype1_txt'];
  $weapdetail = $_POST['weapdetail'];
  $nkill = $_POST['nkill'];
  $nhostkid = $_POST['nhostkid'];
  $propextent = $_POST['propextent'];
  $propextent_txt = $_POST['propextent_txt'];
  $ransom = $_POST['ransom'];
  $ransomamt = $_POST['ransomamt'];
  $addnotes = $_POST['addnotes'];
  $scite1 = $_POST['scite1'];
  $scite2 = $_POST['scite2'];
  $scite3 = $_POST['scite3'];

  $eventidactual = $_POST['eventidactual'];
  $iyearactual = $_POST['iyearactual'];
  $imonthactual = $_POST['imonthactual'];
  $idayactual = $_POST['idayactual'];
  $countryactual = $_POST['countryactual'];
  $country_txtactual = $_POST['country_txtactual'];
  $regionactual = $_POST['regionactual'];
  $region_txtactual = $_POST['region_txtactual'];
  $provstateactual = $_POST['provstateactual'];
  $cityactual = $_POST['cityactual'];
  $latitudeactual = $_POST['latitudeactual'];
  $longitudeactual = $_POST['longitudeactual'];
  $locationactual = $_POST['locationactual'];
  $summaryactual = $_POST['summaryactual'];
  $successactual = $_POST['successactual'];
  $suicideactual = $_POST['suicideactual'];
  $attacktype1actual = $_POST['attacktype1actual'];
  $attacktype1_txtactual = $_POST['attacktype1_txtactual'];
  $targtype1actual = $_POST['targtype1actual'];
  $targtype1_txtactual = $_POST['targtype1_txtactual'];
  $targsubtype1actual = $_POST['targsubtype1actual'];
  $targsubtype1_txtactual = $_POST['targsubtype1_txtactual'];
  $corp1actual = $_POST['corp1actual'];
  $target1actual = $_POST['target1actual'];
  $natlty1actual = $_POST['natlty1actual'];
  $natlty1_txtactual = $_POST['natlty1_txtactual'];
  $gnameactual = $_POST['gnameactual'];
  $weaptype1actual = $_POST['weaptype1actual'];
  $weaptype1_txtactual = $_POST['weaptype1_txtactual'];
  $weapsubtype1actual = $_POST['weapsubtype1actual'];
  $weapsubtype1_txtactual = $_POST['weapsubtype1_txtactual'];
  $weapdetailactual = $_POST['weapdetailactual'];
  $nkillactual = $_POST['nkillactual'];
  $nhostkidactual = $_POST['nhostkidactual'];
  $propextentactual = $_POST['propextentactual'];
  $propextent_txtactual = $_POST['propextent_txtactual'];
  $ransomactual = $_POST['ransomactual'];
  $ransomamtactual = $_POST['ransomamtactual'];
  $addnotesactual = $_POST['addnotesactual'];
  $scite1actual = $_POST['scite1actual'];
  $scite2actual = $_POST['scite2actual'];
  $scite3actual = $_POST['scite3actual'];


  $conditions = array();

  if(empty($eventid)) {
    $conditions[] = "eventid=$eventidactual";
  }
  else {
    $conditions[] = "eventid=$eventid";
  }

  if(empty($iyear)) {
    $conditions[] = "iyear=$iyearactual";
  }
  else {
    $conditions[] = "iyear=$iyear"; 
  }

  if(empty($imonth)) {
    $conditions[] = "imonth=$imonthactual";
  }
  else {
    $conditions[] = "imonth=$imonth"; 
  }

  if(empty($iday)) {
    $conditions[] = "iday=$idayactual";
  }
  else {
    $conditions[] = "iday=$iday"; 
  }

  if(empty($country)) { //dependenta de country_txt
    $conditions[] = "country=$countryactual";
  }
  else {
    $conditions[] = "country=$country"; //id tari necunoscute = 0
  }

  if(empty($country_txt)) { //dependenta de country
    $conditions[] = "country_txt='$country_txtactual'";
  }
  else {
    $conditions[] = "country_txt='$country_txt'"; // tara necunoscuta
  }

  if(empty($region)) { //dependenta de region_txt
    $conditions[] = "region=$regionactual";
  }
  else {
    $conditions[] = "region=$region"; //id regiuni necunoscute = 0
  }

  if(empty($region_txt)) { //dependenta de region
    $conditions[] = "region_txt='$region_txtactual'";
  }
  else {
    $conditions[] = "region_txt='$region_txt'"; // regiune necunoscuta
  }

  if(empty($provstate)) { 
    $conditions[] = "provstate='$provstateactual'";
  }
  else {
    $conditions[] = "provstate='$provstate'"; 
  }

  if(empty($city)) { 
    $conditions[] = "city='$cityactual'";
  }
  else {
    $conditions[] = "city='$city'"; 
  }

  if(empty($latitude)) { 
    $conditions[] = "latitude=$latitudeactual"; 
  }
  else {
    $conditions[] = "latitude=$latitude"; //null pentru locatii necunoscute
  }

  if(empty($longitude)) { 
    $conditions[] = "longitude=$longitudeactual"; 
  }
  else {
    $conditions[] = "longitude=$longitude"; //null pentru locatii necunoscute
  }

  if(empty($location)) { 
    $conditions[] = "location='$locationactual'";
  }
  else {
    $conditions[] = "location='$location'"; 
  }

  if(empty($summary)) { 
    $conditions[] = "summary='$summaryactual'";
  }
  else {
    $conditions[] = "summary='$summary'"; 
  }

  if(empty($success)) { 
    $conditions[] = "success=$successactual";
  }
  else {
    $conditions[] = "success=$success"; 
  }

  if(empty($suicide)) { 
    $conditions[] = "suicide=$suicideactual";
  }
  else {
    $conditions[] = "suicide=$suicide"; 
  }

  if(empty($attacktype1)) { //dependent de attacktype1_txt
    $conditions[] = "attacktype1=$attacktype1actual";
  }
  else {
    $conditions[] = "attacktype1=$attacktype1"; //id atac necunoscuta
  }

  if(empty($attacktype1_txt)) { //dependent de attacktype1
    $conditions[] = "attacktype1_txt='$attacktype1_txtactual'";
  }
  else {
    $conditions[] = "attacktype1_txt='$attacktype1_txt'"; //atac necunoscuta
  }

  if(empty($targtype1)) { 
    $conditions[] = "targtype1=$targtype1actual";
  }
  else {
    $conditions[] = "targtype1=$targtype1"; 
  }

  if(empty($targtype1_txt)) { 
    $conditions[] = "targtype1_txt='$targtype1_txtactual'";
  }
  else {
    $conditions[] = "targtype1_txt='$targtype1_txt'"; 
  }

  if(empty($targsubtype1)) { 
    $conditions[] = "targsubtype1=$targsubtype1actual";
  }
  else {
    $conditions[] = "targsubtype1=$targsubtype1"; 
  }

  if(empty($targsubtype1_txt)) { 
    $conditions[] = "targsubtype1_txt='$targsubtype1_txtactual'";
  }
  else {
    $conditions[] = "targsubtype1_txt='$targsubtype1_txt'"; 
  }

  if(empty($corp1)) { 
    $conditions[] = "corp1=$corp1actual";
  }
  else {
    $conditions[] = "corp1=$corp1"; 
  }

  if(empty($target1)) { 
    $conditions[] = "target1=$target1actual";
  }
  else {
    $conditions[] = "target1=$target1"; 
  }

  if(empty($natlty1)) { 
    $conditions[] = "natlty1=$natlty1actual";
  }
  else {
    $conditions[] = "natlty1=$natlty1"; 
  }

  if(empty($natlty1_txt)) { 
    $conditions[] = "natlty1_txt='$natlty1_txtactual'";
  }
  else {
    $conditions[] = "natlty1_txt='$natlty1_txt'"; 
  }

  if(empty($gname)) { 
    $conditions[] = "gname='$gnameactual'";
  }
  else {
    $conditions[] = "gname='$gname'"; 
  }

  if(empty($weaptype1)) { 
    $conditions[] = "weaptype1=$weaptype1actual";
  }
  else {
    $conditions[] = "weaptype1=$weaptype1"; 
  }

  if(empty($weaptype1_txt)) { 
    $conditions[] = "weaptype1_txt='$weaptype1_txtactual'";
  }
  else {
    $conditions[] = "weaptype1_txt='$weaptype1_txt'"; 
  }

  if(empty($weapsubtype1)) { 
    $conditions[] = "weapsubtype1=$weapsubtype1actual";
  }
  else {
    $conditions[] = "weapsubtype1=$weapsubtype1"; 
  }

  if(empty($weapsubtype1_txt)) { 
    $conditions[] = "weapsubtype1_txt='$weapsubtype1_txtactual'";
  }
  else {
    $conditions[] = "weapsubtype1_txt='$weapsubtype1_txt'"; 
  }

  if(empty($weapdetail)) { 
    $conditions[] = "weapdetail='$weapdetailactual'";
  }
  else {
    $conditions[] = "weapdetail='$weapdetail'"; 
  }

  if(empty($nkill)) { 
    $conditions[] = "nkill=$nkillactual";
  }
  else {
    $conditions[] = "nkill=$nkill"; 
  }

  if(empty($nhostkid)) { 
    $conditions[] = "nhostkid=$nhostkidactual";
  }
  else {
    $conditions[] = "nhostkid=$nhostkid"; 
  }

  if(empty($propextent)) { 
    $conditions[] = "propextent=$propextentactual";
  }
  else {
    $conditions[] = "propextent=$propextent"; 
  }

  if(empty($propextent_txt)) { 
    $conditions[] = "propextent_txt='$propextent_txtactual'";
  }
  else {
    $conditions[] = "propextent_txt='$propextent_txt'"; 
  }

  if(empty($ransom)) { 
    $conditions[] = "ransom=$ransomactual";
  }
  else {
    $conditions[] = "ransom=$ransom"; 
  }

  if(empty($ransomamt)) { 
    $conditions[] = "ransomamt=$ransomamtactual";
  }
  else {
    $conditions[] = "ransomamt=$ransomamt"; 
  }

  if(empty($addnotes)) { 
    $conditions[] = "addnotes='$addnotesactual'";
  }
  else {
    $conditions[] = "addnotes='$addnotes'"; 
  }

  if(empty($scite1)) { 
    $conditions[] = "scite1='$scite1actual'";
  }
  else {
    $conditions[] = "scite1='$scite1'"; 
  }

  if(empty($scite2)) { 
    $conditions[] = "scite2='$scite2actual'";
  }
  else {
    $conditions[] = "scite2='$scite2'"; 
  }

  if(empty($scite3)) { 
    $conditions[] = "scite3='$scite3actual'";
  }
  else {
    $conditions[] = "scite3='$scite3'"; 
  }

  $query = "UPDATE terorism SET ";


  if (count($conditions) > 0) {
    $sql = $query;
    $sql .= implode(',', $conditions);
    $sql .= "WHERE eventid=$eventid";
  }

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
