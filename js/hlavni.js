function overICO()
{
    var ico = document.forms["hledani"]["ico"].value;

    if (isNaN(ico))
    {
        alert("IČO musí být číslo!");
        return false;
    }
}

function tabulkaSloupce(tabulka)
{
    var th = tabulka.tHead;
    th && (th = th.rows[0]) && (th = th.cells);

    if(!th) return false;
    return th;
}

function razeni()
{
    var tabulka = document.getElementById("tabulka"), i;
    if(tabulka == null) return;

    var sloupce = tabulkaSloupce(tabulka);
    if(!sloupce) return;

    i = sloupce.length;

    while (--i >= 0) (function (i) {
        var smer = 1;
        sloupce[i].addEventListener('click', function () {
            radTabulku(tabulka, i, (smer = 1 - smer))
        });
    }(i));
}

function radTabulku(tabulka, sloupec, obracene) {
    var tabulka_body = tabulka.tBodies[0];
    var tabulka_tr = Array.prototype.slice.call(tabulka_body.rows, 0), i;

    obracene = -((+obracene) || -1);

    tabulka_tr = tabulka_tr.sort(function (a, b) {
        return obracene * (a.cells[sloupec].textContent.trim() .localeCompare(b.cells[sloupec].textContent.trim()));
    });

    for(i = 0; i < tabulka_tr.length; ++i) tabulka_body.appendChild(tabulka_tr[i]);
}
