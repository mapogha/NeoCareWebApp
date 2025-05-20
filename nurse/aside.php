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

    <!-- Staff Management -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-user-pin"></i>
        <div data-i18n="Staff Management">Staff</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item"><a href="create_doctor.php" class="menu-link"><div>Create Doctor</div></a></li>
        <li class="menu-item"><a href="view_doctors.php" class="menu-link"><div>View Doctors</div></a></li>
        <li class="menu-item"><a href="create_nurse.php" class="menu-link"><div>Create Nurse</div></a></li>
        <li class="menu-item"><a href="view_nurses.php" class="menu-link"><div>View Nurses</div></a></li>
      </ul>
    </li>

    <!-- Vaccine Management -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-injection"></i>
        <div data-i18n="Vaccine Management">Vaccines</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item"><a href="create_vaccine.php" class="menu-link"><div>Create Vaccine</div></a></li>
        <li class="menu-item"><a href="view_vaccines.php" class="menu-link"><div>View Vaccines</div></a></li>
      </ul>
    </li>

    <!-- Children Management -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-child"></i>
        <div data-i18n="Children Management">Children</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item"><a href="create_child.php" class="menu-link"><div>Create Child</div></a></li>
        <li class="menu-item"><a href="view_children.php" class="menu-link"><div>View Children</div></a></li>
      </ul>
    </li>

    <!-- Account -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-cog"></i>
        <div data-i18n="Account Settings">Account</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item"><a href="profile.php" class="menu-link"><div>Profile</div></a></li>
        <li class="menu-item"><a href="notifications.php" class="menu-link"><div>Notifications</div></a></li>
      </ul>
    </li>

    <!-- Report Management -->
    <li class="menu-item">
      <a href="view_reports.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-bar-chart"></i>
        <div data-i18n="Reports">Reports</div>
      </a>
    </li>

    <!-- Logout -->
    <li class="menu-item">
      <a href="../functions/admin/logout.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-power-off"></i>
        <div data-i18n="Logout">Logout</div>
      </a>
    </li>
  </ul>
</aside>
