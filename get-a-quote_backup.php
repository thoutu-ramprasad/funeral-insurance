<style>
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
include('header.php');
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
          
               <p class="boxheadding1 mt-4"><a href="javascript:void(0)" class="plan" data-id="Telkom Funeral A" id="<?php echo $planone; ?>"><?php echo $plannameone; ?></a></p>
                <p class="lasttext1 pb-4">Cover for immediate family members.</p>
              </div>
            </div>
            <div class="col-md-3 col-md-3 col-sm-3 col-xs-3 ">
              <div class="text-center pb-4 pt-4 box2"><img src="img/Vector5.png" class=" pl-2 pt-2 w-88 cursor-default" alt="...">
              
                <p class="boxheadding1 mt-4"><a href="javascript:void(0)" class="plan" data-id="Telkom Funeral B" id="<?php echo $plantwo; ?>"><?php echo $plannametwo; ?></a></p>
                  <p class="lasttext1">Funeral cover designed around the needs of the main member only.</p>
              </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3 ">
              <div class="text-center pb-4 pt-4 box2"><img src="img/Vector7.png" class=" pl-2 pt-2 w-88 cursor-default" alt="...">       
                <p class="boxheadding1  mt-4"><a href="javascript:void(0)" class="plan" data-id="Telkom Funeral C" id="<?php echo $planthree; ?>"><?php echo $plannamethree; ?></a></p>
                  <p class="lasttext1">Funeral Cover for the main member and their spouse. </p>
              </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
              <div class="text-center pb-4 pt-4 box2"><img src="img/Vector7.png" class=" pl-2 pt-2 w-88 cursor-default" alt="...">
        
                <p class="boxheadding1 mt-4"><a href="javascript:void(0)" class="plan" data-id="Telkom Funeral D" id="<?php echo $planfour; ?>"><?php echo $plannamefour; ?></a></p>
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
    <div class="apply_form_area bg-blue">
        <div class="container">
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
                
                  <form role="form">
                    <div class="panel panel-primary setup-content mt-5" id="step-1">
                        
                        <div class="panel-heading">
                            <h3 class="panel-title f-48 l-52 color-navy ls-0-minus-2">Get a funeral plan that<br>suits your needs</h3>
                            <p class="f-24 l-32 ls-0-1 blue-gray mt-5">Start your quote</p>
                            <h6 class="f-16 lh-23 ls-0-5 uppercase blue-gray mt-5">Select your funeral plan</h6>
                            <p class="f-12 l-20 gray ls-0-1 blue font-strong">Want to know a bit more?</p>
                            </div>
							                            <div class="row mt-5 mb-5">
														<div class="container bgwhite">
                                                            
                                                            
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
      <div class="text-center pb-4 pt-4 box1">
	   <img src="img/Vector.png" class=" pl-2 pt-2 w-88 cursor-default" alt="...">
        <p class="boxheadding mb-4 mt-4"><a href="javascript:void(0)" class="l-s-m-02" style="color:#008FE0;"><?php echo $plannameone; ?></a></p>
        <p class="lasttext">Cover for immediate family members.</p>
        <span class="tick-icon" id="<?php echo $plannameone; ?>"></span>
      </div>
   </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="text-center pb-4 pt-4 box1"><img src="img/Vector1.png" class=" pl-2 pt-2 w-88 cursor-default" alt="...">
      
        <p class="boxheadding mb-4 mt-4"><a href="javascript:void(0)" class="l-s-m-02"><?php echo $plannametwo; ?></a></p>
          <p class="lasttext">Funeral cover designed around the needs of the main member only.</p>
          <span class="tick-icon" id="<?php echo $plannameone; ?>"></span>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="text-center pb-4 pt-4 box1"><img src="img/Vector3.png" class=" pl-2 pt-2 w-88 cursor-default" alt="...">
       
        <p class="boxheadding mb-4 mt-4"><a href="javascript:void(0)" class="l-s-m-02"><?php echo $plannamethree; ?></a></p>
          <p class="lasttext">Funeral Cover for the main member and their spouse. </p>
          <span class="tick-icon" id="<?php echo $plannamethree; ?>"></span>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="text-center pb-4 pt-4 box1"><img src="img/Vector3.png" class=" pl-2 pt-2 w-88 cursor-default" alt="...">

        <p class="boxheadding mb-4 mt-4"><a href="javascript:void(0)" class="l-s-m-02"><?php echo $plannamefour; ?></a></p>
          <p class="lasttext">Funeral Cover for the main member and their child.</p>
          <span class="tick-icon" id="<?php echo $plannamefour; ?>"></span>
      </div>
    </div>
  </div>
</div>
														</div>

<!--                            <div class="row mt-5 mb-5">
                                <div class="col-md-3 ">
                                  <div class="text-center pb-4 pt-4 box1"><img src="img/Vector.png" class=" pl-2 pt-2 w-88 cursor-default" alt="...">
                              
                                    <p class="boxheadding mt-4">Main member, spouse and <br>children only</p>
                                    <p class="lasttext pb-4">Cover for immediate family members.</p>
                                  </div>
                                </div>
                                <div class="col-md-3 ">
                                  <div class="text-center pb-4 pt-4 box1"><img src="img/Vector1.png" class=" pl-2 pt-2 w-88 cursor-default" alt="...">
                                  
                                    <p class="boxheadding mb-4 mt-4">Main member only</p>
                                      <p class="lasttext pt-3  ">Funeral cover designed around the needs of the main member only.
                            
                            </p>
                                  </div>
                                </div>
                                <div class="col-md-3 ">
                                  <div class="text-center pb-4 pt-4 box1"><img src="img/Vector3.png" class=" pl-2 pt-2 w-88 cursor-default" alt="...">
                                   
                                    <p class="boxheadding  mt-4">Main member and<br> Spouse only</p>
                                      <p class="lasttext">Funeral Cover for the main member and their spouse. </p>
                                  </div>
                                </div>
                                <div class="col-md-3 ">
                                  <div class="text-center pb-4 pt-4 box1"><img src="img/Vector3.png" class=" pl-2 pt-2 w-88 cursor-default" alt="...">
                            
                                    <p class="boxheadding mt-4">Main member and <br>Child only</p>
                                      <p class="lasttext">Funeral Cover for the main member and their child.  </p>
                                  </div>
                                </div>
                              </div>
