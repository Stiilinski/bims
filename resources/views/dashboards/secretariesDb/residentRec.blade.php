@extends('layouts.dblayout')

@section('style')
    <link rel="stylesheet" href="/css/dbResRecord.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="container">
    <div class="containerCon">
        <div class="sideBar">
            <div class="sLogoPic">
                <img src="/images/logo.png" class="logo" alt="brgy logo">
                <h2 class="systemName">BIM SYSTEM</h2>
            </div>

            <div class="profNameCon" onclick="toggleDropdown()">
                @if($LoggedUserInfo)
                    <div class="profilePart">
                        <img src="/storage/{{ $LoggedUserInfo['em_picture']}}" class="profilePicEmp" alt="employee profile">
                    </div>

                    <div class="namePart">
                        <h4 class="profName">{{ $LoggedUserInfo['em_fname'] . ' ' . $LoggedUserInfo['em_lname'] }}</h4>
                        <input type="hidden" name="idVal" value="{{ $LoggedUserInfo['em_id']}}">
                        <h5 class="position">{{ $LoggedUserInfo['em_position']}}</h5>
                    </div>

                    <div class="optionPartBtn">
                        <h6>&#9660;</h6>
                    </div>

                    <div class="optionPart dropdown-content" id="dropdownContent">
                        <button type="button" value="{{ $LoggedUserInfo['em_id'] }}" class="changeProf editProfile" onclick='openEditEmpForm(@json($LoggedUserInfo))'>Change Profile</button>
                        <a href="{{ route('regValidation.logout') }}">Logout</a>
                    </div>
                @else
                    <p>You are not logged in.</p>
                @endif
            </div>

            <div class="navBar">
                <a href="{{ action('App\Http\Controllers\regValidation@dashboard') }}"><div class="secDashboard">
                    <button class="btnSecDashboard"><span class="dashb"> <i class='bx bxs-home'></i> Dashboard</span></button>
                </div></a>

                <a href="{{ action('App\Http\Controllers\regValidation@residentsRec') }}"><div class="resRecord">
                    <button class="btnResRecord act"><span class="resR"> <i class='bx bx-group'></i> Resident Record</span></button>
                </div></a>

                <a href="{{ action('App\Http\Controllers\regValidation@barangayCert') }}"><div class="resRecord">
                    <button class="btnResRecord"><span class="resR"> <i class='bx bxs-certification'></i>Certifications</span></button>
                </div></a>

                <a href="{{ action('App\Http\Controllers\regValidation@barangayClearance') }}"><div class="resRecord">
                    <button class="btnResRecord"><span class="resR"> <i class='bx bx-file'></i>Barangay Clearance</span></button>
                </div></a>

                <a href="{{ action('App\Http\Controllers\regValidation@dbBlotter') }}"><div class="resRecord">
                    <button class="btnResRecord"><span class="resR"> <i class='bx bx-folder-open'></i> Blotter Records</span></button>
                </div></a>

                <a href="{{ action('App\Http\Controllers\regValidation@businessPermit') }}"><div class="resRecord">
                    <button class="btnResRecord"><span class="resR"><i class='bx bxs-book-open'></i>Business Permit</span></button>
                </div></a>

                <a href="{{ action('App\Http\Controllers\regValidation@requestedDoc') }}"><div class="resRecord">
                    <button class="btnResRecord"><span class="resR"> <i class='bx bxs-file-import'></i>Transaction Documents</span></button>
                </div></a>


                <a href="{{ action('App\Http\Controllers\regValidation@dashboardPur') }}"><div class="resRecord">
                    <button class="btnResRecord"><span class="resR"> <i class='bx bx-current-location'></i> Purok</span></button>
                </div></a>
            </div>
        </div>


        <div class="contentCon">
            <div class="contentHeader">
                <div class="fnamePart">
                    <h4 class="profNames">{{ $LoggedUserInfo['em_fname'] . ' ' . $LoggedUserInfo['em_lname'] }}</h4>
                </div>

                <div class="profPart">
                    <img src="/storage/{{ $LoggedUserInfo['em_picture']}}" class="profilePicEmp" alt="employee profile">
                </div>
            </div>

            <div class="mainContentCon">
                <div class="innerContent" id="innerContent">
                    <div class="resContentHeader">
                        <div class="navTitle">RESIDENT RECORD</div>
                        <div class="btnResRecords">
                            <button class="addResident" id="addRes" onclick="addResidents()">+ RESIDENT</button>
                        </div>
                    </div>

                    <div class="tablePart">
                        <table id="myTable" class="table table-bordered table-striped">
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
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($residents as $resident)
                                <tr>
                                    <td>{{ $resident->res_id }}</td>
                                    <td>{{ $resident->res_lname }}, {{ $resident->res_fname }} {{ substr($resident->res_mname, 0, 1) }}.</td>
                                    <td>{{ app('App\Http\Controllers\regValidation')->calculateAges($resident->res_bdate) }}</td>
                                    <td>{{ $resident->res_civil }}</td>
                                    <td>{{ $resident->res_sex }}</td>
                                    <td>{{ $resident->res_voters }}</td>
                                    <td>{{ $resident->res_purok }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="actionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                                <form action="{{ action('App\Http\Controllers\regValidation@dbviewResident') }}" method="GET">
                                                    <input type="hidden" name="res_id" value="{{ $resident->res_id }}">
                                                    <button type="submit" class="dropdown-item">View</button>
                                                </form>
                                                <button type="button" value="{{ $resident->res_id }}" class="dropdown-item edit_resident" onclick="openEditForm({{ $resident }})">Edit</button>
                                                <form action="{{ route('resident.archive') }}" method="POST" id="archive-form-{{ $resident->res_id }}">
                                                    @csrf
                                                    <input type="hidden" name="res_id" value="{{ $resident->res_id }}">
                                                    <button type="button" class="dropdown-item" onclick="archiveResident({{ $resident->res_id }})">Archive</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        <div class="addresCon">
            <div class="addresInput">
                
                <div class="addResHeader">
                    <div class="titlePart">
                        <h4 class="titleForm">Add Resident</h4>
                    </div>
                    
                    <div class="closePart">
                        <h4 class="titleForm"><i class='bx bx-x' onclick="closeAddForm()"></i></h4>
                    </div>
                </div>

                <form class="addResForms" method="POST" action="{{ route('regValidation.saveResidents')}}" id="mainForm" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="leftInput">    
                    <div class="picturePart">
                        <div class="avatarcon">
                            <img id="profilePreview" src="/storage/profilePictures/profilePlaceholder.jpg" class="avatar" alt="Profile Image">
        
                            <div class="mb-3">
                                <label for="profile" class="form-label1">Profile Picture</label>
                                <input type="file" class="form-control" id="profile" name="profile" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                                <span class="text-danger error-text profile_error"></span>
                            </div>  
                            
                            <div class="mb-3">
                                <label for="household" class="form-label1">Household Number</label>
                                <input type="number" class="form-control" id="household" name="household">
                                <span class="text-danger error-text household_error"></span>
                            </div> 

                            <div class="mb-3">
                                <label for="dateRegister" class="form-label1">Date Registered</label>
                                <input type="Date" class="form-control" id="dateRegister" name="dateRegister">
                                <span class="text-danger error-text dateRegister_error"></span>
                            </div> 

                            <div class="purokPart">
                                <label for="suffix">Suffix</label>
                                <select id="suffix" class="form-select" name="suffix">
                                    <option value="" disabled selected>Select Suffix</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                    <option value="Jr.">Jr.</option>
                                </select>
                                <span class="text-danger error-text suffix_error"></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="rightInput">
                    <div class="fullNamePart">
                        <div class="fnameParts">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" name="firstName" id="fname" placeholder="Enter Firstname">
                            <span class="text-danger error-text firstName_error"></span>
                        </div>
                        <div class="mnamePart">
                            <label for="mname">Middle Name</label>
                            <input type="text" class="form-control" name="middleName" id="mname" placeholder="Enter Middlename">
                            <span class="text-danger error-text middleName_error"></span>
                        </div>
                        <div class="lnamePart">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" name="lastName" id="lname" placeholder="Enter Lastname">
                            <span class="text-danger error-text lastName_error"></span>
                        </div>
                    </div>


                    <div class="birthPart">
                        <div class="birthPlacePart">
                            <label for="bPlace">Place of Birth</label>
                            <input type="text" class="form-control" name="birthPlace" id="bPlace" placeholder="Enter Birth Place">
                            <span class="text-danger error-text birthPlace_error"></span>
                        </div>
                        <div class="bdatePart">
                            <label for="bDate">Birth Date</label>
                            <input type="date" class="form-control" name="birthDate" id="bDate" placeholder="Enter Birth Date">
                            <span class="text-danger error-text birthDate_error"></span>
                        </div>
                        <div class="agePart">
                            <label for="age">Age</label>
                            <input type="text" class="form-control" name="age" id="age" placeholder="Enter Age" readonly>
                            <span class="text-danger error-text age_error"></span>
                        </div>
                    </div>

                    <div class="personalPart1">
                        <div class="civilStatusPart">
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

                        <div class="sexPart">
                            <label for="sex">Sex</label>
                            <select id="sex" class="form-select" name="sex">
                                <option value="" disabled selected>Select Sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <span class="text-danger error-text sex_error"></span>
                        </div>
                        
                        <div class="purokPart">
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
                    </div>

                    <div class="personalPart2">
                        <div class="votersPart">
                            <label for="voters">Voters Status</label>
                            <select id="voters" class="form-select" name="voters">
                                <option value="" disabled selected>Select Status</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <span class="text-danger error-text voters_error"></span>
                        </div>

                        <div class="emailAddPart">
                            <label for="email">Email Address</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email">
                            <span class="text-danger error-text email_error"></span>
                        </div>
                        
                        <div class="contactPart">
                            <label for="contact">Contact Number</label>
                            <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter contact">
                            <span class="text-danger error-text contact_error"></span>
                        </div>
                    </div>

                    <div class="personalPart3">
                        <div class="votersPart">
                            <label for="person">Person Status</label>
                            <select id="person" class="form-select" name="person">
                                <option value="" disabled selected>Select Status</option>
                                <option value="Alive">Alive</option>
                                <option value="Deceased">Deceased</option>
                            </select>
                            <span class="text-danger error-text person_error"></span>
                        </div>

                        <div class="votersPart">
                            <label for="living">Living Status</label>
                            <select id="living" class="form-select" name="living">
                                <option value="" disabled selected>Select Status</option>
                                <option value="active">Active</option>
                                <option value="archive">Archive</option>
                            </select>
                            <span class="text-danger error-text living_error"></span>
                        </div>

                        <div class="purokPart">
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
                    </div>

                    <div class="citizenPart">
                        <div class="citizen">
                            <label for="citizens">Citizenship</label>
                            <input type="text" class="form-control" name="citizens" id="citizens" placeholder="Enter citizen">
                            <span class="text-danger error-text citizens_error"></span>
                        </div>
                    </div>

                    <div class="addressPart">
                        <div class="addresses">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter address">
                            <span class="text-danger error-text address_error"></span>
                        </div>
                    </div>

                    <div class="occupationPart">
                        <div class="occupations">
                            <label for="occupation">Occupation (IF NONE PUT N/A)</label>
                            <input type="text" class="form-control" name="occupation" id="occupation" placeholder="Enter occupation">
                            <span class="text-danger error-text occupation_error"></span>
                        </div>
                    </div>

                    <div class="buttonPart">
                        <button type="button" class="btn btn-primary" onclick="closeAddForm()">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </div>
                </form>
            </div>
            </div>
    
            <div class="editEmployeeAccount">
                <div class="editEmployeeAccountCon">
                    <div class="headerEditTitle">
                        <span>Edit Employee</span>
                        <span><i class='bx bx-x' onclick="closeEditEmpForm()"></i></span>
                    </div>
    
                    <form class="editEmployeeForms" id="e_empForm" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="emp_leftInput">    
                            <div class="emp_avatarcon">
                                <img id="emp_profilePreview" class="e_avatar" alt="Profile Image">
                                <input type="hidden" name="e_id" id="e_id">
                                <input type="text" name="e_path" id="e_path" readonly>
                                
                                <div class="mb-3">
                                    <label for="e_profile" class="form-label1">Profile Picture</label>
                                    <input type="file" class="form-control" id="e_profile" name="picture" aria-describedby="inputGroupFileediton03" aria-label="Upload">
                                    <span class="text-danger error-text profile_error"></span>
                                </div>  
                            </div>
                        </div>
                        
                        <div class="emp_rightInput">
                            <div class="emp_fnameParts">
                                <label for="emp_fname">First Name</label>
                                <input type="text" class="form-control" name="fname" id="emp_fname" placeholder="Enter Firstname">
                                <span class="text-danger error-text firstName_error"></span>
                            </div>
    
                            <div class="emp_lnamePart">
                                <label for="emp_lname">Last Name</label>
                                <input type="text" class="form-control" name="lname" id="emp_lname" placeholder="Enter Lastname">
                                <span class="text-danger error-text lastName_error"></span>
                            </div>
    
                
                
                            <div class="emp_accountPart">
                                <div class="emp_emailPart">
                                    <label for="emp_email">Email</label>
                                    <input type="text" class="form-control" name="email" id="emp_email">
                                    <span class="text-danger error-text email_error"></span>
                                </div>
    
                                <div class="emp_passwordPart">
                                    <label for="emp_password">Password</label>
                                    <input type="password" class="form-control" id="emp_password" name="password" placeholder="Enter Password">
                                    <span class="text-danger error-text password_error"></span>
                                </div>
    
                                <div class="emp_addressPart">
                                    <label for="emp_address">Address</label>
                                    <input type="text" class="form-control" name="address" id="emp_address">
                                    <span class="text-danger error-text address_error"></span>
                                </div>
    
                                <div class="emp_contactPart">
                                    <label for="emp_contact">Contact</label>
                                    <input type="text" class="form-control" name="contact" id="emp_contact">
                                    <span class="text-danger error-text contact_error"></span>
                                </div>
    
                                <div class="emp_positionPart">
                                    <label for="emp_position">Position</label>
                                    <input type="text" class="form-control" name="position" id="emp_position" readonly>
                                    <span class="text-danger error-text position_error"></span>
                                </div>                            
                            </div>
                
                
                            <div class="buttonPart">
                                <button type="button" class="btn btn-primary" onclick="closeEditEmpForm()">Cancel</button>
                                <button type="button" class="btn btn-primary update_employee">Update</button>
                            </div>
                
                        </div>
                    </form>
                </div>
        </div>

        

        @include('dashboards.secretariesDb.edit-resident-modal')
        
        <br>
        <br>
        <div class="footer">Copyright</div>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        {{-- <script src="/js/jquery-3.5.0.min.js"></script> --}}

        <script>
            function archiveResident(resId) 
            {
                event.preventDefault(); // Prevent default form submission
                if (confirm('Are you sure you want to archive this resident?')) {
                    document.getElementById('archive-form-' + resId).submit();
                }
            }



            $(document).on('click', '.update_employee', function (e) {
    e.preventDefault();
    var employee_id = $('#e_id').val();

    var formData = new FormData();
    formData.append('fname', $('#emp_fname').val());
    formData.append('lname', $('#emp_lname').val());
    formData.append('email', $('#emp_email').val());
    formData.append('password', $('#emp_password').val());
    formData.append('address', $('#emp_address').val());
    formData.append('contact', $('#emp_contact').val());
    formData.append('position', $('#emp_position').val());
    if ($('#e_profile')[0].files.length > 0) {
        formData.append('picture', $('#e_profile')[0].files[0]); // Append the file only if selected
    }
    
    $.ajax({
        type: "POST",
        url: "/update-employee/" + employee_id,
        data: formData,
        dataType: "json",
        contentType: false, // Needed for FormData
        processData: false, // Needed for FormData
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            console.log(response);
            if(response.status == 400) {
                alert("Validation Error");
            } else if(response.status == 404) {
                alert("Employee Not Found");
            } else {
                alert("Success");
                document.querySelector('.editEmployeeAccount').style.display = 'none';
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert("An error occurred. Check the console for details.");
        }
    });
});

function openEditEmpForm(employee) {
    // Now you have the employee object directly
    console.log(employee);

    $.ajax({
        type: "GET",
        url: "/edit-employee/" + employee.em_id,
        success: function(response) {
            console.log(response);
            if(response.status == 404) {
                alert("Employee Not Found");
            } else {
                $('#e_path').val(response.LoggedUserInfo.em_picture);
                $('#emp_fname').val(response.LoggedUserInfo.em_fname);
                $('#emp_lname').val(response.LoggedUserInfo.em_lname);
                $('#emp_email').val(response.LoggedUserInfo.em_email);
                $('#emp_address').val(response.LoggedUserInfo.em_address);
                $('#emp_contact').val(response.LoggedUserInfo.em_contact);
                $('#emp_position').val(response.LoggedUserInfo.em_position);
                $('#emp_profilePreview').attr('src', '/storage/' + response.LoggedUserInfo.em_picture);
                $('#e_id').val(employee.em_id);

                $('.editEmployeeAccount').css('display', 'flex'); // Show the edit form container with flex display
            }
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
}

function closeEditEmpForm() {
    $('.editEmployeeAccount').css('display', 'none'); // Hide the edit form container
}

// PARA DISPLAY PICTURES INIG PILI
document.getElementById('e_profile').addEventListener('change', function() {
    var file = this.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('emp_profilePreview').src = event.target.result;
        };
        reader.readAsDataURL(file);
    }
});
        </script>
    
</div>
@endsection

