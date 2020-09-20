<style>
  .footer_widget {
    display: block !important;
}
    .btn-success{
        color: #008FE0 !important;
        background-color: transparent !important;
        border-color: transparent !important;
    }
    .stepwizard-step p {
    margin-top: 0px;
    color:#666;
    display: inline-table;
    vertical-align: middle;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
    opacity:1 !important;
    color:#bbb;
}

.stepwizard-step {
    display: table-cell;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}

.panel .front{
    position:absolute;
    top:-185px;
  left:0px;
  background: linear-gradient(324.99deg, rgba(8, 45, 108, 0.42) 0%, rgba(0, 143, 224, 0.7) 37.73%, rgba(220, 244, 255, 0.035) 102.72%), rgba(0, 143, 224, 0.7);
box-shadow: 0px 2px 4px rgba(8, 45, 108, 0.2), -6px -6px 25px rgba(0, 143, 224, 0.1), 6px 6px 16px rgba(8, 45, 108, 0.2);
    text-align: center;
    -webkit-transform: rotateX(0) rotateY(0);
    transform: rotateX(0) rotateY(0);
  -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
   -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
}

.panel .back{
    position:absolute;
    top:-185px;
    left:0px;
    background:#082d6c;
    box-shadow: 0px 2px 4px rgba(8, 45, 108, 0.2), -6px -6px 25px rgba(0, 143, 224, 0.1), 6px 6px 16px rgba(8, 45, 108, 0.2);
    text-align: center;
    -webkit-transform: rotateY(-179deg);
    transform: rotateY(-179deg);
  -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
   -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
}

.panel.flip .front{ transform: rotateY(179deg) }
.panel.flip .back{ -webkit-transform: rotateX(0) rotateY(0); }

  /* .panel {
    -webkit-perspective: 800px;
            perspective: 800px;
  } */
 .swing .front,
  .swing .back {
    width: 140px;
    -webkit-transition-duration: 1s;
    transition-duration: 1s;
    -webkit-transform-origin: 170px 0;
    transform-origin: 170px 0;
  }
  .swing .front {
    -webkit-transform: rotateY(0);
    transform: rotateY(0);
  }
  .swing .back {
    background-color: #555; /* hiding this side, so get darker */
    -webkit-transform: rotateY(-180deg) translateX(198px) translateZ(2px);
            transform: rotateY(-180deg) translateX(198px) translateZ(2px);
  }

  .swing.flipswing .front {
    background-color: #222; /* hiding this side, so get darker */
    -webkit-transform: rotateY(180deg);
            transform: rotateY(180deg);
  }
  .swing.flipswing .back {
    background-color: #80888f;
    -webkit-transform: rotateY(0) translateX(198px) translateZ(2px);
            transform: rotateY(0) translateX(198px) translateZ(2px);
  }


    </style>
