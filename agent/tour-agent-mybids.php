<?php
include_once(dirname(dirname(__FILE__)).'/includes/include-agent-session.php');
include_once(dirname(dirname(__FILE__)).'/includes/include-header.php');
$agentID = $objSession->getMemberID();



?>


<!-- total bids by agent -->

	<div class="container">


		<div class="row ">
			<div class="col-lg-12 ">
				<div class="row linknav mr-0 ml-0 mb-5 bg-white">
					<div class="col-lg-6">
						<h1>Tour</h1>
					</div>
					<div class="col-lg-6">
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb bg-white text-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item"><a href="#">Tour</a></li>

							</ol>
						</nav>

					</div>
				</div>
			</div>
		</div>


		<div class="row bg-white">
			<div class="col-lg-12 col-md-12 col-sm-12">

			</div>
		</div>


		<div class="row bg-white p-5 shadow-box mt-5">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h2 class="mb-4 font-weight-bold ">My Bids</h2>
		<table class="table table-responsive table-bordered rwd-table">
			<thead>
				<tr>
					<th>Bid Title</th>
					<th>Bid Amount</th>
					<th>Bid Added Date</th>
					<th>Bid Query Title</th>
					<th>Bid Status</th>
					<th>Traveller Message</th>


					<!-- <th>Bid Select</th>
					<th>Bid Send Msg</th> -->

				</tr>
			</thead>

			<tbody>

				<?php
				$arrFilter['agentID'] = $agentID;

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
					$BidQryTitle = $travelQueryBid['travel_Title'];

					?>
					<tr>

						<td><?php echo $BidTitle; ?></td>
						<td><?php echo $BidAmount; ?></td>
						<td><?php echo $BidAddedDate; ?></td>
						<td><a href="tour-queries-agentdetail.php?QueryID=<?php echo $BidQueryID ?>"><?php echo $BidQryTitle; ?></a></td>
						<td><?php if($BidStatus == 1){
								 echo '<a class="text-white btn btn-info">Not Selected</a>';
							} else{
								echo '<a class="text-white btn btn-info"> Selected</a>';
							}
							?></td>

						<td><a href="message_conversation.php?QueryID=<?php echo $BidQueryID ?>&BidID=<?php echo $BidID?>" class="text-white btn btn-info">Message</td>

					</tr>

					<?php } ?>

				</tbody>

			</table>
			</div>
			</div>


	</div>
