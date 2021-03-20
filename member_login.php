<?php
$css = 'login.css';
include('includes/include-header.php');


?>

<div class="container-fluid ">

<div class="row">

<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
</div>

<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-centered// "  style="margin-top: 100px;">

<div class="card ">
  <div class="card-title">
  <p class="font-24 font-weight-bold">Login Here</p>
  </div>

  
  <div class="card-body">
<div class="form-box  col-centered " id="login-box">

<form method="post" id="frm_memberLogin" >
 
  
                    <div class="form-group">
                        <input type="email"  required="required" class="form-control" name="txtMemberLoginEmail" id="txt_EmailID" placeholder="Email ID ">
                    </div>
                    <div class="form-group">
                             <input type="password"  required="required" class="form-control" name="txtMemberLoginPwd" id="txt_password" placeholder="Password ">
                    </div>          
                  
                    <input type="hidden" name="action" value="Login_member">

                     <div class="footer">                                                               
                    <button type="submit" class="btn btn-primary btn-block">Login</button>  
                    
                  <!--  <p><a href="#">I forgot my password</a></p>-->
                
                </div>


</form>
</div></div>

<div class="card-footer text-center">
<a href="member_registration.php" class="text-center">Register a new membership</a>
</div>

</div>

</div>
</div>
</div>


<?php
include('includes/include-footer.php');


?>