<?php
session_start();
?>
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
                    <div class="col-xl">
                    <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Add Child Information</h5>
                            </div>
                            <div class="card-body">
                                <!-- Ensure the action points to the correct PHP script handling child creation -->
                                <!-- The hidden input 'action' value is changed to 'create_child' -->
                                <form id="addChildForm" action="../functions/ParentController.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="action" value="create_child">

                                    <!-- First Name -->
                                    <div class="mb-3">
                                        <label class="form-label" for="first_name">First Name</label>
                                        <div class="input-group input-group-merge">
                                            <span id="first_name_icon" class="input-group-text">
                                                <i class="bx bx-user"></i>
                                            </span>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="first_name"
                                                name="first_name"
                                                placeholder="Jane"
                                                aria-label="First Name"
                                                aria-describedby="first_name_icon"
                                                required
                                            />
                                        </div>
                                    </div>

                                    <!-- Last Name -->
                                    <div class="mb-3">
                                        <label class="form-label" for="last_name">Last Name</label>
                                        <div class="input-group input-group-merge">
                                            <span id="last_name_icon" class="input-group-text">
                                                <i class="bx bx-user"></i>
                                            </span>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="last_name"
                                                name="last_name"
                                                placeholder="Doe"
                                                aria-label="Last Name"
                                                aria-describedby="last_name_icon"
                                                required
                                            />
                                        </div>
                                    </div>

                                    <!-- Date of Birth -->
                                    <div class="mb-3">
                                        <label class="form-label" for="date_of_birth">Date of Birth</label>
                                        <div class="input-group input-group-merge">
                                            <span id="dob_icon" class="input-group-text">
                                                <i class="bx bx-calendar"></i>
                                            </span>
                                            <input
                                                type="date"
                                                class="form-control"
                                                id="date_of_birth"
                                                name="date_of_birth"
                                                aria-label="Date of Birth"
                                                aria-describedby="dob_icon"
                                                required
                                            />
                                        </div>
                                    </div>

                                    <!-- Gender -->
                                    <div class="mb-3">
                                        <label class="form-label">Gender</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male" required>
                                                <label class="form-check-label" for="genderMale">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female" required>
                                                <label class="form-check-label" for="genderFemale">Female</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Mother's Name -->
                                    <div class="mb-3">
                                        <label class="form-label" for="mother_name">Mother's Name</label>
                                        <div class="input-group input-group-merge">
                                            <span id="mother_name_icon" class="input-group-text">
                                                <i class="bx bx-user-pin"></i> <!-- Example icon -->
                                            </span>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="mother_name"
                                                name="mother_name"
                                                placeholder="Mary Doe"
                                                aria-label="Mother's Name"
                                                aria-describedby="mother_name_icon"
                                                required
                                            />
                                        </div>
                                    </div>

                                    <!-- Father's Name -->
                                    <div class="mb-3">
                                        <label class="form-label" for="father_name">Father's Name</label>
                                        <div class="input-group input-group-merge">
                                            <span id="father_name_icon" class="input-group-text">
                                                <i class="bx bx-user-pin"></i> <!-- Example icon -->
                                            </span>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="father_name"
                                                name="father_name"
                                                placeholder="John Doe"
                                                aria-label="Father's Name"
                                                aria-describedby="father_name_icon"
                                                required
                                            />
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="mb-3">
                                        <label class="form-label" for="address">Address</label>
                                        <div class="input-group input-group-merge">
                                            <span id="address_icon" class="input-group-text">
                                                <i class="bx bx-map-pin"></i>
                                            </span>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="address"
                                                name="address"
                                                placeholder="123 Main Street, Apt 4B"
                                                aria-label="Address"
                                                aria-describedby="address_icon"
                                                required
                                            />
                                        </div>
                                    </div>

                                    <!-- Village -->
                                    <div class="mb-3">
                                        <label class="form-label" for="village">Village</label>
                                        <div class="input-group input-group-merge">
                                            <span id="village_icon" class="input-group-text">
                                                <i class="bx bx-buildings"></i>
                                            </span>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="village"
                                                name="village"
                                                placeholder="Springfield"
                                                aria-label="Village"
                                                aria-describedby="village_icon"
                                                required
                                            />
                                        </div>
                                    </div>

                                    <!-- District -->
                                    <div class="mb-3">
                                        <label class="form-label" for="district">District</label>
                                        <div class="input-group input-group-merge">
                                            <span id="district_icon" class="input-group-text">
                                                <i class="bx bx-map-alt"></i>
                                            </span>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="district"
                                                name="district"
                                                placeholder="Shelbyville District"
                                                aria-label="District"
                                                aria-describedby="district_icon"
                                                required
                                            />
                                        </div>
                                    </div>

                                    <!-- Child Image -->
                                    <div class="mb-3">
                                        <label class="form-label" for="child_image_upload">Child Image</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="child_image_upload" name="child_image" accept="image/*" />
                                            <label class="input-group-text" for="child_image_upload">Upload</label>
                                        </div>
                                        <div class="form-text">Optional. Allowed image types (JPG, PNG, GIF).</div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Add Child</button>
                                </form>
                            </div>
                        </div>

                    </div>
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