<?php
session_start();
include('header.php'); 
if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $pwd = $_POST['password'];
// User data to send using HTTP POST method in curl
$data = array('UserID'=>$username,'Psw'=>$pwd);

// Data should be passed as json format
$data_json = json_encode($data);

// API URL to send data
$url = 'https://telkomtest.cloudcover.insure/apiLogin';

// curl initiate
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

// SET Method as a POST
curl_setopt($ch, CURLOPT_POST, 1);

// Pass user data in POST command
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute curl and assign returned data
$response  = curl_exec($ch);
// Close curl
curl_close($ch);

// See response if data is posted successfully or any error
$json = json_decode($response, true);

$d = $json['apiLogin_response']['LoggedIn'];

if($d == 1){
$_SESSION["username"] = $username;
$_SESSION['token'] = random_bytes(12);
?>
<script>location.href = 'dashboard';</script>
<?php 
}else if($_POST['username'] == '' || $_POST['password'] == ''){
    $jsonresponse = "All fields are required!";
}else{
    $jsonresponse = "Login failed";
}

}
?>
    <!-- apply_form_area -->
    <div class="apply_form_area bg-blue">
        <div class="container-fluid p-0">
            
                  <form role="form" method="post">
                 
                    <!-- step3 -->
                    <div class="flex-column-reverse">

                                <div class="row no-gutters flex-row-reverse">
                                    <div class="col-lg-5 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".4s" >
                                        <img src="img/Image_login.png" alt="img" class="w-100"/>
                                    </div>
                                    <div class="col-lg-7 order-lg-1 col-md-6  col-sm-12  my-auto wow fadeInUp" data-wow-delay=".2s" >
                                        <div class="login-profile">

                                        <div class="content">
                                            <div class="tool">
                                                <h3 class="panel-title ls-minus-2 f-48 l-52 color-navy">Login</h3>
                                               
                                               </div>
                                   
                                        </div>
                                        <div class="form mb-4">
                                        <div class="row">	
                                         <div class="col-lg-12 mt-4">
                                         <div class="single_input">
                                                        <div class="mt-10 wide position-relative">
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4" for="username">Username<span style="position: absolute;right:0;
                                                                bottom: 40px;" class='f-14 l-20'><a class="color-grey" href="#">Forgot username?</a></span></label><input type="text" name="username" id="username" autocomplete="off" placeholder="anna.jones@gmail.com" onfocus="this.placeholder = ''" onblur="this.placeholder = 'anna.jones@gmail.com'"  class="single-input p-0 transparent-input">
                                                            
                                                        </div>
                                                     
                                                        <div class="mt-10 wide position-relative">
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4" for="password">Password<span style="position: absolute;right:0;
                                                                bottom: 40px;" class='f-14 l-20'><a class="color-grey" href="forgot_password.html">Forgot password?</a></span>
																 <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" style="position: absolute;
                                                                right: 10px;
                                                                bottom: 10px;"></span> 
                                                                </label><input type="password" id="password-field" name="password" id="password" value="secret" autocomplete="off" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'"  class="single-input p-0 transparent-input eyec ">
                                                                           
                                                        </div>
                                                       
                                                        <?php if(isset($_POST['submit'])){?>
                                    <span class="color-red w-100 mt-5"><?php echo $jsonresponse; ?></span>
                                    <?php } ?>
                                                     
                                                    </div>
                                         
                                         </div>
                                           </div> 
                                           
                                       
                                      
                                      
                                              
                                        </div>
                                        <div class="button-group-area mt-3 w-100">
                                            <input type="reset" class="genric-btn color-azure-blue border-azure-blue large preBtn w-30 font-strong border-3x uppercase" value="Cancel"/>
                                            <input type="submit" name="submit" class="genric-btn success-border large w-30 bg-azure-blue nextBtn color-white font-strong border-3x mb-3 uppercase" value="Login"/>
                                        </div> 
                                        <span class="line-visible-bottom wow lightSpeedIn" data-wow-duration="1s" data-wow-delay=".1s" style="bottom:-10px;left:auto; right: -100px !important"></span>
                                    </div>
                                    
                                   </div> 
                                   </div>
                        </div></div>
                    </form>
                    </div>
                    
                 
        </div>
    </div>
    <!--/ apply_form_area -->

    <?php include('footer.php'); ?>
	<script>
	$(document).ready(function(){
	$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});});
	
	</script>