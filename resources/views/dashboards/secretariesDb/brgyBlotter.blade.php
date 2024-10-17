@extends('layouts.dblayout')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/brgyBlotter.css') }}">
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
                    <button class="btnResRecord"><span class="resR"> <i class='bx bx-group'></i> Resident Record</span></button>
                </div></a>

                <a href="{{ action('App\Http\Controllers\regValidation@barangayCert') }}"><div class="resRecord">
                    <button class="btnResRecord"><span class="resR"> <i class='bx bxs-certification'></i>Certifications</span></button>
                </div></a>

                <a href="{{ action('App\Http\Controllers\regValidation@barangayClearance') }}"><div class="resRecord">
                    <button class="btnResRecord"><span class="resR"> <i class='bx bx-file'></i>Barangay Clearance</span></button>
                </div></a>

                <a href="{{ action('App\Http\Controllers\regValidation@dbBlotter') }}"><div class="resRecord">
                    <button class="btnResRecord act"><span class="resR"> <i class='bx bx-folder-open'></i> Blotter Records</span></button>
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
                <div class="navTitle">
                    <div class="navtitleCon">
                        BLOTTER ISSUANCE
                    </div>

                    <div class="navprintBtn">
                        <button class="printBtn" id="print">PRINT</button>
                        <button class="printBtn" onclick="openRephrasePurpose()">UPDATE</button>
                    </div>
                </div>
                
                <div class="innerContent" id="certificatePrint">                    
                    <div class="brgyAddressTitle">

                        <div class="addressCon">
                            <h4 class="province">REPUBLIC OF THE PHILIPPINES</h4>
                            <h4 class="province">PROVINCE OF CEBU</h4>
                            <h4 class="province">MUNICIPALITY OF MINGLANILLA</h4>
                            <h4 class="province">BARANGAY POBLACION WARD II</h4>
                            <h4 class="province1">OFFICE OF THE LUPONG TAGAPAMAYAPA</h4>
                        </div>
                    </div>
                    
                    <div class="contentsContainer">
                        <div class="nameCaseArea">
                            <div class="nameLeft">
                                <span class="comName">{{ $complaint->res_fname }} {{ $complaint->res_mname }} {{ $complaint->res_lname }}</span>
                                <span class="compLabel">Complainant/s</span>
                                <span class="againstLabel">-Against-</span>
                                <span class="resName">{{ $complaint->blotter_respondents }}</span>
                                <span class="resLabel">Respondent/s</span>
                            </div>
                            <div class="caseNumRight">
                                <div class="caseNumLabel">
                                    <span class="caseNum">
                                        <span class="casenumLabel">Barangay Case Number: <u>{{ $complaint->blotter_brgyCaseNum }}</u></span>
                                        
                                        <span class="forLabel">For: <u>{{ $complaint->blotter_for }}</u></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="complaintArea">
                            <span class="titleArea"><b>COMPLAINT</b></span>

                            <p class="paragraph1">I/WE hereby complain against {{ $complaint->blotter_respondents }}  for violating my/our rights and interests in the following manner:</p>
                            <p class="paragraph2"><u>{{ $complaint->blotter_complaint }}.</u></p>
                            <p class="paragraph3">THEREFORE, I/WE pray that the following relief/s be granted to me/us in acceptance with the law and/or equity:</p>
                            <p class="paragraph4"><u>{{ $complaint->blotter_resolution }}.</u></p>

                            <p class="paragraph5">Made this {{ \Carbon\Carbon::parse($complaint->blotter_complaintMade)->format('dS \d\a\y \o\f F, Y') }}</p>
                        </div>

                        <div class="complainant2">
                            <span class="comName">{{ $complaint->res_fname }} {{ $complaint->res_mname }} {{ $complaint->res_lname }}</span>
                            <span class="compLabel">Complainant/s</span>
                        </div>

                        <div class="footerParagraph">
                            <p class="paragraph5">Received and filed this {{ \Carbon\Carbon::parse($complaint->blotter_filedDate)->format('dS \d\a\y \o\f F, Y') }}</p>
                        </div>

                        <div class="footerLetter">
                            <h4 class="capitan">JHONNY FLOYD R. CASTANARES</h4>
                            <p class="capitanTitle">Punong Barangay/Lupan Chairman</p>
                        </div>
                    </div>

                    <div class="semiFooter">
                        <p class="semiFooterTxt"><b>KP FORM NO. 7 COMPLAINANT FORM</b></p>
                        <p class="semiFooterTxt"><b>Revised JFC 10-28-2020</b></p>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
    <div class="footer">Copyright</div>
