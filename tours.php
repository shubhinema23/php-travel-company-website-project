<?php
include_once('includes/include-traveller-session.php');
include_once('includes/include-header.php');
$agentID = $objSession->getMemberID();


if($_POST['action'] == 'serchtourfilter'){

	$arrFilter['tourcity'] = $_POST['TourCity'];
	$arrFilter['tourcost'] = $_POST['TourCost'];
	$arrFilter['tourdays'] = $_POST['TourDays'];
	$arrFilter['tourdate'] = $_POST['TourDate'];
}
?>


<div id="" class="bg-light">
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

$arrTravelPackages = $objPackage->getTravelPackage($arrFilter);

foreach($arrTravelPackages as $travelPackage){

	$PackageID = $travelPackage['pkg_id'];
	$PackageTitle = $travelPackage['pkg_Title'];
	$PackageAddedBy = $travelPackage['pkg_AddedBy'];
	$PackageDesc = $travelPackage['pkg_Detail'];
	$PackageDays = $travelPackage['pkg_Days'];
	$PackageCost = $travelPackage['pkg_ApproxCost'];


?>



				<div class=" tour-detail-list row no-negative-margin bg-white mb-5 "  >

					<div class="col-lg-4  col-xs-12 col-sm-12 tour-img"  style="background: url('/design/images/download.jpg');background-size: cover" >	
					</div>

					<div class="col-lg-6  col-xs-12 col-sm-12  tour-info pt-3 pb-3">				
						<h2 class="font-weight-bold"><?php echo $PackageTitle;?></h2>
						<p class="color9a9a9a"><?php echo $PackageDesc;?></p>

						<p><span class="badge badge-info"><?php echo $PackageDays?></span>
						<span class="badge badge-secondary">Secondary</span>
						<span class="badge badge-success">success</span></p>
						</div>

						<div class="col-lg-2  col-xs-12 col-sm-12  tour-cost pt-3 pb-3">	

							<p><i class="fa fa-star"></i></p>			

							<h4><?php echo $PackageCost?></h4>
							<p>per person</p>

							<button type="button" class="btn btn-info btn-sm"><a href="tour-detail.php?PkgID=<?echo $PackageID;?>" class="text-white" >View Tour</a></button>
						</div>

					</div>

					<?php 
					
				}

				?>
			</div>


			<div class="col-lg-3 ">

				<div class=" row no-negative-margin text-center mb-5 bg-info text-white"  >
					<div class="col-lg-12 ">
						<h2>Search Tours</h2>
						<p>Find your dream tour today!</p>

						<form method="post" action="" id="frm_SearchTour">
							<div class="form-group">
								<input type="text" name="TourCity" class="form-control" id="" aria-describedby="emailHelp" placeholder=" Tour City">
							</div>

							<div class="form-group">
								<input type="text" name="TourDate" class="form-control datepicker" id="" placeholder="Approx Date">
							</div>

							<div class="form-group">
								<input type="text" name="TourCost" class="form-control" id="" placeholder="Approx Cost type">
							</div>

							<div class="form-group">
								<input type="text" name="TourDays" class="form-control" id="" placeholder="No Of Days">
							</div>

							<input type="hidden" name="action" value="serchtourfilter">

							<button type="submit" class="btn btn-primary" id="SearchTour">Search</button>
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


</div>



<?php
include_once('includes/include-footer.php');

?> 

<script type="text/javascript">
	
	$(document).ready(function(){

		$('#SearchTour').click(function(){

			$('#frm_SearchTour').submit();
		});
	});




</script>