<?php
session_start();
include_once (dirname(dirname(__FILE__)).'/config/constants.php');
include_once($_SERVER['DOCUMENT_ROOT'] . FolderName . DATABASE_PATH);
include_once($_SERVER['DOCUMENT_ROOT'] . FolderName . SESSIONCLASS_PATH);

class clsMessage{

	public $DB;




	function  __construct()
	{
		global $db;
		$objSession = new clsSession;
		$this->DB = $db;
		$this->memberID = $objSession->getMemberID();
		$this->memberLoginID = $objSession->getMemberLoginID();


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






	function InsertConvMsg ($form){

		$DateTime = date("Y-m-d H:i:s");

		$arr = array();

		$Query = "INSERT INTO `tbl_msg_conversation`(`msg_SenderID`, `msg_ReceiverID`, `msg_DateTime`, `msg_BidID`, `msg_QueryID`,`msg_PkgID`, `msg_Status`, `msg_Text`) VALUES (:INMSGSENDERID, :INMSGRECEIVERID, :INMSGDATETIME, :INBIDID, :INQUERYID, :INPKGID, :INMSGSTATUS, :INMESSAGE)";


		$arr['INMSGSENDERID'] = $this->memberID;
        $arr['INMSGRECEIVERID'] = $form['ReceivID'];
        $arr['INMSGDATETIME'] = $DateTime;
        $arr['INBIDID'] = $form['BidID'];
        $arr['INQUERYID'] = $form['TravelQueryID'];
        $arr['INPKGID'] = $form['PkgID'];
        $arr['INMSGSTATUS'] = 0;
        $arr['INMESSAGE'] = $form['txtConvMsg'];


        $stmt = $this->DB->prepare($Query);

		$stmt->execute($arr);

	}



	function getConversationMsg($arrFilter){

		$arr = array();

		$Query = "SELECT `msg_ID`, `msg_SenderID`, `msg_ReceiverID`, `msg_DateTime`, `msg_BidID`, `msg_QueryID`,`msg_PkgID`, `msg_Status`, `msg_Text`, `member_Firstname` FROM `tbl_msg_conversation` LEFT JOIN tbl_member_registration ON tbl_member_registration.member_id = tbl_msg_conversation.msg_SenderID WHERE 1=1";


		if (!empty($arrFilter['BidID']) )
      {
        $Query .= "  and msg_BidID = :INQUERYBIDID  ";
        $arr['INQUERYBIDID'] = $arrFilter['BidID'];
      }



		if (!empty($arrFilter['QueryID']) )
      {
        $Query .= "  and msg_QueryID = :INQUERYID  ";
        $arr['INQUERYID'] = $arrFilter['QueryID'];
      }



    if (!empty($arrFilter['ReceivID']) )
      {
        $Query .= "  and msg_ReceiverID = :INRECEIID  and msg_SenderID = :INSENDID";
        $arr['INRECEIID'] = $arrFilter['ReceivID'];
        $arr['INSENDID'] = $this->memberID;
      }




      // if (!empty($arrFilter['SessionID']) )
      // {
      //   $Query .= "  and ( msg_SenderID = :INSESSIONID  or  msg_ReceiverID = :INSESSIONID1 )";
      //   $arr['INSESSIONID'] = $arrFilter['SessionID'];
      //   $arr['INSESSIONID1'] = $arrFilter['SessionID'];
      // }

$Query .= " order by `msg_ID` ";

//echo $this->interpolateQuery($Query, $arr);


		$stmt = $this->DB->prepare($Query);

		$stmt->execute($arr);

		$result = $stmt->fetchAll();

		return $result;

	}



}
?>