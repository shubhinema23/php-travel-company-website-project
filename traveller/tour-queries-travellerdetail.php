<?php
include_once(dirname(dirname(__FILE__)).'/includes/include-traveller-session.php');
include_once(dirname(dirname(__FILE__)).'/includes/include-header.php');
$agentID = $objSession->getMemberID();


$arrFilter['QueryID'] = $_GET['QueryID'];

$QueryDetail = $objTravelQuery->getAllTravelQueries($arrFilter);

$arrFilter['agentID'] = $agentID;

$TravelQueryBid = $objTravelBid->getTravelBid($arrFilter);

$agentbid = false;
if ($objTravelBid->ChkExistingBid($QueryDetail[0]['travel_ID']) > 0 )
{
	$agentbid = true;
}
// $arrConst = get_defined_constants(true)['user'];
// foreach($arrConst as $key=>$val)
// {
// 	echo $key .":".$val."<br/>";
// }

?>



	<div class="container">



	<div class="row p-2 mb-5 bg-white shadow-box">

					<div class="col-lg-6">
						<h2>Tour</h2>
					</div>

					<div class="col-lg-6 d-flex justify-content-lg-end justify-content-md-end justify-content-sm-start justify-content-xs-start">
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb bg-white text-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item"><a href="#">Tour</a></li>

							</ol>
						</nav>
					</div>

				</div>

  

	<h3>Query Detail Page</h3>

	<h4>Query Title : <?php echo $QueryDetail[0]['travel_Title']; ?></h4>
	<p>
		Query Added By : <?php echo $QueryDetail[0]['member_Firstname']; ?>
		<br>
		Query Date : <?php echo $QueryDetail[0]['travel_Date']; ?>
		<br>
		Query Status : <?php 
						echo $objTravelQuery->getBidStatus($QueryDetail[0]['travel_BidStatus']);
		 ?>

		 <br>
	<?php if($agentbid){ ?>

		 Query Your Last Bid Amount : <?php $travelbids = $objTravelBid->getTravelBid($arrFilter);
		 								echo $travelbids[0]['bid_Amount'];
		 ?>
		 ,Query Bid Title : <?php echo $travelbids[0]['bid_title'];
		 ?>
		 ,Query Bid Message : <?php echo $travelbids[0]['bid_Msg'];
		
		} ?>
	</p>


 
	<?php 

	 
	if($TravelQueryBid[0]['bid_Status'] == BID_SELECTED || strtotime($QueryDetail[0]['travel_LastBidDate']) < strtotime(TODAY_DATE)){

				echo "Bid Is Closed For This Query";
			}
		elseif($agentbid){

	?> 

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" id="">Update Bid</button>


	<?php
		}else{
	?>

	<a href="add_agent_bid.php?QueryID=<?php echo $QueryDetail[0]['travel_ID'] ?>" >Send Bid</a>

	<?php }?>
 
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 <form method="post" id="Updatefrm_AgentBid" >
	<div class="container">

	<div class="form-group row">
			<label for="travel_title" class="col-xs-3 col-form-label mr-2"> Title</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtTravelBidTitle" value="<?php echo $TravelQueryBid[0]['bid_title']; ?>">
			</div>
		</div>


		<div class="form-group row">
			<label for="travel_Cost" class="col-xs-3 col-form-label mr-2">Bid Amount</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtTravelBidCost" value="<?php echo $TravelQueryBid[0]['bid_Amount']; ?>">
			</div>
		</div>
 
 

		<div class="form-group row">
			<label for="travel_requirments" class="col-xs-3 col-form-label mr-2"> Message</label>
			<div class="col-xs-9">
				<input type="textarea" class="form-control" id="" name="txtTravelBidMsg" value="<?php echo $TravelQueryBid[0]['bid_Msg']; ?>">
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

		<input type="hidden" name="action" value="update_AgentBid">
        <input type="hidden" name="hidTravelBidID" value="<?php echo $travelbids[0]['bid_ID']; ?>">



	</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
     </form>
    </div>
  </div>
</div>



<?php
include_once(dirname(dirname(__FILE__)).'/includes/include-footer.php');

?>