<?php include 'header.php'; ?>
<?php
require_once '../db/db.php';

$nurse_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$nurse_stmt = $conn->prepare("SELECT * FROM users WHERE id = :id AND role = 'nurse'");
$nurse_stmt->execute([':id' => $nurse_id]);
$nurse = $nurse_stmt->fetch(PDO::FETCH_ASSOC);

$admin_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT h.id, h.hospital_name FROM hospitals h JOIN users u ON h.id = u.hospital_id WHERE u.id = :admin_id AND u.role = 'hospital_admin'");
$stmt->execute([':admin_id' => $admin_id]);
$hospital = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <?php include 'aside.php'; ?>
    <div class="layout-page">
      <?php include 'navigation.php'; ?>
      <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
            <div class="col-xxl">
              <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="mb-0">Update Nurse Details</h5>
                  <small class="text-muted float-end">Update the nurse's profile</small>
                </div>
                <div class="card-body">
                  <form action="../functions/admin/update-nurse.php" method="post">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($nurse['id'] ?? '') ?>">
                    <input type="hidden" name="hospital_id" value="<?= htmlspecialchars($hospital['id'] ?? '') ?>">

                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="hospital_name">Hospital Name</label>
                      <div class="col-sm-10">
                        <input type="text" id="hospital_name" name="hospital_name" class="form-control" value="<?= htmlspecialchars($hospital['hospital_name'] ?? '') ?>" readonly>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="name">Nurse Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($nurse['name'] ?? '') ?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="email">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($nurse['email'] ?? '') ?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="phone_number">Phone</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= htmlspecialchars($nurse['phone_number'] ?? '') ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="license_number">License Number</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="license_number" name="license_number" value="<?= htmlspecialchars($nurse['license_number'] ?? '') ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="specialization">Specialization</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="specialization" name="specialization" value="<?= htmlspecialchars($nurse['specialization'] ?? '') ?>">
                      </div>
                    </div>

                    <div class="row justify-content-end">
                      <div class="col-sm-10">
                        <input type="submit" name="submit" class="btn btn-primary" value="Update Nurse">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include 'footer.php'; ?>
        <div class="content-backdrop fade"></div>
      </div>
    </div>
  </div>
  <div class="layout-overlay layout-menu-toggle"></div>
</div>
<?php include 'scripts.php'; ?>
</body>
</html>
