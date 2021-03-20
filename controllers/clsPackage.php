<?php
session_start();
include_once (dirname(dirname(__FILE__)).'/config/constants.php');
include_once($_SERVER['DOCUMENT_ROOT'] . FolderName . DATABASE_PATH);
include_once($_SERVER['DOCUMENT_ROOT'] . FolderName . SESSIONCLASS_PATH);

class clsPackage{

	public $DB;




	function  __construct()
	{
		global $db;
		$objSession = new clsSession;
		$this->DB = $db;
		$this->memberID = $objSession->getMemberID();
		$this->memberLoginID = $objSession->getMemberLoginID();


	}


	function AddTravelPackage($form){


		$chkval = $form['chkboxpkgType'];

		$arr  = array();

		$Query = "INSERT INTO `tbl_package`(`pkg_Title`, `pkg_Tagline`, `pkg_Detail`, `pkg_City`, `pkg_Days`, `pkg_ApproxDate`,`pkg_ApproxCost`, `pkg_DiscountedCost`, `pkg_AddedDate`, `pkg_AddedBy`, `pkg_Status`, `pkg_LikeCount`, `pkg_Type`) VALUES (:INPKGTITLE, :INPKGTAGLINE, :INPKGDETAIL, :INPKGCITY, :INPKGDAYS, :INPKGAPPDATE, :INPKGAPPCOST, :INPKGDISCCOST, :INADDEDDATE, :INADDEDBY, :INPKGSTATUS, :INPKGLIKECOUNT, :INPKGTYPE)";


		// // $arrBizType = $form['chkboxpkgType'];

		// // foreach ($arrBizType as $Biztype => $value) {

		// // 	 $strType .= $value . ', ';
			
		// }

		 $arr['INPKGTITLE'] = $form['txtPkgTitle'];
		 $arr['INPKGTAGLINE'] = $form['txtPkgTagline'];
		 $arr['INPKGDETAIL'] = $form['txtPkgDetail'];
		 $arr['INPKGCITY'] = $form['txtPkgCity'];
		 $arr['INPKGDAYS'] = $form['txtPkgDays'];
		 $arr['INPKGAPPDATE'] = $form['txtPkgAppDate'];
		 $arr['INPKGAPPCOST'] = $form['txtPkgApproxCost'];
		 $arr['INPKGDISCCOST'] = $form['txtPkgDiscCost'];
		 $arr['INADDEDDATE'] = $form['txtpkgAddedDate'];
		 $arr['INADDEDBY'] = $this->memberID;
		 $arr['INPKGSTATUS'] = $form['drpPkgStatus'];
		 $arr['INPKGLIKECOUNT'] = 0;
		 $arr['INPKGTYPE'] = 0;


		 $stmt = $this->DB->prepare($Query);

         $stmt->execute($arr);


      $PkgID = $this->DB->lastInsertId();
      $arr  = array();

	  $Query = "INSERT INTO `tbl_category_Obj`(`fk_CatID`, `cat_fkObjectID`, `cat_ObjType`) VALUES (:INPKGTYPE, :INPKGID, :INOBJTYPE)";

		foreach ($chkval as $chkbox=> $value) {
			 $arr['INPKGID'] = $PkgID;
		 $arr['INPKGTYPE'] =$value;
		 $arr['INOBJTYPE'] = OBJ_PACKAGE;
		 

		 $stmt = $this->DB->prepare($Query);
         $stmt->execute($arr);
		}



	}


//select pkg_id from `tbl_package` 



	function getPkgCategory($arrFilter){

		$arr = array();

		$Query = "SELECT `category_ID`, `category_Name` FROM `tbl_categoryInfo` WHERE 1=1";

		$stmt = $this->DB->prepare($Query);

		$stmt->execute($arr);

		$result = $stmt->fetchAll();

		return $result;
	}


	function getTravelPackage($arrFilter){

		$arr = array();

		$Query = "SELECT `pkg_id`, `pkg_Title`, `pkg_Tagline`, `pkg_Detail`, `pkg_City`, `pkg_Days`, `pkg_ApproxDate`, `pkg_ApproxCost`, `pkg_DiscountedCost`, `pkg_AddedDate`, `pkg_AddedBy`, `pkg_Status`, `pkg_LikeCount`, (SELECT GROUP_CONCAT(`category_Name` SEPARATOR '|') FROM `tbl_categoryInfo`  LEFT JOIN `tbl_category_Obj` ON fk_CatID = category_ID where fk_CatID = pkg_id) as `catname`,  `pkg_Type` FROM `tbl_package` WHERE 1=1";


			if (!empty($arrFilter['agentID']) )
      {
        $Query .= "  and pkg_AddedBy = :INADEDBY  ";
        $arr['INADEDBY'] = '%'. $arrFilter['agentID'] . '%';
      }



		if (!empty($arrFilter['searchpkgcity']) )
      {
        $Query .= "  and pkg_City = :INPKGCITY  ";
        $arr['INPKGCITY'] = $arrFilter['searchpkgcity'];
      }


      	if (!empty($arrFilter['searchpkgcat']) )
      {
        $Query .= "  and pkg_Type = :INPKGCAT  ";
        $arr['INPKGCAT'] = $arrFilter['searchpkgcat'];
      }


      	if (!empty($arrFilter['tourcity']) )
      {
        $Query .= "  and pkg_City = :INTOURCITY";
        $arr['INTOURCITY'] = $arrFilter['tourcity'];
      }


      	if (!empty($arrFilter['TourDays']) )
      {
        $Query .= "  and pkg_Days = :INTOURDAYS";
        $arr['INTOURDAYS'] = $arrFilter['TourDays'];
      }


      	if (!empty($arrFilter['tourdate']) )
      {
        $Query .= "  and pkg_ApproxDate = :INTOURDAYS";
        $arr['INTOURDATE'] = $arrFilter['tourdate'];
      }


      	if (!empty($arrFilter['tourcost']) )
      {
        $Query .= "  and pkg_ApproxCost = :INTOURCOST";
        $arr['INTOURCOST'] = $arrFilter['tourcost'];
      }



		$stmt = $this->DB->prepare($Query);

		$stmt->execute($arr);

		$result = $stmt->fetchAll();

		return $result;
      
	}


	function getPkgCity($arrFilter){

		$arr = array();

		$Query = "SELECT distinct(`pkg_City`) FROM `tbl_package` ";


		$stmt = $this->DB->prepare($Query);

		$stmt->execute($arr);

		$result = $stmt->fetchAll();

		return $result;
	}
}
?>