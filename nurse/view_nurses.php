<?php include 'header.php'?>
<?php include '../functions/admin/view-nurses.php'?>
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
          <!-- Bordered Table -->
          <div class="card">
            <h5 class="card-header">Nurse List</h5>
            <div class="card-body">
              <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Nurse Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Specialization</th>
                      <th>Hospital</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $nurses = viewNurses();
                    foreach ($nurses as $nurse):
                    ?>
                      <tr>
                        <td><?= htmlspecialchars($nurse['name']) ?></td>
                        <td><?= htmlspecialchars($nurse['email']) ?></td>
                        <td><?= htmlspecialchars($nurse['phone_number']) ?></td>
                        <td><?= htmlspecialchars($nurse['specialization']) ?></td>
                        <td><?= htmlspecialchars($nurse['hospital_name'] ?? 'N/A') ?></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="update_nurse.php?id=<?= $nurse['id'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                              <a class="dropdown-item" href="../functions/admin/delete-nurse.php?= $nurse['id'] ?>" onclick="return confirm('Delete this nurse?');"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!--/ Bordered Table -->
        </div>

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

<!-- Core JS -->
<?php include 'scripts.php'?>
</body>
</html>
