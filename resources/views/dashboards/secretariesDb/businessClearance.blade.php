@include('layouts.headSecretary')
<style>
    a {
        text-decoration: none!important;
    }

    .innerContent {
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
    margin-top: 10px;
    position: relative;
    display: flex;
    flex-direction: column;
    }

    .navTitle {
        width: 100%;
        display: flex;
        justify-content: space-between;
        padding: 10px;
        background-color: #fff;
        border-radius: 10px;
    }

    .navtitleCon{
        color: #000;
        font-size: 35px;
        font-family: "Inter";
        font-weight: 700;
    }

    .printBtn {
        height: 50px;
        width: 180px;
        border-radius: 10px;
    }

    .primaryBorderColor {
        height: 60px;
        background-color: #5696e4;
        clip-path: polygon(71% 0, 100% 0, 100% 20%, 88% 15%, 78% 18%, 48% 30%, 26% 50%, 0 100%, 0 0, 33% 0);
        z-index: 2;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
    }

    .secondaryBorderColor {
        height: 100px;
        width: 100%;
        background-color: #a30a0ae9;
        clip-path: polygon(100% 0, 100% 25%, 65% 25%, 66% 25%, 51% 28%, 29% 40%, 13% 60%, 0 90%, 0 0, 48% 0);
        position: absolute;
    }

    .brgyAddressTitle {
        width: 100%;
        height: 180px;
        display: flex;
    }

    .brgyLogoCon {
        width: 20%;
        height: 100%;
    }

    .logo1 {
        position: absolute;
        height: 150px;
        width: 150px;
        top: 10px;
        left: 40px;
        z-index: 3;
    }

    .addressCon {
        width: 40%;
        padding-top: 50px;
    }

    .province, .brgyName {
        font-size: 18px;
        line-height: 0.9;
    }

    .brgyName {
        font-weight: 700;
        font-style: italic;
    }

    .titleCaptainCon {
        width: 40%;
        padding-top: 50px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .office{
        font-size: 18px;
        line-height: 0.9;
        
    }

    .fbAccount {
        font-size: 12px;
    }

    .residentProf {
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .residentRes {
        letter-spacing: 15px;
        font-weight: 700;
        font-size: 40px;
    }

    .contentsContainer {
        display: flex;
        padding: 10px;
        gap: 20px;
    }

    .leftsContainer {
        border: solid 2px #000;
        border-style: double;
        border-width: 4px;
        width: 30%;
        height: 900px;
        padding: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        gap: 50px;
        font-size: 20px;
    }

    .signaturePart {
        border-top: solid 2px #000;
        width: 100%;
        display: flex;
        justify-content: center;
        margin-top: 150px;
    }

    .leftInfo {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        margin-top: 278px;
    }

    .leftInfoFooter {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        height: 150px;
        margin-top: 50px;
    }

    .infoTitle {
        text-decoration: underline;
    }


    .rightsContainer {
        border: solid 2px #000;
        border-style: double;
        border-width: 4px;
        width: 70%;
        height: 900px;
        padding: 10px;
        display: flex;
        flex-direction: column;
        gap: 30px;
        font-size: 20px;
    }

    .headerLetter {
        margin-top: 50px;
    }

    .bodyLetter {
        display: flex;
        flex-direction: column;
        text-indent: 40px;
        gap: 30px;
        margin-top: 20px;
    }

    .footerLetter {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 50px;
    }

    .semiFooter {
        display: flex;
        width: 100%;
        justify-content: center;
        margin-top: 40px;
    }

    .primaryOutBorderColor {
        height: 100px;
        background-color: #5696e4;
        clip-path: polygon(51% 68%, 73% 65%, 89% 55%, 100% 39%, 100% 100%, 50% 100%, 0 100%, 0 66%, 12% 69%, 30% 68%);
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
    }

    .secondaryOutBorderColor {
        height: 60px;
        width: 100%;
        clip-path: polygon(50% 80%, 80% 70%, 84% 60%, 100% 0%, 100% 100%, 50% 100%, 0 100%, 0 70%, 11% 78%, 31% 78%);
        background-color: #a30a0ae9;
    margin-bottom: 31px;
    }

    .rephraseBg {
        background-color: rgba(0, 0, 0, 0.8);
        display: none;
        justify-content: center;
        align-items: center;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 3;
        width: 100%;
        height: 100%;
    }

    .rephraseMainBg {
        background-color: #F3FEFF;
        border-radius: 10px;
        display: flex;
        width: 1300px;
        height: 700px;
        padding: 10px;
    }

    .rephraseForm {
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 100%;
    }

    .orignalPurpose, .rephrasePurpose, .residenceCertificate, 
    .officialReceipt, .amountPaids, .updateDates{
        display: flex;
        flex-direction: column;
    }

    .buttonArea {
        width: 100%;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .inputForm {
        resize: none;
        width: 100%;
        height: 100px;
    }



    .footer {
        background-color: #0A50A3;
        height: 50px;
        display: flex;
        justify-content: center;
        color: #fff;
        font-size: 20px;
        margin-left: 20%;
    }

    .updateInsertTranCertCon {
        background-color: rgba(0, 0, 0, 0.8);
        position: absolute;
        top: 0;
        left: 0;
        justify-content: center;
        align-items: center;
        z-index: 4;
        width: 100%;
        height: 100%;
    }

    .updateInsertFormCon {
        background-color: #F3FEFF;
        width: 1000px;
        height: 600px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .inputForms {
        width: 350px;
        height: 40px;
    }

    .error-text {
        color: #d33636;
    }

    .updateInsertForm {
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: center;
        justify-content: center;
    }

    .certNumArea, .orArea, .amountPaidArea, .dateArea
    {
        display: flex;
        flex-direction: column;
    }

    .container {
        max-width: 100%!important;
        margin-top: 80px; 
        padding-bottom:10px; 
    }

    .pagetitle {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .pagetitle *{
        font-size: 16px;
    }

    .toggle-sidebar-btn {
        display: none;
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
        .innerContent {
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
<body>
    @include('layouts.headerSecretary')

    <div class="container">
        <div class="pagetitle">
            <div class="pageArea">
                <h1>BUSNESS PERMIT</h1>
                <nav>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ action('App\Http\Controllers\regValidation@businessPermit') }}">Business Permit Issuance</a></li>
                      <li class="breadcrumb-item active">Business Permit</li>
                    </ol>
                  </nav>
            </div>
            <div class="btnArea">
                <button class="btn btn-secondary" onclick="openRephrasePurpose()">Update</button>
                <button type="button" class="btn btn-primary" id="print"><i class="bi bi-printer-fill"></i>Print</button>
            </div>
        </div>
        <div class="mainContentCon">
            <div class="innerContent" id="certificatePrint">
                <div class="primaryBorderColor"></div>
                <div class="secondaryBorderColor"></div>
                
                <div class="brgyAddressTitle">
                    <div class="brgyLogoCon">
                        <img src="{{ asset('images/logo.png') }}" class="logo1" alt="brgy logo">
                    </div>

                    <div class="addressCon">
                        <h4 class="province">REPUBLIC OF THE PHILIPPINES</h4>
                        <h4 class="province">PROVINCE OF CEBU</h4>
                        <h4 class="province">MUNICIPALITY OF MINGLANILLA</h4>
                        <h4 class="brgyName">BARANGAY POBLACION WARD II</h4>
                    </div>

                    <div class="titleCaptainCon">
                        <h4 class="office">OFFICE OF THE </h4>
                        <h4 class="office">PUNONG BARANGAY</h4>
                        <h4 class="fbAccount">Facebook accounts</h4>
                        <h4 class="office">BARANGAY WARD II</h4>
                        <h4 class="office">Janjan Castañares</h4>
                    </div>
                </div>

                <div class="residentProf"><h2 class="residentRes">BARANGAY CLEARANCE</h2></div>
                
                <div class="contentsContainer">
                    <div class="leftsContainer">


                        <div class="leftInfo">
                            <h6 class="infoTitle">Residence Certificate No.:</h6>
                            <h6>{{ $certificate->tr_residenceCertNum ?? 'XXX' }}</h6>

                            <h6 class="infoTitle">Paid Under O.R No.:</h6>
                            <h6>{{ $certificate->tr_orNum ?? 'XXX' }}</h6>

                            <h6 class="infoTitle">Amount Paid:</h6>
                            <h6> @if(isset($certificate->tr_amountPaid))
                                ₱{{ $certificate->tr_amountPaid }}
                            @else
                                XXX
                            @endif</h6>

                            <h6 class="infoTitle">Date:</h6>
                            <h6>{{ $certificate->tr_date ?? 'XXX' }}</h6>
                        </div>

                        <div class="leftInfoFooter">
                            <p>Not Valid Without Official Seal</p>
                        </div>
                    </div>

                    <div class="rightsContainer">
                        <div class="headerLetter">
                            <p>To Whom This May Concern:</p>
                        </div>

                        <div class="bodyLetter">
                            <p class="paragraph1">This is to certify that the undersigned hereby approved the application of <b>{{ $certificate->res_fname }} {{ $certificate->res_mname }} {{ $certificate->res_lname }}</b>
                                for a business permit to operate the business named as <b> {{ $certificate->bc_businessName }}</b> located at
                                <b>{{$certificate->bc_businessAddress}}</b>, Barangay Poblacion Ward II Minglanilla, Cebu.</p>

                            <p class="paragraph2">This certifies that the applicant pledges to abide with laws, rules and regulations regarding the said activity
                                and the same is not nuisance to public order and safety.
                            </p>

                            <p class="paragraph3">This is being issued to the applicant for presentation to the Business Permits and Licensing Office,
                                this municipality and all offices and agencies concerned prior to the issuance of any permit regarding the said activity.
                            </p>

                            <p class="paragraph4">Issued this <b>{{ \Carbon\Carbon::parse($certificate->bc_dateIssued)->format('dS \d\a\y \o\f F, Y') }}</b> at Barangay Poblacion Ward II Minglanilla, Cebu, Philippines.</p>
                        </div>

                        <div class="footerLetter">
                            <h5 class="capitan">JHONNY FLOYD R. CASTANARES</h5>
                            <h6 class="capitan">Punong Barangay</h6>
                        </div>
                    </div>
                </div>

                <div class="semiFooter">
                    <p class="semiFooterTxt">Kuyog kanimo Ward2hanon, atong ikulit ang <b>KAAYOHAN</b> ug <b>KALAMBOAN.</b></p>
                </div>

                <div class="secondaryOutBorderColor"></div>   
                <div class="primaryOutBorderColor"></div>
            </div>

            
        </div>
    </div>


    <div class="modal fade" id="insertTransactionModal" tabindex="-1" aria-labelledby="insertTransactionModalLabel" aria-hidden="true">
        <div class="modal-dialog custom-modal-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="insertTransactionModalLabel">Insert Transaction Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="updateInsertForm" id="insertTransactions" action="{{ route('regValidation.insertBusiTransaction', ['id' => request()->query('id')]) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="certNum">Residence Certificate Number</label>
                                <input type="text" name="certNum" id="certNum" class="form-control">
                                <span class="error-text certNum_error"></span>
                            </div>
                        
                            <div class="col-md-12">
                                <label for="puOr">Paid Under O.R Number</label>
                                <input type="text" name="puOr" id="puOr" class="form-control">
                                <span class="error-text puOr_error"></span>
                            </div>
                        
                            <div class="col-md-12">
                                <label for="amountPaid">Amount Paid</label>
                                <input type="number" name="amountPaid" id="amountPaid" class="form-control">
                                <span class="error-text amountPaid_error"></span>
                            </div>
                        
                            <div class="col-md-12">
                                <label for="dates">Date</label>
                                <input type="date" name="dates" id="dates" class="form-control">
                                <span class="error-text dates_error"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if $transactionExists is false (i.e., no transaction exists)
            if (!{{ $transactionExists ? 'true' : 'false' }}) {
                // If no transaction exists, show the modal
                var myModal = new bootstrap.Modal(document.getElementById('insertTransactionModal'));
                myModal.show();
            }
        });
    </script>



<!-- Modal for updating transaction -->
<div class="modal fade" id="updateTransactionModal" tabindex="-1" aria-labelledby="updateTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal-width">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateTransactionModalLabel">Update Transaction Details</h5>
                <!-- Close button fixed with data-bs-dismiss="modal" -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="updateInsertForm" id="insertTransactions" action="{{ route('regValidation.insertBusiTransaction', ['id' => request()->query('id')]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="ecert_Id" value="{{ $certificate->id }}" readonly>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="certificateNum">Residence Certificate Number</label>
                            <input type="text" name="certificateNum" id="certificateNum" class="form-control">
                            <span class="error-text certificateNum_error"></span>
                        </div>

                        <div class="col-md-12">
                            <label for="orNum">O.R Number</label>
                            <input type="text" name="orNum" id="orNum" class="form-control">
                            <span class="error-text orNum_error"></span>
                        </div>

                        <div class="col-md-12">
                            <label for="amountPaids">Amount Paid</label>
                            <input type="text" name="amountPaids" id="amountPaids" class="form-control">
                            <span class="error-text amountPaids_error"></span>
                        </div>

                        <div class="col-md-12">
                            <label for="updateDates">Date</label>
                            <input type="date" name="updateDates" id="updateDates" class="form-control">
                            <span class="error-text updateDates_error"></span>
                        </div>
                    </div>

                    <div class="buttonArea mt-3">
                        <!-- Cancel button also should have data-bs-dismiss="modal" -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary update_certTran">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="insertTransactionModal" tabindex="-1" aria-labelledby="insertTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal-width">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertTransactionModalLabel">Insert Transaction Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateForm" class="rephraseForm" method="POST" action="{{ route('updateBusinessTransaction', ['id' => $certificate->id]) }}">
                @csrf
                <div class="modal-body">
                    <div class="certNumArea">
                        <label for="certNum">Residence Certificate Number</label>
                        <input type="text" name="certNum" id="certNum" class="inputForms">
                        <span class="error-text certNum_error"></span>
                    </div>
                
                    <div class="orArea">
                        <label for="puOr">Paid Under O.R Number</label>
                        <input type="text" name="puOr" id="puOr" class="inputForms">
                        <span class="error-text puOr_error"></span>
                    </div>
                
                    <div class="amountPaidArea">
                        <label for="amountPaid">Amount Paid</label>
                        <input type="number" name="amountPaid" id="amountPaid" class="inputForms">
                        <span class="error-text amountPaid_error"></span>
                    </div>
                
                    <div class="dateArea">
                        <label for="dates">Date</label>
                        <input type="date" name="dates" id="dates" class="inputForms">
                        <span class="error-text dates_error"></span>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>




<script>
     function formatDateWithSuffix(dateString) {
        const date = new Date(dateString);
        const day = date.getDate();
        const month = date.toLocaleString('default', { month: 'long' });
        const year = date.getFullYear();
        const suffix = getDaySuffix(day);
        return `${day}${suffix} day of ${month}, ${year}`;
    }

    function getDaySuffix(day) {
        if (day >= 11 && day <= 13) {
            return 'th';
        }
        switch (day % 10) {
            case 1: return 'st';
            case 2: return 'nd';
            case 3: return 'rd';
            default: return 'th';
        }
    }

    $(document).ready(function() {
        const formattedDate = formatDateWithSuffix('{{ $certificate->bc_dateIssued }}');
        $('.paragraph4 b').text(formattedDate);
    });
</script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS and Popper.js (required for Bootstrap components like modal) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
    $(function(){      
        $("#insertTransactions").on('submit', function(e){
            e.preventDefault();

            $.ajax({
                url:$(this).attr('action'),
                method:$(this).attr('method'),
                data:new FormData(this),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(document).find('span.error-text').text('');
                },
                success:function(data){
                    if(data.status == 0){
                        $.each(data.error, function(prefix, val){
                            $('span.'+prefix+'_error').text(val[0]);
                        });
                    }else{
                        $('#insertTransactions')[0].reset();
                        alert(data.msg);
                    }
                }
            });
        });
    });


    // UPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATE
    $(document).on('click', '.update_certTran', function (e) {
        e.preventDefault();
        var cert_id = $('#ecert_Id').val();

        var formData = new FormData();
        formData.append('certificateNum', $('#certificateNum').val());
        formData.append('orNum', $('#orNum').val());
        formData.append('amountPaids', $('#amountPaids').val());
        formData.append('updateDates', $('#updateDates').val());
        formData.append('rephrasePurpose', $('#rephrasePurpose').val());
        formData.append('_method', 'PUT'); // Add this line to specify the PUT method

        $.ajax({
            type: "POST", // Use POST to send the data
            url: "/businessCertificate/" + cert_id,
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
                    // handle validation errors here, for example:
                    $.each(response.error, function(key, value) {
                        $('span.' + key + '_error').text(value[0]);
                    });
                } else if(response.status == 404) {
                    alert("Resource Not Found");
                } else {
                    alert("Success");
                    document.querySelector('.rephraseBg').style.display = 'none';
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("An error occurred. Check the console for details.");
            }
        });
    });
    // UPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATEUPDATE

    function openRephrasePurpose() 
    {
        var myModal = new bootstrap.Modal(document.getElementById('updateTransactionModal'));
        myModal.show();
    }

    function closeRephrasePurpose() {
        document.querySelector('.rephraseBg').style.display = 'none';
    }





    const printBtn = document.getElementById('print');
        printBtn.addEventListener('click', function() {
            window.print();
    });
    </script>
</body>
