<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyMail;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/clear-cache', function () {
	Artisan::call('cache:clear');
	Artisan::call('route:clear');
	Artisan::call('view:clear');

	return redirect('/')->with('message', 'Cache clear successfully.');
});

//Queue mail
Route::get('/start-queue-worker', 'Sms_ServiceController@startQueueWorker');


//Auth 
//Route::match(['get','post'],'attendanceMessageStatus', 'StudentAttendanceController@attendanceMessageStatus');
//Route::get('/our_backup_database', 'Auth\AuthController@our_backup_database');    


Route::get('/access-denied', function () {
    return view('access.denied');
})->name('access.denied');



//Auth 
//Route::get('/our_backup_database', 'Auth\AuthController@our_backup_database');    
Route::match(['get','post'],'attendanceSendMassage', 'CronJobController@attendanceSendMassage');
Route::match(['get','post'],'attendanceSendMassage111', 'CronJobController@attendanceSendMassage111');
Route::match(['get','post'],'birthday_auto_massage', 'CronJobController@birthday_auto_massage');



Route::match(['get', 'post'], 'cronJobs', 'CronJobController@cronJobs');

Route::get('softwareTokenStatus', function(){ session()->put('softwareTokenStatus',1); });
Route::get('testMobile/{mobile}', function($mobile){ session()->put('testMobile',$mobile); return redirect::to('/')->with('message', 'Test Mobile Updated!');});
Route::match(['get', 'post'], 'set_session_count', 'Auth\AuthController@setCountSession');
Route::match(['get', 'post'], 'login', 'Auth\AuthController@getLogin');
Route::match(['get', 'post'], 'forgot_password', 'Auth\AuthController@forgotPassword');
Route::match(['get', 'post'], 'whatsappOtpRequest', 'Auth\AuthController@whatsappOtpRequest');
Route::match(['get', 'post'], 'logout', 'Auth\AuthController@logout');
// Route::match(['get', 'post'], 'setSidebar', 'Auth\AuthController@setSidebar');
// Route::match(['get', 'post'], 'allowSidebar', 'Auth\AuthController@allowSidebar');
Route::match(['get', 'post'], 'admin/login', 'Auth\AuthController@adminLogin');
Route::match(['get', 'post'], 'teacher/login', 'Auth\AuthController@teacherLogin');
Route::match(['get', 'post'], 'student/login', 'Auth\AuthController@studentLogin');
Route::match(['get', 'post'], 'is-login', 'Auth\AuthController@getIslogin');
Route::match(['get', 'post'], 'getregister', 'Auth\AuthController@getregister');
Route::match(['get', 'post'], 'register', 'Auth\AuthController@register');
// Route::match(['get', 'post'], 'clearTable', 'Auth\AuthController@clearTable');
Route::match(['get', 'post'], 'qr_code', 'EnquiryController@qrCode');

