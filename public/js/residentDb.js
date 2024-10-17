function closeBCBusinessForm() {
    var clearance = document.querySelector(".barangayClearanceContainer");
    clearance.style.display = "none";

    document.documentElement.style.overflowY = 'visible';
    var container = document.querySelector(".contentCon");
    container.style.width = "1519.5px";
}

function openBCBusinessForm() {
    var clearance = document.querySelector(".barangayClearanceContainer");
    clearance.style.display = "flex";

    document.documentElement.style.overflowY = 'hidden';
    var container = document.querySelector(".contentCon");
    container.style.width = "100%";
}

function closeBCBusinessMultiForm() {
    var clearance = document.querySelector(".barangayClearanceMultiContainer");
    clearance.style.display = "none";

    document.documentElement.style.overflowY = 'visible';
    var container = document.querySelector(".contentCon");
    container.style.width = "1519.5px";
}

function openBrgyMultiClearance() {
    var clearance = document.querySelector(".barangayClearanceMultiContainer");
    clearance.style.display = "flex";

    document.documentElement.style.overflowY = 'hidden';
    var container = document.querySelector(".contentCon");
    container.style.width = "100%";
}

function closeCertificateForm() {
    var clearance = document.querySelector(".certificateContainer");
    clearance.style.display = "none";
    
    document.documentElement.style.overflowY = 'visible';
    var container = document.querySelector(".contentCon");
    container.style.width = "1519.5px";
}

function openCertificateForm() {
    var clearance = document.querySelector(".certificateContainer");
    clearance.style.display = "flex";
    
    document.documentElement.style.overflowY = 'hidden';
    var container = document.querySelector(".contentCon");
    container.style.width = "100%";
}

function closeComplaintForm() {
    var clearance = document.querySelector(".complaintContainer");
    clearance.style.display = "none";

    document.documentElement.style.overflowY = 'visible';
    var container = document.querySelector(".contentCon");
    container.style.width = "1519.5px";
}

function openComplaintForm() {
    var clearance = document.querySelector(".complaintContainer");
    clearance.style.display = "flex";

    document.documentElement.style.overflowY = 'hidden';
    var container = document.querySelector(".contentCon");
    container.style.width = "100%";
}


function generateTrackingCode() {
    var code = '';
    for (var i = 0; i < 6; i++) {
        // Generate 3 random letters
        var letters = String.fromCharCode(Math.floor(Math.random() * 26) + 65) +
                      String.fromCharCode(Math.floor(Math.random() * 26) + 65) +
                      String.fromCharCode(Math.floor(Math.random() * 26) + 65);
        // Generate 2 random numbers
        var numbers = ('0' + Math.floor(Math.random() * 100)).slice(-2);
        // Concatenate letters, numbers, and hyphen
        code += letters + numbers + '-';
    }
    // Remove the last hyphen
    code = code.slice(0, -1);
    // Convert code to uppercase
    code = code.toUpperCase();
    return code;
}

// Set the generated tracking code to the input field
document.getElementById('tcode1').value = generateTrackingCode();
document.getElementById('tcode2').value = generateTrackingCode();
document.getElementById('tcode3').value = generateTrackingCode();
document.getElementById('tcode4').value = generateTrackingCode();


function setCurrentDate() {
    var currentDate = new Date().toISOString().slice(0, 10);
    document.getElementById('dateIssued1').value = currentDate;
    document.getElementById('dateIssued2').value = currentDate;
    document.getElementById('dateIssued3').value = currentDate;
    document.getElementById('dateIssued4').value = currentDate;
}

// Set current date and tracking code when the page loads
window.onload = function() {
    setCurrentDate();
    document.getElementById('tcode1').value = generateTrackingCode();
    document.getElementById('tcode2').value = generateTrackingCode();
    document.getElementById('tcode3').value = generateTrackingCode();
};

//FOR CERTIFICATE TABLE
$(function(){      
    $("#certificate").on('submit', function(e){
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
                    $('#certificate')[0].reset();
                    alert(data.msg);
                }
            }
        });
    });
});


//FOR BUSINESS BARANGAY CLEARANCE TABLE
$(function(){      
    $("#brgy_clearance").on('submit', function(e){
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
                    $('#brgy_clearance')[0].reset();
                    alert(data.msg);
                }
            }
        });
    });
});


//FOR MULTIPURPOSE BARANGAY CLEARANCE TABLE
$(function(){      
    $("#brgy_clearanceMult").on('submit', function(e){
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
                    $('#brgy_clearanceMult')[0].reset();
                    alert(data.msg);
                }
            }
        });
    });
});

//FOR COMPLAINT TABLE
$(function(){      
    $("#complaint").on('submit', function(e){
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
                    $('#complaint')[0].reset();
                    alert(data.msg);
                }
            }
        });
    });
});



