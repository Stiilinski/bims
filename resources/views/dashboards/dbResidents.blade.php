<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Barangay Information System</title>
    <link rel="stylesheet" href="/css/dbResidents.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>



{{-- BARANGAY CLEARANCE--}}

{{-- BACKEND NYA ANI! BRGY CLEARANCE/BUSINESS PERMIT PURPOSE--}}
<div class="barangayClearanceContainer">
    <form method="POST" action="{{ route('regValidation.saveBusinessClearance')}}" class="brgyClearance" id="brgy_clearance">
        @csrf
        <div class="closeClearance"><i class='bx bx-x' onclick="closeBCBusinessForm()"></i></div>
        <div class="labelClearance"><h2>Barangay Clearance</h2></div>

        <div class="grpFields1">
            <div class="namePart1">    
                <div class="mb-3">
                    <label for="tcode2" class="form-label">Transaction Code</label>
                    <input type="text" class="form-control" id="tcode2" name="tcode2" readonly>
                    <span class="text-danger error-text tcode2_error"></span>
                </div>
                <div class="mb-3">
                    <label for="fName2" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="fName2" name="fName2">
                    <span class="text-danger error-text fName2_error"></span>
                </div>
                <div class="mb-3">
                    <label for="mName2" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="mName2" name="mName2">
                    <span class="text-danger error-text mName2_error"></span>
                </div>
                <div class="mb-3">
                    <label for="lName2" class="form-label">Family Name</label>
                    <input type="text" class="form-control" id="lName2" name="lName2">
                    <span class="text-danger error-text lName2_error"></span>
                </div>
                <div class="mb-3">
                    <label for="suffix2" class="form-label">Suffix (Leave It If None)</label>
                    <select name="suffix2" id="suffix2" class="form-control">
                        <option value="">N/A</option>
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                        <option value="4">IV</option>
                        <option value="5">V</option>
                        <option value="Jr.">Jr.</option>
                    </select>
                    <span class="text-danger error-text suffix2_error"></span>
                </div>
                

                <div class="mb-3">
                    <label for="bDate2" class="form-label">Birth Date</label>
                    <input type="date" class="form-control" id="bDate2" name="bDate2">
                    <span class="text-danger error-text bDate2_error"></span>
                </div>
            </div>

            <div class="purposePart1">
                <div class="mb-3">
                    <label for="businessName" class="form-label">Business Name</label>
                    <input type="text" class="form-control" id="businessName" name="businessName">
                    <span class="text-danger error-text businessName_error"></span>
                </div>

                <div class="mb-3">
                    <label for="businessAddress" class="form-label">Business Address</label>
                    <input type="text" class="form-control" id="businessAddress" name="businessAddress">
                    <span class="text-danger error-text businessAddress_error"></span>
                </div>
                
                <div class="mb-3">
                    <label for="businessType" class="form-label">Type of Business</label>
                    <input type="text" class="form-control" id="businessType" name="businessType">
                    <span class="text-danger error-text businessType_error"></span>
                </div>

                <div class="mb-3">
                    <label for="dateIssued2" class="form-label">Date Issued</label>
                    <input type="date" class="form-control" id="dateIssued2" name="dateIssued2" readonly>
                    <span class="text-danger error-text dateIssued2_error"></span>
                </div>
                <div class="mb-3">
                    <label for="pickUp2" class="form-label">Pick Up Date</label>
                    <input type="date" class="form-control" id="pickUp2" name="pickUp2">
                    <span class="text-danger error-text pickUp2_error"></span>
                </div>
            </div>

            <div class="finalInputPart">
                <div class="mb-3 nature">
                    <label for="businessNature" class="form-label">Nature of Business Activities</label>
                    <textarea name="businessNature" id="businessNature" class="form-control"></textarea>
                    <span class="text-danger error-text businessNature_error"></span>
                </div>
            
                <div class="buttonClearance">
                    <button type="button" class="btn btn-primary" onclick="closeBCBusinessForm()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
{{-- BACKEND NYA ANI! BRGY CLEARANCE/MULTIPURPOSE--}}
<div class="barangayClearanceMultiContainer">
    <form method="POST" action="{{ route('regValidation.saveBrgyClearance')}}" class="brgyClearance" id="brgy_clearanceMult">
        @csrf
        <div class="closeClearance"><i class='bx bx-x' onclick="closeBCBusinessMultiForm()"></i></div>
        <div class="labelClearance"><h2>Barangay Clearance</h2></div>

        <div class="grpFields">
            <div class="namePart">    
                <div class="mb-3">
                    <label for="tcode1" class="form-label">Transaction Code</label>
                    <input type="text" class="form-control" id="tcode1" name="tcode1" readonly>
                    <span class="text-danger error-text tcode1_error"></span>
                </div>
                <div class="mb-3">
                    <label for="fName1" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="fName1" name="fName1">
                    <span class="text-danger error-text fName1_error"></span>
                </div>
                <div class="mb-3">
                    <label for="mName1" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="mName1" name="mName1">
                    <span class="text-danger error-text mName1_error"></span>
                </div>
                <div class="mb-3">
                    <label for="lName1" class="form-label">Family Name</label>
                    <input type="text" class="form-control" id="lName1" name="lName1">
                    <span class="text-danger error-text lName1_error"></span>
                </div>
                <div class="mb-3">
                    <label for="suffix1" class="form-label">Suffix (Leave It If None)</label>
                    <select name="suffix1" id="suffix1"  class="form-control">
                        <option value="">N/A</option>
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                        <option value="4">IV</option>
                        <option value="5">V</option>
                        <option value="jr">Jr.</option>
                    </select>
                </div>
                <span class="text-danger error-text suffix1_error"></span>

                <div class="mb-3">
                    <label for="bDate1" class="form-label">Birth Date</label>
                    <input type="date" class="form-control" id="bDate1" name="bDate1">
                    <span class="text-danger error-text bDate1_error"></span>
                </div>
            </div>

            <div class="purposePart">
                <div class="mb-3">
                    <label for="clearancePurpose" class="form-label">Purpose</label>
                    <input type="text" class="form-control" id="clearancePurpose" name="clearancePurpose">
                    <span class="text-danger error-text clearancePurpose_error"></span>
                </div>

                <div class="mb-3">
                    <label for="dateIssued1" class="form-label">Date Issued</label>
                    <input type="date" class="form-control" id="dateIssued1" name="dateIssued1" readonly>
                    <span class="text-danger error-text dateIssued1_error"></span>
                </div>
                <div class="mb-3">
                    <label for="pickUp1" class="form-label">Pick Up Date</label>
                    <input type="date" class="form-control" id="pickUp1" name="pickUp1">
                    <span class="text-danger error-text pickUp1_error"></span>
                </div>
            </div>
            
                <div class="buttonClearance">
                    <button type="button" class="btn btn-primary" onclick="closeBCBusinessMultiForm()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </div>
    </form>
