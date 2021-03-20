<div class="row bg-white mt-5 shadow-box">
		<div class="col-lg-12 col-md-12 col-sm-12 no-col-padding" >

		<div class="title text-center pt-4 pb-3 border-bottom">
		 <h3 class="font-weight-bold">TOUR REVIEWS</h3>
		</div>

		<div class="reviews p-5 border-bottom" >

			<div class="tour-rating mb-3 mt-3 pb-5 border-bottom" style=" line-height: 27px;">
		
				<div class="mr-2" style="font-size:22px;"><span><a href="#"><i class="fa fa-star"></i></a></span>
					<span><a href="#"><i class="fa fa-star"></i></a></span>
					<span><a href="#"><i class="fa fa-star"></i></a></span>
					<span><a href="#"><i class="fa fa-star"></i></a></span>
					<span><a href="#"><i class="fa fa-star"></i></a></span>

					
				</div>
				

			</div>
			<?php $i=0;
					while($i < 3){
						?>

			<div class="tour-review row border-bottom mb-5 mt-5 pb-3">
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2  ">
				<img src="http://1.gravatar.com/avatar/15993b2699bdc3b815879a6c1814e36d?s=122&d=mm&r=g" class="rounded-circle  user-img" >
				<p class="username text-center font-weight-bold mt-4 ml-3">Jessica</p>
				</div>
				<div class="col-lg-10 col-sm-10 col-md-10 col-xs-10  p-3 pl-5" style="font-size:15px; line-height: 27px;">
				<div class="float-left " ><span><a href="#"><i class="fa fa-star"></i></a></span>
					<span><a href="#"><i class="fa fa-star"></i></a></span>
					<span><a href="#"><i class="fa fa-star"></i></a></span>
					<span><a href="#"><i class="fa fa-star"></i></a></span>
					<span><a href="#"><i class="fa fa-star"></i></a></span>
				</div>
				<div class="reviewdate font-weight-bold float-right" style="color:#c2c3c3;">27 aug 2017</div>
				<br/>
				<div class="reviewtext clearfix"><p>The sightseeing and activities were better than we even thought! I still can’t believe we did so much in such a short time, but we did not feel stressed. We really loved the tour and would do it all over again in a minute! Thanks.</p></div>
				</div>
			</div>

			<?php
				$i++;
			}
			?>
			
		</div>


		<div class="leave-reviewfrm p-5">
			<h4 class="font-weight-bold">Leave a Review</h4>
			<div class="tour-review mb-3 mt-3" style="font-size:18px; line-height: 27px;">
			<span class="mr-2" >Rating</span>
			<span><a href="#"><i class="fa fa-star"></i></a></span>
			<span><a href="#"><i class="fa fa-star"></i></a></span>
			<span><a href="#"><i class="fa fa-star"></i></a></span>
			<span><a href="#"><i class="fa fa-star"></i></a></span>
			<span><a href="#"><i class="fa fa-star"></i></a></span>
			</div>

			<form class="reviewfrm ">
				<div class="form-group row ">
				    <div class="col-lg-8 col-md-8 col-sm-12 ">
				      <textarea class="form-control" id="exampleFormControlTextarea1" rows="7"></textarea>
				    </div>
				  </div>
				 <div class="form-group row">
				    <div class="col-lg-6 col-md-6 col-sm-12">
				      <input type="text" class="form-control" id="inputName" placeholder="Name">
				    </div>
				  </div>
				  <div class="form-group row">
				    <div class="col-lg-6 col-md-6 col-sm-12">
				      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
				    </div>
				  </div>

				  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>

		</div>
</div>


 