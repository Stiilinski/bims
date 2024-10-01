@extends('layouts.dbLayout')

@section('style')
    <link rel="stylesheet" href="/css/dbSecretary.css">
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
                    <button class="btnSecDashboard act"><span class="dashb"> <i class='bx bxs-home'></i> Dashboard</span></button>
                </div></a>

                <a href="{{ action('App\Http\Controllers\regValidation@residentsRec') }}"><div class="resRecord">
                    <button class="btnResRecord"><span class="resR"> <i class='bx bx-group'></i> Resident Record</span></button>
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
                <div class="innerContent">
                    <div class="navTitle">DASHBOARD</div>
                    <hr>
                    <div class="cardBoard">
                        <div class="card" style="width: 20rem; height: 140px;">
                            <div class="card-body">
                                <h5 class="card-title">POPULATION</h5>
                                <p class="card-text">{{ $totalPopulation }}</p>
                            </div>
                        </div>
            
                        <div class="card" style="width: 20rem; height: 140px;">
                            <div class="card-body">
                                <h5 class="card-title">MALE</h5>
                                <p class="card-text">{{ $totalMale }}</p>
                            </div>
                        </div>
            
                        <div class="card" style="width: 20rem; height: 140px;">
                            <div class="card-body">
                                <h5 class="card-title">FEMALE</h5>
                                <p class="card-text">{{ $totalFemale }}</p>
                            </div>
                        </div>
            
                        <div class="card" style="width: 20rem; height: 140px;">
                            <div class="card-body">
                                <h5 class="card-title">VOTERS</h5>
                                <p class="card-text">{{ $totalVoters }}</p>
                            </div>
                        </div>
            
                        <div class="card" style="width: 20rem; height: 140px;">
                            <div class="card-body">
                                <h5 class="card-title">NON VOTERS</h5>
                                <p class="card-text">{{ $totalNonVoters }}</p>
                            </div>
                        </div>
            
                        <div class="card" style="width: 20rem; height: 140px;">
                            <div class="card-body">
                                <h5 class="card-title">BLOTTER</h5>
                                <p class="card-text">{{ $totalBlotters }}</p>
                            </div>
                        </div>
            
                        <div class="card" style="width: 20rem; height: 140px;">
                            <div class="card-body">
                                <h5 class="card-title">CERTIFICATE</h5>
                                <p class="card-text">{{ $totalCertificates }}</p>
                            </div>
                        </div>
            
                        <div class="card" style="width: 20rem; height: 140px;">
                            <div class="card-body">
                                <h5 class="card-title">BUSINESS PERMIT</h5>
                                <p class="card-text">{{ $totalBusinessPermits }}</p>
                            </div>
                        </div>
            
                        <div class="card" style="width: 20rem; height: 140px;">
                            <div class="card-body">
                                <h5 class="card-title">BARANGAY CLEARANCE</h5>
                                <p class="card-text">{{ $totalClearances }}</p>
                            </div>
                        </div>
                    </div>
                </div>
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

        <script src="/js/dbsecretary.js"></script>
    </div>
    
    <br>
    <br>
    <div class="footer">Copyright</div>

    {{-- <script src="/js/dbsecretary.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    {{-- <script src="/js/jquery-3.5.0.min.js"></script> --}}
    <script>
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