<?php
session_start();
if(isset($_SESSION['json_data_array'])){
$sessionarray = $_SESSION['json_data_array'];
for($i=0;$i<count($sessionarray); $i++){
switch ($sessionarray[$i]['name']) {
  case "coveramount":
    $coveramount = $sessionarray[$i]['value'];
    break;
  case "title":
    $sessiontitle = $sessionarray[$i]['value'];
    break;
  case "fname":
    $firstname = $sessionarray[$i]['value'];
    break;
  case "surname":
    $surname = $sessionarray[$i]['value'];
    break;
  case "cnumber":
    $cnumber = $sessionarray[$i]['value'];
    break;
  case "income":
    $income = $sessionarray[$i]['value'];
    break;
  default:
    //echo "Your favorite color is neither red, blue, nor green!";
}
}
}
include('header.php');
if(isset($_POST['submit'])){
$_SESSION['json_data_post'] = $_POST;
$client_title = $_POST['c_title'];
$client_firstname = $_POST['c_firstname'];
$client_surname = $_POST['c_surname'];
$client_idnumber = $_POST['c_idnumber'];
$client_contactnumber = $_POST['c_contactnumber'];
$client_email = $_POST['c_email'];
$client_address = $_POST['c_address'];
$plan = $_POST['plan'];
$optionvalue = $_POST['option'];
$bankname = $_POST['p_bankname'];
$account_type = $_POST['p_account_type'];
$account_number = $_POST['p_account_number'];
$account_holder_name = $_POST['p_account_holder_name'];
//$b_title = $_POST['b_title'];
$b_firstname = $_POST['b_firstname'];
$b_surname = $_POST['b_surname'];
$b_idnumber = $_POST['b_idnumber'];
$b_email = $_POST['b_email'];
$b_contactnumber = $_POST['b_contactnumber'];
$b_relationship = $_POST['b_relationship'];
if($_POST['c_surname'] == ''|| $_POST['c_firstname'] ==''){
  $initials = "";
}else{
  $initials = $client_surname[0].$client_firstname[0];
}

$address = "1639 Market St\r\nRandburg\r\n$client_address\r\n2167";
  //$ProductGuid = "Telkom Funeral";
// User data to send using HTTP POST method in curl
$data = '{
  "ClientIn" : {
    "CLIENTGUID" : "",
    "MANUALCODE" : "",
    "TITLE" : "'.$client_title.'",
    "INITIALS" : "'.$initials.'",
    "FIRSTNAMES" : "'.$client_firstname.'",
    "SURNAME" : "'.$client_surname.'",
    "IDNUMBER" : "'.$client_idnumber.'",
    "CELLPHONE" : "'.$client_contactnumber.'",
    "EMAIL" : "'.$client_email.'",
    "HOMETEL" : "'.$client_contactnumber.'",
    "WORKTEL" : "'.$client_contactnumber.'",
    "FAXNO" : "011 365 1426",
    "POSTALADDRESS" : "'.$address.'",
    "RESIDENTIALADDRESS" : "'.$address.'",
    "LANGUAGE" : "English",
    "DATEOFBIRTH" : "1974/09/18",
    "SEX" : "Male",
    "OCCUPATION" : "Reporter",
    "PASSPORTNUMBER" : "",
    "BROKERGUID" : "",
    "CHANGEDBY" : ""
  },
  "PolicyIn" : {
    "CLIENTGUID" : "",
    "POLICYGUID" : "",
    "PRODUCTTYPE" : "Telkom Funeral",
    "PRODUCTPLAN" : "'.$plan.'",
    "BENEFITTYPE" : "'.$optionvalue.'",
    "INCEPTIONDATE" : "2020-10-01",
    "PAYMENTFREQUENCY" : "Monthly",
    "PAYMENTMETHOD" : "Debit Order",
    "BANKGUID" : "'.$bankname.'",
    "ACCOUNTTYPE" : "'.$account_type.'",
    "ACCOUNTNUMBER" : "'.$account_number.'",
    "PREFERREDDEBITORDERDAY" : "26",
    "BROKETPOLICYNO" : "",
    "INSURERPOLICYNO" : "",
    "BROKERGUID" : "",
    "INSURERGUID" : "",
    "NEWBUSCHANNEL" : "Self Service",
    "INTERNALEMPLOYEE" : "",
    "INTERNALREFERENCE" : "",
    "BYPASSPAYMENTDETAILS" : ""
  }     
  ],
  "InputBenQueue" : [
    {
      "BENACTION" : "Insert",
      "BENEFICIARYGUID" : "",
      "BENIFICIARYTYPE" : "Individual",
      "TITLE" : "'.$b_relationship.'",
      "FIRSTNAME" : "'.$b_firstname.'",
      "SURNAME" : "'.$b_surname.'",
      "IDNUMBER" : "'.$b_idnumber.'",
      "DATEOFBIRTH" : "1969/09/18",
      "SEX" : "Male",
      "COMPANYNAME" : "",
      "REGISTRATIONNO" : "",
      "EMAIL" : "'.$b_email.'",
      "CELLPHONE" : "'.$b_contactnumber.'",
      "HOMETELEPHONE" : "'.$b_contactnumber.'",
      "WORKTELEPHONE" : "'.$b_contactnumber.'",
      "PASSPORTNO" : "",
      "RELATIONSHIP" : "'.$b_relationship.'",
      "ACCOUNTHOLDER" : "Anthony Sails",
      "ACCOUNTNUMBER" : "1052711483",
      "BANK" : "ABSA",
      "BRANCHCODE" : "632005",
      "BenPercent" : "100.00%",
      "SHARE" : "100.00"
    }
  ]
}';

//print_r($data);
// Data should be passed as json format
//$data_json = json_encode($data);

// API URL to send data
$url = 'https://telkomtest.cloudcover.insure/apiCreateCliPolCovBenReg';

// curl initiate
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

// SET Method as a POST
curl_setopt($ch, CURLOPT_POST, 1);

// Pass user data in POST command
curl_setopt($ch, CURLOPT_POSTFIELDS,$data);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute curl and assign returned data
$response  = curl_exec($ch);
// Close curl
curl_close($ch);

// See response if data is posted successfully or any error
$json = json_decode($response, true);
//print_r($json);
//$apiRegister_response = $json['apiRegister_response']['Response'];
$apiRegister_failedresponse = $json['apiRegister_response']['ServiceErrors'][0]['ERRORDESCRIPTION'];
if(!$apiRegister_failedresponse){
  header("Location: ./success");
  $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
  foreach($cookies as $cookie) { 
    $parts = explode('=', $cookie); 
    $name = trim($parts[0]);
    setcookie($name, '', time()-1000);
    setcookie($name, '', time()-1000, '/'); 
  }
}else{
  $failedresponse = $json['apiRegister_response']['ServiceErrors'][0]['ERRORDESCRIPTION'];
}
}

$ProductGuid = "Telkom Funeral";
// User data to send using HTTP POST method in curl
$data = array('loc:ProductGuid'=>$ProductGuid);

// Data should be passed as json format
$data_json = json_encode($data);

// API URL to send data
$url = 'https://telkomtest.cloudcover.insure/apiGetProductInfo';

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
$plannameone = $json['api_response']['ProductPlans'][0]['PRODUCTPLANNAME'];
$plannametwo = $json['api_response']['ProductPlans'][1]['PRODUCTPLANNAME'];
$plannamethree = $json['api_response']['ProductPlans'][2]['PRODUCTPLANNAME'];
$plannamefour = $json['api_response']['ProductPlans'][3]['PRODUCTPLANNAME'];
$planone = $json['api_response']['ProductPlans'][0]['PRODUCTPLAN'];
$plantwo = $json['api_response']['ProductPlans'][1]['PRODUCTPLAN'];
$planthree = $json['api_response']['ProductPlans'][2]['PRODUCTPLAN'];
$planfour = $json['api_response']['ProductPlans'][3]['PRODUCTPLAN'];



/* Dropdowns */
$ch = curl_init();
$url = "https://telkomtest.cloudcover.insure/TelkomCloudCoverServices/apiListTitles/5";
$dataArray = array("s"=>'PHP CURL');
$data = http_build_query($dataArray);
$getUrl = $url."?".$data;
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_URL, $getUrl);
curl_setopt($ch, CURLOPT_TIMEOUT, 80);
 
