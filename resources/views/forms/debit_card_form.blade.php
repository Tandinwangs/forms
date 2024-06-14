@extends('master.master')
@section('content')
<form action="{{ route('submit_debit_card_form') }}" method="POST">
   @csrf
   <div class="row">
      <div class="container-flexible bnb-border mb-1 px-5 py-1 form-description">
         <div class="container-flexible bnb-border mb-1 p-2 text-center">
            <h3 class="form-title">Bhutan National Bank Debit Card Application Form</h3>
            @if(!blank(session('code')))
            <h4 class="bnb-error">{{ session('code') }}</h4>
            @endif
            <p class="form-description-raleway mb-3 text-center">
               I would like to request BNB to kindly issue me a new ATM/Debit Card against my following account number maintained with your bank. The request shall be processed only after validating your request, by verifying in our systems the combination of your name, account number, mobile number, ID number and email ID. If required, you may be contacted to validate the request.
            </p>
            <p class="form-description-raleway form-describe">	
               RuPay cards are available for immediate issuance at our branches and extension offices. If you're in Bhutan, we recommend visiting our nearest locations for a faster application and collection process.
            </p>
         </div>
         <div class="row">
            <div class="col-md-3 mb-2">
               <label for="CardType">Type of Debit Card :</label>
               <select class="form-control" name="CardType" id="CardType">
                  <option value="">Choose the Debit Card Type</option>
                  <!-- <option value="Proprietary Card" {{old('CardType')=='Proprietary Card'?'selected':''}}>Proprietary Card</option> -->
                  <option value="VISA Debit Card" {{ old('CardType') == 'VISA Debit Card' ? 'selected' : '' }}>VISA Debit Card</option>
                  <option value="RuPay Card" {{ old('CardType') == 'RuPay Card' ? 'selected' : '' }}>RuPay Card</option>
                  <option value="FCY Visa Debit Card" {{ old('CardType') == 'FCY Visa Debit Card' ? 'selected' : '' }}>FCY Visa Debit Card</option>
               </select>
               @error('CardType')
               <span class="bnb-error">
               <small><strong>{{ $message }}</strong></small>
               </span>
               <br>
               @enderror
            </div>
            <div class="col-md-3 mb-2">
               <label for="RequestFor">Request For :</label>
               <select class="form-control" name="RequestFor" id="RequestFor">
                  <option value="">Choose</option>
                  <option value="New Card" {{ old('RequestFor') == 'New Card' ? 'selected' : '' }}>New Card</option>
                  <option value="Replacement" {{ old('RequestFor') == 'Replacement' ? 'selected' : '' }}>Replacement</option>
               </select>
               @error('RequestFor')
               <span class="bnb-error">
               <small><strong>{{ $message }}</strong></small>
               </span>
               <br>
               @enderror
            </div>
            <div class="col-md-3 mb-2">
               <label for="Branch">I will collect the card from:</label>
               <select class="form-control" name="Branch" id="Branch" onchange="showHiddenFields()">
                  <option value="">Location to Collect Your Card</option>
                  @foreach($branches as $b)
                  @if($b->category == 'branch' || $b->category == 'extension')
                  <option {{$b->branch_name == old('HomeBranch') ? 'selected' : ''}}>{{$b->branch_name}}</option>
                  @endif
                  @endforeach
               </select>
               @error('Branch')
               <span class="bnb-error">
               <small><strong>Select the location from where you will collect your card.</strong></small>
               </span>
               <br>
               @enderror
            </div>
            <div class="col-md-3 mb-2">
               <label for="NameOnCard">Name on Card :</label>
               <input type="text" name="NameOnCard" id="NameOnCard" class="form-control" autocomplete="off" placeholder="Name on Card" value="{{old('NameOnCard')}}"  oninput="this.value = this.value.replace(/[0-9]/g, '');">
               @error('NameOnCard')
               <span class="bnb-error">
               <small><strong>{{ $message }}</strong></small>
               </span>
               <br>
               @enderror
               <small class="input-description">
               Name on the card, limited to 20 characters.</small>
            </div>

            <div class="col-md-3 mb-2">
               <label for="AccountType">Account Type :</label>
               <select class="form-control" name="AccountType" id="AccountType">
                  <option value="">Choose the Account Type</option>
                  <option value="Savings Account" {{ old('AccountType') == 'Savings Account' ? 'selected' : '' }}>Savings Account</option>
                  <option value="Current Account" {{ old('AccountType') == 'Current Account' ? 'selected' : '' }}>Current Account</option>
               </select>
               @error('AccountType')
               <span class="bnb-error">
               <small><strong>{{ $message }}</strong></small>
               </span>
               <br>
               @enderror
            </div>
            
            <div class="col-md-3 mb-2">
    <label for="AccountNumber">Your Account Number :</label>
    <input type="text" name="AccountNumber" id="AccountNumber" class="form-control" autocomplete="off" placeholder="Your Account Number" value="{{old('AccountNumber')}}" maxlength="9">
    @error('AccountNumber')
    <span class="bnb-error">
    <small><strong>{{ $message }}</strong></small>
    </span>
    <br>
    @enderror
    <small class="input-description">Enter your BNB account number correctly.</small>

    <!-- Add this div for displaying the error message -->
    <div id="accountNumberError" class="bnb-error" style="display: none;"></div>
