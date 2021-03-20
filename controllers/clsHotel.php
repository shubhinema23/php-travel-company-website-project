<?php
session_start();
include_once (dirname(dirname(__FILE__)).'/config/constants.php');
include_once($_SERVER['DOCUMENT_ROOT'] . FolderName . DATABASE_PATH);
include_once($_SERVER['DOCUMENT_ROOT'] . FolderName . SESSIONCLASS_PATH);

class clsHotel{

	public $DB;




	function  __construct()
	{
		global $db;
		$objSession = new clsSession;
		$this->DB = $db;
		$this->memberID = $objSession->getMemberID();
		$this->memberLoginID = $objSession->getMemberLoginID();


	}



	function addHotel($form){

		$arr = array();

		$Query = "INSERT INTO `tbl_hotel`(`hotel_Name`, `hotel_StarRating`, `hotel_ApproxCost`, `hotel_City`, `hotel_Country`, `hotel_AddedBy`, `hotel_Amenities`, `hotel_Address`, `hotel_Detail`, `hotel_Phone`, `hotel_SocialMedia`, `hotel_Email`, `hotel_Website`, `hotel_Coordinates`) VALUES(:INHOTELNAME, :INHOTELRATING, :INHOTELCOST, :INHOTELCITY, :INHOTELCOUNTRY, :INHOTELADDEDBY, :INHOTELAMENITY, :INHOTELADDR, :INHOTELDETAIL, :INHOTELPHONE, :INHOTELSMEDIA, :INHOTELEMAIL, :INHOTELWEBSITE, :INHOTELCORD)";


		$arr['INHOTELNAME'] = $form['txtName'];
		$arr['INHOTELRATING'] = $form['drpRating'];
		$arr['INHOTELCOST'] = $form['txtCost'];
		$arr['INHOTELCITY'] = $form['txtCity'];
		$arr['INHOTELCOUNTRY'] = $form['txtCntry'];
		$arr['INHOTELADDEDBY'] = $this->memberID;
		$arr['INHOTELAMENITY'] = $form['txtAmnty'];
		$arr['INHOTELADDR'] = $form['txtAddrs'];
		$arr['INHOTELDETAIL'] = $form['txtDetail'];
		$arr['INHOTELPHONE'] = $form['txtPhone'];
		$arr['INHOTELSMEDIA'] = $form['txtSocialMedia'];
		$arr['INHOTELEMAIL'] = $form['txtEmail'];
		$arr['INHOTELWEBSITE'] = $form['txtWeb'];
		$arr['INHOTELCORD'] = $form['txtCord'];



		$stmt = $this->DB->prepare($Query);

		$stmt->execute($arr);            
	
	} 





	function getHotel($arrFilter){

		$arr = array();

		$Query = "SELECT `hotel_ID`, `hotel_Name`, `hotel_StarRating`, `hotel_ApproxCost`, `hotel_City`, `hotel_Country`, `hotel_AddedBy`, `hotel_Amenities`, `hotel_Address`, `hotel_Detail`, `hotel_Phone`, `hotel_SocialMedia`, `hotel_Email`, `hotel_Website`, `hotel_Coordinates` FROM `tbl_hotel` WHERE 1 = 1";




		$stmt = $this->DB->prepare($Query);

		$stmt->execute($arr);

		$result = $stmt->fetchAll();

		return $result;
      
}


}