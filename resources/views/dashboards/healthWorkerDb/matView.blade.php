@include('layouts.headHealthWorkers')
<style>
   html {
    padding: 0;
    margin: 0;
}
.content input {
    margin-left: 2px;
    padding-right: 2px;
    border-bottom: 1px solid black;
    border-top: none;
    border-left: none;
    border-right: none;
    outline: none;
}
.content {
    display: flex;
    gap: 8px;
    flex-direction: column;
}
.container input {
    text-align: center;
    padding-bottom: 2px;
}
.container {
    letter-spacing: 1px;
    gap: 5px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.row {
    display: flex;
    width: 100%;
}
.cell {
    flex: 1;
    padding: 10px;
    border: 1px solid black;
    text-align: center;
}
.header {
    font-weight: bold;
}
.large-cell {
    flex: 2.4;
}
.medium-cell {
    flex: 1.5;
}
.sec-4 p {
    margin-bottom: 0px;
}
.sec-4 input[type="text"] {
    width: 100%;
    border: none;
    outline: none;
    text-align: center;
    background-color: transparent;
}
.sec-4 input[type="date"] {
    width: 100%;
    border: none;
    outline: none;
    text-align: center;
    background-color: transparent;
}
.sec-1 {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}
.first-info {
    display: flex;
    width: 100%;
    gap: 120px;
}
.info1,
.info2,
.info3 {
    display: flex;
    text-align: center;
}
.info1 input {
    width: 390px;
}
.info2 input {
    width: 100px;
}
.info3 input {
    width: 100px;
}
.second-info {
    margin-top: 10px;
    display: flex;
    flex-direction: row;
}
.info4,
.info5,
.info6 {
    text-align: center;
    display: flex;
    flex-direction: column;
}
.info5,
.info6 {
    width: 30%;
    margin: 0;
    padding: 0;
}
.info4 {
    width: 29.5%;
}
.info5 input,
.info6 input {
    margin-left: 0;
}
.pat-info2 {
    display: flex;
    width: 100%;
    flex-direction: column;
}
.pat-info {
    display: flex;
    width: 100%;
    flex-direction: column;
}
.third-info {
    margin-top: 20px;
    display: flex;
    flex-direction: row;
    gap: 157px;
}
.info7,
.info8,
.info9 {
    text-align: center;
    display: flex;
}
.info7 input {
    width: 200px;
}
.info8 input,
.info9 input {
    width: 250px;
}
.fourth-info {
    margin-top: 10px;
    display: flex;
    flex-direction: row;
}
.info10,
.info11,
.info12 {
    text-align: center;
    display: flex;
    flex-direction: column;
}
.info11 input,
.info12 input {
    margin-left: 0;
}
.info11,
.info12 {
    width: 30%;
    margin: 0;
    padding: 0;
}
.info10 {
    width: 28.5%;
}
.pat-info3 {
    display: flex;
    width: 100%;
    flex-direction: column;
}
.fifth-info {
    gap: 70px;
    margin-top: 20px;
    display: flex;
    flex-direction: row;
}
.info13,
.info14 {
    display: flex;
    flex-direction: row;
}
.info13 {
    width: 75%;
}
.info14 {
    width: 25%;
}
.info13 input {
    width: 100%;
}
.info14-1 {
    display: flex;
    gap: 28px;
}
.sixth-info {
    margin-top: 10px;
    display: flex;
    flex-direction: row;
}
.info17 {
    gap: 20px;
    display: flex;
    flex-direction: row;
}
.info16 {
    margin-right: 75px;
}
.info15,
.info16 {
    display: flex;
    flex-direction: row;
}
.info17-1,
.info17-2,
.info17-3,
.info17-4,
.info17-5 {
    display: flex;
    flex-direction: row;
}
.info17-1 input,
.info17-2 input,
.info17-3 input,
.info17-4 input,
.info17-5 input {
    width: 100px;
}
.sec-2 {
    display: flex;
    width: 100%;
}
.obste {
    display: flex;
    flex-direction: column;
}
.obs label {
    /* background-color: red; */
    width: 240px;
    margin: 0;
}
.obs {
    padding-left: 5px;
    border: 1px solid black;
}
.obs input {
    border-left: 1px solid black;
    border-bottom: none;
    width: 100px;
}
.sec-2-1 {
    display: flex;
}
.sec-2-2 {
    display: flex;
    flex-direction: column;
}
.obs-title {
    width: 100%;
    display: flex;
    justify-content: center;
    text-align: center;
    border: 1px solid black;
}
.pres-probs {
    width: 70%;
    display: flex;
    flex-direction: column;
}
.fam-planning {
    width: 30%;
    display: flex;
    flex-direction: column;
    height: 100%;
}
.pres-probs-title {
    text-align: center;
    width: 100%;
    border: 1px solid black;
}
.pres {
    padding-left: 3.5px;
    display: flex;
    border: 1px solid black;
}
.pres label {
    padding: 1.5px;
    width: 40%;
}
.ques {
    display: flex;
    padding: 1.5px;
    width: 30%;
    justify-content: center;
    gap: 2px;
    border-left: 1px solid black;
}
.fam-title {
    text-align: center;
    border: 1px solid black;
    width: 100%;
}
.fam1 {
    display: flex;
    flex-direction: column;
}
.fam1-1 {
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 1px solid black;
    padding: 7px 0;
}
.fam1-1 p {
    margin-bottom: 0;
}
.fam1-2 {
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 1px solid black;
    padding: 3.5px 0;
}
.fam1-2 p {
    margin-bottom: 0;
}
.sec-2-2-2 {
    display: flex;
    width: 100%;
}
.ttl {
    width: 100%;
    display: flex;
}
.given {
    width: 28.4%;
}
.given p {
    padding: 15.5px 5px;
    width: 100%;
    border: 1px solid black;
    margin-bottom: 0px;
    margin-top: 0px;
    display: flex;
    text-align: center;
}
.dos {
    display: flex;
}
.dos1 {
    border: 1px solid black;
    align-items: center;
    display: flex;
    flex-direction: column;
}
.dos1 input {
    border-top: 1px solid black;
    border-bottom: none;
    width: 96.4px;
    margin-left: 0;
}
.sec-3 {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.sec-3-1 {
    width: 100%;
    display: flex;
    flex-direction: column;
}
.factors {
    display: flex;
    flex-direction: row;
}
.factor1,
.factor2 {
    width: 100%;
    display: flex;
    flex-direction: column;
    margin-left: 170px;
    gap: 10px;
}
.risk-title {
    justify-content: center;
    display: flex;
    text-align: center;
}
.sec-4 textarea {
    width: 100%;
    border: none;
    outline: none;
    text-align: center;
    background-color: transparent;
    overflow: hidden;
    resize: none;
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
        <div class="pageArea">
            <h1>Maternal Health Record</h1>
            <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ action('App\Http\Controllers\regValidation@maternal') }}">Maternal Health Record</a></li>
                  <li class="breadcrumb-item active">Full Record</li>
                </ol>
              </nav>
        </div>
        <div class="btnArea">
            <button type="button" class="btn btn-primary"><i class="bi bi-printer-fill"></i> Print</button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">New Record</button>  
        </div>
    </div>
    <!-- End Page Title -->
  
    <div class="card">
        <div class="card-body">
            <div class="content">
                <div class="sec-1 col">
                    <div class="title-sec">
                        <h2>MATERNAL HEALTH RECORD</h2>
                    </div>
                    <div class="pat-info">
                        <div class="first-info">
                            <div class="info1">
                                <label for="clientname">NAME OF CLIENT: BHS</label>
                                <input type="text" name="clientname" id="clientname">
                            </div>
                            <div class="info2">
                                <label for="typeblood">BLOOD TYPE:</label>
                                <input type="text" name="typeblood" id="typeblood">
                            </div>
                            <div class="info3">
                                <label for="famnum">FAMILY NO.:</label>
                                <input type="text" name="famnum" id="famnum">
                            </div>
                        </div>
                        <div class="second-info">
                            <div class="second">
                                <p>MAIDEN NAME:</p>
                                </div>
                                <div class="info4">
                                    <input type="text" name="fammaiden" id="fammaiden">
                                    <label for="fammaiden"><i>FAMILY</i></label>
                                </div>
                                <div class="info5">
                                    <input type="text" name="firstmaiden" id="firstmaiden">
                                    <label for="firstmaiden"><i>FIRST</i></label>
                                </div>
                                <div class="info6">
                                    <input type="text" name="midmaiden" id="midmaiden">
                                    <label for="midmaiden"><i>MIDDLE</i></label>
                                </div>
                        </div>
                    </div>
                    <div class="pat-info2">
                        <div class="third-info">
                            <div class="info7">
                                <label for="age">AGE:</label>
                                <input type="text" name="age" id="age">
                            </div>
                            <div class="info8">
                                <label for="bdate">BIRTHDATE:</label>
                                <input type="text" name="bdate" id="bdate">
                            </div>
                            <div class="info9">
                                <label for="occupation">OCCUPATION:</label>
                                <input type="text" name="occupation" id="occupation">
                            </div>
                        </div>
                        <div class="fourth-info">
                            <div class="fourth">
                                <p>HUSBAND NAME:</p>
                                </div>
                                <div class="info10">
                                    <input type="text" name="famhus" id="famhus">
                                    <label for="fammaiden"><i>FAMILY</i></label>
                                </div>
                                <div class="info11">
                                    <input type="text" name="firsthus" id="firsthus">
                                    <label for="firstmaiden"><i>FIRST</i></label>
                                </div>
                                <div class="info12">
                                    <input type="text" name="midhus" id="midhus">
                                    <label for="midmaiden"><i>MIDDLE</i></label>
                                </div>
                        </div>
                    </div>
                    <div class="pat-info3">
                        <div class="fifth-info">
                            <div class="info13">
                                <label for="address">ADDRESS:</label>
                                <input type="text" name="address" id="address">
                            </div>
                            <div class="info14">
                                <div class="info14-1">
                                    <label for="risk">RISK:</label>
                                    <div style="gap:5px; display:flex;">
                                        <input type="radio" name="risk" id="riskYes" value="Yes">Yes
                                    </div>
                                    <div style="gap:5px; display:flex;">
                                        <input type="radio" name="risk" id="riskNo" value="No">No
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sixth-info">
                            <div class="info15">
                                <label for="lmp">LMP:</label>
                                <input type="text" name="lmp" id="lmp">
                            </div>
                            <div class="info16">
                                <label for="edc">EDC:</label>
                                <input type="text" name="edc" id="edc">
                            </div>
                            <div class="info17">
                                <div class="info17-1">
                                    <label for="g">G:</label>
                                    <input type="text" name="g" id="g">
                                </div>
                                <div class="info17-2">
                                    <label for="t">T:</label>
                                    <input type="text" name="t" id="t">
                                </div>
                                <div class="info17-3">
                                    <label for="p">P:</label>
                                    <input type="text" name="p" id="p">
                                </div>
                                <div class="info17-4">
                                    <label for="a">A:</label>
                                    <input type="text" name="a" id="a">
                                </div>
                                <div class="info17-5">
                                    <label for="l">L:</label>
                                    <input type="text" name="l" id="l">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sec-2 col mt-4">
                    <div class="sec-2-1">
                        <div class="obste">
                            <div class="obs-title">
                                <h5>OBSTETRICAL HISTORY</h5>
                            </div>
                            <div class="obs">
                                <label for="alive">No. of children alive</label>
                                <input type="text" name="alive" id="alive">
                            </div>
                            <div class="obs">
                                <label for="living">No. of living children alive</label>
                                <input type="text" name="living" id="living">
                            </div>
                            <div class="obs">
                                <label for="abort">No. of abortion</label>
                                <input type="text" name="abort" id="abort">
                            </div>
                            <div class="obs">
                                <label for="fetal">No. of still births/fetal deaths</label>
                                <input type="text" name="fetal" id="fetal">
                            </div>
                            <div class="obs">
                                <label for="ceasar">Previous ceasarian section</label>
                                <input type="text" name="ceasar" id="ceasar">
                            </div>
                            <div class="obs">
                                <label for="hemor">Postpartum hemorrhage</label>
                                <input type="text" name="hemor" id="hemor">
                            </div>
                            <div class="obs">
                                <label for="previa">Placental Previa / Abruptio</label>
                                <input type="text" name="previa" id="previa">
                            </div>
                            <div class="obs">
                                <label for="alive">Others / (specify)</label>
                                <input type="text" name="others" id="others">
                            </div>
                        </div>
                    </div>
                    <div class="sec-2-2 col">
                        <div class="sec-2-2-1" style="display:flex; flex-direction:row;">
                            <div class="pres-probs">
                                <div class="pres-probs-title">
                                    <h5>PRESENT HEALTH PROBLEMS</h5>
                                </div>
                                <div class="pres">
                                    <label for="tb">TB</label>
                                    <div class="ques">
                                        <input type="radio" name="tb" id="tbno" value="No">No
                                    </div>
                                    <div class="ques">
                                        <input type="radio" name="tb" id="tbyes" value="Yes">Yes
                                    </div>
                                </div>
                                <div class="pres">
                                    <label for="heartdi">Heart Disease</label>
                                    <div class="ques">
                                        <input type="radio" name="heartdi" id="heartno" value="No">No
                                    </div>
                                    <div class="ques">
                                        <input type="radio" name="heartdi" id="heartyes" value="Yes">Yes
                                    </div>
                                </div>
                                <div class="pres">
                                    <label for="diabet">Diabetes</label>
                                    <div class="ques">
                                        <input type="radio" name="diabet" id="diano" value="No">No
                                    </div>
                                    <div class="ques">
                                        <input type="radio" name="diabet" id="diayes" value="Yes">Yes
                                    </div>
                                </div>
                                <div class="pres">
                                    <label for="bronchi">Bronchial Asthma</label>
                                    <div class="ques">
                                        <input type="radio" name="bronchi" id="bronno" value="No">No
                                    </div>
                                    <div class="ques">
                                        <input type="radio" name="bronchi" id="bronyes" value="Yes">Yes
                                    </div>
                                </div>
                                <div class="pres">
                                    <label for="goiter">Goiter</label>
                                    <div class="ques">
                                        <input type="radio" name="goiter" id="goitno" value="No">No
                                    </div>
                                    <div class="ques">
                                        <input type="radio" name="goiter" id="goityes" value="Yes">Yes
                                    </div>
                                </div>
                                <div class="pres">
                                    <label for="teta">Date Tetanus Toxoid</label>
                                    <div class="ques">
                                        <input type="radio" name="teta" id="tetno" value="No">No
                                    </div>
                                    <div class="ques">
                                        <input type="radio" name="teta" id="tetyes" value="Yes">Yes
                                    </div>
                                </div>
                            </div>
                            <div class="fam-planning">
                                <div class="fam-title">
                                    <h5>FAMILY PLANNING</h5>
                                </div>
                                <div class="fam1">
                                    <div class="fam1-1">
                                        <p>Has FP been practie?</p>
                                        <div class="answ">
                                            <input type="radio" name="fp" id="fpplayes" value="Yes">Yes
                                            <input type="radio" name="fp" id="fpplano" value="No">No
                                        </div>
                                        <p>If Yes, what method</p>
                                        <div class="method">
                                            <input type="text" name="method" id="method">
                                        </div>
                                    </div>
                                    <div class="fam1-2">
                                        <p>If No, willing to practice?</p>
                                        <div class="will">
                                            <input type="radio" name="willing" id="willingyes" value="Yes">Yes
                                            <input type="radio" name="willing" id="willingno" value="No">No
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sec-2-2-2">
                            <div class="ttl">
                                <div class="given">
                                    <p>Given</p>
                                </div>
                                <div class="dos">
                                    <div class="dos1">
                                        <label for="one">1</label>
                                        <input type="text" name="one" id="one">
                                    </div>
                                    <div class="dos1">
                                        <label for="two">2</label>
                                        <input type="text" name="two" id="two">
                                    </div>
                                    <div class="dos1">
                                        <label for="three">3</label>
                                        <input type="text" name="three" id="three">
                                    </div>
                                    <div class="dos1">
                                        <label for="four">4</label>
                                        <input type="text" name="four" id="four">
                                    </div>
                                    <div class="dos1">
                                        <label for="five">5</label>
                                        <input type="text" name="five" id="five">
                                    </div>
                                    <div class="dos1">
                                        <label for="total">TTL</label>
                                        <input type="text" name="total" id="total">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sec-3 col mt-4">
                    <div class="sec-3-1">
                        <div class="risk-title">
                            <h5>RISK FACTORS FOR PREGNANT WOMEN</h5>
                        </div>
                        <div class="factors mt-2">
                            <div class="factor1">
                                <div class="fac">
                                    <input type="checkbox" name="fac1" id="fac1">
                                    <label for="fac1">Age less than or greater than 35</label>
                                </div>
                                <div class="fac">
                                    <input type="checkbox" name="fac2" id="fac2">
                                    <label for="fac2">Less than 145 cm (4'9) tall</label>
                                </div>
                                <div class="fac">
                                    <input type="checkbox" name="fac3" id="fac3">
                                    <label for="fac3">Having a fourth (or more) baby</label>
                                </div>
                                <div class="fac">
                                    <input type="checkbox" name="fac4" id="fac4">
                                    <label for="fac4">Previous ceasarian section</label>
                                </div>
                                <div class="fac">
                                    <input type="checkbox" name="fac5" id="fac5">
                                    <label for="fac5">Post partum hemorrhage</label>
                                </div>
                            </div>
                            <div class="factor2">
                            <div class="fac">
                                    <input type="checkbox" name="fac6" id="fac6">
                                    <label for="fac6">3 consecutive miscarriage / still born</label>
                                </div>
                                <div class="fac">
                                    <input type="checkbox" name="fac7" id="fac7">
                                    <label for="fac7">TB</label>
                                </div>
                                <div class="fac">
                                    <input type="checkbox" name="fac8" id="fac8">
                                    <label for="fac8">Heart Disease</label>
                                </div>
                                <div class="fac">
                                    <input type="checkbox" name="fac9" id="fac9">
                                    <label for="fac9">Diabetes</label>
                                </div>
                                <div class="fac">
                                    <input type="checkbox" name="fac10" id="fac10">
                                    <label for="fac10">Bronchial Asthma</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sec-4 col">
                    <p class="row">Ante-Partum Visits:</p>
                    <div class="row header">
                        <div class="cell">DATE</div>
                        <div class="cell medium-cell">COMPLAINTS</div>
                        <div class="cell large-cell">FINDINGS AOG, HT, WT, BP, FUNDAL HT, FHB, PRESENTATION</div>
                        <div class="cell">LAB RESULT / UTZ</div>
                        <div class="cell">ASSESSMENT DIAGNOSIS</div>
                        <div class="cell">NEXT VISIT</div>
                    </div>
                    <div class="row">
                        <div class="cell small-cell"><input type="text"></div>
                        <div class="cell medium-cell"><input type="text"></div>
                        <div class="cell large-cell"><textarea rows="2" cols="30"></textarea></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><textarea rows="2" cols="30"></textarea></div>
                    </div>
                    <div class="row">
                        <div class="cell small-cell"><input type="text"></div>
                        <div class="cell medium-cell"><input type="text"></div>
                        <div class="cell large-cell"><textarea rows="2" cols="30"></textarea></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><textarea rows="2" cols="30"></textarea></div>
                    </div>
                    <div class="row">
                        <div class="cell small-cell"><input type="text"></div>
                        <div class="cell medium-cell"><input type="text"></div>
                        <div class="cell large-cell"><textarea rows="2" cols="30"></textarea></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><textarea rows="2" cols="30"></textarea></div>
                    </div>
                    <div class="row">
                        <div class="cell small-cell"><input type="text"></div>
                        <div class="cell medium-cell"><input type="text"></div>
                        <div class="cell large-cell"><textarea rows="2" cols="30"></textarea></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><textarea rows="2" cols="30"></textarea></div>
                    </div>
                    <div class="row">
                        <div class="cell small-cell"><input type="text"></div>
                        <div class="cell medium-cell"><input type="text"></div>
                        <div class="cell large-cell"><textarea rows="2" cols="30"></textarea></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><textarea rows="2" cols="30"></textarea></div>
                    </div>
                    <div class="row">
                        <div class="cell small-cell"><input type="text"></div>
                        <div class="cell medium-cell"><input type="text"></div>
                        <div class="cell large-cell"><textarea rows="2" cols="30"></textarea></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><textarea rows="2" cols="30"></textarea></div>
                    </div>
                    <div class="row">
                        <div class="cell small-cell"><input type="text"></div>
                        <div class="cell medium-cell"><input type="text"></div>
                        <div class="cell large-cell"><textarea rows="2" cols="30"></textarea></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><textarea rows="2" cols="30"></textarea></div>
                    </div>
                    <div class="row">
                        <div class="cell small-cell"><input type="text"></div>
                        <div class="cell medium-cell"><input type="text"></div>
                        <div class="cell large-cell"><textarea rows="2" cols="30"></textarea></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><textarea rows="2" cols="30"></textarea></div>
                    </div>
                    <div class="row">
                        <div class="cell small-cell"><input type="text"></div>
                        <div class="cell medium-cell"><input type="text"></div>
                        <div class="cell large-cell"><textarea rows="2" cols="30"></textarea></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><textarea rows="2" cols="30"></textarea></div>
                    </div>
                    <div class="row">
                        <div class="cell small-cell"><input type="text"></div>
                        <div class="cell medium-cell"><input type="text"></div>
                        <div class="cell large-cell"><textarea rows="2" cols="30"></textarea></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><textarea rows="2" cols="30"></textarea></div>
                    </div>
                    <div class="row">
                        <div class="cell small-cell"><input type="text"></div>
                        <div class="cell medium-cell"><input type="text"></div>
                        <div class="cell large-cell"><textarea rows="2" cols="30"></textarea></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><textarea rows="2" cols="30"></textarea></div>
                    </div>
                    <div class="row">
                        <div class="cell small-cell"><input type="text"></div>
                        <div class="cell medium-cell"><input type="text"></div>
                        <div class="cell large-cell"><textarea rows="2" cols="30"></textarea></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><textarea rows="2" cols="30"></textarea></div>
                    </div>
                    <div class="row">
                        <div class="cell small-cell"><input type="text"></div>
                        <div class="cell medium-cell"><input type="text"></div>
                        <div class="cell large-cell"><textarea rows="2" cols="30"></textarea></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><textarea rows="2" cols="30"></textarea></div>
                    </div>
                    <div class="row">
                        <div class="cell small-cell"><input type="text"></div>
                        <div class="cell medium-cell"><input type="text"></div>
                        <div class="cell large-cell"><textarea rows="2" cols="30"></textarea></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><textarea rows="2" cols="30"></textarea></div>
                    </div>
                    <div class="row">
                        <div class="cell small-cell"><input type="text"></div>
                        <div class="cell medium-cell"><input type="text"></div>
                        <div class="cell large-cell"><textarea rows="2" cols="30"></textarea></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><input type="text"></div>
                        <div class="cell"><textarea rows="2" cols="30"></textarea></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</main><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

<script>

</script>

  @include('layouts.footerHealthWorkers')
</body>
</html>