</div>
{{--END OF BARANGAY CLEARANCE--}}
{{-- BARANGAY CERTIFICATIONS--}}
<div class="certificateContainer">
    <form method="POST" action="{{ route('regValidation.saveCertificate')}}" class="certificate" id="certificate">
        @csrf
        <div class="closeCertificate"><i class='bx bx-x' onclick="closeCertificateForm()"></i></div>
        <div class="labelCertificate"><h2>BARANGAY CERTIFICATES</h2></div>

        <div class="grpFields">
            <div class="namePart">    
                <div class="mb-3">
                    <label for="tcode3" class="form-label">Transaction Code</label>
                    <input type="text" class="form-control" id="tcode3" name="tcode3" readonly>
                    <span class="text-danger error-text tcode3_error"></span>
                </div>
                <div class="mb-3">
                    <label for="fName3" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="fName3" name="fName3">
                    <span class="text-danger error-text fName3_error"></span>
                </div>
                <div class="mb-3">
                    <label for="mName3" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="mName3" name="mName3">
                    <span class="text-danger error-text mName3_error"></span>
                </div>
                <div class="mb-3">
                    <label for="lName3" class="form-label">Family Name</label>
                    <input type="text" class="form-control" id="lName3" name="lName3">
                    <span class="text-danger error-text lName3_error"></span>
                </div>
                <div class="mb-3">
                    <label for="suffix3" class="form-label">Suffix (Leave It If None)</label>
                    <select name="suffix3" id="suffix3"  class="form-control">
                        <option value="">N/A</option>
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                        <option value="4">IV</option>
                        <option value="5">V</option>
                        <option value="Jr.">Jr.</option>
                    </select>
                    <span class="text-danger error-text suffix3_error"></span>
                </div>

                <div class="mb-3">
                    <label for="bDate3" class="form-label">Birth Date</label>
                    <input type="date" class="form-control" id="bDate3" name="bDate3">
                    <span class="text-danger error-text bDate3_error"></span>
                </div>

            </div>

            <div class="purposePart">
                <div class="mb-3">
                    <label for="purposeCertificate3" class="form-label">Purpose</label>
                    <input type="text" class="form-control" id="purposeCertificate3" name="purposeCertificate3" >
                    <span class="text-danger error-text purposeCertificate3_error"></span>
                </div>
                <div class="mb-3">
                    <label for="dateIssued3" class="form-label">Date Issued</label>
                    <input type="date" class="form-control" id="dateIssued3" name="dateIssued3" readonly>
                </div>
                <div class="mb-3">
                    <label for="pickUp3" class="form-label">Pick Up Date</label>
                    <input type="date" class="form-control" id="pickUp3" name="pickUp3">
                    <span class="text-danger error-text pickUp3_error"></span>
                </div>
            </div>
            
                <div class="buttonClearance">
                    <button type="button" class="btn btn-primary" onclick="closeCertificateForm()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </div>
    </form>
</div>    
{{--END OF BARANGAY CERTIFICATION--}}
{{-- BLOTTER COMPLAINT --}}
<div class="complaintContainer">
    <form method="POST" action="{{ route('regValidation.saveComplaints')}}" class="certificate" id="complaint">
        @csrf
        <div class="closeCertificate"><i class='bx bx-x' onclick="closeComplaintForm()"></i></div>
        <div class="labelCertificate"><h2>COMPLAINT/BLOTTER</h2></div>

        <div class="grpFields">
            <div class="namePart">    
                <div class="mb-3">
                    <label for="tcode4" class="form-label">Transaction Code</label>
                    <input type="text" class="form-control" id="tcode4" name="tcode4" readonly>
                    <span class="text-danger error-text tcode4_error"></span>
                </div>
                <div class="mb-3">
                    <label for="fName4" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="fName4" name="fName4">
                    <span class="text-danger error-text fName4_error"></span>
                </div>
                <div class="mb-3">
                    <label for="mName4" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="mName4" name="mName4">
                    <span class="text-danger error-text mName4_error"></span>
                </div>
                <div class="mb-3">
                    <label for="lName3" class="form-label">Family Name</label>
                    <input type="text" class="form-control" id="lName4" name="lName4">
                    <span class="text-danger error-text lName4_error"></span>
                </div>
                <div class="mb-3">
                    <label for="suffix4" class="form-label">Suffix (Leave It If None)</label>
                    <select name="suffix4" id="suffix4"  class="form-control">
                        <option value="">N/A</option>
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                        <option value="4">IV</option>
                        <option value="5">V</option>
                        <option value="Jr.">Jr.</option>
                    </select>
                </div>
                <span class="text-danger error-text suffix4_error"></span>

                <div class="mb-3">
                    <label for="bDate4" class="form-label">Birth Date</label>
                    <input type="date" class="form-control" id="bDate4" name="bDate4">
                    <span class="text-danger error-text bDate4_error"></span>
                </div>

            </div>

            <div class="purposePart">
                <div class="mb-3">
                    <label for="respondents" class="form-label">Respondent's Name (The one whom you complained about)</label>
                    <input type="text" class="form-control" id="respondents" name="respondents" >
                    <span class="text-danger error-text respondents_error"></span>
                </div>
                
                <div class="mb-3">
                    <label for="complaint" class="form-label">Complaints</label>
                    <textarea name="complaint" id="complaint" class="form-control"></textarea>
                    <span class="text-danger error-text complaint_error"></span>
                </div>

                <div class="mb-3">
                    <label for="resolution" class="form-label">Desired Resolution</label>
                    <textarea name="resolution" id="resolution" class="form-control"></textarea>
                    <span class="text-danger error-text resolution_error"></span>
                </div>

                <div class="mb-3">
                    <label for="dateIssued4" class="form-label">Date Made</label>
                    <input type="date" class="form-control" id="dateIssued4" name="dateIssued4" readonly>
                </div>
            </div>
            
                <div class="buttonClearance">
                    <button type="button" class="btn btn-primary" onclick="closeComplaintForm()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </div>
    </form>
