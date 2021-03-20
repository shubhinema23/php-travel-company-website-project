<?php
include_once(dirname(dirname(__FILE__)).'/includes/include-agent-session.php');
include_once(dirname(dirname(__FILE__)).'/includes/include-header.php');
$agentID = $objSession->getMemberID();


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



		<div class="row ">
			<div class="col-lg-9 ">	

			<?php



$arrTravelQueries = $objTravelQuery->getAllTravelQueries($arrFilter);

foreach($arrTravelQueries as $travelQueries){

	$travelTitle = $travelQueries['travel_Title'];
	$travelReqr = $travelQueries['travel_Requirements'];
	$travelDays = $travelQueries['travel_Days'];
	$travelCity = $travelQueries['travel_City'];
	$travelID = $travelQueries['travel_ID'];
	$travelCost = $travelQueries['travel_Budget'];

	?>

				<div class=" tour-detail-list row no-negative-margin bg-white mb-5 "  >

					<div class="col-lg-4  col-xs-12 col-sm-12 tour-img"  style="background: url('/design/images/download.jpg');background-size: cover" >	
					</div>

					<div class="col-lg-6  col-xs-12 col-sm-12  tour-info pt-3 pb-3">				
						<h2 class="font-weight-bold"><?php echo $travelTitle;?></h2>
						<p class="color9a9a9a"><?php echo $travelReqr;?></p>

						<p><span class="badge badge-info"><?php echo $travelDays?></span>
						<span class="badge badge-secondary">Secondary</span>
						<span class="badge badge-success">success</span></p>
						</div>

						<div class="col-lg-2  col-xs-12 col-sm-12  tour-cost pt-3 pb-3">	

							<p><i class="fa fa-star"></i></p>			

							<h4><?php echo $travelCost?></h4>
							<p>per person</p>

							<button type="button" class="btn btn-info btn-sm"><a href="tour-queries-agentdetail.php?QueryID=<?echo $travelID;?>" class="text-white" >View Query</a></button>
						</div>

					</div>

				<?php }?>
		</div>






		<div class="col-lg-3 ">

				<div class=" row no-negative-margin text-center mb-5 bg-info text-white"  >
					<div class="col-lg-12 ">
						<h2>Search Tours</h2>
						<p>Find your dream tour today!</p>

						<form>
							<div class="form-group">
								<input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Search Tour">
							</div>

							<div class="form-group">
								<input type="text" class="form-control" id="" placeholder="Destination">
							</div>

							<div class="form-group">
								<input type="text" class="form-control" id="" placeholder="Tour type">
							</div>

							<div class="form-group">
								<input type="text" class="form-control" id="" placeholder="Month">
							</div>

							<button type="submit" class="btn btn-primary">Search</button>
						</form>

					</div>
				</div>
				<div class="col-lg-12 ">
					<?php 
					$i= 0 ; 
					while($i < 6 ){ ?>

					<div class="mb-5" style="background: url('/design/images/download.jpg');background-size: cover">


					</div>

					<?php

					$i++;

				} ?>
			</div>
		</div>

</div>
</div>