$response = curl_exec($ch);
 
if(curl_error($ch)){
	echo 'Request Error:' . curl_error($ch);
}
else
{
    //echo $response;
    $xml=simplexml_load_string($response) or die("Error: Cannot create object");
    $array = json_decode(json_encode($xml), TRUE);

    $titlearray = $array['TitleQueue']['TITLE'];
}
 
curl_close($ch);
?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header border-0">
                <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                    <img src="img/Fill 67.png" class="w-36 h-36">
                </button>
                </div>
            <header>
        <div class="container text-center">
        <h4 class="f-34 l-36 l-s-m-2 blue-gray mb-3">Choose funeral cover for your specific needs.</h4>
        <p class="select-plan">Visit our portal or speak to our friendly call centre agents to decide on the funeral cover that’s right for you. </p>
        </div>
        </header>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
              <div class="text-center pb-4 pt-4 box2"><img src="img/Vector4.png" class=" pl-2 pt-2 w-88 cursor-default" alt="...">
          
               <p class="boxheadding1 mt-4"><a href="javascript:void(0)"><?php echo $plannameone; ?></a></p>
                <p class="lasttext1 pb-4">Cover for immediate family members.</p>
              </div>
            </div>
            <div class="col-md-3 col-md-3 col-sm-3 col-xs-3 ">
              <div class="text-center pb-4 pt-4 box2"><img src="img/Vector5.png" class=" pl-2 pt-2 w-88 cursor-default" alt="...">
              
                <p class="boxheadding1 mt-4"><a href="javascript:void(0)" ><?php echo $plannametwo; ?></a></p>
                  <p class="lasttext1">Funeral cover designed around the needs of the main member only.</p>
              </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3 ">
              <div class="text-center pb-4 pt-4 box2"><img src="img/Vector7.png" class=" pl-2 pt-2 w-88 cursor-default" alt="...">       
                <p class="boxheadding1  mt-4"><a href="javascript:void(0)" ><?php echo $plannamethree; ?></a></p>
                  <p class="lasttext1">Funeral Cover for the main member and their spouse. </p>
              </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
              <div class="text-center pb-4 pt-4 box2"><img src="img/Vector7.png" class=" pl-2 pt-2 w-88 cursor-default" alt="...">
        
                <p class="boxheadding1 mt-4"><a href="javascript:void(0)"><?php echo $plannamefour; ?></a></p>
                  <p class="lasttext1">Funeral Cover for the main member and their child.  </p>
              </div>
            </div>
          </div>
          <div >
          <div class="text-left"><img src="img/line.png" alt=""></div>
          <div class="text-left"><img src="img/Fill 86.png" alt="" class="img1"></div>
          <div class="text-right"><img src="img/line.png" alt=""></div>
          </div>
          <div> 
            <section class="divider mb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="main-divider">
                                <img src="img/Add.png" alt="" width="20">
                            </div>
                        </div>
                    </div>
                </div>
            </section>  
          <footer>
          <div class="well well-lg"><h6 class="f-18 l-31 l-s-m-1 azure-blue text-center font-strong">Extended Family Funeral Add on</h6></div>
          <p class="lasttext1 text-center f-16 l-24 l-s-m-02 blue-gray mb-83">The extended member option can be added to any funeral package.</p>
          </footer>
          </div>
        </div>
          </div>
        </div>
    </div>
    <!-- header-end -->
    
    <!-- apply_form_area -->
    <div class="form-container"></div>
    <div class="sessionvalues"></div>
    <div class="apply_form_area bg-blue">
        <div class="container">
        <?php
          if(isset($_POST['submit'])){ ?>
          <div class="card failedresponse color-white font-strong p-3 mb-3 border-0 bg-indianred"><?php echo $failedresponse; ?></div>
          <?php } ?>
                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                      <div class="stepwizard-step col-xs-3">
                        <a href="#step-1" type="button" class="btn-success f-24">01</a>
                        <p class="f-14 blue-gray"><small>Start my quote</small></p>
                      </div>
                      <div class="stepwizard-step col-xs-3">
                        <a href="#step-2" type="button" class="gray f-24" disabled="disabled">02</a>
                        <p class="f-14 blue-gray "><small>Quote datails</small></p>
                      </div>
                      <div class="stepwizard-step col-xs-3">
                        <a href="#step-3" type="button" class="gray f-24" disabled="disabled">03</a>
                        <p class="f-14 blue-gray"><small>Personal details</small></p>
                      </div>
                      <div class="stepwizard-step col-xs-3">
                        <a href="#step-4" type="button" class="gray f-24" disabled="disabled">04</a>
                        <p class="f-14 blue-gray" ><small>Dependent/s details</small></p>
                      </div>
                      <div class="stepwizard-step col-xs-3">
                        <a href="#step-5" type="button" class="gray f-24" disabled="disabled">05</a>
                        <p class="f-14 blue-gray"><small>Quote summary</small></p>
                      </div>
                      <div class="stepwizard-step col-xs-3">
                        <a href="#step-6" type="button" class="gray f-24" disabled="disabled">06</a>
                        <p class="f-14 blue-gray"><small>Payment</small></p>
                      </div>
                    </div>
                  </div>
                  <form role="form" method="post" id="getaquoteform" data-toggle="validator">
                    <div class="panel panel-primary setup-content mt-5" id="step-1">
                        <div class="panel-heading">
                            <h3 class="panel-title f-48 l-52 color-navy ls-0-minus-2">Get a funeral plan that<br>suits your needs</h3>
                            <p class="f-24 l-32 ls-0-1 blue-gray mt-5">Start your quote</p>
                            <h6 class="f-16 lh-23 ls-0-5 uppercase blue-gray mt-5">Select your funeral plan</h6>
                            <a href="javascript:void(0);" class="f-12 l-20 gray ls-0-1 blue font-strong" data-toggle="modal" data-target="#exampleModalCenter">Want to know a bit more?</a>
                            </div>
                            <div class="grid mt-5 mb-5 la-display-d">
  <label class="card">
    <input name="plan-desk" class="radiobutton plan plan-desk" type="radio" data-name="planA" value="<?php echo $plannameone; ?>" data-id="Telkom Funeral A" id="<?php echo $planone; ?>">
    
    <span class="plan-details">
      <img src="img/Vector.png" class="pl-2 pt-2 m-auto cursor-default" alt="...">
        <p class="boxheadding mb-4 mt-4 text-center"><span class="l-s-m-02 color-blue-gredient"><?php echo $plannameone; ?></span></p>
        <p class="lasttext">Cover for immediate family members.</p>
    </span>
  </label>
  <label class="card">
    <input name="plan-desk" class="radiobutton plan plan-desk" type="radio" data-name="planB" data-id="Telkom Funeral B" value="<?php echo $plannametwo; ?>" id="<?php echo $plantwo; ?>">
    <span class="hidden-visually">Pro - $50 per month, 5 team members, 500 GB per month, 5 concurrent builds</span>
    <span class="plan-details" aria-hidden="true">
      <img src="img/Vector1.png" class=" pl-2 pt-2 m-auto cursor-default" alt="...">
      
        <p class="boxheadding mb-4 mt-4 text-center"><span class="l-s-m-02 color-blue-gredient"><?php echo $plannametwo; ?></span></p>
          <p class="lasttext">Funeral cover designed around the needs of the main member only.</p>
    </span>
  </label>
  <label class="card">
    <input name="plan-desk" class="radiobutton plan plan-desk" type="radio" data-name="planC" data-id="Telkom Funeral C" value="<?php echo $plannamethree; ?>" id="<?php echo $planthree; ?>">
    <span class="hidden-visually">Business - $200 per month, 5+ team members, 1000 GB per month, Unlimited builds</span>
    <span class="plan-details" aria-hidden="true">
      <img src="img/Vector3.png" class=" pl-2 pt-2 m-auto cursor-default" alt="...">
       
        <p class="boxheadding mb-4 mt-4 text-center"><span class="l-s-m-02 color-blue-gredient"><?php echo $plannamethree; ?></span></p>
          <p class="lasttext">Funeral Cover for the main member and their spouse. </p>
    </span>
  </label>
  <label class="card">
    <input name="plan-desk" class="radiobutton plan plan-desk" type="radio" data-name="planD" data-id="Telkom Funeral D" value="<?php echo $plannamefour; ?>" id="<?php echo $planfour; ?>">
    <span class="hidden-visually">Business - $200 per month, 5+ team members, 1000 GB per month, Unlimited builds</span>
    <span class="plan-details" aria-hidden="true">
      <img src="img/Vector3.png" class=" pl-2 pt-2 m-auto cursor-default" alt="...">

        <p class="boxheadding mb-4 mt-4 text-center"><span class="l-s-m-02 color-blue-gredient"><?php echo $plannamefour; ?></span></p>
          <p class="lasttext">Funeral Cover for the main member and their child.</p>
    </span>
  </label>
