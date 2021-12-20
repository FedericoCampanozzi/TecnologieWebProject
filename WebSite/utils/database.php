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
        $stmt = $this->db->prepare("SELECT * FROM ruoliutente WHERE (Username = ? OR EMail = ?) AND Psw = ?");
        $stmt->bind_param("sss", $user, $user, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $stmt->affected_rows == 1;
    }
    /*-----------------------------------------------------------------------------------------------------------*/    
    /* GET */
    public function get_login($user, $password) {
      $stmt = $this->db->prepare("SELECT * FROM ruoliutente WHERE (Username = ? OR EMail = ?) AND Psw = ?");
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
      $stmt = $this->db->prepare("SELECT * FROM prodotto");
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
    /*-----------------------------------------------------------------------------------------------------------*/
    /* DELETE */
    /*-----------------------------------------------------------------------------------------------------------*/
}
?>
