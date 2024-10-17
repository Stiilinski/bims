@extends('layouts.dblayout')

@section('style')
    <link rel="stylesheet" href="/css/dbBusinessPermit.css">
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
                    <button class="btnResRecord"><span class="resR"> <i class='bx bx-folder-open'></i> Blotter Records</span></button>
                </div></a>

                <a href="{{ action('App\Http\Controllers\regValidation@businessPermit') }}"><div class="resRecord">
                    <button class="btnResRecord act"><span class="resR"><i class='bx bxs-book-open'></i>Business Permit</span></button>
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
                        <div class="navTitle">BUSINESS PERMIT ISSUANCE</div>
                        <button class="addResident" id="addRes" onclick="openBCBusinessForm()">+ PERMIT</button>
                    </div>

                    <div class="tablePart">
                        
                        <table id="myTable" class="table table-bordered table-striped">
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
                                        if ($permit->res_suffix !== 'null') {
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
                                        <td>
                                            <button type="button" class="btn btn-primary btnview" onclick='viewResCert({{ json_encode($permit) }})'>View</button>
                                            @if($permit->bc_status === 'processed')
                                                <button type="button" class="btn btn-success" onclick="updateBusiStatus({{ $permit->id }}, 'ready to pick up')">Pickup-Ready</button>
                                            @elseif($permit->bc_status !== 'ready to pick up' && $permit->bc_status !== 'rejected' && $permit->bc_status !== 'cancelled')
                                                <button type="button" class="btn btn-success" onclick="redirectToPurpose({{ $permit->id }})">Print</button>
                                                <button type="button" class="btn btn-danger" onclick="showRejectForm({{ $permit->id }})">Reject</button>
                                            @elseif($permit->bc_status == 'ready to pick up')
                                                <button type="button" class="btn btn-success btnview" onclick="sendEmail('{{ $permit->res_email }}', '{{ $permit->res_fname }}', '{{ $permit->res_lname }}')">Send</button>
                                            @endif
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
    
    <br>
    <br>
    <div class="footer">Copyright</div>

    <div class="barangayClearanceContainer">
        <form method="POST" action="{{ route('regValidation.saveBusinessClearance')}}" class="brgyClearance" id="brgy_clearance">
            @csrf
            <div class="closeClearance"><i class='bx bx-x' onclick="closeBCBusinessForm()"></i></div>
            <div class="labelClearance"><h2>Barangay Clearance</h2></div>

            <div class="grpFields1">
                <div class="namePart1">    
                    <div class="mb-3">
                        <label for="tcode2" class="form-label">Transaction Code</label>
                        <input type="text" class="form-control" id="tcode2" name="tcode2" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="fName2" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fName2" name="fName2">
                        <span class="text-danger error-text fName2_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="mName2" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="mName2" name="mName2">
                        <span class="text-danger error-text mName2_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="lName2" class="form-label">Family Name</label>
                        <input type="text" class="form-control" id="lName2" name="lName2">
                        <span class="text-danger error-text lName2_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="suffix2" class="form-label">Suffix (Leave It If None)</label>
                        <select name="suffix2" id="suffix2" class="form-control">
                            <option value="">N/A</option>
                            <option value="1">I</option>
                            <option value="2">II</option>
                            <option value="3">III</option>
                            <option value="4">IV</option>
                            <option value="5">V</option>
                            <option value="Jr.">Jr.</option>
                        </select>
                    </div>
                    <span class="text-danger error-text suffix2_error"></span>

                    <div class="mb-3">
                        <label for="bDate2" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" id="bDate2" name="bDate2">
                        <span class="text-danger error-text bDate2_error"></span>
                    </div>
                </div>

                <div class="purposePart1">
                    <div class="mb-3">
                        <label for="businessName" class="form-label">Business Name</label>
                        <input type="text" class="form-control" id="businessName" name="businessName">
                        <span class="text-danger error-text businessName_error"></span>
                    </div>

                    <div class="mb-3">
                        <label for="businessAddress" class="form-label">Business Address</label>
                        <input type="text" class="form-control" id="businessAddress" name="businessAddress">
                        <span class="text-danger error-text businessAddress_error"></span>
                    </div>
                    
                    <div class="mb-3">
                        <label for="businessType" class="form-label">Type of Business</label>
                        <input type="text" class="form-control" id="businessType" name="businessType">
                        <span class="text-danger error-text businessType_error"></span>
                    </div>

                    <div class="mb-3">
                        <label for="dateIssued2" class="form-label">Date Issued</label>
                        <input type="date" class="form-control" id="dateIssued2" name="dateIssued2" readonly>
                        <span class="text-danger error-text dateIssued2_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="pickUp2" class="form-label">Pick Up Date</label>
                        <input type="date" class="form-control" id="pickUp2" name="pickUp2">
                        <span class="text-danger error-text pickUp2_error"></span>
                    </div>
                </div>

                <div class="finalInputPart">
                    <div class="mb-3 nature">
                        <label for="businessNature" class="form-label">Nature of Business Activities</label>
                        <textarea name="businessNature" id="businessNature" class="form-control"></textarea>
                        <span class="text-danger error-text businessNature_error"></span>
                    </div>
                
                    <div class="buttonClearance">
                        <button type="button" class="btn btn-primary" onclick="closeBCBusinessForm()">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div id="rejectReasonContainer" class="rejectReasonContainer">
        <div class="rejectReasoncon">
            <form id="rejectReasonForm" class="rejectReasonForm">
                @csrf
                <input type="hidden" name="certificateId" id="certificateId">
                <div class="reasonArea">
                    <label for="rejectReason">Reason For Rejection</label>
                    <textarea name="rejectReason" id="rejectReason" class="textForms"></textarea>
                </div>
    
                <div class="btnRejectArea">
                    <button type="button" class="btn btn-danger" onclick="submitRejectForm()">Reject</button>
                    <button type="button" class="btn btn-info" onclick="hideRejectForm()">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <div class="viewResident">
        <div class="editresInput">
            <div class="editResHeader">
                <div class="e_titlePart">
                    <h4 class="e_titleForm">View Resident</h4>
                </div>
                
                <div class="e_closePart">
                    <h4 class="e_titleForm"><i class='bx bx-x' onclick="closeviewResCert()"></i></h4>
                </div>
            </div>
    
            <form class="editResForms" id="e_mainForm" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="e_leftInput">    
                <div class="e_picturePart">
                    <div class="e_avatarcon">
                        <img id="view_profilePreview" class="e_avatar" alt="Profile Images">
                        <input type="hidden" name="e_id" id="e_id">
                        <input type="text" name="e_path" id="e_path">
                        <div class="mb-4">
                            <label for="e_profile" class="form-label1">Profile Picture</label>
                            <input type="file" class="form-control" id="e_profile" name="picture" aria-describedby="inputGroupFileediton03" aria-label="Upload">
                            <span class="text-danger error-text profile_error"></span>
                        </div>  
                        
                        <div class="mb-4">
                            <label for="e_household" class="form-label1">Household Number</label>
                            <input type="number" class="form-control" id="e_household" name="household">
                            <span class="text-danger error-text household_error"></span>
                        </div> 
    
                        <div class="mb-4">
                            <label for="e_dateRegister" class="form-label1">Date Registered</label>
                            <input type="Date" class="form-control" id="e_dateRegister" name="dateReg">
                            <span class="text-danger error-text dateRegister_error"></span>
                        </div> 
                    </div>
                </div>
            </div>
            
            <div class="e_rightInput">
                <div class="e_fullNamePart">
                    <div class="e_fnameParts">
                        <label for="e_fname">First Name</label>
                        <input type="text" class="form-control" name="fname" id="e_fname" placeholder="Enter Firstname">
                        <span class="text-danger error-text firstName_error"></span>
                    </div>
                    <div class="e_mnamePart">
                        <label for="e_mname">Middle Name</label>
                        <input type="text" class="form-control" name="mname" id="e_mname" placeholder="Enter Middlename">
                        <span class="text-danger error-text middleName_error"></span>
                    </div>
                    <div class="e_lnamePart">
                        <label for="e_lname">Last Name</label>
                        <input type="text" class="form-control" name="lname" id="e_lname" placeholder="Enter Lastname">
                        <span class="text-danger error-text lastName_error"></span>
                    </div>
                </div>
    
    
                <div class="e_birthPart">
                    <div class="e_birthPlacePart">
                        <label for="e_bPlace">Place of Birth</label>
                        <input type="text" class="form-control" name="birthPlaces" id="e_bPlace" placeholder="Enter Birth Place">
                        <span class="text-danger error-text birthPlace_error"></span>
                    </div>
                    <div class="e_bdatePart">
                        <label for="e_bDate">Birth Date</label>
                        <input type="Date" class="form-control" id="e_bDate" name="bdate" onchange="calAge()">
                        <span class="text-danger error-text birthDate_error"></span>
                    </div>
                    <div class="e_agePart">
                        <label for="e_age">Age</label>
                        <input type="text" class="form-control" name="age" id="e_age" placeholder="Enter Age" readonly>
                        <span class="text-danger error-text age_error"></span>
                    </div>
                </div>
    
                <div class="e_personalPart1">
                    <div class="e_civilStatusPart">
                        <label for="e_civilStatus">Civil Status</label>
                        <select id="e_civilStatus" class="form-select" name="civilStat">
                            <option value="" disabled selected>Select Status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Annulled">Annulled</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                        <span class="text-danger error-text civilStatus_error"></span>
                    </div>
    
                    <div class="e_sexPart">
                        <label for="e_sex">Sex</label>
                        <select id="e_sex" class="form-select" name="sex">
                            <option value="" disabled selected>Select Sex</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <span class="text-danger error-text sex_error"></span>
                    </div>
                    
                    <div class="e_purokPart">
                        <label for="e_purok">Purok</label>
                        <select id="e_purok" class="form-select" name="purok">
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
    
                <div class="e_personalPart2">
                    <div class="e_votersPart">
                        <label for="e_voters">Voters Status</label>
                        <select id="e_voters" class="form-select" name="voters">
                            <option value="" disabled selected>Select Status</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                        <span class="text-danger error-text voters_error"></span>
                    </div>
    
                    <div class="e_emaileditPart">
                        <label for="e_email">Email Address</label>
                        <input type="text" class="form-control" name="email" id="e_email" placeholder="Enter Email">
                        <span class="text-danger error-text email_error"></span>
                    </div>
                    
                    <div class="e_contactPart">
                        <label for="e_contact">Contact Number</label>
                        <input type="text" class="form-control" name="contact" id="e_contact" placeholder="Enter contact">
                        <span class="text-danger error-text contact_error"></span>
                    </div>
                </div>
    
                <div class="e_citizenPart">
                    <div class="e_citizen">
                        <label for="e_citizens">Citizenship</label>
                        <input type="text" class="form-control" name="citizens" id="e_citizens" placeholder="Enter citizen">
                        <span class="text-danger error-text citizens_error"></span>
                    </div>
                </div>
    
                <div class="e_addressPart">
                    <div class="e_addresses">
                        <label for="e_address">Address</label>
                        <input type="text" class="form-control" name="address" id="e_address" placeholder="Enter address">
                        <span class="text-danger error-text address_error"></span>
                    </div>
                </div>
    
                <div class="e_occupationPart">
                    <div class="e_occupations">
                        <label for="e_occupation">Occupation (IF NONE PUT N/A)</label>
                        <input type="text" class="form-control" name="occupation" id="e_occupation" placeholder="Enter occupation">
                        <span class="text-danger error-text occupation_error"></span>
                    </div>
                </div>
    
                <div class="buttonPart">
                    <button type="button" class="btn btn-primary" onclick="closeviewResCert()">Close</button>
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
                        <input type="hidden" name="emp_id" id="emp_id">
                        <input type="text" name="emp_path" id="emp_path" readonly>
                        
                        <div class="mb-3">
                            <label for="emp_profile" class="form-label1">Profile Picture</label>
                            <input type="file" class="form-control picpic" id="emp_profile" name="picture" aria-describedby="inputGroupFileediton03" aria-label="Upload">
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
        window.redirectToPurpose = function(purposeId) 
        {
            const url = `/dashboards/secretariesDb/businessClearance?id=${purposeId}`;
            window.location.href = url;
        };
    </script>
    {{-- <script src="/js/dbsecretary.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    {{-- <script src="/js/jquery-3.5.0.min.js"></script> --}}
    <script>
    function viewResCert(certificate) {
    const resId = certificate.res_id;
    fetch(`/resident/${resId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            document.getElementById('e_path').value = data.res_picture; // Assuming you have a profile picture path
            document.getElementById('e_household').value = data.res_household;
            document.getElementById('e_dateRegister').value = data.res_dateReg;
            document.getElementById('e_fname').value = data.res_fname;
            document.getElementById('e_mname').value = data.res_mname;
            document.getElementById('e_lname').value = data.res_lname;
            document.getElementById('e_bPlace').value = data.res_bplace;
            document.getElementById('e_bDate').value = data.res_bdate;
            document.getElementById('e_age').value = calculateAge(data.res_bdate);
            document.getElementById('e_civilStatus').value = data.res_civil;
            document.getElementById('e_sex').value = data.res_sex;
            document.getElementById('e_purok').value = data.res_purok;
            document.getElementById('e_voters').value = data.res_voters;
            document.getElementById('e_email').value = data.res_email;
            document.getElementById('e_contact').value = data.res_contact;
            document.getElementById('e_citizens').value = data.res_citizen;
            document.getElementById('e_address').value = data.res_address;
            document.getElementById('e_occupation').value = data.res_occupation;

            // Assuming the profile picture path is correct
            document.getElementById('view_profilePreview').src = '/storage/' + data.res_picture;

            // Show the view resident modal or div
            document.querySelector('.viewResident').style.display = 'flex';
        })
        .catch(error => {
            console.error('Error fetching resident data:', error);
        });
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
            alert('Certificate status updated successfully');
            location.reload(); // Optionally, reload the page to reflect the changes
        } else {
            alert('Failed to update certificate status');
        }
    })
    .catch(error => console.error('Error:', error));
}


$(document).ready( function () 
  {
    $('#myTable').DataTable();
  });


function showRejectForm(certId) {
    document.getElementById('certificateId').value = certId;
    document.getElementById('rejectReasonContainer').style.display = 'flex';
}

function hideRejectForm() {
    document.getElementById('rejectReasonContainer').style.display = 'none';
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




function closeBCBusinessForm() {
    var clearance = document.querySelector(".barangayClearanceContainer");
    clearance.style.display = "none";
}

function openBCBusinessForm() {
    var clearance = document.querySelector(".barangayClearanceContainer");
    clearance.style.display = "flex";
}


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

