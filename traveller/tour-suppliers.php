<?php
include_once(dirname(dirname(__FILE__)).'/includes/include-traveller-session.php');
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




<div class="row mt-5">
		<div class="col-lg-9 col-md-9 col-sm-12" >

		<div class="row mt-5 ">
				

		<?php
		$arrFilter['MembType'] = '1';

$arrSupplr = $objMember->getMemberPersonalInfo($arrFilter);

foreach($arrSupplr as $Supplier){

	$SuplID = $Supplier['fk_memberID'];
	$SuplName = $Supplier['member_Firstname'];
	$SuplLastN = $Supplier['member_Lastname'];
	$SuplMob = $Supplier['member_Mobile'];
	$SuplBizType = $Supplier['member_BizType'];
	$SuplBizTym = $Supplier['member_BizTiming'];
	$SuplDetail = $Supplier['member_OtherDetail'];

	
	


?>


				<div class="col-lg-4 col-md-4 col-sm-12  mt-2 mb-4 ">

					<div class="related-tour bg-white shadow-box ">

						<div   class=" clearfix " style="background: url('/design/images/download.jpg');background-size: cover; height: 150px;" >
						</div>





						<div class=" clearfix "  style="padding:10px">
							<h3><?php echo $SuplName ?><?php echo $SuplLastN ?></h3>
							<p><?php echo $SuplDetail?></p>
						</div>


						<div   class=" clearfix "  style="padding:10px;">
							<span class="float-left"  ><?php echo $SuplBizType?></span> 
							<span class="float-right"  ><?php echo $SuplMob?></span>
							<span class="float-right"  ><a href="tour-supplier-detail.php?agentID=<?php echo $SuplID;?>">Detail</a></span>
						</div>


					</div>
				</div>

					<?php 
					
				}

				?>
			</div>
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


