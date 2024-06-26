<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

use App\Http\Controllers\LandingController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;

use App\Http\Controllers\User\UserMenuController;
use App\Http\Controllers\Merchandiser\MerchandiserMenuController;

// Users Export
use App\Http\Controllers\UserExportController;
// Payroll Input
use App\Http\Controllers\PayrollInputExportController;



// Account Supervisor
use App\Http\Controllers\AccountSupervisor\AccountSupervisorController;
use App\Http\Controllers\AccountSupervisor\AccountSupervisorDoorListController;
use App\Http\Controllers\AccountSupervisor\AccountSupervisorCoordinatorListController;
use App\Http\Controllers\AccountSupervisor\AccountSupervisorManningListController;
use App\Http\Controllers\Accountsupervisor\AccountSupervisorMerchandiserListController;

//payrollhead
use App\Http\Controllers\PayrollHead\PayrollHeadController;
use App\Http\Controllers\PayrollHead\PayrollHeadEfcListController;
use App\Http\Controllers\PayrollHead\PayrollHeadMckenzieListController;
use App\Http\Controllers\PayrollHead\PayrollHeadRfmListController;
use App\Http\Controllers\PayrollHead\PayrollHeadMagisListController;


// payrollofficer
use App\Http\Controllers\PayrollOfficer\PayrollOfficerController;
use App\Http\Controllers\PayrollOfficer\PayrollOfficerListController;
use App\Http\Controllers\Payrollofficer\PayrollOfficerTransferListController;
use App\Http\Controllers\PayrollOfficer\PayrollOfficerInputListController;

// treasury
use App\Http\Controllers\Treasury\TreasuryController;
use App\Http\Controllers\Treasury\TreasuryRateCardListController;

// Super Admin Controllers
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\SuperAdmin\SuperAdminSuperAdminListController;
use App\Http\Controllers\SuperAdmin\SuperAdminAccountSupervisorListController;
use App\Http\Controllers\SuperAdmin\SuperAdminPayrollOfficerListController;
use App\Http\Controllers\SuperAdmin\EfcListController;
use App\Http\Controllers\SuperAdmin\MckenzieListController;
use App\Http\Controllers\SuperAdmin\MagisListController;
use App\Http\Controllers\SuperAdmin\RfmListController;
use App\Http\Controllers\SuperAdmin\SuperAdminPayrollHeadListController;
use App\Http\Controllers\SuperAdmin\SuperAdminTreasuryListController;


use App\Http\Middleware\Merchandiser;
use App\Http\Middleware\SuperAdmin;
use App\Http\Middleware\Guest;
use App\Http\Middleware\AccountSupervisor;
use App\Http\Middleware\PayrollHead;
use App\Http\Middleware\PayrollOfficer;
use App\Http\Middleware\Treasury;




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

// Route::get('/', function () {
   
//     return view('landing.Home');
// });

//Route::get('/', LandingController::class . '@home')->name('home');

//Route::get('/login', LandingController::class . '@login')->name('auth.login');

//Route::get('/login', [LoginController::class, 'index']);

// users export
Route::get('users/export/', [UserExportController::class, 'export']);
// payroll input export
Route::get('payrollinput/export', [PayrollInputExportController::class, 'export']);






Route::post('/login_user', [LoginController::class, 'login_user'])->name('login_user');

//Route::get('/registration', LoginController::class . '@registration')->name('auth.registration');

Route::get('/logout' , [LoginController::class, 'logout'])->name('logout');

Route::post('/registration', [RegistrationController::class, 'registerUser'])->name('auth.register');

Route::post('/login/superadmin', [LoginController::class, 'loginsuperadmin'])->name('loginsuperadmin');


// Route::get('superadmin', function(){
//     return view('superadmin');
// })->name('superadmin')->middleware('superadmin');

