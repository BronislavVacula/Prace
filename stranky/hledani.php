<div class="row">
    <div class="col">
        <h1>Hledání údajů o firmě</h1>
    </div>
</div>

<div class="row mt-3 border py-3 justify-content-center">
    <div class="col-5">
        <form name="hledani" action="index.php" method="POST" onsubmit="return overICO()">
            <div class="form-group">
                <label for="ico">IČO:</label>
                <input class="form-control" type="Text" name="ico" id="ico" />
            </div>

            <div class="form-group">
                <label for="jmenofirmy">Jméno firmy:</label>
                <input class="form-control" type="Text" name="jmenofirmy" id="jmenofirmy" />
            </div>

            <button class="btn btn-primary" type="submit">Vyhledat</button>
        </form>
    </div>
</div>
