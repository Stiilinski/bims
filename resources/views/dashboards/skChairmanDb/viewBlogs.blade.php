@include('layouts.headSkChairman')
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
    @include('layouts.headerSkChairman')
  <!-- End Header -->

  <div id="container" class="container">

    <div class="pagetitle">
        <div class="pageArea">
            <h1>Article</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        @if($blogs['blog_status'] == 'Pending Article' || $blogs['blog_status']  == 'Denied')
                            <a href="{{ action([App\Http\Controllers\regValidation::class, 'submittedBlogs'], ['em_id' => $LoggedUserInfo['em_id']]) }}">Submitted Blogs</a>
                        @elseif($blogs['blog_status']  == 'Published')
                            <a href="{{ action([App\Http\Controllers\regValidation::class, 'publishedBlogs'], ['em_id' => $LoggedUserInfo['em_id']]) }}">Published Blogs</a>
                        @endif
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
                            <form id="articleEdit" action="{{ route('regValidation.updateArticle', $blogs->blog_id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">
                                    <input type="hidden" id="blogId" name="blogId" value="{{ $blogs->blog_id}}" readonly>
                                    <div class="col-md-6">
                                        <label for="inputTitle" class="col-sm-5 col-form-label">Title</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputTitle" name="inputTitle" value="{{ $blogs->blog_title }}" readonly>
                                            <span class="text-danger error-text inputTitle_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputSubTitle" class="col-sm-5 col-form-label">Subtitle</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputSubTitle" name="inputSubTitle" value="{{ $blogs->blog_subtitle }}" readonly>
                                            <span class="text-danger error-text inputSubTitle_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputQoute" class="col-sm-5 col-form-label">Quote</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputQoute" name="inputQoute" value="{{ $blogs->blog_qoute }}" readonly>
                                            <span class="text-danger error-text inputQoute_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputDate" class="col-sm-5 col-form-label">Date</label>
                                        <div class="col-sm-12">
                                            <input type="datetime-local" class="form-control" id="inputDate" name="inputDate" value="{{ $blogs->blog_date }}" readonly>
                                            <span class="text-danger error-text inputDate_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="inputContent" class="col-sm-5 col-form-label">Content</label>
                                        <div class="col-sm-12">
                                            <textarea name="inputContent" id="inputContent" style="resize: none; width: 100%; height: 250px;" readonly>{{ $blogs->blog_description }}</textarea>
                                            <span class="text-danger error-text inputContent_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputCategory" class="col-sm-5 col-form-label">Category</label>
                                        <div class="col-sm-12">
                                            <select name="inputCategory" id="inputCategory" class="form-select" disabled>
                                                <option value="" disabled>Select Category</option>
                                                <option value="Events" {{ $blogs->blog_category == 'Events' ? 'selected' : '' }}>Events</option>
                                                <option value="Projects" {{ $blogs->blog_category == 'Projects' ? 'selected' : '' }}>Projects</option>
                                                <option value="Community Story" {{ $blogs->blog_category == 'Community Story' ? 'selected' : '' }}>Community Story</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputAuthor" class="col-sm-5 col-form-label">Author</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputAuthor" name="inputAuthor" value="{{ $LoggedUserInfo['em_id'] }}" readonly>
                                            <span class="text-danger error-text inputAuthor_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="inputImg" class="col-sm-5 col-form-label">Image</label>
                                        <div class="col-sm-12">
                                            <img src="{{ str_replace('public', '', $blogs->blog_pic) }}" class="card-img-top" alt="Blog Image" style="width: 100%; height:100%">
                                            <span class="text-danger error-text inputImg_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputImgLoc" class="col-sm-5 col-form-label">Image Location</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputImgLoc" name="inputImgLoc" value="{{ $blogs->blog_picLocation }}" readonly>
                                            <span class="text-danger error-text inputImgLoc_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputImgOwn" class="col-sm-5 col-form-label">Image Owner</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputImgOwn" name="inputImgOwn" value="{{ $blogs->blog_picOwner }}" readonly>
                                            <span class="text-danger error-text inputImgOwn_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputFbLink" class="col-sm-5 col-form-label">Facebook Link</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputFbLink" name="inputFbLink" value="{{ $blogs->blog_fbLink }}" readonly>
                                            <span class="text-danger error-text inputFbLink_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputXLink" class="col-sm-5 col-form-label">X Link</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputXLink" name="inputXLink" value="{{ $blogs->blog_xLink }}" readonly>
                                            <span class="text-danger error-text inputXLink_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputInsLink" class="col-sm-5 col-form-label">Instagram Link</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputInsLink" name="inputInsLink" value="{{ $blogs->blog_insLink }}" readonly>
                                            <span class="text-danger error-text inputInsLink_error"></span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex" style="justify-content: flex-end; gap: 1%;">
                                        <button class="btn btn-danger" type="button" onclick="openDeniedModal({{ $blogs->blog_id }})">Denied</button>
                                        <button class="btn btn-primary" type="button" onclick="updateArticleStatus1({{ $blogs->blog_id }}, 'Published')">Publish</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="alertCon">
                    <div id="alert-container"></div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog custom-modal-width">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel">Select Denial Reason</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <label for="reasonSelect">Reason for Denial:</label>
                                <select id="reasonSelect" class="form-control">
                                    <option value="Weak or Unclear">Weak or Unclear</option>
                                    <option value="Unrelated To The Barangay">Unrelated To The Barangay</option>
                                    <option value="Unrealistic Article">Unrealistic Article</option>
                                    <option value="Inappropriate Content">Inappropriate Content</option>
                                    <option value="Lack of Originality or Clichéd Storylines">Lack of Originality or Clichéd Storylines</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" onclick="submitDeniedStatus()">Update Status</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right side columns -->
            <div class="col-lg-4">

            <!-- Private Announcement -->
            <div class="card">
                <div class="card-body pb-0">
                <h5 class="card-title">Private Announcement <span>| Today</span></h5>
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

@include('layouts.footerSkChairman')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// CRUD
    //uPDATE
        // Function to submit the form via AJAX
        $('#articleEdit').on('submit', function(event) {
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


    // sTATUS
        let artId = null;  // Global variable to store the article ID

        // This function is called by the Denied button to open the modal
        function openDeniedModal(id) {
            artId = id;  // Store the article ID globally
            $('#modal').modal('show');  // Show the modal
        }

        // This function handles the update of status, used for both Denied and Published
        function updateArticleStatus1(id, status) {
            // If the status is 'Published', set the reason to null
            const reason = (status === 'Published') ? null : $('#reasonSelect').val(); // Get the selected reason (null if Published)

            fetch('/update-art-status', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    id: id,           // Pass the article ID
                    status: status,   // Pass the status (either 'Denied' or 'Published')
                    reason: reason    // Pass the reason (null if 'Published', or selected reason if 'Denied')
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Article status updated successfully');
                    location.reload();  // Reload the page to reflect changes
                } else {
                    alert('Failed to update article status');
                }
            })
            .catch(error => console.error('Error:', error));
        }


        // This function submits the form in the modal (for Denied button)
        function submitDeniedStatus() {
            const selectedReason = $('#reasonSelect').val(); // Get the selected reason

            fetch('/update-art-status', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    id: artId,         // Pass the article ID
                    status: 'Denied',  // Deny the article
                    reason: selectedReason // Pass the selected reason
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Article status updated successfully');
                    $('#modal').modal('hide');  // Close the modal
                    location.reload(); // Reload the page to reflect changes
                } else {
                    alert('Failed to update article status');
                }
            })
            .catch(error => console.error('Error:', error));
        }




</script>

  
</body>

</html>