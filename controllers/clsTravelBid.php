<?php
session_start();
include_once (dirname(dirname(__FILE__)).'/config/constants.php');
include_once($_SERVER['DOCUMENT_ROOT'] . FolderName . DATABASE_PATH);
include_once($_SERVER['DOCUMENT_ROOT'] . FolderName . SESSIONCLASS_PATH);





class clsTravelBid{

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



    function getTravelBid($arrFilter)
    {

        $arr = array();
  

        $Query = "SELECT `bid_ID`, `bid_UID`, `bid_QueryID`, `bid_title`, `bid_Amount`, `bid_AddedDate`, `bid_fkAgentID`, `bid_Msg`, `bid_Status`, `bid_UpdatedDate`, `bid_CustomField1`, `bid_CustomField2`, `bid_CustomField3`, `bid_Rating`, `travel_UID`, `travel_Title` FROM `tbl_AgentBid` LEFT JOIN `tbl_travel_query` ON travel_ID = bid_QueryID WHERE 1=1";

    
      if (!empty($arrFilter['QueryID']))
      {
        $Query .= "  and bid_QueryID = :INBIDQUERYID";
        $arr['INBIDQUERYID'] = $arrFilter['QueryID'];
      }
    
     if (!empty($arrFilter['BidID']))
      {
        $Query .= "  and bid_ID = :INBIDID";
        $arr['INBIDID'] = $arrFilter['BidID'];
      }

      if (!empty($arrFilter['agentID']))
      {
        $Query .= "  and bid_fkAgentID = :INAGENTID";
        $arr['INAGENTID'] = $arrFilter['agentID'];
      }
    

        $stmt = $this->DB->prepare($Query);

        $stmt->execute($arr);

        $result = $stmt->fetchAll();

        return $result;

    }

    function UpdateBid($form){

        $arr = array();

        $Query = "UPDATE `tbl_AgentBid` SET bid_title = :INBIDTITLE, bid_Amount = :INBIDAMOUNT, bid_Msg = :INBIDMSG WHERE bid_ID = :INBIDID";

         $arr['INBIDID'] = $form['hidTravelBidID'];
         $arr['INBIDTITLE'] = $form['txtTravelBidTitle'];
         $arr['INBIDAMOUNT'] = $form['txtTravelBidCost'];
         $arr['INBIDMSG'] = $form['txtTravelBidMsg'];


         $stmt = $this->DB->prepare($Query);

        $stmt->execute($arr);

    }



   

    function UpdateBidStatus($form){

        $arr = array();


        $Query = "UPDATE `tbl_AgentBid` SET bid_Status = CASE WHEN bid_ID = :INBIDID THEN '2' ELSE '3' END WHERE bid_QueryID = :INQUERYID";

            $arr['INQUERYID'] = $form['QueryID'];
            $arr['INBIDID'] = $form['BidID'];
            
            // $arr['INCLOSEDWON'] = BID_SELECTED;
            // $arr['INCLOSEDLOST'] = BID_REJECTED;

          //echo  clsMember::interpolateQuery($Query,  $arr);

         $stmt = $this->DB->prepare($Query);
         $stmt->execute($arr);

         $arr = array();

         $Query = "UPDATE `tbl_travel_query` SET travel_BidStatus = '2', travel_BidOperatorId = (SELECT `bid_fkAgentID` From tbl_AgentBid WHERE bid_ID = :INBIDID) WHERE travel_ID = :INQUERYID";

         $arr['INQUERYID'] = $form['QueryID'];
         $arr['INBIDID'] = $form['BidID'];

        $stmt = $this->DB->prepare($Query);
         $stmt->execute($arr);

        return '1';
    }



    function ChkExistingBid($QryId){

        $arr = array();

        // $Query = "SELECT `bid_fkAgentID`, `bid_QueryID`, `travel_BidStatus` FROM `tbl_AgentBid` LEFT JOIN `tbl_travel_query` ON bid_QueryID = travel_ID WHERE bid_fkAgentID = :INAGENTID AND bid_QueryID = :INQRYID";

        $Query = "SELECT COUNT(*) from  tbl_AgentBid WHERE bid_fkAgentID = :INAGENTID AND bid_QueryID = :INQRYID";

         $arr['INAGENTID'] = $this->memberID;
         $arr['INQRYID'] = $QryId;

         $stmt = $this->DB->prepare($Query);

         $stmt->execute($arr);


          $result = $stmt->fetch(PDO::FETCH_NUM);

            return $result[0];


    }

}
