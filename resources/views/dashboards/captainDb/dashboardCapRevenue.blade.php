@extends('layouts.dblayout')

@section('style')
    <link rel="stylesheet" href="/css/dashboardCapRevenue.css">
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
                <a href="{{ action('App\Http\Controllers\regValidation@dashboardCap') }}"><div class="secDashboard">
                    <button class="btnSecDashboard"><span class="dashb"> <i class='bx bxs-home'></i>Dashboard</span></button>
                </div></a>

                <a href="{{ action('App\Http\Controllers\regValidation@residentsRecCap') }}"><div class="resRecord">
                    <button class="btnResRecord"><span class="resR"> <i class='bx bx-group'></i>Resident Record</span></button>
                </div></a>

                <a href="{{ action('App\Http\Controllers\regValidation@dashboardCapCert') }}"><div class="purokList">
                    <button class="btnPur"><span class="purok"> <i class='bx bxs-certification'></i>Certification</span></button>
                </div></a>

                <a href="{{ action('App\Http\Controllers\regValidation@dashboardCapClearance') }}"><div class="purokList">
                    <button class="btnPur"><span class="purok"> <i class='bx bx-file'></i>Barangay Clearance</span></button>
                </div></a>

                <a href="{{ action('App\Http\Controllers\regValidation@dashboardCapBusiness') }}"><div class="purokList">
                    <button class="btnPur"><span class="purok"> <i class='bx bxs-book-open'></i>Business Permit</span></button>
                </div></a>

                <a href="{{ action('App\Http\Controllers\regValidation@dashboardCapBlotter') }}"><div class="purokList">
                    <button class="btnPur"><span class="purok"> <i class='bx bx-folder-open'></i>Blotter Records</span></button>
                </div></a>


                <a href="{{ action('App\Http\Controllers\regValidation@dashboardCapPur') }}"><div class="purokList">
                    <button class="btnPur"><span class="purok"> <i class='bx bx-current-location'></i> Purok</span></button>
                </div></a>

                <a href="{{ action('App\Http\Controllers\regValidation@dashboardCapRevenue') }}"><div class="purokList">
                    <button class="btnPur act"><span class="purok"> <i class='bx bx-money'></i> Revenue</span></button>
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
                        <div class="navTitle">REVENUE</div>
                        
                        <button class="addResident" id="print" onclick="">PRINT</button>
                    </div>

                    <div class="tablePart">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Revenue Type</th>
                                    <th>Revenue Amount</th>
                                    <th>Amount Receive</th>
                                    <th>Verification</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($revenue as $revenues)
                                    <tr>
                                        <td>{{ $revenues->rev_id }}</td>
                                        <td>{{ $revenues->rev_type }}</td>
                                        <td>{{ $revenues->rev_amount }}</td>
                                        <td>{{ $revenues->rev_amountReceive }}</td>
                                        <td>{{ $revenues->rev_verification }}</td>
                                        <td>{{ $revenues->rev_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <br>
    <br>
    <div class="footer">Copyright</div>

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
                        <input type="hidden" name="emp_id" id="emp_id">
                        <input type="text" name="emp_path" id="emp_path" readonly>
                        
                        <div class="mb-3">
                            <label for="emp_profile" class="form-label1">Profile Picture</label>
                            <input type="file" class="form-control" id="emp_profile" name="picture" aria-describedby="inputGroupFileediton03" aria-label="Upload">
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

    {{-- <script src="/js/dbsecretary.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    {{-- <script src="/js/jquery-3.5.0.min.js"></script> --}}
    <script>

$(document).ready( function () 
  {
    $('#myTable').DataTable();
  });

const printBtn = document.getElementById('print');
printBtn.addEventListener('click', function() {
    window.print();
});










$(document).on('click', '.update_employee', function (e) {
    e.preventDefault();
    var employee_id = $('#emp_id').val();

    var formData = new FormData();
    formData.append('fname', $('#emp_fname').val());
    formData.append('lname', $('#emp_lname').val());
    formData.append('email', $('#emp_email').val());
    formData.append('password', $('#emp_password').val());
    formData.append('address', $('#emp_address').val());
    formData.append('contact', $('#emp_contact').val());
    formData.append('position', $('#emp_position').val());
    if ($('#emp_profile')[0].files.length > 0) {
        formData.append('picture', $('#emp_profile')[0].files[0]); // Append the file only if selected
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
                $('#emp_path').val(response.LoggedUserInfo.em_picture);
                $('#emp_fname').val(response.LoggedUserInfo.em_fname);
                $('#emp_lname').val(response.LoggedUserInfo.em_lname);
                $('#emp_email').val(response.LoggedUserInfo.em_email);
                $('#emp_address').val(response.LoggedUserInfo.em_address);
                $('#emp_contact').val(response.LoggedUserInfo.em_contact);
                $('#emp_position').val(response.LoggedUserInfo.em_position);
                $('#emp_profilePreview').attr('src', '/storage/' + response.LoggedUserInfo.em_picture);
                $('#emp_id').val(employee.em_id);

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
document.getElementById('emp_profile').addEventListener('change', function() {
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

