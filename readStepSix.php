<link rel="stylesheet" href="css/nice-select.css">
<?php
session_start();
if(isset($_SESSION['json_data_post'])){
$bankname = $_SESSION['json_data_post']['p_bankname'];
$branch = $_SESSION['json_data_post']['branch'];
$branchcode = $_SESSION['json_data_post']['branchcode'];
$accountholdername = $_SESSION['json_data_post']['p_account_holder_name'];
$accountnumber = $_SESSION['json_data_post']['p_account_number'];
$accounttype = $_SESSION['json_data_post']['p_account_type'];
$debitorderdate = $_SESSION['json_data_post']['debitorderdate'];
$coverdate = $_SESSION['json_data_post']['coverdate'];
}
$ProductGuid = "Telkom Funeral";
$plan = $_POST['plan'];
$planname = $_POST['planname'];
$option = $_POST['option'];
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
$url = "http://telkomtest.cloudcover.insure/apiListBanks";
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
    $arraybanks  = $array['BankQueue']['BANKGUID'];
                                                          
}
 
curl_close($ch);
?>
<div class="la-pagination la-display-m mb-5">
                  <div class="container">
                  <div class="row">
                    <ul class="pagination pg-blue col-12 p-0">
                      <li class="page-item col-7 p-0">
                        <a href="#" class="page-link la-page-l" aria-label="Previous">
                          <span aria-hidden="true"> <!--&laquo;--><img src="img/icn_arrow_left_10-blue.png"> 06 </span>
                          <span class="sr-only">Previous</span>
                        </a><span class="uppercase f-14 l-20 ls-0-5">Payment</span>
                      </li>

                      <li class="page-item col-5 p-0">
                        <a class="page-link la-page-l" aria-label="Next">
                          <span aria-hidden="true">step 6 of 6 <img src="img/icn_arrow_right_10-blue.png"> <!--&raquo;--></span>
                          <span class="sr-only">Confirm</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                  
                  </div>
                  </div>  
                                <div class="row">
                                    <div class="container col-md-8 col-sm-12">
                                        <div class="content">
                                            <div class="tool">
                                                <h3 class="panel-title f-48 l-52 color-navy ls-0-minus-2">Your details for payment</h3>
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
                                        <p class="f-12 lh-20 ls-0-1 gray">Please fill out the form below to complete your debt order.</p>
                                        <hr class="mt-4 border-top-columbia-blue">
                                        <p class="f-24 l-32 blue-gray mt-4 ls-0-1">Debit order</p>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-6">
                                                <div class="wide">
                                                    <label class="left f-12 l-17 m-0 color-grey ">Bank</label>
                                                    <div class="default-select title" id="default-select">
                                                      <select name="p_bankname" id="p_bankname" onChange="setBranchList( this.value )">
                                                      <option value="">Select Type</option>
                                                      <?php for ($i = 0; $i < count($arraybanks); $i++) { 
                                                           $universal = $array['BankQueue']['UNIVERSALBRANCHCODE'][$i]; 
                                                           if (is_array($universal) && empty($universal)) { 
                                                                $splituniversal = "NA";
                                                           }else{
                                                                $splituniversal = $array['BankQueue']['UNIVERSALBRANCHCODE'][$i]; 
                                                           }
                                                    ?>
													
                                                    <option data-id="<?php echo $splituniversal; ?>" value="<?php echo $array['BankQueue']['BANKGUID'][$i]; ?>" <?php echo (isset($bankname) && $bankname == $array['BankQueue']['BANKGUID'][$i]) ? 'selected="selected"' : ''; ?> ><?php echo $array['BankQueue']['BANKNAME'][$i]; ?></option>
                                                      <?php } ?>
                                                      </select>
                                                    </div>
                                                            </div>
                                            </div>
                                             <div class="col-lg-4">
                                                <div class="single_input">
                                                    <div class="mt-10 wide">
                                                        <label class="left f-12 l-17  m-0 color-grey">Branch</label>
                                                        <input type="text" name="branch" id="branch" autocomplete="off" min="0" placeholder="Branch" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Branch'"  class="single-input p-0 transparent-input" value="<?php echo isset($branch) ? $branch : ''; ?>">
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                            <div class="row">
                                            <div class="col-lg-6">
                                                <div class="single_input">
                                                    <div class="single_input">
                                                    <div class="mt-10 wide">
                                                        <label class="left f-12 l-17 m-0 color-grey">Branch Code</label><input type="text" id="branchcode-list" name="branchcode" autocomplete="off" min="0" placeholder="Code" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Code'"  class="single-input p-0 transparent-input" value="<?php echo isset($branchcode) ? $branchcode : ''; ?>">
                                                   
                                                    </div>
                                                </div>
                                                 </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-4">
                                                <div class="single_input">
                                                    <div class="mt-10 wide">
                                                        <label class="left f-12 l-17  m-0 color-grey">Account holder name</label>
                                                        <input type="text" id="p_account_holder_name" name="p_account_holder_name" autocomplete="off" min="0" placeholder="Name" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Name'"  class="single-input p-0 transparent-input" value="<?php echo isset($accountholdername) ? $accountholdername : ''; ?>">
                                                    </div>
                                                 </div>
                                            </div>
                                             <div class="col-lg-4">
                                                <div class="single_input">
                                                    <div class="mt-10 wide">
                                                        <label class="left f-12 l-17  m-0 color-grey">Account number</label>
                                                        <input type="number" id="p_account_number" name="p_account_number" autocomplete="off" min="0" placeholder="Number" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Number'"  class="single-input p-0 transparent-input" value="<?php echo isset($accountnumber) ? $accountnumber : ''; ?>">
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3">
                                                <div class="wide">
                                                    <label class="left f-12 l-17 m-0 color-grey ">Account type</label>
                                                    <div class="default-select title" id="default-select">
                                                      <select name="p_account_type" id="p_account_type">
                                                        <option value="savings" <?php echo (isset($accounttype) && $accounttype == 'savings')  ? 'selected="selected"' : '' ?>>Savings</option>
                                                        <option value="current" <?php echo (isset($accounttype) && $accounttype == 'current')  ? 'selected="selected"' : '' ?>>Current</option>                                                        
                                                      </select>
                                                    </div>
                                                            </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-4">
                                                <div class="wide">
                                                    <label class="left f-12 l-17 m-0 color-grey ">Debit order date</label>
                                                    <div class="default-select title" id="default-select">
                                                      <select name="debitorderdate" id="debitorderdate">
                                                        <option value="">Select date</option>
                                                        <?php 
                                                        for($i=1;$i<=31;$i++){ ?>
                                                        <option value="<?php echo $i; ?>"<?php echo (isset($debitorderdate) && $debitorderdate == $i)  ? 'selected="selected"' : '' ?>><?php echo $i; ?></option>
                                                        <?php } ?>
                                                        
                                                      </select>
                                                    </div>
                                                            </div>
                                            </div>
                                             <div class="col-lg-5">
                                                <div class="single_input">
                                                    <div class="mt-10 wide">
                                                        <label class="left f-12 l-17  m-0 color-grey">When would you like your cover to start?</label>
                                                        <input type="text" name="coverdate" id="coverdate" autocomplete="off" min="0" class="single-input p-0 transparent-input" value="<?php echo isset($coverdate) ? $coverdate : ''; ?>">
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
                                    <div class="full-data">
                                    <input type="hidden" id="coveramount" value="<?php echo $_POST['coveramount']; ?>">
                                    <input type="hidden" id="title" value="<?php echo $_POST['title']; ?>">
                                    <input type="hidden" id="fname" value="<?php echo $_POST['fname']; ?>">
                                    <input type="hidden" id="surname" value="<?php echo $_POST['surname']; ?>">
                                    <input type="hidden" id="cnumber" value="<?php echo $_POST['cnumber']; ?>">
                                    <input type="hidden" id="income" value="<?php echo $_POST['income']; ?>">
                                    <input type="hidden" id="plan" value="<?php echo $_POST['plan']; ?>">
                                    <input type="hidden" id="planname" value="<?php echo $_POST['planname']; ?>">
                                    <input type="hidden" id="option" value="<?php echo $_POST['option']; ?>">
                                    </div>
                                    
