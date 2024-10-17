@extends('layouts.dblayout')

@section('style')
    <link rel="stylesheet" href="/css/dbCaptain.css">
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
                <a href="{{ action('App\Http\Controllers\regValidation@dbTreasurer') }}"><div class="secDashboard">
                    <button class="btnSecDashboard act"><span class="dashb"> <i class='bx bxs-home'></i>Dashboard</span></button>
                </div></a>

                <a href="{{ action('App\Http\Controllers\regValidation@transactionTreasurer') }}"><div class="resRecord">
                    <button class="btnResRecord"><span class="resR"> <i class='bx bx-group'></i>Transactions</span></button>
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
                        <div class="card" style="width: 20rem; height: 140px;" onclick="showYearlyGraph('population')">
                            <div class="card-body">
                                <h5 class="card-title">POPULATION</h5>
                                <p class="card-text">{{ $totalPopulation }}</p>
                            </div>
                        </div>
            
                        <div class="card" style="width: 20rem; height: 140px;" onclick="showYearlyGraph('male')">
                            <div class="card-body">
                                <h5 class="card-title">MALE</h5>
                                <p class="card-text">{{ $totalMale }}</p>
                            </div>
                        </div>
                        <div class="card" style="width: 20rem; height: 140px;" onclick="showYearlyGraph('female')">
                            <div class="card-body">
                                <h5 class="card-title">FEMALE</h5>
                                <p class="card-text">{{ $totalFemale }}</p>
                            </div>
                        </div>
            
                        <div class="card" style="width: 20rem; height: 140px;" onclick="showYearlyGraph('voters')">
                            <div class="card-body">
                                <h5 class="card-title">VOTERS</h5>
                                <p class="card-text">{{ $totalVoters }}</p>
                            </div>
                        </div>
            
                        <div class="card" style="width: 20rem; height: 140px;" onclick="showYearlyGraph('nonvoters')">
                            <div class="card-body">
                                <h5 class="card-title">NON VOTERS</h5>
                                <p class="card-text">{{ $totalNonVoters }}</p>
                            </div>
                        </div>
            
                        <div class="card" style="width: 20rem; height: 140px;" onclick="showMonthlyGraph('blotter')">
                            <div class="card-body">
                                <h5 class="card-title">BLOTTER</h5>
                                <p class="card-text">{{ $totalBlotters }}</p>
                            </div>
                        </div>
            
                        <div class="card" style="width: 20rem; height: 140px;" onclick="showMonthlyGraph('certificate')">
                            <div class="card-body">
                                <h5 class="card-title">CERTIFICATE</h5>
                                <p class="card-text">{{ $totalCertificates }}</p>
                            </div>
                        </div>
            
                        <div class="card" style="width: 20rem; height: 140px;" onclick="showMonthlyGraph('business')">
                            <div class="card-body">
                                <h5 class="card-title">BUSINESS PERMIT</h5>
                                <p class="card-text">{{ $totalBusinessPermits }}</p>
                            </div>
                        </div>
            
                        <div class="card" style="width: 20rem; height: 140px;" onclick="showMonthlyGraph('clearance')">
                            <div class="card-body">
                                <h5 class="card-title">BARANGAY CLEARANCE</h5>
                                <p class="card-text">{{ $totalClearances }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="graphModal" tabindex="-1" aria-labelledby="graphModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="graphModalLabel">Graph</h5>
                       
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <canvas id="graphCanvas"></canvas>
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


    </div>
    
    <br>
    <br>
    <div class="footer">Copyright</div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
let chartInstance = null;

// Function to show yearly graph
function showYearlyGraph(type) {
    // Fetch data via AJAX
    $.ajax({
        url: `/dashboard/yearly-data/${type}`, // Adjust URL based on your Laravel route
        method: 'GET',
        success: function(data) {
            // Destroy existing chart instance if it exists
            if (chartInstance) {
                chartInstance.destroy();
            }

            // Create new Chart.js instance for yearly data
            const ctx = document.getElementById('graphCanvas').getContext('2d');
            chartInstance = new Chart(ctx, {
                type: 'bar', // Assuming yearly data is always displayed as bar chart
                data: {
                    labels: ['Last Year', 'Current Year'],
                    datasets: [{
                        label: 'Last Year',
                        data: [data.lastYear[0], 0], // Assuming data.lastYear is a single value
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Current Year',
                        data: [0, data.currentYear[0]], // Assuming data.currentYear is a single value
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Show the modal after chart is created
            $('#graphModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error('Error fetching data:', error);
            // Handle error scenario (e.g., show error message)
        }
    });
}

// Function to show monthly graph
function showMonthlyGraph(type) {
    // Fetch data via AJAX for monthly data
    $.ajax({
        url: `/dashboard/monthly-data/${type}`, // Adjust URL based on your Laravel route
        method: 'GET',
        success: function(data) {
            // Destroy existing chart instance if it exists
            if (chartInstance) {
                chartInstance.destroy();
            }

            // Create new Chart.js instance for monthly data
            const ctx = document.getElementById('graphCanvas').getContext('2d');
            chartInstance = new Chart(ctx, {
                type: 'bar', // Assuming monthly data is displayed as bar chart
                data: {
                    labels: getMonthlyLabels(), // Function to get monthly labels
                    datasets: [{
                        label: 'Current Year', // Label for the current year data
                        data: data.currentYear, // Assuming data.currentYear is an array of monthly data
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Show the modal after chart is created
            $('#graphModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error('Error fetching data:', error);
            // Handle error scenario (e.g., show error message)
        }
    });
}

// Function to get monthly labels (e.g., Jan, Feb, Mar, ...)
function getMonthlyLabels() {
    // Replace with your logic to generate monthly labels (e.g., array of month names)
    return ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
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

