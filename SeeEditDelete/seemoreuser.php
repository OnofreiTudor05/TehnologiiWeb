<?php

$eventid = $_POST['hiddenid'];

$iyear = "SELECT iyear FROM terorism WHERE eventid = $eventid";
$imonth = "SELECT imonth FROM terorism WHERE eventid = $eventid";
$iday = "SELECT iday FROM terorism WHERE eventid = $eventid";
$country = "SELECT country FROM terorism WHERE eventid = $eventid";
$country_txt = "SELECT country_txt FROM terorism WHERE eventid = $eventid";
$region = "SELECT region FROM terorism WHERE eventid = $eventid";
$region_txt = "SELECT region_txt FROM terorism WHERE eventid = $eventid";
$provstate = "SELECT provstate FROM terorism WHERE eventid = $eventid";
$city = "SELECT city FROM terorism WHERE eventid = $eventid";
$latitude = "SELECT latitude FROM terorism WHERE eventid = $eventid";
$longitude = "SELECT longitude FROM terorism WHERE eventid = $eventid";
$location = "SELECT location FROM terorism WHERE eventid = $eventid";
$summary = "SELECT summary FROM terorism WHERE eventid = $eventid";
$success = "SELECT success FROM terorism WHERE eventid = $eventid";
$suicide = "SELECT suicide FROM terorism WHERE eventid = $eventid";
$attacktype1 = "SELECT attacktype1 FROM terorism WHERE eventid = $eventid";
$attacktype1_txt = "SELECT attacktype1_txt FROM terorism WHERE eventid = $eventid";
$targtype1 = "SELECT targtype1 FROM terorism WHERE eventid = $eventid";
$targtype1_txt = "SELECT targtype1_txt FROM terorism WHERE eventid = $eventid";
$targsubtype1 = "SELECT targsubtype1 FROM terorism WHERE eventid = $eventid";
$targsubtype1_txt = "SELECT targsubtype1_txt FROM terorism WHERE eventid = $eventid";
$corp1 = "SELECT corp1 FROM terorism WHERE eventid = $eventid";
$target1 = "SELECT target1 FROM terorism WHERE eventid = $eventid";
$natlty1 = "SELECT natlty1 FROM terorism WHERE eventid = $eventid";
$natlty1_txt = "SELECT natlty1_txt FROM terorism WHERE eventid = $eventid";
$gname = "SELECT gname FROM terorism WHERE eventid = $eventid";
$weaptype1 = "SELECT weaptype1 FROM terorism WHERE eventid = $eventid";
$weaptype1_txt = "SELECT weaptype1_txt FROM terorism WHERE eventid = $eventid";
$weapsubtype1 = "SELECT weapsubtype1 FROM terorism WHERE eventid = $eventid";
$weapsubtype1_txt = "SELECT weapsubtype1_txt FROM terorism WHERE eventid = $eventid";
$weapdetail = "SELECT weapdetail FROM terorism WHERE eventid = $eventid";
$nkill = "SELECT nkill FROM terorism WHERE eventid = $eventid";
$nhostkid = "SELECT nhostkid FROM terorism WHERE eventid = $eventid";
$propextent = "SELECT propextent FROM terorism WHERE eventid = $eventid";
$propextent_txt = "SELECT propextent_txt FROM terorism WHERE eventid = $eventid";
$ransom = "SELECT ransom FROM terorism WHERE eventid = $eventid";
$ransomamt = "SELECT ransomamt FROM terorism WHERE eventid = $eventid";
$addnotes = "SELECT addnotes FROM terorism WHERE eventid = $eventid";
$scite1 = "SELECT scite1 FROM terorism WHERE eventid = $eventid";
$scite2 = "SELECT scite2 FROM terorism WHERE eventid = $eventid";
$scite3 = "SELECT scite3 FROM terorism WHERE eventid = $eventid";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>