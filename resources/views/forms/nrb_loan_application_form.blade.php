@extends('master.master')
@section('content')
<form  method="POST" action="{{route('submit_nrb_loan_application_form')}}" enctype="multipart/form-data">
   @csrf
   <div class="row">
      <div class="container-flexible bnb-border mb-1 px-5 py-1 form-description">
         <div class="container-flexible mb-1 p-2 text-center">
            <h3 class="form-title">Online Loan Application For Bhutanese Living Abroad</h3>
            @if(!blank(session('code')))
            <h4 class="bnb-error">{{ session('code') }}</h4>
            @endif
            <p class="form-description-raleway mb-1 text-justify">
                     Download any form that is required for your purpose.
                  </p>
            <div class= "row column mb-1 pb-2 mx-0">
               <div class="col-md-8">
                  <p class="form-description-raleway mb-1 text-justify">
                     Home Loan
                  </p>
                  <div col-md-6 style="text-align:left;"><b><a style="font-weight:700; color:#003166;" target="_self" href="{{ asset('images/Home Loan for BLAs Application Form.pdf') }}"><i class="fa-file-pdf fas button-icon-left" aria-hidden="true" style="padding: 5px; font-size:11px;"></i><span class="fusion-button-text" style="text-transform:uppercase; font-size:10px; font-weight:700;">Home Loan Application Form</span></a></b></div>
                  <div style="text-align:left;"><b><a style="font-weight:700; color:#003166;" target="_self" href="{{ asset('images/Home Loan for BLAs Application Form.pdf') }}"><i class="fa-file-pdf fas button-icon-left" aria-hidden="true" style="padding: 5px; font-size:11px;"></i><span class="fusion-button-text" style="text-transform:uppercase; font-size:10px; font-weight:700;">Home Loan Application Form</span></a></b></div>
                  <div style="text-align:left;"><a style="font-weight:700; color:#003166;" target="_self" href="{{ asset('images/Payment Authorization.pdf') }}"><i class="fa-file-pdf fas button-icon-left" aria-hidden="true" style="padding: 5px; font-size:11px;"></i><span class="fusion-button-text" style="text-transform:uppercase; font-size:10px; font-weight:700;">Payment Authorization Form</span></a></div>
               </div>
               <div class="col-md-4">
                  <p class="form-description-raleway mb-1 text-justify ">
                     Loan Against Fixed Deposite
                  </p>
                
                     <div style="text-align:left;"><a style="font-weight:700; color:#003166;" target="_self" href="{{ asset('images/Loan against FD Application Form.pdf') }}"><i class="fa-file-pdf fas button-icon-left" aria-hidden="true" style="padding: 5px; font-size:11px;"></i><span class="fusion-button-text" style="text-transform:uppercase; font-size:10px; font-weight:700;">  LOAN AGAINST FIXED DEPOSIT</span></a></div>
                 
               </div>
            </div>
         </div>
         <div class= "row mb-1 p-3">
         <p class="form-description-raleway mb-3 text-justify" style="font-weight:600;">
       NOTE: Please note that the documents requried are listed in the forms. All your documents should be attested by the Bhutanese Embassy / other recognized overseas Bhutanese associations.
      </p>
         <h6 class="text-bnb-b">Customer Information</h6>
             <br><div class="row">
                  <div class="col-md-4 mb-0">
                     <label for="Name">Your Name:</label>
                     <input required="required" type="text" name="Name" id="Name" class="form-control" placeholder="Your Full Name"  value="{{old('Name')}}" autocomplete="off">
                     <small class="input-description">Enter your name in the order: First Name, Middle Name & Surname.</small>
                     @error('Name')
                     <br>
                     <span class="bnb-error m-auto">
                     <small><strong>{{$message}}</strong></small>
                     </span>
                     <br>
                     @enderror
                  </div>
                  <div class="col-md-4 mb-1">
                     <label for="CitizenshipIdentificationNumber">Citizenship Identification Number:</label>
                     <input required="required" type="text" name="CID" id="CID" class="form-control" placeholder="Your ID Number"  value="{{old('CID')}}" autocomplete="off">
                     <small class="input-description">Enter your CID/Passport/SRP number as registered with the bank.</small>
                     @error('CitizenshipIdentificationNumber')
                     <br>
                     <span class="bnb-error m-auto">
                     <small><strong>{{$message}}</strong></small>
                     </span>
                     <br>
                     @enderror
                  </div>
                  <div class="col-md-4 mb-1">
                     <label for="Email">Email Address:</label>
                     <input required=" " type="email" name="Email" id="Email" class="form-control" placeholder="Your Email ID"  autocomplete="off" value="{{old('Email')}}">
                     @error('Email')
                     <span class="bnb-error m-auto">
                     <small><strong>{{$message}}</strong></small>
                     </span>
                     <br>
                     @enderror
                  </div>
                  <div class="col-md-4 mb-0">
                     <label for="LoanType">Type Of Loan:</label>
                     <select required="required" class="form-control" id="LoanType">
                        <option value="">Choose</option>
                        <option>Home Loan</option>
                        <option>Loan Against Fixed Deposit</option>
                     </select>
                     <br>
                  </div>
                  <div class="col-md-4 mb-3">
               <label for="HomeBranch">Location</label>
               <select required="required" class="form-control" name="HomeBranch" id="HomeBranch" >
                  <option value="">Choose</option>
                  @foreach($branches as $b)
                  <option {{$b->branch_name == old('HomeBranch') ? 'selected' : ''}}>{{$b->branch_name}}</option>
                  @endforeach
               </select>
               @error('HomeBranch')
               <br>
               <span class="bnb-error m-auto">
               <small><strong>{{$message}}</strong></small>
               </span>
               <br>
               @enderror
            </div>
                  <div class="col-md-4 mb-0">
                     <label for="bla_upload">Upload Here:</label>
                     <input required="required" type="file" name="bla_upload" id="bla_upload" class="">
                     <br><small class="input-description">Please attach all necessary supporting <b>documents along with the form</b>, compress them into a zip file and upload the zip file here.</small>
                     @error('bla_upload')
                     <br>
                     <span class="bnb-error m-auto">
                     <small><strong>{{$message}}</strong></small>
                     </span>
                     <br>
                     @enderror
                  </div>
               </div>
         </div>
         <div class="row mb-1">
            <div class="inner-footer col-md-12">
               <h6 class="text-bnb-b"><b>Indemnity</b></h6>
               <p class="form-description-raleway">I hereby declare that the information and the documents attached  above is true and correct and would like to request the Bank to update my above details in your system.</p>
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
               <div class="row">
                  <div class="col-12">
                     <button type="submit" class="btn btn-primary">
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
   // Function to update branch options based on the selected loan type
   function updateBranchOptions() {
       var loanType = document.getElementById("LoanType").value;
       var branchSelect = document.getElementById("HomeBranch");
   
       // Clear existing options
       branchSelect.innerHTML = "";
   
       // Create and append new options based on the loan type
       if (loanType === "Home Loan") {
           var homeLoanBranches = [
           "Corporate Branch (Near Handicraft Bazaar)",
           "Thimphu Branch (Bhutan Post office)",
           "Phuntsholing Branch",
           "Samdrupjongkhar Branch",
           "Trashigang Branch",
           "Gelephu Branch",
           "Paro Branch",
           "Mongar Branch",
           "Wangdue Branch",
           "Bumthang Branch",
           "Samtse Branch",
           "Tsirang Branch"
           ];
           var chooseOption = document.createElement("option");
           chooseOption.text = "Select Branch";
           branchSelect.add(chooseOption);
   
           // Add the home loan branches as options
           for (var i = 0; i < homeLoanBranches.length; i++) {
               var option = document.createElement("option");
               option.text = homeLoanBranches[i];
               branchSelect.add(option);
           }
       } else if (loanType === "Loan Against Fixed Deposit") {
        
       var fixedDepositBranches = [
           "Corporate Branch (Near Handicraft Bazaar)",
           "Thimphu Branch (Bhutan Post office)",
           "Phuntsholing Branch",
           "Samdrupjongkhar Branch",
           "Trashigang Branch",
           "Gelephu Branch",
           "Paro Branch",
           "Mongar Branch",
           "Wangdue Branch",
           "Bumthang Branch",
           "Samtse Branch",
           "Tsirang Branch"
       ];
       var chooseOption = document.createElement("option");
        chooseOption.text = "Select Branch";
        branchSelect.add(chooseOption);
   
       // Add the fixed deposit branches as options
       for (var i = 0; i < fixedDepositBranches.length; i++) {
           var option = document.createElement("option");
           option.text = fixedDepositBranches[i];
           branchSelect.add(option);
       }
           
       }
   }
   
   // Add an event listener to the loan type select element
   document.getElementById("LoanType").addEventListener("change", updateBranchOptions);
   
   // Initial call to populate branch options based on the default loan type selection
   updateBranchOptions();
</script>
@endsection