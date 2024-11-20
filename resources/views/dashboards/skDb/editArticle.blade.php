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
            <h1>Article</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        @if($blogs['blog_status'] == 'Pending Article' || $blogs['blog_status']  == 'Denied')
                            <a href="{{ action([App\Http\Controllers\regValidation::class, 'mySubmission'], ['em_id' => $LoggedUserInfo['em_id']]) }}">My Submission</a>
                        @elseif($blogs['blog_status']  == 'Draft')
                            <a href="{{ action([App\Http\Controllers\regValidation::class, 'myDraft'], ['em_id' => $LoggedUserInfo['em_id']]) }}">My Draft</a>
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
                            <form id="articleEdit"  action="{{ route('regValidation.updateArticle', $blogs->blog_id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">
                                    <input type="hidden" id="blogId" name="blogId" value="{{ $blogs->blog_id}}">
                                    <div class="col-md-6">
                                        <label for="inputTitle" class="col-sm-5 col-form-label">Title</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputTitle" name="inputTitle" value="{{ $blogs->blog_title }}">
                                            <span class="text-danger error-text inputTitle_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputSubTitle" class="col-sm-5 col-form-label">Subtitle</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputSubTitle" name="inputSubTitle" value="{{ $blogs->blog_subtitle }}">
                                            <span class="text-danger error-text inputSubTitle_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputQoute" class="col-sm-5 col-form-label">Quote</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputQoute" name="inputQoute" value="{{ $blogs->blog_qoute }}">
                                            <span class="text-danger error-text inputQoute_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputDate" class="col-sm-5 col-form-label">Date</label>
                                        <div class="col-sm-12">
                                            <input type="datetime-local" class="form-control" id="inputDate" name="inputDate" value="{{ $blogs->blog_date }}">
                                            <span class="text-danger error-text inputDate_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="inputContent" class="col-sm-5 col-form-label">Content</label>
                                        <div class="col-sm-12">
                                            <textarea name="inputContent" id="inputContent" style="resize: none; width: 100%; height: 250px;">{{ $blogs->blog_description }}</textarea>
                                            <span class="text-danger error-text inputContent_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputCategory" class="col-sm-5 col-form-label">Category</label>
                                        <div class="col-sm-12">
                                            <select name="inputCategory" id="inputCategory" class="form-select">
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
                                            <input type="text" class="form-control" id="inputImgLoc" name="inputImgLoc" value="{{ $blogs->blog_picLocation }}">
                                            <span class="text-danger error-text inputImgLoc_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputImgOwn" class="col-sm-5 col-form-label">Image Owner</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputImgOwn" name="inputImgOwn" value="{{ $blogs->blog_picOwner }}">
                                            <span class="text-danger error-text inputImgOwn_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputFbLink" class="col-sm-5 col-form-label">Facebook Link</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputFbLink" name="inputFbLink" value="{{ $blogs->blog_fbLink }}">
                                            <span class="text-danger error-text inputFbLink_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputXLink" class="col-sm-5 col-form-label">X Link</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputXLink" name="inputXLink" value="{{ $blogs->blog_xLink }}">
                                            <span class="text-danger error-text inputXLink_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputInsLink" class="col-sm-5 col-form-label">Instagram Link</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inputInsLink" name="inputInsLink" value="{{ $blogs->blog_insLink }}">
                                            <span class="text-danger error-text inputInsLink_error"></span>
                                        </div>
                                    </div>

                                    <input type="hidden" id="blogStatus" name="blogStatus" value="">

                                    <div class="alertCon">
                                        <div id="alert-container"></div>
                                    </div>

                                    <div class="card-footer d-flex" style="justify-content: flex-end; gap: 1%;">
                                        <button type="reset" class="btn btn-secondary">Clear</button>
                                        <button type="submit" class="btn btn-warning" onclick="setDraftStatus()">Save Draft</button>
                                        <button type="submit" class="btn btn-primary" onclick="setSubmitStatus()">Submit</button>
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

</div><!-- End #main -->

@include('layouts.footerSkKagawad')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// CRUD
    //uPDATE
        // Function to submit the form via AJAX
        $('#articleEdit button').on('click', function(event) {
            event.preventDefault();

            let action = $(this).val(); // Get the button value (draft/submit)
            let form = $('#articleEdit')[0];
            let formData = new FormData(form);
            formData.append('action', action);

            $.ajax({
                url: $('#articleEdit').attr('action'),
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#alert-container').html('<div class="alert alert-success">' + response.message + '</div>');
                    setTimeout(() => location.reload(), 2000);
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        $('.error-text').html(''); // Clear previous errors
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            $('.' + key + '_error').html(value[0]);
                        });
                    } else {
                        $('#alert-container').html('<div class="alert alert-danger">An unexpected error occurred.</div>');
                    }
                }
            });
        });


    // sTATUS
    function setDraftStatus() {
        document.getElementById('blogStatus').value = 'Draft';
    }

    function setSubmitStatus() {
        document.getElementById('blogStatus').value = 'Pending Article';
    }

</script>

  
</body>

</html>