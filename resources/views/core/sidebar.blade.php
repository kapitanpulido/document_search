<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
  <div class="sidebar-brand d-none d-md-flex">
		-
  </div>
		
	<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    
		<li class="nav-item {{ activeLink(routeName(), 'dashboard') }}">
      <a class="nav-link" href="{{ route('dashboard.index') }}">
				<i class="fa-solid fa-gauge nav-icon"></i>
        DASHBOARD
      </a>
    </li>
		
		<li class="nav-item {{ activeLink(routeName(), 'upload.index') }}">
      <a class="nav-link" href="{{ route('upload.index') }}">
				<i class="fa-solid fa-cloud-arrow-up nav-icon"></i>
        UPLOAD DOCS
      </a>
    </li>

		<li class="nav-item {{ activeLink(routeName(), 'user') }}">
      <a class="nav-link" href="{{ route('user.index') }}">
				<i class="fa-solid fa-circle-user nav-icon"></i>
        USER ACCOUNT
      </a>
    </li>

		<li class="nav-item {{ activeLink(routeName(), 'manual') }}">
      <a class="nav-link" href="{{ route('manual.index') }}">
				<i class="fa-solid fa-person-chalkboard nav-icon"></i>
        MANUAL
      </a>
    </li>

	</ul>
</div>