</div>    
{{-- END OF BLOTTER COMPLAINT --}}



<div class="officialsContainer">
    <div class="officialsContent">
        <div class="officialsTitle">
            <h2 class="windowTop"><i class='bx bx-x' onclick="closeOfficials()"></i></h2>
            <h2 class="officialTxt">OFFICIALS</h2>
            <p class="officialDesc">Welcome to Poblacion Ward II, where community governance meets digital efficiency through the Barangay Information Management System (BIMS). Led by our dedicated Barangay Captain and supported by proactive Barangay Kagawads, our officials oversee the seamless operation of certifications, clearances, permits, complaints, resident records, and health services. BIMS empowers us to deliver transparent, responsive governance, ensuring that every resident's needs are efficiently met. Discover how we're transforming local administration for a more connected and informed community.</p>
        </div>

        <div class="currentTermOfficials">
            <h3 class="currentTermOfficialsTitle">Meet Our Current Officials</h3>
            <div class="orgChart">
                {{-- ORGANIZATION CHART WILL BE RENDERED HERE --}}
            </div>
        </div>
    </div>
</div>


<div class="managementContainer">
    <div class="managementContent">
        <div class="managementTitle">
            <h2 class="windowTop"><i class='bx bx-x' onclick="closeManagement()"></i></h2>
            <h2 class="managementTxt">Managements</h2>
            <p class="managementDesc">Management division, our team ensures smooth operations of the Barangay Information Management System (BIMS). They handle requests for documents and appointments, emphasizing efficiency, transparency, and community welfare.</p>
        </div>
        <div class="aboutPicture">
            <img src="/images/bsAbout.jpg" class="bsManagement" alt="management">
            <img src="/images/bsAbout1.jpg" class="bsManagement" alt="management">
            <img src="/images/bsAbout2.jpg" class="bsManagement" alt="management">
            <img src="/images/bsAbout3.jpg" class="bsManagement" alt="management">
        </div>
    </div>
</div>


<div class="employeeContainer">
    <div class="employeeContent">
        <div class="employeeTitle">
            <h2 class="windowTop"><i class='bx bx-x' onclick="closeEmployees()"></i></h2>
            <h2 class="employeeTxt">Employees</h2>
            <p class="employeeDesc">Our dedicated team at Barangay Poblacion Ward 2, Barangay Management Information System (BMIS) is committed to enhancing community services through innovative technology. Each member of our staff plays a crucial role in ensuring the seamless operation of our system, which serves as the backbone for efficient governance and citizen engagement within our barangay.</p>
        </div>
        <div class="aboutPicture">
            <img src="/images/bsEmployee.jpg" class="bsEmployee" alt="employee">
            <img src="/images/bsEmployee1.jpg" class="bsEmployee" alt="employee">
            <img src="/images/bsEmployee2.jpg" class="bsEmployee" alt="employee">
            <img src="/images/serviceBg.jpg" class="bsEmployee" alt="employee">
        </div>
    </div>
</div>

<div class="exContainer">
    <div class="exContent">
        <div class="exTitle">
            <h2 class="windowTop"><i class='bx bx-x' onclick="closeExperience()"></i></h2>
            <h2 class="exTxt">Experience</h2>
            <p class="exDesc">BMIS revolutionizes barangay governance by offering seamless digital solutions for residents and officials alike. From effortless online application of certificates, clearances, and permits to streamlined health services and daycare management, our system ensures efficient service delivery and community engagement. Discover a user-friendly interface designed to simplify interactions and empower both residents and barangay personnel with innovative technology.</p>
        </div>
        <div class="aboutPicture">
            <img src="/images/bsEx.jpg" class="bsEx" alt="ex">
            <img src="/images/bsEx1.jpg" class="bsEx" alt="ex">
            <img src="/images/bsEx2.jpg" class="bsEx" alt="ex">
            <img src="/images/bsEx3.jpg" class="bsEx" alt="ex">
        </div>
    </div>
</div>



