<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BIMS - Blogs</title>
    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon" />
    <link rel="stylesheet" href="/assets/css/blogs.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      #searchResults {
          position: absolute;
          z-index: 1000;
          width: 67%;
          background-color: white;
          box-shadow: 0 0 5px rgba(0,0,0,0.2);
          margin-top: -30px;
      }

      #searchResults a {
          display: flex;
          align-items: center;
          padding: 8px;
          color: #000;
          text-decoration: none;
      }

      #searchResults a:hover {
          background-color: #f0f0f0;
      }
    </style>
  </head>
  <body>
    <div id="topContainer">
      <div class="top-container-content">
        <div class="container mt-4">
          <div class="row">
            <div class="text-end">
              <i
                class="bi bi-x-lg fs-1 custom-button-white"
                id="closeTopContainer"
              ></i>
            </div>
          </div>
          <div class="col-lg-10 mt-2">
            <div class=" mb-4 no-border-card">
              <div class="card-body">
                  <div class="input-group border-bb">
                      <input
                          id="searchInput"
                          class="form-control borderless"
                          type="text"
                          placeholder="Search the Barangay's Blog"
                          onkeyup="searchBlogs()"
                      />
                      <i class="bi bi-search fs-1 custom-button-white"></i>
                  </div>
              </div>
            </div>
          
          <!-- Dropdown for search results -->
          <div id="searchResults" class="dropdown-menu" style="display: none; max-height: 300px; overflow-y: auto;">
              <!-- Search results will be populated here -->
          </div>

            <div class="mb-4 no-border-card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <b style="font-weight: 1000; color: white;">Explore Site</b>
                    <ul class="list-unstyled mb-0 top-container-link">
                      <li>
                        <a href="#!" class="top-container-link">Home</a>
                      </li>
                      <li><a href="#!" class="top-container-link">About</a></li>
                      <li>
                        <a href="#!" class="top-container-link">Services</a>
                      </li>
                      <li>
                        <a href="#!" class="top-container-link">Events</a>
                      </li>
                      <li>
                        <a href="#!" class="top-container-link">Officials</a>
                      </li>
                      <li>
                        <a href="#!" class="top-container-link">Contacts</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-sm-3">
                    <b style="font-weight: 1000; color: white;">Popular Topics</b>
                    <ul class="list-unstyled mb-0">
                      <li><a href="{{ route('dbBlogs', ['category' => 'Events']) }}" class="top-container-link">Events</a></li>
                      <li><a href="{{ route('dbBlogs', ['category' => 'Projects']) }}" class="top-container-link">Projects</a></li>
                      <li><a href="{{ route('dbBlogs', ['category' => 'Community Story']) }}" class="top-container-link">Community Story</a></li>
                      <li><a href="{{ route('dbBlogs', ['category' => 'All Topics']) }}" class="top-container-link">All Topics</a></li>
                    </ul>
                  </div>
                  <div class="col-sm-3">
                    <ul class="list-unstyled mb-0">
                      <li>
                        <i class="bi bi-facebook fs-3 custom-button-white"></i>
                      </li>
                      <li>
                        <i class="bi bi-twitter-x fs-3 custom-button-white"></i>
                      </li>
                      <li>
                        <i class="bi bi-instagram fs-3 custom-button-white"></i>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="main-container">
      <nav class="navbar navbar-expand-lg mb-4 border-b">
        <div class="container">
          <a href="index.html">
            <img
              src="/assets/img/logo.png"
              style="height: 75px; padding-right: 10px"
              alt=""
            />
          </a>
          <a class="navbar-brand">
            <span style="font-weight: 1000; color: white">Barangay</span>
            <span style="font-weight: 1000; color: white">Blogs</span>
          </a>
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <i
                class="bi bi-list fs-1 custom-button-white"
                id="toggleContainerBtn"
              ></i>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container mb-5">
        <div class="row d-flex flex-column justify-content-center text-center">
          <b>{{ $blog->blog_title}}</b><br>
          <h1><b>{{ $blog->blog_subtitle}}</b></h1><br>
          <h5>{{ $blog->blog_qoute }}</h5>
          <br><h5>By:{{ $blog->author->em_fname}} {{ $blog->author->em_lname}}</h5>
        </div>

        <div class="row d-flex flex-column justify-content-center">
          <img src="{{ asset(str_replace('public/', '', $blog->blog_pic)) }}" alt="">
        </div>
        <b>Image Location:</b> {{ $blog->blog_picLocation }}
      </div>

      <div class="container">
        <div class="row">
          <div class="col-lg-2">
          </div>
          <div class="col-lg-8">
            
          </div>
          <div class="col-lg-2">
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-lg-2">
            <ul class="list-unstyled mb-0 custom-ul">
              <li>
                <a href="{{ $blog->blog_fbLink }}"><i class="bi bi-facebook custom-button larger-ic"></i></a>
              </li>
              <li>
                <a href="{{ $blog->blog_xLink }}"><i class="bi bi-twitter-x custom-button larger-ic"></i></a>
              </li>
              <li>
                <a href="{{ $blog->blog_insLink }}"><i class="bi bi-instagram custom-button larger-ic"></i></a>
              </li>
            </ul>
          </div>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-12">
                <span style="font-family: 'Times New Roman', Times, serif; font-size:20px!important;">{{ $blog->blog_description }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container mt-4">
        <div class="mt-4 black-bar-top">
          <b>Recommended For You</b>
        </div>
        <div class="row mt-4">
          @if($latestRecNews)
            <div class="col-lg-3">
                <!-- Display the first recommended news -->
                <div class="container mb-4">
                    <a href="{{ $latestRecNews->rec_link1 }}" class="black-link">
                        <img src="{{ asset(str_replace('public/', '', $latestRecNews->rec_img1)) }}" alt="Image 1" class="rec-img" style="width: 100%; height: auto;">
                        <br>
                        <b>{{ $latestRecNews->rec_title1 }}</b>
                    </a>
                </div>
            </div>
    
            <div class="col-lg-3">
                <!-- Display the second recommended news -->
                <div class="container mb-4">
                    <a href="{{ $latestRecNews->rec_link2 }}" class="black-link">
                        <img src="{{ asset(str_replace('public/', '', $latestRecNews->rec_img2)) }}" alt="Image 2" class="rec-img" style="width: 100%; height: auto;">
                        <br>
                        <b>{{ $latestRecNews->rec_title2 }}</b>
                    </a>
                </div>
            </div>
    
            <div class="col-lg-3">
                <!-- Display the third recommended news -->
                <div class="container mb-4">
                    <a href="{{ $latestRecNews->rec_link3 }}" class="black-link">
                        <img src="{{ asset(str_replace('public/', '', $latestRecNews->rec_img3)) }}" alt="Image 3" class="rec-img" style="width: 100%; height: auto;">
                        <br>
                        <b>{{ $latestRecNews->rec_title3 }}</b>
                    </a>
                </div>
            </div>
    
            <div class="col-lg-3">
                <!-- Display the fourth recommended news -->
                <div class="container mb-4">
                    <a href="{{ $latestRecNews->rec_link4 }}" class="black-link">
                        <img src="{{ asset(str_replace('public/', '', $latestRecNews->rec_img4)) }}" alt="Image 4" class="rec-img" style="width: 100%; height: auto;">
                        <br>
                        <b>{{ $latestRecNews->rec_title4 }}</b>
                    </a>
                </div>
            </div>
          @endif
        </div>
      </div>
      <footer class="py-5 bg-dark">
        <div class="container">
          <p class="m-0 text-center text-white">
            Copyright <b>2024</b> All Rights Reserved
          </p>
        </div>
      </footer>
    </div>

    <!-- Add this in your body section -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/blogs.js"></script>
    <script>
      function searchBlogs() {
        const query = document.getElementById('searchInput').value;

        if (query.length < 3) {
            // Hide results if query length is less than 3 characters
            document.getElementById('searchResults').style.display = 'none';
            return;
        }

        // Show the dropdown
        document.getElementById('searchResults').style.display = 'block';

        // Send AJAX request
        fetch(`/searchBlogs?query=${query}`)
            .then(response => response.json())
            .then(data => {
                // Clear previous results
                const resultsContainer = document.getElementById('searchResults');
                resultsContainer.innerHTML = '';

                if (data.length > 0) {
                    // Loop through the results and append to the dropdown
                    data.forEach(blog => {
                        const blogElement = `
                            <a href="{{ url('dbBlogsRead') }}/${blog.blog_id}" class="dropdown-item">
                                <img src="${blog.blog_pic.replace('public/', '/')}" alt="Blog Image" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;" />
                                ${blog.blog_title}
                            </a>
                        `;
                        resultsContainer.innerHTML += blogElement;
                    });
                } else {
                    // If no results found
                    resultsContainer.innerHTML = '<a class="dropdown-item disabled">No blogs found</a>';
                }
            })
            .catch(error => {
                console.error('Error fetching search results:', error);
            });
        }
    </script>
  </body>
</html>