Route::any('newStudentRegistration', 'Auth\AuthController@newStudentRegistration');
Route::group(['middleware' => 'islogin'], function () {
    
Route::match(['get', 'post'], 'setWhatsappPermission', 'WhatsappController@setWhatsappPermission');
Route::match(['get', 'post'], 'whatsapp_api_response', 'WhatsappController@whatsappApiResponse');
Route::match(['get', 'post'], 'whatsappSendFeesRemainder', 'WhatsappController@whatsappSendFeesRemainder');
Route::match(['get', 'post'], 'messangerButtons', 'WhatsappController@messangerButtons');
Route::match(['get', 'post'], 'sendWhatsapp', 'WhatsappController@sendWhatsapp');
Route::match(['get', 'post'], 'todayWhatsappMessages', 'WhatsappController@todayWhatsappMessages');
Route::match(['get', 'post'], 'validateOtpWhatsapp', 'WhatsappController@validateOtpWhatsapp');
    
// Chat Panel
Route::match(['get', 'post'], 'chat/test', 'chat\ChatController@chatTest');
Route::match(['get', 'post'], 'chat/compose', 'chat\ChatController@compose');
Route::match(['get', 'post'], 'search/chat/user', 'chat\ChatController@searchChat');
Route::match(['get', 'post'], 'chat/user/show/click', 'chat\ChatController@chatUserShowClick');
Route::match(['get', 'post'], 'chat/last/message', 'chat\ChatController@chatLastMessage');
Route::match(['get', 'post'], 'send/chat', 'chat\ChatController@sendChat');
Route::match(['get', 'post'], 'download/chat/document', 'chat\ChatController@downloadChatDocument');
Route::match(['get', 'post'], 'delete/chat/message', 'chat\ChatController@deleteChatMessage');
Route::match(['get', 'post'], 'chat/message/seen', 'chat\ChatController@chatMessageSeen');

//Settings
Route::match(['get', 'post'], 'addSetting', 'SettingsController@addSetting');
Route::match(['get', 'post'], 'viewSetting', 'SettingsController@viewSetting');
Route::match(['get', 'post'], 'editSetting/{id}', 'SettingsController@editSetting');
Route::match(['get', 'post'], 'deleteSetting', 'SettingsController@deleteSetting');
Route::match(['get', 'post'], 'addVillageList', 'SettingsController@addVillageList');
Route::match(['get', 'post'], 'deleteVillageList', 'SettingsController@deleteVillageList');
//User
Route::match(['get', 'post'], 'addUser', 'UserController@addUser'); 
Route::match(['get', 'post'], 'viewUser', 'UserController@viewUser');
Route::match(['get', 'post'], 'editUser/{id}', 'UserController@editUser');
Route::match(['get', 'post'], 'deleteUser', 'UserController@deleteUser');
Route::match(['get', 'post'], 'userStatus', 'UserController@userStatus');
Route::match(['get', 'post'], 'user/Attendance/view', 'UserController@userAttendanceView');

//ReportController

 Route::match(['get', 'post'], 'reporting_dashboard', 'Report\ReportingDashboard@reportingDashboard');
 Route::match(['get', 'post'], 'fees_reporting', 'Report\ReportingDashboard@feesReporting');
 Route::match(['get', 'post'], 'reporting', 'Report\ReportingDashboard@reporting');
 Route::match(['get', 'post'], 'hostel_reporting', 'Report\HostelControllers@hostel_reporting');
 Route::match(['get', 'post'], 'hostel_pending_fees', 'Report\HostelControllers@hostel_pending_fees');

 
//EnquiryController 
    Route::match(['get', 'post'], 'studentsDashboard', 'EnquiryController@studentsDashboard');
    Route::match(['get', 'post'], 'enquiryAdd', 'EnquiryController@enquiryAdd');
    Route::match(['get', 'post'], 'enquiryView', 'EnquiryController@enquiryView');
    // Route::match(['get', 'post'], 'enquiry_status_update', 'EnquiryController@enquiryStatusUpdate');
    Route::match(['get', 'post'], 'enquiryEdit/{id}', 'EnquiryController@enquiryEdit');
    Route::match(['get', 'post'], 'enquiryDelete', 'EnquiryController@enquiryDelete');
    Route::get('registrationPrint/{id}', 'EnquiryController@registrationPrint');
    Route::match(['get', 'post'], 'studentRegistrationDetail/{id}', 'EnquiryController@studentRegistrationDetail');
    Route::match(['get', 'post'], 'enquiryRemarkAdd', 'EnquiryController@enquiryRemarkAdd');
    Route::match(['get', 'post'], 'enquiryRemarkEdit', 'EnquiryController@enquiryRemarkEdit');
    Route::match(['get', 'post'], 'action_add', 'EnquiryController@action_add');
    Route::match(['get', 'post'], 'student_action_index', 'EnquiryController@student_action_index');
    Route::get('personal_details', 'EnquiryController@personal_details');
    Route::post('student_id_print_multiple', 'EnquiryController@studentIdPrintMultiple');
    Route::match(['get', 'post'], 'class_type_search', 'EnquiryController@class_type_search');
    Route::match(['get', 'post'], 'student_details', 'EnquiryController@studentDetails');
    Route::match(['get', 'post'], 'student/promote_add', 'EnquiryController@promoteAdd');
   
    Route::match(['get', 'post'], 'SearchValuePromote', 'EnquiryController@SearchValuePromote');
    Route::match(['get', 'post'], 'studentsPromoteAdd', 'EnquiryController@studentsPromoteAdd');
    Route::match(['get', 'post'], 'enquiry_qr_generate', 'EnquiryController@enquiry_qr_generate');
Route::get('enquiry_qr_generate', function () {
  
    \QrCode::size(500)
            ->format('png')
            ->generate('ItSolutionStuff.com');
    
  return view('qrCode');
    
});
// students Registration End... //

//students Admission
// Route::match(['get', 'post'], 'unique_system_id', 'StudentsAdmissionController@unique_system_id');
Route::match(['get', 'post'], 'bulkIdPrint', 'StudentsAdmissionController@bulkIdPrint');
Route::match(['get', 'post'], 'studentUserNameCreate', 'StudentsAdmissionController@studentUserNameCreate');
Route::match(['get', 'post'], 'admissionAdd', 'StudentsAdmissionController@admissionAdd');
Route::match(['get', 'post'], 'getStreamSubjects', 'StudentsAdmissionController@getStreamSubjects');
Route::match(['get', 'post'], 'admissionView', 'StudentsAdmissionController@admissionView');
Route::match(['get', 'post'], 'saveAdmissionDatatableFields', 'StudentsAdmissionController@saveAdmissionDatatableFields');
Route::match(['get', 'post'], 'admissionEdit/{id}', 'StudentsAdmissionController@admissionEdit');
Route::match(['get', 'post'], 'admissionDelete', 'StudentsAdmissionController@admissionDelete');
Route::match(['get', 'post'], 'admissionStudentSearch', 'StudentsAdmissionController@admissionStudentSearch');
Route::match(['get', 'post'], 'admissionStudentOnClick', 'StudentsAdmissionController@admissionStudentOnClick');
Route::get('admissionStudentPrint/{id}', 'StudentsAdmissionController@admissionStudentPrint');
Route::get('admissionStudentIdPrint/{id}', 'StudentsAdmissionController@admissionStudentIdPrint');
Route::get('studentId_generator/{id}', 'StudentsAdmissionController@studentIdGenerator');
Route::match(['get', 'post'], 'studentDetail/{id}', 'StudentsAdmissionController@studentDetail');
Route::match(['get', 'post'], 'studentExcelAdd', 'StudentsAdmissionController@studentExcelAdd');
Route::match(['get', 'post'], 'student_profile/{id}', 'StudentsAdmissionController@studentProfile');
//Route::match(['get', 'post'], 'show_fees_detail', 'StudentsAdmissionController@showFeesDetail');
Route::match(['get', 'post'], 'multiAdmissionEdit', 'StudentsAdmissionController@multiAdmissionEdit');

Route::match(['get', 'post'], 'verify_admission', 'StudentsAdmissionController@verify_admission');

Route::match(['get', 'post'], 'updateByExcel', 'StudentsAdmissionController@updateByExcel');
Route::match(['get', 'post'], 'studentBulkImageUpload', 'StudentsAdmissionController@studentBulkImageUpload');
Route::match(['get', 'post'], 'stream_update', 'StudentsAdmissionController@streamUpdate');
Route::match(['get', 'post'], 'stream_update_save', 'StudentsAdmissionController@streamUpdateSave');
Route::match(['get', 'post'], 'stream_remove/{admission_id}/{subject_id}', 'StudentsAdmissionController@streamRemove');
Route::match(['get', 'post'], 'category_wise_report', 'StudentsAdmissionController@category_wise_report');

//student attendance
Route::match(['get', 'post'], 'studentsAttendanceAdd', 'StudentAttendanceController@add');
Route::match(['get', 'post'], 'studentsAttendancdDelete', 'StudentAttendanceController@attendancedelete');
Route::match(['get', 'post'], 'getAttendanceDates', 'StudentAttendanceController@getAttendanceDates');
Route::match(['get', 'post'], 'sundayAutoSubmitAttendance', 'StudentAttendanceController@sundayAutoSubmitAttendance');  //Need to start cron...
Route::match(['get', 'post'], 'autoStudentAttendance', 'StudentAttendanceController@autoStudentAttendance');
Route::match(['get', 'post'], 'studentsAttendanceView', 'StudentAttendanceController@view');
Route::match(['get', 'post'], 'studentsAttendanceViewTable', 'StudentAttendanceController@viewTable');
Route::match(['get', 'post'], 'studentPanelAttendanceView', 'StudentAttendanceController@studentPanelAttendanceView');
Route::match(['get', 'post'], 'SearchValueAtten', 'StudentAttendanceController@SearchValueAtten');

//Invantory Start...//

	Route::match(['get', 'post'], 'invantory_dashboard', 'inventory\InvantoryController@invantoryDashboard');
	Route::match(['get', 'post'], 'invantory_view', 'inventory\InvantoryController@viewInvantory');
	Route::match(['get', 'post'], 'invantory_add', 'inventory\InvantoryController@addInvantory');
	Route::match(['get', 'post'], 'invantory_edit/{id}', 'inventory\InvantoryController@editInvantory');
	Route::match(['get', 'post'], 'invantory_delete', 'inventory\InvantoryController@deleteInvantory');
	Route::match(['get', 'post'], 'delete_inventory_detail', 'inventory\InvantoryController@deleteInvantoryDetail');


	Route::match(['get', 'post'], 'invantory_item_add', 'inventory\InvantoryController@addInvantoryItem');
	Route::match(['get', 'post'], 'invantory_item_edit/{id}', 'inventory\InvantoryController@editInvantoryItem');
	Route::match(['get', 'post'], 'invantory_item_delete', 'inventory\InvantoryController@deleteInvantoryItem');
	Route::match(['get', 'post'], 'getAutoCompleteInvantoryItem', 'inventory\InvantoryController@getAutoCompleteInvantoryItem');
    
    Route::match(['get', 'post'], 'sale_inventory_view', 'inventory\SalesInvantoryController@SalesViewInvantory');
	Route::match(['get', 'post'], 'sales_invantory_add', 'inventory\SalesInvantoryController@SalesAddInvantory');
	Route::match(['get', 'post'], 'sales_invantory_edit/{id}', 'inventory\SalesInvantoryController@SalesEditInvantory');
	Route::match(['get', 'post'], 'sales_invantory_delete', 'inventory\SalesInvantoryController@SalesDeleteInvantory');
	Route::match(['get', 'post'], 'getAutoCompleteStudent', 'inventory\SalesInvantoryController@getAutoCompleteStudent');
	Route::match(['get', 'post'], 'getInvantoryItemQtyCheck', 'inventory\SalesInvantoryController@getInvantoryItemQtyCheck');
	Route::match(['get', 'post'], 'sale_inventory_print/{id}', 'inventory\SalesInvantoryController@sale_inventory_print');

	//Invantory End...//
	
	
// Expenses Start... //
Route::match(['get', 'post'], 'expenseAdd', 'ExpenseController@expenseAdd');
Route::match(['get', 'post'], 'expenseView', 'ExpenseController@expenseView');
Route::match(['get', 'post'], 'expenseEdit/{id}', 'ExpenseController@expenseEdit');
Route::match(['get', 'post'], 'expenseDelete', 'ExpenseController@expenseDelete');
Route::match(['get', 'post'], 'expensePrint/{id}', 'ExpenseController@expensePrint');
// Expenses End... //

//Feed Group
Route::match(['get', 'post'], 'feesGroup', 'fees\FeesController@feesGroup');
Route::match(['get', 'post'], 'getFeesGroup', 'fees\FeesController@getFeesGroup');
Route::match(['get', 'post'], 'feesGroupEdit/{id}', 'fees\FeesController@feesGroupEdit');
Route::match(['get', 'post'], 'feesGroupDelete', 'fees\FeesController@feesGroupDelete');
Route::match(['get', 'post'], 'createFeesInstallment', 'fees\FeesController@createFeesInstallment');
Route::match(['get', 'post'], 'createFeesInstallmentClassWise', 'fees\FeesController@createFeesInstallmentClassWise');
Route::match(['get', 'post'], 'assignFeesMultipleStudents', 'fees\FeesController@assignFeesMultipleStudents');
Route::match(['get', 'post'], 'getMasterData', 'fees\FeesController@getMasterData');
Route::match(['get', 'post'], 'feesModification', 'fees\FeesController@feesModification');
Route::match(['get', 'post'], 'deleteAssignedFees', 'fees\FeesController@deleteAssignedFees');
Route::match(['get', 'post'], 'updateAssignedFees', 'fees\FeesController@updateAssignedFees');
Route::match(['get', 'post'], 'getStudentsList', 'fees\FeesController@getStudentsList');
Route::match(['get', 'post'], 'ca_report', 'fees\FeesController@caReport');
Route::match(['get', 'post'], 'PrintRevertFeesInvoice', 'fees\FeesController@PrintRevertFeesInvoice');
//Fees Group End..//
 

//Fees Master
Route::match(['get', 'post'], 'feesMasterAdd', 'fees\FeesMasterController@feesMaster');
Route::match(['get', 'post'], 'feesMasterEdit/{id}', 'fees\FeesMasterController@feesMasterEdit');
Route::match(['get', 'post'], 'feesMasterDelete', 'fees\FeesMasterController@feesMasterDelete');
Route::match(['get', 'post'], 'mesterClassAmt', 'fees\FeesMasterController@mesterClassAmt');

//Emi
Route::match(['get', 'post'], 'emi_add', 'fees\EmiController@emiAdd');
Route::match(['get', 'post'], 'emi_edit/{id}', 'fees\EmiController@emiEdit');
Route::match(['get', 'post'], 'emi_delete', 'fees\EmiController@emiDelete');

//Fees counter
Route::match(['get', 'post'], 'feesCounterAdd', 'fees\FeesCounterController@feesCounter');
Route::match(['get', 'post'], 'check_authentication', 'fees\FeesCounterController@checkAuthentication');
Route::match(['get', 'post'], 'feesCounterEdit/{id}', 'fees\FeesCounterController@feesCounterEdit');
Route::match(['get', 'post'], 'feesCounterDelete', 'fees\FeesCounterController@feesCounterDelete');
Route::match(['get', 'post'], 'feesCounterView', 'fees\FeesCounterController@feesCounterview');

//certificate_dashboard
Route::match(['get', 'post'], 'certificate_dashboard', 'CertificateController@certificate_dashboard');
Route::match(['get', 'post'], 'certificate_student_dashboard', 'CertificateController@certificate_student_dashboard');
Route::match(['get', 'post'], 'CC_Form_std_data', 'CertificateController@CCFormStdData');
Route::match(['get', 'post'], 'cc/form/add', 'CertificateController@add');
Route::match(['get', 'post'], 'cc/form/index', 'CertificateController@ccFormIndex');
Route::match(['get', 'post'], 'cc/form/edit/{id}', 'CertificateController@formEdit');
Route::match(['get', 'post'], 'student_search_certificate', 'CertificateController@certificateSearch');
Route::match(['get', 'post'], 'certificate_delete', 'CertificateController@delete');
Route::match(['get', 'post'], 'certificate_add_click', 'CertificateController@certificateAddClick');
Route::get('cc_print/{id}', 'CertificateController@ccPrint');

Route::match(['get', 'post'], 'certificate_editor', 'CertificateController@certificateEditor');

Route::match(['get', 'post'], 'evente/certificate/add', 'CertificateController@eventeCertificateAdd');
Route::match(['get', 'post'], 'evente/certificate/index', 'CertificateController@certificateIndex');
Route::match(['get', 'post'], 'evente/certificate/edit/{id}', 'CertificateController@certificateEdit');
Route::match(['get', 'post'], 'search_evente', 'CertificateController@eventeSearch');
Route::match(['get', 'post'], 'evente_add_click', 'CertificateController@eventeAddClick');
Route::match(['get', 'post'], 'evente_delete', 'CertificateController@evente_delete');
Route::get('evente_print/{id}', 'CertificateController@eventePrint');

Route::match(['get', 'post'], 'sport/certificate/add', 'CertificateController@sportAdd');
Route::match(['get', 'post'], 'sport/certificate/index', 'CertificateController@sportndex');
Route::match(['get', 'post'], 'sport/certificate/edit/{id}', 'CertificateController@sportEdit');
Route::match(['get', 'post'], 'search_sport', 'CertificateController@sportSearch');
Route::match(['get', 'post'], 'sport_add_click', 'CertificateController@sportAddClick');
Route::match(['get', 'post'], 'sport_delete', 'CertificateController@sport_delete');
Route::match(['get', 'post'], 'CCFormStdData', 'CertificateController@CCFormStdData');
Route::get('sport_print/{id}', 'CertificateController@sportPrint');

Route::match(['get', 'post'], 'tc/certificate/add', 'CertificateController@tcCertificateAdd');
Route::match(['get', 'post'], 'tc/certificate/index', 'CertificateController@tcIndex');
Route::match(['get', 'post'], 'tc/certificate/edit/{id}', 'CertificateController@tcEdit');
Route::match(['get', 'post'], 'search_tc', 'CertificateController@tcSearch');
Route::match(['get', 'post'], 'tc_add_click', 'CertificateController@tcAddClick');
Route::match(['get', 'post'], 'tc_delete', 'CertificateController@tc_delete');
Route::get('tc_print/{id}', 'CertificateController@tcPrint');
Route::get('tc_print_formate', 'CertificateController@tcPrintFormate');
Route::match(['get', 'post'], 'noc_print/{id}', 'CertificateController@nocPrint');

//Student Dashboard

    Route::match(['get', 'post'], 'student_gate_pass_view', 'student_login\DashboardController@gatePassView');
    Route::match(['get', 'post'], 'student_uniform_view', 'student_login\DashboardController@uniformView');
    Route::match(['get', 'post'], 'prayer', 'student_login\DashboardController@prayerView');
    Route::match(['get', 'post'], 'rule_view', 'student_login\DashboardController@ruleView');
    //	Route::match(['get', 'post'], 'duedate/{id}', 'DashboardController@duedate');


// Examination offline
  Route::match(['get', 'post'], 'add_offline_exam', 'offline_exam\offline_examExaminationOfflineController@addExam');
  Route::match(['get', 'post'], 'view_offline_exam', 'offline_exam\ExaminationOfflineController@viewExam');
  Route::match(['get', 'post'], 'assign_offline_exam/{id}', 'offline_exam\ExaminationOfflineController@assignExam');
  Route::match(['get', 'post'], 'assign_offline_exam', 'offline_exam\ExaminationOfflineController@addAssignExam');
  Route::match(['get', 'post'], 'assign_delete_offline_exam', 'offline_exam\ExaminationOfflineController@deleteOfflineAssignExam');
  Route::match(['get', 'post'], 'edit_offline_exam/{id}', 'offline_exam\ExaminationOfflineController@editExam');
  Route::match(['get', 'post'], 'delete_offline_exam', 'offline_exam\ExaminationOfflineController@deleteOfflineExam');
  
  Route::match(['get', 'post'], 'add_offline_examination_schedule', 'offline_exam\ScheduleController@addOfflineExaminationSchedule');
	Route::match(['get', 'post'], 'SubmitSchedule', 'offline_exam\ExamScheduleController@SubmitSchedule');
  Route::match(['get', 'post'], 'examResultGraph', 'offline_exam\ExamResultController@examResultGraph');

// Examination

    Route::match(['get', 'post'], 'admit_card_notes', 'ExaminationController@AdmitCardNotes');
   

//FeesCollect
	Route::match(['get', 'post'], 'fee_dashboard', 'fees\FeesController@feeDashboard');
	Route::match(['get', 'post'], 'Fees/add', 'fees\FeesController@addFees');
	Route::match(['get', 'post'], 'student_fees_onclick', 'fees\FeesController@studentFeesOnclick');
	Route::match(['get', 'post'], 'student_pay_submit', 'fees\FeesController@studentPaySubmit');
	Route::match(['get', 'post'], 'inventoryPaySubmit', 'fees\FeesController@inventoryPaySubmit');
	Route::match(['get', 'post'], 'fees_search_data', 'fees\FeesController@feesSearchData');
	Route::match(['get', 'post'], 'print_payement/{id}', 'fees\FeesController@printPayement');
	Route::match(['get', 'post'], 'printFeesInvoice', 'fees\FeesController@printFeesInvoice');
	Route::match(['get', 'post'], 'print_payement_generate/{id}', 'fees\FeesController@printPayementGenerate');
	Route::match(['get', 'post'], 'getSessionwiseFeesDetails', 'fees\FeesController@getSessionwiseFeesDetails');

//fees Detail
	Route::match(['get', 'post'], 'fees/index', 'fees\FeesController@viewFees');
	Route::match(['get', 'post'], 'fees_breakdown_details/{id}', 'fees\FeesController@fees_breakdown_details');
	Route::match(['get', 'post'], 'collect_fees_delete', 'fees\FeesController@collectFeesDelete');
	Route::match(['get', 'post'], 'student_assign_fees', 'fees\FeesController@studentAssignFees');
	Route::match(['get', 'post'], 'student_assign_fees_edit/{admission_id}', 'fees\FeesController@studentAssignFeesEdit');
	Route::match(['get', 'post'], 'studentFeesEdit', 'fees\FeesController@studentFeesEdit');
	Route::match(['get', 'post'], 'assign_fees_edit/{id}', 'fees\FeesController@AssignFeesEdit');

//Fees Ledger
	Route::match(['get', 'post'], 'fees/ledger', 'fees\FeesController@feesLedger');
	Route::match(['get', 'post'], 'ledger_update', 'fees\FeesController@ledgerUpdate');
	Route::match(['get', 'post'], 'ledger_save', 'fees\FeesController@ledgerSave');
	Route::match(['get', 'post'], 'fees/ledger/collect', 'fees\FeesController@feesLedgerCollect');
	Route::match(['get', 'post'], 'fees_ledger_print/{id}', 'fees\FeesController@feesLedgerPrint');
	Route::match(['get', 'post'], 'ledger_print/{id}', 'fees\FeesController@LedgerPrint');


	

	


//no idea
	Route::match(['get', 'post'], 'fees/getFeesDetail', 'fees\FeesController@getFeesDetail');
	Route::match(['get', 'post'], 'fees_add_click', 'fees\FeesController@feesAddClick');
	Route::match(['get', 'post'], 'fees_masterData', 'fees\FeesController@feesMasterData');
//







 // Store Management
    Route::match(['get', 'post'], 'storeDashboard', 'StoreController@storeDashboard');
    Route::match(['get', 'post'], 'addStoreItem', 'StoreController@addStoreItem');
    Route::match(['get', 'post'], 'viewStoreRequest', 'StoreController@viewStoreRequest');
    Route::match(['get', 'post'], 'deleteStoreItem', 'StoreController@deleteStoreItem');
    
    Route::match(['get', 'post'], 'addStationaryRequest', 'StoreController@addStationaryRequest');
    Route::match(['get', 'post'], 'storeReceipt/{receipt_no}', 'StoreController@storeReceipt');
    Route::match(['get', 'post'], 'editInvoiceInventory/{receipt_no}', 'StoreController@editInvoiceInventory');
    Route::match(['get', 'post'], 'deleteInvoiceInventory', 'StoreController@deleteInvoiceInventory');
    Route::match(['get', 'post'], 'deleteReceiptInventory', 'StoreController@deleteReceiptInventory');
    





































//User Dashboard
Route::match(['get', 'post'], 'user_dashboard', 'UserController@user_dashboard');
Route::match(['get', 'post'], 'user_side_per', 'UserController@userSidePer');



//Generate Slary Slip...//
Route::match(['get', 'post'], 'salary_details', 'SalaryController@salaryDetails');
Route::match(['get', 'post'], 'staff_salary_view', 'SalaryController@staff_salary_view');
Route::match(['get', 'post'], 'assign/salary', 'SalaryController@assignSalary');
Route::match(['get', 'post'], 'assignSalaryDetail', 'SalaryController@assignSalaryDetail');
Route::match(['get', 'post'], 'generate/salary/slip', 'SalaryController@generateSalarySlip');
Route::match(['get', 'post'], 'find/staff', 'SalaryController@findStaff');
Route::match(['get', 'post'], 'salary_print/{id}/{month_id}', 'SalaryController@salaryPrint');
Route::match(['get', 'post'], 'download/salary/slip/{id}/{month_id}', 'SalaryController@downloadSalarySlip');
Route::match(['get', 'post'], 'generate/salary', 'SalaryController@generateSalary');


Route::match(['get', 'post'], 'countryData', 'Auth\AuthController@getLogin');
Route::match(['get', 'post'], 'change_password', 'Auth\AuthController@changePassword');

Route::match(['get', 'post'], 'updateSingleField', 'HomeController@updateSingleField');
Route::match(['get', 'post'], 'countryData/{id}', 'HomeController@countryData');
Route::match(['get', 'post'], 'stateData/{id}', 'HomeController@stateData');
Route::match(['get', 'post'], 'studentData/{id}', 'HomeController@studentData');
Route::match(['get', 'post'], 'streamData/{id}/{classType}', 'HomeController@streamData');
Route::match(['get', 'post'], 'subjectGetData/{id}', 'HomeController@subjectGetData');
Route::match(['get', 'post'], 'calendarElement', 'HomeController@calendarElement');

Route::match(['get', 'post'], 'attendanceEmail', 'DashboardController@sendAttendanceStatus');
Route::match(['get', 'post'], 'remark_mail', 'ExpenseController@remarkMail');

Route::match(['get', 'post'], 'birthday_mail', 'StudentsAdmissionController@birthdatEmail');
Route::match(['get', 'post'], 'send_wishes', 'BirthdayController@send_wishes');
Route::match(['get', 'post'], 'happy_birthday', 'BirthdayController@happy_birthday');



Route::match(['get', 'post'], 'student_report_card/{id}', 'ExaminationController@StudentReportCard');
Route::match(['get', 'post'], 'student_admit_card/{id}', 'ExaminationController@StudentAdmitCard');


Route::match(['get', 'post'], 'test', 'DashboardController@test');




	//dashboard
	Route::match(['get'], '/', 'DashboardController@dashboard');
	Route::match(['get'], 'dashboard', 'DashboardController@dashboard');
	Route::match(['get', 'post'], 'minidashboard', 'DashboardController@minidashboard');


	Route::match(['get', 'post'], 'profile', 'ProfileController@profile');
	Route::match(['get', 'post'], 'profile/edit/{id}', 'ProfileController@profileEdit');
	Route::match(['get', 'post'], 'all_students_search', 'DashboardController@allStudentsSearch');
	Route::match(['get', 'post'], 'get_modules', 'DashboardController@getModules');
	Route::match(['get', 'post'], 'stu_status', 'DashboardController@stuStatus');


	Route::match(['get', 'post'], 'add/task', 'ToDoListController@addTask');
	Route::match(['get', 'post'], 'status/task', 'ToDoListController@statusTask');
	Route::match(['get', 'post'], 'delete/task', 'ToDoListController@deleteTask');

	//user
	Route::get('create-user', 'UserController@createuser');

	







	//students Id
	Route::match(['get', 'post'], 'students_id_data', 'StudentsIdController@studentsIdData');
	Route::match(['get', 'post'], 'student/id/index', 'StudentsIdController@studentIdIndex');


	//account_dashboard 
	Route::match(['get', 'post'], 'account_dashboard', 'AccountController@account_dashboard');
	Route::match(['get', 'post'], 'bank/account/add', 'AccountController@add');
	Route::match(['get', 'post'], 'bank/account/index', 'AccountController@accountList');
	Route::match(['get', 'post'], 'bank/account/edit/{id}', 'AccountController@editBank');
	Route::match(['get', 'post'], 'account_delete', 'AccountController@delete');


	//staff
	Route::get('staff_file', 'StaffController@staffFile');
		Route::match(['get', 'post'], 'checkClassTeacher', 'StaffController@checkClassTeacher');
		Route::match(['get', 'post'], 'removeClassTeacher', 'StaffController@removeClassTeacher');
	Route::match(['get', 'post'], 'teachers/add', 'StaffController@add');
	Route::get('joining_letter_print/{id}', 'StaffController@joiningLater');
	Route::get('teachers_idCard/{id}', 'StaffController@teachersidCard');
	Route::get('drop_teacher_letter/{id}', 'StaffController@dropTeacherPrint');
	Route::match(['get', 'post'], 'teachers/index', 'StaffController@index');
	Route::get('attendance_panel', 'StaffController@attendancePanel');
	Route::get('fill_attendance', 'StaffController@fillAttendance');
	Route::match(['get', 'post'], 'drop_index', 'StaffController@Dropindex');
	Route::match(['get', 'post'], 'teachers/edit/{id}', 'StaffController@edit');
	Route::match(['get', 'post'], 'delete_staff', 'StaffController@delete');
	Route::match(['get', 'post'], 'teacher/image', 'StaffController@teacherUpdateImg');
	
	

	Route::get('salary_generate', 'SalaryController@salaryGenerate');

	Route::match(['get', 'post'], 'staff_attendance_add', 'StaffAttendanceController@add');
	Route::match(['get', 'post'], 'SearchValueStaffAtten', 'StaffAttendanceController@searchValueStaffAtten');
	Route::match(['get', 'post'], 'staff_attendance_save', 'StaffAttendanceController@staff_attendance_save');
	Route::match(['get', 'post'], 'staff/Attendance/view', 'StaffAttendanceController@view');
	Route::post('Staff_categiry_data/{id}', 'StaffAttendanceController@StaffCategiryData');


	//Settings
	Route::match(['get', 'post'], 'settings_dashboard', 'SettingsController@settings_dashboard');


	Route::match(['get', 'post'], 'add_ip_setting', 'SettingsController@addIP');
	Route::match(['get', 'post'], 'view_ip_setting', 'SettingsController@viewIP');
	Route::match(['get', 'post'], 'edit_ip_setting/{id}', 'SettingsController@editIP');
	Route::match(['get', 'post'], 'delete_ip_setting', 'SettingsController@deleteIP');
	Route::match(['get', 'post'], 'ip_status', 'SettingsController@ipStatus');

	
	Route::match(['get', 'post'], 'discountdata/{id}', 'DashboardController@discountdata');
	Route::match(['get', 'post'], 'task', 'DashboardController@task');
	Route::match(['get', 'post'], 'task_list', 'DashboardController@taskList');




	






	// Download Center
	Route::match(['get', 'post'], 'download_center', 'DownloadController@downloadCenter');
	Route::match(['get', 'post'], 'upload/content', 'DownloadController@upload');
	Route::match(['get', 'post'], 'upload/content_edit/{id}', 'DownloadController@upload_edit');
	Route::match(['get', 'post'], 'download/{id}', 'DownloadController@download');

	Route::match(['get', 'post'], 'upload_delete', 'DownloadController@uploadDelete');
	Route::match(['get', 'post'], 'assignments', 'DownloadController@assignments');
	Route::match(['get', 'post'], 'study_material', 'DownloadController@studyMaterials');
	Route::match(['get', 'post'], 'syllabus', 'DownloadController@syllabus');
	Route::match(['get', 'post'], 'other_downloads', 'DownloadController@otherDownloads');
	Route::match(['get', 'post'], 'studentAdmitCard', 'DownloadController@studentAdmitCard');


	// SMS Service
	Route::match(['get', 'post'], 'send_message_terminal', 'Sms_ServiceController@sendMessageTerminal');
	Route::match(['get', 'post'], 'send_message', 'Sms_ServiceController@sendMessage');
	Route::match(['get', 'post'], 'resend_message', 'Sms_ServiceController@resendMessage');
	Route::match(['get', 'post'], 'sms_search_data', 'Sms_ServiceController@smsSearchData');
	Route::match(['get', 'post'], 'group_view', 'Sms_ServiceController@groupView');
	Route::match(['get', 'post'], 'group_add', 'Sms_ServiceController@groupAdd');
	Route::match(['get', 'post'], 'whatsapp_group_status', 'Sms_ServiceController@groupStatus');
	Route::match(['get', 'post'], 'group_delete', 'Sms_ServiceController@groupDelete');
	Route::match(['get', 'post'], 'group_edit/{id}', 'Sms_ServiceController@groupEdit');
	Route::match(['get', 'post'], 'group_messages_send', 'Sms_ServiceController@groupMessagesSend');
	Route::match(['get', 'post'], 'getGroupData/{id}', 'Sms_ServiceController@getGroupData');
	Route::match(['get', 'post'], 'failed_messages_delete', 'Sms_ServiceController@failedMessagesDelete');


	//student dashboard
	Route::match(['get', 'post'], 'timetable', 'student_login\DashboardController@timetableView');
    Route::match(['get', 'post'], 'homework', 'student_login\DashboardController@homeworkView');
	Route::match(['get', 'post'], 'fees', 'student_login\FeesController@fees');
	Route::match(['get', 'post'], 'downloadHomework/{id}', 'master\HomeworkController@downloadHomework');
	Route::match(['get', 'post'], 'student_download_center', 'student_login\DownloadCenterController@studentDownloadCenter');
	Route::match(['get', 'post'], 'studentAssignments', 'student_login\DownloadCenterController@studentAssignments');
	Route::match(['get', 'post'], 'student_study_material', 'student_login\DownloadCenterController@studentStudyMaterials');
	Route::match(['get', 'post'], 'student_syllabus', 'student_login\DownloadCenterController@studentSyllabus');
	Route::match(['get', 'post'], 'student_other_downloads', 'student_login\DownloadCenterController@studentOtherDownloads');

Route::match(['get', 'post'], 'parent_teacher_conversation', 'student_login\ComplaintController@parent_teacherConversation');







	// Library Management Start... //

//	Route::match(['get', 'post'], 'books_library', 'LibraryController@view');


	

	Route::match(['get', 'post'], 'dataCabin/{id}', 'library\LibraryClickDataController@dataCabin');
	Route::match(['get', 'post'], 'libraryData/{id}', 'HomeController@libraryData');

	



















	Route::match(['get', 'post'], 'school_calender_add', 'SchoolCalenderController@schoolCalenderAdd');
	Route::match(['get', 'post'], 'calender_view', 'SchoolCalenderController@calendarView');
	Route::match(['get', 'post'], 'getEvents', 'SchoolCalenderController@getEvents');
	//examination panel start//
	Route::match(['get', 'post'], 'examination_dashboard', 'ExaminationController@examinationDashboard');
	Route::match(['get', 'post'], 'view/question', 'offline_exam\QuestionController@viewQuestion');	
	Route::match(['get', 'post'], 'add/question', 'offline_exam\QuestionController@addQuestion');
	Route::match(['get', 'post'], 'edit/question/{id}', 'offline_exam\QuestionController@editQuestion');
	Route::match(['get', 'post'], 'delete/question', 'offline_exam\QuestionController@deleteQuestion');

	Route::match(['get', 'post'], 'view/exam', 'offline_exam\ExamController@viewExam');
	Route::match(['get', 'post'], 'add/exam', 'offline_exam\ExamController@addExam');
	Route::match(['get', 'post'], 'edit/exam/{id}', 'offline_exam\ExamController@editExam');
	Route::match(['get', 'post'], 'assign/exam/{id}', 'offline_exam\ExamController@assignExam');
	Route::match(['get', 'post'], 'assign/delete/exam', 'offline_exam\ExamController@deleteAssignExam');

	Route::match(['get', 'post'], 'add/examination_schedule', 'offline_exam\ExamScheduleController@addExaminationSchedule');
    Route::match(['get', 'post'], 'examData/{class_type_id}', 'HomeController@examData');
	Route::match(['get', 'post'], 'SubmitExaminationSchedule', 'offline_exam\ExamScheduleController@SubmitSchedule');


	Route::match(['get', 'post'], 'my_exams', 'offline_exam\FillMarkController@myExams');
	Route::match(['get', 'post'], 'fill_marks', 'offline_exam\FillMarkController@fillMarks');
    Route::match(['get', 'post'], 'fill_marks_submit', 'offline_exam\FillMarkController@fillMarksSubmit');
	Route::match(['get', 'post'], 'download_marksheet', 'offline_exam\FillMarkController@download_marksheet');
	Route::match(['get', 'post'], 'print_report_card', 'offline_exam\FillMarkController@printReportCard');
	Route::match(['get', 'post'], 'bulk_marksheet', 'offline_exam\FillMarkController@bulk_marksheet');
    Route::match(['get', 'post'], 'bulk_marksheet_generate', 'offline_exam\FillMarkController@bulk_marksheet_generate');
    Route::match(['get', 'post'], 'performance_marks', 'offline_exam\FillMarkController@performanceMarks');
    Route::match(['get', 'post'], 'performance_marks_submit', 'offline_exam\FillMarkController@performanceMarksSubmit');
    
	Route::match(['get', 'post'], 'add/admit_card', 'offline_exam\AdmitCardController@addAdmitCard');
	Route::match(['get', 'post'], 'download_admit_card', 'offline_exam\AdmitCardController@download_admit_card');
	Route::match(['get', 'post'], 'SubmitAdmitCard', 'offline_exam\AdmitCardController@SubmitAdmitCard');
	Route::match(['get', 'post'], 'single_exam_admit_card/{class_type_id}/{exam_id}/{admission_id}', 'offline_exam\AdmitCardController@singleDownloadAdmitCardPdf');
    Route::match(['get', 'post'], 'exam_admit_card/{exam_id}/{class_type_id}/{admission_id}', 'offline_exam\AdmitCardController@downloadAdmitCard');

	
	
	
	
	
	
	
	Route::match(['get', 'post'], 'student_performance', 'StudentPerformanceController@studentPerformance');
	Route::match(['get', 'post'], 'studentParticularPerformance/{id}', 'StudentPerformanceController@studentParticularPerformance');
	
	
	
	Route::match(['get', 'post'], 'message_queue', 'MessageQueueController@message_queue');
	
	
	
	
	
	
	
	
	
	
	
	

	Route::match(['get', 'post'], 'get_question_ajax', 'ExaminationController@getQuestionAjax');
	Route::match(['get', 'post'], 'add_exam_result', 'ExaminationController@addExamStudents');
	Route::match(['get', 'post'], 'view_exam_result', 'ExaminationController@viewExamStudents');
	Route::match(['get', 'post'], 'exam_print', 'ExaminationController@examPrint');
	

	// My Examinations ...//
	Route::match(['get', 'post'], 'view_marksheet1', 'ExaminationController@marksheet1');
	Route::match(['get', 'post'], 'view_marksheet2', 'ExaminationController@marksheet2');
	Route::match(['get', 'post'], 'view_marksheet3', 'ExaminationController@marksheet3');
	Route::match(['get', 'post'], 'view_marksheet4', 'ExaminationController@marksheet4');
	Route::match(['get', 'post'], 'view_marksheet5', 'ExaminationController@marksheet5');



	Route::match(['get', 'post'], 'view/marksheet1', 'ExaminationController@viewMarksheet1');


	Route::match(['get', 'post'], 'print_marksheet', 'ExaminationController@print_marksheet');
	
	Route::match(['get', 'post'], 'teacher/view/exam/{id}', 'ExaminationController@viewExamTeacher');
	Route::match(['get', 'post'], 'delete/exam', 'ExaminationController@deleteExam');




	
	Route::match(['get', 'post'], 'exam_admit_card', 'ExaminationController@downloadAdmitCard');

	Route::match(['get', 'post'], 'assign/question', 'ExaminationController@assignQuestion');
	Route::match(['get', 'post'], 'search/assigned/question', 'ExaminationController@searchkAssignedQuestion');
	Route::match(['get', 'post'], 'search/already/assigned/question', 'ExaminationController@searchkAlreadyAssignedQuestion');

	Route::match(['get', 'post'], 'online/exam/{id}', 'ExaminationController@onlineExam');
	Route::match(['get', 'post'], 'submit_exam', 'ExaminationController@addExamResult');

	Route::match(['get', 'post'], 'fetchQuestion', 'ExaminationController@fetchQuestion');

	Route::match(['get', 'post'], 'view/result', 'ExaminationController@viewResult');
	Route::match(['get', 'post'], 'view/exam/result/{id}', 'ExaminationController@viewExamResult');
	Route::match(['get', 'post'], 'download/marksheet/{admission_id}/{exam_id}', 'ExaminationController@downloadMarksheet');
	Route::match(['get', 'post'], 'view/marksheet/{admission_id}/{exam_id}', 'ExaminationController@viewMarksheet');
	Route::match(['get', 'post'], 'answer/key/{id}', 'ExaminationController@answerKey');
	Route::match(['get', 'post'], 'answer/key/{exam_id}/{student_id}', 'ExaminationController@answerKeyTeacher');
	//examination panel end//


	Route::match(['get', 'post'], 'changeLang', 'HomeController@change');
    Route::match(['get', 'post'], 'sectionDataId', 'HomeController@sectionDataId');

// ONLINE EXAMINATION ADMIN SIDE START

    Route::match(['get', 'post'], 'examChapterData', 'exam\LiveExaminationController@examChapterData');
    Route::match(['get', 'post'], 'examTopicData', 'exam\LiveExaminationController@examTopicData');
    Route::match(['get', 'post'], 'checkQuestionCount', 'exam\LiveExaminationController@checkQuestionCount');
    Route::match(['get', 'post'], 'checkQuestionAvailability', 'exam\LiveExaminationController@checkQuestionAvailability');
    Route::match(['get', 'post'], 'digital/add/exam', 'exam\LiveExaminationController@addExam');
    Route::match(['get', 'post'], 'digital/view/exam', 'exam\LiveExaminationController@viewExam');
    Route::match(['get', 'post'], 'digital/view/deleted/exam', 'exam\LiveExaminationController@viewDeletedExam');
    Route::match(['get', 'post'], 'digital/restore/exam', 'exam\LiveExaminationController@restoreExam');
    Route::match(['get', 'post'], 'digital/edit/exam/{id}', 'exam\LiveExaminationController@editExam');
	Route::match(['get', 'post'], 'digital/delete/exam', 'exam\LiveExaminationController@deleteExam');
	Route::match(['get', 'post'], 'print/exam/{id}', 'exam\LiveExaminationController@printExam');
	Route::match(['get', 'post'], 'answerKey/{id}', 'exam\LiveExaminationController@answerKey');
    Route::match(['get', 'post'], 'digital/add/question', 'exam\LiveExaminationController@addQuestion');
    Route::match(['get', 'post'], 'digital/view/question', 'exam\LiveExaminationController@viewQuestion');
    Route::match(['get', 'post'], 'digital/edit/question/{id}', 'exam\LiveExaminationController@editQuestion');
    Route::match(['get', 'post'], 'digital/delete/question', 'exam\LiveExaminationController@deleteQuestion');
    Route::match(['get', 'post'], 'digitalExamTerminal', 'exam\LiveExaminationController@digitalExamTerminal');
    Route::match(['get', 'post'], 'getChapters', 'exam\LiveExaminationController@getChapters');
    Route::match(['get', 'post'], 'examTerminal', 'ExaminationController@examTerminal');
    Route::match(['get', 'post'], 'examTerminal2', 'ExaminationController@examTerminal2');
    Route::match(['get', 'post'], 'digitalStartExam', 'exam\LiveExaminationController@digitalStartExam');
    Route::match(['get', 'post'], 'digitalResultExam', 'exam\LiveExaminationController@digitalResultExam');
    Route::match(['get', 'post'], 'examResultStudentList/{id}', 'exam\LiveExaminationController@examResultStudentList');
    Route::match(['get', 'post'], 'digitalAnalysisPanel', 'exam\LiveExaminationController@digitalAnalysisPanel');
    Route::match(['get', 'post'], 'digitalDownloadAnswerKey', 'exam\LiveExaminationController@digitalDownloadAnswerKey');
    Route::match(['get', 'post'], 'digitalQuestionKey', 'exam\LiveExaminationController@digitalQuestionKey');
    Route::match(['get', 'post'], 'digitalExamAnalysis/{id}', 'exam\LiveExaminationController@digitalExamAnalysis');



// Print file controller

    Route::match(['get', 'post'], 'printFilePanel', 'PrintFileController@printFilePanel');
    Route::match(['get', 'post'], 'template/{id}', 'PrintFileController@template');
    Route::match(['get', 'post'], 'printFilePanel', 'PrintFileController@printFilePanel');

    Route::match(['get', 'post'], 'printFileModuleWiseView/{id}', 'PrintFileController@printFileModuleWiseView');
    
    Route::match(['get', 'post'], 'feesRemainderCron', 'fees\FeesController@feesRemainderCron');
    
    
//     Route::get('send/email', function(){
  
// 	$send_mail = 'pspc18@gmail.com';
  
//   Mail::to($send_mail)->queue(new MyMail());
  
//   dd('Mail send successfully');
// });

    Route::match(['get', 'post'], 'test', 'test\TestController@test');

});


Route::match(['get', 'post'], 'newRegistration', 'Auth\AuthController@newRegistration');
Route::match(['get', 'post'], 'redirection', 'Auth\AuthController@redirection');
Route::match(['get', 'post'], 'clearTable', 'Auth\AuthController@clearTable');
Route::match(['get', 'post'], 'setSidebar', 'Auth\AuthController@setSidebar');
Route::match(['get', 'post'], 'allowSidebar', 'Auth\AuthController@allowSidebar');
Route::match(['get', 'post'], 'validateOtp', 'Auth\AuthController@validateOtp');
