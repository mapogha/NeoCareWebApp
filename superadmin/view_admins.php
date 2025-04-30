<?php include 'header.php'?>
<?php
require_once '../functions/superadmin/view-admins.php';
$admins = fetchAdmins();
?>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php include 'aside.php'?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
            <?php include 'navigation.php'?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Bordered Table -->
                        <div class="card">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-header">Admins</h5>
                                <a class="btn btn-primary me-3" href="create_admin.php">Add Admin</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive text-nowrap">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Phone</th>
                                            <th>Hospital</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($admins as $admin): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($admin['name']) ?></td>
                                            <td><?= htmlspecialchars($admin['email']) ?></td>
                                            <td><?= ucfirst(str_replace('_', ' ', $admin['role'])) ?></td>
                                            <td><?= htmlspecialchars($admin['phone_number']) ?></td>
                                            <td><?= $admin['hospital_name'] ?? 'N/A' ?></td>
                                            <td>
                                                <a href="view_admin.php?id=<?= $admin['id'] ?>" class="btn btn-sm btn-info">View</a>
                                                <a href="edit_admin.php?id=<?= $admin['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="../functions/superadmin/delete-admin.php?id=<?= $admin['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this admin?')">Delete</a>
                                                <a href="../functions/superadmin/login-as-admin.php?id=<?= $admin['id'] ?>" class="btn btn-sm btn-secondary" onclick="return confirm('You are about to login as this admin. Continue?')">Login As</a>
                                            </td>

                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                                </div>
                            </div>
                        </div>
                        <!--/ Bordered Table -->
                    </div>
                  
                    
                    
                <!-- / Content -->

                <!-- Footer -->
                <?php include 'footer.php'?>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
                <!-- Content wrapper -->
        </div>
            <!-- / Layout page -->
        </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <?php include 'scripts.php'?>
  </body>
</html>