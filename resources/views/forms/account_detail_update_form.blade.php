@extends('master.master')
@section('content')
<div class="row">
   <div class="container-flexible bnb-border mb-2 p-5 text-center">
      <h3 class="form-title">Account Detail Update</h3>
      <p class="form-description-raleway mb-3 text-justify">
         Following forms are associated with updating your account details.          
      </p>
      @if(!blank(session('code')))
      <h4 class="bnb-error">{{ session('code') }}</h4>
      @endif
     
      <div class= "row column mb-3">
      <div class="col-md-12">
      <p class="form-description-raleway mb-3 text-justify">
         Download on any form that is required for your purpose.
      </p>         </div>
    
         <div class="col-md-6">
            <div style="text-align:left;"><b><a style="font-weight:700; color:#003166;" target="_self" href="https://bnb.bt/wp-content/uploads/dld/FORMS/Update%20Account%20Details/CIUF%20-%20Corporate.pdf"><i class="fa-file-pdf fas button-icon-left" aria-hidden="true" style="padding: 8px; font-size:12px;"></i><span class="fusion-button-text" style="text-transform:uppercase; font-size:12px; font-weight:700;">Customer Information Update Form – Corporate</span></a></b></div>
         </div>
         <div class="col-md-6">
            <div style="text-align:left;"><a style="font-weight:700; color:#003166;" target="_self" href="https://bnb.bt/wp-content/uploads/dld/FORMS/Update%20Account%20Details/CIUF%20-%20Retail.pdf"><i class="fa-file-pdf fas button-icon-left" aria-hidden="true" style="padding: 8px; font-size:12px;"></i><span class="fusion-button-text" style="text-transform:uppercase; font-size:12px; font-weight:700;">Customer Information Update Form – Retail</span></a></div>
         </div>
         <div class="col-md-6">
            <div style="text-align:left;"><a style="font-weight:700; color:#003166;" target="_self" href="https://bnb.bt/wp-content/uploads/dld/FORMS/Update%20Account%20Details/Customer%20Signature%20Update%20Form.pdf"><i class="fa-file-pdf fas button-icon-left" aria-hidden="true" style="padding: 8px; font-size:12px;"></i><span class="fusion-button-text" style="text-transform:uppercase; font-size:12px; font-weight:700;">Signature Update Form</span></a></div>
         </div>
         <div class="col-md-6">
            <div style="text-align:left;"><a style="font-weight:700; color:#003166;" target="_self" href="https://bnb.bt/wp-content/uploads/dld/FORMS/Update%20Account%20Details/Mobile%20email%20change.pdf"><i class="fa-file-pdf fas button-icon-left" aria-hidden="true" style="padding: 8px; font-size:12px;"></i><span class="fusion-button-text" style="text-transform:uppercase; font-size:12px; font-weight:700;">Mobile | Email Change</span></a></div>
         </div>
      </div>
      <p class="form-description-raleway mb-3 text-justify text-bnb-b" style="font-weight:600;">
         DOCUMENTS REQURIED TO UPDATE YOUR FORM
      </p>
      <div class= "row">
         <div class="col-md-12">
            <div style="text-align:left;">
               <ol>
                  <li>Customer Information Update Form (mentioned above)</li>
                  <li>CID copy/Passport copy </li>
                  <li>Proof of Residency (Any Bill paid copy/VISA copy/ STUDENT ID copy) (Applies only for abroad)</li>
                  <li>License Copy (Applies only for CD Account Holder)</li>

               </ol>
            </div>
         </div>
      </div>
   </div>
</div>
<form  method="POST" action="{{route('submit_account_detail_update_form')}}" enctype="multipart/form-data">
   @csrf
   <div class="row">
      <div class="container-flexible bnb-border mb-2 p-5 form-description">
         <h4 class="text-bnb-b">Customer Information</h4>
         <p><small class="input-description">Please enter your details correctly.</small></p>
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
            <div class="col-md-4 mb-3">
               <label for="HomeBranch">Bank Branch/Extension</label>
               <select required="required" class="form-control" name="HomeBranch" id="HomeBranch" >
                  <option value="">Choose</option>
                  @foreach($branches as $b)
                  @if($b->category == 'branch' || $b->category == 'extension')
                        <option {{$b->branch_name == old('HomeBranch') ? 'selected' : ''}}>{{$b->branch_name}}</option>
                  @endif
                  @endforeach
               </select>
               <small class="input-description">Please select the name of the branch/extension where you opened/have your account.</small>
               @error('HomeBranch')
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
      <h4 class="text-bnb-b">Document Upload</h4>
      <p><small class="input-description">Upload all your required documents here.</small></p>
      <div class="row">
         
         <div class="col-md-3 mb-2">
            <label for="doc_upload">Update Form:</label>
            <input required="required" type="file" name="doc_upload" id="doc_upload" class="">
            <small class="input-description">Upload your Update Form Here!</small>
            @error('doc_upload')
            <br>
            <span class="bnb-error m-auto">
            <small><strong>{{$message}}</strong></small>
            </span>
            <br>
            @enderror
         </div>
         <div class="col-md-3 mb-2">
            <label for="doc_upload_2">CID:</label>
            <input required="required" type="file" name="doc_upload_2" id="doc_upload_2" class="">
            <small class="input-description">Upload CID Copy Here!</small>
            @error('doc_upload_2')
            <br>
            <span class="bnb-error m-auto">
            <small><strong>{{$message}}</strong></small>
            </span>
            <br>
            @enderror
         </div>
         <div class="col-md-3 mb-3">
            <label for="doc_upload_3">Proof of Residency:</label>
            <input type="file" name="doc_upload_3" id="doc_upload_3" class="">
            <small class="input-description">Proof of Residency (Any Bill paid copy/VISA copy/ STUDENT ID copy) (Applies only for Bhutanese Living Abroad)</small>
            @error('doc_upload_3')
            <br>
            <span class="bnb-error m-auto">
            <small><strong>{{$message}}</strong></small>
            </span>
            <br>
            @enderror
         </div>
         <div class="col-md-3 mb-3">
            <label for="doc_upload_4">License Copy:</label>
            <input type="file" name="doc_upload_4" id="doc_upload_4" class="">
            <small class="input-description">Upload your License copy (Applies only for CD Account Holder)</small>
            @error('doc_upload_4')
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
@endsection