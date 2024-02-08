<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FormsController@getForms');

Route::get('/forms', 'FormsController@getForms')->name('forms');
// Route::get('/TPIN-reset-form', 'FormController@getTPinForm')->name('tpin_path');

// form routes
Route::get('/forms/inr-remittance-request-form', 'FormsController@getINRRemittanceForm')->name('inr_remittance_form');
Route::get('/forms/inr-remittance-requirements-and-charges', 'FormsController@getINRRemittanceRequirement')->name('inr_remittance_requirement');
Route::post('/forms/inr-remittance-request-form', 'FormsController@submitINRRemittanceForm')->name('submit_inr_remittance_form');

Route::get('/forms/gift-form', 'FormsController@getGiftForm')->name('gift_form');
Route::post('/forms/gift_form', 'FormsController@submitGiftForm')->name('submit_gift_form');

Route::get('/forms/premature-withdrawal-form', 'FormsController@getPrematureWithdrawalForm')->name('premature_withdrawal_form');
Route::post('/forms/premature-withdrawal-form', 'FormsController@submitPrematureWithdrawalForm')->name('submit_premature_withdrawal_form');

Route::get('/forms/debit-card-form', 'FormsController@getDebitCardForm')->name('debit_card_form');
Route::post('/forms/debit-card-form', 'FormsController@submitDebitCardForm')->name('submit_debit_card_form');


Route::get('/forms/money-gram-claim-form','FormsController@getMoneyGramClaimForm')->name('money_gram_claim_form');
Route::post('/forms/money-gram-claim-form','FormsController@submitMoneyGramClaimForm')->name('submit_money_gram_claim_form');

Route::get('/forms/account-detail-update-form','FormsController@getAccountDetailUpdateForm')->name('account_detail_update_form');
Route::post('/forms/account-detail-update-form','FormsController@submitAccountDetailUpdateForm')->name('submit_account_detail_update_form');

Route::get('/forms/bla-loan-application-form','FormsController@getNRBLoanApplicationForm')->name('nrb_loan_application_form');
Route::post('/forms/bla-loan-application-form','FormsController@submitNRBLoanApplicationForm')->name('submit_nrb_loan_application_form');

// Forms
// Route::get('/forms/account_detail_update_retail','AccountDetailUpdateFormController@retail')->name('account_detail_update_retail');
// Route::get('/forms/account_detail_update_corporate','AccountDetailUpdateFormController@corporate')->name('account_detail_update_corporate');
// Route::get('/forms/account_detail_update_signature','AccountDetailUpdateFormController@signature')->name('account_detail_update_signature');
// Route::get('/forms/account_detail_update_mobile-email','AccountDetailUpdateFormController@mobile_email')->name('account_detail_update_mobile_email');


// Share Holder Information Update routes
Route::get('forms/search-share-holder-information', 'ShareHoldersController@getShareHolderInfo')->name('share_holder_information_form');
Route::get('forms/share-holder-information-update-form', 'ShareHoldersController@searchShareHolderInfo')->name('search_share_holder_information');
Route::post('forms/update-share-holder-information', 'ShareHoldersController@updateShareHolderInfo')->name('update_share_holder_information');
// admin routes
Route::get('/dashboard', 'AdminViewController@getDashboard')->name('dashboard_path');
Route::get('/BNBL-forms', 'AdminViewController@getForms')->name('forms_path');

// INR Remittance Routes
Route::get('/BNBL-forms/inr-remittance-request-forms', 'INRRemittanceController@getForms')->name('inr_remittance_forms_path');
Route::get('/BNBL-forms/inr-remittance-request-forms/{id}/{action}', 'INRRemittanceController@viewForm')->name('show_inr_remittance_form_path');
Route::get('/BNBL-forms/inr-remittance-request-forms/search', 'INRRemittanceController@getSearchForm')->name('search_inr_remittance_form_path');
Route::get('/BNBL-forms/inr-remittance-request-forms/search-results/', 'INRRemittanceController@searchForm')->name('search_inr_remittance_forms_path');

// Premature Withdrawal Routes
Route::get('/BNBL-forms/premature-withdrawal-forms', 'PrematureWithdrawalController@getForms')->name('premature_withdrawal_forms_path');
Route::get('/BNBL-forms/premature-withdrawal-forms/{id}/{action}', 'PrematureWithdrawalController@viewForm')->name('show_premature_withdrawal_form_path');
Route::get('/BNBL-forms/premature-withdrawal-forms/search', 'PrematureWithdrawalController@getSearchForm')->name('search_premature_withdrawal_form_path');
Route::get('/BNBL-forms/premature-withdrawal-forms/search-results/', 'PrematureWithdrawalController@searchForm')->name('search_premature_withdrawal_forms_path');



// Gift Routes
Route::get('/BNBL-forms/gift-forms', 'GiftController@getGiftForms')->name('gift_forms_path');
Route::get('/BNBL-forms/gift-forms/{id}/{action}', 'GiftController@viewGiftForm')->name('show_gift_form_path');
Route::get('/BNBL-forms/gift-forms/search', 'GiftController@getGiftSearchForm')->name('search_gift_form_path');
Route::get('/BNBL-forms/gift-forms/search-results/', 'GiftController@searchGift')->name('search_gift_forms_path');

// Debit Card Request Route
Route::get('/BNBL-forms/debit-card-forms', 'DebitCardRequestController@getForms')->name('debit_card_request_forms_path');
Route::get('/BNBL-forms/debit-card-forms/{id}/{action}', 'DebitCardRequestController@viewForm')->name('show_debit_card_request_form_path');
Route::get('/BNBL-forms/debit-card-forms/search', 'DebitCardRequestController@getSearchForm')->name('search_debit_card_request_form_path');
Route::get('/BNBL-forms/debit-card-forms/search-results', 'DebitCardRequestController@searchForm')->name('search_debit_card_request_forms_path');