<script src="js/main.js"></script>
<script type="text/javascript">
function setBranchList(val) {
var selectedCountry = $("#p_bankname").children("option:selected").data('id');
var selectedbranch = $("#p_bankname").children("option:selected").val();
	$.ajax({
		type: "POST",
		url: "branchcode.php",
		data:'selectedbankcode='+selectedCountry,
		success: function(data){
			$("#branchcode-list").val(data);
		}
	});
	$.ajax({
		type: "POST",
		url: "branch.php",
		data:'selectedbankbranch='+selectedbranch,
		success: function(data){
			$("#branch").val(data);
		}
	});
}
</script>
<script>
    $(document).ready(function() {
        $(".successapi").on("click",function(e){
            var title = $("#title").val();
            alert(title);
            return false;
            var surname = $("#sur_name").val();
            var name = $("#name").val();
            var idnumber = $("#id_number").val();
            var marital = $("#marital").val();
            var cellnumber = $("#cell_number").val();
            var email = $("#email").val();
            var address = $("#address").val();
            var inputdata = {
  "ClientIn" : {
    "CLIENTGUID" : "",
    "MANUALCODE" : "",
    "TITLE" : "Mr",
    "INITIALS" : "D",
    "FIRSTNAMES" : "srihan",
    "SURNAME" : "kunaparaju",
    "IDNUMBER" : "6707135776080",
    "CELLPHONE" : "919553685558",
    "EMAIL" : "sudhakarvarma.k@gmail.com",
    "HOMETEL" : "+919553685558",
    "WORKTEL" : "011 365 1426",
    "FAXNO" : "011 365 1426",
    "POSTALADDRESS" : "1639 Market St\r\n\Randburg\r\nGauteng\r\n2167",
    "RESIDENTIALADDRESS" : "PO Box 3828\r\n\Randburg\r\nGauteng\r\n2028",
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
    "PRODUCTPLAN" : "TelFun Family",
    "BENEFITTYPE" : "Telkom Funeral A",
    "INCEPTIONDATE" : "2020-10-01",
    "PAYMENTFREQUENCY" : "Monthly",
    "PAYMENTMETHOD" : "Debit Order",
    "BANKGUID" : "FNB",
    "ACCOUNTTYPE" : "Current",
    "ACCOUNTNUMBER" : "62003123594",
    "PREFERREDDEBITORDERDAY" : "26",
    "BROKETPOLICYNO" : "",
    "INSURERPOLICYNO" : "",
    "BROKERGUID" : "",
    "INSURERGUID" : "",
    "NEWBUSCHANNEL" : "Self Service",
    "INTERNALEMPLOYEE" : "",
    "INTERNALREFERENCE" : "",
    "BYPASSPAYMENTDETAILS" : ""
  },
  "InputCoverQueue" : [
    {
      "COVACTION" : "Insert",
      "POLICYCOVERGUID" : "",
      "COVERSTATUS" : "Pending",
      "PRODUCTCOVERGUID" : "TelFun Spouse",
      "PRODUCTPARTGUID" : "Telkom Funeral",
      "BENEFITGUID" : "Telkom Funeral A",
      "INSUREDITEM" : "Spouse",
      "COVERFROMDATE" : "2020-10-01",
      "COVERTODATE" : "",
      "NAME" : "lakshmi",
      "IDNUMBER" : "6707135776080",
      "BIRTHDATE" : "1974/09/18",
      "GENDER" : "Female"
    },
    
    {
      "COVACTION" : "Insert",
      "POLICYCOVERGUID" : "",
      "COVERSTATUS" : "Pending",
      "PRODUCTCOVERGUID" : "TelFun Children",
      "PRODUCTPARTGUID" : "Telkom Funeral",
      "BENEFITGUID" : "Telkom Funeral A",
      "INSUREDITEM" : "Child",
      "COVERFROMDATE" : "2020-10-01",
      "COVERTODATE" : "",
      "NAME" : "varma",
      "IDNUMBER" : "1809186791986",
      "BIRTHDATE" : "2018/09/18",
      "GENDER" : "Male"
    },
        
  ],
  "InputBenQueue" : [
    {
      "BENACTION" : "Insert",
      "BENEFICIARYGUID" : "",
      "BENIFICIARYTYPE" : "Individual",
      "TITLE" : "Dr",
      "FIRSTNAME" : "sudhakar",
      "SURNAME" : "Kunaparaju",
      "IDNUMBER" : "6909186115180",
      "DATEOFBIRTH" : "1969/09/18",
      "SEX" : "Male",
      "COMPANYNAME" : "",
      "REGISTRATIONNO" : "",
      "EMAIL" : "vanama.kun19@gmil.com",
      "CELLPHONE" : "+919951268699",
      "HOMETELEPHONE" : "011 365 7777",
      "WORKTELEPHONE" : "011 366 4412",
      "PASSPORTNO" : "",
      "RELATIONSHIP" : "Parent",
      "ACCOUNTHOLDER" : "Anthony Sails",
      "ACCOUNTNUMBER" : "1052711483",
      "BANK" : "ABSA",
      "BRANCHCODE" : "632005",
      "BenPercent" : "100.00%",
      "SHARE" : "100.00"
    }
  ]
};
            var jsondata = JSON.stringify(inputdata);
            $.ajax({
            type: "POST",
            url: "https://telkomtest.cloudcover.insure/apiCreateCliPolCovBenReg",
            contentType: 'application/json',
            data: jsondata,
            success: function (data) {
                alert(JSON.stringify(data));
            },
            error: function(){
                alert("Cannot get data");
            }
            });
        });
    });
    </script>
	<script>
        $('#coverdate').datepicker();
    </script>