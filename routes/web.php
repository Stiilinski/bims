<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\regValidation;

Route::get('/', function () {
    return view('welcome');
});

//for multipurpose barangay clearance
Route::post('saveBrgyClearance', [regValidation::class, 'saveBrgyClearance'])->name('regValidation.saveBrgyClearance');
Route::get('/dashboards/secretariesDb/dbBrgyClearance', [regValidation::class, 'barangayClearance']);
Route::get('/dashboards/secretariesDb/brgyClearance', [regValidation::class, 'viewBrgyClearance']);
Route::put('/upBrgyClearance/{id}', [regValidation::class, 'updateBrgyClearance'])->name('updateBrgyClearance');
Route::post('insertBrgyClearanceransaction', [regValidation::class, 'insertBrgyClearanceransaction'])->name('regValidation.insertBrgyClearanceransaction');
Route::post('/reject-clearance', [regValidation::class, 'rejectClearance']);
Route::post('/update-bcl-status', [regValidation::class, 'updateBclStatus']);
Route::get('/residentClearance/{id}', [regValidation::class, 'getResidentClearance']);



//for business barangay clearance
Route::post('saveBusinessClearance', [regValidation::class, 'saveBusinessClearance'])->name('regValidation.saveBusinessClearance');
Route::get('/dashboards/secretariesDb/dbBusinessPermit', [regValidation::class, 'businessPermit']);
Route::get('/dashboards/secretariesDb/businessClearance', [regValidation::class, 'viewBusinessClearance']);
Route::post('insertBusiTransaction', [regValidation::class, 'insertBusiTransaction'])->name('regValidation.insertBusiTransaction');
Route::put('/businessCertificate/{id}', [regValidation::class, 'updateBusinessTransaction'])->name('updateBusinessTransaction');
Route::post('/reject-business', [regValidation::class, 'rejectBusiness']);
Route::post('/update-bc-status', [regValidation::class, 'updateBcStatus']);
Route::get('/residentBusiness/{id}', [regValidation::class, 'getResidentBusiness']);

// for certificates
Route::post('saveCertificate', [regValidation::class, 'saveCertificate'])->name('regValidation.saveCertificate');
Route::get('/dashboards/secretariesDb/certIndigency', [regValidation::class, 'viewCertIndigency']);
Route::post('insertCertTransaction', [regValidation::class, 'insertCertTransaction'])->name('regValidation.insertCertTransaction');
Route::get('/resident/{id}', [regValidation::class, 'getResidentData'])->name('resident.data');
Route::put('/certificate/{id}', [regValidation::class, 'updateTransaction'])->name('updateTransaction');
Route::post('/update-cert-status', [regValidation::class, 'updateStatus']);
Route::post('/reject-certificate', [regValidation::class, 'rejectCertificate']);
Route::get('/dashboards/secretariesDb/certification', [regValidation::class, 'viewCertification']);
Route::get('/dashboards/secretariesDb/brgyCertification', [regValidation::class, 'viewBrgyCertification']);
Route::get('/dashboards/secretariesDb/goodMoral', [regValidation::class, 'viewGoodMoral']);
Route::get('/residentCertificate/{id}', [regValidation::class, 'getResidentCertificate']);


// for complaints
Route::post('saveComplaints', [regValidation::class, 'saveComplaints'])->name('regValidation.saveComplaints');
Route::get('/dashboards/secretariesDb/dbBlotter', [regValidation::class, 'dbBlotter']);
Route::get('/residentComplaint/{id}', [regValidation::class, 'getResidentComplaint'])->name('resident.data');
Route::get('/dashboards/secretariesDb/brgyBlotter', [regValidation::class, 'viewBrgyBlotter']);
Route::put('/upBlotter/{id}', [regValidation::class, 'updateBlotter'])->name('updateBlotter');
Route::post('/update-blotter-status', [regValidation::class, 'updateBlotterStatus']);
Route::post('/reject-blotter', [regValidation::class, 'rejectBlotter']);
Route::get('/residentBlotter/{id}', [regValidation::class, 'getResidentBlotter']);

