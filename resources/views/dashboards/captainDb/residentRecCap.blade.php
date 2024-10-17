@include('layouts.head')

<body>

  <!-- ======= Header ======= -->
    @include('layouts.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
    @include('layouts.sidebar')
  <!-- End Sidebar -->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Resident Records</h1>
    </div><!-- End Page Title -->

    <div class="card">
      <div class="card-body">

        <!-- Table with stripped rows -->
        <table class="table table-striped datatable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Full Name</th>
              <th scope="col">Age</th>
              <th scope="col">Civil Status</th>
              <th scope="col">Sex</th>
              <th scope="col">Voters Status</th>
              <th scope="col">Purok</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($residents as $resident)
              <tr>
                  <td>{{ $resident->res_id }}</td>
                  <td>{{ $resident->res_lname }}, {{ $resident->res_fname }} {{ substr($resident->res_mname, 0, 1) }}.</td>
                  <td>{{ app('App\Http\Controllers\regValidation')->calculateAges($resident->res_bdate) }}</td>
                  <td>{{ $resident->res_civil }}</td>
                  <td>{{ $resident->res_sex }}</td>
                  <td>{{ $resident->res_voters }}</td>
                  <td>{{ $resident->res_purok }}</td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="actionDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                          Actions
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="actionDropdown">
                          <li>
                              <form action="{{ action('App\Http\Controllers\regValidation@viewResidentDetails') }}" method="GET">
                                  <input type="hidden" name="res_id" value="{{ $resident->res_id }}">
                                  <button type="submit" class="dropdown-item">View</button>
                              </form>
                          </li>
                          <li>
                              <button type="button" class="dropdown-item" onclick="openEditForm({{ $resident }})">Edit</button>
                          </li>
                          <li>
                              <form action="{{ route('resident.archive') }}" method="POST" id="archive-form-{{ $resident->res_id }}">
                                  @csrf
                                  <input type="hidden" name="res_id" value="{{ $resident->res_id }}">
                                  <button type="button" class="dropdown-item" onclick="archiveResident({{ $resident->res_id }})">Archive</button>
                              </form>
                          </li>
                      </ul>
                  </div>
                  </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <!-- End Table with stripped rows -->

      </div>
    </div>



  </main><!-- End #main -->

  @include('layouts.footer')
</body>

</html>