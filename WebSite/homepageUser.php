<?php
    session_start();
    var_dump($_SESSION);
    require_once("utils/database.php");
    $dbh = new DatabaseHelper("localhost", "root", "", "plant");
?>
<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="utf-8">
  <title>Homepage User</title>
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
        <a href="userProfile.php"><i class="fa fa-user fa-fw"></i> Profilo Utente</a>
        <a href="contactSupport.php"><i class="fa fa-shopping-cart"></i> Contact</a>
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
        echo "<form action=\"utils/insert.php\" method=\"get\" class=\"product-container\">
                <input type=\"text\" name=\"obj_to_insert\" style=\"display: none;\" value=\"riga_carello\">
                <input type=\"text\" name=\"product_id\" style=\"display: none;\" value=\"".$products[$i]["ID"]."\">
                <div class=\"product-name\">".$products[$i]["Nome"]."</div>
                <div class=\"product-desc\">".$products[$i]["Descrizione"]."</div>
                <div class=\"product-prezzo\">".$products[$i]["Prezzo"]."</div>
                <div class=\"product-desc-cat\">".$products[$i]["NomeC"]."</div>
                <div class=\"prd-produttore\">".$products[$i]["DescC"]."</div>
                <div class=\"prd-produttore\">".$products[$i]["RagioneSociale"]."</div>
                <button type=\"submit\" class=\"btn btn-primary\">+</button>
              </form>";
      }
      ?>
    </section>
    <script>
      
    </script>
  </main>
</body>

</html>