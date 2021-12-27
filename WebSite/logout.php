<!DOCTYPE html>
<html lang="it">

<?php
require_once("utils/htmlHelper.php");
$hh = new HTML_Helper();
$hh->generate_header("Logout");
session_destroy();
?>

<body>
  <main>
    <header>
      <h1> Grazie e Arriverdi </h1>
    </header>
    <section>
      <p><a href="index.php">Login</a></p>
    </section>

    <footer>
      <p> Federico Campanozzi </p>
    </footer>
  </main>
</body>

</html>