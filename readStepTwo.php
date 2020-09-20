<link rel="stylesheet" href="css/nice-select.css">
<?php
session_start();
$ProductGuid = "Telkom Funeral";
$plan = $_POST['plan'];
$planname = $_POST['planname'];
$option = $_POST['option'];
$_COOKIE["plan"] = $plan; 
$_COOKIE["planname"] = $planname; 
$_COOKIE["option"] = $option; 

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

?>
<div class="la-pagination la-display-m mb-5">
                  <div class="container">
                  <div class="row">
                    <ul class="pagination pg-blue col-12 p-0">
                      <li class="page-item col-7 p-0">
                        <a href="#" class="page-link la-page-l" aria-label="Previous">
                          <span aria-hidden="true"> <!--&laquo;--><img src="img/icn_arrow_left_10-blue.png"> 02 </span>
                          <span class="sr-only">Previous</span>
                        </a><span class="uppercase f-14 l-20 ls-0-5">Quote details</span>
                      </li>

                      <li class="page-item col-5 p-0">
                        <a class="page-link la-page-l" aria-label="Next">
                          <span aria-hidden="true">step 2 of 6 <img src="img/icn_arrow_right_10-blue.png"> <!--&raquo;--></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                  
                  </div>
                  </div>
<h3 class="panel-title f-48 l-52 color-navy ls-0-minus-2">Here’s your quote, Anna</h3>
                            <div class="row">
                                <div class="col-sm-8">
                                 <p class="f-16 blue-gray mt-5 l-23 mb-0">You and your family will get</p>
                                    <p class="f-12 gray">Spouse and up to 8 children</p>
                                    <div class="row">
                                      <div class="col-sm-5">
                                        <div class="default-select" id="default-select">
                                          <select>
                                          <option value="R10 000.00"<?php echo $benfitamount == 'R10 000.00' ? ' selected="selected"' : '';?>>R10 000.00</option>
                                          <option value="R20 000.00"<?php echo $benfitamount == 'R20 000.00' ? ' selected="selected"' : '';?>>R20 000.00</option>
                                          <option value="R30 000.00"<?php echo $benfitamount == 'R30 000.00' ? ' selected="selected"' : '';?>>R30 000.00</option>
                                          <option value="R50 000.00"<?php echo $benfitamount == 'R50 000.00' ? ' selected="selected"' : '';?>>R50 000.00</option>
                                          <option value="R70 000.00"<?php echo $benfitamount == 'R70 000.00' ? ' selected="selected"' : '';?>>R70 000.00</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <p class="f-24 blue-gray mt-1 l-32 mb-0">worth of cover for <b class="blue-gray family-strong"><?php echo $premium; ?></b> per month</p>
                                    <p class="f-24 blue-gray mt-1 l-32 mt-4">on the <b class="blue-gray family-strong"><?php echo ($_COOKIE['plan'] != '') ? $_COOKIE['plan'] : $planname; ?></b> plan.</p>
                                    

                                    <div class="input_fields_wrap"></div>
                                    <div class="addextend" style="display:none">
                                    <hr class="mt-5 border-top-columbia-blue mb-4">
                                    <p class="f-24 blue-gray mt-1 l-32">Add your extended family to your plan.</p>
                                    <p class="f-12 blue-gray mt-0 l-20 mb-0 lh-20 ls-0-1">Plan ahead for your family's future, and add them to your plan.</p>
                                    <p class="f-12 gray mt-0 l-32 lh-20 ls-0-14">You can add up to 14 extended family members.</p>
                                    
                                    <p class="uppercase f-16 l-23 ls-0-5 blue-gray mt-3">John will get</p>
                                    <div class="row">
                                    <div class="container">
                                    <div class="col-6 pl-0">
                                    <div class="default-select" id="default-select">
                                        <select>
                                          <option value="1">R 10 000</option>
                                          <option value="1">R 20 000</option>
                                          <option value="1">R 30 000</option>
                                          <option value="1">R 50 000</option>
                                          <option value="1">R 70 000</option>
                                        </select>
                                      </div>
                                      </div>
                                      <div class="col-6"></div>
                                      </div>
                                      </div>
                                      <div class="w-100 mt-2">
                                          <p class="f-24 l-32 ls-0-minus-2 blue-gray w-100">worth of cover for <b class="family-strong blue-gray">R 75.00</b> per month.</p>
                                          <div class="azure-blue"><a href="javascript:void(0)"><span class="azure-blue f-14 l-20 ls-0-5 uppercase mr-2 family-strong">Edit</span></a> | <a href="javascript:void(0)"><span class=" ml-2 azure-blue f-14 l-20 ls-0-5 uppercase family-strong">Remove</span></a></div>
                                      </div>
                                    </div>
                                    <div class="container input-group mb-1 mt-5">
                                    <input type="text" class="events-none form-control border-right-none border-blue pl-15 pb-20 pt-15 f-18 blue-gray" placeholder="Add extended Family Funeral" aria-label="Add extended Family Funeral" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                    <span class="input-group-text bg-none border-blue pl-15 pb-15 pt-15 bg-white" id="basic-addon2"><a href="javascript:void(0)" class="f-16 azure-blue l-26 font-strong hover-white add_field_button">Add</a></span>
                                    </div>
                                    </div>
                                    <p class="container f-12 l-20 gray ls-0-1">You can still add 13 extended family members.</p>
                                    
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
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 records_content la-display-m" id="headingTwo">
<div class="row bg-blue-gredient p-10 border-5x res-summary mt-3 mb-4">
<div class="col-12 mt-3">
              <div class="bg"></div>
            </div>
