<?php
    class SuccessfullMsgUtility {
        public function __construct() {

        }
        
        public function insert_successfull($msg, $page_redirect){
            $_SESSION["msg"] = $msg;
            echo "<script>location.href='../".$page_redirect."';</script>";
        }
    }
?>