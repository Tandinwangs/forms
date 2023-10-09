@extends('master.master')
@section('content')
<div class="row">
   <div class="container-flexible bnb-border mb-2 p-5 text-center">
      <h3 class="form-title">Online Loan Application For Bhutanese Living Abroad</h3>
      <p class="form-description-raleway mb-3 text-justify">
                 
      </p>
      @if(!blank(session('code')))
      <h4 class="bnb-error">{{ session('code') }}</h4>
      @endif
      <p class="form-description-raleway mb-3 text-justify text-bnb-b" style="font-weight:600;">
         HOME LOAN
      </p>
      <div class= "row column mb-3">
         <div class="col-md-12">
            <p class="form-description-raleway mb-3 text-justify">
               Download on any form that is required for your purpose.
            </p>
         </div>
         <div class="col-md-6">
            <div style="text-align:left;"><b><a style="font-weight:700; color:#003166;" target="_self" href="https://bnb.bt/wp-content/uploads/dld/FORMS/Update%20Account%20Details/CIUF%20-%20Corporate.pdf"><i class="fa-file-pdf fas button-icon-left" aria-hidden="true" style="padding: 8px; font-size:12px;"></i><span class="fusion-button-text" style="text-transform:uppercase; font-size:12px; font-weight:700;">Home Loan Application Form</span></a></b></div>
         </div>
         <div class="col-md-6">
            <div style="text-align:left;"><a style="font-weight:700; color:#003166;" target="_self" href="https://bnb.bt/wp-content/uploads/dld/FORMS/Update%20Account%20Details/CIUF%20-%20Retail.pdf"><i class="fa-file-pdf fas button-icon-left" aria-hidden="true" style="padding: 8px; font-size:12px;"></i><span class="fusion-button-text" style="text-transform:uppercase; font-size:12px; font-weight:700;">Additional Loan Application Form</span></a></div>
         </div>
         <div class="col-md-6">
            <div style="text-align:left;"><a style="font-weight:700; color:#003166;" target="_self" href="https://bnb.bt/wp-content/uploads/dld/FORMS/Update%20Account%20Details/Customer%20Signature%20Update%20Form.pdf"><i class="fa-file-pdf fas button-icon-left" aria-hidden="true" style="padding: 8px; font-size:12px;"></i><span class="fusion-button-text" style="text-transform:uppercase; font-size:12px; font-weight:700;">Payment Authorization Form</span></a></div>
         </div>
      </div>
      <p class="form-description-raleway mb-3 text-justify text-bnb-b" style="font-weight:600;">
         LOAN AGAINST FIXED DEPOSIT
      </p>
      <div class= "row column mb-3">
         <div class="col-md-6">
            <div style="text-align:left;"><a style="font-weight:700; color:#003166;" target="_self" href="https://bnb.bt/wp-content/uploads/dld/FORMS/Update%20Account%20Details/Customer%20Signature%20Update%20Form.pdf"><i class="fa-file-pdf fas button-icon-left" aria-hidden="true" style="padding: 8px; font-size:12px;"></i><span class="fusion-button-text" style="text-transform:uppercase; font-size:12px; font-weight:700;">  LOAN AGAINST FIXED DEPOSIT</span></a></div>
         </div>
      </div>
      <p class="form-description-raleway mb-3 text-justify" style="font-weight:600;">
       NOTE: Please note that the documents requried are listed in the forms. All your documents should be attested by the Bhutanese Embassy / other recognized overseas Bhutanese associations.
      </p>
   </div>
