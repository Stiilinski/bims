@include('layouts.headHealthWorkers')
<style>
    .card-body {
        overflow: auto;
    }
    
    .pagetitle {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .pagetitle *{
        font-size: 16px;
    }

    .modal-body {
        display: flex;
        flex-direction: column;
    }

    .custom-modal-width {
        max-width: 50%; 
        width: 50%;
    }

    .signature-container {
        position: relative;
    }

    #signaturePad {
        width: 100%;
        height: 200px;
        border: 1px solid #ccc;
    }

    .inputGroupContainer{
        width: 100%;
        border: #ccc 1px solid;
        border-radius: 0.375rem;
        display: flex;
        flex-direction: column;
        padding-bottom: 10px;
    }

    .titleCaseFinding {
        width: 100%;
        border-bottom: #ccc 1px solid;
        padding: 10px;
        background-color: #acabab
    }

    .inputArea {
        padding: 10px;
        display: flex;
        justify-content: space-between
    }

    .modal-body {
        gap: 10px;
    }

    .columnGrp, .pName {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }
    .select2-selection {
        border: none!important;
    }

    .select2-container--default {
        height: 37.6px!important;
        padding: .375rem 2.25rem .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        border: #dee2e6 solid 1px;
        border-radius: 0.375rem; 
        background-color: #fff;
    }

    .pNames {
        width: 450px;
    }

    .rowGroup {
        display: flex;
        justify-content: space-evenly;
        gap: 10px
    }

    .columnGroup {
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: flex-start;
        gap: 10px;
        width: 100%;
    }

    .customCon {
        width: 100%;
        padding: 10px;
        display: flex;
        justify-content: flex-start;
    }

    .columnCon {
        width: 100%;
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        justify-content: flex-start;
    }

    .rowCon {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    .rowConWhole {
        width: 100%;
        display: flex;
        justify-content: space-between
    }

    .familyPlaningCon {
        padding: 10px
    }

    .checkbox-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    }

    .checkbox-container .form-check {
        display: flex;
        align-items: center;
        margin-right: 15px; 
    }


    .checkbox-container .form-check-label {
        margin-left: 5px;
    }

 
    .column.mb-3 {
        margin-top: 10px;
    }

    .grpField {
        display: flex;
        flex-direction: column;
    }
    
    .row {
        padding: 10px;
    }

</style>
<body>

  <!-- ======= Header ======= -->
    @include('layouts.headerHealthWorkers')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
    @include('layouts.sidebarHealthWorkers')
  <!-- End Sidebar -->

