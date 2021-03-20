<?php
include_once(dirname(dirname(__FILE__)).'/includes/include-traveller-session.php');
include_once(dirname(dirname(__FILE__)).'/includes/include-header.php');
$MemberID = $objSession->getMemberID();

$css = 'responsive-table.css';

$TravelQueryID = $_GET['QueryID'];



if($_POST['action'] == 'UpdateBidStatus'){

	$objTravelBid->UpdateBidStatus($_POST);

}
?>


<!-- bid on travel query -->

<div class="container">


				<div class="row p-2 mb-5 bg-white shadow-box">

					<div class="col-lg-6">
						<h2>Tour</h2>
					</div>

					<div class="col-lg-6 text-right">
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb bg-white text-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item"><a href="#">Tour</a></li>

							</ol>
						</nav>
					</div>

				</div>
			



	<div class="row bg-white p-5 shadow-box mt-5">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	 <?php 
	 $arrFilter['QueryID'] = $TravelQueryID;

	 $arrTravelQueryInfo = $objTravelQuery->getAllTravelQueries($arrFilter);


	foreach ($arrTravelQueryInfo as  $QueryInfo) {
		# code...
		$QueryTitle = $QueryInfo['travel_Title'];
		$QueryDate = $QueryInfo['travel_Date'];
		$travelFrom = $QueryInfo['travel_From'];
		$TravelTo = $QueryInfo['travel_To'];
		$TravelTo = $QueryInfo['travel_City'];
		$TravelTo = $QueryInfo['travel_TransBy'];
		$TravelTo = $QueryInfo['travel_Days'];
		$TravelTo = $QueryInfo['travel_Adults'];
		$TravelTo = $QueryInfo['travel_Kids'];
		$TravelTo = $QueryInfo['travel_Requirements'];
		$TravelTo = $QueryInfo['travel_AddedDate'];
		$TravelTo = $QueryInfo['travel_LastBidDate'];
		$TravelTo = $QueryInfo['travel_BidCount'];
		$TravelTo = $QueryInfo['travel_BidStatus'];
		$TravelTo = $QueryInfo['travel_Budget'];
		
	}

	//`travel_ID`, `travel_UID`, `travel_Title`, `travel_Date`, `travel_City`, `travel_RatingType`, `travel_From`, `travel_To`, `travel_TransBy`, `travel_Days`, `travel_Adults`, `travel_Kids`, `travel_HotelRating`, `travel_Requirements`, `travel_AddedDate`, `travel_AddedBy`, `travel_LastBidDate`, `travel_BidCount`, `travel_BidStatus`, `travel_BidOperatorId`, `travel_BidQuoteId`, `travel_BidAmount`, `travel_Budget`, `member_Firstname`, `member_Lastname`

	?>
	<strong>Travel Query Title : </strong><?php echo $QueryTitle; ?><br/>
	<strong>Travel Query Date : </strong><?php echo $QueryDate; ?><br/>
	<strong>Travel From : </strong><?php echo $travelFrom; ?><br/>
	<strong>Travel To : </strong><?php echo $TravelTo; ?><br/>
	</div>
	</div>

	<div class="row bg-white p-5 shadow-box mt-5">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h2 class="mb-4 font-weight-bold ">Travel Query Bids</h2>
		<table class="table table-responsive table-bordered rwd-table">
			<thead>
				<tr>
					<th>Bid Title</th>
					<th>Bid Amount</th>
					<th>Bid Added Date</th>
					<th>Bid Added By</th>
					<th>Bid Status</th>
					<th>Bid Select</th>
					<th>Bid Send Msg</th>

				</tr>
			</thead>

			<tbody>

				<?php
				$arrFilter['Querybid'] = $TravelQueryID;

				$arrTravelQueryBid = $objTravelBid->getTravelBid($arrFilter);

				foreach($arrTravelQueryBid as $travelQueryBid){

					$BidID = $travelQueryBid['bid_ID'];
					$BidQueryID = $travelQueryBid['bid_QueryID'];
					$BidTitle = $travelQueryBid['bid_title'];
					$BidAmount = $travelQueryBid['bid_Amount'];
					$BidAddedDate = $travelQueryBid['bid_AddedDate'];
					$BidMsg = $travelQueryBid['bid_Msg'];
					$BidAddedBy = $travelQueryBid['bid_fkAgentID'];
					$BidStatus = $travelQueryBid['bid_Status'];

					?>
					<tr>

						<td><?php echo $BidTitle; ?></td>
						<td><?php echo $BidAmount; ?></td>
						<td><?php echo $BidAddedDate; ?></td>
						<td><?php echo $BidAddedBy; ?></td>
						<td><?php echo $BidStatus; ?></td>
						<td><?php 
								if($BidStatus == 1){
						?>
						<a href="#" class="bidStatus text-white btn btn-info" id="<?php echo $BidID; ?>">Select</a>

						<?php }else if($BidStatus == 2){
							?>

						<a href="#" class=" text-white btn btn-info" >Selected</a>

						<?php } else{?>

						<a href="#" class=" text-white btn btn-info" >Rejected</a>
						
						<?php }?>
						</td>

<!-- Button to Open the Modal -->
						<td><button type="button" class="btn btn-primary MsgBidID" data-toggle="modal" data-target="#myModal" id="<?php echo $BidID?>"> Send Message</button></td>



					</tr>

					<?php } ?>

				</tbody>

				<form method="post" id="UpdateBidStatus" action="">
						<input type="hidden" name="BidID" value="" id="BidID">
						<input type="hidden" name="QueryID" value="<?php echo $BidQueryID; ?>">
						<input type="hidden" name="action" value="UpdateBidStatus">

						<!-- <button type="submit" class="text-white btn btn-info" id="BidStatus"></button>  -->
						</form>

			</table>
			</div>
			</div>

	</div>	

	<?php
	include_once(dirname(dirname(__FILE__)).'/includes/include-footer.php');

	?> 



