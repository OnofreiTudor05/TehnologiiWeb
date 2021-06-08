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

        $conditions[] = strval($data["eventid"] ?? "0");
        $conditions[] = strval($data["iyear"] ?? "0");
        $conditions[] = strval($data["imonth"] ?? "0");
        $conditions[] = strval($data["iday"] ?? "0");
        $conditions[] = strval($data["country"] ?? "0");
        $conditions[] = strval("'" . ($data["country_txt"] ?? "null") . "'");
        $conditions[] = strval($data["region"] ?? "0");
        $conditions[] = strval("'" . ($data["region_txt"] ?? "null") . "'");
        $conditions[] = strval("'" . ($data["provstate"] ?? "null") . "'");
        $conditions[] = strval("'" . ($data["city"] ?? "null") . "'");
        $conditions[] = strval($data["latitude"] ?? "0");
        $conditions[] = strval($data["longitude"] ?? "0");
        $conditions[] = strval("'" . ($data["location"] ?? "null") . "'");
        $conditions[] = strval("'" . ($data["summary"] ?? "null") . "'");
        $conditions[] = strval($data["success"] ?? "null");
        $conditions[] = strval($data["suicide"] ?? "null");
        $conditions[] = strval($data["attacktype1"] ?? "0");
        $conditions[] = strval("'" . ($data["attacktype1_txt"] ?? "null") . "'");
        $conditions[] = strval($data["targtype1"] ?? "0");
        $conditions[] = strval("'" . ($data["targtype1_txt"] ?? "null") . "'");
        $conditions[] = strval($data["targsubtype1"] ?? "0");
        $conditions[] = strval("'" . ($data["targsubtype1_txt"] ?? "null") . "'");
        $conditions[] = strval("'" . ($data["corp1"] ?? "null") . "'");
        $conditions[] = strval("'" . ($data["target1"] ?? "null") . "'");
        $conditions[] = strval($data["natlty1"] ?? "0");
        $conditions[] = strval("'" . ($data["natlty1_txt"] ?? "null") . "'");
        $conditions[] = strval("'" . ($data["gname"] ?? "null") . "'");
        $conditions[] = strval($data["weaptype1"] ?? "0");
        $conditions[] = strval("'" . ($data["weaptype1_txt"] ?? "null") . "'");
        $conditions[] = strval($data["weapsubtype1"] ?? "0");
        $conditions[] = strval("'" . ($data["weapsubtype1_txt"] ?? "null") . "'");
        $conditions[] = strval("'" . ($data["weapdetail"] ?? "null") . "'");
        $conditions[] = strval("'" . ($data["nkill"] ?? "null") . "'");
        $conditions[] = strval("'" . ($data["nhostkid"] ?? "null") . "'");
        $conditions[] = strval("'" . ($data["propextent"] ?? "null") . "'");
        $conditions[] = strval("'" . ($data["propextent_txt"] ?? "null") . "'");
        $conditions[] = strval($data["ransom"] ?? "null");
        $conditions[] = strval("'" . ($data["ransomamt"] ?? "null") . "'");
        $conditions[] = strval("'" . ($data["addnotes"] ?? "null") . "'");
        $conditions[] = strval("'" . ($data["scite1"] ?? "null") . "'");
        $conditions[] = strval("'" . ($data["scite2"] ?? "null") . "'");
        $conditions[] = strval("'" . ($data["scite3"] ?? "null") . "'");

        $query = "INSERT INTO terrorism (eventid, iyear, imonth, iday, country, country_txt, region, region_txt, provstate, city, latitude, longitude, location, summary, success, suicide, attacktype1, attacktype1_txt, targtype1, targtype1_txt, targsubtype1, targsubtype1_txt, corp1, target1, natlty1, natlty1_txt, gname, weaptype1, weaptype1_txt, weapsubtype1 ,weapsubtype1_txt, weapdetail, nkill, nhostkid, propextent, propextent_txt, ransom, ransomamt, addnotes, scite1, scite2, scite3) 
  VALUES (";


        if (count($conditions) > 0) {
            $sql = $query;
            $sql .= implode(',', $conditions);
            $sql .= ")";
        }

        if ($this->conexiune->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function cautaDupaId($data)
    {
        $data = json_decode($data, true);
        if(!is_numeric($data["eventid"]))
        {
            return false;
        }
        $sql = "SELECT * FROM terrorism where eventid =" .  $data["eventid"];
        $result = mysqli_query($this->conexiune, $sql);

        return mysqli_fetch_assoc($result);
    }

    public function cautaRecord($data)
    {
        $data = json_decode($data, true);
        $conditions = array();

        if (($data["iyearin"] ?? null) !="") {
            $conditions[] = strval("iyear>=" . $data["iyearin"]);
        }

        if (($data["iyearsf"] ?? null) !="") {
            $conditions[] = strval("iyear<=" . $data["iyearsf"]);
        }

        if (($data["country_txt"] ?? null) !="" ) {
            $conditions[] = strval("country_txt='" . $data["country_txt"]. "'");
        }

        if (($data["region_txt"] ?? null) !="") {
            $conditions[] = strval("region_txt='" . $data["region_txt"]. "'");
        }

        if (($data["provstate"]  ?? null) !="") {
            $conditions[] = strval("provstate='" . $data["provstate"]. "'");
        }

        if (($data["attacktype1_txt"]  ?? null) !="") {
            $conditions[] = strval("attacktype1_txt='" . $data["attacktype1_txt"]. "'");
        }

        if (($data["targtype1_txt"]  ?? null) !="") {
            $conditions[] = strval("targtype1_txt='" . $data["targtype1_txt"]. "'");
        }

        if (($data["targsubtype1_txt"] ?? null) !="") {
            $conditions[] = strval("targsubtype1_txt='" . $data["targsubtype1_txt"]. "'");
        }

        if (($data["natlty1_txt"]  ?? null) !="") {
            $conditions[] = strval("natlty1_txt='" . $data["natlty1_txt"]. "'");
        }

        if (($data["weaptype1_txt"]  ?? null) !="") {
            $conditions[] = strval("weaptype1_txt='" . $data["weaptype1_txt"]. "'");
        }

        if (($data["weapsubtype1_txt"]  ?? null) !="") {
            $conditions[] = strval("weapsubtype1_txt='" . $data["weapsubtype1_txt"]. "'");
        }

        if (($data["nkillin"]  ?? null) !="") {
            $conditions[] = strval("nkill>=" . $data["nkillin"]);
        }

        if (($data["nkillsf"]  ?? null) !="") {
            $conditions[] = strval("nkill<=" . $data["nkillsf"]);
        }

        if (($data["propextent_txt"]  ?? null) !="") {
            $conditions[] = strval("propextent_txt='" . $data["propextent_txt"]. "'");
        }

        if (($data["ransom"]  ?? null) !="") {
            $conditions[] = strval("ransom='" . $data["ransom"]. "'");
        }

        if (($data["ransomamtin"]  ?? null) !="") {
            $conditions[] = strval("ransomamt>=" . $data["ransomamtin"]);
        }

        if (($data["ransomamtsf"]  ?? null) !="") {
            $conditions[] = strval("ransomamt<=" . $data["ransomamtsf"]);
        }

        if (($data["searchsummary"]  ?? null) !="") // daca cauta cu searchbar si presupun ca am filtre
        {
            $query = "SELECT * FROM terrorism WHERE summary LIKE '%" . $data["searchsummary"] . "%' AND ";
        } else {
            $query = "SELECT * FROM terrorism WHERE ";
        }

        //daca avem cautari in filtre
        if (count($conditions) > 0) {
            $sql = $query;
            $sql .= implode(' AND ', $conditions);
        }

        //daca nu avem conditii dar avem searchbar
        if (count($conditions) == 0 && ($data["searchsummary"]  ?? null) !="") {
            $sql = "SELECT * FROM terrorism WHERE summary LIKE '%" . $data["searchsummary"] . "%' ";
        }
        //daca nu avem nimic
        if (count($conditions) == 0 && ($data["searchsummary"]  ?? null) =="") {
            $sql = "SELECT * FROM terrorism ";
        }

        $result = mysqli_query($this->conexiune, $sql);
        if(!$result) return false;
        $content = $result->fetch_all(MYSQLI_ASSOC);
        return $content;
    }

    public function cautaDateGrafic($data)
    {
        $data = json_decode($data, true);
        $conditions = array();

        if (($data["iyearin"] ?? null) !="") {
            $conditions[] = strval("iyear>=" . $data["iyearin"]);
        }

        if (($data["iyearsf"] ?? null) !="") {
            $conditions[] = strval("iyear<=" . $data["iyearsf"]);
        }

        if (($data["country_txt"] ?? null) !="" ) {
            $conditions[] = strval("country_txt='" . $data["country_txt"]. "'");
        }

        if (($data["region_txt"] ?? null) !="") {
            $conditions[] = strval("region_txt='" . $data["region_txt"]. "'");
        }

        if (($data["provstate"]  ?? null) !="") {
            $conditions[] = strval("provstate='" . $data["provstate"]. "'");
        }

        if (($data["attacktype1_txt"]  ?? null) !="") {
            $conditions[] = strval("attacktype1_txt='" . $data["attacktype1_txt"]. "'");
        }

        if (($data["targtype1_txt"]  ?? null) !="") {
            $conditions[] = strval("targtype1_txt='" . $data["targtype1_txt"]. "'");
        }

        if (($data["targsubtype1_txt"] ?? null) !="") {
            $conditions[] = strval("targsubtype1_txt='" . $data["targsubtype1_txt"]. "'");
        }

        if (($data["natlty1_txt"]  ?? null) !="") {
            $conditions[] = strval("natlty1_txt='" . $data["natlty1_txt"]. "'");
        }

        if (($data["weaptype1_txt"]  ?? null) !="") {
            $conditions[] = strval("weaptype1_txt='" . $data["weaptype1_txt"]. "'");
        }

        if (($data["weapsubtype1_txt"]  ?? null) !="") {
            $conditions[] = strval("weapsubtype1_txt='" . $data["weapsubtype1_txt"]. "'");
        }

        if (($data["nkillin"]  ?? null) !="") {
            $conditions[] = strval("nkill>=" . $data["nkillin"]);
        }

        if (($data["nkillsf"]  ?? null) !="") {
            $conditions[] = strval("nkill<=" . $data["nkillsf"]);
        }

        if (($data["propextent_txt"]  ?? null) !="") {
            $conditions[] = strval("propextent_txt='" . $data["propextent_txt"]. "'");
        }

        if (($data["ransom"]  ?? null) !="") {
            $conditions[] = strval("ransom='" . $data["ransom"]. "'");
        }

        if (($data["ransomamtin"]  ?? null) !="") {
            $conditions[] = strval("ransomamt>=" . $data["ransomamtin"]);
        }

        if (($data["ransomamtsf"]  ?? null) !="") {
            $conditions[] = strval("ransomamt<=" . $data["ransomamtsf"]);
        }

        if (($data["tipdategrafic"]  ?? null) =="") {
            $data["tipdategrafic"] = "country_txt";
        }

        if (($data["searchsummary"]  ?? null) !="") // daca cauta cu searchbar si presupun ca am filtre
        {
            $query = "SELECT " . $data["tipdategrafic"] . " , COUNT(*) AS numarAtacuri FROM terrorism WHERE summary LIKE '%" . $data["searchsummary"] . "%' AND ";
        } else {
            $query = "SELECT " . $data["tipdategrafic"] . " , COUNT(*) AS numarAtacuri FROM terrorism WHERE ";
        }

        //daca avem cautari in filtre
        if (count($conditions) > 0) {
            $sql = $query;
            $sql .= implode(' AND ', $conditions);
            $sql .= "GROUP BY ";
            $sql .= $data["tipdategrafic"];
            $sql .= " ORDER BY numarAtacuri DESC";
        }

        //daca nu avem conditii dar avem searchbar
        if (count($conditions) == 0 && ($data["searchsummary"]  ?? null) !="") {
            $sql = "SELECT " . $data["tipdategrafic"] . " , COUNT(*) AS numarAtacuri FROM terrorism WHERE summary LIKE '%" . $data["searchsummary"] . "%' GROUP BY ". $data["tipdategrafic"] . " ORDER BY numarAtacuri DESC";
        }
        //daca nu avem nimic
        if (count($conditions) == 0 && ($data["searchsummary"]  ?? null) =="") {
            $sql = "SELECT " . $data["tipdategrafic"] . " , COUNT(*) AS numarAtacuri FROM terrorism GROUP BY ". $data["tipdategrafic"] . " ORDER BY numarAtacuri DESC";
        }

        $result = mysqli_query($this->conexiune, $sql);
        if(!$result) return false;
        $content = $result->fetch_all(MYSQLI_ASSOC);
        return $content;
    }

    public function cautaDateMap($data)
    {
        $data = json_decode($data, true);
        $conditions = array();

        if (($data["iyearin"] ?? null) !="") {
            $conditions[] = strval("iyear>=" . $data["iyearin"]);
        }

        if (($data["iyearsf"] ?? null) !="") {
            $conditions[] = strval("iyear<=" . $data["iyearsf"]);
        }

        if (($data["country_txt"] ?? null) !="" ) {
            $conditions[] = strval("country_txt='" . $data["country_txt"]. "'");
        }

        if (($data["region_txt"] ?? null) !="") {
            $conditions[] = strval("region_txt='" . $data["region_txt"]. "'");
        }

        if (($data["provstate"]  ?? null) !="") {
            $conditions[] = strval("provstate='" . $data["provstate"]. "'");
        }

        if (($data["attacktype1_txt"]  ?? null) !="") {
            $conditions[] = strval("attacktype1_txt='" . $data["attacktype1_txt"]. "'");
        }

        if (($data["targtype1_txt"]  ?? null) !="") {
            $conditions[] = strval("targtype1_txt='" . $data["targtype1_txt"]. "'");
        }

        if (($data["targsubtype1_txt"] ?? null) !="") {
            $conditions[] = strval("targsubtype1_txt='" . $data["targsubtype1_txt"]. "'");
        }

        if (($data["natlty1_txt"]  ?? null) !="") {
            $conditions[] = strval("natlty1_txt='" . $data["natlty1_txt"]. "'");
        }

        if (($data["weaptype1_txt"]  ?? null) !="") {
            $conditions[] = strval("weaptype1_txt='" . $data["weaptype1_txt"]. "'");
        }

        if (($data["weapsubtype1_txt"]  ?? null) !="") {
            $conditions[] = strval("weapsubtype1_txt='" . $data["weapsubtype1_txt"]. "'");
        }

        if (($data["nkillin"]  ?? null) !="") {
            $conditions[] = strval("nkill>=" . $data["nkillin"]);
        }

        if (($data["nkillsf"]  ?? null) !="") {
            $conditions[] = strval("nkill<=" . $data["nkillsf"]);
        }

        if (($data["propextent_txt"]  ?? null) !="") {
            $conditions[] = strval("propextent_txt='" . $data["propextent_txt"]. "'");
        }

        if (($data["ransom"]  ?? null) !="") {
            $conditions[] = strval("ransom='" . $data["ransom"]. "'");
        }

        if (($data["ransomamtin"]  ?? null) !="") {
            $conditions[] = strval("ransomamt>=" . $data["ransomamtin"]);
        }

        if (($data["ransomamtsf"]  ?? null) !="") {
            $conditions[] = strval("ransomamt<=" . $data["ransomamtsf"]);
        }

        if (($data["searchsummary"]  ?? null) !="") // daca cauta cu searchbar si presupun ca am filtre
        {
            $query = "SELECT country_txt, latitude, longitude FROM terrorism WHERE summary LIKE '%" . $data["searchsummary"] . "%' AND ";
        } else {
            $query = "SELECT country_txt, latitude, longitude FROM terrorism WHERE ";
        }

        //daca avem cautari in filtre
        if (count($conditions) > 0) {
            $sql = $query;
            $sql .= implode(' AND ', $conditions);
            $sql .= " WHERE latitude !=0 AND longitude !=0";
        }

        //daca nu avem conditii dar avem searchbar
        if (count($conditions) == 0 && ($data["searchsummary"]  ?? null) !="") {
            $sql = "SELECT country_txt, latitude, longitude FROM terrorism WHERE summary LIKE '%" . $data["searchsummary"] . "%' WHERE latitude !=0 AND longitude !=0";
        }
        //daca nu avem nimic
        if (count($conditions) == 0 && ($data["searchsummary"]  ?? null) =="") {
            $sql = "SELECT country_txt, latitude, longitude FROM terrorism WHERE latitude !=0 AND longitude !=0";
        }

        $result = mysqli_query($this->conexiune, $sql);
        if(!$result) return false;
        $content = $result->fetch_all(MYSQLI_ASSOC);
        return $content;
    }

    public function cautaDateArticol($data)
    {
        $data = json_decode($data, true);
        $conditions = array();

        if (($data["iyearin"] ?? null) !="") {
            $conditions[] = strval("iyear>=" . $data["iyearin"]);
        }

        if (($data["iyearsf"] ?? null) !="") {
            $conditions[] = strval("iyear<=" . $data["iyearsf"]);
        }

        if (($data["country_txt"] ?? null) !="" ) {
            $conditions[] = strval("country_txt='" . $data["country_txt"]. "'");
        }

        if (($data["region_txt"] ?? null) !="") {
            $conditions[] = strval("region_txt='" . $data["region_txt"]. "'");
        }

        if (($data["provstate"]  ?? null) !="") {
            $conditions[] = strval("provstate='" . $data["provstate"]. "'");
        }

        if (($data["attacktype1_txt"]  ?? null) !="") {
            $conditions[] = strval("attacktype1_txt='" . $data["attacktype1_txt"]. "'");
        }

        if (($data["targtype1_txt"]  ?? null) !="") {
            $conditions[] = strval("targtype1_txt='" . $data["targtype1_txt"]. "'");
        }

        if (($data["targsubtype1_txt"] ?? null) !="") {
            $conditions[] = strval("targsubtype1_txt='" . $data["targsubtype1_txt"]. "'");
        }

        if (($data["natlty1_txt"]  ?? null) !="") {
            $conditions[] = strval("natlty1_txt='" . $data["natlty1_txt"]. "'");
        }

        if (($data["weaptype1_txt"]  ?? null) !="") {
            $conditions[] = strval("weaptype1_txt='" . $data["weaptype1_txt"]. "'");
        }

        if (($data["weapsubtype1_txt"]  ?? null) !="") {
            $conditions[] = strval("weapsubtype1_txt='" . $data["weapsubtype1_txt"]. "'");
        }

        if (($data["nkillin"]  ?? null) !="") {
            $conditions[] = strval("nkill>=" . $data["nkillin"]);
        }

        if (($data["nkillsf"]  ?? null) !="") {
            $conditions[] = strval("nkill<=" . $data["nkillsf"]);
        }

        if (($data["propextent_txt"]  ?? null) !="") {
            $conditions[] = strval("propextent_txt='" . $data["propextent_txt"]. "'");
        }

        if (($data["ransom"]  ?? null) !="") {
            $conditions[] = strval("ransom='" . $data["ransom"]. "'");
        }

        if (($data["ransomamtin"]  ?? null) !="") {
            $conditions[] = strval("ransomamt>=" . $data["ransomamtin"]);
        }

        if (($data["ransomamtsf"]  ?? null) !="") {
            $conditions[] = strval("ransomamt<=" . $data["ransomamtsf"]);
        }

        if (($data["pageno"]  ?? null) =="") {
            $data["pageno"] = 1;
        }

        if (($data["searchsummary"]  ?? null) !="") // daca cauta cu searchbar si presupun ca am filtre
        {
            $query = "SELECT eventid, summary FROM terrorism WHERE summary LIKE '%" . $data["searchsummary"] . "%' AND ";
        } else {
            $query = "SELECT eventid, summary FROM terrorism WHERE ";
        }

        //daca avem cautari in filtre
        if (count($conditions) > 0) {
            $sql = $query;
            $sql .= implode(' AND ', $conditions);
            $sql .= " LIMIT " . ($data["pageno"]-1)*5 . ", 5";
        }

        //daca nu avem conditii dar avem searchbar
        if (count($conditions) == 0 && ($data["searchsummary"]  ?? null) !="") {
            $sql = "SELECT eventid, summary FROM terrorism WHERE summary LIKE '%" . $data["searchsummary"] . "%' " . "LIMIT " . ($data["pageno"]-1)*5 . ", 5";
        }
        //daca nu avem nimic
        if (count($conditions) == 0 && ($data["searchsummary"]  ?? null) =="") {
            $sql = "SELECT eventid, summary FROM terrorism " . "LIMIT " . ($data["pageno"]-1)*5 . ", 5";
        }

        $result = mysqli_query($this->conexiune, $sql);
        if(!$result) return false;
        $content = $result->fetch_all(MYSQLI_ASSOC);
        return $content;
    }


    public function updateRecord($data)
    {
        $data = json_decode($data, true);
        $conditions = array();


        if (!is_null($data["iyear"] ?? null)) {
            $conditions[] = strval("iyear=" . $data["iyear"]);
        }

        if (!is_null($data["imonth"] ?? null)) {
            $conditions[] = strval("imonth=" . $data["imonth"]);
        }

        if (!is_null($data["iday"] ?? null)) {
            $conditions[] = strval("iday=" . $data["iday"]);
        }

        if (!is_null($data["country"] ?? null)) {
            $conditions[] = strval("country=" . $data["country"]);
        }

        if (!is_null($data["country_txt"] ?? null)) {
            $conditions[] = strval("country_txt='" . $data["country_txt"] . "'");
        }

        if (!is_null($data["region"] ?? null)) {
            $conditions[] = strval("region=" . $data["region"]);
        }

        if (!is_null($data["region_txt"] ?? null)) {
            $conditions[] = strval("region_txt='" . $data["region_txt"] . "'");
        }

        if (!is_null($data["provstate"] ?? null)) {
            $conditions[] = strval("provstate='" . $data["provstate"] . "'");
        }

        if (!is_null($data["city"] ?? null)) {
            $conditions[] = strval("city='" . $data["city"] . "'");
        }

        if (!is_null($data["latitude"] ?? null)) {
            $conditions[] = strval("latitude=" . $data["latitude"]);
        }

        if (!is_null($data["longitude"] ?? null)) {
            $conditions[] = strval("longitude=" . $data["longitude"]);
        }

        if (!is_null($data["location"] ?? null)) {
            $conditions[] = strval("location='" . $data["location"] . "'");
        }

        if (!is_null($data["summary"] ?? null)) {
            $conditions[] = strval("summary='" . $data["summary"] . "'");
        }

        if (!is_null($data["success"] ?? null)) {
            $conditions[] = strval("success=" . $data["success"]);
        }

        if (!is_null($data["suicide"] ?? null)) {
            $conditions[] = strval("suicide=" . $data["suicide"]);
        }

        if (!is_null($data["attacktype1"] ?? null)) {
            $conditions[] = strval("attacktype1=" . $data["attacktype1"]);
        }

        if (!is_null($data["attacktype1_txt"] ?? null)) {
            $conditions[] = strval("attacktype1_txt='" . $data["attacktype1_txt"] . "'");
        }

        if (!is_null($data["targtype1"] ?? null)) {
            $conditions[] = strval("targtype1=" . $data["targtype1"]);
        }

        if (!is_null($data["targtype1_txt"] ?? null)) {
            $conditions[] = strval("targtype1_txt='" . $data["targtype1_txt"] . "'");
        }

        if (!is_null($data["targsubtype1"] ?? null)) {
            $conditions[] = strval("targsubtype1=" . $data["targsubtype1"]);
        }

        if (!is_null($data["targsubtype1_txt"] ?? null)) {
            $conditions[] = strval("targsubtype1_txt='" . $data["targsubtype1_txt"] . "'");
        }

        if (!is_null($data["corp1"] ?? null)) {
            $conditions[] = strval("corp1='" . $data["corp1"] . "'");
        }

        if (!is_null($data["target1"] ?? null)) {
            $conditions[] = strval("target1='" . $data["target1"] . "'");
        }

        if (!is_null($data["natlty1"] ?? null)) {
            $conditions[] = strval("natlty1=" . $data["natlty1"]);
        }

        if (!is_null($data["natlty1_txt"] ?? null)) {
            $conditions[] = strval("natlty1_txt='" . $data["natlty1_txt"] . "'");
        }

        if (!is_null($data["gname"] ?? null)) {
            $conditions[] = strval("gname='" . $data["gname"] . "'");
        }

        if (!is_null($data["weaptype1"] ?? null)) {
            $conditions[] = strval("weaptype1=" . $data["weaptype1"]);
        }

        if (!is_null($data["weaptype1_txt"] ?? null)) {
            $conditions[] = strval("weaptype1_txt='" . $data["weaptype1_txt"] . "'");
        }

        if (!is_null($data["weapsubtype1"] ?? null)) {
            $conditions[] = strval("weapsubtype1=" . $data["weapsubtype1"]);
        }

        if (!is_null($data["weapsubtype1_txt"] ?? null)) {
            $conditions[] = strval("weapsubtype1_txt='" . $data["weapsubtype1_txt"] . "'");
        }

        if (!is_null($data["weapdetail"] ?? null)) {
            $conditions[] = strval("weapdetail='" . $data["weapdetail"] . "'");
        }

        if (!is_null($data["nkill"] ?? null)) {
            $conditions[] = strval("nkill=" . $data["nkill"]);
        }

        if (!is_null($data["nhostkid"] ?? null)) {
            $conditions[] = strval("nhostkid=" . $data["nhostkid"]);
        }

        if (!is_null($data["propextent"] ?? null)) {
            $conditions[] = strval("propextent=" . $data["propextent"]);
        }

        if (!is_null($data["propextent_txt"] ?? null)) {
            $conditions[] = strval("propextent_txt='" . $data["propextent_txt"] . "'");
        }

        if (!is_null($data["ransom"] ?? null)) {
            $conditions[] = strval("ransom=" . $data["ransom"]);
        }

        if (!is_null($data["ransomamt"] ?? null)) {
            $conditions[] = strval("ransomamt='" . $data["ransomamt"] . "'");
        }

        if (!is_null($data["addnotes"] ?? null)) {
            $conditions[] = strval("addnotes='" . $data["addnotes"] . "'");
        }

        if (!is_null($data["scite1"] ?? null)) {
            $conditions[] = strval("scite1='" . $data["scite1"] . "'");
        }

        if (!is_null($data["scite2"] ?? null)) {
            $conditions[] = strval("scite2='" . $data["scite2"] . "'");
        }

        if (!is_null($data["scite3"] ?? null)) {
            $conditions[] = strval("scite3='" . $data["scite3"] . "'");
        }

        $query = "UPDATE terrorism SET ";


        if (count($conditions) > 0) {
            $sql = $query;
            $sql .= implode(',', $conditions);
            $sql .= "WHERE eventid = " . strval($data["eventid"]);
        }

        if ($this->conexiune->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function stergeRecord($data)
    {
        $data = json_decode($data, true);

        if (!is_null($data["eventid"] ?? null)) {
            $eventid = strval($data["eventid"]);
        } else {
            return false;
        }

        $sql = "DELETE FROM terrorism WHERE eventid = $eventid";

        if ($this->conexiune->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
