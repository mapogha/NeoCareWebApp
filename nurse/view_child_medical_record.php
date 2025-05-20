<?php include 'header.php' ?>
<?php
$child_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
include '../functions/admin/view-child-medical-record.php';
?>

<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <?php include 'aside.php' ?>
    <div class="layout-page">
      <?php include 'navigation.php' ?>
      <div class="content-wrapper">
        <div class="container mt-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>EPSDT CHILD HEALTH MEDICAL RECORD</h2>
            <button class="btn btn-primary" onclick="window.print()">Download PDF</button>
          </div>

          <div class="card p-4">
            <h4>Child Details</h4>
            <table class="table table-bordered">
              <tbody>
                <tr><th>Name:</th><td><?= htmlspecialchars($child['child_name']) ?></td></tr>
                <tr><th>Date of Birth:</th><td><?= htmlspecialchars($child['birth_date']) ?></td></tr>
                <tr><th>Sex:</th><td><?= htmlspecialchars($child['twin_status'] === 'single' ? 'F' : 'M') ?></td></tr>
                <tr><th>Father's Name:</th><td><?= htmlspecialchars($child['father_name']) ?></td></tr>
                <tr><th>Mother's Name:</th><td><?= htmlspecialchars($child['mother_name']) ?></td></tr>
                <tr><th>Address:</th><td><?= htmlspecialchars($child['street'] . ', Ward ' . $child['ward']) ?></td></tr>
                <tr><th>Weight at Birth:</th><td><?= htmlspecialchars($child['weight_on_birth']) ?> kg</td></tr>
                <tr><th>Height at Birth:</th><td><?= htmlspecialchars($child['height_on_birth']) ?> cm</td></tr>
              </tbody>
            </table>

            <h4 class="mt-4">Medical Records</h4>
            <?php if (count($records) > 0): ?>
              <?php foreach ($records as $record): ?>
              <div class="border rounded p-3 mb-3">
                <h5 class="text-primary">Vaccine: <?= htmlspecialchars($record['vaccine_name']) ?></h5>
                <p><strong>Date:</strong> <?= htmlspecialchars($record['vaccination_date']) ?></p>
                <p><strong>Age:</strong> <?= htmlspecialchars($record['age']) ?> years</p>
                <p><strong>Weight:</strong> <?= htmlspecialchars($record['weight']) ?> kg</p>
                <p><strong>Height:</strong> <?= htmlspecialchars($record['height']) ?> cm</p>
                <p><strong>Observations:</strong><br><?= nl2br(htmlspecialchars($record['observations'])) ?></p>
              </div>
              <?php endforeach; ?>
            <?php else: ?>
              <p>No vaccination records found.</p>
            <?php endif; ?>

            <h4 class="mt-4">Family History (manually recorded if applicable)</h4>
            <p class="text-muted">This section should be completed by a healthcare provider if additional family history is available.</p>

            <h4 class="mt-4">Medical History (general)</h4>
            <p class="text-muted">Standard childhood illnesses and allergies can be added here manually or extended in the system later.</p>

          </div>
        </div>
        <?php include 'footer.php' ?>
        <div class="content-backdrop fade"></div>
      </div>
    </div>
  </div>
  <div class="layout-overlay layout-menu-toggle"></div>
</div>
<?php include 'scripts.php' ?>
</body>
</html>