<body>
    <div class="contentCon">
        <div class="headerCon">
            <div class="logoCon">
                <img src="/images/logo.png" class="logo" alt="brgy logo">
                <h2 class="systemName">BIM SYSTEM</h2>
            </div>
            
            <div class="navigations">
                <a href="#home"><button class="homeNav">Home</button></a>
                <a href="#about"><button class="about">About</button></a>
                <a href="#services"><button class="service">Services</button></a>
                <a href="#schedule"><button class="scheduleNav">Schedule</button></a>
                <a href="#maps"><button class="mapNav">Contact</button></a>
                <a href="#track"><button class="track">Trace Transaction</button></a>
            </div>
        </div>

   

        <div id="home" class="home">

            <div class="backgroundHome">
                <img src="/images/brgyPic.jpg" alt="brgy logo">
            </div>

            <div class="logoLeft">
                <img src="/images/logo.png" class="logoHome" alt="brgy logo">
            </div>

            <div class="contentRight">
                <div class="content1">
                    <h4 class="welcomeTitle">WELCOME TO</h4>
                    <h3 class="brgyTitle">BARANGAY POBLACION WARD 2</h3>
                </div>
                <div class="content2">
                    <h5 class="sitioTitle">Sitio Riles 1, Purok Ipil-Ipil, Ward 2 Minglanilla Cebu.</h5>
                    <h5 class="openHrs">Open Hours Of Barangay: Monday to Friday (8AM - 5PM)</h5>
                    <h5 class="contactTitle">BrgyPoblacionWard2@gmail.com / 09056325842</h5>
                </div>
                <div class="content3">    
                    <a href="#about"><button class="btnAbout">About Us</button></a>
                </div>
            </div>

        </div>

        <div id="about" class="aboutUs">
            <div class="aboutHeader">
                <h4 class="headerPhrase"> Through Integrated Solutions and Dedicated Service, Our Barangay Information Management System and Its Empowered Employees Foster Community Well-being and Seamless Access to Vital Services. </h4>
            </div>

            <div class="aboutMainContent">
                <div class="aboutLeft">
                    
                    <div class="cards" onclick="openManagement()">    
                        <div class="card-image"></div>
                        <div class="card-title">
                            <h3 class="titleCard">Management</h3>
                        </div>
                        <div class="card-description"><span class="cardDesc">Management division, our team ensures smooth operations of the Barangay Information Management System (BIMS). They handle requests for documents and appointments, emphasizing efficiency, transparency, and community welfare.</span></div>
                        <div class="card-button"><button class="btnCards">See More...</button></div>
                    </div>

                    <div class="cards" onclick="openOfficials()">    
                        <div class="card-image"></div>
                        <div class="card-title">
                            <h3 class="titleCard">Officials</h3>
                        </div>
                        <div class="card-description"><span class="cardDesc">Welcome to Poblacion Ward II, where community governance meets digital efficiency through the Barangay Information Management System (BIMS). Led by our dedicated Barangay Captain and supported by proactive Barangay Kagawads, our officials oversee the seamless operation of certifications, clearances, permits, complaints, resident records, and health services. BIMS empowers us to deliver transparent, responsive governance, ensuring that every resident's needs are efficiently met. Discover how we're transforming local administration for a more connected and informed community.</span></div>
                        <div class="card-button"><button class="btnCards">See More...</button></div>
                    </div>

                    <div class="cards" onclick="openEmployees()">    
                        <div class="card-image"></div>
                        <div class="card-title">
                            <h3 class="titleCard">Employees</h3>
                        </div>
                        <div class="card-description"><span class="cardDesc">Management division, our team ensures smooth operations of the Barangay Information Management System (BIMS). They handle requests for documents and appointments, emphasizing efficiency, transparency, and community welfare.</span></div>
                        <div class="card-button"><button class="btnCards">See More...</button></div>
                    </div>

                    <div class="cards" onclick="openExperience()">    
                        <div class="card-image"></div>
                        <div class="card-title">
                            <h3 class="titleCard">Experience</h3>
                        </div>
                        <div class="card-description"><span class="cardDesc">Management division, our team ensures smooth operations of the Barangay Information Management System (BIMS). They handle requests for documents and appointments, emphasizing efficiency, transparency, and community welfare.</span></div>
                        <div class="card-button"><button class="btnCards">See More...</button></div>
                    </div>
                </div>

                <div class="aboutRight">
                    <img src="/images/aboutPicCopy.png" class="aboutPic">
                </div>
            </div>

        </div>

        <div id="services" class="services">
            <img src="/images/serviceBg.jpg" class="servicebg" alt="brgy logo">

            <div class="servicesTitle">
                <h2 class="servicesMainTitle">SERVICES</h2>
                <h4 class="servicesOfferTitle">FRONT SERVICE OFFER</h4>
            </div>
            <div class="servicesOptions">

                <div class="service-cards">    
                    <div class="service-card-image"><img src="/images/clearance.png" class="serImg"></div>
                    <div class="service-card-title">
                        <h3 class="service-titleCard">Barangay Clearance</h3>
                    </div>
                    <div class="service-card-description"><span class="cardDesc">View The Requirements Needed For Barangay Clearance & Acquire Online Now.</span></div>
                    <div class="service-card-button"><button class="service-btnCards" onclick="openBrgyMultiClearance()">Proceed</button></div>
                </div>

                <div class="service-cards">    
                    <div class="service-card-image"><img src="/images/permit.jpg" class="serImg"></div>
                    <div class="service-card-title">
                        <h3 class="service-titleCard">Business Permit</h3>
                    </div>
                    <div class="service-card-description"><span class="cardDesc">View The Requirements Needed For Barangay Clearance Business Permit & Acquire Online Now.</span></div>
                    <div class="service-card-button"><button class="service-btnCards" onclick="openBCBusinessForm()">Proceed</button></div>
                </div>

                <div class="service-cards">    
                    <div class="service-card-image"><img src="/images/complaint.jpg" class="serImg"></div>
                    <div class="service-card-title">
                        <h3 class="service-titleCard">Blotter</h3>
                    </div>
                    <div class="service-card-description"><span class="cardDesc">View The Requirements Needed For Blotter or Complaint & Acquire Online Now.</span></div>
                    <div class="service-card-button"><button class="service-btnCards" onclick="openComplaintForm()">Proceed</button></div>
                </div>


                <div class="service-cards">    
                    <div class="service-card-image"><img src="/images/certificate.jpg" class="serImg"></div>
                    <div class="service-card-title">
                        <h3 class="service-titleCard">Certifications</h3>
                    </div>
                    <div class="service-card-description"><span class="cardDesc">View The Requirements Needed For Barangay Certifications & Acquire Online Now.</span></div>
                    <div class="service-card-button"><button class="service-btnCards" onclick="openCertificateForm()">Proceed</button></div>
                </div>
            </div>
        </div>

        <div id="schedule" class="schedule">
            <div class="scheduleList">
                <div class="schedHeader">
                    <h3 class="schedListTitle">SCHEDULE FOR THIS MONTH'S EVENT</h3>
                </div>
                <div class="scheduleCards">
                    <!-- This will be dynamically populated with schedule cards -->
                </div>
            </div>
            
            <div class="scheduleDetails">
                <div class="slideshow-container">
                    <!-- Slides will be dynamically populated here -->
                </div>
            </div>
        </div>
        
        <div id="maps" class="maps">
            <div class="headerMap">Contact Us</i></div>
            <div class="headerHeadline">If You Have Any More Question Don't Hesitate To Contact Us.</div>

            <div class="map" id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233.24769734888918!2d123.7938889941223!3d10.24304679821909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a977e2de7dd9eb%3A0x9d5be529bf8866e7!2sPoblacion%20Ward%20II%20Barangay%20Hall!5e1!3m2!1sen!2sph!4v1719578373558!5m2!1sen!2sph" width="50%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                
                <div class="contactInfo">
                    <div class="brgyAddress">
                        <i class='bx bxs-location-plus' ></i>
                        <span class="title1">ADDRESS:</span>
                        <span class="addressDesc">6046 Red Horse St, Minglanilla, Cebu</span>
                    </div>

                    <div class="brgyEmail">
                        <i class='bx bxs-envelope' ></i>
                        <span class="title1">EMAIL:</span>
                        <span class="addressDesc">brgyWard2@gmail.com</span>
                    </div>

                    <div class="brgyNumber">
                        <i class='bx bxs-phone'></i>
                        <span class="title1">Contact Number:</span>
                        <span class="addressDesc">09264851369</span>
                        <span class="addressDesc">272-6825</span>
                    </div>

                    <div class="brgySocials">
                        <span class="title1">CONTACT US</span>
                        <span class="addressDesc">Contact Us For More Help</span>
                        <span class="links">
                            <i class='bx bxl-facebook-circle'></i>
                            <i class='bx bxl-twitter' ></i>
                            <i class='bx bxl-instagram-alt' ></i>
                        </span>
                    </div>
                </div>
            </div>


        </div>

        <div id="track" class="trackRequest">
            
            <div class="greetings">
                <h3 class="greet">Track Requested Documents</h3>
                <span class="trackDesc">Please input your unique transaction code below to check the current status and progress of your request. This code will provide you with real-time updates on the processing of your transaction. Thank you for choosing our service, and we look forward to assisting you further!</span>
            </div>
    
            <div class="traces">
                <form action="{{ route('traceTransaction') }}" method="post" class="traceCon">
                    @csrf
                    <div class="codeInput">
                        <input type="text" class="form-control" id="transactionCode" name="transactionCode" placeholder="Input Transaction Code Here...">
                    </div>
                    <button type="submit" class="btn btn-primary btnTransaction">SEARCH</button>
                </form>
            </div>

        
            <div id="resultContainer"></div>
        </div>

        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    </div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="/js/residentDb.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var maxLength = 150;
    var cardDescElements = document.querySelectorAll('.cardDesc');

    cardDescElements.forEach(function(element) {
        var truncText = element.textContent.trim();
        var truncated = truncText.substring(0, maxLength) + (truncText.length > maxLength ? '...' : '');
        element.textContent = truncated;
    });
});

