<?php 
session_start();
$PageName = basename($_SERVER['PHP_SELF']);
if ($PageName != "member_login.php") { 
    if (!isset($_SESSION["Travel"]["MemberID"]))
    {
        header("location:member_login.php");
    }

}
?>