</div>

            

        
            <div class="col-md-3 mb-2">
               <label for="Name">Your Full Name :</label>
               <input type="text" name="Name" id="Name" class="form-control" autocomplete="off" placeholder="Your Full Name" value="{{old('Name')}}">
               @error('Name')
               <span class="bnb-error">
               <small><strong>{{ $message }}</strong></small>
               </span>
               <br>
               @enderror
            </div>
            <div class="col-md-3 mb-2">
               <label for="CID">Your CID Number:</label>
               <input type="text" name="CID" id="CID" class="form-control" autocomplete="off" placeholder="CID Number" value="{{old('CID')}}" oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="11" minlength="11">
               @error('CID')
               <span class="bnb-error">
               <small><strong>The CID Number field is required.</strong></small>
               </span>
               <br>
               @enderror
            </div>
            <div class="col-md-3 mb-2">
               <label for="Nationality">Nationality:</label>
               <!-- <input type="text" name="Nationality" id="Nationality" class="form-control" autocomplete="off" placeholder="Your Nationality" value="{{old('Nationality')}}"> -->
               <select id="Nationality" name="Nationality" class="form-control">
               <option disabled selected>Select your Nationality</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Aland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
               </select>
               @error('Nationality')
               <span class="bnb-error">
               <small><strong>{{ $message }}</strong></small>
               </span>
               <br>
               @enderror
            </div>
            <div class="col-md-3 mb-2">
               <label for="MobileNumber">Your Mobile Number:</label>
               <input type="text" name="MobileNumber" id="MobileNumber" class="form-control" autocomplete="off" placeholder="Your Mobile Number" value="{{old('MobileNumber')}}" oninput="this.value = this.value.replace(/[^0-9]/g, '');" >
               @error('MobileNumber')
               <span class="bnb-error">
               <small><strong>{{ $message }}</strong></small>
               </span>
               <br>
               @enderror
            </div>
            <div class="col-md-3 mb-2">
               <label for="Email">Your Email ID:</label>
               <input type="email" name="Email" id="Email" class="form-control" autocomplete="off" placeholder="Your Email ID" value="{{old('Email')}}">
               @error('Email')
               <span class="bnb-error">
               <small><strong>{{ $message }}</strong></small>
               </span>
               <br>
               @enderror
            </div>
            <div class="col-md-3 mb-2">
               <label for="DoB">Your Date of Birth:</label>
               <input type="date" name="DoB" id="DoB" class="form-control" autocomplete="off" placeholder="Your Date of Birth" value="{{old('DoB')}}">
               @error('DoB')
               <span class="bnb-error">
               <small><strong>{{ $message }}</strong></small>
               </span>
               <br>
               @enderror
            </div>
            <div class="col-md-6 mb-2">
               <label for="ReasonForReplacement">Reason for Replacement:</label>
               <textarea name="ReasonForReplacement" id="ReasonForReplacement" rows="2" class="form-control">{{old('ReasonForReplacement')}}</textarea>
               @error('ReasonForReplacement')
               <span class="bnb-error m-auto">
               <small><strong>{{$message}}</strong></small>
               </span>
               <br>
               @enderror
               <small class="input-description" style="font-size: 10px;">Required if you are requesting for replacement.</small>
            </div>
            <div class="col-md-6 mb-2">
               <label for="PresentAddress">
               Your Present Address:
               </label>
               <textarea name="PresentAddress" id="PresentAddress" rows="2" class="form-control">{{ old('PresentAddress') }}</textarea>
               @error('PresentAddress')
               <span class="bnb-error m-auto">
               <small><strong>{{ $message }}</strong></small>
               </span>
               <br>
               @enderror
               <small class="input-description" id="presentAddressDescription" style="font-size: 10px;">
               Your present address, gewog, and dzongkhag.
               </small>
            </div>
            <div class="container-flexible bnb-border mb-0 px-5 py-2 form-description">
               <div class="row mb-0">
               <div id="authorizedAccountSection" class="row" style="display: none">
                     <div class="col-md-8 mb-2">
                        <p for="AuthorizeAccount">
                           I hereby authorize the bank to deduct any applicable charges related to the issuance of this card from my account Number:
                        </p>
                     </div>
                     <div class="col-md-4 mb-2">
                        <input type="text" name="AuthorizeAccount" id="AuthorizeAccount" class="form-control" autocomplete="off" placeholder="Enter your account Number" value="{{old('AuthorizeAccount')}}">
                        @error('AuthorizeAccount')
                        <span class="bnb-error m-auto">
                           <small><strong>{{ $message }}</strong></small>
                        </span>
                        <br>
                        @enderror
                     </div>
                     </div>


            

                  <div class="inner-footer col-md-12">
                     <h6 class="text-bnb-b"><b>Indemnity</b></h6>
                     <p class="form-description-raleway">I hereby declare that the information and the documents attached above is true and correct and would like to request the Bank to update my above details in your system. 
                        I also hereby authorize the Bank to deduct any applicable charges related to the issuance of this card from my account Number:</p>
                        <div class="col-md-3 mb-2">
                        <input type="text" name="AuthorizeAccount" id="AuthorizeAccount" class="form-control" autocomplete="off" placeholder="Enter your account Number" value="{{old('AuthorizeAccount')}}" required maxlength="9">
                        @error('AuthorizeAccount')
                        <span class="bnb-error m-auto">
                           <small><strong>{{ $message }}</strong></small>
                        </span>
                        <br>
                        @enderror
                     </div>
                     <div class="row">
                        <div class="col-6 text-center">
                           <input type="radio" id="agree" name="Agreement" class="form-control" value="agree"> <label for="agree">I Agree</label>
                        </div>
                        <div class="col-6 text-center">
                           <input type="radio" id="disagree" name="Agreement" class="form-control" checked="checked" value="disagree"><label for="disagree">I Disagree</label>
                        </div>
                        @error('Agreement')
                        <br>
                        <span class="bnb-error m-auto">
                        <small><strong>We cannot process your request if you do not agree to the Indemnity clause.</strong></small>
                        </span>
                        <br>
                        @enderror
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12">
                     <button type="submit" class="btn btn-primary pb-2">
                     Submit
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>
<script>
   function updatePresentAddressDescription() {
     var cardType = document.getElementById('CardType').value;
     var branch = document.getElementById('Branch').value;
     var presentAddressDescription = document.getElementById('presentAddressDescription');
   
     if (cardType === 'FCY Visa Debit Card' && branch === 'Australia') {
       presentAddressDescription.innerText = 'Your present address in Australia.';
     } else {
       presentAddressDescription.innerText = 'Your present address, gewog, and dzongkhag.';
     }
   }
   
   // Attach the function to the change event of CardType and Branch
   document.getElementById('CardType').addEventListener('change', updatePresentAddressDescription);
   document.getElementById('Branch').addEventListener('change', updatePresentAddressDescription);
   
   // Initial call to set the initial description based on the initial values
   updatePresentAddressDescription();