// for residents
    Route::post('saveResidents', [regValidation::class, 'saveResidents'])->name('regValidation.saveResidents');
    Route::get('displayResident', [regValidation::class, 'displayResident'])->name('regValidation.displayResident');
    Route::get('edit-resident/{id}', [regValidation::class, 'editResident']);
    Route::post('/update-resident/{id}', [regValidation::class, 'updateResident']);
    Route::get('dbResidents', [regValidation::class, 'dbResidents'])->name('dbResidents');
    Route::get('/residentTraceTran', [regValidation::class, 'traceResidents'])->name('residentTraceTran');
    Route::post('dbResidents', [regValidation::class, 'traceTransaction'])->name('traceTransaction');
    Route::post('/cancelBlotter', [regValidation::class, 'cancelBlotter'])->name('cancelBlotter');
    Route::post('/cancelCertificate', [regValidation::class, 'cancelCertificate'])->name('cancelCertificate');
    Route::post('/cancelClearance', [regValidation::class, 'cancelClearance'])->name('cancelClearance');
    Route::post('/cancelBusiness', [regValidation::class, 'cancelBusiness'])->name('cancelBusiness');
    Route::get('/schedule', [regValidation::class, 'getSchedule']);
    Route::get('/officials', [regValidation::class, 'getOfficialData'])->name('official.data');

    Route::get('dashboards/resdidentsDb/blogs', [regValidation::class, 'blogs']);
    Route::get('dbBlogs', [regValidation::class, 'dbBlogs'])->name('dbBlogs');
    Route::get('dbBlogsRead', [regValidation::class, 'dbBlogsRead'])->name('dbBlogsRead');
// END OF RESIDENTS

// for employees
    Route::get('login', [regValidation::class, 'log'])->name('login');
    Route::get('register', [regValidation::class, 'reg'])->name('register');
    Route::get('edit-employee/{id}', [regValidation::class, 'editEmployee']);
    Route::post('/update-employee/{id}', [regValidation::class, 'updateEmployee']);
    Route::get('/privateSchedules', [regValidation::class, 'getPrivateSchedule']);
    Route::get('/dashboards/employeeProfile', [regValidation::class, 'employeeProfile']);
    Route::post('/change-password/{id}', [regValidation::class, 'changePassword']);
// END OF EMPLOYEES

//FOR SECRETARY
    Route::get('/dashboards/dbSecretary', [regValidation::class, 'dashboard']);
    //RESIDENT VIEWING
        Route::get('/dashboards/secretariesDb/residentRec', [regValidation::class, 'residentsRec']);
        Route::get('/dashboards/secretariesDb/dbviewResident', [regValidation::class, 'dbviewResident']);
    //CERTIFICATE VIEWING
        Route::get('/dashboards/secretariesDb/dBCert', [regValidation::class, 'barangayCert']);
    //PUROK VIEWING
        Route::get('/dashboards/secretariesDb/purokList', [regValidation::class, 'dashboardPur']);
    //REQUESTED DOCUMENTS
        Route::get('/dashboards/secretariesDb/requestedDocs', [regValidation::class, 'requestedDoc']);
    //PUROK LIST
        Route::get('/fetch-purok-residents', [regValidation::class, 'fetchPurokResidents']);
        Route::get('/purok-counts', [regValidation::class, 'getPurokCounts']);
// END OF SECRETARY

// FOR SYSTEM ADMIN
    Route::get('/dashboards/systemAdmin', [regValidation::class, 'dbAdmin']);
    Route::post('/update-employees/{id}', [regValidation::class, 'update'])->name('employee.update');
    Route::post('/archive-employee', [regValidation::class, 'archiveEmployee'])->name('employee.archive');
    Route::post('/activate-employee', [regValidation::class, 'activateEmployee'])->name('employee.activate');
// END OF SYSTEM ADMIN

