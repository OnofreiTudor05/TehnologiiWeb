<?php

//if(isset($_POST['search']))
//{
    $iyearin = $_POST['iyearin'];
    $iyearsf = $_POST['iyearsf'];
    $country_txt = $_POST['country_txt'];
    $region_txt = $_POST['region_txt'];
    $provstate = $_POST['provstate'];
    $attacktype1_txt = $_POST['attacktype1_txt'];
    $targtype1_txt = $_POST['targtype1_txt'];
    $targsubtype1_txt = $_POST['targsubtype1_txt'];
    $natlty1_txt = $_POST['natlty1_txt'];
    $weaptype1_txt = $_POST['weaptype1_txt'];
    $weapsubtype1_txt = $_POST['weapsubtype1_txt'];
    $nkillin = $_POST['nkillin'];
    $nkillsf = $_POST['nkillsf'];
    $propextent_txt = $_POST['propextent_txt'];
    $ransom = $_POST['ransom'];
    $ransomamtin = $_POST['ransomamtin'];
    $ransomamtsf = $_POST['ransomamtsf'];

    $conditions = array();

    if(! empty($iyearin)) {
      $conditions[] = "iyear>='$iyearin'";
    }

    if(! empty($iyearsf)) {
      $conditions[] = "iyear<='$iyearsf'";
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

    if(! empty($nkillin)) {
      $conditions[] = "nkill>='$nkillin'";
    }

    if(! empty($nkillsf)) {
      $conditions[] = "nkill<='$nkillsf'";
    }

    if(! empty($propextent_txt)) {
      $conditions[] = "propextent_txt='$propextent_txt'";
    }

    if(! empty($ransom)) {
      $conditions[] = "ransom='$ransom'";
    }

    if(! empty($ransomamtin)) {
      $conditions[] = "ransomamt>='$ransomamtin'";
    }

    if(! empty($ransomamtsf)) {
      $conditions[] = "ransomamt<='$ransomamtsf'";
    }

    //if($valueToSearch != "") // daca cauta cu searchbar
    //{
     //   $query = "SELECT * FROM terorism WHERE titlu LIKE '%".$valueToSearch."%' AND ";
    //}
    //else
    //{
        $query = "SELECT * FROM terorism WHERE ";
    //}


    //daca avem cautari in filtre
    if (count($conditions) > 0) {
      $sql = $query;
      $sql .= implode(' AND ', $conditions);
    }
    //daca nu avem conditii dar avem searchbar
    if(count($conditions) == 0 && $valueToSearch != "")
    {
        $sql = "SELECT * FROM terorism WHERE titlu LIKE '%".$valueToSearch."%' ";
    }
    //daca nu avem nimic
    if(count($conditions) == 0 && $valueToSearch == "")
    {
        $sql = "SELECT * FROM terorism ";
    }

    $connect = mysqli_connect("localhost", "root", "", "bazadatetw");
    $result = mysqli_query($connect, $sql);

    echo $sql;

    printf("Liniile selectate sunt: ");

    while($row = mysqli_fetch_assoc($result))
    {
      echo "<p>" ." ". $row['iyear'] ." ". $row['country_txt'] ." ". $row['region_txt'] ." ". $row['provstate'] ." ". $row['attacktype1_txt'] ." ". $row['targtype1_txt'] ." ". $row['targsubtype1_txt'] ." ". $row['natlty1_txt'] ." ". $row['weaptype1_txt'] ." ". $row['weapsubtype1_txt'] ." ". $row['nkill'] ." ". $row['propextent_txt'] ." ". $row['ransom'] ." ". $row['ransomamt'] . "</p> <br>" ;
    }

    printf($result->num_rows);

//}

?>

