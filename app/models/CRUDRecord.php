<?php
class CRUDRecord
{
    public function __construct()
    {

        $this->conexiune = ManagerConexiune::getConexiuneLaBD();
    }

    public function adaugaRecord($data)
    {
        $data = json_decode($data, true);
        $conditions = array();

        if (!is_null($data["eventid"])) {
            $conditions[] = strval($data["eventid"]);
        } else {
            $conditions[] = "0";
        }

        if (!is_null($data["iyear"])) {
            $conditions[] = strval($data["iyear"]);
        } else {
            $conditions[] = "0";
        }

        if (!is_null($data["imonth"])) {
            $conditions[] = strval($data["imonth"]);
        } else {
            $conditions[] = "0";
        }

        if (!is_null($data["iday"])) {
            $conditions[] = strval($data["iday"]);
        } else {
            $conditions[] = "0";
        }

        if (!is_null($data["country"])) { //dependenta de country_txt
            $conditions[] = strval($data["country"]);
        } else {
            $conditions[] = "0"; //id tari necunoscute = 0
        }

        if (!is_null($data["country_txt"])) { //dependenta de country
            $conditions[] = strval("'" . $data["country_txt"] . "'");
        } else {
            $conditions[] = "null"; // tara necunoscuta
        }

        if (!is_null($data["region"])) { //dependenta de region_txt
            $conditions[] = strval($data["region"]);
        } else {
            $conditions[] = "0"; //id regiuni necunoscute = 0
        }

        if (!is_null($data["region_txt"])) { //dependenta de region
            $conditions[] = strval("'" . $data["region_txt"] . "'");
        } else {
            $conditions[] = "null"; // regiune necunoscuta
        }

        if (!is_null($data["provstate"])) {
            $conditions[] = strval("'" . $data["provstate"] . "'");
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["city"])) {
            $conditions[] = strval("'" . $data["city"] . "'");
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["latitude"])) {
            $conditions[] = strval($data["latitude"]);
        } else {
            $conditions[] = "null"; //null pentru locatii necunoscute
        }

        if (!is_null($data["longitude"])) {
            $conditions[] = strval($data["longitude"]);
        } else {
            $conditions[] = "null"; //null pentru locatii necunoscute
        }

        if (!is_null($data["location"])) {
            $conditions[] = strval("'" . $data["location"] . "'");
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["summary"])) {
            $conditions[] = strval("'" . $data["summary"] . "'");
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["success"])) {
            $conditions[] = strval($data["success"]);
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["suicide"])) {
            $conditions[] = strval($data["suicide"]);
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["attacktype1"])) { //dependent de attacktype1_txt
            $conditions[] = strval($data["attacktype1"]);
        } else {
            $conditions[] = "0"; //id atac necunoscuta
        }

        if (!is_null($data["attacktype1_txt"])) { //dependent de attacktype1
            $conditions[] = strval("'" . $data['$attacktype1_txt'] . "'");
        } else {
            $conditions[] = "null"; //atac necunoscuta
        }

        if (!is_null($data["targtype1"])) {
            $conditions[] = strval($data["targtype1"]);
        } else {
            $conditions[] = "0";
        }

        if (!is_null($data["targtype1_txt"])) {
            $conditions[] = strval("'" . $data["targtype1_txt"] . "'");
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["targsubtype1"])) {
            $conditions[] = strval($data["targsubtype1"]);
        } else {
            $conditions[] = "0";
        }

        if (!is_null($data["targsubtype1_txt"])) {
            $conditions[] = strval("'" . $data["targsubtype1_txt"] . "'");
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["corp1"])) {
            $conditions[] = strval("'" . $data["corp1"] . "'");
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["target1"])) {
            $conditions[] = strval("'" . $data["target1"] . "'");
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["nalty1"])) {
            $conditions[] = strval($data["natlty1"]);
        } else {
            $conditions[] = "0";
        }

        if (!is_null($data["natlty1_txt"])) {
            $conditions[] = strval("'" . $data["natlty1_txt"] . "'");
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["gname"])) {
            $conditions[] = strval("'" . $data["gname"] . "'");
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["weaptype1"])) {
            $conditions[] = strval($data["weaptype1"]);
        } else {
            $conditions[] = "0";
        }

        if (!is_null($data["weaptype1_txt"])) {
            $conditions[] = strval("'" . $data["weaptype1_txt"] . "'");
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["weapsubtype1"])) {
            $conditions[] = strval($data["weapsubtype1"]);
        } else {
            $conditions[] = "0";
        }

        if (!is_null($data["weapsubtype1_txt"])) {
            $conditions[] = strval("'" . $data["weapsubtype1_txt"] . "'");
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["weapdetail"])) {
            $conditions[] = strval("'" . $data["weapdetail"] . "'");
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["nkill"])) {
            $conditions[] = strval($data["nkill"]);
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["nhostkid"])) {
            $conditions[] = strval($data["nhostkid"]);
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["propextent"])) {
            $conditions[] = strval($data["propextent"]);
        } else {
            $conditions[] = "0";
        }

        if (!is_null($data["propextent_txt"])) {
            $conditions[] = strval("'" . $data["propextent_txt"] . "'");
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["ransom"])) {
            $conditions[] = strval($data["ransom"]);
        } else {
            $conditions[] = "0";
        }

        if (!is_null($data["ransomamt"])) {
            $conditions[] = strval($data["ransomamt"]);
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["addnotes"])) {
            $conditions[] = strval("'" . $data["addnotes"] . "'");
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["scite1"])) {
            $conditions[] = strval("'" . $data["scite1"] . "'");
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["scite2"])) {
            $conditions[] = strval("'" . $data["scite2"] . "'");
        } else {
            $conditions[] = "null";
        }

        if (!is_null($data["scite3"])) {
            $conditions[] = strval("'" . $data["scite3"] . "'");
        } else {
            $conditions[] = "null";
        }

        $query = "INSERT INTO terrorism (eventid, iyear, imonth, iday, country, country_txt, region, region_txt, provstate, city, latitude, longitude, location, summary, success, suicide, attacktype1, attacktype1_txt, targtype1, targtype1_txt, targsubtype1, targsubtype1_txt, corp1, target1, natlty1, natlty1_txt, gname, weaptype1, weaptype1_txt, weapsubtype1 ,weapsubtype1_txt, weapdetail, nkill, nhostkid, propextent, propextent_txt, ransom, ransomamt, addnotes, scite1, scite2, scite3) 
  VALUES (";


        if (count($conditions) > 0) {
            $sql = $query;
            $sql .= implode(',', $conditions);
            $sql .= ")";
        }

        echo $sql;
        if ($this->conexiune->query($sql) === TRUE) {
            return "New record created successfully";
        } else {
            return "Error: " . $sql . "<br>" . $this->conexiune->error;
        }
    }
}
