
$(document).ready(function(){

	$('#frm_addmember').submit(function(){
		$("#btnSubmit").html("processing");
        $("#btnSubmit").attr("disabled", true);
		var memberlist = $('#frm_addmember').serialize();


		$.ajax({

			url:"/ajax/ajax-member.php",
			type:"post",
			data:memberlist,
			success:function(data)
			{

				$("#btnSubmit").html("Submit");
                $("#btnSubmit").attr("disabled", false);
				window.location = "member_login.php " ;
			}
		});

		return false;

	});


		$('#frm_AgentBid').submit(function(){

		var memberlist = $('#frm_AgentBid').serialize();

		$.ajax({

			url:"/ajax/ajax-travelbid.php",
			type:"post",
			data:memberlist,
			success:function(data)
			{

				alert("saved successfully");
				window.location = "tour-agent-mybids.php " ;
			}
		});

		return false;

	});


		$('#Updatefrm_AgentBid').submit(function(){

		var memberlist = $('#Updatefrm_AgentBid').serialize();

		$.ajax({

			url:"/ajax/ajax-travelbid.php",
			type:"post",
			data:memberlist,
			success:function(data)
			{

				alert("saved successfully");
			}
		});

		return false;

	});

	$("#txtMemberLoginEmail").blur(function(){

		var member_emailID = $("#txtMemberLoginEmail").val();

		$.ajax({

			url:"/ajax/ajax-member.php",
			type:"post",
			data:{

				memberEmailId : member_emailID,
				action : "check_email"
			},

			success:function(data)
			{
				if(data == 1){

					alert("This Mail Id is Already Exist");
				}

			}
		});

		return false;

	});




	$('#frm_memberLogin').submit(function(){

		var memberlist = $('#frm_memberLogin').serialize();


		$.ajax({

			url:"/ajax/ajax-member.php",
			type:"post",
			data:memberlist,
			success:function(data)
			{

				if(data == 1){

					window.location = "user-landing-page.php " ;
				}
				else{
					alert("Wrong Emailid and Password");
				}
			}
		});

		return false;

	});


	$('#frm_addTravelQuery').submit(function(){

		var QueryDetails = $('#frm_addTravelQuery').serialize();

		$.ajax({

			url:"/ajax/ajax-travelquery.php",
			type:"post",
			data:QueryDetails,
			success:function(data)
			{

				alert('saved successfully');
				window.location = "tour-queries-traveller.php " ;
			}
		});

		return false;

	});


$('#frm_SendMsg').submit(function(){

		var CovMessage = $('#frm_SendMsg').serialize();
	var textmsg = $('#txtConvMsg').val();

		$.ajax({

			url:"/ajax/ajax-messageconv.php",
			type:"post",
			data:CovMessage,
			success:function(data)
			{
				$('#MsgConv tbody').append("<tr><td>"+textmsg+"</td></tr>");

				//window.location = "travel_query_traveller.php " ;
			}
		});

		return false;

	});

	
	$('#frm_addTravelPackage').submit(function(){

		var TravelPackage = $('#frm_addTravelPackage').serialize();

		$.ajax({

			url:"/ajax/ajax-package.php",
			type:"post",
			data:TravelPackage,
			success:function(data)
			{

				window.location = "tour-mytour.php " ;
			}
		});

		return false;

	});



	$('.pkgdrpfilter').on('change', function(){

		//alert('change');

		 
		var frmsearchData = $('#frm_pkgFilter').serialize();

			$.ajax({

				url:"/ajax/ajax-package.php",
				type:"post",
				data:frmsearchData,
				success:function(data)
				{
					$('#FilteredPkg').find('tbody').html(data);
					
				}

			});

		 
	});




	$('#frm_Personalinfo').submit(function(){

		var PersonalInfo = $('#frm_Personalinfo').serialize();
		

		$.ajax({

			url:"/ajax/ajax-member.php",
			type:"post",
			data:PersonalInfo,
			success:function(data)
			{
				alert('saved');

				//window.location = "travel_query_traveller.php " ;
			}
		});

		return false;

	});





	$('#frm_addHotel').submit(function(){

		var hotelList = $('#frm_addHotel').serialize();
		

		$.ajax({

			url:"/ajax/ajax-hotel.php",
			type:"post",
			data:hotelList,
			success:function(data)
			{

				alert('saved');
				//window.location = "member_login.php " ;
			}
		});

		return false;

	});


	$('#frm_addRating').submit(function(){

		var ObjRating = $('#frm_addRating').serialize();
		

		$.ajax({

			url:"/ajax/ajax-rating.php",
			type:"post",
			data:ObjRating,
			success:function(data)
			{

				alert('saved');
				//window.location = "member_login.php " ;
			}
		});

		return false;

	});



	$('#frm_addImage').submit(function(){

		var ObjImage = $('#frm_addImage').serialize();
		

		$.ajax({

			url:"/ajax/ajax-image.php",
			type:"post",
			data:ObjImage,
			success:function(data)
			{

				alert('saved');
				//window.location = "member_login.php " ;
			}
		});

		return false;

	});





});                     // end of ready function
