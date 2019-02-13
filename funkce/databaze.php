<?php
    class Databaze
    {
        protected $pripojeni;

        function __construct($config)
        {
            $this->pripojeni = new mysqli($config["server"], $config["uzivatel"], $config["heslo"], $config["db"]);
            $this->pripojeni->set_charset("utf8");
        }

        function odpojit()
        {
            $this->pripojeni->close();
        }

        function pridej($polozka)
        {
            $datum = date("Y-m-d");

            if($this->IcoExistuje($polozka["ico"])){
                $this->UpravFirmu($polozka);
                return;
            }

            $stmt = $this->pripojeni->prepare("INSERT INTO firmy VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $polozka["ico"], $polozka["dic"], $polozka["nazev"], $polozka["vznik"],
                $polozka["adresa"], $polozka["mesto"], $datum);
            $stmt->execute();

            $stmt->close();
        }

        function pridejFirmy($polozky)
        {
            foreach($polozky as $polozka)
              $this->pridej($polozka);
        }

        function UpravFirmu($polozka)
        {
            $datum = date("Y-m-d");

            $stmt = $this->pripojeni->prepare("UPDATE firmy SET NAZEV = ?, VZNIK = ?, ADRESA = ?, MESTO = ?, POSLEDNI_UPRAVA = ? WHERE ICO = ?;");
            $stmt->bind_param("ssssss", $polozka["nazev"], $polozka["vznik"], $polozka["adresa"], $polozka["mesto"],
                $datum, $polozka["ico"]);
            $stmt->execute();

            $stmt->close();
        }

        function IcoExistuje($ico)
        {
            return $this->pripojeni->query("SELECT COUNT(*) FROM firmy WHERE ICO = '{$ico}';")->fetch_row()[0] > 0;
        }

        function VratFirmu($ico)
        {
            $vysledek = $this->pripojeni->query("SELECT * FROM firmy WHERE ICO = '{$ico}' AND POSLEDNI_UPRAVA >= (CURDATE() - INTERVAL 1 MONTH)");
            if($vysledek->num_rows == 0) return null;

            $radek = $vysledek->fetch_array();
            $vysledek->close();

            return $this->UpravVysledek($radek);
        }

        function UpravVysledek($radek)
        {
            return array_change_key_case($radek, CASE_LOWER);
        }
    };
