<?php include 'header.php'?>

<?php
// Ensure child_id is set before including the view logic
$child_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
include '../functions/admin/view-child-medical-record.php';
?>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <?php include 'aside.php'?>
    <div class="layout-page">
      <?php include 'navigation.php'?>
      <div class="content-wrapper">
        <div class="container mt-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Medical Record - <?= htmlspecialchars($child['child_name']) ?></h2>
            <button class="btn btn-primary" onclick="window.print()">Download PDF</button>
          </div>

          <div class="card p-4">
            <h4>Physician: Dr. Smith, Sunrise Clinic</h4>

            <table class="table table-bordered mt-3">
              <tbody>
                <tr><th>Child Name:</th><td><?= htmlspecialchars($child['child_name']) ?></td></tr>
                <tr><th>Date of Birth:</th><td><?= htmlspecialchars($child['birth_date']) ?></td></tr>
                <tr><th>Gender:</th><td><?= htmlspecialchars($child['twin_status'] ?? 'N/A') ?></td></tr>
                <tr><th>Father's Name:</th><td><?= htmlspecialchars($child['father_name'] ?? '') ?></td></tr>
                <tr><th>Mother's Name:</th><td><?= htmlspecialchars($child['mother_name'] ?? '') ?></td></tr>
                <tr><th>Address:</th><td><?= htmlspecialchars($child['street'] . ', Ward ' . $child['ward']) ?></td></tr>
                <tr><th>Weight at Birth (kg):</th><td><?= htmlspecialchars($child['weight_on_birth']) ?></td></tr>
                <tr><th>Height at Birth (cm):</th><td><?= htmlspecialchars($child['height_on_birth']) ?></td></tr>
              </tbody>
            </table>

            <h5 class="mt-4">Vaccination Records</h5>
            <div class="row">
              <?php foreach ($records as $record): ?>
                <div class="col-md-6 mb-4">
                  <div class="card shadow-sm">
                    <div class="card-body">
                      <h5 class="card-title text-primary"><?= htmlspecialchars($record['vaccine_name']) ?></h5>
                      <p class="mb-1"><strong>Date:</strong> <?= htmlspecialchars($record['vaccination_date']) ?></p>
                      <p class="mb-1"><strong>Age:</strong> <?= htmlspecialchars($record['age']) ?> years</p>
                      <p class="mb-1"><strong>Weight:</strong> <?= htmlspecialchars($record['weight']) ?> kg</p>
                      <p class="mb-1"><strong>Height:</strong> <?= htmlspecialchars($record['height']) ?> cm</p>
                      <p class="mb-0"><strong>Observations:</strong><br><?= nl2br(htmlspecialchars($record['observations'])) ?></p>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

        <?php include 'footer.php'?>
        <div class="content-backdrop fade"></div>
      </div>
    </div>
  </div>
  <div class="layout-overlay layout-menu-toggle"></div>
</div>
<?php include 'scripts.php'?>
</body>
</html>
