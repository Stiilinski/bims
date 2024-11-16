@include('layouts.headSecretary')
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

    .edit_profilePreview {
        width: 350px;
        height: 300px;
        overflow: hidden; /* Ensures the image stays within the boundaries */
        position: relative;
        border-radius: 10px;
    }
    
    .edit_profilePreview img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensures the image covers the entire 350x350 box without distortion */
    }

    .row {
        padding: 5px;
    }

    .purpose1 {
        width: 380px;
        height: 250px;
        background-color: #3b89e8;
        background-image: linear-gradient(#125DB5, #DB77CB);
        border-radius: 10px;
        color: #fff;
        font-size: 40px;
        text-align: center;
        transition: transform 0.5s ease;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 15px;
    }

    .purpose1:hover {
        transform: scale(1.05);
    }

    table.dataTable.stripe tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    .card {
        padding: 10px;
    }
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<body>
    @include('layouts.headerSecretary')

    @include('layouts.sidebarSecretary')
        <main class="main" id="main">
            <div class="pagetitle">
                <h1>Brgy. Clearance</h1>
                <div class="btnArea">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#certificateModal">Add Certificate</button> 
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-3">
                    <select id="status-filter" class="form-select">
                        <option value="">All</option>
                        <option value="pending" selected>Pending</option>
                        <option value="processed">Processed</option>
                        <option value="ready to pick up">Ready To Pick Up</option>
                        <option value="rejected">Reject</option>
                        <option value="completed">Completed</option>
                        <option value="Archive">Archived</option>
                    </select>  
                </div>
            </div> 
            <div class="card">
                <div class="card-body">          
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Age</th>
                                <th>Purok</th>
                                <th>Status</th>
                                <th>Purpose</th>
                                <th style="display: none;"></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clearance as $clearances)
                                @php
                                    // Calculate age
                                    $birthdate = \Carbon\Carbon::parse($clearances->res_bdate);
                                    $age = $birthdate->age;
                                    // Concatenate full name
                                    $fullName = $clearances->res_fname . ' ' . $clearances->res_mname . ' ' . $clearances->res_lname;
                                    if ($clearances->res_suffix !== 'N/A') {
                                        $fullName .= ' ' . $clearances->res_suffix;
                                    }
                                @endphp
                                <tr>
                                    <td>{{ $clearances->bcl_id }}</td>
                                    <td>{{ $fullName }}</td>
                                    <td>{{ $age }}</td>
                                    <td>{{ $clearances->res_purok }}</td>
                                    <td>{{ $clearances->bcl_status }}</td>
                                    <td>{{ $clearances->bcl_purpose }}</td>
                                    <td style="display: none;">{{ $clearances->created_at }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <button type="button" class="dropdown-item" onclick="openViewModal({{ $clearances->bcl_id }})">View</button>
                                                </li>
                                                
                                                @if($clearances->bcl_status === 'pending')
                                                    <!-- Actions for 'pending' status -->
                                                    <li>
                                                        <button type="button" class="dropdown-item" onclick="redirectToPurpose({{ $clearances->bcl_id }})">Print</button>
                                                    </li>
                                                    <li>
                                                        <button type="button" class="dropdown-item" onclick="showRejectForm({{ $clearances->bcl_id }})">Reject</button>
                                                    </li>
                                                    <li>
                                                        <button type="button" class="dropdown-item" onclick="updateBclStatus({{ $clearances->bcl_id }}, 'archive')">Archive</button>
                                                    </li>
                                                @elseif($clearances->bcl_status === 'processed')
                                                    <!-- Actions for 'processed' status -->
                                                    <li>
                                                        <button type="button" class="dropdown-item" onclick="redirectToPurpose({{ $clearances->bcl_id }})">Print</button>
                                                    </li>
                                                    <li>
                                                        <button type="button" class="dropdown-item" onclick="updateBclStatus({{ $clearances->bcl_id }}, 'ready to pick up')">Ready</button>
                                                    </li>
                                                    <li>
                                                        <button type="button" class="dropdown-item" onclick="updateBclStatus({{ $clearances->bcl_id }}, 'archive')">Archive</button>
                                                    </li>
                                                @elseif($clearances->bcl_status === 'ready to pick up')
                                                    <!-- Actions for 'ready to pick up' status -->
                                                    <li>
                                                        <button type="button" class="dropdown-item" onclick="redirectToPurpose({{ $clearances->bcl_id }})">Print</button>
                                                    </li>
                                                    <li>
                                                        <button type="button" class="dropdown-item" onclick="sendEmail('{{ $clearances->res_email }}', '{{ $clearances->res_fname }}', '{{ $clearances->res_lname }}')">Send Email</button>
                                                    </li>
                                                    <li>
                                                        <button type="button" class="dropdown-item" onclick="updateBclStatus({{ $clearances->bcl_id }}, 'completed')">Completed</button>
                                                    </li>
                                                    <li>
                                                        <button type="button" class="dropdown-item" onclick="updateBclStatus({{ $clearances->bcl_id }}, 'archive')">Archive</button>
                                                    </li>
                                                @elseif($clearances->bcl_status === 'rejected')
                                                    <!-- Actions for 'rejected' status -->
                                                    <li>
                                                        <button type="button" class="dropdown-item" onclick="updateBclStatus({{ $clearances->bcl_id }}, 'archive')">Archive</button>
                                                    </li>
                                                @elseif($clearances->bcl_status === 'completed')
                                                    <!-- Actions for 'completed' status -->
                                                    <li>
                                                        <button type="button" class="dropdown-item" onclick="updateBclStatus({{ $clearances->bcl_id }}, 'archive')">Archive</button>
                                                    </li>
                                                @elseif(strtolower(trim($clearances->bcl_status)) === 'archived')
                                                    <!-- Actions for 'archived' status -->
                                                    <li>
                                                        <button type="button" class="dropdown-item" onclick="updateBclStatus({{ $clearances->bcl_id }}, 'pending')">Pending</button>
                                                    </li>
                                                @endif                                                
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
   
        {{-- VIEW Clearance --}}
        <div class="modal fade" id="viewExtralargeModal" tabindex="-1">
            <div class="modal-dialog custom-modal-width">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">View Requester</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
                        <div class="d-flex">
                            <div class="row g-3">    
                                <div class="d-flex">
                                    <div class="row g-3">    
                                        <div class="avatarcon">
                                            <img id="edit_profilePreview" src="" class="edit_profilePreview" alt="Profile Image">
                                            
                                            <div class="col-md-12">
                                                <label for="edit_profile" class="form-label1">Profile Picture</label>
                                                <input type="file" class="form-control" id="edit_profile" name="edit_profile" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                                                <span class="text-danger error-text edit_profile_error"></span>
                                            </div>  
                                            
                                            <div class="col-md-12">
                                                <label for="edit_household" class="form-label1">Household Number</label>
                                                <input type="number" class="form-control" id="edit_household" name="edit_household">
                                                <span class="text-danger error-text edit_household_error"></span>
                                            </div> 
            
                                            <div class="col-md-12">
                                                <label for="edit_dateRegister" class="form-label1">Date Registered</label>
                                                <input type="Date" class="form-control" id="edit_dateRegister" name="edit_dateRegister">
                                                <span class="text-danger error-text edit_dateRegister_error"></span>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <label for="edit_national" class="form-label1">National ID</label>
                                                <input type="text" class="form-control" id="edit_national" name="edit_national">
                                                <span class="text-danger error-text edit_national_error"></span>
                                            </div> 
                                        </div>
                                    </div>
                                    
                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <label for="edit_fname">First Name</label>
                                            <input type="text" class="form-control" name="edit_firstName" id="edit_fname" placeholder="Enter Firstname">
                                            <span class="text-danger error-text edit_firstName_error"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_mname">Middle Name</label>
                                            <input type="text" class="form-control" name="edit_middleName" id="edit_mname" placeholder="Enter Middlename">
                                            <span class="text-danger error-text edit_middleName_error"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_lname">Last Name</label>
                                            <input type="text" class="form-control" name="edit_lastName" id="edit_lname" placeholder="Enter Lastname">
                                            <span class="text-danger error-text edit_lastName_error"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_suffix">Suffix</label>
                                            <select id="edit_suffix" class="form-select" name="edit_suffix">
                                                <option value="" disabled selected>Select Suffix</option>
                                                <option value="I">I</option>
                                                <option value="II">II</option>
                                                <option value="III">III</option>
                                                <option value="IV">IV</option>
                                                <option value="V">V</option>
                                                <option value="Jr.">Jr.</option>
                                                <option value="Sr.">Sr.</option>
                                            </select>
                                            <span class="text-danger error-text edit_suffix_error"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_bPlace">Place of Birth</label>
                                            <input type="text" class="form-control" name="edit_birthPlace" id="edit_bPlace" placeholder="Enter Birth Place">
                                            <span class="text-danger error-text edit_birthPlace_error"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_bDate">Birth Date</label>
                                            <input type="date" class="form-control" name="edit_birthDate" id="edit_bDate" placeholder="Enter Birth Date">
                                            <span class="text-danger error-text edit_birthDate_error"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_age">Age</label>
                                            <input type="text" class="form-control" name="edit_age" id="edit_age" placeholder="Enter Age" readonly>
                                            <span class="text-danger error-text edit_age_error"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_sex">Sex</label>
                                            <select id="edit_sex" class="form-select" name="edit_sex">
                                                <option value="" disabled selected>Select Sex</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <span class="text-danger error-text edit_sex_error"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_education">Educational Attainment</label> 
                                            <select id="edit_education" class="form-select" name="edit_education">
                                                <option value="" disabled selected>Select Educational Attainment</option>
                                                <option value="No Formal Education">No Formal Education</option>
                                                <option value="Some Elementary">Some Elementary</option>
                                                <option value="Elementary Graduate">Elementary Graduate</option>
                                                <option value="Some High School">Some High School</option>
                                                <option value="High School Graduate">High School Graduate</option>
                                                <option value="Some College">Some College</option>
                                                <option value="College Graduate">College Graduate</option>
                                                <option value="Post-Graduate Studies">Post-Graduate Studies</option>
                                                <option value="Vocational/Technical Education">Vocational/Technical Education</option>
                                                <option value="Alternative Learning System (ALS)">Alternative Learning System (ALS)</option>
                                            </select>
                                            <span class="text-danger error-text edit_education_error"></span>
                                        </div>                                    
                                        <div class="col-md-3">
                                            <label for="edit_religion">Religion</label>
                                            <input type="text" class="form-control" name="edit_religion" id="edit_religion" placeholder="Enter Email">
                                            <span class="text-danger error-text edit_religion_error"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_civilStatus">Civil Status</label>
                                            <select id="edit_civilStatus" class="form-select" name="edit_civilStatus">
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Annulled">Annulled</option>
                                                <option value="Widowed">Widowed</option>
                                            </select>
                                            <span class="text-danger error-text edit_civilStatus_error"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_voters">Voters Status</label>
                                            <select id="edit_voters" class="form-select" name="edit_voters">
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <span class="text-danger error-text edit_voters_error"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_email">Email Address</label>
                                            <input type="text" class="form-control" name="edit_email" id="edit_email" placeholder="Enter Email">
                                            <span class="text-danger error-text edit_email_error"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_contact">Contact Number</label>
                                            <input type="text" class="form-control" name="edit_contact" id="edit_contact" placeholder="Enter contact">
                                            <span class="text-danger error-text edit_contact_error"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_otherContact">Other Contact</label>
                                            <input type="text" class="form-control" name="edit_otherContact" id="edit_otherContact" placeholder="Enter contact">
                                            <span class="text-danger error-text edit_otherContact_error"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_tempAddress">Temporary Address</label>
                                            <input type="text" class="form-control" name="edit_tempAddress" id="edit_tempAddress" placeholder="Enter address">
                                            <span class="text-danger error-text edit_tempAddress_error"></span>
                                        </div> 
                                        <div class="col-md-3">
                                            <label for="edit_address">Permanent Address</label>
                                            <input type="text" class="form-control" name="edit_address" id="edit_address" placeholder="Enter address">
                                            <span class="text-danger error-text edit_address_error"></span>
                                        </div>       
                                        <div class="col-md-3">
                                            <label for="edit_sitio">Sitio</label>
                                            <select id="edit_sitio" class="form-select" name="edit_sitio">
                                                <option value="" disabled selected>Select Sitio</option>
                                                <option value="Larrobis">Larrobis</option>
                                                <option value="Premier">Premier</option>
                                                <option value="Ompot">Ompot</option>
                                                <option value="Riles 1">Riles 1</option>
                                                <option value="Riles 2">Riles 2</option>
                                                <option value="Aleman">Aleman</option>
                                                <option value="San Vicente">San Vicente</option>
                                            </select>
                                            <span class="text-danger error-text edit_sitio_error"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_purok">Purok</label>
                                            <select id="edit_purok" class="form-select" name="edit_purok">
                                                <option value="" disabled selected>Select Purok</option>
                                                <option value="Tugas">Tugas</option>
                                                <option value="Tambis">Tambis</option>
                                                <option value="Mahogany">Mahogany</option>
                                                <option value="Guyabano">Guyabano</option>
                                                <option value="Mansinitas">Mansinitas</option>
                                                <option value="Ipil-ipil">Ipil-ipil</option>
                                                <option value="Lubi">Lubi</option>
                                            </select>
                                            <span class="text-danger error-text edit_purok_error"></span>
                                        </div>                                            
                                        <div class="col-md-3">
                                            <label for="edit_citizens">Citizenship</label>
                                            <input type="text" class="form-control" name="edit_citizens" id="edit_citizens" placeholder="Enter citizen">
                                            <span class="text-danger error-text edit_citizens_error"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_occupation">Occupation (IF NONE PUT N/A)</label>
                                            <input type="text" class="form-control" name="edit_occupation" id="edit_occupation" placeholder="Enter occupation">
                                            <span class="text-danger error-text edit_occupation_error"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_person">Person Status</label>
                                            <select id="edit_person" class="form-select" name="edit_person">
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="Alive">Alive</option>
                                                <option value="Deceased">Deceased</option>
                                            </select>
                                            <span class="text-danger error-text edit_person_error"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edit_living">Living Status</label>
                                            <select id="edit_living" class="form-select" name="edit_living">
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="archive">Archive</option>
                                            </select>
                                            <span class="text-danger error-text edit_living_error"></span>
                                        </div>                                    
                                    </div>
                                </div>

                                <hr>
                                
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label for="edit_Transaction">Transaction Code</label>
                                        <input type="text" class="form-control" name="edit_Transaction" id="edit_Transaction" placeholder="Enter Firstname">
                                        <span class="text-danger error-text edit_Transaction_error"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_Purpose">Purpose</label>
                                        <input type="text" class="form-control" name="edit_Purpose" id="edit_Purpose" placeholder="Enter Middlename">
                                        <span class="text-danger error-text edit_Purpose_error"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_dIssued">Date Issued</label>
                                        <input type="text" class="form-control" name="edit_dIssued" id="edit_dIssued" placeholder="Enter Birth Place">
                                        <span class="text-danger error-text edit_dIssued_error"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_pickUp">Pick Up Date</label>
                                        <input type="date" class="form-control" name="edit_pickUp" id="edit_pickUp" placeholder="Enter Birth Date">
                                        <span class="text-danger error-text edit_pickUp_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- END OF VIEW CERTIFICATE --}}

        {{-- REJECT --}}
        <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="rejectModalLabel">Provide Reason</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="rejectReasonForm" class="rejectReasonForm">
                            @csrf
                            <input type="hidden" name="certificateId" id="certificateId">
                            <!-- Rejection Reason Dropdown -->
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="rejectReason" class="form-label">Select Reason for Rejection</label>
                                    <select name="rejectReason" id="rejectReason" class="form-select" required>
                                        <option value="">Select a reason</option>
                                        <option value="Incomplete Documentation">Incomplete Documentation</option>
                                        <option value="Invalid Information">Invalid Information</option>
                                        <option value="Failure to Meet Requirements">Failure to Meet Requirements</option>
                                        <option value="Duplicate Request">Duplicate Request</option>
                                        <option value="Inaccurate Request">Inaccurate Request</option>
                                        <option value="Non-Compliance with Barangay Rules">Non-Compliance with Barangay Rules</option>
                                        <option value="Payment Issues">Payment Issues</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Buttons -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" onclick="submitRejectForm()">Reject</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- END OF REJECT --}}

        {{-- edit clearance --}}
        <div class="modal fade" id="editExtralargeModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">View Requester</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
                        <div class="d-flex">
                            <form class="edit_certificate" id="edit_certificate">
                                @csrf
                                <input type="text" class="form-control" id="edit_id" name="edit_id" readonly>
                                  <div class="row g-3">
                                    <div class="col-md-12">
                                      <label for="edit_tcode4" class="form-label">Transaction Code</label>
                                      <input type="text" class="form-control" id="edit_tcode4" name="edit_tcode4" readonly>
                                      <span class="text-danger error-text tcode4_error"></span>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="edit_Purpose4">Purpose</label>
                                        <input type="text" class="form-control" name="edit_Purpose4" id="edit_Purpose4">
                                        <span class="text-danger error-text edit_Purpose4_error"></span>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="edit_dIssued4">Date Issued</label>
                                        <input type="text" class="form-control" name="edit_dIssued4" id="edit_dIssued4">
                                        <span class="text-danger error-text edit_dIssued4_error"></span>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="edit_pickUp4">Pick Up Date</label>
                                        <input type="date" class="form-control" name="edit_pickUp4" id="edit_pickUp4">
                                        <span class="text-danger error-text edit_pickUp4_error"></span>
                                    </div>
                                </div>  
                                </div>
                                <div class="alertCon">
                                  <div id="alert-container4"></div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- END OF edit clearance --}}

        {{-- FOR WALK-IN --}}
        <div class="modal fade" id="certificateModal" tabindex="-1" aria-labelledby="certificateModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="certificateModalLabel">BARANGAY CLEARANCE</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeCertificateForm()"></button>
                </div>
            
                <!-- Modal Body -->
                <div class="modal-body">
                    <form method="POST" action="{{ route('regValidation.saveBrgyClearance')}}" class="certificate" id="certificate">
                        @csrf
                        <div class="modal-body">
                          <div class="row g-3">
                            <div class="col-md-6">
                              <label for="tcode1" class="form-label">Transaction Code</label>
                              <input type="text" class="form-control" id="tcode1" name="tcode1" readonly>
                              <span class="text-danger error-text tcode1_error"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="fName1" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="fName1" name="fName1">
                                <span class="text-danger error-text fName1_error"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="mName1" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" id="mName1" name="mName1">
                                <span class="text-danger error-text mName1_error"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="lName1" class="form-label">Family Name</label>
                                <input type="text" class="form-control" id="lName1" name="lName1">
                                <span class="text-danger error-text lName1_error"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="suffix1" class="form-label">Suffix (Leave It If None)</label>
                                <select name="suffix1" id="suffix1"  class="form-control">
                                    <option value="N/A">N/A</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                    <option value="Jr.">Jr.</option>
                                    <option value="Sr.">Sr.</option>
                                </select>
                                <span class="text-danger error-text suffix1_error"></span>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="bDate1" class="form-label">Birth Date</label>
                                <input type="date" class="form-control" id="bDate1" name="bDate1">
                                <span class="text-danger error-text bDate1_error"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="clearancePurpose" class="form-label">Purpose</label>
                                <input type="text" class="form-control" id="clearancePurpose" name="clearancePurpose">
                                <span class="text-danger error-text clearancePurpose_error"></span>
                            </div>
            
                            <div class="col-md-6">
                                <label for="dateIssued1" class="form-label">Date Issued</label>
                                <input type="date" class="form-control" id="dateIssued1" name="dateIssued1" readonly>
                                <span class="text-danger error-text dateIssued1_error"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="pickUp1" class="form-label">Pick Up Date</label>
                                <input type="date" class="form-control" id="pickUp1" name="pickUp1">
                                <span class="text-danger error-text pickUp1_error"></span>
                            </div>
                          </div>
                        </div>
                        <div class="alertCon">
                          <div id="alert-container"></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
        {{-- END OF FOR WALK-IN --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    @include('layouts.footerSecretary')
    <script>
    $(document).ready(function() {
        // Initialize DataTable with striped rows (default)
        var table = $('#example').DataTable({
            stripeClasses: ['even', 'odd'], // Optional: applies even/odd classes for striped rows
            order: [[6, 'desc']],  // Order by the 'created_at' column (index 4) in descending order
        });

        // Apply the default "Pending" filter on the status column
        table.column(4) // Assuming the 'Status' column is the 6th column (index 5)
            .search($('#status-filter').val())
            .draw();

        // Update filter when the select option changes
        $('#status-filter').on('change', function() {
            table.column(4)
                .search(this.value)
                .draw();
        });
    });

    function openViewModal(id) {
        $.ajax({
            url: `/clearance/${id}`,
            method: 'GET',
            success: function(response) {
                console.log(response);  // Log the response to verify structure

                if (response.status === 1) {
                    const residentData = response.data.resident;  // Access the 'resident' object
                    const certDate = response.data;

                    $('#edit_Transaction').val(certDate.bcl_transactionCode);
                    $('#edit_Purpose').val(certDate.bcl_purpose);
                    $('#edit_dIssued').val(certDate.bcl_dateIssued);
                    $('#edit_pickUp').val(certDate.bcl_pickUpDate);

                    // Populate the modal fields with the resident data
                    $('#e_id').val(residentData.res_id);
                    $('#edit_household').val(residentData.res_household);
                    $('#edit_dateRegister').val(residentData.res_dateReg);
                    $('#edit_fname').val(residentData.res_fname);
                    $('#edit_mname').val(residentData.res_mname);
                    $('#edit_lname').val(residentData.res_lname);
                    $('#edit_suffix').val(residentData.res_suffix);
                    $('#edit_bPlace').val(residentData.res_bplace);
                    $('#edit_bDate').val(residentData.res_bdate);
                    $('#edit_sex').val(residentData.res_sex);
                    $('#edit_education').val(residentData.res_educ);  // might be null
                    $('#edit_religion').val(residentData.res_religion);  // might be null
                    $('#edit_civilStatus').val(residentData.res_civil);
                    $('#edit_voters').val(residentData.res_voters);
                    $('#edit_email').val(residentData.res_email);
                    $('#edit_contact').val(residentData.res_contact);
                    $('#edit_otherContact').val(residentData.res_otherContact);  // might be null
                    $('#edit_tempAddress').val(residentData.res_tempAddress);  // might be null
                    $('#edit_address').val(residentData.res_address);
                    $('#edit_sitio').val(residentData.res_sitio);
                    $('#edit_purok').val(residentData.res_purok);
                    $('#edit_citizens').val(residentData.res_citizen);
                    $('#edit_occupation').val(residentData.res_occupation);
                    $('#edit_person').val(residentData.res_personStatus);
                    $('#edit_living').val(residentData.res_status);
                    $('#edit_national').val(residentData.res_nationalId);
                    const profileImageUrl = residentData.res_picture ? `/storage/${residentData.res_picture}` : '/storage/profilePictures/profilePlaceholder.jpg'; 
                    $('#edit_profilePreview').attr('src', profileImageUrl);
                    // Open the modal
                    $('#viewExtralargeModal').modal('show');
                } else {
                    alert('Record not found');
                }
            },
            error: function() {
                alert('Failed to fetch data');
            }
        });
    }

    function openEditModal(id) {
        $.ajax({
            url: `/clearance/${id}`,
            method: 'GET',
            success: function(response) {
                console.log(response);  // Log the response to verify structure

                if (response.status === 1) {
                    const residentData = response.data.resident;  // Access the 'resident' object
                    const certData = response.data;

                    
                    $('#edit_id').val(certData.bcl_id);
                    $('#edit_tcode4').val(certData.bcl_transactionCode);
                    $('#edit_Purpose4').val(certData.bcl_purpose);
                    $('#edit_dIssued4').val(certData.bcl_dateIssued);
                    $('#edit_pickUp4').val(certData.bcl_pickUpDate);

                   
                    // Open the modal
                    $('#editExtralargeModal').modal('show');
                } else {
                    alert('Record not found');
                }
            },
            error: function() {
                alert('Failed to fetch data');
            }
        });
    }

    //uPDATE
    $(document).on('submit', '#edit_certificate', function (e) {
        e.preventDefault(); // Prevent default form submission behavior

        var id = $('#edit_id').val(); // Assuming the ID is based on the selected resident's full name

        // Create a FormData object with the form fields
        var formData = new FormData();
        formData.append('edit_tcode4', $('#edit_tcode4').val());
        formData.append('edit_Purpose4', $('#edit_Purpose4').val());
        formData.append('edit_dIssued4', $('#edit_dIssued4').val());
        formData.append('edit_pickUp4', $('#edit_pickUp4').val());
        // Send the AJAX request
        $.ajax({
        type: "POST",
        url: "/update-bcl/" + id, // URL to handle the update
        data: formData,
        dataType: "json",
        contentType: false, // Needed for FormData
        processData: false, // Needed for FormData
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
        },
        success: function(response) {
            // Clear any existing error messages
            $('span.error-text').text('');

            if (response.status === 400) {
                // Validation error, display errors for each field
                $.each(response.errors, function(field, errors) {
                    // Log error field and message for debugging
                    console.log('Error for field ' + field + ':', errors);
                    // Update the corresponding error span for the field
                    $('span.' + field + '_error').text(errors[0]);
                });
            } else if (response.status === 404) {
                // Resident not found
                $('#alert-container4').html(`
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle me-1"></i> Resident Not Found.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `);
            } else {
                // Success, show success message
                $('#alert-container4').html(`
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i> Resident record updated successfully!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `);
                $('#editExtralargeModal').modal('hide');
                location.reload(); // Reload the page to reflect changes
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText); // Log error response for debugging
            alert("An error occurred. Please check the console for more details.");
        }
        });
    });

    function showRejectForm(certificateId) {
        $('#certificateId').val(certificateId);
        $('#rejectModal').modal('show');
    }

    function submitRejectForm() {
        const certId = document.getElementById('certificateId').value;
        const rejectReason = document.getElementById('rejectReason').value;

        fetch('/reject-clearance', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                id: certId,
                status: 'rejected',
                reason: rejectReason
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                alert('Certificate status updated to rejected');
                location.reload();
            } else {
                alert('Failed to update certificate status');
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function updateBclStatus(certId, newStatus) 
    {
        fetch('/update-bcl-status', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Ensure you include the CSRF token for security
            },
            body: JSON.stringify({
                id: certId,
                status: newStatus
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Clearance status updated successfully');
                location.reload(); // Optionally, reload the page to reflect the changes
            } else {
                alert('Failed to update Clearance status');
            }
        })
        .catch(error => console.error('Error:', error));
    }

    window.redirectToPurpose = function(purposeId) 
    {
        const url = `/dashboards/secretariesDb/brgyClearance?id=${purposeId}`;
        window.location.href = url;
    };


    function generateTrackingCode() {
        var code = '';
        for (var i = 0; i < 6; i++) {
            // Generate 3 random letters
            var letters = String.fromCharCode(Math.floor(Math.random() * 26) + 65) +
                        String.fromCharCode(Math.floor(Math.random() * 26) + 65) +
                        String.fromCharCode(Math.floor(Math.random() * 26) + 65);
            // Generate 2 random numbers
            var numbers = ('0' + Math.floor(Math.random() * 100)).slice(-2);
            // Concatenate letters, numbers, and hyphen
            code += letters + numbers + '-';
        }
        // Remove the last hyphen
        code = code.slice(0, -1);
        // Convert code to uppercase
        code = code.toUpperCase();
        return code;
    }

    document.getElementById('tcode1').value = generateTrackingCode();


    function setCurrentDate() {
        var currentDate = new Date().toISOString().slice(0, 10);
        document.getElementById('dateIssued1').value = currentDate;
        document.getElementById('pickUp1').value = currentDate;

    }

    window.onload = function() {
        setCurrentDate();
        document.getElementById('tcode1').value = generateTrackingCode();
        document.getElementById('tcode2').value = generateTrackingCode();
        document.getElementById('tcode3').value = generateTrackingCode();
    };



    //FOR CERTIFICATE TABLE
    $(function(){      
        $("#certificate").on('submit', function(e){
            e.preventDefault();

            $.ajax({
                url:$(this).attr('action'),
                method:$(this).attr('method'),
                data:new FormData(this),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(document).find('span.error-text').text('');
                },
                success:function(data){
                    if(data.status == 0){
                        $.each(data.error, function(prefix, val){
                            $('span.'+prefix+'_error').text(val[0]);
                        });
                    }else{
                        $('#certificate')[0].reset();
                        alert(data.msg);
                    }
                }
            });
        });
    });
    
    
    function sendEmail(email, firstName, lastName) {
                console.log("Email:", email);
                console.log("First Name:", firstName);
                console.log("Last Name:", lastName);

                var subject = encodeURIComponent("Request/Issuance Ready for Pick Up");
                var body = encodeURIComponent(`Good Day! ${firstName} ${lastName},\n\nThis is Barangay Ward II. We would like you to know that your request or issuance has been printed and is ready to pick up anytime within your pick up date you input. Please prepare 25 pesos as you get it here.\n\nThank you. \n\n\n PLEASE DO NOT REPLY!`);

                var mailtoUrl = `https://mail.google.com/mail/?view=cm&fs=1&to=${encodeURIComponent(email)}&su=${subject}&body=${body}`;

                window.open(mailtoUrl, '_blank');
            }
   </script>
    
</body>

