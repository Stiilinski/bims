@include('layouts.headHealthWorkers')
<style>
    .card-body {
        overflow: auto;
    }
    
    .pagetitle {
        display: flex;
        justify-content: space-between;
    }

    .averageField {
        width: 450px;
    }

    .inputField1, .inputField2 {
        width: 100%;
    }

    .modal-body {
        display: flex;
        flex-direction: column
    }

    .personalInfo {
        display: flex;
        justify-content: space-evenly;
    }

    .inputGroup {
        display: flex;
        justify-content: space-evenly;
    }

    .grpField {
        width: 150px!important;
    }

    .smokers {
        border: solid 1px #dee2e6;
        display: flex;
        align-items: center;
        padding: 10px;
        margin-left: 2px;
        border-radius: 0.375rem;
        width: 100%;
    }

    .smokersCon {
    
    }

    .grpField2 {
        width: 100%!important;
    }

    .inputGroup2 {
        display: flex;
        width: 100%!important;
        overflow: hidden;
        justify-content: space-between;
        align-items: center;
        
    }

    .medicines {
        width: 70%!important;
    }

    .quants {
        width: 300px!important;
    }

    .signature-container {
        position: relative;
    }

    #signaturePad {
        width: 100%;
        height: 200px;
        border: 1px solid #ccc;
    }

    .yearSupply {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        
    }

    .yearMed {
        font-weight: 700!important;
    }

    .alertCon{
        padding: 10px;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .alert-success {
        width: 100%;
    }

    @media print {
        body * {
            visibility: hidden;
            background-color:#fff; 
        }

        .main, html * {
            visibility: hidden;
            background-color:#fff; 
            padding: 0!important;
        }

        .pagetitle, .header {
            display: none!important;
        }

        .card {
            width: 100%;
            position: absolute;
            top: 0;
            visibility: visible !important;
            background-color:#fff; 
            box-shadow: none;
            display: flex;
            justify-content: center;
        }

        th, td {
            font-size: 12px;
        }



        .card-body * {
            visibility: visible;
            background-color: #fff
        }

        .datatable-top *{
            display: none!important;
        }

        .datatable th:nth-child(1),
        .datatable td:nth-child(1),
        .datatable th:nth-child(3),
        .datatable td:nth-child(3),
        .datatable th:nth-child(7),
        .datatable td:nth-child(7),
        .datatable th:nth-child(9),
        .datatable td:nth-child(9),
        .datatable th:nth-child(11),
        .datatable td:nth-child(11),
        .datatable th:nth-child(12),
        .datatable td:nth-child(12)
        {
            display: none !important;
        }

        .datatable-bottom * {
            display: none !important;
        }

        .datatable-container {
            border-bottom: none!important;
        }

        .datatable-sorter::after,
        .datatable-sorter::before{
            display: none !important;
        }

    }
</style>
<body>

  <!-- ======= Header ======= -->
    @include('layouts.headerHealthWorkers')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
    @include('layouts.sidebarHealthWorkers')
  <!-- End Sidebar -->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Medicine Records</h1>
        <div class="btnArea">
            <button type="button" class="btn btn-primary" id="print"><i class="bi bi-printer-fill"></i> Print</button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">New Record</button>  
        </div>
    </div><!-- End Page Title -->
  
    <div class="card">
        <div class="card-body">
            <div class="yearSupply">
                <h3 class="yearMed">MEDICINE SUPPLIES CY {{ date('Y') }}</h3>
            </div>
            <!-- Table with stripped rows -->
            <table class="table table-striped datatable">
                <thead>
                    <tr>
                        <th scope="col" style="display: none;">ID</th>
                        <th scope="col">Item No.</th>
                        <th scope="col">NDC</th>
                        <th scope="col">Product/Service Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Qt.</th>
                        <th scope="col">Date of Purchases</th>
                        <th scope="col">Expiration Date</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medicine as $index => $medicines)
                    <tr>
                        <td style="display: none;">{{ $medicines->med_id }}</td>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $medicines->med_ndc }}</td>
                        <td>{{ $medicines->med_prod}}</td>
                        <td>{{ $medicines->med_desc }}</td>
                        <td>{{ $medicines->med_qtBox }}</td>
                        <td>{{ $medicines->med_count}}</td>
                        <td>{{ $medicines->med_datePurchases}}</td>
                        <td>{{ $medicines->med_dateExpiration}}</td>
                        <td>{{ $medicines->med_remarks}}</td>
                        <td>{{ $medicines->med_status}}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item" type="button">Edit</button></li>
                                    <li><button class="dropdown-item" type="button" onclick="updateMedStatus({{ $medicines->med_id }}, 'Available')">Available</button></li>
                                    <li><button class="dropdown-item" type="button" onclick="updateMedStatus({{ $medicines->med_id }}, 'Out Of Stock')">Out Of Stock</button></li>
                                    <li><button class="dropdown-item" type="button" onclick="updateMedStatus({{ $medicines->med_id }}, 'Archive')">Archive</button></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
          <!-- End Table with stripped rows -->
        </div>
    </div>

    <!-- For Insert Medicine -->
    <div class="modal fade" id="ExtralargeModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Medicine</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="alertCon">
            <div id="alert-container"></div>
        </div>
        <form method="POST" action="{{ route('regValidation.inputMedicine')}}" class="medecineForm" id="medForm" autocomplete="off"> <!-- Horizontal Form -->
        @csrf
            <div class="modal-body">
                <div class="personalInfo">
                    <div class="inputField1"> 
                        <div class="column mb-3">
                            <label for="inputNdc" class="col-sm-5 col-form-label">NDC</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNdc" name="inputNdc">
                                <span class="text-danger error-text inputNdc_error"></span>
                            </div>
                        </div>

                        <div class="column mb-3">
                            <label for="inputProd" class="col-sm-5 col-form-label">Product/Service Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputProd" name="inputProd">
                                <span class="text-danger error-text inputProd_error"></span>
                            </div>
                        </div>

                        <div class="column mb-3">
                            <label for="inputDesc" class="col-sm-5 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputDesc" name="inputDesc">
                                <span class="text-danger error-text inputDesc_error"></span>
                            </div>
                        </div>

                        <div class="column mb-3">
                            <label for="inputBox" class="col-sm-5 col-form-label">Quantity (Per Boxes)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputBox" name="inputBox" oninput="product()">
                                <span class="text-danger error-text inputBox_error"></span>
                            </div>
                        </div>

                        <div class="column mb-3">
                            <label for="inputCount" class="col-sm-5 col-form-label">Count (Per Tablet)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputCount" name="inputCount" oninput="product()">
                                <span class="text-danger error-text inputCount_error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="inputField2"> 
                        <div class="column mb-3">
                            <label for="inputTotalCount" class="col-sm-5 col-form-label">Total Count</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputTotalCount" name="inputTotalCount" readonly>
                                <span class="text-danger error-text inputTotalCount_error"></span>
                            </div>
                        </div>
                        
                        <div class="column mb-3" style="display: none;">
                            <label for="inputEmp" class="col-sm-5 col-form-label">Employee</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmp" name="inputEmp" value="<?php echo $LoggedUserInfo['em_id']; ?>">
                                <span class="text-danger error-text inputEmp_error"></span>
                            </div>
                        </div>

                        <div class="column mb-3">
                            <label for="inputDatePurchase" class="col-sm-5 col-form-label">Date Of Purchase</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="inputDatePurchase" name="inputDatePurchase">
                                <span class="text-danger error-text inputDatePurchase_error"></span>
                            </div>
                        </div>

                        <div class="column mb-3">
                            <label for="inputDateExpired" class="col-sm-5 col-form-label">Expiration Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="inputDateExpired" name="inputDateExpired">
                                <span class="text-danger error-text inputDateExpired_error"></span>
                            </div>
                        </div>
                        
                        <div class="column mb-3">
                            <label for="inputRemarks" class="col-sm-5 col-form-label">Remarks</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputRemarks" name="inputRemarks">
                                <span class="text-danger error-text inputRemarks_error"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form><!-- End Horizontal Form -->
        </div>
    </div>
    </div><!-- End For Insert Medicine-->

    <!-- Edit Medicine Modal -->
    <div class="modal fade" id="editMedicineModal" tabindex="-1" aria-labelledby="editMedicineModalLabel" aria-hidden="true">
        <div class="modal-dialog custom-modal-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMedicineModalLabel">Edit Medicine</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="alert-container"></div> <!-- Alert container for dynamic messages -->
                <form id="editMedicineForm">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="med_id" name="med_id">
        
                        <div class="mb-3">
                            <label for="edit_med_ndc" class="form-label">NDC</label>
                            <input type="text" class="form-control" id="edit_med_ndc" name="med_ndc">
                        </div>
                        <div class="mb-3">
                            <label for="edit_med_prod" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="edit_med_prod" name="med_prod">
                        </div>
                        <div class="mb-3">
                            <label for="edit_med_desc" class="form-label">Description</label>
                            <input type="text" class="form-control" id="edit_med_desc" name="med_desc">
                        </div>
                        <div class="mb-3">
                            <label for="edit_med_qtBox" class="form-label">Quantity Per Box</label>
                            <input type="number" class="form-control" id="edit_med_qtBox" name="med_qtBox">
                        </div>
                        <div class="mb-3">
                            <label for="edit_med_count" class="form-label">Total Quantity</label>
                            <input type="number" class="form-control" id="edit_med_count" name="med_count">
                        </div>
                        <div class="mb-3">
                            <label for="edit_med_datePurchases" class="form-label">Date of Purchases</label>
                            <input type="date" class="form-control" id="edit_med_datePurchases" name="med_datePurchases">
                        </div>
                        <div class="mb-3">
                            <label for="edit_med_dateExpiration" class="form-label">Expiration Date</label>
                            <input type="date" class="form-control" id="edit_med_dateExpiration" name="med_dateExpiration">
                        </div>
                        <div class="mb-3">
                            <label for="edit_med_remarks" class="form-label">Remarks</label>
                            <input type="text" class="form-control" id="edit_med_remarks" name="med_remarks">
                        </div>
                        <div class="mb-3">
                            <label for="edit_med_status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="edit_med_status" name="med_status">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Medicine</button> <!-- Submit button triggers form submit event -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End For Edit Medicine-->
  

