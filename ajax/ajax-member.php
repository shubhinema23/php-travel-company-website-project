<?php

include("../config/constants.php");

include_once ($_SERVER['DOCUMENT_ROOT'].FolderName.MEMBERCLASS_PATH);

//echo $_SERVER['DOCUMENT_ROOT'].FolderName.MEMBERCLASS_PATH;

$objMember = new clsMember();



if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')
{

if ($_POST["action"] == "add_memberdata")
{

	echo $objMember->addMember($_POST);

}	



if ($_POST["action"] == "check_email")
{


	echo $objMember->chkExistingMailId($_POST["memberEmailId"]);

}	



if ($_POST["action"] == "Login_member")
{

	echo $objMember->login_member($_POST);

}	


if ($_POST["action"] == "add_MemberPersonalInfo")
{

	echo $objMember->updateMemberPersonalInfo($_POST);

}	





}

?>