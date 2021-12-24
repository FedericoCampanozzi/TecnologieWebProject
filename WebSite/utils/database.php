<?php
class DatabaseHelper{
    private $db;
    public function __construct($servername, $username, $password, $dbname) {
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if($this->db->connect_error){
            die("Connesione fallita al db");
        }
    }
    /* MISC */
    public function find_login($user, $password) {
        /*Da cambiare in Psw che usa SHA512*/
        $stmt = $this->db->prepare("SELECT * FROM ruoliutente WHERE (Username = ? OR EMail = ?) AND PswInChiaro = ?");
        $stmt->bind_param("sss", $user, $user, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $stmt->affected_rows == 1;
    }
    public function last_ordine($idUtente) {
      return 1;
    }
    public function close_ordine($idOrdine) {
      return 1;
    }
    /*-----------------------------------------------------------------------------------------------------------*/    
    /* GET */
    public function get_login($user, $password) {
      $stmt = $this->db->prepare("SELECT * FROM ruoliutente WHERE (Username = ? OR EMail = ?) AND PswInChiaro = ?");
      $stmt->bind_param("sss", $user, $user, $password);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function get_users() {
        $stmt = $this->db->prepare("SELECT * FROM ruoliutente");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }    
    public function get_role() {
        $stmt = $this->db->prepare("SELECT * FROM ruolo");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function get_products() {
      $stmt = $this->db->prepare("SELECT * FROM info_prodotto");
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function get_carte($idUtente) {
      $stmt = $this->db->prepare("SELECT * FROM carte WHERE idUtente = ?");
      $stmt->bind_param("i", $idUtente);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function get_recapiti($idUtente) {
      $stmt = $this->db->prepare("SELECT * FROM recapiti WHERE idUtente = ?");
      $stmt->bind_param("i", $idUtente);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function get_carrello($idUtente) {
      $stmt = $this->db->prepare("SELECT * FROM info_carrelli WHERE idUtente = ?");
      $stmt->bind_param("i", $idUtente);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function get_user_totals($idUtente) {
      $stmt = $this->db->prepare("SELECT COUT(idUtente) AS NrProdotti, SUM(TotaleProdotto) AS TotaleCarrello FROM info_carrelli WHERE idUtente = ? GROUP BY idUtente");
      $stmt->bind_param("i", $idUtente);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function get_open_ordini($idUtenteFattorino) {
      $stmt = $this->db->prepare("SELECT COUT(idUtente) AS NrProdotti, SUM(TotaleProdotto) AS TotaleCarrello FROM info_carrelli WHERE idUtente = ? GROUP BY idUtente");
      $stmt->bind_param("i", $idUtente);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
    }
    /*-----------------------------------------------------------------------------------------------------------*/
    /* INSERT */
    public function insert_fornitore($p_iva, $rs, $via, $nc, $citta) {
        $query = "INSERT INTO `fornitore`(`PIVA`,`RagioneSociale`, `Via`, `NumeroCivico`, `Citta`) VALUES (?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssis",$p_iva,$rs,$via,$nc,$citta);
        return $stmt->execute();
    }
    public function insert_carta($numero, $meseScadenza, $annoScadenza, $ccv, $tipo, $idUtente) {
        $dataScadenza = "01/".$meseScadenza."/".$annoScadenza;
        $query = "INSERT INTO `carta`(`Numero`,`DataScadenza`, `CCV`, `Tipo`, `IdUtente`) VALUES (?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("isisi",$numero, $dataScadenza, $ccv, $tipo, $idUtente);
        return $stmt->execute();
    }
    public function insert_recapito($via, $nc, $citta, $interno, $idUtente) {
        if($interno == ""){
            $query = "INSERT INTO `recapito`(`Via`, `NumeroCivico`, `Citta`, `interno`, `IdUtente`) VALUES (?,?,?,NULL,?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("sisi",$via, $nc, $citta, $idUtente);
        } else {
            $query = "INSERT INTO `recapito`(`Via`, `NumeroCivico`, `Citta`, `interno`, `IdUtente`) VALUES (?,?,?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("sissi",$via, $nc, $citta, $interno, $idUtente);
        }
        return $stmt->execute();
    }
    public function insert_ordine($idUtente) {
    }
    /*-----------------------------------------------------------------------------------------------------------*/
    /* DELETE */
    /*-----------------------------------------------------------------------------------------------------------*/
    /*-----------------------------------------------------------------------------------------------------------*/
    /* UPDATE */
    public function update_riga_carrello($idUtente, $idprodotto, $idOrdine){
        $query = "UPDATE `riga_carrello` SET idOrdine = ?, dataEvasione = NOW() WHERE idUtente = ? AND idprodotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("iii",$idUtente, $idprodotto, $idOrdine);
        return $stmt->execute();
    }
    /*-----------------------------------------------------------------------------------------------------------*/
}
?>
