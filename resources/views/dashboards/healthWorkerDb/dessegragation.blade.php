@include('layouts.headHealthWorkers')
<style>
    .btnArea {
        display: flex;
        width: 30%;
        height: 40px;
        gap: 10px;
    }

    .card-body {
        overflow: auto;
        padding: 15px
    }
    
    .pagetitle {
        display: flex;
        justify-content: space-between;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }
    th, td {
        padding: 8px;
        text-align: center;
    }
    th {
        background-color: #f2f2f2;
    }
    .mainTitle {
        display: flex;
        justify-content: center;
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
        <h1>Dissagragation of Sex & Age</h1>
        <div class="btnArea">
            <select id="purokSelect" class="form-select" aria-label="Default select example">
                <option value="Tugas" selected>Tugas</option>
                <option value="Tambis">Tambis</option>
                <option value="Mahogany">Mahogany</option>
                <option value="Guyabano">Guyabano</option>
                <option value="Mansinitas">Mansinitas</option>
                <option value="Ipil-Ipil">Ipil-Ipil</option>
                <option value="Lubi">Lubi</option>
            </select>

            <button type="button" class="btn btn-primary" style="width: 40%;"><i class="bi bi-printer-fill"></i> Print</button>
        </div>
    </div><!-- End Page Title -->
  
    <div class="card">
        <div class="card-body">
            <div class="titleArea">
                <div class="mainTitle">
                    <h4>Dissagragation By Single and Year</h4>
                </div>
                <h6>Barangay: Poblacion Ward II</h6>
                <h6>Purok: <span id="selectedPurok">Tugas</span></h6>
                <h6>BHW: </h6>
            </div>
            <!-- Table with stripped rows -->
            <table>
                <thead>
                    <tr>
                        <th>Age</th>
                        <th>Sex</th>
                        <th>Number</th>
                        <th>Age</th>
                        <th>Sex</th>
                        <th>Number</th>
                        <th>Age</th>
                        <th>Sex</th>
                        <th>Number</th>
                        <th>Age</th>
                        <th>Sex</th>
                        <th>Number</th>
                    </tr>
                </thead>
                <tbody id="residentTableBody">
                    <!-- The data will be dynamically injected here -->
                </tbody>
            </table>
          <!-- End Table with stripped rows -->
        </div>
    </div>
</main><!-- End #main -->


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
document.getElementById('purokSelect').addEventListener('change', function() {
    var purok = this.value;
    
    // Update the displayed purok
    document.getElementById('selectedPurok').innerText = purok;
    
    // Make an AJAX request to fetch residents by purok
    fetch(`/api/residents-by-purok?purok=${purok}`)
        .then(response => response.json())
        .then(data => {
            // Build the table rows based on the response data
            let tableBody = document.getElementById('residentTableBody');
            tableBody.innerHTML = ''; // Clear previous content
            
            for (let age = 1; age <= 25; age++) {
                let row = `
                    <tr>
                        <!-- 1st side: Ages 1 to 25 -->
                        <td rowspan="2">${age}</td>
                        <td>Male</td>
                        <td>${data[age]?.Male ?? 0}</td>
            
                        <!-- 2nd side: Ages 26 to 50 -->
                        <td rowspan="2">${age + 25}</td>
                        <td>Male</td>
                        <td>${data[age + 25]?.Male ?? 0}</td>

                        <!-- 3rd side: Ages 51 to 75 -->
                        <td rowspan="2">${age + 50}</td>
                        <td>Male</td>
                        <td>${data[age + 50]?.Male ?? 0}</td>

                        <!-- 4th side: Ages 76 to 100 -->
                        <td rowspan="2">${age + 75}</td>
                        <td>Male</td>
                        <td>${data[age + 75]?.Male ?? 0}</td>
                    </tr>
                    <tr>
                        <!-- Female entries -->
                        <td>Female</td>
                        <td>${data[age]?.Female ?? 0}</td>

                        <td>Female</td>
                        <td>${data[age + 25]?.Female ?? 0}</td>

                        <td>Female</td>
                        <td>${data[age + 50]?.Female ?? 0}</td>

                        <td>Female</td>
                        <td>${data[age + 75]?.Female ?? 0}</td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            }
        });
});


</script>

  @include('layouts.footerHealthWorkers')
</body>
</html>