</div>

<div class="la-display-m mb-5">
      <div class="container my-4 p-0">
        <hr class="my-4">
        <!--Carousel Wrapper-->
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
          <!--Controls-->
          <!--      <div class="controls-top">
        <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
        <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
      </div>-->
          <!--/.Controls-->
          <!--Indicators-->
          <ol class="carousel-indicators">
            <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
            <li data-target="#multi-item-example" data-slide-to="1"></li>
            <li data-target="#multi-item-example" data-slide-to="2"></li>
            <li data-target="#multi-item-example" data-slide-to="3"></li>
          </ol>
          <!--/.Indicators-->
          <!--Slides-->
          <div class="carousel-inner" role="listbox">
            <!--First slide-->
            <div class="carousel-item active">
              <div class="row">
                <div class="col-md-12">
				<label class="card">
                  <input name="plan" class="radiobutton plan plan-mobile" type="radio" data-name="planA" value="<?php echo $plannameone; ?>" data-id="Telkom Funeral A" id="<?php echo $planone; ?>">
					
					<span class="plan-details">
					  <img src="img/Vector.png" class="pl-2 pt-2 m-auto cursor-default" alt="...">
						<p class="boxheadding mb-4 mt-4 text-center"><span class="l-s-m-02 color-blue-gredient"><?php echo $plannameone; ?></span></p>
						<p class="lasttext">Cover for immediate family members.</p>
					</span>
					</label>
                </div>
              </div>
            </div>
            <!--/.First slide-->
            <!--Second slide-->
            <div class="carousel-item">
              <div class="row">
                <div class="col-md-12">
				<label class="card">
                  <input name="plan" class="radiobutton plan plan-mobile" type="radio" data-name="planB" data-id="Telkom Funeral B" value="<?php echo $plannametwo; ?>" id="<?php echo $plantwo; ?>">
    <span class="hidden-visually">Pro - $50 per month, 5 team members, 500 GB per month, 5 concurrent builds</span>
    <span class="plan-details" aria-hidden="true">
      <img src="img/Vector1.png" class=" pl-2 pt-2 m-auto cursor-default" alt="...">
      
        <p class="boxheadding mb-4 mt-4 text-center"><span class="l-s-m-02 color-blue-gredient"><?php echo $plannametwo; ?></span></p>
          <p class="lasttext">Funeral cover designed around the needs of the main member only.</p>
    </span>
		</label>
                </div>
              </div>
            </div>
            <!--/.Second slide-->
            <!--Third slide-->
            <div class="carousel-item">
              <div class="row">
                <div class="col-md-12">
				<label class="card">
                  <input name="plan" class="radiobutton plan plan-mobile" type="radio" data-name="planC" data-id="Telkom Funeral C" value="<?php echo $plannamethree; ?>" id="<?php echo $planthree; ?>">
    <span class="hidden-visually">Business - $200 per month, 5+ team members, 1000 GB per month, Unlimited builds</span>
    <span class="plan-details" aria-hidden="true">
      <img src="img/Vector3.png" class=" pl-2 pt-2 m-auto cursor-default" alt="...">
       
        <p class="boxheadding mb-4 mt-4 text-center"><span class="l-s-m-02 color-blue-gredient"><?php echo $plannamethree; ?></span></p>
          <p class="lasttext">Funeral Cover for the main member and their spouse. </p>
    </span>
		</label>
                </div>
              </div>
            </div>
            <!--/.Third slide-->
            <div class="carousel-item">
              <div class="row">
                <div class="col-md-12">
				<label class="card">
                  <input name="plan" class="radiobutton plan plan-mobile" type="radio" data-name="planD" data-id="Telkom Funeral D" value="<?php echo $plannamefour; ?>" id="<?php echo $planfour; ?>">
    <span class="hidden-visually">Business - $200 per month, 5+ team members, 1000 GB per month, Unlimited builds</span>
    <span class="plan-details" aria-hidden="true">
      <img src="img/Vector3.png" class=" pl-2 pt-2 m-auto cursor-default" alt="...">

        <p class="boxheadding mb-4 mt-4 text-center"><span class="l-s-m-02 color-blue-gredient"><?php echo $plannamefour; ?></span></p>
          <p class="lasttext">Funeral Cover for the main member and their child.</p>
    </span>
		</label>
                </div>
              </div>
              <!--/.Slides-->
            </div>
            <!--/.Carousel Wrapper-->
          </div>
        </div>
      </div>
    </div>
	<div class="bs-example">
      <div class="accordion row" id="accordionExample">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="headingOne">
          <div class="row bg-blue-gredient p-10 border-5x res-summary records_content mt-3 mb-4 la-display-m">
            <div class="col-12 mt-3">
              <div class="bg"></div>
            </div>		
			<div class="col-12 la-display-m p-0" style="margin-right:-20px;">
            <div class="card-header" data-toggle="collapse" data-target="#collapseOne" id="headingOne">
			              <h2 class="text-left f-24 l-36 ls-minus-2 color-white res-summary">Your policy summary</h2>

                <h2 class="mb-0 la-button-add">
                    <button type="button" class="btn btn-link " style="width:50px;"><img src="img/Add-white.png"></button>									
                </h2>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                  <div class="bg-policy">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="w-100">
                                        <img src="img/Fill85.png" class="center mt-5" style="width:70px;height: 70px;">
                                    </button>
                                    <p class="you-have1 mt-3">You have not yet selected a policy</p>
                                    <p class="build" style="padding-bottom:60px;text-align:center;">Build your quote by selecting a funeral plan that suits your needs.</p>
                                    <button class="btn callme-back col-md-11 col-sm-12 col-xs-12 uppercase azure-blue f-14 l-20 ls-0-5" onClick="redirect()">Call me back</button>
                                    <p class="text-light text-center assistance mt-3 pb-4">Need assistance? We’ll call you.</p>   
                                  </div>
                                </div>
                              </div>
                </div>
            </div>
			
          </div>
          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body"> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-8 col-sm-6 col-xs-12">
                                    <p class="cover f-16 l-23 ls-0-5 blue-gray uppercase">How much cover would you like?</p>
                                    <section class="radio">
                                        <div class="pl-0">
                                            <input type="radio" id="control_01" name="coveramount" data-name="R10" value="R10 000.00"<?php echo $coveramount == 'R10 000.00' ? ' checked="checked"' : '';?>> <label class="radio border-3x border-1-blue-gray" for="control_01"> <h2 class="f-10 l-15 uppercase blue-gray m-0">R 10 000</h2> </label>
                                        </div>
                                        <div>
                                            <input type="radio" id="control_02" name="coveramount" data-name="R20" value="R20 000.00"<?php echo $coveramount == 'R20 000.00' ? ' checked="checked"' : '';?>> <label class="radio border-3x border-1-blue-gray" for="control_02"> <h2 class="f-10 l-15 uppercase blue-gray m-0">R 20 000</h2> </label>
                                        </div>
                                        <div>
                                            <input type="radio" id="control_03" name="coveramount" data-name="R30" value="R30 000.00"<?php echo $coveramount == 'R30 000.00' ? ' checked="checked"' : '';?>> <label class="radio border-3x border-1-blue-gray" for="control_03"> <h2 class="f-10 l-15 uppercase blue-gray m-0">R 30 000</h2> </label>
                                        </div>
                                        <div>
                                            <input type="radio" id="control_04" name="coveramount" data-name="R50" value="R50 000.00" <?php echo $coveramount == 'R50 000.00' ? ' checked="checked"' : '';?>> <label class="radio border-3x border-1-blue-gray" for="control_04"> <h2 class="f-10 l-15 uppercase blue-gray m-0">R 50 000</h2> </label>
                                        </div>
                                        <div class="pr-0">
                                            <input type="radio" id="control_05" name="coveramount" data-name="R70" value="R70 000.00" <?php echo $coveramount == 'R70 000.00' ? ' checked="checked"' : '';?>> <label class="radio border-3x border-1-blue-gray" for="control_05"> <h2 class="f-10 l-15 uppercase blue-gray m-0">R 70 000</h2> </label>
                                        </div>
                                    </section>                                    
                                  <div class="mt-4">
                                    <div class="row mt-3">
                                        <div class="col-lg-3">
                                            <div class="wide">
                                                <label class="left f-12 l-17 m-0 color-grey ">Title</label>
                                                <div class="default-select title" id="default-select">
                                                  <select name="title" id="title">
                                                  <option value="">Select type</option>
                                                  <?php 
                                                  $result = array_filter($titlearray);                 
                                                  foreach($result as $title){ ?>
                                                  <option value="<?php echo $title; ?>"<?php echo $title == $sessiontitle ? ' selected="selected"' : '';?>><?php echo $title; ?></option>
                                                    <?php } ?>
                                                  </select>
                                                  <div class="help-block with-errors"></div>
                                                </div>
                                                        </div>
                                        </div>
                                         <div class="col-lg-4">
                                            
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-4">
                                            <div class="single_input">
                                                <div class="mt-10 wide form-group field">
                                                    <label class="left f-12 l-17  m-0 color-grey">Full name<span class="ml-2 color-red">*</span></label>
                                                    <input type="text" name="fname" id="fname" required="required" autocomplete="off" min="0" placeholder="First Name" class="single-input p-0 transparent-input" data-error="Please enter your full name." value="<?php echo isset($firstname) ? $firstname : ''; ?>">
                                                    <div class="color-red help-block with-errors"></div>
                                                </div>
                                             </div>
                                        </div>
                                         <div class="col-lg-4">
                                            <div class="single_input">
                                                <div class="mt-10 wide form-group">
                                                    <label class="left f-12 l-17  m-0 color-grey">Surname</label>
                                                    <input type="text" name="surname" required="required" id="surname" autocomplete="off" min="0" placeholder="Last Name" class="single-input p-0 transparent-input" value="<?php echo isset($surname) ? $surname : ''; ?>">
                                                    <div class="color-red help-block with-errors"></div>
                                                  </div>
                                             </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-4">
                                            <div class="single_input">
                                                <div class="mt-10 wide form-group field">
                                                    <label class="left f-12 l-17  m-0 color-grey">Contact number</label>
                                                    <input type="number" name="cnumber" id="cnumber" required="required" autocomplete="off" min="0" placeholder="Contact number" class="single-input p-0 transparent-input" value="<?php echo isset($cnumber) ? $cnumber : ''; ?>">
                                                    <div class="color-red help-block with-errors"></div>
                                                  </div>
                                             </div>
                                        </div>
                                         <div class="col-lg-3">
                                            <div class="wide">
                                                <label class="left f-12 l-17 m-0 color-grey ">Monthly income</label>
                                                <div class="default-select title" id="default-select">
                                                  <select name="income" id="income" >
                                                  <option value="R10 000.00"<?php echo $income == 'R10 000.00' ? ' selected="selected"' : '';?>>R10 000.00</option>
                                                  <option value="R20 000.00"<?php echo $income == 'R20 000.00' ? ' selected="selected"' : '';?>>R20 000.00</option>
                                                  <option value="R30 000.00"<?php echo $income == 'R30 000.00' ? ' selected="selected"' : '';?>>R30 000.00</option>
                                                  <option value="R50 000.00"<?php echo $income == 'R50 000.00' ? ' selected="selected"' : '';?>>R50 000.00</option>
                                                  <option value="R70 000.00"<?php echo $income == 'R70 000.00' ? ' selected="selected"' : '';?>>R70 000.00</option>
                                                  </select>
                                                </div>
                                                        </div>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                <div class="button-group-area mt-5">
                                <a href="javascript:void(0)" id="confirm" class="genric-btn success-border large w-50 bg-azure-blue nextBtn color-white border-3x mb-3 uppercase ls-0-5 font-strong">Confirm</a>
                                </div>
                                </div>
                                </div>
                                </div>
	  <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12 records_content la-display-d">
                                  <div class="bg-policy bg-blue-gredient">
                                    <p class="your-policy text-light text-center" style="font-size: 22px;line-height: 36px;letter-spacing: -2px;">Your policy summary</p>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="w-100">
                                        <img src="img/Fill85.png" class="center mt-5" style="width:70px;height: 70px;">
                                    </button>
                                    <p class="you-have1 mt-3">You have not yet selected a policy</p>
                                    <p class="build" style="padding-bottom:60px;text-align:center;">Build your quote by selecting a funeral plan that suits your needs.</p>
                                    <button class="btn callme-back col-md-11 col-sm-12 col-xs-12 uppercase azure-blue f-14 l-20 ls-0-5" onClick="redirect()">Call me back</button>
                                    <p class="text-light text-center assistance mt-3 pb-4">Need assistance? We’ll call you.</p>   
                                  </div>
                                </div>
    </div>
                    </div>
                    <div class="panel panel-primary setup-content mt-5" id="step-2">
                        <div class="panel-heading">
                            <div class="container responsesetptwo"></div>
                            <div class="container button-group-area mt-5">
                                    <a href="javascript:void(0)" class="genric-btn color-azure-blue border-azure-blue large w-17 preBtn font-strong border-3x uppercase">Back</a>
                                    <a href="javascript:void(0)" class="genric-btn success-border large w-17 bg-azure-blue nextBtn color-white font-strong uppercase border-3x mb-3">Next</a>
                                    </div>
                              </div>
                    </div>
                    <!-- step3 -->
                          <div class="panel panel-primary setup-content mt-5" id="step-3">
                            <div class="panel-body">
                            <div class="container responsesetpthree"></div>
                            <div class="container button-group-area mt-5">
                                            <a href="javascript:void(0)" class="genric-btn color-azure-blue border-azure-blue large preBtn w-17 font-strong border-3x uppercase">Back</a>
                                            <a href="javascript:void(0)" class="genric-btn success-border large w-17 bg-azure-blue nextBtn color-white font-strong border-3x mb-3 submitregistration uppercase">Next</a>
                                            </div> 
                            
                            </div>
                             
                          </div>

                          <div class="panel panel-primary setup-content mt-5" id="step-4">
                          <div class="panel-body">
                            <div class="container responsesetpfour"></div>
                            <div class="container button-group-area mt-5">
                                            <a href="javascript:void(0)" class="genric-btn color-azure-blue border-azure-blue large preBtn w-17 font-strong border-3x uppercase">Back</a>
                                            <a href="javascript:void(0)" class="genric-btn success-border large w-17 bg-azure-blue nextBtn color-white font-strong border-3x mb-3 submitregistration uppercase">Next</a>
                                            </div> 
                            
                            </div>
                          </div>
                          <div class="panel panel-primary setup-content mt-5" id="step-5">
                          <div class="panel-body">
                            <div class="container responsesetpfive"></div>
                            <div class="button-group-area mt-5">
                                            <a href="javascript:void(0)" class="genric-btn color-azure-blue border-azure-blue large preBtn w-17 font-strong border-3x uppercase">Back</a>
                                            <a href="javascript:void(0)" class="genric-btn success-border large w-17 bg-azure-blue nextBtn color-white font-strong border-3x mb-3 submitregistration uppercase">Next</a>
                                            </div> 
                            
                            </div>
                            
                          </div>
                          <div class="panel panel-primary setup-content mt-5" id="step-6">
                          <div class="panel-body">
                            <div class="container responsesetpsix"></div>
                            <div class="container button-group-area mt-5">
                                            <a href="javascript:void(0)" class="genric-btn color-azure-blue border-azure-blue large preBtn w-17 font-strong border-3x uppercase">Back</a>
                                            <input type="submit" name="submit" value="Confirm" class="genric-btn success-border large w-17 bg-azure-blue nextBtn color-white font-strong border-3x mb-3 uppercase">
                                            </div>
                            
                            </div>
                            
                          </div>
                        </div>
                        
                    </div>
                    
                  </form>
        </div>
    </div>
    <!--/ apply_form_area -->
