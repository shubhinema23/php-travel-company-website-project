<?php
include_once(dirname(dirname(__FILE__)).'/includes/include-traveller-session.php');
include_once(dirname(dirname(__FILE__)).'/includes/include-header.php');
$MemberID = $objSession->getMemberID();

?>



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

	<div class="card">
		<div class="card-title">
		<h2 class="mb-4 font-weight-bold ">My Queries</h2>
		</div>

		<div class="card-header text-right">
			<div class="float-left">
				<form method="post" id="QuerySearch">
					<div class="form-row">
						<div class//="form-group col-lg-3 col-xs-6">
						<select class="custom-select col-lg-6 col-xs-6" name="drpQuerySts">
							<option selected>Select</option>
							<option value="1">Active</option>
							<option value="2">Inactive</option>
						</select>
						</div>
					</div>
				</form>
			</div>
			<div class="float-right">
			<a href="add_travelquery.php" class="text-white btn btn-info btn-sm btn-xs">Add Query</a>
			<!-- <a href="awarded_agent.php" class="text-white btn btn-info btn-sm btn-xs">Awarded Agent</a> -->
			</div>

		
		</div>
		
		<table class="table table-responsive table-bordered rwd-table">
			<thead>
				<tr>
					<th>Travel Title</th>
					<th>Travel Days</th>
					<th>Travel City</th>
					<th>Travel Cost</th>
					<th>Last Bid Date</th>
					<th>Approx Travel Date</th>
					<th>No Of Bids</th>
					<th>Minimum Bid Amount</th>
					<th>Awarded Agent</th>
					<th>Bids</th>
					<th>Query Status</th>


					<!-- <th>Bid Select</th>
					<th>Bid Send Msg</th> -->

				</tr>
			</thead>

			<tbody>



		
			<?php

$arrFilter['TravelAddedBy'] = $MemberID;

$arrTravelQueries = $objTravelQuery->getAllTravelQueries($arrFilter);

foreach($arrTravelQueries as $travelQueries){

	$travelTitle = $travelQueries['travel_Title'];
	$travelReqr = $travelQueries['travel_Requirements'];
	$travelDays = $travelQueries['travel_Days'];
	$travelCity = $travelQueries['travel_City'];
	$travelID = $travelQueries['travel_ID'];
	$travelCost = $travelQueries['travel_Budget'];
	$travelDate = $travelQueries['travel_Date'];
	$travelLastBidDate = $travelQueries['travel_LastBidDate'];
	$travelMinBidAmt = $travelQueries['Min_BidAmount'];
	$travelNoOfBids = $travelQueries['No_OfBids'];
	$BidByFName = $travelQueries['agent_FName'];
	$BidByLName = $travelQueries['agent_LName'];

	?>

<tr>

						<td><a href="tour-queries-travellerdetail.php?QueryID=<?php echo $travelID ?>"><?php echo $travelTitle; ?></td>
						<td><?php echo $travelDays; ?></td>
						<td><?php echo $travelCity; ?></td>
						<td><?php echo $travelCost; ?></td>
						<td><?php echo $travelDate; ?></td>
						<td><?php echo $travelLastBidDate; ?></td>
						<td><?php echo $travelNoOfBids; ?></td>
						<td><?php echo $travelMinBidAmt; ?></td>
						<td><?php echo $BidByFName . ' ' . $BidByLName; ?></td>

						

						<td><a href="tour-travel-querybid.php?QueryID=<?php echo $travelID; ?>" class="text-white btn btn-info btn-sm btn-xs" >View Bids</a></td>


						<?php 
								if($travelLastBidDate > TODAY_DATE){
									?>
									<td><p><span class="badge badge-success p-2">Active Now</span></p></td>
						<?php }else{

							?>

									<td><p><span class="badge badge-warning p-2">Inactive</span></p></td>
							<?php
						}
								
						?>

					</tr>

							
						

				<?php }?>
	

				</tbody>

			</table>
			</div>



			</div>
			</div>
	 
</div>
