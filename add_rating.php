<?php
session_start();

$Sessionid = $_SESSION["Travel"]["MemberID"];

include_once('includes/include-header.php');

?>

<h1>add travel package</h1>

<form method="post" id="frm_addRating" >
	<div class="container">

		<div class="form-group row">
			<label for="" class="col-xs-3 col-form-label mr-2">Rating Comment</label>
			<div class="col-xs-9">
				<textarea class="form-control" id="" name="txtComment"></textarea>
			</div>
		</div>



		<div class="form-group row hidden">
			<label for="pkg_status" class="col-xs-3 col-form-label mr-2">Rating Star</label>
			<div class="col-xs-9">
				<select class="custom-select" name="drpRate">
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
			<label for="" class="col-xs-3 col-form-label mr-2">Image</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtimage">
			</div>
		</div>


		<div class="form-group row hidden">
			<label for="pkg_status" class="col-xs-3 col-form-label mr-2">Rating Status</label>
			<div class="col-xs-9">
				<select class="custom-select" name="drpStatus">
					<option selected>Select</option>
					<option value="1">Active</option>
					<option value="2">Pending</option>
				</select>
			</div>
		</div>



    <div class="form-group row">
		<div class="offset-xs-3 col-xs-9">
			<button type="submit" class="btn btn-default">Submit</button>
			<input type="hidden" name="action" value="addRating" />
		</div>
	</div>
		

	</div>
</form>