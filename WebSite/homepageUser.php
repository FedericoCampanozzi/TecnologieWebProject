<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="utf-8">
  <title>Plant</title>
  <link href="css/reset.css" type="text/css">
  <link href="css/style2.css" type="text/css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <!-- cdn for modernizr, if you haven't included it already -->
  <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
  <!-- polyfiller file to detect and load polyfills -->
  <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>

<body>
  <?php
  require_once("utils/database.php");
  $dbh = new DatabaseHelper("localhost", "root", "", "plant");
  ?>
  <main>
    <div>
      <div class="navbar">
        <a class="active" href="#"><i class="fa fa-home fa-fw"></i> Home</a>
        <a href="#"><i class="fa fa-user fa-fw"></i> Profilo</a>
        <a href="#"><i class="fa fa-shopping-cart"></i> Carrello</a>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-fw fa-search"></i> Search</button>
        </form>
      </div>
    </div>
    <section>
      <?php
      $products = $dbh->get_products();
      for ($i = 0; $i < sizeof($products); $i++) {
        echo "<div> <p>" . $products[$i]["Nome"] . "</p>" . $products[$i]["Descrizione"] . "</div>";
      }
      ?>
    </section>
  </main>
  <a href="userProfile.php"> PROFILO </a>
  <a href="pagamento.php"> PROCEDI DIRETTAMENTE ALL"ORDINE </a>
</body>

</html>