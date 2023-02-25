<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item text-muted">
          <a class="nav-link" href="/dashboard">
            <span data-feather="user" class="align-text-bottom"></span>
            Hi, {{ auth()->user()->name }}
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/">
            <span data-feather="globe" class="align-text-bottom"></span>
            View Site
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>        
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
            <span data-feather="list" class="align-text-bottom"></span>
            My Post
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard/posts/create') ? 'active' : '' }}" href="/dashboard/posts/create">
            <span data-feather="plus-square" class="align-text-bottom"></span>
            Add Post
          </a>
        </li>          
      </ul>  
      
      <h6 class="sidebar-headling d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted"><span>Administrator</span></h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
            <span data-feather="layers" class="align-text-bottom"></span>
            Category
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">
            <span data-feather="users" class="align-text-bottom"></span>
            Users
          </a>
        </li>
      </ul>
    </div>
  </nav>