document.addEventListener('DOMContentLoaded', () => {
    fetch('/schedule')
        .then(response => response.json())
        .then(data => {
            const scheduleCardsContainer = document.querySelector('.scheduleCards');
            const slideshowContainer = document.querySelector('.slideshow-container');
            let slideIndex = 0;

            scheduleCardsContainer.innerHTML = ''; // Clear previous content
            slideshowContainer.innerHTML = ''; // Clear previous slides

            if (data && data.length > 0) {
                data.forEach((schedule, index) => {
                    // Create schedule card
                    const schedCard = document.createElement('div');
                    schedCard.classList.add('schedCard');

                    // Extract date components from sched_date
                    const schedDate = new Date(schedule.sched_date);
                    const dayOfMonth = schedDate.getDate();

                    const month = String(schedDate.getMonth() + 1).padStart(2, '0'); // Months are zero-based
                    const day = String(schedDate.getDate()).padStart(2, '0');
                    const year = schedDate.getFullYear();

                    schedCard.innerHTML = `
                        <div class="schedNumber">${dayOfMonth}</div>
                        <div class="schedTitle">${schedule.sched_title}</div>
                        <div class="schedStatus">${schedule.sched_status}</div>
                    `;

                    // Event listener to show the slide on click
                    schedCard.addEventListener('click', () => {
                        showSlide(index);
                    });

                    scheduleCardsContainer.appendChild(schedCard);

                    // Create slide
                    const slide = document.createElement('div');
                    slide.classList.add('slides');
                    slide.innerHTML = `
                        <img src="/storage/${schedule.sched_picture}" alt="${schedule.sched_title}" class="schedPicture">
                        <h4 class="schedTitles">${schedule.sched_title}</h4>
                        <p class="schedDesc">${schedule.sched_description}</p>
                        <div class="schedDate">
                            <div class="monthSched">
                                ${month}
                                <span class="monthTitle">Months</span>    
                            </div>

                            <div class="daySched">
                                ${day}
                                <span class="dayTitle">Days</span>    
                            </div>
                            
                            <div class="yearSched">
                                ${year}
                                <span class="yearTitle">Years</span>
                            </div>
                        </div>
                    `;
                    slideshowContainer.appendChild(slide);
                });

                // Initialize the slideshow
                slides = document.querySelectorAll('.slides'); // Update slides variable
                showSlide(slideIndex);
                autoSlideShow();
            } else {
                scheduleCardsContainer.innerHTML = '<p class="emptySched">No Event Schedule Intended For This Month</p>';
                slideshowContainer.innerHTML = '<h2 class="emptyAnnounce">No Event Schedule Intended For This Month</h2>';
                console.log('No schedules found');
            }
        })
        .catch(error => {
            console.error('Error fetching schedule data:', error);
        });

    let slideIndex = 0;
    let slides;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('active-slide', 'prev-slide', 'next-slide');
            if (i === index) {
                slide.classList.add('active-slide');
            } else if (i === (index - 1 + slides.length) % slides.length) {
                slide.classList.add('prev-slide');
            } else if (i === (index + 1) % slides.length) {
                slide.classList.add('next-slide');
            }
        });
        slideIndex = index;
    }

    function nextSlide() {
        slideIndex = (slideIndex + 1) % slides.length;
        showSlide(slideIndex);
    }

    function prevSlide() {
        slideIndex = (slideIndex - 1 + slides.length) % slides.length;
        showSlide(slideIndex);
    }

    function autoSlideShow() {
        nextSlide();
        setTimeout(autoSlideShow, 3000); // Change slide every 3 seconds
    }

    document.querySelector('.prev').addEventListener('click', prevSlide);
    document.querySelector('.next').addEventListener('click', nextSlide);
});

