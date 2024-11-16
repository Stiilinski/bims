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

        /* Ensure the body and all child elements are visible during printing */
        body {
            visibility: visible !important;
            background-color: #FFF;
            margin: 0;
            padding: 0;
        }

        /* Hide unnecessary elements like page title, buttons, and other non-printable content */
        #header, .pagetitle {
            display: none !important; /* Hide page title and button area */
        }

        .card-title, .nav {
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
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th style="display: none;">ID</th>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Document Type</th>
                                <th>Date</th>
                                <th>Price</th>
                                <th>Amount Paid</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalRevenue = 0;
                            @endphp
                            @foreach($transactions as $transaction)
                                @php
                                    // Calculate age
                                    $birthdate = \Carbon\Carbon::parse($transaction->res_bdate);
                                    $age = $birthdate->age;
                                    // Concatenate full name
                                    $fullName = $transaction->res_fname . ' ' . $transaction->res_mname . ' ' . $transaction->res_lname;
                                    if ($transaction->res_suffix !== 'N/A') {
                                        $fullName .= ' ' . $transaction->res_suffix;
                                    }
                                    // Determine document type and status
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
                                    } elseif (!is_null($transaction->blotter_id)) {
                                        $documentType = 'Blotter/Complaint';
                                        $documentStatus = $transaction->blotter_status;
                                        $price = 0.00; // Set appropriate price for this document type
                                    } else {
                                        $documentType = 'Unknown';
                                        $documentStatus = 'Unknown';
                                        $price = 0.00; // Default price for unknown type
                                    }
                                    // Accumulate total revenue if the status is "ready to pick up"
                                    if ($documentStatus === 'completed') {
                                        $totalRevenue += $transaction->tr_amountPaid;
                                    }
                                @endphp
                                @if($documentStatus === 'completed')
                                    <tr>
                                        <td>{{ $transaction->tr_id }}</td>
                                        <td>{{ $fullName }}</td>
                                        <td>{{ $documentType }}</td>
                                        <td>{{ $transaction->created_at }}</td>
                                        <td>{{ number_format($price, 2) }}</td>
                                        <td>{{ $transaction->tr_amountPaid }}</td>
                                        <td>{{ $documentStatus }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
    
    
    
            <!-- Right side columns -->
            <div class="col-lg-4">
    
              <!-- Private Announcement -->
              <div class="card">
                <div class="card-body pb-0">
                  <h5 class="card-title">Private Announcement <span>| Today</span></h5>
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
                order: [[3, 'desc']],  // Order by the 'created_at' column (index 4) in descending order
            });
        });
    </script>
</body>