Route::middleware([Guest::class])->group(function(){
    Route::get('/', [LandingController::class, 'home'])->name('home'); 
    Route::get('/login/superadmin', [LandingController::class, 'superadmin_login'])->name('auth.superadmin');
    Route::get('/login/payrollhead', [LandingController::class, 'payrollhead_login'])->name('auth.payrollhead');
    Route::get('/login/payrollofficer', [LandingController::class, 'payrollofficer_login'])->name('auth.payrollofficer');
    Route::get('/login/accountsupervisor', [LandingController::class, 'accountsupervisor_login'])->name('auth.accountsupervisor');
    Route::get('/login/treasury', [LandingController::class, 'treasury_login'])->name('auth.treasury');
    Route::get('/login', [LandingController::class, 'login'])->name('auth.login'); 
    Route::get('/registration', [LoginController::class, 'registration'])->name('auth.registration');
    Route::get('/about', [LandingController::class, 'about'])->name('landing.about');
    Route::get('/careers', [LandingController::class, 'careers'])->name('landing.careers');
    Route::get('/our-partners', [LandingController::class, 'ourpartners'])->name('landing.our-partners');
    Route::get('/contact', [LandingController::class, 'contact'])->name('landing.contact');
});

Route::middleware([SuperAdmin::class])->group(function(){
    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'view_dashboard'])->name('superadmin.view.dashboard');
    Route::get('/superadmin/accountsupervisor', [SuperAdminController::class, 'view_accountsupervisor'])->name('superadmin.view.accountsupervisor');
    Route::get('/superadmin/payrollofficer', [SuperAdminController::class, 'view_payrollofficer'])->name('superadmin.view.payrollofficer');
    Route::get('/superadmin/superadmin', [SuperAdminController::class, 'view_superadmin'])->name('superadmin.view.superadmin');
    Route::get('/superadmin/efc', [SuperAdminController::class, 'view_company_efc'])->name('superadmin.view.efc');
    Route::get('/superadmin/mckenzie', [SuperAdminController::class, 'view_company_mckenzie'])->name('superadmin.view.mckenzie');
    Route::get('/superadmin/magis', [SuperAdminController::class, 'view_company_magis'])->name('superadmin.view.magis');
    Route::get('/superadmin/rfm', [SuperAdminController::class, 'view_company_rfm'])->name('superadmin.view.rfm');
    Route::get('/superadmin/payrollhead', [SuperAdminController::class, 'view_payrollhead'])->name('superadmin.view.payrollhead');
    Route::get('/superadmin/treasury', [SuperAdminController::class, 'view_treasury'])->name('superadmin.view.treasury');


    //Account Supervisor Functions
    Route::get('/superadmin/accountsupervisor/list/fetch-data', [SuperAdminAccountSupervisorListController::class, 'fetchData']);
    Route::post('/superadmin/accountsupervisor/list/update-active-status', [SuperAdminAccountSupervisorListController::class, 'updateActiveStatus'])->name('superadmin.account-supervisor-list.update-active-status');
    Route::post('/superadmin/accountsupervisor/list/register-account', [SuperAdminAccountSupervisorListController::class, 'saveAccount'])->name('superadmin.account-supervisor-list.register');
    Route::post('/superadmin/accountsupervisor/list/update-account', [SuperAdminAccountSupervisorListController::class, 'updateAccount'])->name('superadmin.account-supervisor-list.update-account');
    Route::post('/superadmin/accountsupervisor/list/retrieve-update', [SuperAdminAccountSupervisorListController::class, 'getUpdateData'])->name('superadmin.account-supervisor-list.retrieve-update');
    Route::post('/superadmin/accountsupervisor/list/retrieve-view', [SuperAdminAccountSupervisorListController::class, 'getViewData'])->name('superadmin.account-supervisor-list.retrieve-view');
    
    //Payroll Officer Functions
    Route::get('/superadmin/payrollofficer/list/fetch-data', [SuperAdminPayrollOfficerListController::class, 'fetchData']);
    Route::post('/superadmin/payrollofficer/list/update-active-status', [SuperAdminPayrollOfficerListController::class, 'updateActiveStatus'])->name('superadmin.payroll-officer-list.update-active-status');
    Route::post('/superadmin/payrollofficer/list/register-account', [SuperAdminPayrollOfficerListController::class, 'saveAccount'])->name('superadmin.payroll-officer-list.register');
    Route::post('/superadmin/payrollofficer/list/update-account', [SuperAdminPayrollOfficerListController::class, 'updateAccount'])->name('superadmin.payroll-officer-list.update-account');
    Route::post('/superadmin/payrollofficer/list/retrieve-update', [SuperAdminPayrollOfficerListController::class, 'getUpdateData'])->name('superadmin.payroll-officer-list.retrieve-update');
    Route::post('/superadmin/payrollofficer/list/retrieve-view', [SuperAdminPayrollOfficerListController::class, 'getViewData'])->name('superadmin.payroll-officer-list.retrieve-view');

    //Super Admin Functions
    Route::get('/superadmin/superadmin/list/fetch-data', [SuperAdminSuperAdminListController::class, 'fetchData']);
    Route::post('/superadmin/superadmin/list/update-active-status', [SuperAdminSuperAdminListController::class, 'updateActiveStatus'])->name('superadmin.super-admin-list.update-active-status');
    Route::post('/superadmin/superadmin/list/register-account', [SuperAdminSuperAdminListController::class, 'saveAccount'])->name('superadmin.super-admin-list.register');
    Route::post('/superadmin/superadmin/list/update-account', [SuperAdminSuperAdminListController::class, 'updateAccount'])->name('superadmin.super-admin-list.update-account');
    Route::post('/superadmin/superadmin/list/retrieve-update', [SuperAdminSuperAdminListController::class, 'getUpdateData'])->name('superadmin.super-admin-list.retrieve-update');
    Route::post('/superadmin/superadmin/list/retrieve-view', [SuperAdminSuperAdminListController::class, 'getViewData'])->name('superadmin.super-admin-list.retrieve-view');
    
    //Payroll Head Functions
    Route::get('/superadmin/payrollhead/list/fetch-data', [SuperAdminPayrollHeadListController::class, 'fetchData']);
    Route::post('/superadmin/payrollhead/list/update-active-status',[SuperAdminPayrollHeadListController::class, 'updateActiveStatus'])->name('superadmin.payroll-head-list.update-active-status');
    Route::post('/superadmin/payrollhead/list/register-account',[SuperAdminPayrollHeadListController::class, 'saveAccount'])->name('superadmin.payroll-head-list.register');
    Route::post('/superadmin/payrollhead/list/update-account', [SuperAdminPayrollHeadListController::class, 'updateAccount'])->name('superadmin.payroll-head-list.update-account');
    Route::post('/superadmin/payrollhead/list/retrieve-update',[SuperAdminPayrollHeadListController::class, 'getUpdateData'])->name('superadmin.payroll-head-list.retrieve-update');
    Route::post('/superadmin/payrollhead/list/retrieve-view', [SuperAdminPayrollHeadListController::class, 'getViewData'])->name('superadmin.payroll-head-list.retrieve-view');

    //Treasury Functions
    Route::get('/superadmin/treasury/list/fetch-data', [SuperAdminTreasuryListController::class, 'fetchData']);
    Route::post('/superadmin/treasury/list/update-active-status',[SuperAdminTreasuryListController::class, 'updateActiveStatus'])->name('superadmin.treasury-list.update-active-status');
    Route::post('/superadmin/treasury/list/register-account',[SuperAdminTreasuryListController::class, 'saveAccount'])->name('superadmin.treasury-list.register');
    Route::post('/superadmin/treasury/list/update-account', [SuperAdminTreasuryListController::class, 'updateAccount'])->name('superadmin.treasury-list.update-account');
    Route::post('/superadmin/treasury/list/retrieve-update',[SuperAdminTreasuryListController::class, 'getUpdateData'])->name('superadmin.treasury-list.retrieve-update');
    Route::post('/superadmin/treasury/list/retrieve-view', [SuperAdminTreasuryListController::class, 'getViewData'])->name('superadmin.treasury-list.retrieve-view');

    //Company EFC  Functions
    Route::get('/superadmin/efc/list/fetch-data', [EfcListController::class, 'fetchData']);
    Route::post('/superadmin/efc/list/register-account', [EfcListController::class, 'saveAccount'])->name('superadmin.efc-list.register');
    Route::post('/superadmin/efc/list/update-account', [EfcListController::class, 'updateAccount'])->name('superadmin.efc-list.update-account');
    Route::get('/superadmin/efc/list/retrieve-update/{id}', [EfcListController::class, 'getUpdateData'])->name('superadmin.efc-list.retrieve-update');
    Route::get('/superadmin/efc/list/retrieve-view/{id}', [EfcListController::class, 'getViewData'])->name('superadmin.efc-list.retrieve-view');


     //Company MCKENZIE  Functions
     Route::get('/superadmin/mckenzie/list/fetch-data', [MckenzieListController::class, 'fetchData']);
     Route::post('/superadmin/mckenzie/list/register-account', [MckenzieListController::class, 'saveAccount'])->name('superadmin.mckenzie-list.register');
     Route::post('/superadmin/mckenzie/list/update-account', [MckenzieListController::class, 'updateAccount'])->name('superadmin.mckenzie-list.update-account');
     Route::get('/superadmin/mckenzie/list/retrieve-update/{id}', [MckenzieListController::class, 'getUpdateData'])->name('superadmin.mckenzie-list.retrieve-update');
     Route::get('/superadmin/mckenzie/list/retrieve-view/{id}', [MckenzieListController::class, 'getViewData'])->name('superadmin.mckenzie-list.retrieve-view');

     //Company Magis  Functions
     Route::get('/superadmin/magis/list/fetch-data', [MagisListController::class, 'fetchData']);
     Route::post('/superadmin/magis/list/register-account', [MagisListController::class, 'saveAccount'])->name('superadmin.magis-list.register'); 
     Route::post('/superadmin/magis/list/update-account', [MagisListController::class, 'updateAccount'])->name('superadmin.magis-list.update-account');
     Route::get('/superadmin/magis/list/retrieve-update/{id}', [MagisListController::class, 'getUpdateData'])->name('superadmin.magis-list.retrieve-update');
     Route::get('/superadmin/magis/list/retrieve-view/{id}', [MagisListController::class, 'getViewData'])->name('superadmin.magis-list.retrieve-view');

     //Company RFM  Functions
     Route::get('/superadmin/rfm/list/fetch-data', [RfmListController::class, 'fetchData']);
     Route::post('/superadmin/rfm/list/register-account', [RfmListController::class, 'saveAccount'])->name('superadmin.rfm-list.register');
     Route::post('/superadmin/rfm/list/update-account', [RfmListController::class, 'updateAccount'])->name('superadmin.rfm-list.update-account');
     Route::get('/superadmin/rfm/list/retrieve-update/{id}', [RfmListController::class, 'getUpdateData'])->name('superadmin.rfm-list.retrieve-update');
     Route::get('/superadmin/rfm/list/retrieve-view/{id}', [RfmListController::class, 'getViewData'])->name('superadmin.rfm-list.retrieve-view');

  

  
});

