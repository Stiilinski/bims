@include('layouts.headSecretary')
<style>
    .card-body {
        overflow: auto;
    }
    
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

    /* Dropdown container */
    .profNameCon {
        position: relative;
    }

    /* Dropdown button */
    .dropbtn {
        background-color: transparent;
        color: black;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    /* Dropdown content (hidden by default) */
    .dropdown-content {
        display: none;
        flex-direction: column;
        position: absolute;
        right: 15px;
        top: 40px;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: flex;
        height: 100%;
        
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    /* Show the dropdown menu when hovering over the dropdown container */
    .profNameCon:hover .dropdown-content {
        display: block;
    }

    .avatar, .edit_profilePreview {
        width: 350px;
        height: 300px;
        overflow: hidden; /* Ensures the image stays within the boundaries */
        position: relative;
        border-radius: 10px;
    }

    .avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensures the image covers the entire 350x350 box without distortion */
    }
    
    .edit_profilePreview img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensures the image covers the entire 350x350 box without distortion */
    }

    .row {
        padding: 10px;
    }
</style>

<body>
    @include('layouts.headerSecretary')

    @include('layouts.sidebarSecretary')



    <main class="main" id="main">
        <div class="pagetitle">
            <h1>Resident</h1>
            <div class="btnArea">
                <a href="{{ route('export.residents') }}" class="btn btn-primary">
                    Export
                </a>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal">Import</button>  
                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">Add Resident</button>  
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Age</th>
                            <th>Civil Status</th>
                            <th>Sex</th>
                            <th>Voters Status</th>
                            <th>Purok</th>
                            <th>Action</th>
                            <th style="display: none;">Id</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($residents as $index => $resident)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname != 'N/A' ? substr($resident->res_mname, 0, 1) . '.' : '' }} {{ $resident->res_suffix == 'N/A' ? '' : $resident->res_suffix }}</td>
                            <td>{{ app('App\Http\Controllers\regValidation')->calculateAges($resident->res_bdate) }}</td>
                            <td>{{ $resident->res_civil }}</td>
                            <td>{{ $resident->res_sex }}</td>
                            <td>{{ $resident->res_voters }}</td>
                            <td>{{ $resident->res_purok }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <form action="{{ action('App\Http\Controllers\regValidation@dbviewResident') }}" method="GET">
                                            <input type="hidden" name="res_id" value="{{ $resident->res_id }}">
                                            <li><button type="submit" class="dropdown-item">View</button></li>
                                        </form>
                                        <li><button class="dropdown-item" type="button" onclick="openEditModal({{ $resident->res_id }})">Edit</button></li>  {{--adjusted--}}
                                    </ul>
                                </div>
                            </td>
                            <td style="display: none;">{{ $resident->res_id  }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- REGISTER RESIDENT --}}
        <div class="modal fade" id="ExtralargeModal" tabindex="-1">
            <div class="modal-dialog custom-modal-width">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Register Resident</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
                        <form class="mainForm" method="POST" action="{{ route('regValidation.saveResidents')}}" id="mainForm" autocomplete="off" enctype="multipart/form-data">
                            @csrf          
                            <div class="d-flex">
                                <div class="row g-3">    
                                    <div class="avatarcon">
                                        <img id="profilePreview" src="/storage/profilePictures/profilePlaceholder.jpg" class="avatar" alt="Profile Image">
                    
                                        <div class="col-md-12">
                                            <label for="profile" class="form-label1">Profile Picture</label>
                                            <input type="file" class="form-control" id="profile" name="profile" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                                            <span class="text-danger error-text profile_error"></span>
                                        </div>  
                                        
                                        <div class="col-md-12">
                                            <label for="household" class="form-label1">Household Number</label>
                                            <input type="text" class="form-control" id="household" name="household">
                                            <span class="text-danger error-text household_error"></span>
                                        </div> 
        
                                        <div class="col-md-12">
                                            <label for="dateRegister" class="form-label1">Date Registered</label>
                                            <input type="Date" class="form-control" id="dateRegister" name="dateRegister">
                                            <span class="text-danger error-text dateRegister_error"></span>
                                        </div> 

                                        <div class="col-md-12">
                                            <label for="national" class="form-label1">National ID</label>
                                            <input type="text" class="form-control" id="national" name="national">
                                            <span class="text-danger error-text national_error"></span>
                                        </div> 
                                    </div>
                                </div>
                                
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control" name="firstName" id="fname" placeholder="Enter Firstname">
                                        <span class="text-danger error-text firstName_error"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="mname">Middle Name</label>
                                        <input type="text" class="form-control" name="middleName" id="mname" placeholder="Enter Middlename">
                                        <span class="text-danger error-text middleName_error"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="lname">Last Name</label>
                                        <input type="text" class="form-control" name="lastName" id="lname" placeholder="Enter Lastname">
                                        <span class="text-danger error-text lastName_error"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="suffix">Suffix</label>
                                        <select id="suffix" class="form-select" name="suffix">
                                            <option value="N/A">N/A</option>
                                            <option value="I">I</option>
                                            <option value="II">II</option>
                                            <option value="III">III</option>
                                            <option value="IV">IV</option>
                                            <option value="V">V</option>
                                            <option value="Jr.">Jr.</option>
                                            <option value="Sr.">Sr.</option>
                                        </select>
                                        <span class="text-danger error-text suffix_error"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="bPlace">Place of Birth</label>
                                        <input type="text" class="form-control" name="birthPlace" id="bPlace" placeholder="Enter Birth Place">
                                        <span class="text-danger error-text birthPlace_error"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="bDate">Birth Date</label>
                                        <input type="date" class="form-control" name="birthDate" id="bDate" placeholder="Enter Birth Date">
                                        <span class="text-danger error-text birthDate_error"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="age">Age</label>
                                        <input type="text" class="form-control" name="age" id="age" placeholder="Enter Age" readonly>
                                        <span class="text-danger error-text age_error"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="sex">Sex</label>
                                        <select id="sex" class="form-select" name="sex">
                                            <option value="" disabled selected>Select Sex</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <span class="text-danger error-text sex_error"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="education">Educational Attainment</label> 
                                        <select id="education" class="form-select" name="education">
                                            <option value="" disabled selected>Select Educational Attainment</option>
                                            <option value="N/A">N/A</option>
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
                                        <span class="text-danger error-text education_error"></span>
                                    </div>                                    
                                    <div class="col-md-3">
                                        <label for="religion">Religion</label>
                                        <input type="text" class="form-control" name="religion" id="religion" placeholder="Enter Religion">
                                        <span class="text-danger error-text religion_error"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="civilStatus">Civil Status</label>
                                        <select id="civilStatus" class="form-select" name="civilStatus">
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Annulled">Annulled</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                        <span class="text-danger error-text civilStatus_error"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="voters">Voters Status</label>
                                        <select id="voters" class="form-select" name="voters">
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <span class="text-danger error-text voters_error"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="email">Email Address</label>
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email">
                                        <span class="text-danger error-text email_error"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="contact">Contact Number</label>
                                        <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter contact">
                                        <span class="text-danger error-text contact_error"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="otherContact">Other Contact</label>
                                        <input type="text" class="form-control" name="otherContact" id="otherContact" placeholder="Enter contact">
                                        <span class="text-danger error-text otherContact_error"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="tempAddress">Temporary Address</label>
                                        <input type="text" class="form-control" name="tempAddress" id="tempAddress" placeholder="Enter address">
                                        <span class="text-danger error-text tempAddress_error"></span>
                                    </div> 
                                    <div class="col-md-3">
                                        <label for="address">Permanent Address</label>
                                        <input type="text" class="form-control" name="address" id="address" placeholder="Enter address">
                                        <span class="text-danger error-text address_error"></span>
                                    </div>       
                                    <div class="col-md-3">
                                        <label for="sitio">Sitio</label>
                                        <select id="sitio" class="form-select" name="sitio">
                                            <option value="" disabled selected>Select Sitio</option>
                                            <option value="Larrobis">Larrobis</option>
                                            <option value="Premier">Premier</option>
                                            <option value="Ompot">Ompot</option>
                                            <option value="Riles 1">Riles 1</option>
                                            <option value="Riles 2">Riles 2</option>
                                            <option value="Aleman">Aleman</option>
                                            <option value="San Vicente">San Vicente</option>
                                        </select>
                                        <span class="text-danger error-text sitio_error"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="purok">Purok</label>
                                        <select id="purok" class="form-select" name="purok">
                                            <option value="" disabled selected>Select Purok</option>
                                            <option value="Tugas">Tugas</option>
                                            <option value="Tambis">Tambis</option>
                                            <option value="Mahogany">Mahogany</option>
                                            <option value="Guyabano">Guyabano</option>
                                            <option value="Mansinitas">Mansinitas</option>
                                            <option value="Ipil-ipil">Ipil-ipil</option>
                                            <option value="Lubi">Lubi</option>
                                        </select>
                                        <span class="text-danger error-text purok_error"></span>
                                    </div>                                            
                                    <div class="col-md-3">
                                        <label for="citizens">Citizenship</label>
                                        <input type="text" class="form-control" name="citizens" id="citizens" placeholder="Enter citizen">
                                        <span class="text-danger error-text citizens_error"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="occupation">Occupation (IF NONE PUT N/A)</label>
                                        <input type="text" class="form-control" name="occupation" id="occupation" placeholder="Enter occupation">
                                        <span class="text-danger error-text occupation_error"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="person">Person Status</label>
                                        <select id="person" class="form-select" name="person">
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="Alive">Alive</option>
                                            <option value="Deceased">Deceased</option>
                                        </select>
                                        <span class="text-danger error-text person_error"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="living">Living Status</label>
                                        <select id="living" class="form-select" name="living">
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="active">Active</option>
                                            <option value="archive">Archive</option>
                                        </select>
                                        <span class="text-danger error-text living_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="alertCon">
                                <div id="alert-container"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary">Clear</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- END OF REGISTER RESIDENT --}}

        {{-- EDIT RESIDENT --}}
        <div class="modal fade" id="editModalRes" tabindex="-1">
            <div class="modal-dialog custom-modal-width">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Resident</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
                        <form class="e_mainForm" id="e_mainForm" autocomplete="off" enctype="multipart/form-data">
                            @csrf         
                            <input type="hidden" name="e_id" id="e_id"> 
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
                                            <input type="text" class="form-control" id="edit_household" name="edit_household">
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
                                            <option value="N/A">N/A</option>
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
                                    <div class="col-md-3" style="display: none;">
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
                                            <option value="N/A">N/A</option>
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
                                        <input type="text" class="form-control" name="edit_religion" id="edit_religion" placeholder="Enter Religion">
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
                            <div class="alertCon">
                                <div id="alert-container3"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- END OF EDIT RESIDENT --}}

        {{-- CSV/EXCEL --}}
        <div class="modal fade" id="Modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Import CSV/Excel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('import.residents') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body"> 
                            <div class="mb-3">
                                <label for="file" class="form-label">Choose Excel File</label>
                                <input type="file" name="file" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary">Clear</button>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- END OF CSV/EXCEL --}}
    </main>

   

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        // DISPLAY PICTURE
            document.getElementById('profile').addEventListener('change', function() {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        document.getElementById('profilePreview').src = event.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
            document.getElementById('edit_profile').addEventListener('change', function() {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        document.getElementById('edit_profilePreview').src = event.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
            

        // DISPLAY AGE
                document.getElementById('bDate').addEventListener('change', function() {
                    var dob = new Date(this.value); // Birth date
                    var today = new Date(); // Current date

                    // Calculate the age
                    var age = today.getFullYear() - dob.getFullYear();
                    var monthDiff = today.getMonth() - dob.getMonth();
                    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                        age--;
                    }
                    
                    // Update the age input field
                    document.getElementById('age').value = age;
                });




        // CRUD
            //iNSERT
                $(document).ready(function() {
                    $("#mainForm").on('submit', function(e) {
                        e.preventDefault(); // Prevent default form submission
                        console.log("Form submit prevented");

                        // Send form data using AJAX
                        $.ajax({
                            url: $(this).attr('action'), // Get the action attribute for the form
                            method: $(this).attr('method'), // Get the method (usually POST)
                            data: new FormData(this), // Collect form data, including files
                            processData: false, // Don't process data, it's already in FormData
                            dataType: 'json', // Expecting JSON response
                            contentType: false, // Let FormData set content type
                            beforeSend: function() {
                                // Clear any previous error messages before sending
                                $(document).find('span.error-text').text('');
                            },
                            success: function(data) {
                                console.log("Response from server:", data); // Log the response

                                if (data.status == 0) {
                                    // If validation fails, display error messages
                                    $.each(data.error, function(prefix, val) {
                                        console.log('Error for field ' + prefix + ':', val);
                                        $('span.' + prefix + '_error').text(val[0]); // Display validation error
                                    });
                                } else {
                                    // On success, show a success message
                                    $('#mainForm')[0].reset(); // Reset form
                                    const alertHtml = `
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <i class="bi bi-check-circle me-1"></i>
                                            ${data.msg}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>`;
                                    $('#alert-container').append(alertHtml);
                                    setTimeout(() => {
                                        $('.alert').alert('close'); // Close alert after 1 second
                                    }, 1000);
                                    setTimeout(() => {
                                        location.reload(); 
                                    }, 2000);
                                }
                            },
                            error: function(xhr) {
                                // Handle AJAX error (e.g., server failure)
                                const alertHtml = `
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-circle me-1"></i>
                                        Failed to add Resident. Please try again.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>`;
                                $('#alert-container').append(alertHtml);
                                setTimeout(() => {
                                    $('.alert').alert('close');
                                }, 3000);
                            }
                        });
                    });
                });

            //dISPLAY
                function openEditModal(id) {
                    $.ajax({
                        url: `/edit-resident/${id}`,
                        method: 'GET',
                        success: function(response) {
                            console.log(response);  // Log the response to verify structure

                            if (response.status === 200) {
                                const residentData = response.resident;  // Access the 'resident' object

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
                                $('#editModalRes').modal('show');
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
                $(document).on('submit', '#e_mainForm', function (e) {
                    e.preventDefault(); // Prevent default form submission behavior

                    var id = $('#e_id').val(); // Assuming the ID is based on the selected resident's full name

                    // Create a FormData object with the form fields
                    var formData = new FormData();
                    formData.append('edit_household', $('#edit_household').val());
                    formData.append('edit_dateRegister', $('#edit_dateRegister').val());
                    formData.append('edit_fname', $('#edit_fname').val());
                    formData.append('edit_mname', $('#edit_mname').val());
                    formData.append('edit_lname', $('#edit_lname').val());
                    formData.append('edit_suffix', $('#edit_suffix').val());
                    formData.append('edit_bPlace', $('#edit_bPlace').val());
                    formData.append('edit_bDate', $('#edit_bDate').val());
                    formData.append('edit_age', $('#edit_age').val());
                    formData.append('edit_sex', $('#edit_sex').val());
                    formData.append('edit_education', $('#edit_education').val());
                    formData.append('edit_religion', $('#edit_religion').val());
                    formData.append('edit_civilStatus', $('#edit_civilStatus').val());
                    formData.append('edit_voters', $('#edit_voters').val());
                    formData.append('edit_email', $('#edit_email').val());
                    formData.append('edit_contact', $('#edit_contact').val());
                    formData.append('edit_otherContact', $('#edit_otherContact').val());
                    formData.append('edit_tempAddress', $('#edit_tempAddress').val());
                    formData.append('edit_address', $('#edit_address').val());
                    formData.append('edit_sitio', $('#edit_sitio').val());
                    formData.append('edit_purok', $('#edit_purok').val());
                    formData.append('edit_citizens', $('#edit_citizens').val());
                    formData.append('edit_occupation', $('#edit_occupation').val());
                    formData.append('edit_person', $('#edit_person').val());
                    formData.append('edit_living', $('#edit_living').val());
                    formData.append('edit_national', $('#edit_national').val());
                    
                    var profileFile = $('#edit_profile')[0].files[0];
                    if (profileFile) {
                        formData.append('edit_profile', profileFile);
                    }

                    // Send the AJAX request
                    $.ajax({
                    type: "POST",
                    url: "/update-resident/" + id, // URL to handle the update
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
                            $('#alert-container3').html(`
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-triangle me-1"></i> Resident Not Found.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            `);
                        } else {
                            // Success, show success message
                            $('#alert-container3').html(`
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="bi bi-check-circle me-1"></i> Resident record updated successfully!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            `);
                            $('#editRhuModal').modal('hide');
                            location.reload(); // Reload the page to reflect changes
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Log error response for debugging
                        alert("An error occurred. Please check the console for more details.");
                    }
                    });
                });
    </script>
        @include('layouts.footerSecretary')

</body>

