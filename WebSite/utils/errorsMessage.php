<?php
    class ErrorsMsgUtility {
        public function __construct() {
        
        }
        public function insert_fail($msg, $page_redirect){
            $_SESSION["msg"] = $msg;
            echo "<script>location.href='../".$page_redirect."';</script>";
        }
    }
?>