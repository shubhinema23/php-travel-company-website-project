<?php
include_once('../includes/include-traveller-session.php');
include_once('../includes/include-header.php');
$agentID = $objSession->getMemberID();

?>
<link rel="stylesheet" href="/design/js/datepicker/datepicker.css">

<!--  -->
<div class="container">
<div class="card">
	<div class="card-title">
      <p class="font-40">Add Your Query </p>
	</div>

	<div class="card-header text-right">
		<a href="tour-queries-traveller.php" class="text-white btn btn-info mr-2">My Queries</a>
	</div>

	<div class="card-body">
<form method="post" id="frm_addTravelQuery" >

	<div class="form-row">
		<div class="form-group col-lg-6 col-xs-12">
			<label for="travel_title" class="col-xs-3 col-form-label mr-2">Travel Title</label>
				<input type="text" class="form-control" id="" name="txtTravelTitle" required="required">
		</div>
	</div>


	<div class="form-row">
		<div class="form-group col-xs-12// col-lg-3">
			<label for="travel_to" class="col-xs-3 col-form-label mr-2">Travel To</label>
				<select class="custom-select col-lg-6" name="drpTravelTo" required="required">
					<option >Select</option>
					<option value="1"></option>
					<option value="2"></option>
				</select>
		</div>

		<div class="form-group col-xs-12// col-lg-3">
			<label for="travel_From" class="col-xs-3 col-form-label mr-2">Travel From</label>
				<input type="text" class="form-control" id="" name="txtTravelFrom">
		</div>
	</div>


	<div class="form-row">
		<div class="form-group  col-xs-12 col-lg-3">
			<label for="travel_state" class="col-xs-3 col-form-label mr-2">Travel State</label>
				<select class="custom-select col-lg-6" name="drpTravelState">
					<option >Select</option>
					<option value="1"></option>
					<option value="2"></option>
				</select>
		</div>

		<div class="form-group col-xs-12 col-lg-3 ">
			<label for="travel_city" class="col-xs-3 col-form-label mr-2">Travel City</label>
				<select class="custom-select col-lg-6" name="drpTravelcity">
					<option >Select</option>
					<option value="1"></option>
					<option value="2"></option>
				</select>
		</div>
	</div>
	


	<div class="form-row">
		<div class="form-group col-xs-12 col-lg-3">
			<label for="travel_TypeRating" class="col-xs-3 col-form-label mr-2">Travel Type Star Rating</label>
				<select class="custom-select col-lg-6" name="drpTravelRating">
					<option >Select</option>
					<option value="5">*****</option>
					<option value="4">****</option>
					<option value="3">***</option>
					<option value="2">**</option>
					<option value="1">*</option>
				</select>
		</div>

		

		<div class="form-group col-xs-12 col-lg-3">
			<label for="travel_by" class="col-xs-3 col-form-label mr-2">Travel By</label>
				<select class="custom-select col-lg-6" name="drpTravelBy">
					<option selected>Select</option>
					<option value= "<?php echo TRAVEL_ROAD ?>" >Road</option>
					<option value="<?php echo TRAVEL_TRAIN ?>">Train</option>
					<option value="<?php echo TRAVEL_AIR ?>">Air</option>
					<option value="<?php echo TRAVEL_ANY ?>">Any</option>
				</select>
		</div>
	</div>


	<div class="form-row">
		<div class="form-group col-xs-12 col-lg-3">
			<label for="travel_by" class="col-xs-3 col-form-label mr-2">Travel Bid Status</label>
			
				<select class="custom-select col-lg-6" name="drpTravelBidStatus">
					<option selected>Select</option>
					<option value= "<?php echo BID_PENDING ?>" >Draft</option>
					<option value="<?php echo BID_ACTIVE ?>">Live Now</option>
				</select>
		
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-xs-12 col-lg-6">
			<label for="travel_date" class="col-xs-3 col-form-label mr-2">Travel Date</label>
		
				<input type="text" class="form-control datepicker" id="" name="txtTravelDate">
		
		</div>

		<div class="form-group col-xs-12 col-lg-6">
			<label for="travel_days" class="col-xs-3 col-form-label mr-2">Travel Days</label>
			
				<input type="text" class="form-control" id="" name="txtTravelDays">
			
		</div>
	</div>


		<div class="form-row">
			<div class=" form-group  col-xs-12 col-lg-6">
			<label for="travel_pax"  >Travel Adults</label>
				<input type="text" class="form-control" id="" name="txtTravelAdults">
			</div>
			<div class="form-group col-xs-12 col-lg-6">
			<label for="travel_pax"  >Travel Kids</label>
				<input type="text" class="form-control" id="" name="txtTravelKids">
			</div>
		</div>

		 
	
	<div class="form-row">
		<div class="form-group col-xs-12 col-lg-6">
			<label for="travel_HotelRating" class="col-xs-3 col-form-label mr-2">Travel Hotel Star Rating</label>
		
				<select class="custom-select  col-lg-6" name="drpTravelHotelRating">
					<option selected>Select</option>
					<option >Select</option>
					<option value="5">*****</option>
					<option value="4">****</option>
					<option value="3">***</option>
					<option value="2">**</option>
					<option value="1">*</option>
				</select>
			
		</div>
	</div>


    <div class="form-row">
		<div class="form-group col-xs-12 col-lg-12">
			<label for="travel_requirments" class="col-xs-3 col-form-label mr-2">Travel Requirments</label>
				<textarea class="form-control" id="" name="txtareaTravelRequirments"></textarea>
		</div>
	</div>


	<div class="form-row">
		<div class="form-group col-xs-12 col-lg-12">
			<label for="travel_date" class="col-xs-3 col-form-label mr-2">Last Bid Date</label>
			<div class="col-xs-9">
				<input type="text"  id="dt" name="txtTravelLastBidDate" class="form-control datepicker">
			</div>
		</div>
	</div>


	<div class="form-row">
		<div class="form-group col-xs-12 col-lg-12">
			<label for="travel_budget" class="col-xs-3 col-form-label mr-2">Travel Budget</label>
		
				<input type="text" class="form-control" id="" name="txtTravelBudget">
		
		</div>
	</div>

		<input type="hidden" name="action" value="add_MemberTravelQuery">

		<div class="form-group ">
			<div class="offset-xs-3 col-xs-9">
				<button type="submit" class="btn btn-default">Submit</button>
			</div>
		</div>

	
</form>
</div>


</div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="../design/js/datepicker/datepicker.js"></script>

<script type="text/javascript">
$(function () {

 $(".datepicker").datetimepicker({
  
    format: 'DD/MM/YYYY'

 });

});
  </script>