document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.traceCon').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        const transactionCode = document.getElementById('transactionCode').value;
        const token = document.querySelector('input[name="_token"]').value;

        fetch('{{ route('traceTransaction') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({ transactionCode: transactionCode })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Response Data:', data); // Log the response data for debugging

            // Handle the response data
            let resultContainer = document.getElementById('resultContainer');
            resultContainer.innerHTML = ''; // Clear previous results

            if (data.result) {
                let tableHTML = '';
                if (data.type === 'blotter') {
                    tableHTML = `
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Complainants</th>
                                    <th>Respondents</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    ${data.result.blotter_status === 'pending' ? '<th>Action</th>' : ''}
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>${data.result.blotter_id}</td>
                                    <td>${data.result.res_fname} ${data.result.res_mname} ${data.result.res_lname}</td>
                                    <td>${data.result.blotter_respondents}</td>
                                    <td>${data.result.blotter_complaintMade}</td>
                                    <td>${data.result.blotter_status}</td>
                                    ${data.result.blotter_status === 'pending' ? `<td><button type="button" class="btn btn-danger" onclick="cancelBlotter(${data.result.blotter_id})">Cancel</button></td>` : ''}
                                </tr>
                            </tbody>
                        </table>
                    `;
                } else if (data.type === 'certificate') {
                    tableHTML = `
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Age</th>
                                    <th>Purok</th>
                                    <th>Status</th>
                                    <th>Purpose</th>
                                    ${data.result.certStatus === 'pending' ? '<th>Action</th>' : ''}
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>${data.result.id}</td>
                                    <td>${data.result.res_fname} ${data.result.res_mname} ${data.result.res_lname}</td>
                                    <td>${calculateAge(data.result.res_bdate)}</td>
                                    <td>${data.result.res_purok}</td>
                                    <td>${data.result.certStatus}</td>
                                    <td>${data.result.cert_purpose}</td>
                                    ${data.result.certStatus === 'pending' ? `<td><button type="button" class="btn btn-danger" onclick="cancelCertificate(${data.result.id})">Cancel</button></td>` : ''}
                                </tr>
                            </tbody>
                        </table>
                    `;
                } else if (data.type === 'clearance') {
                    tableHTML = `
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Age</th>
                                    <th>Purok</th>
                                    <th>Status</th>
                                    <th>Purpose</th>
                                    ${data.result.bcl_status === 'pending' ? '<th>Action</th>' : ''}
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>${data.result.bcl_id}</td>
                                    <td>${data.result.res_fname} ${data.result.res_mname} ${data.result.res_lname}</td>
                                    <td>${calculateAge(data.result.res_bdate)}</td>
                                    <td>${data.result.res_purok}</td>
                                    <td>${data.result.bcl_status}</td>
                                    <td>${data.result.bcl_purpose}</td>
                                    ${data.result.bcl_status === 'pending' ? `<td><button type="button" class="btn btn-danger" onclick="cancelClearance(${data.result.bcl_id})">Cancel</button></td>` : ''}
                                </tr>
                            </tbody>
                        </table>
                    `;
                } else if (data.type === 'business') {
                    tableHTML = `
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
                                    ${data.result.bc_status === 'pending' ? '<th>Action</th>' : ''}
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>${data.result.id}</td>
                                    <td>${data.result.res_fname} ${data.result.res_mname} ${data.result.res_lname}</td>
                                    <td>${calculateAge(data.result.res_bdate)}</td>
                                    <td>${data.result.res_purok}</td>
                                    <td>${data.result.bc_businessName}</td>
                                    <td>${data.result.bc_businessAddress}</td>
                                    <td>${data.result.bc_pickUpDate}</td>
                                    <td>${data.result.bc_status}</td>
                                    ${data.result.bc_status === 'pending' ? `<td><button type="button" class="btn btn-danger" onclick="cancelBusiness(${data.result.id})">Cancel</button></td>` : ''}
                                </tr>
                            </tbody>
                        </table>
                    `;
                }
                resultContainer.innerHTML = tableHTML;
            }
        })
        .catch(error => {
            console.error('Error fetching transaction data:', error);
        });
    });

    function calculateAge(birthdate) {
        const birthDate = new Date(birthdate);
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDifference = today.getMonth() - birthDate.getMonth();
        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

    window.cancelBlotter = function(id) {
        sendCancellationRequest('{{ route('cancelBlotter') }}', id);
    };

    window.cancelCertificate = function(id) {
        sendCancellationRequest('{{ route('cancelCertificate') }}', id);
    };

    window.cancelClearance = function(id) {
        sendCancellationRequest('{{ route('cancelClearance') }}', id);
    };

    window.cancelBusiness = function(id) {
        sendCancellationRequest('{{ route('cancelBusiness') }}', id);
    };

    function sendCancellationRequest(url, id) {
        const token = document.querySelector('input[name="_token"]').value;

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({ id: id })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.message) {
                alert(data.message);
                // Optionally, refresh the data or update the UI to reflect the change
            } else if (data.error) {
                alert(data.error);
            }
        })
        .catch(error => {
            console.error('Error cancelling transaction:', error);
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.navigations, .content3, a');

    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('href').substring(1); // Get target id without the '#'
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                const offsetTop = targetElement.offsetTop - 60; // Calculate target element's offset top position
                const scrollOptions = {
                    top: offsetTop,
                    behavior: 'smooth' // Use smooth scrolling behavior
                };

                window.scrollTo(scrollOptions);
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.aboutHeader');
    const cards = document.querySelectorAll('.cards');

    function checkVisibility() {
        // Check header visibility
        const headerTop = header.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (headerTop < windowHeight * 0.8) {
            header.classList.add('show');
        } else {
            header.classList.remove('show');
        }

        // Check cards visibility
        cards.forEach(card => {
            const cardTop = card.getBoundingClientRect().top;
            
            if (cardTop < windowHeight * 0.8) {
                card.classList.add('show');
            } else {
                card.classList.remove('show');
            }
        });
    }

    // Initial check when page loads
    checkVisibility();

    // Check again on scroll
    window.addEventListener('scroll', checkVisibility);
});

