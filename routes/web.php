<?php

use App\Admin;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeadController;
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

//lead
// Route::get('/admin/leads', 'LeadController@index');
// Route::get('/admin/{page}/{id}', 'LeadController@view');
// Route::get('/admin/{page}', 'LeadController@view');

//opportunity
// Route::get('/admin/{page}', 'LeadController@view');
//insert lead
// Route::post('/admin/lead/insert', 'LeadController@store');
// Route::post('/admin/lead/update/{id}', 'LeadController@update');
// Route::post('/admin/lead/editLead', 'LeadController@edit');
// Route::get('/admin/lead/destroy/{id}', 'LeadController@destroy');
Route::get('/admin/lead/status', 'LeadController@changeStatus');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin', 'preventBackHistory'])->group(function () {
        Route::view('/login', 'admin.login')->name('login');
        Route::post('/signin', [LeadController::class, 'check'])->name('check');
    });
    Route::middleware(['auth:admin', 'preventBackHistory'])->group(function () {
        //leads
        /* -- shahab routes -- */

        //convert lead to upsell
        Route::get('/lead/convert/{id}', [LeadController::class, 'convertToUpsell']);
        //delete permanently
        Route::get('/lead/dletPerm/{id}', [LeadController::class, 'delete_permanently']);
        Route::post('changeAccountStatus', [LeadController::class, 'accountStatus']);

        /* end */

        Route::post('/insert', [LeadController::class, 'store'])->name('insert');
        Route::get('/lead/destroy/{id}', [LeadController::class, 'destroy'])->name('deleteLead.id');

        Route::post('/lead/update/{id}', [LeadController::class, 'update'])->name('updateLead.id');
        Route::post('/changeStatus', [LeadController::class, 'changeStatus'])->name('changeStatus');

        Route::post('/insertNote', [LeadController::class, 'insertNote'])->name('insertNote');
        Route::post('/deleteNote', [LeadController::class, 'deleteNote'])->name('deleteNote');
        Route::get('/deleteUser/{id}', [LeadController::class, 'deleteUser'])->name('deleteUser');

        Route::get('/', [LeadController::class, 'index'])->name('index');
        Route::get('/view/{page}', [LeadController::class, 'view'])->name('view.page');
        Route::get('/view/{page}/{id}', [LeadController::class, 'view'])->name('view.pageID');

        Route::post('/uploadFile', [LeadController::class, 'uploadFile'])->name('uploadFile');

        Route::post('/addEvent', [LeadController::class, 'addEvent'])->name('addEvent');
        Route::post('/checked_event', [LeadController::class, 'checkedEvent'])->name('checked_event');
        Route::post('/changeLeadStatus', [LeadController::class, 'changeLeadStatus'])->name('changeLeadStatus');
        Route::post('/changeInnerLead', [LeadController::class, 'changeInnerLead'])->name('changeInnerLead');
        Route::post('/changeUpsellStage', [LeadController::class, 'changeUpsellStage'])->name('changeUpsellStage');

        //update Temp Stages
        Route::post('/updateTempStages', [LeadController::class, 'updateTempStages'])->name('updateTempStages');

        Route::post('/moveTo/{status}', [LeadController::class, 'moveTo'])->name('moveTo.status');

        Route::post('/addTeamMember', [LeadController::class, 'addMember'])->name('addTeamMember');

        //sendMail
        Route::post('/sendMailRedirect', [LeadController::class, 'sendMailAndRedirect'])->name('send');

        //check Task
        Route::post('/checked_task', [LeadController::class, 'checkedTask'])->name('checked_task');

        Route::post('/timesheet-report', [LeadController::class, 'timeSheetReport'])->name('timeSheetReport');

        //punch
        Route::post('/punchTime', [LeadController::class, 'punchTime'])->name('punchTime');

        //updateTimeSheetTime
        Route::post('/updateTime', [LeadController::class, 'updateTime'])->name('updateTime');

        Route::post('/logout', [LeadController::class, 'logout'])->name('logout');

        //testing purpose
        Route::get('/test', [LeadController::class, 'test'])->name('test');
    });
});

