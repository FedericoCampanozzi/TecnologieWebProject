<!DOCTYPE html>
<html lang="it">
  <?php
  require_once("utils/htmlHelper.php");
  require_once("utils/database.php");
  $dbh = new DatabaseHelper("localhost", "root", "", "plant");
  $hh = new HTML_Helper();
  $hh->generate_header("Support", "support.php", false, "");
  ?>
<body>
  <main>
    <div>
      <div class="navbar">
        <a class="active" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-house-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
          </svg> Home</a>
        <a href="userProfile.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
          </svg> Profilo Utente</a>
        <a href="contactSupport.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-telephone-inbound-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0z" />
          </svg> Servizio Clienti</a>
        <a href="logout.php">
          <img alt="" src="./images/Ico/ico-logout.jpg" width="16" height="16" /> Logout</a>
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
    </section>
  </main>
</body>

</html>