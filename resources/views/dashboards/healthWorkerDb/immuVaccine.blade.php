@include('layouts.headHealthWorkers')
<style>
    .pagetitle {
        display: flex;
        justify-content: space-between;
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

    .titleArea {
        display: flex;
        justify-content: center;
    }

    .mainTitle {
        font-size: 20px;
        font-weight: 700;
    }

    .infoTitle {
        font-size: 18px;
        font-weight: 600;
    }

    .value {
        margin-left: 10px;
        font-weight: 500;
        font-size: 16px;
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
            <h1>Individual Immunization Record</h1>
            <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ action('App\Http\Controllers\regValidation@immunization') }}">Immunization Record</a></li>
                  <li class="breadcrumb-item active">Individual Immunization Record</li>
                </ol>
              </nav>
        </div>
        <div class="btnArea">
            <button type="button" class="btn btn-secondary"><i class="bi bi-printer-fill"></i> Print</button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal">New Record</button> 
        </div>
    </div><!-- End Page Title -->
  
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 titleArea">
                    <h3 class="mainTitle">EPI Record</h3>
                </div>
                @php
                    $fullName = trim($epi->epi_lname ?? '') . ', ' . trim($epi->epi_fname ?? '') . ' ' . trim($epi->epi_mname ?? '') . ' ' . trim($epi->epi_suffix ?? '');
                @endphp
                <div class="col-md-12 d-flex border">
                    <h5 class="infoTitle">Name:</h5> <span class="infoFullName value">{{ $fullName ?? 'N/A'}}</span>
                </div>

                <div class="col-md-10 d-flex border">
                    <h5 class="infoTitle">Sex:</h5> <span class="infoSex value">{{$epi->epi_sex ?? 'N/A'}}</span>
                </div>

                <div class="col-md-2 d-flex border">
                    <h5 class="infoTitle">NHTS:</h5> <span class="infoNhts value">{{$epi->epi_nhts ?? 'N/A'}}</span>
                </div>

                <div class="col-md-10 d-flex border">
                    <h5 class="infoTitle">Birthday:</h5> <span class="infoBday value">{{$epi->epi_bdate ?? 'N/A'}}</span>
                </div>

                <div class="col-md-2 d-flex border">
                    <h5 class="infoTitle">Time:</h5> <span class="infoTitle value">{{$epi->epi_time ?? 'N/A'}}</span>
                </div>

                <div class="col-md-12 d-flex border">
                    <h5 class="infoTitle">Address:</h5> <span class="infoAddress value">{{$epi->epi_address ?? 'N/A'}}</span>
                </div>

                @php
                    $motherName = $epi->epi_motherName ?? 
                                trim(($epi->mother->res_lname ?? '') . ', ' . ($epi->mother->res_fname ?? '') . ' ' . ($epi->mother->res_mname ?? '') . ' ' . ($epi->mother->res_suffix ?? ''));
                    $displayMother = $motherName ?: $epi->mother_id ?: 'N/A';
                @endphp
                <div class="col-md-8 d-flex border">
                    <h5 class="infoTitle">Mother:</h5> 
                    <span class="infoMother value">{{ $displayMother }}</span>
                </div>
                
                @php
                    use Carbon\Carbon;

                    // Check if motherName or motherAge is present
                    $motherAge = $epi->epi_motherAge ?? null;
                    
                    // Calculate age if mother's birthdate is provided and motherName/ motherAge is not set
                    if (!$epi->epi_motherName && !$motherAge && isset($epi->mother->res_bdate)) {
                        $motherAge = Carbon::parse($epi->mother->res_bdate)->age;
                    }
                @endphp
                <div class="col-md-2 d-flex border">
                    <h5 class="infoTitle">Age:</h5> <span class="infoAge value">{{$epi->epi_motherAge ?? $motherAge ?? 'N/A' }}</span>
                </div>

                <div class="col-md-2 d-flex border">
                    <h5 class="infoTitle">FP:</h5> <span class="infoFp value">{{$epi->epi_fp ?? 'N/A'}}</span>
                </div>

                @php
                    $fatherName = $epi->epi_fatherName ?? 
                                trim(($epi->father->res_lname ?? '') . ', ' . ($epi->father->res_fname ?? '') . ' ' . ($epi->father->res_mname ?? '') . ' ' . ($epi->father->res_suffix ?? ''));
                    $displayFather = $fatherName ?: $epi->mother_id ?: 'N/A';
                @endphp

                <div class="col-md-12 d-flex border">
                    <h5 class="infoTitle">Father:</h5> <span class="infoFather value">{{ $displayFather }}</span>
                </div>

                <div class="col-md-12 d-flex border">
                    <h5 class="infoTitle">Place of Delivery:</h5> <span class="infoDelivery value">{{$epi->epi_delPlace ?? 'N/A'}}</span>
                </div>

                <div class="col-md-12 d-flex border">
                    <h5 class="infoTitle">TT Received:</h5> <span class="infoTt value">{{$epi->epi_ttReceived ?? 'N/A'}}</span>
                </div>

                <div class="col-md-12 d-flex border">
                    <h5 class="infoTitle">BreastFeeding:</h5> <span class="infoBf value">{{$epi->epi_breastFeed ?? 'N/A'}}</span>
                </div>

                <div class="col-md-12 d-flex border">
                    <h5 class="infoTitle">New Born Screesning:</h5> <span class="infoNbs value">{{$epi->epi_newBornSc ?? 'N/A'}}</span>
                </div>

                <div class="col-md-12 d-flex border">
                    <h5 class="infoTitle">Date of NBS:</h5> <span class="infoDnbs value">{{$epi->epi_dateNbs ?? 'N/A'}}</span>
                </div>
                
                <div class="col-md-12 d-flex border">
                    <h5 class="infoTitle">Birthorder:</h5> <span class="infoBo value">{{$epi->epi_birthOrder ?? 'N/A'}}</span>
                </div>
            </div>

            <!-- Table with stripped rows -->
            <table class="table table-striped datatable">
                <thead>
                <tr>
                    <th scope="col" style="display: none;">ID</th>
                    <th scope="col">#</th>
                    <th scope="col" style="display: none;">EPI ID</th>
                    <th scope="col">DATES</th>
                    <th scope="col">WEIGHT</th>
                    <th scope="col">VACCINES</th>
                    <th scope="col" style="display: none;">NEXT SCHED</th>
                    <th scope="col">STATUS</th>
                    <th scope="col" style="display: none;">EM ID</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($vacForm as $index => $vacs)
                        </tr>
                            <td style="display: none;">{{ $vacs->vt_id }}</td>
                            <td>{{ $index + 1 }}</td>
                            <td style="display: none;">{{ $vacs->epi_id }}</td>
                            <td>{{ $vacs->vt_date }}</td>
                            <td>{{ $vacs->vt_wt }}</td>
                            <td>{{ $vacs->vt_vaccines }}</td>
                            <td style="display: none;">{{ $vacs->vt_nxtSched }}</td>
                            <td>{{ $vacs->vt_status }}</td>
                            <td style="display: none;">{{ $vacs->em_id  }}</td>
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

      <!-- SIDE A -->
    <div class="modal fade" id="Modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Immunization Record Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('regValidation.inputVac') }}" class="vacForm" id="vacForm" autocomplete="off"> <!-- Horizontal Form -->
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-12" style="display: none;">
                                <label for="epId" class="col-sm-8 col-form-label">EPI ID</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="epId" name="epId" value="{{ $epi->epi_id }}">
                                </div>
                                <span class="text-danger error-text epId_error"></span>
                            </div>

                            <div class="col-md-12">
                                <label for="vacDate" class="col-sm-8 col-form-label">Date</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" id="vacDate" name="vacDate">
                                </div>
                                <span class="text-danger error-text vacDate_error"></span>
                            </div>

                            <div class="col-md-12">
                                <label for="vacWt" class="col-sm-8 col-form-label">Weight</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="vacWt" name="vacWt">
                                </div>
                                <span class="text-danger error-text vacWt_error"></span>
                            </div>

                            <div class="col-md-12">
                                <label for="vaccines" class="col-sm-8 col-form-label">Vaccines</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="vaccines" name="vaccines">
                                </div>
                                <span class="text-danger error-text vaccines_error"></span>
                            </div>

                            <div class="col-md-12">
                                <label for="vacSched" class="col-sm-8 col-form-label">Next Schedule</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" id="vacSched" name="vacSched">
                                </div>
                                <span class="text-danger error-text vacSched_error"></span>
                            </div>

                            <div class="col-md-12">
                                <label for="vacStatus" class="col-sm-8 col-form-label">Status</label>
                                <div class="col-sm-12">
                                    <select id="vacStatus" class="form-select" name="vacStatus">
                                        <option value="">Select a Status</option>
                                        <option value="Partially Completed">Partially Completed</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Archive">Archive</option>
                                    </select>
                                </div>
                                <span class="text-danger error-text vacStatus_error"></span>
                            </div>

                            <div class="col-md-12" style="display: none;">
                                <label for="empId" class="col-sm-8 col-form-label">Employee</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="empId" name="empId" value="{{ $LoggedUserInfo['em_id'] }}">
                                </div>
                                <span class="text-danger error-text empId_error"></span>
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
                </form>
            </div>
        </div>
    </div>
    <!-- End OF SIDE A-->


    {{-- EDIT SIDE A --}}
    <div class="modal fade" id="EditExtralargeModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EDIT Immunization Record Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="edit_vacForm" id="edit_vacForm" autocomplete="off"> <!-- Horizontal Form -->
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-12" style="display: none;">
                                <label for="edit_epId" class="col-sm-8 col-form-label">EPI ID</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="edit_vtId" name="edit_vtId">
                                    <input type="text" class="form-control" id="edit_epId" name="edit_epId" value="{{ $epi->epi_id }}">
                                </div>
                                <span class="text-danger error-text edit_epId_error"></span>
                            </div>

                            <div class="col-md-12">
                                <label for="edit_vacDate" class="col-sm-8 col-form-label">Date</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" id="edit_vacDate" name="edit_vacDate">
                                </div>
                                <span class="text-danger error-text edit_vacDate_error"></span>
                            </div>

                            <div class="col-md-12">
                                <label for="edit_vacWt" class="col-sm-8 col-form-label">Weight</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="edit_vacWt" name="edit_vacWt">
                                </div>
                                <span class="text-danger error-text edit_vacWt_error"></span>
                            </div>

                            <div class="col-md-12">
                                <label for="edit_vaccines" class="col-sm-8 col-form-label">Vaccines</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="edit_vaccines" name="edit_vaccines">
                                </div>
                                <span class="text-danger error-text edit_vaccines_error"></span>
                            </div>

                            <div class="col-md-12">
                                <label for="edit_vacSched" class="col-sm-8 col-form-label">Next Schedule</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" id="edit_vacSched" name="edit_vacSched">
                                </div>
                                <span class="text-danger error-text edit_vacSched_error"></span>
                            </div>

                            <div class="col-md-12">
                                <label for="edit_vacStatus" class="col-sm-8 col-form-label">Status</label>
                                <div class="col-sm-12">
                                    <select id="edit_vacStatus" class="form-select" name="edit_vacStatus">
                                        <option value="">Select a Status</option>
                                        <option value="Partially Completed">Partially Completed</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Archive">Archive</option>
                                    </select>
                                </div>
                                <span class="text-danger error-text edit_vacStatus_error"></span>
                            </div>

                            <div class="col-md-12" style="display: none;">
                                <label for="edit_empId" class="col-sm-8 col-form-label">Employee</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="edit_empId" name="edit_empId" value="{{ $LoggedUserInfo['em_id'] }}">
                                </div>
                                <span class="text-danger error-text edit_empId_error"></span>
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
    {{-- END OF EDIT SIDE A --}}

