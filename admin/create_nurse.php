<?php include 'header.php'?>
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
                            <h5 class="mb-0">Add Doctor Details</h5>
                            <small class="text-muted float-end">Important for validation</small>
                            </div>
                            <div class="card-body">
                                <?php

                                require_once '../db/db.php';

                                // Fetch the logged-in admin's hospital
                                $admin_id = $_SESSION['user_id'];
                                $stmt = $conn->prepare("
                                    SELECT h.id, h.hospital_name
                                    FROM hospitals h
                                    JOIN users u ON h.id = u.hospital_id
                                    WHERE u.id = :admin_id AND u.role = 'hospital_admin'
                                ");
                                $stmt->execute([':admin_id' => $admin_id]);
                                $hospital = $stmt->fetch(PDO::FETCH_ASSOC);
                                ?>

                                <form action="../functions/admin/create-nurse.php" method="post">
                                    <input type="hidden" name="hospital_id" value="<?= htmlspecialchars($hospital['id']) ?>">

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="hospital_name">Hospital Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="hospital_name" name="hospital_name" class="form-control"
                                                value="<?= htmlspecialchars($hospital['hospital_name']) ?>" readonly />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="name">Nurse Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="email">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" name="email" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="password">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="password" name="password" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="license_number">License Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="license_number" name="license_number" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="phone_number">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="phone_number" name="phone_number" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="specialization">Specialization</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="specialization" name="specialization" />
                                        </div>
                                    </div>

                                    <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                            <input type="submit" name="submit" class="btn btn-primary" value="Create Nurse">
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