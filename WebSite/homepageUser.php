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
      $hh->generate_user_nav(true);
    ?>
      <div class="scrollable-content">
        <?php
        $products = $dbh->get_products();
        /*
        for ($i = 0; $i < sizeof($products); $i++) {
          echo "<form action=\"utils/insert.php\" method=\"get\">
          <input type=\"hidden\" name=\"obj_to_insert\" value=\"rc_usr_hp\">
          <input type=\"hidden\" name=\"product_id\" value=\"" . $products[$i]["ID"] . "\">
          <div class=\"product-container\">
          <span class=\"nome-prodotto\">" . $products[$i]["Nome"] . "</span>
          <div class=\"immagine\">
             <img alt=\"\" src=.\images\prodotti\\" . $products[$i]["ImagePath"] . " width=\"156\" height=\"156\">
           </div>
           <div class=\"giacenza\">
            Pezzi Rimanenti : <span>  " . $products[$i]["Giacenza"] . "</span>
           </div>
           <span class=\"categoria\">" . $products[$i]["NomeC"] . "</span>
           <div class=\"desc\"> Descrizione : " . $products[$i]["Descrizione"] . "</div>
           <!--
           <span class=\"prezzo\">" . $products[$i]["Prezzo"] . "  &euro;</span>
          <div class=\"produttore\">
          Produttore : <span>" . $products[$i]["RagioneSociale"] . "
          </div>
          <span class=\"desc\"> Descrizione : " . $products[$i]["Descrizione"] . "</span>
          -->";
          if($products[$i]["Giacenza"] > 0){
            echo"<button type=\"submit\"> Aggiungi </button>";
          }
          echo "</div></form>";
        }
        */
        for ($i = 0; $i < sizeof($products); $i++) {
          echo "
          <form action=\"utils/insert.php\" method=\"get\">
            <input type=\"hidden\" name=\"obj_to_insert\" value=\"rc_usr_hp\">
            <input type=\"hidden\" name=\"product_id\" value=\"\">
            <div class=\"product-container\">
              <div class=\"nome-prodotto\"> </div>
              <div class=\"immagine\">
                <img alt=\"\" src=.\images\prodotti\\" . $products[$i]["ImagePath"] . " width=\"156\" height=\"156\">
              </div>
              <div class=\"giacenza\">
                Pezzi Rimanenti : <div>  </div>
              </div>
              <div class=\"categoria\"> </div>
              <div class=\"desc\"> Descrizione : </div>
              <div class=\"prezzo\"> </div>ss
              <div class=\"produttore\">
                Produttore : <div> </div>
              </div>
              <div class=\"desc\"> Descrizione : </div>
          ";
          if($products[$i]["Giacenza"] > 0){
            echo"<button type=\"submit\"> Aggiungi </button>";
          }
          echo "</div>
          </form>";
          break;
        }
        ?>
      </div>
    <?php
    $hh->generate_footer(true);
    ?>
  </main>
</body>

</html>