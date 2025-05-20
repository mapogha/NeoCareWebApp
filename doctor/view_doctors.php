<?php include 'header.php'?>
<?php include '../functions/admin/view-doctors.php'?>
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
                            <h5 class="card-header">Bordered Table</h5>
                            <div class="card-body">
                            <div class="table-responsive text-nowrap">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Doctor Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Specialization</th>
                                        <th>Hospital</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $doctors = viewDoctors();
                                    foreach ($doctors as $doctor):
                                    ?>
                                        <tr>
                                            <td><?= htmlspecialchars($doctor['name']) ?></td>
                                            <td><?= htmlspecialchars($doctor['email']) ?></td>
                                            <td><?= htmlspecialchars($doctor['phone_number']) ?></td>
                                            <td><?= htmlspecialchars($doctor['specialization']) ?></td>
                                            <td><?= htmlspecialchars($doctor['hospital_name'] ?? 'N/A') ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="update_doctor.php?id=<?= $doctor['id'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                        <a class="dropdown-item" href="../functions/admin/delete-doctor.php?= $doctor['id'] ?>" onclick="return confirm('Delete this doctor?');"><i class="bx bx-trash me-1"></i> Delete</a>
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