<link rel="stylesheet" href="css/nice-select.css">
<?php 
session_start();
$ProductGuid = "Telkom Funeral";
$plan = $_POST['plan'];
$planname = $_POST['planname'];
$option = $_POST['option'];
if(isset($_SESSION['json_data_array'])){
$sessionarray = $_SESSION['json_data_array'];
for($i=0;$i<count($sessionarray); $i++){
switch ($sessionarray[$i]['name']) {
  case "c_title":
    $client_title = $sessionarray[$i]['value'];
    break;
  case "c_firstname":
    $client_firstname = $sessionarray[$i]['value'];
    break;
  case "c_surname":
    $client_surname = $sessionarray[$i]['value'];
    break;
  case "c_idnumber":
    $client_idnumber = $sessionarray[$i]['value'];
    break;
  case "c_marital":
    $client_marital = $sessionarray[$i]['value'];
    break;
  case "c_contactnumber":
    $client_contactnumber = $sessionarray[$i]['value'];
    break;
  case "c_email":
    $client_email = $sessionarray[$i]['value'];
    break;
  case "c_address":
    $client_address = $sessionarray[$i]['value'];
    break;
  case "b_relationship":
    $beneficiary_relationship = $sessionarray[$i]['value'];
    break;
  case "b_firstname":
    $beneficiary_firstname = $sessionarray[$i]['value'];
    break;
  case "b_surname":
    $beneficiary_surname = $sessionarray[$i]['value'];
    break;
  case "b_idnumber":
    $beneficiary_idnumber = $sessionarray[$i]['value'];
    break;
  case "b_email":
    $beneficiary_email = $sessionarray[$i]['value'];
    break;
  case "b_contactnumber":
    $beneficiary_contactnumber = $sessionarray[$i]['value'];
    break;
  case "b_altcontactnumber":
    $beneficiary_altcontactnumber = $sessionarray[$i]['value'];
    break;
  default:
    //echo "Your favorite color is neither red, blue, nor green!";
}
}
}
$data_json = '{
	"apiGetQuoteInput" : {
	  "PRODUCT" : "'.$ProductGuid.'",
	  "PLAN" : "'.$plan.'",
	  "OPTION" : "'.$option.'"
	},
	"apiExentedFmilyInput" : [
	  {
		"AGE" : 30,
		"PRODUCTOPTION" : "'.$option.'"
	  }
	]
  }';

// API URL to send data
$url = 'https://telkomtest.cloudcover.insure/apiGetTelkomFuneralQuote';

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
$plan = $json['api_response']['apiGetQuoteOutPut']['PLAN'];
$premium = $json['api_response']['apiGetQuoteOutPut']['PREMIUM'];
$benfitamount = $json['api_response']['apiGetQuoteOutPut']['SUMINSURED'];
//print_r($json);


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


/* Dropdowns */
$ch = curl_init();
$url = "https://telkomtest.cloudcover.insure/apiListRelationships";
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

    $relationshiparray = $array['RelationshipQueue']['RELATIONSHIP'];
}
 
curl_close($ch);
?>
<div class="la-pagination la-display-m mb-5">
                  <div class="container">
                  <div class="row">
                    <ul class="pagination pg-blue col-12 p-0">
                      <li class="page-item col-7 p-0">
                        <a href="#" class="page-link la-page-l uppercase" aria-label="Previous">
                          <span aria-hidden="true"> <!--&laquo;--><img src="img/icn_arrow_left_10-blue.png"> 03 </span>
                          <span class="sr-only">Previous</span>
                        </a><span class="uppercase f-14 l-20 ls-0-5">Personal details</span>
                      </li>

                      <li class="page-item col-5 p-0">
                        <a class="page-link la-page-l" aria-label="Next">
                          <span aria-hidden="true">step 3 of 6 <img src="img/icn_arrow_right_10-blue.png"> <!--&raquo;--></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                  
                  </div>
                  </div>
