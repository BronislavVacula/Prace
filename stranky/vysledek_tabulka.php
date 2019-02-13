<div class="row mt-5">
    <div class="col">
        <h4>Nalezené výsledky:</h4>
    </div>
</div>

<div class="table-responsive mt-3">
    <table class="table" id="tabulka">
        <thead>
            <tr class="bg-dark text-light">
                <td>IČO</td>
                <td>Název firmy</td>
                <td>Adresa</td>
                <td>#</td>
            </tr>
        </thead>

        <tbody>
            <?php foreach($vysledek as $polozka) { ?>
                <tr>
                    <td><?php echo $polozka["ico"];?></td>
                    <td><?php echo $polozka["nazev"];?></td>
                    <td><?php echo $polozka["adresa"];?></td>
                    <td><a href="index.php?ico=<?php echo $polozka["ico"];?>">Detail</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
