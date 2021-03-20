<?php

include("../config/constants.php");

include_once ($_SERVER['DOCUMENT_ROOT'].FolderName.TRAVELQUERYCLASS_PATH);

//echo $_SERVER['DOCUMENT_ROOT'].FolderName.MEMBERCLASS_PATH;

$objTravelQuery = new clsTravelQuery();



if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')
{

	if ($_POST["action"] == "add_MemberTravelQuery")
{

	echo $objTravelQuery->addMemberTravelQuery($_POST);

}	


}