<div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <div class="content">
                                            <div class="tool">
                                                <h3 class="tooltip--triangle panel-title f-48 l-52 color-navy ls-0-minus-2">Your personal details</h3>
                                                <div class="tooltip">
                                                    <div class="row">
                                                    <div class="col-md-2 mt-2">
                                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.5231 16.2059C4.29272 16.2059 0.863525 12.7767 0.863525 8.54629C0.863525 4.31591 4.29272 0.886719 8.5231 0.886719C12.7535 0.886719 16.1827 4.31591 16.1827 8.54629C16.1827 12.7767 12.7535 16.2059 8.5231 16.2059ZM8.52319 0.121094C3.87 0.121094 0.0976562 3.89382 0.0976562 8.54663C0.0976562 13.1998 3.87 16.9722 8.52319 16.9722C13.1764 16.9722 16.9487 13.1998 16.9487 8.54663C16.9487 3.89382 13.1764 0.121094 8.52319 0.121094ZM9.36131 4.33057C9.06412 4.33057 8.80906 4.42669 8.5965 4.61933C8.38357 4.81197 8.2771 5.04367 8.2771 5.31482C8.2771 5.58597 8.38357 5.81652 8.5965 6.00725C8.80906 6.19797 9.06412 6.29333 9.36131 6.29333C9.6585 6.29333 9.9128 6.19797 10.1238 6.00725C10.3345 5.81652 10.4402 5.58597 10.4402 5.31482C10.4402 5.04367 10.3345 4.81197 10.1238 4.61933C9.9128 4.42669 9.6585 4.33057 9.36131 4.33057ZM9.64831 12.0002C9.41393 12.0002 9.24886 11.9626 9.1535 11.8876C9.05814 11.8125 9.01065 11.672 9.01065 11.4652C9.01065 11.3828 9.02559 11.2618 9.05508 11.1013C9.08418 10.9412 9.1175 10.7984 9.15427 10.6735L9.60695 9.11711C9.65099 8.97464 9.68125 8.81762 9.69772 8.64681C9.71418 8.47524 9.72261 8.35613 9.72261 8.28796C9.72261 7.96013 9.60389 7.69358 9.3672 7.4883C9.13014 7.28341 8.79312 7.18115 8.35614 7.18115C8.11372 7.18115 7.85635 7.2229 7.58444 7.30677C7.31252 7.39026 7.02797 7.49136 6.7304 7.60894L6.60938 8.09034C6.69746 8.05817 6.80316 8.02447 6.92686 7.98847C7.0498 7.95285 7.17044 7.93524 7.28801 7.93524C7.52737 7.93524 7.68899 7.97468 7.77363 8.05281C7.85827 8.13132 7.90078 8.27034 7.90078 8.47026C7.90078 8.58056 7.88699 8.70273 7.85942 8.83639C7.83184 8.96966 7.79776 9.11213 7.75716 9.26149L7.30257 10.8233C7.26235 10.9872 7.23286 11.1346 7.21448 11.2649C7.19648 11.3943 7.18729 11.5222 7.18729 11.6471C7.18729 11.968 7.30908 12.2326 7.55303 12.4414C7.79699 12.6497 8.13937 12.7539 8.57942 12.7539C8.86589 12.7539 9.11712 12.7175 9.3335 12.6443C9.55027 12.5716 9.8398 12.4651 10.2032 12.3261L10.3243 11.8447C10.2622 11.8734 10.1611 11.906 10.0221 11.9439C9.88269 11.9814 9.75823 12.0002 9.64831 12.0002Z" fill="#008FE0"/>
                                                            </svg>                                                            
                                                    </div>
                                                    <div class="col-md-10">
                                                        <p class="azure-blue f-12 l-20 ls-0-1">This is where we can give a helpful tip on how to get the most out of our services. </p>
                                                    </div>
                                                    </div>
                                                    </div>
                                               </div>
                                        <h6 class="f-16 lh-23 ls-0-5 uppercase blue-gray mt-5">WE NEED A FEW MORE DETAILS</h6>
                                        <p class="f-12 lh-20 ls-0-1 gray">We'll keep all your information safe and won't share it with anyone.</p>
                                        <p class="f-12 l-17 gray mt-4 mb-0">Do you intend on replacing any existing funeral cover with this cover?</p>
                                        <p class="f-12 l-20 gray ls-0-1">what is this?</p>
                                    <div class="button-group-area">
                                        <a href="javascript:void(0)" class="genric-btn border-gray large py-0 rounded w-25 font-strong border-15x color-gray">Yes</a>
                                        <a href="javascript:void(0)" class="genric-btn btn-outline-primary py-1 border-gray w-25 font-strong border-3x color-gray">No</a></div>
                                        </div>
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 la-display-m" id="headingThree">
<div class="row bg-blue-gredient p-10 border-5x res-summary mt-3 mb-4">
<div class="col-12 mt-3">
              <div class="bg"></div>
            </div>
