@include('layouts.headTreasurer')
<style>
    .container {
        max-width: 100%!important;
        margin-top: 80px; 
        padding-bottom:10px; 
    }

    .toggle-sidebar-btn {
        display: none;
    }

    .pagetitle {
        display: flex;
        justify-content: space-between
    }
    table.dataTable.stripe tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    .card {
        padding: 10px;
    }

    @media print {
        /* Set page orientation to landscape */
        @page {
            size: portrait;
            margin: 0mm; /* Set margins */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box; /* Ensure padding/border doesn't add extra space */
        }

        #example_filter, .dataTables_length, .dataTables_paginate, .dataTables_info {
            display: none!important;
        }

        /* Ensure the body and all child elements are visible during printing */
        body {
            visibility: visible !important;
            background-color: #FFF;
            margin: 0;
            padding: 0;
        }

        /* Hide unnecessary elements like page title, buttons, and other non-printable content */
        #header, .pagetitle, .dateFilter {
            display: none !important; /* Hide page title and button area */
        }

        .card-title, .nav, .col-lg-4 {
            display: none !important;
        }

        /* Make sure the card is visible and takes up the full page */
        .card {
            width: 1200px;
            position: absolute;
            top: 0;
            left: 0;
            visibility: visible !important;
            background-color: #fff;
            box-shadow: none;
            display: block;
            padding: 0; /* Adjust padding to prevent clipping */
            box-sizing: border-box;
            margin-top: 4px;
        }

        .card-body * {
            background-color: #fff;
        }
        
        .rightsContainer, .leftsContainer {
            height: 1120px;
        }
    }
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@include('layouts.headerTreasurer')
<body>
    <div id="container" class="container">

        <div class="pagetitle">
            <h1>Transaction</h1>
            <div class="btnArea">
                <button type="button" class="btn btn-primary" id="print"><i class="bi bi-printer-fill"></i> Print</button>
            </div>
        </div>
    
        <section class="section dashboard">
        <div class="row">
    
          <!-- Left side columns -->
          <div class="col-lg-8">
            <div class="card">
                <div class="card-body" style="width: 100%!important;">
                    <!-- Date Range Filter -->
                    <div class="dateFilter" style="margin-bottom: 20px;">
                        <label for="startDate">Start Date:</label>
                        <input type="date" id="startDate" name="startDate">
                        
                        <label for="endDate" style="margin-left: 10px;">End Date:</label>
                        <input type="date" id="endDate" name="endDate">
                    </div>
            
                    <!-- Table Structure -->
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th style="display: none;">ID</th>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Document Type</th>
                                <th>Date</th>
                                <th>Amount Paid</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                use Carbon\Carbon;
                                $currentDate = Carbon::today(); // Get today's date
                            @endphp
                            
                            @foreach($transactions as $index => $transaction)
                                @php
                                    $birthdate = \Carbon\Carbon::parse($transaction->res_bdate);
                                    $age = $birthdate->age;
                    
                                    $fullName = $transaction->res_fname . ' ' . $transaction->res_mname . ' ' . $transaction->res_lname;
                                    if ($transaction->res_suffix !== 'N/A') {
                                        $fullName .= ' ' . $transaction->res_suffix;
                                    }
                    
                                    $transactionCreatedAt = \Carbon\Carbon::parse($transaction->created_at);
                    
                                    if (!is_null($transaction->cert_id) && $transaction->certStatus === 'completed') {
                                        $documentType = 'Certification';
                                        $documentStatus = $transaction->certStatus;
                                        $price = 25.00;
                                    } elseif (!is_null($transaction->bcl_id) && $transaction->bcl_status === 'completed') {
                                        $documentType = 'Barangay Clearance';
                                        $documentStatus = $transaction->bcl_status;
                                        $price = 25.00;
                                    } elseif (!is_null($transaction->business_id) && $transaction->bc_status === 'completed') {
                                        $documentType = 'Business Permit';
                                        $documentStatus = $transaction->bc_status;
                                        $price = 30.00;
                                    } elseif (!is_null($transaction->blotter_id) && $transaction->blotter_status === 'completed') {
                                        $documentType = 'Blotter/Complaint';
                                        $documentStatus = $transaction->blotter_status;
                                        $price = 0.00; // Set appropriate price for this document type
                                    } else {
                                        $documentType = 'Unknown';
                                        $documentStatus = 'Unknown';
                                        $price = 0.00; // Default price for unknown type
                                    }
                                @endphp
                    
                                <!-- Add a condition to check if the status is 'completed' before displaying the row -->
                                @if($documentStatus === 'completed')
                                    <tr class="transaction-row" data-date="{{ $transaction->created_at }}" data-amount="{{ $transaction->tr_amountPaid }}">
                                        <td style="display: none;">{{ $transaction->tr_id }}</td>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $fullName }}</td>
                                        <td>{{ $documentType }}</td>
                                        <td>{{ $transaction->created_at }}</td>
                                        <td>{{ number_format($transaction->tr_amountPaid, 2) }}</td>
                                        <td>{{ $documentStatus }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    
            
                    <!-- Total Amount Paid Section Below the Table -->
                    <div style="margin-top: 20px;">
                        <label for="totalAmountPaid">Total Amount Paid:</label>
                        <input type="text" id="totalAmountPaid" name="totalAmountPaid" value="0.00" readonly style="width: 200px;">
                    </div>
                </div>
            </div>
          </div>
    
    
    
            <!-- Right side columns -->
            <div class="col-lg-4">
    
              <!-- Private Announcement -->
              <div class="card">
                <div class="card-body pb-0">
                  <h5 class="card-title">Private Announcement <span id="currentMonthSpanPrivate">| Today</span></h5>
                  <div class="news" id="schedules-container">
    
                  </div><!-- End sidebar recent posts-->
    
                </div>
              </div>
              <!-- End Private Announcement -->
    
              <!-- Public Announcement -->
              <div class="card">
                <div class="card-body pb-0">
                  <h5 class="card-title">Public Announcement <span id="currentMonthSpan">| Today</span></h5>
                  <div class="news" id="publicSchedules-container">
    
                  </div><!-- End sidebar recent posts-->
    
                </div>
              </div>
              <!-- End Public Announcement -->
    
            </div>
            <!-- End Right side columns -->
            </section>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    @include('layouts.footerTreasurer')
    <script>
        const printBtn = document.getElementById('print');
        printBtn.addEventListener('click', function() {
            window.print();
        });

        $(document).ready(function() {
            // Initialize DataTable with striped rows (default)
            var table = $('#example').DataTable({
                stripeClasses: ['even', 'odd'], // Optional: applies even/odd classes for striped rows
                order: [[4, 'desc']],  // Order by the 'created_at' column (index 4) in descending order
            });
        });


        document.addEventListener('DOMContentLoaded', () => {
    const startDateInput = document.getElementById('startDate');
    const endDateInput = document.getElementById('endDate');
    const totalAmountPaidInput = document.getElementById('totalAmountPaid');
    const rows = document.querySelectorAll('.transaction-row');

    // Set the default start date to today
    const today = new Date().toISOString().split('T')[0];
    startDateInput.value = today;

    // Update total amount paid
        const updateTotalAmountPaid = () => {
            const startDate = new Date(startDateInput.value);
            const endDate = endDateInput.value ? new Date(endDateInput.value) : null;
            let total = 0;

            console.clear(); // Clear previous logs

            rows.forEach((row, index) => {
                const rowDate = new Date(row.dataset.date); // Get row date from data-date attribute

                // Get the "Amount Paid" cell and extract its numeric value
                const amountPaidCell = row.cells[5]; // Assuming "Amount Paid" is in the 5th column (index 4)
                const rawAmount = amountPaidCell.textContent.trim().replace(/,/g, ''); // Remove commas
                const rowAmount = parseFloat(rawAmount) || 0; // Convert to number or default to 0

                console.log(`Row ${index + 1}:`, {
                    rawAmount,
                    rowAmount,
                    rowDate,
                    display: row.style.display,
                });

                // Check if the row's date is within the date range
                if (rowDate >= startDate && (!endDate || rowDate <= endDate)) {
                    total += rowAmount; // Add the amount from the "Amount Paid" column to total
                    row.style.display = ''; // Show the row if it matches the date filter
                } else {
                    row.style.display = 'none'; // Hide the row if it does not match the date filter
                }
            });

            console.log(`Total Amount Calculated: ${total}`);

            // Update the total amount paid input field
            totalAmountPaidInput.value = total.toFixed(2); // Format total to 2 decimal places
        };

        // Attach event listeners to the date inputs
        startDateInput.addEventListener('change', updateTotalAmountPaid);
        endDateInput.addEventListener('change', updateTotalAmountPaid);

        // Initial calculation on page load
        updateTotalAmountPaid();
    });

    </script>
</body>



