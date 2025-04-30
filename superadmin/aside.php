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

    <!-- Hospital Management -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-clinic"></i>
        <div data-i18n="Hospitals">Hospitals</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item"><a href="create_hospital.php" class="menu-link"><div data-i18n="Add Hospital">Add Hospital</div></a></li>
        <li class="menu-item"><a href="view_hospitals.php" class="menu-link"><div data-i18n="View Hospitals">View Hospitals</div></a></li>
      </ul>
    </li>

    <!-- Admins -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-shield"></i>
        <div data-i18n="Admins">Admins</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item"><a href="create_admin.php" class="menu-link"><div data-i18n="Create Admin">Create Admin</div></a></li>
        <li class="menu-item"><a href="view_admins.php" class="menu-link"><div data-i18n="View Admins">View Admins</div></a></li>
      </ul>
    </li>

    <!-- Vaccinations -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-bar-chart-alt-2"></i>
        <div data-i18n="Vaccines">Vaccines</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item"><a href="create_vaccine.php" class="menu-link"><div data-i18n="Create vaccine">Create Vaccine</div></a></li>
        <li class="menu-item"><a href="view_vaccines.php" class="menu-link"><div data-i18n="View vaccines">View Vaccines</div></a></li>
      </ul>
    </li>

    <!-- Reports -->
    <li class="menu-item">
      <a href="view_vaccines_reports.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-bar-chart-alt-2"></i>
        <div data-i18n="Reports">Vaccines Reports</div>
      </a>
    </li>

    <!-- Account Settings -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-cog"></i>
        <div data-i18n="Account Settings">Account</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item"><a href="profile.php" class="menu-link"><div data-i18n="Account">Profile</div></a></li>
        <li class="menu-item"><a href="notifications.php" class="menu-link"><div data-i18n="Notifications">Notifications</div></a></li>
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
