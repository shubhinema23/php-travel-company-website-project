<?php
include('includes/include-header.php');
?>
<div class="container-fluid ">
<div class="row">

<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
</div>

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-centered "  style="margin-top: 100px;">

<div class="card ">
<div class="card-header font-weight-bold">
Login Here
</div>
  
<div class="card-body">

<form method="post" id="frm_addmember" >
<div class="form-row">
<div class="form-group col-lg-12 col-xs-12">
<label for="first_name" >First Name</label>
<input type="text" class="form-control" id="" name="txtFirstName" required="required">
</div>
</div>

<div class="form-row">
<div class="form-group col-lg-12 col-xs-12">
<label for="last_name" >Last Name</label>
<input type="text" class="form-control" id="" name="txtLastName" required="required">
</div>
</div>


<div class="form-row">
<div class="form-group col-lg-6 col-xs-12">
<label for="loginID">Login id</label>
<input type="email" class="form-control" id="txtMemberLoginEmail" name="txtMemberLoginEmail" required="required">
</div>
</div>

<div class="form-row">
<div class="form-group col-lg-6 col-xs-12">
<label for="loginpass">Login Password</label>
<input type="password" class="form-control" id="txtMemberLoginPwd" name="txtMemberLoginPwd" required="required">
</div>
</div>

<div class="form-row">
<div class="form-group col-lg-8 col-xs-12">
<label for="loginpass" >Type</label>
<select class="custom-select" name="drpMemberType" required="required">
<option selected>Select</option>
<option value="1">Agent</option>
<option value="2">Traveller</option>
</select>
</div>
</div>

<input type="hidden" name="action" value="add_memberdata">

<div class="form-row">
<div class="offset-xs-6 col-lg-9">
<button type="submit" class="btn btn-default" id="btnSubmit">Submit</button>
</div>
</div>


</form>
</div>
</div>

</div>
</div>
<?php
include('includes/include-footer.php');
?>
</div>
 