<!-- link that opens popup -->
    <!-- JS here -->
    <?php include('footer.php'); ?>
    <script>
        $(document).ready(function () {

  function numberOnly(input) {
  var regex = /[^0-9]/gi;
  input.value = input.value.replace(regex, "");
  }
var navListItems = $('div.setup-panel div a'),
    allWells = $('.setup-content'),
    allNextBtn = $('.nextBtn');
    allPreBtn = $('.preBtn');

allWells.hide();

navListItems.click(function (e) {
    e.preventDefault();
    var $target = $($(this).attr('href')),
        $item = $(this);

    if (!$item.hasClass('disabled')) {
        navListItems.removeClass('btn-success').addClass('gray');
        $item.addClass('btn-success');
        allWells.hide();
        $target.show();
        //$target.find('input:eq(0)').focus();
    }
});

allNextBtn.click(function () {
    var curStep = $(this).closest(".setup-content"),
        curStepBtn = curStep.attr("id"),
        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
        curInputs = curStep.find("input[type='text'],select"),
        isValid = true;

    $(".form-group").removeClass("has-error");
    for (var i = 0; i < curInputs.length; i++) {
        if (!curInputs[i].validity.valid) {
            isValid = false;
            $(curInputs[i]).closest(".form-group").addClass("has-error");
            $(curInputs[i]).prev('label').addClass("color-red");
            //$(".focus").focus();
        }
    }

    if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
});
allPreBtn.click(function () {
    var curStep = $(this).closest(".setup-content"),
        curStepBtn = curStep.attr("id"),
        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a"),
        curInputs = curStep.find("input[type='text'],input[type='url']"),
        isValid = true;

    $(".form-group").removeClass("has-error");
    for (var i = 0; i < curInputs.length; i++) {
        if (!curInputs[i].validity.valid) {
            isValid = false;
            $(curInputs[i]).closest(".form-group").addClass("has-error");
        }
    }

    if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
});

$('div.setup-panel div a.btn-success').trigger('click');
});
  

    $(document).ready(function() { 
        $('[data-toggle="tooltip"]').tooltip(); 
    });  