-->                              <div class="row mt-3">
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <p class="cover f-16 l-23 ls-0-5 blue-gray uppercase">How much cover would you like?</p>
                                    <section class="radio">
                                        <div class="pl-0">
                                            <input type="radio" id="control_01" name="select" value="1" checked="" /> <label class="radio border-3x border-1-blue-gray" for="control_01"> <h2 class="f-10 l-15 uppercase blue-gray m-0">R 10 000</h2> </label>
                                        </div>
                                        <div>
                                            <input type="radio" id="control_02" name="select" value="3" /> <label class="radio border-3x border-1-blue-gray" for="control_02"> <h2 class="f-10 l-15 uppercase blue-gray m-0">R 20 000</h2> </label>
                                        </div>
                                        <div>
                                            <input type="radio" id="control_03" name="select" value="3" /> <label class="radio border-3x border-1-blue-gray" for="control_03"> <h2 class="f-10 l-15 uppercase blue-gray m-0">R 30 000</h2> </label>
                                        </div>
                                        <div>
                                            <input type="radio" id="control_04" name="select" value="4" /> <label class="radio border-3x border-1-blue-gray" for="control_04"> <h2 class="f-10 l-15 uppercase blue-gray m-0">R 50 000</h2> </label>
                                        </div>
                                        <div class="pr-0">
                                            <input type="radio" id="control_05" name="select" value="5" /> <label class="radio border-3x border-1-blue-gray" for="control_05"> <h2 class="f-10 l-15 uppercase blue-gray m-0">R 70 000</h2> </label>
                                        </div>
                                    </section>                                    
                                  <div class="mt-4">
                                    <div class="row mt-3">
                                        <div class="col-lg-4">
                                            <div class="wide">
                                                <label class="left f-12 l-17 m-0 color-grey ">Title</label>
                                                <div class="default-select title" id="default-select">
                                                  <select style="display: none;">
                                                    <option value="1">Miss.</option>
                                                    <option value="1">Mrs.</option>
                                                    <option value="1">Mr.</option>
                                                    
                                                  </select><div class="nice-select" tabindex="0"><span class="current">FNB Bank</span><ul class="list"><li data-value="1" class="option selected">FNB Bank</li><li data-value="1" class="option">NED Bank</li><li data-value="1" class="option">ABSA Bank</li></ul></div>
                                                </div>
                                                        </div>
                                        </div>
                                         <div class="col-lg-4">
                                            
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-4">
                                            <div class="single_input">
                                                <div class="mt-10 wide">
                                                    <label class="left f-12 l-17  m-0 color-grey">Full name</Nav></label>
                                                    <input type="text" name="fname" autocomplete="off" min="0" placeholder="First Name" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'First Name'" class="single-input p-0 transparent-input">
                                                </div>
                                             </div>
                                        </div>
                                         <div class="col-lg-4">
                                            <div class="single_input">
                                                <div class="mt-10 wide">
                                                    <label class="left f-12 l-17  m-0 color-grey">Surname</label>
                                                    <input type="text" name="lname" autocomplete="off" min="0" placeholder="Last Name" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Last Name'" class="single-input p-0 transparent-input">
                                                </div>
                                             </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-4">
                                            <div class="single_input">
                                                <div class="mt-10 wide">
                                                    <label class="left f-12 l-17  m-0 color-grey">Contact number</label>
                                                    <input type="number" name="cnumber" autocomplete="off" min="0" placeholder="Contact number" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Contact number'" class="single-input p-0 transparent-input">
                                                </div>
                                             </div>
                                        </div>
                                         <div class="col-lg-4">
                                            <div class="wide">
                                                <label class="left f-12 l-17 m-0 color-grey ">Monthly income</label>
                                                <div class="default-select title" id="default-select">
                                                  <select style="display: none;">
                                                    <option value="1">R10000</option>
                                                    <option value="1">R20000</option>
                                                    <option value="1">R30000</option>
                                                  </select>
                                                </div>
                                                        </div>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                <div class="button-group-area mt-5">
                                <a href="javascript:void(0)" class="genric-btn success-border large w-25 bg-azure-blue nextBtn color-white border-3x mb-3 uppercase ls-0-5">Confirm</a>
                                </div>
                                </div>
                                </div>
                                </div>
                                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12 records_content">
                                  <div class="bg-policy">
                                    <p class="your-policy text-light text-center" style="font-size: 22px;line-height: 36px;letter-spacing: -2px;">Your policy summary</p>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="w-100" data-toggle="modal" data-target="#exampleModalCenter">
                                        <img src="img/Fill85.png" class="center mt-5" style="width:70px;height: 70px;">
                                    </button>
                                    <p class="you-have1 mt-3">You have not yet selected a policy</p>
                                    <p class="build" style="padding-bottom:60px;text-align:center;">Build your quote by selecting a funeral plan that suits your needs.</p>
                                    <button class="btn callme-back col-md-11 col-sm-12 col-xs-12 uppercase azure-blue f-14 l-20 ls-0-5">Call me back</button>
                                    <p class="text-light text-center assistance mt-3 pb-4">Need assistance? We’ll call you.</p>   
                                  </div>
                                </div>
                              </div>
                            
                    </div>
                    <div class="panel panel-primary setup-content mt-5" id="step-2">
                        <div class="panel-heading">
                            <h3 class="panel-title f-48 l-52 color-navy ls-0-minus-2">Here’s your quote, Anna</h3>
                            <div class="row">
                                <div class="col-sm-8">
                                 <p class="f-16 blue-gray mt-5 l-23 mb-0">You and your family will get</p>
                                    <p class="f-12 gray">Spouse and up to 8 children</p>
                                    <div class="row">
                                      <div class="col-sm-5">
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
                                    </div>
                                    
                                    <p class="f-24 blue-gray mt-1 l-32 mb-0">worth of cover for <b class="blue-gray family-strong">R 135.00</b> per month</p>
                                    <p class="f-24 blue-gray mt-1 l-32 mt-4">on the <b class="blue-gray family-strong">Main member, spouse <br>and children only</b> plan.</p>
                                    <div class="row bg-blue-gredient p-10 border-5x res-summary mt-3 mb-4" style="display:none">
                                        <div class="col-12 mt-3">
                                            <div class="bg"></div>
                                        </div>
                                        <div class="col-8">
                                            <h2 class="text-left f-24 l-36 ls-minus-2 color-white res-summary">Your policy summary</h2>
                                        </div>
                                        <div class="col-4">
                                            <label class="color-white f-20 l-50 ls-0-56 font-strong m-0">R 135.00</label>
                                        </div>
                                        <div class="col-12 text-right">
                                            <label class="color-white f-14 l-22 ls-0-18 res-premiun">monthly premium</label>
                                        </div>
                                        
                                      </div>
                                    <hr class="mt-5 border-top-columbia-blue mb-4">
                                    <p class="f-24 blue-gray mt-1 l-32">Add your extended family to your plan.</p>
                                    <p class="f-12 blue-gray mt-0 l-20 mb-0 lh-20 ls-0-1">Plan ahead for your family's future, and add them to your plan.</p>
                                    <p class="f-12 gray mt-0 l-32 lh-20 ls-0-14">You can add up to 14 extended family members.</p>
                                    <div class="input_fields_wrap">
                                    </div>
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
                                    <div class="input-group mb-1 mt-5">
                                    <input type="text" class="events-none form-control border-right-none border-blue pl-15 pb-20 pt-15 f-18 blue-gray" placeholder="Add extended Family Funeral" aria-label="Add extended Family Funeral" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                    <span class="input-group-text bg-none border-blue pl-15 pb-15 pt-15 bg-white" id="basic-addon2"><a href="javascript:void(0)" class="f-16 azure-blue l-26 font-strong hover-white add_field_button">Add</a></span>
                                    </div>
                                    </div>
                                    <p class="f-12 l-20 gray ls-0-1">You can still add 13 extended family members.</p>
                                    <div class="button-group-area mt-5">
                                    <a href="javascript:void(0)" class="genric-btn color-azure-blue border-azure-blue large w-25 preBtn font-strong border-3x">Back</a>
                                    <a href="javascript:void(0)" class="genric-btn success-border large w-25 bg-azure-blue nextBtn color-white font-strong border-3x mb-3">Next</a>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                <div class="pad bg-blue-gredient p-30 desk-summary border-5x">
                                    <h2 class="text-left f-24 l-36 mb-15">Your policy summary</h2>
                                        <div class="bg-gray pl-30 pt-10 pb-2 mb-20">
                                            <label class="color-white f-30 l-50 ls-0-56 font-strong">R 135.00</label>
                                            <p class="f-10 l-15 color-white ls-15 uppercase">your total monthly premium</p>
                                        </div>
                                        <p class="f-14 lh-22 ls-0-18">Main member, spouse and children only</p>
                                        <label class="f-14 lh-22 ls-0-18 color-white w-100">Spouse: 1</label>
                                        <label class="f-14 lh-22 ls-0-18 color-white w-100">Children: 2</label>
                                        <hr class="border-white-top">
                                        <div class="row">
                                            <div class="col-sm-6">
                                            <p class="f-12 lh-15 family-strong uppercase mb-0">Basic premium</p>
                                            </div>
                                            <div class="col-sm-6 text-right">
                                                <label class="f-14 lh-28 ls-0-21 color-white family-strong">R135.00</label>
                                            </div>
                                        </div>
                                        <hr class="border-white-top">
                                        <p class="uppercase f-12 lh-15 family-strong mb-0">Benefit amount</p>
                                        <label class="f-37 lh-54 font-strong color-white">R50 000</label>
                                        <a href="javascript:void(0)" class="genric-btn info bold-letters get-a-quote width-full bg-bright-blue mt-3 pt-10 pb-10">Call me back</a>
                                        <p class="wow text-center f-14 mt-2">Need assistance? We'll call you.</p>
                                </div>
                                </div>
                                </div>
                              </div>
                    </div>
                    <!-- step3 -->
                          <div class="panel panel-primary setup-content mt-5" id="step-3">
                            <div class="panel-body">
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
                                        <div class="form mb-4">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                  <div class="mt-10 wide">
                                                <label class="left f-12 l-17 m-0 color-grey mt-4">Title</label>
                                                <div class="default-select title" id="default-select">
                                                  <select>
                                                    <option value="1">Miss.</option>
                                                    <option value="1">Mrs.</option>
                                                    <option value="1">Mr.</option>
                                                    
                                                  </select>
                                                </div>
                                                        </div>
                                                  
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                      
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4">Full name</label><input type="text" name="Full_name" autocomplete="off" min="0" placeholder="Full Name" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'FullName'"  class="single-input p-0 transparent-input">
                                                        </div>
                                                
                                                     </div>
                                                </div>
                                                 <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17  m-0 color-grey mt-4">Surname</label>
                                                            <input type="text" name="sur_name" autocomplete="off" min="0" placeholder="Surname" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Surname'"  class="single-input p-0 transparent-input">
                                                        </div>
                                                     </div>
                                                </div>
                                            </div>
                                                <div class="row">
                                                <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                        <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4">ID Number</label><input type="Number" name="id_number" autocomplete="off" min="0" placeholder="eg.961008005008" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'IDNumber'"  class="single-input p-0 transparent-input">
                                                       
                                                        </div>
                                                    </div>
                                                     </div>
                                                </div>
                                                 <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17  m-0 color-grey mt-4 pl-0">Marital Status</label>  <div class="default-select  title" id="default-select"><select>
                                                            <option value="1">Single</option>
                                                        <option value="2">Married</option>
                                                        <option value="3">Widow</option></select>
                                                        </div></div>
                                                     </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                             <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4">Cell phone number</label><input type="number" name="contact_number" autocomplete="off" min="0" placeholder="082 722 9389" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Contact Number'"  class="single-input p-0 transparent-input">
                                                        </div>
                                                     </div>
                                                </div>
                                             <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4">Email Address</label><input type="text" name="email_address" autocomplete="off" min="0" placeholder="eg. stefan@yourmail.com" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Email Address'"  class="single-input p-0 transparent-input">
                                                        </div>
                                                     </div>
                                                </div>
                                            
                                        </div>
                                        <div class="row">	
                                         <div class="col-lg-12 mt-4">
                                         <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4" for="addres">Address</label><input type="text" name="addres" list="addresses" id="autoComplete" autocomplete="off" placeholder="Start typing" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Start typing'"  class="single-input p-0 transparent-input">
                                                            <datalist id="dataList">
                                                        </div>
                                                        <div id="listitems" style='display:none'>
                                                            <div class="row">
                                                                <div class="col-lg-6 mt-4">
                                                                  
                                                                        <div class="single_input">
                                                                        <div class="mt-10 wide">
                                                                            <label class="left f-12 l-17 m-0 color-grey mt-4">City</label><input type="text" name="city" id="city" autocomplete="off" min="0" placeholder="City" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'City'"  class="single-input p-0 transparent-input">
                                                                        </div>
                                                                   
                                                                     </div>
                                                                </div>
                                                                 <div class="col-lg-6 mt-4">
                                                                    <div class="single_input">
                                                                        <div class="mt-10 wide">
                                                                            <label class="left f-12 l-17  m-0 color-grey mt-4">Province</label><input type="text" name="province" id="province" autocomplete="off" min="0" placeholder="Province" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Province'"  class="single-input p-0 transparent-input">
                                                                        </div>
                                                                     </div>
                                                                </div></div>
                                                                <div class="row">
                                                                    <div class="col-lg-6 mt-4">
                                                                        <div class="single_input">
                                                                            <div class="mt-10 wide">
                                                                                <label class="left f-12 l-17  m-0 color-grey mt-4">Code</label><input type="text" name="code" id="code" autocomplete="off" min="0" placeholder="Code" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Code'"  class="single-input p-0 transparent-input">
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
                                        <div class="col-md-12">
                                        <div class="mt-10 wide">
                                        <label class="left f-12 l-17 m-0 color-grey mt-4">Beneficiart relationship</label>
                                        <div class="col-sm-5 pl-0">
                                        <div class="default-select  title" id="default-select">
                                                  <select >
                                                    <option value="1">Select</option>
                                                    <option value="1">Miss.</option>
                                                    <option value="1">Mrs.</option>
                                                    <option value="1">Mr.</option>
                                                    
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
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4">Full name</label><input type="text" name="Full_name" autocomplete="off" min="0" placeholder="Full Name" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'FullName'"  class="single-input p-0 transparent-input">
                                                        </div>
                                                   
                                                     </div>
                                                </div>
                                                 <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17  m-0 color-grey mt-4">Surname</label><input type="text" name="sur_name" autocomplete="off" min="0" placeholder="Surname" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Surname'"  class="single-input p-0 transparent-input">
                                                        </div>
                                                     </div>
                                                </div>
                                            </div>
                                                <div class="row">
                                                <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                        <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4">ID Number</label><input type="Number" name="id_number" autocomplete="off" min="0" placeholder="eg.961008005008" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'IDNumber'"  class="single-input p-0 transparent-input">
                                                       
                                                        </div>
                                                    </div>
                                                     </div>
                                                </div>
                                             <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4">Email Address</label><input type="text" name="email_address" autocomplete="off" min="0" placeholder="eg. stefan@yourmail.com" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Email Address'"  class="single-input p-0 transparent-input">
                                                        </div>
                                                     </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                             <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4">Cell phone number</label><input type="number" name="contact_number" autocomplete="off" min="0" placeholder="Contact Number" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Contact Number'"  class="single-input p-0 transparent-input">
                                                        </div>
                                                     </div>
                                                </div>
                                             <div class="col-lg-6 mt-4">
                                                    <div class="single_input">
                                                        <div class="mt-10 wide">
                                                            <label class="left f-12 l-17 m-0 color-grey mt-4">Alternative contact number</label><input type="number" name="contact_number" autocomplete="off" min="0" placeholder="Contact Number" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Contact Number'"  class="single-input p-0 transparent-input">
                                                        </div>
                                                     </div>
                                                </div>
                                            
                                        </div>
                                        </div>
                                        <div class="button-group-area mt-5">
                                            <a href="javascript:void(0)" class="genric-btn color-azure-blue border-azure-blue large preBtn w-25 font-strong border-3x">Back</a>
                                            <a href="javascript:void(0)" class="genric-btn success-border large w-25 bg-azure-blue nextBtn color-white font-strong border-3x mb-3">Next</a>
                                            </div> 
                                    </div>
                                    
                                    <div class="col-md-4 col-sm-12 ">
                                        <div class="pad bg-blue-gredient p-30 border-5x">
                                            <h2 class="text-left f-24 l-36 mb-15">Your policy summary</h2>
                                                <div class="bg-gray pl-30 pt-10 pb-2 mb-20">
                                                    <label class="color-white f-30 l-50 ls-0-56 font-strong lh-50">R 135.00</label>
                                                    <p class="f-10 l-15 color-white ls-15 uppercase">your total monthly premium</p>
                                                </div>
                                                <p class="f-14 lh-22 ls-0-18">Main member, spouse and children only</p>
                                                <label class="f-14 lh-22 ls-0-18 color-white w-100">Spouse: 1</label>
                                                <label class="f-14 lh-22 ls-0-18 color-white w-100">Children: 2</label>
                                                <hr class="border-white-top">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                    <p class="f-12 lh-15 family-strong uppercase mb-0">Basic premium</p>
                                                    </div>
                                                    <div class="col-sm-6 text-right">
                                                        <label class="f-14 lh-28 ls-0-21 color-white family-strong">R200.00</label>
                                                    </div>
                                                </div>
                                                <hr class="border-white-top">
                                                <p class="uppercase f-12 lh-15 family-strong mb-0">Benefit amount</p>
                                                <label class="f-37 lh-54 font-strong color-white">R70 000</label>
                                                <div class="mt-5 container box border-3x p-3">
                                                    <p class="f-14 lh-22 ls-0-18 font-strong ">Extended Funeral plan</p>
                                                    <label class="f-14 lh-22 ls-0-18 color-white w-100">Parent-in-law: 1</label>
                                                    <hr class="border-white-top">
                                                    <div class="row">
                                                    <div class="col-sm-6">
                                                    <p class="f-12 lh-15 family-strong uppercase mb-0">Basic premium</p>
                                                    </div>
                                                    <div class="col-sm-6 text-right">
                                                        <label class="f-14 lh-28 ls-0-21 color-white family-strong">R75.00</label>
                                                    </div>
                                                    </div>
                                                    <hr class="border-white-top">
                                                    <p class="uppercase f-12 lh-15 family-strong mb-0">Benefit amount</p>
                                                <label class="f-37 lh-54 font-strong color-white">R10 000</label>
                                                </div>
                                                <a href="javascript:void(0)" class="genric-btn info bold-letters get-a-quote width-full bg-bright-blue mt-3 pt-10 pb-10">Call me back</a>
                                                <p class="wow text-center f-14 mt-2">Need assistance? We'll call you.</p>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                             
                          </div>

                          <div class="panel panel-primary setup-content mt-5" id="step-4">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <div class="content">
                                            <div class="tool">
                                                <h3 class="panel-title f-48 l-52 color-navy ls-0-minus-2">Your dependent/s details</h3>
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
                                        <hr class="mt-4 border-top-columbia-blue">
                                        <p class="f-24 l-32 blue-gray mt-4 ls-0-1">Main member, spouse and children only benefit details</p>
                                        <p class="f-12 l-20 gray ls-0-1 azure-blue">Why do we need this?</p>
                                        </div>
                                        <a href="javascript:void(0)" class="arrow-button border-3x blue-gray"><img src="img/icn_arrow_right_10.png" class="arrow-down1"><span class="arrow-down">Spouse detials</span></a>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="single_input">
                                                  
                                                    <div class="mt-10 wide">
                                                        <label class="left f-12 l-17 m-0 color-grey">Full name</label><input type="text" name="Full_name" autocomplete="off" min="0" placeholder="Full Name" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'FullName'"  class="single-input p-0 transparent-input">
                                                    </div>
                                            
                                                 </div>
                                            </div>
                                             <div class="col-lg-6">
                                                <div class="single_input">
                                                    <div class="mt-10 wide">
                                                        <label class="left f-12 l-17  m-0 color-grey">Surname</label>
                                                        <input type="text" name="sur_name" autocomplete="off" min="0" placeholder="Surname" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Surname'"  class="single-input p-0 transparent-input">
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                            <div class="row">
                                            <div class="col-lg-6">
                                                <div class="single_input">
                                                    <div class="single_input">
                                                    <div class="mt-10 wide">
                                                        <label class="left f-12 l-17 m-0 color-grey">ID Number</label><input type="Number" name="id_number" autocomplete="off" min="0" placeholder="eg.961008005008" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'IDNumber'"  class="single-input p-0 transparent-input">
                                                   
                                                    </div>
                                                </div>
                                                 </div>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)" class="arrow-button border-3x blue-gray"><img src="img/icn_arrow_right_10.png" class="arrow-down1"><span class="arrow-down">Child #1 details </span></a>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="single_input">
                                                  
                                                    <div class="mt-10 wide">
                                                        <label class="left f-12 l-17 m-0 color-grey">Full name</label><input type="text" name="Full_name" autocomplete="off" min="0" placeholder="Full Name" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'FullName'"  class="single-input p-0 transparent-input">
                                                    </div>
                                            
                                                 </div>
                                            </div>
                                             <div class="col-lg-4">
                                                <div class="single_input">
                                                    <div class="mt-10 wide">
                                                        <label class="left f-12 l-17  m-0 color-grey">Surname</label>
                                                        <input type="text" name="sur_name" autocomplete="off" min="0" placeholder="Surname" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Surname'"  class="single-input p-0 transparent-input">
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                            <div class="row">
                                            <div class="col-lg-6">
                                                <div class="single_input">
                                                    <div class="single_input">
                                                    <div class="mt-10 wide">
                                                        <label class="left f-12 l-17 m-0 color-grey">ID Number</label><input type="Number" name="id_number" autocomplete="off" min="0" placeholder="eg.961008005008" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'IDNumber'"  class="single-input p-0 transparent-input">
                                                        <label class="mt-3"><input type="radio" name="optradio" class="mr-3" checked>I don’t know the ID number</label>
                                                    </div>
                                                </div>
                                                 </div>
                                            </div>
                                        </div>
                                        <div class="row"> <div class="col-6"> <div class="single_input"> <div class="mt-10 wide"> <label class="left f-12 l-17 m-0 color-grey mt-4">Date of birth</label> <input type="date" name="dateofbirth" placeholder="Date of Birth" class="single-input p-0 transparent-input"> </div></div></div><div class="col-6"> <section class="radio"> <label class="left f-12 l-17 m-0 color-grey mt-4 w-100 ml-1">Gender</label> <div class="mt-1"> <input type="radio" id="male" name="select" value="1" checked=""> <label class="radio border-3x border-1-blue-gray" for="male"> <h2 class="f-10 l-15 uppercase blue-gray m-0">Male</h2> </label> </div><div class="mt-1"> <input type="radio" id="female" name="select" value="3"> <label class="radio border-3x border-1-blue-gray" for="female"> <h2 class="f-10 l-15 uppercase blue-gray m-0">Female</h2> </label> </div></section> </div></div>
                                        <a href="javascript:void(0)" class="arrow-button border-3x blue-gray"><img src="img/icn_arrow_right_10.png" class="arrow-down1"><span class="arrow-down">Child #2 details </span></a>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="single_input">
                                                  
                                                    <div class="mt-10 wide">
                                                        <label class="left f-12 l-17 m-0 color-grey">Full name</label><input type="text" name="Full_name" autocomplete="off" min="0" placeholder="Full Name" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'FullName'"  class="single-input p-0 transparent-input">
                                                    </div>
                                            
                                                 </div>
                                            </div>
                                             <div class="col-lg-4">
                                                <div class="single_input">
                                                    <div class="mt-10 wide">
                                                        <label class="left f-12 l-17  m-0 color-grey">Surname</label>
                                                        <input type="text" name="sur_name" autocomplete="off" min="0" placeholder="Surname" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Surname'"  class="single-input p-0 transparent-input">
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                            <div class="row mb-69">
                                            <div class="col-lg-6">
                                                <div class="single_input">
                                                    <div class="single_input">
                                                    <div class="mt-10 wide">
                                                        <label class="left f-12 l-17 m-0 color-grey">ID Number</label><input type="Number" name="id_number" autocomplete="off" min="0" placeholder="eg.961008005008" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'IDNumber'"  class="single-input p-0 transparent-input">
                                                    </div>
                                                    <label class="mt-3"><input type="radio" name="optradio1" class="mr-3">I don’t know the ID number</label>
                                                </div>
                                                 </div>
                                            </div>
                                        </div>
                                        <hr class="border-top-gray">
                                        <a href="javascript:void(0)" class="arrow-button border-3x blue-gray mt-69"><img src="img/icn_arrow_right_10.png" class="arrow-down1"><span class="arrow-down">Add extended Family Funeral </span></a>
                                        <p class="uppercase f-16 l-23 ls-0-5 blue-gray mt-3">John will get</p>
                                        <div class="row">
                                            <div class="container">
                                            <div class="col-6 pl-0">
                                            <div class="default-select" id="default-select">
                                                <select style="display: none;">
                                                  <option value="1">R 10 000</option>
                                                  <option value="1">R 20 000</option>
                                                  <option value="1">R 30 000</option>
                                                  <option value="1">R 50 000</option>
                                                  <option value="1">R 70 000</option>
                                                </select><div class="nice-select" tabindex="0"><span class="current">R 10 000</span><ul class="list"><li data-value="1" class="option selected">R 10 000</li><li data-value="1" class="option">R 20 000</li><li data-value="1" class="option">R 30 000</li><li data-value="1" class="option">R 50 000</li><li data-value="1" class="option">R 70 000</li></ul></div>
                                              </div>
                                              </div>
                                              <div class="col-6"></div>
                                              </div>
                                              </div>
                                            <div class="w-100 mt-2 mb-87">
                                                <p class="f-24 l-32 ls-0-minus-2 blue-gray w-100">worth of cover for <b class="family-strong blue-gray">R 75.00</b> per month.</p>
                                                <div class="azure-blue"><a href="javascript:void(0)"><span class="azure-blue f-14 l-20 ls-0-5 uppercase mr-2 family-strong">Edit</span></a> | <a href="javascript:void(0)"><span class=" ml-2 azure-blue f-14 l-20 ls-0-5 uppercase family-strong">Remove</span></a></div>
                                            </div>
                                            <hr>
                                        
                                        <div class="button-group-area mt-5">
                                            <a href="javascript:void(0)" class="genric-btn color-azure-blue border-azure-blue large preBtn w-25 font-strong border-3x">Back</a>
                                            <a href="javascript:void(0)" class="genric-btn success-border large w-25 bg-azure-blue nextBtn color-white font-strong border-3x mb-3">Next</a>
                                            </div> 
                                    </div>
                                    
                                    <div class="col-md-4 col-sm-12 ">
                                        <div class="pad bg-blue-gredient p-30 border-5x">
                                            <h2 class="text-left f-24 l-36 mb-15">Your policy summary</h2>
                                                <div class="bg-gray pl-30 pt-10 pb-2 mb-20">
                                                    <label class="color-white f-30 l-50 ls-0-56 font-strong lh-50">R 135.00</label>
                                                    <p class="f-10 l-15 color-white ls-15 uppercase">your total monthly premium</p>
                                                </div>
                                                <p class="f-14 lh-22 ls-0-18">Main member, spouse and children only</p>
                                                <label class="f-14 lh-22 ls-0-18 color-white w-100">Spouse: 1</label>
                                                <label class="f-14 lh-22 ls-0-18 color-white w-100">Children: 2</label>
                                                <hr class="border-white-top">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                    <p class="f-12 lh-15 family-strong uppercase mb-0">Basic premium</p>
                                                    </div>
                                                    <div class="col-sm-6 text-right">
                                                        <label class="f-14 lh-28 ls-0-21 color-white family-strong">R200.00</label>
                                                    </div>
                                                </div>
                                                <hr class="border-white-top">
                                                <p class="uppercase f-12 lh-15 family-strong mb-0">Benefit amount</p>
                                                <label class="f-37 lh-54 font-strong color-white">R70 000</label>
                                                <div class="mt-5 container box border-3x p-3">
                                                    <p class="f-14 lh-22 ls-0-18 font-strong ">Extended Funeral plan</p>
                                                    <label class="f-14 lh-22 ls-0-18 color-white w-100">Parent-in-law: 1</label>
                                                    <hr class="border-white-top">
                                                    <div class="row">
                                                    <div class="col-sm-6">
                                                    <p class="f-12 lh-15 family-strong uppercase mb-0">Basic premium</p>
                                                    </div>
                                                    <div class="col-sm-6 text-right">
                                                        <label class="f-14 lh-28 ls-0-21 color-white family-strong">R75.00</label>
                                                    </div>
                                                    </div>
                                                    <hr class="border-white-top">
                                                    <p class="uppercase f-12 lh-15 family-strong mb-0">Benefit amount</p>
                                                <label class="f-37 lh-54 font-strong color-white">R10 000</label>
                                                </div>
                                                <a href="javascript:void(0)" class="genric-btn info bold-letters get-a-quote width-full bg-bright-blue mt-3 pt-10 pb-10">Call me back</a>
                                                <p class="wow text-center f-14 mt-2">Need assistance? We'll call you.</p>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                          </div>
                          <div class="panel panel-primary setup-content mt-5" id="step-5">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-10 col-sm-12">
                                        <div class="content">
                                            <div class="tool">
                                                <h3 class="panel-title f-48 l-52 color-navy ls-0-minus-2">This is the summary of your funeral plan</h3>
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
                                       <hr class="mt-78 border-top-gray">
                                       <div class="row">
                                        <div class="col-6 text-left"><p class="f-24 l-32 blue-gray mt-2">Your funeral plan summary:</p></div>
                                        <div class="col-6 text-right"><label class="f-30 l-50 azure-blue family-strong">R 275.00</label></div>
                                      </div>
                                       <hr class="border-top-gray">
                                       <div class="table-responsive">
                                        <table class="table table-invoice">
                                            <thead>
                                                <tr>
                                                    <th class="border-0 f-12 l-20 gray ls-0-1 pl-0">Your funeral plan:</th>
                                                    <th class="border-0 f-12 l-20 gray ls-0-1 pl-0">Cover amount</th>
                                                    <th class="border-0 text-right f-12 l-20 gray ls-0-1 pr-0">Monthly premium</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="pl-0 border-0">
                                                        <span class="text-inverse f-18 l-28 azure-blue">Main member, spous<br>and children only</span>
                                                        <br/>
                                                        <small class="f-12 l-20 gray">Spouse: 1</small><br/>
                                                        <small class="f-12 l-20 gray">Children: 1</small>
                                                        <span class="delicon"><svg width="14" height="17" class="delicon" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.95036 13.9266C5.14908 13.9191 5.30388 13.7524 5.29668 13.5533L4.76676 4.92303C4.75956 4.72431 4.59252 4.56951 4.3938 4.57635C4.19508 4.58391 4.03992 4.75095 4.04712 4.94967L4.5774 13.58C4.5846 13.7787 4.75164 13.9338 4.95036 13.9266ZM11.057 14.6466C11.0084 15.0264 10.7345 15.3666 10.337 15.3666H3.85703C3.45923 15.3666 3.19175 15.0304 3.13703 14.6466L2.41703 3.12664H11.777L11.057 14.6466ZM5.29703 2.40663H8.89703V0.966992H5.29703V2.40663ZM13.2172 2.40707H9.61719V0.96743C9.61719 0.56963 9.29463 0.24707 8.89719 0.24707H5.29719C4.89939 0.24707 4.57719 0.56963 4.57719 0.96743V2.40707H0.977187C0.778467 2.40707 0.617188 2.56835 0.617188 2.76743C0.617188 2.96615 0.778467 3.12707 0.977187 3.12707H1.69719L2.41719 14.6471C2.53311 15.4351 3.06195 16.0871 3.85719 16.0871H10.3372C11.1324 16.0871 11.6418 15.4272 11.7772 14.6471L12.4972 3.12707H13.2172C13.4159 3.12707 13.5772 2.96615 13.5772 2.76743C13.5772 2.56835 13.4159 2.40707 13.2172 2.40707ZM9.24536 13.9263C9.44408 13.9338 9.61112 13.7783 9.61832 13.5796L10.1403 4.94932C10.1475 4.7506 9.99236 4.58356 9.79364 4.576C9.59492 4.56916 9.42824 4.72432 9.42104 4.92304L8.89868 13.5537C8.89148 13.7524 9.04664 13.9191 9.24536 13.9263ZM7.09703 13.9266C7.29575 13.9266 7.45703 13.7657 7.45703 13.5666V4.92664C7.45703 4.72756 7.29575 4.56664 7.09703 4.56664C6.89831 4.56664 6.73703 4.72756 6.73703 4.92664V13.5666C6.73703 13.7657 6.89831 13.9266 7.09703 13.9266Z" fill="#008FE0"/>
                                                            </svg></span>
                                                    </td>
                                                    <td class="f-18 l-28 azure-blue border-0">R70 000</td>
                                                    <td class="text-right f-18 l-28 azure-blue border-0">R200.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="pl-0">
                                                        <span class="text-inverse f-18 l-28 azure-blue">Extended Family Funeral</span>
                                                        <br/>
                                                        <small class="f-12 l-20 gray">Parent-in-law :1</small>
                                                        <span class="delicon"><svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.95036 13.9266C5.14908 13.9191 5.30388 13.7524 5.29668 13.5533L4.76676 4.92303C4.75956 4.72431 4.59252 4.56951 4.3938 4.57635C4.19508 4.58391 4.03992 4.75095 4.04712 4.94967L4.5774 13.58C4.5846 13.7787 4.75164 13.9338 4.95036 13.9266ZM11.057 14.6466C11.0084 15.0264 10.7345 15.3666 10.337 15.3666H3.85703C3.45923 15.3666 3.19175 15.0304 3.13703 14.6466L2.41703 3.12664H11.777L11.057 14.6466ZM5.29703 2.40663H8.89703V0.966992H5.29703V2.40663ZM13.2172 2.40707H9.61719V0.96743C9.61719 0.56963 9.29463 0.24707 8.89719 0.24707H5.29719C4.89939 0.24707 4.57719 0.56963 4.57719 0.96743V2.40707H0.977187C0.778467 2.40707 0.617188 2.56835 0.617188 2.76743C0.617188 2.96615 0.778467 3.12707 0.977187 3.12707H1.69719L2.41719 14.6471C2.53311 15.4351 3.06195 16.0871 3.85719 16.0871H10.3372C11.1324 16.0871 11.6418 15.4272 11.7772 14.6471L12.4972 3.12707H13.2172C13.4159 3.12707 13.5772 2.96615 13.5772 2.76743C13.5772 2.56835 13.4159 2.40707 13.2172 2.40707ZM9.24536 13.9263C9.44408 13.9338 9.61112 13.7783 9.61832 13.5796L10.1403 4.94932C10.1475 4.7506 9.99236 4.58356 9.79364 4.576C9.59492 4.56916 9.42824 4.72432 9.42104 4.92304L8.89868 13.5537C8.89148 13.7524 9.04664 13.9191 9.24536 13.9263ZM7.09703 13.9266C7.29575 13.9266 7.45703 13.7657 7.45703 13.5666V4.92664C7.45703 4.72756 7.29575 4.56664 7.09703 4.56664C6.89831 4.56664 6.73703 4.72756 6.73703 4.92664V13.5666C6.73703 13.7657 6.89831 13.9266 7.09703 13.9266Z" fill="#008FE0"/>
                                                            </svg> </span>
                                                    </td>
                                                    <td class="f-18 l-28 azure-blue">R10 000</td>
                                                    <td class="text-right f-18 l-28 azure-blue">R75.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>                                    
                                        </div>
                                        <hr class="border-top-columbia-blue">

                                        <label class="mt-3"><input type="radio" name="tandc" class="mr-3"> I accept the <b><a href="terms-conditions.html" class="color-gray">terms and conditions</a></label>
                                        <div class="button-group-area mt-5">
                                            <a href="javascript:void(0)" class="genric-btn color-azure-blue border-azure-blue large preBtn w-25 font-strong border-3x">Back</a>
                                            <a href="javascript:void(0)" class="genric-btn success-border large w-25 bg-azure-blue nextBtn color-white font-strong border-3x mb-3">Next</a>
                                            </div> 
                                    </div>
                                    </div>
                            </div>
                          </div>
                          <div class="panel panel-primary setup-content mt-5" id="step-6">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
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
                                            <div class="col-lg-4">
                                                <div class="wide">
                                                    <label class="left f-12 l-17 m-0 color-grey ">Bank</label>
                                                    <div class="default-select title" id="default-select">
                                                      <select>
                                                        <option value="1">FNB Bank</option>
                                                        <option value="1">NED Bank</option>
                                                        <option value="1">ABSA Bank</option>
                                                        
                                                      </select>
                                                    </div>
                                                            </div>
                                            </div>
                                             <div class="col-lg-4">
                                                <div class="single_input">
                                                    <div class="mt-10 wide">
                                                        <label class="left f-12 l-17  m-0 color-grey">Branch</label>
                                                        <input type="text" name="branch" autocomplete="off" min="0" placeholder="Branch" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Branch'"  class="single-input p-0 transparent-input">
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                            <div class="row">
                                            <div class="col-lg-6">
                                                <div class="single_input">
                                                    <div class="single_input">
                                                    <div class="mt-10 wide">
                                                        <label class="left f-12 l-17 m-0 color-grey">Branch Code</label><input type="Number" name="Code" autocomplete="off" min="0" placeholder="Code" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Code'"  class="single-input p-0 transparent-input">
                                                   
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
                                                        <input type="text" name="aname" autocomplete="off" min="0" placeholder="Name" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Name'"  class="single-input p-0 transparent-input">
                                                    </div>
                                                 </div>
                                            </div>
                                             <div class="col-lg-4">
                                                <div class="single_input">
                                                    <div class="mt-10 wide">
                                                        <label class="left f-12 l-17  m-0 color-grey">Account number</label>
                                                        <input type="number" name="number" autocomplete="off" min="0" placeholder="Number" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Number'"  class="single-input p-0 transparent-input">
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-6">
                                                <div class="wide">
                                                    <label class="left f-12 l-17 m-0 color-grey ">Account type</label>
                                                    <div class="default-select title" id="default-select">
                                                      <select>
                                                        <option value="1">FNB Bank</option>
                                                        <option value="1">NED Bank</option>
                                                        <option value="1">ABSA Bank</option>
                                                        
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
                                                      <select>
                                                        <option value="1">FNB Bank</option>
                                                        <option value="1">NED Bank</option>
                                                        <option value="1">ABSA Bank</option>
                                                        
                                                      </select>
                                                    </div>
                                                            </div>
                                            </div>
                                             <div class="col-lg-5">
                                                <div class="single_input">
                                                    <div class="mt-10 wide">
                                                        <label class="left f-12 l-17  m-0 color-grey">When would you like your cover to start?</label>
                                                        <input type="date" name="branch" autocomplete="off" min="0" class="single-input p-0 transparent-input">
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                        
                                        <div class="button-group-area mt-5">
                                            <a href="javascript:void(0)" class="genric-btn color-azure-blue border-azure-blue large preBtn w-25 font-strong border-3x">Back</a>
                                            <a href="success.html" class="genric-btn success-border large w-25 bg-azure-blue nextBtn color-white font-strong border-3x mb-3">Confirm</a>
                                            </div> 
                                    </div>
                                    
                                    <div class="col-md-4 col-sm-12 ">
                                        <div class="pad bg-blue-gredient p-30 border-5x">
                                            <h2 class="text-left f-24 l-36 mb-15">Your policy summary</h2>
                                                <div class="bg-gray pl-30 pt-10 pb-2 mb-20">
                                                    <label class="color-white f-30 l-50 ls-0-56 font-strong lh-50">R 135.00</label>
                                                    <p class="f-10 l-15 color-white ls-15 uppercase">your total monthly premium</p>
                                                </div>
                                                <p class="f-14 lh-22 ls-0-18">Main member, spouse and children only</p>
                                                <label class="f-14 lh-22 ls-0-18 color-white w-100">Spouse: 1</label>
                                                <label class="f-14 lh-22 ls-0-18 color-white w-100">Children: 2</label>
                                                <hr class="border-white-top">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                    <p class="f-12 lh-15 family-strong uppercase mb-0">Basic premium</p>
                                                    </div>
                                                    <div class="col-sm-6 text-right">
                                                        <label class="f-14 lh-28 ls-0-21 color-white family-strong">R200.00</label>
                                                    </div>
                                                </div>
                                                <hr class="border-white-top">
                                                <p class="uppercase f-12 lh-15 family-strong mb-0">Benefit amount</p>
                                                <label class="f-37 lh-54 font-strong color-white">R70 000</label>
                                                <div class="mt-5 container box border-3x p-3">
                                                    <p class="f-14 lh-22 ls-0-18 font-strong ">Extended Funeral plan</p>
                                                    <label class="f-14 lh-22 ls-0-18 color-white w-100">Parent-in-law: 1</label>
                                                    <hr class="border-white-top">
                                                    <div class="row">
                                                    <div class="col-sm-6">
                                                    <p class="f-12 lh-15 family-strong uppercase mb-0">Basic premium</p>
                                                    </div>
                                                    <div class="col-sm-6 text-right">
                                                        <label class="f-14 lh-28 ls-0-21 color-white family-strong">R75.00</label>
                                                    </div>
                                                    </div>
                                                    <hr class="border-white-top">
                                                    <p class="uppercase f-12 lh-15 family-strong mb-0">Benefit amount</p>
                                                <label class="f-37 lh-54 font-strong color-white">R10 000</label>
                                                </div>
                                                <a href="javascript:void(0)" class="genric-btn info bold-letters get-a-quote width-full bg-bright-blue mt-3 pt-10 pb-10">Call me back</a>
                                                <p class="wow text-center f-14 mt-2">Need assistance? We'll call you.</p>
                                        </div>
                                    </div>
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
        $target.find('input:eq(0)').focus();
    }
});