//FOR HEALTH WORKER
    Route::get('/dashboards/dbHealthWorker', [regValidation::class, 'dashboardHW']);
    // DAILY SERVICE RECORD
        Route::get('dashboards/healthWorkerDb/dailyServiceRecord', [regValidation::class, 'dailyServiceRecord']);
        Route::post('inputDsr', [regValidation::class, 'inputDsr'])->name('regValidation.inputDsr');
        Route::get('dashboards/healthWorkerDb/dailyForm', [regValidation::class, 'dailyForm']);
        Route::get('/dsrDisp/{dsr_id}', [regValidation::class, 'getDsrData']);
        Route::post('/updateDsr/{dsr_id}', [regValidation::class, 'updateDsr']);
    // INDIVIDUAL CLIENT REPORT
        Route::get('dashboards/healthWorkerDb/individualClientReport', [regValidation::class, 'indiClientReport']);
        Route::get('/service-records/{residentId}', [regValidation::class, 'getItrData']);
    // OPT
        Route::get('dashboards/healthWorkerDb/optDeworming', [regValidation::class, 'optDeworming']);
        Route::post('inputFirstOpt', [regValidation::class, 'inputFirstOpt'])->name('regValidation.inputFirstOpt');
        Route::post('/update-optSec/{opt_id}', [regValidation::class, 'updateSecOpt']);
        Route::post('/edit-optForm/{opt_id}', [regValidation::class, 'updateOptForm']);
        Route::post('/update-opt-status', [regValidation::class, 'updateOptStatus']);
        Route::get('dashboards/healthWorkerDb/optFullRecord', [regValidation::class, 'optFullRecord']);
    // RISK ASSESSMENT
        Route::get('dashboards/healthWorkerDb/riskAssessment', [regValidation::class, 'riskAssessment']);
        Route::post('riskInput', [regValidation::class, 'riskInput'])->name('regValidation.riskInput');
        Route::get('/riskDisp/{risk_id}', [regValidation::class, 'getRaData']);
        Route::post('/updateRisk/{risk_id}', [regValidation::class, 'updateRisk']);
        Route::get('/riskAssessmentForm/{risk_id}', [regValidation::class, 'showRaForm'])->name('riskAssessmentForm');
    // DSTB
        Route::get('dashboards/healthWorkerDb/dstb', [regValidation::class, 'dstb']);
        Route::post('dstbInput', [regValidation::class, 'dstbInput'])->name('regValidation.dstbInput');
        Route::get('/dstb/{id}', [regValidation::class, 'getDstbData']);
        Route::post('/updateDstb/{dstb_id}', [regValidation::class, 'updateDstb']);
        Route::post('/update-dstb-status', [regValidation::class, 'updateDstbStatus']);
        Route::get('/dstbForm/{dstb_id}', [regValidation::class, 'showDstbForm'])->name('dstbForm');
    //FAMILY PLANNING
        Route::get('dashboards/healthWorkerDb/familyPlanning', [regValidation::class, 'familyPlanning']);
        Route::post('fpInput', [regValidation::class, 'fpInput'])->name('regValidation.fpInput');
        Route::get('/fpEdit/{fp_id}', [regValidation::class, 'getFpData']);
        Route::post('/updateFp/{fp_id}', [regValidation::class, 'updateFp']);
        Route::post('fpSideB', [regValidation::class, 'fpSideB'])->name('regValidation.fpSideB');
        Route::get('/fpForm/{fp_id}', [regValidation::class, 'fpForm'])->name('fpForm');
        Route::post('/update-sideB/{sideB_id}', [regValidation::class, 'updateFpSideB']);
        Route::post('/update-fp-status', [regValidation::class, 'updateFpStatus']);
    //RHU
        Route::get('dashboards/healthWorkerDb/rhu', [regValidation::class, 'rhu']);
        Route::post('rhuInput', [regValidation::class, 'rhuInput'])->name('regValidation.rhuInput');
        Route::get('/rhu/{rhu_id}', [regValidation::class, 'getRhuData']);
        Route::post('/updateRhu/{rhu_id}', [regValidation::class, 'updateRhu']);
        Route::get('/rhuForm/{rhu_id}', [regValidation::class, 'rhuForm'])->name('rhuForm');
    //DESTRICT
        Route::get('dashboards/healthWorkerDb/destrict', [regValidation::class, 'destrict']);
        Route::post('desInput', [regValidation::class, 'desInput'])->name('regValidation.desInput');
        Route::get('/destrict/{des_id}', [regValidation::class, 'getDesData']);
        Route::post('/updateDes/{des_id}', [regValidation::class, 'updateDes']);
        Route::get('/destForm/{des_id}', [regValidation::class, 'destForm'])->name('destForm');
    //DENGUE
        Route::get('dashboards/healthWorkerDb/dengue', [regValidation::class, 'dengue']);
        Route::post('dengueInput', [regValidation::class, 'dengueInput'])->name('regValidation.dengueInput');
        Route::get('/dengueDisp/{dengue_id}', [regValidation::class, 'getDengueData']);
        Route::post('/updateDengue/{dengue_id}', [regValidation::class, 'updateDengue']);
        Route::get('/dengueForm/{dengue_id}', [regValidation::class, 'showDengueForm'])->name('dengueForm');
    //IMMUNIZATION
        Route::get('dashboards/healthWorkerDb/immunization', [regValidation::class, 'immunization']);
        Route::post('inputImmu', [regValidation::class, 'inputImmu'])->name('regValidation.inputImmu');
        Route::get('/immuDisp/{immu_id}', [regValidation::class, 'getEpiData']);
        Route::post('/updateImmu/{immu_id}', [regValidation::class, 'updateEpi']);
        Route::get('/epiForm/{epi_id}', [regValidation::class, 'epiForm'])->name('epiForm');
        Route::post('inputVac', [regValidation::class, 'inputVac'])->name('regValidation.inputVac');
        Route::get('/vacDisp/{immu_id}', [regValidation::class, 'getVacData']);
        Route::post('/update-vaccine/{vtId}', [regValidation::class, 'updateVac']);
    //MATERNAL
        Route::get('dashboards/healthWorkerDb/maternal', [regValidation::class, 'maternal']);
        Route::post('inputMform1', [regValidation::class, 'inputMform1'])->name('regValidation.inputMform1');
        Route::get('/matDisp/{mat_id}', [regValidation::class, 'getMatData']);
        Route::post('/updateMat/{mat_id}', [regValidation::class, 'updateMat']);

        Route::get('/matAnte/{mat_id}', [regValidation::class, 'matAnte'])->name('matAnte');
        Route::post('inputMform2', [regValidation::class, 'inputMform2'])->name('regValidation.inputMform2');
        Route::post('/update-ante/{ap_id}', [regValidation::class, 'updateAnte']);

        Route::get('/matPost/{mat_id}', [regValidation::class, 'matPost'])->name('matPost');
        Route::post('inputMform3', [regValidation::class, 'inputMform3'])->name('regValidation.inputMform3');
        Route::post('/update-post/{pp_id}', [regValidation::class, 'updatePost']);

        Route::post('inputMform4', [regValidation::class, 'inputMform4'])->name('regValidation.inputMform4');
        Route::post('/update-db/{db_id}', [regValidation::class, 'updateDb']);
        
        Route::get('/matView/{mat_id}', [regValidation::class, 'matView'])->name('matView');

    // DESSAGREGATION
        Route::get('dashboards/healthWorkerDb/dessegragation', [regValidation::class, 'dessegragation']);
        Route::get('/api/residents-by-purok', [regValidation::class, 'fetchResidentsAge']);
    // MEDICINE
        Route::get('dashboards/healthWorkerDb/medicine', [regValidation::class, 'medicineRecord']);
        Route::post('inputMedicine', [regValidation::class, 'inputMedicine'])->name('regValidation.inputMedicine');
        Route::post('/update-medicine/{med_id}', [regValidation::class, 'updateMedicine']);
        Route::post('/update-med-status', [regValidation::class, 'updateMedStatus']);
        Route::post('/update-medOut-status', [regValidation::class, 'updateMedStatus']);
        Route::get('dashboards/healthWorkerDb/medRelease', [regValidation::class, 'medRelease']);
    // CALENDAR
        Route::get('dashboards/healthWorkerDb/calendar', [regValidation::class, 'calendar']);
