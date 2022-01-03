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
    public function ajax_response($msg, $page_from, $msg_type)
    {
        $_SESSION["upd"] = true;
        $_SESSION["msg"] = $msg;
        $_SESSION["last_page"] = $page_from;
        $_SESSION["msg_type"] = $msg_type;
    }
}
?>