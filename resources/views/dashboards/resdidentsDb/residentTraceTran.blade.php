<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barangay Information System</title>
    <link rel="stylesheet" href="/css/dbResidents.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="headerCon">
        <a href="{{ route('dbResidents') }}"><button class="service">Services</button></a>
        <a href=""><button class="about">About</button></a>
        <a href="{{ route('residentTraceTran') }}"><button class="track active">Trace Transaction</button></a>
    </div>

    <div class="container">
        <div class="imageContainer">
            <img src="/images/logo.png" alt="logo" class="imageLogo">
        </div>

        <div class="addressDisplay">
            <span class="completeAdd">REPUBLIC OF THE PHILIPPINES</span>
            <span class="completeAdd">PROVINCE OF CEBU</span>
            <span class="completeAdd">MUNICIPALITY OF MINGLANILLA</span>
            <span class="completeAdd brgy"><i>BARANGAY POBLACION WARD II</i></span>
        </div>

        <div class="greetings">
            <span class="greet">ENTER THE TRANSACTION CODE TO TRACE THE PROGRESS OF YOUR REQUEST!</span>
        </div>

        <div class="services traces">
            <form action="{{ route('traceTransaction') }}" method="post" class="traceCon">
                @csrf
                <div class="mb-3 codeInput">
                    <label for="transactionCode" class="form-label"><b>Transaction Code</b></label>
                    <input type="text" class="form-control" id="transactionCode" name="transactionCode">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    @if(isset($result))
    <div class="tablePart">
        @if($type == 'blotter')
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Complainants</th>
                        <th>Respondents</th>
                        <th>Date</th>
                        <th>Status</th>
                        @if($result->blotter_status == 'pending')
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $result->blotter_id }}</td>
                        <td>{{ $result->res_fname }} {{ $result->res_mname }} {{ $result->res_lname }}</td>
                        <td>{{ $result->blotter_respondents }}</td>
                        <td>{{ $result->blotter_complaintMade }}</td>
                        <td>{{ $result->blotter_status }}</td>
                        @if($result->blotter_status == 'pending')
                            <td>
                                <button type="button" class="btn btn-danger" onclick="cancelBlotter({{ $result->blotter_id }})">Cancel</button>
                            </td>
                        @endif
                    </tr>
                </tbody>
            </table>
        @elseif($type == 'certificate')
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Purok</th>
                        <th>Status</th>
                        <th>Purpose</th>
                        @if($result->certStatus == 'pending')
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $result->id }}</td>
                        <td>{{ $result->res_fname }} {{ $result->res_mname }} {{ $result->res_lname }}</td>
                        <td>{{ \Carbon\Carbon::parse($result->res_bdate)->age }}</td>
                        <td>{{ $result->res_purok }}</td>
                        <td>{{ $result->certStatus }}</td>
                        <td>{{ $result->cert_purpose }}</td>
                        @if($result->certStatus == 'pending')
                            <td>
                                <button type="button" class="btn btn-danger" onclick="cancelCertificate({{ $result->id }})">Cancel</button>
                            </td>
                        @endif
                    </tr>
                </tbody>
            </table>
        @elseif($type == 'clearance')
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Purok</th>
                        <th>Status</th>
                        <th>Purpose</th>
                        @if($result->bcl_status == 'pending')
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $result->bcl_id }}</td>
                        <td>{{ $result->res_fname }} {{ $result->res_mname }} {{ $result->res_lname }}</td>
                        <td>{{ \Carbon\Carbon::parse($result->res_bdate)->age }}</td>
                        <td>{{ $result->res_purok }}</td>
                        <td>{{ $result->bcl_status }}</td>
                        <td>{{ $result->bcl_purpose }}</td>
                        @if($result->bcl_status == 'pending')
                            <td>
                                <button type="button" class="btn btn-danger" onclick="cancelClearance({{ $result->bcl_id }})">Cancel</button>
                            </td>
                        @endif
                    </tr>
                </tbody>
            </table>
        @elseif($type == 'business')
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
                        @if($result->bc_status == 'pending')
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $result->id }}</td>
                        <td>{{ $result->res_fname }} {{ $result->res_mname }} {{ $result->res_lname }}</td>
                        <td>{{ \Carbon\Carbon::parse($result->res_bdate)->age }}</td>
                        <td>{{ $result->res_purok }}</td>
                        <td>{{ $result->bc_businessName }}</td>
                        <td>{{ $result->bc_businessAddress }}</td>
                        <td>{{ $result->bc_pickUpDate }}</td>
                        <td>{{ $result->bc_status }}</td>
                        @if($result->bc_status == 'pending')
                            <td>
                                <button type="button" class="btn btn-danger" onclick="cancelBusiness({{ $result->id }})">Cancel</button>
                            </td>
                        @endif
                    </tr>
                </tbody>
            </table>
        @endif
    </div>
@endif

    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        });



        function cancelBlotter(blotter_id) {
    $.ajax({
        url: '/cancelBlotter',
        method: 'POST',
        data: { 
            id: blotter_id,
            _token: '{{ csrf_token() }}' // Include CSRF token
        },
        success: function(response) {
            alert('Blotter cancelled successfully');
            location.reload();
        },
        error: function(error) {
            alert('Error cancelling blotter');
        }
    });
}

function cancelCertificate(cert_id) {
    $.ajax({
        url: '/cancelCertificate',
        method: 'POST',
        data: { 
            id: cert_id,
            _token: '{{ csrf_token() }}' // Include CSRF token
        },
        success: function(response) {
            alert('Certificate cancelled successfully');
            location.reload();
        },
        error: function(error) {
            alert('Error cancelling certificate');
        }
    });
}

function cancelClearance(clearance_id) {
    $.ajax({
        url: '/cancelClearance',
        method: 'POST',
        data: { 
            id: clearance_id,
            _token: '{{ csrf_token() }}' // Include CSRF token
        },
        success: function(response) {
            alert('Clearance cancelled successfully');
            location.reload();
        },
        error: function(error) {
            alert('Error cancelling clearance');
        }
    });
}

function cancelBusiness(business_id) {
    $.ajax({
        url: '/cancelBusiness',
        method: 'POST',
        data: { 
            id: business_id,
            _token: '{{ csrf_token() }}' // Include CSRF token
        },
        success: function(response) {
            alert('Business permit cancelled successfully');
            location.reload();
        },
        error: function(error) {
            alert('Error cancelling business permit');
        }
    });
}


    </script>
    <script src="/js/residentDb.js"></script>
</body>
</html>
