<div class="editresCon">
    <div class="editresInput">
        <div class="editResHeader">
            <div class="e_titlePart">
                <h4 class="e_titleForm">Edit Resident</h4>
            </div>
            
            <div class="e_closePart">
                <h4 class="e_titleForm"><i class='bx bx-x' onclick="closeEditForm()"></i></h4>
            </div>
        </div>

        <form class="editResForms" id="e_mainForm" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="e_leftInput">    
            <div class="e_picturePart">
                <div class="e_avatarcon">
                    <img id="e_profilePreview" class="e_avatar" alt="Profile Image">
                    <input type="hidden" name="e_id" id="e_id">
                    <input type="text" name="e_path" id="e_path">
                    <div class="mb-3">
                        <label for="e_profile" class="form-label1">Profile Picture</label>
                        <input type="file" class="form-control" id="e_profile" name="picture" aria-describedby="inputGroupFileediton03" aria-label="Upload">
                        <span class="text-danger error-text profile_error"></span>
                    </div>  
                    
                    <div class="mb-3">
                        <label for="e_household" class="form-label1">Household Number</label>
                        <input type="number" class="form-control" id="e_household" name="household">
                        <span class="text-danger error-text household_error"></span>
                    </div> 

                    <div class="mb-3">
                        <label for="e_dateRegister" class="form-label1">Date Registered</label>
                        <input type="Date" class="form-control" id="e_dateRegister" name="dateReg">
                        <span class="text-danger error-text dateRegister_error"></span>
                    </div> 

                    <div class="purokPart">
                        <label for="e_suffix">Suffix</label>
                        <select id="e_suffix" class="form-select" name="suffix">
                            <option value="" disabled selected>Select Suffix</option>
                            <option value="I">I</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                            <option value="V">V</option>
                            <option value="Jr.">Jr.</option>
                        </select>
                        <span class="text-danger error-text suffix_error"></span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="e_rightInput">
            <div class="e_fullNamePart">
                <div class="e_fnameParts">
                    <label for="e_fname">First Name</label>
                    <input type="text" class="form-control" name="fname" id="e_fname" placeholder="Enter Firstname">
                    <span class="text-danger error-text firstName_error"></span>
                </div>
                <div class="e_mnamePart">
                    <label for="e_mname">Middle Name</label>
                    <input type="text" class="form-control" name="mname" id="e_mname" placeholder="Enter Middlename">
                    <span class="text-danger error-text middleName_error"></span>
                </div>
                <div class="e_lnamePart">
                    <label for="e_lname">Last Name</label>
                    <input type="text" class="form-control" name="lname" id="e_lname" placeholder="Enter Lastname">
                    <span class="text-danger error-text lastName_error"></span>
                </div>
            </div>


            <div class="e_birthPart">
                <div class="e_birthPlacePart">
                    <label for="e_bPlace">Place of Birth</label>
                    <input type="text" class="form-control" name="birthPlaces" id="e_bPlace" placeholder="Enter Birth Place">
                    <span class="text-danger error-text birthPlace_error"></span>
                </div>
                <div class="e_bdatePart">
                    <label for="e_bDate">Birth Date</label>
                    <input type="Date" class="form-control" id="e_bDate" name="bdate" onchange="calAge()">
                    <span class="text-danger error-text birthDate_error"></span>
                </div>
                <div class="e_agePart">
                    <label for="e_age">Age</label>
                    <input type="text" class="form-control" name="age" id="e_age" placeholder="Enter Age" readonly>
                    <span class="text-danger error-text age_error"></span>
                </div>
            </div>

            <div class="e_personalPart1">
                <div class="e_civilStatusPart">
                    <label for="e_civilStatus">Civil Status</label>
                    <select id="e_civilStatus" class="form-select" name="civilStat">
                        <option value="" disabled selected>Select Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Annulled">Annulled</option>
                        <option value="Widowed">Widowed</option>
                    </select>
                    <span class="text-danger error-text civilStatus_error"></span>
                </div>

                <div class="e_sexPart">
                    <label for="e_sex">Sex</label>
                    <select id="e_sex" class="form-select" name="sex">
                        <option value="" disabled selected>Select Sex</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <span class="text-danger error-text sex_error"></span>
                </div>
                
                <div class="e_purokPart">
                    <label for="e_purok">Purok</label>
                    <select id="e_purok" class="form-select" name="purok">
                        <option value="" disabled selected>Select Purok</option>
                        <option value="Tugas">Tugas</option>
                        <option value="Tambis">Tambis</option>
                        <option value="Mahogany">Mahogany</option>
                        <option value="Guyabano">Guyabano</option>
                        <option value="Mansinitas">Mansinitas</option>
                        <option value="Ipil-ipil">Ipil-ipil</option>
                        <option value="Lubi">Lubi</option>
                    </select>
                    <span class="text-danger error-text purok_error"></span>
                </div>
            </div>

            <div class="e_personalPart2">
                <div class="e_votersPart">
                    <label for="e_voters">Voters Status</label>
                    <select id="e_voters" class="form-select" name="voters">
                        <option value="" disabled selected>Select Status</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    <span class="text-danger error-text voters_error"></span>
                </div>

                <div class="e_emaileditPart">
                    <label for="e_email">Email Address</label>
                    <input type="text" class="form-control" name="email" id="e_email" placeholder="Enter Email">
                    <span class="text-danger error-text email_error"></span>
                </div>
                
                <div class="e_contactPart">
                    <label for="e_contact">Contact Number</label>
                    <input type="text" class="form-control" name="contact" id="e_contact" placeholder="Enter contact">
                    <span class="text-danger error-text contact_error"></span>
                </div>
            </div>

            <div class="personalPart3">
                <div class="votersPart">
                    <label for="e_person">Person Status</label>
                    <select id="e_person" class="form-select" name="person">
                        <option value="" disabled selected>Select Status</option>
                        <option value="Alive">Alive</option>
                        <option value="Deceased">Deceased</option>
                    </select>
                    <span class="text-danger error-text person_error"></span>
                </div>

                <div class="votersPart">
                    <label for="e_living">Living Status</label>
                    <select id="e_living" class="form-select" name="living">
                        <option value="" disabled selected>Select Status</option>
                        <option value="active">Active</option>
                        <option value="archive">Archive</option>
                    </select>
                    <span class="text-danger error-text living_error"></span>
                </div>

                <div class="purokPart">
                    <label for="e_sitio">Sitio</label>
                    <select id="e_sitio" class="form-select" name="sitio">
                        <option value="" disabled selected>Select Sitio</option>
                        <option value="Larrobis">Larrobis</option>
                        <option value="Premier">Premier</option>
                        <option value="Ompot">Ompot</option>
                        <option value="Riles 1">Riles 1</option>
                        <option value="Riles 2">Riles 2</option>
                        <option value="Aleman">Aleman</option>
                        <option value="San Vicente">San Vicente</option>
                    </select>
                    <span class="text-danger error-text sitio_error"></span>
                </div>
            </div>

            <div class="e_citizenPart">
                <div class="e_citizen">
                    <label for="e_citizens">Citizenship</label>
                    <input type="text" class="form-control" name="citizens" id="e_citizens" placeholder="Enter citizen">
                    <span class="text-danger error-text citizens_error"></span>
                </div>
            </div>

            <div class="e_addressPart">
                <div class="e_addresses">
                    <label for="e_address">Address</label>
                    <input type="text" class="form-control" name="address" id="e_address" placeholder="Enter address">
                    <span class="text-danger error-text address_error"></span>
                </div>
            </div>

            <div class="e_occupationPart">
                <div class="e_occupations">
                    <label for="e_occupation">Occupation (IF NONE PUT N/A)</label>
                    <input type="text" class="form-control" name="occupation" id="e_occupation" placeholder="Enter occupation">
                    <span class="text-danger error-text occupation_error"></span>
                </div>
            </div>

            <div class="buttonPart">
                <button type="button" class="btn btn-primary" onclick="closeEditForm()">Cancel</button>
                <button type="button" class="btn btn-primary update_resident">Update</button>
            </div>

        </div>
        </form>
    </div>
</div>