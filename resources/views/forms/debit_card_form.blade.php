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
            <p class="form-description-raleway" style="color:white; background:#26578C; border: 2px solid #26578C; border-radius:5px;">	
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
               <input type="text" name="NameOnCard" id="NameOnCard" class="form-control" autocomplete="off" placeholder="Name on Card" value="{{old('NameOnCard')}}">
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
               <label for="AccountNumber">Your Account Number :</label>
               <input type="text" name="AccountNumber" id="AccountNumber" class="form-control" autocomplete="off" placeholder="Your Account Number" value="{{old('AccountNumber')}}">
               @error('AccountNumber')
               <span class="bnb-error">
               <small><strong>{{ $message }}</strong></small>
               </span>
               <br>
               @enderror
               <small class="input-description">Enter your BNB account number correctly.</small>
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
               <input type="text" name="CID" id="CID" class="form-control" autocomplete="off" placeholder="CID Number" value="{{old('CID')}}">
               @error('CID')
               <span class="bnb-error">
               <small><strong>The CID Number field is required.</strong></small>
               </span>
               <br>
               @enderror
            </div>
            <div class="col-md-3 mb-2">
               <label for="Nationality">Nationality:</label>
               <input type="text" name="Nationality" id="Nationality" class="form-control" autocomplete="off" placeholder="Your Nationality" value="{{old('Nationality')}}">
               @error('Nationality')
               <span class="bnb-error">
               <small><strong>{{ $message }}</strong></small>
               </span>
               <br>
               @enderror
            </div>
            <div class="col-md-3 mb-2">
               <label for="MobileNumber">Your Mobile Number:</label>
               <input type="text" name="MobileNumber" id="MobileNumber" class="form-control" autocomplete="off" placeholder="Your Mobile Number" value="{{old('MobileNumber')}}">
               @error('MobileNumber')
               <span class="bnb-error">
               <small><strong>{{ $message }}</strong></small>
               </span>
               <br>
               @enderror
            </div>
            <div class="col-md-3 mb-2">
               <label for="Email">Your Email ID:</label>
               <input type="text" name="Email" id="Email" class="form-control" autocomplete="off" placeholder="Your Email ID" value="{{old('Email')}}">
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
                  <div class="inner-footer col-md-12">
                     <h6 class="text-bnb-b"><b>Indemnity</b></h6>
                     <p class="form-description-raleway">I hereby declare that the information and the documents attached above is true and correct and would like to request the Bank to update my above details in your system. I also hereby authorize the Bank to deduct any applicable charges related to the issuance of this card.</p>
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
   
   console.log("Card Type: " + cardTypeDropdown.value);
   console.log("Branch: " + branchDropdown.value);
   
</script>
@endsection