@include('layouts.head')
<style>
    @media print {
    html {
        visibility: hidden;
    }

    body * {
        visibility: hidden;
    }
    .tablePart {
        visibility: visible !important;
        position: absolute;
        left: 50%; /* Position 50% from the left edge */
        top: 0;
        transform: translateX(-50%); /* Center horizontally */
        width: 100%;
    }


    .tablePart * {
        visibility: visible;
    }

    .btnview {
        visibility: hidden;
    }

    .dataTables_filterdiv.dataTables_wrapper div.dataTables_length,div.dataTables_wrapper div.dataTables_filter,div.dataTables_wrapper div.dataTables_info,div.dataTables_wrapper div.dataTables_paginate {
        display: none;
    }

    div.dataTables_wrapper div.dataTables_length label {
        display: none;
    }

}

</style>
<body>

  <!-- ======= Header ======= -->
    @include('layouts.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
    @include('layouts.sidebar')
  <!-- End Sidebar -->

  <main id="main" class="main">
    <section class="section dashboard">
        <div class="pagetitle" style="display: flex; justify-content:space-between;">
            <h1>Purok</h1>
            <button type="button" class="btn btn-primary" id="print">PRINT</button>
        </div><!-- End Page Title -->
        <div class="row justify-content-center">
            <div class="col-lg-3">
                <!-- Tugas -->
                <div class="card purokName" data-purok="Tugas" style="cursor: pointer; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(0.9)'" onmouseout="this.style.transform='scale(1)'">
                    <img src="/images/tugas.jpg" class="card-img-top" alt="..." style="height: 188px;">
                    <div class="card-img-overlay" style="background-color: rgba(30, 101, 168, 0.6);">
                        <h5 class="card-title" style="color: #f6f9ff; font-size: 25px;">Tugas</h5>
                        <div class="card-body d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #4deda2">
                              <i class="bi bi-people-fill"></i>
                            </div>
                            <div class="ps-3">
                              <h2 style="color:#f6f9ff;">0</h2>
                              <span class="text-muted small pt-2 ps-1" style="color:#f6f9ff!important;">Total Population</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Tugas -->
            </div>
            
            <div class="col-lg-3">
                <!-- Tambis -->
                <div class="card purokName"  data-purok="Tambis" style="cursor: pointer; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(0.9)'" onmouseout="this.style.transform='scale(1)'">
                    <img src="/images/tambis.jpg" class="card-img-top" alt="..." style="height: 188px;">
                    <div class="card-img-overlay" style="background-color: rgba(30, 101, 168, 0.6);">
                        <h5 class="card-title" style="color: #f6f9ff; font-size: 25px;">Tambis</h5>
                        <div class="card-body d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #4deda2">
                              <i class="bi bi-people-fill"></i>
                            </div>
                            <div class="ps-3">
                              <h2 style="color:#f6f9ff;">0</h2>
                              <span class="text-muted small pt-2 ps-1" style="color:#f6f9ff!important;">Total Population</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Tambis -->
            </div>
            
            <div class="col-lg-3">
                <!-- Mahogany -->
                <div class="card purokName" data-purok="Mahogany" style="cursor: pointer; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(0.9)'" onmouseout="this.style.transform='scale(1)'">
                    <img src="/images/mahogany.jpg" class="card-img-top" alt="..." style="height: 188px;">
                    <div class="card-img-overlay" style="background-color: rgba(30, 101, 168, 0.6);">
                        <h5 class="card-title" style="color: #f6f9ff; font-size: 25px;">Mahogany</h5>
                        <div class="card-body d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #4deda2">
                              <i class="bi bi-people-fill"></i>
                            </div>
                            <div class="ps-3">
                              <h2 style="color:#f6f9ff;">0</h2>
                              <span class="text-muted small pt-2 ps-1" style="color:#f6f9ff!important;">Total Population</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Mahogany -->
            </div>
            
            <div class="col-lg-3">
                <!-- Guyabano -->
                <div class="card purokName" data-purok="Guyabano" style="cursor: pointer; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(0.9)'" onmouseout="this.style.transform='scale(1)'">
                    <img src="/images/guyabano.jpg" class="card-img-top" alt="..." style="height: 188px;">
                    <div class="card-img-overlay" style="background-color: rgba(30, 101, 168, 0.6);">
                        <h5 class="card-title" style="color: #f6f9ff; font-size: 25px;">Guyabano</h5>
                        <div class="card-body d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #4deda2">
                              <i class="bi bi-people-fill"></i>
                            </div>
                            <div class="ps-3">
                              <h2 style="color:#f6f9ff;">0</h2>
                              <span class="text-muted small pt-2 ps-1" style="color:#f6f9ff!important;">Total Population</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Guyabano -->
            </div>
        
            <div class="col-lg-3">
                <!-- Mansinitas -->
                <div class="card purokName" data-purok="Mansinitas" style="cursor: pointer; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(0.9)'" onmouseout="this.style.transform='scale(1)'">
                    <img src="/images/mansanitas.jpg" class="card-img-top" alt="..." style="height: 188px;">
                    <div class="card-img-overlay" style="background-color: rgba(30, 101, 168, 0.6);">
                        <h5 class="card-title" style="color: #f6f9ff; font-size: 25px;">Mansanitas</h5>
                        <div class="card-body d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #4deda2">
                              <i class="bi bi-people-fill"></i>
                            </div>
                            <div class="ps-3">
                              <h2 style="color:#f6f9ff;">0</h2>
                              <span class="text-muted small pt-2 ps-1" style="color:#f6f9ff!important;">Total Population</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Mansinitas -->
            </div>
        
            <div class="col-lg-3">
                <!-- Ipil-Ipil -->
                <div class="card purokName " data-purok="Ipil" style="cursor: pointer; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(0.9)'" onmouseout="this.style.transform='scale(1)'">
                    <img src="/images/ipilipil.jpg" class="card-img-top" alt="..." style="height: 188px;">
                    <div class="card-img-overlay" style="background-color: rgba(30, 101, 168, 0.6);">
                        <h5 class="card-title" style="color: #f6f9ff; font-size: 25px;">Ipil-Ipil</h5>
                        <div class="card-body d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #4deda2">
                              <i class="bi bi-people-fill"></i>
                            </div>
                            <div class="ps-3">
                              <h2 style="color:#f6f9ff;">0</h2>
                              <span class="text-muted small pt-2 ps-1" style="color:#f6f9ff!important;">Total Population</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Ipil-Ipil -->
            </div>
        
            <div class="col-lg-3">
                <!-- Lubi -->
                <div class="card purokName" data-purok="Lubi" style="cursor: pointer; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(0.9)'" onmouseout="this.style.transform='scale(1)'">
                    <img src="/images/lubi.jpg" class="card-img-top" alt="..." style="height: 188px;">
                    <div class="card-img-overlay" style="background-color: rgba(30, 101, 168, 0.6);">
                        <h5 class="card-title" style="color: #f6f9ff; font-size: 25px;">Lubi</h5>
                        <div class="card-body d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #4deda2">
                              <i class="bi bi-people-fill"></i>
                            </div>
                            <div class="ps-3">
                              <h2 style="color:#f6f9ff;">0</h2>
                              <span class="text-muted small pt-2 ps-1" style="color:#f6f9ff!important;">Total Population</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Lubi -->
            </div>
        </div>        
    </section>

    <div class="tablePart hidden">
        <table id="myTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Age</th>
                    <th>Birth Date</th>
                    <th>Sex</th>
                    <th>Voter Status</th>
                    <th>Purok</th>
                </tr>
            </thead>
            <tbody id="purokResidents">
               
            </tbody>
        </table>                
    </div>

  </main><!-- End #main -->

  @include('layouts.footer')
</body>

</html>