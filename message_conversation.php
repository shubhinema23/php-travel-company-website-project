<?php
session_start();
$Sessionid = $_SESSION["Travel"]["MemberID"];
//echo $Sessionid;
include_once('includes/include-header.php');
 //echo $_SERVER['DOCUMENT_ROOT'].FolderName.MEMBERCLASS_PATH;

$BidID = $_GET['BidID'];
$QueryID = $_GET['QueryID'];


$arrFilter['BidID'] = $BidID;
$arrFilter['QueryID'] = $QueryID;

$arrTravelQueryBid = $objTravelBid->getTravelBid($arrFilter);


	$BidAgentID = $arrTravelQueryBid[0]['bid_fkAgentID'];
	$TravelQueryID = $arrTravelQueryBid[0]['bid_QueryID'];

?>


<h1>Message Conversation</h1>

<table class="table table-striped">
<thead>
<tr>
<th></th>
</tr>
</thead>

<tbody>
	
<?php

$arrFilter['BidID'] = $BidID;
$arrFilter['SessionID'] = $Sessionid;
$arrFilter['QueryID'] = $QueryID;

$arrMsg = $objMessage->getConversationMsg($arrFilter);

 	foreach ($arrMsg as $Message) {
 		
 		$message = $Message['msg_Text'];
 		$senderid = $Message['msg_SenderID'];
 		$receiverid = $Message['msg_ReceiverID'];
 		$sendername = $Message['member_Firstname'];
 	    $senderName= $senderid == $Sessionid ? 'me' : $sendername;
 
?>
<tr>
<td>
	<?php 
	 
			echo $senderName."." .$message;
		 
		?>
</td>
</tr>

<?php } ?>

<tr>
	


<div class="container">
<form method="post" id="frm_SendMsg" >

	<div class="form-group row">
		<label for="travel_title" class="col-xs-3 col-form-label mr-2"> Your Message</label>
		<div class="col-xs-9">
			<input type="textarea" class="form-control" id="" name="txtConvMsg">
		</div>
	</div>

	<input type="hidden" name="BidAgentID" value="<?php //echo $BidAgentID ?>">
	<input type="hidden" name="TravelQueryID" value="<?php echo $QueryID ?>">
	<input type="hidden" name="BidID" value="<?php echo $BidID ?>">
	<input type="hidden" name="action" value="frm_SendMsg">


	<div class="form-group row">
			<div class="offset-xs-3 col-xs-9">
				<button type="submit" class="btn btn-default">Send</button>
			</div>
	</div>
</form>
</div>
	

</tr>
</tbody>
</table>