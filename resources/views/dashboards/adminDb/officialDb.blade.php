@include('layouts.headAdmin')
<style>
.card {
    padding: 15px;
}

.pagetitle {
    justify-content: space-between;
}

input *{
    width: 100%!important;
}
</style>
@include('layouts.headerAdmin')

@include('layouts.sidebarAdmin')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<body>
    <main class="main" id="main">
        <div class="innerContent" id="innerContent">
            <div class="pagetitle d-flex">
                <h1>Officials Record</h1>
                <div class="btnArea">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewExtralargeModal">Add Officials</button>   
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-3">
                    <select id="status-filter" class="form-select">
                        <option value="Active" selected>Active</option>
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
                            <th>Position</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th style="display: none;"></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allEmployees as $allEmployee)
                        <tr>
                            <td>{{ $allEmployee->of_id }}</td>
                            <td>{{ $allEmployee->resident->res_fname }}, {{ $allEmployee->resident->res_lname }}</td>
                            <td>{{ $allEmployee->of_position }}</td>
                            <td>{{ $allEmployee->of_date }}</td>
                            <td>{{ $allEmployee->of_status }}</td>
                            <td style="display: none;">{{ $allEmployee->created_at }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <button type="button" class="dropdown-item" onclick="openEditModal({{ $allEmployee->of_id }})">View</button>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item" onclick="updateOfStatus({{ $allEmployee->of_id }}, 'Archive')">Archive</button>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item" onclick="updateOfStatus({{ $allEmployee->of_id }}, 'Active')">Active</button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
        </div>
    </main>

    {{-- Add Officials --}}
    <div class="modal fade" id="viewExtralargeModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Officials</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('regValidation.inputOfficials') }}" id="officialForm" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="modal-body"> 
                        <div class="row g-3" style="padding: 10px;">
                            <div class="col-md-12 pt-2">
                                <label for="fullName" class="form-label">Full Name</label>
                                <select id="fullName" class="form-control" name="fullName">
                                    <option value="">Select...</option>
                                    @foreach($residents as $resident)
                                        <option value="{{ $resident->res_id }}">
                                            {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname === 'N/A' ? '' : $resident->res_mname }} {{ $resident->res_suffix === 'N/A' ? '' : $resident->res_suffix }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text fullName_error"></span>
                            </div>
                
                            <div class="col-md-12 pt-2">
                                <label for="position" class="form-label">Position</label>
                                <select id="position" class="form-select" name="position">
                                    <option value="" selected disabled>Select...</option>
                                    <option value="Punong Barangay">Punong Barangay</option>
                                    <option value="Barangay Kagawad">Barangay Kagawad</option>
                                    <option value="SK Chairman">SK Chairman</option>
                                    <option value="SK Councilors">SK Councilors</option>
                                    <option value="Brgy. Secretary">Brgy. Secretary</option>
                                    <option value="Brgy. Treasurer">Brgy. Treasurer</option>
                                    <option value="Focal Person">Focal Person</option>
                                    <option value="Brgy. Nutrition Scholar">Brgy. Nutrition Scholar</option>
                                    <option value="Brgy. Health Worker">Brgy. Health Worker</option>
                                    <option value="Brgy. Tanod">Brgy. Tanod</option>
                                </select>
                                <span class="text-danger error-text position_error"></span>
                            </div>
                
                            <div class="col-md-6">
                                <label for="appointment" class="col-sm-12 col-form-label">Appointment Date</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" id="appointment" name="appointment">
                                </div>
                                <span class="text-danger error-text appointment_error"></span>
                            </div>
                
                            <div class="col-md-6 pt-2">
                                <label for="status" class="form-label">Status</label>
                                <select id="status" class="form-select" name="status">
                                    <option value="" selected>Select...</option>
                                    <option value="Active">Active</option>
                                    <option value="Archive">Archive</option>
                                </select>
                                <span class="text-danger error-text status_error"></span>
                            </div>

                            <div class="col-md-4">
                                <label for="fbLink" class="col-sm-12 col-form-label">Facebook Link</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="fbLink" name="fbLink">
                                </div>
                                <span class="text-danger error-text fbLink_error"></span>
                            </div>

                            <div class="col-md-4">
                                <label for="twitterLink" class="col-sm-12 col-form-label">Twitter/X Link</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="twitterLink" name="twitterLink">
                                </div>
                                <span class="text-danger error-text twitterLink_error"></span>
                            </div>

                            <div class="col-md-4">
                                <label for="instaLink" class="col-sm-12 col-form-label">Instagram Link</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="instaLink" name="instaLink">
                                </div>
                                <span class="text-danger error-text instaLink_error"></span>
                            </div>
                        </div>

                        <div id="alert-container"></div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- /Add Officials --}}

    {{-- Edit Officials --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="edit_employeeId" class="form-label">ID</label>
                            <input type="text" class="form-control" id="edit_employeeId" disabled>
                        </div>
                        @if(isset($employee->profile_picture)) 
                            <img src="{{ asset($employee->profile_picture) }}" class="img-thumbnail" width="100px">
                        @endif
                        <div class="col-md-12 pt-2">
                            <label for="edit_fullName" class="form-label">Full Name</label>
                            <select id="edit_fullName" class="form-control" name="edit_fullName">
                                <option value="">Select...</option>
                                @foreach($residents as $resident)
                                    <option value="{{ $resident->res_id }}">
                                        {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname === 'N/A' ? '' : $resident->res_mname }} {{ $resident->res_suffix === 'N/A' ? '' : $resident->res_suffix }}
                                    </option>   
                                @endforeach
                            </select>
                            <span class="text-danger error-text edit_fullName_error"></span>
                        </div>
                        <div class="col-md-12 pt-2">
                            <label for="edit_position" class="form-label">Position</label>
                            <select id="edit_position" class="form-select" name="edit_position">
                                <option value="" selected>Select...</option>
                                <option value="Punong Barangay">Punong Barangay</option>
                                <option value="Barangay Kagawad">Barangay Kagawad</option>
                                <option value="SK Chairman">SK Chairman</option>
                                <option value="SK Councilors">SK Councilors</option>
                                <option value="Brgy. Secretary">Brgy. Secretary</option>
                                <option value="Brgy. Treasurer">Brgy. Treasurer</option>
                                <option value="Focal Person">Focal Person</option>
                                <option value="Brgy. Nutrition Scholar">Brgy. Nutrition Scholar</option>
                                <option value="Brgy. Health Worker">Brgy. Health Worker</option>
                                <option value="Brgy. Tanod">Brgy. Tanod</option>
                            </select>
                            <span class="text-danger error-text edit_position_error"></span>
                        </div>
                        <div class="col-md-12">
                            <label for="edit_status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="edit_status">
                        </div>
                        <div class="col-md-12">
                            <label for="edit_date" class="form-label">Date</label>
                            <input type="text" class="form-control" id="edit_date">
                        </div>
                        <div class="col-md-12">
                            <label for="edit_pp" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" id="edit_pp">
                        </div>
                    </div>
                <!-- You can add more fields if needed -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveEmployeeData()">Save changes</button>
            </div>
            </div>
        </div>
    </div>
  
      
    @include('layouts.footerAdmin')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    
    <script>
    $(document).ready(function () {
        $('#fullName').selectize({
            sortField: 'text'
        });
    });

    $(document).ready(function () {
        $('#edit_fullName').selectize({
            sortField: 'text'
        });
    });

    $(document).ready(function() {
        // Initialize DataTable with striped rows (default)
        var table = $('#example').DataTable({
            stripeClasses: ['even', 'odd'], // Optional: applies even/odd classes for striped rows
            order: [[5, 'desc']],  // Order by the 'created_at' column (index 4) in descending order
        });

        // Apply the default "Pending" filter on the status column
        table.column(4) // Assuming the 'Status' column is the 6th column (index 5)
            .search($('#status-filter').val())
            .draw();

        // Update filter when the select option changes
        $('#status-filter').on('change', function() {
            table.column(4)
                .search(this.value)
                .draw();
        });
    });
    </script>

    <script>
        $(function() {
            $("#officialForm").on('submit', function(e) {
                e.preventDefault();  // Prevent the default form submission behavior
                
                // Make sure the form is not submitting and page isn't reloading
                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        // Clear any existing error messages
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {
                            // If validation fails, show error messages
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        } else {
                            // On success, clear the form
                            $('#officialForm')[0].reset();
                            
                            // Create a success message alert
                            const alertHtml = `
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="bi bi-check-circle me-1"></i>
                                    ${data.msg} 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>`;

                            // Append the alert to your alert container
                            $('#alert-container').append(alertHtml);

                            // Remove the alert after 1 second
                            setTimeout(() => {
                                $('.alert').alert('close');
                                // You can reload the page if needed or just close the modal if that's what you want
                                location.reload();
                            }, 1000);
                        }
                    },
                    error: function(xhr) {
                        const alertHtml = `
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-circle me-1"></i>
                                Failed to add new Record. Please try again. 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;

                        // Append the error message
                        $('#alert-container').append(alertHtml);

                        // Remove the alert after 3 seconds
                        setTimeout(() => {
                            $('.alert').alert('close');
                        }, 3000);
                    }
                });
            });
        });

        function openEditModal(id) {
            // Fetch employee data from the backend (using the defined GET route)
            $.ajax({
                url: '/official/' + id,  // Laravel route to fetch employee data
                method: 'GET',
                success: function(data) {
                    // Populate modal fields with fetched data
                    $('#edit_employeeId').val(data.id);
                    $('#edit_position').val(data.position);
                    $('#edit_status').val(data.status);
                    $('#edit_date').val(data.date);

                    // Use Selectize to set the full name value
                    var selectize = $('#edit_fullName')[0].selectize;
                    selectize.setValue(data.full_name);  // Use full_name as the res_id
                    console.log(data.full_name);
                    
                    // Open the modal using Bootstrap's modal API
                    var myModal = new bootstrap.Modal(document.getElementById('editModal'));
                    myModal.show();
                },
                error: function() {
                    alert('Failed to load employee data');
                }
            });
        }

        function saveEmployeeData() {
            var id = $('#edit_employeeId').val();
            var fullName = $('#edit_fullName').val();
            var position = $('#edit_position').val();
            var status = $('#edit_status').val();
            var date = $('#edit_date').val();
            var pp = $('#edit_pp')[0].files[0];  // Get the file object from input

            // Check if a file has been selected for the profile picture
            var ppData = '';
            if (pp) {
                var reader = new FileReader();
                reader.onloadend = function() {
                    ppData = reader.result;  // This is the base64 data of the image

                    // Send the updated data to the backend using the POST route
                    sendEmployeeData(ppData);
                };
                reader.readAsDataURL(pp);  // Convert file to base64
            } else {
                // If no file is selected, just send the other data
                sendEmployeeData(ppData);
            }
        }

        function sendEmployeeData(ppData) {
            var id = $('#edit_employeeId').val();
            var fullName = $('#edit_fullName').val();
            var position = $('#edit_position').val();
            var status = $('#edit_status').val();
            var date = $('#edit_date').val();

            // Send the updated data to the backend using the POST route
            $.ajax({
                url: '/official/' + id,  // Laravel route to update employee data
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',  // CSRF token for security
                    full_name: fullName,
                    position: position,
                    status: status,
                    date: date,
                    pp: ppData  // Send profile picture data (base64 string)
                },
                success: function(response) {
                    // Handle successful update
                    alert(response.message);  // You can also use toastr or a custom success message
                    var myModal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
                    myModal.hide();
                    location.reload();  // Reload the page to reflect changes or you can update the table row dynamically
                },
                error: function(response) {
                    // Handle error
                    alert('Failed to update employee');
                }
            });
        }

                // Function to update the status of an employee
        function updateOfStatus(certId, newStatus) {
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            fetch('/update-official-status', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token  // CSRF token fetched from the meta tag
                },
                body: JSON.stringify({
                    id: certId,
                    status: newStatus
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Official status updated successfully');
                    location.reload(); // Optionally, reload the page to reflect the changes
                } else {
                    alert('Failed to update Official status');
                }
            })
            .catch(error => console.error('Error:', error));
        }


    </script>
</body>

