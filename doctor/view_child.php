<?php include 'header.php'?>
<?php
require_once '../functions/admin/view-child.php';
?>

<!-- Now you can access $child['child_name'], $child['birth_date'], etc. -->

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
                            <h5 class="mb-0">Child Information</h5>
                            </div>
                            <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label" for="child_name">Child Name</label>
                                    <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="child_name" value="<?= htmlspecialchars($child['child_name'] ?? '') ?>" disabled />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="mother_name">Mother Name</label>
                                    <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="mother_name" value="<?= htmlspecialchars($child['mother_name'] ?? '') ?>" disabled />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="father_name">Father Name</label>
                                    <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="father_name" value="<?= htmlspecialchars($child['father_name'] ?? '') ?>" disabled />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="birth_date">Birth Date</label>
                                    <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                    <input type="text" class="form-control" id="birth_date" value="<?= htmlspecialchars($child['birth_date'] ?? '') ?>" disabled />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="registration_number">Registration Number</label>
                                    <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-id-card"></i></span>
                                    <input type="text" class="form-control" id="registration_number" value="<?= htmlspecialchars($child['registration_number'] ?? '') ?>" disabled />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="hospital">Hospital</label>
                                    <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-building"></i></span>
                                    <input type="text" class="form-control" id="hospital" value="<?= htmlspecialchars($child['hospital_name'] ?? '') ?>" disabled />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="street">Street</label>
                                    <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-map"></i></span>
                                    <input type="text" class="form-control" id="street" value="<?= htmlspecialchars($child['street'] ?? '') ?>" disabled />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="ward">Ward</label>
                                    <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-map"></i></span>
                                    <input type="text" class="form-control" id="ward" value="<?= htmlspecialchars($child['ward'] ?? '') ?>" disabled />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="weight_on_birth">Weight at Birth (kg)</label>
                                    <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-line-chart"></i></span>
                                    <input type="text" class="form-control" id="weight_on_birth" value="<?= htmlspecialchars($child['weight_on_birth'] ?? '') ?>" disabled />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="height_on_birth">Height at Birth (cm)</label>
                                    <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-line-chart"></i></span>
                                    <input type="text" class="form-control" id="height_on_birth" value="<?= htmlspecialchars($child['height_on_birth'] ?? '') ?>" disabled />
                                    </div>
                                </div>
                            </form>
                           <br>
                            <h5 class="mb-0">Growth Rate Graph</h5>
                            <div class="card-body">
                            <?php
                                require_once __DIR__ . '/../db/db.php';

                                $child_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

                                // Fetch weight records of the child
                                $stmt = $conn->prepare("SELECT age, weight FROM child_medical_records WHERE child_id = :child_id ORDER BY age ASC");
                                $stmt->execute([':child_id' => $child_id]);
                                $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                $ages = [];
                                $weights = [];
                                foreach ($records as $record) {
                                    $ages[] = $record['age'];
                                    $weights[] = $record['weight'];
                                }
                                ?>

                                <canvas id="growthChart" height="400"></canvas>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                <script>
                                const ctx = document.getElementById('growthChart').getContext('2d');
                                const growthChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: <?= json_encode($ages) ?>,
                                        datasets: [
                                            {
                                                label: 'Child Weight (kg)',
                                                data: <?= json_encode($weights) ?>,
                                                borderColor: 'blue',
                                                fill: false,
                                                tension: 0.3
                                            },
                                            {
                                                label: 'Median (50th percentile)',
                                                data: [3.3, 4.8, 6.4, 7.3, 8.1, 8.7, 9.2, 9.6, 9.9, 10.1, 10.3, 10.4, 10.5], // Example data
                                                borderColor: 'green',
                                                borderDash: [5, 5],
                                                fill: false,
                                                tension: 0.3
                                            },
                                            {
                                                label: 'Low Weight (3rd percentile)',
                                                data: [2.5, 3.8, 5.2, 6.1, 6.8, 7.4, 7.9, 8.2, 8.5, 8.7, 8.8, 8.9, 9.0], // Example data
                                                borderColor: 'red',
                                                borderDash: [5, 5],
                                                fill: false,
                                                tension: 0.3
                                            }
                                        ]
                                    },
                                    options: {
                                        responsive: true,
                                        plugins: {
                                            title: {
                                                display: true,
                                                text: 'Weight-for-Age Growth Chart (Girls)'
                                            }
                                        },
                                        scales: {
                                            x: {
                                                title: {
                                                    display: true,
                                                    text: 'Age (months)'
                                                }
                                            },
                                            y: {
                                                title: {
                                                    display: true,
                                                    text: 'Weight (kg)'
                                                },
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                                </script>

                            </div>


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