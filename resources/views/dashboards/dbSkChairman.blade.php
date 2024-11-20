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
      <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="card" style="padding: 10px;">
            <div class="card-body" style="width: 100%!important;">
                <div class="row g-3">
                    {{-- Pending Articles CARDS --}}
                    <h5>Pending Articles</h5>
                    <hr>
                    
                    @if($blogs->isEmpty())
                        <p>There Are No Pending Articles Available</p>
                    @else
                        @foreach($blogs as $blog)
                            <div class="col-md-4">
                                <a class="card" style="height: 300px!important; overflow:hidden; cursor: pointer;" href="{{ route('viewBlogs', ['blog_id' => $blog->blog_id]) }}">
                                    <img src="{{ $blog->blog_pic ? str_replace('public', '', $blog->blog_pic) : asset('assets/img/default.png') }}" class="card-img-top" alt="Blog Image" style="height: 150px;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ \Illuminate\Support\Str::limit($blog->blog_title, 15, '...') }}</h5>
                                        <p class="card-text blog-subtitle">{{ \Illuminate\Support\Str::limit($blog->blog_subtitle, 15, '...') }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                    
                    <h5>Pending Events</h5>
                    <hr>
                    
                    @if($events->isEmpty())
                        <p>No Submitted Events</p>
                    @else
                        @foreach($events as $event)
                            <div class="col-md-4">
                                <a class="card" style="height: 300px!important; overflow:hidden; cursor: pointer;" href="{{ route('editEvent1', ['sched_id' => $event->sched_id]) }}">
                                    <img src="{{ str_replace('public', '', $event->sched_picture) }}" class="card-img-top" alt="Event Image" style="height: 150px;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ \Illuminate\Support\Str::limit($event->sched_title, 15, '...') }}</h5>
                                        <p class="card-text blog-subtitle">{{ \Illuminate\Support\Str::limit($event->sched_description, 15, '...') }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                    

                    {{-- END OF DRAFT CARDS --}}
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

 
</script>

  
</body>

</html>