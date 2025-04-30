<?php include 'header.php'?>
<?php
    require_once '../functions/superadmin/view-single-hospital.php';

        if (!isset($_GET['id'])) {
            echo "Hospital ID missing.";
            exit;
        }

        $hospital = getHospitalById($_GET['id']);

        if (!$hospital) {
            echo "Hospital not found.";
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
                <div class="row">
                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Add Hospital Details</h5>
                            <small class="text-muted float-end">Important for validation</small>
                            </div>
                            <div class="card-body">
                               
                                <form action="" method="post">
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Hospital Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?= htmlspecialchars($hospital['hospital_name']) ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Hospital Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?= htmlspecialchars($hospital['hospital_email']) ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Region</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?= htmlspecialchars($hospital['region']) ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">District</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?= htmlspecialchars($hospital['district']) ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?= htmlspecialchars($hospital['phone_number']) ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" disabled><?= htmlspecialchars($hospital['hospital_address']) ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">License No.</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?= htmlspecialchars($hospital['license_number']) ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Website</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?= htmlspecialchars($hospital['website']) ?>" disabled>
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