</script> 
<script>
const dataList = document.getElementById('dataList');
const input = document.getElementById('autoComplete');

const sectors = ["1240 John Vorster Dr, Irene, Centurion",
"1236 John Vorster Dr, Irene, Centurion",
"1237 John Vorster Dr, Irene, Centurion",
"1238 John Vorster Dr, Irene, Centurion",
"1240 John Vorster Dr, Irene, Centurion",
"1241 John Vorster Dr, Irene, Centurion",
"1243 John Vorster Dr, Irene, Centurion",
"1244 John Vorster Dr, Irene, Centurion",
"1246 John Vorster Dr, Irene, Centurion",
"1245 John Vorster Dr, Irene, Centurion",
"1248 John Vorster Dr, Irene, Centurion",
"1258 John Vorster Dr, Irene, Centurion",
"1254 John Vorster Dr, Irene, Centurion",
"1250 John Vorster Dr, Irene, Centurion"];
sectors.sort();

for (let i = 0; i < sectors.length; ++i) {
  const option = document.createElement('option');
  option.setAttribute('value', sectors[i]);
  option.innerHTML = sectors[i];
  dataList.appendChild(option);
}

dataList.querySelectorAll('option').forEach((el, idx, arr) => {
  el.addEventListener('click', (e) => {
    input.value = el.value;
  });
});

