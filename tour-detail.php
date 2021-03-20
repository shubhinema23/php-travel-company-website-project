<?php
include_once('includes/include-header.php');

$PkgID = $_GET['PkgID'];

?>
<div id="tour-detail" class="bg-light">

<div class=""  style="background: url('http://cdn-adventure-tours.themedelight.com/wp-content/uploads/2015/07/lake-moraine.jpg');background-size: cover; height:500px;" >

</div>


<div class="container">
	<div class="row mt-5">
		<div class="col-lg-9 col-md-9 col-sm-12" >


		<div class="row bg-white shadow-box">
		<div class="col-lg-12 col-md-12 col-sm-12  " >
			<!-- Nav tabs -->
			<ul class="nav nav-tabs responsive-tabs" id="myTab" role="tablist">
			  <li  >
			    <a   id="home-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="home" aria-selected="true">Details</a>
			  </li>
			  <li  >
			    <a   id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
			  </li>
			  <li >
			    <a   id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Messages</a>
			  </li>
			  <li  >
			    <a   id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
			  </li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content  bg-white">
			  <div class="tab-pane active" id="detail" role="tabpanel" aria-labelledby="home-tab">
			  	
			  <div class="row tab-content-box ">
			  		<div class=" col ">
			  		6 days duration
			  		</div>
			  		<div class="col ">
			  		</div>
			  		<div class="col ">
			  		</div>
			  		<div class="col  ">
			  		</div>
			  		<div class="col ">
			  		</div>
			  </div>

			  <div class="row no-negative-margin ">
			  	<div class="col-lg-12 col-md-12 col-sm-6 clearfix mt-4 mb-4 ">

			  		 <a href=""><span class="badge badge-info  span-lg mr-2">Primary</span></a>
			  		<a href=""><span class="badge badge-info span-lg mr-2">Primary</span></a>
			  		<a href=""><span class="badge badge-info  span-lg mr-2 ">Primary</span></a>
			  		<a href=""><span class="badge badge-info  span-lg mr-2 ">Primary</span></a>
			  		<a href=""><span class="badge badge-info span-lg mr-2 ">Primary</span></a> 

			  		<p class="mt-5">Semper penatibus bibendum lorem magnis aenean rutrum habitant accumsan dignissim magna nisi mi imperdiet donec dictum nunc egestas duis inceptos morbi hac tempor curae; nostra porta.</p>

			  		<p>Congue faucibus dui nisi sapien. Magna phasellus Tempor id torquent, curabitur dui cubilia In mauris ad enim. Habitasse erat leo.</p>
			  	</div>
			  </div>



			  </div>


			  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			  	
			  	<div class="row tab2-content-box ">
				  	<div class=" tour-schedule">
				  		<div class="col-lg-2 col-sm-2 col-xs-2 float-left">
				  			<i class="fa fa-star"></i>
				  		</div>
				  		<div class="col-lg-10 col-sm-10 col-xs-10 float-right">
				  			<h3>Day 1: Departure</h3>
				  		</div>
				  		
				  	
				  	<div class="col-lg-12 col-sm-12 col-xs-12">
				  			<p>Ornare proin neque tempus cubilia cubilia blandit netus.</p>
				  			<p>Maecenas massa. Fermentum. Pretium vitae tempus sem enim enim.
								Tempus, leo, taciti augue aliquam hendrerit.
								Accumsan pharetra eros justo augue posuere felis elit cras montes fames.
								Vulputate dictumst egestas etiam dictum varius.</p>

				  	</div>
			  	</div>

			  </div>
			  </div>


			  <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">.3.</div>
			  <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">.4..</div>
			</div>
		</div>
		</div>


		<?php include_once('includes/include-reviewbox.php');?>



		<div class="row mt-5 ">
		<div class="col-lg-12 col-md-12 col-sm-12  " >
			<div class="" >
			 <h2 class="font-weight-bold">You May Also Like</h2>
			</div>
		</div>
		

			<?php $i=0;
			while($i < 5){				?>

				<div class="col-lg-4 col-md-4 col-sm-12  mt-2 mb-4 ">

					<div class="related-tour bg-white shadow-box ">

						<div   class=" clearfix " style="background: url('/design/images/download.jpg');background-size: cover; height: 150px;" >
						</div>





						<div class=" clearfix "  style="padding:10px">
							<h3>Niagara Falls</h3>
							<p>Nullam. Facilisi tempus dignissim felis adipiscing vestibulum</p>
						</div>


						<div   class=" clearfix "  style="padding:10px;">
							<span class="float-left"  >6 days</span> 
							<span class="float-right"  >6 days</span>
						</div>


					</div>
				</div>

				<?php 				$i++;			}
			?>
	

		
	  </div>

	</div>




	  <div class="col-lg-3 col-md-3 col-sm-12">

		<div class="card">
		<?php 
			if(!isset($_SESSION["Travel"]["MemberID"])){

		?>
		<div class="card-title ml-3 mt-2"><b>Send Email</b></div>

		<?php }
		else{
			?>
				<div class="card-title ml-3 mt-2"><b>Send Email</b><br>OR 
				<button type="button" class="btn btn-primary MsgPkgID" data-toggle="modal" data-target="#myModal" id="<?php echo $PkgID ?>">Direct Message</button></div>
			<?php
		
			}
		
		?>
			
			<div class="card-body">
			<form>
				  <div class="form-group">
				    <label for="Email">Email address</label>
				    <input type="email" class="form-control" id="" placeholder="name@example.com">
				  </div>

				  <div class="form-group">
				    <label for="Email">Contact No</label>
				    <input type="email" class="form-control" id="" placeholder="Contact No">
				  </div>

				  <div class="form-group">
				    <label for="Email">Description</label>
				    <!-- <input type="email" class="form-control" id="" placeholder="Description"> -->
				    <textarea name="EmailDesc" class="form-control"></textarea>
				  </div>

				  
		    </form>

  </div>
		</div>
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

	<div class="form-row">
		<label for="travel_title" class="col-xs-3 col-form-label mr-2"> Your Message</label>
		<div class="col-xs-9">
			<input type="textarea" class="form-control"  name="txtConvMsg" id="txtConvMsg">
		</div>
	</div>

	<input type="hidden" name="ReceivID" value="0">
	<input type="hidden" name="BidID" value="0">
	<input type="hidden" name="TravelQueryID" value="0">
	<input type="hidden" name="PkgID" value="<?php echo $PkgID?>">
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


<script>
$('.responsive-tabs').responsiveTabs({
  accordionOn: ['xs', 'sm']
});


$(document).ready(function(){

	 $('.MsgPkgID').click(function(){

    	var PkgID = $(this).attr('id');


    	$.ajax({

			url:"ajax/ajax-messageconv.php",
			type:"post",
			data:{
				PkgID : PkgID,
				action : 'getmsg'
			},
			success:function(data)
			{

//alert(data);
				 $('#MsgConv tbody').html(data);
				// window.location = "member_login.php " ;
			}
		});
    });
});
</script>
 
 