<div class="col-8">
<h2 class="text-left f-24 l-36 ls-minus-2 color-white res-summary"> 
	<button type="button" class="p-0 text-left f-24 l-36 ls-minus-2 color-white res-summary btn btn-link text-decoration-none" data-toggle="collapse" data-target="#collapseThree" style="text-decoration:none;">Your policy summary</button>
</h2>
</div>
<div class="col-4 text-right">
	<label class="color-white f-20 l-50 ls-0-56 font-strong m-0"><?php echo $premium; ?></label>
</div>
<div class="col-12 text-right">
	<label class="color-white f-14 l-22 ls-0-18 res-premiun">monthly premium</label>
</div>
<div id="collapseThree" class="col-12 collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="col-12 text-left card-body p-1">
                    <p>
						<div class="col-12 bg-gray pl-30 pt-10 pb-2 mb-20 text-left">
                                    <label class="color-white f-30 l-50 ls-0-56 font-strong"><?php echo $premium; ?></label>
                                    <p class="f-10 l-15 color-white ls-15 uppercase">your total monthly premium</p>
                                  </div>   
								  <p class="f-14 lh-22 ls-0-18"><?php echo $planname; ?></p>
                                  <label class="f-14 lh-22 ls-0-18 color-white w-100">Spouse: 1</label>
                                  <label class="f-14 lh-22 ls-0-18 color-white w-100">Children: 2</label>
                                  <hr class="border-white-top">
                                  <div class="row">
                                    <div class="col-6">
                                    <p class="f-12 lh-15 family-strong uppercase mb-0">Basic premium</p>
                                    </div>
                                    <div class="col-6 text-right">
                                      <label class="f-14 lh-28 ls-0-21 color-white family-strong"><?php echo $premium; ?></label>
                                    </div>
                                  </div>
								  <hr class="border-white-top">
                                  <p class="uppercase f-12 lh-15 family-strong mb-0">Benefit amount</p>
                                  <label class="f-37 lh-54 font-strong color-white"><?php echo $benfitamount; ?></label>
                                  <div class="extendedfamilyresponse"></div>
                                  <a href="#" class="genric-btn info bold-letters get-a-quote width-full azure-blue bg-white mt-3 pt-10 pb-10 uppercase" onClick="redirect()">give me a call</a>
                                  <p class="wow text-center f-14 mt-2 animated animated animated animated animated animated" style="visibility: visible;">Need assistance? We'll call you.</p>
                                </div>
                                </div>
