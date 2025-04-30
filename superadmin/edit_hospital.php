<?php include 'header.php'?>
<?php
require_once '../functions/superadmin/update-hospital-information.php';

if (!isset($_GET['id'])) {
    echo "Hospital ID missing.";
    exit;
}

$id = (int) $_GET['id'];
$hospital = getHospitalById($id);

if (!$hospital) {
    echo "Hospital not found.";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updateData = [
        'hospital_name' => $_POST['hospital_name'],
        'hospital_email' => $_POST['hospital_email'],
        'region' => $_POST['region'],
        'district' => $_POST['district'],
        'phone_number' => $_POST['phone_number'],
        'hospital_address' => $_POST['hospital_address'],
        'license_number' => $_POST['license_number'],
        'website' => $_POST['website'],
    ];

    if (updateHospital($id, $updateData)) {
        header("Location: view_hospitals.php?success=1");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Failed to update hospital. Please try again.</div>";
    }
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
                <div class="row">
                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Update Hospital Details</h5>
                            <small class="text-muted float-end">Important for validation</small>
                            </div>
                            <div class="card-body">
                            
                                <form action="" method="post">
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="hospital_name">Hospital Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="hospital_name" name="hospital_name" value="<?= htmlspecialchars($hospital['hospital_name']) ?>" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="hospital_email">Hospital Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="hospital_email" name="hospital_email" value="<?= htmlspecialchars($hospital['hospital_email']) ?>" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="region">Region</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="region" name="region" class="form-control" value="<?= htmlspecialchars($hospital['region']) ?>" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="district">District</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="district" name="district" class="form-control" value="<?= htmlspecialchars($hospital['district']) ?>" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 form-label" for="phone_number">Phone No</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="phone_number" name="phone_number" class="form-control" value="<?= htmlspecialchars($hospital['phone_number']) ?>" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 form-label" for="hospital_address">Hospital Address</label>
                                        <div class="col-sm-10">
                                            <textarea id="hospital_address" name="hospital_address" class="form-control" required><?= htmlspecialchars($hospital['hospital_address']) ?></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="license_number">License Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="license_number" name="license_number" class="form-control" value="<?= htmlspecialchars($hospital['license_number']) ?>" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="website">Website (optional)</label>
                                        <div class="col-sm-10">
                                            <input type="url" id="website" name="website" class="form-control" value="<?= htmlspecialchars($hospital['website']) ?>" />
                                        </div>
                                    </div>

                                    <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                            <input type="submit" name="submit" class="btn btn-primary" value="Update Hospital">
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
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