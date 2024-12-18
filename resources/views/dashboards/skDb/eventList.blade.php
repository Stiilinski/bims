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
      <h1>Announcement List</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body" style="width: 100%!important;">
                    <table class="table table-striped datatable">
                        <thead>
                        <tr>
                            <th scope="col" style="display: none;">ID</th>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date</th>
                            <th scope="col">Type</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $index => $event)
                                </tr>
                                    <td style="display: none;">{{ $event->sched_id }}</td>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $event->sched_title }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($event->sched_description, 20, '...') }}</td>
                                    <td>{{ $event->sched_date}}</td>
                                    <td>{{ $event->sched_type}}</td>
                                    <td>{{ $event->sched_status}}</td>
                                    <td>
                                      @if($event->sched_status !== "Archived" && $event->sched_status !== "Accepted")
                                      <div class="btn-group">
                                          <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                              Actions
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li>
                                                  <a class="dropdown-item" type="button" href="{{ route('editEvent', ['sched_id' => $event->sched_id]) }}">Edit</a>
                                              </li>
                                              <li>
                                                  <button class="dropdown-item" type="button" onclick="updateEventStatus({{ $event->sched_id }}, 'Archived')">Archive</button>
                                              </li>
                                          </ul>
                                      </div>
                                  @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>   
                    </table>
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
        <div class="alertCon">
            <div id="alert-container"></div>
        </div>
        </section>




  </main><!-- End #main -->

@include('layouts.footerSkKagawad')
<script>
    function updateEventStatus(eventId, newStatus) 
    {
        fetch('/update-event-status', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                id: eventId,
                status: newStatus
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Event status updated successfully');
                location.reload();
            } else {
                alert('Failed to update Event status');
            }
        })
        .catch(error => console.error('Error:', error));
    }

</script>

  
</body>

</html>