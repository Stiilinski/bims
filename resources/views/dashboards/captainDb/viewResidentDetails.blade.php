@include('layouts.head')
<style>
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
    justify-content: center;
    gap: 55%;
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
    justify-content: space-evenly;
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
    height: 100%;
    padding: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 50px;
}

.avatar {
    width: 100%;
    height: 100%;
}

.leftInfo {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    width: 100%;
}

.infoTitle {
    color: #9c9f9fc7;
}


.rightsContainer {
    border: solid 2px #000;
    border-style: double;
    border-width: 4px;
    width: 70%;
    height: 490px;
    padding: 10px;
    
}

.rightInfo {
    display: flex;
    flex-direction: column;
    gap: 30px;
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

.footer {
    background-color: #0A50A3;
    height: 50px;
    display: flex;
    justify-content: center;
    color: #fff;
    font-size: 20px;
    margin-left: 20%;
}

.pagetitle {
    display: flex;
    justify-content: space-between;
    align-items: center
}

@media print 
{
    html {
        visibility: hidden;
    }

    body * {
        visibility: hidden;
        
    }
    
    .main {
        visibility: hidden!important;
        background-color: #000!important; 
    }

    .innerContent {
        visibility: visible !important;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        box-shadow: 0 0px 0px 0 rgba(0,0,0,0.0);
    }

    .rightsContainer, .leftsContainer {
        height: 600px;
    }

    .innerContent * {
        visibility: visible;
    }

    .avatar {
        height: 180px;
        width: 180px
    }

    .leftsContainer 
    {
        border: solid 2px #000;
        border-style: double;
        border-width: 4px;
        width: 30%;
        height: 600px;
        padding: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 50px;
    }
    
    .addressCon {
        margin-left: 100px;
        width: 40%;
    }

    .titleCaptainCon {
        width: 40%;
        font-size: 15px!important;
    }

    .province, .brgyName
    {
        font-size: 15px!important;
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

    <div class="pagetitle">
      <div class="directions">
        <h1>Resident Details</h1>
        <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ action('App\Http\Controllers\regValidation@residentsRecCap') }}">Resident Records</a></li>
              <li class="breadcrumb-item active">Resident Details</li>
            </ol>
          </nav>
      </div>
      <button type="button" class="btn btn-primary" id="print">PRINT</button>
    </div><!-- End Page Title -->


        <div class="mainContentCon">
            <div class="innerContent">
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

                <div class="residentProf"><h2 class="residentRes">RESIDENT</h2></div>
                
                <div class="contentsContainer">
                    <div class="leftsContainer">
                        <div class="picCon">
                            <img id="profilePreview" src="/storage/{{ $resident->res_picture }}" class="avatar" alt="Profile Image">
                        </div>

                        <div class="leftInfo">
                            <h6 class="infoTitle">INFORMATION</h6>
                            <h6 class="infos">Birthdate: {{ $resident->res_bdate }}</h6>
                            <h6 class="infos">Age: {{ $age }}</h6>
                            <h6 class="infos">Civil Status: {{ $resident->res_civil }}</h6>
                            <h6 class="infos">Sex: {{ $resident->res_sex }}</h6>
                            <h6 class="infos">Occupation: {{ $resident->res_occupation }}</h6>
                        </div>
                    </div>

                    <div class="rightsContainer">
                        <div class="rightInfo">
                            <h6 class="fullName">Name: {{ $resident->res_lname . ', ' . $resident->res_fname . ' ' . $resident->res_mname }}</h6>
                            <h6 class="addResss">Address: {{ $resident->res_address }}</h6>
                            <h6 class="birthplace">Birthplace: {{ $resident->res_bplace }}</h6>
                            <h6 class="purokAdd">Purok: {{ $resident->res_purok }}</h6>
                            <h6 class="voteStat">Voter Status: {{ $resident->res_voters }}</h6>
                            <h6 class="phone">Phone: {{ $resident->res_contact }}</h6>
                            <h6 class="phone">Citizenship: {{ $resident->res_citizen }}</h6>
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




  </main><!-- End #main -->

  @include('layouts.footer')
  <script>
    const printBtn = document.getElementById('print');
        printBtn.addEventListener('click', function() {
            window.print();
        });

  </script>
</body>

</html>