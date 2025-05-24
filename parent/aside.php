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
      <a href="dashboard.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Dashboard">Dashboard</div>
      </a>
    </li>

    <!-- My Children -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-child"></i>
        <div data-i18n="Children">My Children</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="view_children.php" class="menu-link">
            <div>View My Children</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Vaccination Reports -->
    <li class="menu-item">
      <a href="view_vaccination_reports.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-bar-chart-alt-2"></i>
        <div>Vaccination Reports</div>
      </a>
    </li>

    <!-- Notifications -->
    <li class="menu-item">
      <a href="notifications.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-bell"></i>
        <div>Notifications</div>
      </a>
    </li>

    <!-- Account -->
    <li class="menu-item">
      <a href="profile.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div>My Profile</div>
      </a>
    </li>

    <!-- Logout -->
    <li class="menu-item">
      <a href="../functions/admin/logout.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-power-off"></i>
        <div>Logout</div>
      </a>
    </li>
  </ul>
</aside>