// Payrollhead routes
Route::middleware([PayrollHead::class])->group(function(){
    Route::get('/payrollhead/dashboard', [PayrollHeadController::class, 'view_dashboard'])->name('payrollhead.view.dashboard');
    // new code added for payrollhead routes starts here
    Route::get('/payrollhead/efcpayrollhead', [PayrollHeadController::class, 'view_efc_payrollhead'])->name('payrollhead.view.efcpayrollhead');
    Route::get('/payrollhead/mckenziepayrollhead', [PayrollHeadController::class, 'view_mckenzie_payrollhead'])->name('payrollhead.view.mckenziepayrollhead');
    Route::get('/payrollhead/rfmpayrollhead', [PayrollHeadController::class, 'view_rfm_payrollhead'])->name('payrollhead.view.rfmpayrollhead');
    Route::get('/payrollhead/magispayrollhead', [PayrollHeadController::class, 'view_magis_payrollhead'])->name('payrollhead.view.magispayrollhead');
    //new code added for payrollhead routes ends here 

    Route::get('/payrollhead/efc-door-list/fetch-data', [PayrollHeadEfcListController::class, 'fetchData']);
    Route::post('/payrollofficer/payrollofficerefc/list/transfer-payroll', [PayrollHeadEfcListController::class, 'transferEfcPayroll']);

    Route::get('/payrollhead/mckenzie-door-list/fetch-data', [PayrollHeadMckenzieListController::class, 'fetchData']);
    Route::get('/payrollhead/rfm-door-list/fetch-data', [PayrollHeadRfmListController::class, 'fetchData']);
    Route::get('/payrollhead/magis-door-list/fetch-data', [PayrollHeadMagisListController::class, 'fetchData']);




});
    // Payroll officer routes
