<?php
    $ok = 0;

    if(isset($_POST["server"])){
        $instalace_sql = file_get_contents("../db.sql");

        $pripojeni = new mysqli($_POST["server"], $_POST["uzivatel"], $_POST["heslo"], $_POST["db"]);
        $pripojeni->set_charset("utf8");
        $pripojeni->query($instalace_sql);
        $pripojeni->close();

        $config = '<?php
    $config = [
        "server" => "' . $_POST["server"] . '",
        "uzivatel" => "'.$_POST["uzivatel"] . '",
        "heslo" => "' . $_POST["heslo"] . '",
        "db" => "' . $_POST["db"] . '"
    ];';

        $soubor = fopen("../config.php","wa+");
        fwrite($soubor, $config);
        fclose($soubor);

        $ok = 1;
    }

    if($ok) echo "Instalace proběhla úspěšně! <a href='/index.php'>Přejít na úvodní stránku</a>";
    else echo "Instalace se nezdařila!";
