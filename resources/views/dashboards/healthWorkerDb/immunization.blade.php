@include('layouts.headHealthWorkers')
<style>
    .card-body {
        overflow: auto;
    }
    
    .pagetitle {
        display: flex;
        justify-content: space-between;
    }

    .modal-body {
        display: flex;
        flex-direction: column;
    }

    .custom-modal-width {
        max-width: 95%; 
        width: 95%;
    }

    .signature-container {
        position: relative;
    }

    #signaturePad {
        width: 100%;
        height: 200px;
        border: 1px solid #ccc;
    }

    .inputGroupContainer{
        width: 100%;
        border: #ccc 1px solid;
        border-radius: 0.375rem;
        display: flex;
        flex-direction: column;
        padding-bottom: 10px;
    }

    .titleCaseFinding {
        width: 100%;
        border-bottom: #ccc 1px solid;
        padding: 10px;
        background-color: #acabab
    }

    .inputArea {
        padding: 10px;
        display: flex;
        justify-content: space-between
    }

    .modal-body {
        gap: 10px;
    }

    .columnGrp, .pName {
        display: flex;
        flex-direction: column;
        gap: 6px;
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

    .pNames {
        width: 450px;
    }

    .rowGroup {
        display: flex;
        justify-content: space-evenly;
        gap: 10px
    }

    .columnGroup {
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: flex-start;
        gap: 10px;
        width: 100%;
    }

    .customCon {
        width: 100%;
        padding: 10px;
        display: flex;
        justify-content: flex-start;
    }

    .columnCon {
        width: 100%;
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        justify-content: flex-start;
    }

    .rowCon {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    .rowConWhole {
        width: 100%;
        display: flex;
        justify-content: space-between
    }

    .familyPlaningCon {
        padding: 10px
    }

    .checkbox-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    }

    .checkbox-container .form-check {
        display: flex;
        align-items: center;
        margin-right: 15px; 
    }


    .checkbox-container .form-check-label {
        margin-left: 5px;
    }

 
    .column.mb-3 {
        margin-top: 10px;
    }

    .grpField {
        display: flex;
        flex-direction: column;
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
        <h1>Immunization Records</h1>
        <div class="btnArea">
            <button type="button" class="btn btn-secondary"><i class="bi bi-printer-fill"></i> Print</button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">New Record</button>  
        </div>
    </div><!-- End Page Title -->
  
    <div class="card">
        <div class="card-body">
  
            <!-- Table with stripped rows -->
            <table class="table table-striped datatable">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Family Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">BirthDate</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    <th>1</th>
                    <th>Stilinski</th>
                    <th>Stiles</th>
                    <th>Scott</th>
                    <th>1/20/2001</th>
                    <th>Male</th>
                    <th>
                        <button type="button" class="btn btn-primary">Vaccines</button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item" type="button" onclick="">View</button></li>
                                <li><button class="dropdown-item" type="button" onclick="openEditModal()">Edit</button></li>
                            </ul>
                        </div>
                    </th>
                </tbody>
            </table>
          <!-- End Table with stripped rows -->
        </div>
    </div>

      <!-- SIDE A -->
    <div class="modal fade" id="ExtralargeModal" tabindex="-1">
        <div class="modal-dialog custom-modal-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Immunization Record Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form> <!-- Horizontal Form -->
                    @csrf
                    <div class="modal-body">

                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Infant's Information</span>
                            </div>
                            <div class="inputArea">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label for="immuLname" class="col-sm-8 col-form-label">Last Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="immuLname" name="immuLname">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="immuFname" class="col-sm-8 col-form-label">First Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="immuFname" name="immuFname">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="immuMname" class="col-sm-8 col-form-label">Middle Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="immuMname" name="immuMname">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="immuSuffix" class="col-sm-8 col-form-label">Suffix</label>
                                        <div class="col-sm-12">
                                            <select id="immuSuffix" class="form-select" name="immuSuffix">
                                                <option value="">Select a suffix</option>
                                                <option value="Jr">Jr.</option>
                                                <option value="Sr">Sr.</option>
                                                <option value="II">II</option>
                                                <option value="III">III</option>
                                                <option value="IV">IV</option>
                                                <option value="V">V</option>
                                            </select>
                                        </div>
                                    </div>

                                    
                                    <fieldset class="col-md-2">
                                        <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Sex</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="immuSex" id="immuMale" value="Male">
                                                <label class="form-check-label" for="immuMale">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="immuSex" id="immuFemale" value="Female">
                                                <label class="form-check-label" for="immuFemale">Female</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="col-md-2">
                                        <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">NHTS</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="immuNhts" id="immuNhtsYes" value="Yes">
                                                <label class="form-check-label" for="immuNhtsYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="immuNhts" id="immuNhtsNo" value="No">
                                                <label class="form-check-label" for="immuNhtsNo">No</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="col-md-2">
                                        <label for="immuBday" class="col-sm-12 col-form-label">Birthday</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control averageField" id="immuBday" name="immuBday">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="immuTime" class="col-sm-12 col-form-label">Time</label>
                                        <div class="col-sm-12">
                                            <input type="time" class="form-control averageField" id="immuTime" name="immuTime">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="immuAddress" class="col-sm-12 col-form-label">Address</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control averageField" id="immuAddress" name="immuAddress">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Parent's Information</span>
                            </div>
                            <div class="inputArea">
                                <div class="row g-3">
                                    <div class="col-md-6 pt-2">
                                        <label for="inputImmuMother" class="form-label">Mother's Name</label>
                                        <select id="inputImmuMother" class="form-control averageField" name="inputImmuMother" placeholder="Input Mother's Name...">
                                            <option value="">Select...</option>
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="immuBdate" class="col-sm-5 col-form-label">Birthdate</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control shortField" id="immuBdate" name="immuBdate" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="immuAge" class="col-sm-5 col-form-label">Age</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control briefField" id="immuAge" name="immuAge" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="immuFp" class="col-sm-8 col-form-label">FP</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control briefField" id="immuFp" name="immuFp">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputImmuFather" class="form-label">Father's Name</label>
                                        <select id="inputImmuFather" class="form-control averageField" name="inputImmuFather" placeholder="Input Mother's Name...">
                                            <option value="">Select...</option>
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="inputGroupContainer">
                            <div class="titleCaseFinding">
                                <span>Infants's Follow Up Information</span>
                            </div>
                            <div class="inputArea">
                                <div class="row g-3">   
                                    <div class="col-md-3">
                                        <label for="immuPlaceDel" class="col-sm-8 col-form-label">Place of Delivery</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control averageField" id="immuPlaceDel" name="immuPlaceDel">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="immuTtRec" class="col-sm-8 col-form-label">TT Received</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control averageField" id="immuTtRec" name="immuTtRec">
                                        </div>
                                    </div>

                                    <fieldset class="col-md-4">
                                        <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">Breastfeeding</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="immuBreastFeed" id="immuBfYes" value="Yes">
                                                <label class="form-check-label" for="immuBfYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="immuBreastFeed" id="immuBfTime" value="Time">
                                                <label class="form-check-label" for="immuBfTime">Time</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="immuBreastFeed" id="immuBfMix" value="Mix">
                                                <label class="form-check-label" for="immuBfMix">Mix</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="immuBreastFeed" id="immuBfNo" value="No">
                                                <label class="form-check-label" for="immuBfNo">No</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                
                                    <fieldset class="col-md-2">
                                        <legend class="col-form-label col-sm-10" style="padding-top: 16px!important; font-size: 17px;">New Born Screening</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="immuScreen" id="immuScreenYes" value="Yes">
                                                <label class="form-check-label" for="immuScreenYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="immuScreen" id="immuScreenNo" value="No">
                                                <label class="form-check-label" for="immuScreenNo">No</label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="col-md-3">
                                        <label for="immuDateNbs" class="col-sm-8 col-form-label">Date of NBS</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control averageField" id="immuDateNbs" name="immuDateNbs">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="immuBirthOrder" class="col-sm-8 col-form-label">Birth Order</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control averageField" id="immuBirthOrder" name="immuBirthOrder">
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </form><!-- End Horizontal Form -->
            </div>
        </div>
    </div><!-- End OF SIDE A-->


</main><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    //MOTHER SELECT
    $(document).ready(function () {
        $('#inputImmuMother').selectize({
            sortField: 'text'
        });
    });

    //FATHER SELECT
    $(document).ready(function () {
        $('#inputImmuFather').selectize({
            sortField: 'text'
        });
    });

</script>

  @include('layouts.footerHealthWorkers')
</body>
</html>