//lead task
Route::post('/admin/lead/addTask/{id}', 'TaskController@store');



//download File Url
Route::post('/downloadFile', [LeadController::class, 'download'])->name('downloadFile');

//Employee Routes
Route::prefix('employee')->name("employee.")->group(function () {
    Route::middleware(['guest:web', 'preventBackHistory'])->group(function () {
        Route::view('/login', 'employees.login')->name('login');
        Route::post('/signin', [EmployeeController::class, 'check'])->name('check');
        //Password Change Routes
        Route::view('/forgot_password', 'employees.forgot_password')->name('forgot_password');
        Route::get('/passChangeForm/{encodedID}/{token}',[EmployeeController::class,'passChangeForm'])->name('passChangeForm');
        Route::post('/changePass',[EmployeeController::class,'changePass'])->name('changePass');
        // Route::view('/register', 'employees.register')->name('register');
        // Route::post('/register', [EmployeeController::class, 'create'])->name('create');
    });
    Route::middleware(['auth:web', 'preventBackHistory'])->group(function () {
        Route::post('changeAccountStatus', [EmployeeController::class, 'accountStatus']);
        Route::post('/insert', [EmployeeController::class, 'store'])->name('insert');
        Route::get('/lead/destroy/{id}', [EmployeeController::class, 'destroy'])->name('deleteLead.id');
        Route::post('/lead/update/{id}', [EmployeeController::class, 'update'])->name('updateLead.id');
        Route::post('/changeStatus', [EmployeeController::class, 'changeStatus'])->name('changeStatus');

        Route::post('/insertNote', [EmployeeController::class, 'insertNote'])->name('insertNote');
        Route::post('/deleteNote', [EmployeeController::class, 'deleteNote'])->name('deleteNote');

        Route::get('/', [EmployeeController::class, 'index'])->name('index');
        Route::get('/view/{page}', [EmployeeController::class, 'view'])->name('view.page');
        Route::get('/view/{page}/{id}', [EmployeeController::class, 'view'])->name('view.pageID');

        Route::post('/uploadFile', [EmployeeController::class, 'uploadFile'])->name('uploadFile');

        Route::post('/addEvent', [EmployeeController::class, 'addEvent'])->name('addEvent');
        Route::post('/checked_event', [EmployeeController::class, 'checkedEvent'])->name('checked_event');
        Route::post('/changeLeadStatus', [EmployeeController::class, 'changeLeadStatus'])->name('changeLeadStatus');
        Route::post('/changeInnerLead', [EmployeeController::class, 'changeInnerLead'])->name('changeInnerLead');
        Route::post('/changeUpsellStage', [EmployeeController::class, 'changeUpsellStage'])->name('changeUpsellStage');

        //update Temp Stages
        Route::post('/updateTempStages', [EmployeeController::class, 'updateTempStages'])->name('updateTempStages');

        Route::post('/moveTo/{status}', [EmployeeController::class, 'moveTo'])->name('moveTo.status');

        Route::post('/addTeamMember', [EmployeeController::class, 'addMember'])->name('addTeamMember');

        //sendMail
        Route::post('/sendMailRedirect', [EmployeeController::class, 'sendMailAndRedirect'])->name('send');

        //check Task
        Route::post('/checked_task', [EmployeeController::class, 'checkedTask'])->name('checked_task');

        Route::post('/timesheet-report', [EmployeeController::class, 'timeSheetReport'])->name('timeSheetReport');

        //punch
        Route::post('/punchTime', [EmployeeController::class, 'punchTime'])->name('punchTime');

        //updateTimeSheetTime
        Route::post('/updateTime', [EmployeeController::class, 'updateTime'])->name('updateTime');

        Route::post('/logout', [EmployeeController::class, 'logout'])->name('logout');

        //testing purpose
        Route::get('/test', [LeadController::class, 'test'])->name('test');
    });
});
