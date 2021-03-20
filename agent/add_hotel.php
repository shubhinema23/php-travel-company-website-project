<?php
session_start();

$Sessionid = $_SESSION["Travel"]["MemberID"];

include_once('includes/include-header.php');

?>

<h1>add travel package</h1>

<form method="post" id="frm_addHotel" >
	<div class="container">

		<div class="form-group row">
			<label for="" class="col-xs-3 col-form-label mr-2">Hotel Name</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtName">
			</div>
		</div>


		<div class="form-group row">
			<label for="" class="col-xs-3 col-form-label mr-2">Hotel Address</label>
			<div class="col-xs-9">
			<textarea class="form-control" id="" name="txtAddrs"></textarea>
			</div>
		</div>

		<div class="form-group row">
			<label for="" class="col-xs-3 col-form-label mr-2">Hotel City</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtCity">
			</div>
		</div>


		<div class="form-group row">
			<label for="" class="col-xs-3 col-form-label mr-2">Hotel Country</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtCntry">
			</div>
		</div>


		<div class="form-group row">
			<label for="" class="col-xs-3 col-form-label mr-2">Hotel Approx Cost</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtCost">
			</div>
		</div>


		<div class="form-group row">
			<label for="" class="col-xs-3 col-form-label mr-2">Hotel Amenities</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtAmnty">
			</div>
		</div>


		<div class="form-group row hidden">
			<label for="pkg_status" class="col-xs-3 col-form-label mr-2">Hotel Star Rating</label>
			<div class="col-xs-9">
				<select class="custom-select" name="drpRating">
					<option selected>Select</option>
					<option value="1">*</option>
					<option value="2">**</option>
					<option value="3">***</option>
					<option value="4">****</option>
					<option value="5">*****</option>
				</select>
			</div>
		</div>


		<div class="form-group row">
			<label for="" class="col-xs-3 col-form-label mr-2">Hotel Email</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtEmail">
			</div>
		</div>


		<div class="form-group row">
			<label for="" class="col-xs-3 col-form-label mr-2">Hotel Website</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtWeb">
			</div>
		</div>



		<div class="form-group row">
			<label for="" class="col-xs-3 col-form-label mr-2">Hotel Phone</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtPhone">
			</div>
		</div>


		<div class="form-group row">
			<label for="" class="col-xs-3 col-form-label mr-2">Hotel Social Media</label>
			<div class="col-xs-9">
				<textarea class="form-control" id="" name="txtSocialMedia"></textarea>
			</div>
		</div>


		<div class="form-group row">
			<label for="" class="col-xs-3 col-form-label mr-2">Hotel Detail</label>
			<div class="col-xs-9">
				<textarea class="form-control" id="" name="txtDetail"></textarea>
			</div>
		</div>


		<div class="form-group row">
			<label for="" class="col-xs-3 col-form-label mr-2">Hotel Google Co-ordinates</label>
			<div class="col-xs-9">
				<textarea class="form-control" id="" name="txtCord"></textarea>
			</div>
		</div>

		

		<div class="form-group row">
			<div class="offset-xs-3 col-xs-9">
				<button type="submit" class="btn btn-default">Submit</button>
				<input type="hidden" name="action" value="addHotel" />
			</div>
		</div>
		

	</div>
</form>