<main id="main" class="main">

    <div class="pagetitle">
        <div class="pageArea">
            <h1>Maternal Health Record</h1>
            <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ action('App\Http\Controllers\regValidation@maternal') }}">Maternal Health Record</a></li>
                  <li class="breadcrumb-item active">Post-Partum Visits</li>
                </ol>
              </nav>
        </div>
        <div class="btnArea">
            <div class="btn-container">
                <button class="btn btn-primary post-partum-btn" data-bs-toggle="modal" data-bs-target="#modalPost">Post-Partum</button>
                <button class="btn btn-primary birth-btn" data-bs-toggle="modal" data-bs-target="#modalDel">Birth</button>  
            </div>
        </div>
    </div>
    <!-- End Page Title -->
  
    <div class="card">
        <div class="card-body">
            
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">Post-Partum Visitation</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Delivery & Birth</button>
            </li>
          </ul>



          <div class="tab-content pt-2" id="borderedTabContent">
            {{-- post partum visits --}}
            <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                <!-- Table with stripped rows -->
                <table class="table table-striped datatable">
                    <thead>
                    <tr>
                        <th scope="col" style="display: none;">ID</th>
                        <th scope="col">#</th>
                        <th scope="col">Date of Visits</th>
                        <th scope="col">FeSO4</th>
                        <th scope="col">Vitamin A</th>
                        <th scope="col">Intervention</th>
                        <th scope="col">Next Visit</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($post as $index => $posts)
                            </tr>
                                <td style="display: none;">{{ $posts->pp_id }}</td>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $posts->pp_dateVisit }}</td>
                                <td>{{ $posts->pp_feso }}</td>
                                <td>{{ $posts->pp_vitA }}</td>
                                <td>{{ $posts->ap_Intervention }}</td>
                                <td>{{ $posts->pp_dateNextVisit }}</td>
                                <td>
                                    <button class="btn btn-primary editButton" type="button">Edit</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->


            </div>
            
            {{-- birth and delivery --}}
            <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
                <!-- Table with stripped rows -->
                <table class="table table-striped datatable">
                    <thead>
                    <tr>
                        <th scope="col" style="display: none;">ID</th>
                        <th scope="col">#</th>
                        <th scope="col">Full Name of Child</th>
                        <th scope="col">Sex</th>
                        <th scope="col">Place of Delivery</th>
                        <th scope="col">Delivery Date and Time</th>

                        <th scope="col" style="display: none;">Outcome</th>
                        <th scope="col" style="display: none;">Birth Lt</th>
                        <th scope="col" style="display: none;">Birth Wt</th>
                        <th scope="col" style="display: none;">Attendant</th>
                        <th scope="col" style="display: none;">Father</th>

                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($birth as $index => $births)
                            </tr>
                                <td style="display: none;">{{ $births->db_id }}</td>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $births->db_childFullName }}</td>
                                <td>{{ $births->db_sex }}</td>
                                <td>{{ $births->db_placeDel }}</td>
                                <td>{{ $births->db_delDateTime }}</td>
                                <td style="display: none;">{{ $births->db_outcome }}</td>
                                <td style="display: none;">{{ $births->db_birthLt }}</td>
                                <td style="display: none;">{{ $births->db_birthWt }}</td>
                                <td style="display: none;">{{ $births->db_attendant }}</td>
                                <td style="display: none;">{{ $births->db_fatherFullName }}</td>
                                <td>
                                    <button class="btn btn-primary editButtonDb" type="button">Edit</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->
            </div>
        </div>
    </div>

    {{-- POST PARTUM VISIT FORM MODAL --}}
        <!-- POST PARTUM -->
            <div class="modal fade" id="modalPost" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Post-Partum Record Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('regValidation.inputMform3')}}" class="maternalF3" id="maternalF3" autocomplete="off"> <!-- Horizontal Form -->
                            @csrf
                            <div class="modal-body">
                                <div class="row g-3">
                                    
                                    {{-- <input type="text" class="form-control" id="edit_apId" name="edit_apId"> --}}
                                    <input type="hidden" class="form-control" id="matId" name="matId" value="{{ $maternal->mat_id }}" readonly>

                                    <div class="col-md-12">
                                        <label for="postVisit" class="col-sm-8 col-form-label">Date of Visit</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" id="postVisit" name="postVisit">
                                        </div>
                                        <span class="text-danger error-text postVisit_error"></span>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="postFeSo" class="col-sm-8 col-form-label">FeSO4 Given</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="postFeSo" name="postFeSo">
                                        </div>
                                        <span class="text-danger error-text postFeSo_error"></span>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="postVit" class="col-sm-8 col-form-label">Vitamin A</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="postVit" name="postVit">
                                        </div>
                                        <span class="text-danger error-text postVit_error"></span>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="postIntervention" class="col-sm-8 col-form-label">Intervention</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="postIntervention" name="postIntervention">
                                        </div>
                                        <span class="text-danger error-text postIntervention_error"></span>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <label for="postNxtVisit" class="col-sm-8 col-form-label">Date of Next Visit</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" id="postNxtVisit" name="postNxtVisit">
                                        </div>
                                        <span class="text-danger error-text postNxtVisit_error"></span>
                                    </div>
                                </div>   
                            </div>
                            <div class="alertCon">
                                <div id="alert-containerPp"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form><!-- End Horizontal Form -->
                    </div>
                </div>
            </div>
        <!-- End OF POST PARTUM-->

        <!--edit POST PARTUM -->
            <div class="modal fade" id="edit_modalPost" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">EDIT Post-Partum Record Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Horizontal Form -->
                        <form class="edit_maternalF3" id="edit_maternalF3" autocomplete="off"> 
                            @csrf
                            <div class="modal-body">
                                <div class="row g-3">
                                    
                                    <input type="hidden" class="form-control" id="edit_ppId" name="edit_ppId">
                                    <input type="hidden" class="form-control" id="edit_matId" name="edit_matId" value="{{ $maternal->mat_id }}" readonly>
                        
                                    <div class="col-md-12">
                                        <label for="edit_postVisit" class="col-sm-8 col-form-label">Date of Visit</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" id="edit_postVisit" name="edit_postVisit">
                                        </div>
                                        <span class="text-danger error-text edit_postVisit_error"></span>
                                    </div>
                        
                                    <div class="col-md-12">
                                        <label for="edit_postFeSo" class="col-sm-8 col-form-label">FeSO4 Given</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_postFeSo" name="edit_postFeSo">
                                        </div>
                                        <span class="text-danger error-text edit_postFeSo_error"></span>
                                    </div>
                        
                                    <div class="col-md-12">
                                        <label for="edit_postVit" class="col-sm-8 col-form-label">Vitamin A</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_postVit" name="edit_postVit">
                                        </div>
                                        <span class="text-danger error-text edit_postVit_error"></span>
                                    </div>
                        
                                    <div class="col-md-12">
                                        <label for="edit_postIntervention" class="col-sm-8 col-form-label">Intervention</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_postIntervention" name="edit_postIntervention">
                                        </div>
                                        <span class="text-danger error-text edit_postIntervention_error"></span>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <label for="edit_postNxtVisit" class="col-sm-8 col-form-label">Date of Next Visit</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" id="edit_postNxtVisit" name="edit_postNxtVisit">
                                        </div>
                                        <span class="text-danger error-text edit_postNxtVisit_error"></span>
                                    </div>
                                </div>   
                            </div>
                            <div class="alertCon">
                                <div id="alert-containerPp3"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                        <!-- End Horizontal Form -->
                    </div>
                </div>
            </div>
        <!-- End OF POST PARTUM-->
    {{-- END OF POST PARTUM VISIL FORM MODAL --}}

    {{-- BIRTH AND DELIVERY FORM MODAL --}}
        {{-- DELIVERY & BIRTH --}}
            <div class="modal fade" id="modalDel" tabindex="-1">
                <div class="modal-dialog custom-modal-width">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delivery & Birth Record Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('regValidation.inputMform4')}}" class="maternalF4" id="maternalF4" autocomplete="off"> <!-- Horizontal Form -->
                            @csrf
                            <div class="modal-body">
                                <div class="row g-3">
                                    <input type="hidden" class="form-control" id="postmatId" name="postmatId" value="{{ $maternal->mat_id }}" readonly>
                                    <div class="col-md-12">
                                        <label for="postDelDate" class="col-sm-8 col-form-label">Delivery Date & Time</label>
                                        <div class="col-sm-12">
                                            <input type="datetime-local" class="form-control" name="postDelDate" id="postDelDate">
                                        </div>
                                        <span class="text-danger error-text postDelDate_error"></span>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="postDelPlace" class="col-sm-8 col-form-label">Place of Delivery</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="postDelPlace" name="postDelPlace">
                                        </div>
                                        <span class="text-danger error-text postDelPlace_error"></span>
                                    </div>

                                    <fieldset class="col-md-12">
                                        <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Type of Outcome of Delivery</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="postDelType" id="postDelTypeYes" value="NSVD">
                                                <label class="form-check-label" for="postDelTypeYes">NSVD</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="postDelType" id="postDelTypeNo" value="CS">
                                                <label class="form-check-label" for="postDelTypeNo">CS</label>
                                            </div>
                                        </div>
                                        <span class="text-danger error-text postDelType_error"></span>
                                    </fieldset>

                                    <div class="col-md-8">
                                        <label for="postDelFnameChild" class="col-sm-8 col-form-label">Full Name of Child</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="postDelFnameChild" name="postDelFnameChild">
                                        </div>
                                        <span class="text-danger error-text postDelFnameChild_error"></span>
                                    </div>
                                    
                                    <fieldset class="col-md-4">
                                        <legend class="col-form-label col-sm-12" style="padding-top: 16px!important; font-size: 17px;">Sex</legend>
                                        <div class="col-sm-12 d-flex">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="postDelSex" id="postDelSexMale" value="Male">
                                                <label class="form-check-label" for="postDelSexMale">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="postDelSex" id="postDelSexFemale" value="Female">
                                                <label class="form-check-label" for="postDelSexFemale">Female</label>
                                            </div>
                                        </div>
                                        <span class="text-danger error-text postDelSex_error"></span>
                                    </fieldset>

                                    <div class="col-md-6">
                                        <label for="postDelBirthLen" class="col-sm-8 col-form-label">Birth Length</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="postDelBirthLen" name="postDelBirthLen">
                                        </div>
                                        <span class="text-danger error-text postDelBirthLen_error"></span>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="postDelBirthWt" class="col-sm-8 col-form-label">Birth WT</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="postDelBirthWt" name="postDelBirthWt">
                                        </div>
                                        <span class="text-danger error-text postDelBirthWt_error"></span>
                                    </div>

                                    <fieldset class="col-md-12">
                                        <legend class="col-form-label col-sm-12" style="padding-top: 16px!important; font-size: 17px;">Attendant At Birth</legend>
                                        <div class="col-sm-12 d-flex">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="postDelAttendant" id="postDelAttendantDoctor" value="Doctor">
                                                <label class="form-check-label" for="postDelAttendantDoctor">Doctor</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="postDelAttendant" id="postDelAttendantNurse" value="Nurse">
                                                <label class="form-check-label" for="postDelAttendantNurse">Nurse</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="postDelAttendant" id="postDelAttendantMidwife" value="Midwife">
                                                <label class="form-check-label" for="postDelAttendantMidwife">Midwife</label>
                                            </div>
                                        </div>
                                        <span class="text-danger error-text postDelSex_error"></span>
                                    </fieldset>

                                    <div class="col-md-12">
                                        <label for="postDelFnFather" class="col-sm-12 col-form-label">Full Name of Child's Father (IF THE FATHER IS NOT REGISTERED HERE)</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="postDelFnFather" name="postDelFnFather">
                                        </div>
                                        <span class="text-danger error-text postDelFnFather_error"></span>
                                    </div>

                                </div>   
                            </div>
                            <div class="alertCon">
                                <div id="alert-containerBd"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form><!-- End Horizontal Form -->
                    </div>
                </div>
            </div>
        {{-- END DELIVERY & BIRTH --}}

        {{-- DELIVERY & BIRTH --}}
            <div class="modal fade" id="edit_modalDel" tabindex="-1">
                <div class="modal-dialog custom-modal-width">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delivery & Birth Record Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Horizontal Form -->
                        <form class="edit_maternalF4" id="edit_maternalF4" autocomplete="off">
                            @csrf
                            <div class="modal-body">
                                <div class="row g-3">
                                    <input type="hidden" class="form-control" id="edit_postdelId" name="edit_postdelId" readonly>
                                    <input type="hidden" class="form-control" id="edit_postmatId" name="edit_postmatId" value="{{ $maternal->mat_id }}" readonly>
                                    
                                    <div class="col-md-12">
                                        <label for="edit_postDelDate" class="col-sm-8 col-form-label">Delivery Date & Time</label>
                                        <div class="col-sm-12">
                                            <input type="datetime-local" class="form-control" name="edit_postDelDate" id="edit_postDelDate">
                                        </div>
                                        <span class="text-danger error-text edit_postDelDate_error"></span>
                                    </div>
                        
                                    <div class="col-md-12">
                                        <label for="edit_postDelPlace" class="col-sm-8 col-form-label">Place of Delivery</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_postDelPlace" name="edit_postDelPlace">
                                        </div>
                                        <span class="text-danger error-text edit_postDelPlace_error"></span>
                                    </div>
                        
                                    <fieldset class="col-md-12">
                                        <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Type of Outcome of Delivery</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_postDelType" id="edit_postDelTypeYes" value="NSVD">
                                                <label class="form-check-label" for="edit_postDelTypeYes">NSVD</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_postDelType" id="edit_postDelTypeNo" value="CS">
                                                <label class="form-check-label" for="edit_postDelTypeNo">CS</label>
                                            </div>
                                        </div>
                                        <span class="text-danger error-text edit_postDelType_error"></span>
                                    </fieldset>
                        
                                    <div class="col-md-8">
                                        <label for="edit_postDelFnameChild" class="col-sm-8 col-form-label">Full Name of Child</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_postDelFnameChild" name="edit_postDelFnameChild">
                                        </div>
                                        <span class="text-danger error-text edit_postDelFnameChild_error"></span>
                                    </div>
                                    
                                    <fieldset class="col-md-4">
                                        <legend class="col-form-label col-sm-12" style="padding-top: 16px!important; font-size: 17px;">Sex</legend>
                                        <div class="col-sm-12 d-flex">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_postDelSex" id="edit_postDelSexMale" value="Male">
                                                <label class="form-check-label" for="edit_postDelSexMale">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_postDelSex" id="edit_postDelSexFemale" value="Female">
                                                <label class="form-check-label" for="edit_postDelSexFemale">Female</label>
                                            </div>
                                        </div>
                                        <span class="text-danger error-text edit_postDelSex_error"></span>
                                    </fieldset>
                        
                                    <div class="col-md-6">
                                        <label for="edit_postDelBirthLen" class="col-sm-8 col-form-label">Birth Length</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="edit_postDelBirthLen" name="edit_postDelBirthLen">
                                        </div>
                                        <span class="text-danger error-text edit_postDelBirthLen_error"></span>
                                    </div>
                        
                                    <div class="col-md-6">
                                        <label for="edit_postDelBirthWt" class="col-sm-8 col-form-label">Birth WT</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="edit_postDelBirthWt" name="edit_postDelBirthWt">
                                        </div>
                                        <span class="text-danger error-text edit_postDelBirthWt_error"></span>
                                    </div>
                        
                                    <fieldset class="col-md-12">
                                        <legend class="col-form-label col-sm-12" style="padding-top: 16px!important; font-size: 17px;">Attendant At Birth</legend>
                                        <div class="col-sm-12 d-flex">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_postDelAttendant" id="edit_postDelAttendantDoctor" value="Doctor">
                                                <label class="form-check-label" for="edit_postDelAttendantDoctor">Doctor</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_postDelAttendant" id="edit_postDelAttendantNurse" value="Nurse">
                                                <label class="form-check-label" for="edit_postDelAttendantNurse">Nurse</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_postDelAttendant" id="edit_postDelAttendantMidwife" value="Midwife">
                                                <label class="form-check-label" for="edit_postDelAttendantMidwife">Midwife</label>
                                            </div>
                                        </div>
                                        <span class="text-danger error-text edit_postDelAttendant_error"></span>
                                    </fieldset>
                        
                                    <div class="col-md-12">
                                        <label for="edit_postDelFnFather" class="col-sm-12 col-form-label">Full Name of Child's Father (IF THE FATHER IS NOT REGISTERED HERE)</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="edit_postDelFnFather" name="edit_postDelFnFather">
                                        </div>
                                        <span class="text-danger error-text edit_postDelFnFather_error"></span>
                                    </div>
                        
                                </div>   
                            </div>
                            <div class="alertCon">
                                <div id="alert-containerDb3"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                        <!-- End Horizontal Form -->
                    </div>
                </div>
            </div>
        {{-- END DELIVERY & BIRTH --}}
    {{-- END OF BIRTH AND DELIVERY FORM MODAL --}}
