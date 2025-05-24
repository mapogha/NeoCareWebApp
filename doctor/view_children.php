<?php include 'header.php'?>
<?php
include '../functions/admin/view-children.php';
$children = fetchChildren();
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
                                <h5 class="card-header">Children</h5>
                                <a class="btn btn-primary me-3" href="create_child.php">Add Child</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                            <th>Child Name</th>
                                            <th>Mother Name</th>
                                            <th>Father Name</th>
                                            <th>Birth Date</th>
                                            <th>Hospital</th>
                                            <th>Registration No</th>
                                            <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($children as $child): ?>
                                            <tr>
                                            <td><?= htmlspecialchars($child['child_name']) ?></td>
                                            <td><?= htmlspecialchars($child['mother_name']) ?></td>
                                            <td><?= htmlspecialchars($child['father_name']) ?></td>
                                            <td><?= htmlspecialchars($child['birth_date']) ?></td>
                                            <td><?= htmlspecialchars($child['hospital_name'] ?? 'N/A') ?></td>
                                            <td><?= htmlspecialchars($child['registration_number']) ?></td>
                                            <td>
                                                <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="view_child.php?id=<?= $child['id'] ?>">
                                                    <i class="bx bx-show me-1"></i> View
                                                    </a>
                                                    <!-- <a class="dropdown-item" href="edit_child.php?id=<?= $child['id'] ?>">
                                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                                    </a>
                                                    <a class="dropdown-item" href="../functions/hospital_admin/delete-child.php?id=<?= $child['id'] ?>" onclick="return confirm('Are you sure you want to delete this record?');">
                                                    <i class="bx bx-trash me-1"></i> Delete
                                                    </a> -->
                                                    <a class="dropdown-item" href="create_child_medical_record.php?id=<?= $child['id'] ?>">
                                                    <i class="bx bx-edit-alt me-1"></i> Medical Form
                                                    </a>
                                                    <a class="dropdown-item" href="view_child_medical_records.php?id=<?= $child['id'] ?>">
                                                    <i class="bx bx-edit-alt me-1"></i> Health Records
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