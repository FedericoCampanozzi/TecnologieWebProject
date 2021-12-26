<?php
class DatabaseHelper
{
  private $db;
  public function __construct($servername, $username, $password, $dbname)
  {
    $this->db = new mysqli($servername, $username, $password, $dbname);
    if ($this->db->connect_error) {
      die("Connesione fallita al db");
    }
  }
  /* MISC */
  public function find_login($user, $password)
  {
    /*Da cambiare in Psw che usa SHA512*/
    $stmt = $this->db->prepare("SELECT * FROM ruoli_utente WHERE (Username = ? OR EMail = ?) AND PswInChiaro = ?");
    $stmt->bind_param("sss", $user, $user, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $result->fetch_all(MYSQLI_ASSOC);
    return $stmt->affected_rows == 1;
  }
  public function last_ordine($idUtente)
  {
    $stmt = $this->db->prepare("SELECT MAX(ID) AS LastID from ordine where IdUtente = ?");
    $stmt->bind_param("i", $idUtente);
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_all(MYSQLI_ASSOC);
    if ($stmt->affected_rows <= 0) return -1;
    return $result[0]["LastID"];
  }
  /*-----------------------------------------------------------------------------------------------------------*/
  /* GET */
  public function get_login($user, $password)
  {
    $stmt = $this->db->prepare("SELECT * FROM ruoli_utente WHERE (Username = ? OR EMail = ?) AND PswInChiaro = ?");
    $stmt->bind_param("sss", $user, $user, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_users()
  {
    $stmt = $this->db->prepare("SELECT * FROM ruoli_utente");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_role()
  {
    $stmt = $this->db->prepare("SELECT * FROM ruolo");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_products()
  {
    $stmt = $this->db->prepare("SELECT * FROM info_prodotto");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_carte($idUtente)
  {
    $stmt = $this->db->prepare("SELECT * FROM carta WHERE idUtente = ?");
    $stmt->bind_param("i", $idUtente);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_recapiti($idUtente)
  {
    $stmt = $this->db->prepare("SELECT * FROM recapito WHERE idUtente = ?");
    $stmt->bind_param("i", $idUtente);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_carrello($idUtente)
  {
    $stmt = $this->db->prepare("SELECT * FROM carrello_utente WHERE idUtente = ?");
    $stmt->bind_param("i", $idUtente);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_open_ordini()
  {
    $stmt = $this->db->prepare("SELECT * FROM info_ordine WHERE DataConsegna is null");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  public function get_user_ordini($idUtente)
  {
    $stmt = $this->db->prepare("SELECT * FROM info_ordine WHERE IdUtente = ?");
    $stmt->bind_param("i", $idUtente);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  /*-----------------------------------------------------------------------------------------------------------*/
  /* INSERT */
  public function insert_fornitore($p_iva, $rs, $via, $nc, $citta)
  {
    $query = "INSERT INTO `fornitore`(`PIVA`,`RagioneSociale`, `Via`, `NumeroCivico`, `Citta`) VALUES (?,?,?,?,?)";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("sssis", $p_iva, $rs, $via, $nc, $citta);
    return $stmt->execute();
  }
  public function insert_carta($numero, $dataScadenza, $ccv, $tipo, $idUtente)
  {
    $query = "INSERT INTO `carta`(`Numero`,`DataScadenza`, `CCV`, `Tipo`, `IdUtente`) VALUES (?,?,?,?,?)";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("isisi", $numero, $dataScadenza, $ccv, $tipo, $idUtente);
    return $stmt->execute();
  }
  public function insert_rc($idprodotto, $idUtente)
  {
    $query = "INSERT INTO `riga_carrello`(`DataCreate`,`IdUtente`, `IdProdotto`, `IdOrdine`, `DataEvasione`) VALUES (CURRENT_TIMESTAMP(),?,?,NULL,NULL)";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("ii", $idUtente, $idprodotto);
    return $stmt->execute();
  }
  public function insert_recapito($via, $nc, $citta, $interno, $idUtente)
  {
    if ($interno == "") {
      $query = "INSERT INTO `recapito`(`Via`, `NumeroCivico`, `Citta`, `interno`, `IdUtente`) VALUES (?,?,?,NULL,?)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param("sisi", $via, $nc, $citta, $idUtente);
    } else {
      $query = "INSERT INTO `recapito`(`Via`, `NumeroCivico`, `Citta`, `interno`, `IdUtente`) VALUES (?,?,?,?,?)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param("sissi", $via, $nc, $citta, $interno, $idUtente);
    }
    return $stmt->execute();
  }
  public function insert_ordine($useContanti, $note, $idUtente, $idRecapito, $nrCarta)
  {
    /*
      La data prevista di consegna e' la data attuale + il tempo di consegna, ovvero un numero random >=5 e <15
      */
    $delivery_day = rand(5, 15);
    if ($useContanti) {
      $query = "INSERT INTO `ordine`(`Id_Stato`, `SceltaContanti`, `Note`, `IdUtente`, `IdRecapito`, `IdUtenteFattorino`, `NrCarta`,
        `DataOrdine`, `DataPrevista`, `DataConsegna`) VALUES (1, 1, ?, ?, ?, NULL, NULL, CURRENT_TIMESTAMP(), ADDDATE(CURRENT_TIMESTAMP()," . $delivery_day . "), NULL)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param("sii", $note, $idUtente, $idRecapito);
    } else {
      $query = "INSERT INTO `ordine`(`Id_Stato`, `SceltaContanti`, `Note`, `IdUtente`, `IdRecapito`, `IdUtenteFattorino`, `NrCarta`,
        `DataOrdine`, `DataPrevista`, `DataConsegna`) VALUES (1, 0, ?, ?, ?, NULL, ?, CURRENT_TIMESTAMP(), ADDDATE(CURRENT_TIMESTAMP()," . $delivery_day . "), NULL)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param("siii", $note, $idUtente, $idRecapito, $nrCarta);
    }
    return $stmt->execute();
  }
  /*-----------------------------------------------------------------------------------------------------------*/
  /* DELETE */
  public function delete_rc($idprodotto, $idUtente)
  {
    $query = "DELETE FROM `riga_carrello` WHERE IdUtente = ? AND IdProdotto = ? LIMIT 1";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("ii", $idUtente, $idprodotto);
    return $stmt->execute();
  }
  /*-----------------------------------------------------------------------------------------------------------*/
  /* UPDATE */
  public function update_riga_carrello($idUtente, $idprodotto, $idOrdine)
  {
    $query = "UPDATE `riga_carrello` SET DataEvasione = CURRENT_TIMESTAMP(), IdOrdine = ? WHERE IdUtente = ? AND IdProdotto = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("iii", $idOrdine, $idUtente, $idprodotto);
    return $stmt->execute();
  }
  public function update_ordine($idFattorino, $idOrdine)
  {
    $query = "UPDATE `ordine` SET Id_Stato = 6, DataConsegna = CURRENT_TIMESTAMP(), IdUtenteFattorino = ? WHERE ID = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("ii", $idFattorino, $idOrdine);
    return $stmt->execute();
  }
  /*-----------------------------------------------------------------------------------------------------------*/
}