<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      

<h1>Message Conversation</h1>

<table class="table table-striped" id="MsgConv">

<tbody>



</tbody>
</table>


<div class="container">
<form method="post" id="frm_SendMsg" >

	<div class="form-group row">
		<label for="travel_title" class="col-xs-3 col-form-label mr-2"> Your Message</label>
		<div class="col-xs-9">
			<input type="textarea" class="form-control"  name="txtConvMsg" id="txtConvMsg">
		</div>
	</div>

	<input type="hidden" name="ReceivID" value="0">
	<input type="hidden" name="TravelQueryID" value="<?php echo $TravelQueryID ?>">
	<input type="text" name="BidID" id="SendBidID" value="">
	<input type="hidden" name="PkgID" value="0">
	<input type="hidden" name="action" value="frm_SendMsg">


	<div class="form-group row">
			<div class="offset-xs-3 col-xs-9">
				<button type="submit" class="btn btn-default">Send</button>
			</div>
	</div>
</form>
</div>
	

</tr>
 

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>




	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="/design/js/responsivetables.js"></script>
	<script type="text/javascript">

		$(window).load( function() {
			$(document).responsiveTables();
		});



$(document).ready(function(){

	$('.bidStatus').click(function(){

		var BidID = $(this).attr('id');
		$('#BidID').val(BidID);
	
		$('#UpdateBidStatus').submit();


    });



    $('.MsgBidID').click(function(){

    	var BidID = $(this).attr('id');

    				$('#SendBidID').val(BidID);

    	$.ajax({

			url:"ajax/ajax-messageconv.php",
			type:"post",
			data:{
				BidID : BidID,
				QueryID :'<?php echo $TravelQueryID ?>',
				action : 'getmsg'
			},
			success:function(data)
			{

//alert(data);
				 $('#MsgConv tbody').html(data);
				// window.location = "member_login.php " ;
			}
		});
    })


});
	</script>