document.addEventListener('DOMContentLoaded', function() {
    const servicesTitle = document.querySelector('.servicesTitle');
    const serviceCards = document.querySelectorAll('.service-cards');

    function checkVisibility() {
        const servicesTitleTop = servicesTitle.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (servicesTitleTop < windowHeight * 0.8) {
            servicesTitle.classList.add('show');
        } else {
            servicesTitle.classList.remove('show');
        }

        serviceCards.forEach((card, index) => {
            const cardTop = card.getBoundingClientRect().top;

            if (cardTop < windowHeight * 0.8) {
                setTimeout(() => {
                    card.classList.add('show');
                }, index * 200); // Adjust delay as needed for staggered effect
            } else {
                card.classList.remove('show');
            }
        });
    }

    // Initial check when page loads
    checkVisibility();

    // Check again on scroll
    window.addEventListener('scroll', checkVisibility);
});

document.addEventListener('DOMContentLoaded', function() {
    const servicesTitle = document.querySelector('.servicesTitle');
    const serviceCards = document.querySelectorAll('.service-cards');
    const mapsSection = document.querySelector('.maps');
    const headerMap = document.querySelector('.headerMap');
    const headerHeadline = document.querySelector('.headerHeadline');
    const contactInfoItems = document.querySelectorAll('.contactInfo > div');

    function checkVisibility() {
        const servicesTitleTop = servicesTitle.getBoundingClientRect().top;
        const mapsSectionTop = mapsSection.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (servicesTitleTop < windowHeight * 0.8) {
            servicesTitle.classList.add('show');
        } else {
            servicesTitle.classList.remove('show');
        }

        serviceCards.forEach((card, index) => {
            const cardTop = card.getBoundingClientRect().top;

            if (cardTop < windowHeight * 0.8) {
                setTimeout(() => {
                    card.classList.add('show');
                }, index * 200); // Adjust delay as needed for staggered effect
            } else {
                card.classList.remove('show');
            }
        });

        if (mapsSectionTop < windowHeight * 0.8) {
            headerMap.classList.add('show');
            headerHeadline.classList.add('show');
            contactInfoItems.forEach((item, index) => {
                setTimeout(() => {
                    item.classList.add('show');
                }, index * 200); // Adjust delay as needed for staggered effect
            });
        } else {
            headerMap.classList.remove('show');
            headerHeadline.classList.remove('show');
            contactInfoItems.forEach(item => {
                item.classList.remove('show');
            });
        }
    }

    // Initial check when page loads
    checkVisibility();

    // Check again on scroll
    window.addEventListener('scroll', checkVisibility);
});

document.addEventListener('DOMContentLoaded', function() {
    const servicesTitle = document.querySelector('.servicesTitle');
    const serviceCards = document.querySelectorAll('.service-cards');
    const mapsSection = document.querySelector('.maps');
    const headerMap = document.querySelector('.headerMap');
    const headerHeadline = document.querySelector('.headerHeadline');
    const contactInfoItems = document.querySelectorAll('.contactInfo > div');
    const trackSection = document.querySelector('.trackRequest');
    const greetings = document.querySelector('.greetings');
    const traces = document.querySelector('.traces');

    function checkVisibility() {
        const servicesTitleTop = servicesTitle.getBoundingClientRect().top;
        const mapsSectionTop = mapsSection.getBoundingClientRect().top;
        const trackSectionTop = trackSection.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (servicesTitleTop < windowHeight * 0.8) {
            servicesTitle.classList.add('show');
        } else {
            servicesTitle.classList.remove('show');
        }

        serviceCards.forEach((card, index) => {
            const cardTop = card.getBoundingClientRect().top;

            if (cardTop < windowHeight * 0.8) {
                setTimeout(() => {
                    card.classList.add('show');
                }, index * 200); // Adjust delay as needed for staggered effect
            } else {
                card.classList.remove('show');
            }
        });

        if (mapsSectionTop < windowHeight * 0.8) {
            headerMap.classList.add('show');
            headerHeadline.classList.add('show');
            contactInfoItems.forEach((item, index) => {
                setTimeout(() => {
                    item.classList.add('show');
                }, index * 200); // Adjust delay as needed for staggered effect
            });
        } else {
            headerMap.classList.remove('show');
            headerHeadline.classList.remove('show');
            contactInfoItems.forEach(item => {
                item.classList.remove('show');
            });
        }

        if (trackSectionTop < windowHeight * 0.8) {
            greetings.classList.add('show');
            traces.classList.add('show');
        } else {
            greetings.classList.remove('show');
            traces.classList.remove('show');
        }
    }

    // Initial check when page loads
    checkVisibility();

    // Check again on scroll
    window.addEventListener('scroll', checkVisibility);
});