// END OF HEALTHCARE

//FOR CAPTAIN
    Route::get('/dashboards/dbBrgyCap', [regValidation::class, 'dashboardCap']);
    Route::get('/dashboard/yearly-data/{type}', [regValidation::class, 'getYearlyGraphData']);
    Route::get('/dashboard/monthly-data/{type}', [regValidation::class, 'getMonthlyGraphData']);
    Route::get('/dashboards/captainDb/residentRecCap', [regValidation::class, 'residentsRecCap']);
    Route::get('/dashboards/captainDb/dashboardCapCert', [regValidation::class, 'dashboardCapCert']);
    Route::get('/dashboards/captainDb/dashboardCapClearance', [regValidation::class, 'dashboardCapClearance']);
    Route::get('/dashboards/captainDb/dashboardCapBusiness', [regValidation::class, 'dashboardCapBusiness']);
    Route::get('/dashboards/captainDb/dashboardCapBlotter', [regValidation::class, 'dashboardCapBlotter']);
    Route::get('/dashboards/captainDb/dashboardCapPur', [regValidation::class, 'dashboardCapPur']);
    Route::get('/dashboards/captainDb/dashboardCapRevenue', [regValidation::class, 'dashboardCapRevenue']);
    Route::get('/dashboards/captainDb/viewResidentDetails', [regValidation::class, 'viewResidentDetails']);
