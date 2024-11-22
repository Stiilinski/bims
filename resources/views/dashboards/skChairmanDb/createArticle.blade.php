@include('layouts.headSkChairman')
<body>
<style>
  .sales-card {
    height: 100%;
  }

  .tab-content>.active {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .card-title {
    display: flex;
    flex-direction: column;
  }

  .titleCard {
    width: 100%;
    display: flex;
    justify-content: center;
    padding: 10px;
  }

  .dropdown {
    display: flex;
    justify-content: flex-end;
  }

  /* Style for the 3 dots icon */
  .dots-icon {
      background: none;
      border: none;
      font-size: 24px;
      cursor: pointer;
      padding: 8px;
      position: relative;
  }

  /* Style for the dropdown menu */
  .dropdown-content {
      display: none;
      position: absolute;
      right: 0;
      top: 40px;
      background-color: #f9f9f9;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
      min-width: 120px;
  }

  .dropdown-content a {
      color: black;
      padding: 8px 16px;
      text-decoration: none;
      display: block;
  }

  .dropdown-content a:hover {
      background-color: #ddd;
  }

  /* Show the dropdown content when .show is added */
  .show {
      display: block;
  }

</style>
  <!-- ======= Header ======= -->
    @include('layouts.headerSkChairman')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
    @include('layouts.sidebarSkChairman')
  <!-- End Sidebar -->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Recommended News</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body" style="width: 100%!important;">
                    <div class="row g-3">
                        <form method="POST" action="{{ route('regValidation.recInput')}}" class="recInput" id="recInput" autocomplete="off">
                            @csrf
                            <div class="row g-3">
                                {{-- RECOMMENDED NEWS --}}
                                <input type="hidden" name="empId" id="empId" value="{{ $LoggedUserInfo['em_id'] }}">
                                    <div class="col-md-4">
                                        <label for="inputRec1" class="col-sm-8 col-form-label">Recommended Link</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputRec1" name="inputRec1">
                                            <span class="text-danger error-text inputRec1_error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label for="inputRecTitle1" class="col-sm-12 col-form-label">Recommended Title</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputRecTitle1" name="inputRecTitle1">
                                            <span class="text-danger error-text inputRecTitle1_error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label for="inputRecImg1" class="col-sm-12 col-form-label">Recommended Image</label>
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control" id="inputRecImg1" name="inputRecImg1">
                                            <span class="text-danger error-text inputRecImg1_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="inputRec2" class="col-sm-8 col-form-label">Recommended Link</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputRec2" name="inputRec2">
                                            <span class="text-danger error-text inputRec2_error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label for="inputRecTitle2" class="col-sm-12 col-form-label">Recommended Title</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputRecTitle2" name="inputRecTitle2">
                                            <span class="text-danger error-text inputRecTitle2_error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label for="inputRecImg2" class="col-sm-12 col-form-label">Recommended Image</label>
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control" id="inputRecImg2" name="inputRecImg2">
                                            <span class="text-danger error-text inputRecImg2_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="inputRec3" class="col-sm-8 col-form-label">Recommended Link</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputRec3" name="inputRec3">
                                            <span class="text-danger error-text inputRec3_error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label for="inputRecTitle3" class="col-sm-12 col-form-label">Recommended Title</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputRecTitle3" name="inputRecTitle3">
                                            <span class="text-danger error-text inputRecTitle3_error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label for="inputRecImg3" class="col-sm-12 col-form-label">Recommended Image</label>
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control" id="inputRecImg3" name="inputRecImg3">
                                            <span class="text-danger error-text inputRecImg3_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="inputRec4" class="col-sm-8 col-form-label">Recommended Link</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputRec4" name="inputRec4">
                                            <span class="text-danger error-text inputRec4_error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label for="inputRecTitle4" class="col-sm-12 col-form-label">Recommended Title</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputRecTitle4" name="inputRecTitle4">
                                            <span class="text-danger error-text inputRecTitle4_error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label for="inputRecImg4" class="col-sm-12 col-form-label">Recommended Image</label>
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control" id="inputRecImg4" name="inputRecImg4">
                                            <span class="text-danger error-text inputRecImg4_error"></span>
                                        </div>
                                    </div>
                                {{-- END OF RECOMMENDED NEWS --}}

                                <div class="alertCon">
                                    <div id="alert-container"></div>
                                </div>

                                <div class="card-footer d-flex" style="justify-content: flex-end; gap: 1%;">
                                    <button type="reset" class="btn btn-secondary">Clear</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Private Announcement -->
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Private Announcement <span id="currentMonthSpanPrivate">| Today</span></h5>
              <div class="news" id="schedules-container">

              </div><!-- End sidebar recent posts-->

            </div>
          </div>
          <!-- End Private Announcement -->

          <!-- Public Announcement -->
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Public Announcement <span id="currentMonthSpan">| Today</span></h5>
              <div class="news" id="publicSchedules-container">

              </div><!-- End sidebar recent posts-->

            </div>
          </div>
          <!-- End Public Announcement -->

        </div>
        <!-- End Right side columns -->
        </section>




  </main><!-- End #main -->

@include('layouts.footerSkChairman')
<script>
// JavaScript to set the current date and time
window.onload = function() {
    var now = new Date(); // Get the current date and time
    var year = now.getFullYear();
    var month = ("0" + (now.getMonth() + 1)).slice(-2); // Months are zero-based, so add 1
    var day = ("0" + now.getDate()).slice(-2);
    var hours = ("0" + now.getHours()).slice(-2);
    var minutes = ("0" + now.getMinutes()).slice(-2);
    
    var datetimeLocal = year + "-" + month + "-" + day + "T" + hours + ":" + minutes; // Format the date and time
    
    document.getElementById("inputDate").value = datetimeLocal; // Set the value of the input
};

// CRUD
    //iNSERT
    $(function(){      
        $("#recInput").on('submit', function(e){
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function(){
                    $(document).find('span.error-text').text('');
                },
                success: function(data){
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val){
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        // Clear the form
                        $('#recInput')[0].reset();

                        // Create and append the success alert
                        const alertHtml = `
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                ${data.msg} 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;

                        // Append the alert to your alert container
                        $('#alert-container').append(alertHtml);

                        // Remove alert after 3 seconds
                        setTimeout(() => {
                            $('.alert').alert('close');
                            // location.reload();
                        }, 1000);

                    }
                },
                error: function(xhr) {
                    const alertHtml = `
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-circle me-1"></i>
                            Failed to add new Record. Please try again. 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;
                    
                    $('#alert-container').append(alertHtml);

                        // Remove alert after 3 seconds
                        setTimeout(() => {
                            $('.alert').alert('close');
                        }, 3000);

                }
            });
        });
    });

    function setDraftStatus() {
        document.getElementById('blogStatus').value = 'Draft';
    }

    // Set status to "Pending Article" when the Submit button is clicked
    function setSubmitStatus() {
        document.getElementById('blogStatus').value = 'Pending Article';
    }


</script>

  
</body>

</html>