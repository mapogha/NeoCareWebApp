<?php include 'header.php'?>
<?php
require_once '../functions/superadmin/view-vaccines.php';
$vaccines = fetchVaccines();
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
                        <!-- Bordered Table -->
                        <div class="card">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-header mb-0">Vaccines</h5>
                            <a class="btn btn-primary me-3" href="create_vaccine.php">Add Vaccine</a>
                        </div>


                            <div class="card-body">
                                <div class="table-responsive text-nowrap">
                                    
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Vaccine Name</th>
                                                <th>Child Age</th>
                                                <th>Type</th>
                                                <th>Recommended Dose</th>
                                                <th>Mandatory</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($vaccines as $vaccine): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($vaccine['vaccine_name']) ?></td>
                                                    <td><?= htmlspecialchars($vaccine['child_age']) ?></td>
                                                    <td><?= htmlspecialchars($vaccine['vaccine_type']) ?></td>
                                                    <td><?= htmlspecialchars($vaccine['recommended_dose']) ?></td>
                                                    <td><?= $vaccine['is_mandatory'] ? 'Yes' : 'No' ?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="view_vaccine.php?id=<?= $vaccine['id'] ?>">
                                                                    <i class="bx bx-show me-1"></i> View
                                                                </a>
                                                                <a class="dropdown-item" href="edit_vaccine.php?id=<?= $vaccine['id'] ?>">
                                                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                                                </a>
                                                                <a class="dropdown-item" href="../functions/superadmin/delete-vaccine.php?id=<?= $vaccine['id'] ?>" onclick="return confirm('Are you sure you want to delete this vaccine?');">
                                                                    <i class="bx bx-trash me-1"></i> Delete
                                                                </a>
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