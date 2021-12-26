<!DOCTYPE html>
<html lang="it">
    <?php
    ?>

<body>
    <main>
        <header>
        </header>
        <section>
            <form action="utils/update.php" method="get">
                <input type="text" name="obj_to_insert" class="hidden-field" value="fornitore">
                <div class="form-group">
                    <label for="ragione_sociale">Ragione Sociale : </label>
                    <input type="text" class="form-control" name="ragione_sociale" id="ragione_sociale" placeholder="Ragione Sociale">
                </div>
                <div class="form-group">
                    <label for="via">Via : </label>
                    <input type="text" class="form-control" name="via" id="via" placeholder="Via">
                </div>
                <div class="form-group">
                    <label for="numero_civico">Numero Civico : </label>
                    <input type="text" class="form-control" name="numero_civico" id="numero_civico" placeholder="Numero Civico">
                </div>
                <div class="form-group">
                    <label for="citta">Citt&agrave; : </label>
                    <input type="text" class="form-control" name="citta" id="citta" placeholder="citt&agrave;">
                </div>
                <button type="submit" class="btn btn-primary">Aggiorna Dati</button>
            </form>
        </section>

        <footer>
            <p> Federico Campanozzi </p>
        </footer>
    </main>
</body>

</html>