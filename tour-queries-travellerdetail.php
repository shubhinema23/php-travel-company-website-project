<?php
include_once('includes/include-traveller-session.php');
include_once('includes/include-header.php');
$agentID = $objSession->getMemberID();

$QueryId = $_GET['QueryId']; 
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


		<a href="tour-travel-querybid.php?QueryID=<?php echo $QueryId; ?>">Bids On Query</a>
 
</div>
