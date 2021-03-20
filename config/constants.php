<?php

define ('DATABASE_PATH' , '/libraries/database.php');
define ('MEMBERCLASS_PATH' , '/controllers/clsMember.php');
define('SESSIONCLASS_PATH' , '/controllers/clsSession.php');
define('TRAVELBIDCLASS_PATH' , '/controllers/clsTravelBid.php');
define('TRAVELQUERYCLASS_PATH' , '/controllers/clsTravelQuery.php');
define('MESSAGECLASS_PATH' , '/controllers/clsMessage.php');
define('PACKAGECLASS_PATH' , '/controllers/clsPackage.php');
define('HOTELCLASS_PATH' , '/controllers/clsHotel.php');
define('IMAGECLASS_PATH' , '/controllers/clsImage.php');
define('RATINGCLASS_PATH' , '/controllers/clsRating.php');
define('FolderName' , '');




define('USER_ACTIVE' , 1);
define('USER_VERIFIED' , 2);
define('USER_PENDING' , 3);
define('USER_BLOCK' , 4);

$arrStatus =  array( 1 => 'USER_ACTIVE', 2 => 'USER_VERIFIED', 3 => 'USER_PENDING', 4 => 'USER_BLOCK');


define('TODAY_DATETIME' , date("Y-m-d H:i:s"));
define('TODAY_DATE' , date("Y-m-d"));


define('TRAVEL_ROAD' , 1);
define('TRAVEL_TRAIN' , 2);
define('TRAVEL_AIR' , 3);
define('TRAVEL_ANY' , 4);

define('BID_PENDING' , 3);
define('BID_ACTIVE' , 1);
define('BID_CLOSED' , 4);
define('BID_WON' , 2);

define('BID_NEW' , 1);
define('BID_SELECTED' , 2);
define('BID_REJECTED' , 3);


//$arrBidStatus = array(1 => 'BID_NEW', 2 => 'BID_SELECTED', 3 => 'BID_REJECTED');

$arrBizType=array('Flight','Railway', 'Hotels');


define('OBJ_TRAVELLER' , 1);
define('OBJ_AGENT' , 2);
define('OBJ_HOTEL' , 3);
define('OBJ_PACKAGE' , 4);
define('OBJ_TRAVELQUERY' , 5);
define('OBJ_QUERYBID' , 6);
?>