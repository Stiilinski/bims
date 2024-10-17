@extends('layouts.dblayout')

@section('style')
    <link rel="stylesheet" href="/css/systemAdmin.css">
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
                <a href="{{ action('App\Http\Controllers\regValidation@residentsRec') }}"><div class="resRecord">
                    <button class="btnResRecord act"><span class="resR"> <i class='bx bx-group'></i> Employee Record</span></button>
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
                        <div class="navTitle">EMPLOYEE RECORD</div>
                        <div class="btnResRecord">
                        </div>
                    </div>

                    <div class="tablePart">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($allEmployees as $allEmployee)
                                <tr>
                                    <td>{{ $allEmployee->em_id }}</td>
                                    <td>{{ $allEmployee->em_lname }}, {{ $allEmployee->em_fname }}</td>
                                    <td>{{ $allEmployee->em_email }}</td>
                                    <td>{{ $allEmployee->em_address }}</td>
                                    <td>{{ $allEmployee->em_contact }}</td>
                                    <td>{{ $allEmployee->em_position }}</td>
                                    <td>{{ $allEmployee->em_status }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="actionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                                <button type="button" class="dropdown-item edit_resident" data-employee="{{ json_encode($allEmployee) }}">Edit</button>
                                                <!-- Archive Form -->
                                                <form action="{{ route('employee.archive') }}" method="POST" id="archive-form-{{ $allEmployee->em_id }}">
                                                    @csrf
                                                    <input type="hidden" name="em_id" value="{{ $allEmployee->em_id }}">
                                                    <button type="button" class="dropdown-item" onclick="archiveEmployee('{{ $allEmployee->em_id }}')">Archive</button>
                                                </form>
                                                
                                                <!-- Active Form -->
                                                <form action="{{ route('employee.activate') }}" method="POST" id="active-form-{{ $allEmployee->em_id }}">
                                                    @csrf
                                                    <input type="hidden" name="em_id" value="{{ $allEmployee->em_id }}">
                                                    <button type="button" class="dropdown-item" onclick="activeEmployee('{{ $allEmployee->em_id }}')">Activate</button>
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
       
            <div class="editOtherEmployeeAccount" style="display: none;">
                <div class="editOtherEmployeeAccountCon">
                    <div class="headerEditOtherTitle">
                        <span>Edit Employee</span>
                        <span><i class='bx bx-x' onclick="closeEditOtherEmpForm()"></i></span>
                    </div>
            
                    <form class="editOtherEmployeeForms" id="e_otherempForm" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="emp_leftInput">
                            <div class="emp_avatarcon">
                                <img id="emp_otherprofilePreview" class="e_avatar" alt="Profile Image">
                                <input type="hidden" name="e_otherid" id="e_otherid">
                                <input type="text" name="e_otherpath" id="e_otherpath" readonly>
            
                                <div class="mb-3">
                                    <label for="e_otherprofile" class="form-label1">Profile Picture</label>
                                    <input type="file" class="form-control" id="e_otherprofile" name="otherpicture" aria-describedby="inputGroupFileediton03" aria-label="Upload">
                                    <span class="text-danger error-text profile_error"></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="emp_rightInput">
                            <div class="emp_fnameParts">
                                <label for="emp_otherfname">First Name</label>
                                <input type="text" class="form-control" name="otherfname" id="emp_otherfname" placeholder="Enter Firstname">
                                <span class="text-danger error-text firstName_error"></span>
                            </div>
            
                            <div class="emp_lnamePart">
                                <label for="emp_otherlname">Last Name</label>
                                <input type="text" class="form-control" name="otherlname" id="emp_otherlname" placeholder="Enter Lastname">
                                <span class="text-danger error-text lastName_error"></span>
                            </div>
            
                            <div class="emp_accountPart">
                                <div class="emp_emailPart">
                                    <label for="emp_otheremail">Email</label>
                                    <input type="text" class="form-control" name="otheremail" id="emp_otheremail">
                                    <span class="text-danger error-text email_error"></span>
                                </div>
            
                                <div class="emp_passwordPart">
                                    <label for="emp_otherpassword">Password</label>
                                    <input type="password" class="form-control" id="emp_otherpassword" name="otherpassword" placeholder="Enter Password">
                                    <span class="text-danger error-text password_error"></span>
                                </div>
            
                                <div class="emp_addressPart">
                                    <label for="emp_otheraddress">Address</label>
                                    <input type="text" class="form-control" name="otheraddress" id="emp_otheraddress">
                                    <span class="text-danger error-text address_error"></span>
                                </div>
            
                                <div class="emp_contactPart">
                                    <label for="emp_othercontact">Contact</label>
                                    <input type="text" class="form-control" name="othercontact" id="emp_othercontact">
                                    <span class="text-danger error-text contact_error"></span>
                                </div>
            
                                <div class="emp_positionPart">
                                    <label for="emp_otherposition">Position</label>
                                    <input type="text" class="form-control" name="otherposition" id="emp_otherposition" readonly>
                                    <span class="text-danger error-text position_error"></span>
                                </div>
                            </div>
            
                            <div class="buttonPart">
                                <button type="button" class="btn btn-primary" onclick="closeEditOtherEmpForm()">Cancel</button>
                                <button type="button" class="btn btn-primary update_employees">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            

        

        
        
        <br>
        <br>
        <div class="footer">Copyright</div>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        {{-- <script src="/js/jquery-3.5.0.min.js"></script> --}}

        <script>
           function archiveEmployee(emId) {
                event.preventDefault(); // Prevent default form submission

                if (confirm('Are you sure you want to archive this employee?')) {
                    document.getElementById('archive-form-' + emId).submit();
                }
            }

            function activeEmployee(emId) {
                event.preventDefault(); // Prevent default form submission

                if (confirm('Are you sure you want to activate this employee?')) {
                    document.getElementById('active-form-' + emId).submit();
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


function openOtherEditForm(employee) {
    // Populate the form fields with the employee data
    document.getElementById('e_otherid').value = employee.em_id;
    document.getElementById('emp_otherprofilePreview').src = '/storage/' + employee.em_picture; // Set the src attribute directly
    document.getElementById('e_otherpath').value = employee.em_picture;
    document.getElementById('emp_otherfname').value = employee.em_fname;
    document.getElementById('emp_otherlname').value = employee.em_lname;
    document.getElementById('emp_otheremail').value = employee.em_email;
    document.getElementById('emp_otherpassword').value = ''; // You may want to leave this blank
    document.getElementById('emp_otheraddress').value = employee.em_address;
    document.getElementById('emp_othercontact').value = employee.em_contact;
    document.getElementById('emp_otherposition').value = employee.em_position;

    // Display the form
    document.querySelector('.editOtherEmployeeAccount').style.display = 'flex';
}

function closeEditOtherEmpForm() {
    document.querySelector('.editOtherEmployeeAccount').style.display = 'none';
}

// Call the openEditForm function with employee data on clicking the edit button
document.querySelectorAll('.edit_resident').forEach(button => {
    button.addEventListener('click', function() {
        const employeeData = JSON.parse(this.getAttribute('data-employee'));
        openOtherEditForm(employeeData);
    });
});


$(document).on('click', '.update_employees', function (e) {
    e.preventDefault();
    var employee_id = $('#e_otherid').val();

    var formData = new FormData();
    formData.append('fname', $('#emp_otherfname').val());
    formData.append('lname', $('#emp_otherlname').val());
    formData.append('email', $('#emp_otheremail').val());
    formData.append('password', $('#emp_otherpassword').val());
    formData.append('address', $('#emp_otheraddress').val());
    formData.append('contact', $('#emp_othercontact').val());
    formData.append('position', $('#emp_otherposition').val());
    if ($('#e_otherprofile')[0].files.length > 0) {
        formData.append('picture', $('#e_otherprofile')[0].files[0]); // Append the file only if selected
    }

    $.ajax({
        type: "POST",
        url: "/update-employees/" + employee_id,
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
                document.querySelector('.editOtherEmployeeAccount').style.display = 'none';
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert("An error occurred. Check the console for details.");
        }
    });
});


        </script>
    
</div>
@endsection