allNextBtn.click(function () {
    var curStep = $(this).closest(".setup-content"),
        curStepBtn = curStep.attr("id"),
        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
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
    $(document).ready(function() {
var max_fields      = 10; //maximum input boxes allowed
var wrapper         = $(".input_fields_wrap"); //Fields wrapper
var add_button      = $(".add_field_button"); //Add button ID

var x = 1; //initlal text box count
$(add_button).on("click",function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields){ //max input box allowed
        x++; //text box increment
        $(wrapper).append('<div class="card new mb-5 mt-5"> <div class="container mt-3 mb-3"> <p class="f-18 l-26 blue-gray">Extended Family Funeral</p><div class="row mt-4"> <div class="col-sm-6"> <label class="left f-12 l-17 gray m-0">Which family member?</label> <div class="col-md-12 pl-0"><div class="default-select title" id="default-select"> <select style="display: none;"> <option value="1">Miss.</option> <option value="1">Mrs.</option> <option value="1">Mr.</option> </select><div class="nice-select" tabindex="0"><span class="current">Miss.</span><ul class="list"><li data-value="1" class="option selected focus">Miss.</li><li data-value="1" class="option">Mrs.</li><li data-value="1" class="option">Mr.</li></ul></div></div></div></div><div class="col-sm-6"></div><div class="col-lg-6 mt-4"> <div class="single_input"> <div class="mt-10 wide"> <label class="left f-12 l-17 m-0 color-grey mt-4">Full name</label><input type="text" name="Full_name" autocomplete="off" min="0" placeholder="FullName" onfocus="this.placeholder=" onblur="this.placeholder=FullName" class="single-input p-0 transparent-input"> </div></div></div><div class="col-lg-4 mt-4"> <div class="single_input"> <div class="mt-10 wide"> <label class="left f-12 l-17 m-0 color-grey mt-4">Surname</label> <input type="text" name="sur_name" autocomplete="off" min="0" placeholder="Surname" onfocus="this.placeholder=" onblur="this.placeholder=Surname" class="single-input p-0 transparent-input"> </div></div></div><div class="col-lg-6 mt-4"> <div class="single_input"> <div class="single_input"> <div class="mt-10 wide"> <label class="left f-12 l-17 m-0 color-grey mt-4">ID Number</label><input type="Number" name="id_number" autocomplete="off" min="0" placeholder="ID Number" onfocus="this.placeholder=" onblur="this.placeholder=ID Number" class="single-input p-0 transparent-input"> </div></div></div></div><div class="col-lg-6 mt-4"></div><div class="col-lg-12 mt-4"> <div class=""> <label><input type="radio" name="optradio" class="mr-3">I don’t know the ID number</label> <div class="row"> <div class="col-6"> <div class="single_input"> <div class="mt-10 wide"> <label class="left f-12 l-17 m-0 color-grey mt-4">Date of birth</label> <input type="date" name="dateofbirth" placeholder="Date of Birth" class="single-input p-0 transparent-input"> </div></div></div><div class="col-6"> <section class="radio"> <label class="left f-12 l-17 m-0 color-grey mt-4 w-100 ml-1">Gender</label> <div class="mt-1"> <input type="radio" id="male" name="select" value="1" checked> <label class="radio border-3x border-1-blue-gray" for="male"> <h2 class="f-10 l-15 uppercase blue-gray m-0">Male</h2> </label> </div><div class="mt-1"> <input type="radio" id="female" name="select" value="3"> <label class="radio border-3x border-1-blue-gray" for="female"> <h2 class="f-10 l-15 uppercase blue-gray m-0">Female</h2> </label> </div></section> </div></div><label class="mt-3 w-100 f-12 l-17 color-gray">How much cover would you like?</label><section class="radio"> <div class="pl-0"> <input type="radio" id="control_01" name="select" value="1" checked> <label class="radio border-3x border-1-blue-gray" for="control_01"> <h2 class="f-10 l-15 uppercase blue-gray m-0">R 5 000</h2> </label> </div><div> <input type="radio" id="control_02" name="select" value="3"> <label class="radio border-3x border-1-blue-gray" for="control_02"> <h2 class="f-10 l-15 uppercase blue-gray m-0">R 10 000</h2> </label> </div><div> <input type="radio" id="control_03" name="select" value="3"> <label class="radio border-3x border-1-blue-gray" for="control_03"> <h2 class="f-10 l-15 uppercase blue-gray m-0">R 15 000</h2> </label> </div><div> <input type="radio" id="control_04" name="select" value="4"> <label class="radio border-3x border-1-blue-gray" for="control_04"> <h2 class="f-10 l-15 uppercase blue-gray m-0">R 20 000</h2> </label> </div><div class="pr-0"> <input type="radio" id="control_05" name="select" value="5"> <label class="radio border-3x border-1-blue-gray" for="control_05"> <h2 class="f-10 l-15 uppercase blue-gray m-0">R 35 000</h2> </label> </div></section></div></div><div class="col-lg-12"> <div class="button-group-area mt-4"> <a href="javascript:void(0)" class="genric-btn color-azure-blue border-azure-blue large w-25 font-strong border-3x uppercase remove_field">Cancel</a> <a href="javascript:void(0)" class="genric-btn success-border large w-25 bg-azure-blue color-white font-strong border-3x uppercase">Add to plan</a> </div></div></div></div></div>'); //add input box
    }
});

$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').parent('div').parent('div').parent('div').parent('div').remove(); x--;
})
});
</script>

<script>
$(".plan").on("click",function(e){ //on add input button click
var plan = $(this).attr('id');
//$(".tick-icon").val(plan).append('<i class="fa fa-check" aria-hidden="true" style="color:#008FE0;padding-right:0px;"></i>');
var planname = $(this).text();
var optionvalue = $(this).attr('data-id');
$.post("readRecords.php", {
plan: plan,
planname: planname,
option: optionvalue
}, function (data, status) {
// close the popup
$("#exampleModalCenter").modal("hide");
$(".records_content").html(data);
});  
            
});


</script>