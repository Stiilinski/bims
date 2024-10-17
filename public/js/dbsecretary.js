function toggleDropdown() 
{
    var dropdownContent = document.getElementById("dropdownContent");
    dropdownContent.classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) 
{
    if (!event.target.matches('.profNameCon')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

function closeAddForm() {
    var addresCon = document.querySelector('.addresCon');
    addresCon.style.display = 'none';
}

function addResidents() {
    var addresCon = document.querySelector('.addresCon');
    addresCon.style.display = 'flex';
}


// FOR VALIDATIONS NI SYA DAPIT SA RESIDENT REGISTRATION
$(function(){
    $("#mainForm").on('submit', function(e){
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
                    $('#mainForm')[0].reset();
                    alert(data.msg);
                }
            }
        });
    });
});


// FOR VALIDATIONS NI SYA DAPIT SA EDIT RESIDENT REGISTRATION
$(document).on('click', '.edit_resident', function (e) {
    e.preventDefault();
    var resident_id = $(this).val();
    console.log(resident_id);

    $.ajax({
        type: "GET",
        url: "/edit-resident/"+resident_id,
        success: function(response) {
            console.log(response);
            if(response.status == 404)
            {
                alert("Resident Not Found");
            }
            else 
            {
                $('#e_path').val(response.resident.res_picture);
                $('#e_fname').val(response.resident.res_fname);
                $('#e_mname').val(response.resident.res_mname);
                $('#e_lname').val(response.resident.res_lname);
                $('#e_suffix').val(response.resident.res_suffix);
                $('#e_bPlace').val(response.resident.res_bplace);
                $('#e_bDate').val(response.resident.res_bdate);
                calAge();
                $('#e_civilStatus').val(response.resident.res_civil);
                $('#e_sex').val(response.resident.res_sex);
                $('#e_purok').val(response.resident.res_purok);
                $('#e_voters').val(response.resident.res_voters);
                $('#e_person').val(response.resident.res_personStatus);
                $('#e_living').val(response.resident.res_status);
                $('#e_sitio').val(response.resident.res_sitio);
                $('#e_email').val(response.resident.res_email);
                $('#e_contact').val(response.resident.res_contact);
                $('#e_citizens').val(response.resident.res_citizen);
                $('#e_address').val(response.resident.res_address);
                $('#e_occupation').val(response.resident.res_occupation);
                $('#e_profilePreview').attr('src', '/storage/' + response.resident.res_picture);
                $('#e_household').val(response.resident.res_household);
                $('#e_dateRegister').val(response.resident.res_dateReg);
                $('#e_id').val(resident_id);
            }
        }
    });
});

$(document).on('click', '.update_resident', function (e) {
    e.preventDefault();
    var resident_id = $('#e_id').val();

    var formData = new FormData();
    formData.append('fname', $('#e_fname').val());
    formData.append('mname', $('#e_mname').val());
    formData.append('lname', $('#e_lname').val());
    formData.append('suffix', $('#e_suffix').val());
    formData.append('bplace', $('#e_bPlace').val());
    formData.append('bdate', $('#e_bDate').val());
    formData.append('civil', $('#e_civilStatus').val());
    formData.append('sex', $('#e_sex').val());
    formData.append('purok', $('#e_purok').val());
    formData.append('voters', $('#e_voters').val());
    formData.append('person', $('#e_person').val());
    formData.append('living', $('#e_living').val());
    formData.append('sitio', $('#e_sitio').val());
    formData.append('email', $('#e_email').val());
    formData.append('contact', $('#e_contact').val());
    formData.append('citizen', $('#e_citizens').val());
    formData.append('address', $('#e_address').val());
    formData.append('occupation', $('#e_occupation').val());
    formData.append('picture', $('#e_profile')[0].files[0]); // Append the file
    formData.append('household', $('#e_household').val());
    formData.append('dateReg', $('#e_dateRegister').val());

    $.ajax({
        type: "POST",
        url: "/update-resident/" + resident_id,
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
                alert("Error");
            } else if(response.status == 404) {
                alert("Error");
            } else {
                alert("Success");
                document.querySelector('.editresCon').style.display = 'none';
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert("An error occurred. Check the console for details.");
        }
    });
});


// PARA DISPLAY PICTURES INIG PILI
document.getElementById('profile').addEventListener('change', function() {
    var file = this.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('profilePreview').src = event.target.result;
        };
        reader.readAsDataURL(file);
    }
});

// PARA DISPLAY PICTURES INIG PILI
document.getElementById('e_profile').addEventListener('change', function() {
    var file = this.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('e_profilePreview').src = event.target.result;
        };
        reader.readAsDataURL(file);
    }
});

//PARA SA AGE SA RESIDENT MA DISPLAY SA FIELD
document.getElementById('bDate').addEventListener('change', function() {
    var dob = new Date(this.value); // Birth date
    var today = new Date(); // Current date

    // Calculate the age
    var age = today.getFullYear() - dob.getFullYear();
    var monthDiff = today.getMonth() - dob.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
        age--;
    }
    
    // Update the age input field
    document.getElementById('age').value = age;
});


//PARA SA TABLE SA RESIDENT RECORDS
$(document).ready( function () 
  {
    $('#myTable').DataTable();
  });

//para sa dropdown action
$(document).ready(function() {
    // Initialize dropdown toggle
    $('.dropdown-toggle').dropdown();
});

function updateHeight() {
    // Get the number of rows in the visible portion of the table
    var rowCount = $('#myTable tbody tr').length;

    // Get the innerContent element
    var innerContent = document.getElementById('innerContent');

    // Check if the number of rows is less than or equal to 10
    if (rowCount <= 10) {
        // If less than or equal to 10, set the height to 750px
        innerContent.style.height = '750px';
    } else {
        // If more than 10, set the height to auto
        innerContent.style.height = 'auto';
    }
}

// Initialize DataTables
$(document).ready(function() {
    $('#myTable').DataTable();

    // Call updateHeight function initially
    updateHeight();

    // Handle DataTables page change event
    $('#myTable').on('draw.dt', function() {
        // Call updateHeight function whenever the table is redrawn (e.g., page change)
        updateHeight();
    });
});

/*********************************************************************************************************/

function openEditForm(resident) {
    // Display the editResCon div
    document.querySelector('.editresCon').style.display = 'flex';
}

function closeEditForm() {
    document.querySelector('.editresCon').style.display = 'none';
}



function closeviewResCert() {
    document.querySelector('.viewResident').style.display = 'none';
}

function calculateAge(birthDate) {
    const birth = new Date(birthDate);
    const diff = Date.now() - birth.getTime();
    const age = new Date(diff).getUTCFullYear() - 1970;
    return age;
}


function closeviewResCert() {
    document.querySelector('.viewResident').style.display = 'none';
}


function calAge() {
    var birthDate = new Date(document.getElementById('e_bDate').value);
    var today = new Date();
    var age = today.getFullYear() - birthDate.getFullYear();
    var monthDiff = today.getMonth() - birthDate.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    document.getElementById('e_age').value = age;
}

function navigateToLink(select) 
{
    const value = select.value;
    if (value !== "none") {
        window.location.href = value;
    }
}