Route::middleware([PayrollOfficer::class])->group(function(){ 
    Route::get('/payrollofficer/dashboard', [PayrollOfficerController::class, 'view_dashboard'])->name('payrollofficer.view.dashboard');
    Route::get('/payrollofficer/payrollofficerlist', [PayrollOfficerController::class, 'view_payrollofficerlist'])->name('payrollofficer.view.payrollofficerlist');
    Route::get('/payrollofficer/payrolltransferlist', [PayrollOfficerController::class, 'view_payrolltransferlist'])->name('payrollofficer.view.payrolltransferlist');
    // payroll inputs 
    Route::get('/payrollofficer/payrollofficerinput', [PayrollOfficerController::class, 'view_payrollofficerinput'])->name('payrollofficer.view.payrollofficerinput');
    //payrollofficer controller
    Route::get('/payrollofficer/payrollofficerlist/list/fetch-data', [PayrollOfficerListController::class, 'fetchData']);
    Route::get('/payrollofficer/payrollofficertransferlist/list/fetch-data', [PayrollOfficerTransferListController::class, 'fetchData']);
    Route::get('/payrollofficer/payrollofficerinput/list/fetch-data', [PayrollOfficerInputListController::class, 'fetchData']);
    // payroll officer input save data
    Route::post('payrollofficer/payrollofficerinput/list/save-data', [PayrollOfficerInputListController::class, 'saveData'])->name('payrollofficer.payrollinput-list.save');
 


});
//* Account Supervisor
Route::middleware([AccountSupervisor::class])->group(function(){
    Route::get('/accountsupervisor/dashboard', [AccountSupervisorController::class, 'view_dashboard'])->name('accountsupervisor.view.dashboard');
    Route::get('/accountsupervisor/door', [AccountSupervisorController::class, 'view_door'])->name('accountsupervisor.view.door');
    Route::get('/accountsupervisor/coordinator', [AccountSupervisorController::class, 'view_coordinator'])->name('accountsupervisor.view.coordinator');
    Route::get('/accountsupervisor/merchandiser', [AccountSupervisorController::class, 'view_merchandiser'])->name('accountsupervisor.view.merchandiser');
    Route::get('/accountsupervisor/manning', [AccountSupervisorController::class, 'view_manning'])->name('accountsupervisor.view.manning');

    //Manning fuctions
    Route::get('/accountsupervisor/manning-list/fetch-data', [AccountSupervisorManningListController::class, 'fetchData']);
    Route::post('/accountsupervisor/manning/list/register-account', [AccountSupervisorManningListController::class, 'saveAccount'])->name('accountsupervisor.manning-list.register');
    Route::post('/accountsupervisor/manning/list/update-account', [AccountSupervisorManningListController::class, 'updateAccount'])->name('accountsupervisor.manning-list.update-account');
    Route::get('/accountsupervisor/manning/list/retrieve-update/{id}', [AccountSupervisorManningListController::class, 'getUpdateData'])->name('accountsupervisor.manning-list.retrieve-update');
    Route::get('/accountsupervisor/maning/list/retrieve-view/{id}', [AccountSupervisorManningListController::class, 'getViewData'])->name('accountsupervisor.manning-list.retrieve-view');

    //Merchandiser fuctions
    Route::get('/accountsupervisor/merchandiser-list/fetch-data', [AccountSupervisorMerchandiserListController::class, 'fetchData']);
    Route::post('/accountsupervisor/merchandiser/list/register-account', [AccountSupervisorMerchandiserListController::class, 'saveAccount'])->name('accountsupervisor.merchandiser-list.register');
    Route::post('/accountsupervisor/merchandiser/list/update-account', [AccountSupervisorMerchandiserListController::class, 'updateAccount'])->name('accountsupervisor.merchandiser-list.update-account');
    Route::get('/accountsupervisor/merchandiser/list/retrieve-update/{id}', [AccountSupervisorMerchandiserListController::class, 'getUpdateData'])->name('accountsupervisor.merchandiser-list.retrieve-update');
    Route::get('/accountsupervisor/merchandiser/list/retrieve-view/{id}', [AccountSupervisorMerchandiserListController::class, 'getViewData'])->name('accountsupervisor.merchandiser-list.retrieve-view');

    //Door Functions
    Route::get('/accountsupervisor/door-list/fetch-data', [AccountSupervisorDoorListController::class, 'fetchData']);
    // Route::post('/superadmin/efc/list/register-account', [EfcListController::class, 'saveAccount'])->name('superadmin.efc-list.register');
    Route::post('/accountsupervisor/door/list/update-account', [AccountSupervisorDoorListController::class, 'updateAccount'])->name('accountsupervisor.door-list.update-account');
    Route::get('/accountsupervisor/door/list/retrieve-update/{id}', [AccountSupervisorDoorListController::class, 'getUpdateData'])->name('accountsupervisor.door-list.retrieve-update');
    Route::get('/accountsupervisor/door/list/retrieve-view/{id}', [AccountSupervisorDoorListController::class, 'getViewData'])->name('accountsupervisor.door-list.retrieve-view');
    Route::get('/accountsupervisor/door/list/retrieve-merhandiser-door/{id}', [AccountSupervisorDoorListController::class, 'getViewMerchandiserManning'])->name('accountsupervisor.merchandiser-door-list');
    Route::get('/accountsupervisor/door-list/fetch-merchandiser-data', [AccountSupervisorDoorListController::class, 'fetchMerchandiserData']);
    //for circle-plus Button
    Route::post('/accountsupervisor/door-list/save-merchandiser-data', [AccountSupervisorDoorListController::class, 'saveMerchandiserData']);
    
    //new code added
    // Route::get('accountsupervisor///door-list/save-merchandiser-data', [AccountSupervisorDoorListController::class, 'saveMerchandiserData']);
    //<!-- 11-03-2024 new code added starts here -->
    Route::post('/accountsupervisor/door-list-remove-merchandiser-data/{id}', [AccountSupervisorDoorListController::class, 'destroy']);
    // <!-- 11-03-2024 new code added ends here -->

    //Client Coordinator Functions
    Route::get('/accountsupervisor/coordinator-list/fetch-data', [AccountSupervisorCoordinatorListController::class, 'fetchData']);
    Route::post('/accountsupervisor/coordinator/list/register-account', [AccountSupervisorCoordinatorListController::class, 'saveAccount'])->name('accountsupervisor.coordinator-list.register');
    Route::post('/accountsupervisor/coordinator/list/update-account', [AccountSupervisorCoordinatorListController::class, 'updateAccount'])->name('accountsupervisor.coordinator-list.update-account');
    Route::get('/accountsupervisor/coordinator/list/retrieve-update/{id}', [AccountSupervisorCoordinatorListController::class, 'getUpdateData'])->name('accountsupervisor.coordinator-list.retrieve-update');
    Route::get('/accountsupervisor/coordinator/list/retrieve-view/{id}', [AccountSupervisorCoordinatorListController::class, 'getViewData'])->name('accountsupervisor.coordinator-list.retrieve-view');


}); 