</main><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    //CRUD
    //iNSERT
    $(function() {
        $("#vacForm").on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    // Clear any previous error messages
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 0) {
                        // Display validation errors
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        // Clear the form
                        $('#vacForm')[0].reset();

                        // Display success alert
                        const alertHtml = `
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                ${data.msg} 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
                        $('#alert-container').append(alertHtml);

                        // Close alert after 3 seconds and reload page
                        setTimeout(() => {
                            $('.alert').alert('close');
                            location.reload();
                        }, 3000);
                    }
                },
                error: function(xhr, status, error) {
                    // Log the full error response for debugging
                    console.error("Error details:", xhr.responseText);

                    // Display error alert
                    const alertHtml = `
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-circle me-1"></i>
                            Failed to add new Record. Please try again.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;
                    $('#alert-container').append(alertHtml);

                    // Close alert after 3 seconds
                    setTimeout(() => {
                        $('.alert').alert('close');
                    }, 3000);
                }
            });
        });
    });

    //display data dstb
    $(document).on('click', '.editButton:contains("Edit")', function() {
        // Get the current row data
        var row = $(this).closest('tr');
        var vtId = row.find('td:eq(0)').text(); // Assuming vtId is in the first column
        var epId = row.find('td:eq(1)').text(); // Assuming epId is in the second column
        var vtDate = row.find('td:eq(3)').text();
        var vtWt = row.find('td:eq(4)').text();
        var vtVac = row.find('td:eq(5)').text();
        var vtSched = row.find('td:eq(6)').text();
        var vtStats = row.find('td:eq(7)').text();
        var empId = row.find('td:eq(8)').text(); // Assuming empId is in another specific column

        // Populate the modal fields with the selected data
        $('#edit_vtId').val(vtId);
        $('#edit_epId').val(epId);
        $('#edit_vacDate').val(vtDate);
        $('#edit_vacWt').val(vtWt);
        $('#edit_vaccines').val(vtVac);
        $('#edit_vacSched').val(vtSched);
        $('#edit_vacStatus').val(vtStats);
        $('#edit_empId').val(empId);

        // Show the modal
        $('#EditExtralargeModal').modal('show');
    });


    // uPDATE
    $(document).ready(function() {
        $(document).on('submit', '#edit_vacForm', function (e) {
            e.preventDefault(); // Prevent the form from submitting the default way
            
            var vtId = $('#edit_vtId').val(); // Get the Vaccine Taken ID

            // Create a FormData object with the form fields
            var formData = new FormData();
            formData.append('edit_vtId', vtId);
            formData.append('edit_vacDate', $('#edit_vacDate').val());
            formData.append('edit_vacWt', $('#edit_vacWt').val());
            formData.append('edit_vaccines', $('#edit_vaccines').val());
            formData.append('edit_vacSched', $('#edit_vacSched').val());
            formData.append('edit_vacStatus', $('#edit_vacStatus').val());
            formData.append('edit_empId', $('#edit_empId').val());

            $.ajax({
                type: "POST",
                url: "/update-vaccine/" + vtId, // URL to handle the update
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
</script>

  @include('layouts.footerHealthWorkers')
</body>
</html>