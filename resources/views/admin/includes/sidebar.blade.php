
	<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="{{ route('show_users') }}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Users
				<span class="badge badge-info right">{{ $users->count() }}</span>
              </p>
            </a>
          </li>
        </ul>
    </nav>