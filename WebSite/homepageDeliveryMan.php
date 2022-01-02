<!DOCTYPE html>
<html lang="it">

<?php
require_once("utils/htmlHelper.php");
$hh = new HTML_Helper();
$hh->generate_page_head("Pagina Fattorino", "homepageDeliveryMan.php", true, true);
?>
<body>
  <main>
    <section>
      <?php $hh->generate_header("Pannello Consegne"); ?>
      <div class="scrollable-content p-5 table-responsive">
        <table id="tbl_consegne" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Cognome</th>
              <th>Tipo Pagamento</th>
              <th>Indirizzo</th>
              <th>Note</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once("utils/database.php");
            $dbh = new DatabaseHelper("localhost", "root", "", "plant");
            $consegne  = $dbh->get_open_ordini();
            for ($i = 0; $i < sizeof($consegne); $i++) {
              $tp = "";
              if ($consegne[$i]["SceltaContanti"] == 1) $tp = "In Contanti";
              else $tp = "Carta";
              echo "<tr>
                        <td>" . $consegne[$i]["ID"] . "</td>
                        <td>" . $consegne[$i]["Nome"] . "</td>
                        <td>" . $consegne[$i]["Cognome"] . "</td>
                        <td>" . $tp . "</td>
                        <td>" . $consegne[$i]["Via"] . "," . $consegne[$i]["NumeroCivico"] . " - " . $consegne[$i]["Citta"] . "</td>
                        <td>" . $consegne[$i]["Note"] . "</td>
                        <td> 
                          <form action=\"utils/update.php\" method=\"get\">
                            <input type=\"hidden\" name=\"obj_to_update\" value=\"ordine\">
                            <input type=\"hidden\" name=\"id_ordine\" value=\"" . $consegne[$i]["ID"] . "\">
                            <button type=\"submit\" class=\"btn-rounded-2\"> Consegnato </button>
                          </form> 
                        </td>
                      </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </section>
    <aside class="gfx-link">
      Clicca <a href="logout.php">qui</a> per effettuare il logout
    </aside>
    <script src="./js/homepageDeliveryMan.js"></script>
    <?php $hh->generate_footer(); ?>
  </main>
</body>

</html>