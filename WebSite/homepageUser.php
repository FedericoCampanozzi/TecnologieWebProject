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
    <section>
      <div style="height: 750px; overflow-y:scroll;">
        <?php
        $products = $dbh->get_products();
        for ($i = 0; $i < sizeof($products); $i++) {
          echo "<form action=\"utils/insert.php\" method=\"get\" class=\"product-container\">
          <input type=\"text\" name=\"obj_to_insert\" style=\"display: none;\" value=\"rc_usr_hp\">
          <input type=\"text\" name=\"product_id\" style=\"display: none;\" value=\"" . $products[$i]["ID"] . "\">
          <div class=\"nome\">" . $products[$i]["Nome"] . "</div>
          <div class=\"desc\">" . $products[$i]["Descrizione"] . "</div>
          <div class=\"prezzo\">" . $products[$i]["Prezzo"] . "  &euro;</div>
          <div class=\"categoria\">" . $products[$i]["NomeC"] . "</div>
          <div class=\"produttore\">" . $products[$i]["RagioneSociale"] . "</div>
          <button type=\"submit\" class=\"add-btn\"> Aggiungi </button>
          </form>";
        }
        ?>
      </div>
    </section>
    <?php
    $hh->generate_footer();
    ?>
  </main>
</body>

</html>