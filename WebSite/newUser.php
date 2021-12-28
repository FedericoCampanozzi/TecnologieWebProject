<!DOCTYPE html>
<html lang="it">
  <?php
  require_once("utils/htmlHelper.php");
  $hh = new HTML_Helper();
  $hh->generate_header("Registrazione Utente", "newUser.php");
  ?>
<body>
  <main>
    <section>
      <form action="utils/insert.php" method="post">
        <input type="hidden" name="obj_to_insert" value="user">
        <div class="form-group">
          <label for="username">Username : </label>
          <input type="text" class="form-control" name="username" id="username" placeholder="">
        </div>
        <div class="form-group">
          <label for="psw">Password : </label>
          <input type="password" class="form-control" name="psw" id="psw" placeholder="">
        </div>
        <div class="form-group">
          <label for="nome">Nome : </label>
          <input type="text" class="form-control" name="nome" id="nome" placeholder="">
        </div>
        <div class="form-group">
          <label for="cognome">Cognome : </label>
          <input type="text" class="form-control" name="cognome" id="cognome" placeholder="">
        </div>
        <div class="form-group">
          <label for="dataNascita">Data di Nascita : </label>
          <input type="date" class="form-control" name="dataNascita" id="dataNascita" placeholder="">
        </div>
        <div class="form-group">
          <label for="email">EMail : </label>
          <input type="email" class="form-control" name="email" id="email" placeholder="">
        </div>
        <div class="form-group">
          <label for="telefono">Telefono : </label>
          <input type="text" class="form-control" name="telefono" id="telefono" placeholder="">
        </div>
        <button type="submit" class="btn btn-primary">Registrazione</button>
      </form>
    </section>
    Tornare <a href="index.php">qui</a>
    <footer>
      <p> Federico Campanozzi </p>
    </footer>
  </main>
</body>

</html>