// END OF CAPTAIN

//FOR TREASURER
    Route::get('/dashboards/dbTreasurer', [regValidation::class, 'dbTreasurer']);
    Route::get('/dashboards/treasurerDb/transactionTreasurer', [regValidation::class, 'transactionTreasurer']);
    Route::post('/submit-total-revenue', [regValidation::class, 'submitTotalRevenue'])->name('submitTotalRevenue');
// END OF TREASURER

//FOR SK KAGAWAD
        Route::get('/dashboards/dbSk', [regValidation::class, 'dbSk']);
    // FOR ARTICLE
        Route::get('/dashboards/skDb/createArticle', [regValidation::class, 'createArt']);
        Route::post('articleInput', [regValidation::class, 'articleInput'])->name('regValidation.articleInput');
        Route::get('/dashboards/skDb/myDraft/{em_id}', [regValidation::class, 'myDraft']);
        Route::get('/dashboards/skDb/mySubmission/{em_id}', [regValidation::class, 'mySubmission']);
        Route::get('/editArticle/{blog_id}', [regValidation::class, 'editArticle'])->name('editArticle');
        Route::put('/update-article/{blog_id}', [regValidation::class, 'updateArticle'])->name('regValidation.updateArticle');
        Route::post('/update-art-status', [regValidation::class, 'updateArticleStatus']);

    // FOR EVENT
        Route::get('/dashboards/skDb/createEvent', [regValidation::class, 'createEvent']);
        Route::post('eventInput', [regValidation::class, 'eventInput'])->name('regValidation.eventInput');
        Route::get('/dashboards/skDb/eventList/{em_id}', [regValidation::class, 'eventLists']);
        Route::get('/editEvent/{sched_id}', [regValidation::class, 'editEvent'])->name('editEvent');
        Route::put('/updateEvent/{sched_id}', [regValidation::class, 'updateEvent'])->name('regValidation.updateEvent');
        Route::post('/update-event-status', [regValidation::class, 'updateEventStatus']);
// END OF SK KAGAWAD

// FOR SK CHAIRMAN
    Route::get('/dashboards/dbSkChairman', [regValidation::class, 'dbSkChairman']);
    // FOR ARTICLE
    Route::get('/dashboards/skChairmanDb/submittedBlogs/{em_id}', [regValidation::class, 'submittedBlogs']);
    Route::get('/dashboards/skChairmanDb/publishedBlogs/{em_id}', [regValidation::class, 'publishedBlogs']);
    Route::get('/dashboards/skChairmanDb/archivedBlogs/{em_id}', [regValidation::class, 'archivedBlogs']);
    Route::get('/viewBlogs/{blog_id}', [regValidation::class, 'viewBlogs'])->name('viewBlogs');
    Route::get('/dashboards/skChairmanDb/createArticle', [regValidation::class, 'createArt1']);
    Route::post('recInput', [regValidation::class, 'recInput'])->name('regValidation.recInput');
    Route::get('/dashboards/skChairmanDb/submittedNews/{em_id}', [regValidation::class, 'submittedNews']);
    Route::get('/viewNews/{rec_id}', [regValidation::class, 'viewNews'])->name('viewNews');
    Route::put('/update-news/{blog_id}', [regValidation::class, 'updateNews'])->name('regValidation.updateNews');
    Route::post('/update-news-status', [regValidation::class, 'updateNewsStatus']);
    Route::post('/update-art-status', [regValidation::class, 'updateArticleStatus1']);
    // FOR EVENT
    Route::get('/dashboards/skChairmanDb/submittedEvents/{em_id}', [regValidation::class, 'submittedEvents']);
    Route::get('/dashboards/skChairmanDb/createEvent', [regValidation::class, 'createEvent1']);
    Route::get('/dashboards/skChairmanDb/eventList/{em_id}', [regValidation::class, 'eventLists1']);
    Route::get('/editEvent/skChairmanDb/{sched_id}', [regValidation::class, 'editEvent1'])->name('editEvent1');
// END OF SK CHAIRMAN

Route::get('logout', [regValidation::class, 'logout'])->name('regValidation.logout');
Route::post('save', [regValidation::class, 'save'])->name('regValidation.save');
Route::post('check', [regValidation::class, 'check'])->name('regValidation.check');
Route::post('resident/archive', [regValidation::class, 'archiveResident'])->name('resident.archive');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
