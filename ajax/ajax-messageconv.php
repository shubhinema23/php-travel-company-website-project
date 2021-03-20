<?php
// include_once('../includes/include-traveller-session.php');
 //include_once('../includes/include-header.php');
// $MemberID = $objSession->getMemberID();
include("../config/constants.php");

include_once ($_SERVER['DOCUMENT_ROOT'].FolderName.MESSAGECLASS_PATH);


$objMessage = new clsMessage();{

	

if ($_POST["action"] == "frm_SendMsg")
{

	echo $objMessage->InsertConvMsg($_POST);

}

if ($_POST["action"] == "getmsg")
{

	//$objMessage->getConversationMsg($_POST);
$arrFilter = array();

	$arrFilter['BidID'] = $_POST['BidID'];
	$arrFilter['QueryID'] = $_POST['QueryID'];
	
	$arrFilter['ReceivID'] = $_POST['ReceivID'];

	$arrMsg = $objMessage->getConversationMsg($arrFilter);

	foreach ($arrMsg as $Message) {

		$message = $Message['msg_Text'];
		$senderid = $Message['msg_SenderID'];
		$receiverid = $Message['msg_ReceiverID'];
		$sendername = $Message['member_Firstname'];
		$senderName= $senderid == $MemberID ? 'me' : $sendername;


		$msg .= '<tr>';
		$msg .= '<td>';

		$msg .= $senderName . '.' . $message;

		$msg .= '</td>';
		$msg .= '</tr>';



	} 
	echo  $msg;
}



}

?>