</main><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        // Initially hide all buttons
        $('.btn-container .post-partum-btn').show(); // Hide Post-Partum button
        $('.btn-container .birth-btn').hide(); // Hide Birth button

        // Show Post-Partum button when the "Post-Partum Visitation" tab is active
        $('#home-tab').on('click', function() {
            $('.btn-container .post-partum-btn').show();  // Show the Post-Partum button
            $('.btn-container .birth-btn').hide();  // Hide the Birth button
        });

        // Show Birth button when the "Delivery & Birth" tab is active
        $('#profile-tab').on('click', function() {
            $('.btn-container .birth-btn').show();  // Show the Birth button
            $('.btn-container .post-partum-btn').hide();  // Hide the Post-Partum button
        });
    });

// CRUD
    // CRUD POST PARTUM VISITS
        //iNSERT PP VISITS
        $(function(){      
            $("#maternalF3").on('submit', function(e){
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function(){
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data){
                        if (data.status == 0) {
                            $.each(data.error, function(prefix, val){
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        } else {
                            // Clear the form
                            $('#maternalF3')[0].reset();

                            // Create and append the success alert
                            const alertHtml = `
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="bi bi-check-circle me-1"></i>
                                    ${data.msg} 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>`;

                            // Append the alert to your alert container
                            $('#alert-containerPp').append(alertHtml);

                            // Remove alert after 3 seconds
                            setTimeout(() => {
                                $('.alert').alert('close');
                                location.reload();
                            }, 1000);

                        }
                    },
                    error: function(xhr) 
                    {
                        const alertHtml = `
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-circle me-1"></i>
                                Failed to add new Record. Please try again. 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
                        
                        $('#alert-containerPp').append(alertHtml);
                        // Remove alert after 3 seconds
                        setTimeout(() => 
                        {
                            $('.alert').alert('close');
                        }, 3000);
                    }
                });
            });
        });
        //dISPLAY PP FORM
        $(document).on('click', '.editButton:contains("Edit")', function() {
            var row = $(this).closest('tr'); 

            var ppId = row.find('td:eq(0)').text();
            var ppDate = row.find('td:eq(2)').text(); 
            var ppFeSo = row.find('td:eq(3)').text();
            var ppVit = row.find('td:eq(4)').text();
            var ppInter = row.find('td:eq(5)').text(); 
            var ppNxtVis = row.find('td:eq(6)').text();

            
            $('#edit_ppId').val(ppId);
            $('#edit_postVisit').val(ppDate);
            $('#edit_postFeSo').val(ppFeSo);
            $('#edit_postVit').val(ppVit);
            $('#edit_postIntervention').val(ppInter);
            $('#edit_postNxtVisit').val(ppNxtVis);

            // Show the modal
            $('#edit_modalPost').modal('show');
        });
        //uPDATE PP FORM
        $(document).ready(function() {
            $(document).on('submit', '#edit_maternalF3', function (e) {
                e.preventDefault(); // Prevent the form from submitting the default way
                
                var pp_id = $('#edit_ppId').val(); // Get the Vaccine Taken ID

                // Create a FormData object with the form fields
                var formData = new FormData();
                    formData.append('edit_ppId', $('#edit_ppId').val());
                    formData.append('edit_matId', $('#edit_matId').val());
                    formData.append('edit_postVisit', $('#edit_postVisit').val());
                    formData.append('edit_postFeSo', $('#edit_postFeSo').val());
                    formData.append('edit_postVit', $('#edit_postVit').val());
                    formData.append('edit_postIntervention', $('#edit_postIntervention').val());
                    formData.append('edit_postNxtVisit', $('#edit_postNxtVisit').val());

                $.ajax({
                    type: "POST",
                    url: "/update-post/" + pp_id, // URL to handle the update
                    data: formData,
                    dataType: "json",
                    contentType: false, // Needed for FormData
                    processData: false, // Needed for FormData
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
                    },
                    success: function(response) {
                        if (response.status === 400) {
                            $('#alert-containerPp3').html(`
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-triangle me-1"></i> Validation Error. Please check the fields.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            `);
                        } else if (response.status === 404) {
                            $('#alert-containerPp3').html(`
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-triangle me-1"></i> Record Not Found.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            `);
                        } else {
                            $('#alert-containerPp3').html(`
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="bi bi-check-circle me-1"></i> Record updated successfully!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            `);
                            // location.reload(); // Optionally reload the page to reflect changes
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Log error response for debugging
                        alert("An error occurred. Please check the console for more details.");
                    }
                });
            });
        });
    // CRUD BIRTH AND DELIVERY
        //iNSERT PP VISITS
        $(function(){      
            $("#maternalF4").on('submit', function(e){
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function(){
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data){
                        if (data.status == 0) {
                            $.each(data.error, function(prefix, val){
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        } else {
                            // Clear the form
                            $('#maternalF4')[0].reset();

                            // Create and append the success alert
                            const alertHtml = `
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="bi bi-check-circle me-1"></i>
                                    ${data.msg} 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>`;

                            // Append the alert to your alert container
                            $('#alert-containerBd').append(alertHtml);

                            // Remove alert after 3 seconds
                            setTimeout(() => {
                                $('.alert').alert('close');
                                // location.reload();
                            }, 1000);

                        }
                    },
                    error: function(xhr) 
                    {
                        const alertHtml = `
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-circle me-1"></i>
                                Failed to add new Record. Please try again. 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
                        
                        $('#alert-containerBd').append(alertHtml);
                        // Remove alert after 3 seconds
                        setTimeout(() => 
                        {
                            $('.alert').alert('close');
                        }, 3000);
                    }
                });
            });
        });
        //dISPLAY PP FORM
        $(document).on('click', '.editButtonDb:contains("Edit")', function() {
            var row = $(this).closest('tr'); 

            var dbId = row.find('td:eq(0)').text();
            var dbchild = row.find('td:eq(2)').text(); 
            var dbsex = row.find('td:eq(3)').text();
            var dbplacedel = row.find('td:eq(4)').text();
            var dbdelDate = row.find('td:eq(5)').text(); 
            var dboutcome = row.find('td:eq(6)').text();
            var dblt = row.find('td:eq(7)').text();
            var dbwt = row.find('td:eq(8)').text();
            var dbatt = row.find('td:eq(9)').text(); 
            var dbfather = row.find('td:eq(10)').text();

            
            $('#edit_postdelId').val(dbId);
            $('#edit_postDelDate').val(dbdelDate);
            $('#edit_postDelPlace').val(dbplacedel);
            $('#edit_postDelFnameChild').val(dbchild);
            $('#edit_postDelBirthLen').val(dblt);
            $('#edit_postDelBirthWt').val(dbwt);
            $('#edit_postDelFnFather').val(dbfather);

            // Select correct radio buttons based on retrieved values
            // For Sex
            if (dbsex === 'Male') {
                $('#edit_postDelSexMale').prop('checked', true);
            } else if (dbsex === 'Female') {
                $('#edit_postDelSexFemale').prop('checked', true);
            }

            // For Outcome Type
            if (dboutcome === 'NSVD') {
                $('#edit_postDelTypeYes').prop('checked', true);
            } else if (dboutcome === 'CS') {
                $('#edit_postDelTypeNo').prop('checked', true);
            }

            // For Attendant
            if (dbatt === 'Doctor') {
                $('#edit_postDelAttendantDoctor').prop('checked', true);
            } else if (dbatt === 'Nurse') {
                $('#edit_postDelAttendantNurse').prop('checked', true);
            } else if (dbatt === 'Midwife') {
                $('#edit_postDelAttendantMidwife').prop('checked', true);
            }

            // Show the modal
            $('#edit_modalDel').modal('show');
        });
        //uPDATE PP FORM
        $(document).ready(function() {
            $(document).on('submit', '#edit_maternalF4', function (e) {
                e.preventDefault(); // Prevent the form from submitting the default way
                
                var db_id = $('#edit_postdelId').val(); // Get the Vaccine Taken ID

                // Create a FormData object with the form fields
                var formData = new FormData();
                    formData.append('edit_postdelId', $('#edit_postdelId').val());
                    formData.append('edit_postDelDate', $('#edit_postDelDate').val());
                    formData.append('edit_postDelPlace', $('#edit_postDelPlace').val());
                    formData.append('edit_postDelType', $('#edit_postDelType').val());
                    formData.append('edit_postDelFnameChild', $('#edit_postDelFnameChild').val());
                    formData.append('edit_postDelSex', $('#edit_postDelSex').val());
                    formData.append('edit_postDelBirthLen', $('#edit_postDelBirthLen').val());
                    formData.append('edit_postDelBirthWt', $('#edit_postDelBirthWt').val());
                    formData.append('edit_postDelAttendant', $('#edit_postDelAttendant').val());
                    formData.append('edit_postDelFnFather', $('#edit_postDelFnFather').val());

                $.ajax({
                    type: "POST",
                    url: "/update-db/" + db_id, // URL to handle the update
                    data: formData,
                    dataType: "json",
                    contentType: false, // Needed for FormData
                    processData: false, // Needed for FormData
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
                    },
                    success: function(response) {
                        if (response.status === 400) {
                            $('#alert-containerDb3').html(`
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-triangle me-1"></i> Validation Error. Please check the fields.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            `);
                        } else if (response.status === 404) {
                            $('#alert-containerDb3').html(`
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-triangle me-1"></i> Record Not Found.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            `);
                        } else {
                            $('#alert-containerDb3').html(`
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="bi bi-check-circle me-1"></i> Record updated successfully!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            `);
                            // location.reload(); // Optionally reload the page to reflect changes
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Log error response for debugging
                        alert("An error occurred. Please check the console for more details.");
                    }
                });
            });
        });
//END OF CRUD
</script>

  @include('layouts.footerHealthWorkers')
</body>
</html>