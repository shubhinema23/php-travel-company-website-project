<?php 
session_start();
include_once("config/constants.php");
include_once($_SERVER['DOCUMENT_ROOT'] . FolderName . DATABASE_PATH);
include_once($_SERVER['DOCUMENT_ROOT'] . FolderName . SESSIONCLASS_PATH);
include_once ($_SERVER['DOCUMENT_ROOT'].FolderName.TRAVELBIDCLASS_PATH);
include_once ($_SERVER['DOCUMENT_ROOT'].FolderName.TRAVELQUERYCLASS_PATH);
include_once ($_SERVER['DOCUMENT_ROOT'].FolderName.MEMBERCLASS_PATH);
include_once ($_SERVER['DOCUMENT_ROOT'].FolderName.MESSAGECLASS_PATH);
include_once ($_SERVER['DOCUMENT_ROOT'].FolderName.PACKAGECLASS_PATH);
include_once ($_SERVER['DOCUMENT_ROOT'].FolderName.HOTELCLASS_PATH);
include_once ($_SERVER['DOCUMENT_ROOT'].FolderName.IMAGECLASS_PATH);
include_once ($_SERVER['DOCUMENT_ROOT'].FolderName.RATINGCLASS_PATH);
 //echo $_SERVER['DOCUMENT_ROOT'].FolderName.MEMBERCLASS_PATH;

$objMember = new clsMember(); 
$objTravelBid = new clsTravelBid();
$objTravelQuery = new clsTravelQuery();
$objMessage = new clsMessage();
$objPackage = new clsPackage();
$objHotel = new clsHotel();
$objImage = new clsImage();
$objRating = new clsRating();
$objSession = new clsSession();



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <script src="ajax-js/account.js"></script>

    <link rel='stylesheet' id='travelhub_fonts_url-css'  href='//fonts.googleapis.com/css?family=Karla%3A400%2C700%2C400italic%2C700italic&#038;ver=1.0.0' type='text/css' media='all' />

    <link rel='stylesheet' type='text/css' href='/design/css/style.css'>
    <link rel='stylesheet' type='text/css' href='/design/css/utility.css'>

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">

<?php

$arrGlobalCss = array();
 
$arrGlobalCss = explode(',',$css);

foreach ($arrGlobalCss as $css) {
  # code...
  ?>

 <link rel='stylesheet' type='text/css' href='/design/css/<?php echo $css;?>'>

<?php
}
?>

  </head>
<body>
	
<header>

   <nav class="navbar navbar-expand-sm navbar-dark bg-dark ">
      <a class="navbar-brand" href="#">Top navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
  
</header>


