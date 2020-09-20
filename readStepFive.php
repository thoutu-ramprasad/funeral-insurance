<?php 
session_start();
$planamount = $_SESSION['planamount'];
$planname = $_SESSION['json_data']['planname'];
if(isset($_SESSION['json_data_array'])){
$sessionarray = $_SESSION['json_data_array'];
for($i=0;$i<count($sessionarray); $i++){
switch ($sessionarray[$i]['name']) {
  case "coveramount":
    $coveramount = $sessionarray[$i]['value'];
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
	case "tandc":
    $tandc = $sessionarray[$i]['value'];
    break;
  default:
    //echo "Your favorite color is neither red, blue, nor green!";
}
}
}
?>                
<div class="la-pagination la-display-m mb-5">
                  <div class="container">
                  <div class="row">
                    <ul class="pagination pg-blue col-12 p-0">
                      <li class="page-item col-7 p-0">
                        <a href="#" class="page-link la-page-l" aria-label="Previous">
                          <span aria-hidden="true"> <!--&laquo;--><img src="img/icn_arrow_left_10-blue.png"> 05 </span>
                          <span class="sr-only">Previous</span>
                        </a><span class="uppercase f-14 l-20 ls-0-5">Quote summary</span>
                      </li>

                      <li class="page-item col-5 p-0">
                        <a class="page-link la-page-l" aria-label="Next">
                          <span aria-hidden="true">step 5 of 6 <img src="img/icn_arrow_right_10-blue.png"> <!--&raquo;--></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                  
                  </div>
                  </div>                 
                               <div class="row">
                                    <div class="p-0 col-md-10 col-sm-12">
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
                                        <div class="col-6 text-right"><label class="f-30 l-50 azure-blue family-strong"><?php echo $planamount; ?></label></div>
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
                                                        <span class="text-inverse f-18 l-28 azure-blue"><?php echo $planname; ?></span>
                                                        <br/>
                                                        <small class="f-12 l-20 gray">Spouse: 1</small><br/>
                                                        <small class="f-12 l-20 gray">Children: 1</small>
                                                        <span class="delicon"><svg width="14" height="17" class="delicon" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.95036 13.9266C5.14908 13.9191 5.30388 13.7524 5.29668 13.5533L4.76676 4.92303C4.75956 4.72431 4.59252 4.56951 4.3938 4.57635C4.19508 4.58391 4.03992 4.75095 4.04712 4.94967L4.5774 13.58C4.5846 13.7787 4.75164 13.9338 4.95036 13.9266ZM11.057 14.6466C11.0084 15.0264 10.7345 15.3666 10.337 15.3666H3.85703C3.45923 15.3666 3.19175 15.0304 3.13703 14.6466L2.41703 3.12664H11.777L11.057 14.6466ZM5.29703 2.40663H8.89703V0.966992H5.29703V2.40663ZM13.2172 2.40707H9.61719V0.96743C9.61719 0.56963 9.29463 0.24707 8.89719 0.24707H5.29719C4.89939 0.24707 4.57719 0.56963 4.57719 0.96743V2.40707H0.977187C0.778467 2.40707 0.617188 2.56835 0.617188 2.76743C0.617188 2.96615 0.778467 3.12707 0.977187 3.12707H1.69719L2.41719 14.6471C2.53311 15.4351 3.06195 16.0871 3.85719 16.0871H10.3372C11.1324 16.0871 11.6418 15.4272 11.7772 14.6471L12.4972 3.12707H13.2172C13.4159 3.12707 13.5772 2.96615 13.5772 2.76743C13.5772 2.56835 13.4159 2.40707 13.2172 2.40707ZM9.24536 13.9263C9.44408 13.9338 9.61112 13.7783 9.61832 13.5796L10.1403 4.94932C10.1475 4.7506 9.99236 4.58356 9.79364 4.576C9.59492 4.56916 9.42824 4.72432 9.42104 4.92304L8.89868 13.5537C8.89148 13.7524 9.04664 13.9191 9.24536 13.9263ZM7.09703 13.9266C7.29575 13.9266 7.45703 13.7657 7.45703 13.5666V4.92664C7.45703 4.72756 7.29575 4.56664 7.09703 4.56664C6.89831 4.56664 6.73703 4.72756 6.73703 4.92664V13.5666C6.73703 13.7657 6.89831 13.9266 7.09703 13.9266Z" fill="#008FE0"/>
                                                            </svg></span>
                                                    </td>
                                                    <td class="f-18 l-28 azure-blue border-0"><?php echo isset($coveramount) ? $coveramount : ''; ?></td>
                                                    <td class="text-right f-18 l-28 azure-blue border-0"><?php echo $planamount; ?></td>
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

                                        <label class="mt-3"><input type="checkbox" name="tandc" id="tandc" class="mr-3" value="tandc" <?php echo (isset($tandc) && $tandc == 'tandc')  ? 'checked="checked"' : '' ?>> I accept the <b><a href="terms-conditions" class="color-gray">terms and conditions</a></label> 
                                    </div>
                                    </div>