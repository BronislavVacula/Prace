<!doctype html>
<html lang="cs">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Vyhledávání údajů</title>
  </head>

  <body onLoad="razeni();">
    <div class="container text-center">
      <?php
        require_once("stranky/hledani.php");

        if(isset($vysledek)){
          if (count($vysledek) == count($vysledek, COUNT_RECURSIVE))
            require_once("stranky/vysledek.php");
          else require_once("stranky/vysledek_tabulka.php");
        }
      ?>

      <div class="row mt-3">
        <div class="col"><a href="/index.php">Úvodní stránka</a></div>
      </div>
    </div>

    <script src="/js/hlavni.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
  </body>
</html>
