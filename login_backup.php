<?php
include('header'); 
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
session_start();
$_SESSION["username"] = $username;
$_SESSION['token'] = random_bytes(12);
?>
<script>location.href = 'dashboard.html';</script>
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
                                                                <svg width="12" height="11" viewBox="0 0 17 11" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: absolute;
                                                                right: 10px;
                                                                bottom: 10px;">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.8795 5.43803C16.718 5.63441 13.1043 10.125 8.50681 10.125C3.90929 10.125 0.29572 5.63428 0.134174 5.43803C-0.0447247 5.2235 -0.0447247 4.91951 0.134174 4.6868C0.295602 4.48973 3.90929 -0.000883102 8.50681 -0.000883102C13.1043 -0.000883102 16.7179 4.50719 16.8795 4.68609C17.0402 4.90132 17.0402 5.22278 16.8795 5.43801V5.43803ZM8.50681 1.69869C6.64662 1.69869 5.14334 3.20115 5.14334 5.06217C5.14334 6.92235 6.6458 8.42564 8.50681 8.42564C10.367 8.42564 11.8703 6.92248 11.8703 5.06217C11.8703 3.20185 10.3671 1.69869 8.50681 1.69869Z" fill="#3C5564"/>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5469 5.06247C10.5469 3.93597 9.63426 3.02339 8.50784 3.02339C7.38142 3.02339 6.46875 3.93606 6.46875 5.06247C6.46875 6.18889 7.38142 7.10156 8.50784 7.10156C9.63426 7.10156 10.5469 6.18889 10.5469 5.06247Z" fill="#3C5564"/>
                                                                </svg></label><input type="password" name="password" id="password" autocomplete="off" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'"  class="single-input p-0 transparent-input eyec ">
                                                                
                                                        </div>
                                                       
                                                        <?php if(isset($_POST['submit'])){?>
                                    <span class="color-red w-100 mt-5"><?php echo $jsonresponse; ?></span>
                                    <?php } ?>
                                                     
                                                    </div>
                                         
                                         </div>
                                           </div> 
                                           
                                       
                                      
                                      
                                              
                                        </div>
                                        <div class="button-group-area mt-3 w-100">
                                            <a href="#" class="genric-btn color-azure-blue border-azure-blue large preBtn w-30 font-strong border-3x uppercase">Cancel</a>
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

    <?php include('footer'); ?>