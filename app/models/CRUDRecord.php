<?php
class CRUDRecord
{
    public function __construct()
    {

        $this->conexiune = ManagerConexiune::getConexiuneLaBD();
    }
    // functie care primeste date si creaza query-ul pentru a introduce un atac in baza de date
    public function adaugaRecord($data)
    {
        $data = json_decode($data, true);
        $conditions = array();

        $conditions[] = strval($data["eventid"] ?? "0");
        $conditions[] = strval($data["iyear"] ?? "0");
        $conditions[] = strval($data["imonth"] ?? "0");
        $conditions[] = strval($data["iday"] ?? "0");
        $conditions[] = strval($data["country"] ?? "0");
        $conditions[] = strval("'" . addslashes($data["country_txt"] ?? "null") . "'");
        $conditions[] = strval($data["region"] ?? "0");
        $conditions[] = strval("'" . addslashes($data["region_txt"] ?? "null") . "'");
        $conditions[] = strval("'" . addslashes($data["provstate"] ?? "null") . "'");
        $conditions[] = strval("'" . addslashes($data["city"] ?? "null") . "'");
        $conditions[] = strval($data["latitude"] ?? "0");
        $conditions[] = strval($data["longitude"] ?? "0");
        $conditions[] = strval("'" . addslashes($data["location"] ?? "null") . "'");
        $conditions[] = strval("'" . addslashes($data["summary"] ?? "null") . "'");
        $conditions[] = strval($data["success"] ?? "null");
        $conditions[] = strval($data["suicide"] ?? "null");
        $conditions[] = strval($data["attacktype1"] ?? "0");
        $conditions[] = strval("'" . addslashes($data["attacktype1_txt"] ?? "null") . "'");
        $conditions[] = strval($data["targtype1"] ?? "0");
        $conditions[] = strval("'" . addslashes($data["targtype1_txt"] ?? "null") . "'");
        $conditions[] = strval($data["targsubtype1"] ?? "0");
        $conditions[] = strval("'" . addslashes($data["targsubtype1_txt"] ?? "null") . "'");
        $conditions[] = strval("'" . addslashes($data["corp1"] ?? "null") . "'");
        $conditions[] = strval("'" . addslashes($data["target1"] ?? "null") . "'");
        $conditions[] = strval($data["natlty1"] ?? "0");
        $conditions[] = strval("'" . addslashes($data["natlty1_txt"] ?? "null") . "'");
        $conditions[] = strval("'" . addslashes($data["gname"] ?? "null") . "'");
        $conditions[] = strval($data["weaptype1"] ?? "0");
        $conditions[] = strval("'" . addslashes($data["weaptype1_txt"] ?? "null") . "'");
        $conditions[] = strval($data["weapsubtype1"] ?? "0");
        $conditions[] = strval("'" . addslashes($data["weapsubtype1_txt"] ?? "null") . "'");
        $conditions[] = strval("'" . addslashes($data["weapdetail"] ?? "null") . "'");
        $conditions[] = strval("'" . addslashes($data["nkill"] ?? "null") . "'");
        $conditions[] = strval("'" . addslashes($data["nhostkid"] ?? "null") . "'");
        $conditions[] = strval("'" . addslashes($data["propextent"] ?? "null") . "'");
        $conditions[] = strval("'" . addslashes($data["propextent_txt"] ?? "null") . "'");
        $conditions[] = strval($data["ransom"] ?? "null");
        $conditions[] = strval("'" . addslashes($data["ransomamt"] ?? "null") . "'");
        $conditions[] = strval("'" . addslashes($data["addnotes"] ?? "null") . "'");
        $conditions[] = strval("'" . addslashes($data["scite1"] ?? "null") . "'");
        $conditions[] = strval("'" . addslashes($data["scite2"] ?? "null") . "'");
        $conditions[] = strval("'" . addslashes($data["scite3"] ?? "null") . "'");

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

    // functie care primeste un eventid si cauta atacul corespunzator
    public function cautaDupaId($data)
    {
        $data = json_decode($data, true);
        if (!is_numeric($data["eventid"])) {
            return false;
        }
        $sql = "SELECT * FROM terrorism where eventid =" .  $data["eventid"];
        $result = mysqli_query($this->conexiune, $sql);

        return mysqli_fetch_assoc($result);
    }

    // functie care primeste date si creaza query-ul pentru a cauta toate atacurile ce corespund filtrelor
    public function cautaRecord($data)
    {
        $data = json_decode($data, true);
        $conditions = array();

        if (($data["iyearin"] ?? null) != "") {
            $conditions[] = strval("iyear>=" . $data["iyearin"]);
        }

        if (($data["iyearsf"] ?? null) != "") {
            $conditions[] = strval("iyear<=" . $data["iyearsf"]);
        }

        if (($data["country_txt"] ?? null) != "") {
            $conditions[] = strval("country_txt='" . $data["country_txt"] . "'");
        }

        if (($data["region_txt"] ?? null) != "") {
            $conditions[] = strval("region_txt='" . $data["region_txt"] . "'");
        }

        if (($data["provstate"]  ?? null) != "") {
            $conditions[] = strval("provstate='" . $data["provstate"] . "'");
        }

        if (($data["attacktype1_txt"]  ?? null) != "") {
            $conditions[] = strval("attacktype1_txt='" . $data["attacktype1_txt"] . "'");
        }

        if (($data["targtype1_txt"]  ?? null) != "") {
            $conditions[] = strval("targtype1_txt='" . $data["targtype1_txt"] . "'");
        }

        if (($data["targsubtype1_txt"] ?? null) != "") {
            $conditions[] = strval("targsubtype1_txt='" . $data["targsubtype1_txt"] . "'");
        }

        if (($data["natlty1_txt"]  ?? null) != "") {
            $conditions[] = strval("natlty1_txt='" . $data["natlty1_txt"] . "'");
        }

        if (($data["weaptype1_txt"]  ?? null) != "") {
            $conditions[] = strval("weaptype1_txt='" . $data["weaptype1_txt"] . "'");
        }

        if (($data["weapsubtype1_txt"]  ?? null) != "") {
            $conditions[] = strval("weapsubtype1_txt='" . $data["weapsubtype1_txt"] . "'");
        }

        if (($data["nkillin"]  ?? null) != "") {
            $conditions[] = strval("nkill>=" . $data["nkillin"]);
        }

        if (($data["nkillsf"]  ?? null) != "") {
            $conditions[] = strval("nkill<=" . $data["nkillsf"]);
        }

        if (($data["propextent_txt"]  ?? null) != "") {
            $conditions[] = strval("propextent_txt='" . $data["propextent_txt"] . "'");
        }

        if (($data["ransom"]  ?? null) != "") {
            $conditions[] = strval("ransom='" . $data["ransom"] . "'");
        }

        if (($data["ransomamtin"]  ?? null) != "") {
            $conditions[] = strval("ransomamt>=" . $data["ransomamtin"]);
        }

        if (($data["ransomamtsf"]  ?? null) != "") {
            $conditions[] = strval("ransomamt<=" . $data["ransomamtsf"]);
        }

        if (($data["searchsummary"]  ?? null) != "") // daca cauta cu searchbar si presupun ca am filtre
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
        if (count($conditions) == 0 && ($data["searchsummary"]  ?? null) != "") {
            $sql = "SELECT * FROM terrorism WHERE summary LIKE '%" . $data["searchsummary"] . "%' ";
        }
        //daca nu avem nimic
        if (count($conditions) == 0 && ($data["searchsummary"]  ?? null) == "") {
            $sql = "SELECT * FROM terrorism ";
        }

        $result = mysqli_query($this->conexiune, $sql);
        if (!$result) return false;
        $content = $result->fetch_all(MYSQLI_ASSOC);
        return $content;
    }

    // functie care primeste date si creaza query-ul pentru a obtine datele necesare generarii graficului
    public function cautaDateGrafic($data)
    {
        $data = json_decode($data, true);
        $conditions = array();

        if (($data["iyearin"] ?? null) != "") {
            $conditions[] = strval("iyear>=" . $data["iyearin"]);
        }

        if (($data["iyearsf"] ?? null) != "") {
            $conditions[] = strval("iyear<=" . $data["iyearsf"]);
        }

        if (($data["country_txt"] ?? null) != "") {
            $conditions[] = strval("country_txt='" . $data["country_txt"] . "'");
        }

        if (($data["region_txt"] ?? null) != "") {
            $conditions[] = strval("region_txt='" . $data["region_txt"] . "'");
        }

        if (($data["provstate"]  ?? null) != "") {
            $conditions[] = strval("provstate='" . $data["provstate"] . "'");
        }

        if (($data["attacktype1_txt"]  ?? null) != "") {
            $conditions[] = strval("attacktype1_txt='" . $data["attacktype1_txt"] . "'");
        }

        if (($data["targtype1_txt"]  ?? null) != "") {
            $conditions[] = strval("targtype1_txt='" . $data["targtype1_txt"] . "'");
        }

        if (($data["targsubtype1_txt"] ?? null) != "") {
            $conditions[] = strval("targsubtype1_txt='" . $data["targsubtype1_txt"] . "'");
        }

        if (($data["natlty1_txt"]  ?? null) != "") {
            $conditions[] = strval("natlty1_txt='" . $data["natlty1_txt"] . "'");
        }

        if (($data["weaptype1_txt"]  ?? null) != "") {
            $conditions[] = strval("weaptype1_txt='" . $data["weaptype1_txt"] . "'");
        }

        if (($data["weapsubtype1_txt"]  ?? null) != "") {
            $conditions[] = strval("weapsubtype1_txt='" . $data["weapsubtype1_txt"] . "'");
        }

        if (($data["nkillin"]  ?? null) != "") {
            $conditions[] = strval("nkill>=" . $data["nkillin"]);
        }

        if (($data["nkillsf"]  ?? null) != "") {
            $conditions[] = strval("nkill<=" . $data["nkillsf"]);
        }

        if (($data["propextent_txt"]  ?? null) != "") {
            $conditions[] = strval("propextent_txt='" . $data["propextent_txt"] . "'");
        }

        if (($data["ransom"]  ?? null) != "") {
            $conditions[] = strval("ransom='" . $data["ransom"] . "'");
        }

        if (($data["ransomamtin"]  ?? null) != "") {
            $conditions[] = strval("ransomamt>=" . $data["ransomamtin"]);
        }

        if (($data["ransomamtsf"]  ?? null) != "") {
            $conditions[] = strval("ransomamt<=" . $data["ransomamtsf"]);
        }

        if (($data["tipdategrafic"]  ?? null) == "") {
            $data["tipdategrafic"] = "country_txt";
        }

        if (($data["selecteazagr"]  ?? null) == "") {
            $data['selecteazagr'] = "Pie";
        }

        if ($data["selecteazagr"] == 'Line') {
            if (($data["searchsummary"]  ?? null) != "") // daca cauta cu searchbar si presupun ca am filtre
            {
                $query = "SELECT " . $data["tipdategrafic"] . " , COUNT(*) AS numarAtacuri FROM terrorism WHERE summary LIKE '%" . $data["searchsummary"] . "%' AND ";
            } else {
                $query = "SELECT " . $data["tipdategrafic"] . " , COUNT(*) AS numarAtacuri FROM terrorism WHERE ";
            }

            //daca avem cautari in filtre
            if (count($conditions) > 0) {
                $sql = $query;
                $sql .= implode(' AND ', $conditions);
                $sql .= " GROUP BY ";
                $sql .= $data["tipdategrafic"];
                $sql .= " ORDER BY " . $data["tipdategrafic"];
            }

            //daca nu avem conditii dar avem searchbar
            if (count($conditions) == 0 && ($data["searchsummary"]  ?? null) != "") {
                $sql = "SELECT " . $data["tipdategrafic"] . " , COUNT(*) AS numarAtacuri FROM terrorism WHERE summary LIKE '%" . $data["searchsummary"] . "%' GROUP BY " . $data["tipdategrafic"] . " ORDER BY " . $data["tipdategrafic"];
            }
            //daca nu avem nimic
            if (count($conditions) == 0 && ($data["searchsummary"]  ?? null) == "") {
                $sql = "SELECT " . $data["tipdategrafic"] . " , COUNT(*) AS numarAtacuri FROM terrorism GROUP BY " . $data["tipdategrafic"] . " ORDER BY " . $data["tipdategrafic"];
            }

            $result = mysqli_query($this->conexiune, $sql);
            if (!$result) return false;
            $content = $result->fetch_all(MYSQLI_ASSOC);
            return $content;
        }
        if (($data["searchsummary"]  ?? null) != "") // daca cauta cu searchbar si presupun ca am filtre
        {
            $query = "SELECT " . $data["tipdategrafic"] . " , COUNT(*) AS numarAtacuri FROM terrorism WHERE summary LIKE '%" . $data["searchsummary"] . "%' AND ";
        } else {
            $query = "SELECT " . $data["tipdategrafic"] . " , COUNT(*) AS numarAtacuri FROM terrorism WHERE ";
        }

        //daca avem cautari in filtre
        if (count($conditions) > 0) {
            $sql = $query;
            $sql .= implode(' AND ', $conditions);
            $sql .= " GROUP BY ";
            $sql .= $data["tipdategrafic"];
            $sql .= " ORDER BY numarAtacuri DESC";
        }

        //daca nu avem conditii dar avem searchbar
        if (count($conditions) == 0 && ($data["searchsummary"]  ?? null) != "") {
            $sql = "SELECT " . $data["tipdategrafic"] . " , COUNT(*) AS numarAtacuri FROM terrorism WHERE summary LIKE '%" . $data["searchsummary"] . "%' GROUP BY " . $data["tipdategrafic"] . " ORDER BY numarAtacuri DESC";
        }
        //daca nu avem nimic
        if (count($conditions) == 0 && ($data["searchsummary"]  ?? null) == "") {
            $sql = "SELECT " . $data["tipdategrafic"] . " , COUNT(*) AS numarAtacuri FROM terrorism GROUP BY " . $data["tipdategrafic"] . " ORDER BY numarAtacuri DESC";
        }


        $result = mysqli_query($this->conexiune, $sql);
        if (!$result) return false;

        $rezultatDeTrimis = array();
        $totalAtacuri = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $totalAtacuri += $row['numarAtacuri'];
                $arr = array(
                    $data['tipdategrafic'] => $row[$data['tipdategrafic']],
                    'numarAtacuri' => $row['numarAtacuri']
                );
                $rezultatDeTrimis[] = $arr;
            }


            $rezultateFinale = array();
            $atacuriOther = 0;

            foreach ($rezultatDeTrimis as $entry) {

                if ($entry['numarAtacuri'] * 100 > $totalAtacuri) {
                    $rezultateFinale[] = array(
                        $data['tipdategrafic'] => $entry[$data['tipdategrafic']],
                        'numarAtacuri' => $entry['numarAtacuri']
                    );
                } else {
                    $atacuriOther += $entry['numarAtacuri'];
                }
            }
            $rezultateFinale[] = array(
                $data['tipdategrafic'] => 'Other',
                'numarAtacuri' => $atacuriOther
            );
            return $rezultateFinale;
        }
    }

    // functie care primeste date si creaza query-ul pentru a obtine datele necesare generarii hartii
    public function cautaDateMap($data)
    {
        $data = json_decode($data, true);
        $conditions = array();

        if (($data["iyearin"] ?? null) != "") {
            $conditions[] = strval("iyear>=" . $data["iyearin"]);
        }

        if (($data["iyearsf"] ?? null) != "") {
            $conditions[] = strval("iyear<=" . $data["iyearsf"]);
        }

        if (($data["country_txt"] ?? null) != "") {
            $conditions[] = strval("country_txt='" . $data["country_txt"] . "'");
        }

        if (($data["region_txt"] ?? null) != "") {
            $conditions[] = strval("region_txt='" . $data["region_txt"] . "'");
        }

        if (($data["provstate"]  ?? null) != "") {
            $conditions[] = strval("provstate='" . $data["provstate"] . "'");
        }

        if (($data["attacktype1_txt"]  ?? null) != "") {
            $conditions[] = strval("attacktype1_txt='" . $data["attacktype1_txt"] . "'");
        }

        if (($data["targtype1_txt"]  ?? null) != "") {
            $conditions[] = strval("targtype1_txt='" . $data["targtype1_txt"] . "'");
        }

        if (($data["targsubtype1_txt"] ?? null) != "") {
            $conditions[] = strval("targsubtype1_txt='" . $data["targsubtype1_txt"] . "'");
        }

        if (($data["natlty1_txt"]  ?? null) != "") {
            $conditions[] = strval("natlty1_txt='" . $data["natlty1_txt"] . "'");
        }

        if (($data["weaptype1_txt"]  ?? null) != "") {
            $conditions[] = strval("weaptype1_txt='" . $data["weaptype1_txt"] . "'");
        }

        if (($data["weapsubtype1_txt"]  ?? null) != "") {
            $conditions[] = strval("weapsubtype1_txt='" . $data["weapsubtype1_txt"] . "'");
        }

        if (($data["nkillin"]  ?? null) != "") {
            $conditions[] = strval("nkill>=" . $data["nkillin"]);
        }

        if (($data["nkillsf"]  ?? null) != "") {
            $conditions[] = strval("nkill<=" . $data["nkillsf"]);
        }

        if (($data["propextent_txt"]  ?? null) != "") {
            $conditions[] = strval("propextent_txt='" . $data["propextent_txt"] . "'");
        }

        if (($data["ransom"]  ?? null) != "") {
            $conditions[] = strval("ransom='" . $data["ransom"] . "'");
        }

        if (($data["ransomamtin"]  ?? null) != "") {
            $conditions[] = strval("ransomamt>=" . $data["ransomamtin"]);
        }

        if (($data["ransomamtsf"]  ?? null) != "") {
            $conditions[] = strval("ransomamt<=" . $data["ransomamtsf"]);
        }

        if (($data["searchsummary"]  ?? null) != "") // daca cauta cu searchbar si presupun ca am filtre
        {
            $query = "SELECT country_txt, latitude, longitude FROM terrorism WHERE summary LIKE '%" . $data["searchsummary"] . "%' AND ";
        } else {
            $query = "SELECT country_txt, latitude, longitude FROM terrorism WHERE ";
        }

        //daca avem cautari in filtre
        if (count($conditions) > 0) {
            $sql = $query;
            $sql .= implode(' AND ', $conditions);
            $sql .= " AND latitude !=0 AND longitude !=0";
        }

        //daca nu avem conditii dar avem searchbar
        if (count($conditions) == 0 && ($data["searchsummary"]  ?? null) != "") {
            $sql = "SELECT country_txt, latitude, longitude FROM terrorism WHERE summary LIKE '%" . $data["searchsummary"] . "%' AND latitude !=0 AND longitude !=0";
        }
        //daca nu avem nimic
        if (count($conditions) == 0 && ($data["searchsummary"]  ?? null) == "") {
            $sql = "SELECT country_txt, latitude, longitude FROM terrorism WHERE latitude !=0 AND longitude !=0";
        }

        $result = mysqli_query($this->conexiune, $sql);
        if (!$result) return false;
        //$content = $result->fetch_all(MYSQLI_ASSOC);

        $content = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $arr = array(
                    'title' => $row['country_txt'],
                    'latitude' => floatval($row['latitude']),
                    'longitude' => floatval($row['longitude']),
                    'color' => "#000000"
                );
                $content[] = $arr;
            }
        }
        return $content;
    }

    // functie care primeste date si creaza query-ul pentru a obtine datele necesare generarii sectiunii de articole
    public function cautaDateArticol($data)
    {
        $data = json_decode($data, true);
        $conditions = array();

        if (($data["iyearin"] ?? null) != "") {
            $conditions[] = strval("iyear>=" . $data["iyearin"]);
        }

        if (($data["iyearsf"] ?? null) != "") {
            $conditions[] = strval("iyear<=" . $data["iyearsf"]);
        }

        if (($data["country_txt"] ?? null) != "") {
            $conditions[] = strval("country_txt='" . $data["country_txt"] . "'");
        }

        if (($data["region_txt"] ?? null) != "") {
            $conditions[] = strval("region_txt='" . $data["region_txt"] . "'");
        }

        if (($data["provstate"]  ?? null) != "") {
            $conditions[] = strval("provstate='" . $data["provstate"] . "'");
        }

        if (($data["attacktype1_txt"]  ?? null) != "") {
            $conditions[] = strval("attacktype1_txt='" . $data["attacktype1_txt"] . "'");
        }

        if (($data["targtype1_txt"]  ?? null) != "") {
            $conditions[] = strval("targtype1_txt='" . $data["targtype1_txt"] . "'");
        }

        if (($data["targsubtype1_txt"] ?? null) != "") {
            $conditions[] = strval("targsubtype1_txt='" . $data["targsubtype1_txt"] . "'");
        }

        if (($data["natlty1_txt"]  ?? null) != "") {
            $conditions[] = strval("natlty1_txt='" . $data["natlty1_txt"] . "'");
        }

        if (($data["weaptype1_txt"]  ?? null) != "") {
            $conditions[] = strval("weaptype1_txt='" . $data["weaptype1_txt"] . "'");
        }

        if (($data["weapsubtype1_txt"]  ?? null) != "") {
            $conditions[] = strval("weapsubtype1_txt='" . $data["weapsubtype1_txt"] . "'");
        }

        if (($data["nkillin"]  ?? null) != "") {
            $conditions[] = strval("nkill>=" . $data["nkillin"]);
        }

        if (($data["nkillsf"]  ?? null) != "") {
            $conditions[] = strval("nkill<=" . $data["nkillsf"]);
        }

        if (($data["propextent_txt"]  ?? null) != "") {
            $conditions[] = strval("propextent_txt='" . $data["propextent_txt"] . "'");
        }

        if (($data["ransom"]  ?? null) != "") {
            $conditions[] = strval("ransom='" . $data["ransom"] . "'");
        }

        if (($data["ransomamtin"]  ?? null) != "") {
            $conditions[] = strval("ransomamt>=" . $data["ransomamtin"]);
        }

        if (($data["ransomamtsf"]  ?? null) != "") {
            $conditions[] = strval("ransomamt<=" . $data["ransomamtsf"]);
        }

        if (($data["pageno"]  ?? null) == "") {
            $data["pageno"] = 1;
        }

        if (($data["searchsummary"]  ?? null) != "") // daca cauta cu searchbar si presupun ca am filtre
        {
            $query = "SELECT eventid, summary FROM terrorism WHERE summary LIKE '%" . $data["searchsummary"] . "%' AND ";
        } else {
            $query = "SELECT eventid, summary FROM terrorism WHERE ";
        }

        //daca avem cautari in filtre
        if (count($conditions) > 0) {
            $sql = $query;
            $sql .= implode(' AND ', $conditions);
            $sql .= " LIMIT " . ($data["pageno"] - 1) * 5 . ", 5";
        }

        //daca nu avem conditii dar avem searchbar
        if (count($conditions) == 0 && ($data["searchsummary"]  ?? null) != "") {
            $sql = "SELECT eventid, summary FROM terrorism WHERE summary LIKE '%" . $data["searchsummary"] . "%' " . "LIMIT " . ($data["pageno"] - 1) * 5 . ", 5";
        }
        //daca nu avem nimic
        if (count($conditions) == 0 && ($data["searchsummary"]  ?? null) == "") {
            $sql = "SELECT eventid, summary FROM terrorism " . "LIMIT " . ($data["pageno"] - 1) * 5 . ", 5";
        }

        $result = mysqli_query($this->conexiune, $sql);
        if (!$result) return false;
        $content = $result->fetch_all(MYSQLI_ASSOC);
        return $content;
    }

    // functie care primeste date si creaza query-ul pentru a edita datele despre un atac
    public function updateRecord($data)
    {
        $data = json_decode($data, true);
        $conditions = array();


        if (($data["iyear"]  ?? null) != "") {
            $conditions[] = strval("iyear=" . $data["iyear"]);
        }

        if (($data["imonth"]  ?? null) != "") {
            $conditions[] = strval("imonth=" . $data["imonth"]);
        }

        if (($data["iday"]  ?? null) != "") {
            $conditions[] = strval("iday=" . $data["iday"]);
        }

        if (($data["country"]  ?? null) != "") {
            $conditions[] = strval("country=" . $data["country"]);
        }

        if (($data["country_txt"]  ?? null) != "") {
            $conditions[] = strval("country_txt='" . $data["country_txt"] . "'");
        }

        if (($data["region"]  ?? null) != "") {
            $conditions[] = strval("region=" . $data["region"]);
        }

        if (($data["region_txt"]  ?? null) != "") {
            $conditions[] = strval("region_txt='" . $data["region_txt"] . "'");
        }

        if (($data["provstate"]  ?? null) != "") {
            $conditions[] = strval("provstate='" . $data["provstate"] . "'");
        }

        if (($data["city"]  ?? null) != "") {
            $conditions[] = strval("city='" . $data["city"] . "'");
        }

        if (($data["latitude"]  ?? null) != "") {
            $conditions[] = strval("latitude=" . $data["latitude"]);
        }

        if (($data["longitude"]  ?? null) != "") {
            $conditions[] = strval("longitude=" . $data["longitude"]);
        }

        if (($data["location"]  ?? null) != "") {
            $conditions[] = strval("location='" . $data["location"] . "'");
        }

        if (($data["summary"]  ?? null) != "") {
            $conditions[] = strval("summary='" . $data["summary"] . "'");
        }

        if (($data["success"]  ?? null) != "") {
            $conditions[] = strval("success=" . $data["success"]);
        }

        if (($data["suicide"]  ?? null) != "") {
            $conditions[] = strval("suicide=" . $data["suicide"]);
        }

        if (($data["attacktype1"]  ?? null) != "") {
            $conditions[] = strval("attacktype1=" . $data["attacktype1"]);
        }

        if (($data["attacktype1_txt"]  ?? null) != "") {
            $conditions[] = strval("attacktype1_txt='" . $data["attacktype1_txt"] . "'");
        }

        if (($data["targtype1"]  ?? null) != "") {
            $conditions[] = strval("targtype1=" . $data["targtype1"]);
        }

        if (($data["targtype1_txt"]  ?? null) != "") {
            $conditions[] = strval("targtype1_txt='" . $data["targtype1_txt"] . "'");
        }

        if (($data["targsubtype1"]  ?? null) != "") {
            $conditions[] = strval("targsubtype1=" . $data["targsubtype1"]);
        }

        if (($data["targsubtype1_txt"]  ?? null) != "") {
            $conditions[] = strval("targsubtype1_txt='" . $data["targsubtype1_txt"] . "'");
        }

        if (($data["corp1"]  ?? null) != "") {
            $conditions[] = strval("corp1='" . $data["corp1"] . "'");
        }

        if (($data["target1"]  ?? null) != "") {
            $conditions[] = strval("target1='" . $data["target1"] . "'");
        }

        if (($data["natlty1"]  ?? null) != "") {
            $conditions[] = strval("natlty1=" . $data["natlty1"]);
        }

        if (($data["natlty1_txt"]  ?? null) != "") {
            $conditions[] = strval("natlty1_txt='" . $data["natlty1_txt"] . "'");
        }

        if (($data["gname"]  ?? null) != "") {
            $conditions[] = strval("gname='" . $data["gname"] . "'");
        }

        if (($data["weaptype1"]  ?? null) != "") {
            $conditions[] = strval("weaptype1=" . $data["weaptype1"]);
        }

        if (($data["weaptype1_txt"]  ?? null) != "") {
            $conditions[] = strval("weaptype1_txt='" . $data["weaptype1_txt"] . "'");
        }

        if (($data["weapsubtype1"]  ?? null) != "") {
            $conditions[] = strval("weapsubtype1=" . $data["weapsubtype1"]);
        }

        if (($data["weapsubtype1_txt"]  ?? null) != "") {
            $conditions[] = strval("weapsubtype1_txt='" . $data["weapsubtype1_txt"] . "'");
        }

        if (($data["weapdetail"]  ?? null) != "") {
            $conditions[] = strval("weapdetail='" . $data["weapdetail"] . "'");
        }

        if (($data["nkill"]  ?? null) != "") {
            $conditions[] = strval("nkill=" . $data["nkill"]);
        }

        if (($data["nhostkid"]  ?? null) != "") {
            $conditions[] = strval("nhostkid=" . $data["nhostkid"]);
        }

        if (($data["propextent"]  ?? null) != "") {
            $conditions[] = strval("propextent=" . $data["propextent"]);
        }

        if (($data["propextent_txt"]  ?? null) != "") {
            $conditions[] = strval("propextent_txt='" . $data["propextent_txt"] . "'");
        }

        if (($data["ransom"]  ?? null) != "") {
            $conditions[] = strval("ransom=" . $data["ransom"]);
        }

        if (($data["ransomamt"]  ?? null) != "") {
            $conditions[] = strval("ransomamt='" . $data["ransomamt"] . "'");
        }

        if (($data["addnotes"]  ?? null) != "") {
            $conditions[] = strval("addnotes='" . $data["addnotes"] . "'");
        }

        if (($data["scite1"]  ?? null) != "") {
            $conditions[] = strval("scite1='" . $data["scite1"] . "'");
        }

        if (($data["scite2"]  ?? null) != "") {
            $conditions[] = strval("scite2='" . $data["scite2"] . "'");
        }

        if (($data["scite3"]  ?? null) != "") {
            $conditions[] = strval("scite3='" . $data["scite3"] . "'");
        }

        $query = "UPDATE terrorism SET ";


        if (count($conditions) > 0) {
            $sql = $query;
            $sql .= implode(',', $conditions);
            $sql .= " WHERE eventid = " . strval($data["eventid"]);
        }

        if ($this->conexiune->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // functie care primeste eventid-ul si creaza query-ul pentru a sterge atacul corespunzator
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
