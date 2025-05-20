<?php include 'header.php'?>
<?php include '../functions/admin/view-child-medical-records.php'?>
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
                                <h5 class="card-header"> <strong><?= htmlspecialchars($child['child_name']) ?></strong>  Medical Records</h5>
                            </div>
                            <div class="card-body">
                            <div class="table-responsive text-nowrap">
                            <?php if (count($records) > 0): ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Vaccine</th>
                                            <th>Age (years)</th>
                                            <th>Weight (kg)</th>
                                            <th>Height (cm)</th>
                                            <th>Observations</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($records as $record): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($record['vaccination_date']) ?></td>
                                                <td><?= htmlspecialchars($record['vaccine_name']) ?></td>
                                                <td><?= htmlspecialchars($record['age']) ?></td>
                                                <td><?= htmlspecialchars($record['weight']) ?></td>
                                                <td><?= htmlspecialchars($record['height']) ?></td>
                                                <td><?= nl2br(htmlspecialchars($record['observations'])) ?></td>
                                                <td>
                                                <a class="dropdown-item" href="view_child_medical_record.php?id=<?= $record['child_id'] ?>">
                                                    <i class="bx bx-show me-1"></i> View
                                                </a>

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <p>No medical records found for this child.</p>
                            <?php endif; ?>

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