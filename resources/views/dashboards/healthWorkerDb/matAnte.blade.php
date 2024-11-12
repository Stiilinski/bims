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
        max-width: 95%; 
        width: 95%;
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
                  <li class="breadcrumb-item active">Ante-Partum Visits</li>
                </ol>
              </nav>
        </div>
        <div class="btnArea">
            <button type="button" class="btn btn-primary"><i class="bi bi-printer-fill"></i> Print</button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">New Record</button>  
        </div>
    </div>
    <!-- End Page Title -->
  
    <div class="card">
        <div class="card-body">
  
            <!-- Table with stripped rows -->
            <table class="table table-striped datatable">
                <thead>
                <tr>
                    <th scope="col" style="display: none;">ID</th>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Complaint</th>
                        <th scope="col" style="display: none;">AOG</th>
                        <th scope="col" style="display: none;">HT</th>
                        <th scope="col" style="display: none;">WT</th>
                        <th scope="col" style="display: none;">BP</th>
                        <th scope="col" style="display: none;">FHT</th>
                        <th scope="col" style="display: none;">FHB</th>
                        <th scope="col" style="display: none;">PRESENTATION</th>
                    <th scope="col">Findings</th>
                    <th scope="col">Lab Result/ UTZ</th>
                    <th scope="col">Assessment Diagnosis</th>
                    <th scope="col">Treatment/Plan</th>
                    <th scope="col">Next Visits</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($ante as $index => $antes)
                        </tr>
                            <td style="display: none;">{{ $antes->ap_id }}</td>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $antes->ap_dateVisit }}</td>
                            <td>{{ $antes->ap_complaints }}</td>
                                <td style="display: none;">{{ $antes->apf_aog }}</td>
                                <td style="display: none;">{{ $antes->apf_ht }}</td>
                                <td style="display: none;">{{ $antes->apf_wt }}</td>
                                <td style="display: none;">{{ $antes->apf_bp }}</td>
                                <td style="display: none;">{{ $antes->apf_fundal }}</td>
                                <td style="display: none;">{{ $antes->apf_fhb }}</td>
                                <td style="display: none;">{{ $antes->apf_presentation }}</td>
                            <td>
                                <b>AOG:</b> {{ $antes->apf_aog }}, <b>HT:</b> {{ $antes->apf_ht }}, <b>WT:</b> {{ $antes->apf_wt }},
                                <b>BP:</b> {{ $antes->apf_bp }}, <b>FUNDAL HT:</b> {{ $antes->apf_fundal }}, <b>FHB:</b> {{ $antes->apf_fhb }},
                                <b>PRESENTATION:</b> {{ $antes->apf_presentation }}
                            </td>
                            <td>{{ $antes->ap_labResult }}</td>
                            <td>{{ $antes->ap_diagnosis }}</td>
                            <td>{{ $antes->ap_treatment }}</td>
                            <td>{{ $antes->ap_nextVisit }}</td>
                            <td>
                                <button class="btn btn-primary editButton" type="button">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          <!-- End Table with stripped rows -->
        </div>
    </div>

      <!-- ANTE -->
    <div class="modal fade" id="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ante-Partum Visits Record Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('regValidation.inputMform2')}}" class="maternalF2" id="maternalF2" autocomplete="off"> <!-- Horizontal Form -->
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">

                            <input type="hidden" class="form-control" id="empId" name="empId" value="{{ $LoggedUserInfo['em_id'] }}" readonly>
                            <input type="hidden" class="form-control" id="matId" name="matId" value="{{ $maternal->mat_id }}" readonly>

                            <div class="col-md-12">
                                <label for="apDate" class="col-sm-12 col-form-label">Date:</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" id="apDate" name="apDate">
                                </div>
                                <span class="text-danger error-text apDate_error"></span>
                            </div>
                            
                            <div class="col-md-12">
                                <label for="apComplaints" class="col-sm-8 col-form-label">Complaints</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="apComplaints" name="apComplaints">
                                </div>
                                <span class="text-danger error-text apComplaints_error"></span>
                            </div>

                            {{-- FINDINGS --}}
                            <div class="col-md-12">
                                <label class="col-sm-8 col-form-label">FINDINGS</label>
                            </div>
                                <div class="col-md-4">
                                    <label for="apAog" class="col-sm-8 col-form-label">AOG</label>
                                    <div class="col-sm-12">
                                        <input type="hidden" class="form-control" id="matlmp" name="matlmp" value="{{ $maternal->mat_lmp }}" readonly>
                                        <input type="text" class="form-control" id="apAog" name="apAog">
                                    </div>
                                    <span class="text-danger error-text apAog_error"></span>
                                </div>

                                <div class="col-md-4">
                                    <label for="apHt" class="col-sm-8 col-form-label">HT</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="apHt" name="apHt">
                                    </div>
                                    <span class="text-danger error-text apHt_error"></span>
                                </div>

                                <div class="col-md-4">
                                    <label for="apWt" class="col-sm-8 col-form-label">WT</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="apWt" name="apWt">
                                    </div>
                                    <span class="text-danger error-text apWt_error"></span>
                                </div>

                                <div class="col-md-4">
                                    <label for="apBp" class="col-sm-8 col-form-label">BP</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="apBp" name="apBp">
                                    </div>
                                    <span class="text-danger error-text apBp_error"></span>
                                </div>

                                <div class="col-md-4">
                                    <label for="apFundal" class="col-sm-8 col-form-label">FUNDAL HT</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="apFundal" name="apFundal">
                                    </div>
                                    <span class="text-danger error-text apFundal_error"></span>
                                </div>

                                <div class="col-md-4">
                                    <label for="apFhb" class="col-sm-8 col-form-label">FHB</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="apFhb" name="apFhb">
                                    </div>
                                    <span class="text-danger error-text apFhb_error"></span>
                                </div>

                                <div class="col-md-12">
                                    <label for="apPresentation" class="col-sm-8 col-form-label">Presentation</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="apPresentation" name="apPresentation">
                                    </div>
                                    <span class="text-danger error-text apPresentation_error"></span>
                                </div>
                            
                                <div class="col-md-12">
                                    <label for="apLab" class="col-sm-12 col-form-label">Lab Results / UTZ</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control briefField" id="apLab" name="apLab">
                                    </div>
                                    <span class="text-danger error-text apLab_error"></span>
                                </div>
                                
                                <div class="col-md-12">
                                    <label for="apDiagnosis" class="col-sm-12 col-form-label">Assessment Diagnosis</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control briefField" id="apDiagnosis" name="apDiagnosis">
                                    </div>
                                    <span class="text-danger error-text apDiagnosis_error"></span>
                                </div>

                                <div class="col-md-12">
                                    <label for="apPlan" class="col-sm-12 col-form-label">Treatment/Plan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control briefField" id="apPlan" name="apPlan">
                                    </div>
                                    <span class="text-danger error-text apPlan_error"></span>
                                </div>

                                <div class="col-md-12">
                                    <label for="apNxtVisit" class="col-sm-12 col-form-label">Next Visit</label>
                                    <div class="col-sm-12">
                                        <input type="date" class="form-control briefField" id="apNxtVisit" name="apNxtVisit">
                                    </div>
                                    <span class="text-danger error-text apNxtVisit_error"></span>
                                </div>
                        </div>   
                    </div>
                    <div class="alertCon">
                        <div id="alert-container"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form><!-- End Horizontal Form -->
            </div>
        </div>
    </div>
    <!-- End OF ANTE-->

    {{-- EDIT ANTE --}}
    <div class="modal fade" id="editmodal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EDIT Immunization Record Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="edit_maternalF2" id="edit_maternalF2" autocomplete="off"> <!-- Horizontal Form -->
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <input type="hidden" class="form-control" id="edit_apId" name="edit_apId">
                            <input type="hidden" class="form-control" id="edit_empId" name="edit_empId" value="{{ $LoggedUserInfo['em_id'] }}" readonly>
                            <input type="hidden" class="form-control" id="edit_matId" name="edit_matId" value="{{ $maternal->mat_id }}" readonly>

                            <div class="col-md-12">
                                <label for="edit_apDate" class="col-sm-12 col-form-label">Date:</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" id="edit_apDate" name="edit_apDate">
                                </div>
                                <span class="text-danger error-text edit_apDate_error"></span>
                            </div>
                            
                            <div class="col-md-12">
                                <label for="edit_apComplaints" class="col-sm-8 col-form-label">Complaints</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="edit_apComplaints" name="edit_apComplaints">
                                </div>
                                <span class="text-danger error-text edit_apComplaints_error"></span>
                            </div>

                            {{-- FINDINGS --}}
                                <div class="col-md-12">
                                    <label class="col-sm-8 col-form-label">FINDINGS</label>
                                </div>
                                <div class="col-md-4">
                                    <label for="edit_apAog" class="col-sm-8 col-form-label">AOG</label>
                                    <div class="col-sm-12">
                                        <input type="hidden" class="form-control" id="edit_matlmp" name="edit_matlmp" value="{{ $maternal->mat_lmp }}" readonly>
                                        <input type="text" class="form-control" id="edit_apAog" name="edit_apAog">
                                    </div>
                                    <span class="text-danger error-text edit_apAog_error"></span>
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="edit_apHt" class="col-sm-8 col-form-label">HT</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="edit_apHt" name="edit_apHt">
                                    </div>
                                    <span class="text-danger error-text edit_apHt_error"></span>
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="edit_apWt" class="col-sm-8 col-form-label">WT</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="edit_apWt" name="edit_apWt">
                                    </div>
                                    <span class="text-danger error-text edit_apWt_error"></span>
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="edit_apBp" class="col-sm-8 col-form-label">BP</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="edit_apBp" name="edit_apBp">
                                    </div>
                                    <span class="text-danger error-text edit_apBp_error"></span>
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="edit_apFundal" class="col-sm-8 col-form-label">FUNDAL HT</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="edit_apFundal" name="edit_apFundal">
                                    </div>
                                    <span class="text-danger error-text edit_apFundal_error"></span>
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="edit_apFhb" class="col-sm-8 col-form-label">FHB</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="edit_apFhb" name="edit_apFhb">
                                    </div>
                                    <span class="text-danger error-text edit_apFhb_error"></span>
                                </div>
                                
                                <div class="col-md-12">
                                    <label for="edit_apPresentation" class="col-sm-8 col-form-label">Presentation</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="edit_apPresentation" name="edit_apPresentation">
                                    </div>
                                    <span class="text-danger error-text edit_apPresentation_error"></span>
                                </div>                                
                            {{--END FINDINGS --}}
                            
                            <div class="col-md-12">
                                <label for="edit_apLab" class="col-sm-12 col-form-label">Lab Results / UTZ</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control briefField" id="edit_apLab" name="edit_apLab">
                                </div>
                                <span class="text-danger error-text edit_apLab_error"></span>
                            </div>
                            
                            <div class="col-md-12">
                                <label for="edit_apDiagnosis" class="col-sm-12 col-form-label">Assessment Diagnosis</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control briefField" id="edit_apDiagnosis" name="edit_apDiagnosis">
                                </div>
                                <span class="text-danger error-text edit_apDiagnosis_error"></span>
                            </div>
                            
                            <div class="col-md-12">
                                <label for="edit_apPlan" class="col-sm-12 col-form-label">Treatment/Plan</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control briefField" id="edit_apPlan" name="edit_apPlan">
                                </div>
                                <span class="text-danger error-text edit_apPlan_error"></span>
                            </div>
                            
                            <div class="col-md-12">
                                <label for="edit_apNxtVisit" class="col-sm-12 col-form-label">Next Visit</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control briefField" id="edit_apNxtVisit" name="edit_apNxtVisit">
                                </div>
                                <span class="text-danger error-text edit_apNxtVisit_error"></span>
                            </div>
                        </div>   
                    </div>
                    <div class="alertCon">
                        <div id="alert-container3"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- EDIT ANTE --}}
