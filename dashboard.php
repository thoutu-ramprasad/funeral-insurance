<?php

// Inialize session
session_start();
//echo $_SESSION['username'];
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
header('Location: index');
}else{

?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Finloans</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="manifest" href="site.webmanifest"> -->
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
<!-- Place favicon.ico in the root directory -->
<!-- CSS here -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/magnific-popup.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/themify-icons.css">
<link rel="stylesheet" href="css/nice-select.css">
<link rel="stylesheet" href="css/flaticon.css">
<link rel="stylesheet" href="css/gijgo.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/slick.css">
<link rel="stylesheet" href="css/slicknav.css">
<link rel="stylesheet" href="css/style.css">
<!-- <link rel="stylesheet" href="css/responsive.css"> -->
<script>
function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
function toggle_close() {

      
	  document.getElementById("alert").style.display = 'none';
    document.getElementById("demo1").style.display = 'none';
      
	
	}
</script>

</head>
<body>
<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
<!-- header-start -->
<header>
  <div class="header-area">
      <div id="sticky-header" class="main-header-area">
          <div class="container-fluid">
              <div class="header_bottom_border">
                  <div class="row align-items-center">
                      <div class="col-xl-3 col-lg-2">
                          <div class="logo">
                              <a href="./">
                                  <img src="img/logo.png" alt="">
                              </a>
                          </div>
                      </div>
                      <div class="col-xl-9 col-lg-10">
                          <div class="main-menu  d-none d-lg-block">
                              <nav>
                                  <ul id="navigation">
                                      <li class="dropdown notifications-menu">
                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                              <img class="bell" src="img/topupnav.png" alt="">
                                            <span class="label label-warning">10</span>
                                          </a>
                                          
                                          <ul class="dropdown-menu p-3">
                                              <li class="header f-24 l-32 l-s-m-1 blue-gray m-0 w-100">Notifications</li>
                                              <li class="header f-16 l-23 l-s-5 uppercase blue-gray mt-2 ml-0 w-100">New</li>
                                              <li class="ml-2 w-100">
                                                <!-- inner menu: contains the actual data -->
                                                <ul class="menu">
                                                  <li class="m-0">
                                                    <a href="#" class="f-14 l-14 azure-blue pb-2">
                                                      Outstanding information
                                                    </a>
                                                    <p class="f-12 l-20 l-s-m-1 color-grey">There is still some outstanding information regarding your dependents. Please ensure you visit the page and update all the necessary information.</p>
                                                    <div class="button-group-area">
                                                      <a href="#" class="genric-btn w-45 f-14 l-20 l-s-5 success-border large w-37 bg-azure-blue nextBtn uppercase color-white font-strong border-3x mb-3 py-3 px-3">Update now</a>
                                                  </div>
                                                  </li>
                                                  <li class="m-0 mt-3">
                                                      <a href="#" class="f-14 l-14 azure-blue pb-2">
                                                          Updated terms and conditions
                                                        </a>
                                                        <p class="f-12 l-20 l-s-m-1 color-grey">We have updated our terms and conditions. Please agree to the new terms & conditions.</p>
                                                        <div class="button-group-area">
                                                          <a href="profile_tc.html" class="genric-btn w-45 f-14 l-20 l-s-5 success-border large w-37 bg-azure-blue nextBtn uppercase color-white font-strong border-3x mb-3 py-3 px-3">Read & accept</a>
                                                      </div>
                                                  </li>
                                                  <li class="m-0 mt-3">
                                                      <a href="#" class="f-14 l-14 azure-blue pb-2">
                                                          Debit order bounced
                                                        </a>
                                                        <p class="f-12 l-20 l-s-m-1 color-grey">Your debit order bounced, please update your payment details.</p>
                                                        <div class="button-group-area">
                                                          <a href="#" class="genric-btn w-45 f-14 l-20 l-s-5 success-border large w-37 bg-azure-blue nextBtn uppercase color-white font-strong border-3x mb-3 py-3 px-3">Update now</a>
                                                      </div>
                                                  </li>
                                                  <hr class="border-top-columbia-blue">
                                                  <li class="header f-16 l-23 l-s-5 uppercase blue-gray mt-2 ml-0 w-100">Earlier</li>
                                                  <li class="m-0 mt-3">
                                                      <a href="#" class="f-14 l-14 azure-blue pb-2">
                                                          Outstanding information
                                                        </a>
                                                        <p class="f-12 l-20 l-s-m-1 color-grey">There is still some outstanding information regarding your dependents. Please ensure you visit the page and update all the necessary information.</p>
                                                  </li>
                                                  <li class="m-0 mt-3 mb-5">
                                                      <a href="#" class="f-14 l-14 azure-blue pb-2">
                                                          Welcome, <?php echo $_SESSION['username']; ?>
                                                        </a>
                                                        <p class="f-12 l-20 l-s-m-1 color-grey">Welcome to your account, <?php echo $_SESSION['username']; ?>. You can get started by filling in all your personal details.</p>
                                                  </li>
                                                </ul>
                                              </li>
                                            </ul>
                                        </li>
                                      
                                      <li><a href="#" class="f-12 l-14">Welcome &nbsp;&nbsp;<br/><?php echo $_SESSION['username']; ?></a></li>
                                      <li><a href="#"><i class="ti-angle-down"></i></a>
                                          <ul class="submenu p-2 text-center">
                                            <li><a class="f-14 l-20 azure-blue" href="profile.html">Profile</a></li>
                                            <li><a class="f-14 l-20 azure-blue" href="my-account.html">Account</a></li>
                                            <li><a class="f-14 l-20 azure-blue" href="./">Log out</a></li>
                                          </ul>
                                        </li>
                                      
                                  </ul>
                              </nav>
                              
                          </div>
                          
                      </div>
                      
                      <div class="col-12">
                          <div class="mobile_menu d-block d-lg-none"></div>
                      </div>
                  </div>
              </div>

          </div>
      </div>
  </div>
    
</header>

<!-- header-end -->

<!-- bradcam_area  -->
<section class="profile_tc bg-blue">
  <div class="navbar subnav navbar-static-top px-xl-5 px-lg-5 px-md-5 py-3">
      <div class="container-fluid">

         <div class="row">
             <div class="col-md-12 col-sm-12">
              <div class="topnav sub-menu">
                  <ul class="list-inline m-0 p-0">
                      <li class="list-inline-item"><a class="active f-14 l-14" href="dashboard.html">My Dashboard</a></li>
                      <li class="list-inline-item"><a class="f-14 l-14" href="claims.html">My claims</a></li>
                      <li class="list-inline-item"><a class="f-14 l-14" href="document.html">My documents</a></li>
                    </ul>
              </div>
             </div>
         </div>
      </div>
  </div>

     
</section>
<!--/ bradcam_area  -->
<!--panel-start-->
<div class="alert mb-0" id="alert" style="display:block;background: #F3F7FA;">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12  panel-part">
    <div class="panel panel-primary" >
	<div class="col-lg-1 col-md-1 text-left1"><img src="img/Fill 71.png" alt=""></div>
	<div class="col-lg-7 col-md-7 text-left1">
	<p>There is still some outstanding information regarding your dependents. Please ensure you visit the page and update all the necessary information.</p>
	</div>
	<div class="col-lg-3 col-md-3 text-left1">
    <a href="funeral-plan-detail.html" class="btn btn-default color-white">UPDATE MY DETAILS</a>
	</div>
        <div class="col-lg-1 col-md-1 text-left1">
            <a type="button" class="close" data-target="copyright-wrap" onClick="toggle_close()" data-dismiss="panel" style="    padding-top: 52px; color: #fff;">
                <img src="img/close-white.png">
                <span class="sr-only">Close</span>
            </a>
        </div>
    </div>
	</div>
</div>
</div>
</div>
<!--panel-end-->

<!-- about_area_start  -->
<div class="accordion_thumb plus_padding" style="margin-bottom:0px;background: #F3F7FA;">
  <div class="container">
      <div class="row">	  
        <h1>Welcome back, <?php echo $_SESSION['username']; ?></h1>
		
        <div id="demo" class="collapse collapse show col-lg-12 col-md-12" style="padding-bottom:44px;">
          <div class="wl-back col-lg-3 col-md-3">
            <p><a href="#">FUNERAL PLAN 1</a></p>
            <h3>Main member, <br>spouse and <br>children only</h3>
          </div>
          <div class="wl-back col-lg-5 col-md-5" style="padding-left: 61px;">
		  <p>Add on <button type="text" value="" class="bt-name">Extended Family Funeral</button></p>
  		  <p>Policy number<button type="text" value="" class="bt-no">E012 345 6789</button></p>
		  <p>Policy holder <button type="text" value="" class="bt-no">&nbsp;Anna Jones</button></p>

          </div>
          <div class="wl-back col-lg-4 col-md-4" style="border-right:none;">
		  <p class="text-right"><a href="#">Total monthly premium</a></p>

            <h2 class="text-right">R 275.00</h2>
			<p class="text-right" >2nd day of every month</p>
          </div>
        </div>
		<div class="demo1" id="demo1" style="background:#fff;display:none">
		<div id="demo" class="collapse collapse show col-lg-12 col-md-12"  style="padding-top:122px;">
        <div class="wl-back col-lg-4 col-md-4" style="border-right:none;">
          <p><a href="#">Your funeral plan:</a></p>
          <h4>Main member, spouse<br>
            and children only</h4>
          <p><a href="#">Spouse: 1</a></p>
          <p><a href="#">Children: 1</a></p>
        </div>
        <div class="wl-back col-lg-3 col-md-3" style="border-right:none;">
          <p><a href="#">Cover amount</a></p>
          <h5>R70 000</h5>
        </div>
        <div class="wl-back col-lg-5 col-md-5" style="border-right:none;">
          <p class="text-right"><a href="#">Monthly premium</a></p>
          <h5 class="text-right">R200.00</h5>
        </div>
		<img src="img/Line 19.png" alt="" class="img-ln">

      </div>
	  <div id="demo" class="collapse collapse show col-lg-12 col-md-12">
        <div class="wl-back col-lg-4 col-md-4" style="border-right:none;">
          <h4>Extended Family Funeral </h4>
          <p><a href="#">Parent-in-law: 1</a></p>
        </div>
        <div class="wl-back col-lg-3 col-md-3" style="border-right:none;">
          <h5 class="py-5">R10 000</h5>
        </div>
        <div class="wl-back col-lg-5 col-md-5" style="border-right:none;">
          <h5 class="text-right py-5">R75.00</h5>
        </div>
		<img src="img/Line 19.png" alt="" class="img-ln">
      </div>
	  <div id="demo2" class="collapse collapse show col-lg-12 col-md-12">
        <div class="wl-back col-lg-12 col-md-12 text-right" style="border-right:none;">
          
          <p><a href="#" class="btn sd-details" style="color: #008FE0;letter-spacing: 0.5px;">SEE DETAILS</a></p>
		        </div>

        </div>
<!--<div class="">
<a href="dashboard1.html" class="btn btn-primary" data-toggle="collapse">Close Overview <img src="img/icn_arrow_right_10.png" alt="" style="padding-left:30px;"></a> 
</div>-->
      </div>
       </div> 
    </div>
    <div class="container">
      <div class="row">
      <a id="clickme" class="btn btn-primary" onClick="toggle_visibility('demo1')" style="color:#fff;margin-bottom:181px;">View overview <img src="img/icn_arrow_right_10.png" 
        alt="" style="padding-left:30px; "></a>
      </div>
      </div>
  </div>
  <div>
  
  </div>
  
  </div>
</div>
</div>
<div class="service_area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="section_title text-center mb-90 mt-380">
          <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">Need to make some changes?</h3>
          <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">You can update any outstanding details of yours below.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="single_service wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay=".5s">
          <div class="info text-left p-25"> <span class="f-14 color-gray">BENEFICIARY <b class="color-blue">DETAILS</b></span> </div>
          <div class="service_icon_wrap text-left height-100">
            <div class="service_icon ">
			<img src="img/Group.png" alt="">
            </div>
          </div>
          <div class="info text-left p-25">
            <h2 class="f-32 color-bg mb-3">View and edit your beneficiary details.</h2>
            <p><a class="btn azure-blue uppercase f-12 l-17 ls-0-5 pl-0 " href="#" role="button">View or Edit <img src="img/Fill11.png" alt="" class="icon-img"></a></p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="single_service wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay=".5s">
          <div class="info text-left p-25"> <span class="f-14 color-gray ">BANKING <b class="color-blue">DETAILS</b></span> </div>
          <div class="service_icon_wrap text-left height-100">
            <div class="service_icon ">
			<img src="img/Vector-H.png" alt="">
            </div>
          </div>
          <div class="info text-left p-25">
            <h2 class="f-32 color-bg mb-3">View and edit your banking details.</h2>
            <p><a class="btn azure-blue uppercase f-12 l-17 ls-0-5 pl-0" href="#" role="button">View or Edit <img src="img/Fill11.png" alt="" class="icon-img"></a></p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="single_service wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay=".5s">
          <div class="info text-left p-25"> <span class="f-14 color-gray"><b class="color-blue">SUPPORT</b></span> </div>
          <div class="service_icon_wrap text-left height-100">
            <div class="service_icon ">
			<img src="img/Union.png" alt="">
            </div>
          </div>
          <div class="info text-left p-25">
            <h2 class="f-32 color-bg mb-3">Need to ask a question?</h2>
            <p><a class="btn azure-blue uppercase f-12 l-17 ls-0-5 pl-0" href="#" role="button">Get Help <img src="img/Fill11.png" alt="" class="icon-img"></a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- footer start -->
<footer class="footer">
  <div class="footer_top">
      <!-- <div class='wrap'>
          <div class='label1 top-right1'>
          <div class='rrr'><a href="#">Feedback?</a></div>
            </div> </div> -->

      <div class="container">
          <div class="row">
              <div class="col-xl-2 col-md-6 col-lg-3">
                  <div class="footer_widget wow fadeInUp Navbar" data-wow-duration="1.1s" data-wow-delay=".4s">
                      <h3 class="Navbar__Link Navbar__Link-brand footer_title family-strong f-16">
                          Mobile
                      </h3>
                      <div class="Navbar__Link Navbar__Link-toggle">
                          <i class="fa fa-plus color-white"></i>
                      </div>
                      <nav class="Navbar__Items">
                          <ul>
                              <li class="Navbar__Link"><a href="#">Shop </a></li>
                              <li class="Navbar__Link"><a href="#">Help </a></li>
                              <li class="Navbar__Link"><a href="#">FAQs</a></li>
                              <li class="Navbar__Link"><a href="#">My Telkom</a></li>
                          </ul>
                      </nav>

                  </div>
              </div>
              <div class="col-xl-2 col-md-6 col-lg-3">
                  <div class="footer_widget wow fadeInUp Navbar" data-wow-duration="1.1s" data-wow-delay=".4s">
                      <h3 class="Navbar__Link Navbar__Link-brand footer_title family-strong f-16">
                          Home
                      </h3>
                      <div class="Navbar__Link Navbar__Link-toggle">
                          <i class="fa fa-plus color-white"></i>
                      </div>
                      <nav class="Navbar__Items">
                          <ul>
                              <li class="Navbar__Link"><a href="#">Shop </a></li>
                              <li class="Navbar__Link"><a href="#">Help </a></li>
                              <li class="Navbar__Link"><a href="#">FAQs</a></li>
                              <li class="Navbar__Link"><a href="#">My Telkom</a></li>
                          </ul>
                      </nav>

                  </div>
              </div>
              <div class="col-xl-2 col-md-6 col-lg-2">
                  <div class="footer_widget wow fadeInUp Navbar" data-wow-duration="1.1s" data-wow-delay=".4s">
                      <h3 class="Navbar__Link Navbar__Link-brand footer_title family-strong f-16">
                          Business
                      </h3>
                      <div class="Navbar__Link Navbar__Link-toggle">
                          <i class="fa fa-plus color-white"></i>
                      </div>
                      <nav class="Navbar__Items">
                          <ul>
                              <li class="Navbar__Link"><a href="#">Shop </a></li>
                              <li class="Navbar__Link"><a href="#">Help </a></li>
                              <li class="Navbar__Link"><a href="#">FAQs</a></li>
                              <li class="Navbar__Link"><a href="#">My Telkom</a></li>
                          </ul>
                      </nav>

                  </div>
              </div>
              <div class="col-xl-2 col-md-6 col-lg-3">
                  <div class="footer_widget wow fadeInUp Navbar" data-wow-duration="1.1s" data-wow-delay=".4s">
                      <h3 class="Navbar__Link Navbar__Link-brand footer_title family-strong f-16">
                          About
                      </h3>
                      <div class="Navbar__Link Navbar__Link-toggle">
                          <i class="fa fa-plus color-white"></i>
                      </div>
                      <nav class="Navbar__Items">
                          <ul>
                              <li class="Navbar__Link"><a href="#">Who We Are</a></li>
                              <li class="Navbar__Link"><a href="#">Company </a></li>
                              <li class="Navbar__Link"><a href="#">Careers</a></li>
                              <li class="Navbar__Link"><a href="#">Foundation</a></li>
                              <li class="Navbar__Link"><a href="#">Investor Relations</a></li>
                              <li class="Navbar__Link"><a href="#">Media Centre</a></li>
                              <li class="Navbar__Link"><a href="#">Crime Hotline</a></li>
                          </ul>
                      </nav>

                  </div>
              </div>
              <div class="col-xl-4 col-md-6 col-lg-3">
                  <div class="footer_widget wow fadeInUp Navbar" data-wow-duration="1.1s" data-wow-delay=".4s">
                      <h3 class="Navbar__Link Navbar__Link-brand footer_title family-strong f-16">
                          Connect
                      </h3>
                      <div class="Navbar__Link Navbar__Link-toggle">
                          <i class="fa fa-plus color-white"></i>
                      </div>
                      <nav class="Navbar__Items">
                          <ul>
                              <li class="Navbar__Link"><img src="img/talk-to-us.png">&nbsp;&nbsp;<a
                                      href="#">Talk To Us</a></li>
                              <li class="Navbar__Link"><img src="img/ask.png">&nbsp;<a
                                      href="#">Ask the Community </a></li>
                              <li class="Navbar__Link"><img src="img/facebook.png">&nbsp;&nbsp;&nbsp;&nbsp;<a
                                      href="#">Facebook</a></li>
                              <li class="Navbar__Link"><img src="img/twitter.png">&nbsp;&nbsp;&nbsp;<a
                                      href="#">Twitter</a></li>
                              <li class="Navbar__Link"><img src="img/instagram.png">&nbsp;&nbsp;&nbsp;<a
                                      href="#">Instagram</a></li>
                              <li class="Navbar__Link"><img src="img/youtube.png">&nbsp;&nbsp;&nbsp;<a
                                      href="#">YouTube</a></li>
                              <li class="Navbar__Link"><img src="img/linkedin.png">&nbsp;&nbsp;&nbsp;<a
                                      href="#">LinkedIn</a></li>
                          </ul>
                      </nav>

                  </div>

              </div>
          </div>
      </div>
  </div>
  <a href="#" class="scrollup" onclick='window.scrollTo({top: 0, behavior: "smooth"});'><i
          class="fa fa-angle-up active"></i></a>
  <div class="copy-right_text wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".3s">
      <div class="container">
          <div class="footer_border"></div>
          <div class="row">
              <div class="col-xl-12">
                  <div class="logo right mb-2">
                      <a href="./">
                          <img src="img/logo.png" alt="">
                      </a>
                  </div>
                  <div class="right">
                      <ul class="f-12">
                          <li><a href="#">Home</a></li>|
                          <li><a href="#">PAIA</a></li>|
                          <li><a href="#">Terms and Conditions</a></li>|
                          <li><a href="#">POPI</a></li>|
                          <li><a href="#">Sitemap</a></li>
                      </ul>
                  </div>
                  <p class="copy_right right f-12">© Telkom SA SOC Limited.
                      <script>document.write(new Date().getFullYear());</script> All Rights Reserved.</p>
                  <p class="copy_right right f-12">An authorised Financial Services Provider - FSP no. 46037</p>

              </div>
          </div>
      </div>
  </div>
</footer>
<!--/ footer end  -->
<!-- link that opens popup -->
<!-- JS here -->
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="js/vendor/jquery-1.12.4.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/ajax-form.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/scrollIt.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/nice-select.min.js"></script>
<script src="js/jquery.slicknav.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/gijgo.min.js"></script>
<script src="js/slick.min.js"></script>
<!--contact js-->
<script src="js/contact.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/main.js"></script>
</body>
</html>
<?php } ?>