<?php include 'header.php'?>
<?php
require_once __DIR__ . '/../db/db.php';

// Retrieve child ID from GET parameter
$child_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch child details
$child_stmt = $conn->prepare("SELECT child_name FROM children WHERE id = :id");
$child_stmt->execute([':id' => $child_id]);
$child = $child_stmt->fetch(PDO::FETCH_ASSOC);

// Fetch vaccine types
$vaccine_stmt = $conn->query("SELECT id, vaccine_name FROM vaccines");
$vaccines = $vaccine_stmt->fetchAll(PDO::FETCH_ASSOC);
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
                            <h5 class="mb-0">Child's Clinic Session</h5>
                            <small class="text-muted float-end">Important for validation</small>
                            </div>
                            <div class="card-body">
                            <form action="../functions/admin/create-child-medical-record.php" method="post">
                                <input type="hidden" name="child_id" value="<?= htmlspecialchars($child_id) ?>">

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="child_name">Child Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="child_name" name="child_name" value="<?= htmlspecialchars($child['child_name'] ?? '') ?>" readonly />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="vaccination_date">Vaccination Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="vaccination_date" name="vaccination_date" required />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="vaccine_id">Vaccine Type</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="vaccine_id" name="vaccine_id" required>
                                            <option value="">-- Select Vaccine --</option>
                                            <?php foreach ($vaccines as $vaccine): ?>
                                                <option value="<?= htmlspecialchars($vaccine['id']) ?>"><?= htmlspecialchars($vaccine['vaccine_name']) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="age">Age (years)</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="age" name="age" placeholder="e.g. 2" required />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="weight">Weight (kg)</label>
                                    <div class="col-sm-10">
                                        <input type="number" step="0.01" class="form-control" id="weight" name="weight" placeholder="e.g. 12.5" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="height">Height (cm)</label>
                                    <div class="col-sm-10">
                                        <input type="number" step="0.01" class="form-control" id="height" name="height" placeholder="e.g. 85.0" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="observations">Observations</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="observations" name="observations" rows="3" placeholder="Enter any observations here..."></textarea>
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