<div class="col-8">
<h2 class="text-left f-24 l-36 ls-minus-2 color-white res-summary"> 
	<button type="button" class="p-0 text-left f-24 l-36 ls-minus-2 color-white res-summary btn btn-link text-decoration-none" data-toggle="collapse" data-target="#collapseTwo" style="text-decoration:none;">Your policy summary</button>
</h2>
</div>
<div class="col-4 text-right">
	<label class="color-white f-20 l-50 ls-0-56 font-strong m-0"><?php echo $premium; ?></label>
</div>
<div class="col-12 text-right">
	<label class="color-white f-14 l-22 ls-0-18 res-premiun">monthly premium</label>
</div>
<div id="collapseTwo" class="col-12 collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
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
                                </div>
								</div>
                                <input type="hidden" name="plan" value="<?php echo $_POST['plan']; ?>">
                                <input type="hidden" name="planname" value="<?php echo $_POST['planname']; ?>">
                                <input type="hidden" name="option" value="<?php echo $_POST['option']; ?>">

    <script src="js/main.js"></script>
<script>
$(document).ready(function() {
var max_fields      = 10; //maximum input boxes allowed
var wrapper         = $(".input_fields_wrap"); //Fields wrapper
var add_button      = $(".add_field_button"); //Add button ID

var x = 1; //initlal text box count
$(add_button).on("click",function(e){ //on add input button click
  // let dropdown = $('#familymembertitle');
  // alert(dropdown);
  // dropdown.empty();
  // dropdown.append('<option selected="true" disabled>Select type</option>');
  // dropdown.prop('selectedIndex', 0);
  // $.ajax({
  // type: "GET",
  // url: "https://telkomtest.cloudcover.insure/apiListRelationships",
  // dataType: "json",
  // success: function (data) {
  //     let drop = JSON.stringify(data);
  //     var deletedItem = data.result.splice(3,1);
  //     console.log(data.result);
  //     $.each(drop, function (key, entry) {
  //     dropdown.append($('<option></option>').attr('value', entry.RELATIONSHIP).text(entry.RELATIONSHIP));
  //     });
  // },
  // error: function(){
  //     alert("Cannot get data");
  // }
  // });
e.preventDefault();
if(x < max_fields){ //max input box allowed
x++; //text box increment
$(wrapper).append('<div class="card new mb-5 mt-5"> <div class="container mt-3 mb-3"> <p class="f-18 l-26 blue-gray">Extended Family Funeral</p><div class="row mt-4"> <div class="col-sm-6"> <label class="left f-12 l-17 gray m-0 w-100">Which family member?</label> <div class="col-md-12 pl-0"> <div class="default-select title" id="default-select"> <select name="familymembertitle'+x+'" id="familymembertitle'+x+'"> <option value="">Select Type</option> <option value="Brother-in-law">Brother-in-law</option> <option value="Child">Child</option> <option value="Father-in-law">Father-in-law</option> <option value="In-law">In-law</option> <option value="Life partner">Life partner</option> <option value="Mother-in-law">Mother-in-law</option> <option value="Parent">Parent</option> <option value="Sibling">Sibling</option> <option value="Sister-in-law">Sister-in-law</option> <option value="Spouse">Spouse</option> </select> </div></div></div><div class="col-sm-6"></div><div class="col-lg-6 mt-4"> <div class="single_input"> <div class="mt-10 wide"> <label class="left f-12 l-17 m-0 color-grey mt-4">Full name</label><input type="text" id="firstname'+x+'" name="firstname'+x+'" autocomplete="off" min="0" placeholder="FullName" onfocus="this.placeholder=" onblur="this.placeholder=FullName" class="single-input p-0 transparent-input"> </div></div></div><div class="col-lg-4 mt-4"> <div class="single_input"> <div class="mt-10 wide"> <label class="left f-12 l-17 m-0 color-grey mt-4">Surname</label> <input type="text" name="surname'+x+'" id="surname'+x+'" autocomplete="off" min="0" placeholder="Surname" onfocus="this.placeholder=" onblur="this.placeholder=Surname" class="single-input p-0 transparent-input"> </div></div></div><div class="col-lg-6 mt-4"> <div class="single_input"> <div class="single_input"> <div class="mt-10 wide"> <label class="left f-12 l-17 m-0 color-grey mt-4">ID Number</label><input type="Number" id="idnumber'+x+'" name="idnumber'+x+'" autocomplete="off" min="0" placeholder="ID Number" onfocus="this.placeholder=" onblur="this.placeholder=ID Number" class="single-input p-0 transparent-input"> </div></div></div></div><div class="col-lg-6 mt-4"></div><div class="col-lg-12 mt-4"> <div class=""> <label><input type="radio" name="optradio" class="mr-3">I don’t know the ID number</label> <div class="row"> <div class="col-6"> <div class="single_input"> <div class="mt-10 wide"> <label class="left f-12 l-17 m-0 color-grey mt-4">Date of birth</label> <input type="date" id="dateofbirth'+x+'" name="dateofbirth'+x+'" placeholder="Date of Birth" class="single-input p-0 transparent-input"> </div></div></div><div class="col-6"> <section class="radio"> <label class="left f-12 l-17 m-0 color-grey mt-4 w-100 ml-1">Gender</label> <div class="mt-1"> <input type="radio" id="male'+x+'" name="gender'+x+'" value="male"> <label class="radio border-3x border-1-blue-gray" for="male'+x+'"> <h2 class="f-10 l-15 uppercase blue-gray m-0">Male</h2> </label> </div><div class="mt-1"> <input type="radio" id="female'+x+'" name="gender'+x+'" value="female"> <label class="radio border-3x border-1-blue-gray" for="female'+x+'"> <h2 class="f-10 l-15 uppercase blue-gray m-0">Female</h2> </label> </div></section> </div></div><label class="mt-3 w-100 f-12 l-17 color-gray">How much cover would you like?</label> <section class="radio"> <div class="pl-0"> <input type="radio" id="5000'+x+'" name="cover'+x+'" value="R5 000.00"> <label class="radio border-3x border-1-blue-gray" for="5000'+x+'"> <h2 class="f-10 l-15 uppercase blue-gray m-0">R 5 000</h2> </label> </div><div> <input type="radio" id="10000'+x+'" name="cover'+x+'" value="R10 000.00"> <label class="radio border-3x border-1-blue-gray" for="10000'+x+'"> <h2 class="f-10 l-15 uppercase blue-gray m-0">R 10 000</h2> </label> </div><div> <input type="radio" id="15000'+x+'" name="cover'+x+'" value="R15 000.00"> <label class="radio border-3x border-1-blue-gray" for="15000'+x+'"> <h2 class="f-10 l-15 uppercase blue-gray m-0">R 15 000</h2> </label> </div><div> <input type="radio" id="20000'+x+'" name="cover'+x+'" value="R20 000.00"> <label class="radio border-3x border-1-blue-gray" for="20000'+x+'"> <h2 class="f-10 l-15 uppercase blue-gray m-0">R 20 000</h2> </label> </div><div class="pr-0"> <input type="radio" id="35000'+x+'" name="cover'+x+'" value="R35 000.00"> <label class="radio border-3x border-1-blue-gray" for="35000'+x+'"> <h2 class="f-10 l-15 uppercase blue-gray m-0">R 35 000</h2> </label> </div></section> </div></div><div class="col-lg-12"> <div class="button-group-area mt-4"> <a href="javascript:void(0)" class="genric-btn color-azure-blue border-azure-blue large w-25 font-strong border-3x uppercase remove_field">Cancel</a> <a href="javascript:void(0)" class="addtoplan genric-btn success-border large w-25 bg-azure-blue color-white font-strong border-3x uppercase">Add to plan</a></div></div></div></div></div>'); //add input box
}
});

$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
e.preventDefault(); $(this).parent('div').parent('div').parent('div').parent('div').parent('div').remove(); x--;
});
$(wrapper).on("click",".remove_family_member", function(e){ //user click on remove text
e.preventDefault(); $(this).parent('a').parent('div').parent('div').parent('div').remove(); x--;
});
$(wrapper).on("click",".addtoplan", function(e){ //user click on remove text
var fname = $("#firstname"+x).val();
var title = $("#familymembertitle"+x).val();
e.preventDefault(); $(this).parent('div').parent('div').parent('div').parent('div').parent('div').remove(); x--;
$(wrapper).append('<div class="addextend"> <hr class="mt-5 border-top-columbia-blue mb-4"> <p class="f-24 blue-gray mt-1 l-32">Add your extended family to your plan.</p><p class="f-12 blue-gray mt-0 l-20 mb-0 lh-20 ls-0-1">Plan ahead for your family s future, and add them to your plan.</p><p class="f-12 gray mt-0 l-32 lh-20 ls-0-14">You can add up to 14 extended family members.</p><p class="uppercase f-16 l-23 ls-0-5 blue-gray mt-3">'+fname+' will get</p><div class="row"> <div class="container"> <div class="col-6 pl-0"> <div class="default-select" id="default-select"> <select> <option value="1">R 10 000</option> <option value="1">R 20 000</option> <option value="1">R 30 000</option> <option value="1">R 50 000</option> <option value="1">R 70 000</option> </select> </div></div><div class="col-6"></div></div></div><div class="w-100 mt-2"> <p class="f-24 l-32 ls-0-minus-2 blue-gray w-100">worth of cover for <b class="family-strong blue-gray">R 75.00</b> per month.</p><div class="azure-blue"><a href="javascript:void(0)"><span class="azure-blue f-14 l-20 ls-0-5 uppercase mr-2 family-strong">Edit</span></a> | <a href="javascript:void(0)"><span class=" ml-2 azure-blue f-14 l-20 ls-0-5 uppercase family-strong remove_family_member">Remove</span></a></div></div></div>');
$(".extendedfamilyresponse").append('<div class="mt-5 container box border-3x p-3"> <p class="f-14 lh-22 ls-0-18 font-strong ">Extended Funeral plan</p><label class="f-14 lh-22 ls-0-18 color-white w-100">'+title+'</label> <hr class="border-white-top"> <div class="row"> <div class="col-sm-6"> <p class="f-12 lh-15 family-strong uppercase mb-0">Basic premium</p></div><div class="col-sm-6 text-right"> <label class="f-14 lh-28 ls-0-21 color-white family-strong">R75.00</label> </div></div><hr class="border-white-top"> <p class="uppercase f-12 lh-15 family-strong mb-0">Benefit amount</p><label class="f-37 lh-54 font-strong color-white">R10 000</label> </div>');

});

});
</script>
<!-- <script>
$(document).ready(function() {
var plan = $("#plan").val();
var planname = $("#planname").val();
var option = $("#option").val();
$.post("readStepSix.php", {
plan: plan,
planname: planname,
option: optionvalue,
}, function (data, status) {
  $(".full-data").html(data);
}); 
}); 
</script> -->