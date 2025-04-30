<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
      <span class="app-brand-text demo menu-text fw-bolder ms-2">ECIS</span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item active">
      <a href="index.html" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Dashboard">Dashboard</div>
      </a>
    </li>

    <!-- User Management -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="User Management">Child Management</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="view_children.php" class="menu-link">
            <div data-i18n="Health Workers">Child</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Reports -->
    <li class="menu-item">
      <a href="view_vaccination_reports.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-bar-chart-alt-2"></i>
        <div data-i18n="Reports">Vaccination Reports</div>
      </a>
    </li>

    <!-- Account Settings -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-cog"></i>
        <div data-i18n="Account Settings">Account</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="profile.php" class="menu-link">
            <div data-i18n="Account">Profile</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="notifications.php" class="menu-link">
            <div data-i18n="Notifications">Notifications</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Logout -->
    <li class="menu-item">
      <a href="logout.html" class="menu-link">
        <i class="menu-icon tf-icons bx bx-power-off"></i>
        <div data-i18n="Logout">Logout</div>
      </a>
    </li>
  </ul>
</aside>