</div>
</div>
                                        <div class="form mb-4">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                  <div class="mt-10 wide">
                                                <label class="left f-12 l-17 m-0 color-grey mt-4">Title</label>
                                                <div class="default-select title" id="default-select">
                                                <select name="c_title" id="c_title">
                                                  <option value="">Select Type</option>
                                                  <?php 
                                                  $result = array_filter($titlearray);                 
                                                  foreach($result as $title){ ?>
                                                   <option value="<?php echo $title; ?>"<?php echo $title == $client_title ? ' selected="selected"' : '';?>><?php echo $title; ?></option>
                                                    <?php } ?>
                                                  </select>
                                                </div>
                                                        </div>
                                                  
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                      
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4">Full name</label><input type="text" id="c_firstname" name="c_firstname" autocomplete="off" min="0" placeholder="Full Name" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'FullName'"  class="single-input p-0 transparent-input" value="<?php echo isset($client_firstname) ? $client_firstname : ''; ?>">
                                                        </div>
                                                
                                                     </div>
                                                </div>
                                                 <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17  m-0 color-grey mt-4">Surname</label>
                                                            <input type="text" name="c_surname" id="c_surname" autocomplete="off" min="0" placeholder="Surname" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Surname'"  class="single-input p-0 transparent-input" value="<?php echo isset($client_surname) ? $client_surname : ''; ?>">
                                                        </div>
                                                     </div>
                                                </div>
                                            </div>
                                                <div class="row">
                                                <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                        <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4">ID Number</label><input type="number" id="c_idnumber" name="c_idnumber" autocomplete="off" min="0" placeholder="eg.961008005008" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'IDNumber'"  class="single-input p-0 transparent-input" value="<?php echo isset($client_idnumber) ? $client_idnumber : ''; ?>">
                                                       
                                                        </div>
                                                    </div>
                                                     </div>
                                                </div>
                                                 <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17  m-0 color-grey mt-4 pl-0">Marital Status</label>  
                                                            <div class="default-select  title" id="default-select">
                                                            <select name="c_marital" id="c_marital">
                                                            <option value="single"<?php echo $client_marital == 'single' ? ' selected="selected"' : '';?>>Single</option>
                                                            <option value="married"<?php echo $client_marital == 'married' ? ' selected="selected"' : '';?>>Married</option>
                                                            <option value="widow"<?php echo $client_marital == 'widow' ? ' selected="selected"' : '';?>>Widow</option>
                                                  </select>
                                                        </div></div>
                                                     </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                             <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4">Cell phone number</label><input type="number" id="c_contactnumber" name="c_contactnumber" autocomplete="off" min="0" placeholder="082 722 9389" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Contact Number'"  class="single-input p-0 transparent-input" value="<?php echo isset($client_contactnumber) ? $client_contactnumber : ''; ?>">
                                                        </div>
                                                     </div>
                                                </div>
                                             <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4">Email Address</label><input type="email" id="c_email" name="c_email" autocomplete="off" min="0" placeholder="eg. stefan@yourmail.com" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Email Address'"  class="single-input p-0 transparent-input" value="<?php echo isset($client_email) ? $client_email : ''; ?>">
                                                        </div>
                                                     </div>
                                                </div>
                                            
                                        </div>
                                        <div class="row">	
                                         <div class="col-lg-12 mt-4">
                                         <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4" for="addres">Address</label><input type="text" id="c_address" name="c_address" list="addresses" id="autoComplete" autocomplete="off" placeholder="Start typing" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Start typing'"  class="single-input p-0 transparent-input" value="<?php echo isset($client_address) ? $client_address : ''; ?>">
                                                            <datalist id="dataList">
                                                        </div>
                                                        <div id="listitems" style='display:none'>
                                                            <div class="row">
                                                                <div class="col-lg-6 mt-4">
                                                                  
                                                                        <div class="single_input">
                                                                        <div class="mt-10 wide">
                                                                            <label class="left f-12 l-17 m-0 color-grey mt-4">City</label><input type="text" name="c_city" id="c_city" autocomplete="off" min="0" placeholder="City" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'City'"  class="single-input p-0 transparent-input" value="<?php echo isset($client_city) ? $client_city : ''; ?>">
                                                                        </div>
                                                                   
                                                                     </div>
                                                                </div>
                                                                 <div class="col-lg-6 mt-4">
                                                                    <div class="single_input">
                                                                        <div class="mt-10 wide">
                                                                            <label class="left f-12 l-17  m-0 color-grey mt-4">Province</label><input type="text" id="c_province" name="c_province" autocomplete="off" min="0" placeholder="Province" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Province'"  class="single-input p-0 transparent-input" value="<?php echo isset($client_province) ? $client_province : ''; ?>">
                                                                        </div>
                                                                     </div>
                                                                </div></div>
                                                                <div class="row">
                                                                    <div class="col-lg-6 mt-4">
                                                                        <div class="single_input">
                                                                            <div class="mt-10 wide">
                                                                                <label class="left f-12 l-17  m-0 color-grey mt-4">Code</label><input type="text" name="c_code" id="c_code" autocomplete="off" min="0" placeholder="Code" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Code'"  class="single-input p-0 transparent-input" value="<?php echo isset($client_code) ? $client_code : ''; ?>">
                                                                            </div>
                                                                         </div>
                                                                    </div></div>
                                                        
                                                        </div>
                                                    </div>
                                         
                                         </div>
                                           </div>   
                                           
                                       <div class="my-3">
                                        <hr class="mt-73 border-top-columbia-blue"><h6 class='blue-gray f-16 lh-23 ls-0-5 uppercase '>ADD A BENEFICIARY</h6>
                                        <small class='color-grey lh-20 f-12 l-s-m-1'>This is the person who will receive your funeral cover payout.</small>
                                    </div>
                                        <div class="row">
                                        <div class="col-md-9">
                                        <div class="mt-10 wide">
                                        <label class="left f-12 l-17 m-0 color-grey mt-4">Beneficiart relationship</label>
                                        <div class="col-sm-5 pl-0">
                                        <div class="default-select  title" id="default-select">
                                            <select name="b_relationship" id="b_relationship">
                                                  <option value="">Select Type</option>
                                                  <?php 
                                                  foreach($relationshiparray as $relationship){ ?>
                                                  <option value="<?php echo $relationship; ?>"<?php echo $relationship == $beneficiary_relationship ? ' selected="selected"' : '';?>><?php echo $relationship; ?></option>
                                                    <?php } ?>
                                                  </select>
                                         </div>
                                         </div>
                                         </div>
                                        </div>
                                        </div>	
                                        <div class="row">
                                                <div class="col-lg-6 mt-4">
                                                  
                                                        <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4">Full name</label><input type="text" id="b_firstname" name="b_firstname" autocomplete="off" min="0" placeholder="Full Name" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'FullName'"  class="single-input p-0 transparent-input" value="<?php echo isset($beneficiary_firstname) ? $beneficiary_firstname : ''; ?>">
                                                        </div>
                                                   
                                                     </div>
                                                </div>
                                                 <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17  m-0 color-grey mt-4">Surname</label><input type="text" id="b_surname" name="b_surname" autocomplete="off" min="0" placeholder="Surname" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Surname'"  class="single-input p-0 transparent-input" value="<?php echo isset($beneficiary_surname) ? $beneficiary_surname : ''; ?>">
                                                        </div>
                                                     </div>
                                                </div>
                                            </div>
                                                <div class="row">
                                                <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                        <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4">ID Number</label><input type="number" id="b_idnumber" name="b_idnumber" autocomplete="off" min="0" placeholder="eg.961008005008" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'IDNumber'"  class="single-input p-0 transparent-input" value="<?php echo isset($beneficiary_idnumber) ? $beneficiary_idnumber : ''; ?>">
                                                       
                                                        </div>
                                                    </div>
                                                     </div>
                                                </div>
                                             <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4">Email Address</label><input type="text" id="b_email" name="b_email" autocomplete="off" min="0" placeholder="eg. stefan@yourmail.com" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Email Address'"  class="single-input p-0 transparent-input" value="<?php echo isset($beneficiary_email) ? $beneficiary_email : ''; ?>">
                                                        </div>
                                                     </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                             <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4">Cell phone number</label><input type="number" id="b_contactnumber" name="b_contactnumber" autocomplete="off" min="0" placeholder="Contact Number" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Contact Number'"  class="single-input p-0 transparent-input" value="<?php echo isset($beneficiary_contactnumber) ? $beneficiary_contactnumber : ''; ?>">
                                                        </div>
                                                     </div>
                                                </div>
                                             <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4">Alternative contact number</label><input type="number" id="b_altcontactnumber" name="b_altcontactnumber" autocomplete="off" min="0" placeholder="Contact Number" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Contact Number'"  class="single-input p-0 transparent-input" value="<?php echo isset($beneficiary_altcontactnumber) ? $beneficiary_altcontactnumber : ''; ?>">
                                                        </div>
                                                     </div>
                                                </div>
                                            
                                        </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="col-md-4 la-display-d">
                                        <div class="pad bg-blue-gredient p-30 border-5x">
                                        <h2 class="text-left f-24 l-36 mb-15">Your policy summary</h2>
                                        <div class="bg-gray pl-30 pt-10 pb-2 mb-20">
                                            <label class="color-white f-30 l-50 ls-0-56 font-strong"><?php echo $premium; ?></label>
                                            <p class="f-10 l-15 color-white ls-15 uppercase">your total monthly premium</p>
                                        </div>
                                        <p class="f-14 lh-22 ls-0-18"><?php echo $planname; ?></p>
                                        <label class="f-14 lh-22 ls-0-18 color-white w-100">Spouse: 1</label>
                                        <label class="f-14 lh-22 ls-0-18 color-white w-100">Children: 2</label>
                                        <hr class="border-white-top">
                                        <div class="row">
                                            <div class="col-sm-6">
                                            <p class="f-12 lh-15 family-strong uppercase mb-0">Basic premium</p>
                                            </div>
                                            <div class="col-sm-6 text-right">
                                            <label class="f-14 lh-28 ls-0-21 color-white family-strong"><?php echo $premium; ?></label>
                                            </div>
                                        </div>
                                        <hr class="border-white-top">
                                        <p class="uppercase f-12 lh-15 family-strong mb-0">Benefit amount</p>
                                        <label class="f-37 lh-54 font-strong color-white"><?php echo $benfitamount; ?></label>
                                  <a href="#" class="genric-btn info bold-letters get-a-quote width-full azure-blue bg-white mt-3 pt-10 pb-10 uppercase" onClick="redirect()">give me a call</a>
                                                <p class="wow text-center f-14 mt-2">Need assistance? We'll call you.</p>
                                        </div>
                                    </div>
                                    </div>

    <script src="js/main.js"></script>
    
    <script>
    // $(document).ready(function() {
    //     $(".submitregistration").on("click",function(e){
    //         var title = $("#title").val();
    //         var surname = $("#sur_name").val();
    //         var name = $("#name").val();
    //         var idnumber = $("#id_number").val();
    //         var marital = $("#marital").val();
    //         var cellnumber = $("#cell_number").val();
    //         var email = $("#email").val();
    //         var address = $("#address").val();
    //         var inputdata = {
    //                 "ClientIn" : {
    //                     "CLIENTGUID" : "WIIKCYCWMWNUABTGIBNQ",
    //                     "MANUALCODE" : "051",
    //                     "TITLE" : title,
    //                     "INITIALS" : "B",
    //                     "FIRSTNAMES" : name,
    //                     "SURNAME" : surname,
    //                     "IDNUMBER" : idnumber,
    //                     "CELLPHONE" : cellnumber,
    //                     "EMAIL" : email,
    //                     "HOMETEL" : cellnumber,
    //                     "WORKTEL" : cellnumber,
    //                     "FAXNO" : "0814766227",
    //                     "POSTALADDRESS" : address,
    //                     "RESIDENTIALADDRESS" : address,
    //                     "LANGUAGE" : "English",
    //                     "DATEOFBIRTH" : "1981-03-17",
    //                     "SEX" : "FeMale",
    //                     "EMAILVERIFIED" : "0",
    //                     "OCCUPATION" : "selfemployed",
    //                     "PASSPORTNUMBER" : "311213123"
    //                 }
    //                 };
    //         var jsondata = JSON.stringify(inputdata);
    //         $.ajax({
    //         type: "POST",
    //         url: "https://telkomtest.cloudcover.insure/apiRegister",
    //         contentType: 'application/json',
    //         data: jsondata,
    //         success: function (data) {
    //             alert(JSON.stringify(data));
    //         },
    //         error: function(){
    //             alert("Cannot get data");
    //         }
    //         });
    //     });
    // });
    </script>