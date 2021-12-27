<!DOCTYPE html>
<html lang="it">

<body>
  <main>
    <?php
    require_once("utils/htmlHelper.php.php");
    $hh = new HTML_Helper();
    $hh->generate_header("Registrazione Utente", "newUser.php");
    ?>
    <section>
      <form action="utils/insert.php" method="post">
        <button type="submit" class="btn btn-primary">Registrazione</button>
      </form>
    </section>
    <footer>
      <p> Federico Campanozzi </p>
    </footer>
  </main>
</body>

</html>