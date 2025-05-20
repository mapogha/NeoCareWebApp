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
                            <h5 class="mb-0">Add Child</h5>
                            <small class="text-muted float-end">Important for validation</small>
                            </div>
                            <div class="card-body">
                                <form action="../functions/admin/create-child.php" method="post">
                                    <div class="mb-3">
                                        <input type="hidden" name="action" value="add_child">
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="child_name">Child Name</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="child_name" name="child_name" placeholder="Child Name" required />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="mother_name">Mother Name</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Mother Name" required />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="father_name">Father Name</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Father Name" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="hospital_id">Hospital</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="hospital_id" name="hospital_id" required>
                                                <option value="">-- Select Hospital --</option>
                                                <?php
                                                require_once '../db/db.php'; // Adjust path if needed
                                                $stmt = $conn->query("SELECT id, hospital_name FROM hospitals");
                                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['hospital_name']) . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="birth_date">Birth Date</label>
                                        <div class="col-sm-10">
                                        <input type="date" class="form-control" id="birth_date" name="birth_date" required />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="weight_on_birth">Weight (kg)</label>
                                        <div class="col-sm-10">
                                        <input type="number" step="0.01" class="form-control" id="weight_on_birth" name="weight_on_birth" placeholder="e.g. 3.20" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="height_on_birth">Height (cm)</label>
                                        <div class="col-sm-10">
                                        <input type="number" step="0.01" class="form-control" id="height_on_birth" name="height_on_birth" placeholder="e.g. 49.5" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="twin_status">Twin Status</label>
                                        <div class="col-sm-10">
                                        <select class="form-control" id="twin_status" name="twin_status">
                                            <option value="single">Single</option>
                                            <option value="twin">Twin</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="birth_rank">Birth Rank</label>
                                        <div class="col-sm-10">
                                        <input type="number" class="form-control" id="birth_rank" name="birth_rank" placeholder="1" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="previous_sibling_birth_date">Previous Sibling Birth Date</label>
                                        <div class="col-sm-10">
                                        <input type="date" class="form-control" id="previous_sibling_birth_date" name="previous_sibling_birth_date" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="street">Street</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="street" name="street" placeholder="Street" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="ward">Ward</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="ward" name="ward" placeholder="Ward" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="street_chairman_name">Street Chairman Name</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="street_chairman_name" name="street_chairman_name" placeholder="Street Chairman" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="registration_number">Registration Number</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="registration_number" name="registration_number" placeholder="Registration Number" />
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
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