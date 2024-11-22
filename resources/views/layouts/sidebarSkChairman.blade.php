<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboards/dbSkChairman') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@dbSkChairman') }}">
          <i class="bx bxs-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>

      {{-- ARTICLE BLOGS --}}
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('dashboards/skChairmanDb/submittedBlogs*') || Request::is('dashboards/skChairmanDb/publishedBlogs*') || Request::is('dashboards/skChairmanDb/archivedBlogs*')) ? '' : 'collapsed' }}" data-bs-target="#art-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bxs-news"></i>
          <span>Blogs</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="art-nav" class="nav-content collapse {{ Request::is('dashboards/skChairmanDb/submittedBlogs*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
            
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboards/skChairmanDb/submittedBlogs*') ? '' : 'collapsed' }}" href="{{ action([App\Http\Controllers\regValidation::class, 'submittedBlogs'], ['em_id' => $LoggedUserInfo['em_id']]) }}">
              <i class="ri-newspaper-fill"></i>
              <span>Submitted Blogs</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboards/skChairmanDb/submittedNews*') ? '' : 'collapsed' }}" href="{{ action([App\Http\Controllers\regValidation::class, 'submittedNews'], ['em_id' => $LoggedUserInfo['em_id']]) }}">
              <i class="bx bxs-paper-plane"></i>
              <span>Submitted News</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboards/skChairmanDb/publishedBlogs*') ? '' : 'collapsed' }}" href="{{ action([App\Http\Controllers\regValidation::class, 'publishedBlogs'], ['em_id' => $LoggedUserInfo['em_id']]) }}">
              <i class="ri-newspaper-fill"></i>
              <span>Published Blogs</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboards/skChairmanDb/archivedBlogs*') ? '' : 'collapsed' }}" href="{{ action([App\Http\Controllers\regValidation::class, 'archivedBlogs'], ['em_id' => $LoggedUserInfo['em_id']]) }}">
              <i class="ri-newspaper-fill"></i>
              <span>Archived/Denied Blogs</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboards/skChairmanDb/createArticle*') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@createArt1') }}">
              <i class="bx bxs-news"></i>
              <span>Create Recommended News</span>
            </a>
          </li>

        </ul>
      </li>

      {{-- EVENTS --}}
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('dashboards/skChairmanDb/submittedEvents*') || Request::is('dashboards/skChairmanDb/createEvent*')) ? '' : 'collapsed' }}" data-bs-target="#event-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bxs-news"></i>
          <span>Brgy. Announcement</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="event-nav" class="nav-content collapse {{ Request::is('dashboards/skChairmanDb/submittedEvents*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
            
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboards/skChairmanDb/submittedEvents*') ? '' : 'collapsed' }}" href="{{ action([App\Http\Controllers\regValidation::class, 'submittedEvents'], ['em_id' => $LoggedUserInfo['em_id']]) }}">
              <i class="ri-newspaper-fill"></i>
              <span>Submitted Announcement</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboards/skChairmanDb/createEvent*') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@createEvent1') }}">
              <i class="bx bxs-news"></i>
              <span>Create Announcement</span>
            </a>
          </li>
      
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboards/skChairmanDb/eventList*') ? '' : 'collapsed' }}" href="{{ action([App\Http\Controllers\regValidation::class, 'eventLists1'], ['em_id' => $LoggedUserInfo['em_id']]) }}">
              <i class="ri-newspaper-fill"></i>
              <span>Announcement List</span>
            </a>
          </li>
        </ul>
      </li>
  

    </ul>
  </aside><!-- End Sidebar-->
  