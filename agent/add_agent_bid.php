<?php
include_once(dirname(dirname(__FILE__)).'/includes/include-agent-session.php');
include_once(dirname(dirname(__FILE__)).'/includes/include-header.php');

$agentID = $objSession->getMemberID();
//echo  "agentid".$agentID;

$TravelQueryID = $_GET['QueryID'];
$TravelQueryTitle = $_GET['QueryTitle'];


if($objTravelBid->ChkExistingBid($TravelQueryID) > 0){

	echo "you have already send bid to this Query";
}

$arrFilter['QueryID'] = $TravelQueryID;
$arrFilter['agentID'] = $agentID;


$TravelQuery = $objTravelQuery->getAllTravelQueries($arrFilter);

?>

<h1>Agent Response Page</h1>

<br>
<h3> Query Title - <?php echo $TravelQuery[0]['travel_Title'] ?></h3>
<a href="tour-agent-mybids.php?">My Bids</a>
<br>


<form method="post" id="frm_AgentBid" >
	<div class="container">

	<div class="form-group row">
			<label for="travel_title" class="col-xs-3 col-form-label mr-2"> Title</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtTravelBidTitle" >
			</div>
		</div>


		<div class="form-group row">
			<label for="travel_Cost" class="col-xs-3 col-form-label mr-2">Bid Amount</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtTravelBidCost" >
			</div>
		</div>
 
 

		<div class="form-group row">
			<label for="travel_requirments" class="col-xs-3 col-form-label mr-2"> Message</label>
			<div class="col-xs-9">
				<input type="textarea" class="form-control" id="" name="txtTravelBidMsg">
			</div>
		</div>

		<div class="form-group row">
			<label for="Custom_Field" class="col-xs-3 col-form-label mr-2">Custom Field1</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtBidCustomField1">
			</div>
		</div>

		<div class="form-group row">
			<label for="Custom_Field" class="col-xs-3 col-form-label mr-2">Custom Field2</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtBidCustomField2">
			</div>
		</div>

		<div class="form-group row">
			<label for="Custom_Field" class="col-xs-3 col-form-label mr-2">Custom Field3</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtBidCustomField3">
			</div>
		</div>

		<input type="hidden" name="action" value="add_AgentResponse">
        <input type="hidden" name="hidTravelQueryID" value="<?php echo $TravelQueryID ?>">


		<div class="form-group row">
			<div class="offset-xs-3 col-xs-9">
				<button type="submit" class="btn btn-default">Submit</button>
			</div>
		</div>

	</div>
</form>