input.addEventListener('focus', showList);

input.addEventListener('blur', () => {
    $('#listitems').show();
        $('#city').val(this.value);
        $('#province').val(this.value); 
        $('#code').val(this.value);
  setTimeout(() => {
    dataList.classList.remove('show');
  }, 300);
});

input.addEventListener('keyup', showList);

function showList() {
  if (!!input.value) {
    input.setAttribute("list", "dataList");
    dataList.classList.remove('show');
  } else {
    input.removeAttribute("list");
    dataList.classList.add('show');
  }
}

input.addEventListener('change', () => {
  if(!dataList.querySelector(`option[value='${input.value}']`)) {
    input.value = '';
  } else {
    input.blur();
  }
});

</script>
<script>
  var sessionplan = $.session.get('checkedplan');
  if(sessionplan){
  $("input[name='plan'][data-name=" + sessionplan + "]").prop("checked", true);
  $("input[name='plan-desk'][data-name=" + sessionplan + "]").prop("checked", true);
  $.post("readRecords.php", {
    plan: $.session.get('plan'),
    planname: $.session.get('planname'),
    option: $.session.get('option')
    }, function (data, status) {
    $(".records_content").html(data);
    $("#confirm").text('Next');

  }); 
  $.post("readStepTwo.php", {
    plan: $.session.get('plan'),
    planname: $.session.get('planname'),
    option: $.session.get('option')
  }, function (data, status) {
  $(".responsesetptwo").html(data);
  }); 
  $.post("readStepThree.php", {
    plan: $.session.get('plan'),
    planname: $.session.get('planname'),
    option: $.session.get('option')
  }, function (data, status) {
  $(".responsesetpthree").html(data);
  }); 
  $.post("readStepfour.php", {
    plan: $.session.get('plan'),
    planname: $.session.get('planname'),
    option: $.session.get('option')
  }, function (data, status) {
  $(".responsesetpfour").html(data);
  }); 
  $.post("readStepSix.php", {
    plan: $.session.get('plan'),
    planname: $.session.get('planname'),
    option: $.session.get('option')
  }, function (data, status) {
  $(".responsesetpsix").html(data);
  });
  $.post("readStepFive.php", {
    plan: $.session.get('plan'),
    planname: $.session.get('planname'),
    option: $.session.get('option')
  }, function (data, status) {
  $(".responsesetpfive").html(data);
  });
}