// MoneyGram Claim Route
Route::get('/BNBL-forms/money-gram-claim-forms', 'MoneyGramClaimController@getForms')->name('money_gram_claim_forms_path');
Route::get('/BNBL-forms/money-gram-claim-forms/{id}/{action}', 'MoneyGramClaimController@viewForm')->name('show_money_gram_claim_form_path');
Route::get('/BNBL-forms/money-gram-claim-forms/search', 'MoneyGramClaimController@getSearchForm')->name('search_money_gram_claim_form_path');
Route::get('/BNBL-forms/money-gram-claim-forms/search-results', 'MoneyGramClaimController@searchForm')->name('search_money_gram_claim_forms_path');

// Account Update Form Route
Route::get('/BNBL-forms/account-detail-update-forms', 'AccountDetailUpdateController@getForms')->name('account_detail_update_forms_path');
Route::get('/BNBL-forms/account-detail-update-forms/{id}/{action}', 'AccountDetailUpdateController@viewForm')->name('show_account_detail_update_form_path');
Route::get('/BNBL-forms/account-detail-update-forms/search', 'AccountDetailUpdateController@getSearchForm')->name('search_account_detail_update_form_path');
Route::get('/BNBL-forms/account-detail-update-forms/search-results', 'AccountDetailUpdateController@searchForm')->name('search_account_detail_update_forms_path');

// NRB Loan Application Form Route
Route::get('/BNBL-forms/bla-loan-application-forms', 'NRBLoanApplicationController@getForms')->name('nrb_loan_application_forms_path');
Route::get('/BNBL-forms/bla-loan-application-forms/{id}/{action}', 'NRBLoanApplicationController@viewForm')->name('show_nrb_loan_application_form_path');
Route::get('/BNBL-forms/bla-loan-application-forms/search', 'NRBLoanApplicationController@getSearchForm')->name('search_nrb_loan_application_form_path');
Route::get('/BNBL-forms/bla-loan-application-forms/search-results', 'NRBLoanApplicationController@searchForm')->name('search_nrb_loan_application_forms_path');


// Other Admin Routes
Route::post('/BNBL-forms/change-status', 'StatusChangeController@changeStatus')->name('change_form_status_path');

Route::get('/notifiers', 'AdminViewController@getNotifiers')->name('notifiers_path')->middleware('role');
Route::get('/notifiers/edit', 'AdminViewController@getEditNotifiers')->name('edit_notifiers_path')->middleware('role');
Route::post('/notifiers/update', 'NotifierController@updateNotifier')->name('update_notifiers_path')->middleware('role');

Route::get('/roles-and-forms', 'AdminViewController@getRolesAndForms')->name('rolesandforms_path')->middleware('role');
Route::get('/roles-and-forms/{role_id}/link/{form_id}', 'RolesAndFormsController@linkForm')->name('link_form_path')->middleware('role');
Route::get('/roles-and-forms/{link_id}/unlink', 'RolesAndFormsController@unlinkForm')->name('unlink_form_path')->middleware('role');

Route::get('/users', 'AdminViewController@getUsers')->name('users_path')->middleware('role');
Route::get('/users/add-new-user', 'AdminViewController@getAddUserForm')->name('add_user_path')->middleware('role');
Route::post('/users/add-new-user', 'UserController@addNewUser')->middleware('role');
Route::get('/users/{user_id}/edit', 'AdminViewController@getEditUserForm')->name('edit_user_path')->middleware('role');
Route::post('/users/{user_id}/edit', 'UserController@updateUser')->middleware('role');
Route::get('/user/change-password', 'AdminViewController@getChangePasswordForm')->name('change_password_path');
Route::post('/user/change-password', 'UserController@changePassword');

Route::get('/add-new-role', 'AdminViewController@getAddRoleForm')->name('add_role_path')->middleware('role');
Route::post('/add-new-role','RoleController@addNewRole')->middleware('role');
Route::get('/roles/{role_id}/edit', 'AdminViewController@getEditRoleForm')->name('edit_role_path')->middleware('role');
Route::post('/roles/{role_id}/edit', 'RoleController@updateRole')->middleware('role');

Route::get('/BNBL-forms/add-new-form', 'AdminViewController@getAddFormForm')->name('add_form_path')->middleware('role');
Route::post('/BNBL-forms/add-new-form', 'FormController@addNewForm')->middleware('role');
Route::get('/BNBL-forms/{form_id}/edit', 'AdminViewController@getEditFormForm')->name('edit_form_path')->middleware('role');
Route::post('/BNBL-forms/{form_id}/edit', 'FormController@updateForm')->middleware('role');

Route::get('/login', 'AdminViewBeforeLoginController@getLoginForm')->name('login_path');
Route::get('/otp', 'AdminViewBeforeLoginController@getOTPForm')->name('otp_path');
Route::post('/otp/verify-user-name', 'AdminViewBeforeLoginController@verifyUserName')->name('verify_username_path');
Route::post('/otp/verify-otp', 'AdminViewBeforeLoginController@verifyOTP')->name('verify_otp_path');

Auth::routes(['register'=>false,'reset'=>false,'verify'=>false]);

// Route::get('/home', 'HomeController@index')->name('home');
Route::delete('/remove-components', 'RemoveController@removeComponents')->name('remove_components_path')->middleware('role');

// Account Statement Request Route
Route::get('/account-statement', 'AccountStatementController@getForm')->name('account_statement_form_path');

Route::post('/account-statement', 'AccountStatementController@verifyInfo');

Route::get('/account-statement/otp', 'AccountStatementController@getOTPForm')->name('otp_form_path');