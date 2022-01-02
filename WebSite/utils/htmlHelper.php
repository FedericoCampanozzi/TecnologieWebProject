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
        </head>
        <?php
        if ($useDataTable) {
            echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css\" />";
            echo "<script type=\"text/javascript\" src=\"https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js\"></script>";
        }
        if ($useCart) {
            echo "<script src=\"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js\"></script>";
        }
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
        echo " <footer><strong>Federico Campanozzi</strong><span>Matr.: 0000895693</span> <span>Alma Mater Studiorum Bologna - Sede di Cesena</span></footer>";
    }
    public function generate_user_nav($needSearBox = false)
    {
        ?>
        <div class="navbar">
            <a href="homepageUser.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                    <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                </svg> Home
            </a>
            <a href="userProfile.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" mviewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg> Profilo Utente
            </a>
            <a href="logout.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" viewBox="0 0 512 512">
                    <path d="M180.455,360.91H24.061V24.061h156.394c6.641,0,12.03-5.39,12.03-12.03s-5.39-12.03-12.03-12.03H12.03
                      C5.39,0.001,0,5.39,0,12.031V372.94c0,6.641,5.39,12.03,12.03,12.03h168.424c6.641,0,12.03-5.39,12.03-12.03
                      C192.485,366.299,187.095,360.91,180.455,360.91z" />
                    <path d="M381.481,184.088l-83.009-84.2c-4.704-4.752-12.319-4.74-17.011,0c-4.704,4.74-4.704,12.439,0,17.179l62.558,63.46H96.279
                      c-6.641,0-12.03,5.438-12.03,12.151c0,6.713,5.39,12.151,12.03,12.151h247.74l-62.558,63.46c-4.704,4.752-4.704,12.439,0,17.179
                      c4.704,4.752,12.319,4.752,17.011,0l82.997-84.2C386.113,196.588,386.161,188.756,381.481,184.088z" />
                </svg> Logout
            </a>
            <?php
            if ($needSearBox) {
            ?>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search">
d                </form>
            <?php
            }
            echo "</div>";
        }
    }
    ?>