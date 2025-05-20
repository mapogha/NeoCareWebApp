<?php include 'header.php'?>
<?php
require_once '../functions/admin/view-child.php';
?>

<!-- Now you can access $child['child_name'], $child['birth_date'], etc. -->

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
                    <div class="col-xl">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Basic with Icons</h5>
                            </div>
                            <div class="card-body">
                            <form action="../functions/admin/update-child.php" method="post">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($child['id'] ?? '') ?>">

                                <div class="mb-3">
                                    <label class="form-label" for="child_name">Child Name</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-user"></i></span>
                                        <input type="text" class="form-control" id="child_name" name="child_name" value="<?= htmlspecialchars($child['child_name'] ?? '') ?>" required />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="mother_name">Mother Name</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-user"></i></span>
                                        <input type="text" class="form-control" id="mother_name" name="mother_name" value="<?= htmlspecialchars($child['mother_name'] ?? '') ?>" required />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="father_name">Father Name</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-user"></i></span>
                                        <input type="text" class="form-control" id="father_name" name="father_name" value="<?= htmlspecialchars($child['father_name'] ?? '') ?>" />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="birth_date">Birth Date</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                        <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?= htmlspecialchars($child['birth_date'] ?? '') ?>" required />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="registration_number">Registration Number</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-id-card"></i></span>
                                        <input type="text" class="form-control" id="registration_number" name="registration_number" value="<?= htmlspecialchars($child['registration_number'] ?? '') ?>" />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="hospital">Hospital</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-building"></i></span>
                                        <input type="text" class="form-control" id="hospital" name="hospital_name" value="<?= htmlspecialchars($child['hospital_name'] ?? '') ?>" disabled />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="street">Street</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-map"></i></span>
                                        <input type="text" class="form-control" id="street" name="street" value="<?= htmlspecialchars($child['street'] ?? '') ?>" />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="ward">Ward</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-map"></i></span>
                                        <input type="text" class="form-control" id="ward" name="ward" value="<?= htmlspecialchars($child['ward'] ?? '') ?>" />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="weight_on_birth">Weight at Birth (kg)</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-line-chart"></i></span>
                                        <input type="text" class="form-control" id="weight_on_birth" name="weight_on_birth" value="<?= htmlspecialchars($child['weight_on_birth'] ?? '') ?>" />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="height_on_birth">Height at Birth (cm)</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-line-chart"></i></span>
                                        <input type="text" class="form-control" id="height_on_birth" name="height_on_birth" value="<?= htmlspecialchars($child['height_on_birth'] ?? '') ?>" />
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Child</button>
                            </form>



                            </div>
                        </div>
                    </div>
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