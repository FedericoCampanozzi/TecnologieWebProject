<!DOCTYPE html>
<html lang="it">
<?php
require_once("utils/htmlHelper.php");
require_once("utils/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "plant");
$hh = new HTML_Helper();
$hh->generate_page_head("Homepage", "homepageUser.php", false, false);
?>

<body>
  <main>
    <?php 
      $hh->generate_header("User Homepage"); 
      $hh->generate_user_nav();
    ?>
      <div class="scrollable-content">
        <?php
        $products = $dbh->get_products();
        
        for ($i = 0; $i < sizeof($products); $i++) {
          echo "
           <form action=\"utils/insert.php\" method=\"get\">
           <input type=\"hidden\" name=\"obj_to_insert\" value=\"rc_usr_hp\">
           <input type=\"hidden\" name=\"product_id\" value=\"" . $products[$i]["ID"] . "\">
           <div class=\"product-container\">
           <!--
           <div class=\"nome-prodotto\">" . $products[$i]["Nome"] . "</div>
           <div class=\"giacenza\">
           Pezzi Rimanenti : <span>  " . $products[$i]["Giacenza"] . "</span>
           </div>
           <div class=\"categoria\">" . $products[$i]["NomeC"] . "</div>
           <div class=\"desc\"> Descrizione : </br>" . $products[$i]["Descrizione"] . "</div>
           <div class=\"prezzo\">" . $products[$i]["Prezzo"] . "  &euro;</div>
           <div class=\"produttore\">
           Produttore : <span>" . $products[$i]["RagioneSociale"] . "</span>
           </div>
           <div class=\"immagine\">
             <img alt=\"\" src=.\images\prodotti\\" . $products[$i]["ImagePath"] . " width=\"156\" height=\"156\">
           </div>
          ";
          if($products[$i]["Giacenza"] > 0){
            echo"<button type=\"submit\" class=\"custom-btn btn-11 bg-white\"> Aggiungi </button>";
          }
          echo " -->
           </div>
           </form>
          ";
        }
        ?>
      </div>
    <?php
    $hh->generate_footer(true);
    ?>
  </main>

</body>

</html>