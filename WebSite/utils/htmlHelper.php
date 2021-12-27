<?php
class HTML_Helper
{
    public function __construct()
    {
    }
    public function check_modals($check)
    {
        if (isset($_SESSION["upd"]) && $_SESSION["upd"] && $_SESSION["last_page"] = $check) {
            $_SESSION["upd"] = false;
?>
            <div class="modal fade" id="myGeneralModal" tabindex="-1" role="dialog" aria-labelledby="generalModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content"></div>
                    <div class="modal-header">
                        <h5 class="modal-title" id="generalModal">Messaggio Importante</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body<?php
                                            if ($_SESSION["msg_type"] = MsgType::Successfull) echo " modal-msg-successfull ";
                                            else if ($_SESSION["msg_type"] = MsgType::Error) echo " modal-msg-error ";
                                            else if ($_SESSION["msg_type"] = MsgType::Warning) echo " modal-msg-warning ";
                                            else echo " modal-msg-info ";
                                            ?>">
                        <?php
                        echo $_SESSION["msg"];
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            var_dump($_SESSION);
        }
    }
    public function generate_header($pageTitle, $check = "", $useDataTable = false, $useCart = false)
    {
        session_start();
        ?>

        <head>
            <meta charset="utf-8">
            <title> <?php echo $pageTitle; ?> </title>
            <link rel="stylesheet" href="css/reset.css" type="text/css">
            <link rel="stylesheet" href="css/main-style.css" type="text/css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <script src='https://kit.fontawesome.com/a076d05399.js'></script>
            <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
            <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
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
}
?>