</div>


<div class="rephraseBg">
    <div class="rephraseMainBg">
        <form id="updateForm" class="rephraseForm" method="POST" action="{{ route('updateBrgyClearance', ['id' => $complaint->blotter_com_id]) }}">
            @csrf
            @method('PUT')
        
            <input type="hidden" id="ecert_Id" value="{{ $complaint->blotter_com_id }}" readonly>
        
            <div class="residenceCertificate">
                <label for="caseNum">Barangay Case Number</label>
                <input type="text" name="caseNum" id="caseNum" class="inputForms">
                <span class="error-text caseNum_error"></span>
            </div>
        
            <div class="officialReceipt">
                <label for="caseFor">For:</label>
                <input type="text" name="caseFor" id="caseFor" class="inputForms">
                <span class="error-text caseFor_error"></span>
            </div>

            <div class="updateDates">
                <label for="caseDates">Date Recieved</label>
                <input type="date" name="caseDates" id="caseDates" class="inputForms">
                <span class="error-text caseDates_error"></span>
            </div>
        
            <div class="buttonArea">
                <button type="submit" class="btn btn-success update_certTran">Update</button>
                <button type="button" class="btn btn-danger" onclick="closeRephrasePurpose()">Cancel</button>
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



<script>
    function formatDateWithSuffix(dateString) {
        const date = new Date(dateString);
        const day = date.getDate();
        const month = date.toLocaleString('default', { month: 'long' });
        const year = date.getFullYear();
        const suffix = getDaySuffix(day);
        return `${day}${suffix} day of ${month}, ${year}`;
    }

    function getDaySuffix(day) {
        if (day >= 11 && day <= 13) {
            return 'th';
        }
        switch (day % 10) {
            case 1: return 'st';
            case 2: return 'nd';
            case 3: return 'rd';
            default: return 'th';
        }
    }

    $(document).ready(function() {
        const formattedDate = formatDateWithSuffix('{{ $complaint->blotter_complaintMade }}');
        const formattedDate = formatDateWithSuffix('{{ $complaint->blotter_filedDate }}');
        $('.paragraph4 b').text(formattedDate);
    });
</script>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(function(){      
    $("#insertTransactions").on('submit', function(e){
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
                    $('#insertTransactions')[0].reset();
                    alert(data.msg);
                }
            }
        });
    });
});


// UPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATE
$(document).on('click', '.update_certTran', function (e) {
    e.preventDefault();
    var cert_id = $('#ecert_Id').val();

    var formData = new FormData();
    formData.append('caseNum', $('#caseNum').val());
    formData.append('caseFor', $('#caseFor').val());
    formData.append('caseDates', $('#caseDates').val());
    formData.append('_method', 'PUT'); // Add this line to specify the PUT method

    $.ajax({
        type: "POST", // Use POST to send the data
        url: "/upBlotter/" + cert_id,
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
                // handle validation errors here, for example:
                $.each(response.error, function(key, value) {
                    $('span.' + key + '_error').text(value[0]);
                });
            } else if(response.status == 404) {
                alert("Resource Not Found");
            } else {
                alert("Success");
                document.querySelector('.rephraseBg').style.display = 'none';
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert("An error occurred. Check the console for details.");
        }
    });
});
// UPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATE

function openRephrasePurpose() {
    document.querySelector('.rephraseBg').style.display = 'flex';
}

function closeRephrasePurpose() {
    document.querySelector('.rephraseBg').style.display = 'none';
}





const printBtn = document.getElementById('print');
printBtn.addEventListener('click', function() {
    window.print();
});


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
@endsection
