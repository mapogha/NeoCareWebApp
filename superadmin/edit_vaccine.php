<?php include 'header.php'?>
<?php
require_once '../functions/superadmin/update-vaccine.php';

if (!isset($_GET['id'])) {
    echo "Vaccine ID missing.";
    exit;
}

$id = (int) $_GET['id'];
$vaccine = getVaccineById($id);

if (!$vaccine) {
    echo "Vaccine not found.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedData = [
        'vaccine_name' => $_POST['vaccine_name'],
        'child_age' => $_POST['child_age'],
        'vaccine_type' => $_POST['vaccine_type'],
        'description' => $_POST['description'],
        'recommended_dose' => $_POST['recommended_dose'],
        'side_effects' => $_POST['side_effects'],
        'is_mandatory' => $_POST['is_mandatory'],
    ];

    if (updateVaccineById($id, $updatedData)) {
        header("Location: view_vaccines.php?updated=1");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Failed to update vaccine.</div>";
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
                            <h5 class="mb-0">Add Vaccine Details</h5>
                            <small class="text-muted float-end">Important for validation</small>
                            </div>
                            <div class="card-body">
                                
                            <form method="post">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="vaccine_name">Vaccine Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="vaccine_name" name="vaccine_name" value="<?= htmlspecialchars($vaccine['vaccine_name']) ?>" required />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="child_age">Child Age</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="child_age" name="child_age" value="<?= htmlspecialchars($vaccine['child_age']) ?>" required />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="vaccine_type">Vaccine Type</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="vaccine_type" name="vaccine_type" value="<?= htmlspecialchars($vaccine['vaccine_type']) ?>" required />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="description">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="description" name="description" required><?= htmlspecialchars($vaccine['description']) ?></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="recommended_dose">Recommended Dose</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="recommended_dose" name="recommended_dose" value="<?= htmlspecialchars($vaccine['recommended_dose']) ?>" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="side_effects">Side Effects</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="side_effects" name="side_effects" required><?= htmlspecialchars($vaccine['side_effects']) ?></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="is_mandatory">Is Mandatory</label>
                                    <div class="col-sm-10">
                                        <select id="is_mandatory" name="is_mandatory" class="form-control">
                                            <option value="1" <?= $vaccine['is_mandatory'] ? 'selected' : '' ?>>Yes</option>
                                            <option value="0" <?= !$vaccine['is_mandatory'] ? 'selected' : '' ?>>No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update Vaccine</button>
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