Route::middleware([Treasury::class])->group(function(){
     Route::get('/treasury/dashboard', [TreasuryController::class, 'view_dashboard'])->name('treasury.view.dashboard');
     Route::get('/treasury/rate', [TreasuryController::class, 'view_rate'])->name('treasury.view.rate');
    //Treasury fetch data starts here
     Route::get('/treasury/rate-card-list/fetch-data', [TreasuryRateCardListController::class, 'fetchData']);
     //for modal
     Route::get('/treasury/rate-card/list/retrieve-view/{id}', [TreasuryRateCardListController::class, 'getViewData'])->name('treasury.rate-card-list.retrieve-update');
     Route::get('/treasury/rate-card/list/retrieve-update/{id}', [TreasuryRateCardlistController::class, 'getUpdateData'])->name('treasury.rate-card-list.retrieve-view');
     
     Route::post('/treasury/rate-card/list/update-ratecard/', [TreasuryRateCardListController::class, 'updateRateCard'])->name('treasury.rate-card-list.update-ratecard');
     Route::post('/treasury/rate-card/list/save-ratecard/', [TreasuryRateCardListController::class, 'saveRateCard'])->name('treasury.rate-card-list.save-ratecard');
    
});


Route::middleware([Merchandiser::class])->group(function(){
    Route::get('/merchandiser/menu', [MerchandiserMenuController::class, 'view_menu'])->name('merchandiser.view.menu');
});