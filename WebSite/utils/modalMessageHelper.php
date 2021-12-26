<?php
require_once("enum.php");
abstract class MsgType extends Enum
{
    const Successfull = 0;
    const Error = 1;
    const Warning = 2;
    const Information = 3;
}
class MesssageModalHelper
{
    public function __construct()
    {
    }
    public function show_next_page($page_to, $dgb)
    {
        if (!$dgb) echo "<script>location.href='../" . $page_to . "';</script>";
    }
    public function show_in_next_page($msg, $page_to, $page_from, $msg_type, $dgb)
    {
        $_SESSION["upd"] = true;
        $_SESSION["msg"] = $msg;
        $_SESSION["cur_page"] = $page_to;
        $_SESSION["last_page"] = $page_from;
        $_SESSION["msg_type"] = $msg_type;
        if (!$dgb) echo "<script>location.href='../" . $page_to . "';</script>";
    }
    public function show_next_page_l0($page_to, $dgb)
    {
        if (!$dgb) echo "<script>location.href='" . $page_to . "';</script>";
    }
    public function show_in_next_page_l0($msg, $page_to, $page_from, $msg_type, $dgb)
    {
        $_SESSION["upd"] = true;
        $_SESSION["msg"] = $msg;
        $_SESSION["cur_page"] = $page_to;
        $_SESSION["last_page"] = $page_from;
        $_SESSION["msg_type"] = $msg_type;
        if (!$dgb) echo "<script>location.href='" . $page_to . "';</script>";
    }
    public function check_modals($check)
    {
        if ($_SESSION["upd"] && $_SESSION["last_page"] = $check) {
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
            $_SESSION["upd"] = false;
        }
    }
}
?>