<?php
session_start();
include_once (dirname(dirname(__FILE__)).'/config/constants.php');
include_once($_SERVER['DOCUMENT_ROOT'] . FolderName . DATABASE_PATH);
include_once($_SERVER['DOCUMENT_ROOT'] . FolderName . SESSIONCLASS_PATH);





class clsTravelQuery{

	public $DB;

 
	function  __construct()
	{
		global $db;
		global $arrStatus;
		$objSession = new clsSession;
		$this->DB = $db;
		$this->memberID = $objSession->getMemberID();
		$this->memberLoginID = $objSession->getMemberLoginID();
		$this->Status =  $arrStatus;


	}



    function interpolateQuery($query, $params) {
    $keys = array();

    # build a regular expression for each parameter
    foreach ($params as $key => $value) {
        if (is_string($key)) {
            $keys[] = '/:'.$key.'/';
        } else {
            $keys[] = '/[?]/';
        }
    }


    $query = preg_replace($keys, $params, $query, 1, $count);

    #trigger_error('replaced '.$count.' keys');

    return $query;
}





	function addMemberTravelQuery($form){

		$arr = array();


		$Query = "INSERT INTO tbl_travel_query (`travel_UID`, `travel_Title`, `travel_Date`, `travel_City`, `travel_RatingType`, `travel_From`, `travel_To`, `travel_TransBy`, `travel_Days`, `travel_Adults`, `travel_Kids`, `travel_HotelRating`, `travel_Requirements`, `travel_AddedDate`, `travel_AddedBy`, `travel_LastBidDate`, `travel_BidCount`, `travel_BidStatus`, `travel_BidOperatorId`, `travel_BidQuoteId`, `travel_BidAmount`, `travel_Budget`) VALUES(:INtravel_UID, :INtravel_Title, :INtravel_Date, :INtravel_City, :INtravel_RatingType, :INtravel_From, :INtravel_To, :INtravel_TransBy, :INtravel_Days, :INtravel_Adults, :INtravel_Kids, :INtravel_HotelRating, :INtravel_Requirements, :INtravel_AddedDate, :INtravel_AddedBy, :INtravel_LastBidDate, :INtravel_BidCount, :INtravel_BidStatus, :INtravel_BidOperatorId, :INtravel_BidQuoteId, :INtravel_BidAmount, :INtravel_Budget)";


		$arr['INtravel_UID'] = 12345;
		$arr['INtravel_Title'] = $form['txtTravelTitle'];
		$arr['INtravel_Date'] = $form['txtTravelDate'];
		$arr['INtravel_City'] = $form['drpTravelcity'];
		$arr['INtravel_RatingType'] = $form['drpTravelRating'];
		$arr['INtravel_From'] = $form['txtTravelFrom'];
		$arr['INtravel_To'] = $form['drpTravelTo'];
		$arr['INtravel_TransBy'] = $form['drpTravelBy'];
		$arr['INtravel_Days'] = $form['txtTravelDays'];
		$arr['INtravel_Adults'] = $form['txtTravelAdults'];
		$arr['INtravel_Kids'] = $form['txtTravelKids'];
		$arr['INtravel_HotelRating'] = $form['drpTravelHotelRating'];
		$arr['INtravel_Requirements'] = $form['txtareaTravelRequirments'];
		$arr['INtravel_AddedDate'] = TODAY_DATE;
		$arr['INtravel_AddedBy'] = $this->memberID;
		$arr['INtravel_LastBidDate'] = $form['txtTravelLastBidDate'];
		$arr['INtravel_BidCount'] = 0;
		$arr['INtravel_BidStatus'] = BID_PENDING;
		$arr['INtravel_BidOperatorId'] = 0;
		$arr['INtravel_BidQuoteId'] = 0;
		$arr['INtravel_BidAmount'] = 0;
		$arr['INtravel_Budget'] = $form['txtTravelBudget'];


		$stmt = $this->DB->prepare($Query);

		$stmt->execute($arr);

		return '1';


	}



	function getAllTravelQueries($arrFilter){


		$arr = array();


		$Query = "SELECT `travel_ID`, `travel_UID`, `travel_Title`, `travel_Date`, `travel_City`, `travel_RatingType`, `travel_From`, `travel_To`, `travel_TransBy`, `travel_Days`, `travel_Adults`, `travel_Kids`, `travel_HotelRating`, `travel_Requirements`, `travel_AddedDate`, `travel_AddedBy`, `travel_LastBidDate`, `travel_BidCount`, `travel_BidStatus`, `travel_BidOperatorId`, `travel_BidQuoteId`, `travel_BidAmount`, `travel_Budget`, traveller.member_Firstname as traveller_FName, agent.member_Firstname as agent_FName, traveller.member_Lastname as traveller_LName, agent.member_Lastname as agent_LName, min(bid_Amount) as `Min_BidAmount`, count(*) as `No_OfBids` FROM tbl_travel_query

            LEFT JOIN tbl_AgentBid ON travel_ID = bid_QueryID
		    LEFT JOIN tbl_member_registration as traveller  ON travel_AddedBy = traveller.member_id
		    LEFT JOIN tbl_member_registration as agent  ON travel_BidOperatorId = agent.member_id  WHERE 1 = 1";


		if(!empty($arrFilter['QueryID'])){

			$Query .= " and travel_ID = :INtravel_ID ";

			$arr['INtravel_ID'] = $arrFilter['QueryID'];
		}

		if(!empty($arrFilter['TravelTitle'])){

			$Query .= " and travel_Title = :INtravel_Title ";

			$arr['INtravel_Title'] = $arrFilter['TravelTitle'];
		}

		if(!empty($arrFilter['TravelAddedBy'])){

			$Query .= " and travel_AddedBy = :INtravel_addedby ";

			$arr['INtravel_addedby'] = $arrFilter['TravelAddedBy'];

		}

		$stmt = $this->DB->prepare($Query);



		$stmt->execute($arr);

		$result = $stmt->fetchAll();

		return $result;

	}




	// function ChkLastBidDate($LastBidDate){

	// 	$arr = array();

 //        $Query = "SELECT `travel_LastBidDate` FROM tbl_travel_query WHERE travel_LastBidDate = :INLASTBIDDATE";

 //        $arr['INLASTBIDDATE'] = $LastBidDate;


	// 	$stmt = $this->DB->prepare($Query);

	// 	$stmt->execute($arr);

	// 	$result = $stmt->fetchAll();

	// 	return $result;

 //    }



	function getBidStatus($status){

		

		foreach ($this->Status as $StatusIndex => $StatusVal) {
			# code...
			if($StatusIndex == $status){

				return $StatusVal;
			}
		}
	}



}