<?php include 'header.php'?>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <h2 style="text-align: center;">ECIS</h2>
              <!-- /Logo -->
              <form id="formAuthentication" class="mb-3" action="functions/AuthController.php" method="POST">
                <!-- Basic Information -->
                <div class="mb-3">
                  <input type="hidden" name="action" value="register">
                </div>
                <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="full_name"
                        name="full_name"
                        placeholder="Enter your full name"
                        required
                        autofocus
                    />
                </div>


                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="email" 
                        class="form-control" 
                        id="email" 
                        name="email" 
                        placeholder="Enter your email" 
                    />
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input
                        type="tel"
                        class="form-control"
                        id="phone"
                        name="phone"
                        placeholder="Enter your phone number"
                        required
                    />
                </div>

                <!-- Password Section -->
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group input-group-merge">
                        <input
                            type="password"
                            id="password"
                            class="form-control"
                            name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password"
                            required
                            minlength="8"
                        />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                </div>

                <!-- Role Selection -->
                <div class="mb-3">
                    <label class="form-label" for="role">Account Type</label>
                    <select class="form-select" id="role" name="user_role" required>
                        <option value="" selected disabled>Select your role</option>
                        <option value="parent">Parent/Guardian</option>
                        <option value="doctor">Doctor</option>
                        <option value="nurse">Nurse</option>
                        <option value="admin">Administrator</option>
                    </select>
                </div>

                <!-- Additional Fields for Healthcare Workers -->
                <div id="healthcareFields" style="display: none;">
                    <div class="mb-3">
                        <label for="license_number" class="form-label">Professional License Number</label>
                        <input
                            type="text"
                            class="form-control"
                            id="license_number"
                            name="license_number"
                            placeholder="Enter your license number"
                        />
                    </div>
                </div>

                <!-- Terms and Conditions -->
                <!-- <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" required />
                        <label class="form-check-label" for="terms-conditions">
                            I agree to the
                            <a href="privacy_policy.html">privacy policy</a> and 
                            <a href="terms_of_service.html">terms of service</a>
                        </label>
                    </div>
                </div> -->

                <input type="submit" class="btn btn-primary d-grid w-100" value="Sign up">

                <!-- <button type="submit" class="btn btn-primary d-grid w-100">Sign up</button> -->
            </form>



              <p class="text-center">
                <span>Already have an account?</span>
                <a href="login.php">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->
    <?php include 'scripts.php'?>
    <!-- Core JS -->
  </body>
</html>