</main><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

<script>
// AOG
    document.addEventListener('DOMContentLoaded', function() {
        var matLmp = document.getElementById('matlmp').value;

        if (matLmp) {
            var lmpDate = new Date(matLmp);
            var currentDate = new Date();
            var timeDifference = currentDate - lmpDate;
            var totalDays = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
            var weeks = Math.floor(totalDays / 7);
            var days = totalDays % 7;
            document.getElementById('apAog').value = weeks + " week(s) " + days + " day(s)";
        }
    });

// CRUD
    //iNSERT
    $(function(){      
        $("#maternalF2").on('submit', function(e){
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
                        $('#maternalF2')[0].reset();

                        // Create and append the success alert
                        const alertHtml = `
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                ${data.msg} 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;

                        // Append the alert to your alert container
                        $('#alert-container').append(alertHtml);

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
                    
                    $('#alert-container').append(alertHtml);
                    // Remove alert after 3 seconds
                    setTimeout(() => 
                    {
                        $('.alert').alert('close');
                    }, 3000);
                }
            });
        });
    });
    //display data dstb
    $(document).on('click', '.editButton:contains("Edit")', function() {
        var row = $(this).closest('tr'); 

        var apId = row.find('td:eq(0)').text();
        var apDate = row.find('td:eq(2)').text(); 
        var apComplaints = row.find('td:eq(3)').text();
        var apAog = row.find('td:eq(4)').text();
        var apHt = row.find('td:eq(5)').text(); 
        var apWt = row.find('td:eq(6)').text();
        var apBp = row.find('td:eq(7)').text(); 
        var apFundal = row.find('td:eq(8)').text();
        var apFhb = row.find('td:eq(9)').text();
        var apPresentation = row.find('td:eq(10)').text();
        var apFindings = row.find('td:eq(11)').text();
        var apLabResult = row.find('td:eq(12)').text();
        var apDiagnosis = row.find('td:eq(13)').text();
        var apTreatment = row.find('td:eq(14)').text();
        var apNextVisit = row.find('td:eq(15)').text();

        $('#edit_apId').val(apId);
        $('#edit_apDate').val(apDate);
        $('#edit_apComplaints').val(apComplaints);
        $('#edit_apAog').val(apAog);
        $('#edit_apHt').val(apHt);
        $('#edit_apWt').val(apWt);
        $('#edit_apBp').val(apBp);
        $('#edit_apFundal').val(apFundal);
        $('#edit_apFhb').val(apFhb);
        $('#edit_apPresentation').val(apPresentation);
        $('#edit_apLab').val(apLabResult);
        $('#edit_apDiagnosis').val(apDiagnosis);
        $('#edit_apPlan').val(apTreatment);
        $('#edit_apNxtVisit').val(apNextVisit);

        // Show the modal
        $('#editmodal').modal('show');
    });
    // uPDATE
    $(document).ready(function() {
        $(document).on('submit', '#edit_maternalF2', function (e) {
            e.preventDefault(); // Prevent the form from submitting the default way
            
            var ap_id = $('#edit_apId').val(); // Get the Vaccine Taken ID

            // Create a FormData object with the form fields
            var formData = new FormData();
                formData.append('edit_apId', $('#edit_apId').val());
                formData.append('edit_apDate', $('#edit_apDate').val());
                formData.append('edit_apComplaints', $('#edit_apComplaints').val());
                formData.append('edit_apAog', $('#edit_apAog').val());
                formData.append('edit_apHt', $('#edit_apHt').val());
                formData.append('edit_apWt', $('#edit_apWt').val());
                formData.append('edit_apBp', $('#edit_apBp').val());
                formData.append('edit_apFundal', $('#edit_apFundal').val());
                formData.append('edit_apFhb', $('#edit_apFhb').val());
                formData.append('edit_apPresentation', $('#edit_apPresentation').val());
                formData.append('edit_apLab', $('#edit_apLab').val());
                formData.append('edit_apDiagnosis', $('#edit_apDiagnosis').val());
                formData.append('edit_apPlan', $('#edit_apPlan').val());
                formData.append('edit_apNxtVisit', $('#edit_apNxtVisit').val());

            $.ajax({
                type: "POST",
                url: "/update-ante/" + ap_id, // URL to handle the update
                data: formData,
                dataType: "json",
                contentType: false, // Needed for FormData
                processData: false, // Needed for FormData
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
                },
                success: function(response) {
                    if (response.status === 400) {
                        $('#alert-container3').html(`
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle me-1"></i> Validation Error. Please check the fields.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `);
                    } else if (response.status === 404) {
                        $('#alert-container3').html(`
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle me-1"></i> Record Not Found.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `);
                    } else {
                        $('#alert-container3').html(`
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