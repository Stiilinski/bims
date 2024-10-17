@extends('layouts.dblayout')

@section('style')
    <link rel="stylesheet" href="/css/requestedDocs.css">
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
                    <button class="btnResRecord"><span class="resR"><i class='bx bxs-book-open'></i>Business Permit</span></button>
                </div></a>

                <a href="{{ action('App\Http\Controllers\regValidation@requestedDoc') }}"><div class="resRecord">
                    <button class="btnResRecord act"><span class="resR"> <i class='bx bxs-file-import'></i>Transaction Documents</span></button>
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
                        <div class="navTitle">TRANSACTION DOCUMENTS</div>
                        <button class="addResident" id="print" onclick="">PRINT</button>
                    </div>

                    <div class="tablePart">
                        
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Document Type</th>
                                    <th>Date</th>
                                    <th>Price</th>
                                    <th>Amount Paid</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)
                                    @php
                                        // Calculate age
                                        $birthdate = \Carbon\Carbon::parse($transaction->res_bdate);
                                        $age = $birthdate->age;
                                        // Concatenate full name
                                        $fullName = $transaction->res_fname . ' ' . $transaction->res_mname . ' ' . $transaction->res_lname;
                                        if ($transaction->res_suffix !== 'null') {
                                            $fullName .= ' ' . $transaction->res_suffix;
                                        }
                                         // Determine document type and status
                                        if (!is_null($transaction->cert_id)) {
                                            $documentType = 'Certification';
                                            $documentStatus = $transaction->certStatus;
                                            $price = 25.00;
                                        } elseif (!is_null($transaction->bcl_id)) {
                                            $documentType = 'Barangay Clearance';
                                            $documentStatus = $transaction->bcl_status;
                                            $price = 25.00;
                                        } elseif (!is_null($transaction->business_id)) {
                                            $documentType = 'Business Permit';
                                            $documentStatus = $transaction->bc_status;
                                            $price = 30.00;
                                        } elseif (!is_null($transaction->blotter_id)) {
                                            $documentType = 'Blotter/Complaint';
                                            $documentStatus = $transaction->blotter_status;
                                            $price = 0.00; // Set appropriate price for this document type
                                        } else {
                                            $documentType = 'Unknown';
                                            $documentStatus = 'Unknown';
                                            $price = 0.00; // Default price for unknown type
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $transaction->tr_id }}</td>
                                        <td>{{ $fullName }}</td>
                                        <td>{{ $documentType }}</td>
                                        <td>{{ $transaction->tr_date }}</td>
                                        <td>{{ number_format($price, 2) }}</td>
                                        <td>{{ $transaction->tr_amountPaid }}</td>
                                        <td>{{ $documentStatus }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btnview" onclick='viewResCert({{ json_encode($transaction) }})'>View</button>
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
                        <div class="mb-3">
                            <label for="e_profile" class="form-label1">Profile Picture</label>
                            <input type="file" class="form-control" id="e_profile" name="picture" aria-describedby="inputGroupFileediton03" aria-label="Upload">
                            <span class="text-danger error-text profile_error"></span>
                        </div>  
                        
                        <div class="mb-3">
                            <label for="e_household" class="form-label1">Household Number</label>
                            <input type="number" class="form-control" id="e_household" name="household">
                            <span class="text-danger error-text household_error"></span>
                        </div> 
    
                        <div class="mb-3">
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
                
                <div class="complaintArea" style="border-top: 2px solid #000; padding-top: 10px;">
                    <h3>Complaint</h3>
                    <div class="e_occupationPart">
                        <div class="complaint">
                            <label for="complaintTranCode">Transaction Code</label>
                            <input type="text" class="form-control" name="complaintTranCode" id="complaintTranCode" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>

                        <div class="complaint">
                            <label for="complaintRes">Respondents</label>
                            <input type="text" class="form-control" name="complaintRes" id="complaintRes" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>

                        <div class="complaint">
                            <label for="complaint">Complaint</label>
                            <input type="text" class="form-control" name="complaint" id="complaint" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>

                        <div class="complaint">
                            <label for="complaintResolution">Resolution</label>
                            <input type="text" class="form-control" name="complaintResolution" id="complaintResolution" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>

                        <div class="complaint">
                            <label for="complaintMade">Complaint Made</label>
                            <input type="date" class="form-control" name="complaintMade" id="complaintMade" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>

                        <div class="complaint">
                            <label for="complaintFiled">Filed Date</label>
                            <input type="date" class="form-control" name="complaintFiled" id="complaintFiled" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>

                        <div class="complaint">
                            <label for="complaintStatus">Complaint Status</label>
                            <input type="text" class="form-control" name="complaintStatus" id="complaintStatus" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>
                    </div>
                </div>

                <div class="certificateArea" style="border-top: 2px solid #000; padding-top: 10px;">
                    <h3>Certificate</h3>
                    <div class="e_occupationPart">
                        <div class="complaint">
                            <label for="certTranCode">Transaction Code</label>
                            <input type="text" class="form-control" name="certTranCode" id="certTranCode" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>

                        <div class="complaint">
                            <label for="certPurpose">Purpose</label>
                            <input type="text" class="form-control" name="certPurpose" id="certPurpose" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>

                        <div class="complaint">
                            <label for="certDateIssued">Date Issued</label>
                            <input type="date" class="form-control" name="certDateIssued" id="certDateIssued" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>

                        <div class="complaint">
                            <label for="certPickUpDate">Pick Up Date</label>
                            <input type="date" class="form-control" name="certPickUpDate" id="certPickUpDate" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>

                        <div class="complaint">
                            <label for="certStatus">Certificate Status</label>
                            <input type="text" class="form-control" name="certStatus" id="certStatus" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>
                    </div>
                </div>

                <div class="clearanceArea" style="border-top: 2px solid #000; padding-top: 10px;">
                    <h3>Barangay Clearance</h3>
                    <div class="e_occupationPart">
                        <div class="complaint">
                            <label for="clearanceTranCode">Transaction Code</label>
                            <input type="text" class="form-control" name="clearanceTranCode" id="clearanceTranCode" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>

                        <div class="complaint">
                            <label for="clearancePurpose">Purpose</label>
                            <input type="text" class="form-control" name="clearancePurpose" id="clearancePurpose" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>

                        <div class="complaint">
                            <label for="clearanceDateIssued">Date Issued</label>
                            <input type="date" class="form-control" name="clearanceDateIssued" id="clearanceDateIssued" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>

                        <div class="complaint">
                            <label for="clearancePickUpDate">Pick Up Date</label>
                            <input type="datetime" class="form-control" name="clearancePickUpDate" id="clearancePickUpDate" readonly>                          
                            <span class="text-danger error-text occupation_error"></span>
                        </div>

                        <div class="complaint">
                            <label for="clearanceStatus">Certificate Status</label>
                            <input type="text" class="form-control" name="clearanceStatus" id="clearanceStatus" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>
                    </div>
                </div>

                <div class="businessArea" style="border-top: 2px solid #000; padding-top: 10px;">
                    <h3>Business Permit</h3>
                    <div class="e_occupationPart">
                        <div class="complaint">
                            <label for="businessTranCode">Transaction Code</label>
                            <input type="text" class="form-control" name="businessTranCode" id="businessTranCode" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>

                        <div class="complaint">
                            <label for="businessName">Business Name</label>
                            <input type="text" class="form-control" name="businessName" id="businessName" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>

                        <div class="complaint">
                            <label for="businessAddress">Business Address</label>
                            <input type="text" class="form-control" name="businessAddress" id="businessAddress" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>

                        <div class="complaint">
                            <label for="businessType">Business Type</label>
                            <input type="text" class="form-control" name="businessType" id="businessType" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>

                        <div class="complaint">
                            <label for="businessNature">Business Nature</label>
                            <input type="text" class="form-control" name="businessNature" id="businessNature" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>

                        <div class="complaint">
                            <label for="businessDateIssued">Date Issued</label>
                            <input type="date" class="form-control" name="businessDateIssued" id="businessDateIssued" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>

                        <div class="complaint">
                            <label for="businessPickUpDate">Pick Up Date</label>
                            <input type="date" class="form-control" name="businessPickUpDate" id="businessPickUpDate" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>

                        <div class="complaint">
                            <label for="businessStatus">Certificate Status</label>
                            <input type="text" class="form-control" name="businessStatus" id="businessStatus" readonly>
                            <span class="text-danger error-text occupation_error"></span>
                        </div>
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


    <script>
        window.redirectToPurpose = function(purposeId) 
        {
            const url = `/dashboards/secretariesDb/brgyBlotter?id=${purposeId}`;
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
    fetch(`/residentComplaint/${resId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Hide all areas initially
            document.querySelector('.complaintArea').style.display = 'none';
            document.querySelector('.certificateArea').style.display = 'none';
            document.querySelector('.clearanceArea').style.display = 'none';
            document.querySelector('.businessArea').style.display = 'none';

            document.getElementById('e_path').value = data.res_picture;
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
            document.getElementById('view_profilePreview').src = '/storage/' + data.res_picture;

            // Show relevant section based on document type
            if (certificate.cert_id) {
                document.getElementById('certTranCode').value = certificate.cert_transactionCode;
                document.getElementById('certPurpose').value = certificate.cert_purpose;
                document.getElementById('certDateIssued').value = certificate.cert_dateIssued;
                document.getElementById('certPickUpDate').value = certificate.cert_pickUpDate;
                document.getElementById('certStatus').value = certificate.certStatus;
                document.querySelector('.certificateArea').style.display = 'block';
            } else if (certificate.business_id) {
                document.getElementById('businessTranCode').value = certificate.bc_transactionCode;
                document.getElementById('businessName').value = certificate.bc_businessName;
                document.getElementById('businessAddress').value = certificate.bc_businessAddress;
                document.getElementById('businessType').value = certificate.bc_businessType;
                document.getElementById('businessNature').value = certificate.bc_businessNature;
                document.getElementById('businessDateIssued').value = certificate.bc_dateIssued;
                document.getElementById('businessPickUpDate').value = certificate.bc_pickUpDate;
                document.getElementById('businessStatus').value = certificate.bc_status;
                document.querySelector('.businessArea').style.display = 'block';
            } else if (certificate.bcl_id) {
                document.getElementById('clearanceTranCode').value = certificate.bcl_transactionCode;
                document.getElementById('clearancePurpose').value = certificate.bcl_purpose;
                document.getElementById('clearanceDateIssued').value = certificate.bcl_dateIssued;
                document.getElementById('clearancePickUpDate').value = certificate.bcl_pickUpDate;
                document.getElementById('clearanceStatus').value = certificate.bcl_status;
                document.querySelector('.clearanceArea').style.display = 'block';
            } else if (certificate.blotter_id) {
                document.getElementById('complaintTranCode').value = certificate.blotter_transactionCode;
                document.getElementById('complaintRes').value = certificate.blotter_respondents;
                document.getElementById('complaint').value = certificate.blotter_complaint;
                document.getElementById('complaintResolution').value = certificate.blotter_resolution;
                document.getElementById('complaintMade').value = certificate.blotter_complaintMade;
                document.getElementById('complaintFiled').value = certificate.blotter_filedDate;
                document.getElementById('complaintStatus').value = certificate.blotter_status;
                document.querySelector('.complaintArea').style.display = 'block';
            }

            document.querySelector('.viewResident').style.display = 'flex';
        })
        .catch(error => {
            console.error('Error fetching resident data:', error);
        });
}


function updateBclStatus(certId, newStatus) 
{
    fetch('/update-blotter-status', {
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

    fetch('/reject-blotter', {
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