</main><!-- End #main -->

  @include('layouts.footerHealthWorkers')
  <script>
    function product() 
    {
        const qtBox = parseFloat(document.getElementById('inputBox').value) || 0;
        const qtCount = parseFloat(document.getElementById('inputCount').value) || 0;
        const totalCount = qtBox * qtCount;

        document.getElementById('inputTotalCount').value = totalCount;
    }

    const printBtn = document.getElementById('print');
    printBtn.addEventListener('click', function() {
        window.print();
    });

    //insert medicine
    $(function(){      
        $("#medForm").on('submit', function(e){
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function(){
                    $(document).find('span.error-text').text('');
                },
                success: function(data){
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val){
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        // Clear the form
                        $('#medForm')[0].reset();

                        // Create and append the success alert
                        const alertHtml = `
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                ${data.msg} 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;

                        // Append the alert to your alert container
                        $('#alert-container').append(alertHtml);

                        // Remove alert after 3 seconds
                        setTimeout(() => {
                            $('.alert').alert('close');
                            location.reload();
                        }, 1000);

                    }
                },
                error: function(xhr) {
                    const alertHtml = `
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-circle me-1"></i>
                            Failed to add new Medicine. Please try again. 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;
                    
                    $('#alert-container').append(alertHtml);

                        // Remove alert after 3 seconds
                        setTimeout(() => {
                            $('.alert').alert('close');
                        }, 3000);

                }
            });
        });
    });

    //open edit medicine
    $(document).on('click', '.dropdown-item:contains("Edit")', function() {
        // Get the current row data
        var row = $(this).closest('tr');
        var med_id = row.find('td:eq(0)').text();
        var med_ndc = row.find('td:eq(2)').text();
        var med_prod = row.find('td:eq(3)').text();
        var med_desc = row.find('td:eq(4)').text();
        var med_qtBox = row.find('td:eq(5)').text();
        var med_count = row.find('td:eq(6)').text();
        var med_datePurchases = row.find('td:eq(7)').text();
        var med_dateExpiration = row.find('td:eq(8)').text();
        var med_remarks = row.find('td:eq(9)').text();
        var med_status = row.find('td:eq(10)').text();

        // Populate the modal fields with the selected data
        $('#med_id').val(med_id);
        $('#edit_med_ndc').val(med_ndc);
        $('#edit_med_prod').val(med_prod);
        $('#edit_med_desc').val(med_desc);
        $('#edit_med_qtBox').val(med_qtBox);
        $('#edit_med_count').val(med_count);
        $('#edit_med_datePurchases').val(med_datePurchases);
        $('#edit_med_dateExpiration').val(med_dateExpiration);
        $('#edit_med_remarks').val(med_remarks);
        $('#edit_med_status').val(med_status);

        // Show the modal
        $('#editMedicineModal').modal('show');
    });

    //edit medicine
    $(document).on('submit', '#editMedicineForm', function (e) {
        e.preventDefault(); // Prevent default form submission behavior

        var med_id = $('#med_id').val(); // Get the medicine ID

        // Create a FormData object with the form fields
        var formData = new FormData();
        formData.append('med_id', med_id);
        formData.append('med_ndc', $('#edit_med_ndc').val());
        formData.append('med_prod', $('#edit_med_prod').val());
        formData.append('med_desc', $('#edit_med_desc').val());
        formData.append('med_qtBox', $('#edit_med_qtBox').val());
        formData.append('med_count', $('#edit_med_count').val());
        formData.append('med_datePurchases', $('#edit_med_datePurchases').val());
        formData.append('med_dateExpiration', $('#edit_med_dateExpiration').val());
        formData.append('med_remarks', $('#edit_med_remarks').val());
        formData.append('med_status', $('#edit_med_status').val());

        $.ajax({
            type: "POST",
            url: "/update-medicine/" + med_id, // URL to handle the update
            data: formData,
            dataType: "json",
            contentType: false, // Needed for FormData
            processData: false, // Needed for FormData
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
            },
            success: function(response) {
                if (response.status === 400) {
                    $('#alert-container').html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i> Validation Error. Please check the fields.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                } else if (response.status === 404) {
                    $('#alert-container').html(`
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i> Medicine Not Found.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                } else {
                    $('#alert-container').html(`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i> Medicine updated successfully!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                    $('#editMedicineModal').modal('hide'); // Hide the modal
                    location.reload(); // Optionally reload the page to reflect changes
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log error response for debugging
                alert("An error occurred. Please check the console for more details.");
            }
        });
    });

    //update status
    function updateMedStatus(medId, newStatus) 
    {
        fetch('/update-med-status', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Ensure you include the CSRF token for security
            },
            body: JSON.stringify({
                id: medId,
                status: newStatus
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Medicine status updated successfully');
                location.reload(); // Optionally, reload the page to reflect the changes
            } else {
                alert('Failed to update Medicine status');
            }
        })
        .catch(error => console.error('Error:', error));
    }

  </script>
</body>
</html>