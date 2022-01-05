<?php
class HTML_Helper
{
    public function __construct()
    {
    }
    private function modals_error()
    {
?>
        <div class="modal fade" id="myGeneralModal" tabindex="-1" role="dialog" aria-labelledby="generalModal" aria-hidden="true">
            <div class="modal-dialog modal-msg-error" role="document">
                <div class="modal-content modal-msg-error">

                </div>
                <div class="modal-header modal-msg-error">
                    <h5 class="modal-title" id="generalModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg> C'&egrave; stato un errore inaspettato
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-msg-error">
                    <?php
                    echo $_SESSION["msg"];
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn close-btn" data-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg> Close</button>
                </div>
            </div>
        </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#myGeneralModal').modal('show');
            });
        </script>
<?php
    }
    private function modals_warnings()
    {
?>
        <div class="modal fade" id="myGeneralModal" tabindex="-1" role="dialog" aria-labelledby="generalModal" aria-hidden="true">
            <div class="modal-dialog modal-msg-warning" role="document">
                <div class="modal-content modal-msg-warning"></div>
                <div class="modal-header modal-msg-warning">
                    <h5 class="modal-title" id="generalModal">Messaggio Importante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-msg-warning">
                    <?php
                    echo $_SESSION["msg"];
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn close-btn" data-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg> Close</button>
                </div>
            </div>
        </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#myGeneralModal').modal('show');
            });
        </script>
<?php
    }
    private function modals_information()
    {
?>
        <div class="modal fade" id="myGeneralModal" tabindex="-1" role="dialog" aria-labelledby="generalModal" aria-hidden="true">
            <div class="modal-dialog modal-msg-info" role="document">
                <div class="modal-content modal-msg-info"></div>
                <div class="modal-header modal-msg-info">
                    <h5 class="modal-title" id="generalModal">Messaggio Importante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-msg-info">
                    <?php
                    echo $_SESSION["msg"];
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn close-btn" data-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg> Close</button>
                </div>
            </div>
        </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#myGeneralModal').modal('show');
            });
        </script>
<?php
    }
    private function modals_successfull()
    {
?>
        <div class="modal fade" id="myGeneralModal" tabindex="-1" role="dialog" aria-labelledby="generalModal" aria-hidden="true">
            <div class="modal-dialog modal-msg-successfull" role="document">
                <div class="modal-content modal-msg-successfull"></div>
                <div class="modal-header modal-msg-successfull">
                    <h5 class="modal-title" id="generalModal">Messaggio Importante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-msg-successfull">
                    <?php
                    echo $_SESSION["msg"];
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn close-btn" data-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg> Close</button>
                </div>
            </div>
        </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#myGeneralModal').modal('show');
            });
        </script>
<?php
    }
    public function check_page($check)
    {
        if (isset($_SESSION["upd"]) && $_SESSION["upd"] && $_SESSION["last_page"] == $check) {
            $_SESSION["upd"] = false;
            return true;
        }
        return false;
    }
    public function check_modals($check)
    {
        require_once("utils/modalMessageHelper.php");
        if (isset($_SESSION["upd"]) && $_SESSION["upd"] && $_SESSION["last_page"] == $check) {
            if ($_SESSION["msg_type"] == MsgType::Successfull) $this->modals_successfull();
            else if ($_SESSION["msg_type"] == MsgType::Error) $this->modals_error();
            else if ($_SESSION["msg_type"] == MsgType::Warning) $this->modals_warnings();
            else $this->modals_information();
            $_SESSION["upd"] = false;
            return true;
        }
        return false;
    }
    public function generate_page_head($pageTitle, $check = "", $useDataTable = false, $useCart = false)
    {
        session_start();
?>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> <?php echo $pageTitle; ?> </title>
            <link rel="stylesheet" href="css/reset.css" type="text/css">
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <script src='https://kit.fontawesome.com/a076d05399.js'></script>
            <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
            <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
            <link rel="stylesheet" href="css/main-style.css" type="text/css">
            <?php
        if ($useDataTable) {
            echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css\" />";
            echo "<script src=\"https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js\"></script>";
        }
        if ($useCart) {
            echo "<script src=\"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js\"></script>";
        }
        echo "</head>";
        $this->check_modals($check);
    }
    public function generate_js_array($phpArray, $propName)
    {
        for ($i = 0; $i < sizeof($phpArray); $i++) {
            if ($i == sizeof($phpArray) - 1) echo "\"" . $phpArray[$i][$propName] . "\"";
            else echo "\"" . $phpArray[$i][$propName] . "\",";
        }
    }
    public function generate_js_array_2($phpArray, $propArrName)
    {
        for ($i = 0; $i < sizeof($phpArray); $i++) {
            $res = "";
            for ($j = 0; $j < sizeof($propArrName); $j++) {
                if ($j == sizeof($propArrName) - 1) $res .= $phpArray[$i][$propArrName[$j]];
                else  $res .= $phpArray[$i][$propArrName[$j]] . " ";
            }
            if ($i == sizeof($phpArray) - 1) echo "\"" . $res . "\"";
            else echo "\"" . $res . "\",";
        }
    }
    public function generate_header($title)
    {
        echo "
        <header>
            <h1>" . $title . "</h1>
        </header>";
    }
    public function generate_footer($scrollable = false)
    {
        if ($scrollable) {
            echo  "<div id=\"fix-on-bot\" class=\"fix-on-bot\"></div>";
            echo "<script src='js/perfectScrollableElement.js'></script>";
        }
        echo " <footer><span>Federico Campanozzi</span><span>Matr.: 0000895693</span> <span>Alma Mater Studiorum Bologna - Sede di Cesena</span></footer>";
    }
    public function generate_user_nav()
    {
?>
        <div class="navbar">
            <a href="homepageUser.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                    <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                </svg> Home
            </a>
            <a href="userProfile.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" viewBox="0 0 16 16">
                    <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                </svg> Profilo Utente
            </a>
            <a href="logout.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                </svg> Logout
            </a>
<?php
            echo "</div>";
        }
        public function uploadImage($path, $image){
            $imageName = basename($image["name"]);
            $fullPath = $path.$imageName;
            
            $maxKB = 500;
            $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
            $msg = "";
    
            //Controllo se immagine è veramente un'immagine
            $imageSize = getimagesize($image["tmp_name"]);
            if($imageSize === false) {
                $msg .= "File caricato non è un'immagine! ";
            }
            //Controllo dimensione dell'immagine < 500KB
            if ($image["size"] > $maxKB * 1024) {
                $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
            }
        
            //Controllo estensione del file
            $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
            if(!in_array($imageFileType, $acceptedExtensions)){
                $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
            }
        
            //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
            if (file_exists($fullPath)) {
                $i = 1;
                do{
                    $i++;
                    $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
                }
                while(file_exists($path.$imageName));
                $fullPath = $path.$imageName;
            }
        
            //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
            if(strlen($msg)==0){
                if(!move_uploaded_file($image["tmp_name"], $fullPath)){
                    $msg.= "Errore nel caricamento dell'immagine.";
                }
                else{
                    $msg = $imageName;
                }
            }
            return $msg;
        }
    }
?>