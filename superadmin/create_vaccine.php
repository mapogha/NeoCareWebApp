<?php include 'header.php'?>
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
                                <form action="../functions/superadmin/create-vaccine.php" method="post">
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="vaccine_name">Vaccine Name</label>
                                        <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-capsule"></i></span>
                                            <input type="text" class="form-control" id="vaccine_name" name="vaccine_name" placeholder="e.g., BCG" required />
                                        </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="child_age">Child Age</label>
                                        <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-child"></i></span>
                                            <input type="text" class="form-control" id="child_age" name="child_age" placeholder="e.g., At birth, 6 weeks" required />
                                        </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="vaccine_type">Vaccine Type</label>
                                        <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-category"></i></span>
                                            <input type="text" class="form-control" id="vaccine_type" name="vaccine_type" placeholder="e.g., Live attenuated" required />
                                        </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="description">Description</label>
                                        <div class="col-sm-10">
                                        <textarea class="form-control" id="description" name="description" placeholder="Brief description" required></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="recommended_dose">Recommended Dose</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="recommended_dose" name="recommended_dose" placeholder="e.g., Single dose, First dose" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="side_effects">Side Effects</label>
                                        <div class="col-sm-10">
                                        <textarea class="form-control" id="side_effects" name="side_effects" placeholder="Common side effects" required></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="is_mandatory">Is Mandatory</label>
                                        <div class="col-sm-10">
                                        <select id="is_mandatory" name="is_mandatory" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Create Vaccine">
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