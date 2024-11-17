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
                <h1>BUSINESS PERMIT ISSUANCE</h1>
                <div class="btnArea">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#certificateModal">Add Permit</button> 
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
                        <option value="cancelled">Cancelled</option>
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
                                <th>Business Name</th>
                                <th>Business Address</th>
                                <th>Pick Up Date</th>
                                <th>Status</th>
                                <th style="display: none;"></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permits as $permit)
                                @php
                                    // Calculate age
                                    $birthdate = \Carbon\Carbon::parse($permit->res_bdate);
                                    $age = $birthdate->age;
                                    // Concatenate full name
                                    $fullName = $permit->res_fname . ' ' . $permit->res_mname . ' ' . $permit->res_lname;
                                    if ($permit->res_suffix !== 'N/A') {
                                        $fullName .= ' ' . $permit->res_suffix;
                                    }
                                @endphp
                                <tr>
                                    <td>{{ $permit->id }}</td>
                                    <td>{{ $fullName }}</td>
                                    <td>{{ $age }}</td>
                                    <td>{{ $permit->res_purok }}</td>
                                    <td>{{ $permit->bc_businessName }}</td>
                                    <td>{{ $permit->bc_businessAddress}}</td>
                                    <td>{{ $permit->bc_pickUpDate}}</td>
                                    <td>{{ $permit->bc_status}}</td>
                                    <td style="display: none;">{{ $permit->created_at }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <button type="button" class="dropdown-item" onclick="openViewModal({{ $permit->id }})">View</button>

                                                @if($permit->bc_status === 'pending')
                                                    <!-- Actions for 'pending' status -->
                                                    <button type="button" class="dropdown-item" onclick="redirectToPurpose({{ $permit->id }})">Print</button>
                                                    <button type="button" class="dropdown-item" onclick="showRejectForm({{ $permit->id }})">Reject</button>
                                                    <button type="button" class="dropdown-item" onclick="updateBusiStatus({{ $permit->id }}, 'archive')">Archive</button>
                                                @elseif($permit->bc_status === 'processed')
                                                    <!-- Actions for 'processed' status -->
                                                    <button type="button" class="dropdown-item" onclick="redirectToPurpose({{ $permit->id }})">Print</button>
                                                    <button type="button" class="dropdown-item" onclick="updateBusiStatus({{ $permit->id }}, 'ready to pick up')">Ready</button>
                                                    <button type="button" class="dropdown-item" onclick="updateBusiStatus({{ $permit->id }}, 'archive')">Archive</button>
                                                @elseif($permit->bc_status === 'ready to pick up')
                                                    <!-- Actions for 'ready to pick up' status -->
                                                    <button type="button" class="dropdown-item" onclick="redirectToPurpose({{ $permit->id }})">Print</button>
                                                    <button type="button" class="dropdown-item btnview" onclick="sendEmail('{{ $permit->res_email }}', '{{ $permit->res_fname }}', '{{ $permit->res_lname }}')">Send Email</button>
                                                    <button type="button" class="dropdown-item" onclick="updateBusiStatus({{ $permit->id }}, 'completed')">Completed</button>
                                                    <button type="button" class="dropdown-item" onclick="updateBusiStatus({{ $permit->id }}, 'archive')">Archive</button>
                                                @elseif($permit->bc_status === 'rejected')
                                                    <!-- Actions for 'rejected' status -->
                                                    <button type="button" class="dropdown-item" onclick="updateBusiStatus({{ $permit->id }}, 'archive')">Archive</button>
                                                @elseif($permit->bc_status === 'cancelled')
                                                    <!-- Actions for 'completed' status -->
                                                    <button type="button" class="dropdown-item" onclick="updateBusiStatus({{ $permit->id }}, 'archive')">Archive</button>
                                                @elseif($permit->bc_status === 'completed')
                                                    <!-- Actions for 'completed' status -->
                                                    <button type="button" class="dropdown-item" onclick="updateBusiStatus({{ $permit->id }}, 'archive')">Archive</button>
                                                @elseif(strtolower(trim($permit->bc_status)) === 'archive')
                                                    <!-- Actions for 'archived' status -->
                                                    <button type="button" class="dropdown-item" onclick="updateBusiStatus({{ $permit->id }}, 'pending')">Pending</button>
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
   
        {{-- VIEW Blotter --}}
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
                                    <div class="col-md-12">
                                        <label for="edit_Type1">Transaction Code</label>
                                        <input type="text" class="form-control" name="edit_Type1" id="edit_Type1" readonly>
                                        <span class="text-danger error-text edit_Type1_error"></span>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="edit_business">Business Name</label>
                                        <input type="text" class="form-control" name="edit_business" id="edit_business">
                                        <span class="text-danger error-text edit_business_error"></span>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="edit_Type">Type of Business</label>
                                        <input type="text" class="form-control" name="edit_Type" id="edit_Type" readonly>
                                        <span class="text-danger error-text edit_Type_error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_dIssued">Date Issued</label>
                                        <input type="date" class="form-control" name="edit_dIssued" id="edit_dIssued" readonly>
                                        <span class="text-danger error-text edit_dIssued_error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_pickUp">Pick up Date</label>
                                        <input type="date" class="form-control" name="edit_pickUp" id="edit_pickUp" readonly>
                                        <span class="text-danger error-text edit_pickUp_error"></span>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="edit_busiAdd">Business Address</label>
                                        <input type="text" class="form-control" name="edit_busiAdd" id="edit_busiAdd" readonly>
                                        <span class="text-danger error-text edit_busiAdd_error"></span>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="edit_nature">Nature of Business</label>
                                        <input type="text" class="form-control" name="edit_nature" id="edit_nature" readonly>
                                        <span class="text-danger error-text edit_nature_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- END OF VIEW Blotter --}}

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

        {{-- FOR WALK-IN --}}
        <div class="modal fade" id="certificateModal" tabindex="-1" aria-labelledby="certificateModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="certificateModalLabel">Business Permit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeCertificateForm()"></button>
                </div>
            
                <!-- Modal Body -->
                <div class="modal-body">
                    <form method="POST" action="{{ route('regValidation.saveBusinessClearance')}}" class="brgyClearance" id="brgy_clearance">
                        @csrf 
                          <div class="row g-3">
                            <div class="col-md-6">
                                <label for="tcode2" class="form-label">Transaction Code</label>
                                <input type="text" class="form-control" id="tcode2" name="tcode2" readonly>
                                <span class="text-danger error-text tcode2_error"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="fName2" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="fName2" name="fName2">
                                <span class="text-danger error-text fName2_error"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="mName2" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" id="mName2" name="mName2">
                                <span class="text-danger error-text mName2_error"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="lName2" class="form-label">Family Name</label>
                                <input type="text" class="form-control" id="lName2" name="lName2">
                                <span class="text-danger error-text lName2_error"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="suffix2" class="form-label">Suffix (Leave It If None)</label>
                                <select name="suffix2" id="suffix2" class="form-control">
                                    <option value="N/A">N/A</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                    <option value="Jr.">Jr.</option>
                                    <option value="Sr.">Sr.</option>
                                </select>
                                <span class="text-danger error-text suffix2_error"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="bDate2" class="form-label">Birth Date</label>
                                <input type="date" class="form-control" id="bDate2" name="bDate2">
                                <span class="text-danger error-text bDate2_error"></span>
                            </div>
                            <div class="col-md-6">
                              <label for="businessName" class="form-label">Business Name</label>
                              <input type="text" class="form-control" id="businessName" name="businessName">
                              <span class="text-danger error-text businessName_error"></span>
                            </div>
            
                            <div class="col-md-6">
                                <label for="businessAddress" class="form-label">Business Address</label>
                                <input type="text" class="form-control" id="businessAddress" name="businessAddress">
                                <span class="text-danger error-text businessAddress_error"></span>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="businessType" class="form-label">Type of Business</label>
                                <input type="text" class="form-control" id="businessType" name="businessType">
                                <span class="text-danger error-text businessType_error"></span>
                            </div>
            
                            <div class="col-md-6">
                                <label for="dateIssued2" class="form-label">Date Issued</label>
                                <input type="date" class="form-control" id="dateIssued2" name="dateIssued2" readonly>
                                <span class="text-danger error-text dateIssued2_error"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="pickUp2" class="form-label">Pick Up Date</label>
                                <input type="date" class="form-control" id="pickUp2" name="pickUp2">
                                <span class="text-danger error-text pickUp2_error"></span>
                            </div>
                            <div class="col-md-6">
                              <label for="businessNature" class="form-label">Nature of Business Activities</label>
                              <textarea name="businessNature" id="businessNature" class="form-control"></textarea>
                              <span class="text-danger error-text businessNature_error"></span>
                            </div>
                          </div>
                          <div class="alertCon">
                            <div id="alert-container1"></div>
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
                order: [[8, 'desc']],  // Order by the 'created_at' column (index 4) in descending order
            });

            // Apply the default "Pending" filter on the status column
            table.column(7) // Assuming the 'Status' column is the 6th column (index 5)
                .search($('#status-filter').val())
                .draw();

            // Update filter when the select option changes
            $('#status-filter').on('change', function() {
                table.column(7)
                    .search(this.value)
                    .draw();
            });
        });

        function openViewModal(id) {
            $.ajax({
                url: `/permit/${id}`,
                method: 'GET',
                success: function(response) {
                    console.log(response);  // Log the response to verify structure

                    if (response.status === 1) {
                        const residentData = response.data.resident;  // Access the 'resident' object
                        const certDate = response.data;
                        
                        $('#edit_Type1').val(certDate.bc_transactionCode);
                        $('#edit_business').val(certDate.bc_businessName);
                        $('#edit_busiAdd').val(certDate.bc_businessAddress);
                        $('#edit_Type').val(certDate.bc_businessType);
                        $('#edit_dIssued').val(certDate.bc_dateIssued);
                        $('#edit_pickUp').val(certDate.bc_pickUpDate);
                        $('#edit_nature').val(certDate.bc_businessNature);

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

        function showRejectForm(certificateId) 
        {
            $('#certificateId').val(certificateId);
            $('#rejectModal').modal('show');
        }


        function submitRejectForm() {
            const certId = document.getElementById('certificateId').value;
            const rejectReason = document.getElementById('rejectReason').value;

            fetch('/reject-business', {
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

        function updateBusiStatus(certId, newStatus) 
        {
            fetch('/update-bc-status', {
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
                    alert('Permit status updated successfully');
                    location.reload(); // Optionally, reload the page to reflect the changes
                } else {
                    alert('Failed to update permit status');
                }
            })
            .catch(error => console.error('Error:', error));
        }

        
        window.redirectToPurpose = function(purposeId) 
        {
            const url = `/dashboards/secretariesDb/businessClearance?id=${purposeId}`;
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

        // Set the generated tracking code to the input field
        document.getElementById('tcode2').value = generateTrackingCode();


        function setCurrentDate() {
            var currentDate = new Date().toISOString().slice(0, 10);
            document.getElementById('dateIssued2').value = currentDate;
            document.getElementById('pickUp2').value = currentDate;
        }

        // Set current date and tracking code when the page loads
        window.onload = function() {
            setCurrentDate();
            document.getElementById('tcode2').value = generateTrackingCode();
        };

        //FOR BUSINESS BARANGAY CLEARANCE TABLE
        $(function(){      
            $("#brgy_clearance").on('submit', function(e){
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
                            $('#brgy_clearance')[0].reset();
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
            var body = encodeURIComponent(`Good Day! ${firstName} ${lastName},\n\nThis is Barangay Ward II. We would like you to know that your request or issuance has been printed and is ready to pick up anytime within your pick up date you input. Please prepare 30 pesos as you get it here.\n\nThank you. \n\n\n PLEASE DO NOT REPLY!`);

            var mailtoUrl = `https://mail.google.com/mail/?view=cm&fs=1&to=${encodeURIComponent(email)}&su=${subject}&body=${body}`;

            window.open(mailtoUrl, '_blank');
        }
    </script>
    
</body>

