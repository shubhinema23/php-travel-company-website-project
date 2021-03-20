<?php
session_start();

include_once('includes/include-header.php');
?>


<!--- main content-->

<div id="main-content">
<div class="container">

	<div class="row ">
		<div class="heading">
		</div>	
	</div>



	<div class="row ">
 <div class="col-lg-12  "   >
<div class="row no-gutters">
			<div class="col-lg-2   Dreamtour float-left"   >
			<h4>PLAN YOUR</h4><h2> Dream Tour</h2>
			</div>

			<div class="col-lg-10 float-right" style="background-color: #000; "  >
			  <div class="pkg-search">
					<form>
				  <div class="form-row">
				    <div class="col">
				      <input type="text" class="form-control" placeholder="First name">
				    </div>
				    <div class="col">
				      <input type="text" class="form-control" placeholder="Last name">
				    </div>
				    <div class="col">
				      <input type="text" class="form-control" placeholder="First name">
				    </div>
				    <div class="col">
				      <input type="text" class="form-control" placeholder="First name">
				    </div>
				  </div>
				</form>
				</div>


				<div class="pkg-nav">
					<div class="col-md-10 col-lg-10 float-left">
					
					<ul>
						<li><strong>BROWSE TOURS:</strong></li>
						<li>FUN</li>
						<li>ADVENTURE</li>
						<li>AMAZING</li>
						<li>BEACH</li>
					</ul>
					</div>

					<div class="col-md-2 col-lg-2 sbm-btn float-right">
						<input type="submit" value="search">

					</div>
				</div>  


			</div>
			</div>

		</div>
	</div>



	<div class="row">
		<div class="packages col-sm-12 col-md-12 col-lg-12">
			<h2>CHEAPEST DESTINATIONS</h2>
			<ul class="list-inline">



 

			<?php 
			while($i < 18 ){ ?>
<li   >
	 
					<div class="col-lg-12 col-md-12 col-sm-12 pkg-img "  style="height:150px;background: url('/design/images/Kulfi-Malai.jpg');background-size: cover">
						 
				    </div>


				    <div class="col-lg-4 col-md-4 col-sm-12 float-left list-second-row"  >
				    	Hotel
				    </div>

				    <div class="col-lg-4 col-md-4 col-sm-12 float-left list-second-row">
				    	BreakFast
				    </div>

				    <div class="col-lg-4 col-md-4 col-sm-12 float-left list-second-row ">
				    	AirTicket
				    </div>
			       

			        
		        	<div class="col-lg-6 col-md-6 col-sm-12 float-left list-third-row">
		        		London,ENG
		        	</div>

		        	<div class="col-lg-6 col-md-6 col-sm-12 float-left list-third-row">
		        		Call for price
		        	</div>
		        	
		        	<div class="col-lg-12   float-left list-fourth-row">
		        		London,ENG
		        	</div>
			        
	 
 </li>

			<?php 

			$i++;

			} ?>
				
 

			 </ul>
			 </div>
			</div>


		</div>
	</div>

</div>

<?php

include_once('includes/include-footer.php');

?>