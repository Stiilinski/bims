<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboards/dbSk') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@dbSk') }}">
          <i class="bx bxs-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>

      {{-- ARTICLE BLOGS --}}
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('dashboards/skDb/createArticle*') || Request::is('dashboards/skDb/myDraft*') || Request::is('dashboards/skDb/mySubmission*')) ? '' : 'collapsed' }}" data-bs-target="#art-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bxs-news"></i>
          <span>Blogs</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="art-nav" class="nav-content collapse {{ Request::is('dashboards/skDb/createArticle*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
            
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboards/skDb/createArticle') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@createArt') }}">
              <i class="bx bxs-news"></i>
              <span>Create New Article</span>
            </a>
          </li>
      
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboards/skDb/myDraft*') ? '' : 'collapsed' }}" href="{{ action([App\Http\Controllers\regValidation::class, 'myDraft'], ['em_id' => $LoggedUserInfo['em_id']]) }}">
              <i class="ri-newspaper-fill"></i>
              <span>My Drafts</span>
            </a>
          </li>
      
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboards/skDb/mySubmission*') ? '' : 'collapsed' }}" href="{{ action([App\Http\Controllers\regValidation::class, 'mySubmission'], ['em_id' => $LoggedUserInfo['em_id']]) }}">
              <i class="bx bxs-paper-plane"></i>
              <span>My Submission</span>
            </a>
          </li>

        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ (Request::is('dashboards/skDb/createEvent*') || Request::is('dashboards/skDb/eventList*')) ? '' : 'collapsed' }}" data-bs-target="#event-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bxs-news"></i>
          <span>Brgy. Events</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="event-nav" class="nav-content collapse {{ Request::is('dashboards/skDb/createEvent*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
            
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboards/skDb/createEvent*') ? '' : 'collapsed' }}" href="{{ action('App\Http\Controllers\regValidation@createEvent') }}">
              <i class="bx bxs-news"></i>
              <span>Create Events</span>
            </a>
          </li>
      
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboards/skDb/eventList*') ? '' : 'collapsed' }}" href="{{ action([App\Http\Controllers\regValidation::class, 'eventLists'], ['em_id' => $LoggedUserInfo['em_id']]) }}">
              <i class="ri-newspaper-fill"></i>
              <span>Events List</span>
            </a>
          </li>
        </ul>
      </li>
  

    </ul>
  </aside><!-- End Sidebar-->
  