</div>
<form  method="POST" action="{{route('submit_nrb_loan_application_form')}}" enctype="multipart/form-data">
   @csrf
   <div class="row">
      <div class="container-flexible bnb-border mb-2 p-5 form-description">
         <h4 class="text-bnb-b">Document Upload</h4>
         <p><small class="input-description">Please enter your bank details correctly</small></p>
         <div class="row">
            <div class="col-md-4 mb-3">
               <label for="Name">Your Name:</label>
               <input required="required" type="text" name="Name" id="Name" class="form-control" placeholder="Your Full Name"  value="{{old('Name')}}" autocomplete="off">
               <small class="input-description">Please enter your complete name in the following order: First Name, Middle Name, Surname</small>
               @error('Name')
               <br>
               <span class="bnb-error m-auto">
               <small><strong>{{$message}}</strong></small>
               </span>
               <br>
               @enderror
            </div>
            <div class="col-md-4 mb-3">
               <label for="CitizenshipIdentificationNumber">Citizenship Identification Number:</label>
               <input required="required" type="text" name="CID" id="CID" class="form-control" placeholder="Your ID Number"  value="{{old('CID')}}" autocomplete="off">
               <small class="input-description">Please enter your CID/ Passport/ SRP number as registered with the bank.</small>
               @error('CitizenshipIdentificationNumber')
               <br>
               <span class="bnb-error m-auto">
               <small><strong>{{$message}}</strong></small>
               </span>
               <br>
               @enderror
            </div>
            <div class="col-md-4 mb-3">
               <label for="Email">Email Address:</label>
               <input required=" " type="email" name="Email" id="Email" class="form-control" placeholder="Your Email ID"  autocomplete="off" value="{{old('Email')}}">
               @error('Email')
               <span class="bnb-error m-auto">
               <small><strong>{{$message}}</strong></small>
               </span>
               <br>
               @enderror
            </div>
            <!-- <div class="col-md-4 mb-3">
               <label for="ContactNumber">Contact Number:</label>
               <input required=" " type="text" name="ContactNumber" id="ContactNumber" class="form-control" placeholder="Your Contact Number"  value="{{old('ContactNumber')}}" autocomplete="off" maxlength="8" minlength="8">
               <small class="input-description">Please enter the mobile number registered with the bank.</small>
               @error('ContactNumber')
               <br>
               <span class="bnb-error m-auto">
               <small><strong>{{$message}}</strong></small>
               </span>
               <br>
               @enderror
            </div> -->

            <div class="col-md-4 mb-3">
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
         
            <div class="col-md-4 mb-3">
               <label for="bla_upload">Upload Here:</label>
               <input required="required" type="file" name="bla_upload" id="bla_upload" class="">
               <small class="input-description">Please attach all necessary supporting <b>documents along with the form</b>, compress them into a zip file and upload the zip file here.</small>
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
   </div>
   <div class="row">
      <div class="container-flexible bnb-border mb-2 p-5 form-description">
         <div class="row mb-3">
            <div class="inner-footer">
               <h5 class="text-bnb-b"><b>Indemnity</b></h5>
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
            </div>
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
                "Bumthang Dzongkhag",
                "Chhukha Dzongkhag",
                "Dagana Dzongkhag",
                "Gasa Dzongkhag",
                "Haa Dzongkhag",
                "Lhuentse Dzongkhag",
                "Mongar Dzongkhag",
                "Paro Dzongkhag",
                "Pemagatshel Dzongkhag",
                "Punakha Dzongkhag",
                "Samdrup Jongkhar Dzongkhag",
                "Samtse Dzongkhag",
                "Sarpang Dzongkhag",
                "Thimphu Dzongkhag",
                "Trashigang Dzongkhag",
                "Trashiyangtse Dzongkhag",
                "Trongsa Dzongkhag",
                "Tsirang Dzongkhag",
                "Wangdue Phodrang Dzongkhag",
                "Zhemgang Dzongkhag"
            ];
            var chooseOption = document.createElement("option");
            chooseOption.text = "Select Property Location";
            branchSelect.add(chooseOption);

            // Add the home loan branches as options
            for (var i = 0; i < homeLoanBranches.length; i++) {
                var option = document.createElement("option");
                option.text = homeLoanBranches[i];
                branchSelect.add(option);
            }
        } else if (loanType === "Loan Against Fixed Deposit") {
         
        var fixedDepositBranches = [
            "Corporate Branch",
            "Thimphu Branch",
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