document.addEventListener('DOMContentLoaded', function() {
    const headerCon = document.querySelector('.headerCon');
    const homeSection = document.getElementById('home');
    const aboutSection = document.getElementById('about');
    const servicesSection = document.getElementById('services');
    const scheduleSection = document.getElementById('schedule');
    const mapsSection = document.getElementById('maps');
    const trackSection = document.getElementById('track');

    function updateHeaderBg() {
        const servicesTop = servicesSection.getBoundingClientRect().top;
        const scheduleTop = scheduleSection.getBoundingClientRect().top;
        const homeTop = homeSection.getBoundingClientRect().top;
        const aboutTop = aboutSection.getBoundingClientRect().top;
        const mapsTop = mapsSection.getBoundingClientRect().top;
        const trackTop = trackSection.getBoundingClientRect().top;

        const windowHeight = window.innerHeight;


        if ((servicesTop < windowHeight && servicesTop > -servicesSection.offsetHeight) ||
            (scheduleTop < windowHeight && scheduleTop > -scheduleSection.offsetHeight)) {
            headerCon.style.backgroundColor = '#1E65A8';
        } else {
            headerCon.style.backgroundColor = '#0c2843';
        }
    }

    window.addEventListener('scroll', updateHeaderBg);

    // Initial check when page loads
    updateHeaderBg();
});


document.addEventListener("DOMContentLoaded", function() {
    fetch('/officials')
        .then(response => response.json())
        .then(data => {
            const orgChartContainer = document.querySelector('.orgChart');
            const positions = {
                'Barangay Captain': [],
                'Secretary': [],
                'Treasurer': [],
                'Barangay Kagawad': [],
                'SK Chairman': [],
                'SK Councilor': []
            };

            data.forEach(official => {
                if (positions[official.of_position]) {
                    positions[official.of_position].push(official);
                }
            });

            let chartHtml = `
                <div class="position firstLine">
                    ${positions['Barangay Captain'].map(captain => `
                        <div class="official">
                            <div class="picArea">
                                <img src="storage/${captain.res_picture}" alt="Picture of ${captain.res_fname} ${captain.res_lname}">
                            </div>
                            <div class="titleNameArea">
                                <p>${captain.res_fname} ${captain.res_lname}</p>
                                <p>Barangay Captain</p>
                            </div>    
                        </div>
                    `).join('')}
                </div>
                <div class="connectorLine1 firstLineConnector "> <div class="leftLineConnector"></div>  <div class="rightLineConnector"></div> </div>
                <div class="position secondLine">
                    <div class="official">
                        ${positions['Secretary'].map(secretary => `
                            <div class="picArea">
                                <img src="storage/${secretary.res_picture}" alt="Picture of ${secretary.res_fname} ${secretary.res_lname}">
                            </div>
                            <div class="titleNameArea">
                                <p>${secretary.res_fname} ${secretary.res_lname}</p>
                                <p>Secretary</p>
                            </div>
                        `).join('')}
                    </div>
                    <div class="official">
                        ${positions['Treasurer'].map(treasurer => `
                            <div class="picArea">
                                <img src="storage/${treasurer.res_picture}" alt="Picture of ${treasurer.res_fname} ${treasurer.res_lname}">
                            </div>
                            <div class="titleNameArea">
                                <p>${treasurer.res_fname} ${treasurer.res_lname}</p>
                                <p>Treasurer</p>
                            </div>
                        `).join('')}
                    </div>
                </div>

                <div class="connectorLine"> <div class="secondleftLineConnector"></div>  <div class="secondrightLineConnector"></div> </div>
                
                <div class="position thirdLine">
                    <div class="thirdLeft">
                        <h3 class="positionTitle"> Barangay Kagawad </h3>
                        ${positions['Barangay Kagawad'].map(kagawad => `
                            <div class="official">
                                <div class="picArea">
                                    <img src="storage/${kagawad.res_picture}" alt="Picture of ${kagawad.res_fname} ${kagawad.res_lname}">
                                </div>
                                <div class="titleNameArea">
                                    <p>${kagawad.res_fname} ${kagawad.res_lname}</p>
                                    <p>Barangay Kagawad</p>
                                </div>
                            </div>
                        `).join('')}
                    </div>
                    <div class="thirdRight">
                        <div class="official">
                            ${positions['SK Chairman'].map(chairman => `
                                <div class="picArea">
                                    <img src="storage/${chairman.res_picture}" alt="Picture of ${chairman.res_fname} ${chairman.res_lname}">
                                </div>
                                <div class="titleNameArea">
                                    <p>${chairman.res_fname} ${chairman.res_lname}</p>
                                    <p>SK Chairman</p>
                                </div>
                            `).join('')}
                        </div>
                         <div class="connectorLine">   <div class="secondrightLineConnector2"></div> </div>
                        ${positions['SK Councilor'].map(councilor => `
                        <div class="councilorCon">
                            <h3 class="positionTitle"> SK Councilor </h3>
                            <div class="official">
                                <div class="picArea">
                                    <img src="storage/${councilor.res_picture}" alt="Picture of ${councilor.res_fname} ${councilor.res_lname}">
                                </div>
                                <div class="titleNameArea">
                                    <p>${councilor.res_fname} ${councilor.res_lname}</p>
                                    <p>SK Councilor</p>
                                </div>
                            </div>
                        </div>
                        `).join('')}
                    </div>
                </div>
            `;

            orgChartContainer.innerHTML = chartHtml;
        })
        .catch(error => console.error('Error fetching officials:', error));
});


function openOfficials() {
    var officials = document.querySelector('.officialsContainer');
    officials.style.display = "flex";
}

function closeOfficials() {
    var officials = document.querySelector('.officialsContainer');
    officials.style.display = "none";
}

function openManagement() {
    var officials = document.querySelector('.managementContainer');
    officials.style.display = "flex";
}

function closeManagement() {
    var officials = document.querySelector('.managementContainer');
    officials.style.display = "none";
}

function openEmployees() {
    var officials = document.querySelector('.employeeContainer');
    officials.style.display = "flex";
}

function closeEmployees() {
    var officials = document.querySelector('.employeeContainer');
    officials.style.display = "none";
}

function openExperience() {
    var officials = document.querySelector('.exContainer');
    officials.style.display = "flex";
}

function closeExperience() {
    var officials = document.querySelector('.exContainer');
    officials.style.display = "none";
}


</script>

</body>
</html>