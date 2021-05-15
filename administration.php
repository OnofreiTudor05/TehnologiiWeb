<?php

$conn = mysqli_connect("localhost","root","","bd");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

  $ievent = $_POST['ievent'];
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

  $conditions = array();

  if(! empty($ievent)) {
    $conditions[] = "$ievent";
  }

  if(! empty($iyear)) {
    $conditions[] = "$iyear";
  }
  else {
    $conditions[] = "0"; 
  }

  if(! empty($imonth)) {
    $conditions[] = "$imonth";
  }
  else {
    $conditions[] = "0"; 
  }

  if(! empty($iday)) {
    $conditions[] = "$iday";
  }
  else {
    $conditions[] = "0"; 
  }

  if(! empty($country)) { //dependenta de country_txt
    $conditions[] = "$country";
  }
  else {
    $conditions[] = "0"; //id tari necunoscute = 0
  }

  if(! empty($country_txt)) { //dependenta de country
    $conditions[] = "\"$country_txt\"";
  }
  else {
    $conditions[] = "null"; // tara necunoscuta
  }

  if(! empty($region)) { //dependenta de region_txt
    $conditions[] = "$region";
  }
  else {
    $conditions[] = "0"; //id regiuni necunoscute = 0
  }

  if(! empty($region_txt)) { //dependenta de region
    $conditions[] = "\"$region_txt\"";
  }
  else {
    $conditions[] = "null"; // regiune necunoscuta
  }

  if(! empty($provstate)) { 
    $conditions[] = "\"$provstate\"";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($city)) { 
    $conditions[] = "\"$city\"";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($latitude)) { 
    $conditions[] = "$latitude"; 
  }
  else {
    $conditions[] = "null"; //null pentru locatii necunoscute
  }

  if(! empty($longitude)) { 
    $conditions[] = "$longitude"; 
  }
  else {
    $conditions[] = "null"; //null pentru locatii necunoscute
  }

  if(! empty($location)) { 
    $conditions[] = "\"$location\"";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($summary)) { 
    $conditions[] = "\"$summary\"";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($success)) { 
    $conditions[] = "$success";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($suicide)) { 
    $conditions[] = "$suicide";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($attacktype1)) { //dependent de attacktype1_txt
    $conditions[] = "$attacktype1";
  }
  else {
    $conditions[] = "0"; //id atac necunoscuta
  }

  if(! empty($attacktype1_txt)) { //dependent de attacktype1
    $conditions[] = "\"$attacktype1_txt\"";
  }
  else {
    $conditions[] = "null"; //atac necunoscuta
  }

  if(! empty($targtype1)) { 
    $conditions[] = "$targtype1";
  }
  else {
    $conditions[] = "0"; 
  }

  if(! empty($targtype1_txt)) { 
    $conditions[] = "\"$targtype1_txt\"";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($targsubtype1)) { 
    $conditions[] = "$targsubtype1";
  }
  else {
    $conditions[] = "0"; 
  }

  if(! empty($targsubtype1_txt)) { 
    $conditions[] = "\"$targsubtype1_txt\"";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($corp1)) { 
    $conditions[] = "$corp1";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($target1)) { 
    $conditions[] = "$target1";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($natlty1)) { 
    $conditions[] = "$natlty1";
  }
  else {
    $conditions[] = "0"; 
  }

  if(! empty($natlty1_txt)) { 
    $conditions[] = "\"$natlty1_txt\"";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($gname)) { 
    $conditions[] = "\"$gname\"";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($weaptype1)) { 
    $conditions[] = "$weaptype1";
  }
  else {
    $conditions[] = "0"; 
  }

  if(! empty($weaptype1_txt)) { 
    $conditions[] = "\"$weaptype1_txt\"";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($weapsubtype1)) { 
    $conditions[] = "$weapsubtype1";
  }
  else {
    $conditions[] = "0"; 
  }

  if(! empty($weapsubtype1_txt)) { 
    $conditions[] = "\"$weapsubtype1_txt\"";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($weapdetail)) { 
    $conditions[] = "\"$weapdetail\"";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($nkill)) { 
    $conditions[] = "$nkill";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($nhostkid)) { 
    $conditions[] = "$nhostkid";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($propextent)) { 
    $conditions[] = "$propextent";
  }
  else {
    $conditions[] = "0"; 
  }

  if(! empty($propextent_txt)) { 
    $conditions[] = "\"$propextent_txt\"";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($ransom)) { 
    $conditions[] = "$ransom";
  }
  else {
    $conditions[] = "0"; 
  }

  if(! empty($ransomamt)) { 
    $conditions[] = "$ransomamt";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($addnotes)) { 
    $conditions[] = "\"$addnotes\"";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($scite1)) { 
    $conditions[] = "\"$scite1\"";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($scite2)) { 
    $conditions[] = "\"$scite2\"";
  }
  else {
    $conditions[] = "null"; 
  }

  if(! empty($scite3)) { 
    $conditions[] = "\"$scite3\"";
  }
  else {
    $conditions[] = "null"; 
  }

  $query = "INSERT INTO bd (ievent, iyear, imonth, iday, country, country_txt, region, region_txt, provstate, city, ,latitude, longitude, location, summary, success, suicide, attacktype1, attacktype1_txt, targtype1, targtype1_txt, targsubtype1, targsubtype1_txt, corp1, target1, natlty1, natlty1_txt, gname, weaptype1, weaptype1_txt, weapsubtype1 ,weapsubtype1_txt, weapdetail, nkill, nhostkid, propextent, propextent_txt(damage), ransom, ransomamt, addnotes, scite1, scite2, scite3) 
  VALUES (";


  if (count($conditions) > 0) {
    $sql = $query;
    $sql .= . implode(',', $conditions);
    $sql .= ")";
  }


if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
