<?php
include_once(dirname(dirname(__FILE__)).'/includes/include-agent-session.php');
include_once(dirname(dirname(__FILE__)).'/includes/include-header.php');
$agentID = $objSession->getMemberID();
echo dirname(dirname(__FILE__));

?>
<link rel="stylesheet" href="../design/js/datepicker/datepicker.css">
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



<div class="row bg-white mt-5 shadow-box">
	<div class="col-lg-12 col-md-12 col-sm-12 pt-5 " >

<h1>add travel package</h1><a href="tour-mytour.php">My Packages</a>

<form method="post" id="frm_addTravelPackage" >
	<div class="container">

		<div class="form-group row">
			<label for="pkg_title" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-form-label mr-2 "><strong>Package Title</strong></label>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 ">
				<input type="text" class="form-control" id="" name="txtPkgTitle" required="required">
			</div>
		</div>

		<div class="form-group row">
			<label for="pkg_tagline" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-form-label mr-2">Package Tag Line</label>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<input type="text" class="form-control" id="" name="txtPkgTagline">
			</div>
		</div>

		<div class="form-group row">
			<label for="pkg_detail" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-form-label mr-2">Package Details</label>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<textarea class="form-control" id="" rows="3" name="txtPkgDetail"></textarea>
			</div>
		</div>

		<div class="form-group row">
			<label for="pkg_city" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-form-label mr-2">Package City</label>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<input type="text" class="form-control" id="" name="txtPkgCity">
			</div>
		</div>

		<div class="form-group row">
			<label for="pkg_days" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-form-label mr-2">Package Days</label>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<input type="text" class="form-control" id="" name="txtPkgDays">
			</div>
		</div>

		<div class="form-group row">
			<label for="pkg_days" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-form-label mr-2">Package Approx Date</label>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<input type="text" class="form-control datepicker" id="" name="txtPkgAppDate">
			</div>
		</div>

		<div class="form-group row">
			<label for="pkg_approxcost" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-form-label mr-2">Package Approximate Cost</label>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<input type="text" class="form-control" id="" name="txtPkgApproxCost">
			</div>
		</div>

		<div class="form-group row">
			<label for="pkg_discountedcost" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-form-label mr-2">Package Discounted Cost</label>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<input type="text" class="form-control" id="" name="txtPkgDiscCost">
			</div>
		</div>

		<div class="form-group row">
			<label for="pkg_date" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-form-label mr-2">Package Added Date</label>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<input type="text" class="form-control datepicker" id="" name="txtpkgAddedDate">
			</div>
		</div>


		<div class="form-group row">
		<label class="custom-control custom-checkbox mr-2">
		<?php 
			$arrPkgCategory = $objPackage->getPkgCategory($arrFilter);

			foreach ($arrPkgCategory as $pkgcategory) {
				// # code...
				$pkgcatId = $pkgcategory['category_ID'];
				$pkgcatName = $pkgcategory['category_Name'];
			
		?>
		<div class="mr-2">
            <input type="checkbox"   name="chkboxpkgType[]" value="<?php echo $pkgcatId; ?>" class="pt-1" ><?php echo $pkgcatName; ?> </div>

      	<?php } ?>
        </label>
        </div>




		<div class="form-group row hidden">
			<label for="pkg_status" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-form-label mr-2">Package Status</label>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<select class="custom-select" name="drpPkgStatus">
					<option selected>Select</option>
					<option value="1">Active</option>
					<option value="2">Pending</option>
				</select>
			</div>
		</div>

		<input type="hidden" name="action" value="addtravelpackage">

		<div class="form-group row">
			<div class="offset-xs-3 col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<button type="submit" class="btn btn-default">Submit</button>
			</div>
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