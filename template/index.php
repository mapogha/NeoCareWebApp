    <?php include 'header.php'?>
    <!-- Content -->

    

      <!-- navigation starts -->
        <nav class="navbar navbar-example navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
              <a class="navbar-brand" href="#">ECIS</a>
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar-ex-2"
                aria-controls="navbar-ex-2"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbar-ex-2">
                <div class="navbar-nav me-auto">
                  <!-- <a class="nav-item nav-link active" href="javascript:void(0)">Home</a>
                  <a class="nav-item nav-link" href="javascript:void(0)">About</a>
                  <a class="nav-item nav-link" href="javascript:void(0)">Contact</a> -->
                </div>

                  <span class="navbar-text">
                  <a href="login.php" class="btn btn-primary" style="color:white">Login</a>
                  <a href="register.php" class="btn btn-primary" style="color:white">Register</a>
                  
                  </span>
              </div>
            </div>
        </nav>
      <!-- navigation ends  -->

      <!-- main content starts -->
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <small class="text-light fw-semibold">Navigation</small>
              <div class="demo-inline-spacing mt-3">
                <div class="list-group list-group-horizontal-md text-md-center">
                  <a
                    class="list-group-item list-group-item-action active"
                    id="home-list-item"
                    data-bs-toggle="list"
                    href="#horizontal-home"
                  >Home</a>
                  <a
                  class="list-group-item list-group-item-action"
                  id="profile-list-item"
                  data-bs-toggle="list"
                  href="#horizontal-profile"
                  >About</a
                    >
                  <a
                    class="list-group-item list-group-item-action"
                    id="messages-list-item"
                    data-bs-toggle="list"
                    href="#horizontal-messages"
                    >Contact</a
                  >
                </div>
                  <div class="tab-content px-0 mt-0">
                    <div class="tab-pane fade show active" id="horizontal-home">
                     ECIS  is a digital platform designed to manage child vaccination records efficiently. It allows health workers to register newborns, track immunization status,
                     and update health records. Parents receive timely notifications 
                     and can access their child’s vaccination history, 
                     ensuring better healthcare and disease prevention 
                     hrough streamlined immunization management.
                    </div>
                    <div class="tab-pane fade" id="horizontal-profile">
                     ECIS  is a digital solution for
                     tracking and managing child vaccinations. 
                     It enables health workers to register newborns, 
                     update immunization records, and monitor health status.
                      Parents receive timely alerts and access vaccination histories, ensuring children stay protected. ECIS enhances efficiency, reduces missed vaccinations, and promotes better healthcare management.
                    </div>
                    <div class="tab-pane fade" id="horizontal-messages">
                    <div class="col-xl">
                        <div class="card mb-4">
                          <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Contact Us</h5>
                            <small class="text-muted float-end">Reach Out Now</small>
                          </div>
                          <div class="card-body">
                            <form>
                              <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                                <div class="input-group input-group-merge">
                                  <span id="basic-icon-default-fullname2" class="input-group-text"
                                    ><i class="bx bx-user"></i
                                  ></span>
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="basic-icon-default-fullname"
                                    placeholder="John Doe"
                                    aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2"
                                  />
                                </div>
                              </div>
                              <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-email">Email</label>
                                <div class="input-group input-group-merge">
                                  <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                  <input
                                    type="text"
                                    id="basic-icon-default-email"
                                    class="form-control"
                                    placeholder="john.doe"
                                    aria-label="john.doe"
                                    aria-describedby="basic-icon-default-email2"
                                  />
                                  <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                                </div>
                                <div class="form-text">You can use letters, numbers & periods</div>
                              </div>
                              <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                                <div class="input-group input-group-merge">
                                  <span id="basic-icon-default-phone2" class="input-group-text"
                                    ><i class="bx bx-phone"></i
                                  ></span>
                                  <input
                                    type="text"
                                    id="basic-icon-default-phone"
                                    class="form-control phone-mask"
                                    placeholder="658 799 8941"
                                    aria-label="658 799 8941"
                                    aria-describedby="basic-icon-default-phone2"
                                  />
                                </div>
                              </div>
                              <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-message">Message</label>
                                <div class="input-group input-group-merge">
                                  <span id="basic-icon-default-message2" class="input-group-text"
                                    ><i class="bx bx-comment"></i
                                  ></span>
                                  <textarea
                                    id="basic-icon-default-message"
                                    class="form-control"
                                    placeholder="Hi, Do you have a moment to talk Joe?"
                                    aria-label="Hi, Do you have a moment to talk Joe?"
                                    aria-describedby="basic-icon-default-message2"
                                  ></textarea>
                                </div>
                              </div>
                              <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>

        </div>
      </div>
      <!-- main content ends -->

      

    <!-- / Content -->

    <!-- Core JS -->
    
    <?php include 'scripts.php'?>
  </body>
</html>
