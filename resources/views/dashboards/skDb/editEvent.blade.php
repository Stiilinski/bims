@include('layouts.headSkKagawad')
<body>
<style>
    .toggle-sidebar-btn {
        display: none;
    }

    .container {
        max-width: 100% !important;
        margin-top: 80px;
        padding-bottom: 10px;
    }

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

  <div id="container" class="container">

    <div class="pagetitle">
        <div class="pageArea">
            <h1>Events</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ action([App\Http\Controllers\regValidation::class, 'eventLists'], ['em_id' => $LoggedUserInfo['em_id']]) }}">Events List</a>
                    </li>
                  <li class="breadcrumb-item active">Edit Article</li>
                </ol>
              </nav>
        </div>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

        <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body" style="width: 100%!important;">
                        <div class="row g-3">
                            <form id="eventEdit"  action="{{ route('regValidation.updateEvent', $event->sched_id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">
                                    <input type="hidden" id="eventId" name="eventId" value="{{ $event->sched_id}}">
                                    <input type="hidden" id="empId" name="empId" value="{{ $LoggedUserInfo['em_id'] }}">

                                    <div class="col-md-6">
                                        <label for="inputDate" class="col-sm-5 col-form-label">Event Date</label>
                                        <div class="col-sm-12">
                                            <input type="datetime-local" class="form-control" id="inputDate" name="inputDate" value="{{ $event->sched_date }}">
                                            <span class="text-danger error-text inputDate_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputTitle" class="col-sm-5 col-form-label">Event Title</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputTitle" name="inputTitle" value="{{ $event->sched_title }}">
                                            <span class="text-danger error-text inputTitle_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="inputContent" class="col-sm-5 col-form-label">Event Description</label>
                                        <div class="col-sm-12">
                                            <textarea name="inputContent" id="inputContent" style="resize: none; width: 100%; height: 250px;">{{ $event->sched_description }}</textarea>
                                            <span class="text-danger error-text inputContent_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="inputType" class="col-sm-5 col-form-label">Schedule Type</label>
                                        <div class="col-sm-12">
                                            <select name="inputType" id="inputType" class="form-select">
                                                <option value="" disabled>Select Category</option>
                                                <option value="Public" {{ $event->sched_type == 'Public' ? 'selected' : '' }}>Public</option>
                                                <option value="Private" {{ $event->sched_type == 'Private' ? 'selected' : '' }}>Private</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="inputImg" class="col-sm-5 col-form-label">Image</label>
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control" id="inputImg" name="inputImg">
                                            <span class="text-danger error-text inputImg_error"></span>
                                        </div>
                                    </div>

                                    <input type="hidden" class="form-control" id="inputStatus" name="inputStatus" value="{{ $event->sched_status }}" readonly>

                                    <div class="card-footer d-flex" style="justify-content: flex-end; gap: 1%;">
                                        <button type="reset" class="btn btn-secondary">Clear</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="alertCon">
                    <div id="alert-container"></div>
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

</div><!-- End #main -->

@include('layouts.footerSkKagawad')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// CRUD
    //uPDATE
        // Function to submit the form via AJAX
        $('#eventEdit').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Show loading or disable buttons if needed
            $('#alert-container').html('<div class="alert alert-info">Saving...</div>');

            // Send form data via AJAX
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    // Show success message
                    $('#alert-container').html('<div class="alert alert-success">' + response.message + '</div>');

                    // Hide the success message after 1 second (1000ms)
                    setTimeout(function() {
                        $('#alert-container').html(''); // Clear the alert message
                    }, 1000);

                    // Reload the page after another 1 second (total of 2 seconds after the success message is shown)
                    setTimeout(function() {
                        location.reload(); // This will reload the current page
                    }, 2000); // 2000ms (1 second delay after hiding the message)
                },
                error: function(xhr, status, error) {
                    // Show error message
                    var errorMessage = 'Something went wrong. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    $('#alert-container').html('<div class="alert alert-danger">' + errorMessage + '</div>');
                }
            });
        });

        
</script>

  
</body>

</html>