</script>
<script>
   document.addEventListener('DOMContentLoaded', function () {
       // Get the Type of Debit Card and Type of Account dropdown elements
       var cardTypeDropdown = document.getElementById('CardType');
       var accountTypeDropdown = document.getElementById('AccountType');
       var form = document.querySelector('form');
   
       // Add an event listener to the Type of Debit Card dropdown
       cardTypeDropdown.addEventListener('change', function () {
           // If FCY Debit Card is selected, show only Savings Account in Type of Account dropdown
           if (cardTypeDropdown.value === 'FCY Visa Debit Card') {
               // Disable other options and select Savings Account
               accountTypeDropdown.innerHTML = '<option value="Savings Account">Savings Account</option>';
           } else {
               // Enable and show all options if a different card type is selected
               accountTypeDropdown.innerHTML = '<option value="">Choose the Account Type</option>' +
                   '<option value="Savings Account">Savings Account</option>' +
                   '<option value="Current Account">Current Account</option>';
           }
   
           // Set the selected value to the old value if it exists
           accountTypeDropdown.value = "{{ old('AccountType') }}";
       });
   
       // ... other existing code ...
   
   });
   
   document.addEventListener('DOMContentLoaded', function () {
   var cardTypeDropdown = document.getElementById('CardType');
   var branchDropdown = document.getElementById('Branch');
   var mobileNumberField = document.getElementById('MobileNumber');
   var presentAddressField = document.getElementById('PresentAddress');
   
   // Function to update branch options based on selected card type
   function updateBranchOptions() {
   // Clear existing options
   branchDropdown.innerHTML = '';
   
   // Add default option
   branchDropdown.innerHTML += '<option value="">Location to Collect Your Card</option>';
   
   // Add branch options based on the selected card type
   if (cardTypeDropdown.value !== 'VISA Debit Card' && cardTypeDropdown.value !== 'RuPay Card') {
       // Add Australia option only if the card type is not Visa Debit Card or RuPay Card
       branchDropdown.innerHTML += '<option value="Australia">Australia</option>';
   }
   
   // Add other branch options
   @foreach($branches as $b)
       if ("{{$b->category}}" === 'branch' || "{{$b->category}}" === 'extension') {
           branchDropdown.innerHTML += '<option value="{{$b->branch_name}}" ' +
               '{{$b->branch_name == old("HomeBranch") ? "selected" : ""}}>{{$b->branch_name}}</option>';
       }
   @endforeach
   }
   
   // Add an event listener to the Type of Debit Card dropdown
   cardTypeDropdown.addEventListener('change', function () {
   // Update branch options when card type is changed
   updateBranchOptions();
   
   // Set the selected value to the old value if it exists
   branchDropdown.value = "{{ old('Branch') }}";
   
   // Auto-populate fields for Australia if FCY Visa Debit Card is selected
   updateFieldsBasedOnLocation();
   });
   
   // Add an event listener to the Branch dropdown
   branchDropdown.addEventListener('change', function () {
   // Auto-populate fields for Australia if "Australia" is selected
   updateFieldsBasedOnLocation();
   });
   
   function updateFieldsBasedOnLocation() {
   if (branchDropdown.value === 'Australia') {
       // Auto-populate the Mobile Number field with an Australian format
       mobileNumberField.placeholder = '+61 XXX XXX XXX'; // Replace XXXX with actual digits
   
       // Auto-populate the Present Address field with an Australian format
       presentAddressField.placeholder = 'Street Address, Suburb, State, Postal Code, Australia';
   } else {
       // Clear the fields if a different location is selected
       mobileNumberField.placeholder = '';
       presentAddressField.placeholder = '';
   }
   }
   
   // Initial update of branch options based on the selected card type
   updateBranchOptions();
   
   // Auto-populate fields for Australia if the initial branch is set to "Australia"
   updateFieldsBasedOnLocation();
   });
   
   // console.log("Card Type: " + cardTypeDropdown.value);
   // console.log("Branch: " + branchDropdown.value);



   









   document.addEventListener('DOMContentLoaded', function () {
    // Get the necessary elements
    var accountNumberField = document.getElementById('AccountNumber');
    var accountTypeDropdown = document.getElementById('AccountType');
    var cardTypeDropdown = document.getElementById('CardType');
    var errorMessageElement = document.getElementById('accountNumberError');
    var form = document.querySelector('form');

    // Function to validate account number format
    function validateAccountNumberFormat(accountNumber, accountType, cardType) {
        errorMessageElement.textContent = ''; // Clear previous error message
        errorMessageElement.style.display = 'none'; // Hide error message initially

        // Check if the input length is at least 2 characters
        if (accountNumber.length >= 2) {
            // Validate first two digits of account number based on card type and account type
            var firstTwoDigits = accountNumber.substring(0, 2);
            var isValid = true;

            switch (cardType) {
                case 'VISA Debit Card':
                case 'RuPay Card':
                    isValid = (accountType === 'Savings Account' && firstTwoDigits === '65') ||
                        (accountType === 'Current Account' && firstTwoDigits === '64');
                    break;
                case 'FCY Visa Debit Card':
                    isValid = firstTwoDigits === '63';
                    break;
                default:
                    isValid = false; // Invalid card type
            }

            if (!isValid) {
                // Display error message if validation fails
                errorMessageElement.textContent = 'Invalid account number format based on the selected card type and account type.';
                errorMessageElement.style.display = 'block';
                return false; // Return false if validation fails
            }
        }

        return true; // Return true if validation passes
    }

    // Add input event listener to the account number field
    accountNumberField.addEventListener('input', function () {
        var accountNumber = accountNumberField.value.trim();
        var accountType = accountTypeDropdown.value;
        var cardType = cardTypeDropdown.value;

        validateAccountNumberFormat(accountNumber, accountType, cardType);
    });

    // Validate account number format on form submission
    form.addEventListener('submit', function (event) {
        var accountNumber = accountNumberField.value.trim();
        var accountType = accountTypeDropdown.value;
        var cardType = cardTypeDropdown.value;

        if (!validateAccountNumberFormat(accountNumber, accountType, cardType)) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
});


</script>
@endsection