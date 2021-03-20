<?php
session_start();
include_once dirname(__FILE__) . '/../config/constants.php';
include_once($_SERVER['DOCUMENT_ROOT'] . FolderName . DATABASE_PATH);
include_once($_SERVER['DOCUMENT_ROOT'] . FolderName . SESSIONCLASS_PATH);





class clsMember{

	public $DB;







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


	function  __construct()
	{
		global $db;
		$objSession = new clsSession;
		$this->DB = $db;
		$this->memberID = $objSession->getMemberID();
		$this->memberLoginID = $objSession->getMemberLoginID();


	}



	function addMember($form){
 

		$arr = array();

		$Query = "INSERT INTO  tbl_member_registration (`member_Firstname` ,`member_Lastname`, `member_LoginID`, `member_LoginPassword`, `member_JoinDate`, `member_Status`, `member_Type`) VALUES(:INmemberFname, :INmemberLname, :INmemberLoginID, :INmemberLoginPssw , :INmemberJoindate, :INmemberStatus, :INmemberType)";

		$arr['INmemberFname'] = $form['txtFirstName'];
		$arr['INmemberLname'] = $form['txtLastName'];
		$arr['INmemberLoginID'] = $form['txtMemberLoginEmail'];
		$arr['INmemberLoginPssw'] = $form['txtMemberLoginPwd'];
		$arr['INmemberJoindate'] = TODAY_DATE;
		$arr['INmemberStatus'] = USER_PENDING;
		$arr['INmemberType'] = $form['drpMemberType'];

		$stmt = $this->DB->prepare($Query);

		$stmt->execute($arr);            

	}





	function getTravelBid($arrFilter)
	{

     	$arr = array();
  

		$Query = "SELECT `bid_ID`, `bid_UID`, `bid_QueryID`, `bid_title`, `bid_Amount`, `bid_AddedDate`, `bid_fkAgentID`, `bid_Msg`, `bid_Status`, `bid_UpdatedDate`, `bid_CustomField1`, `bid_CustomField2`, `bid_CustomField3`, `bid_Rating` FROM `tbl_AgentBid` WHERE 1=1";

    
      if (!empty($arrFilter['Querybid']))
      {
        $Query .= "  and bid_QueryID = :INBIDQUERYID";
        $arr['INBIDQUERYID'] = $arrFilter['Querybid'];
      }
	
	 if (!empty($arrFilter['BidID']))
      {
        $Query .= "  and bid_ID = :INBIDID";
        $arr['INBIDID'] = $arrFilter['BidID'];
      }
	

		$stmt = $this->DB->prepare($Query);

		$stmt->execute($arr);

		$result = $stmt->fetchAll();

		return $result;

	}



	function addAgentBid($form){


		 

		$arr = array();

		$Query = "INSERT INTO `tbl_AgentBid` (`bid_UID`, `bid_QueryID`, `bid_title`, `bid_Amount`, `bid_AddedDate`, `bid_fkAgentID`, `bid_Msg`, `bid_Status`, `bid_UpdatedDate`, `bid_CustomField1`, `bid_CustomField2`, `bid_CustomField3`) VALUES (:INUID, :INQUERYID, :INTITLE, :INAMOUNT, :INBIDDATE , :INAGENTID, :INBIDMSG, :INBIDSTATUS, :INUPDATEDDATE ,:INCUSTOMFIELD1 ,:INCUSTOMFIELD2 ,:INCUSTOMFIELD3)";

		$arr['INUID'] = 1234;
		$arr['INQUERYID'] = $form['hidTravelQueryID'];
		$arr['INTITLE'] = $form['txtTravelBidTitle'];
		$arr['INAMOUNT'] = $form['txtTravelBidCost'];
		$arr['INBIDDATE'] = TODAY_DATE;
		$arr['INAGENTID'] = $this->memberID;
		$arr['INBIDMSG'] = $form['txtTravelBidMsg'];
		$arr['INBIDSTATUS'] = BID_NEW;
		$arr['INUPDATEDDATE'] = TODAY_DATE;
		$arr['INCUSTOMFIELD1'] = $form['txtBidCustomField1'];
		$arr['INCUSTOMFIELD2'] = $form['txtBidCustomField2'];
		$arr['INCUSTOMFIELD3'] = $form['txtBidCustomField3'];

		$stmt = $this->DB->prepare($Query);

		$stmt->execute($arr);            

	}



	function chkExistingMailId($MailId){



		$arr = array();

		$Query = "SELECT member_id, member_LoginID, member_LoginPassword from tbl_member_registration WHERE member_LoginID = :INchk_MailId";

		$arr['INchk_MailId'] = $MailId;

		$stmt = $this->DB->prepare($Query);

		$stmt->execute($arr);

		$result = $stmt->fetchAll();
		$counthere = $stmt->rowCount();



		if ($counthere > 0 )
		{
			return 1;
		}
		else
		{
			return 0;
		}


	}


