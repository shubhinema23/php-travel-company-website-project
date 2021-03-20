<?php
include_once(dirname(dirname(__FILE__)).'/includes/include-traveller-session.php');
include_once(dirname(dirname(__FILE__)).'/includes/include-header.php');
$MemberID = $objSession->getMemberID();

$css = 'responsive-table.css';

$AgentID = $_GET['agentID'];

echo $AgentID;

?>


<div id="" class="bg-light">
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
 

<?php 

	$arrFilter['agentID'] = $AgentID;

$Supplier = $objMember->getMemberPersonalInfo($arrFilter);

?>

	<div class="row bg-white mt-5 shadow-box">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
		  <div class=" row border-bottom mb-5 mt-5 pb-3 no-negative-margin">
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2  ">
				<img src="http://1.gravatar.com/avatar/15993b2699bdc3b815879a6c1814e36d?s=122&d=mm&r=g" class="rounded-circle  user-img" >
				</div>
		
				<div class="col-lg-10 col-sm-10 col-md-10 col-xs-10  p-3 pl-5" style="font-size:15px; line-height: 27px;">
				<div class="float-left " ><span><a href="#"><i class="fa fa-star"></i></a></span>
					<span><a href="#"><i class="fa fa-star"></i></a></span>
					<span><a href="#"><i class="fa fa-star"></i></a></span>
					<span><a href="#"><i class="fa fa-star"></i></a></span>
					<span><a href="#"><i class="fa fa-star"></i></a></span>
				</div>


				<div class="reviewdate font-weight-bold float-right" style="color:#c2c3c3;"><button type="button" class="btn btn-primary MsgAgentID" data-toggle="modal" data-target="#myModal" id="<?php echo $AgentID ?>"> Send Message</button></div>
				<br/>




				<div class="agent-Name clearfix">
					<p class="agentname font-weight-bold mt-2 font-24"><?php echo $Supplier[0]['member_Firstname'];?><?php echo $Supplier[0]['member_Lastname'];?>Jessica</p>
				</div>
				<div class="agent-tagline clearfix">
				<p>The sightseeing and activities were better than we even thought! I still can’t believe.</p></div>
				</div>
			</div>

			<div class="row no-negative-margin">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-5 pr-5 ">
				<p class="justify-content-center">Thank you very much for organising a very successful DO DHAM Yatra for us between 3rd to 10th of October 2017 and just returned to UK after a short stay in Delhi. You have provided us with an EXCELLENT DRIVER MR SURENDRA MEHTA and practically a new comfortable Toyota INNOVA with very comfortable seating arrangement.Mr S Mehta is a very careful and experience driver who is used to drive around these difficult mountains which are with numerous curves and narrow roads.He made an extra effort to find alternative Helicopter Flight when our arranged company cancelled our flight in the last minute and he made Kedarnath Dharshan was possible for us.</p>
				</div>
			</div>
		</div>
	</div>


	<?php
	include_once(dirname(dirname(__FILE__)).'/includes/include-footer.php');

	?> 


<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      

<h1>Message Conversation</h1>

<table class="table table-striped" id="MsgConv">

<tbody>



</tbody>
</table>


<div class="container">
<form method="post" id="frm_SendMsg" >

	<div class="form-group row">
		<label for="travel_title" class="col-xs-3 col-form-label mr-2"> Your Message</label>
		<div class="col-xs-9">
			<input type="textarea" class="form-control"  name="txtConvMsg" id="txtConvMsg">
		</div>
	</div>

	<input type="hidden" name="BidID" value="0">
	<input type="hidden" name="TravelQueryID" value="0">
	<input type="hidden" name="ReceivID" value="<?php echo $AgentID ?>">
	<input type="hidden" name="PkgID" value="0">
	<input type="hidden" name="action" value="frm_SendMsg">


	<div class="form-group row">
			<div class="offset-xs-3 col-xs-9">
				<button type="submit" class="btn btn-default">Send</button>
			</div>
	</div>
</form>
</div>
	

</tr>
 

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>



<script type="text/javascript">
$(document).ready(function(){

    $('.MsgAgentID').click(function(){

    	var AgentID = $(this).attr('id');


    	$.ajax({

			url:"ajax/ajax-messageconv.php",
			type:"post",
			data:{
				ReceivID : AgentID,
				action : 'getmsg'
			},
			success:function(data)
			{

//alert(data);
				 $('#MsgConv tbody').html(data);
				// window.location = "member_login.php " ;
			}
		});
    })

});

</script>