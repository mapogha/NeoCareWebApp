<?php include 'header.php'?>
<?php
require_once '../db/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

$stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
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
                                    <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
                                </li>
                                </ul>
                                <div class="card mb-4">
                                <h5 class="card-header">Profile Details</h5>
                                <div class="card-body">
                                    <form id="formAccountSettings" method="POST" action="../functions/update-profile.php" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                            <label for="name" class="form-label">Full Name</label>
                                            <input class="form-control" type="text" id="name" name="name" value="<?= $user['name'] ?>" required />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                            <label for="email" class="form-label">E-mail</label>
                                            <input class="form-control" type="email" id="email" name="email" value="<?= $user['email'] ?>" required />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                            <label for="phone_number" class="form-label">Phone Number</label>
                                            <input class="form-control" type="text" id="phone_number" name="phone_number" value="<?= $user['phone_number'] ?>" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                            <label for="address" class="form-label">Address</label>
                                            <input class="form-control" type="text" id="address" name="address" value="<?= $user['address'] ?>" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                            <label for="ward" class="form-label">Ward</label>
                                            <input class="form-control" type="text" id="ward" name="ward" value="<?= $user['ward'] ?>" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                            <label for="street" class="form-label">Street</label>
                                            <input class="form-control" type="text" id="street" name="street" value="<?= $user['street'] ?>" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                            <label for="street_chairman_name" class="form-label">Street Chairman</label>
                                            <input class="form-control" type="text" id="street_chairman_name" name="street_chairman_name" value="<?= $user['street_chairman_name'] ?>" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                            <label for="license_number" class="form-label">License Number</label>
                                            <input class="form-control" type="text" id="license_number" name="license_number" value="<?= $user['license_number'] ?>" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                            <label for="specialization" class="form-label">Specialization</label>
                                            <input class="form-control" type="text" id="specialization" name="specialization" value="<?= $user['specialization'] ?>" />
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                            
                                        </div>
                                    </form>

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