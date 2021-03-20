<?php
session_start();
include_once (dirname(dirname(__FILE__)).'/config/constants.php');
include_once($_SERVER['DOCUMENT_ROOT'] . FolderName . DATABASE_PATH);
include_once($_SERVER['DOCUMENT_ROOT'] . FolderName . SESSIONCLASS_PATH);

class clsRating{

	public $DB;




	function  __construct()
	{
		global $db;
		$objSession = new clsSession;
		$this->DB = $db;
		$this->memberID = $objSession->getMemberID();
		$this->memberLoginID = $objSession->getMemberLoginID();


	}




	function addRating($form){

		$arr = array();

		$DateTime = date("Y-m-d H:i:s");

		$Query = "INSERT INTO `tbl_rating`(`rating_Comment`, `rating_StarRate`, `rating_DateTime`, `rating_AddedBy`, `rating_ObjectID`, `rating_ObjType`, `rating_Image`, `rating_Status`) VALUES (:INCOMMENT, :INSTARRATE, :INDADETIME, :INADDEDBY, :INOBJID, :INOBJTYPE, :INIMAGE, :INSTATUS)";


		$arr['INCOMMENT'] = $form['txtComment'];
		$arr['INSTARRATE'] = $form['drpRate'];
		$arr['INDADETIME'] = $DateTime;
		$arr['INADDEDBY'] = $this->memberID;
		$arr['INOBJID'] = 1;
		$arr['INOBJTYPE'] = 1;
		$arr['INIMAGE'] = $form['txtimage'];
		$arr['INSTATUS'] = $form['drpStatus'];


		$stmt = $this->DB->prepare($Query);

		$stmt->execute($arr);            

	}



	function getRating($arrFilter){

		$arr = array();


		$Query = "SELECT `rating_ID`, `rating_Comment`, `rating_StarRate`, `rating_DateTime`, `rating_AddedBy`, `rating_ObjectID`, `rating_ObjType`, `rating_Image`, `rating_Status` FROM `tbl_rating` WHERE 1 = 1";


		$stmt = $this->DB->prepare($Query);

		$stmt->execute($arr);        

		$result = $stmt->fetchAll();

		return $result; 

	}


}