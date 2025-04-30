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
                            <h5 class="mb-0">Add Hospital Details</h5>
                            <small class="text-muted float-end">Important for validation</small>
                            </div>
                            <div class="card-body">
                            <form action="../functions/superadmin/create-admin.php" method="post">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="name">Admin Name</label>
                                    <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-user"></i></span>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required />
                                    </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="email">Admin Email</label>
                                    <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required />
                                    </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="password">Password</label>
                                    <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-lock"></i></span>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Create Password" required />
                                    </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="role">Role</label>
                                    <div class="col-sm-10">
                                    <select class="form-control" id="role" name="role" required>
                                        <option value="hospital_admin">Hospital Admin</option>
                                        <option value="super_admin">Super Admin</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="hospital_id">Hospital</label>
                                    <div class="col-sm-10">
                                    <select class="form-control" id="hospital_id" name="hospital_id" required>
                                        <option value="">-- Select Hospital --</option>
                                        <?php
                                        require_once '../db/db.php';
                                        $stmt = $conn->query("SELECT id, hospital_name FROM hospitals");
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['hospital_name']) . '</option>';
                                        }
                                        ?>
                                    </select>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label" for="phone_number">Phone No</label>
                                    <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-phone"></i></span>
                                        <input type="text" id="phone_number" name="phone_number" class="form-control phone-mask" placeholder="658 799 8941" required />
                                    </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Create Admin">
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