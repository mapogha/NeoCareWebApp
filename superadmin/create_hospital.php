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
                            <h5 class="mb-0">Add Hospital Details</h5>
                            <small class="text-muted float-end">Important for validation</small>
                            </div>
                            <div class="card-body">
                            <form action="../functions/superadmin/create-hospital.php" method="post">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="hospital_name">Hospital Name</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-hospital_name2" class="input-group-text"><i class="bx bx-user"></i></span>
                                            <input type="text" class="form-control" id="hospital_name" name="hospital_name" placeholder="Hospital Name" aria-label="Hospital Name" aria-describedby="basic-icon-default-hospital_name2" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="hospital_email">Hospital Email</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-hospital_email2" class="input-group-text"><i class="bx bx-envelope"></i></span>
                                            <input type="email" class="form-control" id="hospital_email" name="hospital_email" placeholder="Hospital Email" aria-label="Hospital Email" aria-describedby="basic-icon-default-hospital_email2" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="region">Region</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-region2" class="input-group-text"><i class="bx bx-map"></i></span>
                                            <input type="text" id="region" name="region" class="form-control" placeholder="Region" aria-label="Region" aria-describedby="basic-icon-default-region2" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="district">District</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-district2" class="input-group-text"><i class="bx bx-map"></i></span>
                                            <input type="text" id="district" name="district" class="form-control" placeholder="District" aria-label="District" aria-describedby="basic-icon-default-district2" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label" for="phone_number">Phone No</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                                            <input type="text" id="phone_number" name="phone_number" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label" for="hospital_address">Hospital Address</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-hospital_address2" class="input-group-text"><i class="bx bx-map"></i></span>
                                            <textarea id="hospital_address" name="hospital_address" class="form-control" placeholder="Hospital Address" aria-label="Hospital Address" aria-describedby="basic-icon-default-hospital_address2" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="license_number">License Number</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-license2" class="input-group-text"><i class="bx bx-id-card"></i></span>
                                            <input type="text" id="license_number" name="license_number" class="form-control" placeholder="License Number" aria-label="License Number" aria-describedby="basic-icon-default-license2" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="website">Website (optional)</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-website2" class="input-group-text"><i class="bx bx-globe"></i></span>
                                            <input type="url" id="website" name="website" class="form-control" placeholder="https://example.com" aria-label="Website" aria-describedby="basic-icon-default-website2" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
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