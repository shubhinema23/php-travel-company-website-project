<?php 
session_start();
if (!isset($_SESSION["Travel"]["MemberID"]))
      {
        header('location: member_login.php');
        exit();
      }
?>