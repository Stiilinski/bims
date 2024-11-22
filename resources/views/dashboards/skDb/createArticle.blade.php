@include('layouts.headSkKagawad')
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
    @include('layouts.headerSkKagawad')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
    @include('layouts.sidebarSkKagawad')
  <!-- End Sidebar -->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Create Blogs</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body" style="width: 100%!important;">
                    <div class="row g-3">
                        <form method="POST" action="{{ route('regValidation.articleInput')}}" class="articleInput" id="articleInput" autocomplete="off">
                            @csrf
                            <div class="row g-3">
                                <input type="hidden" id="blogStatus" name="blogStatus" value="">
                                <div class="col-md-6">
                                    <label for="inputTitle" class="col-sm-5 col-form-label">Title</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="inputTitle" name="inputTitle">
                                        <span class="text-danger error-text inputTitle_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputSubTitle" class="col-sm-5 col-form-label">Subtitle</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="inputSubTitle" name="inputSubTitle">
                                        <span class="text-danger error-text inputSubTitle_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputQoute" class="col-sm-5 col-form-label">Qoute</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="inputQoute" name="inputQoute">
                                        <span class="text-danger error-text inputQoute_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputDate" class="col-sm-5 col-form-label">Date</label>
                                    <div class="col-sm-12">
                                        <input type="datetime-local" class="form-control" id="inputDate" name="inputDate" readonly>
                                        <span class="text-danger error-text inputDate_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="inputContent" class="col-sm-5 col-form-label">Content</label>
                                    <div class="col-sm-12">
                                        <textarea name="inputContent" id="inputContent" style="resize: none; width: 100%; height: 250px;"></textarea>
                                        <span class="text-danger error-text inputContent_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputCategory" class="col-sm-5 col-form-label">Category</label>
                                    <div class="col-sm-12">
                                        <select name="inputCategory" id="inputCategory" class="form-select">
                                            <option value="" selected disabled>Select Category</option>
                                            <option value="Events">Events</option>
                                            <option value="Projects">Projects</option>
                                            <option value="Community Story">Community Story</option>
                                        </select>
                                        <span class="text-danger error-text inputCategory_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputAuthor" class="col-sm-5 col-form-label">Author</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="inputAuthor" name="inputAuthor" value="{{ $LoggedUserInfo['em_id'] }}" readonly>
                                        <span class="text-danger error-text inputAuthor_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputImg" class="col-sm-5 col-form-label">Image</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" id="inputImg" name="inputImg">
                                        <span class="text-danger error-text inputImg_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputImgLoc" class="col-sm-5 col-form-label">Image Location</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="inputImgLoc" name="inputImgLoc">
                                        <span class="text-danger error-text inputImgLoc_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputImgOwn" class="col-sm-5 col-form-label">Image Owner</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="inputImgOwn" name="inputImgOwn">
                                        <span class="text-danger error-text inputImgOwn_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputFbLink" class="col-sm-5 col-form-label">Facebook Link</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="inputFbLink" name="inputFbLink">
                                        <span class="text-danger error-text inputFbLink_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputXLink" class="col-sm-5 col-form-label">X Link</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="inputXLink" name="inputXLink">
                                        <span class="text-danger error-text inputXLink_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputInsLink" class="col-sm-5 col-form-label">Instagram Link</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="inputInsLink" name="inputInsLink">
                                        <span class="text-danger error-text inputInsLink_error"></span>
                                    </div>
                                </div>

                                <div class="alertCon">
                                    <div id="alert-container"></div>
                                </div>

                                <div class="card-footer d-flex" style="justify-content: flex-end; gap: 1%;">
                                    <button type="reset" class="btn btn-secondary">Clear</button>
                                    <button type="submit" class="btn btn-warning" name="action" value="draft" onclick="setDraftStatus()">Save Draft</button>
                                    <button type="submit" class="btn btn-primary" name="action" value="submit" onclick="setSubmitStatus()">Submit</button>
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

@include('layouts.footerSkKagawad')
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
        $("#articleInput").on('submit', function(e){
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
                        $('#articleInput')[0].reset();

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