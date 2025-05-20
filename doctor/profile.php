<?php include 'header.php'?>
<?php
require_once __DIR__ . '/../db/db.php';
$admin_id = $_SESSION['user_id'] ?? 0;

$stmt = $conn->prepare("SELECT name, email, phone_number, address, ward, street, street_chairman_name FROM users WHERE id = :id AND role = 'hospital_admin'");
$stmt->execute([':id' => $admin_id]);
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$admin) {
    echo "Admin profile not found.";
    exit;
}
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
                        
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                <li class="nav-item">
                                    <a class="nav-link active" href="profile.php"><i class="bx bx-user me-1"></i> Account</a>
                                </li>
                                </ul>
                                <div class="card mb-4">
                                <h5 class="card-header">Profile Details</h5>
                                <!-- Account -->
                                <div class="card-body">
                                <div class="card-body">
                                <div class="card-body">
                                    <form id="formAccountSettings" method="POST" action="../functions/admin/update-admin-profile.php">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="name" class="form-label">Full Name</label>
                                                <input class="form-control" type="text" id="name" name="name" value="<?= htmlspecialchars($admin['name'] ?? '') ?>" required />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="email" class="form-label">E-mail</label>
                                                <input class="form-control" type="email" id="email" name="email" value="<?= htmlspecialchars($admin['email'] ?? '') ?>" required />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="phone_number">Phone Number</label>
                                                <input type="text" id="phone_number" name="phone_number" class="form-control" value="<?= htmlspecialchars($admin['phone_number'] ?? '') ?>" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="address" name="address" value="<?= htmlspecialchars($admin['address'] ?? '') ?>" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="ward" class="form-label">Ward</label>
                                                <input type="text" class="form-control" id="ward" name="ward" value="<?= htmlspecialchars($admin['ward'] ?? '') ?>" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="street" class="form-label">Street</label>
                                                <input type="text" class="form-control" id="street" name="street" value="<?= htmlspecialchars($admin['street'] ?? '') ?>" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="street_chairman_name" class="form-label">Street Chairman</label>
                                                <input type="text" class="form-control" id="street_chairman_name" name="street_chairman_name" value="<?= htmlspecialchars($admin['street_chairman_name'] ?? '') ?>" />
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary me-2">Update Profile</button>
                                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                        </div>
                                    </form>

                                </div>

                                </div>

                                </div>
                                <!-- /Account -->
                                </div>
                            </div>
                               
                        </div>
                        <!-- / Content -->

                        <div class="content-backdrop fade"></div>
                   </div>
                    <!-- Footer -->
                    <?php include 'footer.php'?>
                    <!-- / Footer -->
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