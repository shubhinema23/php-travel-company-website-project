<?php

include("../config/constants.php");

include_once ($_SERVER['DOCUMENT_ROOT'].FolderName.TRAVELBIDCLASS_PATH);

//echo $_SERVER['DOCUMENT_ROOT'].FolderName.MEMBERCLASS_PATH;

$objTravelBid = new clsTravelBid();



if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')
{


if ($_POST["action"] == "add_AgentResponse")
{

	echo $objTravelBid->addAgentBid($_POST);

}



if ($_POST["action"] == "update_AgentBid")
{

	echo $objTravelBid->UpdateBid($_POST);

}


if ($_POST["action"] == "UpdateBidStatus")
{

	echo $objTravelBid->UpdateBidStatus($_POST);

}


}