$(".plan").on("click",function(e){ //on add input button click

var plan = $(this).attr('id');
// document.cookie = 'planchecked='+plan+'; path=/;';
var planname = $(this).val();
var optionvalue = $(this).attr('data-id');
var checked = $(this).attr('data-name');
$.post("readRecords.php", {
plan: plan,
planname: planname,
option: optionvalue
}, function (data, status) {
  $.session.set('plan',plan);
  $.session.set('planname',planname);
  $.session.set('option',optionvalue);
  $.session.set('checkedplan',checked);
$(".records_content").html(data);
$("#confirm").text('Next');

}); 
$.post("readStepTwo.php", {
plan: plan,
planname: planname,
option: optionvalue
}, function (data, status) {
$(".responsesetptwo").html(data);
}); 
$.post("readStepThree.php", {
plan: plan,
planname: planname,
option: optionvalue
}, function (data, status) {
$(".responsesetpthree").html(data);
}); 
$.post("readStepfour.php", {
plan: plan,
planname: planname,
option: optionvalue
}, function (data, status) {
$(".responsesetpfour").html(data);
}); 
$.post("readStepFive.php", {
plan: plan,
planname: planname,
option: optionvalue
}, function (data, status) {
$(".responsesetpfive").html(data);
});          
$.post("readStepSix.php", {
plan: plan,
planname: planname,
option: optionvalue
}, function (data, status) {
$(".responsesetpsix").html(data);
});          
});

</script>
<script>
$(document).ready(function () {
        setTimeout(function () {
          $(".failedresponse").fadeOut('normal');
        }, 5000);
});
</script>
<script type="text/javascript">
  function redirect()
  {
  window.location.href = "./thankyou";
  }
</script>
<script>
  $(document).ready(function(){
  $(".nextBtn").click(function(){
    var quoteform = $('#getaquoteform').serializeArray();
    $.post("maingetaQuote.php", {
    json_data: quoteform
    }, function (data, status) {
    $(".sessionvalues").html(data);
    });
  });
   // if ($(window).width() <= 767) {
	   // $(".plan-mobile").attr("disabled");
	   // $(".plan-desk").attr("enabled");
   // }else{
	   // $(".plan-mobile").attr("enabled");
		// $(".plan-desk").attr("disabled");
   // }
 });
</script>