<?php
session_start();
include_once (dirname(dirname(__FILE__)).'/config/constants.php');
include_once($_SERVER['DOCUMENT_ROOT'] . FolderName . DATABASE_PATH);


class clsSession{

	function getMemberID(){
 
		return $_SESSION["Travel"]["MemberID"];
	}


	function getMemberLoginID(){

		return $_SESSION["Travel"]["MemberLoginID"];
	}


	function getMemberName(){

		return $_SESSION["Travel"]["MemberName"];
	}

	function getMemberType(){

		return $_SESSION["Travel"]["MemberType"];
	}
}