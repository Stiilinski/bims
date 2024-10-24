@include('layouts.headHealthWorkers')
<style>
    .card-body {
        overflow: auto;
    }
    
    .pagetitle {
        display: flex;
        justify-content: space-between;
    }

    .form-control {
        width: 450px;
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

    .select2-selection {
        border: none!important;
    }

    .select2-container--default {
        height: 37.6px!important;
        padding: .375rem 2.25rem .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        border: #dee2e6 solid 1px;
        border-radius: 0.375rem; 
        background-color: #fff;
    }

    .personalInfo2 {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .infos, .info, .iinfo2 {
        font-size: 14px;
        font-weight: 700;
        display: flex;
        align-items: center;
        height: 100%!important;        
    }

    .personInfo2 {
        display: flex;
        align-items: center;
    }

    .info1 {
        justify-content: space-between;
    }

    .pName {
        width: 420px;
        display: flex;
        align-items: center;
        font-size: 20px;
        gap: 10px;
    }

    .titleCard {
        font-weight: 700;
    }

    .cardTitle {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 15px;
    }
    .value 
    {
        margin-left: 10px;
        font-weight: 500;
        font-size: 16px;
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
        <h1>Individual Client Treatment Report</h1>
        <div class="btnArea">
            <button type="button" class="btn btn-primary"><i class="bi bi-printer-fill"></i> Print</button>
        </div>
    </div><!-- End Page Title -->

    <div class="row g-3 pt-2">
        <div class="col-md-12 pt-2 d-flex" style="gap: 20px; align-items:center;">
            <label for="inputPatientName" class="form-label">Patient Full Name</label>
            <select id="inputPatientName" class="form-control" name="inputPatientName" onchange="updateResidentDetails(this)">
                <option value="">Select...</option>
                @foreach($residents as $resident)
                    <option value="{{ $resident->res_id }}">
                        {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="cardTitle"><h2 class="titleCard">Individual Client Treatment Report</h2></div>

            <div class="personalInfo2">
                <div class="personInfo2 info1 mb-3">
                    <div class="iinfo2">
                        <span class="infos">Patient:</span> <span class="infoFullName value"> Name</span>
                    </div>
                    <div class="iinfo2">
                        <span class="infos">Adult:</span> <span class="infoAdult value">N/A</span>
                    </div>
                </div>

                <div class="personInfo2 mb-3">
                    <span class="infos">Age:</span> <span class="infoAge value">N/A</span>
                </div>
                
                <div class="personInfo2 mb-3">
                    <span class="infos">Birthday:</span> <span class="infoBday value">N/A</span>
                </div>

                <div class="personInfo2 mb-3">
                    <span class="infos">Civil Status:</span> <span class="infoCivil value">N/A</span>
                </div>

                <div class="personInfo2 mb-3">
                    <span class="infos">Address:</span> <span class="infoAddress value">N/A</span>
                </div>

                <div class="personInfo2 mb-3">
                    <span class="infos">Contact Number:</span> <span class="infoContact value">N/A</span>
                </div>
            </div>
            <!-- Table with stripped rows -->
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Complaints/Findings</th>
                    <th scope="col">Treatment</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Height</th>
                    <th scope="col">Temperature</th>                    
                    <th scope="col">LGU</th>
                    <th scope="col">BRGY.</th>
                </tr>
                </thead>
                <tbody id="serviceRecordsTableBody">
                    <!-- Service records will be populated here -->
                </tbody>
            </table>
          <!-- End Table with stripped rows -->
        </div>
    </div>
</main><!-- End #main -->



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script>
    const residentData = {
        @foreach($residents as $resident)
            "{{ $resident->res_id }}": {
                res_bdate: "{{ addslashes($resident->res_bdate) }}",
                res_fname: "{{ $resident->res_fname }}",
                res_mname: "{{ $resident->res_mname }}",
                res_lname: "{{ $resident->res_lname }}",
                res_suffix: "{{ $resident->res_suffix }}",
                res_civil: "{{ $resident->res_civil }}",
                res_address: "{{ $resident->res_address }}",
                res_contact: "{{ $resident->res_contact }}"
            },
        @endforeach
    };

    $(document).ready(function () {
        $('#inputPatientName').selectize({
            sortField: 'text'
        });
    });

    function updateResidentDetails(selectElement) 
    {
        const selectedId = selectElement.value;

        if (selectedId) {
            const residentInfo = residentData[selectedId];

            if (residentInfo) {
                // Update patient information (same as before)
                document.querySelector('.infoFullName').textContent = `${residentInfo.res_lname}, ${residentInfo.res_fname} ${residentInfo.res_mname ?? ''} ${residentInfo.res_suffix ?? ''}`;
                const age = calculateAge(residentInfo.res_bdate);
                document.querySelector('.infoAge').textContent = age;
                document.querySelector('.infoBday').textContent = residentInfo.res_bdate;
                document.querySelector('.infoCivil').textContent = residentInfo.res_civil;
                document.querySelector('.infoAddress').textContent = residentInfo.res_address;
                document.querySelector('.infoContact').textContent = residentInfo.res_contact;
                document.querySelector('.infoAdult').textContent = age >= 18 ? 'Yes' : 'No';

                // Now fetch service records and populate the table
                fetchServiceRecords(selectedId);
            }
        } else {
            // Clear patient details and table if no resident is selected
            clearPatientDetails();
            clearServiceRecords();
        }
    }

    function fetchServiceRecords(residentId) {
        // Clear previous table rows
        const tableBody = document.getElementById('serviceRecordsTableBody');
        tableBody.innerHTML = '';

        // Make an AJAX request to fetch service records
        $.ajax({
            url: '/service-records/' + residentId, // This will still use the residentId
            type: 'GET',
            success: function(response) {
                if (response.status === 1) {
                    const records = response.data; // This should now be an array

                    // Check if records is actually an array
                    if (Array.isArray(records) && records.length > 0) {
                        let tableBodyContent = '';

                        // Loop through each record and add rows to the table
                        records.forEach(record => {
                            let dsr = record.dsr;
                            let medicine = record.medicine;

                            tableBodyContent += `
                                <tr>
                                    <td>${record.rmed_id}</td>
                                    <td>${dsr ? dsr.dsr_dateVisit : 'N/A'}</td>
                                    <td>${dsr ? dsr.dsr_complaint : 'N/A'}</td>
                                    <td>${medicine ? medicine.med_prod : 'N/A'}</td>
                                    <td>${dsr ? dsr.dsr_wt : 'N/A'}</td>
                                    <td>${dsr ? dsr.dsr_ht : 'N/A'}</td>
                                    <td>${dsr ? dsr.dsr_temp : 'N/A'}</td>
                                    <td>${dsr && dsr.dsr_signatureLgu ? `<img src="/${dsr.dsr_signatureLgu}" alt="LGU Signature" style="width: 100%; height: 50px;">` : 'N/A'}</td>
                                    <td>${dsr && dsr.dsr_signatureBrgy ? `<img src="/${dsr.dsr_signatureBrgy}" alt="Barangay Signature" style="width: 100%; height: 50px;">` : 'N/A'}</td>
                                </tr>
                            `;
                        });

                        // Populate the table body
                        tableBody.innerHTML = tableBodyContent; // Use innerHTML directly
                    } else {
                        // Call clearServiceRecords if there are no records
                        clearServiceRecords();
                    }
                } else {
                    alert(response.msg);
                }
            },
            error: function(xhr) {
                console.error('Error fetching service records:', xhr.responseText);
                // Optionally call clearServiceRecords() here if needed
                clearServiceRecords();
            }
        });
    }

    function clearServiceRecords() {
        const tableBody = document.getElementById('serviceRecordsTableBody');
        tableBody.innerHTML = '<tr><td colspan="9">No service records found.</td></tr>'; // Show message when no records are available
    }


    function clearPatientDetails() {
        document.querySelector('.infoFullName').textContent = 'Name';
        document.querySelector('.infoAge').textContent = 'N/A';
        document.querySelector('.infoBday').textContent = 'N/A';
        document.querySelector('.infoCivil').textContent = 'N/A';
        document.querySelector('.infoAddress').textContent = 'N/A';
        document.querySelector('.infoContact').textContent = 'N/A';
        document.querySelector('.infoAdult').textContent = 'N/A';
    }

    // Function to calculate age from birthdate
    function calculateAge(birthDate) {
        const birth = new Date(birthDate);
        const today = new Date();
        let age = today.getFullYear() - birth.getFullYear();
        const monthDiff = today.getMonth() - birth.getMonth();

        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birth.getDate())) {
            age--;
        }
        
        return age;
    }



</script>


  @include('layouts.footerHealthWorkers')
</body>

</html>