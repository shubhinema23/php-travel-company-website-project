<?php
session_start();
include_once (dirname(dirname(__FILE__)).'/config/constants.php');
include_once($_SERVER['DOCUMENT_ROOT'] . FolderName . DATABASE_PATH);
include_once($_SERVER['DOCUMENT_ROOT'] . FolderName . SESSIONCLASS_PATH);

class clsImage{

	public $DB;




	function  __construct()
	{
		global $db;
		$objSession = new clsSession;
		$this->DB = $db;
		$this->memberID = $objSession->getMemberID();
		$this->memberLoginID = $objSession->getMemberLoginID();


	}



	function addImage($form){

		$arr = array();

		$Query = "INSERT INTO `tbl_image`(`img_Title`, `img_ObjID`, `img_ObjType`, `img_AddedBy`, `img_Status`, `img_Type`, `img_Path`) VALUES (:INTITLE, :INOBJID, :INOBJTYPE, :INADDEDBY, :INSTATUS, :INIMGTYPE, :INIMGPATH)";


		$arr['INTITLE'] = $form['txtTitle'];
		$arr['INOBJID'] = $form['objId'];
		$arr['INOBJTYPE'] = $form['objType'];
		$arr['INADDEDBY'] = $this->memberID;
		$arr['INSTATUS'] = $form['drpStatus'];
		$arr['INIMGTYPE'] = $form['txtImgType'];
		$arr['INIMGPATH'] = $form['txtImgPath'];
		



		$stmt = $this->DB->prepare($Query);

		$stmt->execute($arr);            

 
	
	} 


	function getImage($arrFilter){

		$arr = array();

		$Query = "SELECT `img_ID`, `img_Title`, `img_ObjID`, `img_ObjType`, `img_AddedBy`, `img_Status`, `img_Type`, `img_Path` FROM `tbl_image` WHERE 1 = 1";




		$stmt = $this->DB->prepare($Query);

		$stmt->execute($arr);

		$result = $stmt->fetchAll();

		return $result;
      
}



}