<?php
    if(!file_exists("config.php")) header("Location: /instalace/");

    include("config.php");
    include("funkce/databaze.php");
    include("funkce/firmy.php");
    include("zpracovani/ZpracovaniHledani.php");

    $db = new Databaze($config);

    if(isset($_POST["ico"]) || isset($_GET["ico"])) {
        $zpracovani = new ZpracovaniHledani();
        $firmy = new Firmy();

        if($zpracovani->ICOValidni()){
            if($zpracovani->ico != "") {
              $db_firma = $db->VratFirmu($zpracovani->ico);

              if($db_firma == null) {
                $vysledek = $firmy->PodleICO($zpracovani->ico);
                $db->pridej($vysledek);
              } else $vysledek = $db_firma;
            } elseif($zpracovani->jmenofirmy != "") {
              $vysledek = $firmy->PodleNazvu($zpracovani->jmenofirmy);
              $db->pridejFirmy($vysledek);
            }
        } else echo "IČO musí být číslo!";
    }

    require_once("zobrazeni.php");

    $db->odpojit();
?>
