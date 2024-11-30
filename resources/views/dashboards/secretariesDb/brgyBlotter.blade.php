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
        width: 100%;
        padding-top: 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .province, .brgyName {
        font-size: 18px;
        line-height: 0.9;
    }

    .province1 {
        font-size: 18px;
        line-height: 0.9;
        font-weight: 700;
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
        letter-spacing: 20px;
        font-weight: 700;
        font-size: 40px;
    }

    .contentsContainer {
        display: flex;
        flex-direction: column;
        padding: 10px;
        gap: 20px;
    }

    .nameCaseArea {
        width: 100%;
        height: 300px;
        display: flex;

    }
    .nameLeft {
        display: flex;
        flex-direction: column;
        padding: 10px;
        width: 50%;
    }

    .compLabel {
        width: 250px;
        border-top: solid 2px #000;
        text-align: center;
        font-size: 18px;
    }

    .comName {
        width: 250px;
        text-align: center; 
        font-size: 18px;
    }

    .againstLabel {
        width: 250px;
        text-align: center; 
        font-size: 18px;
        margin-top: 50px;
    }

    .resLabel {
        width: 250px;
        border-top: solid 2px #000;
        text-align: center;
        font-size: 18px;
    }

    .resName {
        width: 250px;
        text-align: center; 
        font-size: 18px;
        margin-top: 50px;
    }

    .caseNumRight {
        padding: 10px;
        display: flex;
        padding-left: 120px;
    }

    .caseNum {
        display: flex;
        flex-direction: column;
        font-size: 18px;
        gap: 15px;
    }

    .titleArea {
        width: 100%;
        display: flex;
        justify-content: center;
        font-weight: 700;
        font-size: 20px;
        letter-spacing: 10px;
    }

    .paragraph1, .paragraph2, 
    .paragraph3, .paragraph4,
    .paragraph5{
        width: 100%;
        font-size: 20px;
        display: flex;
        text-align: justify;
        text-indent: 20px;
        margin-top: 20px;
    }

    .paragraph3,.paragraph5{
        margin-top: 80px;
    }

    .complainant2 {
        display: flex;
        flex-direction: column;
    }

    .capitan {
        font-size: 20px;
        text-indent: 20px;
    }

    .capitanTitle {
        font-size: 18px;
        text-indent: 20px;
    }

    .semiFooter {
        display: flex;
        flex-direction: column;
        width: 100%;
        align-items: flex-end;
        margin-top: 40px;
        padding-right: 20px;
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
        width: 500px;
        height: 400px;
        padding: 10px;
    }

    .rephraseForm {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
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
        justify-content: center;
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
                    <h1>BLOTTER ISSUANCE</h1>
                    <nav>
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ action('App\Http\Controllers\regValidation@dbBlotter') }}">Blotter</a></li>
                          <li class="breadcrumb-item active">Blotter Issuance</li>
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
                    <div class="brgyAddressTitle">

                        <div class="addressCon">
                            <h4 class="province">REPUBLIC OF THE PHILIPPINES</h4>
                            <h4 class="province">PROVINCE OF CEBU</h4>
                            <h4 class="province">MUNICIPALITY OF MINGLANILLA</h4>
                            <h4 class="province">BARANGAY POBLACION WARD II</h4>
                            <h4 class="province1">OFFICE OF THE LUPONG TAGAPAMAYAPA</h4>
                        </div>
                    </div>
                    
                    <div class="contentsContainer">
                        <div class="nameCaseArea">
                            <div class="nameLeft">
                                <span class="comName">{{ $complaint->res_fname }} {{ $complaint->res_mname }} {{ $complaint->res_lname }}</span>
                                <span class="compLabel">Complainant/s</span>
                                <span class="againstLabel">-Against-</span>
                                <span class="resName">{{ $complaint->blotter_respondents }}</span>
                                <span class="resLabel">Respondent/s</span>
                            </div>
                            <div class="caseNumRight">
                                <div class="caseNumLabel">
                                    <span class="caseNum">
                                        <span class="casenumLabel">Barangay Case Number: <u>{{ $complaint->blotter_brgyCaseNum }}</u></span>
                                        
                                        <span class="forLabel">For: <u>{{ $complaint->blotter_for }}</u></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="complaintArea">
                            <span class="titleArea"><b>COMPLAINT</b></span>

                            <p class="paragraph1">I/WE hereby complain against {{ $complaint->blotter_respondents }}  for violating my/our rights and interests in the following manner:</p>
                            <p class="paragraph2"><u>{{ $complaint->blotter_complaint }}.</u></p>
                            <p class="paragraph3">THEREFORE, I/WE pray that the following relief/s be granted to me/us in acceptance with the law and/or equity:</p>
                            <p class="paragraph4"><u>{{ $complaint->blotter_resolution }}.</u></p>

                            <p class="paragraph5">Made this {{ \Carbon\Carbon::parse($complaint->blotter_complaintMade)->format('dS \d\a\y \o\f F, Y') }}</p>
                        </div>

                        <div class="complainant2">
                            <span class="comName">{{ $complaint->res_fname }} {{ $complaint->res_mname }} {{ $complaint->res_lname }}</span>
                            <span class="compLabel">Complainant/s</span>
                        </div>

                        <div class="footerParagraph">
                            <p class="paragraph5">Received and filed this {{ \Carbon\Carbon::parse($complaint->blotter_filedDate)->format('dS \d\a\y \o\f F, Y') }}</p>
                        </div>

                        <div class="footerLetter">
                            <h4 class="capitan">JHONNY FLOYD R. CASTANARES</h4>
                            <p class="capitanTitle">Punong Barangay/Lupan Chairman</p>
                        </div>
                    </div>

                    <div class="semiFooter">
                        <p class="semiFooterTxt"><b>KP FORM NO. 7 COMPLAINANT FORM</b></p>
                        <p class="semiFooterTxt"><b>Revised JFC 10-28-2020</b></p>
                    </div>
                </div>
            </div>
        </div>


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
                <form id="updateForm" class="rephraseForm" method="POST" action="{{ route('updateBrgyClearance', ['id' => $complaint->blotter_com_id]) }}">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="ecert_Id" value="{{ $complaint->blotter_com_id }}" readonly>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="caseNum">Barangay Case Number</label>
                            <input type="text" name="caseNum" id="caseNum" class="form-control">
                            <span class="error-text caseNum_error"></span>
                        </div>
                    
                        <div class="col-md-12">
                            <label for="caseFor">For:</label>
                            <input type="text" name="caseFor" id="caseFor" class="form-control">
                            <span class="error-text caseFor_error"></span>
                        </div>
            
                        <div class="col-md-12">
                            <label for="caseDates">Date Recieved</label>
                            <input type="date" name="caseDates" id="caseDates" class="form-control">
                            <span class="error-text caseDates_error"></span>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <!-- Cancel button also should have data-bs-dismiss="modal" -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary update_certTran">Update</button>
                    </div>
                </form>
            </div>
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
        const formattedDate = formatDateWithSuffix('{{ $complaint->blotter_complaintMade }}');
        const formattedDate = formatDateWithSuffix('{{ $complaint->blotter_filedDate }}');
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
    formData.append('caseNum', $('#caseNum').val());
    formData.append('caseFor', $('#caseFor').val());
    formData.append('caseDates', $('#caseDates').val());
    formData.append('_method', 'PUT'); // Add this line to specify the PUT method

    $.ajax({
        type: "POST", // Use POST to send the data
        url: "/upBlotter/" + cert_id,
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

const printBtn = document.getElementById('print');
printBtn.addEventListener('click', function() {
    window.print();
});

    </script>
</body>
