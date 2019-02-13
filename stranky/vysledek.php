<div class="row mt-3">
    <div class="col">
        <h4>Nalezený výsledek:</h4>
    </div>
</div>

<div class="row mt-3 justify-content-center">
    <div class="col-6">
        <div class="row">
            <div class="col">IČO:</div>
            <div class="col"><?php echo $vysledek["ico"];?></div>
        </div>

        <div class="row">
            <div class="col">DIČ:</div>
            <div class="col"><?php echo $vysledek["dic"];?></div>
        </div>

        <div class="row">
            <div class="col">Název:</div>
            <div class="col"><?php echo $vysledek["nazev"];?></div>
        </div>

        <div class="row">
            <div class="col">Vznik:</div>
            <div class="col"><?php echo $vysledek["vznik"];?></div>
        </div>

        <div class="row">
            <div class="col">Adresa:</div>
            <div class="col"><?php echo $vysledek["adresa"];?></div>
        </div>

        <div class="row">
            <div class="col">Město:</div>
            <div class="col"><?php echo $vysledek["mesto"];?></div>
        </div>
    </div>
</div>
