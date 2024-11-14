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
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
        
    }

    .yearMed, .releaseDate {
        font-weight: 700!important;
        font-size: 16px;
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

    .receiveDate {
        display: flex;
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
        <h1>Release Medicine Records</h1>
        <div class="btnArea">
            <button type="button" class="btn btn-primary" id="print"><i class="bi bi-printer-fill"></i> Print</button> 
        </div>
    </div><!-- End Page Title -->
  
    <div class="card">
        <div class="card-body">
            <div class="yearSupply">
                <h3 class="yearMed">BARANGAY POBLACION WARD II</h3>
                <h3 class="yearMed">BARANGAY HEALTH STATION</h3>
                <h3 class="yearMed">INVENTORY AS OF {{ date('F j, Y') }}</h3>
            </div>
            <div class="receiveDate">
                <h3 class="releaseDate">Received:</h3><div class="datebox" style="width: 200px!important; border-bottom: solid 2px #000; margin-bottom:8px!important;"></div>
            </div>
            <!-- Table with stripped rows -->
                @php
                    $groupedMedicines = $medicine->groupBy('medicine.med_prod')->map(function ($group) {
                        return [
                            'med_prod' => $group->first()->medicine->med_prod,
                            'med_qtBox' => $group->first()->medicine->med_qtBox,
                            'med_qtPerUnit' => $group->first()->medicine->med_qtPerUnit,
                            'med_unit' => $group->first()->medicine->med_unit,
                            'totalRelease' => $group->sum('rmed_qtRelease'),
                        ];
                    });
                @endphp
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Medicine Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Release Count</th>
                            <th scope="col">Release (Per Unit)</th>
                            <th scope="col">Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groupedMedicines as $groupedMedicine)
                            <tr>
                                <td>{{ $loop->iteration }}</td> <!-- This will give you the correct index -->
                                <td>{{ $groupedMedicine['med_prod'] }}</td>
                                <td>{{ $groupedMedicine['med_qtBox'] }}</td>
                                <td>{{ $groupedMedicine['med_unit'] }}</td>
                                <td>{{ $groupedMedicine['totalRelease'] }}</td>
                        
                                @if($groupedMedicine['med_unit'] === "Boxes")
                                    @php
                                        $total = ceil($groupedMedicine['totalRelease'] / $groupedMedicine['med_qtPerUnit']);
                                    @endphp
                                    <td>{{ $total }}</td>
                                    <td>{{ $groupedMedicine['med_qtBox'] - $total}}</td>
                                @elseif($groupedMedicine['med_unit'] === "Tablet")
                                    <td></td>
                                    <td>{{ $groupedMedicine['med_qtBox'] - $groupedMedicine['totalRelease'] }}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody> 
                </table>
            <!-- End Table with stripped rows -->
        </div>
    </div>
  

</main><!-- End #main -->
<script>
        const printBtn = document.getElementById('print');
    printBtn.addEventListener('click', function() {
        window.print();
    }); 
</script>
  @include('layouts.footerHealthWorkers')

</body>
</html>



