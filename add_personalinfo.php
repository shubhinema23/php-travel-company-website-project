<?php
include_once('includes/include-agent-session.php');
include_once('includes/include-header.php');
$agentID = $objSession->getMemberID();


$arrFilter['SessionID'] = $agentID;

$arrPersonalinfo = $objMember->getMemberPersonalInfo($arrFilter);


?>

<h1>Hello This is homepage</h1>

<form method="post" id="frm_Personalinfo" >
	<div class="container">

		<div class="form-group row">
			<label for="bizname" class="col-xs-3 col-form-label mr-2">Business Name</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtBizName" value="<?php echo $arrPersonalinfo[0]['member_BizName'] ?>">
			</div>
		</div>


		<div class="form-group row">
			<label for="bizaddrs" class="col-xs-3 col-form-label mr-2">Business Address</label>
			<div class="col-xs-9">
				<input type="text-area" class="form-control" id="" name="txtBizAddrs" value="<?php echo $arrPersonalinfo[0]['member_BizAddrs'] ?>">
			</div>
		</div>


		<div class="form-group row">
			<label for="biztype" class="col-xs-3 col-form-label mr-2">Business Type</label>
			<div class="col-xs-9">

			<?php 

			//$arrBizType=array('Flight','Railway', 'Hotels');


//userstring = 'Flight , Hotels'
			$arrUserBizType  = explode(", ", $arrPersonalinfo[0]['member_BizType']);

			

			foreach($arrBizType as $val)
			{
				$check= "";
				if (in_array($val, $arrUserBizType))
				{
					$check= "checked";
				}

					echo '<input type="checkbox" class="form-control" id="" name="chkBizType[]" value="'.$val.'" '.$check.'>'.$val;
			} ?>


				 
				

			</div>
		</div>


		<div class="form-group row">
			<label for="mobile" class="col-xs-3 col-form-label mr-2">Mobile</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtMobileNo" value="<?php echo $arrPersonalinfo[0]['member_Mobile'] ?>">
			</div>
		</div>


		<div class="form-group row">
			<label for="phone" class="col-xs-3 col-form-label mr-2">Phone</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtPhoneNo" value="<?php echo $arrPersonalinfo[0]['member_Phone'] ?>">
			</div>
		</div>


		<div class="form-group row">
			<label for="city" class="col-xs-3 col-form-label mr-2">City</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtCity" value="<?php echo $arrPersonalinfo[0]['member_City'] ?>">
			</div>
		</div>


		<div class="form-group row">
			<label for="website" class="col-xs-3 col-form-label mr-2">Website</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtWebsite" value="<?php echo $arrPersonalinfo[0]['member_Website'] ?>">
			</div>
		</div>


		<div class="form-group row">
			<label for="socialmedia" class="col-xs-3 col-form-label mr-2">Social Media</label>
			<div class="col-xs-9">
				<input type="text-area" class="form-control" id="" name="txtSocialMedia" value="<?php echo $arrPersonalinfo[0]['member_SocialMedia'] ?>">
			</div>
		</div>


		<div class="form-group row">
			<label for="email" class="col-xs-3 col-form-label mr-2">Email</label>
			<div class="col-xs-9">
				<input type="email" class="form-control" id="" name="txtEmail" value="<?php echo $arrPersonalinfo[0]['member_EmailAddrs'] ?>">
			</div>
		</div>


		<div class="form-group row">
			<label for="detail" class="col-xs-3 col-form-label mr-2">Other Details</label>
			<div class="col-xs-9">
				<input type="text-area" class="form-control" id="" name="txtOtherDetail" value="<?php echo $arrPersonalinfo[0]['member_OtherDetail'] ?>">
			</div>
		</div>


		<div class="form-group row">
			<label for="timing" class="col-xs-3 col-form-label mr-2">Business Timing</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" id="" name="txtBizTiming" value="<?php echo $arrPersonalinfo[0]['member_BizTiming'] ?>">
			</div>
		</div>


        <div class="form-group row">
			<label for="bizaddrs" class="col-xs-3 col-form-label mr-2">Google Co-ordinates</label>
			<div class="col-xs-9">
				<input type="text-area" class="form-control" id="" name="txtAddrsCord" value="<?php echo $arrPersonalinfo[0]['member_AddrsCord'] ?>">
			</div>
		</div>


		<input type="hidden" name="action" value="add_MemberPersonalInfo">

		<div class="form-group row">
			<div class="offset-xs-3 col-xs-9">
				<button type="submit" class="btn btn-default">Submit</button>
			</div>
		</div>
</div>
</form>