	function login_member($LoginCredentials){


		$arr = array();


		$Query = "SELECT member_id, member_LoginID, member_LoginPassword, member_Type, member_Firstname, member_Lastname FROM tbl_member_registration WHERE member_LoginID = :INchk_MailId AND member_LoginPassword = :INchk_loginPwd";

		$arr['INchk_MailId'] = $LoginCredentials['txtMemberLoginEmail'];
		$arr['INchk_loginPwd'] = $LoginCredentials['txtMemberLoginPwd'];

		$stmt = $this->DB->prepare($Query);

		$stmt->execute($arr);

		$arrResult = $stmt->fetchAll();

		$counthere = $stmt->rowCount();


		//print_r($arrResult);
		if ($counthere > 0 )
		{
			$_SESSION["Travel"]["MemberID"] = $arrResult[0]['member_id'];
			$_SESSION["Travel"]["MemberLoginID"] = $arrResult[0]['member_LoginID'];
			$_SESSION["Travel"]["MemberType"] = $arrResult[0]['member_Type'];
			$_SESSION["Travel"]["MemberFirstName"] = $arrResult[0]['member_Firstname'];
			$_SESSION["Travel"]["MemberLastName"] = $arrResult[0]['member_Lastname'];
			
			return  1;
		}
		else
		{
			return 0;
		}

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



	}



	function getAllTravelQueries($arrFilter){


		$arr = array();


		$Query = "SELECT `travel_ID`, `travel_UID`, `travel_Title`, `travel_Date`, `travel_City`, `travel_RatingType`, `travel_From`, `travel_To`, `travel_TransBy`, `travel_Days`, `travel_Adults`, `travel_Kids`, `travel_HotelRating`, `travel_Requirements`, `travel_AddedDate`, `travel_AddedBy`, `travel_LastBidDate`, `travel_BidCount`, `travel_BidStatus`, `travel_BidOperatorId`, `travel_BidQuoteId`, `travel_BidAmount`, `travel_Budget` FROM tbl_travel_query WHERE 1 = 1";


		if(!empty($arrFilter['TravelTitle'])){

			$Query .= "and travel_Title = :INtravel_Title ";

			$arr['INtravel_Title'] = $arrFilter['TravelTitle'];
		}

		if(!empty($arrFilter['TravelAddedBy'])){

			$Query .= "and travel_AddedBy = :INtravel_addedby ";

			$arr['INtravel_addedby'] = $arrFilter['TravelAddedBy'];

		}

		$stmt = $this->DB->prepare($Query);

		$stmt->execute($arr);

		$result = $stmt->fetchAll();

		return $result;

	}



	function UpdateBidStatus($BidID, $QueryID){

		$arr = array();


		$Query = "UPDATE `tbl_AgentBid` SET bid_Status = CASE WHEN bid_ID = :INBIDID THEN '2' 
            ELSE '3' END WHERE bid_QueryID = :INQUERYID";


            $arr['INBIDID'] = $BidID;
            $arr['INQUERYID'] = $QueryID;
            // $arr['INCLOSEDWON'] = BID_SELECTED;
            // $arr['INCLOSEDLOST'] = BID_REJECTED;

echo  clsMember::interpolateQuery($Query,  $arr);
         $stmt = $this->DB->prepare($Query);

		$stmt->execute($arr);
	}



	function SendMsgToAgent($form){

		$DateTime = date("Y-m-d H:i:s");

		$arr = array();

		$Query = "INSERT INTO `tbl_msg_conversation`(`msg_SenderID`, `msg_ReceiverID`, `msg_DateTime`, `msg_BidID`, `msg_QueryID`, `msg_Status`, `msg_Text`) VALUES (:INMSGSENDERID, :INMSGRECEIVERID, :INMSGDATETIME, :INBIDID, :INQUERYID, :INMSGSTATUS, :INMESSAGE)";


		$arr['INMSGSENDERID'] = $this->memberID;
        $arr['INMSGRECEIVERID'] = $form['BidAgentID'];
        $arr['INMSGDATETIME'] = $DateTime;
        $arr['INBIDID'] = $form['BidID'];
        $arr['INQUERYID'] = $form['TravelQueryID'];
        $arr['INMSGSTATUS'] = 0;
        $arr['INMESSAGE'] = $form['txtConvMsg'];


        $stmt = $this->DB->prepare($Query);

		$stmt->execute($arr);

	}
}                                                //  end of class
?>