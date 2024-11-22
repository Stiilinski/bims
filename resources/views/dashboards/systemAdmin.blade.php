@include('layouts.headAdmin')
<style>
.card {
    padding: 15px;
}
</style>
@include('layouts.headerAdmin')

@include('layouts.sidebarAdmin')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<body>
    <main class="main" id="main">
        <div class="innerContent" id="innerContent">
            <div class="pagetitle">
                <h1>Employee Record</h1>
            </div>
            <div class="row g-3">
                <div class="col-md-3">
                    <select id="status-filter" class="form-select">
                        <option value="pending">Pending</option>
                        <option value="Active">Active</option>
                        <option value="Archive">Archive</option>
                    </select>  
                </div>
            </div>
            <br>
            <div class="card">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Position</th>
                            <th>Status</th>
                            <th style="display: none;"></th>
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
                            <td style="display: none;">{{ $allEmployee->created_at }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="actionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                        <button type="button" class="dropdown-item edit_resident" data-bs-toggle="modal" data-bs-target="#editEmployeeModal" data-employee="{{ json_encode($allEmployee) }}">Edit</button>
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
    </main>
    {{-- EDIT EMPLOYEE --}}
    <div class="modal fade" id="editEmployeeModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="editOtherEmployeeForms" id="e_otherempForm" autocomplete="off" enctype="multipart/form-data">
                    @csrf   
                    <div class="modal-body">
                        <div class="emp_leftInput">
                            <div class="emp_avatarcon">
                                <input type="hidden" name="e_otherid" id="e_otherid">

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
                                    <select id="emp_otheraddress" class="form-select" name="otheraddress">
                                        <option value="" disabled selected>Select Purok</option>
                                        <option value="Tugas">Tugas</option>
                                        <option value="Tambis">Tambis</option>
                                        <option value="Mahogany">Mahogany</option>
                                        <option value="Guyabano">Guyabano</option>
                                        <option value="Mansinitas">Mansinitas</option>
                                        <option value="Ipil-ipil">Ipil-ipil</option>
                                        <option value="Lubi">Lubi</option>
                                    </select>
                                    <span class="text-danger error-text emp_otheraddress_error"></span>
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
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary update_employees">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @include('layouts.footerAdmin')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        // Initialize DataTable with striped rows (default)
        var table = $('#example').DataTable({
            stripeClasses: ['even', 'odd'], // Optional: applies even/odd classes for striped rows
            order: [[5, 'desc']],  // Order by the 'created_at' column (index 4) in descending order
        });

        // Apply the default "Pending" filter on the status column
        table.column(6) // Assuming the 'Status' column is the 6th column (index 5)
            .search($('#status-filter').val())
            .draw();

        // Update filter when the select option changes
        $('#status-filter').on('change', function() {
            table.column(6)
                .search(this.value)
                .draw();
        });
    });


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


    // $(document).on('click', '.update_employee', function (e) {
        //     e.preventDefault();
        //     var employee_id = $('#e_id').val();

        //     var formData = new FormData();
        //     formData.append('fname', $('#emp_fname').val());
        //     formData.append('lname', $('#emp_lname').val());
        //     formData.append('email', $('#emp_email').val());
        //     formData.append('password', $('#emp_password').val());
        //     formData.append('address', $('#emp_address').val());
        //     formData.append('contact', $('#emp_contact').val());
        //     formData.append('position', $('#emp_position').val());
        //     if ($('#e_profile')[0].files.length > 0) {
        //         formData.append('picture', $('#e_profile')[0].files[0]); // Append the file only if selected
        //     }
            
        //     $.ajax({
        //         type: "POST",
        //         url: "/update-employee/" + employee_id,
        //         data: formData,
        //         dataType: "json",
        //         contentType: false, // Needed for FormData
        //         processData: false, // Needed for FormData
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         success: function(response) {
        //             console.log(response);
        //             if(response.status == 400) {
        //                 alert("Validation Error");
        //             } else if(response.status == 404) {
        //                 alert("Employee Not Found");
        //             } else {
        //                 alert("Success");
        //                 document.querySelector('.editEmployeeAccount').style.display = 'none';
        //             }
        //         },
        //         error: function(xhr, status, error) {
        //             console.error(xhr.responseText);
        //             alert("An error occurred. Check the console for details.");
        //         }
        //     });
    // });

 
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
                        location.reload();
                        alert("Success");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("An error occurred. Check the console for details.");
                }
            });
        });


        // Event listener to trigger modal and populate the form
        document.querySelectorAll('.edit_resident').forEach(button => {
            button.addEventListener('click', function() {
                const employeeData = JSON.parse(this.getAttribute('data-employee')); // Get employee data
                openOtherEditForm(employeeData); // Open the modal and populate the form
            });
        });

        function openOtherEditForm(employee) {
            // Populate the form fields with the employee data
            document.getElementById('e_otherid').value = employee.em_id;
            document.getElementById('emp_otherfname').value = employee.em_fname;
            document.getElementById('emp_otherlname').value = employee.em_lname;
            document.getElementById('emp_otheremail').value = employee.em_email;
            document.getElementById('emp_otherpassword').value = ''; // Password can be left empty, handled by backend
            document.getElementById('emp_otheraddress').value = employee.em_address;
            document.getElementById('emp_othercontact').value = employee.em_contact;
            document.getElementById('emp_otherposition').value = employee.em_position;
        }


    </script>
</body>

