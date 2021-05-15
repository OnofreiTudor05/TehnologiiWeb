<?php

if(isset($_POST['search']))
{
    $iyear = $_POST['iyear'];
    $country_txt = $_POST['country_txt'];
    $region_txt = $_POST['region_txt'];
    $provstate = $_POST['provstate'];
    $city = $_POST['city'];
    $attacktype1_txt = $_POST['attacktype1_txt'];
    $targtype1_txt = $_POST['targtype1_txt'];
    $targsubtype1_txt = $_POST['targsubtype1_txt'];
    $natlty1_txt = $_POST['natlty1_txt'];
    $weaptype1_txt = $_POST['weaptype1_txt'];
    $weapsubtype1_txt = $_POST['weapsubtype1_txt'];
    $nkill = $_POST['nkill'];
    $propextent_txt = $_POST['propextent_txt'];
    $ransom = $_POST['ransom'];
    $ransomamt = $_POST['ransomamt'];

    $conditions = array();

    if(! empty($iyear)) {
      $conditions[] = "iyear='$iyear'";
    }

    if(! empty($country_txt)) {
      $conditions[] = "country_txt='$country_txt'";
    }

    if(! empty($region_txt)) {
      $conditions[] = "region_txt='$region_txt'";
    }

    if(! empty($provstate)) {
      $conditions[] = "provstate='$provstate'";
    }

    if(! empty($city)) {
      $conditions[] = "city='$city'";
    }

    if(! empty($attacktype1_txt)) {
      $conditions[] = "attacktype1_txt='$attacktype1_txt'";
    }

    if(! empty($targtype1_txt)) {
      $conditions[] = "targtype1_txt='$targtype1_txt'";
    }

    if(! empty($targsubtype1_txt)) {
      $conditions[] = "targsubtype1_txt='$targsubtype1_txt'";
    }

    if(! empty($natlty1_txt)) {
      $conditions[] = "natlty1_txt='$natlty1_txt'";
    }

    if(! empty($weaptype1_txt)) {
      $conditions[] = "weaptype1_txt='$weaptype1_txt'";
    }

    if(! empty($weapsubtype1_txt)) {
      $conditions[] = "weapsubtype1_txt='$weapsubtype1_txt'";
    }

    if(! empty($nkill)) {
      $conditions[] = "nkill='$nkill'";
    }

    if(! empty($propextent_txt)) {
      $conditions[] = "propextent_txt='$propextent_txt'";
    }

    if(! empty($ransom)) {
      $conditions[] = "ransom='$ransom'";
    }

    if(! empty($ransomamt)) {
      $conditions[] = "ransomamt='$ransomamt'";
    }

    if($valueToSearch != "") // daca cauta cu searchbar
    {
        $query = "SELECT * FROM bazadate WHERE titlu LIKE '%".$valueToSearch."%' AND ";
    }
    else
    {
        $query = "SELECT * FROM bazadate WHERE";
    }


    //daca avem cautari in filtre
    if (count($conditions) > 0) {
      $sql = $query;
      $sql .= . implode(' AND ', $conditions);
    }
    //daca nu avem conditii dar avem searchbar
    if(count($conditions) == 0 && $valueToSearch != "")
    {
        $sql = "SELECT * FROM bazadate WHERE titlu LIKE '%".$valueToSearch."%'"
    }
    //daca nu avem nimic
    if(count($conditions) == 0 && $valueToSearch == "")
    {
        $sql = "SELECT * FROM bazadate"
    }

    $result = mysql_query($sql);

    return $result;
}

//conectare
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "test_db");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

